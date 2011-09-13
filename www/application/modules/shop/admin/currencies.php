<?php

/**
 * ShopAdminCurrencies 
 * 
 * @uses ShopAdminController
 * @package 
 * @version $id$
 * @copyright 
 * @author <dev@imagecms.net> 
 * @license 
 */
class ShopAdminCurrencies extends ShopAdminController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display list of currencies
     * 
     * @access public
     */
    public function index()
    {
        $model = SCurrenciesQuery::create()
            ->find();

        $this->render('list',array(
            'model'=>$model,
        ));
    }

    /**
     * Create new currency
     * 
     * @access public
     * @return void
     */
    public function create()
    {
        $model = new SCurrencies;

        if ($_POST)
        {
            $this->form_validation->set_rules($model->rules());
		    
            if ($this->form_validation->run($this) == FALSE)
            {
                showMessage(validation_errors());
            }
            else
            {
                $model->fromArray($_POST);
                $model->save();
                showMessage('Валюта создана');

                $this->_redirect($model->getId());
            }
        }
        else
        {
            $this->render('create',array(
                'model'=>$model,            
            ));
        }
    }

    /**
     * Edit currency
     * 
     * @access public
     */
    public function edit($id)
    {
        $model = SCurrenciesQuery::create()
            ->findPk($id);

        if ($model === null)
            $this->error404('Валюта не найдена.');

        if ($_POST)
        {
            $this->form_validation->set_rules($model->rules());
		    
            if ($this->form_validation->run($this) == FALSE)
            {
                showMessage(validation_errors());
            }
            else
            {
                $model->fromArray($_POST);
                $model->save();

                showMessage('Изменения сохранены.');
                
                $this->_redirect($model->getId());
            }
        }
        else
        {
            $this->render('edit',array(
                'model'=>$model,            
            ));
        }
    }

    /**
     * makeCurrencyDefault 
     * 
     * @access public
     */
    public function makeCurrencyDefault()
    {
        $id = (int) $_POST['id'];

        $model = SCurrenciesQuery::create()
            ->findPk($id);

        if ($model !== null)
        {
            SCurrenciesQuery::create()->update(array('IsDefault'=>false));

            $model->setIsDefault(true);
            $model->save();
        }        
    }

    /**
     * makeCurrencyMain 
     * 
     * @access public
     */
    public function makeCurrencyMain()
    {
        $id = (int) $_POST['id'];
        $recount = $_POST['recount'];

        $model = SCurrenciesQuery::create()
            ->findPk($id);

        if ($model !== null)
        {
            SCurrenciesQuery::create()->update(array('Main'=>false));

            $model->setMain(true);
            $model->save();

            if ($recount == '1')
            {
                // recount prices;
            }
        }
    }

    /**
     * Delete currency
     * 
     * @access public
     */
    public function delete()
    {
        $model = SCurrenciesQuery::create()
            ->findPk($_POST['id']);

        if ($model !== null)
        {
            if ($model->getMain() == true)
            {
                showMessage('Невозможно удалить главную валюту.');
                exit;
            }

            if ($model->getIsDefault() == true)
            {
                showMessage('Невозможно удалить валюту по умолчанию.');
                exit;
            }

            $paymentMethodsCount = SPaymentMethodsQuery::create()
                ->filterByCurrencyId($model->getId())
                ->count();

            if ($paymentMethodsCount > 0)
            {
                showMessage('Ошибка. Валюту используют другие объекты. Проверьте способы оплаты.');
                exit;
            }

            $model->delete();
        }
    }

    public function _redirect($id = null)
    {
        if ($_POST['_add'])
            $redirect_url = 'currencies/index';

        if ($_POST['_create'])
            $redirect_url = 'currencies/create';

        if ($_POST['_edit'] && $id != null)
            $redirect_url = 'currencies/edit/'.$id;

        if ($redirect_url !== false)
            $this->ajaxShopDiv($redirect_url);
        
    }

}
