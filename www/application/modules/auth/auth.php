<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Image CMS
 * auth.php
 */

class Auth extends MY_Controller
{
        
	// Used for registering and changing password form validation
	public $min_username = 4;
	public $max_username = 20;
	public $min_password = 4;
	public $max_password = 20;

	public $ban_reason = NULL;

	public function __construct()
	{
		parent::__construct();

        $this->load->helper('url');
        $this->load->library('Form_validation');
        $this->load->library('DX_Auth');
        $this->form_validation->CI =& $this;
	}

	public function index()
	{
		$this->login();
	}

	/* Callback functions */

	function username_check($username)
	{
        ($hook = get_hook('auth_username_check')) ? eval($hook) : NULL;

		$result = $this->dx_auth->is_username_available($username);
		if ( ! $result)
		{
			$this->form_validation->set_message('username_check', lang('lang_login_exists'));
		}

		return $result;
	}

	function email_check($email)
	{
		($hook = get_hook('auth_email_check')) ? eval($hook) : NULL;

		$result = $this->dx_auth->is_email_available($email);
		if ( ! $result)
		{
			$this->form_validation->set_message('email_check', lang('lang_email_exists'));
		}

		return $result;
	}

	function captcha_check($code)
	{
       // ($hook = get_hook('auth_captcha_check')) ? eval($hook) : NULL;
	
	// if ($this->dx_auth->use_recaptcha)
	//	$this->form_validation->set_rules('recaptcha_response_field', lang('lang_captcha'), 'trim|required|xss_clean|callback_captcha_check');
	 //   else
	//	$this->form_validation->set_rules('captcha', lang('lang_captcha'), 'trim|required|xss_clean|callback_captcha_check');
	
	}

        function getCodeUrl($redirect_uri)
	{
	return $this->auth_base_url."/oauth/authorize?client_id=".$this->client_id."&redirect_uri=".$this->redirect_uri."&scope=offline_access,publish_stream&display=popup";
	}

function getAccessToken($redirect_uri,$code,$callbackurl)
	{
	$res = $this->makeRequest($this->auth_base_url."/oauth/access_token?client_id=".$this->client_id."&redirect_uri=".$this->redirect_uri."&client_secret=".$this->client_secret."&code=".$code, $callbackurl);
	$st = "=";
	$pos = strpos($res,$st);
	$res = substr($res,$pos+1);

	return $res;
	}

	function streamPublish($msg,$access_token) {
		if (empty($access_token)) {return false;}
		$res = $this->makeRequest($this->api_base_url."/method/stream.publish?message=".urlencode($msg)."&access_token=".$access_token);

		preg_match_all("/<stream_publish_response[^>]*>(.*?)<\/stream_publish_response>/si",$res,$matches, PREG_PATTERN_ORDER);


		if (!empty($matches) && !empty($matches[1][0])) {
			//return post id
			return $matches[1][0];
		} else {
			return $res;
		}
	}

        function pagesGetInfo($access_token)
	{
	//if (empty($access_token)) {return 'error';}
	$res = $this->makeRequest($this->api_base_url."/method/pages.getinfo?access_token=".$access_token."&fields=page_id,name,page_url");

	return $res;
	}

    function makeRequest ($url, $callbackurl="") {
		$ch = curl_init();

			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_REFERER, $callbackurl);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);

		curl_setopt($ch, CURLOPT_URL, $url);

		$result = curl_exec($ch);
		if (empty($result)) {
			die(curl_error($ch));
			curl_close($ch);
		}

		curl_close($ch);
		return $result;
	}
public function editProfile($photo,$email,$username)
    {

        $profile = SUserProfileQuery::create()->filterByUserId($this->_userId)->findOne();
        $this->_userId = $this->dx_auth->get_user_id();
        $user = $this->db->where('id', $this->_userId)->get('users')->row_array();

        if ($profile === null)
        {
            // Create profile
            $profile = new SUserProfile;
            $profile->setUserId($this->_userId);
            $profile->setName($username);
            //$profile->setSurname($username);
            $profile->setProfileImage($photo);
            $profile->save();
        }
        else
        {
           $profile->setUserId($this->_userId);
           $profile->setName($username);
          // $profile->setSurname($username);
           $profile->setProfileImage($photo);
        }
       // $this
    }

        public function setUserFacebook()
        {
            //$this->redirect_uri = site_url('auth/setUserFacebook');
            $app_id = "267585903271931";
            $app_secret = "21d02f1c2045bd356d1d6df6c30c825a";
            $my_url = site_url('auth/setUserFacebook');
            $code = $_REQUEST["code"];


           session_start();
           if(empty($code)) {
             $_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection
             $dialog_url = "http://www.facebook.com/dialog/oauth?client_id="
           . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
           . $_SESSION['state'];

                 echo("<script> top.location.href='" . $dialog_url . "'</script>");
               }

            $token_url = "https://graph.facebook.com/oauth/access_token?"
               . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
               . "&client_secret=" . $app_secret . "&code=" . $code."&scope=email,read_stream";
            $response = json_decode(file_get_contents($token_url));

                 $response = file_get_contents($token_url);
                 $params = null;
                 parse_str($response, $params);

                 $graph_url = "https://graph.facebook.com/me?access_token="
                   . $params['access_token'];

                 $user = json_decode(file_get_contents($graph_url));

////////////////////////////////////////////////////////////////////////////
        ($hook = get_hook('auth_on_register')) ? eval($hook) : NULL;

       if ( ! $this->dx_auth->is_logged_in() AND $this->dx_auth->allow_registration)
       {

                $password = $user->id;
                $username = $user->first_name;
                $email    = $user->email.'t';
                $photo    = "https://graph.facebook.com/".$user->id."/picture?type=large";

                ($hook = get_hook('auth_reg_set_rules')) ? eval($hook) : NULL;
 //////////////////////___________auth__________//////////////////////////////////
                 if ($this->dx_auth->login($username, $password))
                 {

                     ($hook = get_hook('auth_login_success')) ? eval($hook) : NULL;
                  //   $this->editProfile($photo,$email,$username);
		      // Redirect to homepage
		      redirect('', 'location');
		 }

 //////////////////////___________register__________//////////////////////////////////
             if ($this->dx_auth->register($username, $password, $email))
             {
                  ($hook = get_hook('auth_register_success')) ? eval($hook) : NULL;
                 if ($this->dx_auth->login($username, $password))
                      $this->editProfile($photo,$email,$username);
                      redirect('', 'location');
             }
       }
   }
        
        

	public function setUserVkontakte() {
		$url = "https://api.vkontakte.ru/oauth/access_token?client_id=2464640&client_secret=Se5gKNMpGj198BC9O8EY&code=" . $_REQUEST['code'];
		$response = json_decode(@file_get_contents($url));
		if ($response->error) {
			die('�?ли какая-то другая обработка ошибки');
		}
		$arrResponse = json_decode(@file_get_contents("https://api.vkontakte.ru/method/getProfiles?uid={$response->user_id}&access_token={$response->access_token}&fields=photo"))->response;

	 }

	function recaptcha_check()
	{
      //  ($hook = get_hook('auth_recaptcha_check')) ? eval($hook) : NULL;

	//	$result = $this->dx_auth->is_recaptcha_match();
	//	if ( ! $result)
	//	{
	//		$this->form_validation->set_message('recaptcha_check', lang('lang_captcha_error'));
	//	}

	//	return $result;
	}

	/* End of Callback functions */

	
	function vk() {
	
		if ($this->input->get('code')) {
			$code = $this->input->get('code'); 
			$url = "https://api.vkontakte.ru/oauth/access_token?client_id=2464640&client_secret=Se5gKNMpGj198BC9O8EY&code=" . $code;
			$fgcontent = @file_get_contents($url);
			//$fgcontent = '{"access_token":"65cf77282bc8510665b287259365971ca5f65b265b2872536ffa38fe804eda3","expires_in":85789,"user_id":8253453}';
			
			$response = json_decode($fgcontent);
			
			if ($response->error) {
				die('�?ли какая-то другая обработка ошибки');
			} 
			
			if ( $this->dx_auth->register_vk($response->user_id,$response->access_token) ) {
				redirect('', 'location');
			} else {
				
				echo 'error auth'; die();
			
			}
		}
	
	}
	

	/*
	 * Login function
	 */

	function login() {
		($hook = get_hook('auth_on_login')) ? eval($hook) : NULL;
		
		if ( ! $this->dx_auth->is_logged_in()) {
			$val = $this->form_validation;

			// Set form validation rules
			$val->set_rules('username', lang('lang_login'), 'trim|required|min_length[3]|max_length[30]|xss_clean');
			$val->set_rules('password', lang('lang_password'), 'trim|required|min_length[3]|max_length[30]|xss_clean');
			$val->set_rules('remember', 'Remember me', 'integer');

            ($hook = get_hook('auth_login_set_rules')) ? eval($hook) : NULL;

			// Set captcha rules if login attempts exceed max attempts in config
			/*if ($this->dx_auth->is_max_login_attempts_exceeded())
			{
				if ($this->dx_auth->use_recaptcha)
					$val->set_rules('recaptcha_response_field', lang('lang_captcha'), 'trim|xss_clean|required|callback_captcha_check');
				else
					$val->set_rules('captcha', lang('lang_captcha'), 'trim|required|xss_clean|callback_captcha_check');
			}*/

			if ($val->run() AND $this->dx_auth->login($val->set_value('username'), $val->set_value('password'), $val->set_value('remember'))) {
                ($hook = get_hook('auth_login_success')) ? eval($hook) : NULL;

				// Redirect to homepage
				redirect('', 'location');
			} else {

                ($hook = get_hook('auth_login_failed')) ? eval($hook) : NULL; 

    			$this->template->assign('info_message',	$this->dx_auth->get_auth_error());

				// Check if the user is failed logged in because user is banned user or not
				if ($this->dx_auth->is_banned()) {
                    ($hook = get_hook('auth_user_banned')) ? eval($hook) : NULL;

					// Redirect to banned uri
					//$this->dx_auth->deny_access('banned');
					$this->ban_reason = $this->dx_auth->get_ban_reason();
					$this->banned();
					exit;
				} else {
					// Default is we don't show captcha until max login attempts eceeded
					$data['show_captcha'] = FALSE;

					// Show captcha if login attempts exceed max attempts in config
					if ($this->dx_auth->is_max_login_attempts_exceeded()) {
                        ($hook = get_hook('auth_login_attemps_exceeded')) ? eval($hook) : NULL;

						// Create catpcha
						$this->dx_auth->captcha();
						$this->template->assign('cap_image', $this->dx_auth->get_captcha_image());
						// Set view data to show captcha on view file
						$data['show_captcha'] = TRUE;
					}

                           ($hook = get_hook('auth_show_login_tpl')) ? eval($hook) : NULL;

					// Load login page view
					$this->template->show('login');
				}
			}
		} else {
            ($hook = get_hook('auth_user_is_logged')) ? eval($hook) : NULL;

			$this->template->assign('content',lang('lang_user_logged_in'));
			$this->template->show();
		}
	}

	function logout()
	{
        ($hook = get_hook('auth_logout')) ? eval($hook) : NULL;

		$this->dx_auth->logout();

        ($hook = get_hook('auth_logout_redirect')) ? eval($hook) : NULL;

        redirect('', 'location');

		//$this->template->assign('content', lang('lang_user_logged_out'));
		//$this->template->show();
	}

	function register()
    {
        ($hook = get_hook('auth_on_register')) ? eval($hook) : NULL;


        $this->load->library('Form_validation');

		if ( ! $this->dx_auth->is_logged_in() AND $this->dx_auth->allow_registration)
		{
			$val = $this->form_validation;

			// Set form validation rules
			$val->set_rules('username', lang('lang_login'), 'trim|required|xss_clean|min_length['.$this->min_username.']|max_length['.$this->max_username.']|callback_username_check|alpha_dash');
			$val->set_rules('password', lang('lang_password'), 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']');
			//$val->set_rules('confirm_password', lang('lang_confirm_password'), 'trim|required|xss_clean');
			$val->set_rules('email', lang('lang_email'), 'trim|required|xss_clean|valid_email|callback_email_check');

                      ($hook = get_hook('auth_reg_set_rules')) ? eval($hook) : NULL;

			//if ($this->dx_auth->captcha_registration)
			//{
			//	if ($this->dx_auth->use_recaptcha)
			//		$val->set_rules('recaptcha_response_field', lang('lang_captcha'), 'trim|xss_clean|required|callback_captcha_check');
			//	else
			//		$val->set_rules('captcha', lang('lang_captcha'), 'trim|xss_clean|required|callback_captcha_check');
			//}

			// Run form validation and register user if it's pass the validation
			if ($val->run() AND $this->dx_auth->register($val->set_value('username'), $val->set_value('password'), $val->set_value('email'))) {
                      ($hook = get_hook('auth_register_success')) ? eval($hook) : NULL;

				// Set success message accordingly
				if ($this->dx_auth->email_activation) {
					$data['auth_message'] = lang('lang_check_mail_acc');
				} else {
                    $data['auth_message'] = lang('lang_reg_success');
                    //  ($hook = get_hook('auth_on_activate_acc')) ? eval($hook) : NULL;

		            if ($this->dx_auth->login($val->set_value('username'), $val->set_value('password'))) {
						($hook = get_hook('auth_login_success')) ? eval($hook) : NULL;
					}
                                     
					$this->template->assign('info_message', $data['auth_message']);
					$this->template->show('login');
					//$data['auth_message'] = lang('lang_reg_success').anchor(site_url($this->dx_auth->login_uri), lang('lang_login'));
				}

               // ($hook = get_hook('auth_show_success_message')) ? eval($hook) : NULL;

				// Load registration success page
		//		$this->template->assign('content',$data['auth_message']);
		//		$this->template->show();
			} else {

    			$this->template->assign('info_message',	$this->dx_auth->get_auth_error());

				// Is registration using captcha
				if ($this->dx_auth->captcha_registration)
				{
					$this->dx_auth->captcha();
					$this->template->assign('cap_image', $this->dx_auth->get_captcha_image());
				}

                ($hook = get_hook('auth_show_register_tpl')) ? eval($hook) : NULL;

				// Load registration page
				$this->template->show('register');
			}
		} elseif ( ! $this->dx_auth->allow_registration) {
            ($hook = get_hook('auth_register_closed')) ? eval($hook) : NULL;

			$data['auth_message'] = lang('lang_register_off');

			$this->template->assign('content',$data['auth_message']);
			$this->template->show();
		} else {
            ($hook = get_hook('auth_logout_to_reg')) ? eval($hook) : NULL;

			$data['auth_message'] = lang('lang_logout_to_reg');

			$this->template->assign('content',$data['auth_message']);
			$this->template->show();
		} 
	}

    function register_vk() {
        ($hook = get_hook('auth_on_register')) ? eval($hook) : NULL;

		if ( ! $this->dx_auth->is_logged_in() AND $this->dx_auth->allow_registration) {

		// Run form validation and register user if it's pass the validation
			if ($this->dx_auth->register_vk($user_id, $access_token)) {
                ($hook = get_hook('auth_register_success')) ? eval($hook) : NULL;

				$data['auth_message'] = lang('lang_reg_success');

				if ($this->dx_auth->login_vk($user_id, $access_token)) {
					  ($hook = get_hook('auth_login_success')) ? eval($hook) : NULL;
				}

				$this->template->assign('info_message', $data['auth_message']);
				$this->template->show('login');

			} else {

    			$this->template->assign('info_message',	$this->dx_auth->get_auth_error());

				// Is registration using captcha
				if ($this->dx_auth->captcha_registration)
				{
					$this->dx_auth->captcha();
					$this->template->assign('cap_image', $this->dx_auth->get_captcha_image());
				}

                ($hook = get_hook('auth_show_register_tpl')) ? eval($hook) : NULL;

				// Load registration page
				$this->template->show('register');
			}
		} elseif ( ! $this->dx_auth->allow_registration) {
            ($hook = get_hook('auth_register_closed')) ? eval($hook) : NULL;

			$data['auth_message'] = lang('lang_register_off');

			$this->template->assign('content',$data['auth_message']);
			$this->template->show();
		} else {
            ($hook = get_hook('auth_logout_to_reg')) ? eval($hook) : NULL;

			$data['auth_message'] = lang('lang_logout_to_reg');

			$this->template->assign('content',$data['auth_message']);
			$this->template->show();
		}
	}





	function activate()
	{
        ($hook = get_hook('auth_on_activate_acc')) ? eval($hook) : NULL;

		// Get username and key
		$username = $this->uri->segment(3);
		$key = $this->uri->segment(4);

		// Activate user
		if ($this->dx_auth->activate($username, $key))
		{
			$data['auth_message'] = lang('lang_acc_activated').anchor(site_url($this->dx_auth->login_uri), lang('lang_login'));

			$this->template->assign('content',$data['auth_message']);
			$this->template->show();
		}
		else
		{
			$data['auth_message'] = lang('lang_resend_acc_code');

			$this->template->assign('content',$data['auth_message']);
			$this->template->show();
		}
	}

	function forgot_password()
    {
       ($hook = get_hook('auth_on_forgot_pass')) ? eval($hook) : NULL; 

        $this->load->library('Form_validation');

		$val = $this->form_validation;

		// Set form validation rules
		$val->set_rules('login', lang('lang_username_or_mail'), 'trim|required|xss_clean');

		// Validate rules and call forgot password function
		if ($val->run() AND $this->dx_auth->forgot_password($val->set_value('login')))
		{
			$data['auth_message'] = lang('lang_acc_mail_sent');
			$this->template->assign('info_message', $data['auth_message']);
        }

        if ( $this->dx_auth->_auth_error != NULL )
        {
            $this->template->assign('info_message', $this->dx_auth->_auth_error );
        }

        ($hook = get_hook('auth_show_forgot_pass_tpl')) ? eval($hook) : NULL; 

    	$this->template->show('forgot_password');
	}

	function reset_password()
	{
        ($hook = get_hook('auth_on_pass_reset')) ? eval($hook) : NULL;

		// Get username and key
		$username = $this->uri->segment(3);
		$key = $this->uri->segment(4);

		// Reset password
		if ($this->dx_auth->reset_password($username, $key))
		{
            ($hook = get_hook('auth_reset_pass_restored')) ? eval($hook) : NULL;

			$data['auth_message'] = lang('lang_pass_restored').anchor(site_url($this->dx_auth->login_uri), lang('lang_login'));

			$this->template->assign('content',$data['auth_message']);
			$this->template->show();
		}
		else
		{
            ($hook = get_hook('auth_reset_pass_failed')) ? eval($hook) : NULL;

			$data['auth_message'] = lang('lang_reset_failed');

			$this->template->assign('content',$data['auth_message']);
			$this->template->show();
		}
	}

	function change_password()
    {
        ($hook = get_hook('auth_on_change_pass')) ? eval($hook) : NULL;

        $this->load->library('Form_validation');

		// Check if user logged in or not
		if ($this->dx_auth->is_logged_in())
		{
			$val = $this->form_validation;

			// Set form validation
			$val->set_rules('old_password', lang('lang_old_password'), 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']');
			$val->set_rules('new_password', lang('lang_new_password'), 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_new_password]');
			$val->set_rules('confirm_new_password', lang('lang_confirm_new_pass'), 'trim|required|xss_clean');

			// Validate rules and change password
			if ($val->run() AND $this->dx_auth->change_password($val->set_value('old_password'), $val->set_value('new_password')))
			{
				$data['auth_message'] = lang('lang_pass_changed');

				$this->template->assign('content',$data['auth_message']);
				$this->template->show();
			}
			else
			{
				$this->template->show('change_password');
			}
		}
		else
		{
			// Redirect to login page
			$this->dx_auth->deny_access('login');
		}
	}

	function cancel_account()
    {
        ($hook = get_hook('auth_on_cancel_acc')) ? eval($hook) : NULL;

        $this->load->library('Form_validation');

		// Check if user logged in or not
		if ($this->dx_auth->is_logged_in())
		{
			$val = $this->form_validation;

			// Set form validation rules
			$val->set_rules('password', lang('lang_password'), "trim|required|xss_clean");

			// Validate rules and change password
			if ($val->run() AND $this->dx_auth->cancel_account($val->set_value('password')))
			{
				// Redirect to homepage
				redirect('', 'location');
			}
			else
			{
				//$this->load->view($this->dx_auth->cancel_account_view);
			}
		}
		else
		{
			// Redirect to login page
			$this->dx_auth->deny_access('login');
		}
	}

	/*
	 * Deny access
	 */
	function deny()
	{
        ($hook = get_hook('auth_page_access_deny')) ? eval($hook) : NULL;

		$this->template->assign('content',lang('lang_access_deny'));
		$this->template->show();
	}

	function banned()
	{
       ($hook = get_hook('auth_show_banned_message')) ? eval($hook) : NULL; 

		echo lang('lang_user_banned');

		if($this->ban_reason != NULL)
		{
			echo '<br/>'.$this->ban_reason;
		}
	}

}

/* End of file auth.php */
