<?php include ('Y:\home\imshop\www\application\libraries\mabilis/functions/func.counter.php');  ?>
<script type="text/javascript">
function getCategoryAttributes(cId)
{ 
    document.getElementById('catVariants').innerHTML = "<img src='/application/modules/imagebox/templates/js/lightbox/images/loading.gif' />"
    $("#catVariants").load('/shop/ajax/getCategoryAttributes/' + cId)
 }
</script>


<?php # Display sidebar.tpl # ?>
<?php $this->include_tpl('sidebar', 'Y:\home\imshop\www\templates\commerce\shop\default'); ?>

<div class="products_list">

      <div id="titleExt">
        <h5 class="left">Поиск</h5>
        <div class="right">
            Найдено <?php if(isset($totalProducts)){ echo $totalProducts; } ?> <?php echo SStringHelper::Pluralize($totalProducts, array('продукт','продукта','продуктов')) ?>
            <!-- BEGIN FILTER BOX -->
                <a href="#" onclick="$('#filterBox').toggle();return false;">Изменить параметры ↓</a>
                <div id="filterBox">
                <form method="get" action="">
                    <?php if(!empty(ShopCore::$_GET['text'])): ?>
                        <input type="hidden" value="<?php  echo encode (ShopCore::$_GET['text']);  ?>" name="text" />
                    <?php endif; ?>

                    <div class="fieldName">Сиртировка:</div>
                    <div class="field">
                        <select name="order">
                            <option>-</option>
                            <option <?php if(ShopCore::$_GET['order']=='price'): ?>selected<?php endif; ?> value="price">Возрастанию цены</option>
                            <option <?php if(ShopCore::$_GET['order']=='price_desc'): ?>selected<?php endif; ?> value="price_desc">Убыванию цены</option>
                            <option <?php if(ShopCore::$_GET['order']=='name'): ?>selected<?php endif; ?> value="name">Название  A-Z</option>
                            <option <?php if(ShopCore::$_GET['order']=='name_desc'): ?>selected<?php endif; ?> value="name">Название Z-A</option>
                            <option <?php if(ShopCore::$_GET['order']=='date'): ?>selected<?php endif; ?> value="date">Возрастанию даты</option>
                            <option <?php if(ShopCore::$_GET['order']=='date_desc'): ?>selected<?php endif; ?> value="date_desc">Убыванию даты</option>
                        </select>
                    </div>
                    
                    <div class="fieldName">Фильтр по категории:</div>
                    <div class="field">
                        <select name="category" onChange="getCategoryAttributes(this.options[this.selectedIndex].value)">
                            <option>-</option>
                            <?php if(is_true_array($tree)){ foreach ($tree as $c){ ?>
                                <option <?php if(ShopCore::$_GET['category']==$c->getId()): ?>selected<?php endif; ?> value="<?php echo $c->getId() ?>"><?php  echo str_repeat ('-',$c->getLevel());  ?>
                                    <?php if($c->getLevel()==0): ?>
                                        <b><?php echo ShopCore::encode($c->getName()) ?></b>
                                    <?php else: ?>
                                        <?php echo ShopCore::encode($c->getName()) ?>
                                    <?php endif; ?>
                                </option>
                            <?php }} ?>  
                        </select>
                    </div>
                    
                    <div id="catVariants">
                    </div>
                    
                    <div class="fieldName">Цена:</div>
                    <div class="field">
                        от <input type="text" value="<?php  echo encode (ShopCore::$_GET['lp']);  ?>" name="lp" style="width:26px;" />
                        до <input type="text" value="<?php  echo encode (ShopCore::$_GET['rp']);  ?>" name="rp" style="width:26px;"/> 
                    </div>
                    <div class="clear"></div>
                    
                    <?php if(!empty(ShopCore::$_GET['brand'])): ?>
                        <input type="hidden" value="<?php  echo encode (ShopCore::$_GET['brand']);  ?>" name="brand" />
                    <?php endif; ?>
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
            <?php if(!empty(ShopCore::$_GET['text'])): ?>
                Вы искали: "<span class="highlight"><?php  echo encode ($_GET['text']);  ?></span>"
            <?php endif; ?>
        </div>
      </div>
    <div id="brands_list">
    <!-- Display brans list -->
    <?php if(sizeof($brandsInSearchResult) > 0): ?>
        <?php if(is_true_array($brandsInSearchResult)){ foreach ($brandsInSearchResult as $brand){ ?>
            <?php if($brand->getId() != ShopCore::$_GET['brand']): ?>
                <a href="?text=<?php  echo encode (ShopCore::$_GET['text']);  ?><?php if(!empty(ShopCore::$_GET['order'])): ?>&order=<?php  echo encode (ShopCore::$_GET['order']);  ?><?php endif; ?><?php if(!empty(ShopCore::$_GET['category'])): ?>&category=<?php  echo encode (ShopCore::$_GET['category']);  ?><?php endif; ?>&brand=<?php echo $brand->getId() ?>"><?php echo ShopCore::encode($brand->getName()) ?></a>
            <?php else: ?>
                <a href="#" style="font-weight:bold;"><?php echo ShopCore::encode($brand->getName()) ?></a>
            <?php endif; ?>
            |
        <?php }} ?>
    <?php endif; ?>
    </div>
    <br/>

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
                <div class="price"><?php echo $p->firstVariant->toCurrency() ?> <?php if(isset($CS)){ echo $CS; } ?></div>
                <div class="compare"><a href="#">Сравнить</a></div>
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
            <?php echo ShopCore::t('По вашему запросу ничего не найдено') ?>.
        </p>
    <?php endif; ?>
</div><?php $mabilis_ttl=1316511631; $mabilis_last_modified=1307617178; //Y:\home\imshop\www\templates\commerce\shop\default/search.tpl ?>