<?php


/**
 * Base class that represents a query for the 'shop_warehouse' table.
 *
 * 
 *
 * @method     SWarehousesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SWarehousesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SWarehousesQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     SWarehousesQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     SWarehousesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method     SWarehousesQuery groupById() Group by the id column
 * @method     SWarehousesQuery groupByName() Group by the name column
 * @method     SWarehousesQuery groupByAddress() Group by the address column
 * @method     SWarehousesQuery groupByPhone() Group by the phone column
 * @method     SWarehousesQuery groupByDescription() Group by the description column
 *
 * @method     SWarehousesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SWarehousesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SWarehousesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SWarehousesQuery leftJoinSWarehouseData($relationAlias = null) Adds a LEFT JOIN clause to the query using the SWarehouseData relation
 * @method     SWarehousesQuery rightJoinSWarehouseData($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SWarehouseData relation
 * @method     SWarehousesQuery innerJoinSWarehouseData($relationAlias = null) Adds a INNER JOIN clause to the query using the SWarehouseData relation
 *
 * @method     SWarehouses findOne(PropelPDO $con = null) Return the first SWarehouses matching the query
 * @method     SWarehouses findOneOrCreate(PropelPDO $con = null) Return the first SWarehouses matching the query, or a new SWarehouses object populated from the query conditions when no match is found
 *
 * @method     SWarehouses findOneById(int $id) Return the first SWarehouses filtered by the id column
 * @method     SWarehouses findOneByName(string $name) Return the first SWarehouses filtered by the name column
 * @method     SWarehouses findOneByAddress(string $address) Return the first SWarehouses filtered by the address column
 * @method     SWarehouses findOneByPhone(string $phone) Return the first SWarehouses filtered by the phone column
 * @method     SWarehouses findOneByDescription(string $description) Return the first SWarehouses filtered by the description column
 *
 * @method     array findById(int $id) Return SWarehouses objects filtered by the id column
 * @method     array findByName(string $name) Return SWarehouses objects filtered by the name column
 * @method     array findByAddress(string $address) Return SWarehouses objects filtered by the address column
 * @method     array findByPhone(string $phone) Return SWarehouses objects filtered by the phone column
 * @method     array findByDescription(string $description) Return SWarehouses objects filtered by the description column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSWarehousesQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSWarehousesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SWarehouses', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SWarehousesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SWarehousesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SWarehousesQuery) {
			return $criteria;
		}
		$query = new SWarehousesQuery();
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
	 * @return    SWarehouses|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SWarehousesPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SWarehousesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SWarehousesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SWarehousesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SWarehousesPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SWarehousesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SWarehousesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SWarehousesQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SWarehousesPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the address column
	 * 
	 * @param     string $address The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SWarehousesQuery The current query, for fluid interface
	 */
	public function filterByAddress($address = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($address)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $address)) {
				$address = str_replace('*', '%', $address);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SWarehousesPeer::ADDRESS, $address, $comparison);
	}

	/**
	 * Filter the query on the phone column
	 * 
	 * @param     string $phone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SWarehousesQuery The current query, for fluid interface
	 */
	public function filterByPhone($phone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($phone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $phone)) {
				$phone = str_replace('*', '%', $phone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SWarehousesPeer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SWarehousesQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SWarehousesPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query by a related SWarehouseData object
	 *
	 * @param     SWarehouseData $sWarehouseData  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SWarehousesQuery The current query, for fluid interface
	 */
	public function filterBySWarehouseData($sWarehouseData, $comparison = null)
	{
		if ($sWarehouseData instanceof SWarehouseData) {
			return $this
				->addUsingAlias(SWarehousesPeer::ID, $sWarehouseData->getWarehouseId(), $comparison);
		} elseif ($sWarehouseData instanceof PropelCollection) {
			return $this
				->useSWarehouseDataQuery()
					->filterByPrimaryKeys($sWarehouseData->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySWarehouseData() only accepts arguments of type SWarehouseData or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SWarehouseData relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SWarehousesQuery The current query, for fluid interface
	 */
	public function joinSWarehouseData($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SWarehouseData');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SWarehouseData');
		}
		
		return $this;
	}

	/**
	 * Use the SWarehouseData relation SWarehouseData object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SWarehouseDataQuery A secondary query class using the current class as primary query
	 */
	public function useSWarehouseDataQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSWarehouseData($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SWarehouseData', 'SWarehouseDataQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SWarehouses $sWarehouses Object to remove from the list of results
	 *
	 * @return    SWarehousesQuery The current query, for fluid interface
	 */
	public function prune($sWarehouses = null)
	{
		if ($sWarehouses) {
			$this->addUsingAlias(SWarehousesPeer::ID, $sWarehouses->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSWarehousesQuery
