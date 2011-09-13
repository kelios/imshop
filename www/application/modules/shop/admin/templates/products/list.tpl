<div class="saPageHeader" style="float:left;width:100%;">
    <div style="float:right;padding-top:2px;margin-right:5px;position:relative;" onsubmit="return false;">
        <form action="{$ADMIN_URL}search/index/" method="get">
        <input type="hidden" value="{echo $model->getId()}" name="CategoryId">
            <input type="text" name="text" class="textbox_long" />
            <input type="submit" value="Искать" class="search_submit" name="_search" onclick="ajaxShopForm(this, 'shopAdminPage');" />
        </form>
    </div>

    <div style="float:right;padding:6px 10px 0 0">
           <input type="button" class="button_silver_130" value="Создать товар" onclick="ajaxShop('products/create');"/>
    </div>

    <h2>Просмотр товаров категории "{truncate(ShopCore::encode($model->getName()),60)}"</h2>
</div>

{if $totalProducts == 0}
    <div id="notice" style="width: 500px; margin-top:50px;">В категории нет товаров.
        <a href="#" onclick="ajaxShop('products/create'); return false;">Создать.</a>
    </div>
    {return}
{/if}

<div id="sortable" style="clear:both;"> 
		  <table id="ShopProductsHtmlTable">
		  	<thead>
                <th width="1px"><input type="checkbox" onclick="ShopSwitchChecks(this);"/></th>
                <th title="Сортировка по Id" width="5px" {if $orderField == 'Id'}
				{if $nextOrderCriteria == 'ASC'}class="tableHeaderOver sortedDESC"{else:}
				{if $nextOrderCriteria == 'DESC'}class="tableHeaderOver sortedASC"{/if}{/if}{else:}class="tableHeaderOver"{/if} 
				onclick="ajaxShop('products/index/{echo $model->getId()}/offset/Id/{if $orderField == 'Id'}{if $nextOrderCriteria == 'ASC'}ASC{else:}DESC{/if}{else:}DESC{/if}'); return false;">ID</th>
                <th title="Сортировка по Названию" {if $orderField == 'Name'}
				{if $nextOrderCriteria == 'ASC'}class="tableHeaderOver sortedDESC"{else:}
				{if $nextOrderCriteria == 'DESC'}class="tableHeaderOver sortedASC"{/if}{/if}{else:}class="tableHeaderOver"{/if} 
				onclick="ajaxShop('products/index/{echo $model->getId()}/offset/Name/{if $orderField == 'Name'}{if $nextOrderCriteria == 'ASC'}ASC{else:}DESC{/if}{else:}DESC{/if}'); return false;">Название</th>
                <th width="18px"></th>
                <th width="18px"></th>
				<th width="18px"></th>
				<th width="18px"></th>
                <th title="Сортировка по Цене" width="100px" {if $orderField == 'Price'}
				{if $nextOrderCriteria == 'ASC'}class="tableHeaderOver sortedDESC"{else:}
				{if $nextOrderCriteria == 'DESC'}class="tableHeaderOver sortedASC"{/if}{/if}{else:}class="tableHeaderOver"{/if} 
				onclick="ajaxShop('products/index/{echo $model->getId()}/offset/Price/{if $orderField == 'Price'}{if $nextOrderCriteria == 'ASC'}ASC{else:}DESC{/if}{else:}DESC{/if}'); return false;">Цена</a></th>
                <th width="5px"></th>
			</thead>
			<tbody>
        {foreach $products as $p}
        {$variants = $p->getProductVariants()}
		<tr id="productRow{echo $p->getId()}" class="row">
            <td width="1px"><input type="checkbox" class="chbx" rel="{echo $p->getId()}" onclick="productsListcheckForChecked();"/></td>
			<td>{echo $p->getId()}</td>
			<td>
                <a id="editProductLink{echo $p->getId()}" href="#"
                {if $p->getActive() == false} class="productNotActivated" {/if}
                onClick="ajaxShop('products/edit/{echo $p->getId()}?redirect={base64_encode(ShopCore::$ci->uri->uri_string())}'); return false;">{truncate(ShopCore::encode($p->getName()),100)}</a>
            </td>
            <td>
                {if $p->getActive() == true}
                    <img src="{$SHOP_THEME}images/tick_16.png" title="Активен" onclick="shopChangeProductActive(this, {echo $p->getId()});" rel="true"/>
                {else:}
                    <img src="{$SHOP_THEME}images/tick_16_empty.png"  title="Активен" onclick="shopChangeProductActive(this, {echo $p->getId()});" rel="false"/>
                {/if}
            </td>
            <td>
                {if $p->getHit() == true}
                    <img src="{$SHOP_THEME}images/star_16.png" title="Хит" onclick="shopChangeProductHit(this, {echo $p->getId()});" rel="true"/>
                {else:}
                    <img src="{$SHOP_THEME}images/star_16_empty.png" title="Хит" onclick="shopChangeProductHit(this, {echo $p->getId()});" rel="false"/>
                {/if}
            </td>
			<td>
                {if $p->getHot() == true}
                    <img src="{$SHOP_THEME}images/hot_16.png" title="Новинка" onclick="shopChangeProductHot(this, {echo $p->getId()});" rel="true"/>
                {else:}
                    <img src="{$SHOP_THEME}images/hot_16_empty.png" title="Новинка" onclick="shopChangeProductHot(this, {echo $p->getId()});" rel="false"/>
                {/if}
            </td>
			<td>
                {if $p->getAction() == true}
                    <img src="{$SHOP_THEME}images/action_16.png" title="Акция" onclick="shopChangeProductAction(this, {echo $p->getId()});" rel="true"/>
                {else:}
                    <img src="{$SHOP_THEME}images/action_16_empty.png" title="Акция" onclick="shopChangeProductAction(this, {echo $p->getId()});" rel="false"/>
                {/if}
            </td>
            <td>
                {if sizeof($variants) == 1}
                    {echo $variants[0]->getPrice()} {$CS}
                {else:}
                    <img src="{$SHOP_THEME}images/arrow-315.png" title="Посмотреть варианты"  onclick="showVariantsWindow('vBlock{echo $p->getId()}');"/>
                    <div style="display:none;">
                    <div id="vBlock{echo $p->getId()}">
                        <table width="100%" cellpadding="3" cellspacing="2">
                        <thead>
                            <th>Название</th>
                            <th>Цена</th>
                        </thead>
                        <tbody>
                            {foreach $variants as $v}
                            <tr>
                                <td>{echo $v->getName()}</td>
                                <td>{echo $v->getPrice()} {$CS}</td>
                            </tr>
                            {/foreach}
                        </tbody>
                        </table>
                    </div>
                    </div>
                {/if}
            </td>
			<td>
                <img 
                onclick="confirm_delete_product({echo $p->getId()}, {echo $model->getId()});"
                src="{$THEME}/images/delete.png"  
                style="cursor:pointer;width:16px;height:16px;" title="Удалить" /> 
            </td>
		</tr>
        {/foreach}
			</tbody>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
                                        <td></td>
					<td></td>
                </tr>
			</tfoot>
		  </table>
</div>

<div style="float:right;padding:10px 10px 0 0" class="pagination">
        {$pagination}
</div>

<div style="padding:10px 10px 0 20px;">
    <b>Всего товаров:</b> {$totalProducts}
</div>

<div class="footer_panel" align="right" id="productsListFooter" style="display:none;">
    <input id="footerImageButton" class="Arrow" value="&nbsp;" type="button" onclick="shopProductsList_showMoveWindow('{echo $category->getId()}');" title="Переместить">
    <input id="footerImageButton" class="Clone" value="&nbsp;" type="button" onclick="shopProductsList_Clone('{echo $category->getId()}');" title="Создать копию">
    <input id="footerImageButton" class="Tick" value="&nbsp;" type="button" onclick="shopProductsList_changeActive('{echo $CI->uri->uri_string()}');" title="Изменить 'Активен'">
    <input id="footerImageButton" class="Star" value="&nbsp;" type="button" onclick="shopProductsList_changeHit('{echo $CI->uri->uri_string()}');" title="Изменить 'Хит'">
	<input id="footerImageButton" class="Hot" value="&nbsp;" type="button" onclick="shopProductsList_changeHot('{echo $CI->uri->uri_string()}?{http_build_query(ShopCore::$_GET)}');" title="Изменить 'Новинка'">
	<input id="footerImageButton" class="Action" value="&nbsp;" type="button" onclick="shopProductsList_changeAction('{echo $CI->uri->uri_string()}?{http_build_query(ShopCore::$_GET)}');" title="Изменить 'Акция'">
    <input type="button" id="footerButtonRed" name="_delete" value="Удалить" onclick="shopProductsList_Delete('{echo $category->getId()}');" class="active">
</div>

{literal}
    <script type="text/javascript">
        window.addEvent('domready', function(){
            shopProductsTable = new sortableTable('ShopProductsHtmlTable', {overCls: 'over', sortOn: -1 ,onClick: function(){}});
            shopProductsTable.altRow();
        });

        function shopProductsList_moveProducts(categoryId)
        {
            var ids = shopProductsList_GetSelectedIds();
            start_ajax();
            var req = new Request.HTML({
                method: 'post',
                url: shop_url + 'products/ajaxMoveProducts',
                onComplete: function(response) {
                    stop_ajax();
                    // Redirect to current category
                    ajaxShop('products/index/{/literal}{echo $category->getId()}{literal}');
                    MochaUI.closeWindow($('productsListMoveWindow'));
                }
            }).post({'ids': ids, 'categoryId': categoryId});
        }
    </script>
{/literal}
