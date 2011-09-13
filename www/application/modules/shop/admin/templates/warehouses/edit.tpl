<div class="saPageHeader">
    <h2>Редактирование Склада</h2>
</div>

<form method="post" action="{$ADMIN_URL}warehouses/edit/{echo $model->getId()}"  style="width:100%">

    <div class="form_text">{echo $model->getLabel('Name')}:</div> 
    <div class="form_input">
        <input type="text" name="Name" value="{echo encode($model->getName())}" class="textbox_long" /> <span class="required">*</span>
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('Address')}:</div>
    <div class="form_input">
        <input type="text" name="Address" value="{echo encode($model->getAddress())}" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('Phone')}:</div>
    <div class="form_input">
        <input type="text" name="Phone" value="{echo encode($model->getPhone())}" class="textbox_long" />
    </div>
    <div class="form_overflow"></div>


    <div class="form_text">{echo $model->getLabel('Description')}:</div>
    <div class="form_input">
        <textarea name="Description">{echo encode($model->getDescription())}</textarea>
    </div>
    <div class="form_overflow"></div>

    <div class="footer_panel" align="right"> 
       <input type="submit" id="footerButton" name="_add" value="Сохранить" class="active" onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_create" value="Сохранить и создать новую запись"  onClick="ajaxShopForm(this);" />
       <input type="submit" id="footerButton" name="_edit" value="Сохранить и редактировать"  onClick="ajaxShopForm(this);" />
    </div>

{form_csrf()}
</form>
