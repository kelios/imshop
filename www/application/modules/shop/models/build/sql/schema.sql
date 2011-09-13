
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-----------------------------------------------------------------------
-- shop_category
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_category`;

CREATE TABLE `shop_category`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`url` VARCHAR(255) NOT NULL,
	`active` TINYINT,
	`description` TEXT,
	`meta_desc` VARCHAR(255) NOT NULL,
	`meta_title` VARCHAR(255) NOT NULL,
	`meta_keywords` VARCHAR(255) NOT NULL,
	`parent_id` INTEGER,
	`position` INTEGER,
	`full_path` VARCHAR(1000),
	`full_path_ids` VARCHAR(250),
	PRIMARY KEY (`id`),
	INDEX `shop_category_I_1` (`name`),
	INDEX `shop_category_I_2` (`url`),
	INDEX `shop_category_I_3` (`active`),
	INDEX `shop_category_I_4` (`parent_id`),
	INDEX `shop_category_I_5` (`position`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_products
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_products`;

CREATE TABLE `shop_products`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(500) NOT NULL,
	`url` VARCHAR(255) NOT NULL,
	`active` TINYINT,
	`hit` TINYINT,
	`hot` TINYINT,
	`action` TINYINT,
	`brand_id` INTEGER,
	`category_id` INTEGER NOT NULL,
	`related_products` VARCHAR(255),
	`mainImage` VARCHAR(255),
	`smallImage` VARCHAR(255),
	`short_description` TEXT,
	`full_description` TEXT,
	`meta_title` VARCHAR(255),
	`meta_description` VARCHAR(255),
	`meta_keywords` VARCHAR(255),
	`old_price` FLOAT (10,2),
	`created` INTEGER NOT NULL,
	`updated` INTEGER NOT NULL,
	`views` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `shop_products_I_1` (`name`),
	INDEX `shop_products_I_2` (`url`),
	INDEX `shop_products_I_3` (`brand_id`),
	INDEX `shop_products_I_4` (`category_id`),
	CONSTRAINT `shop_products_FK_1`
		FOREIGN KEY (`brand_id`)
		REFERENCES `shop_brands` (`id`),
	CONSTRAINT `shop_products_FK_2`
		FOREIGN KEY (`category_id`)
		REFERENCES `shop_category` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_product_images
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_images`;

CREATE TABLE `shop_product_images`
(
	`product_id` INTEGER NOT NULL,
	`image_name` VARCHAR(255) NOT NULL,
	`position` SMALLINT,
	PRIMARY KEY (`product_id`,`image_name`),
	INDEX `shop_product_images_I_1` (`position`),
	CONSTRAINT `shop_product_images_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_brands
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_brands`;

CREATE TABLE `shop_brands`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(500) NOT NULL,
	`url` VARCHAR(255) NOT NULL,
	`description` TEXT,
	`meta_title` VARCHAR(255),
	`meta_description` VARCHAR(255),
	`meta_keywords` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `shop_brands_I_1` (`name`),
	INDEX `shop_brands_I_2` (`url`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_product_variants
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_variants`;

CREATE TABLE `shop_product_variants`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`product_id` INTEGER NOT NULL,
	`name` VARCHAR(500),
	`price` FLOAT (10,2) NOT NULL,
	`number` VARCHAR(255),
	`stock` INTEGER,
	`position` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `shop_product_variants_I_1` (`product_id`),
	INDEX `shop_product_variants_I_2` (`position`),
	INDEX `shop_product_variants_I_3` (`number`),
	INDEX `shop_product_variants_I_4` (`name`),
	INDEX `shop_product_variants_I_5` (`price`),
	CONSTRAINT `shop_product_variants_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_warehouse
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_warehouse`;

CREATE TABLE `shop_warehouse`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`address` VARCHAR(255),
	`phone` VARCHAR(255),
	`description` TEXT,
	PRIMARY KEY (`id`),
	INDEX `shop_warehouse_I_1` (`name`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_warehouse_data
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_warehouse_data`;

CREATE TABLE `shop_warehouse_data`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`product_id` INTEGER NOT NULL,
	`warehouse_id` INTEGER NOT NULL,
	`count` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `shop_warehouse_data_FI_1` (`product_id`),
	INDEX `shop_warehouse_data_FI_2` (`warehouse_id`),
	CONSTRAINT `shop_warehouse_data_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`),
	CONSTRAINT `shop_warehouse_data_FK_2`
		FOREIGN KEY (`warehouse_id`)
		REFERENCES `shop_warehouse` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_product_categories
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_categories`;

CREATE TABLE `shop_product_categories`
(
	`product_id` INTEGER NOT NULL,
	`category_id` INTEGER NOT NULL,
	PRIMARY KEY (`product_id`,`category_id`),
	INDEX `shop_product_categories_FI_2` (`category_id`),
	CONSTRAINT `shop_product_categories_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`),
	CONSTRAINT `shop_product_categories_FK_2`
		FOREIGN KEY (`category_id`)
		REFERENCES `shop_category` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_product_properties
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_properties`;

CREATE TABLE `shop_product_properties`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`csv_name` VARCHAR(50) NOT NULL,
	`active` TINYINT,
	`show_on_site` TINYINT,
	`show_in_compare` TINYINT,
	`position` INTEGER NOT NULL,
	`data` TEXT,
	PRIMARY KEY (`id`),
	INDEX `shop_product_properties_I_1` (`name`),
	INDEX `shop_product_properties_I_2` (`active`),
	INDEX `shop_product_properties_I_3` (`show_on_site`),
	INDEX `shop_product_properties_I_4` (`show_in_compare`),
	INDEX `shop_product_properties_I_5` (`position`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_product_properties_categories
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_properties_categories`;

CREATE TABLE `shop_product_properties_categories`
(
	`property_id` INTEGER NOT NULL,
	`category_id` INTEGER NOT NULL,
	PRIMARY KEY (`property_id`,`category_id`),
	INDEX `shop_product_properties_categories_FI_2` (`category_id`),
	CONSTRAINT `shop_product_properties_categories_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `shop_product_properties` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `shop_product_properties_categories_FK_2`
		FOREIGN KEY (`category_id`)
		REFERENCES `shop_category` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_product_properties_data
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_product_properties_data`;

CREATE TABLE `shop_product_properties_data`
(
	`property_id` INTEGER NOT NULL,
	`product_id` INTEGER NOT NULL,
	`value` VARCHAR(500) NOT NULL,
	PRIMARY KEY (`property_id`,`product_id`),
	INDEX `shop_product_properties_data_I_1` (`value`),
	INDEX `shop_product_properties_data_FI_2` (`product_id`),
	CONSTRAINT `shop_product_properties_data_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `shop_product_properties` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `shop_product_properties_data_FK_2`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_delivery_methods
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_delivery_methods`;

CREATE TABLE `shop_delivery_methods`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(500) NOT NULL,
	`description` TEXT,
	`price` FLOAT (10,2) NOT NULL,
	`free_from` FLOAT (10,2) NOT NULL,
	`enabled` TINYINT,
	PRIMARY KEY (`id`),
	INDEX `shop_delivery_methods_I_1` (`name`),
	INDEX `shop_delivery_methods_I_2` (`enabled`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_delivery_methods_systems
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_delivery_methods_systems`;

CREATE TABLE `shop_delivery_methods_systems`
(
	`delivery_method_id` INTEGER NOT NULL,
	`payment_method_id` INTEGER NOT NULL,
	PRIMARY KEY (`delivery_method_id`,`payment_method_id`),
	INDEX `shop_delivery_methods_systems_FI_2` (`payment_method_id`),
	CONSTRAINT `shop_delivery_methods_systems_FK_1`
		FOREIGN KEY (`delivery_method_id`)
		REFERENCES `shop_delivery_methods` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `shop_delivery_methods_systems_FK_2`
		FOREIGN KEY (`payment_method_id`)
		REFERENCES `shop_payment_methods` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_orders
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_orders`;

CREATE TABLE `shop_orders`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`key` VARCHAR(255) NOT NULL,
	`delivery_method` INTEGER,
	`delivery_price` FLOAT (10,2),
	`status` SMALLINT,
	`paid` TINYINT,
	`user_full_name` VARCHAR(255),
	`user_email` VARCHAR(255),
	`user_phone` VARCHAR(255),
	`user_deliver_to` VARCHAR(500),
	`user_comment` VARCHAR(1000),
	`date_created` INTEGER,
	`date_updated` INTEGER,
	`user_ip` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `shop_orders_I_1` (`key`),
	INDEX `shop_orders_I_2` (`status`),
	INDEX `shop_orders_I_3` (`date_created`),
	INDEX `shop_orders_FI_1` (`delivery_method`),
	CONSTRAINT `shop_orders_FK_1`
		FOREIGN KEY (`delivery_method`)
		REFERENCES `shop_delivery_methods` (`id`)
		ON DELETE SET NULL
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_orders_products
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_orders_products`;

CREATE TABLE `shop_orders_products`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`order_id` INTEGER NOT NULL,
	`product_id` INTEGER NOT NULL,
	`variant_id` INTEGER NOT NULL,
	`product_name` VARCHAR(255),
	`variant_name` VARCHAR(255),
	`price` FLOAT (10,2),
	`quantity` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `shop_orders_products_I_1` (`order_id`),
	INDEX `shop_orders_products_FI_1` (`product_id`),
	CONSTRAINT `shop_orders_products_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`),
	CONSTRAINT `shop_orders_products_FK_2`
		FOREIGN KEY (`order_id`)
		REFERENCES `shop_orders` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_payment_methods
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_payment_methods`;

CREATE TABLE `shop_payment_methods`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`description` TEXT,
	`active` TINYINT,
	`currency_id` INTEGER(11),
	`payment_system_name` VARCHAR(255),
	`position` INTEGER(11),
	PRIMARY KEY (`id`),
	INDEX `shop_payment_methods_I_1` (`name`),
	INDEX `shop_payment_methods_I_2` (`position`),
	INDEX `shop_payment_methods_FI_1` (`currency_id`(11)),
	CONSTRAINT `shop_payment_methods_FK_1`
		FOREIGN KEY (`currency_id`)
		REFERENCES `shop_currencies` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_currencies
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_currencies`;

CREATE TABLE `shop_currencies`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`main` TINYINT,
	`is_default` TINYINT,
	`code` VARCHAR(5),
	`symbol` VARCHAR(5),
	`rate` FLOAT (6,3) DEFAULT 1.000,
	PRIMARY KEY (`id`),
	INDEX `shop_currencies_I_1` (`name`),
	INDEX `shop_currencies_I_2` (`main`),
	INDEX `shop_currencies_I_3` (`is_default`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_products_rating
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_products_rating`;

CREATE TABLE `shop_products_rating`
(
	`product_id` INTEGER(11) NOT NULL,
	`votes` INTEGER(11),
	`rating` INTEGER(11),
	PRIMARY KEY (`product_id`),
	CONSTRAINT `shop_products_rating_FK_1`
		FOREIGN KEY (`product_id`)
		REFERENCES `shop_products` (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_settings
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_settings`;

CREATE TABLE `shop_settings`
(
	`name` VARCHAR(255) NOT NULL,
	`value` TEXT,
	PRIMARY KEY (`name`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_discounts
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_discounts`;

CREATE TABLE `shop_discounts`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`description` TEXT,
	`active` TINYINT NOT NULL,
	`date_start` INTEGER(11),
	`date_stop` INTEGER(11),
	`discount` VARCHAR(11),
	`user_group` VARCHAR(255),
	`min_price` FLOAT (10,2),
	`max_price` FLOAT (10,2),
	`categories` TEXT,
	`products` TEXT,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8';

-----------------------------------------------------------------------
-- shop_user_profile
-----------------------------------------------------------------------

DROP TABLE IF EXISTS `shop_user_profile`;

CREATE TABLE `shop_user_profile`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER NOT NULL,
	`name` VARCHAR(255),
	`phone` VARCHAR(255),
	`address` VARCHAR(255),
	PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET='utf8';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
