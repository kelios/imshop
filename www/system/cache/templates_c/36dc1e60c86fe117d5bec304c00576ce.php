Выберите категорию:
<select id="move_cat_id">
<option value="0" selected="selected">Нет</option>
<?php  $this->view("cats_select.tpl", $this->template_vars);  ?>
</select>
<br/>
<br/>
<div align="center">
<input type="submit" name="button"  class="button" value="Отправить" onclick="move_to_cat('<?php if(isset($action)){ echo $action; } ?>'); MochaUI.closeWindow($('move_pages_window')); return false;" />
<input type="submit" name="button"  class="button" value="Отмена" onclick="MochaUI.closeWindow($('move_pages_window')); return false;" />
</div>
<?php $mabilis_ttl=1316252597; $mabilis_last_modified=1266320058; //Y:\home\imshop\www\/templates/administrator/move_pages.tpl ?>