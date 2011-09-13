<?php



/**
 * This class defines the structure of the 'shop_settings' table.
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
class ShopSettingsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.ShopSettingsTableMap';

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
		$this->setName('shop_settings');
		$this->setPhpName('ShopSettings');
		$this->setClassname('ShopSettings');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('VALUE', 'Value', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // ShopSettingsTableMap
