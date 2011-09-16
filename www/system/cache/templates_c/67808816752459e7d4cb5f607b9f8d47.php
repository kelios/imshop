
        <script type="text/javascript">
            function load_perms_for_role()
            { 
                var role_id = $('role_id').value;
                ajax_div('perms_editor_block', base_url + 'admin/components/cp/user_manager/show_edit_prems_tpl/' + role_id); 
             }

            function check_all()
            { 
                var items = $('edit_perms_form').getElements('input');
                items.each(function(el,i){ 
                if(el.hasClass('chbx')) 
                { 
                    el.checked = true;
                 }  
                 });
             }

            function uncheck_all()
            { 
                var items = $('edit_perms_form').getElements('input');
                items.each(function(el,i){ 
                if(el.hasClass('chbx')) 
                { 
                    el.checked = false;
                 }  
                 });
             }
        </script>
    

<!--
<div style="padding-left: 15px; padding-top: 2px;">
    <a href="#" onclick="check_all(); return false;">Отметить все</a> / <a href="#" onclick="uncheck_all(); return false;">Снять выделение</a>
</div>
-->

    <form action="<?php if(isset($SELF_URL)){ echo $SELF_URL; } ?>/update_role_perms" id="edit_perms_form" method="post" style="width:100%">

	<div class="form_text" style="width:150px;">Группа:</div>
	<div class="form_input">
		<select name="role_id" id="role_id" onchange="load_perms_for_role();">
	    <?php if(is_true_array($roles)){ foreach ($roles as $role){ ?>
		    <option value ="<?php   echo $role['id'];  ?>" <?php if($role['id']  == $selected_role): ?> selected="selected" <?php endif; ?> ><?php  echo $role['alt_name'];  ?></option>
		<?php }} ?>
		</select>
	</div>
	<div class="form_overflow"></div>

    <?php if(is_true_array($groups)){ foreach ($groups as $group_k => $group_v){ ?>
    <div class="widget_block">
    <div class="widget_header"><b><?php  echo $group_names[$group_k];  ?></b></div>

    <div class="info_container">
        <?php if(is_true_array($group_v)){ foreach ($group_v as $k => $v){ ?>
        <label style="clear:both;padding:2px;">
            <input type="checkbox" class="chbx" value="1" name="<?php if(isset($k)){ echo $k; } ?>" <?php if(array_key_exists($k, $permissions)): ?> checked="checked" <?php endif; ?> /> <?php if(isset($v)){ echo $v; } ?>
        </label>
        <?php }} ?>
    </div>
    </div>
    <?php }} ?>

    <div style="clear:both;"></div>

	<div class="form_text" style="width:150px;"></div>
	<div class="form_input">
		<input type="submit" class="button" value="Сохранить" onclick="ajax_me('edit_perms_form');" />
        <a href="#" onclick="check_all(); return false;">Отметить все</a>  /  <a href="#" onclick="uncheck_all(); return false;">Снять выделение</a>
	</div>
	<div class="form_overflow"></div>

	<?php  echo form_csrf ();  ?>
    </form>
    <script type="text/javascript">
        var selected_module = '';
        var selected_method = '';
    </script>

    <style type="text/css">
        .widget_block { 
            width:300px;
            border:2px solid #A2C449;
            margin:5px;
            float:left;
         }

        .widget_header { 
            background-color:#E4F5A9;
            padding:5px;
            padding-left:11px;
         }

        .widget_info { 
            padding-left:10px;
            border-bottom:1px solid silver;
         }

        .widget_info:hover {  
            background-color: #D1E2EB;
            cursor:pointer; 
         }

        .info_container { 
         /*   height:200px;
            overflow:auto;
        */
         }
    </style>


<?php $mabilis_ttl=1316265162; $mabilis_last_modified=1265201650; //Y:\home\imshop\www\application\modules\user_manager/templates/edit_perms.tpl ?>