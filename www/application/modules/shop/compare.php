<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Compare Controller
 *
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net> 
 */
class Compare extends ShopController {

    public $forCompareIds = array();

	public function __construct()
	{
		parent::__construct();
	}

    /**
     * Display products for compare
     *
     * @return void
     */
    public function index()
    {
        $this->render('compare', array(
            'products'=>$this->_loadProducts(),
        ));
    }

    public function add($productId = null)
    {
        $test = SProductsQuery::create()
                ->findPk($productId);

        if ($test !== null)
        {
            $data = $this->_getData();

            if (!is_array($data))
                $data = array();

            if (!in_array($test->getId(), $data))
            {
                $data[] = $test->getId();
                $this->session->set_userdata('shopForCompare', $data);
            }
        }

        // redirect back
        //redirect($_SERVER['HTTP_REFERER']);
        redirect(shop_url('compare'));
    }

    public function remove($productId = null)
    {
        $data = $this->_getData();

        if (is_array($data))
        {
            $key = array_search($productId, $data);
            
            if ($key !== false)
                unset($data[$key]);

            $this->session->set_userdata('shopForCompare', $data);
        }

        redirect(shop_url('compare'));
    }

    protected function _loadProducts()
    {
        return SProductsQuery::create()
                ->findPks($this->_getData());
    }

    protected function _getData()
    {
        return $this->session->userdata('shopForCompare');
    }
}

/* End of file compare.php */