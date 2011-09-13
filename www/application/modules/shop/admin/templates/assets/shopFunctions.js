
var shop_url = base_url + 'admin/components/run/shop/';
var admin_theme_url = base_url + 'application/modules/shop/admin/templates/assets/';
var shopAdminMenuCache = false;
var shopAdminLoaded = false;

// TODO: Put all css code to css file.
window.addEvent('domready', function(){
    // Create switcher html code
    var shopSwitcher = new Element('div', {id: 'shopSwitcher',style: 'float:right;'}); 
    var switcherCode =  '<a href="" id="linkAdminShop" onClick="javascript:loadShopInterface(); return false;">Администрировать магазин →</a>'+
                        '<a href="" style="display:none;" id="linkAdminSystem" onClick="javascript:restoreAdminInterface(); return false;">← Назад к системе</a>';
    shopSwitcher.set('html',switcherCode);
    shopSwitcher.inject($('spinner2'), 'after');

    // Create shopAdminPage block where we'll load content.
    var shopAdminPage = new Element('div', {id: 'shopAdminPage', style: 'display:none;background-color:#F8F8F8;overflow-x:auto;overflow-y:auto;height:100%;'});

    // Inject shop navigation
    var shopNaviBlock = new Element('div', {id: 'shopTopNav',style: 'position: absolute;left: 250px;top: 0;color: #b2b2b2;text-align: center;padding: 15px 0px 0 0;'});
    var shopNaviCode = '<ul class="menu-right">' +
            '<li>' +
            '    <img src="/templates/administrator/images/left.png" style="cursor:pointer" width="16" height="16"  onclick="ShopHistory_back();">' +
			'	<img src="/templates/administrator/images/right.png" style="cursor:pointer" width="16" height="16" onclick="ShopHistory_forward();">' +
			'	<img src="/templates/administrator/images/refresh.png" style="cursor:pointer" width="16" height="16" onclick="ShopHistory_refresh();">' +
            '</li>' +
			'</ul>';
    shopNaviBlock.set('html',shopNaviCode);
    shopNaviBlock.inject($('topNav'), 'after');

    // Inject it after main "page" block
    shopAdminPage.inject($('page'), 'after');

    loadShopInterface();
    setTimeout("loadShopSidebarCats()", 1800);
});

/**
 * Load shop main menu and sidebar categories list. 
 * 
 * @access public
 * @return void
 */
function loadShopInterface()
{
    $('cmsLogo').removeEvents('click');
    $('cmsLogo').addEvent('click', function() {
       ajaxShop('orders/index');  
    }); 

    // Hide system menu
    var mainSystemMenu = $('desktopNavbar').getFirst('ul');
    mainSystemMenu.setStyle('display','none');

    // Hide system navigation (prev,next,refresh)
    $('topNav').setStyle('display','none');
    $('shopTopNav').setStyle('display','block');

    // Load and set shop menu
    if (shopAdminMenuCache == false)
    {
        var shopAdminMainMenu = new Element('div', {id: 'shopAdminMainMenu', style: 'display:block;'});
        shopAdminMainMenu.load('/application/modules/shop/admin/templates/shopMainMenu.html');
        shopAdminMainMenu.inject('desktopNavbar');
        shopAdminMenuCache = true;
    }else{
        $('shopAdminMainMenu').setStyle('display', 'block');
    }

    // Hide linkAdminShop 
    $('linkAdminShop').setStyle('display', 'none');
    // Show linkAdminSystem
    $('linkAdminSystem').setStyle('display', 'block');

    // Hide "page" block
    $('page').setStyle('display', 'none'); 

    // Show shopAdminPage
    $('shopAdminPage').setStyle('display', 'block');  

    // Load in sidebar shop categories list
    // Load shop dashboard
    
    // Load admin dashboard only first time,
    if (shopAdminLoaded == false)
    {
        // Load orders list.
        ajaxShop('orders/index');
        shopAdminLoaded = true;
    }

    loadShopSidebarCats(); 
}

/**
 * restoreAdminInterface 
 * 
 * @access public
 * @return void
 */
function restoreAdminInterface()
{
    $('cmsLogo').removeEvents('click');

    // Show system navigation (prev,next,refresh)
    $('topNav').setStyle('display','block');
    $('shopTopNav').setStyle('display','none');

    // Show linkAdminShop 
    $('linkAdminShop').setStyle('display', 'block');
    // Hide linkAdminSystem
    $('linkAdminSystem').setStyle('display', 'none');

    // Show "page" block
    $('page').setStyle('display', 'block');

    // Hide shopAdminPage
    $('shopAdminPage').setStyle('display', 'none');

    // Show system menu
    var mainSystemMenu = $('desktopNavbar').getFirst('ul');
    mainSystemMenu.setStyle('display','block');

    // Hide shop menu
    $('shopAdminMainMenu').setStyle('display','none');

    // Load system categories
    ajax_div('categories',base_url + 'admin/categories/update_block/');
}

/**
 * Save categories positions. (category list view)
 */
function SaveCategoriesPositions()
{
    var item_pos = new Array();

    var items = $('ShopCatsHtmlTable').getElements('input');
    items.each(function(el,i){
            if(el.hasClass('SCategoryPos')) 
            {
                id = el.id;
                val = el.value;
                new_pos = id + '_' + val;
                item_pos.include( new_pos );
            }  
            });

    var req = new Request.HTML({
       method: 'post',
       url: shop_url + 'categories/save_positions',
       onRequest: function() { },
       onComplete: function(response) { 
            // Update list
            ajaxShop('categories/c_list');
       }
    }).post({'positions': item_pos });
}

/**
 * Save categories positions. (category list view)
 */
function SavePropertiesPositions()
{
    var item_pos = new Array();

    var items = $('ShopProductsPropertiesHtmlTable').getElements('input');
    items.each(function(el,i){
            if(el.hasClass('SPropertyPos'))
            {
                id = el.id;
                val = el.value;
                new_pos = id + '_' + val;
                item_pos.include( new_pos );
            }
            });

    var req = new Request.HTML({
       method: 'post',
       url: shop_url + 'properties/savePositions',
       onRequest: function() { },
       onComplete: function(response) {
            // Update list
            ajaxShop('properties/index');
       }
    }).post({'positions': item_pos });
}

/**
 * Load shop categories into sidebar.
 */
function loadShopSidebarCats()
{
    ajax_div('categories', shop_url + 'ajaxCategoriesTree');
}

function ajaxShop(url)
{
    ShopHistory('shopAdminPage',shop_url + url);
    ajax_div('shopAdminPage', shop_url + url);
}

/**
 * Submit form from one of footer buttons.
 */
function ajaxShopForm(button, updateBlockId)
{
    var form = button.form;

    if (button.name)
    {
        var hiddenElement = new Element('input', {type: 'hidden',name: button.name,value: 1});
        hiddenElement.inject($(form));
    }

    $(form).addEvent('submit', function(event) {
        event.stop();

        $(form).getElements('input[type=submit]').each(function(number){
            number.disabled = true;
        }); 

        if (!updateBlockId)
        {
            var req = new Request.HTML({
                method: $(form).get('method'),
                url: $(form).get('action'),
                onRequest: function() { start_ajax(); },
                onFailure: function() { },
                onSuccess: function() { },
                onComplete: function(response) { my_alert(form); }
            }).send($(form));
        }else{
            var req = new Request.HTML({
                method: $(form).get('method'),
                url: $(form).get('action'),
                update: $(updateBlockId),
                onRequest: function() { start_ajax(); },
                onFailure: function() { },
                onSuccess: function() { },
                onComplete: function(response) { my_alert(form); }
            }).send($(form));
        }


        hiddenElement.destroy();
    });
}

function preview_shop_image(image_name)
{
    $('imagePreviewBox').setStyle('display', 'block');
    $('imagePreviewBoxImage').set('src','/uploads/shop/' + image_name + '?' + Math.floor(Math.random()*9999));    
}

function nl2br(text){
    text = escape(text);
    if(text.indexOf('%0D%0A') > -1){
        re_nlchar = /%0D%0A/g ;
    }else if(text.indexOf('%0A') > -1){
        re_nlchar = /%0A/g ;
    }else if(text.indexOf('%0D') > -1){
        re_nlchar = /%0D/g ;
    }
    return unescape( text.replace(re_nlchar,'<br />') );
}

function shopLoadProperiesByCategory(selectBox, productId)
{
    if (productId > 0) {
        var productId = '/' + productId;
    }else{
        var productId = '';
    }

    var req = new Request.HTML({
            method: 'post',
            url: shop_url + 'properties/renderForm/' + selectBox.value + productId,
            update: 'productPropertiesContainer',
            onRequest: function() { start_ajax(); },
            onFailure: function() { },
            onSuccess: function() { },
            onComplete: function(response) { stop_ajax(); }
        }).send();  
}

function shopLoadProperiesByCategoryInSearch(selectBox)
{
    var req = new Request.HTML({
            method: 'post',
            url: shop_url + 'search/renderCustomFields/' + selectBox.value,
            update: 'productPropertiesContainer',
            onRequest: function() { start_ajax(); },
            onFailure: function() { },
            onSuccess: function() { },
            onComplete: function(response) { stop_ajax(); }
        }).send();
}

function filterPropertiesByCategory(selectBox)
{
    ajaxShop('properties/index/' + selectBox.value); 
}

function confirm_shop_delete_property(id)
{
    alertBox.confirm('<h1>Удалить свойство ID: ' + id + '? </h1>', {onComplete:
        function(returnvalue) {
            if(returnvalue)
            {
                $('prop' + id).setStyle('border','2px solid #D95353');
                start_ajax();
                var req = new Request.HTML({
                    method: 'post',
                    url: shop_url + 'properties/delete',
                    evalResponse: true,
                    onComplete: function(response) {
                        $('prop' + id).dispose();

                          if ($$('#ShopProductsPropertiesHtmlTable tbody tr').length == 0)
                        {
                            ajaxShop('properties/index');
                        }
                        stop_ajax();
                    }
                }).post({'id': id});
            }
        }
    });
}

/***** Orders list functions *****/
function confirm_delete_order(id,status)
{
    if (!status)
    {
        status = 0;
    }

    alertBox.confirm('<h1>Удалить заказ ID: ' + id + '? </h1>', {onComplete:
        function(returnvalue) {
            if(returnvalue)
            {
                $('orderId' + id).setStyle('border','2px solid #D95353'); 
                start_ajax();
                var req = new Request.HTML({
                    method: 'post',
                    url: shop_url + 'orders/delete',
                    evalResponse: true,
                    onComplete: function(response) {  
                        $('orderId' + id).dispose();

                        if ($$('.orderItem').length == 0)
                        {
                            ajaxShop('orders/index?status=' + status);
                        }
                        stop_ajax();
                    }
                }).post({'orderId': id});
            }
        }
    });
}

function moveToInProgress(id)
{
    $('orderId' + id).setStyle('border','2px solid #B0D736'); 
    start_ajax();
    var req = new Request.HTML({
        method: 'post',
        url: shop_url + 'orders/changeStatus',
        evalResponse: true,
        onComplete: function(response) {  
            $('orderId' + id).dispose();
            stop_ajax();
            if ($$('.orderItem').length == 0)
            {
                ajaxShop('orders/index');
            }
        }
    }).post({'orderId': id,'status': 'progress'});

}

function moveToCompleted(id)
{
    $('orderId' + id).setStyle('border','2px solid #B0D736'); 
    start_ajax();
    var req = new Request.HTML({
        method: 'post',
        url: shop_url + 'orders/changeStatus',
        evalResponse: true,
        onComplete: function(response) {  
            $('orderId' + id).dispose();
            stop_ajax();
            if ($$('.orderItem').length == 0)
            {
                ajaxShop('orders/index?status=1');
            }
        }
    }).post({'orderId': id,'status': 'completed'});
}

/**
 * change paid status on orders list
 */
function changePaid(el, id)
{
    start_ajax();
    var req = new Request.HTML({
        method: 'post',
        url: shop_url + 'orders/changePaid',
        onComplete: function(responseTree, responseElements, responseHTML, responseJavaScript) {  
            if (responseHTML == 1)
            {
                el.src = '/application/modules/shop/admin/templates/assets/images/credit-card.png';
            }else{
                el.src = '/application/modules/shop/admin/templates/assets/images/credit-card-silver.png';
            }
            stop_ajax();
        }
    }).post({'orderId': id});
}

/*** Edit/create product functions ***/
function load_table_sorter()
{
    var sorter = new Sortables('#variantsTable tbody',{
        handle: 'img.drager',
        onStart: function(el) { 
            el.setStyle('background','#add8e6');
        },
        onComplete: function(el) {
            el.setStyle('background','#EBEBEB');
        },
    });

    sorter.removeItems($('mainVariant'));
}

/**
 * Insert new variant row in variants table. create/edit products
 */
function cloneVariant()
{
    var newVariant = $('productVariant').clone();

    newVariantId = newVariantId + 1;
    var fullId ='productVariantRow_' + newVariantId; 

    newVariant.set('id', fullId);
    newVariant.inject('variantsBlock','bottom');

    var result = $$('#' + fullId + ' img.deleter');
    result.addEvent('click', function() {
        deleteVariant(fullId);
    }); 

    // Reload Sortable
    load_table_sorter();
}


// Clone warehouse row at product edit/create tpl
function cloneWarehouseVariant()
{
    var newWVariant = $('warehouse_line').clone();
    var fullWId ='warehouseRow_' + Math.random(); 
    newWVariant.set('id', fullWId);
    newWVariant.inject('warehouses_container','bottom'); 
    newWVariant.inject('warehouses_container','bottom');
}

// Delete product variant row.
function deleteVariant(id)
{
    if ($$('.variantsList tbody tr').length == 1)
    {
        showMessage(' ', 'Ошибка удаления варианта.');
        return false;
    }
    $(id).dispose(); 
}

// Callback function to post form
function uploadCallback()
{
    var imgIFrame = document.getElementById('upload_target');  
    var data = imgIFrame.contentWindow.document.body.innerHTML;

    var result_arr = JSON.decode(data); 
    
    if (result_arr.error)
    {
        showMessage('Ошибка', nl2br(result_arr.error));
    }
    if (result_arr.ok)
    {
        showMessage('Сообщение:', 'Изменения сохранены');
        var redirect_url = result_arr.redirect_url;
        ajaxShop(redirect_url.replace(/\&amp\;/g,'&'));
    }
}

function deleteAdditionalImage(position)
{
    var injector = new Element('input', {
        type: 'hidden',
        name: 'imagesForDelete[]',
        value: position,
        }); 
    injector.inject($('image_upload_form'));
    $('additionalImagePrevLink'+position).destroy();
}

// Begin products list functions
function showVariantsWindow(vid)
{
    content = $(vid).clone();

    new MochaUI.Window({
        id: 'viewVariantsWindow',
        title: 'Варианты продукта',
        loadMethod: 'html',
        content:content,
        minimizable:false,
        maximizable:false,
        width: 490,
        height: 190
    });
}

// Show confirm message
function confirm_delete_product(id, category_id)
{
    alertBox.confirm('<h1>Удалить товар ID: ' + id + '? </h1>', {onComplete:
        function(returnvalue) {
            if(returnvalue)
            {
                $('productRow' + id).setStyle('background-color','#D95353');

                var req = new Request.HTML({
                    method: 'post',
                    url: shop_url + 'products/delete',
                    evalResponse: true,
                    onComplete: function(response) {
                        $('productRow' + id).dispose();
                        if ($$('#ShopProductsHtmlTable tbody tr').length == 0)
                        {
                            ajaxShop('products/index/' + category_id);
                        }
                    }
                }).post({'productId': id});
            }
        }
    });
}

// Check or uncheck all product in the list.
function ShopSwitchChecks(el)
{
    if (el.checked == true){
        productsListcheck_all();
    }else{
        productsListuncheck_all();
    }

    productsListcheckForChecked();
}

// Show footer actions panel if some products selected.
function productsListcheckForChecked()
{
    var selected = 0;
    var items = $$('#ShopProductsHtmlTable input');
    items.each(function(el,i) {
        if(el.hasClass('chbx') && el.checked == true)
        {
            selected = selected + 1;
        }
    });

    if (selected > 0)
    {
        $('productsListFooter').setStyle('display','block');
    }else{
        $('productsListFooter').setStyle('display','none');
    }
}

// Check all products in the list
function productsListcheck_all()
{
    var items = $('ShopProductsHtmlTable').getElements('input');
    items.each(function(el,i){
    if(el.hasClass('chbx'))
    {
        el.checked = true;
    }
    });
}

// Uncheck all products in the list
function productsListuncheck_all()
{
    var items = $('ShopProductsHtmlTable').getElements('input');
    items.each(function(el,i){
    if(el.hasClass('chbx'))
    {
        el.checked = false;
    }
    });
}

// Change active status for one product in the list.
function shopChangeProductActive(el, productId)
{
    var currentActiveStatus = el.get('rel');

    var req = new Request.HTML({
            method: 'post',
            url: shop_url + 'products/ajaxChangeActive/' + productId,
            onRequest: function() {
                start_ajax();
            },
            onFailure: function() { },
            onSuccess: function() {
                if(currentActiveStatus=='true')
                {
                    el.set('src', admin_theme_url + 'images/tick_16_empty.png');
                    el.set('rel', 'false');
                    $('editProductLink' + productId).addClass('productNotActivated');
                }else{
                    el.set('src', admin_theme_url + 'images/tick_16.png');
                    el.set('rel', 'true');
                    $('editProductLink' + productId).removeClass('productNotActivated');
                }
            },
            onComplete: function(response) { stop_ajax(); }
    }).send();
}

// Change hit status for one product in the list.
function shopChangeProductHit(el, productId)
{
    var currentHitStatus = el.get('rel');

    var req = new Request.HTML({
            method: 'post',
            url: shop_url + 'products/ajaxChangeHit/' + productId,
            onRequest: function() {
                start_ajax();
            },
            onFailure: function() { },
            onSuccess: function() {
                if(currentHitStatus=='true')
                {
                    el.set('src', admin_theme_url + 'images/star_16_empty.png');
                    el.set('rel', 'false');
                }else{
                    el.set('src', admin_theme_url + 'images/star_16.png');
                    el.set('rel', 'true');
                }
            },
            onComplete: function(response) { stop_ajax(); }
    }).send();
}

// Change hot status for one product in the list.
function shopChangeProductHot(el, productId)
{
    var currentHotStatus = el.get('rel');

    var req = new Request.HTML({
            method: 'post',
            url: shop_url + 'products/ajaxChangeHot/' + productId,
            onRequest: function() {
                start_ajax();
            },
            onFailure: function() { },
            onSuccess: function() {
                if(currentHotStatus=='true')
                {
                    el.set('src', admin_theme_url + 'images/hot_16_empty.png');
                    el.set('rel', 'false');
                }else{
                    el.set('src', admin_theme_url + 'images/hot_16.png');
                    el.set('rel', 'true');
                }
            },
            onComplete: function(response) { stop_ajax(); }
    }).send();
}

// Change action status for one product in the list.
function shopChangeProductAction(el, productId)
{
    var currentActionStatus = el.get('rel');

    var req = new Request.HTML({
            method: 'post',
            url: shop_url + 'products/ajaxChangeAction/' + productId,
            onRequest: function() {
                start_ajax();
            },
            onFailure: function() { },
            onSuccess: function() {
                if(currentActionStatus=='true')
                {
                    el.set('src', admin_theme_url + 'images/action_16_empty.png');
                    el.set('rel', 'false');
                }else{
                    el.set('src', admin_theme_url + 'images/action_16.png');
                    el.set('rel', 'true');
                }
            },
            onComplete: function(response) { stop_ajax(); }
    }).send();
}

// Get ids of selected products
function shopProductsList_GetSelectedIds()
{
    var items = $$('#ShopProductsHtmlTable input');
    var ids = new Array;
    items.each(function(el,i) {
        if(el.hasClass('chbx') && el.checked == true)
        {
            var pId = el.get('rel');
            ids[pId] = pId;
        }
    });

    return ids;
}

// Collect selected products and change activr status.
function shopProductsList_changeActive(redirectBackUrl)
{
    var ids = shopProductsList_GetSelectedIds();
    start_ajax();
    var req = new Request.HTML({
        method: 'post',
        url: shop_url + 'products/ajaxChangeActive',
        onComplete: function(response) {
            stop_ajax();
            shopProductList_redirectBackAndReselect(ids,redirectBackUrl)
        }
    }).post({'ids': ids});
}

// Collect selected products and change hit status.
function shopProductsList_changeHit(redirectBackUrl)
{
    var ids = shopProductsList_GetSelectedIds();
    start_ajax();
    var req = new Request.HTML({
        method: 'post',
        url: shop_url + 'products/ajaxChangeHit',
        onComplete: function(response) {
            stop_ajax();
            shopProductList_redirectBackAndReselect(ids,redirectBackUrl)
        }
    }).post({'ids': ids});
}

// Collect selected products and change hot status.
function shopProductsList_changeHot(redirectBackUrl)
{
    var ids = shopProductsList_GetSelectedIds();
    start_ajax();
    var req = new Request.HTML({
        method: 'post',
        url: shop_url + 'products/ajaxChangeHot',
        onComplete: function(response) {
            stop_ajax();
            shopProductList_redirectBackAndReselect(ids,redirectBackUrl)
        }
    }).post({'ids': ids});
}

// Collect selected products and change action status.
function shopProductsList_changeAction(redirectBackUrl)
{
    var ids = shopProductsList_GetSelectedIds();
    start_ajax();
    var req = new Request.HTML({
        method: 'post',
        url: shop_url + 'products/ajaxChangeAction',
        onComplete: function(response) {
            stop_ajax();
            shopProductList_redirectBackAndReselect(ids,redirectBackUrl)
        }
    }).post({'ids': ids});
}

function shopProductList_redirectBackAndReselect(ids, url)
{
    // Update block and select back checkboxes.
    var req2 = new Request.HTML({
        method: 'get',
        update: 'shopAdminPage',
        url: url,
        onComplete: function(response) {
            var items = $$('#ShopProductsHtmlTable input');
            items.each(function(el,i) {
                if(el.hasClass('chbx') && ids.contains(el.get('rel')))
                {
                    el.set('checked', true);
                }
            });

            productsListcheckForChecked();
        }
    }).send();
}

function shopProductsList_Delete(categoryId)
{
    alertBox.confirm('<h1>Удалить отмеченные товары? </h1>', {onComplete:
        function(returnvalue) {
            if(returnvalue)
            {
                var ids = shopProductsList_GetSelectedIds();
                start_ajax();
                var req = new Request.HTML({
                    method: 'post',
                    url: shop_url + 'products/ajaxDeleteProducts',
                    onComplete: function(response) {
                        stop_ajax();
                        ajaxShop('products/index/' + categoryId);
                    }
                }).post({'ids': ids});
            }
        }
    });
}

function shopProductsList_Clone(categoryId)
{
    alertBox.confirm('<h1>Создать копию товаров? </h1>', {onComplete:
        function(returnvalue) {
            if(returnvalue)
            {	
				var ids = shopProductsList_GetSelectedIds();
				start_ajax();
				var req = new Request.HTML({
					method: 'post',
					url: shop_url + 'products/ajaxCloneProducts',
					onComplete: function(response) {
						stop_ajax();
						ajaxShop('products/index/' + categoryId);
					}
				}).post({'ids': ids});
            }
        }
    });
}

function shopProductsList_showMoveWindow(categoryId)
{
   new MochaUI.Window({
        id: 'productsListMoveWindow',
        title: 'Перемещение товаров',
        type: 'modal',
        loadMethod: 'xhr',
        contentURL: shop_url + 'products/ajaxMoveWindow/' + categoryId,
        minimizable: 'false',
        maximizable: 'false',
        resizable: 'true',
        closable: 'false',
        draggable: 'true',
        width: '500',
    });
}
// End of product list function

/** Begin history functions **/
var ShopCurPos = 0;
var ShopHSteps = 0;
var ShopHistoryArr = new Array();
var ShopRefreshUrl = false;

function ShopHistory_refresh()
{
    if (ShopRefreshUrl != false)
    {
        start_ajax();
      var req = new Request.HTML({
			method: 'post',
			url: ShopRefreshUrl,
			update: 'shopAdminPage',
			evalResponse: true,
			onComplete: function(response) { stop_ajax(); }
		}).send();
    }
}

// History for page div
function ShopHistory(div,url)
{
	if(div == 'shopAdminPage')
	{
        ShopRefreshUrl = url;
		ShopHSteps = ShopHSteps + 1;
		ShopHistoryArr[ShopHSteps] = url;
	}
}

//go back
function ShopHistory_back()
{
	if(ShopCurPos > ShopHSteps)
	{
		//do something
	}else{
			ShopCurPos = ShopCurPos + 1;
			start_ajax();
			upd = ShopHSteps - ShopCurPos;
            ShopRefreshUrl = ShopHistoryArr[upd];
			var req = new Request.HTML({
			method: 'post',
			url: ShopHistoryArr[upd],
			update: 'shopAdminPage',
			evalResponse: true,
			onComplete: function(response) { stop_ajax(); }
		}).send();
	}
}

//go forward
function ShopHistory_forward()
{
	if(ShopCurPos != 0)
	{
			ShopCurPos = ShopCurPos - 1;
			upd = ShopHSteps - ShopCurPos;
            ShopRefreshUrl = ShopHistoryArr[upd];
			start_ajax();
			var req = new Request.HTML({
			method: 'post',
			url: ShopHistoryArr[upd],
			update: 'shopAdminPage',
			evalResponse: true,
			onComplete: function(response) { stop_ajax(); }
		}).send();
	}
}
/** End history functions **/
