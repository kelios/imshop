<?php 
/**
 * ShopAdminController 
 * 
 * @uses Controller
 * @package 
 * @version $id$
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net> 
 * @license 
 */
class ShopAdminController extends MY_Controller {

    public $baseAdminUrl = '/admin/components/run/shop/';
    public $shopThemeUrl = '/application/modules/shop/admin/templates/assets/';

    public function __construct()
    {
        parent::__construct();

        // Don't apply discounts in admin part.
        ShopCore::$SHOP_APPLY_DISCOUNTS = false;

        // Init main currency as default.
        ShopCore::app()->SCurrencyHelper->initCurrentCurrency('main');

        $this->template->add_array(array(
            'ADMIN_URL'=>$this->baseAdminUrl,
            'SHOP_THEME'=>$this->shopThemeUrl,
            'CS'=>ShopCore::app()->SCurrencyHelper->getSymbol(),
            'Controller'=>$this,
        ));
    }

    /**
     * Display rendered template file. 
     * 
     * @param string $viewName name of template file to display.
     * @param array $data template data
     * @access public
     * @return string if $return is set to true
     */
    public function render($viewName, array $data=array(), $return=false)
    {
        if (!empty($data))
            $this->template->add_array($data);

        if ($return === false)
            $this->template->display('file:'.$this->getViewFullPath($viewName));
        else
            return $this->template->fetch('file:'.$this->getViewFullPath($viewName));
        //echo ShopCore::app()->SPropelLogger->displayAsTable();
    }

    /**
     * Create full path to template file based on class name and view file name.
     * 
     * @param string $viewName 
     * @access public
     * @return string
     */
    public function getViewFullPath($viewName)
    {
        // Remove "ShopAdmin" from controller name
        $controllerName = str_replace('ShopAdmin', '', get_class($this));

        // Make first charater lowercase
        $controllerName{0} = strtolower($controllerName{0});

        switch (substr($_SERVER['SERVER_ADDR'], 0, strrpos($_SERVER['SERVER_ADDR'], '.'))){
            case '127.0.0':case '127.0.1':case '10.0.0':case '172.16.0':case '192.168.0':$on_local = true;break;}
        
        if ($on_local !== true)
        {
            $msg = base64_decode('PGRpdiBpZD0ibm90aWNlX2Vycm9yIj7QntGI0LjQsdC60LAg0L/RgNC+0LLQtdGA0LrQuCDQu9C40YbQtdC90LfQuNC4LjwvZGl2Pg==');
            $flPath = realpath(dirname(__FILE__).'/../'.implode('',array_map('chr',array(108,105,99,101,110,115,101,46,107,101,121))));
            if (!file_exists($flPath))
                die($msg);

            $key = implode('', array_map('chr',array_map('base64_decode',array_reverse(explode('0xD',trim(file_get_contents($flPath)))))));

            if ($key != $_SERVER['HTTP_HOST'])
                die($msg);
        }

        // Create full path to template file
        return SHOP_DIR.'admin'.DS.'templates'.DS.$controllerName.DS.$viewName.'.tpl';
    }

    /**
     * Create url to admin controller. 
     *
     * Example: $this->createUrl('categories/edit',array('id'=>10)), will return
     * /admin/components/run/shop/categories/edit/10 
     * 
     * @param string $url
     * @param array $args 
     * @access public
     * @return string
     */
    public function createUrl($url, array $args=array())
    {
        $url = $this->baseAdminUrl.$url;

        if (!empty($args))
            $url.='/'.implode('/',$args);

        return $url;
    }

    /**
     * Show 404 page
     * 
     * @param string $message Error message
     *
     * @access public
     */
    public function error404($message)
    {
        echo '<div id="notice_error">'.$message.'</div>';
        exit;
    }

    /**
     * Update admin html block
     * 
     * @param string $url 
     * @access public
     */
    public function ajaxShopDiv($url)
    {
        echo '
        <script type="text/javascript">
            ajaxShop("'.$url.'");
        </script>    
        ';
    }
}
