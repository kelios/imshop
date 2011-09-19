<?php include ('Y:\home\imshop\www\application\libraries\mabilis/functions/func.counter.php');  ?>
<?php # Display sidebar.tpl # ?>
<?php $this->include_tpl('sidebar', 'Y:\home\imshop\www\templates\commerce\shop\default'); ?>

<div class="products_list">

      <div id="titleExt">
        <h5 class="left"><?php echo ShopCore::encode($model->getName()) ?></h5>
        <div class="right">
            <!-- BEGIN FILTER BOX -->
                <a href="#" onclick="$('#filterBox').toggle();return false;">Изменить параметры ↓</a>
                <div id="filterBox">
                <form method="get" action="">

                    <div class="fieldName">Сиртировка:</div>
                    <div class="field">
                        <select name="order">
                            <option>-</option>
                            <option <?php if(ShopCore::$_GET['order']=='price'): ?>selected<?php endif; ?> value="price">Возрастанию цены</option>
                            <option <?php if(ShopCore::$_GET['order']=='price_desc'): ?>selected<?php endif; ?> value="price_desc">Убыванию цены</option>
                            <option <?php if(ShopCore::$_GET['order']=='name'): ?>selected<?php endif; ?> value="name">Название  A-Z</option>
                            <option <?php if(ShopCore::$_GET['order']=='name_desc'): ?>selected<?php endif; ?> value="name_desc">Название Z-A</option>
                            <option <?php if(ShopCore::$_GET['order']=='hit'): ?>selected<?php endif; ?> value="hit">Сначала хиты</option>
                            <option <?php if(ShopCore::$_GET['order']=='hot'): ?>selected<?php endif; ?> value="hot">Сначала новинки</option>
                            <option <?php if(ShopCore::$_GET['order']=='action'): ?>selected<?php endif; ?> value="action">Сначала акции</option>
                        </select>
                    </div>
                    <div class="clear"></div>

                    <div class="fieldName">Цена:</div>
                    <div class="field">
                        от <input type="text" value="<?php  echo encode (ShopCore::$_GET['lp']);  ?>" name="lp" style="width:26px;" />
                        до <input type="text" value="<?php  echo encode (ShopCore::$_GET['rp']);  ?>" name="rp" style="width:26px;"/> 
                    </div>
                    <div class="clear"></div>

                <?php if($model->countProperties() > 0): ?>
                    <?php if(is_true_array($model->getProperties())){ foreach ($model->getProperties() as $prop){ ?>
                        <div class="fieldName"><?php echo $prop->getName() ?>:</div>
                        <div class="field">
                            <?php if(is_true_array($prop->asArray())){ foreach ($prop->asArray() as $key=>$val){ ?>
                                <label>
                                <input type="checkbox" <?php if(is_property_in_get($prop->getId(), $key)): ?> checked="checked" <?php endif; ?> name="f[<?php echo $prop->getId() ?>][]" <?php if(isset($checked)){ echo $checked; } ?> value="<?php if(isset($key)){ echo $key; } ?>" /> <?php if(isset($val)){ echo $val; } ?>
                                </label><br>
                            <?php }} ?>
                        </div>
                        <div class="clear"></div>
                    <?php }} ?>
                <?php endif; ?>
                <div class="fieldName">В наличии:</div>
                        <div class="field">
                                <label>
                                <input type="checkbox" <?php if(isset(ShopCore::$_GET['stock'])): ?> checked="checked" <?php endif; ?> name="stock" <?php if(isset($checked)){ echo $checked; } ?> value="1" />
                                </label><br>
                        </div>
                        <div class="clear"></div>
                <div class="fieldName">Акции:</div>
                        <div class="field">
                                <label>
                                <input type="checkbox" <?php if(isset(ShopCore::$_GET['action'])): ?> checked="checked" <?php endif; ?> name="action" <?php if(isset($checked)){ echo $checked; } ?> value="1" />
                                </label><br>
                        </div>
                        <div class="clear"></div>
                <div class="fieldName">Новинки:</div>
                        <div class="field">
                                <label>
                                <input type="checkbox" <?php if(isset(ShopCore::$_GET['hot'])): ?> checked="checked" <?php endif; ?> name="hot" <?php if(isset($checked)){ echo $checked; } ?> value="1" />
                                </label><br>
                        </div>
                        <div class="clear"></div>

                    <div class="fieldName"></div>
                    <div class="field">
                        <input type="submit" value="Применить" />
                    </div>
                    <div class="clear"></div>

                </form>
                </div>
            <!-- END FILTER BOX -->
        </div>
        <div class="sp"></div>
       
        <div id="categoryPath">
            <?php  echo renderCategoryPath ($model);  ?>
        </div>
      </div>

    <div id="brands_list">
    <!-- Display brans list -->
    <?php if(sizeof($brandsInCategory) > 0): ?>
        <?php if(is_true_array($brandsInCategory)){ foreach ($brandsInCategory as $brand){ ?>
            <?php if($brand->getId() != ShopCore::$_GET['brand']): ?>
                <a href="?brand=<?php echo $brand->getId() ?><?php if(!empty(ShopCore::$_GET['order'])): ?>&order=<?php  echo encode (ShopCore::$_GET['order']);  ?><?php endif; ?><?php if(!empty(ShopCore::$_GET['lp'])): ?>&lp=<?php  echo encode (ShopCore::$_GET['lp']);  ?><?php endif; ?><?php if(!empty(ShopCore::$_GET['rp'])): ?>&rp=<?php  echo encode (ShopCore::$_GET['rp']);  ?><?php endif; ?><?php if(isset(ShopCore::$_GET['stock'])): ?>&stock=1<?php endif; ?><?php if(isset(ShopCore::$_GET['action'])): ?>&action=1<?php endif; ?><?php if(isset(ShopCore::$_GET['hot'])): ?>&hot=1<?php endif; ?><?php if($model->countProperties() > 0): ?><?php if(is_true_array($model->getProperties())){ foreach ($model->getProperties() as $prop){ ?><?php if(is_true_array($prop->asArray())){ foreach ($prop->asArray() as $key=>$val){ ?><?php if(is_property_in_get($prop->getId(), $key)): ?>&f[<?php echo $prop->getId() ?>][]=<?php if(isset($key)){ echo $key; } ?><?php endif; ?><?php }} ?><?php }} ?><?php endif; ?>"><?php echo ShopCore::encode($brand->getName()) ?></a>
            <?php else: ?>
                <a href="#" style="font-weight:bold;"><?php echo ShopCore::encode($brand->getName()) ?></a>
            <?php endif; ?>
            |
        <?php }} ?>
    <?php endif; ?>
    </div>

    <?php if($totalProducts > 0): ?>
		<ul class="products">
		<?php $count = 1; ?>
        <?php if(is_true_array($products)){ foreach ($products as $p){ ?>
            <li class="<?php  echo func_counter ('', '', 'last');  ?>">
                <div class="image" style="display:table-cell;vertical-align:middle;overflow:hidden;">
                    <a href="<?php  echo shop_url ('product/' . $p->getUrl());  ?>">
                        <img src="<?php  echo productImageUrl ($p->getId() . '_small.jpg');  ?>" border="0"  alt="image" />
                    </a>
                </div>
                <h3 class="name"><a href="<?php  echo shop_url ('product/' . $p->getUrl());  ?>"><?php echo ShopCore::encode($p->getName()) ?></a></h3>
                <div class="price priceLight"> 
                    <?php $p->firstVariant ?>
                    <?php if($p->hasDiscounts()): ?>
                        <s><?php echo $p->firstVariant->toCurrency('origPrice') ?> <?php if(isset($CS)){ echo $CS; } ?></s>
                        <br/>
                        <span style="font-size:14px;"><?php echo $p->firstVariant->toCurrency() ?> <?php if(isset($CS)){ echo $CS; } ?></span>
                    <?php else: ?>
                        <span style="font-size:14px;"><?php echo $p->firstVariant->toCurrency() ?> <?php if(isset($CS)){ echo $CS; } ?></span>
                    <?php endif; ?>
                </div>
                <div class="compare"><a href="<?php  echo shop_url ('compare/add/' . $p->getId());  ?>">Сравнить</a></div>
            </li>
            <?php if($count == 3): ?><li class="separator"></li> <?php $count=0 ?><?php endif; ?>
            <?php $count++ ?>
        <?php }} ?>
		</ul>


        <div class="sp"></div>
        <div id="gopages">
                <?php if(isset($pagination)){ echo $pagination; } ?>
        </div>
        <div class="sp"></div>
        <?php else: ?>
        <p>
            <?php echo ShopCore::t('В категории нет продуктов') ?>.
        </p>
    <?php endif; ?>


</div><?php $mabilis_ttl=1316510115; $mabilis_last_modified=1308217400; //Y:\home\imshop\www\templates\commerce\shop\default/category.tpl ?>