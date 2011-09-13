<?php

/**
 * SCurrencyHelper 
 * 
 * @package 
 * @version $id$
 * @copyright 
 * @author <dev@imagecms.net> 
 * @license 
 */
class SCurrencyHelper {
 
    protected $currencies = array();
    public $default = null; // Default currency.
    public $current = null; // Currency to convert to.
    public $main = null; // Main currency.

    public function __construct()
    {
        // Load all currencies.
        $currencies = SCurrenciesQuery::create()
            ->find();

        foreach ($currencies as $c)
        {
            /**
             *  Set main currency
             */
            if ($c->getMain() == true)
                $this->main = $c;

            /**
             *  Set default currency
             */
            if ($c->getIsDefault() == true)
                $this->default = $c;

            $this->currencies[$c->getId()] = $c;
        }
    }

    /**
     * Convert price from default or selected currency to another currency
     * 
     * @param integer $price Price to convert
     * @access public
     * @return integer Converted price
     */
    public function convert($price, $currencyId = null)
    {
        if ($currencyId !== null && isset($this->currencies[$currencyId]))
        {
            $currency = $this->currencies[$currencyId];
        }else{
            $currency = $this->current;
        }

        $price = $currency->getRate() * $price;
        return money_format('%i', $price); 
    }

    /**
    * Convert sum from one currency to another
    */
    public function convertToMain($sum, $from)
    {
        if ($from == $this->main->getId()) return $sum;

        $from = $this->currencies[$from];
        $to = $this->main;

        $v1 = $from->getRate() / $to->getRate();
        return round($sum / $v1, 2);
    }

    /**
     * Get current currency symbol 
     * 
     * @param integer $id Currency id to get symbol.
     * @access public
     * @return string
     */
    public function getSymbol($id=null)
    {
        if ($this->current instanceof SCurrencies)
        {
            return $this->current->getSymbol();
        }
    }

	/**
     * Get currencies array
     * 
     * @access public
     * @return SCurrencies
     */
    public function getCurrencies()
    {
		return $this->currencies;
    }

    public function initCurrentCurrency($id=null)
    {
        if ($id=='main')
        {
            $this->current = $this->main;
            return true;
        }

        if ($id=='default')
        {
            $this->current = $this->default;
            return true;
        }

        if ($id === null)
        {
            // Set current currency from default
            $this->current = $this->default;
        }
        else
        {
            // Check if currency exists.
            if (isset($this->currencies[$id]))
            {
                $this->current = $this->currencies[$id];
            }
            else
            {
                $this->current = $this->default;
            }
        }
    }
}
