<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Profile Controller
 * 
 * @uses ShopController
 * @package Shop
 * @version 0.1
 * @copyright 2010 Siteimage
 * @author <dev@imagecms.net> 
 */
class Profile extends ShopController {

    protected $_userId = null;

	public function __construct()
	{
	    parent::__construct();

        if (!$this->dx_auth->is_logged_in())
            redirect('/');            

        $this->_userId = $this->dx_auth->get_user_id();
	}


    /**
     * Display list of user order
     * 
     * @access public
     */
	public function index()
	{
        $orders = SOrdersQuery::create()
            ->orderByDateCreated('DESC')
            ->filterByUserId($this->_userId)->find();

        $this->render('profile', array(
            'orders'=>$orders,
        )); 
    }

    /**
     * Edit user profile
     * 
     * @access public
     */
    public function edit()
    {
        $profile = SUserProfileQuery::create()->filterByUserId($this->_userId)->findOne(); 
        $user = $this->db->where('id', $this->_userId)->get('users')->row_array();

        if ($profile === null)
        {
            // Create profile
            $profile = new SUserProfile;
            $profile->setUserId($this->_userId);
            $profile->save();
        }

        if ($_POST)
        {
            $profile->setName($this->input->post('name'));
            $profile->setPhone($this->input->post('phone'));
            $profile->setAddress($this->input->post('address'));
            $profile->save();
            $saved = true;
        }        

        $this->render('edit_profile', array(
            'profile'=>$profile,
            'user'=>$user,
            'saved'=>$saved,
        ));
    }

}

/* End of file profile.php */
