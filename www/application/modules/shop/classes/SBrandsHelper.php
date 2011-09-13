<?php
class SBrandsHelper {
	/**
	* Returns an array of brands ordering by total products in brand
	*
	* @param int $limit Limit of returned brands
	* @return an array of brands sorted by totalProducts in brand with brand fields name, url, total and brand model
	*/
	public static function mostProductBrands($limit = 5) 
        {
            $limit = is_int($limit) ? $limit : 5;
            
            $total_in_brand = array();
            
            foreach (SBrandsQuery::create()->find() as $brand)
            {
                $total_in_brand[$brand->getId()]['name'] = $brand->getName();
                $total_in_brand[$brand->getId()]['url'] = $brand->getUrl();
                $total_in_brand[$brand->getId()]['total'] = $brand->totalProducts();
                $total_in_brand[$brand->getId()]['model'] = $brand;
            }
            
            $tmp = Array(); 
            foreach($total_in_brand as &$ma)
            $tmp[] = &$ma['total']; 
            array_multisort($tmp, SORT_DESC, $total_in_brand);
            
            return array_slice($total_in_brand, 0, $limit);
	}
}
/* End of file SBrandsHelper.php */