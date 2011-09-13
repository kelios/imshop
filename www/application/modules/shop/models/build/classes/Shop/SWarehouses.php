<?php



/**
 * Skeleton subclass for representing a row from the 'shop_warehouse' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class SWarehouses extends BaseSWarehouses {

	public function attributeLabels()
	{
		return array(
			'Name'=>ShopCore::t('Название'),
			'Address'=>ShopCore::t('Адрес'),
			'Phone'=>ShopCore::t('Телефон'),
			'Description'=>ShopCore::t('Описание'),
		);
	}

    public function rules()
    {
        return array(
           array(
                 'field'=>'Name',
                 'label'=>$this->getLabel('Name'),
                 'rules'=>'required'
              ),
        );
    }    

} // SWarehouses
