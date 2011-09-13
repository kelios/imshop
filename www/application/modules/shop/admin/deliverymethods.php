<?php
/**
 * ShopAdminBrands
 * 
 * @uses ShopController
 * @package 
 * @version $id$
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net> 
 * @license 
 */
class ShopAdminDeliveryMethods extends ShopAdminController {


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    /**
     * Create new brand
     * 
     * @access public
     */
    public function create()
    {
        $model = new SDeliveryMethods;

        if ($_POST)
        {
            $model->fromArray($_POST);
            $this->form_validation->set_rules($model->rules());  

            if ($this->form_validation->run($this) == FALSE)
            {
                showMessage(validation_errors());
            }
            else
            {
                $model->save();

                // Clear payment systems relation
                ShopDeliveryMethodsSystemsQuery::create()->filterByDeliveryMethodId($model->getId())
                        ->delete();

                if (sizeof($_POST['paymentMethods']) > 0)
                {
                    foreach ($_POST['paymentMethods'] as $key=>$val)
                    {
                        $pm = SPaymentMethodsQuery::create()->findPk($val);
                        if ($pm instanceof SPaymentMethods)
                            $model->addPaymentMethods($pm);
                    }
                }

                $model->save();                

                $this->redirect($model);
            }
        }
        else
        {
            $this->render('create', array(
                'model'=>$model,
                'paymentMethods'=>SPaymentMethodsQuery::create()->orderByPosition()->find(),
            ));
        }
    }

    public function edit($deliveryMethodId = null)
    {
        $model = SDeliveryMethodsQuery::create()->findPk((int) $deliveryMethodId);

        if ($model===null)
            $this->error404('Способ доставки не найден');

        if (!empty($_POST))
        {
            $this->form_validation->set_rules($model->rules());
		    
            if ($this->form_validation->run($this) == FALSE)
            {
                showMessage(validation_errors());
            }
            else
            {
                if (!$_POST['Enabled'])
                    $_POST['Enabled'] = false;

                $model->fromArray($_POST);
                $model->save();

                // Clear payment systems relation
                ShopDeliveryMethodsSystemsQuery::create()->filterByDeliveryMethodId($model->getId())
                        ->delete();

                if (sizeof($_POST['paymentMethods']) > 0)
                {
                    foreach ($_POST['paymentMethods'] as $key=>$val)
                    {
                        $pm = SPaymentMethodsQuery::create()->findPk($val);
                        if ($pm instanceof SPaymentMethods)
                            $model->addPaymentMethods($pm);
                    }
                }

                $model->save();

                showMessage('Изменения сохранены');
                $this->redirect($model);
    		}
        }
        else
        {
            $this->render('edit',array(
                'model'=>$model,
                'paymentMethods'=>SPaymentMethodsQuery::create()->orderByPosition()->find(),
            ));
        } 

    }

    public function delete()
    {
        $id = (int) $_POST['id'];
        $model = SDeliveryMethodsQuery::create()->findPk($id);

        if ($model != null)
            $model->delete();
    }

    public function c_list()
    {
        $model = SDeliveryMethodsQuery::create()
            ->orderByName()
            ->find();

        $this->render('list',array(
            'model'=>$model,            
        ));
    }

    protected function redirect($model = null)
    {
        // Redirect to list
        if ($_POST['_add'])
            $this->ajaxShopDiv('deliverymethods/c_list');

        // Redirect to create new object
        if ($_POST['_create'])
            $this->ajaxShopDiv('deliverymethods/create');

        if ($_POST['_edit'])
            $this->ajaxShopDiv('deliverymethods/edit/' . $model->getId());
    }
}
