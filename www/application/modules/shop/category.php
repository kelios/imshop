<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Shop Controller
 *
 * Each category accept next $_GET variables to filter products
 *      f[n1][] = n2 - Where n1 - custom field ID, n2 - field data index
 *      lp - Price from
 *      rp - Price to
 *      brand - Brand id
 *      order - orderBy. Possible values = price,price_desc, name,name_desc
 *
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net> 
 */
class Category extends ShopController {

    protected $perPage = 10;
    protected $model;
    protected $products;

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('string');

        // Load per page param
        if (!empty(ShopCore::$_GET['user_per_page']))
        {
            $this->perPage = (int) ShopCore::$_GET['user_per_page'];
        } else
        $this->perPage = ShopCore::app()->SSettings->frontProductsPerPage;

        $requestString = trim_slashes($this->uri->uri_string());
        $requestArray = explode('/', $requestString);

        // Remove shop/category from request.
        $categoryPath = implode('/', array_slice($requestArray,2));

        // Search category
        $model = SCategoryQuery::create()
            ->filterByFullPath($categoryPath)
            ->filterByActive(TRUE)
            ->findOne();

        if ($model === null) 
            $this->error404(); 
        else
        {
            $this->model = $model;
            ShopCore::$currentCategory = $model;
        }

        $this->index();
        exit;
	}

    /**
     * Display category products.
     * 
     * @access public
     */
	public function index()
	{
        $this->core->set_meta_tags(
            $this->model->getName(), 
            $this->model->getMetaKeywords(),
            $this->model->getMetaDesc()
        );

        // Search all brands in current category
        $brandsInCategory = SProductsQuery::create()
                ->leftJoin('ProductVariant')
                ->filterByCategoryId($this->model->getId())
                ->filterByActive(true)
                ->where('SProducts.BrandId != ?', 0)
                ->select(array('BrandId'))
                ->distinct();

        $products = SProductsQuery::create()
                ->leftJoin('ProductVariant')
                ->filterByCategory($this->model)
                ->distinct()
                ->filterByActive(true);
        
        // Filter by availability in stock
        if (!empty(ShopCore::$_GET['stock']) && ShopCore::$_GET['stock'] > 0)
        {
            $products = $products->where('ProductVariant.Stock > ?', 0);
            $brandsInCategory = $brandsInCategory->where('ProductVariant.Stock > ?', 0);
        }
        
        // Filter by action
        if (!empty(ShopCore::$_GET['action']) && ShopCore::$_GET['action'] > 0)
        {    
            $products = $products->filterByAction(True);
            $brandsInCategory = $brandsInCategory->filterByAction(True);
        }
        
        // Filter by hot
        if (!empty(ShopCore::$_GET['hot']) && ShopCore::$_GET['hot'] > 0)
        {
            $products = $products->filterByHot(False);
            $brandsInCategory = $brandsInCategory->filterByHot(False);
        }
        
        // Filter by brand
        if (!empty(ShopCore::$_GET['brand']) && ShopCore::$_GET['brand'] > 0)
        {
            $products = $products->filterByBrandId((int) ShopCore::$_GET['brand']);
        }
        
        /** Filter by price */
        if (isset(ShopCore::$_GET['lp']) && ShopCore::$_GET['lp'] > 0 ) // Min. price
        {
            $products = $products->where('ProductVariant.Price >= ?', (int)$this->convertToMainCurrency(ShopCore::$_GET['lp']));
            $brandsInCategory = $brandsInCategory->where('ProductVariant.Price >= ?', (int)$this->convertToMainCurrency(ShopCore::$_GET['lp']));
        }

        if (isset(ShopCore::$_GET['rp']) && ShopCore::$_GET['rp'] > 0) // Max. price
        {
            $products = $products->where('ProductVariant.Price <= ?',  (int)$this->convertToMainCurrency(ShopCore::$_GET['rp']));
            $brandsInCategory = $brandsInCategory->where('ProductVariant.Price <= ?',  (int)$this->convertToMainCurrency(ShopCore::$_GET['rp']));
        }
        
        // Apply custom fields query data
        if (!empty(ShopCore::$_GET['f']) && sizeof(ShopCore::$_GET['f']) > 0)
        {
            $products = $products->applyCustomFieldsQuery(ShopCore::$_GET['f']);
            $brandsInCategory = $brandsInCategory->applyCustomFieldsQuery(ShopCore::$_GET['f']);
        }
        
        $brandsInCategory = $brandsInCategory 
                    ->find()
                    ->toArray();

        if (sizeof($brandsInCategory) > 0)
        {
            $brandsInCategory = SBrandsQuery::create()
                    ->findPks($brandsInCategory);
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
            
                case 'hit':
                    $products = $products->orderByHit(Criteria::DESC);
                break;
            
                case 'hot':
                    $products = $products->orderByHot(Criteria::DESC)->orderByCreated(Criteria::DESC);
                break;
            
                case 'action':
                    $products = $products->orderByAction(Criteria::DESC)->orderByCreated(Criteria::DESC);
                break;
            
                default:
                    $products = $products->orderByCreated(Criteria::DESC);
                break;
            }
        }

        $totalProducts = $this->_count($products);
    
        if (empty(ShopCore::$_GET['per_page']))
        {
            ShopCore::$_GET['per_page'] = 0;
        }

        $products = $products
                ->offset((int) ShopCore::$_GET['per_page'])
                ->limit((int) $this->perPage)
                ->find();

        // Load product variants
        $products->populateRelation('ProductVariant');
        
        if (!empty(ShopCore::$_GET['user_per_page']))
        {
            $userPerPage = '&user_per_page='.(int) $_GET['user_per_page'];
        }
        
        // Begin pagination
        $this->load->library('Pagination');
        $this->pagination = new SPagination();
        $config['base_url'] = shop_url('category/'.$this->model->getFullPath().SProductsQuery::getFilterQueryString().$userPerPage);
        $config['page_query_string'] = true;
        $config['total_rows'] = $totalProducts;
        $config['per_page'] = $this->perPage;
        $this->pagination->num_links = 6;
        $this->pagination->initialize($config);
        // End pagination
        $this->products=$products;
        $this->render('category', array(
            'model'=>$this->model,
            'jsCode'=>$this->getJsCode(),
            'products'=>$products,
            'totalProducts'=>$totalProducts,
            'brandsInCategory'=>$brandsInCategory,
            'pagination'=>$this->pagination->create_links(),
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
	
    /**
     * Create js code to switch between variants.
     *
     * @return string
     */
    public function getJsCode()
    {
        $products = $this->products;
        $variantPrices = '';
        
        $vars = "
        var Product = new Array;
        var currencySymbol = ' ".ShopCore::app()->SCurrencyHelper->getSymbol()."';
        ";
        
        foreach ($products as $product) {
            $variants = $product->getProductVariants();
            if (sizeof($variants) > 1)
            {
                $variantPrices .= 'Product['.$product->getId()."]=new Array();\n";
                foreach ($variants as $variant)
                {
                    $variantPrices .= "Product[".$product->getId().",".$variant->getId()."] = '".$variant->toCurrency()."';\n";
                }
            }
        }
        
       // TODO: Move js functions to file.
        $func = "
        function display_variant_price(product, variant)
        {
            document.getElementById(product+'_price').innerHTML = Product[product,variant] + currencySymbol;
        }
        function change_product_per_page(user_per_page)
        {
            var baseURL  = '?user_per_page='+user_per_page;
            top.location.href = baseURL;
            
            return true;   
        }
        ";
        
        return '<script type="text/javascript">'.$vars.$variantPrices."\n".$func."\n</script>";
    }
}

/* End of file category.php */
