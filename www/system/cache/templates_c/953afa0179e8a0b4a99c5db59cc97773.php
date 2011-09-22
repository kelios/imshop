<?php $this->include_tpl('profile_menu', 'Y:\home\imshop.ru\www\templates\commerce\shop\default'); ?>

<div class="products_list">

    <?php if($saved): ?>
        <div style="background-color:#f5f5dc;">
            Изменения сохранены.
        </div>
        <br/>
    <?php endif; ?>

<form action="<?php  echo shop_url ('profile/edit');  ?>" method="post" name="editForm">
        <div class="fieldName">Имя, фамилия:</div>
        <div class="field">
            <input type="text" class="input" name="name" value="<?php echo encode($profile->getName()) ?>">
        </div>
        <div class="clear"></div>

        <div class="fieldName">Email:</div>
        <div class="field">
            <?php  echo encode( $user['email'] )  ?>            
        </div>
        <div class="clear"></div>

        <div class="fieldName">Телефон:</div>
        <div class="field">
            <input type="text" class="input" name="phone" value="<?php echo encode($profile->getPhone()) ?>">
        </div>
        <div class="clear"></div>

        <div class="fieldName">Адрес доставки:</div>
        <div class="field">
            <input type="text" class="input" name="address" value="<?php echo encode($profile->getAddress()) ?>">
        </div>
        <div class="clear"></div>

        <div id="buttons" style="padding:0px;">
            <a href="#" id="checkout" onClick="document.editForm.submit();"><?php echo ShopCore::t('Сохранить') ?></a>
        </div>
        <?php  echo form_csrf ();  ?>
</form>
</div>
<?php $mabilis_ttl=1316779850; $mabilis_last_modified=1303831608; //Y:\home\imshop.ru\www\templates\commerce\shop\default/edit_profile.tpl ?>