<?php

class ShopBaseObject extends BaseObject {

    public function getLabel($attributeName)
    {
        if (method_exists($this,'attributeLabels'))
        {
            $labels = $this->attributeLabels();
            
            if (isset($labels[$attributeName]))
            {
                return $labels[$attributeName];
            }
            else
            {
                return $attributeName;
            }
        }
    }

    /**
     * Convert model attribute(by default Price). e.g. "99.99 $"
     * 
     * @param string $attributeName Optional. Attribute name to convert.
     * @access public
     * @return string
     */
    public function toCurrency($attributeName = 'Price')
    {
        $get = 'get'.$attributeName;
        return ShopCore::app()->SCurrencyHelper->convert($this->$get());
    }

    /**
     * Simple getter.
     *
     * @param  $name
     * @return
     */
    public function __get($name)
    {
        if (isset($this->$name))
            return $this->$name;

        $call = 'get'.$name;
        if (method_exists($this, $call))
            return $this->$call();
    }
}
