<?php


/**
 * Base class that represents a query for the 'shop_products' table.
 *
 * 
 *
 * @method     SProductsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SProductsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SProductsQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     SProductsQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     SProductsQuery orderByHit($order = Criteria::ASC) Order by the hit column
 * @method     SProductsQuery orderByHot($order = Criteria::ASC) Order by the hot column
 * @method     SProductsQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     SProductsQuery orderByBrandId($order = Criteria::ASC) Order by the brand_id column
 * @method     SProductsQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     SProductsQuery orderByRelatedProducts($order = Criteria::ASC) Order by the related_products column
 * @method     SProductsQuery orderByMainimage($order = Criteria::ASC) Order by the mainImage column
 * @method     SProductsQuery orderBySmallimage($order = Criteria::ASC) Order by the smallImage column
 * @method     SProductsQuery orderByShortDescription($order = Criteria::ASC) Order by the short_description column
 * @method     SProductsQuery orderByFullDescription($order = Criteria::ASC) Order by the full_description column
 * @method     SProductsQuery orderByMetaTitle($order = Criteria::ASC) Order by the meta_title column
 * @method     SProductsQuery orderByMetaDescription($order = Criteria::ASC) Order by the meta_description column
 * @method     SProductsQuery orderByMetaKeywords($order = Criteria::ASC) Order by the meta_keywords column
 * @method     SProductsQuery orderByOldPrice($order = Criteria::ASC) Order by the old_price column
 * @method     SProductsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     SProductsQuery orderByUpdated($order = Criteria::ASC) Order by the updated column
 * @method     SProductsQuery orderByViews($order = Criteria::ASC) Order by the views column
 *
 * @method     SProductsQuery groupById() Group by the id column
 * @method     SProductsQuery groupByName() Group by the name column
 * @method     SProductsQuery groupByUrl() Group by the url column
 * @method     SProductsQuery groupByActive() Group by the active column
 * @method     SProductsQuery groupByHit() Group by the hit column
 * @method     SProductsQuery groupByHot() Group by the hot column
 * @method     SProductsQuery groupByAction() Group by the action column
 * @method     SProductsQuery groupByBrandId() Group by the brand_id column
 * @method     SProductsQuery groupByCategoryId() Group by the category_id column
 * @method     SProductsQuery groupByRelatedProducts() Group by the related_products column
 * @method     SProductsQuery groupByMainimage() Group by the mainImage column
 * @method     SProductsQuery groupBySmallimage() Group by the smallImage column
 * @method     SProductsQuery groupByShortDescription() Group by the short_description column
 * @method     SProductsQuery groupByFullDescription() Group by the full_description column
 * @method     SProductsQuery groupByMetaTitle() Group by the meta_title column
 * @method     SProductsQuery groupByMetaDescription() Group by the meta_description column
 * @method     SProductsQuery groupByMetaKeywords() Group by the meta_keywords column
 * @method     SProductsQuery groupByOldPrice() Group by the old_price column
 * @method     SProductsQuery groupByCreated() Group by the created column
 * @method     SProductsQuery groupByUpdated() Group by the updated column
 * @method     SProductsQuery groupByViews() Group by the views column
 *
 * @method     SProductsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SProductsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SProductsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SProductsQuery leftJoinBrand($relationAlias = null) Adds a LEFT JOIN clause to the query using the Brand relation
 * @method     SProductsQuery rightJoinBrand($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Brand relation
 * @method     SProductsQuery innerJoinBrand($relationAlias = null) Adds a INNER JOIN clause to the query using the Brand relation
 *
 * @method     SProductsQuery leftJoinMainCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the MainCategory relation
 * @method     SProductsQuery rightJoinMainCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MainCategory relation
 * @method     SProductsQuery innerJoinMainCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the MainCategory relation
 *
 * @method     SProductsQuery leftJoinSProductImages($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductImages relation
 * @method     SProductsQuery rightJoinSProductImages($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductImages relation
 * @method     SProductsQuery innerJoinSProductImages($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductImages relation
 *
 * @method     SProductsQuery leftJoinProductVariant($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductVariant relation
 * @method     SProductsQuery rightJoinProductVariant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductVariant relation
 * @method     SProductsQuery innerJoinProductVariant($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductVariant relation
 *
 * @method     SProductsQuery leftJoinSWarehouseData($relationAlias = null) Adds a LEFT JOIN clause to the query using the SWarehouseData relation
 * @method     SProductsQuery rightJoinSWarehouseData($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SWarehouseData relation
 * @method     SProductsQuery innerJoinSWarehouseData($relationAlias = null) Adds a INNER JOIN clause to the query using the SWarehouseData relation
 *
 * @method     SProductsQuery leftJoinShopProductCategories($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShopProductCategories relation
 * @method     SProductsQuery rightJoinShopProductCategories($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShopProductCategories relation
 * @method     SProductsQuery innerJoinShopProductCategories($relationAlias = null) Adds a INNER JOIN clause to the query using the ShopProductCategories relation
 *
 * @method     SProductsQuery leftJoinSProductPropertiesData($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductPropertiesData relation
 * @method     SProductsQuery rightJoinSProductPropertiesData($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductPropertiesData relation
 * @method     SProductsQuery innerJoinSProductPropertiesData($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductPropertiesData relation
 *
 * @method     SProductsQuery leftJoinSOrderProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SOrderProducts relation
 * @method     SProductsQuery rightJoinSOrderProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SOrderProducts relation
 * @method     SProductsQuery innerJoinSOrderProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SOrderProducts relation
 *
 * @method     SProductsQuery leftJoinSProductsRating($relationAlias = null) Adds a LEFT JOIN clause to the query using the SProductsRating relation
 * @method     SProductsQuery rightJoinSProductsRating($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SProductsRating relation
 * @method     SProductsQuery innerJoinSProductsRating($relationAlias = null) Adds a INNER JOIN clause to the query using the SProductsRating relation
 *
 * @method     SProducts findOne(PropelPDO $con = null) Return the first SProducts matching the query
 * @method     SProducts findOneOrCreate(PropelPDO $con = null) Return the first SProducts matching the query, or a new SProducts object populated from the query conditions when no match is found
 *
 * @method     SProducts findOneById(int $id) Return the first SProducts filtered by the id column
 * @method     SProducts findOneByName(string $name) Return the first SProducts filtered by the name column
 * @method     SProducts findOneByUrl(string $url) Return the first SProducts filtered by the url column
 * @method     SProducts findOneByActive(boolean $active) Return the first SProducts filtered by the active column
 * @method     SProducts findOneByHit(boolean $hit) Return the first SProducts filtered by the hit column
 * @method     SProducts findOneByHot(boolean $hot) Return the first SProducts filtered by the hot column
 * @method     SProducts findOneByAction(boolean $action) Return the first SProducts filtered by the action column
 * @method     SProducts findOneByBrandId(int $brand_id) Return the first SProducts filtered by the brand_id column
 * @method     SProducts findOneByCategoryId(int $category_id) Return the first SProducts filtered by the category_id column
 * @method     SProducts findOneByRelatedProducts(string $related_products) Return the first SProducts filtered by the related_products column
 * @method     SProducts findOneByMainimage(string $mainImage) Return the first SProducts filtered by the mainImage column
 * @method     SProducts findOneBySmallimage(string $smallImage) Return the first SProducts filtered by the smallImage column
 * @method     SProducts findOneByShortDescription(string $short_description) Return the first SProducts filtered by the short_description column
 * @method     SProducts findOneByFullDescription(string $full_description) Return the first SProducts filtered by the full_description column
 * @method     SProducts findOneByMetaTitle(string $meta_title) Return the first SProducts filtered by the meta_title column
 * @method     SProducts findOneByMetaDescription(string $meta_description) Return the first SProducts filtered by the meta_description column
 * @method     SProducts findOneByMetaKeywords(string $meta_keywords) Return the first SProducts filtered by the meta_keywords column
 * @method     SProducts findOneByOldPrice(string $old_price) Return the first SProducts filtered by the old_price column
 * @method     SProducts findOneByCreated(int $created) Return the first SProducts filtered by the created column
 * @method     SProducts findOneByUpdated(int $updated) Return the first SProducts filtered by the updated column
 * @method     SProducts findOneByViews(int $views) Return the first SProducts filtered by the views column
 *
 * @method     array findById(int $id) Return SProducts objects filtered by the id column
 * @method     array findByName(string $name) Return SProducts objects filtered by the name column
 * @method     array findByUrl(string $url) Return SProducts objects filtered by the url column
 * @method     array findByActive(boolean $active) Return SProducts objects filtered by the active column
 * @method     array findByHit(boolean $hit) Return SProducts objects filtered by the hit column
 * @method     array findByHot(boolean $hot) Return SProducts objects filtered by the hot column
 * @method     array findByAction(boolean $action) Return SProducts objects filtered by the action column
 * @method     array findByBrandId(int $brand_id) Return SProducts objects filtered by the brand_id column
 * @method     array findByCategoryId(int $category_id) Return SProducts objects filtered by the category_id column
 * @method     array findByRelatedProducts(string $related_products) Return SProducts objects filtered by the related_products column
 * @method     array findByMainimage(string $mainImage) Return SProducts objects filtered by the mainImage column
 * @method     array findBySmallimage(string $smallImage) Return SProducts objects filtered by the smallImage column
 * @method     array findByShortDescription(string $short_description) Return SProducts objects filtered by the short_description column
 * @method     array findByFullDescription(string $full_description) Return SProducts objects filtered by the full_description column
 * @method     array findByMetaTitle(string $meta_title) Return SProducts objects filtered by the meta_title column
 * @method     array findByMetaDescription(string $meta_description) Return SProducts objects filtered by the meta_description column
 * @method     array findByMetaKeywords(string $meta_keywords) Return SProducts objects filtered by the meta_keywords column
 * @method     array findByOldPrice(string $old_price) Return SProducts objects filtered by the old_price column
 * @method     array findByCreated(int $created) Return SProducts objects filtered by the created column
 * @method     array findByUpdated(int $updated) Return SProducts objects filtered by the updated column
 * @method     array findByViews(int $views) Return SProducts objects filtered by the views column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSProductsQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSProductsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SProducts', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SProductsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SProductsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SProductsQuery) {
			return $criteria;
		}
		$query = new SProductsQuery();
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
	 * @return    SProducts|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SProductsPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SProductsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SProductsPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SProductsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SProductsPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the url column
	 * 
	 * @param     string $url The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByUrl($url = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($url)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $url)) {
				$url = str_replace('*', '%', $url);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::URL, $url, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(SProductsPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the hit column
	 * 
	 * @param     boolean|string $hit The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByHit($hit = null, $comparison = null)
	{
		if (is_string($hit)) {
			$hit = in_array(strtolower($hit), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(SProductsPeer::HIT, $hit, $comparison);
	}

	/**
	 * Filter the query on the hot column
	 * 
	 * @param     boolean|string $hot The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByHot($hot = null, $comparison = null)
	{
		if (is_string($hot)) {
			$hot = in_array(strtolower($hot), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(SProductsPeer::HOT, $hot, $comparison);
	}

	/**
	 * Filter the query on the action column
	 * 
	 * @param     boolean|string $action The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByAction($action = null, $comparison = null)
	{
		if (is_string($action)) {
			$action = in_array(strtolower($action), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(SProductsPeer::ACTION, $action, $comparison);
	}

	/**
	 * Filter the query on the brand_id column
	 * 
	 * @param     int|array $brandId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByBrandId($brandId = null, $comparison = null)
	{
		if (is_array($brandId)) {
			$useMinMax = false;
			if (isset($brandId['min'])) {
				$this->addUsingAlias(SProductsPeer::BRAND_ID, $brandId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($brandId['max'])) {
				$this->addUsingAlias(SProductsPeer::BRAND_ID, $brandId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::BRAND_ID, $brandId, $comparison);
	}

	/**
	 * Filter the query on the category_id column
	 * 
	 * @param     int|array $categoryId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByCategoryId($categoryId = null, $comparison = null)
	{
		if (is_array($categoryId)) {
			$useMinMax = false;
			if (isset($categoryId['min'])) {
				$this->addUsingAlias(SProductsPeer::CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($categoryId['max'])) {
				$this->addUsingAlias(SProductsPeer::CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::CATEGORY_ID, $categoryId, $comparison);
	}

	/**
	 * Filter the query on the related_products column
	 * 
	 * @param     string $relatedProducts The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByRelatedProducts($relatedProducts = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($relatedProducts)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $relatedProducts)) {
				$relatedProducts = str_replace('*', '%', $relatedProducts);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::RELATED_PRODUCTS, $relatedProducts, $comparison);
	}

	/**
	 * Filter the query on the mainImage column
	 * 
	 * @param     string $mainimage The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByMainimage($mainimage = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mainimage)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mainimage)) {
				$mainimage = str_replace('*', '%', $mainimage);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::MAINIMAGE, $mainimage, $comparison);
	}

	/**
	 * Filter the query on the smallImage column
	 * 
	 * @param     string $smallimage The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySmallimage($smallimage = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($smallimage)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $smallimage)) {
				$smallimage = str_replace('*', '%', $smallimage);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::SMALLIMAGE, $smallimage, $comparison);
	}

	/**
	 * Filter the query on the short_description column
	 * 
	 * @param     string $shortDescription The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByShortDescription($shortDescription = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($shortDescription)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $shortDescription)) {
				$shortDescription = str_replace('*', '%', $shortDescription);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::SHORT_DESCRIPTION, $shortDescription, $comparison);
	}

	/**
	 * Filter the query on the full_description column
	 * 
	 * @param     string $fullDescription The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByFullDescription($fullDescription = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fullDescription)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fullDescription)) {
				$fullDescription = str_replace('*', '%', $fullDescription);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::FULL_DESCRIPTION, $fullDescription, $comparison);
	}

	/**
	 * Filter the query on the meta_title column
	 * 
	 * @param     string $metaTitle The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByMetaTitle($metaTitle = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($metaTitle)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $metaTitle)) {
				$metaTitle = str_replace('*', '%', $metaTitle);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::META_TITLE, $metaTitle, $comparison);
	}

	/**
	 * Filter the query on the meta_description column
	 * 
	 * @param     string $metaDescription The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByMetaDescription($metaDescription = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($metaDescription)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $metaDescription)) {
				$metaDescription = str_replace('*', '%', $metaDescription);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::META_DESCRIPTION, $metaDescription, $comparison);
	}

	/**
	 * Filter the query on the meta_keywords column
	 * 
	 * @param     string $metaKeywords The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByMetaKeywords($metaKeywords = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($metaKeywords)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $metaKeywords)) {
				$metaKeywords = str_replace('*', '%', $metaKeywords);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SProductsPeer::META_KEYWORDS, $metaKeywords, $comparison);
	}

	/**
	 * Filter the query on the old_price column
	 * 
	 * @param     string|array $oldPrice The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByOldPrice($oldPrice = null, $comparison = null)
	{
		if (is_array($oldPrice)) {
			$useMinMax = false;
			if (isset($oldPrice['min'])) {
				$this->addUsingAlias(SProductsPeer::OLD_PRICE, $oldPrice['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($oldPrice['max'])) {
				$this->addUsingAlias(SProductsPeer::OLD_PRICE, $oldPrice['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::OLD_PRICE, $oldPrice, $comparison);
	}

	/**
	 * Filter the query on the created column
	 * 
	 * @param     int|array $created The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(SProductsPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(SProductsPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::CREATED, $created, $comparison);
	}

	/**
	 * Filter the query on the updated column
	 * 
	 * @param     int|array $updated The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByUpdated($updated = null, $comparison = null)
	{
		if (is_array($updated)) {
			$useMinMax = false;
			if (isset($updated['min'])) {
				$this->addUsingAlias(SProductsPeer::UPDATED, $updated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updated['max'])) {
				$this->addUsingAlias(SProductsPeer::UPDATED, $updated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::UPDATED, $updated, $comparison);
	}

	/**
	 * Filter the query on the views column
	 * 
	 * @param     int|array $views The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByViews($views = null, $comparison = null)
	{
		if (is_array($views)) {
			$useMinMax = false;
			if (isset($views['min'])) {
				$this->addUsingAlias(SProductsPeer::VIEWS, $views['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($views['max'])) {
				$this->addUsingAlias(SProductsPeer::VIEWS, $views['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SProductsPeer::VIEWS, $views, $comparison);
	}

	/**
	 * Filter the query by a related SBrands object
	 *
	 * @param     SBrands|PropelCollection $sBrands The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByBrand($sBrands, $comparison = null)
	{
		if ($sBrands instanceof SBrands) {
			return $this
				->addUsingAlias(SProductsPeer::BRAND_ID, $sBrands->getId(), $comparison);
		} elseif ($sBrands instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SProductsPeer::BRAND_ID, $sBrands->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByBrand() only accepts arguments of type SBrands or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Brand relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinBrand($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Brand');
		
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
			$this->addJoinObject($join, 'Brand');
		}
		
		return $this;
	}

	/**
	 * Use the Brand relation SBrands object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SBrandsQuery A secondary query class using the current class as primary query
	 */
	public function useBrandQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinBrand($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Brand', 'SBrandsQuery');
	}

	/**
	 * Filter the query by a related SCategory object
	 *
	 * @param     SCategory|PropelCollection $sCategory The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByMainCategory($sCategory, $comparison = null)
	{
		if ($sCategory instanceof SCategory) {
			return $this
				->addUsingAlias(SProductsPeer::CATEGORY_ID, $sCategory->getId(), $comparison);
		} elseif ($sCategory instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SProductsPeer::CATEGORY_ID, $sCategory->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByMainCategory() only accepts arguments of type SCategory or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MainCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinMainCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MainCategory');
		
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
			$this->addJoinObject($join, 'MainCategory');
		}
		
		return $this;
	}

	/**
	 * Use the MainCategory relation SCategory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useMainCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMainCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MainCategory', 'SCategoryQuery');
	}

	/**
	 * Filter the query by a related SProductImages object
	 *
	 * @param     SProductImages $sProductImages  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySProductImages($sProductImages, $comparison = null)
	{
		if ($sProductImages instanceof SProductImages) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sProductImages->getProductId(), $comparison);
		} elseif ($sProductImages instanceof PropelCollection) {
			return $this
				->useSProductImagesQuery()
					->filterByPrimaryKeys($sProductImages->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySProductImages() only accepts arguments of type SProductImages or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SProductImages relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinSProductImages($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SProductImages');
		
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
			$this->addJoinObject($join, 'SProductImages');
		}
		
		return $this;
	}

	/**
	 * Use the SProductImages relation SProductImages object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductImagesQuery A secondary query class using the current class as primary query
	 */
	public function useSProductImagesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSProductImages($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProductImages', 'SProductImagesQuery');
	}

	/**
	 * Filter the query by a related SProductVariants object
	 *
	 * @param     SProductVariants $sProductVariants  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByProductVariant($sProductVariants, $comparison = null)
	{
		if ($sProductVariants instanceof SProductVariants) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sProductVariants->getProductId(), $comparison);
		} elseif ($sProductVariants instanceof PropelCollection) {
			return $this
				->useProductVariantQuery()
					->filterByPrimaryKeys($sProductVariants->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByProductVariant() only accepts arguments of type SProductVariants or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ProductVariant relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinProductVariant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ProductVariant');
		
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
			$this->addJoinObject($join, 'ProductVariant');
		}
		
		return $this;
	}

	/**
	 * Use the ProductVariant relation SProductVariants object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductVariantsQuery A secondary query class using the current class as primary query
	 */
	public function useProductVariantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProductVariant($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ProductVariant', 'SProductVariantsQuery');
	}

	/**
	 * Filter the query by a related SWarehouseData object
	 *
	 * @param     SWarehouseData $sWarehouseData  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySWarehouseData($sWarehouseData, $comparison = null)
	{
		if ($sWarehouseData instanceof SWarehouseData) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sWarehouseData->getProductId(), $comparison);
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
	 * @return    SProductsQuery The current query, for fluid interface
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
	 * Filter the query by a related ShopProductCategories object
	 *
	 * @param     ShopProductCategories $shopProductCategories  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByShopProductCategories($shopProductCategories, $comparison = null)
	{
		if ($shopProductCategories instanceof ShopProductCategories) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $shopProductCategories->getProductId(), $comparison);
		} elseif ($shopProductCategories instanceof PropelCollection) {
			return $this
				->useShopProductCategoriesQuery()
					->filterByPrimaryKeys($shopProductCategories->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByShopProductCategories() only accepts arguments of type ShopProductCategories or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ShopProductCategories relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinShopProductCategories($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ShopProductCategories');
		
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
			$this->addJoinObject($join, 'ShopProductCategories');
		}
		
		return $this;
	}

	/**
	 * Use the ShopProductCategories relation ShopProductCategories object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ShopProductCategoriesQuery A secondary query class using the current class as primary query
	 */
	public function useShopProductCategoriesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinShopProductCategories($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ShopProductCategories', 'ShopProductCategoriesQuery');
	}

	/**
	 * Filter the query by a related SProductPropertiesData object
	 *
	 * @param     SProductPropertiesData $sProductPropertiesData  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySProductPropertiesData($sProductPropertiesData, $comparison = null)
	{
		if ($sProductPropertiesData instanceof SProductPropertiesData) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sProductPropertiesData->getProductId(), $comparison);
		} elseif ($sProductPropertiesData instanceof PropelCollection) {
			return $this
				->useSProductPropertiesDataQuery()
					->filterByPrimaryKeys($sProductPropertiesData->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySProductPropertiesData() only accepts arguments of type SProductPropertiesData or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SProductPropertiesData relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinSProductPropertiesData($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SProductPropertiesData');
		
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
			$this->addJoinObject($join, 'SProductPropertiesData');
		}
		
		return $this;
	}

	/**
	 * Use the SProductPropertiesData relation SProductPropertiesData object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductPropertiesDataQuery A secondary query class using the current class as primary query
	 */
	public function useSProductPropertiesDataQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSProductPropertiesData($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProductPropertiesData', 'SProductPropertiesDataQuery');
	}

	/**
	 * Filter the query by a related SOrderProducts object
	 *
	 * @param     SOrderProducts $sOrderProducts  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySOrderProducts($sOrderProducts, $comparison = null)
	{
		if ($sOrderProducts instanceof SOrderProducts) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sOrderProducts->getProductId(), $comparison);
		} elseif ($sOrderProducts instanceof PropelCollection) {
			return $this
				->useSOrderProductsQuery()
					->filterByPrimaryKeys($sOrderProducts->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySOrderProducts() only accepts arguments of type SOrderProducts or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SOrderProducts relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinSOrderProducts($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SOrderProducts');
		
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
			$this->addJoinObject($join, 'SOrderProducts');
		}
		
		return $this;
	}

	/**
	 * Use the SOrderProducts relation SOrderProducts object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SOrderProductsQuery A secondary query class using the current class as primary query
	 */
	public function useSOrderProductsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSOrderProducts($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SOrderProducts', 'SOrderProductsQuery');
	}

	/**
	 * Filter the query by a related SProductsRating object
	 *
	 * @param     SProductsRating $sProductsRating  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterBySProductsRating($sProductsRating, $comparison = null)
	{
		if ($sProductsRating instanceof SProductsRating) {
			return $this
				->addUsingAlias(SProductsPeer::ID, $sProductsRating->getProductId(), $comparison);
		} elseif ($sProductsRating instanceof PropelCollection) {
			return $this
				->useSProductsRatingQuery()
					->filterByPrimaryKeys($sProductsRating->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySProductsRating() only accepts arguments of type SProductsRating or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SProductsRating relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function joinSProductsRating($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SProductsRating');
		
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
			$this->addJoinObject($join, 'SProductsRating');
		}
		
		return $this;
	}

	/**
	 * Use the SProductsRating relation SProductsRating object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SProductsRatingQuery A secondary query class using the current class as primary query
	 */
	public function useSProductsRatingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSProductsRating($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SProductsRating', 'SProductsRatingQuery');
	}

	/**
	 * Filter the query by a related SCategory object
	 * using the shop_product_categories table as cross reference
	 *
	 * @param     SCategory $sCategory the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function filterByCategory($sCategory, $comparison = Criteria::EQUAL)
	{
		return $this
			->useShopProductCategoriesQuery()
				->filterByCategory($sCategory, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     SProducts $sProducts Object to remove from the list of results
	 *
	 * @return    SProductsQuery The current query, for fluid interface
	 */
	public function prune($sProducts = null)
	{
		if ($sProducts) {
			$this->addUsingAlias(SProductsPeer::ID, $sProducts->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSProductsQuery
