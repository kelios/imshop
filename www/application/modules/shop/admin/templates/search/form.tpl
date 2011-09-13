<div class="saPageHeader" style="float:left;width:100%;position:relative;">
    <h2 style="float:left;">Поиск</h2>

    <div style="float:left;clear:right;margin-top:9px;margin-left:48px">
        <a href="#" onclick="toggleShopSearchBox(); return false;">Изменить параметры &darr;</a>
    </div>

    <div id="shopTopSearchForm"> <!-- begin form block -->
        <form method="get" action="{$ADMIN_URL}search/index"  style="width:100%">
        <input type="hidden" name="s" value="1"> 
            <div class="form_text">Категория:</div>
            <div class="form_input">
                <select name="CategoryId" style="width:285px;" onChange="shopLoadProperiesByCategoryInSearch(this);">
                    <option value="">- Все -</option>
                    {foreach $categories as $category}
                    {if isset(ShopCore::$_GET['CategoryId']) && ShopCore::$_GET['CategoryId'] == $category->getId()}
                        {$selected='selected="selected"'}
                    {else:}
                        {$selected = ''}
                    {/if}
                        <option {$selected} value="{echo $category->getId()}">{str_repeat('-',$category->getLevel())} {echo ShopCore::encode($category->getName())}</option>
                    {/foreach}
                </select>
            </div>
            <div class="form_overflow"></div>

            <div class="form_text"></div>
            <div class="form_input">
                <input type="text" name="text" value="{echo encode(ShopCore::$_GET['text'])}" class="textbox_long" />
                <div class="lite">Укажите название или артикул</div>
            </div>
            <div class="form_overflow"></div>

            <div class="form_text"></div>
            <div class="form_input">
                <select name="Active" style="margin-left: 100px">
                    <option value="">-</option>
                    <option {if ShopCore::$_GET['Active'] == 'true'} selected="selected" {/if} value="true">Активен</option>
                    <option {if ShopCore::$_GET['Active'] == 'false'} selected="selected" {/if} value="false">Неактивен</option>
                </select>

                <select name="Hit">
                    <option value="">-</option>
                    <option {if ShopCore::$_GET['Hit'] == 'true'} selected="selected" {/if} value="true">Хит</option>
                    <option {if ShopCore::$_GET['Hit'] == 'false'} selected="selected" {/if} value="false">Не хит</option>
                </select>
				
		<select name="Hot">
                    <option value="">-</option>
                    <option {if ShopCore::$_GET['Hot'] == 'true'} selected="selected" {/if} value="true">Новинка</option>
                    <option {if ShopCore::$_GET['Hot'] == 'false'} selected="selected" {/if} value="false">Не новинка</option>
                </select>
				
		<select name="Action">
                    <option value="">-</option>
                    <option {if ShopCore::$_GET['Action'] == 'true'} selected="selected" {/if} value="true">Акция</option>
                    <option {if ShopCore::$_GET['Action'] == 'false'} selected="selected" {/if} value="false">Не акция</option>
                </select>
            </div>
            <div class="form_overflow"></div>

            <div id="productPropertiesContainer">{$fieldsForm}</div>

            <div class="form_text"></div>
            <div class="form_input">
                <input type="submit" id="footerButton" name="_startSearch" value="Начать поиск" class="active"  onClick="ajaxShopForm(this,'shopAdminPage');" />
            </div>
            <div class="form_overflow"></div>
        </form>
    </div> <!-- end form block -->
</div>
{literal}
<style type="text/css">
#shopTopSearchForm {
    background-color:#fff;
    width:500px;
    margin-left:100px;
    margin-top:35px;
    z-index:99999;
    position:absolute;
    border:1px solid silver;
    clear:both;
    display:none;
}
</style>

<script type="text/javascript">
function toggleShopSearchBox()
{
    if($('shopTopSearchForm').getStyle('display') == 'none')
    {
        $('shopTopSearchForm').setStyle('display','block');
    }else{
        $('shopTopSearchForm').setStyle('display','none');
    }
}
</script>
{/literal}