<div class="saPageHeader" style="width:100%;">
    <h2>Создание способа оплаты</h2>
</div>

<form method="post" action="{$ADMIN_URL}/paymentmethods/create"  style="width:100%">

    <div class="form_text">{echo $model->getLabel('Name')}:</div>
    <div class="form_input">
        <input type="text" name="Name" value="" class="textbox_long" /> <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">Валюта:</div>
    <div class="form_input">
        <select name="CurrencyId" style="width:280px;">
        {foreach $currencies as $c}
            <option value="{echo $c->getId()}">
                {echo ShopCore::encode($c->getName())} 
                ({echo $c->getRate()}
                {echo $c->getSymbol()} = 1 {$CS})
            </option>
        {/foreach}
        </select>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"></div>
    <div class="form_input">
        <label><input type="checkbox" name="Active" checked="checked" value="1" />{echo $model->getLabel('Active')}</label>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('Description')}:</div>
    <div class="form_input">
        <textarea name="Description" value="" class="mceEditor"></textarea>
    </div>
    <div class="form_overflow"></div>

    <div class="footer_panel" align="right"> 
       <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active" onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись"  onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать"  onClick="ajaxShopForm(this);" />
    </div>

{form_csrf()}
</form>

<script type="text/javascript">
    load_editor();
</script>
