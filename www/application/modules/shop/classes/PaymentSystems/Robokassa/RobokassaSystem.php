<?php 
/**
 * Robokassa payment module
 *
 * author: dev@imagecms.net
 * more info at: http://www.robokassa.ru/HowTo.aspx
 */
class RobokassaSystem extends BasePaymentProcessor {

    protected $settigns = null;

    public function __construct()
    {
        $this->order = ShopCore::app()->SPaymentSystems->getOrder();
    }

    /**
     * Process payment.
     */
    public function processPayment()
    {
        // Check if order is paid.
        if ($this->order->getPaid() == true)
            return ERROR_ORDER_PAID_BEFORE;

        $data = $this->loadSettings();
        $mrh_pass2 = $data['password2'];
        $shp_order_key = $this->order->getKey();
        $shp_payment_id = $this->paymentMethod->getId();

        $out_summ = $_REQUEST["OutSum"];
        $inv_id   = $_REQUEST["InvId"];
        $crc      = strtoupper($_REQUEST["SignatureValue"]);
        $my_crc   = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_orderKey=$shp_order_key:Shp_pmId=$shp_payment_id"));

        // Check sum
        if ($out_summ != ShopCore::app()->SCurrencyHelper->convert($this->order->getTotalPrice(), $this->paymentMethod->getCurrencyId()))
            return ERROR_SUM;

        // Check sign
        if ($my_crc != $crc)
            return "bad sign $out_summ:$inv_id:Shp_orderKey=$shp_order_key:Shp_pmId=$shp_payment_id";

        // Set order paid
        $this->setOrderPaid();

        // Show answer for Robokassa API service
        if (isset($_REQUEST['getResult']) && $_REQUEST['getResult'] == 'true')
        {
            echo "OK".$this->order->getId();
            exit();
        }

        return true;
    }

    /**
     * Create payment form
     *
     * @return string Generated form
     */
    public function getForm()
    {
        $data = $this->loadSettings();

        // Оплата заданной суммы с выбором валюты на сайте ROBOKASSA

        // регистрационная информация (логин, пароль #1)
        $mrh_login = $data['login'];
        $mrh_pass1 = $data['password1'];
        $shp_order_key = $this->order->getKey();
        $shp_payment_id = $this->paymentMethod->getId();

        // номер заказа
        $inv_id = $this->order->getId();

        // описание заказа
        $inv_desc = "Оплата заказа номер " . $this->order->getId();

        // сумма заказа
        $out_summ = ShopCore::app()->SCurrencyHelper->convert( $this->order->getTotalPrice(), $this->paymentMethod->getCurrencyId());

        // предлагаемая валюта платежа
        $in_curr = "PCR";

        // язык
        $culture = "ru";

        // формирование подписи
        $crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_orderKey=$shp_order_key:Shp_pmId=$shp_payment_id");

        // форма оплаты товара
        $form =
            "<form action='https://merchant.roboxchange.com/Index.aspx' method=POST>".
            //"<form action='http://test.robokassa.ru/Index.aspx' method=POST>".
            "<input type=hidden name=MrchLogin value=$mrh_login>".
            "<input type=hidden name=OutSum value=$out_summ>".
            "<input type=hidden name=InvId value=$inv_id>".
            "<input type=hidden name=Desc value='$inv_desc'>".
            "<input type=hidden name=SignatureValue value=$crc>".
            "<input type=hidden name=Shp_orderKey value='$shp_order_key'>".
            "<input type=hidden name=Shp_pmId value='$shp_payment_id'>".
            "<input type=hidden name=IncCurrLabel value=$in_curr>".
            "<input type=hidden name=Culture value=$culture>".
            "<input type=submit value='Оплатить'>".
            "</form>";

        return $form;
    }

    /**
     * Create configure form
     *
     * @return string
     */
    public function getAdminForm()
    {
        $data = $this->loadSettings();

        $form = '
            <div class="form_text">Логин:</div>
            <div class="form_input">
                <input type="text" name="robo[login]" value="'.$data['login'].'" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Пароль 1:</div>
            <div class="form_input">
                <input type="text" name="robo[password1]" value="'.$data['password1'].'" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Пароль 2:</div>
            <div class="form_input">
                <input type="text" name="robo[password2]" value="'.$data['password2'].'" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Настройки мерчанта:</div>
            <div class="form_input">
                Result URL: '.shop_url('cart/view/?getResult=true').'<br/>
                Success URL: '.shop_url('cart/view/?succes=true').'<br/>
                Fail URL: '.shop_url('cart/view/?fail=true').'<br/><br/>
                Метод отсылки данных для всех запросов: GET
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
        $saveKey = $paymentMethod->getId().'_RobokassaData';
        ShopCore::app()->SSettings->set($saveKey, serialize($_POST['robo']));

        return true;
    }

    /**
     * Load Robokassa settings
     *
     * @return array
     */
    protected function loadSettings()
    {
        $settingsKey = $this->paymentMethod->getId().'_RobokassaData';
        $data = unserialize(ShopCore::app()->SSettings->$settingsKey);
        if ($data === false) $data = array();
        return array_map('encode',$data);
    }
}