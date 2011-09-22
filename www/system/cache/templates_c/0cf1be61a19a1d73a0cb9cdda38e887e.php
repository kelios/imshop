<div id="titleExt"><h5><span class="ext"><?php  echo lang ('lang_register');  ?></span></h5></div>

<?php if(validation_errors() OR $info_message): ?>
    <div class="errors"> 
        <?php  echo validation_errors ();  ?>
        <?php if(isset($info_message)){ echo $info_message; } ?>
    </div>
<?php endif; ?>

<br/>

<form action="" class="form" method="post">

        <div class="fieldName"><?php  echo lang ('lang_login');  ?></div>
        <div class="field">      
            <input type="text" size="30" name="username" id="username" value="<?php  echo set_value ('username');  ?>"/>
        </div>
        <div class="clear"></div>


        <div class="fieldName"><?php  echo lang ('lang_email');  ?></div>
        <div class="field">      
            <input type="text" size="30" name="email" id="email" value="<?php  echo set_value ('email');  ?>" />
        </div>
        <div class="clear"></div>
 

        <div class="fieldName"><?php  echo lang ('lang_password');  ?></div>
        <div class="field">      
            <input type="password" size="30" name="password" id="password" value="<?php  echo set_value ('password');  ?>" />
        </div>
        <div class="clear"></div>

        
        <div class="fieldName"><?php  echo lang ('lang_confirm_password');  ?></div>
        <div class="field">      
            <input type="password" class="text" size="30" name="confirm_password" id="confirm_password" />
        </div>
        <div class="clear"></div>

        <?php if($cap_image): ?> 
        <div class="fieldName"><?php if(isset($cap_image)){ echo $cap_image; } ?></div>
        <?php if($captcha_type == 'captcha'): ?>
        <div class="field">
            <input type="text" name="captcha" id="captcha" />            
        </div>
        <?php endif; ?>
        <div class="clear"></div>        
        <?php endif; ?> 

        <div class="fieldName"></div>
        <div class="field">
            <input type="submit" id="submit" class="submit" value="<?php  echo lang ('lang_submit');  ?>" />              
        </div>
        <div class="clear"></div>

        <div class="fieldName"></div>
        <div class="field">      
            <a href="<?php  echo site_url ( $modules['auth']  . '/forgot_password');  ?>"><?php  echo lang ('lang_forgot_password');  ?></a>
            &nbsp;
            <?php $q =  ShopCore::$ci->db->get_where('components',array('name' => 'auth'),1)->row_array(); ?>
            <?php $rename =$q['identif'].'/'; ?>
            <a href="<?php  echo site_url ('<?php if(isset($rename)){ echo $rename; } ?>login');  ?>">Вход</a>
        </div>
        <div class="clear"></div>

<?php  echo form_csrf ();  ?>
</form>
<div class="dos_list">
        <h2>Также вы можете войти на сайт с помощью:</h2>
        <div class="sn">
        <a href="<?php  echo site_url ('/auth/setUserFacebook');  ?>"class="face">&nbsp;</a>
        <a href="http://api.vkontakte.ru/oauth/authorize?client_id=2494304&scope=&redirect_uri=<?php  echo site_url ('/auth/vk');  ?>&response_type=code" class="vk">&nbsp;</a>
        </div>
</div>

<?php $mabilis_ttl=1316777189; $mabilis_last_modified=1316692557; //Y:\home\imshop\www\/templates/commerce/register.tpl ?>