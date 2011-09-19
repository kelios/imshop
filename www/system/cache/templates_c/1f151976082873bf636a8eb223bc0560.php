<?php include ('Y:\home\imshop\www\application\libraries\mabilis/functions/func.counter.php');  ?><div class="saPageHeader">
    <div style="float:left;">
        <h2>Заказы</h2>
    </div>

    <div style="float:left; padding-top:8px;padding-left:35px;">
        <?php  $result = SOrders::$statuses; 
 if(is_true_array($result)){ foreach ($result as $s_key => $s_value){ ?> 
            <?php if(ShopCore:: $_GET['status']  == $s_key): ?> 
                <?php $active='active' ?>
            <?php else: ?>
                <?php $active='' ?>
            <?php endif; ?>
            <a href="#" onClick="ajaxShop('orders/index?status=<?php if(isset($s_key)){ echo $s_key; } ?>'); return false;" class="filterLink <?php if(isset($active)){ echo $active; } ?>"><?php if(isset($s_value)){ echo $s_value; } ?></a>
        <?php }} ?>
    </div>

<!--
    <div style="float:right;padding-top:2px;margin-right:5px;position:relative;" onsubmit="return false;">
        <form id="">
            <input type="text" name="search_text" class="textbox_long" />
            <input type="submit" value="Search" class="search_submit" id="ttt" />


            <div style="width:276px;height:200px;border:1px solid silver;background-color:#fff;position:absolute;z-index:99999;"></div>

        </form>
    </div>
-->

</div>

<?php if(sizeof($model)==0): ?>
    <div id="notice" style="width: 500px; ">
        Список заказов пустой.
    </div>
    <?php return ?>
<?php endif; ?>

<?php if(is_true_array($model)){ foreach ($model as $o){ ?>

<div class="orderItem" id="orderId<?php echo $o->getId() ?>">
<div class="" style="color:#7B7B7B;font-size:11px;"><?php  echo date ("d-m-Y H:i:s", $o->getDateCreated());  ?></div>
    <div class="orderLeft">
        <div class="orderParam row_dark">
            <a href="#" onclick="ajaxShop('orders/edit/<?php  echo $o->getId() ?>?back_to=<?php echo ShopCore:: $_GET['status']   ?>'); return false;" style="font-size:14px;"><b>Заказ #<?php echo $o->getId() ?></b></a>
        </div>
        <div class="paramValue row_dark" style="text-decoration:underline;"><?php echo ShopCore::encode($o->getUserFullName()) ?></div> 
        <div class="clear"></div>

        <div class="orderParam row_lite">Email:</div>
        <div class="paramValue row_lite"><?php echo ShopCore::encode($o->getUserEmail()) ?></div> 
        <div class="clear"></div> 

        <div class="orderParam row_dark">Телефон:</div>
        <div class="paramValue row_dark"><?php echo ShopCore::encode($o->getUserPhone()) ?></div> 
        <div class="clear"></div>

        <div class="orderParam row_lite">Адрес доставки:</div>
        <div class="paramValue row_lite">
                <a href="http://maps.google.com/?q=<?php echo ShopCore::encode($o->getUserDeliverTo()) ?>" target="_blank" title="Посмотреть на карте.">
                    <img src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>images/map.png" align="left" />
                    <?php echo ShopCore::encode($o->getUserDeliverTo()) ?>
                </a>
        </div>
        <div class="clear"></div>

        <div class="orderParam row_dark">Комментарий к заказу:</div>
        <div class="paramValue row_dark"><?php echo ShopCore::encode($o->getUserComment()) ?></div>
        <div class="clear"></div>
    </div>

    <div class="orderRight">
        <table border="0" align="top" class="ordersTable" width="100%">
            <?php $total = 0 ?>
            <?php if(is_true_array($o->getSOrderProductss())){ foreach ($o->getSOrderProductss() as $p){ ?>
            <tr valign="top" class="<?php  echo func_counter ('row_dark','row_lite');  ?> hover">
                <td>
                    <a href="#"><?php echo $p->getProductName() ?></a><br/>
                    <?php echo $p->getVariantName() ?>  
                </td>
                <td align="left">
                    <?php echo $p->getQuantity() ?> шт. × <?php echo $p->getPrice() ?> <?php if(isset($CS)){ echo $CS; } ?>
                    <?php $total = $total + $p->getQuantity() *  $p->getPrice() ?>
                </td>
            </tr>
            <?php }} ?>

            <tr valign="top" class="row_lite">
                <td>
                <?php if($o->getSDeliveryMethods()): ?>
                    <?php echo $o->getSDeliveryMethods()->getName() ?>
                <?php endif; ?>
                </td>
                <td align="left">
                    <?php echo $o->getDeliveryPrice() ?> <?php if(isset($CS)){ echo $CS; } ?>
                    <?php $total = $total + $o->getDeliveryPrice() ?>
                </td>
            </tr>

            <tr valign="top" class="row_lite summary">
                <td align="left">
                    <b>Итог:</b>
                </td>
                <td align="left">
                    <b><?php if(isset($total)){ echo $total; } ?> <?php if(isset($CS)){ echo $CS; } ?></b>
                </td>
            </tr>
        </table> 
    </div>

    <div class="actions" style="float:right;">
        <?php if(ShopCore:: $_GET['status'] ==0): ?>
        <img src="/application/modules/shop/admin/templates/assets/images/arrow.png" id="proccessOrderButton" onclick="moveToInProgress(<?php echo $o->getId() ?>);" title="В обработку"/>
        <br/>
        <?php endif; ?>

        <?php if(ShopCore:: $_GET['status'] ==1): ?>
        <img src="/application/modules/shop/admin/templates/assets/images/tick.png" id="proccessOrderButton" onclick="moveToCompleted(<?php echo $o->getId() ?>);" title="Выполнен"/>
        <br/>
        <?php endif; ?>
 
        <?php if($o->getPaid() == true): ?>
            <img src="/application/modules/shop/admin/templates/assets/images/credit-card.png" id="proccessOrderButton" 
            onclick="changePaid(this, <?php echo $o->getId() ?>);" title="Оплачен"/>
        <?php else: ?>
            <img src="/application/modules/shop/admin/templates/assets/images/credit-card-silver.png" id="proccessOrderButton" 
            onclick="changePaid(this, <?php echo $o->getId() ?>)" title="Оплачен"/>
        <?php endif; ?>
        <br/>
        <img src="/application/modules/shop/admin/templates/assets/images/delete.png" id="deleteOrderButton" title="Удалить заказ" onclick="confirm_delete_order(<?php  echo $o->getId() ?>, <?php echo ShopCore:: $_GET['status']   ?>);"/>
    </div>

    <div style="clear:both;"></div>
</div>
<?php }} ?>
<?php $mabilis_ttl=1316508683; $mabilis_last_modified=1307609450; //Y:\home\imshop\www\/application/modules/shop/admin\templates\orders\list.tpl ?>