<?php
/**
 * Class to generate properties forms.
 * 
 * @package Shop
 * @version $id$
 * @author <dev@imagecms.net>
 */
class SPropertiesRenderer {

    public $inputsName = 'productProperties';
    public $noValueText = '- none -';
    public $useMultipleSelect = false;

    protected $properties = null;
    protected $productModel = null;
    protected $propertiesData = array();

    public function __construct()
    {
        ShopCore::$ci->load->helper('form');
    }

    /**
     * Render properties form for admin panel. Used in create/edit products.
     * 
     * @param mixed $categoryId Category Id
     * @access public
     * @return string
     */
    public function renderAdmin($categoryId, $productModel = null)
    {
        $categoryModel = SCategoryQuery::create()
            ->findPk((int) $categoryId); 

        if ($categoryModel === null)
            return false;

        $properties = $categoryModel->getPropertys();
    
        if (sizeof($properties) == 0)
        {
            return false;
        }

        if ($productModel instanceof SProducts)
        {
            $this->productModel = $productModel;
            $this->_loadProductPropertiesData();
        }

        $resultHtml = '';
        foreach ($properties as $property)
        {
            if ($property->getActive() === TRUE)
            {
                $resultHtml .='
                <div class="form_text">'.ShopCore::encode($property->getName()).':</div>
                <div class="form_input">'.$this->_renderInput($property).'</div>
                <div class="form_overflow"></div>';
            }
        }

        return $resultHtml;
    }

    protected function _renderInput(SProperties $property)
    {
        $data = $property->asArray();
        $name = $this->inputsName.'['.$property->getId().']';

        // Render select
        if (sizeof($data) > 0)
        {
            array_unshift($data, $this->noValueText);
            $data = array_combine($data,$data);

            if ($this->useMultipleSelect === true)
            {
                $multiple = 'multiple';
                $name .= '[]';
            }
            else
                $multiple = null;

            return form_dropdown($name, $data, $this->_getProductPropertyValue($property->getId()), $multiple);
        }
        else 
        {
            // Render textbox
            $inputData = array(
              'name' => $name,
              'value' => $this->_getProductPropertyValue($property->getId()),
              'class' => 'textbox_long',
            );

            return form_input($inputData);
        }
    }

    protected function _loadProductPropertiesData()
    {        
        if ($this->productModel === null)
            return false;

        $cr = new Criteria;
        $cr->addAscendingOrderByColumn('Position');
        $propertiesData = $this->productModel->getSProductPropertiesDatasJoinSProperties($cr);

        if (sizeof($propertiesData) > 0)
        {
            foreach ($propertiesData as $p)
            {
                $this->propertiesData[$p->getPropertyId()] = $p;
            }
        }else{
            $this->propertiesData = array();
        }
    }

    protected function _getProductPropertyValue($propertyId)
    {
        if ($this->propertiesData[$propertyId])
        {
            $property = $this->propertiesData[$propertyId];
            return ShopCore::encode($property->getValue());
        }
        else
        {
                return ShopCore::$_GET['productProperties'][$propertyId];
        }

        return null;
    }

    /**
     * Render table containing product properties data. 
     * 
     * @param SProducts $product 
     * @access public
     * @return mixed string or null.
     */
    public function renderPropertiesTable(SProducts $product)
    {
        $this->productModel = $product;
        $this->_loadProductPropertiesData();

        if (sizeof($this->propertiesData) > 0)
        {
            $table = ShopCore::$ci->load->library('table', TRUE);
            $table->set_template(array(
                'table_open'=>'<table border="0" cellpadding="4" cellspacing="0" class="productPropertiesTable">'
            ));

            foreach ($this->propertiesData as $property)
            {
                if ($property->getSProperties()->getActive() === TRUE && $property->getSProperties()->getShowOnSite() === TRUE)
                {
                    $table->add_row(ShopCore::encode($property->getSProperties()->getName()), ShopCore::encode($property->getValue()));
                }
            }

            return $table->generate();
        }

        return null;
    }

    public function renderPropertiesArray(SProducts $product)
    {
        $result = array();
        $this->productModel = $product;
        $this->_loadProductPropertiesData();

         if (sizeof($this->propertiesData) > 0)
        {
            foreach ($this->propertiesData as $property)
            {
                $result[ShopCore::encode($property->getSProperties()->getName())] = ShopCore::encode($property->getValue());
            }

            return $result;
        }

        return array();
    }
}
