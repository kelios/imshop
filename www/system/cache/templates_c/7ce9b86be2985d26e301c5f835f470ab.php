<h3>Последние отзывы</h3>
<div class="news">
	<?php if(is_true_array($comments)){ foreach ($comments as $comment){ ?>
		<div class="newsitem">
			<span><?php   echo $comment['user_name'];  ?>(<?php  echo date ('j.m.Y h:i', $comment['date'] );  ?>)</span>
			<p><?php  echo $comment['text'];  ?> <a href="<?php  echo shop_url ('product');  ?>/<?php  echo $comment['item_id'];  ?>#comment_<?php  echo $comment['id'];  ?>">&rarr;</a></p>			
		</div>
	<?php }} ?>
</div><?php $mabilis_ttl=1316773481; $mabilis_last_modified=1308300372; //Y:\home\imshop\www\/templates/commerce/widgets/recent_product_comments.tpl ?>