<div id="categories_menu_tree">
    <ul>
        <li>&nbsp;</li>
        <li><a href="{shop_url('profile')}">Мои заказы</a></li>
        <li><a href="{shop_url('profile/edit')}">Мои данные</a></li>
            {$q =  ShopCore::$ci->db->get_where('components',array('name' => 'auth'),1)->row_array();}
            {$rename ='/'.$q['identif'].'/';}
        <li><a href="{$rename}logout">Выход</a></li>
	</ul>
</div>
