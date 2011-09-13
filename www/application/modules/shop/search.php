<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Search Controller
 *
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net> 
 */
class Search extends ShopController {

    protected $perPage = 10;

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('string');

        // Load per page param
        $this->perPage = ShopCore::app()->SSettings->frontProductsPerPage;

        $this->load->module('core');
        $this->core->set_meta_tags(ShopCore::t('Поиск'));

        $this->index();
        exit;
	}

    /**
     * Display products list.
     * 
     * @access public
     */
	public function index()
	{
        // Start search from one char.
        if (mb_strlen(ShopCore::$_GET['text']) >= 1)
        {
            $products = SProductsQuery::create()
                    ->leftJoin('ProductVariant')
                    ->distinct()
                    ->filterByActive(true);
            
            $brandsInSearchResult = SProductsQuery::create()
                        ->leftJoin('ProductVariant')
                        ->distinct()
                        ->filterByActive(true)
                        ->filterByName('%'.ShopCore::$_GET['text'].'%')                        
                        ->select(array('BrandId')); 
            
            if (!empty(ShopCore::$_GET['text']))
            {
                $products = $products->filterByName('%'.ShopCore::$_GET['text'].'%');
                
                if (!empty(ShopCore::$_GET['category']) && ShopCore::$_GET['category'] > 0)
                {
                    $brandsInSearchResult = $brandsInSearchResult->filterByCategoryId((int) ShopCore::$_GET['category']);
                    $products = $products->filterByCategoryId((int) ShopCore::$_GET['category']);
                }
                
                /** Filter by price */
                if (isset(ShopCore::$_GET['lp']) && ShopCore::$_GET['lp'] > 0 ) // Min. price
                {
                    $products = $products->where('ProductVariant.Price >= ?', (int)$this->convertToMainCurrency(ShopCore::$_GET['lp']));
                    $brandsInSearchResult = $brandsInSearchResult->where('ProductVariant.Price >= ?', (int)$this->convertToMainCurrency(ShopCore::$_GET['lp']));
                }

                if (isset(ShopCore::$_GET['rp']) && ShopCore::$_GET['rp'] > 0) // Max. price
                {
                    $products = $products->where('ProductVariant.Price <= ?',  (int)$this->convertToMainCurrency(ShopCore::$_GET['rp']));
                    $brandsInSearchResult = $brandsInSearchResult->where('ProductVariant.Price <= ?',  (int)$this->convertToMainCurrency(ShopCore::$_GET['rp']));
                }
                
                // Apply custom fields query data
                if (!empty(ShopCore::$_GET['f']) && sizeof(ShopCore::$_GET['f']) > 0)
                {
                    $products = $products->applyCustomFieldsQuery(ShopCore::$_GET['f']);
                    $brandsInSearchResult = $brandsInSearchResult->applyCustomFieldsQuery(ShopCore::$_GET['f']);
                }
                // Filter by brand
                if (!empty(ShopCore::$_GET['brand']) && ShopCore::$_GET['brand'] > 0)
                    $products = $products->filterByBrandId((int) ShopCore::$_GET['brand']);
                
                $brandsInSearchResult = $brandsInSearchResult
                            ->find()
                            ->toArray();
                
                if (sizeof($brandsInSearchResult) > 0)
                {
                    $brandsInSearchResult = SBrandsQuery::create()
                            ->findPks($brandsInSearchResult);
                }
            }
            /** Check orderBy */
            if (!empty(ShopCore::$_GET['order']))
            {
                switch (ShopCore::$_GET['order'])
                {
                    case 'price':
                        $products = $products->orderBy('ProductVariant.Price', Criteria::ASC);
                    break;

                    case 'price_desc':
                        $products = $products->orderBy('ProductVariant.Price', Criteria::DESC);
                    break;

                    case 'name':
                        $products = $products->orderByName(Criteria::ASC);
                    break;

                    case 'name_desc':
                        $products = $products->orderByName(Criteria::DESC);
                    break;
                
                    case 'date':
                        $products = $products->orderByCreated('ASC');
                    break;

                    case 'date_desc':
                        $products = $products->orderByCreated('DESC');
                    break;

                    default:
                        $products = $products->orderByCreated('DESC');
                    break;
                }
            }

            $totalProducts = $this->_count($products);

            $products = $products
                    ->offset((int) ShopCore::$_GET['per_page'])
                    ->limit((int) $this->perPage)
                    ->find();

            // Load product variants
            $products->populateRelation('ProductVariant');
        }

        // Begin pagination
        $this->load->library('Pagination');
        $this->pagination = new SPagination();
        $config['base_url'] = shop_url('search/'.$this->_getQueryString());
        $config['page_query_string'] = true;
        $config['total_rows'] = $totalProducts;
        $config['per_page'] = $this->perPage;
        $this->pagination->num_links = 6;
        $this->pagination->initialize($config);
        // End pagination



        $this->render('search', array(
            'products'=>$products,
            'totalProducts'=>$totalProducts,
            'brandsInSearchResult'=>$brandsInSearchResult,
            'pagination'=>$this->pagination->create_links(),
            'tree'=>ShopCore::app()->SCategoryTree->getTree()
        ));
    }

   protected function convertToMainCurrency($sum)
   {
        return ShopCore::app()->SCurrencyHelper->convertToMain($sum, ShopCore::app()->SCurrencyHelper->current->getId());
   }
    
    /**
     * Count total products in category
     *
     * @param SProductsQuery $object
     * @return int */
    protected function _count(SProductsQuery $object)
    {
        $object = clone $object;
        return $object->count();
    }

    protected function _getQueryString()
    {
        $data = array();

        $need = array('text');

        foreach($need as $key=>$value)
        {
            if (isset(ShopCore::$_GET[$value]))
            {
                $data[$value] = ShopCore::$_GET[$value];
            }
        }

        return '?'.http_build_query($data);
    }
}

/* End of file search.php */