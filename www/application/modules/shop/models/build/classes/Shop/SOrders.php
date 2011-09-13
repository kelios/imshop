<?php



/**
 * Skeleton subclass for representing a row from the 'shop_orders' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class SOrders extends BaseSOrders {

    public static $statuses = array(
        0=>'Новый', // Assigned by default for new orders.
        1=>'В обработке',
        2=>'Выполнен' 
    );

	public function attributeLabels()
	{
		return array(
			'Key'=>ShopCore::t('Ключ'),
			'DeliveryMethod'=>ShopCore::t('Метод доставки'),
			'DeliveryPrice'=>ShopCore::t('Цена доставки'),
			'Status'=>ShopCore::t('Статус'),
			'Paid'=>ShopCore::t('Оплачен'),
			'UserFullName'=>ShopCore::t('Полное Имя'),
			'UserEmail'=>ShopCore::t('Почта'),
			'UserPhone'=>ShopCore::t('Номер телефона'),
			'UserDeliverTo'=>ShopCore::t('Адрес доставки'),
			'UserComment'=>ShopCore::t('Комментарий'),
			'DateCreated'=>ShopCore::t('Дата создания'),
			'DateUpdated'=>ShopCore::t('Дата обновления'),
			'UserIp'=>ShopCore::t('Ip'),
		);
	}

    /**
     * Get total price for order
     *
     * @return int
     */
    public function getTotalPrice()
    {
        $totalPrice = 0;

        foreach ($this->getSOrderProductss() as $p)
        {
            $totalPrice = $totalPrice + $p->getPrice();
        }

        return $totalPrice + $this->getDeliveryPrice();
    }

} // SOrders
