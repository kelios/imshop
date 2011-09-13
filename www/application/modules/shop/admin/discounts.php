<?php

/**
 * ShopAdminDiscounts
 * 
 * @uses ShopAdminController
 * @package 
 * @version $id$
 * @copyright 
 * @author <dev@imagecms.net>
 * @license 
 */
class ShopAdminDiscounts extends ShopAdminController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display list of discounts
     * 
     * @access public
     */
    public function index()
    {
        $model = ShopDiscountsQuery::create()
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
        $model = new ShopDiscounts;

        if ($_POST)
        {
            $_POST['Active'] = (boolean) $_POST['Active'];
            $_POST['Categories'] = serialize($_POST['Categories']);

            if (!empty($_POST['DateStart']))
                $_POST['DateStart'] = strtotime($_POST['DateStart']);

            if (!empty($_POST['DateStop']))
                $_POST['DateStop'] = strtotime($_POST['DateStop']);

            $this->form_validation->set_rules($model->rules());
		    
            if ($this->form_validation->run($this) == FALSE)
            {
                showMessage(validation_errors());
            }
            else
            {
                $model->fromArray($_POST);
                $model->save();
                showMessage('Скидка создана');

                $this->_redirect($model->getId());
            }
        }
        else
        {
            $this->render('create',array(
                'model'=>$model,
                'categoriesTree'=>ShopCore::app()->SCategoryTree->getTree(),
            ));
        }
    }

    /**
     * Edit discount
     *
     * @param  $id
     * @return void
     */
    public function edit($id=null)
    {       
        $model = ShopDiscountsQuery::create()->findPk($id);

        if ($_POST)
        {
            $_POST['Active'] = (boolean) $_POST['Active'];
            $_POST['Categories'] = serialize($_POST['Categories']);
            
            if (!empty($_POST['DateStart']))
                $_POST['DateStart'] = strtotime($_POST['DateStart']);

            if (!empty($_POST['DateStop']))
                $_POST['DateStop'] = strtotime($_POST['DateStop']);


            $this->form_validation->set_rules($model->rules());

            if ($this->form_validation->run($this) == FALSE)
            {
                showMessage(validation_errors());
            }
            else
            {
                $model->fromArray($_POST);
                $model->setUserGroup(serialize($_POST['roles']));
                $model->save();
                showMessage('Изменения сохранены');

                $this->_redirect($model->getId());
            }
        }
        else
        {
            $this->render('edit',array(
                'model'=>$model,
                'categoriesTree'=>ShopCore::app()->SCategoryTree->getTree(),
                'roles'=>ShopCore::$ci->db->order_by('alt_name')->get('roles')->result_array(),
            ));
        }
    }

    public function delete()
    {
        $model = ShopDiscountsQuery::create()->findPk($_POST['id']);

        if ($model){
            $model->delete();
        }
    }

    public function _redirect($id = null)
    {
        if ($_POST['_add'])
            $redirect_url = 'discounts/index';

        if ($_POST['_create'])
            $redirect_url = 'discounts/create';

        if ($_POST['_edit'] && $id != null)
            $redirect_url = 'discounts/edit/'.$id;

        if ($redirect_url !== false)
            $this->ajaxShopDiv($redirect_url);
    }

}
