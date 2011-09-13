<?php


/**
 * Base static class for performing query and update operations on the 'shop_category' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSCategoryPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'Shop';

	/** the table name for this class */
	const TABLE_NAME = 'shop_category';

	/** the related Propel class for this table */
	const OM_CLASS = 'SCategory';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'Shop.SCategory';

	/** the related TableMap class for this table */
	const TM_CLASS = 'SCategoryTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 12;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'shop_category.ID';

	/** the column name for the NAME field */
	const NAME = 'shop_category.NAME';

	/** the column name for the URL field */
	const URL = 'shop_category.URL';

	/** the column name for the ACTIVE field */
	const ACTIVE = 'shop_category.ACTIVE';

	/** the column name for the DESCRIPTION field */
	const DESCRIPTION = 'shop_category.DESCRIPTION';

	/** the column name for the META_DESC field */
	const META_DESC = 'shop_category.META_DESC';

	/** the column name for the META_TITLE field */
	const META_TITLE = 'shop_category.META_TITLE';

	/** the column name for the META_KEYWORDS field */
	const META_KEYWORDS = 'shop_category.META_KEYWORDS';

	/** the column name for the PARENT_ID field */
	const PARENT_ID = 'shop_category.PARENT_ID';

	/** the column name for the POSITION field */
	const POSITION = 'shop_category.POSITION';

	/** the column name for the FULL_PATH field */
	const FULL_PATH = 'shop_category.FULL_PATH';

	/** the column name for the FULL_PATH_IDS field */
	const FULL_PATH_IDS = 'shop_category.FULL_PATH_IDS';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';
	
	/**
	 * An identiy map to hold any loaded instances of SCategory objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array SCategory[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Url', 'Active', 'Description', 'MetaDesc', 'MetaTitle', 'MetaKeywords', 'ParentId', 'Position', 'FullPath', 'FullPathIds', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'name', 'url', 'active', 'description', 'metaDesc', 'metaTitle', 'metaKeywords', 'parentId', 'position', 'fullPath', 'fullPathIds', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::NAME, self::URL, self::ACTIVE, self::DESCRIPTION, self::META_DESC, self::META_TITLE, self::META_KEYWORDS, self::PARENT_ID, self::POSITION, self::FULL_PATH, self::FULL_PATH_IDS, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'NAME', 'URL', 'ACTIVE', 'DESCRIPTION', 'META_DESC', 'META_TITLE', 'META_KEYWORDS', 'PARENT_ID', 'POSITION', 'FULL_PATH', 'FULL_PATH_IDS', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'url', 'active', 'description', 'meta_desc', 'meta_title', 'meta_keywords', 'parent_id', 'position', 'full_path', 'full_path_ids', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Url' => 2, 'Active' => 3, 'Description' => 4, 'MetaDesc' => 5, 'MetaTitle' => 6, 'MetaKeywords' => 7, 'ParentId' => 8, 'Position' => 9, 'FullPath' => 10, 'FullPathIds' => 11, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'name' => 1, 'url' => 2, 'active' => 3, 'description' => 4, 'metaDesc' => 5, 'metaTitle' => 6, 'metaKeywords' => 7, 'parentId' => 8, 'position' => 9, 'fullPath' => 10, 'fullPathIds' => 11, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NAME => 1, self::URL => 2, self::ACTIVE => 3, self::DESCRIPTION => 4, self::META_DESC => 5, self::META_TITLE => 6, self::META_KEYWORDS => 7, self::PARENT_ID => 8, self::POSITION => 9, self::FULL_PATH => 10, self::FULL_PATH_IDS => 11, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'NAME' => 1, 'URL' => 2, 'ACTIVE' => 3, 'DESCRIPTION' => 4, 'META_DESC' => 5, 'META_TITLE' => 6, 'META_KEYWORDS' => 7, 'PARENT_ID' => 8, 'POSITION' => 9, 'FULL_PATH' => 10, 'FULL_PATH_IDS' => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'url' => 2, 'active' => 3, 'description' => 4, 'meta_desc' => 5, 'meta_title' => 6, 'meta_keywords' => 7, 'parent_id' => 8, 'position' => 9, 'full_path' => 10, 'full_path_ids' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. SCategoryPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(SCategoryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(SCategoryPeer::ID);
			$criteria->addSelectColumn(SCategoryPeer::NAME);
			$criteria->addSelectColumn(SCategoryPeer::URL);
			$criteria->addSelectColumn(SCategoryPeer::ACTIVE);
			$criteria->addSelectColumn(SCategoryPeer::DESCRIPTION);
			$criteria->addSelectColumn(SCategoryPeer::META_DESC);
			$criteria->addSelectColumn(SCategoryPeer::META_TITLE);
			$criteria->addSelectColumn(SCategoryPeer::META_KEYWORDS);
			$criteria->addSelectColumn(SCategoryPeer::PARENT_ID);
			$criteria->addSelectColumn(SCategoryPeer::POSITION);
			$criteria->addSelectColumn(SCategoryPeer::FULL_PATH);
			$criteria->addSelectColumn(SCategoryPeer::FULL_PATH_IDS);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.NAME');
			$criteria->addSelectColumn($alias . '.URL');
			$criteria->addSelectColumn($alias . '.ACTIVE');
			$criteria->addSelectColumn($alias . '.DESCRIPTION');
			$criteria->addSelectColumn($alias . '.META_DESC');
			$criteria->addSelectColumn($alias . '.META_TITLE');
			$criteria->addSelectColumn($alias . '.META_KEYWORDS');
			$criteria->addSelectColumn($alias . '.PARENT_ID');
			$criteria->addSelectColumn($alias . '.POSITION');
			$criteria->addSelectColumn($alias . '.FULL_PATH');
			$criteria->addSelectColumn($alias . '.FULL_PATH_IDS');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(SCategoryPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			SCategoryPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     SCategory
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = SCategoryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return SCategoryPeer::populateObjects(SCategoryPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			SCategoryPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      SCategory $value A SCategory object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(SCategory $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A SCategory object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof SCategory) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SCategory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     SCategory Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to shop_category
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
		// Invalidate objects in ShopProductCategoriesPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ShopProductCategoriesPeer::clearInstancePool();
		// Invalidate objects in ShopProductPropertiesCategoriesPeer instance pool, 
		// since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
		ShopProductPropertiesCategoriesPeer::clearInstancePool();
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = SCategoryPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = SCategoryPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = SCategoryPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				SCategoryPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (SCategory object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = SCategoryPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = SCategoryPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + SCategoryPeer::NUM_COLUMNS;
		} else {
			$cls = SCategoryPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			SCategoryPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}
	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseSCategoryPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseSCategoryPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new SCategoryTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? SCategoryPeer::CLASS_DEFAULT : SCategoryPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a SCategory or Criteria object.
	 *
	 * @param      mixed $values Criteria or SCategory object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from SCategory object
		}

		if ($criteria->containsKey(SCategoryPeer::ID) && $criteria->keyContainsValue(SCategoryPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.SCategoryPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a SCategory or Criteria object.
	 *
	 * @param      mixed $values Criteria or SCategory object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(SCategoryPeer::ID);
			$value = $criteria->remove(SCategoryPeer::ID);
			if ($value) {
				$selectCriteria->add(SCategoryPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(SCategoryPeer::TABLE_NAME);
			}

		} else { // $values is SCategory object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the shop_category table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += SCategoryPeer::doOnDeleteCascade(new Criteria(SCategoryPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(SCategoryPeer::TABLE_NAME, $con, SCategoryPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SCategoryPeer::clearInstancePool();
			SCategoryPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a SCategory or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or SCategory object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof SCategory) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SCategoryPeer::ID, (array) $values, Criteria::IN);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			// cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
			$c = clone $criteria;
			$affectedRows += SCategoryPeer::doOnDeleteCascade($c, $con);
			
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			if ($values instanceof Criteria) {
				SCategoryPeer::clearInstancePool();
			} elseif ($values instanceof SCategory) { // it's a model object
				SCategoryPeer::removeInstanceFromPool($values);
			} else { // it's a primary key, or an array of pks
				foreach ((array) $values as $singleval) {
					SCategoryPeer::removeInstanceFromPool($singleval);
				}
			}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			SCategoryPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
	 * feature (like MySQL or SQLite).
	 *
	 * This method is not very speedy because it must perform a query first to get
	 * the implicated records and then perform the deletes by calling those Peer classes.
	 *
	 * This method should be used within a transaction if possible.
	 *
	 * @param      Criteria $criteria
	 * @param      PropelPDO $con
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
	{
		// initialize var to track total num of affected rows
		$affectedRows = 0;

		// first find the objects that are implicated by the $criteria
		$objects = SCategoryPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


			// delete related ShopProductCategories objects
			$criteria = new Criteria(ShopProductCategoriesPeer::DATABASE_NAME);
			
			$criteria->add(ShopProductCategoriesPeer::CATEGORY_ID, $obj->getId());
			$affectedRows += ShopProductCategoriesPeer::doDelete($criteria, $con);

			// delete related ShopProductPropertiesCategories objects
			$criteria = new Criteria(ShopProductPropertiesCategoriesPeer::DATABASE_NAME);
			
			$criteria->add(ShopProductPropertiesCategoriesPeer::CATEGORY_ID, $obj->getId());
			$affectedRows += ShopProductPropertiesCategoriesPeer::doDelete($criteria, $con);
		}
		return $affectedRows;
	}

	/**
	 * Validates all modified columns of given SCategory object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      SCategory $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(SCategory $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SCategoryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SCategoryPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(SCategoryPeer::DATABASE_NAME, SCategoryPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     SCategory
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = SCategoryPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(SCategoryPeer::DATABASE_NAME);
		$criteria->add(SCategoryPeer::ID, $pk);

		$v = SCategoryPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(SCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(SCategoryPeer::DATABASE_NAME);
			$criteria->add(SCategoryPeer::ID, $pks, Criteria::IN);
			$objs = SCategoryPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseSCategoryPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSCategoryPeer::buildTableMap();

