<?php

/**
 * ShopAdminPaymentMethods 
 * 
 * @uses ShopAdminController
 * @package 
 * @version $id$
 * @copyright 
 * @author <dev@imagecms.net> 
 * @license 
 */
class ShopAdminPaymentMethods extends ShopAdminController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display all payment methods.
     * 
     * @access public
     */
    public function index()
    {
        $model = SPaymentMethodsQuery::create()
            ->orderByPosition()
            ->find();

        $this->render('list',array(
            'model'=>$model,
        ));
    }

    /**
     * Create new payment method.
     * 
     * @access public
     */
    public function create()
    {
        $model = new SPaymentMethods;

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

                $posModel = SPaymentMethodsQuery::create()
                    ->select('Position')
                    ->orderByPosition('Desc')
                    ->limit(1)
                    ->find();

                $model->setPosition($posModel[0] + 1);

                $model->save();
                
                showMessage('Способ оплати создан');

                $this->_redirect($model);
            } 
        }
        else
        {
            $this->render('create',array(
                'model'=>$model,
                'currencies'=>SCurrenciesQuery::create()->find() 
            ));
        }
    }

    public function edit($id)
    {
        $model = SPaymentMethodsQuery::create()
            ->findPk((int) $id);

        if ($model === null)
            $this->error404('Способ оплаты не нaйден.');

        $systemClass = ShopCore::app()->SPaymentSystems->loadPaymentSystem($model->getPaymentSystemName());

        // Get settings form
        if (method_exists($systemClass,'getForm'))
        {
            $systemClass->paymentMethod = $model;
            $paymentSystemForm = $systemClass->getAdminForm();
        }

        if ($_POST)
        {
            // Validate paymentSystem data.
             $systemClass = ShopCore::app()->SPaymentSystems->loadPaymentSystem($_POST['PaymentSystemName']);

            if (method_exists($systemClass,'saveSettings'))
            {
                $result = $systemClass->saveSettings($model);
                if ($result !== true)
                    showMessage($result);
            }

            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE)
            {
               showMessage(validation_errors());
            }
            else
            {
                $_POST['Active'] = (boolean) $_POST['Active'];

                $model->fromArray($_POST);
                $model->save();
                
                showMessage('Изменения сохранены.');

                $this->_redirect($model);
            } 
        }
        else
        {
            $this->render('edit',array(
                'model'=>$model,
                'currencies'=>SCurrenciesQuery::create()->find(),
                'paymentSystemForm'=>$paymentSystemForm,
            ));
        }
    }

    /**
     * Delete payment method by id.
     * 
     * @access public
     */
    public function delete()
    {
        $id = (int) $_POST['id'];

        $model = SPaymentMethodsQuery::create()
            ->findPk($id);

        if ($model)
            $model->delete();
    }

    /**
     * Save payment methods positions.
     * 
     * @access public
     */
    public function savePositions()
    {
        if (sizeof($_POST['positions']) > 0)
        {
            foreach ($_POST['positions'] as $id=>$pos)
            {
                SPaymentMethodsQuery::create()
                    ->filterById($id)
                    ->update(array('Position'=>(int)$pos));
            }
        }
    }

    protected function _redirect($model = null)
    {
        if ($_POST['_add'])
            $redirect_url = 'paymentmethods/index';

        if ($_POST['_create'])
            $redirect_url = 'paymentmethods/create';

        if ($_POST['_edit'])
            $redirect_url = 'paymentmethods/edit/' . $model->getId();

        if ($redirect_url !== false)
            $this->ajaxShopDiv($redirect_url);
    }

    public function getAdminForm($systemName = null, $paymentMethodId=null)
    {
        $class = ShopCore::app()->SPaymentSystems->loadPaymentSystem($systemName);


        if (is_object($class))
        {
            $class->paymentMethod = SPaymentMethodsQuery::create()->findPk($paymentMethodId);
            echo $class->getAdminForm();
        }
    }

}