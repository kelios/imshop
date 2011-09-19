<div id="categories_menu_tree">
    <ul>
        <li>&nbsp;</li>
        <li><a href="<?php  echo shop_url ('profile');  ?>">Мои заказы</a></li>
        <li><a href="<?php  echo shop_url ('profile/edit');  ?>">Мои данные</a></li>
            <?php $q =  ShopCore::$ci->db->get_where('components',array('name' => 'auth'),1)->row_array(); ?>
            <?php $rename ='/'.$q['identif'].'/'; ?>
        <li><a href="<?php if(isset($rename)){ echo $rename; } ?>logout">Выход</a></li>
	</ul>
</div>
<?php $mabilis_ttl=1316517151; $mabilis_last_modified=1316432549; //Y:\home\imshop\www\templates\commerce\shop\default/profile_menu.tpl ?>