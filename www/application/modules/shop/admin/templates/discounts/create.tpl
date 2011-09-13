<div class="saPageHeader">
    <h2>Создание Скидки</h2>
</div>

<form method="post" action="{$ADMIN_URL}discounts/create"  style="width:100%">

    <div class="form_text">{echo $model->getLabel('Name')}:</div>
    <div class="form_input">
        <input type="text" name="Name" value="" class="textbox_long" />
        <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text"></div>
    <div class="form_input">
        <label><input type="checkbox" name="Active" value="1" /> {echo $model->getLabel('Active')}</label>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('Description')}:</div>
    <div class="form_input">
        <textarea name="Description" class="mceEditor"></textarea>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('DateStart')}:</div>
    <div class="form_input">
        <input type="text" name="DateStart" value="" id="DateStart" class="textbox_short" />
        <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('DateStop')}:</div>
    <div class="form_input">
        <input type="text" name="DateStop" value="" id="DateStop" class="textbox_short" />
        <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('Discount')}:</div>
    <div class="form_input">
        <input type="text" name="Discount" value="" class="textbox_long" />
        <span class="required">*</span>
        <div class="lite">
            Число больше нуля. Для использования процентной скидки используйте формат: "SUM%"
        </div>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('MinPrice')}:</div>
    <div class="form_input">
        <input type="text" name="MinPrice" value="" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('MaxPrice')}:</div>
    <div class="form_input">
        <input type="text" name="MaxPrice" value="" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('Categories')}:</div>
    <div class="form_input">
        <select name="Categories[]" multiple="multiple" style="width:285px;height:129px;">
            {foreach $categoriesTree as $category}
                <option value="{echo $category->getId()}">{str_repeat('-',$category->getLevel())} {echo ShopCore::encode($category->getName())}</option>
            {/foreach}
        </select>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('Products')}:</div>
    <div class="form_input">
        <input type="text" name="Products" value="" class="textbox_long" />
        <div class="lite">
            Укажите ID продуктов через запятую.
        </div>
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