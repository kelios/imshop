<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Shop Brands Controller
 * 
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net> 
 */
class Brand extends ShopController {

    public $perPage = null;

    public function __construct()
    {
        parent::__construct();

        $this->perPage = ShopCore::app()->SSettings->frontProductsPerPage;

        $model = $this->_loadBrand($this->uri->segment($this->uri->total_segments()));

        if ($model === null)
            $this->core->error_404();
        elseif($model instanceof SBrands)
        {
            $this->model = $model;
            $this->index();
        }

        exit;
    }

    /**
     * Display list of brand products.
     */
    public function index()
    {
        $productsModel = SProductsQuery::create()
                ->filterByActive(true)
                ->filterByBrandId($this->model->getId())
                ->orderByCreated('DESC');

        $totalProducts = clone $productsModel;
        $totalProducts = $totalProducts->count();


        $productsModel = $productsModel
                ->limit($this->perPage)
                ->offset((int) ShopCore::$_GET['per_page'])
                ->find();

        // Begin pagination
        $this->load->library('Pagination');
        $this->pagination = new SPagination();
        $config['base_url'] = shop_url('brand/'.$this->model->getUrl().'/'.SProductsQuery::getFilterQueryString());
        $config['page_query_string'] = true;
        $config['total_rows'] = $totalProducts;
        $config['per_page'] = $this->perPage;
        $this->pagination->num_links = 6;
        $this->pagination->initialize($config);
        // End pagination

        $this->render('brand', array(
            'model'=>$this->model,
            'products'=>$productsModel,
            'pagination'=>$this->pagination->create_links(),
            'totalProducts'=>$totalProducts,
        ));
    }

    protected function _loadBrand($url)
    {
        return SBrandsQuery::create()
            ->where('SBrands.Url = ?', $url)
            ->findOne();
    }


}

/* End of file brand.php */
