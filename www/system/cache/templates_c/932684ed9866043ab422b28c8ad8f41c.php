<?php include ('Y:\home\imshop\www\application\libraries\mabilis/functions/func.truncate.php');  ?><?php if($no_pages == TRUE): ?>
    <div id="notice" style="width:500px;">В  категории <b><?php  echo $category['name'];  ?></b> нет страниц.
    <a href="#" onclick="ajax_div('page', base_url + 'admin/pages/index/category/<?php  echo $category['id'];  ?>'); return false;">Создать.</a> 
    </div>    
    <?php return ?>
<?php endif; ?>

<div class="top-navigation">
    <div style="float:left;">
    <div style="padding-left:10px;">
        <form style="width:100%;" onsubmit="return false;" method="post" action="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/admin_search" id="g_search_form">
            <input type="text" value="Поиск страниц..." name="search_text" class="textbox_long" onclick="if (this.value=='Поиск страниц...') this.value='';" onblur="if (this.value=='') this.value='Поиск страниц...';" />
            <input type="submit" value="Search" class="search_submit" onclick="ajax_form('g_search_form', 'page');"/>

            <a href="javascript:ajax_div('page', base_url + 'admin/admin_search/advanced_search')">Расширенный поиск</a>
         </form>
    </div>
    </div>

    <div align="right" style="padding:7px 13px;">
 <input type="button" class="button_silver_130" value="Создать страницу" onclick="ajax_div('page', base_url + 'admin/pages/index/category/<?php if(isset($cat_id)){ echo $cat_id; } ?>'); return fa;se;" />
    </div>
</div>


<div style="clear:both"></div>

<div id="sortable" >
		  <table id="pages_table">
		  	<thead>
                <th width="5px">
                    <input type="checkbox" onclick="switchChecks(this);"/>
                </th>
				<th axis="number" width="5px;">ID</th>
				<th axis="string">Заголовок</th>
				<th axis="string">URL</th>
				<th axis="date">Создано</th>
				<th style="width:80px;" width="80px">
                Позиция
                <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/save.png" align="absmiddle" style="cursor:pointer;width:22px;height:22px;"
                onclick="save_pages_position('<?php echo $CI->uri->uri_string() ?>'); return false;" /> 
                </th>
				<th axis="string">Автор</th>
				<th>Статус</th>
				<th></th>
			</thead>
			<tbody>
		<?php if(is_true_array($pages)){ foreach ($pages as $page){ ?>
		<tr id="<?php  echo $page['number'];  ?>">
            <td>
            <input type="checkbox" id="chkb_<?php  echo $page['id'];  ?>" class="chbx"/>  
            </td>
			<td class=""><?php  echo $page['id'];  ?></td>
			<td title="<?php   echo $page['title'];  ?>. Просмотров: <?php  echo $page['showed'];  ?>" onclick="ajax_div('page','<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/pages/edit/<?php  echo $page['id'];  ?>'); return false;"><?php  echo func_truncate ( $page['title'] , 50);  ?></td>
			<td><a href="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?><?php  echo $page['cat_url'];  ?><?php  echo $page['url'];  ?>" target="_blank"><?php  echo func_truncate ( $page['url'] , 40, '...');  ?></a></td>
			<td><?php  echo date ('Y-m-d H:i:s', $page['created']);  ?></td>
			<td>
            <div align="center">
            <input type="text" value="<?php  echo $page['position'];  ?>" style="width:26px;" class="page_pos" id="page<?php  echo $page['id'];  ?>" /> 
            </div>
            </td>
			<td><?php  echo $page['author'];  ?></td>
			<td>
			<?php switch( $page['post_status']  ){ default: break; ?>
				<?php  case "publish"  ?>
				<div style="visibility:hidden;float:left">1</div>
                <img id="p_status_<?php  echo $page['id'];  ?>" onclick="change_page_status('<?php  echo $page['id'];  ?>');" title="Опубликовано" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/publish.png" width="16" height="16" />
                <?php break; ?>
				<?php  case "pending"  ?>
				<div style="visibility:hidden;float:left">2</div>
                <img id="p_status_<?php  echo $page['id'];  ?>" onclick="change_page_status('<?php  echo $page['id'];  ?>');" title="Ожидает одобрения" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/pending.png" width="16" height="16" />
                <?php break; ?>
				<?php  case "draft"  ?>
					<div style="visibility:hidden;float:left">3</div>
                    <img id="p_status_<?php  echo $page['id'];  ?>" onclick="change_page_status('<?php  echo $page['id'];  ?>');" title="Не опубликовано" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/draft.png" width="16" height="16" />
                <?php break; ?>
			<?php } ?>
			</td>
			<td  class="rightAlign">
			<img onclick="ajax_div('page','<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/pages/edit/<?php  echo $page['id'];  ?>/<?php  echo $page['lang'];  ?>');" style="cursor:pointer" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/edit_page.png" width="16" height="16" title="Редактировать" />
			<img onclick="confirm_delete_page(<?php  echo $page['id'];  ?>);" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/delete_page.png"  style="cursor:pointer" width="16" height="16" title="Удалить" />
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

<div align="center" style="padding:5px;" id="pagination">
<?php if(isset($paginator)){ echo $paginator; } ?>
</div>

<div class="footer_block" align="right">
    С отмечеными:
    <input type="submit" name="delete" class="button_silver" value="Переместить" onclick="show_move_window('move');" />
    <input type="submit" name="delete" class="button_silver" value="Копировать" onclick="show_move_window('copy');" />
    <input type="submit" name="delete" class="button_red" style="font-weight:bold;" value="Удалить" onclick="delete_sel_pages(<?php if(isset($cat_id)){ echo $cat_id; } ?>); return false;" />
</div>
    	<script type="text/javascript">
			window.addEvent('domready', function(){ 
				pages_table = new sortableTable('pages_table', { overCls: 'over', sortOn: -1 ,onClick: function(){  } });
                pages_table.altRow();
			 });

            function switchChecks(el)
            { 
                if (el.checked == true){ 
                    check_all();
                 }else{ 
                    uncheck_all();
                 }
             }

            function check_all()
            { 
                var items = $('pages_table').getElements('input');
                items.each(function(el,i){ 
                if(el.hasClass('chbx')) 
                { 
                    el.checked = true;
                 }  
                 });
             }

            function uncheck_all()
            { 
                var items = $('pages_table').getElements('input');
                items.each(function(el,i){ 
                if(el.hasClass('chbx')) 
                { 
                    el.checked = false;
                 }  
                 });
             }

            function show_move_window(action)
            { 
                new MochaUI.Window({ 
                    id: 'move_pages_window',
                    title: 'Копировать/Переместить страницы ',
                    type: 'modal',
                    loadMethod: 'xhr',
                    contentURL: base_url + 'admin/pages/show_move_window/' + action,
                    width: 410,
                    height: 100
                 });
             }
		</script>

<?php $mabilis_ttl=1316522681; $mabilis_last_modified=1289911994; //Y:\home\imshop\www\/templates/administrator/pages.tpl ?>