<?php 

/**
 * BasePaymentProcessor 
 * 
 * @package 
 * @version $id$
 * @copyright 
 * @author <dev@imagecms.net>
 */
abstract class BasePaymentProcessor {

    public $order = null;
    public $paymentMethod = null;

    public function __construct()
    {
        
    }
    
    /**
     * Get payment processor name. e.g. "WebMoney"
     * 
     * @access public
     * @return void
     */
    public function getName()
    {
        return get_class($this);
    }

    /**
     * Form for payment to display in view order.
     * 
     * @access public
     * @return string
     */
    public function getForm()
    {

    }

    /**
     * Display admin form
     * 
     * @access public
     * @return string
     */
    public function getAdminForm()
    {

    }

    /**
     * processPayment - Process payment after redirect from payment site.
     * 
     * @access public
     * @return void
     */
    public function processPayment()
    {
    
    }
 
    public function setOrderPaid()
    {
        $this->order->setPaid(true);
        $this->order->save();
    }

    /**
     * Save admin settigns from POST data
     * 
     * @access public
     * @return boolean
     */
    public function saveSettings()
    {

    }

    public function setPaymentMethod(SPaymentMethods $pm)
    {
        $this->paymentMethod = $pm;
    }

    public function getPayButton()
    {
        return '<input type="submit" value="Оплатить">';
    }

}
