<?php


/**
 * Base class that represents a query for the 'shop_payment_methods' table.
 *
 * 
 *
 * @method     SPaymentMethodsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SPaymentMethodsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SPaymentMethodsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     SPaymentMethodsQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     SPaymentMethodsQuery orderByCurrencyId($order = Criteria::ASC) Order by the currency_id column
 * @method     SPaymentMethodsQuery orderByPaymentSystemName($order = Criteria::ASC) Order by the payment_system_name column
 * @method     SPaymentMethodsQuery orderByPosition($order = Criteria::ASC) Order by the position column
 *
 * @method     SPaymentMethodsQuery groupById() Group by the id column
 * @method     SPaymentMethodsQuery groupByName() Group by the name column
 * @method     SPaymentMethodsQuery groupByDescription() Group by the description column
 * @method     SPaymentMethodsQuery groupByActive() Group by the active column
 * @method     SPaymentMethodsQuery groupByCurrencyId() Group by the currency_id column
 * @method     SPaymentMethodsQuery groupByPaymentSystemName() Group by the payment_system_name column
 * @method     SPaymentMethodsQuery groupByPosition() Group by the position column
 *
 * @method     SPaymentMethodsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SPaymentMethodsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SPaymentMethodsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SPaymentMethodsQuery leftJoinCurrency($relationAlias = null) Adds a LEFT JOIN clause to the query using the Currency relation
 * @method     SPaymentMethodsQuery rightJoinCurrency($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Currency relation
 * @method     SPaymentMethodsQuery innerJoinCurrency($relationAlias = null) Adds a INNER JOIN clause to the query using the Currency relation
 *
 * @method     SPaymentMethodsQuery leftJoinShopDeliveryMethodsSystems($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopDeliveryMethodsSystems relation
 * @method     SPaymentMethodsQuery rightJoinShopDeliveryMethodsSystems($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopDeliveryMethodsSystems relation
 * @method     SPaymentMethodsQuery innerJoinShopDeliveryMethodsSystems($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopDeliveryMethodsSystems relation
 *
 * @method     SPaymentMethods findOne(PropelPDO $con = null) Return the first SPaymentMethods matching the query
 * @method     SPaymentMethods findOneOrCreate(PropelPDO $con = null) Return the first SPaymentMethods matching the query, or a new SPaymentMethods object populated from the query conditions when no match is found
 *
 * @method     SPaymentMethods findOneById(int $id) Return the first SPaymentMethods filtered by the id column
 * @method     SPaymentMethods findOneByName(string $name) Return the first SPaymentMethods filtered by the name column
 * @method     SPaymentMethods findOneByDescription(string $description) Return the first SPaymentMethods filtered by the description column
 * @method     SPaymentMethods findOneByActive(boolean $active) Return the first SPaymentMethods filtered by the active column
 * @method     SPaymentMethods findOneByCurrencyId(int $currency_id) Return the first SPaymentMethods filtered by the currency_id column
 * @method     SPaymentMethods findOneByPaymentSystemName(string $payment_system_name) Return the first SPaymentMethods filtered by the payment_system_name column
 * @method     SPaymentMethods findOneByPosition(int $position) Return the first SPaymentMethods filtered by the position column
 *
 * @method     array findById(int $id) Return SPaymentMethods objects filtered by the id column
 * @method     array findByName(string $name) Return SPaymentMethods objects filtered by the name column
 * @method     array findByDescription(string $description) Return SPaymentMethods objects filtered by the description column
 * @method     array findByActive(boolean $active) Return SPaymentMethods objects filtered by the active column
 * @method     array findByCurrencyId(int $currency_id) Return SPaymentMethods objects filtered by the currency_id column
 * @method     array findByPaymentSystemName(string $payment_system_name) Return SPaymentMethods objects filtered by the payment_system_name column
 * @method     array findByPosition(int $position) Return SPaymentMethods objects filtered by the position column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSPaymentMethodsQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSPaymentMethodsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SPaymentMethods', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SPaymentMethodsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SPaymentMethodsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SPaymentMethodsQuery) {
			return $criteria;
		}
		$query = new SPaymentMethodsQuery();
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
	 * @return    SPaymentMethods|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SPaymentMethodsPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SPaymentMethodsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SPaymentMethodsPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SPaymentMethodsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SPaymentMethodsPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SPaymentMethodsPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(SPaymentMethodsPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the currency_id column
	 * 
	 * @param     int|array $currencyId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByCurrencyId($currencyId = null, $comparison = null)
	{
		if (is_array($currencyId)) {
			$useMinMax = false;
			if (isset($currencyId['min'])) {
				$this->addUsingAlias(SPaymentMethodsPeer::CURRENCY_ID, $currencyId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($currencyId['max'])) {
				$this->addUsingAlias(SPaymentMethodsPeer::CURRENCY_ID, $currencyId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SPaymentMethodsPeer::CURRENCY_ID, $currencyId, $comparison);
	}

	/**
	 * Filter the query on the payment_system_name column
	 * 
	 * @param     string $paymentSystemName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByPaymentSystemName($paymentSystemName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($paymentSystemName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $paymentSystemName)) {
				$paymentSystemName = str_replace('*', '%', $paymentSystemName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SPaymentMethodsPeer::PAYMENT_SYSTEM_NAME, $paymentSystemName, $comparison);
	}

	/**
	 * Filter the query on the position column
	 * 
	 * @param     int|array $position The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(SPaymentMethodsPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(SPaymentMethodsPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SPaymentMethodsPeer::POSITION, $position, $comparison);
	}

	/**
	 * Filter the query by a related SCurrencies object
	 *
	 * @param     SCurrencies|PropelCollection $sCurrencies The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByCurrency($sCurrencies, $comparison = null)
	{
		if ($sCurrencies instanceof SCurrencies) {
			return $this
				->addUsingAlias(SPaymentMethodsPeer::CURRENCY_ID, $sCurrencies->getId(), $comparison);
		} elseif ($sCurrencies instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SPaymentMethodsPeer::CURRENCY_ID, $sCurrencies->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCurrency() only accepts arguments of type SCurrencies or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Currency relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function joinCurrency($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Currency');
		
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
			$this->addJoinObject($join, 'Currency');
		}
		
		return $this;
	}

	/**
	 * Use the Currency relation SCurrencies object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SCurrenciesQuery A secondary query class using the current class as primary query
	 */
	public function useCurrencyQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCurrency($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Currency', 'SCurrenciesQuery');
	}

	/**
	 * Filter the query by a related ShopDeliveryMethodsSystems object
	 *
	 * @param     ShopDeliveryMethodsSystems $shopDeliveryMethodsSystems  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterByShopDeliveryMethodsSystems($shopDeliveryMethodsSystems, $comparison = null)
	{
		if ($shopDeliveryMethodsSystems instanceof ShopDeliveryMethodsSystems) {
			return $this
				->addUsingAlias(SPaymentMethodsPeer::ID, $shopDeliveryMethodsSystems->getPaymentMethodId(), $comparison);
		} elseif ($shopDeliveryMethodsSystems instanceof PropelCollection) {
			return $this
				->useShopDeliveryMethodsSystemsQuery()
					->filterByPrimaryKeys($shopDeliveryMethodsSystems->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByShopDeliveryMethodsSystems() only accepts arguments of type ShopDeliveryMethodsSystems or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ShopDeliveryMethodsSystems relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function joinShopDeliveryMethodsSystems($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ShopDeliveryMethodsSystems');
		
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
			$this->addJoinObject($join, 'ShopDeliveryMethodsSystems');
		}
		
		return $this;
	}

	/**
	 * Use the ShopDeliveryMethodsSystems relation ShopDeliveryMethodsSystems object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShopDeliveryMethodsSystemsQuery A secondary query class using the current class as primary query
	 */
	public function useShopDeliveryMethodsSystemsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinShopDeliveryMethodsSystems($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ShopDeliveryMethodsSystems', 'ShopDeliveryMethodsSystemsQuery');
	}

	/**
	 * Filter the query by a related SDeliveryMethods object
	 * using the shop_delivery_methods_systems table as cross reference
	 *
	 * @param     SDeliveryMethods $sDeliveryMethods the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function filterBySDeliveryMethods($sDeliveryMethods, $comparison = Criteria::EQUAL)
	{
		return $this
			->useShopDeliveryMethodsSystemsQuery()
				->filterBySDeliveryMethods($sDeliveryMethods, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     SPaymentMethods $sPaymentMethods Object to remove from the list of results
	 *
	 * @return    SPaymentMethodsQuery The current query, for fluid interface
	 */
	public function prune($sPaymentMethods = null)
	{
		if ($sPaymentMethods) {
			$this->addUsingAlias(SPaymentMethodsPeer::ID, $sPaymentMethods->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSPaymentMethodsQuery
