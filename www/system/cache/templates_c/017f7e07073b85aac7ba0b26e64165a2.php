<?php if($tree): ?>
    <ul>
        <?php if(is_true_array($tree)){ foreach ($tree as $item){ ?>
        <li><a onclick="cats_options(<?php  echo $item['id'];  ?>);" ><?php  echo $item['name'];  ?></a>
            <?php if($item['subtree']): ?>
                <?php  $this->view("cats_tree_css.tpl", array('tree' => $item['subtree'] ));  ?>
            <?php endif; ?>
            </li>
        <?php }} ?>
    </ul>
<?php endif; ?>
<?php $mabilis_ttl=1316261706; $mabilis_last_modified=1251921688; //Y:\home\imshop\www\/templates/administrator/cats_tree_css.tpl ?>