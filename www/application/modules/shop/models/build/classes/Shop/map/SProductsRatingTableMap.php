<?php



/**
 * This class defines the structure of the 'shop_products_rating' table.
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
class SProductsRatingTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Shop.map.SProductsRatingTableMap';

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
		$this->setName('shop_products_rating');
		$this->setPhpName('SProductsRating');
		$this->setClassname('SProductsRating');
		$this->setPackage('Shop');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('PRODUCT_ID', 'ProductId', 'INTEGER' , 'shop_products', 'ID', true, 11, null);
		$this->addColumn('VOTES', 'Votes', 'INTEGER', false, 11, null);
		$this->addColumn('RATING', 'Rating', 'INTEGER', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SProducts', 'SProducts', RelationMap::MANY_TO_ONE, array('product_id' => 'id', ), null, null);
	} // buildRelations()

} // SProductsRatingTableMap
