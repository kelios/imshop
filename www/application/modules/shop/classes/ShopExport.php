<?php 

class ShopExport {

    protected $attributes = ''; 
    protected $delimiter = ";";
    protected $enclosure = '"';
    protected $errors = array();
    protected $tree = null;
    public $encoding = 'utf8';
    protected $customFieldsCache = array();

    public function __construct(array $settings = array())
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

        if (!$this->attributes)
            $this->addError('Укажите колонки для экспорта.');
        else
        {
            $this->prepareCustomFields();    
            $this->columnsToAttributes();
        }

        $this->tree = ShopCore::app()->SCategoryTree->getTree();
    }

   /**
     * Export products to csv file.
     *
     * @access public
     * @return generated csv string
     */
    public function export()
    {
        $attributes = $this->attributes;
        $products   = $this->loadAllProducts();
        $enclosure  = $this->enclosure;
        $delimiter  = $this->delimiter;
        $defaultRow = array_combine($attributes,array_fill(0,sizeof($attributes),''));
        $newLine    = PHP_EOL;

        $list = array();

        foreach ($products as $product)
        { 
            $variants = $product->getProductVariants();

            foreach ($variants as $variant)
            {
                $row = $defaultRow;
                foreach($attributes as $attribute)
                {
                    if (method_exists($product, 'get'.$attribute))
                    {
                        $func = 'get'.$attribute;
                        $row[$attribute] = $product->$func();
                    }
                    
                    if (method_exists($variant, 'get'.$attribute))
                    {
                        $func = 'get'.$attribute; 
                        $row[$attribute] = $variant->$func();
                    }

                    // Process name and variant name
                    if (!in_array('Variant', $attributes) && $attribute == 'Name')
                    {
                        $row['Name'] = $product->getName().' '.$variant->getName();
                    }
                    elseif(in_array('Variant',$attributes))
                    {
                        $row['Name'] = $product->getName();
                        $row['Variant'] = $variant->getName();
                    }

                    // Process brand
                    if ($attribute == 'BrandId')
                    {
                        $brand = $product->getBrand();
                        if ($brand !== null)
                            $row['BrandId'] = $brand->getName();
                        else
                            $row['BrandId'] = '';
                    }

                    // Process category
                    if ($attribute == 'CategoryName')
                    {
                        $row['CategoryName'] = $this->processCategoryName($product->getCategoryId());
                    }

                    // Process additional images.
                    if ($attribute == 'AdditionalImages')
                    {
                        $images = $product->getSProductImagess();
                        if (sizeof($images) > 0)
                        {
                            $images_arr = array();
                            foreach ($images as $img)
                            {
                                array_push($images_arr,$img->getImageName());
                            }
                            $row['AdditionalImages'] = implode(',', $images_arr);
                        }
                    }

                    // Process custom fields
                    if (array_key_exists($attribute, $this->customFieldsCache))
                    {
                        // Search for value
                        $fieldModel = SProductPropertiesDataQuery::create()
                                ->filterByProductId($product->getId())
                                ->filterByPropertyId($this->customFieldsCache[$attribute]->getId())
                                ->findOne();

                        if ($fieldModel !== null)
                        {
                            $row[$attribute] = $fieldModel->getValue();
                        }else{
                            $row[$attribute] = '';
                        }
                    }
                }

                $list[] = array_map('trim',$row);
            }
        }

        $temp = tmpfile();

        // Write csv lines to temp file
        foreach ($list as $line)
        {
            $out='';
            foreach ($line as $l)
                $out .= $enclosure.str_replace($enclosure, $enclosure.$enclosure, $l).$enclosure.$delimiter;
            
            fwrite($temp,$out.$newLine);
        }
         
        fseek($temp,0);
        $content = stream_get_contents($temp);
        fclose($temp);

        if ($this->encoding == 'cp1251')
        {
            $content = iconv('utf-8', 'cp1251', $content);
        }

        return $content;
    }

    /**
     * Load all shop products
     *
     * @param SProductsQuery $model
     */
    public function loadAllProducts()
    {
        $model = SProductsQuery::create()
            ->leftJoin('ProductVariant')
            ->leftJoin('SProductImages')
            ->leftJoin('Brand')
            ->leftJoin('SProductPropertiesData')
            ->orderByCategoryId()
            ->distinct()
            ->find();

        // Populate product relations.
        $model->populateRelation('ProductVariant');
        $model->populateRelation('SProductImages');
        $model->populateRelation('Brand');
        $model->populateRelation('SProductPropertiesData');

        return $model;
    }

    public function processCategoryName($id)
    {
        $result = array();
        $category = $this->tree[$id];
        $idsPath = unserialize($category->getFullPathIds());
    
        if ($idsPath===false)
            $idsPath = array();

        array_push($idsPath, $id); // Push self id.

        foreach ($idsPath as $categoryId)
        {
            $result[] = preg_replace('/\//','\/',$this->tree[$categoryId]->getName());
        }

        return implode('/', $result);
    }

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
                $this->customFieldsCache[$f->getCsvName()] = $f;
            }
        }
    }

    protected function columnsToAttributes()
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

        if (sizeof($this->customFieldsCache) > 0)
        {
            foreach ($this->customFieldsCache as $key=>$val)
            {
                $abbreviations[$key] = $key;
            }
        }

        $attributes = str_replace(array_keys($abbreviations), $abbreviations, $this->attributes);
        $attributes = array_map('trim', explode(',',$attributes));

        foreach ($attributes as $key=>$val)
        {
            if (!in_array($val,$abbreviations))
                $this->addError('Unknown column: '.$val);
        }

        $this->attributes = $attributes;

        return true;
    }

    /**
     * addError 
     * 
     * @param mixed $msg 
     * @access protected
     * @return void
     */
    protected function addError($msg)
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
