<?php 
/**
 * author: dev@imagecms.net
 */
class SberBankInvoiceSystem extends BasePaymentProcessor {

    protected $settigns = null;

    /**
     * @var $pdf TCPDF
     */
    protected $pdf = null;

    public function __construct()
    {
        $this->order = ShopCore::app()->SPaymentSystems->getOrder();
    }

    /**
     * Load pdf generating class and set main settings
     */
    protected function initPdfClass()
    {
        include(SHOP_DIR . 'classes/pdf/tcpdf.php');

        $this->pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $this->pdf->cms_cache_key = 'SberBankInvoice';

        $this->pdf->setPDFVersion('1.6');
        $this->pdf->SetFont('dejavusanscondensed','',8);
        $this->pdf->setPrintHeader(false);
        $this->pdf->setPrintFooter(false);

        // Set text color to Black
        $this->pdf->SetTextColor(0,0,0);
    }

    /**
     * Process payment.
     * Display PDF document
     */
    public function processPayment()
    {
        $this->initPdfClass();

        // Create new page
        $this->pdf->AddPage();

        $this->drawMainData();
        $this->drawMainData('step2');

        $this->pdf->SetFont('dejavusanscondensed','',10);

        $this->pdf->SetXY(5,10);
        $this->pdf->Cell(47, 5, 'Извещение',0,0,'C');

        $this->pdf->SetXY(5,60);
        $this->pdf->Cell(47, 5, 'Кассир',0,0,'C');

        $this->pdf->SetXY(5,135);
        $this->pdf->Cell(47, 5, 'Квитанция',0,0,'C');

        $this->pdf->SetXY(5,145);
        $this->pdf->Cell(47, 5, 'Кассир',0,0,'C');

        // Draw lines
        $this->pdf->SetLineStyle(array('dash'=>2));
        $this->pdf->Line(52,5,52,170);
        $this->pdf->Line(205,5,205,170); // Right line
        $this->pdf->Line(5,5,205,5); // Top line
        $this->pdf->Line(5,170,205,170); // Bottom line
        $this->pdf->Line(5,87.5,205,87.5); // Middle line
        $this->pdf->Line(5,5,5,170); // Left line

        // Shop generated pdf
        $this->pdf->Output('Sber_Bank_invoice.pdf');
        exit();
    }

    public function drawMainData($step = 'step1')
    {
        $width = 145;
        $lineStep = 5;
        $x = 55;
        $y = 15;

        if ($step == 'step2')
            $y = 95;

        // Draw vertical line from Sum to Home adress
        $this->pdf->Line($x, $y, $x+$width, $y);
        $this->drawTextUnderLine('(наименование получателя платежа)',$x,$y);

        $this->pdf->Line($x, $y+$lineStep*2, $x+45, $y+$lineStep*2);
        $this->drawTextUnderLine('(ИНН получателя платежа)',$x,$y+$lineStep*2);

        $this->pdf->Line($x+75, $y+$lineStep*2, $x+145, $y+$lineStep*2);
        $this->drawTextUnderLine('(номер счета получателя платежа)',$x+75,$y+$lineStep*2);

        $this->pdf->Line($x, $y+$lineStep*4, $x+$width, $y+$lineStep*4);
        $this->drawTextUnderLine('(наименование банка получателя платежа)',$x,$y+$lineStep*4);

        $this->pdf->Line($x+10, $y+$lineStep*6, $x+45, $y+$lineStep*6);
        $this->drawTextUnderLine('БИК',$x,$y+$lineStep*5);

        $this->pdf->Line($x+75, $y+$lineStep*6, $x+145, $y+$lineStep*6);
        $this->drawTextUnderLine('(номер кор./сч. банка получателя платежа)',$x+75,$y+$lineStep*6);

        $this->pdf->Line($x, $y+$lineStep*8, $x+55, $y+$lineStep*8);
        $this->drawTextUnderLine('(наименование платежа)',$x,$y+$lineStep*8);

        $this->pdf->Line($x+75, $y+$lineStep*8, $x+145, $y+$lineStep*8);
        $this->drawTextUnderLine('(номер лицевого счета (код) плательщика)',$x+75,$y+$lineStep*8);

        $this->pdf->Line($x+30, $y+$lineStep*10, $x+$width, $y+$lineStep*10);
        $this->drawTextUnderLine('Ф.И.О плательщика',$x,$y+$lineStep*9);

        $this->pdf->Line($x+30, $y+$lineStep*11, $x+$width, $y+$lineStep*11);
        $this->drawTextUnderLine('Адрес плательщика',$x,$y+$lineStep*10);

        $this->drawTextUnderLine('Сумма платежа:',$x+85,$y+$lineStep*11);
        $this->drawTextUnderLine('Итого:',$x+98,$y+$lineStep*12);

        $this->pdf->Line($x, $y+$lineStep*13, $x+35, $y+$lineStep*13);
        $this->drawTextUnderLine('(подпись плательщика)',$x,$y+$lineStep*13);

        // Draw user data
        $settingsKey = $this->paymentMethod->getId().'_SberBankData';
        $data = unserialize(ShopCore::app()->SSettings->$settingsKey);
        if ($data === false) $data = array();
        $data = array_map('encode',$data);

        $this->pdf->SetFont('dejavusanscondensed','',9);
        $this->drawTextUnderLine($data['receiverName'],$x,$y-5);
        $this->drawTextUnderLine($data['receiverInn'],$x,$y+5);
        $this->drawTextUnderLine($data['account'],$x+75,$y+5);
        $this->drawTextUnderLine($data['bankName'],$x,$y+$lineStep*3);
        $this->drawTextUnderLine($data['BIK'],$x+10,$y+$lineStep*5);
        $this->drawTextUnderLine('№ '.$data['cor_account'],$x+75,$y+$lineStep*5);
        $this->drawTextUnderLine('Оплата заказа номер '.$this->order->getId(),$x,$y+$lineStep*7);

        // Draw amount
        $amount = ShopCore::app()->SCurrencyHelper->convert( $this->order->getTotalPrice(), $this->paymentMethod->getCurrencyId());
        $amount = explode('.', $amount);
        $amount = $amount[0].' '.$data['bankNote'].' '.$amount[1].' '.$data['bankNote2'];

        $this->pdf->SetFont('dejavusanscondensed','',8);
        $this->drawTextUnderLine($amount,$x+108,$y+$lineStep*11);
        $this->pdf->SetFont('dejavusanscondensed','',9);
        $this->drawTextUnderLine($amount,$x+108,$y+$lineStep*12);
        $this->pdf->SetFont('dejavusanscondensed','',8);
    }

    /**
     * Draw text
     *
     * @string  $text
     * @float  $x
     * @float  $y
     * @float  $width
     * @float  $height
     * @return void
     */
    protected function drawTextUnderLine($text, $x, $y)
    {
        $this->pdf->SetXY($x,$y);
        $this->pdf->Write(5, $text);
    }

    /**
     * Create payment form
     *
     * @return string Generated form
     */
    public function getForm()
    {
        $form = '
        <form method="get" action="{URL}" target="_blank">
            <input type="hidden" value="{PM}"  name="pm">
            <input type="hidden" value="true"  name="getPdf">
            {PAY_BUTTON}
        </form>';

        $replace = array(
            '{PM}'         => $this->paymentMethod->getId(),
            '{URL}'        => shop_url('cart/view/'.$this->order->getKey()),
            '{PAY_BUTTON}' => $this->getPayButton(),
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
        $settingsKey = $this->paymentMethod->getId().'_SberBankData';
        $data = unserialize(ShopCore::app()->SSettings->$settingsKey);
        if ($data === false) $data = array();
        $data = array_map('encode',$data);

        $form = '
            <div class="form_text">Наименование получателя:</div>
            <div class="form_input">
                <input type="text" name="bank[receiverName]" value="'.$data['receiverName'].'" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Банк получателя:</div>
            <div class="form_input">
                <input type="text" name="bank[bankName]" value="'.$data['bankName'].'" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>        

            <div class="form_text">ИНН Получателя:</div>
            <div class="form_input">
                <input type="text" name="bank[receiverInn]" value="'.$data['receiverInn'].'" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>


            <div class="form_text">Счет получателя:</div>
            <div class="form_input">
                <input type="text" name="bank[account]" value="'.$data['account'].'" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">БИК:</div>
            <div class="form_input">
                <input type="text" name="bank[BIK]" value="'.$data['BIK'].'" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Корреспондентский счёт:</div>
            <div class="form_input">
                <input type="text" name="bank[cor_account]" value="'.$data['cor_account'].'" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>
        
            <div class="form_text">Денежный знак:</div>
            <div class="form_input">
                <input type="text" name="bank[bankNote]" value="'.$data['bankNote'].'" class="textbox_long" />
            </div>
            <div class="form_overflow"></div>

            <div class="form_text">Копейка:</div>
            <div class="form_input">
                <input type="text" name="bank[bankNote2]" value="'.$data['bankNote2'].'" class="textbox_long" />
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
        $saveKey = $paymentMethod->getId().'_SberBankData';
        ShopCore::app()->SSettings->set($saveKey, serialize($_POST['bank']));

        // Clear font cache
        $ci =& get_instance();
        $ci->cache->delete('SberBankInvoice');

        return true;
    }
}