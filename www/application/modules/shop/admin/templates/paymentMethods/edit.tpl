<div class="saPageHeader" style="width:100%;">
    <h2>Создание способа оплаты</h2>
</div>

<form method="post" action="{$ADMIN_URL}/paymentmethods/edit/{echo $model->getId()}"  style="width:100%">

    <div class="form_text">{echo $model->getLabel('Name')}:</div>
    <div class="form_input">
        <input type="text" name="Name" value="{echo ShopCore::encode($model->getName())}" class="textbox_long" /> <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">Валюта:</div>
    <div class="form_input">
        <select name="CurrencyId" style="width:280px;">
        {foreach $currencies as $c}
            <option value="{echo $c->getId()}" {if $c->getId() == $model->getCurrencyId()}selected="selected"{/if}>
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
        <label><input type="checkbox" value="1" name="Active" {if $model->getActive() == true} checked="checked" {/if} />{echo $model->getLabel('Active')}</label>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('Description')}:</div>
    <div class="form_input">
        <textarea name="Description" value="" class="mceEditor">{echo ShopCore::encode($model->getDescription())}</textarea>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">Система оплаты:</div>
    <div class="form_input">
        <select name="PaymentSystemName" onchange="loadPaymentSystemConfigForm(this.value, {echo $model->getId()});">
            <option value="0">Нет</option>
            {foreach ShopCore::app()->SPaymentSystems->getList() as $key=>$val}
                <option value="{$key}" {if $model->getPaymentSystemName() == $key}selected="selected"{/if}>{echo encode($val.listName)}</option>
            {/foreach}
        </select>
    </div>
    <div class="form_overflow"></div>

    <!-- Begin config form -->
    <div class="form_input" id="paymentSystemConfigureBox">
        {$paymentSystemForm}
    </div>
    <!-- End config form -->


    <div class="footer_panel" align="right"> 
       <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active" onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись"  onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать"  onClick="ajaxShopForm(this);" />
    </div>

{form_csrf()}
</form>

{literal}
<script type="text/javascript">
    load_editor();

    function loadPaymentSystemConfigForm(val, modelId)
    {
        ajax_div('paymentSystemConfigureBox', shop_url + 'paymentmethods/getAdminForm/' + val + '/' + modelId);
    }
</script>
{/literal}