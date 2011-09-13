<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    if (!function_exists('shop_url'))
    {
        function shop_url($url)
        {
            return site_url('shop/'.$url);
        }
    }

    if (!function_exists('productImageUrl'))
    {
        function productImageUrl($name, $useRand = false)
        {
            if ($useRand === true)
                $rand = '?'.rand(1,1000);
            else
                $rand = '';

            return media_url('uploads/shop/'.$name.$rand);
        }
    }

    if (!function_exists('renderCategoryPath'))
    {
        function renderCategoryPath(SCategory $model)
        {
            $path = $model->buildCategoryPath();
            $size = sizeof($path);

            if ($size > 0)
            {
                echo anchor('shop', ShopCore::t('Главная'));
                echo ' →  '; 

                $n = 0;
                foreach ($path as $category)
                {
                    echo anchor(shop_url('category/' . $category->getFullPath()), ShopCore::encode($category->getName()));
                    if ($n < $size - 1)
                        echo ' →  ';

                    $n++;
                }
            }
            else
            {
                echo anchor('shop', ShopCore::t('Главная'));  
                echo ' →  ';
                echo anchor(shop_url('category/'.$model->getFullPath()), ShopCore::encode($model->getName())); 
            }
        }
    }

    if (!function_exists('is_property_in_get'))
    {
        function is_property_in_get($pId,$index)
        {
            if (isset(ShopCore::$_GET['f'][$pId]) && in_array($index,ShopCore::$_GET['f'][$pId]))
            {
                return true;
            }

            return false;
        }
     }

    if (!function_exists('get_currencies'))
    {
        function get_currencies()
        {
            return SCurrenciesQuery::create()->find();
        }
     }

    // For Windows
    if (!function_exists('money_format'))
    {
        function money_format($format,$price)
        {
               return round($price, 2);
        }
     }
