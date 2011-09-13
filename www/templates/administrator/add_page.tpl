<form method="post" action="{$BASE_URL}admin/pages/add" id="add_page_form" style="width:100%;">

<div id="tabs-block"  style="float:left;width:100%;">

	<h4>Содержание</h4>
	<div id="text_id2" style="padding-left:10px;">

        <div style="padding:3px;"></div>
        <div id="fast_category_list" style="float:left;">
            Категория: <select name="category" ONCHANGE="change_comments_status();" id="category_selectbox">
                <option value="0" selected="selected">Нет</option>
                { $this->view("cats_select.tpl", array('tree' => $this->template_vars['tree'], 'sel_cat' => $this->template_vars['sel_cat'])); }
                </select> 
        </div>

        <img  src="{$THEME}/images/plus2.png" style="padding-left:5px;padding-top:2px;cursor:pointer;float:left;" onclick="show_fast_add_cat();" title="Создать категорию" />

		<div class="form_overflow" style="padding:5px;"></div>

		Заголовок:
        <input type="text" name="page_title" value="" id="page_title_u" class="textbox_long" />
	
		<div class="form_overflow"></div>
 
        <div id="page_header"> Предварительное содержание:</div>
		<textarea id="prev_text" class="mceEditor" name="prev_text" rows="15" cols="180"  style="width:700px;height:200px;"></textarea>

        <div id="page_header"> Полное содержание:</div>
		<textarea id="full_text" class="mceEditor" name="full_text" rows="15" cols="180" style="width:700px;height:400px;"></textarea>
    </div>
	<h4>Параметры</h4>
	<div style="padding:8px;">

		<div class="form_text">URL:</div>
		<div class="form_input"><input type="text" name="page_url" value="" id="page_url" class="textbox_long" /> 
        <img onclick="translite_title($('page_title_u').value);" align="absmiddle" style="cursor:pointer" src="{$THEME}/images/translit.png" width="16" height="16" title="Транслитерация заголовка." /> 
        <div class="lite">(только латинские символы)</div>
        </div>
        <div class="form_overflow"></div>

		<div class="form_text">Теги:</div>
		<div class="form_input"><input type="text" name="search_tags" value="" id="tags" class="textbox_long" /></div>
		<div class="form_overflow"></div>

		<div class="form_text">Meta title:</div>
		<div class="form_input"><input type="text" name="meta_title" value=""  class="textbox_long" /></div>
		<div class="form_overflow"></div>

		<div class="form_text">Meta description:</div>
			<div class="form_input"><textarea name="page_description" class="textarea" id="page_description" rows="8" cols="28"></textarea>
			<img onclick="create_description(  tinyMCE.get('prev_text').getContent() );" src="{$THEME}/images/arrow-down.png" title="Сгенерировать описание" style="cursor:pointer" width="16" height="16" />
		</div>
		<div class="form_overflow"></div>

		<div class="form_text">Meta keywords:</div>
		<div class="form_input">
			<textarea name="page_keywords" id="page_keywords" rows="8" class="textarea" cols="28"></textarea>
			<img src="{$THEME}/images/arrow-down.png" style="cursor:pointer" title="Сгенерировать ключевые слова" onclick="retrive_keywords( tinyMCE.get('full_text').getContent() + tinyMCE.get('prev_text').getContent() );" />

			<div style="max-width:600px" id="keywords_list">

			</div>
		</div>
		<div class="form_overflow"></div>

		<div class="form_text">Главный шаблон:</div>
		<div class="form_input">
			<input type="text" name="main_tpl" value="" class="textbox_long" /> .tpl
			<div class="lite">По умолчанию  main.tpl</div>
		</div>
		<div class="form_overflow"></div>

		<div class="form_text">Шаблон Страницы:</div>
		<div class="form_input">
			<input type="text" name="full_tpl" value="" class="textbox_long" /> .tpl
			<div class="lite">По умолчанию  page_full.tpl</div>
		</div>
		<div class="form_overflow"></div>

		<div class="form_text"></div>
		<div class="form_input">
			<label><input name="comments_status"  value="1" checked="checked" type="checkbox" id="comments_status" /> Разрешить комментирование</label>
		</div>
		<div class="form_overflow"></div>
	</div>

    {($hook = get_hook('admin_tpl_add_page')) ? eval($hook) : NULL;}
{literal}
<script type="text/javascript">

</script>
{/literal}
</div>
	<div id="sidebar2">
		<div><h3><a href="#" onclick="side_panel('show'); return false;">показать настройки</a></h3></div>
	</div>
	<div id="sidebar1">
	<div id="side_bar_right"><h3>Настройки (<a href="" onclick="side_panel('hide'); return false;">скрыть</a>)</h3></div>

	<div style="padding:5px;">
		<p style="padding-left:15px;">
		<b>Статус публикации: </b><br />
		<select name="post_status" id="post_status">
		<option selected="selected" value="publish">Опубликовано</option>
		<option value="pending">Ожидает одобрения</option>
		<option value="draft">Не опубликовано</option>
		</select>
		</p>
		<hr />
		<p style="padding-left:15px;">
		<b>Дата и время создания:</b>
			<p style="padding-left:15px;"><input id="create_date" name="create_date" tabindex="7" value="{$cur_date}" type="text" class="textbox_short" /></p>
			<p style="padding-left:15px;"><input id="create_time" name="create_time" tabindex="8" type="text" value="{$cur_time}" class="textbox_short" /></p>
		</p>
		<hr />
		<p style="padding-left:15px;">
		<b>Дата и время публикации:</b>
			<p style="padding-left:15px;"><input id="publish_date" name="publish_date" tabindex="7" value="{$cur_date}" type="text" class="textbox_short" /></p>
			<p style="padding-left:15px;"><input id="publish_time" name="publish_time" tabindex="8" type="text" value="{$cur_time}" class="textbox_short" /></p>
		</p>
		<hr />
		<div style="padding-left:15px">
			<b>Доступ:</b>
			<p>
			<select multiple="multiple" name="roles[]">
			<option value="0">Все</option>
			{foreach $roles as $role}
			  <option value ="{$role.id}">{$role.alt_name}</option>
			{/foreach}
			</select>
			</p>
		</div>

		</div>

    {($hook = get_hook('admin_tpl_add_page_side_bar')) ? eval($hook) : NULL;}

	</div>


<div class="footer_block" align="right">
    <input type="submit" name="button"  class="button_130" value="Создать Страницу" onclick="ajax_me('add_page_form');" />
</div>

{form_csrf()}</form>

{literal}
	<script type="text/javascript">
	
           var cms_tabs = null;
           var sp_param = Cookie.read('sidepanel'); 

            window.addEvent('domready', function() {

            if (sp_param == 'show')
            {
                document.getElementById('sidebar1').style.display='none'; 
                document.getElementById('sidebar2').style.display='block';     
            }

			pub_date_cal = new Calendar({ publish_date: 'Y-m-d' }, { direction: .0, tweak: {x: -150, y: 22} });
			create_date_cal = new Calendar({ create_date: 'Y-m-d' }, { direction: .0, tweak: {x: -150, y: 22} });

			new Autocompleter.Request.JSON('tags', base_url + 'admin/pages/json_tags', {
				'postVar': 'search_tags'
			});

			cms_tabs = new SimpleTabs('tabs-block', {
			selector: 'h4'
			});        
 

            load_editor();
	    
		function load_editor2()        {
                    tinyMCE.init({
                        mode : 'specific_textareas',
                        editor_selector : 'mceEditor2',
                        language: 'ru',
                        theme : 'advanced',
                        skin : "o2k7",
                        skin_variant : "silver",
                        plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",
                        theme_advanced_buttons1 : "imagebox, bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,undo,redo,|,forecolor,backcolor,|,styleselect,formatselect,fontselect,fontsizeselect ",
                        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,outdent,indent,blockquote,|,link,unlink,anchor,image,media,|,pagebreak,cleanup,code,|,fullscreen ",
                        theme_advanced_buttons3 : "",
                        theme_advanced_toolbar_location : "top",
                        theme_advanced_toolbar_align : "left",
                        theme_advanced_statusbar_location : "bottom",
                        theme_advanced_resizing : true,
                        content_css : theme + "/css/content.css",
                        paste_use_dialog : false,
                        theme_advanced_resizing : true,
                        file_browser_callback : "tinyBrowser",
                        theme_advanced_resize_horizontal : true,
                        apply_source_formatting : true,
                        force_br_newlines : true,
                        force_p_newlines : false,
                        relative_urls : false,
                        setup : function(ed) {
                            ed.addButton('imagebox', {
                                title : 'Imagebox',
                                image : '/application/modules/imagebox/templates/images/button.png',
                                onclick : function() {
                                    show_main_window();
                                    }
                                    });
                            },
                            });
                    };
	    
	    	var editor_loaded = false;
		
		$('tabs-block').getElements('a').addEvent('mouseover', function(event){
		    if (!editor_loaded)
		    {
			load_editor2();
			editor_loaded = true;
		    }
		    });	
		});

	</script>
{/literal}
