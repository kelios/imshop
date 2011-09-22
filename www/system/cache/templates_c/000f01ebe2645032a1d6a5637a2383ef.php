<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title>Панель Управления | Image CMS</title>
	<meta name="description" content="Панель Управления - Image CMS" />

	<link rel="stylesheet" href="<?php if(isset($THEME)){ echo $THEME; } ?>/css/content.css" type="text/css" />
	<link rel="stylesheet" href="<?php if(isset($THEME)){ echo $THEME; } ?>/css/rdTree.css" type="text/css" />
	<link rel="stylesheet" href="<?php if(isset($THEME)){ echo $THEME; } ?>/css/calendar.css" type="text/css" />
	<link rel="stylesheet" href="<?php if(isset($THEME)){ echo $THEME; } ?>/css/sortableTable.css" type="text/css" />
	<link rel="stylesheet" href="<?php if(isset($THEME)){ echo $THEME; } ?>/css/alertbox.css" type="text/css" />
	<link rel="stylesheet" href="<?php if(isset($THEME)){ echo $THEME; } ?>/css/Autocompleter.css" type="text/css" />
	<link rel="stylesheet" href="<?php if(isset($THEME)){ echo $THEME; } ?>/css/ui.css" type="text/css" />

    
    <script  type="text/javascript">
        var theme = '<?php if(isset($THEME)){ echo $THEME; } ?>';
        var base_url = '<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>';
        var h_steps = 0;
        var cur_pos = 0;
        var tt = 0;
    </script>

	<!--[if IE]>
		<script type="text/javascript" src="<?php if(isset($JS_URL)){ echo $JS_URL; } ?>/mocha/excanvas-compressed.js"></script>
	<![endif]-->

	<script type="text/javascript" src="<?php if(isset($JS_URL)){ echo $JS_URL; } ?>/compress_js.php"></script>

	<script type="text/javascript" src="<?php if(isset($JS_URL)){ echo $JS_URL; } ?>/tinymce/tiny_mce.js.php"></script>
	<script type="text/javascript" src="<?php if(isset($JS_URL)){ echo $JS_URL; } ?>/tinymce/plugins/tinybrowser/tb_tinymce.js.php"></script>
	<script type="text/javascript" src="<?php if(isset($JS_URL)){ echo $JS_URL; } ?>/tinymce/plugins/tinybrowser/tb_standalone.js.php"></script>

    <?php ($hook = get_hook('admin_tpl_desktop_head')) ? eval($hook) : NULL; ?>
    <script type="text/javascript">
        window.addEvent('domready', function(){ 
            ajax_div('page', base_url + 'admin/dashboard/index');
         });
    </script>
    

    <?php if(isset($editor)){ echo $editor; } ?>

</head>
<body>

<div id="desktop">

<div id="desktopHeader">

<div id="desktopTitlebarWrapper">

<img id="spinner2" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/spinner-placeholder.gif" style="float:right;padding:20px;position:relative;" />

	<div id="desktopTitlebar">
            <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/logo1.png" id="cmsLogo" onclick="ajax_div('page', base_url + 'admin/dashboard/index'); return false;" style="cursor:pointer;" width="130px;" /> 
        <h2 class="tagline">
 
		</h2>
		<div id="topNav">
			<ul class="menu-right">
            <li>
                <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/left.png" style="cursor:pointer" width="16" height="16" title="Назад (Ctrl + Left)" onclick="history_back();">
				<img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/right.png" style="cursor:pointer" width="16" height="16" title="Вперед (Ctrl + Right)" onclick="history_forward();">
				<img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/refresh.png" style="cursor:pointer" width="16" height="16" title="Обновить  (Ctrl + R)" onclick="history_refresh();">
            </li>
			</ul>
		</div>
	</div>
    <div class="toolbox" style="display:none;">
	   	
    </div>
</div>

<div style="float:right;color:#fff;padding-top:11px;padding-right:8px;"> 
    Добро пожаловать, <span style="color: #CCCCCC"><?php if(isset($username)){ echo $username; } ?></span>
</div>

<div id="desktopNavbar">
<ul>
	<li><a class="returnFalse" href="#">Содержимое</a>
		<ul>
			<li><a id="add_page_link" href="#">Создать</a></li>
			<li><a id="" href="#" class="returnFalse" onclick="ajax_div('page',base_url + 'admin/pages/GetPagesByCategory/0');">Без категории</a></li>
			<li class="divider"><a id="" href="#" onclick="com_admin('cfcm'); return false;">Конструктор полей</a></li>
		</ul>
	</li>

	<li><a class="returnFalse" href="">Категории</a>
		<ul>
			<li><a id="create_cat_link_" href="#" onclick="ajax_div('page', base_url + 'admin/categories/create_form'); return false;">Создать</a></li>
				<li><a class="returnFalse" onclick="ajax_div('page', base_url + 'admin/categories/cat_list'); return false;" href="#">Редактировать</a></li>
		</ul>
	</li>

	<li><a class="returnFalse" href="">Меню</a>
		<ul>
			<li><a href="#" id="menu_manager_link" onclick="com_admin('menu'); return false;">Управление</a></li>
			<li class="divider returnFalse"><a href="#"></a></li>
            <?php if(is_true_array($menus)){ foreach ($menus as $menu){ ?>
			<li><a href="#" onclick="ajax_div('page',base_url + 'admin/components/cp/menu/menu_item/<?php  echo $menu['name'];  ?>'); return false;"><?php  echo $menu['main_title'];  ?></a></li>
            <?php }} ?>
		</ul>
	</li>

	<li>
	<a class="returnFalse" href="#" onclick="ajax_div('page', base_url + 'admin/components/modules_table/'); return false;">Модули</a>
		<ul>
		<li><a id="all_modules_link" href="#" onclick="ajax_div('page', base_url + 'admin/components/modules_table/'); return false;">Все Модули</a></li> 
		<li><a id="mod_search_link" href="#" onclick="ajax_div('page', base_url + 'admin/mod_search/'); return false;">Поиск</a></li>
	    <li class="divider returnFalse"><a href="#"></a></li>
			<?php if($components): ?>
			<?php if(is_true_array($components)){ foreach ($components as $component){ ?>
                <?php if($component['installed'] == TRUE AND $component['admin_file'] == 1): ?>
				<li><a id="" href="#" onclick="com_admin('<?php  echo $component['com_name'];  ?>'); return false;"><?php  echo $component['menu_name'];  ?></a>
				</li>
                <?php endif; ?>
			<?php }} ?>
			<?php endif; ?>
		</ul>
	</li>

	<li><a class="returnFalse" href="#" onclick="ajax_div('page', base_url + 'admin/widgets_manager'); return false;">Виджеты</a>
	</li>

	<li>
	<a class="returnFalse" href="">Система</a>
		<ul>
			<li><a id="settings_link" class="returnFalse" href="#">Конфигурация Сайта</a></li>
            <!-- <li><a id="main_page_link" href="">Главная Страница</a></li> -->
			<li><a id="languages_link" href="">Языки</a></li> 
			<li><a class="returnFalse arrow-right" href="">Кеш</a>
				<ul>
					<li><a  href="javascript:delete_cache('all')">Очистить полностью</a></li>
					<li><a  href="javascript:delete_cache('expried')">Очистить устаревшие</a></li>
				</ul>
			</li>
            <li class="divider"><a href="#" onclick="ajax_div('page', base_url + 'admin/admin_logs'); return false;">Журнал событий</a></li>
            <li><a href="#" onclick="ajax_div('page', base_url + 'admin/backup'); return false;">Резервное копирование</a></li>
		</ul>
	</li>

	<li><a href="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>" target="_blank">Просмотреть сайт</a></li>
	<li><a href="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/logout">Выход</a></li>
</ul>



</div>
</div>

<div id="dockWrapper">
	<div id="dock">
		<div id="dockPlacement"></div>
		<div id="dockAutoHide"></div>
		<div id="dockSort"><div id="dockClear" class="clear"></div></div>
	</div>
</div>

<div id="pageWrapper"></div>

</div><!-- desktop end -->
</body>
</html>
<?php $mabilis_ttl=1316522672; $mabilis_last_modified=1307609454; //Y:\home\imshop\www\/templates/administrator/desktop.tpl ?>