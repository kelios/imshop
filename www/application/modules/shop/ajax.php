<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends ShopController 
{
	public function __construct()
	{
	    parent::__construct(); 	
	}

    /**
     * Rate product
     * 
     * @access public
     */
    public function rate()
    {
        $productId = (int) $_POST['pid'];
        $rating = (int) $_POST['val'];

        if(!in_array($rating, range(1, 5)))
            exit;

        // Check if product exists
        if (SProductsQuery::create()->findPk($productId) !== null && !$this->session->userdata('voted'.$productId) == true)
        {
            $model = SProductsRatingQuery::create()->findPk($productId);

            if ($model === null)
            {
                $model = new SProductsRating;
                $model->setProductId($productId);
            }

            $model->setVotes($model->getVotes() + 1);
            $model->setRating($model->getRating() + $rating);
            $model->save();

            // Store session vote block;
            $this->session->set_userdata('voted'.$productId, true);
        }
    }

    public function getCartDataHtml()
    {
        return $this->render('cart_data', array(), true);
    }
	
	public function  getCategoryAttributes($catId)
	{
			$model = SCategoryQuery::create()
				->filterById((int) $catId)
				->filterByActive(TRUE)
				->findOne();
			if (!$model) return false;
		return $this->render('category_attributes', array('model' =>$model), true);
	}
}

/* End of file shop.php */
