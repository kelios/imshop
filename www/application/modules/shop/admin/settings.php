<?php
/**
 * ShopAdminSettings class
 *
 * Saves shop settings
 */
 
class ShopAdminSettings extends ShopAdminController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display settings table
     *
     * @return string
     */
    public function index()
    {
        $this->render('settings', array(
            'templates'=>$this->_getTemplatesList(),
        ));
    }

    /**
     * Update settings
     *
     * @return void
     */
    public function update()
    {
        $data = array();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('images[mainImageWidth]', 'Основное изображение (ширина)', 'integer|required');
        $this->form_validation->set_rules('images[mainImageHeight]', 'Основное изображение (высота)', 'integer|required');
        $this->form_validation->set_rules('images[smallImageWidth]', 'Маленькое изображение (ширина)', 'integer|required');
        $this->form_validation->set_rules('images[smallImageHeight]', 'Маленькое изображение (высота)', 'integer|required');
        $this->form_validation->set_rules('images[addImageWidth]', 'Дополнительные изображения (ширина)', 'integer|required');
        $this->form_validation->set_rules('images[addImageHeight]', 'Дополнительные изображения (высота)', 'integer|required');
        $this->form_validation->set_rules('images[quality]', 'Качество', 'integer');
        $this->form_validation->set_rules('frontProductsPerPage', 'Количество товаров на сайте', 'integer|required');
        $this->form_validation->set_rules('adminProductsPerPage', 'Количество товаров в панели управления', 'integer|required');

        // Orders
        $this->form_validation->set_rules('orders[senderEmail]', 'Email адрес отправителя', 'valid_email|required');

        if ($this->form_validation->run() == false)
		{
			showMessage(validation_errors(), 'Ошибка');
            return false;
		}else{
            // Save image settings
            $data['mainImageWidth']   = $_POST['images']['mainImageWidth'];
            $data['mainImageHeight']  = $_POST['images']['mainImageHeight'];
            $data['smallImageWidth']  = $_POST['images']['smallImageWidth'];
            $data['smallImageHeight'] = $_POST['images']['smallImageHeight'];
            $data['addImageWidth']    = $_POST['images']['addImageWidth'];
            $data['addImageHeight']   = $_POST['images']['addImageHeight'];
            $data['imagesQuality']    = $_POST['images']['quality'];

            $data['frontProductsPerPage'] = $_POST['frontProductsPerPage'];
            $data['adminProductsPerPage'] = $_POST['adminProductsPerPage'];
            $data['systemTemplatePath']   = $_POST['systemTemplatePath'];

            // Orders
            $data['ordersMessageFormat'] = $_POST['orders']['messageFormat'];
            $data['ordersMessageText'] = $_POST['orders']['userMessageText'];
            $data['ordersSendMessage'] = $_POST['orders']['sendUserEmail'];
            $data['ordersSenderEmail'] = $_POST['orders']['senderEmail'];
            $data['ordersSenderName'] = $_POST['orders']['senderName'];
            $data['ordersMessageTheme'] = $_POST['orders']['theme'];

            ShopCore::app()->SSettings->fromArray($data);
            showMessage('Изменения сохранены');
        }
    }

    protected function _getTemplatesList()
    {
        $paths = array();
        $this->load->helper('directory');

        $dirs = array(
            './application/modules/shop/templates/*',
            './templates/*/shop/*',
        );

        foreach ($dirs as $dir)
        {
            $result = glob($dir, GLOB_ONLYDIR);
            if (is_array($result))
                $paths = array_merge($paths,$result);
        }

        if (sizeof($paths > 0))
        {
            return $paths;
        }else{
            return false;
        }
    }
}
