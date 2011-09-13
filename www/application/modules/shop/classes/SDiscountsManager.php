<?php
/**
 * Load and prepare shop discounts
 *
 * Date: 12.01.2011
 * Time: 12:12:21
 * author: dev@imagecms.net
 */
 
class SDiscountsManager {

    public $discounts = array();

    public function __construct()
    {
        // Load active discounts
        $timeNow = time();

        $discounts = ShopDiscountsQuery::create()
                ->filterByActive(true)
                ->where('ShopDiscounts.DateStart <= ?', $timeNow)
                ->where('ShopDiscounts.DateStop >= ?', $timeNow)
                ->find();

        if ($discounts->count() > 0)
        {
            foreach ($discounts as $d)
            {
                // Create categories array
                $categoriesArray = unserialize($d->getCategories());
                if (!is_array($categoriesArray)) $categoriesArray = array();

                // Check what to type of discount to use
                if( strpos($d->getDiscount(), '%') === false)
                    $d->setVirtualColumn('UsePercentage', false);
                else
                    $d->setVirtualColumn('UsePercentage', true);

                $d->setDiscount(str_replace('%','',$d->getDiscount()));

                // Create products array
                $productIds = array();
                if ($d->getProducts() != '')
                {
                    $productIds = explode(',', $d->getProducts());
                    if (!is_array($productIds))
                        $productIds = array();

                    $productIds = array_map('trim',$productIds);
                }

                $d->setVirtualColumn('ProductsArray', $productIds);

                $d->setVirtualColumn('CategoriesArray', $categoriesArray);
                $this->discounts[$d->getId()] = $d;
            }
        }
    }

    public function getActive()
    {
        return $this->discounts;
    }
}
