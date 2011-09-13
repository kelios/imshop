<?php


/**
 * Base class that represents a query for the 'shop_user_profile' table.
 *
 * 
 *
 * @method     SUserProfileQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SUserProfileQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     SUserProfileQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SUserProfileQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     SUserProfileQuery orderByAddress($order = Criteria::ASC) Order by the address column
 *
 * @method     SUserProfileQuery groupById() Group by the id column
 * @method     SUserProfileQuery groupByUserId() Group by the user_id column
 * @method     SUserProfileQuery groupByName() Group by the name column
 * @method     SUserProfileQuery groupByPhone() Group by the phone column
 * @method     SUserProfileQuery groupByAddress() Group by the address column
 *
 * @method     SUserProfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SUserProfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SUserProfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SUserProfile findOne(PropelPDO $con = null) Return the first SUserProfile matching the query
 * @method     SUserProfile findOneOrCreate(PropelPDO $con = null) Return the first SUserProfile matching the query, or a new SUserProfile object populated from the query conditions when no match is found
 *
 * @method     SUserProfile findOneById(int $id) Return the first SUserProfile filtered by the id column
 * @method     SUserProfile findOneByUserId(int $user_id) Return the first SUserProfile filtered by the user_id column
 * @method     SUserProfile findOneByName(string $name) Return the first SUserProfile filtered by the name column
 * @method     SUserProfile findOneByPhone(string $phone) Return the first SUserProfile filtered by the phone column
 * @method     SUserProfile findOneByAddress(string $address) Return the first SUserProfile filtered by the address column
 *
 * @method     array findById(int $id) Return SUserProfile objects filtered by the id column
 * @method     array findByUserId(int $user_id) Return SUserProfile objects filtered by the user_id column
 * @method     array findByName(string $name) Return SUserProfile objects filtered by the name column
 * @method     array findByPhone(string $phone) Return SUserProfile objects filtered by the phone column
 * @method     array findByAddress(string $address) Return SUserProfile objects filtered by the address column
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSUserProfileQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSUserProfileQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Shop', $modelName = 'SUserProfile', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SUserProfileQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SUserProfileQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SUserProfileQuery) {
			return $criteria;
		}
		$query = new SUserProfileQuery();
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
	 * @return    SUserProfile|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SUserProfilePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SUserProfilePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SUserProfilePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SUserProfileQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SUserProfilePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the user_id column
	 * 
	 * @param     int|array $userId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SUserProfileQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(SUserProfilePeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(SUserProfilePeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SUserProfilePeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SUserProfileQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SUserProfilePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the phone column
	 * 
	 * @param     string $phone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SUserProfileQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SUserProfilePeer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the address column
	 * 
	 * @param     string $address The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SUserProfileQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SUserProfilePeer::ADDRESS, $address, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SUserProfile $sUserProfile Object to remove from the list of results
	 *
	 * @return    SUserProfileQuery The current query, for fluid interface
	 */
	public function prune($sUserProfile = null)
	{
		if ($sUserProfile) {
			$this->addUsingAlias(SUserProfilePeer::ID, $sUserProfile->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSUserProfileQuery
