<div id="groups-tabs-block"  style="float:left;width:100%">
	<h4 title="Предварительное содержание">Список Групп</h4>
		<div>
			<table width="100%">
                    <tr style="background-color:#EDEDED">
                        <td><b>ID</b></td>
                        <td><b>Название</b></td>
                        <td><b>Идентификатор</b></td>
                        <td><b>Описание</b></td>
                        <td></td>
                    </tr>
                    <tbody>
					<?php if(is_true_array($roles)){ foreach ($roles as $group){ ?>
					<tr>
						<td><?php  echo $group['id'];  ?></td>
						<td><?php  echo $group['alt_name'];  ?></td>
						<td><?php  echo $group['name'];  ?></td>
						<td><?php  echo $group['desc'];  ?></td>
						<td>
						<img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/edit_page.png" width="16" height="16" style="cursor:pointer;" onclick="edit_group('<?php  echo $group['id'];  ?>');" />
						<img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/delete.png" width="16" height="16" style="cursor:pointer;" onclick="delete_group('<?php  echo $group['id'];  ?>');" />
						</td>
					</tr>
					<?php }} ?>

					</tbody>
			</table>
		</div>

	<h4 title="Параметры">Создать</h4>
		<div>
		<form action="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/components/cp/user_manager/create" method="post" id="groups_create_form" style="width:100%;">
			<div class="form_text">Название:</div>
			<div class="form_input"><input type="text" name="alt_name" id="alt_name" class="textbox_short" /></div>
			<div class="form_overflow"></div>

			<div class="form_text">Идентификатор:</div>
			<div class="form_input"><input type="text" name="name" id="name" class="textbox_short" /> (только латинские символы)</div>
			<div class="form_overflow"></div>

			<div class="form_text">Описание:</div>
			<div class="form_input">
			<textarea id="desc" name="desc" ></textarea>
			</div>
			<div class="form_overflow"></div>

			<div class="form_text"></div>
			<div class="form_input"><input type="submit" name="button" class="button"  value="Создать" onclick="ajax_me('groups_create_form');" /></div>
			<div class="form_overflow"></div>
		<?php  echo form_csrf ();  ?></form>
		</div>
</div>
		<script type="text/javascript">
		var groups_tabs = new SimpleTabs('groups-tabs-block', { 
    		selector: 'h4'
		 });
		</script>

<?php $mabilis_ttl=1316265162; $mabilis_last_modified=1258753182; //Y:\home\imshop\www\application\modules\user_manager/templates/groups.tpl ?>