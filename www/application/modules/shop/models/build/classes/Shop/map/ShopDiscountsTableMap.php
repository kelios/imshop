<?php



/**
 * This class defines the structure of the 'shop_discounts' table.
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
class ShopDiscountsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.ShopDiscountsTableMap';

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
		$this->setName('shop_discounts');
		$this->setPhpName('ShopDiscounts');
		$this->setClassname('ShopDiscounts');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', true, null, null);
		$this->addColumn('DATE_START', 'DateStart', 'INTEGER', false, 11, null);
		$this->addColumn('DATE_STOP', 'DateStop', 'INTEGER', false, 11, null);
		$this->addColumn('DISCOUNT', 'Discount', 'VARCHAR', false, 11, null);
		$this->addColumn('USER_GROUP', 'UserGroup', 'VARCHAR', false, 255, null);
		$this->addColumn('MIN_PRICE', 'MinPrice', 'FLOAT', false, null, null);
		$this->addColumn('MAX_PRICE', 'MaxPrice', 'FLOAT', false, null, null);
		$this->addColumn('CATEGORIES', 'Categories', 'LONGVARCHAR', false, null, null);
		$this->addColumn('PRODUCTS', 'Products', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // ShopDiscountsTableMap
