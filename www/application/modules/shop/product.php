<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Shop Controller
 * 
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 *
 * @property model SProducts
 */
class Product extends ShopController {

    public $model = null;

	public function __construct()
	{
	    parent::__construct();

        // Get last uri segment
        $productUrl = $this->uri->segment($this->uri->total_segments());
       
        $model = SProductsQuery::create()
            ->filterByUrl($productUrl)
            ->filterByActive(true)
            ->limit(1)
            ->find();

        if (sizeof($model) == 0)
            $this->error404(); 
        else
        {
            $this->model = $model[0];
            ShopCore::$currentCategory = $this->model->getMainCategory();
            $this->model->setViews($this->model->getViews()+1)->save();
        }

        $this->index();
        exit;
	}

    /**
     * Display product info.
     * 
     * @access public
     */
	public function index()
	{
	    $title = $this->model->getMetaTitle();
	    if (empty($title))
		$title = array($this->model->getName(), $this->model->getMainCategory()->getName());	
        $this->core->set_meta_tags(
            $title, 
            $this->model->getMetaKeywords(),
            $this->model->getMetaDescription()
        );

        $this->_loadCommentsModule();

        $this->render('product', array(
            'model'=>$this->model,
            'jsCode'=>$this->getJsCode(),
        ));
    }

    /**
     * Load comments module.
     *
     * @return void
     */
    protected function _loadCommentsModule()
    {
        $this->load->module('comments');
        $this->comments->module = 'shop';
        $this->comments->build_comments($this->model->getId());
    }

    /**
     * Create js code to switch between variants.
     *
     * @return string
     */
    public function getJsCode()
    {
        $variants = $this->model->getProductVariants();

        if (sizeof($variants) == 1)
            return '';

        $variantPrices = '';
		$variantOldPrices =  '';
		$variantStocks = '';
		$variantEconomy = '';

        $vars = "
        var vPrices = new Array;
		var vOldPrices = new Array;
        var vStocks = new Array;
		var vEconomy = new Array;
        var currencySymbol = ' ".ShopCore::app()->SCurrencyHelper->getSymbol()."';
        ";

        foreach ($variants as $variant)
        {
            $variantPrices .= "vPrices[".$variant->getId()."] = '".$variant->toCurrency()."';"."\n";
            $variantStocks .= "vStocks[".$variant->getId()."] = '".$variant->getStock()."';"."\n";
			if ($this->model->hasDiscounts())
			{
				$variantEconomy .= "vEconomy[".$variant->getId()."] = '".$variant->getEconomy()."';"."\n";
				$variantOldPrices .= "vOldPrices[".$variant->getId()."] = '".$variant->toCurrency('origPrice')."';"."\n";
			}
			else
			{
				$variantEconomy .= "vEconomy[".$variant->getId()."] = '".($this->model->toCurrency('OldPrice') - $variant->toCurrency())."';"."\n";
				$variantOldPrices .= "vOldPrices[".$variant->getId()."] = '".$this->model->toCurrency('OldPrice')."';"."\n";
			}
        }

        // TODO: Move js functions to file.
        $func = "
        function display_variant_price(variant)
        {
            document.getElementById('price').innerHTML = vPrices[variant] + currencySymbol;
			document.getElementById('orig_price').innerHTML = vOldPrices[variant] + currencySymbol;
            document.getElementById('stock').innerHTML = vStocks[variant];
			document.getElementById('economy').innerHTML = vEconomy[variant];
        }";
        
        return '<script type="text/javascript">'.$vars.$variantPrices."\n".$variantOldPrices."\n".$variantStocks.$variantEconomy."\n".$func."\n</script>";
    }
}

/* End of file product.php */
