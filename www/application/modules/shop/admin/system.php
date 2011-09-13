<?php
/**
 * ShopCore class file
 *
 * @package Shop
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net>
 */

class ShopAdminSystem extends ShopAdminController {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Import products from CSV file
     * @return void
     */
    public function import()
    {
        if ($_POST)
        {
            if (!$this->checkFileExtension($_FILES['userfile']['name']))
            {
                echo $this->processErrors(array('Вы пытаетесь загрузить запрещенный тип файла.'));
                return false;
            }

            $importer = new ShopImport($_FILES['userfile']['tmp_name'], array(
                'attributes'=>trim($_POST['attributes']),
                'delimiter'=>trim($_POST['delimiter']),
                'enclosure'=>trim($_POST['enclosure']),
                'encoding'=>trim($_POST['encoding']),
            ));

            if (!$importer->hasErrors())
            {
                // Process import
                $importer->import();
            }else{
                // Display validation errors
                echo $this->processErrors($importer->getErrors());
            }
        }else{
            $this->render('import',array(
                'customFields'=>SPropertiesQuery::create()->orderByPosition()->find()
            ));
        }
    }

    /**
     * Export products to CSV file
     *
     * @return void
     */
    public function export()
    {
        if ($_POST)
        {
            $export = new ShopExport(array(
                'attributes'=>trim($_POST['attributes']),
                'delimiter'=>trim($_POST['delimiter']),
                'enclosure'=>trim($_POST['enclosure']),
                'encoding'=>trim($_POST['encoding']),
            ));

            if (!$export->hasErrors())
            {
                $this->load->helper('download');
                force_download('price.csv', $export->export());
            }else{
                echo $this->processErrors($export->getErrors());
            }
        }else{
            $this->render('export', array(
                'customFields'=>SPropertiesQuery::create()->orderByPosition()->find()
            ));
        }
    }

        /**
     * Create html box with errors.
     *
     * @param  array $errors Errors array
     * @return string
     */
    protected function processErrors(array $errors)
    {
        $result = '';
        foreach ($errors as $err)
        {
            $result .= $err.'<br/>';
        }

        return '<p class="errors">'.$result.'</p>';
    }

    /**
     * Check uploaded file extension
     *
     * @return boolean
     */
    protected function checkFileExtension($fileName)
    {
        $parts = explode('.', $fileName);

        if (end($parts) != 'csv')
        {
            return false;
        }else{
            return true;
        }
    }
}
