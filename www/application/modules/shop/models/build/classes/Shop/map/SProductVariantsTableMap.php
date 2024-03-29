<?php



/**
 * This class defines the structure of the 'shop_product_variants' table.
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
class SProductVariantsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SProductVariantsTableMap';

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
		$this->setName('shop_product_variants');
		$this->setPhpName('SProductVariants');
		$this->setClassname('SProductVariants');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PRODUCT_ID', 'ProductId', 'INTEGER', 'shop_products', 'ID', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 500, null);
		$this->addColumn('PRICE', 'Price', 'FLOAT', true, null, null);
		$this->addColumn('NUMBER', 'Number', 'VARCHAR', false, 255, null);
		$this->addColumn('STOCK', 'Stock', 'INTEGER', false, null, null);
		$this->addColumn('POSITION', 'Position', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SProducts', 'SProducts', RelationMap::MANY_TO_ONE, array('product_id' => 'id', ), null, null);
	} // buildRelations()

} // SProductVariantsTableMap
