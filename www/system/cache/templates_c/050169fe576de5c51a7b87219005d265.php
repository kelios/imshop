<form action="<?php echo $form->action ?>" method="pos" id="<?php echo $f_id = uniqid() ?>" class="CForms">
    <div class="form_text"></div>
    <div class="form_input"><b><?php echo $form->title ?></b></div>
    <div class="form_overflow"></div>

    <?php if(is_true_array($form->asArray())){ foreach ($form->asArray() as $f){ ?>
    	<div class="form_text"><?php  echo $f['label'];  ?></div>
	    <div class="form_input">
            <?php  echo $f['field'];  ?>
            <?php  echo $f['help_text'];  ?>
        </div>
    	<div class="form_overflow"></div>
    <?php }} ?>

	<div class="form_text"></div>
	<div class="form_input">
    	<input type="submit" name="button" class="button" value="Отправить" onclick="ajax_me('<?php if(isset($f_id)){ echo $f_id; } ?>');" />
	</div>
<script type="text/javascript">
window.addEvent('domready', function(){ 
    
        $("enable_tinymce_editor").addEvent('click', function(event){ 
	    toggleTiny(this.checked);            
         });
	
	if ($("enable_tinymce_editor").checked == true)
	{ 
	    $('enable_image_browser').set('checked', false);
	    $('enable_file_browser').set('checked', false);
	    $('enable_image_browser').set('disabled', true);
	    $('enable_file_browser').set('disabled', true);
	 }

     });

	var img_brows = $('enable_image_browser').checked;
	var file_brows = $('enable_file_browser').checked;

function toggleTiny(checked)
{ 
    if (checked)
    { 
	img_brows = $('enable_image_browser').checked;
	file_brows = $('enable_file_browser').checked;
	$('enable_image_browser').set('checked', false);
	$('enable_file_browser').set('checked', false);
	$('enable_image_browser').set('disabled', true);
	$('enable_file_browser').set('disabled', true);
	
     }
    else
    { 
	if (img_brows == true)
	    $('enable_image_browser').set('checked', true);
	    else
	    $('enable_image_browser').set('checked', false);
	    
	if (file_brows == true)
	    $('enable_file_browser').set('checked', true);
	    else
	    $('enable_file_browser').set('checked', false);
	    
	$('enable_image_browser').set('disabled', false);
	$('enable_file_browser').set('disabled', false);
	
     }
 }


</script>


<?php  echo form_csrf ();  ?>


</form>
<?php $mabilis_ttl=1316267038; $mabilis_last_modified=1303831608; //Y:\home\imshop\www\application\modules\cfcm/templates/admin/_form.tpl ?>