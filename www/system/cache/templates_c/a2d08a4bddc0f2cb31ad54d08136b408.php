
<?php $this->include_tpl("profile_menu", 'Y:\home\imshop\www\templates\commerce\shop\default'); ?>

<div class="products_list">
    <table width="100%">
        <thead>
            <tr>
                <td style="width:15px;">ID</td>
                <td>Статус</td>
                <td>Оплачен</td>
                <td>Создан</td>
                <td>Обновлен</td>
                <td></td>
            </tr>
        </thead>

        <?php if(is_true_array($orders)){ foreach ($orders as $order){ ?>
        <tr style="font-size:13px;">
            <td style="width:15px;"><?php echo $order->getId() ?></td>
            <td><?php echo SOrders::$statuses[$order->getStatus()] ?></td>
            <td><?php if($order->getPaid()): ?> Да <?php else: ?> Нет <?php endif; ?></td>
            <td><?php  echo date ("d-m-Y H:i", $order->getDateCreated());  ?></td>
            <td><?php  echo date ("d-m-Y H:i", $order->getDateUpdated());  ?></td>
            <td><a href="<?php  echo shop_url ('cart/view/' . $order->getKey());  ?>">Просмотр</a></td>
        </tr>
        <?php }} ?>
    </table>
</div>
<?php $mabilis_ttl=1316509876; $mabilis_last_modified=1303831608; //Y:\home\imshop\www\templates\commerce\shop\default/profile.tpl ?>