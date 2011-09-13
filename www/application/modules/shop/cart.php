<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Cart Controller
 * 
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net> 
 */
class Cart extends ShopController {

    public $maxRange = 10; // Max number of quantity.

	public function __construct()
	{
	    parent::__construct();
        $this->load->library('Form_validation');
        $this->_userId = $this->dx_auth->get_user_id();
	}

    /**
     * Display cart page.
     * 
     * @access public
     */
	public function index()
	{
        $this->load->helper('Form');
        $this->core->set_meta_tags(ShopCore::t('Корзина'));

        // Make order and clean cart.
        if ($_POST['makeOrder'] == 1)
            $this->_makeOrder();

        // Recount items
        if ($_POST['recount'] == 1)
        {
            ShopCore::app()->SCart->recount();
            redirect('shop/cart', 'refresh');
        }

        // Create ranges from dropdown list.
        $ranges = range(1, $this->maxRange);

        $this->render('cart', array(
            'items'=>ShopCore::app()->SCart->loadProducts(),
            'deliveryMethods'=>SDeliveryMethodsQuery::create()->enabled()->orderByName()->find(),
            'ranges'=>array_combine($ranges,$ranges),
            'profile'=>$this->_getUserProfile(),
        ));
    }

    /**
     * View order data.
     *
     * @param  $orderSecretKey
     * @return void
     */
    public function view($orderSecretKey = null)
    {
        // Support for Robokassa
        if (isset($_REQUEST['Shp_orderKey']) && isset($_REQUEST['Shp_pmId']))
        {
            $_GET['pm'] = $_REQUEST['Shp_pmId'];
            $orderSecretKey = $_REQUEST['Shp_orderKey'];
        }

        $model = SOrdersQuery::create()
                ->filterByKey($orderSecretKey)
                ->findOne();

        if ($model === null)
            $this->core->error_404();

        $this->load->module('core');
        $this->core->set_meta_tags(ShopCore::t('Просмотр заказа №'.$model->getId()));

        ShopCore::app()->SPaymentSystems->init($model);

        if (isset($_GET['pm']) && $_GET['pm'] > 0)
        {
            // Load paymentMethod
            $paymentMethod = SPaymentMethodsQuery::create()->findPk((int) $_GET['pm']);
            $paymentProcessor = ShopCore::app()->SPaymentSystems->loadPaymentSystem($paymentMethod->getPaymentSystemName(), $paymentMethod);
            if ($paymentProcessor instanceof BasePaymentProcessor)
            {
                // Process payment
                $paymentProcessor->processPayment();
            }
        }

        if ($model->getSDeliveryMethods() instanceof SDeliveryMethods)
		{
            $cr = new Criteria();
            $cr->add(SPaymentMethodsPeer::ACTIVE, TRUE, Criteria::EQUAL);
            $paymentMethods = $model->getSDeliveryMethods()->getPaymentMethodss($cr);
		}

        $this->render('order_view', array(
            'model'=>$model,
            'paymentMethods'=>$paymentMethods,
        ));
    }

    /**
     * Add product to cart from POST data.
     * 
     * @access public
     */
    public function add()
    {
        // Search for product and its variant
        $model = SProductsQuery::create()
            ->findPk((int) $_POST['productId']);

        if ($model !== null)
        {
            ShopCore::app()->SCart->add(array(
                'model'=>$model,
                'variantId'=>(int) $_POST['variantId'],
                'quantity'=>(int)$_POST['quantity'],
            ));
        }

        $this->session->set_flashdata('productAdded', true);

        if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest');
            $this->_redirectBack();
    }

    public function delete()
    {
        ShopCore::app()->SCart->removeOne($this->uri->segment($this->uri->total_segments()));
        $this->redirectToCart();
    }

    /**
     * Save ordered products to database
     * 
     * @access protected
     * @return void
     */
    protected function _makeOrder()
    {
        // Validate user data
        if ($this->_validateUserInfo() === false)
        {
            $this->template->add_array(array(
                'errors'=>validation_errors(),
            ));

            return false;
        }

        // Check if delivery method exists.
        $deliveryMethod = SDeliveryMethodsQuery::create()
            ->findPk((int) $_POST['deliveryMethodId']);

        if ($deliveryMethod === null)
        {
            $deliveryMethodId = 0;
            $deliveryPrice = 0;
        }
        else
        {
            $deliveryMethodId = $deliveryMethod->getId();
            $deliveryPrice = $deliveryMethod->getPrice();
        }

        $order = new SOrders;

        // Set user id if logged in
        if ($this->dx_auth->is_logged_in() === true)
            $order->setUserId($this->dx_auth->get_user_id());
        else
            $order->setUserId(0);

        $order->setKey(self::createCode());
        $order->setDeliveryMethod($deliveryMethodId);
        $order->setDeliveryPrice($deliveryPrice);
        $order->setStatus(0);
        $order->setUserFullName($_POST['userInfo']['fullName']);
        $order->setUserEmail($_POST['userInfo']['email']);
        $order->setUserPhone($_POST['userInfo']['phone']);
        $order->setUserDeliverTo($_POST['userInfo']['deliverTo']);
        $order->setUserComment($_POST['userInfo']['commentText']);
        $order->setDateCreated(time());
        $order->setDateUpdated(time());
        $order->setUserIp($this->input->ip_address());

        // Add products
        foreach (ShopCore::app()->SCart->loadProducts() as $cartItem)
        {
            if ($cartItem['model'] instanceof SProducts)
            {
                $orderedItem = new SOrderProducts;
                $orderedItem->fromArray(array(
                    'ProductId'=>$cartItem['productId'],
                    'VariantId'=>$cartItem['variantId'],
                    'ProductName'=>$cartItem['model']->getName(),
                    'VariantName'=>$cartItem['variantName'],
                    'Quantity'=>$cartItem['quantity'],
                    'Price'=>$cartItem['price'],
                ));

                $order->addSOrderProducts($orderedItem);
            }
        }

        $order->save();

        // Send email to user.
        $this->_sendMail($order);

        // Clear cart data.
        ShopCore::app()->SCart->removeAll();

        // Set flash data.
        $this->session->set_flashdata('makeOrder', true);

        // Redirect to view ordered prducts.
        redirect(shop_url('cart/view/'.$order->getKey()));
    }

    /**
     * Create random code.
     * 
     * @param int $charsCount 
     * @param int $digitsCount 
     * @static
     * @access public
     * @return string
     */
    public static function createCode($charsCount=3,$digitsCount=7)
    {
        $chars = array('q','w','e','r','t','y','u','i','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m');
        
        if ($charsCount > sizeof($chars))
            $charsCount = sizeof($chars); 
        
        $result = array();
        if ($charsCount > 0)
        {
            $randCharsKeys = array_rand($chars, $charsCount);

            foreach($randCharsKeys as $key=>$val)
                array_push($result, $chars[$val]);
        }

        for($i=0;$i<$digitsCount;$i++)
            array_push($result, rand(0,9));

        shuffle($result);
       
        $result = implode('', $result); 

        if (sizeof(SOrdersQuery::create()->filterByKey($result)->select(array('Key'))->limit(1)->find()) > 0)
            self::createCode($charsCount,$digitsCount);

        return $result;
    }

    /**
     * Validate user data.
     *
     * @return void
     */
    protected function _validateUserInfo()
    {
		$this->form_validation->set_rules('userInfo[fullName]', ShopCore::t('Имя, фамилия'), 'required|max_length[50]');
		$this->form_validation->set_rules('userInfo[email]', ShopCore::t('Email'), 'valid_email|required');
		$this->form_validation->set_rules('userInfo[phone]', ShopCore::t('Телефон'), '');
		$this->form_validation->set_rules('userInfo[deliverTo]', ShopCore::t('Адрес доставки'), '');
		$this->form_validation->set_rules('userInfo[commentText]', ShopCore::t('Комментарий к заказу'), '');
			
		if ($this->form_validation->run($this) == FALSE)
            return false;
		else
			return true;
    }

    /**
     * Send email to user.
     *
     * @param SOrders $order
     * @return void
     */
    protected function _sendMail(SOrders $order)
    {
        if (ShopCore::app()->SSettings->ordersSendMessage == 'false')
            return;

        $replaceData = array(
            '%userName%'=>$order->getUserFullName(),
            '%userEmail%'=>$order->getUserEmail(),
            '%userPhone%'=>$order->getUserPhone(),
            '%userDeliver%'=>$order->getUserDeliverTo(),
            '%orderId%'=>$order->getId(),
            '%orderKey%'=>$order->getKey(),
            '%orderLink%'=>shop_url('cart/view/'.$order->getKey()),
        );

        $replaceData = array_map('encode',$replaceData);

        $fromEmail = ShopCore::app()->SSettings->ordersSenderEmail;
        $shopName  = ShopCore::app()->SSettings->ordersSenderName;
        $theme     =  ShopCore::app()->SSettings->ordersMessageTheme;
        $message   = str_replace(array_keys($replaceData), $replaceData, ShopCore::app()->SSettings->ordersMessageText);

        $this->load->library('email');
        $config['mailtype'] = ShopCore::app()->SSettings->ordersMessageFormat;
        $this->email->initialize($config);

        $this->email->from($fromEmail, $shopName);
        $this->email->to($order->getUserEmail());
        $this->email->subject($theme);
        $this->email->message($message);
        $this->email->send();
    }

    public function clear()
    {
        ShopCore::app()->SCart->removeAll();
        $this->redirectToCart();
    }
    
    protected function _redirectBack()
    {
        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    protected function redirectToCart()
    {
        redirect(shop_url('cart'));
    }

    protected function _getUserProfile()
    {
        if (!$this->_userId) return array();

        $profile = SUserProfileQuery::create()->filterByUserId($this->_userId)->findOne();
        $user = $this->db->where('id', $this->_userId)->get('users')->row_array();

        if (!$profile) return array();

        return array(
            'name'=>$profile->getName(),
            'phone'=>$profile->getPhone(),
            'address'=>$profile->getAddress(),
            'email'=>$user['email'],
        );        
    }
}

/* End of file cart.php */
