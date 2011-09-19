        
        <?php if($is_logged_in): ?>
            <a href="<?php  echo shop_url ('profile');  ?>" class="items">Профиль</a>
        <?php else: ?>
            <a href="/auth" class="items">Авторизация</a>
        <?php endif; ?>
        <a href="<?php  echo shop_url ('cart');  ?>" class="items">
            <?php echo ShopCore::app()->SCart->totalItems() ?>
            <?php echo SStringHelper::Pluralize(ShopCore::app()->SCart->totalItems(), array('товар','товара','товаров')) ?>
        </a>
        <span class="prices"><?php echo ShopCore::app()->SCart->totalPrice() ?> <?php if(isset($CS)){ echo $CS; } ?> 
            <a href="<?php  echo shop_url ('cart');  ?>" class="image"><img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>style/images/myitems.jpg" width="22" height="18" border="0" alt="mycart" /></a>
        </span>

<?php $mabilis_ttl=1316510126; $mabilis_last_modified=1303831608; //Y:\home\imshop\www\templates\commerce/shop/default/cart_data.tpl ?>