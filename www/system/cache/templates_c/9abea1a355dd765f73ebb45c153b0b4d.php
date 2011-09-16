<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title>Панель Управления - Image CMS</title>
	<meta name="description" content="Панель Управления - Image CMS" />


	<link rel="stylesheet" href="<?php if(isset($THEME)){ echo $THEME; } ?>/css/content.css" type="text/css"/>

	<!--[if IE]>
		<script type="text/javascript" src="<?php if(isset($JS_URL)){ echo $JS_URL; } ?>/mocha/excanvas-compressed.js"></script>
	<![endif]-->

	<script type="text/javascript" src="<?php if(isset($JS_URL)){ echo $JS_URL; } ?>/mocha/mootools-1.2-core.js"></script>
	<script type="text/javascript" src="<?php if(isset($JS_URL)){ echo $JS_URL; } ?>/mocha/mootools-1.2-more.js"></script>
	<script type="text/javascript" src="<?php if(isset($JS_URL)){ echo $JS_URL; } ?>/plugins/Roar.js"></script>
	<script type="text/javascript" src="<?php if(isset($JS_URL)){ echo $JS_URL; } ?>/mocha/functions.js"></script>

	<script  type="text/javascript">
        var theme = '<?php if(isset($THEME)){ echo $THEME; } ?>';
        var base_url = '<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>';
    </script>
	<STYLE TYPE="text/css">
	body { 
		margin: 0px 20px 0px 20px;
		background-image:url('/templates/administrator/images/bg2.png');
        background-color:#333344;
        text-align: center;
        height:95%; 
        width:95%;
	 }
	#box { 
		margin: 0 auto;   		
        text-align: left; 
        padding-top:150px;
		width: 400px;

	 }
	h1{ 
		padding-left:55px;
        font-size:20px;
	 }
	.error { 
		color:red;
		font-size:12px;
	 }
	#s_text { 
		color:#B1B1B1;
		font-weight:bold;
	 }
    .b_list  { 
        margin:0;
        padding:0;
     }
    .b_list { 
        list-style:none;
     }
    .b_list a { 
        color:silver;
     }
    .b_list a:hover { 
        color:#6D9CB2; 
     }
    .b_list li { 
        float:left;
        padding-right:10px;
     }
	</STYLE>
	

</head>
<body>

<div id="spinner"></div>

<div id="login_form_box"><?php 
$ci = get_instance();

if($ci->config->item('is_installed') === TRUE AND file_exists(APPPATH.'modules/install/install.php'))
    die('<span style="font-size:18px;"><br/><br/>Для продолжения работы, удалите файл ./application/modules/install/install.php</div>');
 ?>

<div id="box">

<img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/logo_big.png" />

<br/>

<?php if($login_failed): ?>
    <?php if(isset($login_failed)){ echo $login_failed; } ?>
<?php endif; ?>

<p>
    <form method="post" action="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/login/" id="login_form">
    <?php if(isset($lang_login)){ echo $lang_login; } ?>: <br/>  <input type="text" name="login" class="textbox_long" /><?php if(isset($login_error)){ echo $login_error; } ?><br/>
    <?php if(isset($lang_password)){ echo $lang_password; } ?>: <br/> <input type="password" name="password" class="textbox_long" /><?php if(isset($password_error)){ echo $password_error; } ?><br/>
    <br/><label><input type="checkbox" name="remember" value="1" /> Запомнить меня</label><br/>

        <?php if($use_captcha == "1"): ?>
            <?php if(isset($lang_captcha)){ echo $lang_captcha; } ?>:<br/>
            <div id="captcha">
                <?php if(isset($cap_image)){ echo $cap_image; } ?>
            </div>
            <a href="#" onclick="ajax_div('captcha','<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>/admin/login/update_captcha');return false;">Обновить код</a>
            <br/><br/>
            <input type="text" class="textbox_long" size="30" name="captcha" /><?php if(isset($captcha_error)){ echo $captcha_error; } ?><br/>
        <?php endif; ?>

    <br/>
    <input type="submit" name="button"   class="button" value="<?php if(isset($lang_submit)){ echo $lang_submit; } ?>" />
    <?php  echo form_csrf ();  ?>
    </form>
</p>

<div style="right:0;bottom:0;position:absolute;font-size:11px;padding:3px;">
    <span style="color:silver;font-size:12px; font-weight:bold;">Поддерживаются следующие браузеры:</span>
    <ul class="b_list"> 
        <li><a href="http://www.mozilla.com/" target="_blank">Firefox</a></li> 
        <li><a href="http://www.opera.com/browser/download/" target="_blank">Opera</a></li>
        <li><a href="http://www.apple.com/safari/" target="_blank">Safari</a></li>
        <li><a href="http://www.google.com/chrome/" target="_blank">Google Chrome</a></li>
    </ul>
</div>

</div>

</div>

</body>
</html>
<?php $mabilis_ttl=1316266265; $mabilis_last_modified=1289998704; //Y:\home\imshop\www\/templates/administrator/login.tpl ?>