<?php 

/**
 * SPaymentSystems - class to work with payment systems
 * 
 * @package 
 * @version $id$
 * @copyright 
 * @author <dev@imagecms.net> 
 * @license 
 */
class SPaymentSystems {

    public $pathToSystems = null; // Path to payment system classes.
    protected $classes = array();
    protected $order = null;

    /**
     * @var array List of payment systems.
     */
    public $systems = array(
        'WebMoneySystem'=>array(
            'filePath' =>'WebMoney/WebMoneySystem.php',
            'listName' =>'WebMoney',
            'class'    => null
        ),
        'OschadBankInvoiceSystem'=>array(
            'filePath' =>'OschadBankInvoice/OschadBankInvoiceSystem.php',
            'listName' =>'ОщадБанк Украины',
            'class'    => null
        ),
        'SberBankInvoiceSystem'=>array(
            'filePath' =>'SberBankInvoice/SberBankInvoiceSystem.php',
            'listName' =>'СберБанк России',
            'class'    => null
        ),
        'RobokassaSystem'=>array(
            'filePath' =>'Robokassa/RobokassaSystem.php',
            'listName' =>'Robokassa',
            'class'    => null
        ),
    );

    public function __construct()
    {
        $this->pathToSystems = SHOP_DIR.'classes/PaymentSystems/';
    }

    /**
     * Base init function
     *
     * @param  $order
     * @return void
     */
    public function init($order)
    {
        $this->setOrder($order);
    }

    /**
     * Load payment system class by name
     *
     * @param  $name
     * @return void
     */
    public function loadPaymentSystem($name, $paymentMethod = null)
    {
        if (array_key_exists($name,$this->systems))
        {
            // Load class file
            if (!class_exists($name))
                include($this->pathToSystems . $this->systems[$name]['filePath']);

            // Create new class
            $class = new $name;

            if ($paymentMethod instanceof SPaymentMethods)
                $class->setPaymentMethod($paymentMethod);

            return $class;
        }else{
            return 'System not found.';
        }
    }
        
    /**
     * getList 
     * 
     * @access public
     * @return array with system names
     */
    public function getList()
    {
        return $this->systems;
    }

    /**
     * Set order class. Will be used to work with payment system classes.
     *
     * @param SOrders $order
     * @return void
     */
    public function setOrder(SOrders $order)
    {
        $this->order = $order;
    }

    /**
     * Get current order
     *
     * @return SOrders class
     */
    public function getOrder()
    {
        return $this->order;
    }
}