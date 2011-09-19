<?php # Comments form for product ?>

<div style="clear:both;"></div>

<?php if($comments_arr): ?>
<div class="comments">
    <h5>Отзывы клиентов о товаре</h5>

    <?php if(is_true_array($comments_arr)){ foreach ($comments_arr as $comment){ ?>
    <div id="comment_<?php  echo $comment['id'];  ?>" >
        <b><?php  echo $comment['user_name'];  ?></b>
        <span><?php  echo date ('d-m-Y H:i',  $comment['date'] );  ?> </span>
        <p><?php  echo $comment['text'];  ?></p>
    </div>
    <?php }} ?>
</div>
<?php endif; ?>

<h5><?php  echo lang ('post_comment');  ?></h5>

<?php if($comment_errors): ?>
    <div class="errors">
        <?php if(isset($comment_errors)){ echo $comment_errors; } ?>
    </div>
<?php endif; ?>

<?php if($can_comment === 1 AND !is_logged_in): ?>
     <p><?php  echo sprintf (lang('login_for_comments'), site_url( $modules['auth'] ));  ?></p>
<?php endif; ?>

<form action="" method="post" class="form commentForm">
    <input type="hidden" name="comment_item_id" value="<?php if(isset($item_id)){ echo $item_id; } ?>" />
    <input type="hidden" name="redirect" value="<?php  echo uri_string ();  ?>" />

    <?php if($is_logged_in): ?>
        <p><?php  echo lang ('lang_logged_in_as');  ?> <?php if(isset($username)){ echo $username; } ?>. <a href="<?php  echo site_url ('auth/logout');  ?>"><?php  echo lang ('lang_logout');  ?></a></p>
    <?php else: ?>
    <p class="clear">
        <label for="comment_author" style="width:140px;" class="left"><?php  echo lang ('lang_comment_author');  ?></label>
        <input type="text" name="comment_author" id="comment_author" value="<?php  echo get_cookie ('comment_author');  ?>"/> <span style="color:red;">*</span>
    </p>

    <p class="clear">
        <label for="comment_email" style="width:140px;" class="left"><?php  echo lang ('lang_comment_email');  ?></label>
        <input type="text" name="comment_email" id="comment_email" value="<?php  echo get_cookie ('comment_email');  ?>"/> <span style="color:red;">*</span>
    </p>

    <p class="clear">
        <label for="comment_site" style="width:140px;" class="left"><?php  echo lang ('lang_comment_site');  ?></label>
        <input type="text" name="comment_site" id="comment_site" value="<?php  echo get_cookie ('comment_site');  ?>"/>
    </p>
    <?php endif; ?>

    <p class="clear">
        <label for="comment_text" style="width:140px;" class="left"><?php  echo lang ('lang_comment_text');  ?></label>
        <textarea name="comment_text" id="comment_text" rows="10" cols="50"><?php  echo $_POST['comment_text'];  ?></textarea> <span style="color:red;">*</span>
    </p>

    <?php if($use_captcha): ?>
    <div style="padding-bottom:4px;">
    <p class="clear">
        <?php if($captcha_type == 'captcha'): ?>
            <label for="captcha" style="width:140px;" class="left"><?php  echo lang ('lang_captcha');  ?></label>
            <input type="text" name="captcha" id="captcha" />  <span style="color:red;">*</span>
        <?php endif; ?>
        <br/>
        <label class="left" style="width:140px;" >&nbsp;</label>
        <?php if(isset($cap_image)){ echo $cap_image; } ?>
    </p>
    </div>
    <?php endif; ?>

    <p class="clear">
        <label class="left" style="width:140px;" >&nbsp;</label>
        <input type="submit" value="Оставить комментарий"/>
    </p>

    <?php  echo form_csrf ();  ?>
</form><?php $mabilis_ttl=1316509712; $mabilis_last_modified=1303831608; //Y:\home\imshop\www\/templates/commerce/comments.tpl ?>