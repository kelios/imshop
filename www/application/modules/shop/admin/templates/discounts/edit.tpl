<div class="saPageHeader">
    <h2>Редактирование Скидки</h2>
</div>

<form method="post" action="{$ADMIN_URL}discounts/edit/{echo $model->getId()}"  style="width:100%">

    <div class="form_text">{echo $model->getLabel('Name')}:</div>
    <div class="form_input">
        <input type="text" name="Name" value="{echo encode($model->getName())}" class="textbox_long" />
        <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text"></div>
    <div class="form_input">
        <label><input type="checkbox" name="Active" value="1" {if $model->getActive() == true}checked="checked"{/if}/> {echo $model->getLabel('Active')}</label>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('Description')}:</div>
    <div class="form_input">
        <textarea name="Description" class="mceEditor">{echo encode($model->getDescription())}</textarea>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('DateStart')}:</div>
    <div class="form_input">
        <input type="text" name="DateStart" id="DateStart" value="{echo encode($model->formatDateStart())}" class="textbox_short"/>
        <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('DateStop')}:</div>
    <div class="form_input">
        <input type="text" name="DateStop" id="DateStop" value="{echo encode($model->formatDateStop())}"  class="textbox_short"/>
        <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('Discount')}:</div>
    <div class="form_input">
        <input type="text" name="Discount" value="{echo encode($model->getDiscount())}" class="textbox_long" />
        <span class="required">*</span>
        <div class="lite">
            Число больше нуля. Для использования процентной скидки используйте формат: "SUM%"
        </div>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('MinPrice')}:</div>
    <div class="form_input">
        <input type="text" name="MinPrice" value="{echo encode($model->getMinPrice())}" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('MaxPrice')}:</div>
    <div class="form_input">
        <input type="text" name="MaxPrice" value="{echo encode($model->getMaxPrice())}" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('Categories')}:</div>
    <div class="form_input">
        <select name="Categories[]" multiple="multiple" style="width:285px;height:129px;">
            {foreach $categoriesTree as $category}
            {$selected=''}
            {if $model->hasCategory($category->getId())}
                {$selected='selected="selected"'}
            {/if}
                <option {$selected} value="{echo $category->getId()}">{str_repeat('-',$category->getLevel())} {echo ShopCore::encode($category->getName())}</option>
            {/foreach}
        </select>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('Products')}:</div>
    <div class="form_input">
        <input type="text" name="Products" value="{echo encode($model->getProducts())}" class="textbox_long" />
        <div class="lite">
            Укажите ID продуктов через запятую.
        </div>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('UserGroup')}:</div>
    <div class="form_input">
        {foreach $roles as $r}
            <label>
                <input name="roles[]" {if in_array($r['name'], $model->getGroupsArray())} checked {/if} value="{$r.name}" type="checkbox"> {encode($r.alt_name)}
            </label>
            <br/>
        {/foreach}
    </div>
    <div class="form_overflow"></div>

    <br/>
    <br/>

    <div class="footer_panel" align="right">
       <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active" onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись"  onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать"  onClick="ajaxShopForm(this);" />
    </div>

{form_csrf()}
</form>

<script type="text/javascript">
    load_editor();

    {literal}
        shop_date_start_cal = new Calendar({ DateStart: 'Y-m-d 00:00:00' }, { direction: .0, tweak: {x: -150, y: 22} });
        shop_date_stop_cal = new Calendar({ DateStop: 'Y-m-d 00:00:00' }, { direction: .0, tweak: {x: -150, y: 22} });
    {/literal}
</script>
