<div class="saPageHeader">
    <h2>Редактирование скидок</h2>
</div>

{if sizeof($model)==0}
    <div id="notice" style="width: 500px; ">Список скидок пустой.
        <a href="#" onclick="ajaxShop('discounts/create'); return false;">Создать.</a>
    </div>

    {return}
{/if}

<div id="sortable">
		  <table id="ShopDiscountsTable">
		  	<thead>
                <th width="5px">ID</th>
                <th>Название</th>
                <th>Дата начала</th>
                <th>Дата окончания</th>
                <th>Активен</th>
                <th width="24px"></th>
			</thead>
			<tbody>
		{foreach $model as $c}
		<tr id="discountRow{echo $c->getId()}">
			<td>{echo $c->getId()}</td>
			<td  onclick="javascript:ajaxShop('discounts/edit/{echo $c->getId()}');">{echo ShopCore::encode($c->getName())}</td>
			<td>{echo $c->formatDateStart()}</td>
			<td>{echo $c->formatDateStop()}</td>
			<td>{if $c->getActive()==true}Да{else:}Нет{/if}</td>
            <td>
                <img onclick="confirm_shop_delete_discount({echo $c->getId()});" src="{$THEME}/images/delete.png"  style="cursor:pointer" width="16" height="16" title="Удалить" />
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
                </tr>
			</tfoot>
		  </table>
</div>

{literal}
		<script type="text/javascript">
			window.addEvent('domready', function(){
				var ShopDiscountsTable = new sortableTable('ShopDiscountsTable', {overCls: 'over', sortOn: -1 ,onClick: function(){}});
                ShopDiscountsTable.altRow();
			});

        function confirm_shop_delete_discount(id)
        {
            alertBox.confirm('<h1>Удалить бренд ID: ' + id + '? </h1>', {onComplete:
                function(returnvalue) {
                    if(returnvalue)
                    {
                        $('discountRow' + id).setStyle('background-color','#D95353');
                        var req = new Request.HTML({
                            method: 'post',
                            url: shop_url + 'discounts/delete',
                            evalResponse: true,
                            onComplete: function(response) {
                                $('discountRow' + id).dispose();
                                if ($$('#ShopDiscountsTable tbody tr').length == 0)
                                {
                                    ajaxShop('discounts/index');
                                }
                            }
                        }).post({'id': id});
                    }
                }
            });
        }

        </script>
{/literal}
