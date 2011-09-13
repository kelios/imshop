<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Shop Controller
 * 
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net> 
 */
class Shop extends ShopController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display shop main page
     */
    public function index()
    {
        $this->core->set_meta_tags('Главная');

        $this->render('start_page', array(
            'hits'=>$this->_getHits(6),
            'newest'=>$this->_getNew(6),
        ));
    }

    
    /**
     * Get product marked as "Hit"
     *
     * @param int $limit
     * @return array|mixed|PropelObjectCollection
     */
    public function _getHits($limit = 10)
    {
        return  SProductsQuery::create()
                ->orderByCreated('DESC')
                ->filterByHit(true)
                ->filterByActive(true)
                ->limit(6)
                ->find();
    }

    /**
     * Get latest created products
     *
     * @param int $limit
     * @return array|mixed|PropelObjectCollection
     */
    public function _getNew($limit = 10)
    {
        return SProductsQuery::create()
                ->orderByCreated('DESC')
                ->filterByActive(true)
                ->limit(6)
                ->find();
    }
}

/* End of file shop.php */
