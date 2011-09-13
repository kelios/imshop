<div class="saPageHeader">
    <h2>Редактирование Валюты</h2>
</div>

<form method="post" action="{$ADMIN_URL}currencies/edit/{echo $model->getId()}"  style="width:100%">

    <div class="form_text">{echo $model->getLabel('Name')}:</div>
    <div class="form_input">
        <input type="text" name="Name" value="{echo ShopCore::encode($model->getName())}" class="textbox_long" /> <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>

    <div class="form_text">{echo $model->getLabel('Code')}:</div>
    <div class="form_input">
        <input type="text" name="Code" value="{echo ShopCore::encode($model->getCode())}" class="textbox_long" /> <span class="required">*</span> 
        <div class="lite">(например: USD)</div>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('Symbol')}:</div>
    <div class="form_input">
        <input type="text" name="Symbol" value="{echo ShopCore::encode($model->getSymbol())}" class="textbox_long" /> <span class="required">*</span> 
        <div class="lite">(например: $)</div>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('Rate')}:</div>
    <div class="form_input">
        <input type="text" name="Rate" value="{echo $model->getRate()}" class="textbox_short" /> 
        = 
        1.000 {$CS}
    </div>
    <div class="form_overflow"></div>


    <div class="footer_panel" align="right"> 
       <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active" onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись"  onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать"  onClick="ajaxShopForm(this);" />
    </div>

{form_csrf()}
</form>
