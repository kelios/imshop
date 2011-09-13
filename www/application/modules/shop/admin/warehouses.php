<?php
/**
 * ShopAdminWarehouses
 * 
 * @uses ShopController
 * @package 
 * @version $id$
 * @copyright 2011 Siteimage
 * @author <dev@imagecms.net> 
 * @license 
 */
class ShopAdminWarehouses extends ShopAdminController {


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display list of warehouses
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $this->render('list', array(
            'model'=>SWarehousesQuery::create()->orderByName()->find()
        )); 
    }

    /**
     * Create new warehouse
     * 
     * @access public
     */
    public function create()
    {
        $model = new SWarehouses;

        if (!empty($_POST))
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

                showMessage('Склад создан');

                if ($_POST['_add'])
                    $redirect_url = 'warehouses/index';

                if ($_POST['_create'])
                    $redirect_url = 'warehouses/create';

                if ($_POST['_edit'])
                    $redirect_url = 'warehouses/edit/' . $model->getId();

                $this->ajaxShopDiv($redirect_url);
    		} 
        }
        else
        {
            $this->render('create',array(
                'model'=>$model,
            ));
        } 
    }

    public function edit($id = null)
    {
        $model = SWarehousesQuery::create()->findPk((int) $id);

        if ($model===null)
            $this->error404('Склад не найден');

        if (!empty($_POST))
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

                showMessage('Изменения сохранены');

                if ($_POST['_add'])
                    $redirect_url = 'warehouses/index';

                if ($_POST['_create'])
                    $redirect_url = 'warehouses/create';

                if ($_POST['_edit'])
                    $redirect_url = 'warehouses/edit/' . $model->getId();

                $this->ajaxShopDiv($redirect_url);
    		} 
        }
        else
        {
            $this->render('edit',array(
                'model'=>$model,
            ));
        }             
    }

    public function delete()
    {
        $id = (int) $_POST['id'];
        $model = SWarehousesQuery::create()->findPk($id);

        if ($model != null)
            $model->delete();
    }

}
