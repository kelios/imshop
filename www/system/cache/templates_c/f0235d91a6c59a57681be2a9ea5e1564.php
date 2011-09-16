<?php include ('Y:\home\imshop\www\application\libraries\mabilis/functions/func.truncate.php');  ?><div class="saPageHeader" style="float:left;width:100%;">
    <div style="float:right;padding-top:2px;margin-right:5px;position:relative;" onsubmit="return false;">
        <form action="<?php if(isset($ADMIN_URL)){ echo $ADMIN_URL; } ?>search/index/" method="get">
        <input type="hidden" value="<?php echo $model->getId() ?>" name="CategoryId">
            <input type="text" name="text" class="textbox_long" />
            <input type="submit" value="Искать" class="search_submit" name="_search" onclick="ajaxShopForm(this, 'shopAdminPage');" />
        </form>
    </div>

    <div style="float:right;padding:6px 10px 0 0">
           <input type="button" class="button_silver_130" value="Создать товар" onclick="ajaxShop('products/create');"/>
    </div>

    <h2>Просмотр товаров категории "<?php  echo func_truncate (ShopCore::encode($model->getName()),60);  ?>"</h2>
</div>

<?php if($totalProducts == 0): ?>
    <div id="notice" style="width: 500px; margin-top:50px;">В категории нет товаров.
        <a href="#" onclick="ajaxShop('products/create'); return false;">Создать.</a>
    </div>
    <?php return ?>
<?php endif; ?>

<div id="sortable" style="clear:both;"> 
		  <table id="ShopProductsHtmlTable">
		  	<thead>
                <th width="1px"><input type="checkbox" onclick="ShopSwitchChecks(this);"/></th>
                <th title="Сортировка по Id" width="5px" <?php if($orderField == 'Id'): ?>
				<?php if($nextOrderCriteria == 'ASC'): ?>class="tableHeaderOver sortedDESC"<?php else: ?>
				<?php if($nextOrderCriteria == 'DESC'): ?>class="tableHeaderOver sortedASC"<?php endif; ?><?php endif; ?><?php else: ?>class="tableHeaderOver"<?php endif; ?> 
				onclick="ajaxShop('products/index/<?php echo $model->getId() ?>/offset/Id/<?php if($orderField == 'Id'): ?><?php if($nextOrderCriteria == 'ASC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php else: ?>DESC<?php endif; ?>'); return false;">ID</th>
                <th title="Сортировка по Названию" <?php if($orderField == 'Name'): ?>
				<?php if($nextOrderCriteria == 'ASC'): ?>class="tableHeaderOver sortedDESC"<?php else: ?>
				<?php if($nextOrderCriteria == 'DESC'): ?>class="tableHeaderOver sortedASC"<?php endif; ?><?php endif; ?><?php else: ?>class="tableHeaderOver"<?php endif; ?> 
				onclick="ajaxShop('products/index/<?php echo $model->getId() ?>/offset/Name/<?php if($orderField == 'Name'): ?><?php if($nextOrderCriteria == 'ASC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php else: ?>DESC<?php endif; ?>'); return false;">Название</th>
                <th width="18px"></th>
                <th width="18px"></th>
				<th width="18px"></th>
				<th width="18px"></th>
                <th title="Сортировка по Цене" width="100px" <?php if($orderField == 'Price'): ?>
				<?php if($nextOrderCriteria == 'ASC'): ?>class="tableHeaderOver sortedDESC"<?php else: ?>
				<?php if($nextOrderCriteria == 'DESC'): ?>class="tableHeaderOver sortedASC"<?php endif; ?><?php endif; ?><?php else: ?>class="tableHeaderOver"<?php endif; ?> 
				onclick="ajaxShop('products/index/<?php echo $model->getId() ?>/offset/Price/<?php if($orderField == 'Price'): ?><?php if($nextOrderCriteria == 'ASC'): ?>ASC<?php else: ?>DESC<?php endif; ?><?php else: ?>DESC<?php endif; ?>'); return false;">Цена</a></th>
                <th width="5px"></th>
			</thead>
			<tbody>
        <?php if(is_true_array($products)){ foreach ($products as $p){ ?>
        <?php $variants = $p->getProductVariants() ?>
		<tr id="productRow<?php echo $p->getId() ?>" class="row">
            <td width="1px"><input type="checkbox" class="chbx" rel="<?php echo $p->getId() ?>" onclick="productsListcheckForChecked();"/></td>
			<td><?php echo $p->getId() ?></td>
			<td>
                <a id="editProductLink<?php echo $p->getId() ?>" href="#"
                <?php if($p->getActive() == false): ?> class="productNotActivated" <?php endif; ?>
                onClick="ajaxShop('products/edit/<?php echo $p->getId() ?>?redirect=<?php  echo base64_encode (ShopCore::$ci->uri->uri_string());  ?>'); return false;"><?php  echo func_truncate (ShopCore::encode($p->getName()),100);  ?></a>
            </td>
            <td>
                <?php if($p->getActive() == true): ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/tick_16.png" title="Активен" onclick="shopChangeProductActive(this, <?php echo $p->getId() ?>);" rel="true"/>
                <?php else: ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/tick_16_empty.png"  title="Активен" onclick="shopChangeProductActive(this, <?php echo $p->getId() ?>);" rel="false"/>
                <?php endif; ?>
            </td>
            <td>
                <?php if($p->getHit() == true): ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/star_16.png" title="Хит" onclick="shopChangeProductHit(this, <?php echo $p->getId() ?>);" rel="true"/>
                <?php else: ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/star_16_empty.png" title="Хит" onclick="shopChangeProductHit(this, <?php echo $p->getId() ?>);" rel="false"/>
                <?php endif; ?>
            </td>
			<td>
                <?php if($p->getHot() == true): ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/hot_16.png" title="Новинка" onclick="shopChangeProductHot(this, <?php echo $p->getId() ?>);" rel="true"/>
                <?php else: ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/hot_16_empty.png" title="Новинка" onclick="shopChangeProductHot(this, <?php echo $p->getId() ?>);" rel="false"/>
                <?php endif; ?>
            </td>
			<td>
                <?php if($p->getAction() == true): ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/action_16.png" title="Акция" onclick="shopChangeProductAction(this, <?php echo $p->getId() ?>);" rel="true"/>
                <?php else: ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/action_16_empty.png" title="Акция" onclick="shopChangeProductAction(this, <?php echo $p->getId() ?>);" rel="false"/>
                <?php endif; ?>
            </td>
            <td>
                <?php if(sizeof($variants) == 1): ?>
                    <?php echo $variants[0]->getPrice() ?> <?php if(isset($CS)){ echo $CS; } ?>
                <?php else: ?>
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/arrow-315.png" title="Посмотреть варианты"  onclick="showVariantsWindow('vBlock<?php echo $p->getId() ?>');"/>
                    <div style="display:none;">
                    <div id="vBlock<?php echo $p->getId() ?>">
                        <table width="100%" cellpadding="3" cellspacing="2">
                        <thead>
                            <th>Название</th>
                            <th>Цена</th>
                        </thead>
                        <tbody>
                            <?php if(is_true_array($variants)){ foreach ($variants as $v){ ?>
                            <tr>
                                <td><?php echo $v->getName() ?></td>
                                <td><?php echo $v->getPrice() ?> <?php if(isset($CS)){ echo $CS; } ?></td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
                <?php endif; ?>
            </td>
			<td>
                <img 
                onclick="confirm_delete_product(<?php echo $p->getId() ?>, <?php echo $model->getId() ?>);"
                src="<?php if(isset($THEME)){ echo $THEME; } ?>/images/delete.png"  
                style="cursor:pointer;width:16px;height:16px;" title="Удалить" /> 
            </td>
		</tr>
        <?php }} ?>
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
        <?php if(isset($pagination)){ echo $pagination; } ?>
</div>

<div style="padding:10px 10px 0 20px;">
    <b>Всего товаров:</b> <?php if(isset($totalProducts)){ echo $totalProducts; } ?>
</div>

<div class="footer_panel" align="right" id="productsListFooter" style="display:none;">
    <input id="footerImageButton" class="Arrow" value="&nbsp;" type="button" onclick="shopProductsList_showMoveWindow('<?php echo $category->getId() ?>');" title="Переместить">
    <input id="footerImageButton" class="Clone" value="&nbsp;" type="button" onclick="shopProductsList_Clone('<?php echo $category->getId() ?>');" title="Создать копию">
    <input id="footerImageButton" class="Tick" value="&nbsp;" type="button" onclick="shopProductsList_changeActive('<?php echo $CI->uri->uri_string() ?>');" title="Изменить 'Активен'">
    <input id="footerImageButton" class="Star" value="&nbsp;" type="button" onclick="shopProductsList_changeHit('<?php echo $CI->uri->uri_string() ?>');" title="Изменить 'Хит'">
	<input id="footerImageButton" class="Hot" value="&nbsp;" type="button" onclick="shopProductsList_changeHot('<?php echo $CI->uri->uri_string() ?>?<?php  echo http_build_query (ShopCore::$_GET);  ?>');" title="Изменить 'Новинка'">
	<input id="footerImageButton" class="Action" value="&nbsp;" type="button" onclick="shopProductsList_changeAction('<?php echo $CI->uri->uri_string() ?>?<?php  echo http_build_query (ShopCore::$_GET);  ?>');" title="Изменить 'Акция'">
    <input type="button" id="footerButtonRed" name="_delete" value="Удалить" onclick="shopProductsList_Delete('<?php echo $category->getId() ?>');" class="active">
</div>
    <script type="text/javascript">
        window.addEvent('domready', function(){ 
            shopProductsTable = new sortableTable('ShopProductsHtmlTable', { overCls: 'over', sortOn: -1 ,onClick: function(){  } });
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
                    ajaxShop('products/index/<?php echo $category->getId() ?>');
                    MochaUI.closeWindow($('productsListMoveWindow'));
                 }
             }).post({ 'ids': ids, 'categoryId': categoryId });
         }
    </script>

<?php $mabilis_ttl=1316157712; $mabilis_last_modified=1308233576; //Y:\home\imshop\www\/application/modules/shop/admin\templates\products\list.tpl ?>