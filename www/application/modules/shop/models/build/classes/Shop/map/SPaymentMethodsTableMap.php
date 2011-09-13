<?php



/**
 * This class defines the structure of the 'shop_payment_methods' table.
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
class SPaymentMethodsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SPaymentMethodsTableMap';

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
		$this->setName('shop_payment_methods');
		$this->setPhpName('SPaymentMethods');
		$this->setClassname('SPaymentMethods');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', false, null, null);
		$this->addForeignKey('CURRENCY_ID', 'CurrencyId', 'INTEGER', 'shop_currencies', 'ID', false, 11, null);
		$this->addColumn('PAYMENT_SYSTEM_NAME', 'PaymentSystemName', 'VARCHAR', false, 255, null);
		$this->addColumn('POSITION', 'Position', 'INTEGER', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Currency', 'SCurrencies', RelationMap::MANY_TO_ONE, array('currency_id' => 'id', ), null, null);
    $this->addRelation('ShopDeliveryMethodsSystems', 'ShopDeliveryMethodsSystems', RelationMap::ONE_TO_MANY, array('id' => 'payment_method_id', ), null, null);
    $this->addRelation('SDeliveryMethods', 'SDeliveryMethods', RelationMap::MANY_TO_MANY, array(), null, null);
	} // buildRelations()

} // SPaymentMethodsTableMap
