<?php 
/**
 * WebMoney payment processor
 *
 * Additional info: http://wiki.webmoney.ru/wiki/show/Web+Merchant+Interface
 * author: dev@imagecms.net
 */
class WebMoneySystem extends BasePaymentProcessor {

    protected $settigns = null;
    public $testingMode = true;

    public function __construct()
    {
        $this->order = ShopCore::app()->SPaymentSystems->getOrder();
    }

    /**
     * Process payment
     */
    public function processPayment()
    {
        if (!$_POST)
            return $this->returnAnswer(ERROR_EMPTY_POST);

        // For first webmoney preRequest
        if (!isset($_POST['LMI_HASH']) && isset($_GET['result']))
            die('YES');

        $SECRET_KEY = $this->paymentMethod->getId().'_LMI_SECRET_KEY';
        $PURSE = $this->paymentMethod->getId().'_LMI_PAYEE_PURSE';
        $PURSE = ShopCore::app()->SSettings->$PURSE;

        // Grab WM variables from post.
        // Variables to create md5 signature.
        $forHash = array(
            'LMI_PAYEE_PURSE'    => '',
            'LMI_PAYMENT_AMOUNT' => '',
            'LMI_PAYMENT_NO'     => '',
            'LMI_MODE'           => '',
            'LMI_SYS_INVS_NO'    => '',
            'LMI_SYS_TRANS_NO'   => '',
            'LMI_SYS_TRANS_DATE' => '',
            'LMI_SECRET_KEY'     => '',
            'LMI_PAYER_PURSE'    => '',
            'LMI_PAYER_WM'       => '',
        );

        foreach ($forHash as $key=>$val)
        {
            if (isset($_REQUEST[$key]))
                $forHash[$key]=$_REQUEST[$key];
        }

        // Set Secret key from settings.
        $forHash['LMI_SECRET_KEY'] = ShopCore::app()->SSettings->$SECRET_KEY;

        // Check testing mode
        if ($this->testingMode === true)
            $forHash['LMI_MODE'] = 1;
        else
            $forHash['LMI_MODE'] = 0;

        // Check if order is paid.
        if ($this->order->getPaid() == true)
            return $this->returnAnswer(ERROR_ORDER_PAID_BEFORE);

        // Check LMI_PAYEE_PURSE with settings.
        if ($PURSE != $forHash['LMI_PAYEE_PURSE'])
            return $this->returnAnswer(ERROR_MATCH_LMI_PAYEE_PURSE);

        // Check amount.
        if ($this->order->getTotalPrice() != $forHash['LMI_PAYMENT_AMOUNT'])
            return $this->returnAnswer(ERROR_WRONG_PAYMENT_AMOUNT);

        // Check payer and shop WM accounts first letter.
        if (($PURSE{0} != $forHash['LMI_PAYEE_PURSE']{0}))
            return $this->returnAnswer(ERROR_MATCH_FIRST_LETTER);

        // Check if it is not testing payment.
        if ($forHash['LMI_MODE'] == 1 && $this->testingMode == false)
            return $this->returnAnswer(ERROR_TEST_PAYMENT_NOT_ALLOWED);

        if (!isset($_POST['LMI_HASH']))
            return $this->returnAnswer(ERROR_NO_LMI_HASH);

        // Create and check signature.
        $sign = strtoupper(md5(implode('',$forHash)));

        // If OK make order paid.
        if ($sign != $_POST['LMI_HASH'])
            return $this->returnAnswer(ERROR_WRONG_LMI_HASH);

        // Set order paid
        $this->setOrderPaid();

        if (isset($_GET['result']) && $_GET['result'] == 'true')
            die("YES");

        return true;
    }

    protected function returnAnswer($text)
    {
        if (isset($_GET['result']) && $_GET['result'] == 'true')
            die($text);
        else
            return $text;
    }

    /**
     * Create payment form
     *
     * @return string Generated form
     */
    public function getForm()
    {
        $form = '
        <form method="POST" action="https://merchant.webmoney.ru/lmi/payment.asp" accept-charset="windows-1251">
            <input type="hidden" name="LMI_PAYMENT_AMOUNT" value="{PAYMENT_AMOUNT}">
            <input type="hidden" name="LMI_PAYMENT_NO" value="{PAYMENT_NO}">
            <input type="hidden" name="LMI_PAYMENT_DESC" value="{PAYMENT_DESC}">
            <input type="hidden" name="LMI_PAYEE_PURSE" value="{PAYEE_PURSE}">
            <input type="hidden" name="LMI_RESULT_URL" value="{RESULT_URL}">
            <input type="hidden" name="LMI_SUCCESS_URL" value="{SUCCESS_URL}">
            <input type="hidden" name="LMI_FAIL_URL" value="{FAIL_URL}">
            {PAY_BUTTON}
        </form>';
        
        $PURSE = $this->paymentMethod->getId().'_LMI_PAYEE_PURSE';

        $replace = array(
            '{PAYMENT_AMOUNT}' =>ShopCore::app()->SCurrencyHelper->convert( $this->order->getTotalPrice(), $this->paymentMethod->getCurrencyId()),
            '{PAYMENT_NO}'     =>$this->order->getId(),
            '{PAYMENT_DESC}'   =>'Оплата заказа номер '.$this->order->getId().'.',
            '{PAYEE_PURSE}'    =>encode(ShopCore::app()->SSettings->$PURSE),
            '{SIM_MODE}'       =>'0',
            '{SUCCESS_URL}'    =>shop_url('cart/view/'.$this->order->getKey().'/?pm='.$this->paymentMethod->getId()),
            '{RESULT_URL}'     =>shop_url('cart/view/'.$this->order->getKey().'/?result=true&pm='.$this->paymentMethod->getId()),
            '{FAIL_URL}'       =>shop_url('cart/view/'.$this->order->getKey().'/?fail=true&pm='.$this->paymentMethod->getId()),
            '{PAY_BUTTON}'     =>$this->getPayButton(),
        );

        return str_replace(array_keys($replace),$replace,$form);
    }

    /**
     * Create configure form
     *
     * @return string
     */
    public function getAdminForm()
    {
        $PURSE = $this->paymentMethod->getId().'_LMI_PAYEE_PURSE';
        $SECRET_KEY = $this->paymentMethod->getId().'_LMI_SECRET_KEY';
        
        $form = '
            <div class="form_text">Кошелек продавца:</div>
            <div class="form_input">
                <input type="text" name="LMI_PAYEE_PURSE" value="'.encode(ShopCore::app()->SSettings->$PURSE).'" class="textbox_long" /> <span class="required">*</span>
                <div class="lite">
                    Кошелек продавца, на который покупатель должен совершить платеж. Формат – буква и 12 цифр.
                </div>
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Secret Key:</div>
            <div class="form_input">
                <input type="text" name="LMI_SECRET_KEY" value="'.encode(ShopCore::app()->SSettings->$SECRET_KEY).'" class="textbox_long" /> <span class="required">*</span>
            </div>
            <div class="form_overflow"></div>
        ';

        return $form;
    }

    /**
     * Save settings
     *
     * @return bool|string
     */
    public function saveSettings(SPaymentMethods $paymentMethod)
    {
        $ci =& get_instance();
        $ci->load->library('Form_validation');

        $ci->form_validation->set_rules('LMI_PAYEE_PURSE','Кошелек продавца','required');
        $ci->form_validation->set_rules('LMI_SECRET_KEY','Secret Key','required');

		if ($ci->form_validation->run() == FALSE)
			return validation_errors();
		else
        {
            // Save settings
            ShopCore::app()->SSettings->set($paymentMethod->getId().'_LMI_PAYEE_PURSE', $_POST['LMI_PAYEE_PURSE']);
            ShopCore::app()->SSettings->set($paymentMethod->getId().'_LMI_SECRET_KEY', $_POST['LMI_SECRET_KEY']);

			return true;
        }
    }
}
