<div id="categories">
<div class="rdTreeFirebug demotree">
<ul id="desktop_tree">
<li><a id="root_tree" ondblclick='myTree.expandAll()' onclick="cats_options(0,'');" title="Двойной щелчок - развернуть все категории">root</a>
<?php  $this->view("cats_tree_css.tpl", $data)  ?>
</li>
</ul>
</div>
<script>
var myTree = new rdTree('desktop_tree');
myTree.select("root_tree");
</script>
</div>
<?php $mabilis_ttl=1316777274; $mabilis_last_modified=1251921688; //Y:\home\imshop\www\/templates/administrator/cats_sidebar.tpl ?>