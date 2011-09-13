<?php
/**
 * ShopAdminSearch search products
 *
 */
class ShopAdminSearch extends ShopAdminController {

    public $perPage = 5;

    public function __construct()
    {
        parent::__construct();
        $this->perPage = ShopCore::app()->SSettings->adminProductsPerPage;
    }

    /**
     * Display search form
     *
     * @return void
     */
    public function index()
    {
        //var_dump(ShopCore::$_GET);
        $model = new SProductsQuery;

        if (isset(ShopCore::$_GET['CategoryId']) && ShopCore::$_GET['CategoryId'] > 0)
            $model = $model->filterByCategoryId((int) ShopCore::$_GET['CategoryId']);

        if (!empty(ShopCore::$_GET['text']))
        {
            $text = ShopCore::$_GET['text'];
            if (!strpos($text,'%'))
                $text = '%'.$text.'%';
                
            $model = $model->filterByName($text);
        }

        if (isset(ShopCore::$_GET['s']))
        {
            if (ShopCore::$_GET['Active'] == 'true')
                $model = $model->filterByActive(true);
            if (ShopCore::$_GET['Active'] == 'false')
                $model = $model->filterByActive(false);

            if (ShopCore::$_GET['Hit'] == 'true')
                $model = $model->filterByHit(true);
            if (ShopCore::$_GET['Hit'] == 'false')
                $model = $model->filterByHit(false);
			
			if (ShopCore::$_GET['Hot'] == 'true')
                $model = $model->filterByHot(true);
            if (ShopCore::$_GET['Hot'] == 'false')
                $model = $model->filterByHot(false);
			
			if (ShopCore::$_GET['Action'] == 'true')
                $model = $model->filterByAction(true);
            if (ShopCore::$_GET['Action'] == 'false')
                $model = $model->filterByAction(false);
        }
        

        if (sizeof(ShopCore::$_GET['productProperties']) > 0)
        {
            $combine = $this->_buildCombinatorArray(ShopCore::$_GET['productProperties']);
            if ($combine !== false)
                $model = $model->combinator($combine);
        }

        // Set total products count
        $totalProducts = clone $model;
        $totalProducts = $totalProducts->count();

        $model = $model
                ->offset((int) ShopCore::$_GET['per_page'])
                ->limit($this->perPage)
                ->find();
        $model->populateRelation('ProductVariant');
        $model->populateRelation('MainCategory');

        // Create pagination
        $this->load->library('pagination');
        $config['base_url'] = 'admin/components/run/shop/search/index/?'.http_build_query(ShopCore::$_GET);
        $config['container'] = 'shopAdminPage';
        $config['page_query_string'] = true;
        $config['uri_segment'] = 8;
        $config['total_rows'] = $totalProducts;
        $config['per_page'] = $this->perPage;
        $this->pagination->num_links = 6;
        $this->pagination->initialize($config);

        if (ShopCore::$_GET['CategoryId'] > 0)
        {
            $categoryModel = SCategoryQuery::create()->findPk(ShopCore::$_GET['CategoryId']);
            if ($categoryModel !== null)
            {
                $renderer = ShopCore::app()->SPropertiesRenderer;
                $renderer->useMultipleSelect = true;
                $this->template->assign('fieldsForm',$renderer->renderAdmin($categoryModel->getId()));
            }
        }

        $form = $this->render('form', array(
            'categories'=>ShopCore::app()->SCategoryTree->getTree(),
        ),true);

        $this->render('list',array(
            'form'=>$form,
            'products'=>$model,
            'totalProducts'=>$totalProducts,
            'pagination'=>$this->pagination->create_links_ajax(),
            'cur_uri_str'=>base64_encode($this->uri->uri_string().'?'.http_build_query(ShopCore::$_GET)),
        ));
    }

    protected function _buildCombinatorArray(array $data)
    {
        $resultData = array(); // Array containing data for combinator
        foreach ($data as $fieldId=>$fieldValue)
        {
            // Load field
            $field = SPropertiesQuery::create()
                    ->filterByActive(true)
                    ->findPk($fieldId);

            if ($field !== null && !empty($fieldValue))
            {
                if (is_array($fieldValue))
                    $resultData[$fieldId] = $fieldValue;
                else
                    $resultData[$fieldId][] = $fieldValue;
            }
        }

        if (!empty($resultData))
            return $resultData;
        else
            return false;
    }

    /**
     * Display custom fields form.
     *
     * @param  $categoryId
     * @return void
     */
    public function renderCustomFields($categoryId = null)
    {
        $renderer = ShopCore::app()->SPropertiesRenderer;
        $renderer->useMultipleSelect = true;
        echo $renderer->renderAdmin($categoryId);
    }
}