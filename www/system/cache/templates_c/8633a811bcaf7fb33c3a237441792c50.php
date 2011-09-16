<div class="top-navigation">
<ul><li>
    <form id="tableFilter1" style="width:100%;" onsubmit="users_table1.filter(this.id); return false;">Фильтр:
        <select id="column">
            <option value="1">Логин</option>
            <option value="2">E-Mail</option>
            <option value="3">Группа</option>
        </select>
        <input type="text" id="keyword" />
        <input type="submit" value="Поиск" />
        <input type="reset" value="Очистить" />
    <?php  echo form_csrf ();  ?></form>
</li></ul>
</div>
<div class="form_overflow"></div>

<form action="<?php if(isset($SELF_URL)){ echo $SELF_URL; } ?>/actions/" id="users_f" method="post" style="width:100%">
<div id="sortable">
		  <table id="users_table1" >
		  	<thead>
				<th axis="string" width="">ID</th>
				<th axis="string">Логин</th>
				<th axis="string">E-Mail</th>
				<th axis="string">Группа</th>
				<th axis="string">Бан</th>
				<th axis="string">Последний IP</th>
				<th axis="date">Последний Вход</th>
				<th axis="date">Создан</th>
				<th axis="none"></th>
			</thead>
			<tbody>
		<?php if(is_true_array($users)){ foreach ($users as $user){ ?>
		<tr id="<?php  echo $page['number'];  ?>">
			<td class="rightAlign">
			<div align="left">
			<input type="checkbox" value="<?php  echo $user['id'];  ?>" name="checkbox_<?php  echo $user['id'];  ?>" /> <?php  echo $user['id'];  ?>
			</div>
			</td>
			<td onclick="edit_user(<?php  echo $user['id'];  ?>); return false;"><?php  echo $user['username'];  ?></td>
			<td><?php  echo $user['email'];  ?></td>
			<td><?php  echo $user['role_alt_name'];  ?></td>
			<td><?php  echo $user['banned'];  ?></td>
			<td><?php  echo $user['last_ip'];  ?></td>
			<td><?php  echo $user['last_login'];  ?></td>
			<td><?php  echo $user['created'];  ?></td>
			<td  class="rightAlign">
			<img onclick="edit_user(<?php  echo $user['id'];  ?>);" style="cursor:pointer" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/edit_page.png" width="16" height="16" title="Редактировать" />
			</td>
		</tr>
		<?php }} ?>
			</tbody>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tfoot>
		  </table>
</div>

<p align="right">
<br/>
С отмечеными:
<input type="submit" name="ban"  class="button" value="Забанить" onclick="$('users_f').action='<?php if(isset($SELF_URL)){ echo $SELF_URL; } ?>/actions/1/<?php if(isset($cur_page)){ echo $cur_page; } ?>/'; ajax_form('users_f','users_ajax_table');" />
<input type="submit" name="unban"  class="button" value="Разбанить" onclick="$('users_f').action='<?php if(isset($SELF_URL)){ echo $SELF_URL; } ?>/actions/2/<?php if(isset($cur_page)){ echo $cur_page; } ?>/'; ajax_form('users_f','users_ajax_table');" />
<input type="submit" name="delete"  class="button" style="font-weight:bold;" value="Удалить" onclick="$('users_f').action='<?php if(isset($SELF_URL)){ echo $SELF_URL; } ?>/actions/3/<?php if(isset($cur_page)){ echo $cur_page; } ?>/'; ajax_form('users_f','users_ajax_table');" />
</p>

<?php  echo form_csrf ();  ?></form>

<div align="center" style="padding:5px;">
<?php if(isset($paginator)){ echo $paginator; } ?>
</div>
		<script type="text/javascript">
			window.addEvent('domready', function(){ 
				users_table1 = new sortableTable('users_table1', { overCls: 'over', onClick: function(){  } });
			 });
		</script>

<?php $mabilis_ttl=1316265162; $mabilis_last_modified=1258753074; //Y:\home\imshop\www\application\modules\user_manager/templates/users_table.tpl ?>