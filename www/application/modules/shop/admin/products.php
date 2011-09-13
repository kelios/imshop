<?php
/**
 * ShopAdminCategories 
 * 
 * @uses ShopController
 * @package 
 * @version $id$
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net> 
 * @license 
 */
class ShopAdminProducts extends ShopAdminController {

    protected $per_page = 20;
    protected $allowedImageExtensions = array('jpg','png','gif');

    protected $imageSizes = array(
        'mainImageWidth'   => 300,
        'mainImageHeight'  => 500,
        'smallImageWidth'  => 150,
        'smallImageHeight' => 200,
        'maxImageWidth'    => 800,
        'maxImageHeight'   => 600,
    );

    protected $imageQuality = 99;

    public function __construct()
    {
        parent::__construct();

        // Load image sizes.
        $this->imageSizes['mainImageWidth'] = ShopCore::app()->SSettings->mainImageWidth;
        $this->imageSizes['mainImageHeight'] = ShopCore::app()->SSettings->mainImageHeight;
        $this->imageSizes['smallImageWidth'] = ShopCore::app()->SSettings->smallImageWidth;
        $this->imageSizes['smallImageHeight'] = ShopCore::app()->SSettings->smallImageHeight;
        $this->imageSizes['maxImageWidth'] = ShopCore::app()->SSettings->addImageWidth;
        $this->imageSizes['maxImageHeight'] = ShopCore::app()->SSettings->addImageHeight;
        $this->per_page = ShopCore::app()->SSettings->adminProductsPerPage;
    }

    /**
     * Display list of products in category
     * 
     * @param integer $categoryID 
     * @access public
     */
    public function index($categoryID=null, $offset=0, $orderField = '', $orderCriteria = '')
    {
        $model = SCategoryQuery::create()
            ->findPk((int) $categoryID); 
        
        if($model === null)
            $this->error404('Категория не найдена.');

        $products = SProductsQuery::create()
                ->filterByCategory($model);

        // Set total products count
        $totalProducts = clone $products;
        $totalProducts = $totalProducts->count();

        $products = $products
                ->limit($this->per_page)
                ->offset((int) $offset);
        
        $nextOrderCriteria =  '';
                        
        switch ($orderCriteria)
            {
                case 'ASC':
                    $products = ($orderField != 'Price') ? $products->orderBy($orderField, Criteria::ASC) : 
                        $products->leftJoin('ProductVariant')->orderBy('ProductVariant.Price', Criteria::ASC);
                    $nextOrderCriteria = 'DESC'; 
                break;
                
                case 'DESC':
                    $products = ($orderField != 'Price') ? $products->orderBy($orderField, Criteria::DESC) : 
                        $products->leftJoin('ProductVariant')->orderBy('ProductVariant.Price', Criteria::DESC);
                    $nextOrderCriteria = 'ASC';
                break;
            }
        
        $products = $products->find();
                
        
        $products->populateRelation('ProductVariant');

        // Create pagination
        $this->load->library('pagination');
        $config['base_url'] = $this->createUrl('products/index/', array('catId'=>$model->getId()));
        $config['container'] = 'shopAdminPage';
        $config['uri_segment'] = 8;
        $config['total_rows'] = $totalProducts;
        $config['per_page'] = $this->per_page;
        $config['suffix'] = ($orderField != '') ? $orderField . '/' . $orderCriteria : '';
        $this->pagination->num_links = 6;
        $this->pagination->initialize($config);
      
        $this->render('list', array(
            'model'=>$model,
            'products'=>$products,
            'totalProducts'=>$totalProducts,
            'pagination'=>$this->pagination->create_links_ajax(),
            'category'=>SCategoryQuery::create()->findPk((int) $categoryID),
            'nextOrderCriteria'=>$nextOrderCriteria,
            'orderField'=>$orderField,
        ));
    }

    /**
     * Create new product, upload and resize images.
     * 
     * @access public
     */
    public function create()
    {
        $model = new SProducts;

        if (!empty($_POST))
        {
            $this->form_validation->set_rules($model->rules());
            $this->form_validation->set_rules('Created', 'Дата создания', 'required|valid_date');
		    
            if ($this->form_validation->run($this) == FALSE)
            {
                echo json_encode(array('error'=>validation_errors(' ', ' ')));
            }
            else
            {
                if ($_POST['Url'])
                {
                    // Check if Url is aviable.
                    $urlCheck = SProductsQuery::create()
                        ->where('SProducts.Url = ?', (string) $_POST['Url'])
                        ->findOne();

                    if ($urlCheck !== null)
                    {
                        echo json_encode(array('error'=>'Указанный URL занят'));
                        exit;
                    }
                }
                
                if ($_POST['Created'])
                    $_POST['Created'] = strtotime($_POST['Created']);
                
                $_POST['Updated'] = time();
                $model->fromArray($_POST);
               
                // Add main category relation
                $categoryModel = SCategoryQuery::create()->findPk($model->getCategoryId());
                if ($categoryModel)
                    $model->addCategory($categoryModel);

                // Assign product categories
                if (sizeof($_POST['Categories']) > 0 && is_array($_POST['Categories']))
                {
                    // Get selected categories
                    $criteria = new Criteria();
                    $criteria->add(SCategoryPeer::ID, $_POST['Categories'], Criteria::IN);
                    $categoriesModel = SCategoryPeer::doSelect($criteria);

                    foreach ($categoriesModel as $category)
                    {
                        if ($category->getId() != $model->getCategoryId())
                            $model->addCategory($category);
                    }
                }
                
                $this->_process_warehouses($model);
                $model->save();

                if ($model->getUrl() == '')
                {
                    $model->setUrl($model->getId());
                    $model->save();
                }

                $this->_insert_variants($model->getId());
               
                if (sizeof($_POST['productProperties']) > 0)
                {
                    foreach ($_POST['productProperties'] as $key => $value)
                    {
                        if ($value && $value != ShopCore::app()->SPropertiesRenderer->noValueText)
                        {
                            $pData = new SProductPropertiesData;
                            $pData->setProductId($model->getId());
                            $pData->setPropertyId($key);
                            $pData->setValue($value);

                            $model->addSProductPropertiesData($pData);
                        }
                    }

                    $model->save();
                }

                $this->load->library('image_lib');

                // Resize image.
                if (!empty($_FILES['mainPhoto']['tmp_name']) && $this->_isAllowedExtension($_FILES['mainPhoto']['name']) === true)
                {
                    $imageSizes = $this->getImageSize($_FILES['mainPhoto']['tmp_name']);

                    if ($imageSizes['width'] > $this->imageSizes['mainImageWidth'] && $imageSizes['height'] > $this->imageSizes['mainImageHeight'])
                    {
                        $config['image_library'] = 'gd2';
                        $config['source_image']	= $_FILES['mainPhoto']['tmp_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']	 = $this->imageSizes['mainImageWidth'];
                        $config['height']	 = $this->imageSizes['mainImageHeight'];
                        $config['new_image'] = ShopCore::$imagesUploadPath.$model->getId().'_main.jpg';
                        $config['quality'] = $this->imageQuality;

                        $this->image_lib->initialize($config); 

                        if ($this->image_lib->resize())
                        {
                            $mainImageResized = true;
                            $model->setMainImage($model->getId().'_main.jpg');
                        }
                    }
                    else
                    {
                        move_uploaded_file($_FILES['mainPhoto']['tmp_name'], ShopCore::$imagesUploadPath.$model->getId().'_main.jpg');
                        $mainImageResized = true;
                        $model->setMainImage($model->getId().'_main.jpg');
                    }
                }

                // Image Resized. 
                // Create small image.
                if (empty($_FILES['smallPhoto']['tmp_name']) && $_POST['autoCreateSmallImage'] == 1 && $mainImageResized === true)
                    $smallImageSource = ShopCore::$imagesUploadPath.$model->getId().'_main.jpg';
                elseif(!empty($_FILES['smallPhoto']['tmp_name']) && $this->_isAllowedExtension($_FILES['smallPhoto']['name']) === true)
                    $smallImageSource = $_FILES['smallPhoto']['tmp_name']; 
                else
                    $smallImageSource = false;
                
                if ($smallImageSource != false)
                {
                    $this->image_lib->clear();
                    $config['image_library'] = 'gd2';
                    $config['source_image']	= $smallImageSource;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']	 = $this->imageSizes['smallImageWidth'];
                    $config['height']	 = $this->imageSizes['smallImageHeight'];
                    $config['new_image'] = ShopCore::$imagesUploadPath.$model->getId().'_small.jpg';
                    $config['quality'] = $this->imageQuality;

                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $model->setSmallImage($model->getId().'_small.jpg');
                }

                $model->save();

                $model = $this->saveAdditionalImages($model);
                $model->save();

                if ($_POST['_add'])
                    $redirect_url = 'products/index/' . $model->getCategoryId();

                if ($_POST['_create'])
                    $redirect_url = 'products/create';

                if ($_POST['_edit'])
                    $redirect_url = 'products/edit/' . $model->getId();


                echo json_encode(array(
                    'ok'=>true,
                    'redirect_url'=>$redirect_url,
                ));  
    		} 
        }
        else
        {
            $this->render('create',array(
                'model'=>$model,
                'categories'=>ShopCore::app()->SCategoryTree->getTree(),
                'cur_date'  =>date('Y-m-d H:i:s'),
                'warehouses'=>SWarehousesQuery::create()->orderByName()->find(), 
            ));
        }
    }

    /**
     * Edit product
     *
     * @access public
     */
    public function edit($productId)
    {
        // Select product with variants.
        $model = SProductsQuery::create()
            ->useProductVariantQuery()
                ->orderByPosition()
            ->endUse()
            ->leftJoinWith('ProductVariant')
            ->findPk((int) $productId);

        if ($model === null)
            $this->error404('Товар не найден.');

        if (!empty($_POST))
        {
            $this->form_validation->set_rules($model->rules());
            $this->form_validation->set_rules('Created', 'Дата создания', 'required|valid_date');
             
            if ($this->form_validation->run($this) == FALSE)
            {
                echo json_encode(array('error'=>validation_errors(' ', ' ')));
            }
            else
            {
                if ($_POST['deleteMainImage'] == 1)
                {
                    @unlink(ShopCore::$imagesUploadPath.$model->getMainImage()); 
                    $model->setMainImage(false);
                }

                if ($_POST['deleteSmallImage'] == 1)
                {
                    @unlink(ShopCore::$imagesUploadPath.$model->getSmallImage()); 
                    $model->setSmallImage(false);
                }

                if ($_POST['Url'])
                {
                    // Check if Url is aviable.
                    $urlCheck = SProductsQuery::create()
                        ->where('SProducts.Id != ?', $model->getId())
                        ->where('SProducts.Url = ?', (string) $_POST['Url'])
                        ->findOne();

                    if ($urlCheck !== null)
                    {
                        echo json_encode(array('error'=>'Указанный URL занят'));
                        exit;
                    }
                }

                if (!$_POST['Hit'])
                    $_POST['Hit'] = null;

                if (!$_POST['Active'])
                    $_POST['Active'] = null;
					
		        if (!$_POST['Hot'])
                    $_POST['Hot'] = null;

                if (!$_POST['Action'])
                    $_POST['Action'] = null;
					
                if ($_POST['Created'])
                    $_POST['Created'] = strtotime($_POST['Created']);

                $_POST['Updated'] = time(); 
                $model->fromArray($_POST);
     
                // Clear product category relations.
                ShopProductCategoriesQuery::create()
                    ->filterByProductId($model->getId())
                    ->delete();

                // Add main category relation
                $categoryModel = SCategoryQuery::create()->findPk($model->getCategoryId());
                if ($categoryModel)
                    $model->addCategory($categoryModel);

                // Assign product categories
                if (sizeof($_POST['Categories']) > 0 && is_array($_POST['Categories']))
                {
                    // Get selected categories
                    $criteria = new Criteria();
                    $criteria->add(SCategoryPeer::ID, $_POST['Categories'], Criteria::IN);
                    $categoriesModel = SCategoryPeer::doSelect($criteria);

                    foreach ($categoriesModel as $category)
                    {
                        if ($category->getId() != $model->getCategoryId())
                            $model->addCategory($category);
                    }
                }

                if ($model->getUrl() == '')
                    $model->setUrl($model->getId());

                                
                $this->_process_warehouses($model);
                $model->save();

                $this->_insert_variants($model->getId());
               
                // Add product properties
                SProductPropertiesDataQuery::create()
                    ->filterByProductId($model->getId())
                    ->delete();

                if (sizeof($_POST['productProperties']) > 0)
                {
                    foreach ($_POST['productProperties'] as $key => $value)
                    {
                        if ($value && $value != ShopCore::app()->SPropertiesRenderer->noValueText)
                        {
                            $pData = new SProductPropertiesData;
                            $pData->setProductId($model->getId());
                            $pData->setPropertyId($key);
                            $pData->setValue($value);

                            $model->addSProductPropertiesData($pData);
                        }
                    }

                    $model->save();
                }

                $this->load->library('image_lib');

                // Resize images.
                if (!empty($_FILES['mainPhoto']['tmp_name']) && $this->_isAllowedExtension($_FILES['mainPhoto']['name']) === true)
                {
                    if (file_exists(ShopCore::$imagesUploadPath.$model->getId().'_main.jpg'))
                        unlink(ShopCore::$imagesUploadPath.$model->getId().'_main.jpg');
                    
                    $imageSizes = $this->getImageSize($_FILES['mainPhoto']['tmp_name']);

                    if ($imageSizes['width'] > $this->imageSizes['mainImageWidth'] && $imageSizes['height'] > $this->imageSizes['mainImageHeight'])
                    {
                        $config['image_library'] = 'gd2';
                        $config['source_image']	= $_FILES['mainPhoto']['tmp_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']	 = $this->imageSizes['mainImageWidth'];
                        $config['height']	 = $this->imageSizes['mainImageHeight'];
                        $config['new_image'] = ShopCore::$imagesUploadPath.$model->getId().'_main.jpg';
                        $config['quality'] = $this->imageQuality;

                        $this->image_lib->initialize($config);

                        if ($this->image_lib->resize())
                        {
                            $mainImageResized = true;
                            $model->setMainImage($model->getId().'_main.jpg');
                        }
                    }
                    else
                    {
                        move_uploaded_file($_FILES['mainPhoto']['tmp_name'], ShopCore::$imagesUploadPath.$model->getId().'_main.jpg');
                        $mainImageResized = true;
                        $model->setMainImage($model->getId().'_main.jpg');
                    }
                }

                // Image Resized. 
                // Create small image.
                if (empty($_FILES['smallPhoto']['tmp_name']) && $_POST['autoCreateSmallImage'] == 1 && $mainImageResized === true)
                    $smallImageSource = ShopCore::$imagesUploadPath.$model->getId().'_main.jpg';
                elseif(!empty($_FILES['smallPhoto']['tmp_name']) && $this->_isAllowedExtension($_FILES['smallPhoto']['name']) === true)
                    $smallImageSource = $_FILES['smallPhoto']['tmp_name']; 
                else
                    $smallImageSource = false;
                
                if ($smallImageSource != false)
                {
                    if (file_exists(ShopCore::$imagesUploadPath.$model->getId().'_small.jpg'))
                        unlink(ShopCore::$imagesUploadPath.$model->getId().'_small.jpg');

                    $this->image_lib->clear();
                    $config['image_library'] = 'gd2';
                    $config['source_image']	= $smallImageSource;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']	 = $this->imageSizes['smallImageWidth'];
                    $config['height']	 = $this->imageSizes['smallImageHeight'];
                    $config['new_image'] = ShopCore::$imagesUploadPath.$model->getId().'_small.jpg';
                    $config['quality'] = $this->imageQuality;

                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $model->setSmallImage($model->getId().'_small.jpg');
                }

                $model->save();

                $model = $this->saveAdditionalImages($model);
                $model->save();

                if ($_POST['_add'])
                {
                    if (!$_POST['redirect'])
                        $redirect_url = 'products/index/' . $model->getCategoryId();
                    else
                    {
                        $redirect_url = str_replace("admin/components/run/shop/","", base64_decode($_POST['redirect']));
                    }
                }

                if ($_POST['_create'])
                    $redirect_url = 'products/create';

                if ($_POST['_edit'])
                    $redirect_url = 'products/edit/' . $model->getId();

                echo json_encode(array(
                    'ok'=>true,
                    'redirect_url'=>$redirect_url,
                ));
    		}
        }
        else
        {
            // Create array from ids of additional product categories.
            $productCategories = array();
            foreach ($model->getCategorys() as $productCategory)
                array_push($productCategories, $productCategory->getId());
            
    
            $additionalImagePositions = array();

            foreach($model->getSProductImagess() as $addImage)
            {
                $additionalImagePositions[$addImage->getPosition()] = $addImage;
            }

            $this->render('edit', array(
                'model'=>$model,
                'categories'=>ShopCore::app()->SCategoryTree->getTree(),
                'productCategories'=>$productCategories,
                'additionalImagePositions'=>$additionalImagePositions,
                'warehouses'=>SWarehousesQuery::create()->orderByName()->find(),
            ));
        }
    }

    protected function _process_warehouses($model)
    {
        // Process warehouses
        SWarehouseDataQuery::create()
            ->filterByProductId($model->getId())
            ->delete();

        if (sizeof($_POST['warehouses']) > 0)
        {
            foreach ($_POST['warehouses'] as $key=>$val)
            {
                if ((int) $_POST['warehouses_c'][$key] > 0 && $val > 0)
                {
                    // Add warehouse data
                    $wData = new SWarehouseData();
                    $wData->setCount($_POST['warehouses_c'][$key]);
                    $wData->setWarehouseId($val);
                    $wData->setProductId($model->getId());
                    $model->addSWarehouseData($wData);
                }
            }
        }        
    }

    /**
     * Resize and save additional images.
     * 
     * @param integer $productId Product Id
     * @access public
     */
    public function saveAdditionalImages(SProducts $model)
    {
        // Check if we have to delete some images
        if (sizeof($_POST['imagesForDelete']) > 0)
        {
            foreach ($_POST['imagesForDelete'] as $key=>$pos)
            { 
                SProductImagesQuery::create()
                    ->filterByProductId($model->getId())
                    ->filterByPosition($pos)
                    ->delete();

                @unlink(ShopCore::$imagesUploadPath.$model->getId()."_$pos.jpg");
            }
        }

        $this->load->library('image_lib');

        $i=-2;
        foreach ($_FILES as $key=>$file)
        {
            if (strstr($key,'additionalImage_') && $this->_isAllowedExtension($file['name']))
            {
                $productId = $model->getId();
                $fileName = ShopCore::$imagesUploadPath.$productId."_$i.jpg";

                $imgSizes = $this->getImageSize($file['tmp_name']);

                if ($imgSizes['width'] > $this->imageSizes['maxImageWidth'] && $imgSizes['height'] > $this->imageSizes['maxImageHeight'])
                {
                    $this->image_lib->clear();
                    $config['image_library'] = 'gd2';
                    $config['source_image']	= $file['tmp_name'];
                    $config['create_thumb'] = false;
                    $config['maintain_ratio'] = true;
                    $config['width']	 = $this->imageSizes['maxImageWidth'];
                    $config['height']	 = $this->imageSizes['maxImageHeight'];
                    $config['new_image'] = $fileName;
                    $config['quality'] = $this->imageQuality;

                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                }
                else
                {
                    move_uploaded_file($file['tmp_name'], $fileName);
                }

                SProductImagesQuery::create()
                    ->filterByProductId($model->getId())
                    ->filterByImageName($productId."_$i.jpg")
                    ->delete();

                $newImage = new SProductImages;
                $newImage->setImageName($productId."_$i.jpg");
                $newImage->setPosition($i);
                $model->addSProductImages($newImage); 
            }
            
            $i++;
        }

        return $model;
    }

    /**
     * Delete product
     * 
     * @access public
     */
    public function delete()
    {
        $model = SProductsQuery::create()->findPk((int) $_POST['productId']);

        if ($model!==null)
            $model->delete();
    }

    /**
     * Insert product variants from $_POST data.
     * 
     * @param integer $productId 
     * @access protected
     */
    protected function _insert_variants($productId)
    {
        // Insert product variants
        if (!empty($_POST['variants']))
        { 
            $totalVariants = sizeof($_POST['variants']['Name']);
            $variants = array_fill(0,$totalVariants,array());
            $keepById = array();

            foreach($_POST['variants'] as $key=>$values)
            {
                for($i=0;$i<sizeof($values);$i++)
                {
                    $variants[$i][$key] = $values[$i];
                }
            }

            $i =0;
            foreach($variants as $variant)
            {
                // Add variants with Name and Price filled.
                if ($variant['Price'] != '' && is_numeric($variant['Price']))
                {
                    if (isset($variant['CurrentId']) && $variant['CurrentId'] > 0)
                    {
                        $productVariant = SProductVariantsQuery::create()
                            ->where('SProductVariants.ProductId = ?', $productId) 
                            ->where('SProductVariants.Id = ?', $variant['CurrentId']) 
                            ->findOne();
                    }
                    else
                    {
                        $productVariant = new SProductVariants;
                    }
                    
                    $productVariant->fromArray($variant);
                    $productVariant->setPosition($i);
                    $productVariant->setProductId($productId);
                    $productVariant->save();

                    $keepById[] = $productVariant->getId();
                    $i++;
                }
            }
        }

        // Delete variants
        if (sizeof($keepById) > 0)
        {
            SProductVariantsQuery::create()
                ->where('SProductVariants.ProductId = ?', $productId) 
                ->where('SProductVariants.Id NOT IN ?', $keepById) 
                ->delete();
        }else{
            SProductVariantsQuery::create()
                ->where('SProductVariants.ProductId = ?', $productId)
                ->delete();
        }
    }

    /**
     * Check if file has allowed extension
     * 
     * @param string $fileName 
     * @access protected
     * @return bool
     */
    protected function _isAllowedExtension($fileName)
    {
        $parts = explode('.', $fileName);
        $ext = strtolower(end($parts));

        if (in_array($ext, $this->allowedImageExtensions))
            return true;
        else
            return false;
    }

    /**
     * Get image width and height.
     * 
     * @param string $file_path Full path to image
     * @access protected
     * @return mixed
     */
    protected function getImageSize($file_path)
    {
		if (function_exists('getimagesize') && file_exists($file_path))
		{
			$image = @getimagesize($file_path);

            $size = array(
                'width'  => $image[0],
                'height' => $image[1],
                );

			return $size;
        }

        return false;
    }

    public function ajaxChangeActive($productId = null)
    {
        $model = SProductsQuery::create()
                ->findPk($productId);

        if ($model !== null)
        {
            $model->setActive(!$model->getActive());
            $model->save();
        }

        if (sizeof($_POST['ids'] > 0))
        {
            $model = SProductsQuery::create()
                    ->findPks($_POST['ids']);

            if (!empty($model))
            {
                foreach($model as $product)
                {
                    $product->setActive(!$product->getActive());
                    $product->save();
                }
            }
        }
    }

    public function ajaxChangeHit($productId = null)
    {
        $model = SProductsQuery::create()
                ->findPk($productId);

        if ($model !== null)
        {
            $model->setHit(!$model->getHit());
            $model->save();
        }

        if (sizeof($_POST['ids'] > 0))
        {
            $model = SProductsQuery::create()
                    ->findPks($_POST['ids']);

            if (!empty($model))
            {
                foreach($model as $product)
                {
                    $product->setHit(!$product->getHit());
                    $product->save();
                }
            }
        }
    }

	public function ajaxChangeHot($productId = null)
    {
        $model = SProductsQuery::create()
                ->findPk($productId);

        if ($model !== null)
        {
            $model->setHot(!$model->getHot());
            $model->save();
        }

        if (sizeof($_POST['ids'] > 0))
        {
            $model = SProductsQuery::create()
                    ->findPks($_POST['ids']);

            if (!empty($model))
            {
                foreach($model as $product)
                {
                    $product->setHot(!$product->getHot());
                    $product->save();
                }
            }
        }
    }

	public function ajaxChangeAction($productId = null)
    {
        $model = SProductsQuery::create()
                ->findPk($productId);

        if ($model !== null)
        {
            $model->setAction(!$model->getAction());
            $model->save();
        }

        if (sizeof($_POST['ids'] > 0))
        {
            $model = SProductsQuery::create()
                    ->findPks($_POST['ids']);

            if (!empty($model))
            {
                foreach($model as $product)
                {
                    $product->setAction(!$product->getAction());
                    $product->save();
                }
            }
        }
    }
	
	public function ajaxCloneProducts()
	{
		//TODO: clone images
		if (sizeof($_POST['ids']))
		{
			$products = SProductsQuery::create()->findPks($_POST['ids']);
			foreach($products as $p)
			{
				$cloned = $p->copy();
				$cloned->setName($cloned->getName() . ' (копия)');
				$cloned->setUpdated(time());
				$cloned->setMainImage('');
				$cloned->setSmallImage('');
				$cloned->save();
				$cloned->setUrl($cloned->getId());
				$cloned->save();

				// Clone product variants
				$variants = SProductVariantsQuery::create()
					->filterByProductId($p->getId())
					->find();
				
				foreach ($variants as $v)
				{
					$variantClone = $v->copy();
					$variantClone->setProductId($cloned->getId());
					$variantClone->save();
				}

				// Clone category relations
				$cats = ShopProductCategoriesQuery::create()
					->filterByProductId($p->getId())
					->find();

				foreach($cats as $catClone)
				{
					$catClone = $catClone->copy();
					$catClone->setProductId($cloned->getId());
					$catClone->save();
				}

				// Clone properties
                $props = SProductPropertiesDataQuery::create()
                    ->filterByProductId($p->getId())
					->find();

				if ($props->count() > 0)
				{
					foreach($props as $prop)
					{
						$propClone = new SProductPropertiesData;
                        $propClone->setProductId($cloned->getId());
                        $propClone->setPropertyId($prop->getPropertyId());
                        $propClone->setValue($prop->getValue());

                        $cloned->addSProductPropertiesData($propClone);
					}
				}

				$cloned->save();

				// Clone main/small image
				if ($p->getMainImage())
				{
					$source_file = ShopCore::$imagesUploadPath.$p->getMainImage(); 
					if (file_exists($source_file))
					{
						copy($source_file, ShopCore::$imagesUploadPath.$cloned->getId().'_main.jpg');
						$cloned->setMainImage($cloned->getId().'_main.jpg');
					}
				}

				if ($p->getSmallImage())
				{
					$source_file = ShopCore::$imagesUploadPath.$p->getSmallImage(); 
					if (file_exists($source_file))
					{
						copy($source_file, ShopCore::$imagesUploadPath.$cloned->getId().'_small.jpg');
						$cloned->setSmallImage($cloned->getId().'_small.jpg');
					}
				}

				$cloned->save();
			}
		}
	}

    public function ajaxDeleteProducts()
    {
        if (sizeof($_POST['ids'] > 0))
        {
            $model = SProductsQuery::create()
                    ->findPks($_POST['ids']);

            if (!empty($model))
            {
                foreach($model as $product)
                {
                    $product->delete();
                }
            }
        }
    }

    public function ajaxMoveWindow($categoryId)
    {
        $this->render('_moveWindow',array(
            'categories'=>ShopCore::app()->SCategoryTree->getTree(),
			'categoryId'=>$categoryId,
        ));
    }

    public function ajaxMoveProducts()
    {
        $newCategoryModel = SCategoryQuery::create()
                ->findPk($_POST['categoryId']);

        $products = SProductsQuery::create()
                ->findPks($_POST['ids']);

        if ($newCategoryModel !== null && !empty($products))
        {
            foreach($products as $product)
            {
                // Delete main category relation
                ShopProductCategoriesQuery::create()
                        ->filterByProductId($product->getId())
                        ->filterByCategoryId($product->getCategoryId())
                        ->delete();

                // Add new main category relation
                $product->setCategoryId($newCategoryModel->getId());
                $product->addCategory($newCategoryModel);
                $product->save();
            }
        }
    }
}
