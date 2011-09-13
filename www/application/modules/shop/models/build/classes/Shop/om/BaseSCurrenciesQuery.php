<?php


/**
 * Base class that represents a query for the 'shop_currencies' table.
 *
 * 
 *
 * @method     SCurrenciesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SCurrenciesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SCurrenciesQuery orderByMain($order = Criteria::ASC) Order by the main column
 * @method     SCurrenciesQuery orderByIsDefault($order = Criteria::ASC) Order by the is_default column
 * @method     SCurrenciesQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     SCurrenciesQuery orderBySymbol($order = Criteria::ASC) Order by the symbol column
 * @method     SCurrenciesQuery orderByRate($order = Criteria::ASC) Order by the rate column
 *
 * @method     SCurrenciesQuery groupById() Group by the id column
 * @method     SCurrenciesQuery groupByName() Group by the name column
 * @method     SCurrenciesQuery groupByMain() Group by the main column
 * @method     SCurrenciesQuery groupByIsDefault() Group by the is_default column
 * @method     SCurrenciesQuery groupByCode() Group by the code column
 * @method     SCurrenciesQuery groupBySymbol() Group by the symbol column
 * @method     SCurrenciesQuery groupByRate() Group by the rate column
 *
 * @method     SCurrenciesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SCurrenciesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SCurrenciesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SCurrenciesQuery leftJoinSPaymentMethods($relationAlias = null) Adds a LEFT JOIN clause to the query using the SPaymentMethods relation
 * @method     SCurrenciesQuery rightJoinSPaymentMethods($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SPaymentMethods relation
 * @method     SCurrenciesQuery innerJoinSPaymentMethods($relationAlias = null) Adds a INNER JOIN clause to the query using the SPaymentMethods relation
 *
 * @method     SCurrencies findOne(PropelPDO $con = null) Return the first SCurrencies matching the query
 * @method     SCurrencies findOneOrCreate(PropelPDO $con = null) Return the first SCurrencies matching the query, or a new SCurrencies object populated from the query conditions when no match is found
 *
 * @method     SCurrencies findOneById(int $id) Return the first SCurrencies filtered by the id column
 * @method     SCurrencies findOneByName(string $name) Return the first SCurrencies filtered by the name column
 * @method     SCurrencies findOneByMain(boolean $main) Return the first SCurrencies filtered by the main column
 * @method     SCurrencies findOneByIsDefault(boolean $is_default) Return the first SCurrencies filtered by the is_default column
 * @method     SCurrencies findOneByCode(string $code) Return the first SCurrencies filtered by the code column
 * @method     SCurrencies findOneBySymbol(string $symbol) Return the first SCurrencies filtered by the symbol column
 * @method     SCurrencies findOneByRate(string $rate) Return the first SCurrencies filtered by the rate column
 *
 * @method     array findById(int $id) Return SCurrencies objects filtered by the id column
 * @method     array findByName(string $name) Return SCurrencies objects filtered by the name column
 * @method     array findByMain(boolean $main) Return SCurrencies objects filtered by the main column
 * @method     array findByIsDefault(boolean $is_default) Return SCurrencies objects filtered by the is_default column
 * @method     array findByCode(string $code) Return SCurrencies objects filtered by the code column
 * @method     array findBySymbol(string $symbol) Return SCurrencies objects filtered by the symbol column
 * @method     array findByRate(string $rate) Return SCurrencies objects filtered by the rate column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSCurrenciesQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSCurrenciesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SCurrencies', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SCurrenciesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SCurrenciesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SCurrenciesQuery) {
			return $criteria;
		}
		$query = new SCurrenciesQuery();
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
	 * @return    SCurrencies|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SCurrenciesPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SCurrenciesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SCurrenciesPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SCurrenciesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SCurrenciesPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the main column
	 * 
	 * @param     boolean|string $main The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByMain($main = null, $comparison = null)
	{
		if (is_string($main)) {
			$main = in_array(strtolower($main), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(SCurrenciesPeer::MAIN, $main, $comparison);
	}

	/**
	 * Filter the query on the is_default column
	 * 
	 * @param     boolean|string $isDefault The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByIsDefault($isDefault = null, $comparison = null)
	{
		if (is_string($isDefault)) {
			$is_default = in_array(strtolower($isDefault), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(SCurrenciesPeer::IS_DEFAULT, $isDefault, $comparison);
	}

	/**
	 * Filter the query on the code column
	 * 
	 * @param     string $code The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByCode($code = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($code)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $code)) {
				$code = str_replace('*', '%', $code);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SCurrenciesPeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query on the symbol column
	 * 
	 * @param     string $symbol The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterBySymbol($symbol = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($symbol)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $symbol)) {
				$symbol = str_replace('*', '%', $symbol);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SCurrenciesPeer::SYMBOL, $symbol, $comparison);
	}

	/**
	 * Filter the query on the rate column
	 * 
	 * @param     string|array $rate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterByRate($rate = null, $comparison = null)
	{
		if (is_array($rate)) {
			$useMinMax = false;
			if (isset($rate['min'])) {
				$this->addUsingAlias(SCurrenciesPeer::RATE, $rate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rate['max'])) {
				$this->addUsingAlias(SCurrenciesPeer::RATE, $rate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SCurrenciesPeer::RATE, $rate, $comparison);
	}

	/**
	 * Filter the query by a related SPaymentMethods object
	 *
	 * @param     SPaymentMethods $sPaymentMethods  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function filterBySPaymentMethods($sPaymentMethods, $comparison = null)
	{
		if ($sPaymentMethods instanceof SPaymentMethods) {
			return $this
				->addUsingAlias(SCurrenciesPeer::ID, $sPaymentMethods->getCurrencyId(), $comparison);
		} elseif ($sPaymentMethods instanceof PropelCollection) {
			return $this
				->useSPaymentMethodsQuery()
					->filterByPrimaryKeys($sPaymentMethods->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySPaymentMethods() only accepts arguments of type SPaymentMethods or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SPaymentMethods relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function joinSPaymentMethods($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SPaymentMethods');
		
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
			$this->addJoinObject($join, 'SPaymentMethods');
		}
		
		return $this;
	}

	/**
	 * Use the SPaymentMethods relation SPaymentMethods object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SPaymentMethodsQuery A secondary query class using the current class as primary query
	 */
	public function useSPaymentMethodsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSPaymentMethods($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SPaymentMethods', 'SPaymentMethodsQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SCurrencies $sCurrencies Object to remove from the list of results
	 *
	 * @return    SCurrenciesQuery The current query, for fluid interface
	 */
	public function prune($sCurrencies = null)
	{
		if ($sCurrencies) {
			$this->addUsingAlias(SCurrenciesPeer::ID, $sCurrencies->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSCurrenciesQuery
