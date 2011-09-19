<div id="module_manager_tabs">
<h4 title="Настройки">Модули</h4>
    <div id="modules_table">
        <?php if(count($installed) != 0): ?>
        <div id="sortable">
              <table id="modules_table">
              <thead>
                    <th axis="string">Модуль</th>
                    <th axis="string">Описание</th>
                    <th axis="string">URL</th>
                    <th axis="string">Версия</th>
                    <th>Автозагрузка</th>
                    <th>URL доступ</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
            <?php if(is_true_array($installed)){ foreach ($installed as $item){ ?>
            <tr id="<?php  echo $page['number'];  ?>">
                <td>
                <?php if($item['admin_file'] == 1): ?>
					<?php if($item['name']  == 'shop'): ?>
						<a href="#" onclick="javascript:loadShopInterface(); return false;"><?php  echo $item['menu_name'];  ?></a>
					<?php else: ?>
						<a href="#" onclick="com_admin('<?php  echo $item['name'];  ?>'); return false;"><?php  echo $item['menu_name'];  ?></a>
					<?php endif; ?>
                <?php else: ?>
                    <?php  echo $item['menu_name'];  ?>
                <?php endif; ?>
                </td>
                <td><?php  echo $item['description'];  ?></td>
                <td><?php  echo $item['identif'];  ?></td>
                <td><?php  echo $item['version'];  ?></td>
                <td>
                <?php if($item['autoload'] == "0"): ?>
                <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/minus.png" width="16" height="16" />
                <?php else: ?>
                <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/plus.png" width="16" height="16" />
                <?php endif; ?>
                </td>
                <td>
                <?php if($item['enabled'] == "0"): ?>
                <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/minus.png" width="16" height="16" />
                <?php else: ?>
                <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/plus.png" width="16" height="16" />
                <?php endif; ?>
                </td>
                <td>
                    <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/preferences.png" onclick="com_settings('<?php  echo $item['name'];  ?>');" title="Настройки" width="16" height="16" />
                <?php if($item['admin_file'] == "1"): ?>
                    <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/module_admin.png" onclick="com_admin('<?php  echo $item['name'];  ?>');" title="Администрирование" width="16" height="16" />
                <?php endif; ?>
                </td>
                <td>
                <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/delete.png" onclick="confirm_delete_module('<?php  echo $item['menu_name'];  ?>','<?php  echo $item['name'];  ?>');" title="Удалить" width="16" height="16" />
                </td>
            </tr>
            <?php }} ?>
                </tbody>
              </table>
        </div>
        </div>

        <?php if(count($not_installed) > 0): ?>
        <h4 title="Настройки">Установить модули</h4>
        <div id="not_installed_tabs"> 
            <div style="font-size:12px;">
            <div class="form_input"></div>
            <div class="form_overflow"></div>
            <?php if(is_true_array($not_installed)){ foreach ($not_installed as $item){ ?>
                <div class="form_text"><?php  echo $item['name'];  ?></div>
                <div class="form_input">
                <?php  echo $item['description'];  ?> <br/>
                Версия: <?php  echo $item['version'];  ?> <br/>
                <a href="#" onclick="install_module('<?php  echo $item['com_name'];  ?>'); return false;">Установить</a>
                </div>
            <div class="form_overflow"></div>
            <?php }} ?>
            </div>
        </div>
        <?php endif; ?>

</div>

	<?php else: ?>
    	<div align="center"><p><h3>Модули не установлены!</h3></p></div>
	<?php endif; ?>
<script type="text/javascript">

function install_module(name)
{ 

    var req = new Request.HTML({ 
        method: 'post',
        url: base_url + 'admin/components/install/' + name,
        onComplete: function(response) {  
               ajax_div('modules_table', base_url + 'admin/components/modules_table/'); 
             }
     }).post();

 }

function confirm_delete_module(menu_name,com_name)
{ 
	alertBox.confirm('<h1> </h1><p>Удалить модуль '+ menu_name +' ? </p>', { onComplete:
	function(returnvalue) { 
		if(returnvalue)
		{ 
					var req = new Request.HTML({ 
					method: 'post',
					update: 'modules_table',
					url: base_url + 'admin/components/deinstall/' + com_name,
					onComplete: function(response) {   }
				 }).post();
		 }
	 }
 });
 }
</script>

<script type="text/javascript">
window.addEvent('domready', function(){ 
    pages_table = new sortableTable('modules_table', { overCls: 'over', onClick: function(){  } });

		var modules_tabs = new SimpleTabs('module_manager_tabs', { 
		selector: 'h4'
		 });


 });
</script>



<?php $mabilis_ttl=1316508688; $mabilis_last_modified=1308311248; //Y:\home\imshop\www\/templates/administrator/module_table.tpl ?>