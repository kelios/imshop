-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- Хост: 192.168.0.99
-- Время создания: Сен 22 2011 г., 12:43
-- Версия сервера: 5.0.90
-- Версия PHP: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `b76870_test3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `position` mediumint(5) NOT NULL default '0',
  `name` varchar(160) NOT NULL,
  `title` varchar(250) default NULL,
  `short_desc` text NOT NULL,
  `url` varchar(300) NOT NULL,
  `image` varchar(250) default NULL,
  `keywords` text,
  `description` text,
  `fetch_pages` text NOT NULL,
  `main_tpl` varchar(50) NOT NULL,
  `tpl` varchar(50) default NULL,
  `page_tpl` varchar(50) default NULL,
  `per_page` smallint(5) NOT NULL,
  `order_by` varchar(25) NOT NULL,
  `sort_order` varchar(25) NOT NULL,
  `comments_default` tinyint(1) NOT NULL default '0',
  `field_group` int(11) NOT NULL,
  `category_field_group` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`),
  KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `position`, `name`, `title`, `short_desc`, `url`, `image`, `keywords`, `description`, `fetch_pages`, `main_tpl`, `tpl`, `page_tpl`, `per_page`, `order_by`, `sort_order`, `comments_default`, `field_group`, `category_field_group`) VALUES
(1, 0, 0, 'Главная', '', '', 'main', '', '', '', 'b:0;', '', '', '', 10, 'publish_date', 'desc', 1, 0, 0),
(56, 0, 0, 'Новости', '', '', 'novosti', '', '', '', 'b:0;', '', '', '', 15, 'publish_date', 'desc', 0, 0, 0),
(61, 0, 0, 'Товар', '', '', 'tovar', '', '', '', 'b:0;', '', '', '', 15, 'publish_date', 'desc', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `category_translate`
--

CREATE TABLE IF NOT EXISTS `category_translate` (
  `id` int(11) NOT NULL auto_increment,
  `alias` int(11) NOT NULL,
  `name` varchar(160) NOT NULL,
  `title` varchar(250) default NULL,
  `short_desc` text,
  `image` varchar(250) default NULL,
  `keywords` text,
  `description` text,
  `lang` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`,`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `category_translate`
--


-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL auto_increment,
  `module` varchar(25) NOT NULL default 'core',
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_site` varchar(250) NOT NULL,
  `item_id` bigint(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` int(11) NOT NULL,
  `status` smallint(1) NOT NULL,
  `agent` varchar(250) NOT NULL,
  `user_ip` varchar(64) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `module` (`module`),
  KEY `item_id` (`item_id`),
  KEY `date` (`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `module`, `user_id`, `user_name`, `user_mail`, `user_site`, `item_id`, `text`, `date`, `status`, `agent`, `user_ip`) VALUES
(37, 'shop', 1, 'kelios', 'kelios@inbox.ru', '', 258, 'Жду теперь настоящего лета, чтоб поскорее примерить это чудо и свести с ума всех особей М пола)).', 1315344438, 0, 'Mozilla/5.0 (Windows NT 5.1; rv:6.0) Gecko/20100101 Firefox/6.0', '127.0.0.1'),
(38, 'shop', 1, 'kelios', 'kelios@inbox.ru', '', 275, 'Жду теперь настоящего лета, чтоб поскорее примерить', 1316445595, 0, 'Mozilla/5.0 (Windows NT 5.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '178.121.141.146'),
(41, 'shop', 136, 'vinilzen', 'marchukilya@yandex.ru', '', 276, 'привет девочки', 1316608437, 0, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.163 Safari/535.1', '178.121.141.146'),
(43, 'shop', 151, 'Илья', '', '', 276, 'действительно !', 1316609335, 0, 'Mozilla/5.0 (Windows NT 6.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '178.121.141.146');

-- --------------------------------------------------------

--
-- Структура таблицы `components`
--

CREATE TABLE IF NOT EXISTS `components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `identif` varchar(25) NOT NULL,
  `enabled` int(1) NOT NULL,
  `autoload` int(1) NOT NULL,
  `in_menu` int(1) NOT NULL default '0',
  `settings` text,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`),
  KEY `identif` (`identif`),
  KEY `enabled` (`enabled`),
  KEY `autoload` (`autoload`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Дамп данных таблицы `components`
--

INSERT INTO `components` (`id`, `name`, `identif`, `enabled`, `autoload`, `in_menu`, `settings`) VALUES
(1, 'user_manager', 'user_manager', 0, 0, 0, NULL),
(2, 'auth', 'auth', 1, 1, 1, NULL),
(4, 'comments', 'comments', 1, 1, 1, 'a:5:{s:18:"max_comment_length";i:550;s:6:"period";i:0;s:11:"can_comment";i:0;s:11:"use_captcha";b:1;s:14:"use_moderation";b:0;}'),
(7, 'navigation', 'navigation', 1, 1, 1, NULL),
(30, 'tags', 'tags', 1, 1, 1, NULL),
(92, 'gallery', 'gallery', 1, 0, 1, 'a:26:{s:13:"max_file_size";s:1:"5";s:9:"max_width";s:1:"0";s:10:"max_height";s:1:"0";s:7:"quality";s:2:"95";s:14:"maintain_ratio";b:1;s:19:"maintain_ratio_prev";b:1;s:19:"maintain_ratio_icon";b:1;s:4:"crop";b:0;s:9:"crop_prev";b:0;s:9:"crop_icon";b:0;s:14:"prev_img_width";s:3:"500";s:15:"prev_img_height";s:3:"500";s:11:"thumb_width";s:3:"100";s:12:"thumb_height";s:3:"100";s:14:"watermark_text";s:0:"";s:16:"wm_vrt_alignment";s:6:"bottom";s:16:"wm_hor_alignment";s:4:"left";s:19:"watermark_font_size";s:2:"14";s:15:"watermark_color";s:6:"ffffff";s:17:"watermark_padding";s:2:"-5";s:19:"watermark_font_path";s:20:"./system/fonts/1.ttf";s:15:"watermark_image";s:0:"";s:23:"watermark_image_opacity";s:2:"50";s:14:"watermark_type";s:4:"text";s:8:"order_by";s:4:"date";s:10:"sort_order";s:4:"desc";}'),
(55, 'rss', 'rss', 1, 0, 1, 'a:5:{s:5:"title";s:9:"Image CMS";s:11:"description";s:35:"Тестируем модуль RSS";s:10:"categories";a:1:{i:0;s:1:"3";}s:9:"cache_ttl";i:60;s:11:"pages_count";i:10;}'),
(72, 'imagebox', 'imagebox', 0, 1, 0, 'a:6:{s:9:"max_width";i:800;s:10:"max_height";i:600;s:11:"thumb_width";i:100;s:12:"thumb_height";i:100;s:14:"maintain_ratio";b:1;s:7:"quality";s:3:"95%";}'),
(60, 'menu', 'menu', 0, 1, 1, NULL),
(58, 'sitemap', 'sitemap', 1, 0, 1, 'a:5:{s:18:"main_page_priority";s:1:"1";s:13:"cats_priority";s:3:"0.9";s:14:"pages_priority";s:3:"0.5";s:20:"main_page_changefreq";s:6:"weekly";s:16:"pages_changefreq";s:7:"monthly";}'),
(80, 'search', 'search', 1, 0, 0, NULL),
(84, 'feedback', 'feedback', 1, 0, 0, 'a:2:{s:5:"email";s:15:"kelios@Inbox.ru";s:15:"message_max_len";i:550;}'),
(117, 'template_editor', 'template_editor', 0, 0, 0, NULL),
(86, 'group_mailer', 'group_mailer', 0, 0, 1, NULL),
(95, 'filter', 'filter', 1, 0, 0, NULL),
(96, 'cfcm', 'cfcm', 1, 1, 1, NULL),
(121, 'shop', 'shop', 1, 0, 0, NULL),
(122, 'sub_categories', 'sub_categories', 1, 1, 1, NULL),
(123, 'vk', 'vk', 1, 0, 0, NULL),
(124, 'size', 'size', 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` bigint(11) NOT NULL auto_increment,
  `title` varchar(500) NOT NULL,
  `meta_title` varchar(300) default NULL,
  `url` varchar(500) NOT NULL,
  `cat_url` varchar(260) default NULL,
  `keywords` text,
  `description` text,
  `prev_text` text,
  `full_text` longtext NOT NULL,
  `category` int(11) NOT NULL,
  `full_tpl` varchar(50) default NULL,
  `main_tpl` varchar(50) NOT NULL,
  `position` smallint(5) NOT NULL,
  `comments_status` smallint(1) NOT NULL,
  `comments_count` int(9) default '0',
  `post_status` varchar(15) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publish_date` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `showed` int(11) NOT NULL,
  `lang` int(11) NOT NULL default '0',
  `lang_alias` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `url` (`url`(333)),
  KEY `lang` (`lang`),
  KEY `post_status` (`post_status`(4)),
  KEY `cat_url` (`cat_url`),
  KEY `publish_date` (`publish_date`),
  KEY `category` (`category`),
  KEY `created` (`created`),
  KEY `updated` (`updated`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=154 ;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `title`, `meta_title`, `url`, `cat_url`, `keywords`, `description`, `prev_text`, `full_text`, `category`, `full_tpl`, `main_tpl`, `position`, `comments_status`, `comments_count`, `post_status`, `author`, `publish_date`, `created`, `updated`, `showed`, `lang`, `lang_alias`) VALUES
(74, 'Доставка и оплата заказов', '', 'zakaz', '', 'оформление, товара', 'Оформление товара', '<h4>Оформление товара</h4>', '', 0, '', '', 2, 1, 0, 'publish', 'kelios', 1313577805, 1313577805, 1315341943, 161, 3, 0),
(75, 'Гарантии', '', 'garantii', '', 'гарантия, качества', 'Гарантия качества', '<p>Гарантия качества</p>', '', 0, '', '', 3, 1, 0, 'publish', 'kelios', 1313578091, 1313578091, 0, 96, 3, 0),
(76, 'Обратная связь', '', 'obratnaia-sviaz', '', '', '+7 (903) 002-003-1', '<p>+7 (903) 002-003-1</p>', '', 0, 'feedback_menu', '', 4, 1, 0, 'publish', 'kelios', 1313578218, 1313578218, 1315217134, 80, 3, 0),
(77, 'FAQ', '', 'faq', '', 'часто, задаваемые, вопросы', 'Часто задаваемые вопросы', '<h1>Часто задаваемые вопросы</h1>', '', 0, 'feedback', '', 5, 1, 0, 'publish', 'kelios', 1313578301, 1313578301, 1315207259, 106, 3, 0),
(73, 'Советы профессионала', '', 'sovety-professionala', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 1, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315342757, 62, 3, 0),
(138, 'Советы профессионала', '', 'sovety-professionala17', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 2, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(90, 'dfghj', '', 'dfghj', 'tovar/', 'sdfghjkl', 'sdfghjkl', '<p>sdfghjkl</p>', '', 61, 'product.tpl', 'category.tpl', 0, 0, 0, 'publish', 'kelios', 1314254122, 1314254122, 0, 0, 3, 0),
(104, 'Доставка', '', 'dostavka', '', 'оформление, товара', 'Оформление товара', '<h1>Оформление товара</h1>', '', 0, 'dostavka', '', 0, 1, 0, 'publish', 'kelios', 1314786804, 1314786804, 0, 17, 3, 0),
(105, 'РАЗМЕР', '', 'razmer', '', 'определение, размера', 'Определение размера', '<h1>Определение размера</h1>', '', 0, 'zakaz', '', 0, 1, 0, 'publish', 'kelios', 1314882896, 1314882896, 0, 8, 3, 0),
(137, 'Советы профессионала', '', 'sovety-professionala34', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 3, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(136, 'Советы профессионала', '', 'sovety-professionala28', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 4, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 39, 3, 0),
(135, 'Советы профессионала', '', 'sovety-professionala224', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 5, 1, 0, 'publish', 'vinilzen', 1313575731, 1313575731, 1316443943, 39, 3, 0),
(134, 'Советы профессионала', '', 'sovety-professionala52', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 6, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(133, 'Советы профессионала', '', 'sovety-professionala2222', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 7, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 39, 3, 0),
(132, 'Советы профессионала', '', 'sovety-professionala242', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 8, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(131, 'Советы профессионала', '', 'sovety-professionala322', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 9, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0);
INSERT INTO `content` (`id`, `title`, `meta_title`, `url`, `cat_url`, `keywords`, `description`, `prev_text`, `full_text`, `category`, `full_tpl`, `main_tpl`, `position`, `comments_status`, `comments_count`, `post_status`, `author`, `publish_date`, `created`, `updated`, `showed`, `lang`, `lang_alias`) VALUES
(130, 'Советы профессионала', '', 'sovety-professionala9', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 10, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(129, 'Советы профессионала', '', 'sovety-professionala32', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 11, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(128, 'Советы профессионала', '', 'sovety-professionala24', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 12, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(127, 'Советы профессионала', '', 'sovety-professionala222', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 39, 3, 0),
(126, 'Советы профессионала', '', 'sovety-professionala5', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 14, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 39, 3, 0),
(125, 'Советы профессионала', '', 'sovety-professionala22', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 15, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(123, 'Советы профессионала', '', 'sovety-professionala2', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 16, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 39, 3, 0),
(124, 'Советы профессионала', '', 'sovety-professionala3', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 17, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(139, 'Советы профессионала', '', 'sovety-professionala342', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 18, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0);
INSERT INTO `content` (`id`, `title`, `meta_title`, `url`, `cat_url`, `keywords`, `description`, `prev_text`, `full_text`, `category`, `full_tpl`, `main_tpl`, `position`, `comments_status`, `comments_count`, `post_status`, `author`, `publish_date`, `created`, `updated`, `showed`, `lang`, `lang_alias`) VALUES
(140, 'Советы профессионала', '', 'sovety-professionala282', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 19, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(141, 'Советы профессионала', '', 'sovety-professionala2242', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 20, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(142, 'Советы профессионала', '', 'sovety-professionala522', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(143, 'Советы профессионала', '', 'sovety-professionala22222', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(144, 'Советы профессионала', '', 'sovety-professionala2422', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(145, 'Советы профессионала', '', 'sovety-professionala3222', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(146, 'Советы профессионала', '', 'sovety-professionala92', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(147, 'Советы профессионала', '', 'sovety-professionala324', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(148, 'Советы профессионала', '', 'sovety-professionala244', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0);
INSERT INTO `content` (`id`, `title`, `meta_title`, `url`, `cat_url`, `keywords`, `description`, `prev_text`, `full_text`, `category`, `full_tpl`, `main_tpl`, `position`, `comments_status`, `comments_count`, `post_status`, `author`, `publish_date`, `created`, `updated`, `showed`, `lang`, `lang_alias`) VALUES
(149, 'Советы профессионала', '', 'sovety-professionala2224', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(150, 'Советы профессионала', '', 'sovety-professionala54', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(151, 'Советы профессионала', '', 'sovety-professionala228', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(152, 'Советы профессионала', '', 'sovety-professionala216', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0),
(153, 'Советы профессионала', '', 'sovety-professionala38', 'novosti/', 'предлагаем, вашему, вниманию, фотографии, ежегодного, шоу, показа, роскошного, женского, нижнего, белья, victoria, secret, fashion, show, который, состоялся, майами, прошлые, выходные, ноября, несмотря, всемирный, экономический, кризис, тридцать, пять, самых, сексуальных, моделей', 'Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный  экономический кризис. Тридцать пять сам', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного  женского нижнего белья Victoria''s Secret Fashion Show 2008, который  состоялся в Майами в прошлые выходные, 15 ноября...</p>', '<p>Предлагаем вашему вниманию фотографии с ежегодного шоу-показа роскошного женского нижнего белья Victoria''s Secret Fashion Show 2008, который состоялся в Майами в прошлые выходные, 15 ноября, несмотря на всемирный экономический кризис. Тридцать пять самых сексуальных моделей</p>\n<div class="img_text"><img src="/uploads/images/6.jpg" alt="" width="181" height="191" />\n<div>Victoria''s Secret Fashion Show 2008</div>\n</div>\n<p>планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>\n<p>&nbsp;</p>\n<p>В шоу-представлении <a href="#">Victoria''s Secret</a>, проходившем на этот раз на солнечном берегу в Майами-Бич, приняли участие постоянные ангелы Victoria''s Secret: Каролина Куркова (Karolina Kurkova), Адриана Лима (Adriana Lima), Хайди Клум (Heidi Klum), Изабель Гулар (Izabel Goulart), Селита Ибэнкс (Selita Ebanks), Миранда Керр (Miranda Kerr), Мариса Миллер (Marisa Miller), Алессандра Амброзио (Alessandra Ambrosio), родившая в августе дочку Ану Луизу Мазур.</p>\n<p>А также другие известные топ-модели, в том числе: Ана Беатрис Баррош (Ana Beatriz Barros), Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes), Лара Стоун (Lara Stone), Каролин Винберг (Caroline Winberg), Изабели Фонтана (Isabeli Fontana), Ингуна Бутане (Inguna Butane), Кармен Кась (Carmen Kass) и другие.</p>\n<p>Пожалуй, наиболее запоминающимся нарядом на прошедшем показе стал самый дорогой в мире бюстгальтер Black Diamond Fantasy Miracle Bra, усыпанный черными бриллиантами и рубинами стоимостью 5 миллионов долларов, который был разработан ювелиром Мартином Кацом (<a href="#">Martin Katz</a>).</p>\n<p>Бразильской топ-модели Адриане Лиме (Adriana Lima) посчастливилось выйти в нем (Black Diamond Fantasy Miracle Bra) на подиум в тот вечер.</p>\n<p>Также приняли участие и другие известные топ-модели, в том числе:</p>\n<ul>\n<li>Ана Беатрис Баррош (Ana Beatriz Barros),</li>\n<li>Наташа Поли (Natasha Poly), Даутцен Крез (Doutzen Kroes),</li>\n<li>Лара Стоун (Lara Stone),</li>\n<li>Каролин Винберг (Caroline Winberg),</li>\n<li>Изабели Фонтана (Isabeli Fontana),</li>\n<li>Ингуна Бутане (Inguna Butane),</li>\n<li>Кармен Кась (Carmen Kass).</li>\n</ul>\n<p>Тридцать пять самых сексуальных моделей планеты в очередной раз превратили модный показ в грандиозный спектакль под аккомпанемент выступления популярного R&amp;B-исполнителя Ашера (Usher).</p>', 56, '', '', 13, 1, 0, 'publish', 'kelios', 1313575731, 1313575731, 1315340920, 38, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `content_fields`
--

CREATE TABLE IF NOT EXISTS `content_fields` (
  `field_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `group` int(11) NOT NULL default '0',
  `weight` int(11) NOT NULL,
  `in_search` tinyint(1) default '0',
  PRIMARY KEY  (`field_name`),
  UNIQUE KEY `field_name` (`field_name`),
  KEY `type` (`type`),
  KEY `in_search` (`in_search`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `content_fields`
--

INSERT INTO `content_fields` (`field_name`, `type`, `label`, `data`, `group`, `weight`, `in_search`) VALUES
('field_field1', 'text', 'Field 1', '', 7, 1, 1),
('field_pole2', 'select', 'Pole 2', 'a:3:{s:7:"initial";s:13:"value1\nvalue2";s:9:"help_text";s:0:"";s:10:"validation";s:0:"";}', 7, 2, 1),
('field_image', 'text', 'image', 'a:4:{s:7:"initial";s:0:"";s:9:"help_text";s:0:"";s:20:"enable_image_browser";s:1:"1";s:10:"validation";s:0:"";}', 0, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `content_fields_data`
--

CREATE TABLE IF NOT EXISTS `content_fields_data` (
  `id` int(11) NOT NULL auto_increment,
  `item_id` int(11) NOT NULL,
  `item_type` varchar(15) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `item_id` (`item_id`),
  KEY `item_type` (`item_type`),
  KEY `field_name` (`field_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `content_fields_data`
--

INSERT INTO `content_fields_data` (`id`, `item_id`, `item_type`, `field_name`, `data`) VALUES
(5, 73, 'page', 'field_image', '/uploads/images/7.jpg'),
(20, 137, 'page', 'field_image', '/uploads/images/7.jpg'),
(19, 136, 'page', 'field_image', '/uploads/images/7.jpg'),
(18, 135, 'page', 'field_image', '/uploads/images/snow.jpg'),
(17, 134, 'page', 'field_image', '/uploads/images/7.jpg'),
(16, 133, 'page', 'field_image', '/uploads/images/7.jpg'),
(15, 132, 'page', 'field_image', '/uploads/images/7.jpg'),
(14, 131, 'page', 'field_image', '/uploads/images/7.jpg'),
(13, 130, 'page', 'field_image', '/uploads/images/7.jpg'),
(12, 129, 'page', 'field_image', '/uploads/images/7.jpg'),
(11, 128, 'page', 'field_image', '/uploads/images/7.jpg'),
(10, 127, 'page', 'field_image', '/uploads/images/7.jpg'),
(9, 126, 'page', 'field_image', '/uploads/images/7.jpg'),
(8, 125, 'page', 'field_image', '/uploads/images/7.jpg'),
(7, 124, 'page', 'field_image', '/uploads/images/7.jpg'),
(6, 123, 'page', 'field_image', '/uploads/images/7.jpg'),
(21, 138, 'page', 'field_image', '/uploads/images/7.jpg'),
(22, 139, 'page', 'field_image', '/uploads/images/7.jpg'),
(23, 140, 'page', 'field_image', '/uploads/images/7.jpg'),
(24, 141, 'page', 'field_image', '/uploads/images/7.jpg'),
(25, 142, 'page', 'field_image', '/uploads/images/7.jpg'),
(26, 143, 'page', 'field_image', '/uploads/images/7.jpg'),
(27, 144, 'page', 'field_image', '/uploads/images/7.jpg'),
(28, 145, 'page', 'field_image', '/uploads/images/7.jpg'),
(29, 146, 'page', 'field_image', '/uploads/images/7.jpg'),
(30, 147, 'page', 'field_image', '/uploads/images/7.jpg'),
(31, 148, 'page', 'field_image', '/uploads/images/7.jpg'),
(32, 149, 'page', 'field_image', '/uploads/images/7.jpg'),
(33, 150, 'page', 'field_image', '/uploads/images/7.jpg'),
(34, 151, 'page', 'field_image', '/uploads/images/7.jpg'),
(35, 152, 'page', 'field_image', '/uploads/images/7.jpg'),
(36, 153, 'page', 'field_image', '/uploads/images/7.jpg'),
(37, 74, 'page', 'field_image', ''),
(38, 56, 'category', 'field_image', '');

-- --------------------------------------------------------

--
-- Структура таблицы `content_field_groups`
--

CREATE TABLE IF NOT EXISTS `content_field_groups` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `content_field_groups`
--

INSERT INTO `content_field_groups` (`id`, `name`, `description`) VALUES
(7, 'test', 'sdfsdfsdf');

-- --------------------------------------------------------

--
-- Структура таблицы `content_permissions`
--

CREATE TABLE IF NOT EXISTS `content_permissions` (
  `id` bigint(11) NOT NULL auto_increment,
  `page_id` bigint(11) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `content_permissions`
--


-- --------------------------------------------------------

--
-- Структура таблицы `content_tags`
--

CREATE TABLE IF NOT EXISTS `content_tags` (
  `id` int(11) NOT NULL auto_increment,
  `page_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `page_id` (`page_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- Дамп данных таблицы `content_tags`
--


-- --------------------------------------------------------

--
-- Структура таблицы `gallery_albums`
--

CREATE TABLE IF NOT EXISTS `gallery_albums` (
  `id` int(11) NOT NULL auto_increment,
  `category_id` int(11) default NULL,
  `name` varchar(250) default NULL,
  `description` varchar(500) default NULL,
  `cover_id` int(11) default '0',
  `position` int(9) default '0',
  `created` int(11) default NULL,
  `updated` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `category_id` (`category_id`),
  KEY `created` (`created`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `gallery_albums`
--

INSERT INTO `gallery_albums` (`id`, `category_id`, `name`, `description`, `cover_id`, `position`, `created`, `updated`) VALUES
(1, 1, 'new album', '', 0, 0, 1264086406, 1307538865);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_category`
--

CREATE TABLE IF NOT EXISTS `gallery_category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(250) default NULL,
  `description` varchar(500) default NULL,
  `cover_id` int(11) default '0',
  `position` int(9) default '0',
  `created` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `created` (`created`),
  KEY `position` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `gallery_category`
--

INSERT INTO `gallery_category` (`id`, `name`, `description`, `cover_id`, `position`, `created`) VALUES
(1, 'test category', '', 0, 0, 1264086398);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_images`
--

CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` int(11) NOT NULL auto_increment,
  `album_id` int(11) default NULL,
  `file_name` varchar(150) default NULL,
  `file_ext` varchar(8) default NULL,
  `file_size` varchar(20) default NULL,
  `position` int(9) default NULL,
  `width` int(6) default NULL,
  `height` int(6) default NULL,
  `description` varchar(500) default NULL,
  `uploaded` int(11) default NULL,
  `views` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `album_id` (`album_id`),
  KEY `position` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Дамп данных таблицы `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `album_id`, `file_name`, `file_ext`, `file_size`, `position`, `width`, `height`, `description`, `uploaded`, `views`) VALUES
(18, 1, 'test', '.jpg', '201.3 Кб', 1, 800, 600, NULL, 1266935445, 229),
(19, 1, 'Frangipani_Flowers', '.jpg', '53.2 Кб', 2, 800, 600, NULL, 1266935848, 231),
(37, 1, 'flowers', '.jpg', '81.8 Кб', 4, 800, 600, NULL, 1307538860, 0),
(36, 1, 'winter', '.jpg', '103.1 Кб', 3, 800, 600, NULL, 1307538860, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL auto_increment,
  `lang_name` varchar(100) NOT NULL,
  `identif` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `folder` varchar(100) NOT NULL,
  `template` varchar(100) NOT NULL,
  `default` int(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `identif` (`identif`),
  KEY `default` (`default`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `lang_name`, `identif`, `image`, `folder`, `template`, `default`) VALUES
(3, 'Русский', 'ru', '', 'russian', 'default', 1),
(30, 'ua', 'ua', '', 'english', 'commerce', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL auto_increment,
  `ip_address` varchar(40) NOT NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `ip_address` (`ip_address`),
  KEY `time` (`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Дамп данных таблицы `login_attempts`
--


-- --------------------------------------------------------

--
-- Структура таблицы `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `date` (`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=302 ;

--
-- Дамп данных таблицы `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `username`, `message`, `date`) VALUES
(42, 1, 'kelios', 'Очистил кеш', 1313156906),
(43, 1, 'kelios', 'Удалил страницу ID 69', 1313161380),
(44, 1, 'kelios', 'Удалил страницу ID 64', 1313162987),
(45, 1, 'kelios', 'Удалил страницу ID 35', 1313162991),
(46, 1, 'kelios', 'Удалил страницу ID 65', 1313162996),
(47, 1, 'kelios', 'Удалил страницу ID 66', 1313163000),
(48, 1, 'kelios', 'Удалил страницу ID 67', 1313163004),
(49, 1, 'kelios', 'Удалил страницу ID 68', 1313163009),
(50, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1313163151),
(51, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1313163180),
(52, 1, 'kelios', 'Очистил кеш', 1313163232),
(53, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1313166825),
(54, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1313324939),
(55, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1313494096),
(56, 1, 'kelios', 'Удалил виджет recent_product_comments', 1313498140),
(57, 1, 'kelios', 'Удалил виджет latest_news', 1313498143),
(58, 1, 'kelios', 'Очистил кеш', 1313498154),
(59, 1, 'kelios', 'Создал виджет navigation', 1313498221),
(60, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1313511518),
(61, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1313571073),
(62, 1, 'kelios', 'Удалил виджет navigation', 1313571154),
(63, 1, 'kelios', 'Создал виджет recent_product_comments', 1313571258),
(64, 1, 'kelios', 'Создал виджет latest_news', 1313571306),
(65, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1313575815),
(66, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1313575907),
(67, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1313575966),
(68, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1313576402),
(69, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1313576983),
(70, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1313577074),
(71, 1, 'kelios', 'Очистил кеш', 1313577103),
(72, 1, 'kelios', 'Очистил кеш', 1313577736),
(73, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/74''); return false;">Доставка и оплата заказов</a>', 1313578084),
(74, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/75''); return false;">Гарантии</a>', 1313578188),
(75, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/76''); return false;">Обратная связь</a>', 1313578291),
(76, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/77''); return false;">FAQ</a>', 1313578332),
(77, 1, 'kelios', 'Создал виджет navigation', 1313578986),
(78, 1, 'kelios', 'Очистил кеш', 1313580936),
(79, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/74''); return false;">Доставка и оплата заказов</a>', 1313581377),
(80, 1, 'kelios', 'Очистил кеш', 1313581481),
(81, 1, 'kelios', 'Очистил кеш', 1313582553),
(82, 1, 'kelios', 'Создал виджет qqq', 1313582697),
(83, 1, 'kelios', 'Удалил виджет qqq', 1313582701),
(84, 1, 'kelios', 'Изменил настройки модуля navigation', 1313584455),
(85, 1, 'kelios', 'Изменил настройки модуля cfcm', 1313584498),
(86, 1, 'kelios', 'Очистил кеш', 1313584567),
(87, 1, 'kelios', 'Изменил настройки сайта', 1313584597),
(88, 1, 'kelios', 'Изменил настройки модуля navigation', 1313585052),
(89, 1, 'kelios', 'Удалил виджет navigation', 1313585063),
(90, 1, 'kelios', 'Очистил кеш', 1313585075),
(91, 1, 'kelios', 'Создал виджет navigation', 1313585095),
(92, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1313657192),
(93, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1313658770),
(94, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1313659985),
(95, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1313665943),
(96, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1313667654),
(97, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1313667667),
(98, 1, 'kelios', 'Очистил кеш', 1313668060),
(99, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/78''); return false;">qqq</a>', 1313669174),
(100, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/78''); return false;">qqq</a>', 1313669414),
(101, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/78''); return false;">qqq</a>', 1313669474),
(102, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/78''); return false;">Вечернее платье</a>', 1313670117),
(103, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/78''); return false;">Вечернее платье</a>', 1313670142),
(104, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/78''); return false;">Вечернее платье</a>', 1313670220),
(105, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/78''); return false;">Вечернее платье</a>', 1313670427),
(106, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/78''); return false;">Вечернее платье</a>', 1313670458),
(107, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/78''); return false;">Вечернее платье</a>', 1313670499),
(108, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/79''); return false;">Вечернее платье</a>', 1313670674),
(109, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/79''); return false;">Вечернее платье</a>', 1313670681),
(110, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/79''); return false;">Вечернее платье</a>', 1313670685),
(111, 1, 'kelios', 'Очистил кеш', 1313675917),
(112, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314014936),
(113, 1, 'kelios', 'Изменил настройки модуля auth', 1314087579),
(114, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314093641),
(115, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314253246),
(116, 1, 'kelios', '\n                        Создал категорию   \n                        <a href="#" onclick="edit_category(61); return false;">Товар</a>', 1314254097),
(117, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/90''); return false;">dfghj</a>', 1314254180),
(118, 1, 'kelios', 'Очистил кеш', 1314256403),
(119, 1, 'kelios', 'Изменил настройки модуля sub_categories', 1314256723),
(120, 1, 'kelios', 'Очистил кеш', 1314257939),
(121, 1, 'kelios', 'Очистил кеш', 1314262212),
(122, 1, 'kelios', 'Создал виджет main_one', 1314264463),
(123, 1, 'kelios', 'Изменил виджет main_one', 1314264867),
(124, 1, 'kelios', 'Изменил виджет main_one', 1314264939),
(125, 1, 'kelios', 'Изменил виджет main_one', 1314265006),
(126, 1, 'kelios', 'Создал виджет main_two', 1314265427),
(127, 1, 'kelios', 'Изменил виджет main_2', 1314265437),
(128, 1, 'kelios', 'Изменил виджет main_1', 1314265450),
(129, 1, 'kelios', 'Создал виджет main_3', 1314265511),
(130, 1, 'kelios', 'Создал виджет main_4', 1314265541),
(131, 1, 'kelios', 'Создал виджет main_5', 1314265556),
(132, 1, 'kelios', 'Создал виджет main_6', 1314265622),
(133, 1, 'kelios', 'Изменил виджет main_3', 1314265701),
(134, 1, 'kelios', 'Изменил виджет main_5', 1314265741),
(135, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314269759),
(136, 1, 'kelios', 'Очистил кеш', 1314286510),
(137, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314361412),
(138, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314376047),
(139, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/74''); return false;">Доставка и оплата заказов</a>', 1314376076),
(140, 1, 'kelios', 'Очистил кеш', 1314376086),
(141, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314604999),
(142, 1, 'kelios', '\n                        Создал категорию   \n                        <a href="#" onclick="edit_category(62); return false;">zakaz</a>', 1314611600),
(143, 1, 'kelios', 'Очистил кеш', 1314621190),
(144, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314623947),
(145, 1, 'kelios', 'Очистил кеш', 1314623959),
(146, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314626893),
(147, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1314637626),
(148, 1, 'kelios', 'Очистил кеш', 1314637632),
(149, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1314638360),
(150, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/72''); return false;">Новости</a>', 1314638452),
(151, 1, 'kelios', 'Очистил кеш', 1314638481),
(152, 1, 'kelios', 'Удалил страницу ID 72', 1314638663),
(153, 1, 'kelios', '\n                        Изменил категорию   \n                        <a href="#" onclick="edit_category(56); return false;">Новости и акции</a>', 1314640952),
(154, 1, 'kelios', '\n                        Изменил категорию   \n                        <a href="#" onclick="edit_category(56); return false;">Новости</a>', 1314641125),
(155, 1, 'kelios', '\n                        Изменил категорию   \n                        <a href="#" onclick="edit_category(56); return false;">Новости</a>', 1314641140),
(156, 1, 'kelios', '\n                        Изменил категорию   \n                        <a href="#" onclick="edit_category(62); return false;">zakaz</a>', 1314705174),
(157, 1, 'kelios', '\n                        Изменил категорию   \n                        <a href="#" onclick="edit_category(62); return false;">dostavka</a>', 1314705268),
(158, 1, 'kelios', 'Очистил кеш', 1314705274),
(159, 1, 'kelios', '\n                        Изменил категорию   \n                        <a href="#" onclick="edit_category(62); return false;">dostavka</a>', 1314705319),
(160, 1, 'kelios', '\n                        Изменил категорию   \n                        <a href="#" onclick="edit_category(62); return false;">dostavka</a>', 1314705602),
(161, 1, 'kelios', '\n                        Изменил категорию   \n                        <a href="#" onclick="edit_category(62); return false;">dostavka</a>', 1314705929),
(162, 1, 'kelios', '\n                        Изменил категорию   \n                        <a href="#" onclick="edit_category(62); return false;">dostavka</a>', 1314705957),
(163, 1, 'kelios', '\n                        Изменил категорию   \n                        <a href="#" onclick="edit_category(62); return false;">dostavka</a>', 1314707196),
(164, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314719403),
(165, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314785444),
(166, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/104''); return false;">Доставка</a>', 1314786867),
(167, 1, 'kelios', 'Удалил категорию ID 62', 1314786994),
(168, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1314789290),
(169, 1, 'kelios', 'Очистил кеш', 1314790495),
(170, 1, 'kelios', 'Очистил кеш', 1314794267),
(171, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/105''); return false;">РАЗМЕР</a>', 1314883284),
(172, 1, 'kelios', 'Очистил кеш', 1314966414),
(173, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/77''); return false;">FAQ</a>', 1315207259),
(174, 1, 'kelios', 'Создал виджет support', 1315209196),
(175, 1, 'kelios', 'Создал виджет support_user', 1315209277),
(176, 1, 'kelios', 'Удалил виджет support_user', 1315209788),
(177, 1, 'kelios', 'Удалил виджет support', 1315209792),
(178, 1, 'kelios', 'Создал виджет path', 1315209804),
(179, 1, 'kelios', 'Удалил виджет path', 1315215277),
(180, 1, 'kelios', 'Создал виджет support_answer', 1315215477),
(181, 1, 'kelios', 'Изменил виджет support', 1315215660),
(182, 1, 'kelios', 'Изменил виджет support', 1315215733),
(183, 1, 'kelios', 'Изменил виджет support', 1315215786),
(184, 1, 'kelios', 'Изменил виджет support', 1315215855),
(185, 1, 'kelios', 'Изменил виджет support', 1315215880),
(186, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/76''); return false;">Обратная связь</a>', 1315217134),
(187, 1, 'kelios', 'Создал виджет footer', 1315219679),
(188, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315220620),
(189, 1, 'kelios', 'Удалил страницу ID 103', 1315220679),
(190, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315220782),
(191, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315220877),
(192, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315220954),
(193, 1, 'kelios', 'Очистил кеш', 1315225536),
(194, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1315226382),
(195, 1, 'kelios', 'Очистил кеш', 1315234206),
(196, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1315300375),
(197, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1315300382),
(198, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1315300466),
(199, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1315307885),
(200, 1, 'kelios', 'Изменил настройки модуля vk', 1315307947),
(201, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1315313333),
(202, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/93''); return false;">Вечернее платье</a>', 1315313619),
(203, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/93''); return false;">Вечернее платье</a>', 1315313760),
(204, 1, 'kelios', 'Удалил страницу ID ', 1315313862),
(205, 1, 'kelios', 'Удалил страницу ID 93', 1315313862),
(206, 1, 'kelios', 'Удалил страницу ID 79', 1315313862),
(207, 1, 'kelios', 'Удалил страницу ID 94', 1315313862),
(208, 1, 'kelios', 'Удалил страницу ID 91', 1315313862),
(209, 1, 'kelios', 'Удалил страницу ID 92', 1315313862),
(210, 1, 'kelios', 'Удалил страницу ID 80', 1315313862),
(211, 1, 'kelios', 'Удалил страницу ID 81', 1315313862),
(212, 1, 'kelios', 'Удалил страницу ID 82', 1315313862),
(213, 1, 'kelios', 'Удалил страницу ID 84', 1315313862),
(214, 1, 'kelios', 'Удалил страницу ID 85', 1315313862),
(215, 1, 'kelios', 'Удалил страницу ID 86', 1315313862),
(216, 1, 'kelios', 'Удалил страницу ID 87', 1315313862),
(217, 1, 'kelios', 'Удалил страницу ID 95', 1315313862),
(218, 1, 'kelios', 'Удалил страницу ID 96', 1315313862),
(219, 1, 'kelios', 'Удалил страницу ID 97', 1315313862),
(220, 1, 'kelios', 'Удалил страницу ID 98', 1315313862),
(221, 1, 'kelios', 'Удалил страницу ID 78', 1315313862),
(222, 1, 'kelios', 'Удалил страницу ID 83', 1315313862),
(223, 1, 'kelios', 'Удалил страницу ID 88', 1315313862),
(224, 1, 'kelios', 'Удалил страницу ID 89', 1315313862),
(225, 1, 'kelios', 'Удалил страницу ID 99', 1315313870),
(226, 1, 'kelios', 'Удалил страницу ID 100', 1315313870),
(227, 1, 'kelios', 'Удалил страницу ID 101', 1315313870),
(228, 1, 'kelios', 'Удалил страницу ID 102', 1315313870),
(229, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315313882),
(230, 1, 'kelios', 'Вошел в панель управления IP 178.120.125.179', 1315320736),
(231, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://test3.nineseven.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315322467),
(232, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://test3.nineseven.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315322620),
(233, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://test3.nineseven.ru/admin/pages/edit/106''); return false;">Советы профессионала</a>', 1315322658),
(234, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://test3.nineseven.ru/admin/pages/edit/107''); return false;">Советы профессионала</a>', 1315322698),
(235, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://test3.nineseven.ru/admin/pages/edit/108''); return false;">Советы профессионала</a>', 1315322717),
(236, 1, 'kelios', 'Удалил страницу ID 109', 1315322780),
(237, 1, 'kelios', 'Удалил страницу ID 114', 1315322792),
(238, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1315339452),
(239, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315340530),
(240, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315340563),
(241, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315340865),
(242, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315340920),
(243, 1, 'kelios', 'Удалил страницу ID 106', 1315340962),
(244, 1, 'kelios', 'Удалил страницу ID 107', 1315340962),
(245, 1, 'kelios', 'Удалил страницу ID 108', 1315340962),
(246, 1, 'kelios', 'Удалил страницу ID 110', 1315340962),
(247, 1, 'kelios', 'Удалил страницу ID 111', 1315340962),
(248, 1, 'kelios', 'Удалил страницу ID 112', 1315340962),
(249, 1, 'kelios', 'Удалил страницу ID 113', 1315340962),
(250, 1, 'kelios', 'Удалил страницу ID 115', 1315340962),
(251, 1, 'kelios', 'Удалил страницу ID 116', 1315340962),
(252, 1, 'kelios', 'Удалил страницу ID 117', 1315340962),
(253, 1, 'kelios', 'Удалил страницу ID 118', 1315340962),
(254, 1, 'kelios', 'Удалил страницу ID 119', 1315340962),
(255, 1, 'kelios', 'Удалил страницу ID 120', 1315340962),
(256, 1, 'kelios', 'Удалил страницу ID 121', 1315340962),
(257, 1, 'kelios', 'Удалил страницу ID 122', 1315340962),
(258, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/74''); return false;">Доставка и оплата заказов</a>', 1315341943),
(259, 1, 'kelios', '\n                        Изменил категорию   \n                        <a href="#" onclick="edit_category(56); return false;">Новости</a>', 1315342373),
(260, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315342595),
(261, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315342609),
(262, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://boginya-shop.ru/admin/pages/edit/73''); return false;">Советы профессионала</a>', 1315342757),
(263, 1, 'kelios', 'Вошел в панель управления IP 178.120.125.179', 1315384542),
(264, 1, 'kelios', 'Изменил виджет main_2', 1315384567),
(265, 1, 'kelios', 'Вошел в панель управления IP 178.120.125.179', 1315395056),
(266, 1, 'kelios', 'Вошел в панель управления IP 178.120.125.179', 1315398545),
(267, 1, 'kelios', 'Вошел в панель управления IP 178.120.125.179', 1315475133),
(268, 1, 'kelios', 'Установил модуль size', 1315475198),
(269, 1, 'kelios', 'Изменил настройки модуля size', 1315475216),
(270, 1, 'kelios', 'Вошел в панель управления IP 178.121.103.124', 1315819393),
(271, 1, 'kelios', 'Вошел в панель управления IP 178.121.103.124', 1315819732),
(272, 1, 'kelios', 'Очистил кеш', 1315819949),
(273, 1, 'kelios', 'Вошел в панель управления IP 178.121.103.124', 1315828613),
(274, 1, 'kelios', 'Изменил настройки сайта', 1315828729),
(275, 1, 'kelios', 'Изменил настройки сайта', 1315828771),
(276, 1, 'kelios', 'Вошел в панель управления IP 178.121.103.124', 1315829105),
(277, 1, 'kelios', 'Вошел в панель управления IP 178.121.103.124', 1315829449),
(278, 1, 'kelios', 'Вошел в панель управления IP 178.121.103.124', 1315831687),
(279, 1, 'kelios', 'Обновил пользователя admin', 1315831798),
(280, 1, 'kelios', 'Вышел из панели управления', 1315831819),
(281, 1, 'kelios', 'Вошел в панель управления IP 178.121.103.124', 1315891900),
(282, 1, 'kelios', 'Вошел в панель управления IP 178.121.103.124', 1315988758),
(283, 136, 'vinilzen', 'Вошел в панель управления IP 178.121.141.146', 1316443725),
(284, 136, 'vinilzen', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://test3.nineseven.ru/admin/pages/edit/135''); return false;">Советы профессионала</a>', 1316443943),
(285, 136, 'vinilzen', 'Очистил кеш', 1316609714),
(286, 136, 'vinilzen', 'Очистил кеш', 1316610927),
(287, 136, 'vinilzen', 'Очистил кеш', 1316610999),
(288, 136, 'vinilzen', 'Очистил кеш', 1316611244),
(289, 136, 'vinilzen', 'Очистил кеш', 1316611294),
(290, 136, 'vinilzen', 'Очистил кеш', 1316611641),
(291, 136, 'vinilzen', 'Очистил кеш', 1316611730),
(292, 136, 'vinilzen', 'Очистил кеш', 1316611746),
(293, 136, 'vinilzen', 'Очистил кеш', 1316611845),
(294, 136, 'vinilzen', 'Очистил кеш', 1316611987),
(295, 1, 'kelios', 'Вошел в панель управления IP 178.120.68.243', 1316677015),
(296, 1, 'kelios', 'Вошел в панель управления IP 178.120.68.243', 1316677021),
(297, 1, 'kelios', 'Вошел в панель управления IP 178.120.68.243', 1316677087),
(298, 1, 'kelios', 'Очистил кеш', 1316677139),
(299, 1, 'kelios', 'Вошел в панель управления IP 178.120.68.243', 1316680243),
(300, 1, 'kelios', 'Вошел в панель управления IP 178.120.68.243', 1316680248),
(301, 1, 'kelios', 'Очистил кеш', 1316680275);

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(250) NOT NULL,
  `main_title` varchar(300) NOT NULL,
  `tpl` varchar(255) default NULL,
  `expand_level` int(255) default NULL,
  `description` text,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `name`, `main_title`, `tpl`, `expand_level`, `description`, `created`) VALUES
(1, 'main_menu', 'Главное меню', '0', 0, NULL, '2010-04-27 13:54:43'),
(4, 'menu', 'main', '', 1, '', '2011-08-25 13:54:31');

-- --------------------------------------------------------

--
-- Структура таблицы `menus_data`
--

CREATE TABLE IF NOT EXISTS `menus_data` (
  `id` int(11) NOT NULL auto_increment,
  `menu_id` int(9) NOT NULL,
  `item_id` int(9) NOT NULL,
  `item_type` varchar(15) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `roles` text,
  `hidden` smallint(1) NOT NULL default '0',
  `title` varchar(300) NOT NULL,
  `parent_id` int(9) NOT NULL,
  `position` smallint(5) default NULL,
  `description` text,
  `add_data` text,
  PRIMARY KEY  (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `position` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `menus_data`
--

INSERT INTO `menus_data` (`id`, `menu_id`, `item_id`, `item_type`, `item_image`, `roles`, `hidden`, `title`, `parent_id`, `position`, `description`, `add_data`) VALUES
(1, 1, 0, 'url', '', '', 0, 'Главная', 0, 4, NULL, '/'),
(2, 1, 51, 'category', '', '', 0, 'Блог', 0, 3, NULL, NULL),
(3, 1, 0, 'module', '', '', 0, 'Обратная связь', 0, 1, NULL, 'a:2:{s:8:"mod_name";s:8:"feedback";s:6:"method";s:0:"";}'),
(4, 1, 0, 'module', '', '', 0, 'Галерея', 0, 2, NULL, 'a:2:{s:8:"mod_name";s:7:"gallery";s:6:"method";s:0:"";}'),
(14, 4, 77, 'page', '', '', 0, 'FAQ', 0, 5, NULL, 'a:1:{s:7:"newpage";s:1:"0";}'),
(15, 4, 76, 'page', '', '', 0, 'Обратная связь', 0, 4, NULL, 'a:1:{s:7:"newpage";s:1:"0";}'),
(16, 4, 75, 'page', '', '', 0, 'Гарантии', 0, 3, NULL, 'a:1:{s:7:"newpage";s:1:"0";}'),
(17, 4, 74, 'page', '', '', 0, 'Доставка и оплата заказов', 0, 2, NULL, 'a:1:{s:7:"newpage";s:1:"0";}'),
(19, 4, 56, 'category', '', '', 0, 'Новости', 0, 1, NULL, 'a:1:{s:7:"newpage";s:1:"0";}');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_translate`
--

CREATE TABLE IF NOT EXISTS `menu_translate` (
  `id` int(11) NOT NULL auto_increment,
  `item_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `item_id` (`item_id`),
  KEY `lang_id` (`lang_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `menu_translate`
--


-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL auto_increment,
  `role_id` int(11) NOT NULL,
  `data` text,
  PRIMARY KEY  (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `data`) VALUES
(1, 2, 'a:36:{s:9:"cp_access";s:1:"1";s:13:"cp_autoupdate";s:1:"1";s:14:"cp_page_search";s:1:"1";s:11:"lang_create";s:1:"1";s:9:"lang_edit";s:1:"1";s:11:"lang_delete";s:1:"1";s:16:"cp_site_settings";s:1:"1";s:11:"cache_clear";s:1:"1";s:11:"page_create";s:1:"1";s:9:"page_edit";s:1:"1";s:11:"page_delete";s:1:"1";s:15:"category_create";s:1:"1";s:13:"category_edit";s:1:"1";s:15:"category_delete";s:1:"1";s:14:"module_install";s:1:"1";s:16:"module_deinstall";s:1:"1";s:12:"module_admin";s:1:"1";s:13:"widget_create";s:1:"1";s:13:"widget_delete";s:1:"1";s:22:"widget_access_settings";s:1:"1";s:11:"menu_create";s:1:"1";s:9:"menu_edit";s:1:"1";s:11:"menu_delete";s:1:"1";s:11:"user_create";s:1:"1";s:21:"user_create_all_roles";s:1:"1";s:9:"user_edit";s:1:"1";s:11:"user_delete";s:1:"1";s:14:"user_view_data";s:1:"1";s:14:"xfields_create";s:1:"1";s:14:"xfields_delete";s:1:"1";s:12:"xfields_edit";s:1:"1";s:12:"roles_create";s:1:"1";s:10:"roles_edit";s:1:"1";s:12:"roles_delete";s:1:"1";s:9:"logs_view";s:1:"1";s:13:"backup_create";s:1:"1";}');

-- --------------------------------------------------------

--
-- Структура таблицы `propel_migration`
--

CREATE TABLE IF NOT EXISTS `propel_migration` (
  `version` int(11) default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `propel_migration`
--

INSERT INTO `propel_migration` (`version`) VALUES
(1307623010);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(30) NOT NULL,
  `alt_name` varchar(50) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `parent_id`, `name`, `alt_name`, `desc`) VALUES
(1, 0, 'user', 'Пользователи', ''),
(2, 0, 'admin', 'Администраторы', '');

-- --------------------------------------------------------

--
-- Структура таблицы `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(11) NOT NULL auto_increment,
  `hash` varchar(264) default NULL,
  `datetime` int(11) default NULL,
  `where_array` text,
  `select_array` text,
  `table_name` varchar(100) default NULL,
  `order_by` text,
  `row_count` int(11) default NULL,
  `total_rows` int(11) default NULL,
  `ids` text,
  `search_title` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `hash` (`hash`),
  KEY `datetime` (`datetime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `search`
--


-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL auto_increment,
  `s_name` varchar(50) NOT NULL,
  `site_title` varchar(200) NOT NULL,
  `site_short_title` varchar(50) NOT NULL,
  `site_description` varchar(200) NOT NULL,
  `site_keywords` varchar(200) NOT NULL,
  `create_keywords` varchar(25) NOT NULL,
  `create_description` varchar(25) NOT NULL,
  `create_cat_keywords` varchar(25) NOT NULL,
  `create_cat_description` varchar(25) NOT NULL,
  `add_site_name` int(1) NOT NULL,
  `add_site_name_to_cat` int(1) NOT NULL,
  `delimiter` varchar(5) NOT NULL,
  `editor_theme` varchar(10) NOT NULL,
  `site_template` varchar(50) NOT NULL,
  `site_offline` varchar(5) NOT NULL,
  `main_type` varchar(50) NOT NULL,
  `main_page_id` int(11) NOT NULL,
  `main_page_cat` text NOT NULL,
  `main_page_module` varchar(50) NOT NULL,
  `sidepanel` varchar(5) NOT NULL,
  `lk` varchar(250) default NULL,
  PRIMARY KEY  (`id`),
  KEY `s_name` (`s_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `s_name`, `site_title`, `site_short_title`, `site_description`, `site_keywords`, `create_keywords`, `create_description`, `create_cat_keywords`, `create_cat_description`, `add_site_name`, `add_site_name_to_cat`, `delimiter`, `editor_theme`, `site_template`, `site_offline`, `main_type`, `main_page_id`, `main_page_cat`, `main_page_module`, `sidepanel`, `lk`) VALUES
(2, 'main', 'boginya-shop.ru', 'boginya-shop', 'Продажа нижнего белья', 'нижнее белье, купальники', 'auto', 'auto', '0', '0', 1, 1, '/', 'advanced', 'commerce', 'no', 'module', 35, '1', 'shop', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_brands`
--

CREATE TABLE IF NOT EXISTS `shop_brands` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(500) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text,
  `meta_title` varchar(255) default NULL,
  `meta_description` varchar(255) default NULL,
  `meta_keywords` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `shop_brands_I_1` (`name`(333)),
  KEY `shop_brands_I_2` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `shop_brands`
--

INSERT INTO `shop_brands` (`id`, `name`, `url`, `description`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(26, 'Amarea', 'amarea', '', '', '', ''),
(27, 'Sharin', 'sharin', '', '', '', ''),
(28, 'Miss Clair', 'miss-clair', '', '', '', ''),
(29, 'Pierre Cerden', 'pierre-cerden', '', '', '', ''),
(30, 'NBB', 'nbb', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_category`
--

CREATE TABLE IF NOT EXISTS `shop_category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text,
  `meta_desc` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `parent_id` int(11) default NULL,
  `position` int(11) default NULL,
  `full_path` varchar(1000) default NULL,
  `full_path_ids` varchar(250) default NULL,
  `active` tinyint(4) default NULL,
  PRIMARY KEY  (`id`),
  KEY `shop_category_I_1` (`name`),
  KEY `shop_category_I_2` (`url`),
  KEY `shop_category_I_3` (`active`),
  KEY `shop_category_I_4` (`parent_id`),
  KEY `shop_category_I_5` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Дамп данных таблицы `shop_category`
--

INSERT INTO `shop_category` (`id`, `name`, `url`, `description`, `meta_desc`, `meta_title`, `meta_keywords`, `parent_id`, `position`, `full_path`, `full_path_ids`, `active`) VALUES
(60, 'Купальники', 'kupalniki', '', '', '', '', 0, 4, 'kupalniki', 'a:0:{}', 1),
(61, 'Чулки и колготки', 'chulki-i-kolgotki', '', '', '', '', 0, 5, 'chulki-i-kolgotki', 'a:0:{}', 1),
(62, 'Уход за лицом', 'uhod-za-litsom', '', '', '', '', 0, 6, 'uhod-za-litsom', 'a:0:{}', 1),
(63, 'Раздельные', 'razdelnye', '', '', '', '', 60, 7, 'kupalniki/razdelnye', 'a:1:{i:0;i:60;}', 1),
(64, 'Слитные', 'slitnye', '', '', '', '', 60, 8, 'kupalniki/slitnye', 'a:1:{i:0;i:60;}', 1),
(65, 'Пляжная одежда', 'pliazhnaia-odezhda', '', '', '', '', 60, 9, 'kupalniki/pliazhnaia-odezhda', 'a:1:{i:0;i:60;}', 1),
(67, 'Популярные товары', 'populiarnye-tovary', '', '', '', '', 0, 11, 'populiarnye-tovary', 'a:0:{}', 0),
(59, 'Нижнее белье', 'nizhnee-bele', '', '', '', '', 0, 3, 'nizhnee-bele', 'a:0:{}', 1),
(58, 'Ночное белье', 'nochnoe-bele', '', '', '', '', 0, 2, 'nochnoe-bele', 'a:0:{}', 1),
(57, 'Домашняя одежда', 'domashniaia-odezhda', '', '', '', '', 0, 10, 'domashniaia-odezhda', 'a:0:{}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_currencies`
--

CREATE TABLE IF NOT EXISTS `shop_currencies` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `main` tinyint(4) default NULL,
  `is_default` tinyint(4) default NULL,
  `code` varchar(5) default NULL,
  `symbol` varchar(5) default NULL,
  `rate` float(6,3) default '1.000',
  PRIMARY KEY  (`id`),
  KEY `shop_currencies_I_1` (`name`),
  KEY `shop_currencies_I_2` (`main`),
  KEY `shop_currencies_I_3` (`is_default`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `shop_currencies`
--

INSERT INTO `shop_currencies` (`id`, `name`, `main`, `is_default`, `code`, `symbol`, `rate`) VALUES
(1, 'Доллары', 1, 1, 'USD', '$', 1.000),
(2, 'Рубли', 0, 0, 'RUR', 'руб', 30.600);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_delivery_methods`
--

CREATE TABLE IF NOT EXISTS `shop_delivery_methods` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(500) NOT NULL,
  `description` text,
  `price` float(10,2) NOT NULL,
  `free_from` float(10,2) NOT NULL,
  `enabled` tinyint(4) default NULL,
  PRIMARY KEY  (`id`),
  KEY `shop_delivery_methods_I_1` (`name`(333)),
  KEY `shop_delivery_methods_I_2` (`enabled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `shop_delivery_methods`
--

INSERT INTO `shop_delivery_methods` (`id`, `name`, `description`, `price`, `free_from`, `enabled`) VALUES
(5, 'Курьером', '<p>Только по Киеву и Москве</p>', 0.00, 0.00, 1),
(6, 'Без доставки', '', 0.00, 0.00, 1),
(10, 'По почте', '', 0.00, 0.00, 1),
(14, 'Самолетом', '', 0.00, 0.00, 1),
(12, 'Поездом', '', 0.00, 0.00, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_delivery_methods_systems`
--

CREATE TABLE IF NOT EXISTS `shop_delivery_methods_systems` (
  `delivery_method_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  PRIMARY KEY  (`delivery_method_id`,`payment_method_id`),
  KEY `shop_delivery_methods_systems_FI_2` (`payment_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_delivery_methods_systems`
--

INSERT INTO `shop_delivery_methods_systems` (`delivery_method_id`, `payment_method_id`) VALUES
(5, 1),
(5, 2),
(5, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_discounts`
--

CREATE TABLE IF NOT EXISTS `shop_discounts` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `date_start` int(11) default NULL,
  `date_stop` int(11) default NULL,
  `discount` varchar(11) default NULL,
  `min_price` float(10,2) default NULL,
  `max_price` float(10,2) default NULL,
  `categories` text,
  `products` text,
  `description` text,
  `user_group` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `shop_discounts`
--

INSERT INTO `shop_discounts` (`id`, `name`, `active`, `date_start`, `date_stop`, `discount`, `min_price`, `max_price`, `categories`, `products`, `description`, `user_group`) VALUES
(4, 'Скидка на Видео технику', 1, 1293829200, 1309377600, '10%', 0.00, 0.00, 'a:3:{i:0;s:2:"37";i:1;s:2:"38";i:2;s:2:"39";}', '', '<p>Скидка на Видео технику в размере 10%</p>', 'N;');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_orders`
--

CREATE TABLE IF NOT EXISTS `shop_orders` (
  `id` int(11) NOT NULL auto_increment,
  `key` varchar(255) NOT NULL,
  `delivery_method` int(11) default NULL,
  `delivery_price` float(10,2) default NULL,
  `status` smallint(6) default NULL,
  `paid` tinyint(4) default NULL,
  `user_full_name` varchar(255) default NULL,
  `user_email` varchar(255) default NULL,
  `user_phone` varchar(255) default NULL,
  `user_deliver_to` varchar(500) default NULL,
  `user_comment` varchar(1000) default NULL,
  `date_created` int(11) default NULL,
  `date_updated` int(11) default NULL,
  `user_ip` varchar(255) default NULL,
  `user_id` int(11) default NULL,
  `city` varchar(255) default NULL,
  `street` varchar(255) default NULL,
  `numberhome` varchar(10) default NULL,
  `name` varchar(255) default NULL,
  `surname` varchar(255) default NULL,
  `additionalData` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `shop_orders_I_1` (`key`),
  KEY `shop_orders_I_2` (`status`),
  KEY `shop_orders_I_3` (`date_created`),
  KEY `shop_orders_FI_1` (`delivery_method`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Дамп данных таблицы `shop_orders`
--

INSERT INTO `shop_orders` (`id`, `key`, `delivery_method`, `delivery_price`, `status`, `paid`, `user_full_name`, `user_email`, `user_phone`, `user_deliver_to`, `user_comment`, `date_created`, `date_updated`, `user_ip`, `user_id`, `city`, `street`, `numberhome`, `name`, `surname`, `additionalData`) VALUES
(27, '38p40u736c', 6, 100.00, 2, 0, 'Administrator', 'admin@localhost.loc', '0808808080', 'sdfsdfsdf', '', 1302009177, 1302009177, '127.0.0.3', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'lg3m090799', 0, 0.00, 1, NULL, 'Алина', 'kelios@inbox.ru', '+7 (903) 002–003–1', 'Москва Профсоюзная 4–1/2', 'Введите текст сообщения', 1314890519, 1314890519, '127.0.0.1', 1, 'Москва', 'Профсоюзная', '4–1/2', NULL, 'Игнатенко', NULL),
(76, '8i9493n2m0', 6, 0.00, 0, NULL, 'Алина', 'kelios@inbox.ru', '+7 (903) 002–003–1', 'Москва Профсоюзная 4–1/2', 'Введите текст сообщения', 1315234470, 1315234470, '127.0.0.1', 1, 'Москва', 'Профсоюзная', '4–1/2', NULL, 'Игнатенко', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_orders_products`
--

CREATE TABLE IF NOT EXISTS `shop_orders_products` (
  `id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `product_name` varchar(255) default NULL,
  `variant_name` varchar(255) default NULL,
  `price` float(10,2) default NULL,
  `quantity` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `shop_orders_products_I_1` (`order_id`),
  KEY `shop_orders_products_FI_1` (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Дамп данных таблицы `shop_orders_products`
--

INSERT INTO `shop_orders_products` (`id`, `order_id`, `product_id`, `variant_id`, `product_name`, `variant_name`, `price`, `quantity`) VALUES
(31, 27, 94, 105, 'Yamaha NSIW760 Speaker', '', 99.95, 1),
(77, 69, 256, 278, 'Купальник 076 (копия) (копия) (копия) (копия) (копия) (копия) (копия) (копия) (копия) (копия)', 'Купальник 076', 120.00, 1),
(85, 76, 257, 279, 'купальник', 'купальник', 3000.00, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_payment_methods`
--

CREATE TABLE IF NOT EXISTS `shop_payment_methods` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `active` tinyint(4) default NULL,
  `currency_id` int(11) default NULL,
  `position` int(11) default NULL,
  `payment_system_name` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `shop_payment_methods_I_1` (`name`),
  KEY `shop_payment_methods_I_2` (`position`),
  KEY `shop_payment_methods_FI_1` (`currency_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `shop_payment_methods`
--

INSERT INTO `shop_payment_methods` (`id`, `name`, `description`, `active`, `currency_id`, `position`, `payment_system_name`) VALUES
(1, 'Оплата курьеру', '<p>Оплата через веб-моней</p>', 1, 1, 1, 'WebMoneySystem'),
(2, 'Оплата через Банк', '<p>Оплата через ОщадБанк Украины</p>', 1, 2, 2, 'OschadBankInvoiceSystem'),
(3, 'СберБанк России', '<p>Оплата через СберБанк России</p>', 1, 2, 3, 'SberBankInvoiceSystem');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_products`
--

CREATE TABLE IF NOT EXISTS `shop_products` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(500) NOT NULL,
  `url` varchar(255) NOT NULL,
  `active` tinyint(4) default NULL,
  `hit` tinyint(4) default NULL,
  `brand_id` int(11) default NULL,
  `category_id` int(11) NOT NULL,
  `related_products` varchar(255) default NULL,
  `mainImage` varchar(255) default NULL,
  `smallImage` varchar(255) default NULL,
  `short_description` text,
  `full_description` text,
  `meta_title` varchar(255) default NULL,
  `meta_description` varchar(255) default NULL,
  `meta_keywords` varchar(255) default NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `old_price` float(10,2) default NULL,
  `views` int(11) default NULL,
  `hot` tinyint(4) default NULL,
  `action` tinyint(4) default NULL,
  PRIMARY KEY  (`id`),
  KEY `shop_products_I_1` (`name`(333)),
  KEY `shop_products_I_2` (`url`),
  KEY `shop_products_I_3` (`brand_id`),
  KEY `shop_products_I_4` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=293 ;

--
-- Дамп данных таблицы `shop_products`
--

INSERT INTO `shop_products` (`id`, `name`, `url`, `active`, `hit`, `brand_id`, `category_id`, `related_products`, `mainImage`, `smallImage`, `short_description`, `full_description`, `meta_title`, `meta_description`, `meta_keywords`, `created`, `updated`, `old_price`, `views`, `hot`, `action`) VALUES
(273, 'Купальник 076 ', '273', 1, NULL, 26, 58, '', '273_main.jpg', '273_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315397068, 0.00, 6, 1, NULL),
(272, 'Купальник 089', '272', 1, NULL, 26, 58, '', '272_main.jpg', '272_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315821276, 0.00, 7, 1, NULL),
(271, 'Купальник 087', '271', 1, NULL, 26, 58, '', '271_main.jpg', '271_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315821257, 0.00, 6, 1, NULL),
(270, 'Купальник 088', '270', 1, NULL, 26, 58, '', '270_main.jpg', '270_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315821231, 0.00, 10, 1, NULL),
(269, 'Купальник 086 ', '269', 1, NULL, 26, 58, '', '269_main.jpg', '269_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315821211, 0.00, 6, 1, NULL),
(268, 'Купальник 085', '268', 1, NULL, 26, 58, '', '268_main.jpg', '268_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315821187, 0.00, 6, 1, NULL),
(267, 'Купальник 084', '267', 1, NULL, 26, 58, '', '267_main.jpg', '267_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315821100, 0.00, 6, 1, NULL),
(266, 'Купальник 083', '266', 1, NULL, 26, 58, '', '266_main.jpg', '266_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315821079, 0.00, 7, 1, NULL),
(265, 'Купальник 076 ', '265', 1, NULL, 26, 58, '', '265_main.jpg', '265_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315393108, 0.00, 6, 1, NULL),
(264, 'Купальник 082', '264', 1, NULL, 26, 58, '', '264_main.jpg', '264_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315821054, 0.00, 7, 1, NULL),
(263, 'Купальник 081', '263', 1, NULL, 26, 58, '', '263_main.jpg', '263_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315820694, 0.00, 6, 1, NULL),
(262, 'Купальник 080', '262', 1, NULL, 26, 58, '', '262_main.jpg', '262_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315820676, 0.00, 6, 1, NULL),
(260, 'Купальник 078', '260', 1, NULL, 26, 58, '', '260_main.jpg', '260_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315820633, 0.00, 6, 1, NULL),
(261, 'Купальник 079', '261', 1, NULL, 26, 58, '', '261_main.jpg', '261_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315820658, 0.00, 7, 1, NULL),
(258, 'Купальник 076', '258', 1, NULL, 26, 58, '', '258_main.jpg', '258_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315475397, 0.00, 17, 1, NULL),
(259, 'Купальник 077', '259', 1, NULL, 26, 58, '', '259_main.jpg', '259_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315317656, 1315820613, 0.00, 6, 1, NULL),
(274, 'купальник', '274', 1, NULL, 28, 63, '', '274_main.jpg', '274_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315320943, 1315825518, 0.00, 39, NULL, NULL),
(275, 'купальник ', '275', 1, NULL, 28, 60, '', '275_main.jpg', '275_small.jpg', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '<p>Лиф купальника имеет удобные мягкие тонкие лямочки. Чашки лифа  дополнены съемными поролоновыми вставками для придания дополнительного  объема груди, которые при необходимости можно извлечь. Лиф имеет  аксессуары в виде золотистых колечек.</p>\n<p>Эта форма лифа отлично подойдет на любой размер груди. Трусики &ndash;  низкие танга с сексуальными боковыми вырезами. На трусиках по бокам  аксессуары в виде колец анатомической формы, повторяющих изгибы бедер  для комфортной носки.</p>', '', '', '', 1315320943, 1315824843, 0.00, 44, NULL, NULL),
(276, 'Боди Соблазн', '276', 1, NULL, 0, 58, '', '276_main.jpg', '276_small.jpg', '', '<p>Состав: 92% полиамид 8% эластан<br /><strong>Цвета:</strong> розовый, черный</p>', '', '', '', 1315817074, 1315826851, 0.00, 142, NULL, NULL),
(277, 'Боди Бирюза', '277', 1, NULL, 0, 58, '', '277_main.jpg', '277_small.jpg', '', '<p>100% хлопок</p>\n<p>Цвета: Бирюзовый, Розовый, Белый.</p>', '', '', '', 1315817403, 1315826867, 0.00, 2, NULL, NULL),
(278, 'Купальник Обаяние', '278', 1, NULL, 26, 58, '', '278_main.jpg', '278_small.jpg', '', '<p>80% эластан, 20% полиамид</p>\n<p>Цвета: Черный, Синий</p>', '', '', '', 1315817533, 1315828770, 0.00, 10, NULL, NULL),
(279, 'Купальник Весенняя зелень', '279', 1, NULL, 26, 60, '', '279_main.jpg', '279_small.jpg', '', '<p>100% полиамид</p>\n<p>Цвета: Разноцветный</p>', '', '', '', 1315817702, 1315828777, 0.00, 8, NULL, NULL),
(280, 'Пляжный костюм', '280', 1, NULL, 26, 58, '', '280_main.jpg', '280_small.jpg', '', '<p>100% хлопок</p>\n<p>Цвета: Зеленый, Синий.</p>', '', '', '', 1315817973, 1315828751, 0.00, 2, NULL, NULL),
(281, 'Халат', '281', 1, NULL, 0, 58, '', '281_main.jpg', '281_small.jpg', '', '<p>Мягкая уютная ткань, 100% хлопок.</p>\n<p>Цвета: Лиловый, Сизый</p>', '', '', '', 1315818192, 1315818284, 0.00, 4, NULL, NULL),
(282, 'Халат', '282', 1, NULL, 0, 58, '', '282_main.jpg', '282_small.jpg', '', '<p>Удобный халатик с пояском.</p>\n<p>100% полиамид</p>\n<p>Цвета: Оранжевый, Зеленый</p>', '', '', '', 1315818469, 1315818562, 0.00, 3, NULL, NULL),
(283, 'Чулки-сетка', '283', 1, NULL, 0, 61, '', '283_main.jpg', '283_small.jpg', '', '<h3>Чулки в крупную сетку с ажурной резинкой на клеевой основе.</h3>', '', '', '', 1315818747, 1315892008, 0.00, 30, NULL, NULL),
(284, 'пляжный костюм', '284', 1, NULL, 0, 58, '', '284_main.jpg', '284_small.jpg', '', '<p>Вязаный пляжный костюм.</p>\n<p>100% акрил.</p>\n<p>Цвета: Белый, бежевый.</p>', '', '', '', 1315830330, 1315831232, 0.00, 4, NULL, NULL),
(285, 'Чулки', '285', 1, NULL, 0, 61, '', '285_main.jpg', '285_small.jpg', '', '', '', '', '', 1315833112, 1315892043, 0.00, 1, NULL, NULL),
(286, 'Чулки', '286', 1, NULL, 0, 58, '', '286_main.jpg', '286_small.jpg', '', '', '', '', '', 1315833447, 1315891965, 0.00, NULL, NULL, NULL),
(287, 'Крем для лица от пигментации', '287', 1, NULL, 0, 58, '', '287_main.jpg', '287_small.jpg', '', '', '', '', '', 1315833840, 1315833904, 0.00, NULL, NULL, NULL),
(288, 'Дневной крем', '288', 1, NULL, 0, 58, '', '288_main.jpg', '288_small.jpg', '', '', '', '', '', 1315833948, 1315833980, 0.00, NULL, NULL, NULL),
(289, 'Крем увлажняющий', '289', 1, NULL, 0, 58, '', '289_main.jpg', '289_small.jpg', '', '', '', '', '', 1315834029, 1315834082, 0.00, NULL, NULL, NULL),
(290, 'Матирующий крем', '290', 1, NULL, 0, 58, '', '290_main.jpg', '290_small.jpg', '', '', '', '', '', 1315834103, 1315834141, 0.00, NULL, NULL, NULL),
(291, 'Гель для лица', '291', 1, NULL, 0, 58, '', '291_main.jpg', '291_small.jpg', '', '', '', '', '', 1315834174, 1315834219, 0.00, NULL, NULL, NULL),
(292, 'Моделирующий крем', '292', 1, NULL, 0, 58, '', '292_main.jpg', '292_small.jpg', '', '', '', '', '', 1315834238, 1315834273, 0.00, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_products_rating`
--

CREATE TABLE IF NOT EXISTS `shop_products_rating` (
  `product_id` int(11) NOT NULL,
  `votes` int(11) default NULL,
  `rating` int(11) default NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_products_rating`
--

INSERT INTO `shop_products_rating` (`product_id`, `votes`, `rating`) VALUES
(71, 1, 2),
(81, 1, 5),
(88, 1, 1),
(76, 2, 7),
(82, 1, 4),
(77, 1, 3),
(73, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_product_categories`
--

CREATE TABLE IF NOT EXISTS `shop_product_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`product_id`,`category_id`),
  KEY `shop_product_categories_FI_2` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_product_categories`
--

INSERT INTO `shop_product_categories` (`product_id`, `category_id`) VALUES
(258, 58),
(259, 58),
(260, 58),
(261, 58),
(262, 58),
(263, 58),
(264, 58),
(265, 58),
(266, 58),
(267, 58),
(268, 58),
(269, 58),
(270, 58),
(271, 58),
(272, 58),
(273, 58),
(274, 63),
(275, 60),
(275, 63),
(276, 58),
(276, 59),
(277, 58),
(277, 59),
(278, 58),
(278, 64),
(279, 60),
(279, 64),
(280, 58),
(280, 65),
(281, 57),
(281, 58),
(282, 57),
(282, 58),
(283, 61),
(284, 58),
(284, 65),
(285, 61),
(286, 58),
(286, 61),
(287, 58),
(287, 62),
(288, 58),
(288, 62),
(289, 58),
(289, 62),
(290, 58),
(290, 62),
(291, 58),
(291, 62),
(292, 58),
(292, 62);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_product_images`
--

CREATE TABLE IF NOT EXISTS `shop_product_images` (
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `position` smallint(6) default NULL,
  PRIMARY KEY  (`product_id`,`image_name`),
  KEY `shop_product_images_I_1` (`position`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_product_images`
--

INSERT INTO `shop_product_images` (`product_id`, `image_name`, `position`) VALUES
(278, '278_1.jpg', 1),
(274, '274_1.jpg', 1),
(274, '274_0.jpg', 0),
(278, '278_3.jpg', 3),
(274, '274_2.jpg', 2),
(278, '278_2.jpg', 2),
(278, '278_0.jpg', 0),
(284, '284_0.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_product_properties`
--

CREATE TABLE IF NOT EXISTS `shop_product_properties` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `csv_name` varchar(50) NOT NULL,
  `active` tinyint(4) default NULL,
  `show_in_compare` tinyint(4) default NULL,
  `position` int(11) NOT NULL,
  `data` text,
  `show_on_site` tinyint(4) default NULL,
  PRIMARY KEY  (`id`),
  KEY `shop_product_properties_I_1` (`name`),
  KEY `shop_product_properties_I_2` (`active`),
  KEY `shop_product_properties_I_3` (`show_on_site`),
  KEY `shop_product_properties_I_4` (`show_in_compare`),
  KEY `shop_product_properties_I_5` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `shop_product_properties`
--

INSERT INTO `shop_product_properties` (`id`, `name`, `csv_name`, `active`, `show_in_compare`, `position`, `data`, `show_on_site`) VALUES
(31, 'Комплект', 'CompleteSet', 1, 0, 0, 'a:1:{i:0;s:6:"Лиф";}', 0),
(30, 'Состав', 'Structure', 1, 0, 0, 'a:3:{i:0;s:12:"нейлон";i:1;s:22:"микронейлон";i:2;s:16:"спандекс";}', 1),
(28, 'Размер', 'Size', 1, 0, 0, 'a:6:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"6";}', 1),
(29, 'Цвет', 'Color', 1, NULL, 0, 'a:2:{i:0;s:14:"Красный";i:1;s:12:"Черный";}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_product_properties_categories`
--

CREATE TABLE IF NOT EXISTS `shop_product_properties_categories` (
  `property_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`property_id`,`category_id`),
  KEY `shop_product_properties_categories_FI_2` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_product_properties_categories`
--

INSERT INTO `shop_product_properties_categories` (`property_id`, `category_id`) VALUES
(28, 57),
(28, 58),
(28, 59),
(28, 60),
(28, 61),
(28, 62),
(28, 63),
(28, 64),
(28, 65),
(29, 60),
(29, 63),
(29, 64),
(29, 65),
(30, 57),
(30, 58),
(30, 59),
(30, 60),
(30, 61),
(30, 62),
(30, 63),
(30, 64),
(30, 65),
(31, 57),
(31, 58),
(31, 59),
(31, 60),
(31, 61),
(31, 62),
(31, 63),
(31, 64),
(31, 65);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_product_properties_data`
--

CREATE TABLE IF NOT EXISTS `shop_product_properties_data` (
  `property_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` varchar(500) NOT NULL,
  PRIMARY KEY  (`property_id`,`product_id`),
  KEY `shop_product_properties_data_I_1` (`value`(333)),
  KEY `shop_product_properties_data_FI_2` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_product_properties_data`
--

INSERT INTO `shop_product_properties_data` (`property_id`, `product_id`, `value`) VALUES
(31, 272, 'Лиф'),
(30, 272, 'микронейлон'),
(30, 271, 'микронейлон'),
(31, 267, 'Лиф'),
(29, 274, 'Красный'),
(30, 265, 'микронейлон'),
(28, 265, '1'),
(30, 264, 'микронейлон'),
(30, 263, 'микронейлон'),
(30, 261, 'микронейлон'),
(30, 260, 'микронейлон'),
(30, 259, 'микронейлон'),
(30, 258, 'микронейлон'),
(28, 258, '1'),
(28, 272, '1'),
(30, 273, 'микронейлон'),
(28, 273, '1'),
(28, 274, '1'),
(30, 274, 'нейлон'),
(31, 274, 'Лиф'),
(28, 259, '1'),
(28, 260, '1'),
(28, 261, '1'),
(30, 262, 'микронейлон'),
(28, 262, '1'),
(28, 263, '1'),
(28, 264, '1'),
(31, 265, 'Лиф'),
(30, 267, 'микронейлон'),
(31, 266, 'Лиф'),
(30, 266, 'микронейлон'),
(29, 275, 'Красный'),
(28, 275, '1'),
(30, 275, 'нейлон'),
(31, 275, 'Лиф'),
(28, 267, '1'),
(30, 268, 'микронейлон'),
(30, 269, 'микронейлон'),
(30, 270, 'микронейлон'),
(28, 271, '1'),
(31, 273, 'Лиф'),
(28, 266, '1'),
(28, 268, '1'),
(28, 269, '1'),
(28, 270, '1'),
(31, 258, 'Лиф'),
(31, 259, 'Лиф'),
(31, 260, 'Лиф'),
(31, 261, 'Лиф'),
(31, 262, 'Лиф'),
(31, 263, 'Лиф'),
(31, 264, 'Лиф'),
(31, 268, 'Лиф'),
(31, 269, 'Лиф'),
(31, 270, 'Лиф'),
(31, 271, 'Лиф'),
(28, 283, '1'),
(28, 285, '2'),
(28, 286, '4');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_product_variants`
--

CREATE TABLE IF NOT EXISTS `shop_product_variants` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL,
  `name` varchar(500) default NULL,
  `price` float(10,2) NOT NULL,
  `number` varchar(255) default NULL,
  `stock` int(11) default NULL,
  `position` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `shop_product_variants_I_1` (`product_id`),
  KEY `shop_product_variants_I_2` (`position`),
  KEY `shop_product_variants_I_3` (`number`),
  KEY `shop_product_variants_I_4` (`name`(333)),
  KEY `shop_product_variants_I_5` (`price`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=315 ;

--
-- Дамп данных таблицы `shop_product_variants`
--

INSERT INTO `shop_product_variants` (`id`, `product_id`, `name`, `price`, `number`, `stock`, `position`) VALUES
(1, 1, NULL, 99.99, NULL, NULL, NULL),
(2, 2, 'variant 1', 522.00, '', 0, 1),
(3, 3, 'red', 522.00, '', 0, 0),
(5, 2, 'variant 2', 590.00, '', 0, 0),
(6, 4, '', 10.00, '', 0, 0),
(7, 5, '', 5.00, '', 0, 0),
(8, 6, '', 36.00, '', 0, 0),
(9, 7, '', 6.10, '', 0, 0),
(10, 8, '', 6.23, '', 0, 0),
(11, 9, NULL, 9.00, NULL, NULL, NULL),
(12, 10, NULL, 5.00, NULL, NULL, NULL),
(13, 11, NULL, 18.00, NULL, NULL, NULL),
(14, 12, NULL, 20.00, NULL, NULL, NULL),
(15, 13, NULL, 10.00, NULL, NULL, NULL),
(16, 14, '', 19.00, '', 0, 0),
(17, 15, NULL, 15.00, NULL, NULL, NULL),
(18, 16, NULL, 19.00, NULL, NULL, NULL),
(19, 17, NULL, 17.00, NULL, NULL, NULL),
(20, 18, '', 100.00, '', 0, 0),
(21, 19, NULL, 51.00, NULL, NULL, NULL),
(22, 20, '', 29.00, '', 0, 0),
(23, 21, NULL, 35.00, NULL, NULL, NULL),
(24, 22, '', 36.00, '', 0, 0),
(25, 23, '', 32.00, '', 0, 0),
(26, 24, '', 25.00, '', 0, 0),
(27, 25, NULL, 39.00, NULL, NULL, NULL),
(28, 26, NULL, 79.00, NULL, NULL, NULL),
(29, 27, NULL, 41.00, NULL, NULL, NULL),
(30, 28, NULL, 57.00, NULL, NULL, NULL),
(31, 29, NULL, 70.00, NULL, NULL, NULL),
(32, 30, NULL, 59.00, NULL, NULL, NULL),
(33, 31, NULL, 10.00, NULL, NULL, NULL),
(34, 32, NULL, 19.00, NULL, NULL, NULL),
(37, 35, '', 99.00, '', 0, 0),
(38, 36, NULL, 10.00, NULL, NULL, NULL),
(39, 37, NULL, 10.00, NULL, NULL, NULL),
(40, 38, NULL, 20.00, NULL, NULL, NULL),
(41, 39, NULL, 22.00, NULL, NULL, NULL),
(42, 40, NULL, 30.00, NULL, NULL, NULL),
(43, 41, NULL, 55.00, NULL, NULL, NULL),
(44, 42, '', 17.00, '', 0, 3),
(45, 43, NULL, 45.00, NULL, NULL, NULL),
(46, 44, NULL, 100.00, NULL, NULL, NULL),
(47, 45, NULL, 8.00, NULL, NULL, NULL),
(48, 46, NULL, 17.00, NULL, NULL, NULL),
(49, 47, NULL, 22.00, NULL, NULL, NULL),
(50, 48, NULL, 16.00, NULL, NULL, NULL),
(51, 49, 'ghj', 60.00, NULL, NULL, 0),
(52, 50, '', 12.00, '', 0, 0),
(55, 53, NULL, 23.00, NULL, NULL, NULL),
(57, 55, NULL, 22.00, NULL, NULL, NULL),
(58, 56, NULL, 24.00, NULL, NULL, NULL),
(60, 58, NULL, 27.00, NULL, NULL, NULL),
(61, 59, '', 20.00, '', 0, 0),
(62, 60, NULL, 22.00, NULL, NULL, NULL),
(65, 63, NULL, 79.00, NULL, NULL, NULL),
(66, 64, NULL, 60.00, NULL, NULL, NULL),
(67, 65, NULL, 73.00, NULL, NULL, NULL),
(68, 66, NULL, 41.00, NULL, NULL, NULL),
(69, 67, NULL, 13.00, NULL, NULL, NULL),
(70, 68, NULL, 17.00, NULL, NULL, NULL),
(71, 69, NULL, 34.00, NULL, NULL, NULL),
(72, 49, '1212', 234.00, '', 0, 1),
(73, 70, '', 11.59, '', 0, 0),
(74, 41, '60W', 43.00, NULL, NULL, NULL),
(75, 41, '75W', 55.00, NULL, NULL, NULL),
(76, 42, 'Зеленая', 14.00, '', 0, 2),
(77, 42, 'Красная', 15.00, '', 0, 1),
(78, 42, 'Белая', 17.00, '', 0, 0),
(79, 57, 'Обычная упаковка', 245.99, NULL, NULL, 0),
(80, 57, 'Подарочная упаковка', 60.00, NULL, NULL, 2),
(81, 57, 'Пластиковая упаковка', 100.25, NULL, NULL, 1),
(82, 71, '', 1000.00, 'KDL4', 0, 0),
(83, 72, '', 999.99, 'LD450', 0, 0),
(84, 73, '', 899.99, 'TC-L42', 0, 0),
(85, 74, '', 899.99, 'LN40C', 0, 0),
(86, 75, '', 299.00, 'CLP-32', 0, 0),
(87, 76, 'Красный', 399.00, 'CLP-32L', 0, 0),
(88, 77, '', 244.00, '', 0, 0),
(89, 78, '', 67.79, '', 0, 0),
(90, 79, '', 39.95, '', 0, 0),
(91, 80, '', 44.77, '', 0, 0),
(92, 81, '', 68.80, '', 0, 0),
(93, 82, '', 129.00, '', 0, 0),
(94, 83, '', 129.00, '', 0, 0),
(95, 84, '', 100.51, '', 0, 0),
(96, 85, '', 219.99, '', 0, 0),
(97, 86, '', 154.00, '', 0, 0),
(98, 87, '', 349.00, '', 0, 0),
(99, 88, '', 549.99, '', 0, 0),
(100, 89, '', 371.99, '', 0, 0),
(101, 90, '', 999.00, '', 0, 0),
(102, 91, '', 548.00, '', 0, 0),
(103, 92, '', 297.00, '', 0, 0),
(104, 93, '', 349.99, '', 0, 0),
(105, 94, '', 99.95, '', 0, 0),
(106, 95, '', 799.00, '', 0, 0),
(107, 96, '', 699.00, '', 0, 0),
(108, 97, '', 799.00, '', 0, 0),
(109, 98, '', 549.00, '', 0, 0),
(110, 99, '', 499.99, '', 0, 0),
(111, 100, '', 179.87, '', 0, 0),
(112, 101, '', 74.99, '', 0, 0),
(113, 102, '', 549.99, '', 0, 0),
(114, 103, '', 86.91, '', 0, 0),
(115, 104, '', 799.99, '', 0, 0),
(116, 105, '', 99.95, '', 0, 0),
(117, 106, '', 72.05, '', 0, 0),
(118, 107, '', 219.28, '', 0, 0),
(119, 108, '', 219.99, '', 0, 0),
(120, 109, '', 123.37, '', 0, 0),
(121, 110, '', 36.95, '', 0, 0),
(122, 111, '', 20.40, '', 0, 0),
(123, 112, '', 12.99, '', 0, 0),
(124, 113, '', 10.99, '', 0, 0),
(125, 114, '', 19.99, '', 0, 0),
(126, 115, '', 45.00, '', 0, 0),
(127, 116, '', 60.99, '', 0, 0),
(128, 117, '', 47.22, '', 0, 0),
(129, 118, '', 56.00, '', 0, 0),
(130, 119, '', 69.00, '', 0, 0),
(131, 120, '', 30.71, '', 0, 0),
(132, 121, '', 28.18, '', 0, 0),
(133, 122, '', 35.00, '', 0, 0),
(134, 123, '', 42.00, '', 0, 0),
(135, 124, '', 34.00, '', 0, 0),
(136, 125, '', 137.12, '', 0, 0),
(137, 126, '', 130.13, '', 0, 0),
(138, 127, '', 100.35, '', 0, 0),
(139, 128, '', 179.99, '', NULL, 0),
(140, 129, '', 119.99, '', 0, 0),
(141, 76, 'Зеленый', 299.00, 'CLP-33L', 0, 1),
(142, 76, 'Белый', 499.00, 'CLP-34L', 0, 2),
(150, 139, '', 158.99, '', 0, 0),
(151, 140, '', 158.99, '', 0, 0),
(152, 142, '', 158.99, '', 0, 0),
(294, 272, 'Купальник 089', 3000.00, '11111', 12, 0),
(293, 271, 'Купальник 087', 3000.00, '11111', 12, 0),
(292, 270, 'Купальник 088', 3000.00, '11111', 12, 0),
(291, 269, 'Купальник 086', 3000.00, '11111', 12, 0),
(290, 268, 'Купальник 085', 3000.00, '11111', 12, 0),
(289, 267, 'Купальник 084', 3000.00, '11111', 12, 0),
(288, 266, 'Купальник 083', 3000.00, '11111', 12, 0),
(287, 265, 'Купальник 076', 3000.00, '11111', 12, 0),
(286, 264, 'Купальник 082', 3000.00, '11111', 12, 0),
(285, 263, 'Купальник 081', 3000.00, '11111', 12, 0),
(284, 262, 'Купальник 080', 2000.00, '11111', 12, 0),
(283, 261, 'Купальник 079', 3000.00, '11111', 12, 0),
(282, 260, 'Купальник 078', 3000.00, '11111', 12, 0),
(281, 259, 'Купальник 077', 3000.00, '11111', 12, 0),
(280, 258, 'Купальник 076', 12300.00, '11111', 12, 0),
(295, 273, 'Купальник 076', 3000.00, '11111', 12, 0),
(296, 274, 'купальник', 1234.00, '123213', 123, 0),
(297, 275, 'купальник', 1234.00, '123213', 123, 0),
(298, 276, '', 120.00, '', 0, 0),
(299, 277, '', 150.00, '', 0, 0),
(300, 278, '', 200.00, '', 0, 0),
(301, 279, '', 200.00, '', 0, 0),
(302, 280, '', 1200.00, '', 0, 0),
(303, 281, '', 1800.00, '', 0, 0),
(304, 282, '', 1000.00, '', 0, 0),
(305, 283, '', 120.00, '', 0, 0),
(306, 284, '', 1200.00, '', 0, 0),
(307, 285, '', 120.00, '', 0, 0),
(308, 286, '', 120.00, '', 0, 0),
(309, 287, '', 130.00, '', 0, 0),
(310, 288, '', 120.00, '', 0, 0),
(311, 289, '', 110.00, '', 0, 0),
(312, 290, '', 100.00, '', 0, 0),
(313, 291, '', 100.00, '', 0, 0),
(314, 292, '', 120.00, '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_settings`
--

CREATE TABLE IF NOT EXISTS `shop_settings` (
  `name` varchar(255) NOT NULL,
  `value` text,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop_settings`
--

INSERT INTO `shop_settings` (`name`, `value`) VALUES
('mainImageWidth', '368'),
('mainImageHeight', '368'),
('smallImageWidth', '195'),
('smallImageHeight', '195'),
('addImageWidth', '368'),
('addImageHeight', '386'),
('imagesQuality', '80'),
('systemTemplatePath', './templates/commerce/shop/default'),
('frontProductsPerPage', '12'),
('adminProductsPerPage', '24'),
('ordersMessageFormat', 'text'),
('ordersMessageText', 'Здравствуйте, %userName%.  \n\nМы благодарны Вам за то, что совершили заказ в нашем магазине "ImageCMS Shop" \nВы указали следующие контактные данные: \n\nEmail адрес: %userEmail% \nНомер телефона: %userPhone% \nАдрес доставки: %userDeliver%  \n\nМенеджеры нашего магазина вскоре свяжутся с Вами и помогут с оформлением и оплатой товара.  \n\nТакже, Вы можете всегда посмотреть за статусом Вашего заказа, перейдя по ссылке:  %orderLink%.  \n\nСпасибо за ваш заказ, искренне Ваши, сотрудники ImageCMS Shop.  \n\nПри возникновении любых вопросов, обращайтесь за телефонами:  \n+7 (095) 222-33-22 +38 (098) 222-33-22'),
('ordersSendMessage', 'true'),
('ordersSenderEmail', 'noreply@demoshop.imagecm.net'),
('ordersSenderName', 'DemoShop ImageCms.net'),
('ordersMessageTheme', 'Данные для просмотра совершенной покупки'),
('2_LMI_SECRET_KEY', 'bank'),
('2_LMI_PAYEE_PURSE', 'bank'),
('1_LMI_SECRET_KEY', 'cur'),
('1_LMI_PAYEE_PURSE', 'cur'),
('2_OschadBankData', 'a:5:{s:8:"receiver";s:41:"ТЗОВ "Екзампл Магазин" ";s:4:"code";s:9:"123456789";s:7:"account";s:12:"123456789123";s:3:"mfo";s:6:"123456";s:8:"banknote";s:7:"грн.";}'),
('3_SberBankData', 'a:8:{s:12:"receiverName";s:45:"Наименование получателя";s:8:"bankName";s:29:"Банк получателя";s:11:"receiverInn";s:10:"1231231231";s:7:"account";s:20:"15412398123312341237";s:3:"BIK";s:9:"123123123";s:11:"cor_account";s:20:"12312312334012340123";s:8:"bankNote";s:7:"руб.";s:9:"bankNote2";s:7:"коп.";}'),
('4_RobokassaData', 'a:3:{s:5:"login";s:5:"login";s:9:"password1";s:9:"password1";s:9:"password2";s:9:"password2";}');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_user_profile`
--

CREATE TABLE IF NOT EXISTS `shop_user_profile` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) default NULL,
  `phone` varchar(255) default NULL,
  `address` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  `street` varchar(100) default NULL,
  `numberhome` varchar(10) default NULL,
  `surname` varchar(255) default NULL,
  `additionalData` varchar(255) default NULL,
  `profileimage` varchar(255) character set ucs2 default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `shop_user_profile`
--

INSERT INTO `shop_user_profile` (`id`, `user_id`, `name`, `phone`, `address`, `city`, `street`, `numberhome`, `surname`, `additionalData`, `profileimage`) VALUES
(1, 1, 'Алина', '+7 (903) 002–003–1', '', 'Москва', 'Профсоюзная', '4–1/2', 'Игнатенко', 'Я создана из ласки и слёз,из кошмаров и прекрасных грёз,из любви и ненависти,из счастья и печали…Я смесь из крика и улыбки,из правильной речи и ошибки,намешана из боли и блаженства…Я совершенное несовершенство…Как утренний рассвет прекрасна…Сильна как вет', ''),
(3, 86, 'Юлия', '5191659', '', 's', 's', NULL, '', NULL, NULL),
(5, 136, 'il', '', '', 'Минск', 'Введите адрес доставки', '', 'vin', 'Введите дополнительные данные', ''),
(16, 159, 'ILya', '', '', '', '', '', 'Marchuk', '', 'https://graph.facebook.com/1355465044/picture?type=large'),
(7, 151, 'Илья1', '', '', 'Каменец', 'первая', '', 'Марчук1', 'не много текста о себе', ''),
(22, 160, 'Юлия', '', '', 'Витебск', '', '', 'ЫЫЫ', '', 'https://graph.facebook.com/100001579767747/picture?type=large'),
(24, 161, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `shop_warehouse`
--

CREATE TABLE IF NOT EXISTS `shop_warehouse` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) default NULL,
  `phone` varchar(255) default NULL,
  `description` text,
  PRIMARY KEY  (`id`),
  KEY `shop_warehouse_I_1` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `shop_warehouse`
--

INSERT INTO `shop_warehouse` (`id`, `name`, `address`, `phone`, `description`) VALUES
(1, 'warehouse 1', 'address', 'phone', ''),
(2, 'warehouse 2', 'address 2', '', ''),
(3, 'склад1', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `shop_warehouse_data`
--

CREATE TABLE IF NOT EXISTS `shop_warehouse_data` (
  `id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `count` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `shop_warehouse_data_FI_1` (`product_id`),
  KEY `shop_warehouse_data_FI_2` (`warehouse_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `shop_warehouse_data`
--

INSERT INTO `shop_warehouse_data` (`id`, `product_id`, `warehouse_id`, `count`) VALUES
(37, 132, 2, 3),
(36, 132, 1, 2),
(35, 132, 1, 1),
(42, 176, 3, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL auto_increment,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `value` (`value`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `tags`
--


-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `vk_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL default '1',
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `banned` tinyint(1) NOT NULL default '0',
  `ban_reason` varchar(255) default NULL,
  `newpass` varchar(34) default NULL,
  `newpass_key` varchar(32) default NULL,
  `newpass_time` datetime default NULL,
  `last_ip` varchar(40) NOT NULL,
  `last_login` datetime NOT NULL default '0000-00-00 00:00:00',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `role_id` (`role_id`),
  KEY `banned` (`banned`),
  KEY `password` (`password`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=162 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `vk_id`, `role_id`, `username`, `password`, `email`, `banned`, `ban_reason`, `newpass`, `newpass_key`, `newpass_time`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 0, 2, 'kelios', '$1$7tnCKkMv$rmEiSGhMmEcIGNcAFu3pl/', 'kelios@inbox.ru', 0, NULL, NULL, NULL, NULL, '178.120.68.243', '2011-09-22 12:34:45', '2011-08-12 16:39:17', '2011-09-22 12:34:45'),
(160, 0, 1, 'Юлия', '$1$/K8lk2jF$PdzfY44K8QnhlcK8bmxyL0', 'ignatieva_julia@tut.byt', 0, NULL, NULL, NULL, NULL, '178.120.68.243', '2011-09-22 11:37:43', '2011-09-22 10:31:31', '2011-09-22 11:37:43'),
(159, 0, 1, 'ILya', '$1$tQ0ENQpH$J.MSX8I6SthCDbYQkL.nk0', 't', 0, NULL, NULL, NULL, NULL, '178.121.141.146', '2011-09-21 18:05:01', '2011-09-21 17:58:43', '2011-09-21 18:05:01'),
(133, 0, 2, 'admin', '$1$49u8yPse$9UXRwuQDzt1IQ7ZVZ270D1', 'marchukilya@gmail.com', 0, '', NULL, NULL, NULL, '178.121.141.146', '2011-09-20 13:19:50', '2011-09-12 16:48:47', '2011-09-20 13:19:50'),
(135, 0, 1, 'samarra', '$1$5TNVPFpo$SXtIdPkYAeyTGOB3Eim.Z0', 'samarra@tut.by', 0, NULL, '$1$HsbFJd5v$1GtLQpeIKYQi2C8EwZAcP0', '1a09280ff55842c2411836628c34854a', '2011-09-20 12:11:02', '178.121.141.146', '2011-09-20 11:52:14', '2011-09-19 15:58:36', '2011-09-20 11:56:02'),
(136, 0, 2, 'vinilzen', '$1$rL.GQEuk$S9Py0IjzZx51gXb17SNRQ0', 'marchukilya@yandex.ru', 0, NULL, NULL, NULL, NULL, '178.121.141.146', '2011-09-21 16:33:30', '2011-09-19 17:54:25', '2011-09-21 16:33:30'),
(151, 8253453, 1, '', 'a5237dd4eb247723a55e8dd912a57b16593a55ea55e8dd99ecf76b762c37ee3', '', 0, NULL, NULL, NULL, NULL, '178.121.141.146', '2011-09-21 18:30:47', '2011-09-21 13:08:11', '2011-09-21 18:30:47'),
(161, 5291280, 1, '', '9ca48092d2887eec9cf43d829f9cd1a60209cf49cf43d823dd4faf3a5acc00e', '', 0, NULL, NULL, NULL, NULL, '178.120.68.243', '2011-09-22 12:30:48', '2011-09-22 12:29:35', '2011-09-22 12:30:48'),
(154, 34107061, 1, '', 'eee003e2a2936545ece86d57e3eccdf6d77ece8ece86d57f1746cd97bd33239', '', 0, NULL, NULL, NULL, NULL, '178.121.141.146', '2011-09-21 18:17:23', '2011-09-21 14:04:03', '2011-09-21 18:17:23');

-- --------------------------------------------------------

--
-- Структура таблицы `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) character set utf8 collate utf8_bin NOT NULL,
  `user_id` mediumint(8) NOT NULL default '0',
  `user_agent` varchar(150) character set utf8 collate utf8_bin NOT NULL,
  `last_ip` varchar(40) character set utf8 collate utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`key_id`,`user_id`),
  KEY `last_ip` (`last_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('d0bac40b39a0abb2b4cd6f61d81a7446', 109, 'Mozilla/5.0 (Windows NT 5.1; rv:6.0.1) Gecko/20100101 Firefox/6.0.1', '127.0.0.1', '2011-09-06 12:10:08'),
('5f57a2cd9cd9b722b8c841b1f2246a12', 154, 'Mozilla/5.0 (Windows NT 6.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '178.121.141.146', '2011-09-21 18:00:12'),
('c119df9e5afdbe97617829bf8fe0ffe4', 147, 'Mozilla/5.0 (Windows NT 6.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '178.121.141.146', '2011-09-21 13:00:18'),
('b138f151883379e6510426e2bde01332', 150, 'Mozilla/5.0 (Windows NT 6.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '178.121.141.146', '2011-09-21 13:07:30'),
('72655ff7ecaccec55778ccc803979525', 151, 'Mozilla/5.0 (Windows NT 6.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '178.121.141.146', '2011-09-21 18:10:54'),
('0838ed25befea8474fba28dfbb429f7b', 154, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '178.121.141.146', '2011-09-21 14:04:03'),
('24dc9f87b17c9fd8171945be29d4d450', 160, 'Mozilla/5.0 (Windows NT 5.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '178.120.68.243', '2011-09-22 11:13:09'),
('6579705f8c90ebfc6dcd8ae43073a0cd', 158, 'Mozilla/5.0 (Windows NT 5.1; rv:6.0) Gecko/20100101 Firefox/6.0', '178.154.23.160', '2011-09-21 22:48:23'),
('c5b57134f1b04b5d1d7a25224ae6b3fc', 161, 'Mozilla/5.0 (Windows NT 5.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '178.120.68.243', '2011-09-22 12:29:35'),
('41ca48a88927c2923c4fc7a33c2c2acd', 1, 'Mozilla/5.0 (Windows NT 5.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '178.120.68.243', '2011-09-22 12:30:48');

-- --------------------------------------------------------

--
-- Структура таблицы `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Дамп данных таблицы `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`) VALUES
(1, 84),
(2, 85),
(3, 86),
(4, 87),
(5, 88),
(6, 89),
(7, 90),
(8, 91),
(9, 92),
(10, 93),
(11, 94),
(12, 95),
(13, 96),
(14, 97),
(15, 98),
(16, 99),
(17, 100),
(18, 101),
(19, 102),
(20, 103),
(21, 104),
(22, 105),
(23, 106),
(24, 107),
(25, 108),
(26, 109),
(27, 110),
(28, 111),
(29, 112),
(30, 113),
(31, 114),
(32, 115),
(33, 116),
(34, 117),
(35, 118),
(36, 119),
(37, 120),
(38, 121),
(39, 122),
(40, 123),
(41, 124),
(42, 125),
(43, 126),
(44, 127),
(45, 128),
(46, 129),
(47, 130),
(48, 131),
(49, 132),
(50, 133),
(51, 134),
(52, 135),
(53, 136),
(54, 137),
(55, 138),
(56, 139),
(57, 140),
(58, 141),
(59, 142),
(60, 143),
(61, 144),
(62, 145),
(63, 146),
(64, 147),
(65, 148),
(66, 149),
(67, 150),
(68, 151),
(69, 153),
(70, 154),
(71, 155),
(72, 156),
(73, 157),
(74, 158),
(75, 159),
(76, 160),
(77, 161);

-- --------------------------------------------------------

--
-- Структура таблицы `user_temp`
--

CREATE TABLE IF NOT EXISTS `user_temp` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(34) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_key` varchar(50) NOT NULL,
  `last_ip` varchar(40) NOT NULL,
  `created` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `user_temp`
--


-- --------------------------------------------------------

--
-- Структура таблицы `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL,
  `data` text NOT NULL,
  `method` varchar(50) NOT NULL,
  `settings` text NOT NULL,
  `description` varchar(300) NOT NULL,
  `roles` text NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `widgets`
--

INSERT INTO `widgets` (`id`, `name`, `type`, `data`, `method`, `settings`, `description`, `roles`, `created`) VALUES
(6, 'recent_product_comments', 'module', 'comments', 'recent_comments', 'a:2:{s:14:"comments_count";i:100;s:13:"symbols_count";i:0;}', '', '', 1313571258),
(7, 'latest_news', 'module', 'core', 'recent_news', 'a:4:{s:10:"news_count";s:2:"10";s:11:"max_symdols";s:3:"150";s:10:"categories";a:1:{i:0;s:2:"56";}s:7:"display";s:6:"recent";}', 'Последние новости', '', 1313571306),
(10, 'navigation', 'module', 'navigation', 'widget_navigation', '', '', '', 1313585095),
(11, 'main_1', 'html', '<p><img src="/uploads/images/1.jpg" alt="" width="900" height="370" /></p>', '', '', 'картинка', '', 1314264463),
(12, 'main_2', 'html', '<img src="/uploads/images/b1.jpg" alt="" width="900" height="131" />', '', '', 'банер под новинками', '', 1314265427),
(13, 'main_3', 'html', '<p><img src="/uploads/images/5.jpg" alt="" width="205" height="100" /></p>\n<p>&nbsp;</p>', '', '', '', '', 1314265511),
(14, 'main_4', 'html', 'Новые модели марки Yax.</a></p><p>Дорогие покупатели! Обратите внимание на новые модели марки Yax.</p><p>Yax- создан для тебя!</p>', '', '', '', '', 1314265541),
(15, 'main_5', 'html', 'Обратите свое внимание, на подсортировку в марке Милавица!</a></p><p>Уважаемые покупатели! В арт 11618 появился цвет- бежевый! В арт 11578 добавился цвет белый и бежевый!', '', '', '', '', 1314265556),
(16, 'main_6', 'html', 'Новые модели марки Yax.</a></p><p>Дорогие покупатели! Обратите внимание на новые модели марки Yax.</p><p>Yax- создан для тебя!</p>', '', '', '', '', 1314265622),
(20, 'support', 'html', '<li><a href="#" class="q">Какова гарантия совпадения полученного товара с тем, что заказывала на сайте?</a>\n            <div class="resp">\n            	<div class="ug">&nbsp;</div>\n            	<div class="resp_c">\n\n                	<p>Добрый день, Зорина.</p>\n                    <p>Конечно же Вы можете приехать и забрать сами свою покупку, причем при этом Вы получите карточку постоянного покупателя и скидку 5%. Единственное, обратите внимание на дни и часы работы нашего интернет–магазина.</p>\n                    <p>Приятных Вам покупок!</p>\n                </div>\n            </div>\n            </li>\n<li><a href="#" class="q">Какова гарантия совпадения полученного товара с тем, что заказывала на сайте?</a>\n\n            <div class="resp">\n            	<div class="ug">&nbsp;</div>\n            	<div class="resp_c">\n                	<p>Добрый день, Зорина.</p>\n                    <p>Конечно же Вы можете приехать и забрать сами свою покупку, причем при этом Вы получите карточку постоянного покупателя и скидку 5%. Единственное, обратите внимание на дни и часы работы нашего интернет–магазина.</p>\n                    <p>Приятных Вам покупок!</p>\n                </div>\n\n            </div>\n            </li>\n            <li><a href="#" class="q">Какова гарантия совпадения полученного товара с тем, что заказывала на сайте?</a>\n            <div class="resp">\n            	<div class="ug">&nbsp;</div>\n            	<div class="resp_c">\n                	<p>Добрый день, Зорина.</p>\n                    <p>Конечно же Вы можете приехать и забрать сами свою покупку, причем при этом Вы получите карточку постоянного покупателя и скидку 5%. Единственное, обратите внимание на дни и часы работы нашего интернет–магазина.</p>\n\n                    <p>Приятных Вам покупок!</p>\n                </div>\n            </div>\n            </li>\n            <li><a href="#" class="q">Какова гарантия совпадения полученного товара с тем, что заказывала на сайте?</a>\n            <div class="resp">\n            	<div class="ug">&nbsp;</div>\n            	<div class="resp_c">\n\n                	<p>Добрый день, Зорина.</p>\n                    <p>Конечно же Вы можете приехать и забрать сами свою покупку, причем при этом Вы получите карточку постоянного покупателя и скидку 5%. Единственное, обратите внимание на дни и часы работы нашего интернет–магазина.</p>\n                    <p>Приятных Вам покупок!</p>\n                </div>\n            </div>\n            </li>\n            <li><a href="#" class="q">Какова гарантия совпадения полученного товара с тем, что заказывала на сайте?</a>\n\n            <div class="resp">\n            	<div class="ug">&nbsp;</div>\n            	<div class="resp_c">\n                	<p>Добрый день, Зорина.</p>\n                    <p>Конечно же Вы можете приехать и забрать сами свою покупку, причем при этом Вы получите карточку постоянного покупателя и скидку 5%. Единственное, обратите внимание на дни и часы работы нашего интернет–магазина.</p>\n                    <p>Приятных Вам покупок!</p>\n                </div>\n\n            </div>\n            </li>\n            <li><a href="#" class="q">Какова гарантия совпадения полученного товара с тем, что заказывала на сайте?</a>\n            <div class="resp">\n            	<div class="ug">&nbsp;</div>\n            	<div class="resp_c">\n                	<p>Добрый день, Зорина.</p>\n                    <p>Конечно же Вы можете приехать и забрать сами свою покупку, причем при этом Вы получите карточку постоянного покупателя и скидку 5%. Единственное, обратите внимание на дни и часы работы нашего интернет–магазина.</p>\n\n                    <p>Приятных Вам покупок!</p>\n                </div>\n            </div>\n            </li>', '', '', '', '', 1315215477),
(21, 'footer', 'html', '<li><span>Домашняя одежда</span><a href="#">Sharin</a><br /><a href="#">Miss Clair</a><br /><a href="#">Pierre Cerden</a><br /><a href="#">Calvin Klein </a></li>\n                <li><span>Ночное белье</span><a href="#">Miss Clair</a><br /><a href="#">NBB</a></li>\n                <li><span>Нижнее белье</span><a href="#">Miss Clair</a><br /><a href="#">NBB</a></li>\n\n                <li><span>Купальники</span><a href="#">Jolidon</a><br /><a href="#">Blybay</a><br /><a href="#">Oceanica</a></li>\n                <li><span>Чулки и колготки</span><a href="#">Комплекты</a><br /><a href="#">Пояса</a><br /><a href="#">Корсеты</a><br /><a href="#">Повязки</a></li>\n                <li><span>Уход за лицом</span><a href="#">Косметика Nu</a></li>', '', '', '', '', 1315219679);
