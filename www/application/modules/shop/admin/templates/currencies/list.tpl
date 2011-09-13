<div class="saPageHeader">
    <h2>Редактирование валют</h2>
</div>

{if sizeof($model)==0}
    <div id="notice" style="width: 500px; ">Список валют пустой.
        <a href="#" onclick="ajaxShop('currencies/create'); return false;">Создать.</a>
    </div>

    {return}
{/if}

<div id="sortable">
		  <table id="ShopCurrenciesTable">
		  	<thead>
                <th width="5px">ID</th>
                <th>Название</th>
                <th>ISO Код</th>
                <th>Символ</th>
                <th width="60px"></th>
			</thead>
			<tbody>
		{foreach $model as $c}
		<tr id="currencyRow{echo $c->getId()}">
			<td>{echo $c->getId()}</td>
			<td  onclick="javascript:ajaxShop('currencies/edit/{echo $c->getId()}');">{echo ShopCore::encode($c->getName())}</td>
			<td>{echo ShopCore::encode($c->getCode())}</td>
			<td>{echo ShopCore::encode($c->getSymbol())}</td>

            <td>
                {if $c->getIsDefault() == true}
                <img src="{$SHOP_THEME}images/currency.png" width="16" height="16" title="По умолчанию" />
                {else:}
                <img onClick="makeCurrencyDefault({echo $c->getId()});" src="{$SHOP_THEME}images/currency-silver.png"  style="cursor:pointer" width="16" height="16" title="По умалчанию" />
                {/if}
                
                {if $c->getMain() == true}
                <img src="{$SHOP_THEME}images/marker.png" width="16" height="16" title="Главная валюта" />
                {else:}
                <img  onClick="makeCurrencyMain({echo $c->getId()});" src="{$SHOP_THEME}images/marker-silver.png"  style="cursor:pointer" width="16" height="16" title="Главная валюта" />
                {/if}

                <img onclick="confirm_shop_delete_currency({echo $c->getId()});" src="{$THEME}/images/delete.png"  style="cursor:pointer" width="16" height="16" title="Удалить" /></td>
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
                </tr>
			</tfoot>
		  </table>
</div>

{literal}
		<script type="text/javascript">
			window.addEvent('domready', function(){
				var ShopCurrenciesTable = new sortableTable('ShopCurrenciesTable', {overCls: 'over', sortOn: -1 ,onClick: function(){}});
                ShopCurrenciesTable.altRow();
			});

            function confirm_shop_delete_currency(id)
            {
                alertBox.confirm('<h1>Удалить валюту ID: ' + id + '? </h1>', {onComplete:
                    function(returnvalue) {
                        if(returnvalue)
                        {
                            $('currencyRow' + id).setStyle('background-color','#D95353');
                            var req = new Request.HTML({
                                method: 'post',
                                url: shop_url + 'currencies/delete',
                                evalResponse: true,
                                onComplete: function(response) {  
                                    $('currencyRow' + id).dispose();
                                    if ($$('#ShopCurrenciesTable tbody tr').length == 0)
                                    {
                                        ajaxShop('currencies/index'); 
                                    }
                                }
                            }).post({'id': id});
                        }
                    }
                });
            }

            function makeCurrencyDefault(id)
            {
                var req = new Request.HTML({
                    method: 'post',
                    url: shop_url + 'currencies/makeCurrencyDefault',
                    evalResponse: true,
                    onComplete: function(response) {  
                            ajaxShop('currencies/index'); 
                    }
                }).post({'id': id});
            }

            function makeCurrencyMain(id)
            {
                alertBox.confirm('<h1>Пересчитать цены?</h1>', {onComplete:
                    function(returnvalue) {
                        if(returnvalue)
                        {
                            var recount = 1;
                        }else{
                            var recount = 0;
                        }
                        
                        var req = new Request.HTML({
                            method: 'post',
                            url: shop_url + 'currencies/makeCurrencyMain',
                            evalResponse: true,
                            onComplete: function(response) {  
                                    ajaxShop('currencies/index');
                            }
                        }).post({'id': id,'recount': recount});
                    }
                });
            }

        </script>
{/literal}
