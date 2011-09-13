<!-- Import form -->
<div class="saPageHeader">
    <h2>Экспорт товаров</h2>
</div>

<div id="errorsBox" style="padding:5px;margin-left:160px;color:#ff3300;">
</div>

<form method="post" action="{$ADMIN_URL}system/export"  style="width:100%" id="file_upload_form">
    <div style="float:left;width:500px;">
        <div class="form_text">Колонки:</div>
        <div class="form_input">
            <input type="text" name="attributes" id="attributesBox" value="cat, num, name, prc, desc" class="textbox_long" />
        </div>
        <div class="form_overflow"></div>

        <div class="form_text">Разделитель полей:</div>
        <div class="form_input">
            <input type="text" class="textbox_long" style="width:24px;" value=";" name="delimiter" id="delimiterText"/>
            <select onchange="$('delimiterText').set('value',this.value)">
                  <option value=";">Точка с запятой;</option>
                  <option value=":">Двоеточие (:)</option>
                  <option value=",">Запятая (,)</option>
                  <option value="	">Табуляция (\t)</option>
                  <option value="#">Решетка (#)</option>
            </select>
        </div>
        <div class="form_overflow"></div>

        <div class="form_text">Разделитель текста:</div>
        <div class="form_input">
            <input type="text" class="textbox_long" style="width:24px;" value="&#34;" name="enclosure" id="enclosureText"/>
            <select onchange="$('enclosureText').set('value',this.value)">
                <option value="&#34;">Кавычки (")</option>
                <option value="'">Одинарные кавычки (')</option>
            </select>
        </div>
        <div class="form_overflow"></div>

        <div class="form_text">Кодировка:</div>
        <div class="form_input">
            <select name="encoding">
                <option value="utf-8">UTF-8</option>
                <option value="cp1251">Windows 1251</option>
            </select>
        </div>
        <div class="form_overflow"></div>

        <div class="form_text"></div>
        <div class="form_input">
            <input type="submit" value="Экспорт" class="button_130"/>
        </div>
        <div class="form_overflow"></div>
    </div>

    <div style="float:left;">
        <div class="form_text"></div>
        <div class="form_input">
        <table cellpadding="1" cellspacing="3" style="font-size:11px" class="attributesTable">
                <tr><td><b>Колонки</b></td><td style="width:250px;"> </td></tr>
                <tr class="even" onclick="addProductColumn(this)"><td>name</td><td>   Имя товара</td></tr>
                <tr class="odd" onclick="addProductColumn(this)"><td>url</td><td>    URL</td></tr>
                <tr class="even" onclick="addProductColumn(this)"><td>prc</td><td>    Цена</td></tr>
                <tr class="odd" onclick="addProductColumn(this)"><td>oldprc</td><td>   Старая Цена</td></tr>
                <tr class="even" onclick="addProductColumn(this)"><td>stk </td><td>   Количество</td></tr>
                <tr class="odd" onclick="addProductColumn(this)"><td>num </td><td>   Артикул</td></tr>
                <tr class="even" onclick="addProductColumn(this)"><td>var </td><td>   Имя варианта</td></tr>
                <tr class="odd" onclick="addProductColumn(this)"><td>act </td><td>   Активен</td></tr>
                <tr class="even" onclick="addProductColumn(this)"><td>hit </td><td>   Хит</td></tr>
                <tr class="odd" onclick="addProductColumn(this)"><td>brd </td><td>   Бренд</td></tr>
                <tr class="even" onclick="addProductColumn(this)"><td>cat  </td><td>  Категория</td></tr>
                <tr class="odd" onclick="addProductColumn(this)"><td>relp </td><td>  Связанные товары</td></tr>
                <tr class="even" onclick="addProductColumn(this)"><td>mimg </td><td>  Основное изображение</td></tr>
                <tr class="odd" onclick="addProductColumn(this)"><td>simg </td><td>  Маленькое изображение</td></tr>
                <tr class="even" onclick="addProductColumn(this)"><td>imgs </td><td>  Дополнительные изображения</td></tr>
                <tr class="odd" onclick="addProductColumn(this)"><td>shdesc </td><td>Краткое описание</td></tr>
                <tr class="even" onclick="addProductColumn(this)"><td>desc </td><td>  Полное описание</td></tr>
                <tr class="odd" onclick="addProductColumn(this)"><td>mett </td><td>  Meta Title</td></tr>
                <tr class="even" onclick="addProductColumn(this)"><td>metd </td><td>  Meta Description</td></tr>
                <tr class="odd" onclick="addProductColumn(this)"><td>metk </td><td>  Meta Keywords</td></tr>
                <tr class="even" onclick="addProductColumn(this)"><td>skip </td><td>  Пропустить колонку</td></tr>
                {if sizeof($customFields) > 0}
                    <tr><td> </td><td></td></tr>
                    <tr><td><b>Свойства товаров</b></td><td> </td></tr>
                    {foreach $customFields as $f}
                        <tr {counter('class="even"','class="odd"')}  onclick="addProductColumn(this)"><td>{echo $f->getCsvName()}</td><td> </td></tr>
                    {/foreach}
                {/if}
            </table>
        </div>
        <div class="form_overflow"></div>
    </div>

    {form_csrf()}
    <iframe id="upload_target" name="upload_target" src="" style="width:0;height:0;border:0px;display:none;"></iframe>
</form>

{literal}
<script type="text/javascript">
    window.addEvent('domready', function() {
        document.getElementById('file_upload_form').onsubmit = function()
        {
            document.getElementById('file_upload_form').target = 'upload_target';
            document.getElementById("upload_target").onload = fileUploadCallback;
        }
    });

    function addProductColumn(el)
    {
        searchTd = el.getElements('td');
        if ($('attributesBox').get('value') == '')
        {
            var delimiter = '';
        }else{
            var delimiter = ',';
        }

        $('attributesBox').set('value',  $('attributesBox').get('value') + delimiter + searchTd[0].get('text'));
    }

    // Upload file callback
    function fileUploadCallback()
    {
        var iFrame = document.getElementById('upload_target');
        var data = iFrame.contentWindow.document.body.innerHTML;

        if (data != '')
        {
            $('errorsBox').set('html',data);
        }else{
            $('errorsBox').set('html', '');
            showMessage('','Экспорт завершен');
        }
    }
    </script>
{/literal}
