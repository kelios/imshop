<h3>Новости и акции</h3>
<div class="news">
    <?php if(is_true_array($recent_news)){ foreach ($recent_news as $item){ ?>
        <div class="newsitem">
            <span><?php  echo date ('d-m-Y', $item['publish_date'] );  ?></span>
            <p><a href="<?php  echo site_url ( $item['full_url'] );  ?>"><?php  echo $item['title'];  ?></a></p>
            <p><?php  echo $item['prev_text'];  ?></p>
        </div>
    <?php }} ?>
    <div align="center"><a href="/novosti_i_aktsii">Архив новостей</a></div>
</div><?php $mabilis_ttl=1316259074; $mabilis_last_modified=1291799964; //Y:\home\imshop\www\/templates/commerce/widgets/latest_news.tpl ?>