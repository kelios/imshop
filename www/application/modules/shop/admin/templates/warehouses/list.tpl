<div class="saPageHeader">
    <h2>Редактирование складов</h2>
</div>

{if sizeof($model)==0}
    <div id="notice" style="width: 500px; ">Список складов пустой.
        <a href="#" onclick="ajaxShop('brands/create'); return false;">Создать.</a>
    </div>

    {return}
{/if}

<div id="sortable">
		  <table id="ShopWarehousesTable">
		  	<thead>
                <th width="5px">ID</th>
                <th>Название</th>
                <th>Адрес</th>
                <th width="15px"></th>
			</thead>
			<tbody>
		{foreach $model as $c}
		<tr id="cRow{echo $c->getId()}">
			<td>{echo $c->getId()}</td>
			<td onclick="javascript:ajaxShop('warehouses/edit/{echo $c->getId()}');">{echo ShopCore::encode($c->getName())}</td>
			<td>{echo ShopCore::encode($c->getAddress())}</td>
            <td><img onclick="confirm_shop_delete_warehouse({echo $c->getId()});" src="{$THEME}/images/delete.png"  style="cursor:pointer" width="16" height="16" title="Удалить" /></td>
		</tr>
		{/foreach}
			</tbody>
			<tfoot>
				<tr>
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
            var ShopWarehousesTable = new sortableTable('ShopWarehousesTable', {overCls: 'over', sortOn: -1 ,onClick: function(){}});
            ShopWarehousesTable.altRow();
        });

        function confirm_shop_delete_warehouse(id)
        {
            alertBox.confirm('<h1>Удалить склад ID: ' + id + '? </h1>', {onComplete:
                function(returnvalue) {
                    if(returnvalue)
                    {
                        $('cRow' + id).setStyle('background-color','#D95353');
                        var req = new Request.HTML({
                            method: 'post',
                            url: shop_url + 'warehouses/delete',
                            evalResponse: true,
                            onComplete: function(response) {
                                $('cRow' + id).dispose();
                                if ($$('#ShopWarehousesTable tbody tr').length == 0)
                                {
                                    ajaxShop('warehouses/index');
                                }
                            }
                        }).post({'id': id});
                    }
                }
            });
        }
        </script>
{/literal}
