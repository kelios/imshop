<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(isset($site_title)){ echo $site_title; } ?></title>
<meta name="description" content="<?php if(isset($site_description)){ echo $site_description; } ?>" />
<meta name="keywords" content="<?php if(isset($site_keywords)){ echo $site_keywords; } ?>" />
<meta name="generator" content="ImageCMS">

<style type="text/css">
    @import "<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>style/general.css";
    @import "<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>style/product.css";
    @import "<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>style/slideshow.css";
</style>

<script type="text/javascript" src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/jquery.hoverIntent.js"></script>
<script type="text/javascript" src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/superfish.js"></script>
<script type="text/javascript" src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/jquery.cycle.js"></script>
<script type="text/javascript" src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/jquery.functions.js"></script>
<script type="text/javascript" src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/js.js"></script>

<link rel="icon" href="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/favicon.png" type="image/x-icon" />
</head>
<body>
<!-- BEGIN LAYOUT -->
<div id="conteiner">
  <!-- BEGIN HEADER -->
  <div id="header">
    <div class="left">
      <!-- BEGIN LOGO -->
      <div id="logo"><a href="<?php  echo shop_url ('');  ?>"><img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/logo.png" alt="logo" border="0"/></a></div>
      <!-- BEGIN SLOGAN -->
      <div id="slogan">Приобретайте только качественную технику: <br /> +7 (095) <b>222-33-22</b><br /> +38 (098) <b>222-33-22</b></div>
    </div>
    <div class="right" id="mycart">
        <?php $this->include_tpl('shop/default/cart_data', 'Y:\home\imshop\www\templates\commerce'); ?> 
    </div>

    <div id="topCurrency" align="right">
    <form action="" method="post" name="currencyChangeForm">
    <?php  echo form_csrf ();  ?>
        Валюта: <select onchange="document.forms.currencyChangeForm.submit();" name="setCurrency">
            <?php  $result = get_currencies(); 
 if(is_true_array($result)){ foreach ($result as $currency){ ?>
                <option <?php if(ShopCore::app()->SCurrencyHelper->current->getId() == $currency->getId()): ?>selected<?php endif; ?> value="<?php echo $currency->getId() ?>"><?php echo encode($currency->getName()) ?></option>
            <?php }} ?>
        </select>
    </form>

    <?php if($CI->session->userdata('shopForCompare')): ?>
        <div class="topCompareInfo">
            <a href="<?php  echo shop_url ('compare');  ?>">
                Добавлено <?php  echo count ($CI->session->userdata('shopForCompare'));  ?> <?php echo SStringHelper::Pluralize(count($CI->session->userdata('shopForCompare')), array('товар','товара','товаров')) ?> для сравнения
            </a>
        </div>
    <?php endif; ?>

    </div>

    <div class="sp"></div>
  </div>
  <!-- END HEADER -->
  <!-- BEGIN NAVIGATION -->
  <div id="navigation">
    <ul>
      <li class="home"><a href="/" class="item">Главная</a></li>
      <li><a href="<?php  echo site_url ('about');  ?>" class="item">О Магазине</a> </li>
      <li><a href="<?php  echo site_url ('oplata');  ?>" class="item">Оплата</a> </li>
      <li><a href="<?php  echo site_url ('dostavka');  ?>" class="item">Доставка</a></li>
	  <li><a href="<?php  echo site_url ('help');  ?>" class="item">Помощь</a></li>
	  <li><a href="<?php  echo site_url ('contact_us');  ?>" class="item">Контакты</a></li>
    </ul>
    <!-- BEGIN SEARCH -->
    <div id="search">
      <form action="<?php  echo shop_url ('search');  ?>" method="get">
        <input type="submit" class="submit" value=""/>
        <input type="text" name="text" class="text"/>
      </form>
    </div>
  </div>
  <div id="main">
      <!-- BEGIN CONTEINER -->
    <div id="content">
        <?php if(isset($content)){ echo $content; } ?>
    </div>
    <!-- END CONTENT -->
    <div class="sp"></div>
  </div>
  <div class="sp"></div>
</div>
<!-- BEGIN FOOTER -->
<div id="footer">
  <div class="left">© 2011  Ваш <strong>Интернет-магазин</strong><br/>
    <div class="credits"> Powered by <a href="http://www.imagecms.net">ImageCMS Shop</a></div>
  </div>
  <ul class="right">
      <li><a href="<?php  echo site_url ('about');  ?>" class="item">О Магазине</a> </li>
      <li><a href="<?php  echo site_url ('oplata');  ?>" class="item">Оплата</a> </li>
      <li><a href="<?php  echo site_url ('dostavka');  ?>" class="item">Доставка</a></li>
	  <li><a href="<?php  echo site_url ('help');  ?>" class="item">Помощь</a></li>
	  <li><a href="<?php  echo site_url ('contact_us');  ?>" class="item">Контакты</a></li>
  </ul>
  <div class="sp"></div>
</div>
<!-- END FOOTER -->
</body>
</html>
<?php $mabilis_ttl=1316773492; $mabilis_last_modified=1303831608; //Y:\home\imshop\www\/templates/commerce/main.tpl ?>