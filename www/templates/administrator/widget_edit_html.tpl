<div class="top-navigation">
    <ul>
        <li><p>Редактирование виджета <b>{$widget.name}</b></p></li>
    </ul>
</div>

<form action="{$BASE_URL}admin/widgets_manager/update_widget/{$widget.id}" method="post" id="edit_html_widget">
<div class="form_text">Имя:</div>
<div class="form_input">
    <input type="text" name="name" id="widget_name" value="{$widget.name}" class="textbox_long" />
    <span class="lite"></span>
</div>
<div class="form_overflow"></div>

<div class="form_text">Описание:</div>
<div class="form_input">
    <input type="text" name="desc" id="widget_desc" value="{$widget.description}" class="textbox_long" />
    <span class="lite">Краткое описание виджета.</span>
</div>
<div class="form_overflow"></div>

<div class="form_text"></div>
<div class="form_input" >    
    <textarea id="html_codeid" name="html_code" class="mceEditor" rows="15" cols="180" style="width:500px;height:250px;">{htmlspecialchars($widget.data)}</textarea>
    <br />
    <a href="#" id="load_editr_link" onclick="load_editor(); return false;">Загрузить редактор </a>
</div>
<div class="form_overflow"></div>

<div class="form_text"></div>
<div class="form_input">
    <input type="submit" class="button" value="Сохранить" onclick="ajax_me('edit_html_widget');" />
    <a href="#" onclick="ajax_div('page', base_url + 'admin/widgets_manager/'); return false" >Перейти к списку виджетов</a> 
</div>
{form_csrf()}
</form>
