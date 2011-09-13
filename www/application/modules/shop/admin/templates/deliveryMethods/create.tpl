<div class="saPageHeader">
    <h2>Создание Способа Доставки</h2>
</div>

<form method="post" action="{$ADMIN_URL}/deliverymethods/create"  style="width:100%">

    <div class="form_text">{echo $model->getLabel('Name')}:</div>
    <div class="form_input">
        <input type="text" name="Name" value="" class="textbox_long" /> <span class="required">*</span> 
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('Description')}:</div>
    <div class="form_input">
        <textarea class="mceEditor" name="Description" ></textarea>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('Price')}:</div>
    <div class="form_input">
        <input type="text" name="Price" value="" class="textbox_long" /> {$CS}
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('FreeFrom')}:</div>
    <div class="form_input">
        <input type="text" name="FreeFrom" value="" class="textbox_long" /> {$CS}
    </div>
    <div class="form_overflow"></div>

    <div class="form_text"></div>
    <div class="form_input">
        <label><input type="checkbox" name="Enabled" value="1" /> {echo $model->getLabel('Enabled')}</label>  
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">Способы оплаты:</div>
    <div class="form_input">
        {if sizeof($paymentMethods) > 0}
            {foreach $paymentMethods as $pm}
                <label><input type="checkbox"
                 {if $model->getPaymentMethodss()->contains($pm)}
                    checked="checked"
                 {/if}
                 name="paymentMethods[]" value="{echo $pm->getId()}">{echo encode($pm->getName())}</label><br/>
            {/foreach}
        {else:}
            Список пустой.
        {/if}
    </div>
    <div class="form_overflow"></div>

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
</script>
{/literal}
