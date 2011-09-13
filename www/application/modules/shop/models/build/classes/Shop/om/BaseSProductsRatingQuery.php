<?php


/**
 * Base class that represents a query for the 'shop_products_rating' table.
 *
 * 
 *
 * @method     SProductsRatingQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     SProductsRatingQuery orderByVotes($order = Criteria::ASC) Order by the votes column
 * @method     SProductsRatingQuery orderByRating($order = Criteria::ASC) Order by the rating column
 *
 * @method     SProductsRatingQuery groupByProductId() Group by the product_id column
 * @method     SProductsRatingQuery groupByVotes() Group by the votes column
 * @method     SProductsRatingQuery groupByRating() Group by the rating column
 *
 * @method     SProductsRatingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SProductsRatingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SProductsRatingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SProductsRatingQuery leftJoinSProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProducts relation
 * @method     SProductsRatingQuery rightJoinSProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProducts relation
 * @method     SProductsRatingQuery innerJoinSProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SProducts relation
 *
 * @method     SProductsRating findOne(PropelPDO $con = null) Return the first SProductsRating matching the query
 * @method     SProductsRating findOneOrCreate(PropelPDO $con = null) Return the first SProductsRating matching the query, or a new SProductsRating object populated from the query conditions when no match is found
 *
 * @method     SProductsRating findOneByProductId(int $product_id) Return the first SProductsRating filtered by the product_id column
 * @method     SProductsRating findOneByVotes(int $votes) Return the first SProductsRating filtered by the votes column
 * @method     SProductsRating findOneByRating(int $rating) Return the first SProductsRating filtered by the rating column
 *
 * @method     array findByProductId(int $product_id) Return SProductsRating objects filtered by the product_id column
 * @method     array findByVotes(int $votes) Return SProductsRating objects filtered by the votes column
 * @method     array findByRating(int $rating) Return SProductsRating objects filtered by the rating column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSProductsRatingQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSProductsRatingQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SProductsRating', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SProductsRatingQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SProductsRatingQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SProductsRatingQuery) {
			return $criteria;
		}
		$query = new SProductsRatingQuery();
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
	 * @return    SProductsRating|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SProductsRatingPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SProductsRatingPeer::PRODUCT_ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SProductsRatingPeer::PRODUCT_ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the product_id column
	 * 
	 * @param     int|array $productId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterByProductId($productId = null, $comparison = null)
	{
		if (is_array($productId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SProductsRatingPeer::PRODUCT_ID, $productId, $comparison);
	}

	/**
	 * Filter the query on the votes column
	 * 
	 * @param     int|array $votes The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterByVotes($votes = null, $comparison = null)
	{
		if (is_array($votes)) {
			$useMinMax = false;
			if (isset($votes['min'])) {
				$this->addUsingAlias(SProductsRatingPeer::VOTES, $votes['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($votes['max'])) {
				$this->addUsingAlias(SProductsRatingPeer::VOTES, $votes['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsRatingPeer::VOTES, $votes, $comparison);
	}

	/**
	 * Filter the query on the rating column
	 * 
	 * @param     int|array $rating The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterByRating($rating = null, $comparison = null)
	{
		if (is_array($rating)) {
			$useMinMax = false;
			if (isset($rating['min'])) {
				$this->addUsingAlias(SProductsRatingPeer::RATING, $rating['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rating['max'])) {
				$this->addUsingAlias(SProductsRatingPeer::RATING, $rating['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsRatingPeer::RATING, $rating, $comparison);
	}

	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param     SProducts|PropelCollection $sProducts The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsRatingQuery The current query, for fluid interface
	 */
	public function filterBySProducts($sProducts, $comparison = null)
	{
		if ($sProducts instanceof SProducts) {
			return $this
				->addUsingAlias(SProductsRatingPeer::PRODUCT_ID, $sProducts->getId(), $comparison);
		} elseif ($sProducts instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SProductsRatingPeer::PRODUCT_ID, $sProducts->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySProducts() only accepts arguments of type SProducts or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SProducts relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsRatingQuery The current query, for fluid interface
	 */
	public function joinSProducts($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SProducts');
		
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
			$this->addJoinObject($join, 'SProducts');
		}
		
		return $this;
	}

	/**
	 * Use the SProducts relation SProducts object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery A secondary query class using the current class as primary query
	 */
	public function useSProductsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSProducts($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProducts', 'SProductsQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SProductsRating $sProductsRating Object to remove from the list of results
	 *
	 * @return    SProductsRatingQuery The current query, for fluid interface
	 */
	public function prune($sProductsRating = null)
	{
		if ($sProductsRating) {
			$this->addUsingAlias(SProductsRatingPeer::PRODUCT_ID, $sProductsRating->getProductId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSProductsRatingQuery
