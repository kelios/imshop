<div class="form_text">Выберите категорию:</div>
<div class="form_input">
    <select name="CategoryId" id="moveCategoryId" style="width:285px;">
        {foreach $categories as $category}
            <option {if $category->getId() == $categoryId}selected{/if} value="{echo $category->getId()}">{str_repeat('-',$category->getLevel())} {echo ShopCore::encode($category->getName())}</option>
        {/foreach}
    </select>
</div>
<div class="form_overflow"></div>

<div class="form_text"></div>
<div class="form_input">
    <input id="footerButton" value="Переместить" type="button" onclick="shopProductsList_moveProducts( $('moveCategoryId').value );" title="Переместить">
    <input id="footerButton" value="Отмена" type="button" onclick="MochaUI.closeWindow($('productsListMoveWindow'));" title="Переместить">
</div>
<div class="form_overflow"></div>
