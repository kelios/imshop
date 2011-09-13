<?php

/**
 * ShopImport - imports products from CVS file.
 * 
 * @package 
 * @version $id$
 * @copyright 
 * @author <dev@imagecms.net> 
 * @license
 */
class ShopImport {

    public $delimiter = ";";
    public $maxRowLength = 10000; 
    public $enclosure = '"';
    public $file = null;
    public $encoding = 'utf8';
    public $attributes = array();
    public $errors = array();
    public $categoryCache = array(); // Cache categories by name.
    public $subCategoryDelimiter = '/';
    public $subCategoryPattern = '/\\REPLACE((?:[^\\\\\REPLACE]|\\\\.)*)/';
    public $con = null;
    public $sqlNames = array(
            'Name'=>'name',
            'OldPrice'=>'old_price',
            'Url'=>'url' ,
            'Active'=>'active',
            'Hit'=>'hit',
            'BrandId'=>'brand_id',
            'CategoryId'=>'category_id',
            'RelatedProducts'=>'related_products',
            'MainImage'=>'mainImage',
            'SmallImage'=>'smallImage',
            'ShortDescription'=>'short_description',
            'FullDescription'=>'full_description',
            'MetaTitle'=>'meta_title',
            'MetaDescription'=>'meta_description',
            'MetaKeywords'=>'meta_keywords',
        );

    public $customFieldsIds = array(); // Store ids from field names. e.g array('field_1'=>1);
    public $processCustomFields = false;
    public $customFieldsCache = array();

    public function __construct($file, array $settings=array())
    {
        $this->initialize($settings);
        $this->file = $file;

        if (!is_readable($file))
            $this->addError('Ошибка открытия файла.');

        $this->subCategoryPattern = str_replace('REPLACE',$this->subCategoryDelimiter,$this->subCategoryPattern);

        $this->prepareCustomFields();
        $this->columnsToAttributes();

        ShopCore::$ci->load->helper('translit');
        $this->con = Propel::getConnection(); 
    }

    /**
     * Initialize settings
     * 
     * @param array $settings 
     * @access public
     */
    public function initialize($settings)
    {
        // Init settings
        if (sizeof($settings) > 0)
        {
            foreach ($settings as $key=>$value)
            {
                if (isset($this->$key))
                    $this->$key = $value;
            }
        }
    }

    public function columnsToAttributes()
    {
        $abbreviations = array(
            'name'  => 'Name',
            'url'   => 'Url',
            'oldprc'=> 'OldPrice',
            'prc'   => 'Price',
            'stk'   => 'Stock',
            'num'   => 'Number',
            'var'   => 'Variant',
            'act'   => 'Active',
            'hit'   => 'Hit',
            'brd'   => 'BrandId',
            'cat'   => 'CategoryName',
            'relp'  => 'RelatedProducts',
            'mimg'  => 'MainImage',
            'simg'  => 'SmallImage',
            'imgs'  => 'AdditionalImages',
            'shdesc'=> 'ShortDescription',
            'desc'  => 'FullDescription',
            'mett'  => 'MetaTitle',
            'metd'  => 'MetaDescription',
            'metk'  => 'MetaKeywords',
            'skip'  => 'skip',
        );        

        $attributes = str_replace(array_keys($abbreviations), $abbreviations, $this->attributes);
        $attributes = array_map('trim', explode(',',$attributes));

        foreach ($attributes as $key=>$val)
        {
            if (array_key_exists($val,$this->customFieldsCache))
            {
                $abbreviations[$val] = true;
                $this->customFieldsIds[$val] = $this->customFieldsCache[$val]->getId();
            }

            if (!in_array($val,$abbreviations))
                $this->addError('Неизвестный атрибут: '.$val);
        }

        if (sizeof($this->customFieldsIds) > 0)
            $this->processCustomFields = true;

        if (!in_array('Name',$attributes))
            $this->addError('Атрибут Имя обязательное поле.');
      
        if (!in_array('CategoryName',$attributes) && !in_array('Number',$attributes))
            $this->addError('Категория или Артикул - обязательные поля');

        $this->attributes = $attributes;

        return true;
    }

    public function import()
    {
        $attributesSize = sizeof($this->attributes);

        if ($this->encoding == 'cp1251')
        {
            $string = file_get_contents($this->file);
            $string = iconv('cp1251', 'utf-8', $string);
            $temp = tmpfile();
            fwrite($temp, $string);
            fseek($temp, 0);
            $file = $temp;
        }else{
            // Read file
            $file = fopen($this->file,'r');
        }

        $line = 0;
        while(($row = fgetcsv($file, $this->maxRowLength, $this->delimiter, $this->enclosure)) !== false) 
        {
            // If sizes of two arrays are equal - add product
            if (sizeof($row) === $attributesSize)
            {
                $row = array_map('trim',$row);
                $this->processDataRawSql(array_combine($this->attributes, $row));
            }
            $line++;
        }

        fclose($file);

        // Update products empty urls.
        Propel::getConnection(SProductsPeer::DATABASE_NAME)
            ->prepare("UPDATE ".SProductsPeer::TABLE_NAME." SET url=id WHERE url=''")
            ->execute(); 
    }
    
    //----------------------------------
    public function processDataRawSql(array $data)
    {
        if (empty($data['CategoryName']))
            return;

        $categoryModel = null;
        $productModel = false;
        $binds = array(':name'=>$data['Name']); 
        $c='';

        // Prepare price
        if (!empty($data['Price']))
            $data['Price'] = preg_replace('/,/','.',$data['Price']);

        // First search product by Number.
        if (!empty($data['Number']))
        {
            $sql = 'SELECT product_id as id FROM shop_product_variants WHERE number=:number LIMIT 1';
            $result = $this->runQuery($sql, array(':number'=>$data['Number']));
            $productModel = $result->fetch();
        }

        // Search product by category/brand/name
        if ($productModel===false)
        {
            // Filter by category
            if (isset($data['CategoryName']) && !empty($data['CategoryName']))
            {
                $categoryModel = $this->loadCategory($data['CategoryName']);
                $catId = $categoryModel->getId();
                $data['CategoryId'] = $catId;
                $c .= ' AND category_id=:category_id ';
                $binds[':category_id'] = $catId;
            }

            // Filter by brand
            if (isset($data['BrandId']) && !empty($data['BrandId']))
            {
                $brandId = $this->loadBrand($data['BrandId']);
                $data['BrandId'] = $brandId;
                $c .= ' AND brand_id=:brand_id ';
                $binds[':brand_id'] = $brandId;
            }

            $sql = 'SELECT id FROM shop_products WHERE name=:name '.$c.' LIMIT 1';
            $result = $this->runQuery($sql,$binds);
            $productModel = $result->fetch();
        }

        // Product not found. Create.
        if ($productModel===false)
        {
            $prep = $this->prepareProductInsertQuery($data);
            $result = $this->runQuery($prep['sql'],$prep['binds']); 

            $pid = $this->con->lastInsertId(); // ProductId.
            $productModel['id'] = $pid;

            $sql = 'INSERT INTO shop_product_categories (product_id,category_id) VALUES (:product_id,:category_id)';
            $result = $this->runQuery($sql,array(
                ':product_id'=>$pid,
                ':category_id'=>$catId,
            )); 

            $sql = 'INSERT INTO shop_product_variants (product_id,name,price,number,stock) VALUES (:product_id,:name,:price,:number,:stock)';
            $result = $this->runQuery($sql,array(
                ':name'=>$data['Variant'],
                ':product_id'=>$pid,
                ':price'=>$data['Price'],
                ':number'=>$data['Number'],
                ':stock'=>$data['Stock'],
            ));

            // Insert product additional images only from new products.
            if (isset($data['AdditionalImages']) && !empty($data['AdditionalImages']))
            {
                $imagePos = 0;
                $additionalImages = array_map('trim', explode(',',$data['AdditionalImages']));

                foreach ($additionalImages as $image_name)
                {
                    $imgSql = 'INSERT INTO shop_product_images (product_id,image_name,position) VALUES (:product_id,:image_name,:position)';
                    $this->runQuery($imgSql,array(
                        ':product_id'=>$pid,
                        ':image_name'=>$image_name,
                        ':position'=>$imagePos,
                    ));
                    $imagePos++;
                }
            }
        }else{
            // Update product
            $prep = $this->prepareProductUpdateQuery($data, $productModel['id']);
            $this->runQuery($prep['sql'],$prep['binds']);
        }

        if (isset($data['Variant']) && !empty($data['Variant']))
        {
            $sql = 'SELECT id,product_id FROM shop_product_variants WHERE
                    product_id=:product_id 
                    AND 
                    name=:name LIMIT 1';
            $result = $this->runQuery($sql,array(
                ':product_id'=>$productModel['id'],
                ':name'=>$data['Variant'],
            ));

            $result = $result->fetch();

            if (isset($result['product_id']))
            {
                $sql = 'UPDATE shop_product_variants SET 
                            name=:name,price=:price,number=:number,stock=:stock
                        WHERE 
                            product_id=:product_id
                        AND 
                            id=:variant_id
                        LIMIT 1';

                $this->runQuery($sql,array(
                    ':name'=>$data['Variant'],
                    ':price'=>$data['Price'],
                    ':number'=>$data['Number'],
                    ':stock'=>$data['Stock'],
                    ':product_id'=>$productModel['id'],
                    ':variant_id'=>$result['id'],
                )); 
            }
            else
            {
                $sql = 'INSERT INTO shop_product_variants
                            (product_id,name,price,number,stock)
                        VALUES
                            (:product_id,:name,:price,:number,:stock)';

                $this->runQuery($sql,array(
                    ':name'=>$data['Variant'],
                    ':product_id'=>$productModel['id'],
                    ':price'=>$data['Price'],
                    ':number'=>$data['Number'],
                    ':stock'=>$data['Stock'],
                )); 
            }
        }
 
        // Process product custom fields data.
        if ($this->processCustomFields === true)
        {
            foreach($data as $key=>$val)
            {
                if (array_key_exists($key,$this->customFieldsIds))
                {
                    $cs = SProductPropertiesDataQuery::create()
                        ->filterByProductId($productModel['id'])
                        ->filterByPropertyId($this->customFieldsIds[$key])
                        ->findOne();

                    if ($cs === null)
                    {
                        $cs = new SProductPropertiesData;
                        $cs->setProductId($productModel['id']);
                        $cs->setPropertyId($this->customFieldsIds[$key]);
                    }
                    else
                    {
                        if (empty($val))
                        {
                            $cs->delete();
                            return;
                        }
                    }
                    
                    $cs->setValue($val);
                    $cs->save();

                    // Check and update category relations.
                    $check = ShopProductPropertiesCategoriesQuery::create()
                        ->filterByPropertyId($this->customFieldsIds[$key])
                        ->filterByCategoryId($catId)
                        ->findOne();

                    if ($check === null)
                    {
                        $sql = 'INSERT INTO shop_product_properties_categories (property_id,category_id) VALUES (:property_id,:category_id)';
                        $this->runQuery($sql,array(
                            ':property_id'=>$this->customFieldsIds[$key],
                            ':category_id'=>$catId,
                        ));
                    }

                    // Add value to custom field.
                    $this->addCustomFieldValue($key,$val);
                }
            }
        }
    }

    public function prepareProductInsertQuery($data)
    {
        $names = $this->sqlNames;

        $newNames = array();
        $binds = array();
        foreach ($data as $key=>$val)
        {
            if (isset($names[$key]))
            {
                array_push($newNames,$names[$key]);
                $binds[':'.$names[$key]] = $val;
            }
        }
 
        return array(
            'sql'=>'INSERT INTO shop_products ('.implode(',',$newNames).') VALUES ('.implode(',',array_keys($binds)).')',
            'binds'=>$binds,
        ); 
    }

    public function prepareProductUpdateQuery($data,$product_id)
    {
        $names = $this->sqlNames;

        $updateArray = array();
        $binds = array();
        foreach ($data as $key=>$val)
        {
            if (isset($names[$key]))
            {
                array_push($updateArray,$names[$key].'=:'.$names[$key]);
                $binds[':'.$names[$key]] = $val;
            }
        }

        // Update main variant data
        if (empty($data['Variant']))
        {
            $sql = 'UPDATE shop_product_variants SET price=:price,number=:number,stock=:stock WHERE product_id='.$product_id.' LIMIT 1';
            $this->runQuery($sql,array(
                ':number'=>$data['Number'],
                ':price'=>$data['Price'],
                ':stock'=>$data['Stock'],
            ));
        }

        return array(
            'sql'=>'UPDATE shop_products SET '.implode(',',$updateArray). ' WHERE id='.$product_id.' LIMIT 1',
            'binds'=>$binds,
        ); 
    }

    public function runQuery($query,$binds=array())
    {
        $req = $this->con->prepare($query);
        $req->execute($binds);
        return $req;
    }

    //----------------------------------


    /**
     * Load custom fields.
     * 
     * @access public
     */
    public function prepareCustomFields()
    {
        $fields = SPropertiesQuery::create()
            ->find();

        if (sizeof($fields) > 0)
        {
            foreach($fields as $f)
            { 
                $f->setVirtualColumn('dataArray',$f->asArray());
                $f->setData($f->asText());
                $this->customFieldsCache[$f->getCsvName()] = $f;
            }
        }         
    }

    /**
     * Add new value to custom field and save it.
     * 
     * @param mixed $name 
     * @param mixed $value 
     * @access public
     * @return void
     */
    public function addCustomFieldValue($name,$value) 
    {
        if (array_key_exists($name, $this->customFieldsCache))
        {
            $fieldDataArray = $this->customFieldsCache[$name]->getDataArray();
            
            if ($fieldDataArray === null)
                $fieldDataArray = array();

            if (!in_array($value,$fieldDataArray))
            {
                array_push($fieldDataArray,$value);
                $newData = implode("\n",$fieldDataArray);
                $this->customFieldsCache[$name]->setData($newData);
                $this->customFieldsCache[$name]->save();
                $this->customFieldsCache[$name]->setVirtualColumn('dataArray', $fieldDataArray);
                $this->customFieldsCache[$name]->setData($newData);
            }
        }
    }

    /**
     * Load or create new categry
     * 
     * @param string $name Category name 
     * @access protected
     * @return SCategory model
     */
    public function loadCategory($name)
    {
        if (isset($this->categoryCache[$name]))
            return $this->categoryCache[$name];
		
        $parts = $this->parseCategoryName($name);
        $pathIds = array();
        $pathNames = array();

        $parentId = 0;
        foreach ($parts as $part)
        {
            $pathNames[] = $part;

            $model = SCategoryQuery::create()
                ->where('SCategory.Name = ?', $part)
                ->where('SCategory.ParentId = ?', $parentId)
                ->limit(1)
                ->findOne();

            if ($model)
            {
                $parentId = $model->getId();
            }
            else
            {
                $model = new SCategory;
                $model->setName($part);
                $model->setParentId($parentId);
                $model->setFullPathIds(serialize($pathIds));
                $model->setFullPath(implode('/', array_map('translit_url',$pathNames)));
                $model->save();

                $parentId = $model->getId();
            }

            $pathIds[] = $model->getId();
        }

        $this->categoryCache[$name] = $model;

        return $model;
    }

    /**
     * Load or create new brand
     * 
     * @param string $name Brand name
     * @access public
     * @return integer Brand id
     */
    public function loadBrand($name)
    {
        if (isset($this->brandsCache[$name]))
            return $this->brandsCache[$name];

        $model = SBrandsQuery::create()
            ->filterByName($name)
            ->findOne();

        if ($model === null)
        {
            $model = new SBrands;
            $model->setName($name);
            $model->save();
        }

        $this->brandsCache[$name] = $model->getId();

        return $model->getId();
    }

    public function parseCategoryName($name)
    {
        $result = preg_split($this->subCategoryPattern, $name, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        $result = array_map('stripcslashes',$result);
        
        return $result;
    }

    /**
     * addError 
     * 
     * @param mixed $msg 
     * @access protected
     * @return void
     */
    public function addError($msg)
    {
        $this->errors[] = $msg;
    }

    /**
     * Check for errors
     * 
     * @access public
     * @return boolean
     */
    public function hasErrors()
    {
        if (sizeof($this->errors) > 0)
            return true;
        else
            return false;
    }

    /**
     * Get errors array
     * 
     * @access public
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
