<div id="titleExt"><span class="ext"><?php  echo lang ('lang_login_page');  ?></span></h5></div>

<?php if(validation_errors() OR $info_message): ?>
    <div class="errors"> 
        <?php  echo validation_errors ();  ?>
        <?php if(isset($info_message)){ echo $info_message; } ?>
    </div>
<?php endif; ?>

<br/>

<form action="" method="post" class="form">

        <div class="fieldName"><?php  echo lang ('lang_login');  ?></div>
        <div class="field">
<input type="text" id="username" size="30" name="username" value="Введите Ваш логин" onfocus="if(this.value=='Введите Ваш логин') this.value='';" onblur="if(this.value=='') this.value='Введите Ваш логин';" />            
        </div>
        <div class="clear"></div>

        <div class="fieldName"><?php  echo lang ('lang_password');  ?></div>
        <div class="field">
        <input type="password" size="30" name="password" id="password" value="<?php  echo lang ('lang_password');  ?>" onfocus="if(this.value=='<?php  echo lang ('lang_password');  ?>') this.value='';" onblur="if(this.value=='') this.value='<?php  echo lang ('lang_password');  ?>';"/>            
        </div>
        <div class="clear"></div>

        <?php if($cap_image): ?>
        <div class="fieldName"><?php if(isset($cap_image)){ echo $cap_image; } ?></div>
        <?php if($captcha_type == 'captcha'): ?>
        <div class="field">
            <input type="text" name="captcha" id="captcha" value="Код протекции" onfocus="if(this.value=='Код протекции') this.value='';" onblur="if(this.value=='') this.value='Код протекции';"/>            
        </div>
        <?php endif; ?>
        <div class="clear"></div>        
        <?php endif; ?> 

        <div class="fieldName"></div>
        <div class="field">
            <label><input type="checkbox" name="remember" value="1" id="remember" /> <?php  echo lang ('lang_remember_me');  ?></label> 
        </div>
        <div class="clear"></div>

        <div class="fieldName"></div>
        <div class="field">
            <input type="submit" id="submit" class="submit" value="<?php  echo lang ('lang_submit');  ?>" />              
        </div>
        <div class="clear"></div>

        <div class="fieldName"></div>
        <div class="field">
            <a href="<?php  echo site_url ( $modules['auth']  . '/forgot_password');  ?>"><?php  echo lang ('lang_forgot_password');  ?></a>
            &nbsp;
            <a href="<?php  echo site_url ( $modules['auth']  . '/register');  ?>"><?php  echo lang ('lang_register');  ?></a>                          
        </div>
        <div class="clear"></div>     

<?php  echo form_csrf ();  ?>
</form>
<?php $mabilis_ttl=1316773492; $mabilis_last_modified=1303831608; //Y:\home\imshop\www\/templates/commerce/login.tpl ?>