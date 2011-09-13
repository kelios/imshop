<?php

/**
 * Skeleton subclass for representing a row from the 'shop_currencies' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class SCurrencies extends BaseSCurrencies {

	public function attributeLabels()
	{
		return array(
			'Name'=>ShopCore::t('Название'),
			'Main'=>ShopCore::t('Главная'),
			'IsDefault'=>ShopCore::t('По-умолчанию'),
			'Code'=>ShopCore::t('Iso Код'),
			'Symbol'=>ShopCore::t('Символ'),
			'Rate'=>ShopCore::t('Курс'),
		);
	}

    public function rules()
    {
        return array(
           array(
                 'field'=>'Name',
                 'label'=>$this->getLabel('Name'),
                 'rules'=>'required|min_length[2]'
              ),
           array(
                 'field'=>'Code',
                 'label'=>$this->getLabel('Code'),
                 'rules'=>'required|max_length[5]',
              ),
           array(
                 'field'=>'Symbol',
                 'label'=>$this->getLabel('Symbol'),
                 'rules'=>'required|max_length[5]',
              ),
           array(
                 'field'=>'Rate',
                 'label'=>$this->getLabel('Rate'),
                 'rules'=>'required|numeric',
              ),
        );
    }

} // SCurrencies
