<div class="top-navigation">
    <ul>
        <li><p>Журнал событий</p></li>
    </ul>
</div>

<div id="admin_logs" style="padding:10px;">
<?php if(is_true_array($messages)){ foreach ($messages as $m){ ?>
    <div style="float:left;min-width:100px;padding-right:5px;">
        <span style="padding-right:3px;" class="lite"><?php  echo date ('d-m-Y H:i:s',  $m['date'] );  ?></span>
        <a href="#" onclick="return false;"><?php  echo $m['username'];  ?></a>:
    </div>
    <div class="log_message" style="float:left;"><?php  echo $m['message'];  ?></div>

    <div style="clear:both;"></div> 
<?php }} ?>
</div>

    
<div style="padding-left:15px;" class="pagination"><?php if(isset($paginator)){ echo $paginator; } ?></div>
<?php $mabilis_ttl=1316253039; $mabilis_last_modified=1289816238; //Y:\home\imshop\www\/templates/administrator/logs.tpl ?>