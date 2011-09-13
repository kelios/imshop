<?php
/**
 * Skeleton subclass for representing a row from the 'shop_products' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class SProducts extends BaseSProducts {

    public $relatedProductsCache = null;
    public $variantsCache = null;
    public $appliedDiscounts = array();

	public function attributeLabels()
	{
		return array(
			'Name'=>ShopCore::t('Название'),
			'Url'=>ShopCore::t('URL'),
			'Price'=>ShopCore::t('Цена'),
			'Number'=>ShopCore::t('Артикул'),
			'ShortDescription'=>ShopCore::t('Краткое Описание'),
			'FullDescription'=>ShopCore::t('Полное Описание'),
			'MetaTitle'=>ShopCore::t('Meta Title'),
			'MetaDescription'=>ShopCore::t('Meta Description'),
			'MetaKeywords'=>ShopCore::t('Meta Keywords'),
			'Categories'=>ShopCore::t('Дополнительные Категории'),
			'CategoryId'=>ShopCore::t('Категория'),
			'Active'=>ShopCore::t('Активен'),
			'Hit'=>ShopCore::t('Хит'),
			'Hot'=>ShopCore::t('Новинка'),
			'Action'=>ShopCore::t('Акция'),
			'Brand'=>ShopCore::t('Бренд'),
			'Stock'=>ShopCore::t('Количество'),
			'RelatedProducts'=>ShopCore::t('Связанные товары'),
		);
	}

    public function rules()
    {
        return array(
           array(
                 'field'=>'Name',
                 'label'=>'Название товара',
                 'rules'=>'required',
              ),
           array(
                 'field'=>'variants[Price][]',
                 'label'=>$this->getLabel('Price'),
                 'rules'=>'required|numeric',
              ),
           array(
                 'field'=>'Url',
                 'label'=>$this->getLabel('Url'),
                 'rules'=>'alpha_dash',
              ),
           array(
                 'field'=>'CategoryId',
                 'label'=>$this->getLabel('CategoryId'),
                 'rules'=>'required|integer',
              ),
        );
    }

    /**
     * Get discount string
     * Returns sum fom discount "10 $" or "10%"
     *
     * @return boolean|string
     */
    public function getDiscountString()
    {
        if ($this->hasDiscounts())
        {
            if ($this->appliedDiscounts[0]->getUsePercentage() === true)
                return $this->appliedDiscounts[0]->getDiscount().'%';
            else
                return ShopCore::app()->SCurrencyHelper->convert($this->appliedDiscounts[0]->getDiscount()).' '.
                       ShopCore::app()->SCurrencyHelper->getSymbol();
        }else{
            return false;
        }
    }

    public function postDelete()
    {
        // Delete product category relations
        ShopProductCategoriesQuery::create()
            ->filterByProductId($this->getId())
            ->delete();

        // Delete product variants
        SProductVariantsQuery::create()
            ->filterByProductId($this->getId())
            ->delete();

        return true;
    }

    public function preDelete()
    {
        // Delete images
        if (file_exists(ShopCore::$imagesUploadPath.$this->getMainImage()))
        {
            @unlink(ShopCore::$imagesUploadPath.$this->getMainImage());
        }

        if (file_exists(ShopCore::$imagesUploadPath.$this->getSmallImage()))
        {
            @unlink(ShopCore::$imagesUploadPath.$this->getSmallImage());
        }

        if (sizeof($this->getSProductImagess()) > 0)
        {
            foreach ($this->getSProductImagess() as $image)
            {
                if (file_exists(ShopCore::$imagesUploadPath.$image->getImageName()))
                {
                    @unlink(ShopCore::$imagesUploadPath.$image->getImageName());
                }
            }
        }

        return true;
    }

    /**
     * Get first product variant.
     *
     * @return array|PropelCollection|SProductVariants
     */
    public function getFirstVariant()
    {
        $variants = $this->getProductVariants();

        if (sizeof($variants) > 0)
            return $variants[0];
        else
            return $variants;
    }

    /**
     * Load product variants and apply discounts
     *
     * @param  $criteria
     * @param PropelPDO $con
     * @return array|PropelCollection
     */
    public function getProductVariants($criteria = null, PropelPDO $con = null)
    {
        if ($this->variantsCache === null)
            $variants = parent::getProductVariants($criteria, $con);
        else
            return $this->variantsCache;

        if (ShopCore::$SHOP_APPLY_DISCOUNTS === true && $variants->count() > 0)
        {
            foreach (ShopCore::app()->SDiscountsManager->getActive() as $discount)
            {
                // Apply only one discount
                if (!$this->hasDiscounts())
                {
                    foreach($variants as $variant)
                    {
                        // Save original price
                        $variant->setVirtualColumn('origPrice', $variant->getPrice());

                        // Check min and max prices
                        if ($discount->getMinPrice() > 0 && !($variant->getPrice() <= $discount->getMinPrice()))
                            continue;
                        if ($discount->getMaxPrice() > 0 && !($variant->getPrice() >= $discount->getMaxPrice()))
                            continue;

                        // Check CategoryID
                        if (!in_array($this->getCategoryId(), $discount->getCategoriesArray()))
                        {
                            // Check productID string
                            if (!in_array($this->getId(), $discount->getProductsArray()))
                                continue;
                        }

                        if (sizeof($discount->getGroupsArray()) > 0)
                        {
                            $auth = ShopCore::$ci->dx_auth->is_logged_in();
                            $role_name = ShopCore::$ci->dx_auth->get_role_name();

                            if ($auth == false)
                                continue;
                            
                            if (!in_array($role_name, $discount->getGroupsArray()))
                                continue;
                        }

                        // Apply discount
                        if ($discount->getUsePercentage() === true)
						{
                            $price = $variant->getPrice() - ($variant->getPrice() / 100 * $discount->getDiscount());
							$variant->setVirtualColumn('economy', $variant->getPrice() / 100 * $discount->getDiscount());
						}
                        else
						{
                            $price = $variant->getPrice() - $discount->getDiscount();
							$variant->setVirtualColumn('economy', $discount->getDiscount());
						}

                        $variant->setPrice($price); 
                        $this->appliedDiscounts[0] = $discount;
                    }
                }
            }
        }

        $this->variantsCache = $variants;
        return $variants;
    }

    public function getRating()
    {
        $rating = SProductsRatingQuery::create()->findPk($this->getId());
        if ($rating !== null)
            $rating = round($rating->getRating() / $rating->getVotes());
        else
            $rating=0;

        return $rating;
    }

    /**
     * Check if product has applied discounts
     *
     * @return bool
     */
    public function hasDiscounts()
    {
        if (sizeof($this->appliedDiscounts) > 0)
            return true;
        else
            return false;
    }

    public function countProperties()
    {
        $cr = new Criteria();
        $cr->add(SPropertiesPeer::ACTIVE, TRUE, Criteria::EQUAL);
        $cr->add(SPropertiesPeer::SHOW_ON_SITE, TRUE, Criteria::EQUAL);
        return $this->getSProductPropertiesDatasJoinSProperties($cr)->count();
    }
	
	public function totalComments()
	{
		$ci =& get_instance();
        
        $ci->db->select('*');
		$ci->db->where('item_id = ', $this->getId());
		$ci->db->where('module = ', 'shop');
        $query = $ci->db->get('comments');
		
		if ($query->num_rows() > 0)
        {
            return $query->num_rows();
        }

        return 0;
	}

    /**
     * Get related products list.
     *
     * @param int $limit
     * @return array|bool|mixed|PropelObjectCollection
     */
    public function getRelatedProductsModels($limit = 5)
    {
        if ($this->relatedProductsCache !== null)
            return $this->relatedProductsCache;

        $ids = explode(',',$this->getRelatedProducts());
        $ids = array_map('trim',$ids);

        if (is_array($ids) && count($ids) > 0)
        {
            $models = SProductsQuery::create()
                    ->orderByCreated(Criteria::DESC)
                    ->findPks($ids);

            if (sizeof($models) > 0)
            {
                $this->relatedProductsCache = $models;
                return $models;
            }
        }

        $this->relatedProductsCache = false;
        return false;
    }
	
	/**
     * Get sample hits list from the same category as current product.
     *
     * @param int $limit
     * @return array|bool|mixed|PropelObjectCollection
     */
	public function getSampleHitsModels($limit = 5)
	{        
            $models = SProductsQuery::create()
                    ->orderByCreated(Criteria::DESC)
					->where('SProducts.Id NOT IN ?', $this->getId())
					->filterByHit(1)
					->filterByCategoryId($this->getCategoryId())
					->limit($limit)
                    ->find();
					
            if (sizeof($models) > 0)
            {
				return $models;
            }

        return false;
	}
	
	/**
     * Get sample new products list from the same category as current product.
     *
     * @param int $limit
     * @return array|bool|mixed|PropelObjectCollection
     */
	public function getSampleNewestModels($limit = 6)
	{
            $models = SProductsQuery::create()
                    ->orderByCreated(Criteria::DESC)
					->where('SProducts.Id NOT IN ?', $this->getId())
					->filterByCategoryId($this->getCategoryId())
					->filterByHot(1)
					->limit($limit)
                    ->find();
					
            if (sizeof($models) > 0)
            {
				return $models;
            }

        return false;
	}
	
	/**
     * Get products list from the same category as current product.
     *
     * @param int $limit
     * @return array|bool|mixed|PropelObjectCollection
     */
	public function getSameBrandCategoryProductsModels($limit = 6)
	{
            $models = SProductsQuery::create()
                    ->orderByCreated(Criteria::DESC)
					->where('SProducts.Id NOT IN ?', $this->getId())
					->filterByCategoryId($this->getCategoryId())
					->filterByBrandId($this->getBrandId())
					->limit($limit)
                    ->find();
					
            if (sizeof($models) > 0)
            {
				return $models;
            }

        return false;
	}

	/**
     * Get products list from the same category with a similar price as current product.
     *
     * @param int $limit
     * @return array|bool|mixed|PropelObjectCollection
     */
	public function getSimilarPriceProductsModels($limit = 6, $price_percent = 20)
	{
            if (($price_percent <=100) and ($price_percent >=0))
			{
				$price_percent *= 0.01; 
			}
			else
			{
				$price_percent = 0.2;
			}
			
			$low_similar  = $this->firstVariant->getPrice() - $this->firstVariant->getPrice() * $price_percent;
			$high_similar = $this->firstVariant->getPrice() + $this->firstVariant->getPrice() * $price_percent;
			
			$models = SProductsQuery::create()
					->leftJoin('ProductVariant')
					->distinct('ProductId')
					->filterByCategoryId($this->getCategoryId())
					->where('SProducts.Id NOT IN ?', $this->getId())
					->where('ProductVariant.Price >= ?', $low_similar)
					->where('ProductVariant.Price <= ?', $high_similar)
					->orderByCreated(Criteria::DESC)
					->limit($limit)
                    ->find();
					
            if (sizeof($models) > 0)
            {
				return $models;
            }

        return false;
	}
} // SProducts
