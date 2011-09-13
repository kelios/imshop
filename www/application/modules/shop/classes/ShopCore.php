<?php
/**
 * ShopCore class file
 * 
 * @package Shop
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 */

define('PropelDebugMode', false);

class ShopCore {

    private static $_initialized = null;
    private static $_imports = array();
    private static $_includePaths = array();
    protected static $_componentsClass; 

    public static $_GET = array();
    public static $template_path = null;
    public static $currentCategory = null;
    public static $ci = null; // CI instance
    public static $SHOP_APPLY_DISCOUNTS = true;

    public static $imagesUploadPath = null;

    /**
     * Replacement of php __autoload magic method. 
     * 
     * @param string $className
     * @access public
     */
    public static function autoload($className)
    {
        if (self::$_initialized === null)
        {
            self::$_initialized = true;
            self::$ci =& get_instance();

            // Load components class container.
            self::$_componentsClass = new ShopComponents();

            // Load shop helper
            //require realpath(dirname(__FILE__).'/../helpers/shop_helper'.EXT);
            require SHOP_DIR . 'helpers/shop_helper'.EXT;

            self::init();
        }

        // Full path to class file
        $classFullPath = SHOP_DIR . 'classes/'.$className.EXT; 

        if (file_exists($classFullPath))
        { 
            include($classFullPath);
            self::$_imports[$className] = true;
        } 
    }

    /**
     * Load main components like Propel, Config, etc...
     * 
     * @access public
     */
    public static function init()
    { 
        require_once SHOP_DIR.'classes/propel/Propel.php';

        // Set images upload path
        self::$imagesUploadPath = PUBPATH.'/uploads/shop/';

        // Initialize Propel with the runtime configuration from an array based on
        // main database configuration.
        // Custom connection settings from propel conf dir.
        // Example: Propel::init(SHOP_DIR."models/build/conf/Shop-conf.php");
        $conf = array (
          'datasources' => 
          array (
            'Shop' => 
            array (
              'adapter' => 'mysql',
              'connection' => 
              array (
                'dsn' => 'mysql:host='.self::$ci->db->hostname.';dbname='.self::$ci->db->database,
                'user' => self::$ci->db->username,
                'password' => self::$ci->db->password, 
                'settings' => 
                    array(
                      'charset' => 
                      array (
                        'value' => 'utf8',
                      ),
                    ), 
              ),
            ),
            'default' => 'Shop',
          ),
            'log' => 
              array (
                //'type' => 'file',
                //'name' => SHOP_DIR.'models/propel.log',
                //'ident' => 'propel',
                //'level' => '7',
                //'conf' => '',
              ),

          'generator_version' => '1.5.2',
          'classmap'=>include(SHOP_DIR.'models'.DS.'build'.DS.'conf'.DS.'classmap-Shop-conf'.EXT),
        );

        if (PropelDebugMode === true)
        {
            $conf['datasources']['Shop']['connection']['classname']='DebugPDO';
            $logger = ShopCore::app()->SPropelLogger; // Load logger class.
            Propel::setLogger($logger);
        }

        // Set propel configuration
        Propel::setConfiguration($conf);
        Propel::initialize();

        if (PropelDebugMode === true) 
        {
            $config = Propel::getConfiguration(PropelConfiguration::TYPE_OBJECT);
            $config->setParameter('debugpdo.logging.details.method.enabled', true);
            $config->setParameter('debugpdo.logging.details.time.enabled', true);
            $config->setParameter('debugpdo.logging.details.mem.enabled', true);
        }
        
        self::$_GET = self::$ci->uri->getAllParams();

        // Add the generated 'classes' directory to the include path
        set_include_path(SHOP_DIR."models/build/classes/".PATH_SEPARATOR.get_include_path());
    }

    public static function initEnviroment()
    {
        $ci = get_instance();
	
        $path = ShopCore::app()->SSettings->systemTemplatePath;
	
        $media_path = $path;
        self::$template_path = realpath($path).'/';

        if (isset($_POST['setCurrency']))
            self::$ci->session->set_userdata('shopCurCurrency',(int)$_POST['setCurrency']);

        $currentCurrency = self::$ci->session->userdata('shopCurCurrency');

        ShopCore::app()->SCurrencyHelper->initCurrentCurrency($currentCurrency);

        if (substr($media_path,0,2) == './')
            $media_path = substr($media_path,2);

        // Assign currency symbol.
        $ci->template->add_array(array(
            'SHOP_THEME'=>media_url($media_path).'/',
            'CS'=>ShopCore::app()->SCurrencyHelper->getSymbol(),
        ));
    }

    public static function t($message,array $params=array(), $file='main')
    {
        return $message;
    }

    public static function app()
    {
        return self::$_componentsClass;
    }

    public static function encode($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
    }
}
