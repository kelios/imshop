<?php include ('Y:\home\imshop\www\application\libraries\mabilis/functions/func.truncate.php');  ?><!-- Top search panel -->
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

    <input type="button" class="button_silver_130" value="Создать страницу" onclick="ajax_div('page', base_url + 'admin/pages/index'); return false;" />
    <span style="padding:5px;"></span>
    <input type="button" class="button_silver_130" value="Создать Категорию" onclick="ajax_div('page', base_url + 'admin/categories/create_form'); return false;" />
    
    </div>
</div>
<script>
    function edit_comment(id)
    {  
        new MochaUI.Window({ 
            id: 'edit_comment_window',
            title: 'Редактирование комментария',
            loadMethod: 'xhr',
            contentURL: base_url + 'admin/components/cp/comments/edit/' + id + '/dashboard',
            width: 500,
            height: 280
         });
     }
</script>


<div id="board_content">

    <div style="width:70%;float:left;margin-right:20px;margin-left:5px; ">
            <div style="background-color: #BBD45F; padding:10px; font-weight:bold;">
                <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/documents-text.png" width="16" height="16" align="top" style="padding-right:15px;" />
                Страницы
            </div>
            <div>
               
            <h3 style="padding:3px;margin-top:5px;">Новые страницы</h3>         
                  <table class="s_table" width="100%" cellpadding="3">
                    <tbody>
                    <?php if(is_true_array($latest)){ foreach ($latest as $l){ ?>
                        <tr>
                            <td><a href="#" onclick="ajax_div('page','<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/pages/edit/<?php  echo $l['id'];  ?>'); return false;" ><?php  echo func_truncate ( $l['title'] , 40, '...');  ?></a></td>
                            <td><a href="#" onclick="cats_options(<?php   echo $l['category'];  ?>); return false;" ><?php  echo func_truncate (get_category_name( $l['category'] ), 20, '...');  ?></a></td>
                            <td>
                               <a href="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?><?php  echo $l['cat_url'];  ?><?php  echo $l['url'];  ?>" target="_blank"><?php  echo func_truncate ( $l['url'] , 20, '...');  ?></a> 
                            </td>
                            <td><?php  echo date ('Y-m-d H:i:s', $l['created']);  ?></td>
                            <td align="right">
                           <img onclick="ajax_div('page','<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/pages/edit/<?php  echo $l['id'];  ?>/<?php  echo $l['lang'];  ?>');" style="cursor:pointer" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/edit_page.png" width="16" height="16" title="Редактировать" /> 
                            </td>
                        </tr>
                    <?php }} ?>
                    </tbody>
                  </table>

            <h3 style="padding:3px;margin-top:5px;">Обновленные страницы</h3>         
                  <table class="s_table" width="100%" cellpadding="3">
                    <tbody>
                    <?php if(is_true_array($updated)){ foreach ($updated as $l){ ?>
                        <tr>
                            <td><a href="#" onclick="ajax_div('page','<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/pages/edit/<?php  echo $l['id'];  ?>'); return false;" ><?php  echo func_truncate ( $l['title'] , 40, '...');  ?></a></td>
                            <td><a href="#" onclick="cats_options(<?php   echo $l['category'];  ?>); return false;" ><?php  echo func_truncate (get_category_name( $l['category'] ), 20, '...');  ?></a></td>
                            <td>
                               <a href="<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?><?php  echo $l['cat_url'];  ?><?php  echo $l['url'];  ?>" target="_blank"><?php  echo func_truncate ( $l['url'] , 20, '...');  ?></a> 
                            </td>
                            <td><?php  echo date ('Y-m-d H:i:s', $l['updated']);  ?></td>
                            <td align="right">
                           <img onclick="ajax_div('page','<?php if(isset($BASE_URL)){ echo $BASE_URL; } ?>admin/pages/edit/<?php  echo $l['id'];  ?>/<?php  echo $l['lang'];  ?>');" style="cursor:pointer" src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/edit_page.png" width="16" height="16" title="Редактировать" /> 
                            </td>
                        </tr>
                    <?php }} ?>                     
                    </tbody>
                  </table>

            <?php ($hook = get_hook('admin_tpl_dashboard_center')) ? eval($hook) : NULL; ?>

            <?php if(count($api_news) > 1): ?>
            <div style="background-color: #BBD45F; padding:10px; font-weight:bold;">
                <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/documents-text.png" width="16" height="16" align="top" style="padding-right:15px;" />
                Новости ImageCMS.net
            </div>

            <?php if(is_true_array($api_news)){ foreach ($api_news as $a){ ?>
            <div style="width:80%;padding:3px;clear:both;">
               <span class="lite"><?php  echo date ('d-m-Y H:i',  $a['publish_date'] );  ?></span> 
               <a style="padding-left:10px;" target="_blank" href="http://www.imagecms.net/news/<?php  echo $a['url'];  ?>">>>></a>
               <br/> 
               <?php  echo func_truncate (strip_tags( $a['prev_text'] ), 200);  ?>
               <hr/>
            </div>
            <?php }} ?>

            <?php endif; ?>

            </div>
    </div>

    <div style="float:left; width:25%; ">

        <div class="l_box" style="background-color: #ACBFC5; border-top:0px;">
            <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/application-browser.png" width="16" height="16" align="top" style="padding-right:15px;" />
            <b>Система</b>
        </div>

        <div class="l_box">
            Версия: <?php if(isset($cms_number)){ echo $cms_number; } ?> <br />
            <?php if($sys_status['is_update']  == TRUE): ?>
                <a href="#" onclick="ajax_div('page', base_url + 'admin/sys_upgrade');return false;">Есть обновления до версии <?php if(isset($next_v)){ echo $next_v; } ?></a>
            <?php else: ?>
                Обновлений нет.
            <?php endif; ?>
                <br/>
                <a href="#" onclick="ajax_div('page', base_url + 'admin/sys_info');return false;">Информация</a> 
        </div>

        <div class="l_box" style="background-color: #ACBFC5; border-top:0px;">
            <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/application-list.png" width="16" height="16" align="top" style="padding-right:15px;" />
            <b>Статистика</b>
        </div>

        <div class="l_box">
            Страниц: <?php if(isset($total_pages)){ echo $total_pages; } ?> <br />
            Категорий: <?php if(isset($total_cats)){ echo $total_cats; } ?> <br />
            Комментариев: <?php if(isset($total_comments)){ echo $total_comments; } ?> <br />
        </div>

        <div class="l_box" style="background-color: #ACBFC5;">
            <img src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/balloon.png" width="16" height="16" align="top" style="padding-right:15px;" />
            <b>Последние комментарии</b>
        </div>

        <div class="l_box">
        <?php if(is_true_array($comments)){ foreach ($comments as $c){ ?>
        <div class="d_comment" onclick="edit_comment(<?php  echo $c['id'];  ?>);">
            <span style="font-size:11px;"><?php  echo date ('d-m-Y H:i',  $c['date'] );  ?></span>
            <br/>
            <i><?php   echo $c['user_name'];  ?>:</i> <?php  echo func_truncate ( $c['text'] , 50, '...');  ?>
            <hr style="border-top:1px solid #A5A5A5;" />
        </div>
        <?php }} ?>
        </div>

        <?php ($hook = get_hook('admin_tpl_dashboard_sidebar')) ? eval($hook) : NULL; ?>

    </div>

</div>
<?php $mabilis_ttl=1316777272; $mabilis_last_modified=1289816442; //Y:\home\imshop\www\/templates/administrator/dashboard.tpl ?>