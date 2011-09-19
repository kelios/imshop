<?php if(isset($jsCode)){ echo $jsCode; } ?>

<!-- BEGIN STAR RATING -->
<link rel="stylesheet" type="text/css" href="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/rating/jquery.rating-min.css" />
<script src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/rating/jquery.rating-min.js"></script>
<script src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/rating/jquery.MetaData-min.js"></script>
<!-- END STAR RATING -->

<!-- BEGIN LIGHTBOX -->
<script type="text/javascript" src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/lightbox/scripts/jquery.color.min.js"></script>
<script type="text/javascript" src="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/lightbox/scripts/jquery.lightbox.min.js"></script>
<link type="text/css" rel="stylesheet" media="screen" href="<?php if(isset($SHOP_THEME)){ echo $SHOP_THEME; } ?>js/lightbox/styles/jquery.lightbox.min.css" />
<!-- END LIGHTBOX -->
<script type="text/javascript">$(function(){ 
    // Init light box
    $('.lightbox').lightbox();

    // Init star rating
    $('.hover-star').rating({ 
        callback: function(value, link) { 
            $.ajax({ 
                type: "POST",
                data: "pid=<?php echo $model->getId() ?>&val=" + value,
                url:'/shop/ajax/rate',
              });

            $('.hover-star').rating('readOnly', true);
         }
     });
 });

function ajaxAddToCart()
{ 
    $.ajax({ 
        type: "POST",
        data: $("#productForm").serialize(),
        url: "/shop/cart/add",
        success: function(){ $("#mycart").load('/shop/ajax/getCartDataHtml') },
      });

    $("#cartNotify").css('display', 'block');
    setTimeout(function() {   $("#cartNotify").css('display', 'none')  }, 2000); 
 }

</script>


<?php # Display sidebar.tpl # ?>
<?php $this->include_tpl('sidebar', 'Y:\home\imshop\www\templates\commerce\shop\default'); ?>

<div class="products_list">

      <div id="titleExt">
        <h5 class="left">
        <?php echo ShopCore::encode($model->getName()) ?>
        <?php if(sizeof($model->getProductVariants()) == 1): ?>
            <?php echo $model->firstVariant->getName() ?>
        <?php endif; ?>
        </h5>
        <div class="right">
        <?php $rating = $model->getRating() ?>
            <input class="hover-star" type="radio" name="rating-1" value="1" <?php if($rating==1): ?>checked="checked"<?php endif; ?>/>
            <input class="hover-star" type="radio" name="rating-1" value="2" <?php if($rating==2): ?>checked="checked"<?php endif; ?>/>
            <input class="hover-star" type="radio" name="rating-1" value="3" <?php if($rating==3): ?>checked="checked"<?php endif; ?>/>
            <input class="hover-star" type="radio" name="rating-1" value="4" <?php if($rating==4): ?>checked="checked"<?php endif; ?>/>
            <input class="hover-star" type="radio" name="rating-1" value="5" <?php if($rating==5): ?>checked="checked"<?php endif; ?>/>
        </div>
        <div class="sp"></div>
       
        <div id="categoryPath">
            <?php  echo renderCategoryPath ($model->getMainCategory());  ?>
        </div>
      </div>

    <?php if($CI->session->flashdata('productAdded') === true): ?>
        <div style="padding:10px;background-color:#f5f5dc;">
            Товар добавлен в <a href="<?php  echo shop_url ('cart');  ?>">корзину.</a>
        </div>
    <?php endif; ?>
        <br/>

    <div class="left">

      <div id="gallery">
        <div id="prImage" align="center">
        <?php if($model->getMainImage()): ?>
            <img src="<?php  echo productImageUrl ($model->getMainImage());  ?>" border="0" alt="image" />
        <?php endif; ?>       
        </div>

        <?php if(sizeof($model->getSProductImagess()) > 0): ?>
            <?php if(is_true_array($model->getSProductImagess())){ foreach ($model->getSProductImagess() as $image){ ?>
                <div class="images">
                    <div class="image">
                        <a class="lightbox" title=" " href="<?php  echo productImageUrl ($image->getImageName());  ?>"><img src="<?php  echo productImageUrl ($image->getImageName());  ?>" style="width:90px;"></a>
                    </div>
                </div>
            <?php }} ?>
        <?php endif; ?>
      </div>

    </div>
    <div id="product" style="width:380px;">
        <div id="detail">
			<h3>Описание продукта:</h3>
            <?php echo $model->getShortDescription() ?>
            <?php echo $model->getFullDescription() ?>

            <?php if($model->countProperties() > 0): ?>
                <h3>Характеристики:</h3>
                <div id="productProperties">
                    <?php echo ShopCore::app()->SPropertiesRenderer->renderPropertiesTable($model) ?>
                </div>
            <?php endif; ?>
        </div>

    <a href="#"></a>

    <div class="right">
        <form action="<?php  echo shop_url ('cart/add');  ?>" name="productForm" id="productForm" method="post">

        <?php if($model->countProductVariants() > 1): ?>
        <div align="right" style="padding-bottom:20px;">
        Варианты товара:
            <select name="variantId" onChange="display_variant_price(this.value)">
            <?php if(is_true_array($model->getProductVariants())){ foreach ($model->getProductVariants() as $variant){ ?>
                <option value="<?php echo $variant->getId() ?>"><?php echo ShopCore::encode($variant->getName()) ?></option>
            <?php }} ?>
            </select>
        </div>
        <?php else: ?>
            <input type="hidden" name="variantId" value="<?php echo $model->firstVariant->getId() ?>" />
        <?php endif; ?>


        <div class="price">
            <span id="price"><?php echo $model->firstVariant->toCurrency() ?> <?php if(isset($CS)){ echo $CS; } ?></span>

            <!-- Старая цена -->
            <?php if($model->getOldPrice() > 0): ?>
            <div style="font-size:13px;color:#000">
               Старая цена: <span style="color:red;"><s><?php echo $model->toCurrency('OldPrice') ?> <?php if(isset($CS)){ echo $CS; } ?></s></span>
            </div>
            <?php endif; ?>

            <!-- Выводим процент или сумму скидки(если есть) -->
            <?php if($model->hasDiscounts()): ?>
            <div style="font-size:12px;color:#d2691e;">
                На данный продукт действует скидка <?php echo $model->getDiscountString() ?>
            </div>
            <?php endif; ?>
        </div>

        <div align='right' style="font-size:12px;color:#669900;">
                Доступно на складе: <span id="stock"><?php echo $model->firstVariant->getStock() ?></span> шт.
        </div>

        <input type="hidden" name="productId" value="<?php echo $model->getId() ?>" />
        <input type="hidden" name="quantity" value="1" />
        
        <!--
        <a rel="nofollow" href="#" onClick="document.productForm.submit(); return false;" class="button1"><?php echo ShopCore::t('ДОБАВИТЬ В КОРЗИНУ') ?></a>
        -->
        <a rel="nofollow" href="#" onClick='ajaxAddToCart(); return false;' class="button1"><?php echo ShopCore::t('ДОБАВИТЬ В КОРЗИНУ') ?></a>
        <div style="margin-left:45px;font-size:13px;display:none;background-color:#f5f5dc;" id="cartNotify"> 
            Товар добавлен в корзину.
        </div> 
        <?php  echo form_csrf ();  ?>
        </form>
    </div>

    <div class="spRight"></div>
  </div>

    <div class="sp"></div>
    <?php if($model->getRelatedProductsModels()): ?>
    <h5>Сопутствующие товары</h5>
        <?php # Display list of related products # ?>
        <ul class="products">
            <?php $count = 1; ?>
            <?php if(is_true_array($model->getRelatedProductsModels())){ foreach ($model->getRelatedProductsModels() as $p){ ?>
                <li <?php if($count == 3): ?> class="last" <?php $count = 0 ?><?php endif; ?>>
                    <div class="image" style="display:table-cell;vertical-align:middle;overflow:hidden;">
                        <a href="<?php  echo shop_url ('product/' . $p->getUrl());  ?>">
                            <img src="<?php  echo productImageUrl ($p->getId() . '_small.jpg');  ?>" border="0"  alt="image" />
                        </a>
                    </div>
                    <h3 class="name"><a href="<?php  echo shop_url ('product/' . $p->getUrl());  ?>"><?php echo ShopCore::encode($p->getName()) ?></a></h3>
                    <div class="price">
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
    <?php endif; ?>
    <div class="sp"></div>

    <?php if(isset($comments)){ echo $comments; } ?>
    
</div>

<?php $mabilis_ttl=1316516946; $mabilis_last_modified=1307539914; //Y:\home\imshop\www\templates\commerce\shop\default/product.tpl ?>