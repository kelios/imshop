<?php 
/**
  Shop Controller class file.
**/

class ShopController extends MY_Controller {

    protected $template_path = null;

    public function __construct()
    {
        parent::__construct();
        $this->template_path = ShopCore::$template_path;
    }

    /**
     * Fetch teplate file and display it in main.tpl
     * 
     * @param string $name template file name
     * @param array $data template data
     * @access public
     */
    public function render($name, $data = array(), $fetch = false)
    {
        $this->template->add_array($data);
		$content = $this->template->fetch('file:'.$this->template_path.$name.'.tpl');
        
        if ($fetch === false)
        {
            $this->template->assign('shop_content', $content);
            $this->template->display('file:'.$this->template_path.'main.tpl');
        }else{
            return $content;
        }

        /*** Profilers ***/
        //$this->load->library('Profiler');
        //echo $this->profiler->run();
        //echo ShopCore::app()->SPropelLogger->displayAsTable(); 
    }

    /**
     * Display 404 error page.
     * 
     * @access public
     */
    public function error404()
    {
        $this->render('error404',array(
            'error'=>ShopCore::t('Страница не найдена'),           
        ));
        exit;
    }
}
