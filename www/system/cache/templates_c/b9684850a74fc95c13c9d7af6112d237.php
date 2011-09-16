<form action="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/components/save_settings/<?php if(isset($name)){ echo $name; } ?>" method="post" id="component_save_form" style="width:100%;">
&nbsp;
	<div class="form_text"></div>
	<div class="form_input"><label><input name="status" value="1" <?php if($enabled == 1): ?> checked="checked" <?php endif; ?>  type="checkbox" /> Включить доступ по URL</label></div>
	<div class="form_overflow"></div>

	<div class="form_text"></div>
	<div class="form_input"><label><input name="autoload" value="1" <?php if($autoload == 1): ?> checked="checked" <?php endif; ?>  type="checkbox" /> Автозагрузка</label></div>
	<div class="form_overflow"></div>

	<div class="form_text"></div>
	<div class="form_input"><label><input name="in_menu" value="1" <?php if($in_menu == 1): ?> checked="checked" <?php endif; ?>  type="checkbox" /> Добавить в меню</label></div>
	<div class="form_overflow"></div>

	<div class="form_text"></div>
	<div class="form_input">
	    <input type="submit" name="button" class="button" value="Сохранить"
	    onclick="ajax_me('component_save_form'); MochaUI.closeWindow($('edit_component_window'));"/>
	</div>
<?php  echo form_csrf ();  ?></form>
<?php $mabilis_ttl=1316265136; $mabilis_last_modified=1289654574; //Y:\home\imshop\www\/templates/administrator/component_settings.tpl ?>