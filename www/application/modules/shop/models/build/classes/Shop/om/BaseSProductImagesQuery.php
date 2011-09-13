<?php


/**
 * Base class that represents a query for the 'shop_product_images' table.
 *
 * 
 *
 * @method     SProductImagesQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     SProductImagesQuery orderByImageName($order = Criteria::ASC) Order by the image_name column
 * @method     SProductImagesQuery orderByPosition($order = Criteria::ASC) Order by the position column
 *
 * @method     SProductImagesQuery groupByProductId() Group by the product_id column
 * @method     SProductImagesQuery groupByImageName() Group by the image_name column
 * @method     SProductImagesQuery groupByPosition() Group by the position column
 *
 * @method     SProductImagesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SProductImagesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SProductImagesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SProductImagesQuery leftJoinSProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProducts relation
 * @method     SProductImagesQuery rightJoinSProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProducts relation
 * @method     SProductImagesQuery innerJoinSProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SProducts relation
 *
 * @method     SProductImages findOne(PropelPDO $con = null) Return the first SProductImages matching the query
 * @method     SProductImages findOneOrCreate(PropelPDO $con = null) Return the first SProductImages matching the query, or a new SProductImages object populated from the query conditions when no match is found
 *
 * @method     SProductImages findOneByProductId(int $product_id) Return the first SProductImages filtered by the product_id column
 * @method     SProductImages findOneByImageName(string $image_name) Return the first SProductImages filtered by the image_name column
 * @method     SProductImages findOneByPosition(int $position) Return the first SProductImages filtered by the position column
 *
 * @method     array findByProductId(int $product_id) Return SProductImages objects filtered by the product_id column
 * @method     array findByImageName(string $image_name) Return SProductImages objects filtered by the image_name column
 * @method     array findByPosition(int $position) Return SProductImages objects filtered by the position column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSProductImagesQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSProductImagesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SProductImages', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SProductImagesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SProductImagesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SProductImagesQuery) {
			return $criteria;
		}
		$query = new SProductImagesQuery();
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
	 * @param     array[$product_id, $image_name] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    SProductImages|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SProductImagesPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SProductImagesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(SProductImagesPeer::PRODUCT_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(SProductImagesPeer::IMAGE_NAME, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SProductImagesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(SProductImagesPeer::PRODUCT_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(SProductImagesPeer::IMAGE_NAME, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the product_id column
	 * 
	 * @param     int|array $productId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductImagesQuery The current query, for fluid interface
	 */
	public function filterByProductId($productId = null, $comparison = null)
	{
		if (is_array($productId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SProductImagesPeer::PRODUCT_ID, $productId, $comparison);
	}

	/**
	 * Filter the query on the image_name column
	 * 
	 * @param     string $imageName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductImagesQuery The current query, for fluid interface
	 */
	public function filterByImageName($imageName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($imageName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $imageName)) {
				$imageName = str_replace('*', '%', $imageName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductImagesPeer::IMAGE_NAME, $imageName, $comparison);
	}

	/**
	 * Filter the query on the position column
	 * 
	 * @param     int|array $position The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductImagesQuery The current query, for fluid interface
	 */
	public function filterByPosition($position = null, $comparison = null)
	{
		if (is_array($position)) {
			$useMinMax = false;
			if (isset($position['min'])) {
				$this->addUsingAlias(SProductImagesPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($position['max'])) {
				$this->addUsingAlias(SProductImagesPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductImagesPeer::POSITION, $position, $comparison);
	}

	/**
	 * Filter the query by a related SProducts object
	 *
	 * @param     SProducts|PropelCollection $sProducts The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductImagesQuery The current query, for fluid interface
	 */
	public function filterBySProducts($sProducts, $comparison = null)
	{
		if ($sProducts instanceof SProducts) {
			return $this
				->addUsingAlias(SProductImagesPeer::PRODUCT_ID, $sProducts->getId(), $comparison);
		} elseif ($sProducts instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SProductImagesPeer::PRODUCT_ID, $sProducts->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    SProductImagesQuery The current query, for fluid interface
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
	 * @param     SProductImages $sProductImages Object to remove from the list of results
	 *
	 * @return    SProductImagesQuery The current query, for fluid interface
	 */
	public function prune($sProductImages = null)
	{
		if ($sProductImages) {
			$this->addCond('pruneCond0', $this->getAliasedColName(SProductImagesPeer::PRODUCT_ID), $sProductImages->getProductId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(SProductImagesPeer::IMAGE_NAME), $sProductImages->getImageName(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseSProductImagesQuery
