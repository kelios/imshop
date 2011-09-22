<div id="categories_menu_tree">
    <ul class="categories_tree_list">
        <?php echo ShopCore::app()->SCategoryTree->ul() ?>
	</ul>

	<h3>Все бренды магазина</h3>
    <div class="brand">
    <?php  $result = SBrandsQuery::create()->find(); 
 if(is_true_array($result)){ foreach ($result as $brand){ ?>
	    <a href="<?php  echo shop_url ('brand/' . $brand->getUrl());  ?>"><?php echo $brand->getName() ?></a>
	<?php }} ?>
    </div>
	<h3>Принимаем к оплате</h3>
	<div class="brand">
		<img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/cards.gif" alt="logo" border="0"/>
	</div>
	<h3>Время работы</h3>
	<div class="time_work">
		Магазин работает <b>круглосуточно</b>, можете заказывать товары в любое время. <br />
		Мы готовы принимать и обрабатывать Ваши заказы каждый день с 10:00 до 19:00. Выходной - воскресенье.
	</div>

    <?php  echo widget ('latest_news');  ?>
    <?php  echo widget ('recent_product_comments');  ?>
</div><?php $mabilis_ttl=1316779845; $mabilis_last_modified=1307530898; //Y:\home\imshop.ru\www\templates\commerce\shop\default/sidebar.tpl ?>