<?php



/**
 * This class defines the structure of the 'shop_delivery_methods_systems' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.Shop.map
 */
class ShopDeliveryMethodsSystemsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.ShopDeliveryMethodsSystemsTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('shop_delivery_methods_systems');
		$this->setPhpName('ShopDeliveryMethodsSystems');
		$this->setClassname('ShopDeliveryMethodsSystems');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('DELIVERY_METHOD_ID', 'DeliveryMethodId', 'INTEGER' , 'shop_delivery_methods', 'ID', true, null, null);
		$this->addForeignPrimaryKey('PAYMENT_METHOD_ID', 'PaymentMethodId', 'INTEGER' , 'shop_payment_methods', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SDeliveryMethods', 'SDeliveryMethods', RelationMap::MANY_TO_ONE, array('delivery_method_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('PaymentMethods', 'SPaymentMethods', RelationMap::MANY_TO_ONE, array('payment_method_id' => 'id', ), null, null);
	} // buildRelations()

} // ShopDeliveryMethodsSystemsTableMap
