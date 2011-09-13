<?php


/**
 * Base class that represents a query for the 'shop_discounts' table.
 *
 * 
 *
 * @method     ShopDiscountsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ShopDiscountsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ShopDiscountsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ShopDiscountsQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ShopDiscountsQuery orderByDateStart($order = Criteria::ASC) Order by the date_start column
 * @method     ShopDiscountsQuery orderByDateStop($order = Criteria::ASC) Order by the date_stop column
 * @method     ShopDiscountsQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ShopDiscountsQuery orderByUserGroup($order = Criteria::ASC) Order by the user_group column
 * @method     ShopDiscountsQuery orderByMinPrice($order = Criteria::ASC) Order by the min_price column
 * @method     ShopDiscountsQuery orderByMaxPrice($order = Criteria::ASC) Order by the max_price column
 * @method     ShopDiscountsQuery orderByCategories($order = Criteria::ASC) Order by the categories column
 * @method     ShopDiscountsQuery orderByProducts($order = Criteria::ASC) Order by the products column
 *
 * @method     ShopDiscountsQuery groupById() Group by the id column
 * @method     ShopDiscountsQuery groupByName() Group by the name column
 * @method     ShopDiscountsQuery groupByDescription() Group by the description column
 * @method     ShopDiscountsQuery groupByActive() Group by the active column
 * @method     ShopDiscountsQuery groupByDateStart() Group by the date_start column
 * @method     ShopDiscountsQuery groupByDateStop() Group by the date_stop column
 * @method     ShopDiscountsQuery groupByDiscount() Group by the discount column
 * @method     ShopDiscountsQuery groupByUserGroup() Group by the user_group column
 * @method     ShopDiscountsQuery groupByMinPrice() Group by the min_price column
 * @method     ShopDiscountsQuery groupByMaxPrice() Group by the max_price column
 * @method     ShopDiscountsQuery groupByCategories() Group by the categories column
 * @method     ShopDiscountsQuery groupByProducts() Group by the products column
 *
 * @method     ShopDiscountsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ShopDiscountsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ShopDiscountsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ShopDiscounts findOne(PropelPDO $con = null) Return the first ShopDiscounts matching the query
 * @method     ShopDiscounts findOneOrCreate(PropelPDO $con = null) Return the first ShopDiscounts matching the query, or a new ShopDiscounts object populated from the query conditions when no match is found
 *
 * @method     ShopDiscounts findOneById(int $id) Return the first ShopDiscounts filtered by the id column
 * @method     ShopDiscounts findOneByName(string $name) Return the first ShopDiscounts filtered by the name column
 * @method     ShopDiscounts findOneByDescription(string $description) Return the first ShopDiscounts filtered by the description column
 * @method     ShopDiscounts findOneByActive(boolean $active) Return the first ShopDiscounts filtered by the active column
 * @method     ShopDiscounts findOneByDateStart(int $date_start) Return the first ShopDiscounts filtered by the date_start column
 * @method     ShopDiscounts findOneByDateStop(int $date_stop) Return the first ShopDiscounts filtered by the date_stop column
 * @method     ShopDiscounts findOneByDiscount(string $discount) Return the first ShopDiscounts filtered by the discount column
 * @method     ShopDiscounts findOneByUserGroup(string $user_group) Return the first ShopDiscounts filtered by the user_group column
 * @method     ShopDiscounts findOneByMinPrice(string $min_price) Return the first ShopDiscounts filtered by the min_price column
 * @method     ShopDiscounts findOneByMaxPrice(string $max_price) Return the first ShopDiscounts filtered by the max_price column
 * @method     ShopDiscounts findOneByCategories(string $categories) Return the first ShopDiscounts filtered by the categories column
 * @method     ShopDiscounts findOneByProducts(string $products) Return the first ShopDiscounts filtered by the products column
 *
 * @method     array findById(int $id) Return ShopDiscounts objects filtered by the id column
 * @method     array findByName(string $name) Return ShopDiscounts objects filtered by the name column
 * @method     array findByDescription(string $description) Return ShopDiscounts objects filtered by the description column
 * @method     array findByActive(boolean $active) Return ShopDiscounts objects filtered by the active column
 * @method     array findByDateStart(int $date_start) Return ShopDiscounts objects filtered by the date_start column
 * @method     array findByDateStop(int $date_stop) Return ShopDiscounts objects filtered by the date_stop column
 * @method     array findByDiscount(string $discount) Return ShopDiscounts objects filtered by the discount column
 * @method     array findByUserGroup(string $user_group) Return ShopDiscounts objects filtered by the user_group column
 * @method     array findByMinPrice(string $min_price) Return ShopDiscounts objects filtered by the min_price column
 * @method     array findByMaxPrice(string $max_price) Return ShopDiscounts objects filtered by the max_price column
 * @method     array findByCategories(string $categories) Return ShopDiscounts objects filtered by the categories column
 * @method     array findByProducts(string $products) Return ShopDiscounts objects filtered by the products column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseShopDiscountsQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseShopDiscountsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'ShopDiscounts', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ShopDiscountsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ShopDiscountsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ShopDiscountsQuery) {
			return $criteria;
		}
		$query = new ShopDiscountsQuery();
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
	 * @return    ShopDiscounts|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ShopDiscountsPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ShopDiscountsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ShopDiscountsPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ShopDiscountsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ShopDiscountsPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ShopDiscountsPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ShopDiscountsPeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the date_start column
	 * 
	 * @param     int|array $dateStart The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterByDateStart($dateStart = null, $comparison = null)
	{
		if (is_array($dateStart)) {
			$useMinMax = false;
			if (isset($dateStart['min'])) {
				$this->addUsingAlias(ShopDiscountsPeer::DATE_START, $dateStart['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateStart['max'])) {
				$this->addUsingAlias(ShopDiscountsPeer::DATE_START, $dateStart['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShopDiscountsPeer::DATE_START, $dateStart, $comparison);
	}

	/**
	 * Filter the query on the date_stop column
	 * 
	 * @param     int|array $dateStop The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterByDateStop($dateStop = null, $comparison = null)
	{
		if (is_array($dateStop)) {
			$useMinMax = false;
			if (isset($dateStop['min'])) {
				$this->addUsingAlias(ShopDiscountsPeer::DATE_STOP, $dateStop['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateStop['max'])) {
				$this->addUsingAlias(ShopDiscountsPeer::DATE_STOP, $dateStop['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShopDiscountsPeer::DATE_STOP, $dateStop, $comparison);
	}

	/**
	 * Filter the query on the discount column
	 * 
	 * @param     string $discount The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterByDiscount($discount = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($discount)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $discount)) {
				$discount = str_replace('*', '%', $discount);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ShopDiscountsPeer::DISCOUNT, $discount, $comparison);
	}

	/**
	 * Filter the query on the user_group column
	 * 
	 * @param     string $userGroup The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterByUserGroup($userGroup = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($userGroup)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $userGroup)) {
				$userGroup = str_replace('*', '%', $userGroup);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ShopDiscountsPeer::USER_GROUP, $userGroup, $comparison);
	}

	/**
	 * Filter the query on the min_price column
	 * 
	 * @param     string|array $minPrice The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterByMinPrice($minPrice = null, $comparison = null)
	{
		if (is_array($minPrice)) {
			$useMinMax = false;
			if (isset($minPrice['min'])) {
				$this->addUsingAlias(ShopDiscountsPeer::MIN_PRICE, $minPrice['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($minPrice['max'])) {
				$this->addUsingAlias(ShopDiscountsPeer::MIN_PRICE, $minPrice['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShopDiscountsPeer::MIN_PRICE, $minPrice, $comparison);
	}

	/**
	 * Filter the query on the max_price column
	 * 
	 * @param     string|array $maxPrice The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterByMaxPrice($maxPrice = null, $comparison = null)
	{
		if (is_array($maxPrice)) {
			$useMinMax = false;
			if (isset($maxPrice['min'])) {
				$this->addUsingAlias(ShopDiscountsPeer::MAX_PRICE, $maxPrice['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($maxPrice['max'])) {
				$this->addUsingAlias(ShopDiscountsPeer::MAX_PRICE, $maxPrice['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ShopDiscountsPeer::MAX_PRICE, $maxPrice, $comparison);
	}

	/**
	 * Filter the query on the categories column
	 * 
	 * @param     string $categories The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterByCategories($categories = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($categories)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $categories)) {
				$categories = str_replace('*', '%', $categories);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ShopDiscountsPeer::CATEGORIES, $categories, $comparison);
	}

	/**
	 * Filter the query on the products column
	 * 
	 * @param     string $products The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function filterByProducts($products = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($products)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $products)) {
				$products = str_replace('*', '%', $products);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ShopDiscountsPeer::PRODUCTS, $products, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ShopDiscounts $shopDiscounts Object to remove from the list of results
	 *
	 * @return    ShopDiscountsQuery The current query, for fluid interface
	 */
	public function prune($shopDiscounts = null)
	{
		if ($shopDiscounts) {
			$this->addUsingAlias(ShopDiscountsPeer::ID, $shopDiscounts->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseShopDiscountsQuery
