<?php include ('Y:\home\imshop\www\application\libraries\mabilis/functions/func.counter.php');  ?>
    <script type="text/javascript">
    $(window).load(function()
    { 
        init_slideshow();
     })

    init_slideshow = function()
    { 
        $('#slides').cycle({ 
            fx:'fade',
            timeout:8000,
            pager:'#slide_navigation',
            after:update_slide_caption,
            before:fade_slide_caption
         })
     }
    </script>


<?php # Display sidebar.tpl # ?>
<?php $this->include_tpl('sidebar', 'Y:\home\imshop\www\templates\commerce\shop\default'); ?>

<div class="products_list">

    <!-- BEGIN SLIDESHOW -->
    <div id="slideshow">
            <ul id="slides" style="width: 693px; height: 259px;">
              <li><a href="/shop/product/74"><img src="/uploads/shop/74_main.jpg" alt="" height="256"></a><span class="slide_caption"> <a href="/shop/product/74" class="title">Samsung LN40C650 40" LCD TV</a> Высоко технологический продукт, который поможет Вам оценить качество.</span></li>
              <li><a href="/shop/product/106"><img src="/uploads/shop/106_main.jpg" alt="" height="256"></a><span class="slide_caption"> <a href="/shop/product/106" class="title">Panasonic KX-TG7433B Expandable</a> Высоко технологический продукт, который поможет Вам оценить качество.</span></li>
              <li><a href="/shop/product/98"><img src="/uploads/shop/98_main.jpg" alt="" height="256"></a><span class="slide_caption"> <a href="/shop/product/98" class="title">Samsung NX10 14 Megapixel Digital</a> Высоко технологический продукт, который поможет Вам оценить качество.</span></li>
              <li><a href="/shop/product/96"><img src="/uploads/shop/96_main.jpg" alt="" height="256"></a><span class="slide_caption"> <a href="/shop/product/96" class="title">Canon VIXIA HF R11 Digital</a> Высоко технологический продукт, который поможет Вам оценить качество.</span></li>
            </ul>
            <div id="slideshow_violator" class="clearfix">
              <div id="project_caption"></div>
              <div id="slide_navigation" class="clearfix"></div>
            </div>
    </div>
    <!-- END SLIDESHOW -->

    <!-- BEGIN HITS -->
    <div id="titleExt">
        <h5 class="left">Хиты</h5>
        <div class="sp"></div>
    </div>
    <br/>
    <ul class="products">
    <?php $count = 1 ?>
    <?php if(is_true_array($hits)){ foreach ($hits as $p){ ?>
        <li class="<?php  echo func_counter ('', '', 'last');  ?>">
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
    <!-- END HITS -->

    <div style="clear:both;"></div>

    <!-- BEGIN NEW -->
    <div id="titleExt">
        <h5 class="left">Новые</h5>
        <div class="sp"></div>
    </div>
    <br/>
    <ul class="products">
    <?php $count = 1 ?>
    <?php if(is_true_array($newest)){ foreach ($newest as $p){ ?>
        <li class="<?php  echo func_counter ('', '', 'last');  ?>">
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
    <!-- END NEW -->

</div>
<?php $mabilis_ttl=1316265065; $mabilis_last_modified=1303831608; //Y:\home\imshop\www\templates\commerce\shop\default/start_page.tpl ?>