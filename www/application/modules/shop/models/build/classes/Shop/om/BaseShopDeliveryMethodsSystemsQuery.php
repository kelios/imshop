<?php


/**
 * Base class that represents a query for the 'shop_delivery_methods_systems' table.
 *
 * 
 *
 * @method     ShopDeliveryMethodsSystemsQuery orderByDeliveryMethodId($order = Criteria::ASC) Order by the delivery_method_id column
 * @method     ShopDeliveryMethodsSystemsQuery orderByPaymentMethodId($order = Criteria::ASC) Order by the payment_method_id column
 *
 * @method     ShopDeliveryMethodsSystemsQuery groupByDeliveryMethodId() Group by the delivery_method_id column
 * @method     ShopDeliveryMethodsSystemsQuery groupByPaymentMethodId() Group by the payment_method_id column
 *
 * @method     ShopDeliveryMethodsSystemsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShopDeliveryMethodsSystemsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShopDeliveryMethodsSystemsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShopDeliveryMethodsSystemsQuery leftJoinSDeliveryMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the SDeliveryMethods relation
 * @method     ShopDeliveryMethodsSystemsQuery rightJoinSDeliveryMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SDeliveryMethods relation
 * @method     ShopDeliveryMethodsSystemsQuery innerJoinSDeliveryMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the SDeliveryMethods relation
 *
 * @method     ShopDeliveryMethodsSystemsQuery leftJoinPaymentMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the PaymentMethods relation
 * @method     ShopDeliveryMethodsSystemsQuery rightJoinPaymentMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PaymentMethods relation
 * @method     ShopDeliveryMethodsSystemsQuery innerJoinPaymentMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the PaymentMethods relation
 *
 * @method     ShopDeliveryMethodsSystems findOne(PropelPDO $con = null) Return the first ShopDeliveryMethodsSystems matching the query
 * @method     ShopDeliveryMethodsSystems findOneOrCreate(PropelPDO $con = null) Return the first ShopDeliveryMethodsSystems matching the query, or a new ShopDeliveryMethodsSystems object populated from the query conditions when no match is found
 *
 * @method     ShopDeliveryMethodsSystems findOneByDeliveryMethodId(int $delivery_method_id) Return the first ShopDeliveryMethodsSystems filtered by the delivery_method_id column
 * @method     ShopDeliveryMethodsSystems findOneByPaymentMethodId(int $payment_method_id) Return the first ShopDeliveryMethodsSystems filtered by the payment_method_id column
 *
 * @method     array findByDeliveryMethodId(int $delivery_method_id) Return ShopDeliveryMethodsSystems objects filtered by the delivery_method_id column
 * @method     array findByPaymentMethodId(int $payment_method_id) Return ShopDeliveryMethodsSystems objects filtered by the payment_method_id column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseShopDeliveryMethodsSystemsQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseShopDeliveryMethodsSystemsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'ShopDeliveryMethodsSystems', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ShopDeliveryMethodsSystemsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ShopDeliveryMethodsSystemsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ShopDeliveryMethodsSystemsQuery) {
			return $criteria;
		}
		$query = new ShopDeliveryMethodsSystemsQuery();
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
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$delivery_method_id, $payment_method_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ShopDeliveryMethodsSystems|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ShopDeliveryMethodsSystemsPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    ShopDeliveryMethodsSystemsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(ShopDeliveryMethodsSystemsPeer::DELIVERY_METHOD_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(ShopDeliveryMethodsSystemsPeer::PAYMENT_METHOD_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ShopDeliveryMethodsSystemsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(ShopDeliveryMethodsSystemsPeer::DELIVERY_METHOD_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(ShopDeliveryMethodsSystemsPeer::PAYMENT_METHOD_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the delivery_method_id column
	 * 
	 * @param     int|array $deliveryMethodId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDeliveryMethodsSystemsQuery The current query, for fluid interface
	 */
	public function filterByDeliveryMethodId($deliveryMethodId = null, $comparison = null)
	{
		if (is_array($deliveryMethodId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ShopDeliveryMethodsSystemsPeer::DELIVERY_METHOD_ID, $deliveryMethodId, $comparison);
	}

	/**
	 * Filter the query on the payment_method_id column
	 * 
	 * @param     int|array $paymentMethodId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDeliveryMethodsSystemsQuery The current query, for fluid interface
	 */
	public function filterByPaymentMethodId($paymentMethodId = null, $comparison = null)
	{
		if (is_array($paymentMethodId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ShopDeliveryMethodsSystemsPeer::PAYMENT_METHOD_ID, $paymentMethodId, $comparison);
	}

	/**
	 * Filter the query by a related SDeliveryMethods object
	 *
	 * @param     SDeliveryMethods|PropelCollection $sDeliveryMethods The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDeliveryMethodsSystemsQuery The current query, for fluid interface
	 */
	public function filterBySDeliveryMethods($sDeliveryMethods, $comparison = null)
	{
		if ($sDeliveryMethods instanceof SDeliveryMethods) {
			return $this
				->addUsingAlias(ShopDeliveryMethodsSystemsPeer::DELIVERY_METHOD_ID, $sDeliveryMethods->getId(), $comparison);
		} elseif ($sDeliveryMethods instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ShopDeliveryMethodsSystemsPeer::DELIVERY_METHOD_ID, $sDeliveryMethods->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySDeliveryMethods() only accepts arguments of type SDeliveryMethods or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SDeliveryMethods relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShopDeliveryMethodsSystemsQuery The current query, for fluid interface
	 */
	public function joinSDeliveryMethods($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SDeliveryMethods');
		
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
			$this->addJoinObject($join, 'SDeliveryMethods');
		}
		
		return $this;
	}

	/**
	 * Use the SDeliveryMethods relation SDeliveryMethods object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SDeliveryMethodsQuery A secondary query class using the current class as primary query
	 */
	public function useSDeliveryMethodsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSDeliveryMethods($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SDeliveryMethods', 'SDeliveryMethodsQuery');
	}

	/**
	 * Filter the query by a related SPaymentMethods object
	 *
	 * @param     SPaymentMethods|PropelCollection $sPaymentMethods The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDeliveryMethodsSystemsQuery The current query, for fluid interface
	 */
	public function filterByPaymentMethods($sPaymentMethods, $comparison = null)
	{
		if ($sPaymentMethods instanceof SPaymentMethods) {
			return $this
				->addUsingAlias(ShopDeliveryMethodsSystemsPeer::PAYMENT_METHOD_ID, $sPaymentMethods->getId(), $comparison);
		} elseif ($sPaymentMethods instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ShopDeliveryMethodsSystemsPeer::PAYMENT_METHOD_ID, $sPaymentMethods->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPaymentMethods() only accepts arguments of type SPaymentMethods or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PaymentMethods relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShopDeliveryMethodsSystemsQuery The current query, for fluid interface
	 */
	public function joinPaymentMethods($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PaymentMethods');
		
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
			$this->addJoinObject($join, 'PaymentMethods');
		}
		
		return $this;
	}

	/**
	 * Use the PaymentMethods relation SPaymentMethods object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SPaymentMethodsQuery A secondary query class using the current class as primary query
	 */
	public function usePaymentMethodsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPaymentMethods($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PaymentMethods', 'SPaymentMethodsQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ShopDeliveryMethodsSystems $shopDeliveryMethodsSystems Object to remove from the list of results
	 *
	 * @return    ShopDeliveryMethodsSystemsQuery The current query, for fluid interface
	 */
	public function prune($shopDeliveryMethodsSystems = null)
	{
		if ($shopDeliveryMethodsSystems) {
			$this->addCond('pruneCond0', $this->getAliasedColName(ShopDeliveryMethodsSystemsPeer::DELIVERY_METHOD_ID), $shopDeliveryMethodsSystems->getDeliveryMethodId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(ShopDeliveryMethodsSystemsPeer::PAYMENT_METHOD_ID), $shopDeliveryMethodsSystems->getPaymentMethodId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseShopDeliveryMethodsSystemsQuery
