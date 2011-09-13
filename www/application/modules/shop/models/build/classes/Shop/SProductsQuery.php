<?php



/**
 * Skeleton subclass for performing query and update operations on the 'shop_products' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class SProductsQuery extends BaseSProductsQuery {

    public function combinator(array $data)
    {
        $n=0;
        foreach ($data as $key=>$values)
        {
            $combiners=array();
            foreach ($values as $searchText)
            {
                $alias = 'C'.$n;
                $c1 = $alias.$n.'c1';
                $c2 = $alias.$n.'c2';
                $combineName = 'Combine'.$n;

                $this->join('SProductPropertiesData '. $alias, Criteria::LEFT_JOIN);
                
                $this->condition($c1, $alias.'.PropertyId = ?', $key); 
                $this->condition($c2, $alias.'.Value = ?', $searchText);
                $this->combine(array($c1,$c2), 'and', $combineName);

                $combiners[]=$combineName;

                $n++;
            }

            $this->combine($combiners,'or','Combiner'.$n);
            $allCombiners[] = 'Combiner'.$n;  
        }
        
        $this->where($allCombiners, 'and');
        $this->distinct();

        return $this;
    }

    /**
     * Apply custom fields query.
     *
     * @param  $fieldsDataArray
     * @return SProductsQuery
     */
    public function applyCustomFieldsQuery($fieldsDataArray)
    {
        $filterData = array();

        if (sizeof($fieldsDataArray) > 0 && is_array($fieldsDataArray))
        {
            foreach ($fieldsDataArray as $fieldId=>$vals)
            {
                if (count($vals) > 0 && is_array($vals))
                {
                    // Load field
                    $field = SPropertiesQuery::create()
                            ->filterByActive(true)
                            ->findPk($fieldId);

                    if ($field !== null)
                    {
                        $fieldValues = $field->asArray();
                        foreach ($vals as $needVal)
                        {
                            if (isset($fieldValues, $needVal) && !empty($needVal) OR $needVal == '0')
                            {
                                if (!is_array($filterData[$field->getId()]))
                                    $filterData[$field->getId()] = array();

                                array_push($filterData[$field->getId()],$fieldValues[$needVal]);
                                $filterData[$field->getId()] = array_unique($filterData[$field->getId()]);
                            }
                        }
                    }
                }
            }
        }

        if (sizeof($filterData) > 0)
            return $this->combinator($filterData);
        else
            return $this;
    }

    public static function getFilterQueryString()
    {
        $data = array();

        $need = array('f','lp','rp','brand','order');

        foreach($need as $key=>$value)
        {
            if (isset(ShopCore::$_GET[$value]))
            {
                $data[$value] = ShopCore::$_GET[$value];
            }
        }

        return '?'.http_build_query($data);
    }
	
    public function mostViewed($limit = 6)
    {
	$this->orderByViews(Criteria::DESC)
		->filterByActive(true)
		->limit($limit);
	return $this;
    }
    public function getSimilarProducts(SProducts $model)
    {

        $properties = SProductPropertiesDataQuery::create()
                      ->findByProductId($model->getId());

        foreach ($properties as $property) {
            $data[][$property->getPropertyId()] = array($property->getValue());
        }

        shuffle($data);
        return $this
              ->leftJoin('ProductVariant')
              ->where('SProducts.Id != ?', $model->getId())
              ->filterByActive(true)
              ->combinator($data[0]);
    }

} // SProductsQuery
