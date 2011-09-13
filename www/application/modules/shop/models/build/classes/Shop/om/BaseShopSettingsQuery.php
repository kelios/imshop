<?php


/**
 * Base class that represents a query for the 'shop_settings' table.
 *
 * 
 *
 * @method     ShopSettingsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ShopSettingsQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method     ShopSettingsQuery groupByName() Group by the name column
 * @method     ShopSettingsQuery groupByValue() Group by the value column
 *
 * @method     ShopSettingsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShopSettingsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShopSettingsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShopSettings findOne(PropelPDO $con = null) Return the first ShopSettings matching the query
 * @method     ShopSettings findOneOrCreate(PropelPDO $con = null) Return the first ShopSettings matching the query, or a new ShopSettings object populated from the query conditions when no match is found
 *
 * @method     ShopSettings findOneByName(string $name) Return the first ShopSettings filtered by the name column
 * @method     ShopSettings findOneByValue(string $value) Return the first ShopSettings filtered by the value column
 *
 * @method     array findByName(string $name) Return ShopSettings objects filtered by the name column
 * @method     array findByValue(string $value) Return ShopSettings objects filtered by the value column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseShopSettingsQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseShopSettingsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'ShopSettings', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ShopSettingsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ShopSettingsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ShopSettingsQuery) {
			return $criteria;
		}
		$query = new ShopSettingsQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ShopSettings|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ShopSettingsPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    ShopSettingsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ShopSettingsPeer::NAME, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ShopSettingsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ShopSettingsPeer::NAME, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopSettingsQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ShopSettingsPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the value column
	 * 
	 * @param     string $value The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopSettingsQuery The current query, for fluid interface
	 */
	public function filterByValue($value = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($value)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $value)) {
				$value = str_replace('*', '%', $value);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ShopSettingsPeer::VALUE, $value, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ShopSettings $shopSettings Object to remove from the list of results
	 *
	 * @return    ShopSettingsQuery The current query, for fluid interface
	 */
	public function prune($shopSettings = null)
	{
		if ($shopSettings) {
			$this->addUsingAlias(ShopSettingsPeer::NAME, $shopSettings->getName(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseShopSettingsQuery
