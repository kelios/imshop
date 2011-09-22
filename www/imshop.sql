-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2011 at 03:46 PM
-- Server version: 5.1.40
-- PHP Version: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `position` mediumint(5) NOT NULL DEFAULT '0',
  `name` varchar(160) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `short_desc` text NOT NULL,
  `url` varchar(300) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `keywords` text,
  `description` text,
  `fetch_pages` text NOT NULL,
  `main_tpl` varchar(50) NOT NULL,
  `tpl` varchar(50) DEFAULT NULL,
  `page_tpl` varchar(50) DEFAULT NULL,
  `per_page` smallint(5) NOT NULL,
  `order_by` varchar(25) NOT NULL,
  `sort_order` varchar(25) NOT NULL,
  `comments_default` tinyint(1) NOT NULL DEFAULT '0',
  `field_group` int(11) NOT NULL,
  `category_field_group` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `position`, `name`, `title`, `short_desc`, `url`, `image`, `keywords`, `description`, `fetch_pages`, `main_tpl`, `tpl`, `page_tpl`, `per_page`, `order_by`, `sort_order`, `comments_default`, `field_group`, `category_field_group`) VALUES
(1, 0, 0, 'Главная', '', '', 'main', '', '', '', 'b:0;', '', '', '', 10, 'publish_date', 'desc', 1, 0, 0),
(56, 0, 0, 'Новости и акции', '', '', 'novosti_i_aktsii', '', '', '', 'b:0;', '', '', '', 15, 'publish_date', 'desc', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_translate`
--

CREATE TABLE IF NOT EXISTS `category_translate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` int(11) NOT NULL,
  `name` varchar(160) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `short_desc` text,
  `image` varchar(250) DEFAULT NULL,
  `keywords` text,
  `description` text,
  `lang` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`,`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category_translate`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(25) NOT NULL DEFAULT 'core',
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
  PRIMARY KEY (`id`),
  KEY `module` (`module`),
  KEY `item_id` (`item_id`),
  KEY `date` (`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `module`, `user_id`, `user_name`, `user_mail`, `user_site`, `item_id`, `text`, `date`, `status`, `agent`, `user_ip`) VALUES
(10, 'core', 1, 'admin', 'admin@localhost.loc', '', 32, 'Первый комментарий.', 1267280509, 0, 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWebKit/532.8 (KHTML, like Gecko) Chrome/4.0.302.2 Safari/532.8', '127.0.0.5'),
(25, 'shop', 1, 'kelios', 'kelios@inbox.ru', '', 74, 'ikhukhjklhjkhjlkiuouhgio', 1316427202, 0, 'Mozilla/5.0 (Windows NT 5.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '127.0.0.1'),
(26, 'shop', 1, 'kelios', 'kelios@inbox.ru', '', 74, 'tutyututyu', 1316427244, 0, 'Mozilla/5.0 (Windows NT 5.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '127.0.0.1'),
(27, 'shop', 1, 'kelios', 'kelios@inbox.ru', '', 87, 'ghjgfjhgfjghj', 1316442233, 0, 'Mozilla/5.0 (Windows NT 5.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE IF NOT EXISTS `components` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `identif` varchar(25) NOT NULL,
  `enabled` int(1) NOT NULL,
  `autoload` int(1) NOT NULL,
  `in_menu` int(1) NOT NULL DEFAULT '0',
  `settings` text,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `identif` (`identif`),
  KEY `enabled` (`enabled`),
  KEY `autoload` (`autoload`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `name`, `identif`, `enabled`, `autoload`, `in_menu`, `settings`) VALUES
(1, 'user_manager', 'user_manager', 0, 0, 0, NULL),
(2, 'auth', 'auth', 1, 0, 0, NULL),
(4, 'comments', 'recomments', 1, 1, 1, 'a:5:{s:18:"max_comment_length";i:550;s:6:"period";i:0;s:11:"can_comment";i:0;s:11:"use_captcha";b:1;s:14:"use_moderation";b:0;}'),
(7, 'navigation', 'navigation', 0, 0, 1, NULL),
(30, 'tags', 'tags', 1, 1, 1, NULL),
(92, 'gallery', 'regallery', 1, 0, 1, 'a:26:{s:13:"max_file_size";s:1:"5";s:9:"max_width";s:1:"0";s:10:"max_height";s:1:"0";s:7:"quality";s:2:"95";s:14:"maintain_ratio";b:1;s:19:"maintain_ratio_prev";b:1;s:19:"maintain_ratio_icon";b:1;s:4:"crop";b:0;s:9:"crop_prev";b:0;s:9:"crop_icon";b:0;s:14:"prev_img_width";s:3:"500";s:15:"prev_img_height";s:3:"500";s:11:"thumb_width";s:3:"100";s:12:"thumb_height";s:3:"100";s:14:"watermark_text";s:0:"";s:16:"wm_vrt_alignment";s:6:"bottom";s:16:"wm_hor_alignment";s:4:"left";s:19:"watermark_font_size";s:2:"14";s:15:"watermark_color";s:6:"ffffff";s:17:"watermark_padding";s:2:"-5";s:19:"watermark_font_path";s:20:"./system/fonts/1.ttf";s:15:"watermark_image";s:0:"";s:23:"watermark_image_opacity";s:2:"50";s:14:"watermark_type";s:4:"text";s:8:"order_by";s:4:"date";s:10:"sort_order";s:4:"desc";}'),
(55, 'rss', 'rss', 1, 0, 1, 'a:5:{s:5:"title";s:9:"Image CMS";s:11:"description";s:35:"Тестируем модуль RSS";s:10:"categories";a:1:{i:0;s:1:"3";}s:9:"cache_ttl";i:60;s:11:"pages_count";i:10;}'),
(72, 'imagebox', 'imagebox', 0, 1, 0, 'a:6:{s:9:"max_width";i:800;s:10:"max_height";i:600;s:11:"thumb_width";i:100;s:12:"thumb_height";i:100;s:14:"maintain_ratio";b:1;s:7:"quality";s:3:"95%";}'),
(60, 'menu', 'menu', 0, 1, 1, NULL),
(58, 'sitemap', 'sitemap', 1, 0, 1, 'a:5:{s:18:"main_page_priority";s:1:"1";s:13:"cats_priority";s:3:"0.9";s:14:"pages_priority";s:3:"0.5";s:20:"main_page_changefreq";s:6:"weekly";s:16:"pages_changefreq";s:7:"monthly";}'),
(80, 'search', 'search', 1, 0, 0, NULL),
(84, 'feedback', 'feedback', 1, 0, 0, 'a:2:{s:5:"email";s:19:"admin@localhost.loc";s:15:"message_max_len";i:550;}'),
(117, 'template_editor', 'template_editor', 0, 0, 0, NULL),
(86, 'group_mailer', 'group_mailer', 0, 0, 1, NULL),
(95, 'filter', 'filter', 1, 0, 0, NULL),
(96, 'cfcm', 'cfcm', 0, 0, 0, NULL),
(121, 'shop', 'reshop', 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `meta_title` varchar(300) DEFAULT NULL,
  `url` varchar(500) NOT NULL,
  `cat_url` varchar(260) DEFAULT NULL,
  `keywords` text,
  `description` text,
  `prev_text` text,
  `full_text` longtext NOT NULL,
  `category` int(11) NOT NULL,
  `full_tpl` varchar(50) DEFAULT NULL,
  `main_tpl` varchar(50) NOT NULL,
  `position` smallint(5) NOT NULL,
  `comments_status` smallint(1) NOT NULL,
  `comments_count` int(9) DEFAULT '0',
  `post_status` varchar(15) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publish_date` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `showed` int(11) NOT NULL,
  `lang` int(11) NOT NULL DEFAULT '0',
  `lang_alias` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `url` (`url`(333)),
  KEY `lang` (`lang`),
  KEY `post_status` (`post_status`(4)),
  KEY `cat_url` (`cat_url`),
  KEY `publish_date` (`publish_date`),
  KEY `category` (`category`),
  KEY `created` (`created`),
  KEY `updated` (`updated`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `meta_title`, `url`, `cat_url`, `keywords`, `description`, `prev_text`, `full_text`, `category`, `full_tpl`, `main_tpl`, `position`, `comments_status`, `comments_count`, `post_status`, `author`, `publish_date`, `created`, `updated`, `showed`, `lang`, `lang_alias`) VALUES
(69, 'вид', '', 'speshite_priobresti_svoi_gps', 'novosti_i_aktsii/', 'рамках, акции, потеряйся, пустыне, gps, установлена, специальная, цена', 'В рамках акции не потеряйся в пустыне на все GPS установлена специальная цена.', '<p>В рамках акции "не потеряйся в пустыне" на все GPS установлена специальная цена.</p>', '', 56, '', '', 0, 0, 0, 'publish', 'kelios', 1291632619, 1291632635, 1316177253, 38, 3, 0),
(35, 'О сайте', '', 'o-sajte', '', 'это, базовый, шаблон, imagecms, котором, релизованы, следующие, функции, вывод, фотогалереи, статической, статьи, блога', 'Это базовый шаблон ImageCMS, на котором релизованы следующие функции: вывод фотогалереи, вывод статической статьи, вывод блога.', '<p>Это базовый шаблон ImageCMS, на котором релизованы следующие функции: отображение фотогалереи, отображение статической статьи, отображение корпоративного блога, отображение формы обратной связи.</p>\n<p>Общий вид шаблона можно отредактировать и изменить лого, графическую вставку на свои тематические.</p>\n<p>Слева в сайдбаре Вы видите список категорий блога, который легко вставляется с помощью функции {sub_category_list()} в файле main.tpl. Также в левом сайдбаре находится форма поиска по сайту, виджет последних комментариев и виджет тегов сайта. В этот сайдбар можно также добавить виджет последних либо популярных новостей, а также любые счетчики, информеры.</p>\n<p>Верхнее меню реализовано с помощью модуля Меню. Управлять его содержимым можно из административной части в разделе Меню - Главное меню. Сюда как правило можно еще добавить страницы: о компании, контакты, услуги и т.п.</p>\n<p>За дополнительной информацией обращайтесь в официальный раздел документации: <a href="http://www.imagecms.net/wiki">http://www.imagecms.net/wiki</a></p>\n<p>Обсудить дополнительные возможности, а также вопросы по установке, настройке системы можно на официальном форуме: <a href="http://forum.imagecms.net/index.php">http://forum.imagecms.net/</a></p>', '', 0, 'page_static', '', 0, 1, 0, 'publish', 'admin', 1267203253, 1267203328, 1290100400, 12, 3, 0),
(64, 'О магазине', '', 'about', '', 'магазине', 'О магазине', '<p>Магазин ImageCMS Shop предоставляет огромный выбор техники на любой вкус по лучшим ценам.</p>\n<p>Наш магазин существует более 5 лет и за это время не было ни единого возврата товара.</p>\n<p>Мы обслуживаем ежедневно сотни покупателей и делаем это с радостью.</p>\n<p><strong>Покупайте технику у нас и становитесь обладателем лучшей в мире техники!!!</strong></p>', '', 0, '', '', 0, 1, 0, 'publish', 'admin', 1291295776, 1291295792, 1291743386, 240, 3, 0),
(65, 'Оплата', '', 'oplata', '', 'оплата', 'Оплата', '<p>Наш магазин поддерживает все доступные на данный момент методы оплаты.</p>\n<p>Также действует возможность оплаты курьеру при доставке для всех крупных городов Украины и России. (возможность оплаты курьеру в Вашем городе уточняйте по телефону <strong>0 800 820 22 22</strong>).</p>', '', 0, '', '', 0, 1, 0, 'publish', 'admin', 1291295824, 1291295836, 1291743521, 126, 3, 0),
(66, 'Доставка', '', 'dostavka', '', 'доставка', 'Доставка', '<p>Мы поддерживаем доставку службой Автомир по всему миру.</p>\n<p>Также возможна доставка курьером для всех больших городов Украины и России (возможность доставки курьером в Вашем городе уточняйте по телефону <strong>0 800 820 22 22</strong>).</p>\n<p>При желании Вы можете сами забрать купленный товар в наших офисах.</p>', '', 0, '', '', 0, 1, 0, 'publish', 'admin', 1291295844, 1291295851, 1291743683, 96, 3, 0),
(67, 'Помощь', '', 'help', '', 'помощь', 'Помощь', '<p>Для того, чтобы приобрести товар в нашем магазине, Вам нужно выполнить несколько простых шагов:</p>\n<ul>\n<li>Выбрать нужный товар, воспользовавшить навигацией слева, либо поиском.</li>\n<li>Добавить товар в корзину.</li>\n<li>Перейти в корзину, выбрать способ доставки и указать Ваши контактные данные.</li>\n<li>Подтвердить заказ и выбрать способ оплаты.</li>\n</ul>\n<p>После этого наши менеджеры свяжуться с Вами и помогут с оплатой и доставкой товара, а также проконсультируют по любому вопросу.</p>', '', 0, '', '', 0, 1, 0, 'publish', 'admin', 1291295855, 1291295867, 1291743919, 50, 3, 0),
(68, 'Контакты', '', 'contact_us', '', 'контакты', 'Контакты', '<p><strong>Горячий телефон</strong>: 0 800 80 80 800</p>\n<p><strong>Главный офис в Москве</strong></p>\n<p>ул. Гагарина 1/2</p>\n<p>тел. 095 095 00 00</p>\n<p>&nbsp;</p>\n<p><strong>Главный офис в Киеве</strong></p>\n<p>ул. Гагарина 1/2</p>\n<p>тел. 098 098 00 00</p>', '', 0, '', '', 0, 1, 0, 'publish', 'admin', 1291295870, 1291295888, 1291744068, 49, 3, 0),
(100, 'n,mn,', '', 'nmn', 'novosti_i_aktsii/', '', 'nm, n,mn,', '<p>nm,</p>', '<p>n,mn,</p>', 56, '', '', 0, 1, 0, 'publish', 'kelios', 1316175198, 1316175198, 0, 0, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `content_fields`
--

CREATE TABLE IF NOT EXISTS `content_fields` (
  `field_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `group` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL,
  `in_search` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`field_name`),
  UNIQUE KEY `field_name` (`field_name`),
  KEY `type` (`type`),
  KEY `in_search` (`in_search`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content_fields`
--

INSERT INTO `content_fields` (`field_name`, `type`, `label`, `data`, `group`, `weight`, `in_search`) VALUES
('field_field1', 'text', 'Field 1', '', 7, 1, 1),
('field_pole2', 'select', 'Pole 2', 'a:3:{s:7:"initial";s:13:"value1\nvalue2";s:9:"help_text";s:0:"";s:10:"validation";s:0:"";}', 7, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_fields_data`
--

CREATE TABLE IF NOT EXISTS `content_fields_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_type` varchar(15) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `item_type` (`item_type`),
  KEY `field_name` (`field_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `content_fields_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `content_field_groups`
--

CREATE TABLE IF NOT EXISTS `content_field_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `content_field_groups`
--

INSERT INTO `content_field_groups` (`id`, `name`, `description`) VALUES
(7, 'test', 'sdfsdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `content_permissions`
--

CREATE TABLE IF NOT EXISTS `content_permissions` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `page_id` bigint(11) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `content_permissions`
--

INSERT INTO `content_permissions` (`id`, `page_id`, `data`) VALUES
(21, 35, 'a:3:{i:0;a:1:{s:7:"role_id";s:1:"0";}i:1;a:1:{s:7:"role_id";s:1:"1";}i:2;a:1:{s:7:"role_id";s:1:"2";}}');

-- --------------------------------------------------------

--
-- Table structure for table `content_tags`
--

CREATE TABLE IF NOT EXISTS `content_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `content_tags`
--


-- --------------------------------------------------------

--
-- Table structure for table `gallery_albums`
--

CREATE TABLE IF NOT EXISTS `gallery_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `cover_id` int(11) DEFAULT '0',
  `position` int(9) DEFAULT '0',
  `created` int(11) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `created` (`created`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gallery_albums`
--

INSERT INTO `gallery_albums` (`id`, `category_id`, `name`, `description`, `cover_id`, `position`, `created`, `updated`) VALUES
(1, 1, 'new album', '', 0, 0, 1264086406, 1307538865);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_category`
--

CREATE TABLE IF NOT EXISTS `gallery_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `cover_id` int(11) DEFAULT '0',
  `position` int(9) DEFAULT '0',
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created` (`created`),
  KEY `position` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gallery_category`
--

INSERT INTO `gallery_category` (`id`, `name`, `description`, `cover_id`, `position`, `created`) VALUES
(1, 'test category', '', 0, 0, 1264086398);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  `file_ext` varchar(8) DEFAULT NULL,
  `file_size` varchar(20) DEFAULT NULL,
  `position` int(9) DEFAULT NULL,
  `width` int(6) DEFAULT NULL,
  `height` int(6) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `uploaded` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`),
  KEY `position` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `album_id`, `file_name`, `file_ext`, `file_size`, `position`, `width`, `height`, `description`, `uploaded`, `views`) VALUES
(18, 1, 'test', '.jpg', '201.3 Кб', 1, 800, 600, NULL, 1266935445, 229),
(19, 1, 'Frangipani_Flowers', '.jpg', '53.2 Кб', 2, 800, 600, NULL, 1266935848, 231),
(37, 1, 'flowers', '.jpg', '81.8 Кб', 4, 800, 600, NULL, 1307538860, 0),
(36, 1, 'winter', '.jpg', '103.1 Кб', 3, 800, 600, NULL, 1307538860, 0);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(100) NOT NULL,
  `identif` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `folder` varchar(100) NOT NULL,
  `template` varchar(100) NOT NULL,
  `default` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `identif` (`identif`),
  KEY `default` (`default`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang_name`, `identif`, `image`, `folder`, `template`, `default`) VALUES
(3, 'Русский', 'ru', '', 'russian', 'default', 1),
(30, 'ua', 'ua', '', 'english', 'commerce', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ip_address` (`ip_address`),
  KEY `time` (`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=272 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `username`, `message`, `date`) VALUES
(42, 1, 'kelios', 'Очистил кеш', 1316073072),
(43, 1, 'kelios', 'Очистил кеш', 1316074462),
(44, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1316076565),
(45, 1, 'kelios', 'Очистил кеш', 1316078311),
(46, 1, 'kelios', 'Очистил кеш', 1316078314),
(47, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">Спешите приобрести свой GPS</a>', 1316096366),
(48, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">гшзщшзшщз</a>', 1316096395),
(49, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">гшзщшзшщз</a>', 1316096444),
(50, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">гщшгшщг</a>', 1316096449),
(51, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">гщшгшщг</a>', 1316096729),
(52, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">плопрло</a>', 1316096847),
(53, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">апорапрап</a>', 1316096875),
(54, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">ыфвфывыф</a>', 1316096903),
(55, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">ололролорл</a>', 1316097054),
(56, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">пррпп</a>', 1316097622),
(57, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">пррпп</a>', 1316097726),
(58, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">ирьпропо</a>', 1316097758),
(59, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316097799),
(60, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316097930),
(61, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/72''); return false;">онегоенвно</a>', 1316098014),
(62, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316098055),
(63, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/72''); return false;">онегоенвно</a>', 1316098138),
(64, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316098594),
(65, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316098602),
(66, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316098630),
(67, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316098677),
(68, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316098697),
(69, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316098735),
(70, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316098742),
(71, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316098751),
(72, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/73''); return false;">егеген</a>', 1316098812),
(73, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316098904),
(74, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316098951),
(75, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/74''); return false;">фывыфвфы</a>', 1316099008),
(76, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/75''); return false;">ываываыв</a>', 1316099252),
(77, 1, 'kelios', 'Удалил страницу ID 75', 1316099483),
(78, 1, 'kelios', 'Удалил страницу ID 73', 1316099483),
(79, 1, 'kelios', 'Удалил страницу ID 74', 1316099492),
(80, 1, 'kelios', 'Удалил страницу ID 72', 1316099492),
(81, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/76''); return false;">ачпрапрапр</a>', 1316099553),
(82, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/77''); return false;">олгрлолрол</a>', 1316099598),
(83, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/78''); return false;">ываыва</a>', 1316099810),
(84, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/79''); return false;">иордолд</a>', 1316099942),
(85, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/80''); return false;">щшщгщгшщгшщ</a>', 1316100171),
(86, 1, 'kelios', 'Удалил страницу ID 80', 1316100289),
(87, 1, 'kelios', 'Удалил страницу ID 79', 1316100289),
(88, 1, 'kelios', 'Удалил страницу ID 78', 1316100289),
(89, 1, 'kelios', 'Удалил страницу ID 77', 1316100289),
(90, 1, 'kelios', 'Удалил страницу ID 76', 1316100289),
(91, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1316153022),
(92, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316153483),
(93, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316153487),
(94, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316153488),
(95, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316153542),
(96, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/81''); return false;">asdsad</a>', 1316153621),
(97, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316153917),
(98, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316153919),
(99, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316153920),
(100, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316153921),
(101, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316153927),
(102, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316153943),
(103, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154153),
(104, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154196),
(105, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154761),
(106, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154865),
(107, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154880),
(108, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154894),
(109, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154906),
(110, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154919),
(111, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154925),
(112, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154944),
(113, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154975),
(114, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154982),
(115, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316154984),
(116, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155176),
(117, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155230),
(118, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155280),
(119, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155395),
(120, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155433),
(121, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155435),
(122, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155436),
(123, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155439),
(124, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155453),
(125, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155454),
(126, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155466),
(127, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155478),
(128, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155500),
(129, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155504),
(130, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155531),
(131, 1, 'kelios', 'Очистил кеш', 1316155540),
(132, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155593),
(133, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155625),
(134, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155633),
(135, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316155637),
(136, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316156106),
(137, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316156108),
(138, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316156113),
(139, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316156132),
(140, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316156436),
(141, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316160147),
(142, 1, 'kelios', 'Очистил кеш', 1316160955),
(143, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/82''); return false;">fhjkfhjk</a>', 1316163579),
(144, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/83''); return false;">uioiuiyp</a>', 1316163707),
(145, 1, 'kelios', 'Удалил страницу ID 83', 1316163734),
(146, 1, 'kelios', 'Удалил страницу ID 82', 1316163734),
(147, 1, 'kelios', 'Удалил страницу ID 81', 1316163734),
(148, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/84''); return false;">dgjh</a>', 1316164883),
(149, 1, 'kelios', 'Удалил страницу ID 84', 1316164891),
(150, 1, 'kelios', 'Удалил страницу ID 85', 1316165015),
(151, 1, 'kelios', 'Удалил страницу ID 86', 1316165480),
(152, 1, 'kelios', 'Удалил страницу ID 87', 1316165549),
(153, 1, 'kelios', 'Удалил страницу ID 88', 1316165641),
(154, 1, 'kelios', 'Удалил страницу ID 89', 1316165696),
(155, 1, 'kelios', 'Удалил страницу ID 90', 1316166438),
(156, 1, 'kelios', 'Удалил страницу ID 92', 1316167044),
(157, 1, 'kelios', 'Удалил страницу ID 91', 1316167048),
(158, 1, 'kelios', 'Удалил страницу ID 93', 1316167903),
(159, 1, 'kelios', 'Очистил кеш', 1316168260),
(160, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316168744),
(161, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316168792),
(162, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316168797),
(163, 1, 'kelios', 'Удалил страницу ID 94', 1316168855),
(164, 1, 'kelios', 'Удалил страницу ID 95', 1316168855),
(165, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316168961),
(166, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316168982),
(167, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316168999),
(168, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316169034),
(169, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316169073),
(170, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316169349),
(171, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316169367),
(172, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316169748),
(173, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316169829),
(174, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316169946),
(175, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316169978),
(176, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316170017),
(177, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316170289),
(178, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316170585),
(179, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171034),
(180, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171349),
(181, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171459),
(182, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171498),
(183, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171504),
(184, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171509),
(185, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171529),
(186, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171616),
(187, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171694),
(188, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171729),
(189, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171802),
(190, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171814),
(191, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171840),
(192, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171845),
(193, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316171951),
(194, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316172063),
(195, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316172071),
(196, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316172072),
(197, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316172073),
(198, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316172074),
(199, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316172106),
(200, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/96''); return false;">sdfhgfghfgh</a>', 1316172171),
(201, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173347),
(202, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173355),
(203, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173358),
(204, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173363),
(205, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173401),
(206, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173403),
(207, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173407),
(208, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173450),
(209, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173453),
(210, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173500),
(211, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173504),
(212, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173518),
(213, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316173536),
(214, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/97''); return false;">кфукйку</a>', 1316174143),
(215, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/98''); return false;">hvjkhjkh</a>', 1316174279),
(216, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/99''); return false;">hgjhghj</a>', 1316174387),
(217, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316174480),
(218, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316174520),
(219, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316174661),
(220, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316174668),
(221, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316174672),
(222, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316174684),
(223, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316174693),
(224, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316174810),
(225, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316174926),
(226, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316174936),
(227, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/100''); return false;">n,mn,</a>', 1316175265),
(228, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/101''); return false;"></a>', 1316175520),
(229, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316176682),
(230, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316176686),
(231, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316176720),
(232, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316176724),
(233, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316176735),
(234, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316176741),
(235, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316177246),
(236, 1, 'kelios', '\n            Изменил страницу  \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/69''); return false;">вид</a>', 1316177253),
(237, 1, 'kelios', '\n            Создал страницу \n            <a href="#" onclick="ajax_div(''page'',''http://www.imshop/admin/pages/edit/102''); return false;">n,jkljk</a>', 1316179158),
(238, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1316180135),
(239, 1, 'kelios', 'Удалил страницу ID 102', 1316180283),
(240, 1, 'kelios', 'Удалил страницу ID 99', 1316180283),
(241, 1, 'kelios', 'Удалил страницу ID 98', 1316180283),
(242, 1, 'kelios', 'Удалил страницу ID 97', 1316180283),
(243, 1, 'kelios', 'Удалил страницу ID 96', 1316180283),
(244, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1316181707),
(245, 1, 'kelios', 'Удалил страницу ID 101', 1316181976),
(246, 1, 'kelios', 'Изменил настройки модуля shop', 1316183271),
(247, 1, 'kelios', 'Изменил настройки модуля shop', 1316183277),
(248, 1, 'kelios', 'Изменил настройки модуля shop', 1316183284),
(249, 1, 'kelios', 'Изменил настройки модуля shop', 1316183739),
(250, 1, 'kelios', 'Изменил настройки модуля shop', 1316183776),
(251, 1, 'kelios', 'Изменил настройки модуля shop', 1316183796),
(252, 1, 'kelios', 'Изменил настройки модуля shop', 1316185808),
(253, 1, 'kelios', 'Изменил настройки модуля shop', 1316185893),
(254, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1316412549),
(255, 1, 'kelios', 'Изменил настройки модуля shop', 1316412599),
(256, 1, 'kelios', 'Изменил настройки модуля shop', 1316412670),
(257, 1, 'kelios', 'Изменил настройки модуля shop', 1316420735),
(258, 1, 'kelios', 'Изменил настройки модуля shop', 1316422586),
(259, 1, 'kelios', 'Изменил настройки модуля shop', 1316422972),
(260, 1, 'kelios', 'Изменил настройки модуля shop', 1316423281),
(261, 1, 'kelios', 'Изменил настройки модуля comments', 1316427227),
(262, 1, 'kelios', 'Изменил настройки модуля gallery', 1316427571),
(263, 1, 'kelios', 'Изменил настройки модуля shop', 1316429105),
(264, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1316429672),
(265, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1316429962),
(266, 1, 'kelios', 'Изменил настройки модуля auth', 1316429974),
(267, 1, 'kelios', 'Изменил настройки модуля auth', 1316430091),
(268, 1, 'kelios', 'Изменил настройки модуля shop', 1316431254),
(269, 1, 'kelios', 'Изменил настройки модуля auth', 1316431275),
(270, 1, 'kelios', 'Вошел в панель управления IP 127.0.0.1', 1316692666),
(271, 1, 'kelios', 'Изменил настройки модуля auth', 1316692690);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `main_title` varchar(300) NOT NULL,
  `tpl` varchar(255) DEFAULT NULL,
  `expand_level` int(255) DEFAULT NULL,
  `description` text,
  `created` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `main_title`, `tpl`, `expand_level`, `description`, `created`) VALUES
(1, 'main_menu', 'Главное меню', '0', 0, NULL, '2010-04-27 13:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `menus_data`
--

CREATE TABLE IF NOT EXISTS `menus_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(9) NOT NULL,
  `item_id` int(9) NOT NULL,
  `item_type` varchar(15) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `roles` text,
  `hidden` smallint(1) NOT NULL DEFAULT '0',
  `title` varchar(300) NOT NULL,
  `parent_id` int(9) NOT NULL,
  `position` smallint(5) DEFAULT NULL,
  `description` text,
  `add_data` text,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `position` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `menus_data`
--

INSERT INTO `menus_data` (`id`, `menu_id`, `item_id`, `item_type`, `item_image`, `roles`, `hidden`, `title`, `parent_id`, `position`, `description`, `add_data`) VALUES
(1, 1, 0, 'url', '', '', 0, 'Главная', 0, 4, NULL, '/'),
(2, 1, 51, 'category', '', '', 0, 'Блог', 0, 3, NULL, NULL),
(3, 1, 0, 'module', '', '', 0, 'Обратная связь', 0, 1, NULL, 'a:2:{s:8:"mod_name";s:8:"feedback";s:6:"method";s:0:"";}'),
(4, 1, 0, 'module', '', '', 0, 'Галерея', 0, 2, NULL, 'a:2:{s:8:"mod_name";s:7:"gallery";s:6:"method";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `menu_translate`
--

CREATE TABLE IF NOT EXISTS `menu_translate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `lang_id` (`lang_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `menu_translate`
--


-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `data`) VALUES
(1, 2, 'a:36:{s:9:"cp_access";s:1:"1";s:13:"cp_autoupdate";s:1:"1";s:14:"cp_page_search";s:1:"1";s:11:"lang_create";s:1:"1";s:9:"lang_edit";s:1:"1";s:11:"lang_delete";s:1:"1";s:16:"cp_site_settings";s:1:"1";s:11:"cache_clear";s:1:"1";s:11:"page_create";s:1:"1";s:9:"page_edit";s:1:"1";s:11:"page_delete";s:1:"1";s:15:"category_create";s:1:"1";s:13:"category_edit";s:1:"1";s:15:"category_delete";s:1:"1";s:14:"module_install";s:1:"1";s:16:"module_deinstall";s:1:"1";s:12:"module_admin";s:1:"1";s:13:"widget_create";s:1:"1";s:13:"widget_delete";s:1:"1";s:22:"widget_access_settings";s:1:"1";s:11:"menu_create";s:1:"1";s:9:"menu_edit";s:1:"1";s:11:"menu_delete";s:1:"1";s:11:"user_create";s:1:"1";s:21:"user_create_all_roles";s:1:"1";s:9:"user_edit";s:1:"1";s:11:"user_delete";s:1:"1";s:14:"user_view_data";s:1:"1";s:14:"xfields_create";s:1:"1";s:14:"xfields_delete";s:1:"1";s:12:"xfields_edit";s:1:"1";s:12:"roles_create";s:1:"1";s:10:"roles_edit";s:1:"1";s:12:"roles_delete";s:1:"1";s:9:"logs_view";s:1:"1";s:13:"backup_create";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `propel_migration`
--

CREATE TABLE IF NOT EXISTS `propel_migration` (
  `version` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `propel_migration`
--

INSERT INTO `propel_migration` (`version`) VALUES
(1307623010);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `alt_name` varchar(50) NOT NULL,
  `desc` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `parent_id`, `name`, `alt_name`, `desc`) VALUES
(1, 0, 'user', 'Пользователи', ''),
(2, 0, 'admin', 'Администраторы', '');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(264) DEFAULT NULL,
  `datetime` int(11) DEFAULT NULL,
  `where_array` text,
  `select_array` text,
  `table_name` varchar(100) DEFAULT NULL,
  `order_by` text,
  `row_count` int(11) DEFAULT NULL,
  `total_rows` int(11) DEFAULT NULL,
  `ids` text,
  `search_title` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hash` (`hash`),
  KEY `datetime` (`datetime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `search`
--


-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `lk` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `s_name` (`s_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `s_name`, `site_title`, `site_short_title`, `site_description`, `site_keywords`, `create_keywords`, `create_description`, `create_cat_keywords`, `create_cat_description`, `add_site_name`, `add_site_name_to_cat`, `delimiter`, `editor_theme`, `site_template`, `site_offline`, `main_type`, `main_page_id`, `main_page_cat`, `main_page_module`, `sidepanel`, `lk`) VALUES
(2, 'main', 'imshop', 'ImageCMS Shop', 'Продажа качественной техники с гарантией и доставкой', 'магазин техники, покупка техники, доставка техники', 'auto', 'auto', '0', '0', 1, 1, '/', 'advanced', 'commerce', 'no', 'module', 35, '1', 'shop', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shop_brands`
--

CREATE TABLE IF NOT EXISTS `shop_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_brands_I_1` (`name`(333)),
  KEY `shop_brands_I_2` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `shop_brands`
--

INSERT INTO `shop_brands` (`id`, `name`, `url`, `description`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(10, 'LG', '10', '<p><strong>LG Group</strong> (&laquo;Lucky Goldstar&raquo;, <a title="Корейский язык" href="http://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D1%80%D0%B5%D0%B9%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA">кор.</a> <span style="font-size: 110%;" lang="ko">LG??</span>)&nbsp;&mdash; третья по величине корпорация (бизнес-конгломерат&nbsp;&mdash; <a title="Чеболь" href="http://ru.wikipedia.org/wiki/%D0%A7%D0%B5%D0%B1%D0%BE%D0%BB%D1%8C">чеболь</a>) <a title="Южная Корея" href="http://ru.wikipedia.org/wiki/%D0%AE%D0%B6%D0%BD%D0%B0%D1%8F_%D0%9A%D0%BE%D1%80%D0%B5%D1%8F">Южной Кореи</a>,  производящая бытовую электронику, химическую продукцию и  телекоммуникационное оборудование и имеющая дочерние компании LG  Electronics, LG Display, LG Telecom и LG Chem в более чем 80 странах.  Штаб-квартира компании находится в <a title="Сеул" href="http://ru.wikipedia.org/wiki/%D0%A1%D0%B5%D1%83%D0%BB">Сеуле</a>.<sup id="cite_ref-b_0-0"><a href="http://ru.wikipedia.org/wiki/LG#cite_note-b-0">[1]</a></sup></p>', '', '', ''),
(11, 'Panasonic', '11', '<p><strong>Panasonic Corporation</strong> <span style="font-weight: normal;">(<a title="Японский язык" href="http://ru.wikipedia.org/wiki/%D0%AF%D0%BF%D0%BE%D0%BD%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA">яп.</a> <span style="font-size: 110%;" lang="ja">??????????</span> <em>панасоникку кабусикигайся</em><span><a title="Википедия:Японский язык" href="http://ru.wikipedia.org/wiki/%D0%92%D0%B8%D0%BA%D0%B8%D0%BF%D0%B5%D0%B4%D0%B8%D1%8F:%D0%AF%D0%BF%D0%BE%D0%BD%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA"><sup style="color: #0000ee; font: bold 80% sans-serif; text-decoration: none; padding-left: 0.1em;">?</sup></a></span>)</span>&nbsp;&mdash;  крупная японская машиностроительная корпорация, один из крупнейших в  мире производителей бытовой техники и электронных товаров. В 2007 году  компания заняла 59-е место по объёму выручки в глобальном рейтинге  компаний <a title="Fortune Global 500" href="http://ru.wikipedia.org/wiki/Fortune_Global_500">Fortune Global 500</a><sup id="cite_ref-0"><a href="http://ru.wikipedia.org/wiki/Panasonic#cite_note-0">[1]</a></sup>. До 1 октября <a title="2008 год" href="http://ru.wikipedia.org/wiki/2008_%D0%B3%D0%BE%D0%B4">2008 года</a> носила название Matsushita Electric Industrial Co., Ltd. (Panasonic  была одной из торговых марок этой компании). Штаб-квартира&nbsp;&mdash; в городе <a title="Кадома, Осака (страница отсутствует)" href="http://ru.wikipedia.org/w/index.php?title=%D0%9A%D0%B0%D0%B4%D0%BE%D0%BC%D0%B0,_%D0%9E%D1%81%D0%B0%D0%BA%D0%B0&amp;action=edit&amp;redlink=1">Кадома</a> <a title="Префектура Осака" href="http://ru.wikipedia.org/wiki/%D0%9F%D1%80%D0%B5%D1%84%D0%B5%D0%BA%D1%82%D1%83%D1%80%D0%B0_%D0%9E%D1%81%D0%B0%D0%BA%D0%B0">префектуры Осака</a> (<a title="Япония" href="http://ru.wikipedia.org/wiki/%D0%AF%D0%BF%D0%BE%D0%BD%D0%B8%D1%8F">Япония</a>).</p>', '', '', ''),
(12, 'Samsung', '12', '', '', '', ''),
(9, 'Sony', '9', '', '', '', ''),
(13, 'Calypso', 'calypso', '', '', '', ''),
(14, 'Philips', 'philips', '', '', '', ''),
(15, 'Yamaha', '15', '', '', '', ''),
(16, 'Canon', 'canon', '<p>Корпорация <strong>Кэ?нон</strong> (<a title="Английский язык" href="http://ru.wikipedia.org/wiki/%D0%90%D0%BD%D0%B3%D0%BB%D0%B8%D0%B9%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA">англ.</a>&nbsp;<em><span lang="en">Canon Inc.</span></em>, <a title="Японский язык" href="http://ru.wikipedia.org/wiki/%D0%AF%D0%BF%D0%BE%D0%BD%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA">яп.</a> <span style="font-size: 110%;" lang="ja">????????,</span> <em>Кянон кабусики гайся</em>) (<a title="Токийская фондовая биржа" href="http://ru.wikipedia.org/wiki/%D0%A2%D0%BE%D0%BA%D0%B8%D0%B9%D1%81%D0%BA%D0%B0%D1%8F_%D1%84%D0%BE%D0%BD%D0%B4%D0%BE%D0%B2%D0%B0%D1%8F_%D0%B1%D0%B8%D1%80%D0%B6%D0%B0">TYO</a>: <a rel="nofollow" href="http://stocks.us.reuters.com/stocks/overview.asp?symbol=7751.T"><strong>7751</strong></a>, <span><a title="Нью-Йоркская фондовая биржа" href="http://ru.wikipedia.org/wiki/%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA%D1%81%D0%BA%D0%B0%D1%8F_%D1%84%D0%BE%D0%BD%D0%B4%D0%BE%D0%B2%D0%B0%D1%8F_%D0%B1%D0%B8%D1%80%D0%B6%D0%B0">NYSE</a>: <a rel="nofollow" href="http://www.nyse.com/about/listed/lcddata.html?ticker=CAJ"><strong>CAJ</strong></a></span>)&nbsp;&mdash;  японская машиностроительная компания, один из мировых лидеров в области  создания цифрового оборудования для использования в офисе и дома. Со  времени основания в <a title="1937" href="http://ru.wikipedia.org/wiki/1937">1937</a>&nbsp;г. компания Canon заняла уверенные позиции в сферах <a title="Фотоаппарат" href="http://ru.wikipedia.org/wiki/%D0%A4%D0%BE%D1%82%D0%BE%D0%B0%D0%BF%D0%BF%D0%B0%D1%80%D0%B0%D1%82">фото-</a>, <a title="Видеокамера" href="http://ru.wikipedia.org/wiki/%D0%92%D0%B8%D0%B4%D0%B5%D0%BE%D0%BA%D0%B0%D0%BC%D0%B5%D1%80%D0%B0">видеотехники</a> и <a title="Информационные технологии" href="http://ru.wikipedia.org/wiki/%D0%98%D0%BD%D1%84%D0%BE%D1%80%D0%BC%D0%B0%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D1%8B%D0%B5_%D1%82%D0%B5%D1%85%D0%BD%D0%BE%D0%BB%D0%BE%D0%B3%D0%B8%D0%B8">информационных технологий</a>. Главный офис компании расположен в <a title="Токио" href="http://ru.wikipedia.org/wiki/%D0%A2%D0%BE%D0%BA%D0%B8%D0%BE">Токио</a> (<a title="Япония" href="http://ru.wikipedia.org/wiki/%D0%AF%D0%BF%D0%BE%D0%BD%D0%B8%D1%8F">Япония</a>)</p>', 'Canon', 'Canon', 'Canon'),
(17, 'Epson', 'epson', '<p><strong>Seiko Epson Corporation</strong> <span style="font-weight: normal;">(<a title="Японский язык" href="http://ru.wikipedia.org/wiki/%D0%AF%D0%BF%D0%BE%D0%BD%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA">яп.</a> <span style="font-size: 110%;" lang="ja">????????????</span> <em>сэйко:эпусон кабусикигайся</em><span><a title="Википедия:Японский язык" href="http://ru.wikipedia.org/wiki/%D0%92%D0%B8%D0%BA%D0%B8%D0%BF%D0%B5%D0%B4%D0%B8%D1%8F:%D0%AF%D0%BF%D0%BE%D0%BD%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA"><sup style="color: #0000ee; font: bold 80% sans-serif; text-decoration: none; padding-left: 0.1em;">?</sup></a></span>, Сейко Эпсон Корпорейшн)</span>&nbsp;&mdash; структурное подразделение японского многоотраслевого концерна <a title="Seiko Group (страница отсутствует)" href="http://ru.wikipedia.org/w/index.php?title=Seiko_Group&amp;action=edit&amp;redlink=1">Seiko Group</a>. Один из крупнейших производителей струйных, матричных и лазерных <a title="Принтер" href="http://ru.wikipedia.org/wiki/%D0%9F%D1%80%D0%B8%D0%BD%D1%82%D0%B5%D1%80">принтеров</a>, <a title="Сканер" href="http://ru.wikipedia.org/wiki/%D0%A1%D0%BA%D0%B0%D0%BD%D0%B5%D1%80">сканеров</a>, настольных компьютеров, проекторов, а также других электронных компонентов. Компания базируется в <a title="Япония" href="http://ru.wikipedia.org/wiki/%D0%AF%D0%BF%D0%BE%D0%BD%D0%B8%D1%8F">Японии</a> и имеет множество дочерних компаний по всему миру.</p>', '', '', ''),
(18, 'Plantronics', 'plantronics', '', '', '', ''),
(19, 'Motorola', 'motorola', '<p><strong>Motorola Inc.</strong> (<span><a title="Нью-Йоркская фондовая биржа" href="http://ru.wikipedia.org/wiki/%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA%D1%81%D0%BA%D0%B0%D1%8F_%D1%84%D0%BE%D0%BD%D0%B4%D0%BE%D0%B2%D0%B0%D1%8F_%D0%B1%D0%B8%D1%80%D0%B6%D0%B0">NYSE</a>: <a rel="nofollow" href="http://www.nyse.com/about/listed/lcddata.html?ticker=MOT"><strong>MOT</strong></a></span>)&nbsp;&mdash; один из мировых лидеров в области интегрированных телекоммуникаций, и встроенных электронных систем, входит в список <a title="Fortune 100 (страница отсутствует)" href="http://ru.wikipedia.org/w/index.php?title=Fortune_100&amp;action=edit&amp;redlink=1">Fortune 100</a> крупнейших компаний в <a title="США" href="http://ru.wikipedia.org/wiki/%D0%A1%D0%A8%D0%90">США</a>. Штаб-квартира&nbsp;&mdash; в <a title="Шаумбург (Иллинойс) (страница отсутствует)" href="http://ru.wikipedia.org/w/index.php?title=%D0%A8%D0%B0%D1%83%D0%BC%D0%B1%D1%83%D1%80%D0%B3_%28%D0%98%D0%BB%D0%BB%D0%B8%D0%BD%D0%BE%D0%B9%D1%81%29&amp;action=edit&amp;redlink=1">Шаумбурге</a>, неподалеку от <a title="Чикаго" href="http://ru.wikipedia.org/wiki/%D0%A7%D0%B8%D0%BA%D0%B0%D0%B3%D0%BE">Чикаго</a>, штат <a title="Иллинойс" href="http://ru.wikipedia.org/wiki/%D0%98%D0%BB%D0%BB%D0%B8%D0%BD%D0%BE%D0%B9%D1%81">Иллинойс</a> (США).</p>', '', '', ''),
(20, 'Pioneer', 'pioneer', '', '', '', ''),
(21, 'Pyle', 'pyle', '', '', '', ''),
(22, 'JVC', 'jvc', '<p><strong>Japan Victor Company Ltd. (JVC)</strong> <span style="font-weight: normal;">(<a title="Японский язык" href="http://ru.wikipedia.org/wiki/%D0%AF%D0%BF%D0%BE%D0%BD%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA">яп.</a> <span style="font-size: 110%;" lang="ja">??????????</span> <em>Нихон бикута: кабусикигайся</em><span><a title="Википедия:Японский язык" href="http://ru.wikipedia.org/wiki/%D0%92%D0%B8%D0%BA%D0%B8%D0%BF%D0%B5%D0%B4%D0%B8%D1%8F:%D0%AF%D0%BF%D0%BE%D0%BD%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA"><sup style="color: #0000ee; font: bold 80% sans-serif; text-decoration: none; padding-left: 0.1em;">?</sup></a></span>)</span> (<a title="Токийская фондовая биржа" href="http://ru.wikipedia.org/wiki/%D0%A2%D0%BE%D0%BA%D0%B8%D0%B9%D1%81%D0%BA%D0%B0%D1%8F_%D1%84%D0%BE%D0%BD%D0%B4%D0%BE%D0%B2%D0%B0%D1%8F_%D0%B1%D0%B8%D1%80%D0%B6%D0%B0">TYO</a>: <a rel="nofollow" href="http://stocks.us.reuters.com/stocks/overview.asp?symbol=6792.T"><strong>6792</strong></a>)&nbsp;&mdash; японская компания, разработчик формата видеозаписи <a title="VHS" href="http://ru.wikipedia.org/wiki/VHS">VHS</a>. Штаб-квартира&nbsp;&mdash; в <a title="Иокогама" href="http://ru.wikipedia.org/wiki/%D0%98%D0%BE%D0%BA%D0%BE%D0%B3%D0%B0%D0%BC%D0%B0">Иокогаме</a>.</p>\n<p>Основана в <a title="1927 год" href="http://ru.wikipedia.org/wiki/1927_%D0%B3%D0%BE%D0%B4">1927 году</a>.</p>\n<p>C середины 60-х годов контрольный пакет принадлежит компании <a title="Matsushita" href="http://ru.wikipedia.org/wiki/Matsushita">Matsushita</a> (владельцу торговой марки <a title="Panasonic (торговая марка)" href="http://ru.wikipedia.org/wiki/Panasonic_%28%D1%82%D0%BE%D1%80%D0%B3%D0%BE%D0%B2%D0%B0%D1%8F_%D0%BC%D0%B0%D1%80%D0%BA%D0%B0%29">Panasonic</a>).</p>', '', '', ''),
(23, 'Garmin', 'garmin', '<p><strong>Garmin Ltd.</strong>&nbsp;&mdash; производитель <a title="GPS" href="http://ru.wikipedia.org/wiki/GPS">GPS</a>-навигационной техники.</p>\n<p>Компания была основана в <a title="1989 год" href="http://ru.wikipedia.org/wiki/1989_%D0%B3%D0%BE%D0%B4">1989 году</a> в городе <a title="Олатэ (Канзас) (страница отсутствует)" href="http://ru.wikipedia.org/w/index.php?title=%D0%9E%D0%BB%D0%B0%D1%82%D1%8D_%28%D0%9A%D0%B0%D0%BD%D0%B7%D0%B0%D1%81%29&amp;action=edit&amp;redlink=1">Олатэ</a> (<a title="США" href="http://ru.wikipedia.org/wiki/%D0%A1%D0%A8%D0%90">США</a>). Европейское представительство находится в <a title="Великобритания" href="http://ru.wikipedia.org/wiki/%D0%92%D0%B5%D0%BB%D0%B8%D0%BA%D0%BE%D0%B1%D1%80%D0%B8%D1%82%D0%B0%D0%BD%D0%B8%D1%8F">Великобритании</a>.</p>\n<p>Garmin производит <a title="GPS-приёмник" href="http://ru.wikipedia.org/wiki/GPS-%D0%BF%D1%80%D0%B8%D1%91%D0%BC%D0%BD%D0%B8%D0%BA">навигаторы</a> для воздушного, автомобильного, мото- и водного транспорта, а также для туристов и спортсменов.</p>', '', '', ''),
(24, 'TomTom', 'tomtom', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE IF NOT EXISTS `shop_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text,
  `meta_desc` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `full_path` varchar(1000) DEFAULT NULL,
  `full_path_ids` varchar(250) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_category_I_1` (`name`),
  KEY `shop_category_I_2` (`url`),
  KEY `shop_category_I_3` (`active`),
  KEY `shop_category_I_4` (`parent_id`),
  KEY `shop_category_I_5` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`id`, `name`, `url`, `description`, `meta_desc`, `meta_title`, `meta_keywords`, `parent_id`, `position`, `full_path`, `full_path_ids`, `active`) VALUES
(52, 'Авто музыка и видео', 'avto_muzyka_i_video', '', '', '', '', 0, 17, 'avto_muzyka_i_video', 'a:0:{}', 1),
(51, 'Bluetooth', 'bluetooth', '', '', '', '', 48, 16, 'domashniaia_elektronika/bluetooth', 'a:1:{i:0;i:48;}', 1),
(50, 'Телефоны', 'telefony', '', '', '', '', 48, 15, 'domashniaia_elektronika/telefony', 'a:1:{i:0;i:48;}', 1),
(48, 'Домашняя электроника', 'domashniaia_elektronika', '', '', '', '', 0, 13, 'domashniaia_elektronika', 'a:0:{}', 1),
(46, 'Фотопринтеры', 'fotoprintery', '', '', '', '', 44, 11, 'foto_i_kamery/fotoprintery', 'a:1:{i:0;i:44;}', 1),
(45, 'Цифровые камеры', 'tsifrovye_kamery', '', '', '', '', 44, 10, 'foto_i_kamery/tsifrovye_kamery', 'a:1:{i:0;i:44;}', 1),
(44, 'Фото и камеры', 'foto_i_kamery', '', '', '', '', 0, 9, 'foto_i_kamery', 'a:0:{}', 1),
(43, 'Спикеры', 'saund_bary', '', '', '', '', 40, 8, 'domashnee_audio/saund_bary', 'a:1:{i:0;i:40;}', 1),
(41, 'Домашние театры', 'domashnie_teatry', '', '', '', '', 40, 6, 'domashnee_audio/domashnie_teatry', 'a:1:{i:0;i:40;}', 1),
(40, 'Домашнее аудио', 'domashnee_audio', '', '', '', '', 0, 5, 'domashnee_audio', 'a:0:{}', 1),
(36, 'Видео', 'video', '', '', '', '', 0, 1, 'video', 'a:0:{}', 1),
(37, 'TV & HDTV', 'tv_hdtv', '', '', '', '', 36, 2, 'video/tv_hdtv', 'a:1:{i:0;i:36;}', 1),
(38, 'DVD/DVR Плееры', 'dvd_dvr_pleery', '', '', '', '', 36, 3, 'video/dvd_dvr_pleery', 'a:1:{i:0;i:36;}', 1),
(39, 'Blu-Ray Плееры', 'blu-ray', '', '', '', '', 36, 4, 'video/blu-ray', 'a:1:{i:0;i:36;}', 1),
(53, 'Сабвуферы', 'subwoofer', '', '', '', '', 52, 18, 'avto_muzyka_i_video/subwoofer', 'a:1:{i:0;i:52;}', 1),
(54, 'CD Ченджеры', 'cd_chendzhery', '', '', '', '', 52, 19, 'avto_muzyka_i_video/cd_chendzhery', 'a:1:{i:0;i:52;}', 1),
(55, 'GPS', 'gps', '', '', '', '', 52, 20, 'avto_muzyka_i_video/gps', 'a:1:{i:0;i:52;}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_currencies`
--

CREATE TABLE IF NOT EXISTS `shop_currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `main` tinyint(4) DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT NULL,
  `code` varchar(5) DEFAULT NULL,
  `symbol` varchar(5) DEFAULT NULL,
  `rate` float(6,3) DEFAULT '1.000',
  PRIMARY KEY (`id`),
  KEY `shop_currencies_I_1` (`name`),
  KEY `shop_currencies_I_2` (`main`),
  KEY `shop_currencies_I_3` (`is_default`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shop_currencies`
--

INSERT INTO `shop_currencies` (`id`, `name`, `main`, `is_default`, `code`, `symbol`, `rate`) VALUES
(1, 'Доллары', 1, 1, 'USD', '$', 1.000),
(2, 'Рубли', 0, 0, 'RUR', 'руб', 30.600);

-- --------------------------------------------------------

--
-- Table structure for table `shop_delivery_methods`
--

CREATE TABLE IF NOT EXISTS `shop_delivery_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `description` text,
  `price` float(10,2) NOT NULL,
  `free_from` float(10,2) NOT NULL,
  `enabled` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_delivery_methods_I_1` (`name`(333)),
  KEY `shop_delivery_methods_I_2` (`enabled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `shop_delivery_methods`
--

INSERT INTO `shop_delivery_methods` (`id`, `name`, `description`, `price`, `free_from`, `enabled`) VALUES
(7, 'Самовывоз', '', 0.00, 0.00, 1),
(5, 'Курьером', '<p>Только по Киеву и Москве</p>', 0.00, 0.00, 1),
(6, 'АвтоМир', '<p>Доставка по всему миру</p>', 100.00, 1000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_delivery_methods_systems`
--

CREATE TABLE IF NOT EXISTS `shop_delivery_methods_systems` (
  `delivery_method_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  PRIMARY KEY (`delivery_method_id`,`payment_method_id`),
  KEY `shop_delivery_methods_systems_FI_2` (`payment_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_delivery_methods_systems`
--

INSERT INTO `shop_delivery_methods_systems` (`delivery_method_id`, `payment_method_id`) VALUES
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `shop_discounts`
--

CREATE TABLE IF NOT EXISTS `shop_discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `date_start` int(11) DEFAULT NULL,
  `date_stop` int(11) DEFAULT NULL,
  `discount` varchar(11) DEFAULT NULL,
  `min_price` float(10,2) DEFAULT NULL,
  `max_price` float(10,2) DEFAULT NULL,
  `categories` text,
  `products` text,
  `description` text,
  `user_group` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shop_discounts`
--

INSERT INTO `shop_discounts` (`id`, `name`, `active`, `date_start`, `date_stop`, `discount`, `min_price`, `max_price`, `categories`, `products`, `description`, `user_group`) VALUES
(4, 'Скидка на Видео технику', 1, 1293829200, 1309377600, '10%', 0.00, 0.00, 'a:3:{i:0;s:2:"37";i:1;s:2:"38";i:2;s:2:"39";}', '', '<p>Скидка на Видео технику в размере 10%</p>', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `shop_orders`
--

CREATE TABLE IF NOT EXISTS `shop_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `delivery_method` int(11) DEFAULT NULL,
  `delivery_price` float(10,2) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `paid` tinyint(4) DEFAULT NULL,
  `user_full_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_deliver_to` varchar(500) DEFAULT NULL,
  `user_comment` varchar(1000) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_updated` int(11) DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_orders_I_1` (`key`),
  KEY `shop_orders_I_2` (`status`),
  KEY `shop_orders_I_3` (`date_created`),
  KEY `shop_orders_FI_1` (`delivery_method`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `shop_orders`
--

INSERT INTO `shop_orders` (`id`, `key`, `delivery_method`, `delivery_price`, `status`, `paid`, `user_full_name`, `user_email`, `user_phone`, `user_deliver_to`, `user_comment`, `date_created`, `date_updated`, `user_ip`, `user_id`) VALUES
(25, '8l49v3y824', 6, 100.00, 0, 0, 'tester', 'tester@localhost.loc', '099000000', 'test adres', 'comment text', 1302000706, 1302000706, '127.0.0.3', 1),
(27, '38p40u736c', 6, 100.00, 2, 0, 'Administrator', 'admin@localhost.loc', '0808808080', 'sdfsdfsdf', '', 1302009177, 1302009177, '127.0.0.3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_orders_products`
--

CREATE TABLE IF NOT EXISTS `shop_orders_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `variant_name` varchar(255) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_orders_products_I_1` (`order_id`),
  KEY `shop_orders_products_FI_1` (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `shop_orders_products`
--

INSERT INTO `shop_orders_products` (`id`, `order_id`, `product_id`, `variant_id`, `product_name`, `variant_name`, `price`, `quantity`) VALUES
(29, 25, 87, 98, 'Sony HT-SS370 Home Theater', '', 349.00, 1),
(31, 27, 94, 105, 'Yamaha NSIW760 Speaker', '', 99.95, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_payment_methods`
--

CREATE TABLE IF NOT EXISTS `shop_payment_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `active` tinyint(4) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `payment_system_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_payment_methods_I_1` (`name`),
  KEY `shop_payment_methods_I_2` (`position`),
  KEY `shop_payment_methods_FI_1` (`currency_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shop_payment_methods`
--

INSERT INTO `shop_payment_methods` (`id`, `name`, `description`, `active`, `currency_id`, `position`, `payment_system_name`) VALUES
(1, 'Оплата курьеру', '<p>Оплата через веб-моней</p>', 1, 1, 1, 'WebMoneySystem'),
(2, 'Оплата через Банк', '<p>Оплата через ОщадБанк Украины</p>', 1, 2, 2, 'OschadBankInvoiceSystem'),
(3, 'СберБанк России', '<p>Оплата через СберБанк России</p>', 1, 2, 3, 'SberBankInvoiceSystem'),
(4, 'Robokassa', '<p>Оплата с помощью Robokassa</p>', 1, 2, 4, 'RobokassaSystem');

-- --------------------------------------------------------

--
-- Table structure for table `shop_products`
--

CREATE TABLE IF NOT EXISTS `shop_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `url` varchar(255) NOT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `hit` tinyint(4) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `related_products` varchar(255) DEFAULT NULL,
  `mainImage` varchar(255) DEFAULT NULL,
  `smallImage` varchar(255) DEFAULT NULL,
  `short_description` text,
  `full_description` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `old_price` float(10,2) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `hot` tinyint(4) DEFAULT NULL,
  `action` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_products_I_1` (`name`(333)),
  KEY `shop_products_I_2` (`url`),
  KEY `shop_products_I_3` (`brand_id`),
  KEY `shop_products_I_4` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=170 ;

--
-- Dumping data for table `shop_products`
--

INSERT INTO `shop_products` (`id`, `name`, `url`, `active`, `hit`, `brand_id`, `category_id`, `related_products`, `mainImage`, `smallImage`, `short_description`, `full_description`, `meta_title`, `meta_description`, `meta_keywords`, `created`, `updated`, `old_price`, `views`, `hot`, `action`) VALUES
(71, 'Sony KDL46EX710 46" LCD 1080p HDTV', '71', 1, NULL, 9, 37, '72,73,74', '', '', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542725, 1307545867, 1150.00, NULL, NULL, NULL),
(72, 'LG 47LD450 - 47" Widescreen 1080p LCD HDTV', '72', 1, 0, 10, 37, '', '72_main.jpg', '72_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542324, 0, NULL, 5, NULL, NULL),
(73, 'Panasonic Viera TC-L42U22 42" LCD TV', '73', 1, 1, 11, 37, '', '73_main.jpg', '73_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307541561, 0, 0.00, NULL, NULL, NULL),
(74, 'Samsung LN40C650 40" LCD TV', '74', 1, 1, 12, 37, '', '74_main.jpg', '74_small.jpg', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', '', 1307543711, 1301492081, 0.00, 7, NULL, NULL),
(75, 'Calypso CLP-32LC1A 32" LCD 720p LCD', '75', 1, 0, 13, 37, '', '75_main.jpg', '75_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307544631, 0, NULL, NULL, NULL, NULL),
(76, 'Calypso CLP-32LE110 32" LED 720p HDTV', '76', 1, 0, 13, 37, '71, 72, 73', '76_main.jpg', '76_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543917, 0, NULL, 1, NULL, NULL),
(96, 'Canon VIXIA HF R11 Digital', '96', 1, 1, 16, 45, '', '96_main.jpg', '96_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542081, 0, NULL, NULL, NULL, NULL),
(77, 'Sony EXTERNAL DVDIRECT DVD', '77', 1, NULL, 9, 38, '', '77_main.jpg', '77_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542980, 1301492744, 0.00, NULL, NULL, NULL),
(78, 'Panasonic DVD-S58 DVD Player', '78', 1, NULL, 11, 38, '', '78_main.jpg', '78_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543572, 0, NULL, NULL, NULL, NULL),
(79, 'Panasonic DVD-S38 DVD', '79', 1, NULL, 11, 38, '', '79_main.jpg', '79_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307544450, 1316071355, 0.00, NULL, NULL, NULL),
(80, 'LG DN898 DVD Player', '80', 1, NULL, 10, 38, '', '80_main.jpg', '80_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307544569, 1316071336, 0.00, NULL, NULL, NULL),
(81, 'Samsung DVD-H1080 - 1080p', '81', 1, NULL, 12, 38, '', '81_main.jpg', '81_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307544442, 1301501092, 0.00, NULL, NULL, NULL),
(82, 'Samsung BD-C5500 Blu-ray', '82', 1, NULL, 12, 39, '', '82_main.jpg', '82_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542064, 1316073112, 0.00, NULL, NULL, NULL),
(83, 'Sony BDP-S470 Network', '83', 1, 0, 9, 39, '', '83_main.jpg', '83_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307545378, 0, NULL, NULL, NULL, NULL),
(84, 'Panasonic DMP-BD45 Ultra-Fast', '84', 1, NULL, 11, 39, '', '84_main.jpg', '84_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307541602, 0, NULL, NULL, NULL, NULL),
(85, 'LG BD570 Network Audio', '85', 1, NULL, 10, 39, '', '85_main.jpg', '85_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307544238, 0, NULL, NULL, NULL, NULL),
(86, 'Samsung BD-C6900 1080p 3D Blu-ray', '86', 1, NULL, 12, 39, '', '86_main.jpg', '86_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307545023, 1301492895, 0.00, NULL, 0, 0),
(87, 'Sony HT-SS370 Home Theater', '87', 1, NULL, 9, 41, '', '87_main.jpg', '87_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307541766, 0, NULL, 4, NULL, NULL),
(88, 'Samsung HW-C770BS 7.1 Channel', '88', 1, NULL, 12, 41, '', '88_main.jpg', '88_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307544977, 0, NULL, NULL, NULL, NULL),
(95, 'Canon EOS Rebel T2i 18 Megapixel Digital', '95', 1, NULL, 16, 45, '', '95_main.jpg', '95_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542081, 0, NULL, NULL, NULL, NULL),
(89, 'Panasonic SCPTX7 Home Theater', '89', 1, NULL, 11, 41, '', '89_main.jpg', '89_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307541636, 1301492999, 0.00, NULL, NULL, NULL),
(90, 'Samsung HT-C7530W 5.1 Channel', '90', 1, NULL, 12, 41, '', '90_main.jpg', '90_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543337, 0, NULL, NULL, NULL, NULL),
(91, 'Sony BDV-E770W Home Theater', '91', 1, NULL, 9, 41, '', '91_main.jpg', '91_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307544214, 1301492801, 0.00, NULL, NULL, NULL),
(92, 'Samsung HW-C700 7.2 Channel', '92', 1, NULL, 12, 43, '', '92_main.jpg', '92_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307544791, 0, NULL, NULL, NULL, NULL),
(93, 'Yamaha HS80M Powered Speaker', '93', 1, NULL, 15, 43, '', '93_main.jpg', '93_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542628, 0, NULL, NULL, NULL, NULL),
(94, 'Yamaha NSIW760 Speaker', '94', 1, NULL, 15, 43, '', '94_main.jpg', '94_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307544425, 0, NULL, NULL, NULL, NULL),
(97, 'Sony Handycam HDR-CX3', '97', 1, NULL, 9, 45, '', '97_main.jpg', '97_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307541628, 0, NULL, NULL, NULL, NULL),
(98, 'Samsung NX10 14 Megapixel Digital', '98', 1, 1, 12, 45, '', '98_main.jpg', '98_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542730, 0, NULL, NULL, NULL, NULL),
(99, 'Samsung NX100 Interchangeable Lens', '99', 1, NULL, 12, 45, '', '99_main.jpg', '99_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543877, 1301492994, 0.00, NULL, NULL, NULL),
(100, 'Canon PIXMA iP100 Photo Printer', '100', 1, NULL, 16, 46, '', '100_main.jpg', '100_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543018, 0, NULL, NULL, NULL, NULL),
(101, 'Canon PIXMA iP4820 Premium', '101', 1, NULL, 16, 46, '', '101_main.jpg', '101_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543107, 0, NULL, NULL, NULL, NULL),
(102, 'Epson Stylus R1900 Photo Printer', '102', 1, NULL, 17, 46, '', '102_main.jpg', '102_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307545161, 0, NULL, NULL, NULL, NULL),
(103, 'Epson Stylus C88+ Inkjet Printer', '103', 1, NULL, 17, 46, '', '103_main.jpg', '103_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543901, 0, NULL, NULL, NULL, NULL),
(104, 'Epson Stylus Photo R2880 Color', '104', 1, NULL, 17, 46, '', '104_main.jpg', '104_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543227, 0, NULL, NULL, NULL, NULL),
(105, 'Panasonic KX-TG6582T Cordless Phone', '105', 1, NULL, 11, 50, '', '105_main.jpg', '105_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543429, 0, NULL, NULL, NULL, NULL),
(106, 'Panasonic KX-TG7433B Expandable', '106', 1, 1, 11, 50, '', '106_main.jpg', '106_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543089, 0, NULL, 2, NULL, NULL),
(107, 'Plantronics CS70N Wireless Earset', '107', 1, NULL, 18, 50, '', '107_main.jpg', '107_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307541701, 0, NULL, NULL, NULL, NULL),
(108, 'Plantronics CS55 Wireless Earset', '108', 1, 1, 18, 50, '', '108_main.jpg', '108_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307544069, 0, NULL, 4, NULL, NULL),
(109, 'Panasonic KX-TG6445 Cordless Phone', '109', 1, NULL, 11, 50, '', '109_main.jpg', '109_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307544627, 0, NULL, NULL, NULL, NULL),
(110, 'Motorola H720 Earset - Mono', '110', 1, NULL, 19, 51, '', '110_main.jpg', '110_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543831, 0, NULL, NULL, NULL, NULL),
(111, 'Plantronics Discovery 665 Wireless', '111', 1, NULL, 18, 51, '', '111_main.jpg', '111_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543077, 0, NULL, NULL, NULL, NULL),
(112, 'Motorola H270 Bluetooth Headset', '112', 1, NULL, 19, 51, '', '112_main.jpg', '112_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543753, 0, NULL, NULL, NULL, NULL),
(113, 'LG HBM-210 Bluetooth Headset', '113', 1, NULL, 10, 51, '', '113_main.jpg', '113_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542831, 0, NULL, NULL, NULL, NULL),
(114, 'Samsung AWEP450PBECSTA Bluetooth Headset Black', '114', 1, NULL, 12, 51, '', '114_main.jpg', '114_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543699, 0, NULL, NULL, NULL, NULL),
(115, 'Pioneer TS-SW3041D Shallow-Mount Subwoofer', '115', 1, NULL, 20, 53, '', '115_main.jpg', '115_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543689, 0, NULL, NULL, NULL, NULL),
(116, 'Pyle PLT-AB8 Subwoofer - PLTAB8', '116', 1, NULL, 21, 53, '', '116_main.jpg', '116_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542992, 0, NULL, NULL, NULL, NULL),
(117, 'Pyle PLSQ10D Red Label Square', '117', 1, NULL, 21, 53, '', '117_main.jpg', '117_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542495, 0, NULL, NULL, NULL, NULL),
(118, 'Pioneer TS-W251R Subwoofer', '118', 1, NULL, 20, 53, '', '118_main.jpg', '118_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543269, 0, NULL, NULL, NULL, NULL),
(119, 'Pioneer TSSW2541D Subwoofer', '119', 1, 1, 20, 53, '', '119_main.jpg', '119_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543316, 0, NULL, 2, NULL, NULL),
(120, 'Pioneer JD-1212S 12-disc CD', '120', 1, NULL, 20, 54, '', '120_main.jpg', '120_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542029, 0, NULL, NULL, NULL, NULL),
(121, 'Pioneer JD-612V 6-disc CD Magazine', '121', 1, NULL, 20, 54, '', '121_main.jpg', '121_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543909, 0, NULL, NULL, NULL, NULL),
(122, 'Panasonic CX-DP880U 8-Disc', '122', 1, NULL, 11, 54, '', '122_main.jpg', '122_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543511, 0, NULL, NULL, NULL, NULL),
(123, 'JVC - XCM200 - 12-Disc CD', '123', 1, NULL, 22, 54, '', '123_main.jpg', '123_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307543925, 0, NULL, NULL, NULL, NULL),
(124, 'JVC - CHX1500RF - FM Modulation', '124', 1, NULL, 22, 54, '', '124_main.jpg', '124_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542680, 0, NULL, NULL, NULL, NULL),
(125, 'Garmin Forerunner 305 Portable Navigator', '125', 1, 0, 23, 55, '', '125_main.jpg', '125_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542859, 0, NULL, NULL, NULL, NULL),
(126, 'Garmin Forerunner 205 Portable', '126', 1, 0, 23, 55, '', '126_main.jpg', '126_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307545111, 0, NULL, NULL, NULL, NULL),
(127, 'TomTom XXL 540 S Portable GPS System', '127', 1, 0, 24, 55, '', '127_main.jpg', '127_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307541663, 0, NULL, NULL, NULL, NULL),
(128, 'TOMTOM XL 350 Automobile', '128', 1, NULL, 0, 36, '', '128_main.jpg', '128_small.jpg', '', '', '', '', '', 1307543046, 0, NULL, NULL, NULL, NULL),
(129, 'TOMTOM XXL 550M Automobile Portable Navigator', '129', 1, 0, 24, 55, '', '129_main.jpg', '129_small.jpg', '', '<p>Высоко технологический продукт, который поможет Вам оценить качество на высшем уровне.<br /><br />Все продукты доступны в наличии, а наши менеджеры помогу Вам произвести покупку в кратчайшие сроки.<br /><br />На все продукты мы предоставляем гарантию качества.<br /><br />Приобретайте только в нашем Интернет-магазине по лучшим ценам.</p>', '', '', '', 1307542398, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_products_rating`
--

CREATE TABLE IF NOT EXISTS `shop_products_rating` (
  `product_id` int(11) NOT NULL,
  `votes` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_products_rating`
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
-- Table structure for table `shop_product_categories`
--

CREATE TABLE IF NOT EXISTS `shop_product_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `shop_product_categories_FI_2` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_product_categories`
--

INSERT INTO `shop_product_categories` (`product_id`, `category_id`) VALUES
(71, 36),
(71, 37),
(72, 36),
(72, 37),
(73, 36),
(73, 37),
(74, 36),
(74, 37),
(75, 36),
(75, 37),
(76, 36),
(76, 37),
(77, 36),
(77, 38),
(78, 36),
(78, 38),
(79, 36),
(79, 38),
(80, 36),
(80, 38),
(81, 36),
(81, 38),
(82, 36),
(82, 39),
(83, 36),
(83, 39),
(84, 36),
(84, 39),
(85, 36),
(85, 39),
(86, 36),
(86, 39),
(87, 40),
(87, 41),
(88, 40),
(88, 41),
(89, 40),
(89, 41),
(90, 40),
(90, 41),
(91, 40),
(91, 41),
(92, 40),
(92, 43),
(93, 40),
(93, 43),
(94, 40),
(94, 43),
(95, 44),
(95, 45),
(96, 44),
(96, 45),
(97, 44),
(97, 45),
(98, 44),
(98, 45),
(99, 44),
(99, 45),
(100, 44),
(100, 46),
(101, 44),
(101, 46),
(102, 44),
(102, 46),
(103, 44),
(103, 46),
(104, 44),
(104, 46),
(105, 48),
(105, 50),
(106, 48),
(106, 50),
(107, 48),
(107, 50),
(108, 48),
(108, 50),
(109, 48),
(109, 50),
(110, 48),
(110, 51),
(111, 48),
(111, 51),
(112, 48),
(112, 51),
(113, 48),
(113, 51),
(114, 48),
(114, 51),
(115, 52),
(115, 53),
(116, 53),
(117, 52),
(117, 53),
(118, 52),
(118, 53),
(119, 48),
(119, 53),
(120, 54),
(121, 54),
(122, 54),
(123, 52),
(123, 54),
(124, 52),
(124, 54),
(125, 52),
(125, 55),
(126, 52),
(126, 55),
(127, 52),
(127, 55),
(128, 36),
(128, 52),
(129, 52),
(129, 55);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_images`
--

CREATE TABLE IF NOT EXISTS `shop_product_images` (
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `position` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`product_id`,`image_name`),
  KEY `shop_product_images_I_1` (`position`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_product_images`
--

INSERT INTO `shop_product_images` (`product_id`, `image_name`, `position`) VALUES
(71, '71_0.jpg', 0),
(71, '71_1.jpg', 1),
(71, '71_2.jpg', 2),
(72, '72_0.jpg', 0),
(72, '72_1.jpg', 1),
(72, '72_2.jpg', 2),
(74, '74_0.jpg', 0),
(74, '74_1.jpg', 1),
(74, '74_2.jpg', 2),
(76, '76_0.jpg', 0),
(76, '76_1.jpg', 1),
(76, '76_2.jpg', 2),
(81, '81_0.jpg', 0),
(81, '81_1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_properties`
--

CREATE TABLE IF NOT EXISTS `shop_product_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `csv_name` varchar(50) NOT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `show_in_compare` tinyint(4) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `data` text,
  `show_on_site` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_product_properties_I_1` (`name`),
  KEY `shop_product_properties_I_2` (`active`),
  KEY `shop_product_properties_I_3` (`show_on_site`),
  KEY `shop_product_properties_I_4` (`show_in_compare`),
  KEY `shop_product_properties_I_5` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `shop_product_properties`
--

INSERT INTO `shop_product_properties` (`id`, `name`, `csv_name`, `active`, `show_in_compare`, `position`, `data`, `show_on_site`) VALUES
(20, 'Технология дисплея', 'displaytech', 1, 1, 1, 'a:3:{i:0;s:3:"LCD";i:1;s:3:"LED";i:2;s:6:"Plasma";}', 1),
(21, 'Размер экрана', 'razmerekrana', 1, 1, 2, 'a:11:{i:0;s:2:"32";i:1;s:2:"38";i:2;s:2:"39";i:3;s:2:"40";i:4;s:2:"41";i:5;s:2:"42";i:6;s:2:"43";i:7;s:2:"44";i:8;s:2:"45";i:9;s:2:"46";i:10;s:2:"47";}', 1),
(22, 'HDMI', 'hdmi', 1, 1, 3, 'a:2:{i:0;s:8:"есть";i:1;s:6:"нет";}', 1),
(23, 'Мощность', 'power', 1, 1, 4, 'a:3:{i:0;s:8:"1 кВт";i:1;s:8:"2 кВт";i:2;s:8:"3 кВт";}', 1),
(24, 'Количество цифровых входов', 'digitalopticalinput', 1, 1, 5, 'a:4:{i:0;s:1:"2";i:1;s:1:"3";i:2;s:1:"4";i:3;s:1:"5";}', 1),
(25, 'Настройка фокуса', 'focus', 1, 1, 6, 'a:2:{i:0;s:28:"автоматическая";i:1;s:12:"ручная";}', 1),
(26, 'Количество мегапикселей', 'megapixel', 1, 1, 7, 'a:5:{i:0;s:1:"5";i:1;s:2:"10";i:2;s:2:"15";i:3;s:2:"20";i:4;s:2:"25";}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_properties_categories`
--

CREATE TABLE IF NOT EXISTS `shop_product_properties_categories` (
  `property_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`property_id`,`category_id`),
  KEY `shop_product_properties_categories_FI_2` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_product_properties_categories`
--

INSERT INTO `shop_product_properties_categories` (`property_id`, `category_id`) VALUES
(20, 37),
(21, 37),
(22, 41),
(23, 41),
(24, 41),
(25, 45),
(26, 45);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_properties_data`
--

CREATE TABLE IF NOT EXISTS `shop_product_properties_data` (
  `property_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` varchar(500) NOT NULL,
  PRIMARY KEY (`property_id`,`product_id`),
  KEY `shop_product_properties_data_I_1` (`value`(333)),
  KEY `shop_product_properties_data_FI_2` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_product_properties_data`
--

INSERT INTO `shop_product_properties_data` (`property_id`, `product_id`, `value`) VALUES
(21, 72, '47'),
(20, 72, 'LED'),
(21, 71, '46'),
(20, 71, 'LCD'),
(21, 73, '42'),
(20, 73, 'Plasma'),
(21, 74, '40'),
(20, 74, 'LCD'),
(21, 75, '32'),
(20, 75, 'LED'),
(21, 76, '32'),
(20, 76, 'LCD'),
(22, 87, 'есть'),
(23, 87, '1 кВт'),
(24, 87, '2'),
(22, 88, 'нет'),
(23, 88, '2 кВт'),
(24, 88, '2'),
(24, 89, '3'),
(23, 89, '1 кВт'),
(22, 89, 'нет'),
(22, 90, 'есть'),
(23, 90, '3 кВт'),
(24, 90, '2'),
(24, 91, '2'),
(23, 91, '2 кВт'),
(22, 91, 'нет'),
(25, 95, 'автоматическая'),
(25, 96, 'ручная'),
(25, 97, 'ручная'),
(25, 98, 'автоматическая'),
(25, 99, 'ручная'),
(26, 97, '4'),
(26, 98, '4'),
(26, 96, '3'),
(26, 95, '3'),
(26, 99, '5');

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_variants`
--

CREATE TABLE IF NOT EXISTS `shop_product_variants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `price` float(10,2) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_product_variants_I_1` (`product_id`),
  KEY `shop_product_variants_I_2` (`position`),
  KEY `shop_product_variants_I_3` (`number`),
  KEY `shop_product_variants_I_4` (`name`(333)),
  KEY `shop_product_variants_I_5` (`price`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=192 ;

--
-- Dumping data for table `shop_product_variants`
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
(152, 142, '', 158.99, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_settings`
--

CREATE TABLE IF NOT EXISTS `shop_settings` (
  `name` varchar(255) NOT NULL,
  `value` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_settings`
--

INSERT INTO `shop_settings` (`name`, `value`) VALUES
('mainImageWidth', '300'),
('mainImageHeight', '500'),
('smallImageWidth', '150'),
('smallImageHeight', '200'),
('addImageWidth', '800'),
('addImageHeight', '600'),
('imagesQuality', '95'),
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
-- Table structure for table `shop_user_profile`
--

CREATE TABLE IF NOT EXISTS `shop_user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `numberhome` varchar(10) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `additionalData` varchar(255) DEFAULT NULL,
  `profileimage` varchar(255) CHARACTER SET ucs2 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `shop_user_profile`
--

INSERT INTO `shop_user_profile` (`id`, `user_id`, `name`, `phone`, `address`, `city`, `street`, `numberhome`, `surname`, `additionalData`, `profileimage`) VALUES
(1, 1, 'Алина', '+7 (903) 002–003–1', '', 'Москва', 'Профсоюзная', '4–1/2', 'Игнатенко', 'Я создана из ласки и слёз,из кошмаров и прекрасных грёз,из любви и ненависти,из счастья и печали…Я смесь из крика и улыбки,из правильной речи и ошибки,намешана из боли и блаженства…Я совершенное несовершенство…Как утренний рассвет прекрасна…Сильна как вет', ''),
(25, 84, 'jgjgh', 'fgjgfj', 'fgjhhg', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_warehouse`
--

CREATE TABLE IF NOT EXISTS `shop_warehouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `shop_warehouse_I_1` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shop_warehouse`
--

INSERT INTO `shop_warehouse` (`id`, `name`, `address`, `phone`, `description`) VALUES
(1, 'warehouse 1', 'address', 'phone', ''),
(2, 'warehouse 2', 'address 2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shop_warehouse_data`
--

CREATE TABLE IF NOT EXISTS `shop_warehouse_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_warehouse_data_FI_1` (`product_id`),
  KEY `shop_warehouse_data_FI_2` (`warehouse_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `shop_warehouse_data`
--

INSERT INTO `shop_warehouse_data` (`id`, `product_id`, `warehouse_id`, `count`) VALUES
(37, 132, 2, 3),
(36, 132, 1, 2),
(35, 132, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `value` (`value`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tags`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `username` varchar(25) NOT NULL,
  `password` varchar(34) NOT NULL,
  `email` varchar(100) NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) DEFAULT NULL,
  `newpass` varchar(34) DEFAULT NULL,
  `newpass_key` varchar(32) DEFAULT NULL,
  `newpass_time` datetime DEFAULT NULL,
  `last_ip` varchar(40) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vk_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `banned` (`banned`),
  KEY `password` (`password`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `email`, `banned`, `ban_reason`, `newpass`, `newpass_key`, `newpass_time`, `last_ip`, `last_login`, `created`, `modified`, `vk_id`) VALUES
(1, 2, 'kelios', '$1$Rv4.Gd1.$wXevNKTe0JveUc3XXln9//', 'kelios@inbox.ru', 0, NULL, NULL, NULL, NULL, '127.0.0.1', '2011-09-22 15:57:46', '2011-09-15 11:20:20', '2011-09-22 14:57:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`),
  KEY `last_ip` (`last_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('75f643fd5fc4fe778567454374de85ff', 85, 'Mozilla/5.0 (Windows NT 5.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2', '127.0.0.1', '2011-09-22 15:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`) VALUES
(1, 84),
(2, 85);

-- --------------------------------------------------------

--
-- Table structure for table `user_temp`
--

CREATE TABLE IF NOT EXISTS `user_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(34) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_key` varchar(50) NOT NULL,
  `last_ip` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL,
  `data` text NOT NULL,
  `method` varchar(50) NOT NULL,
  `settings` text NOT NULL,
  `description` varchar(300) NOT NULL,
  `roles` text NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `name`, `type`, `data`, `method`, `settings`, `description`, `roles`, `created`) VALUES
(3, 'latest_news', 'module', 'core', 'recent_news', 'a:4:{s:10:"news_count";s:1:"3";s:11:"max_symdols";s:3:"150";s:10:"categories";a:1:{i:0;s:2:"56";}s:7:"display";s:6:"recent";}', 'Последние новости', '', 1291632457),
(4, 'recent_product_comments', 'module', 'comments', 'recent_product_comments', 'a:2:{s:14:"comments_count";i:100;s:13:"symbols_count";i:0;}', '', '', 1308300371);
