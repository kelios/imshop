<?php

/**
 * Skeleton subclass for representing a row from the 'shop_payment_methods' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class SPaymentMethods extends BaseSPaymentMethods {

	public function attributeLabels()
	{
		return array(
			'Name'=>ShopCore::t('Название'),
			'Description'=>ShopCore::t('Описание'),
			'Active'=>ShopCore::t('Активен'),
			'Position'=>ShopCore::t('Позиция'),
		);
	}

    public function rules()
    {
        return array(
           array(
                 'field'=>'Name',
                 'label'=>$this->getLabel('Name'),
                 'rules'=>'required',
              ),
        );
    }

    /**
     * Get payment form
     *
     * @param SOrders $order
     * @return
     */
    public function getPaymentForm(SOrders $order)
    {
        if ($this->getPaymentSystemName() == '0')
        {
            return null;
        }

        $paymentSystemClass = ShopCore::app()->SPaymentSystems->loadPaymentSystem($this->getPaymentSystemName(), $this);

        if (method_exists($paymentSystemClass,'getForm'))
            return $paymentSystemClass->getForm();
        else
            return null;
    }

} // SPaymentMethods
