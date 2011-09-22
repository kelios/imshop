        
        <?php if($is_logged_in): ?>
            <a href="<?php  echo shop_url ('profile');  ?>" class="items">Профиль</a>
        <?php else: ?>
            <?php $q =  ShopCore::$ci->db->get_where('components',array('name' => 'auth'),1)->row_array(); ?>
            <?php $rename ='/'.$q['identif']; ?>
            <a href="<?php if(isset($rename)){ echo $rename; } ?>" class="items">Авторизация</a>
        <?php endif; ?>
        <a href="<?php  echo shop_url ('cart');  ?>" class="items">
            <?php echo ShopCore::app()->SCart->totalItems() ?>
            <?php echo SStringHelper::Pluralize(ShopCore::app()->SCart->totalItems(), array('товар','товара','товаров')) ?>
        </a>
        <span class="prices"><?php echo ShopCore::app()->SCart->totalPrice() ?> <?php if(isset($CS)){ echo $CS; } ?> 
            <a href="<?php  echo shop_url ('cart');  ?>" class="image"><img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>style/images/myitems.jpg" width="22" height="18" border="0" alt="mycart" /></a>
        </span>

<?php $mabilis_ttl=1316779850; $mabilis_last_modified=1316433105; //Y:\home\imshop.ru\www\templates\commerce\shop\default/cart_data.tpl ?>