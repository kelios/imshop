<!-- Create new product form -->
<form method="post" action="{$ADMIN_URL}products/create"  enctype="multipart/form-data" style="width:100%" id="image_upload_form">

<div id="productTabs">

    <h4 title="Товар">Товар</h4>
    <div>
    <div class="form_text"> </div>
    <div class="form_input variantsTableContainer">
       
        <div style="padding-left:31px;padding-bottom:5px;">
            <b>Название Товара</b> <span class="required">*</span> 
        </div>

        <div style="padding-left:30px;">
            <input type="text" name="Name" style="width:685px;" value="{echo ShopCore::encode($model->getName())}" class="textbox_long" />
        </div>

        <table cellpadding="4">
            <thead>
                <th width="17px;"> </th>
                <th>Название варианта <span class="required">*</span></th>
                <th>{echo ShopCore::encode($model->getLabel('Price'))} <span class="required">*</span></th>
                <th>{echo ShopCore::encode($model->getLabel('Number'))}</th>
                <th>{echo ShopCore::encode($model->getLabel('Stock'))}</th>
                <th><img src="{$THEME}/images/plus2.png" style="cursor:pointer;" title="Добавить вариант" onclick="cloneVariant();"/></th>
            </thead>
            <tbody>
            <tr>
                <td></td>
                    <td><input type="text" name="variants[Name][]" value="" class="textbox_long" /></td>
                    <td><input type="text" name="variants[Price][]" value="" class="textbox_short" /></td>
                    <td><input type="text" name="variants[Number][]" value="" class="textbox_short" /></td>
                    <td><input type="text" name="variants[Stock][]" value="" class="textbox_short" /></td>
                <td></td>
            </tr>
            </tbody>

            <tfoot>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tfoot>
        </table>

        <table cellpadding="4" id="variantsTable">
            <tbody id="variantsBlock">
            </tbody>
            <tfoot>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tfoot>
        </table>

    </div>
    <div class="form_overflow"></div>

    <div class="form_text"> </div>
    <div class="form_input">
        <label><input type="checkbox" name="Active" value="1" checked="checked" /> {echo $model->getLabel('Active')}</label>
        <label><input type="checkbox" name="Hit"  value="1" /> {echo $model->getLabel('Hit')}</label>
		<label><input type="checkbox" name="Hot"  value="1" /> {echo $model->getLabel('Hot')}</label>
		<label><input type="checkbox" name="Action"  value="1" /> {echo $model->getLabel('Action')}</label>
    </div>
    <div class="form_overflow"></div>

<!-- Left block with brand and categories list -->
<div style="float:left;clear:left;width:480px;">
    <div class="form_text">{echo $model->getLabel('Brand')}</div>
    <div class="form_input">
        <select name="BrandId" style="width:285px;">
            <option value="">Не указан</option>
            {foreach SBrandsQuery::create()->orderByName()->find() as $brand}
                <option value="{echo $brand->getId()}">{echo ShopCore::encode($brand->getName())}</option>
            {/foreach}
        </select>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('CategoryId')}:</div>
    <div class="form_input">
        <select name="CategoryId" style="width:285px;" onChange="shopLoadProperiesByCategory(this,0);">
            {foreach $categories as $category}
                <option value="{echo $category->getId()}">{str_repeat('-',$category->getLevel())} {echo ShopCore::encode($category->getName())}</option>
            {/foreach}
        </select>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('Categories')}:</div>
    <div class="form_input">
        <select name="Categories[]" multiple="multiple" style="width:285px;height:129px;">
            {foreach $categories as $category}
                <option value="{echo $category->getId()}">{str_repeat('-',$category->getLevel())} {echo ShopCore::encode($category->getName())}</option>
            {/foreach}
        </select>
    </div>
    <div class="form_overflow"></div>
</div>

<!-- Right block with main images -->
<div class="rightBlockWithImages"> 
    <div style="width:400px;">
        <div class="imageBoxStripe" style="">
            <table border="0" cellspacing="0" cellpadding="0" height="90px" width="90px">
                <tr>
                    <td>
                         
                    </td>
                </tr>
            </table>
        </div>
        
       <span style="font-weight:bold;padding-left:5px;">Основное изображение</span><br/>
       <div style="height:16px;width:125px;float:left;text-align: center; overflow: hidden;" class="button_silver_130">
       <div style="color:#fff;" id="mainImageName">Выбрать файл</div>
       <input type="file" onchange="$('mainImageName').set('html',document.getElementById('mainPhoto').value);" id="mainPhoto" name="mainPhoto" size="1" />
       </div> 

        <input type="text" name="" value="http://" class="textbox_long" style="margin-left:5px;margin-top:5px;" />  
        <div style="margin-left:10px;margin-top:5px;">
            <label><input type="checkbox" checked="checked" value="1" name="autoCreateSmallImage" /> Создать маленькое изображение</label>
        </div>
    </div>

    <div style="clear:both;height:11px;"></div>

    <div style="width:400px;">
       <div class="imageBoxStripe">
            <table border="0" cellspacing="0" cellpadding="0" height="90px" width="90px">
                <tr>
                    <td>
                         
                    </td>
                </tr>
            </table> 
       </div>
   
       <span style="font-weight:bold;padding-left:5px;">Маленькое изображение</span><br/>
       <div style="height:16px;width:125px;float:left;text-align: center; overflow: hidden;" class="button_silver_130">
       <div style="color:#fff;" id="smallImageName">Выбрать файл</div>
       <input type="file" name="smallPhoto" onchange="$('smallImageName').set('html',document.getElementById('smallPhoto').value);" size="1" id="smallPhoto" />
       </div>

        <input type="text" name="" value="http://" class="textbox_long" style="margin-left:5px;margin-top:5px;" /> 

    </div>

</div>

    <div style="clear:both;"> </div>
 
    <div class="form_text">{echo $model->getLabel('ShortDescription')}:</div>
    <div class="form_input">
        <textarea class="mceEditor" name="ShortDescription" ></textarea>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('FullDescription')}:</div>
    <div class="form_input">
        <textarea class="mceEditor" name="FullDescription" ></textarea>
    </div>
    <div class="form_overflow"></div>
   
    <!-- Begin warehouses -->
    <div class="form_text">Склады:</div>
    <div class="form_input" id="warehouses_container">
    <a href="javascript:cloneWarehouseVariant();"> Добавить склад</a>
    <hr/>
        <div class="warehouse_data">
        {foreach $model->getSWarehouseDatas() as $w_data}
            <div id="warehouse_line">
                <select name="warehouses[]" style="width:242px;">
                    <option value="">---</option>
                    {foreach $warehouses as $w}
                        <option {if $w->getId() == $w_data->getWarehouseId()}selected{/if} value="{echo $w->getId()}">{echo encode($w->getName())}</option>
                    {/foreach}
                </select>
                
                <input type="text" name="warehouses_c[]"  value="{echo $w_data->getCount()}" class="textbox_short"  style="width:24px;" />

                <img src="{$THEME}/images/delete.png" onclick="$(this).getParent().dispose();" style="margin-left:5px;" title="Удалить" />
            </div>
        {/foreach}
        </div>
    </div>
    <div class="form_overflow"></div>
    <!-- End warehouses -->

    <div class="form_text">Дата создания:</div>
    <div class="form_input">
        <input type="text" id="created" name="Created" value="{$cur_date}" class="textbox_short" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('Url')}:</div>
    <div class="form_input">
        <input type="text" name="Url" value="" class="textbox_long" /> 
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">Старая цена:</div>
    <div class="form_input">
        <input type="text" name="OldPrice" value="" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('RelatedProducts')}:</div>
    <div class="form_input">
        <input type="text" name="RelatedProducts" value="" class="textbox_long" /> 
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('MetaTitle')}:</div>
    <div class="form_input">
        <input type="text" name="MetaTitle" value="" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('MetaDescription')}:</div>
    <div class="form_input">
        <input type="text" name="MetaDescription" value="" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('MetaKeywords')}:</div>
    <div class="form_input">
        <input type="text" name="MetaKeywords" value="" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>

    </div> <!-- end of first tab -->

    <h4 title="Свойства">Свойства</h4>
    <div>
        <div id="productPropertiesContainer">
        {if ($firstCategory = array_shift($categories)) instanceof SCategory}
            {echo ShopCore::app()->SPropertiesRenderer->renderAdmin($firstCategory->getId())}
        {/if}
        </div>
    </div> <!-- end of properties tab -->

    <h4 title="Изображения">Изображения</h4>
    <div>
        <div class="form_text"></div>
        <div class="form_input">
        <!-- Begin additional images -->
        <table border="0" cellpadding="10" id="additionalImagesTable">
            <tr>
            {for $i=0;$i<6;$i++}
                <td>
                    <div class="imageBoxStripe" style="clear:both;">
                        <table border="0" cellspacing="0" cellpadding="0" height="90px" width="90px">
                            <tr>
                                <td>

                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div style="height:16px;width:88px;text-align: center; overflow: hidden;" class="button_silver_130">
                        <div style="color:#fff;" id="addImg{$i}">Выбрать файл</div>
                        <input type="file" onchange="$('addImg{$i}').set('html',document.getElementById('addImgFile{$i}').value);"
                        style="margin-top: -50px;
                               margin-left:-410px;
                                -moz-opacity: 0;
                                filter: alpha(opacity=0);
                                opacity: 0;
                                font-size: 150px;
                                height: 100px; "
                        name="additionalImage_{$i}" id="addImgFile{$i}" size="1" />
                    </div>
                </td>
            {/for}
            </tr>

            <tr>
            {for $i=6;$i<12;$i++}
                <td>
                    <div class="imageBoxStripe" style="clear:both;">
                        <table border="0" cellspacing="0" cellpadding="0" height="90px" width="90px">
                            <tr>
                                <td>

                                </td>
                            </tr>
                        </table>
                    </div>
                    <br/>
                    <div style="height:16px;width:88px;text-align: center; overflow: hidden;" class="button_silver_130">
                        <div style="color:#fff;" id="addImg{$i}">Выбрать файл</div>
                        <input type="file" onchange="$('addImg{$i}').set('html',document.getElementById('addImgFile{$i}').value);"
                        style="margin-top: -50px;
                               margin-left:-410px;
                                -moz-opacity: 0;
                                filter: alpha(opacity=0);
                                opacity: 0;
                                font-size: 150px;
                                height: 100px; "
                        name="additionalImage_{$i}" id="addImgFile{$i}" size="1" />
                    </div>
                </td>
            {/for}
            </tr>
        </table>

        <!-- End additional images -->
        </div>
        <div class="form_overflow"></div>
    </div> <!-- end of images tab -->

</div> <!-- end of product tabs -->

<div class="footer_panel" align="right">
   <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active"   />
   <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись"  />
   <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать"  />
</div>
{form_csrf()}
<iframe id="upload_target" name="upload_target" src="" style="width:0;height:0;border:0px solid #fff;display:none;"></iframe>
</form>

<div style="display:none;">
    <div id="warehouse_line">
        <select name="warehouses[]" style="width:242px;">
            <option value="">---</option>
            {foreach $warehouses as $w}
                <option value="{echo $w->getId()}">{echo encode($w->getName())}</option>
            {/foreach}
        </select>
        
        <input type="text" name="warehouses_c[]"  value="" class="textbox_short"  style="width:24px;" />

        <img src="{$THEME}/images/delete.png" onclick="$(this).getParent().dispose();" style="margin-left:5px;" title="Удалить" />
    </div>
</div>

<div style="display:none;">
<table>
    <tr id="productVariant">
        <td><img src="{$SHOP_THEME}images/drag_arrow.png" class="drager" /></td>
        <td><input type="text" name="variants[Name][]" value="" class="textbox_long" /></td>
        <td><input type="text" name="variants[Price][]" value="" class="textbox_short" /></td>
        <td><input type="text" name="variants[Number][]" value="" class="textbox_short" /></td>
        <td><input type="text" name="variants[Stock][]" value="" class="textbox_short" /></td>
        <td><img src="{$THEME}/images/minus.png" class="deleter" style="cursor:pointer;" title="Удалить вариант"/></td>
    </tr>
</table>
</div>

<br/>

{literal}
<script type="text/javascript">
    var newVariantId = 0;

    window.addEvent('domready', function() {
        var product_tabs = new SimpleTabs('productTabs', {
		    selector: 'h4'
		});
        
          create_date_cal = new Calendar({ created: 'Y-m-d' }, { direction: .0, tweak: {x: -150, y: 22} });

        document.getElementById('image_upload_form').onsubmit = function() 
        {
            document.getElementById('image_upload_form').target = 'upload_target';
            document.getElementById("upload_target").onload = uploadCallback; 
        }

        load_editor();
    });
</script>
{/literal}
