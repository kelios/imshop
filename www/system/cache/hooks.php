<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_hook($hook_id)
{
$cms_hooks = array (
    'admin_update_category' => '$data[\'field_group\'] = $this->input->post(\'field_group\');
	$data[\'category_field_group\'] = $this->input->post(\'category_field_group\');

    $this->load->module(\'cfcm\')->save_item_data($cat_id, \'category\');
    $this->cache->delete(\'cfcm_field_\'.$cat_id.\'category\');',
'admin_create_category' => '$data[\'field_group\'] = $this->input->post(\'field_group\');
    $data[\'category_field_group\'] = $this->input->post(\'category_field_group\');',
'admin_page_update' => '$this->load->module(\'cfcm\')->save_item_data($page_id, \'page\');
    $this->cache->delete(\'cfcm_field_\'.$page_id.\'page\');',
'admin_on_page_add' => '$this->load->module(\'cfcm\')->save_item_data($page[\'id\'], \'page\');',
'admin_page_insert' => '$this->load->module(\'cfcm\')->save_item_data(\'0\', \'page\');',
'core_set_page_data' => '$this->page_content = $this->load->module(\'cfcm\')->connect_fields($this->page_content, \'page\');',
'core_read_main_page_tpl' => '$page = $this->load->module(\'cfcm\')->connect_fields($page, \'page\');',
'core_return_category_pages' => 'if (count($pages) > 0 AND is_array($pages))
{
    $n = 0;
    foreach ($pages as $p)
    {
        $pages[$n] = $this->load->module(\'cfcm\')->connect_fields($p, \'page\');
        $n++;
    }
}',
'cmsbase_return_categories' => '$n = 0;
    $ci =& get_instance();
    $ci->load->library(\'DX_Auth\');
    foreach ($categories as $c)
    {
        $categories[$n] = $ci->load->module(\'cfcm\')->connect_fields($c, \'category\');
        $n++;
    }',
'admin_on_page_delete' => '$this->db->where(\'item_id\', $page_id);
    $this->db->where(\'item_type\', \'page\');
    $this->db->delete(\'content_fields_data\');

    $this->cache->delete(\'cfcm_field_\'.$page_id.\'page\');',
'admin_category_delete' => '$this->db->where(\'item_id\', $cat_id);
    $this->db->where(\'item_type\', \'category\');
    $this->db->delete(\'content_fields_data\');',
'admin_sub_category_delete' => '$this->db->where(\'item_id\', $cat_id);
    $this->db->where(\'item_type\', \'category\');
    $this->db->delete(\'content_fields_data\');',
'admin_tpl_add_page' => 'echo \'<h4>Дополнительные Поля</h4>\';
	echo \'<div style="padding:8px;" id="cfcm_fields_block"></div>\';

    echo \'
    <script type="text/javascript">
           $("category_selectbox").addEvent("change", function(event){
            category_id = $("category_selectbox").value;
            ajax_div("cfcm_fields_block",  base_url + "admin/components/cp/cfcm/form_from_category_group/" + category_id + "/0/page");
           });

            // Load current category fields
            window.addEvent("domready", function(){
                category_id = $("category_selectbox").value;
                ajax_div("cfcm_fields_block",  base_url + "admin/components/cp/cfcm/form_from_category_group/" + category_id + "/0/page");
            });
    </script>
    \';',
'admin_tpl_edit_page' => 'echo \'<h4>Дополнительные Поля</h4>\';
	echo \'<div style="padding:8px;" id="cfcm_fields_block"></div>\';

    echo \'
    <script type="text/javascript">
           var update_page_id = \'.$update_page_id.\';

           $("category_selectbox").addEvent("change", function(event){
            category_id = $("category_selectbox").value;
            ajax_div("cfcm_fields_block",  base_url + "admin/components/cp/cfcm/form_from_category_group/" + category_id + "/" + update_page_id + "/page");
           });

            // Load current category fields
            window.addEvent("domready", function(){
                category_id = $("category_selectbox").value;
                ajax_div("cfcm_fields_block",  base_url + "admin/components/cp/cfcm/form_from_category_group/" + category_id + "/" + update_page_id + "/page");
            });
    </script>
    \';',
'admin_tpl_edit_category' => 'echo \'<h4>Дополнительные Поля</h4>\';
	echo \'<div style="padding:8px;" id="cfcm_fields_block">\';

    echo $this->CI->load->module(\'cfcm/admin\')->form_from_category_group($id, $id, \'category\');

    echo \'</div>\';',
'comments_read_com_tpl' => 'if (isset($_POST[\'comment_text\']))
{
    modules::run(\'comments/add\');
}',
'system_init_completed' => 'if (!defined(\'DS\'))
{
    define(\'DS\', DIRECTORY_SEPARATOR);
}
// Full path to shop module dir with ending slash.
define(\'SHOP_DIR\', PUBPATH.\'/application/modules/shop/\');

// Include Shop core.
require_once(SHOP_DIR . \'classes/ShopCore.php\');

// Register shop autoloader.
spl_autoload_unregister(array(\'ShopCore\',\'autoload\'));
spl_autoload_register(array(\'ShopCore\',\'autoload\'));

// Diable CSRF library form web money service
$CI =& get_instance();
if ($CI->uri->segment(1)==\'shop\' && $CI->uri->segment(2)==\'cart\' && $CI->uri->segment(3)==\'view\' && $_GET[\'result\']==\'true\' && $_GET[\'pm\'] > 0)
{
    define(\'ICMS_DISBALE_CSRF\',true);
}',
'admin_tpl_desktop_head' => '// Register shop javascript files.
echo \'<script type="text/javascript" src="/application/modules/shop/admin/templates/assets/shopFunctions.js"></script>\'."\n";
echo \'<link rel="stylesheet" href="/application/modules/shop/admin/templates/assets/shopAdmin.css" type="text/css" media="screen" />\'."\n";

echo \'<script type="text/javascript" src="/application/modules/shop/admin/templates/assets/SqueezeBox/SqueezeBox.js"></script>\'."\n";
echo \'<link rel="stylesheet" href="/application/modules/shop/admin/templates/assets/SqueezeBox/assets/SqueezeBox.css" type="text/css" media="screen" />\'."\n\n";',
'core_set_tpl_data' => 'ShopCore::initEnviroment();',
'core_init' => '',

);

    if (isset($cms_hooks[$hook_id]))
    {
        return $cms_hooks[$hook_id];
    }
    else
    {
       return FALSE;
    }
}

