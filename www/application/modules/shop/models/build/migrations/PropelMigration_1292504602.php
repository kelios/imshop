<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1292504602.
 * Generated on 2010-12-16 15:03:22 by firstrow
 */
class PropelMigration_1292504602
{

	public function preUp($manager)
	{
		// add the pre-migration code here
	}

	public function postUp($manager)
	{
		// add the post-migration code here
	}

	public function preDown($manager)
	{
		// add the pre-migration code here
	}

	public function postDown($manager)
	{
		// add the post-migration code here
	}

	/**
	 * Get the SQL statements for the Up migration
	 *
	 * @return array list of the SQL strings to execute for the Up migration
	 *               the keys being the datasources
	 */
	public function getUpSQL()
	{
		return array (
  'Shop' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `shop_currencies` CHANGE `rate` `rate` FLOAT (6,3) DEFAULT 1.000;

ALTER TABLE `shop_delivery_methods` CHANGE `price` `price` FLOAT (10,2) NOT NULL;

ALTER TABLE `shop_delivery_methods` CHANGE `free_from` `free_from` FLOAT (10,2) NOT NULL;

ALTER TABLE `shop_orders` CHANGE `delivery_price` `delivery_price` FLOAT (10,2);

ALTER TABLE `shop_orders` ADD CONSTRAINT `shop_orders_FK_1`
	FOREIGN KEY (`delivery_method`)
	REFERENCES `shop_delivery_methods` (`id`)
	ON DELETE SET NULL;

ALTER TABLE `shop_orders_products` CHANGE `price` `price` FLOAT (10,2);

ALTER TABLE `shop_orders_products` ADD CONSTRAINT `shop_orders_products_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`);

ALTER TABLE `shop_orders_products` ADD CONSTRAINT `shop_orders_products_FK_2`
	FOREIGN KEY (`order_id`)
	REFERENCES `shop_orders` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_payment_methods` CHANGE `currency_id` `currency_id` INTEGER(11);

ALTER TABLE `shop_payment_methods` CHANGE `position` `position` INTEGER(11);

ALTER TABLE `shop_payment_methods` ADD CONSTRAINT `shop_payment_methods_FK_1`
	FOREIGN KEY (`currency_id`)
	REFERENCES `shop_currencies` (`id`);

ALTER TABLE `shop_product_categories` ADD CONSTRAINT `shop_product_categories_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`);

ALTER TABLE `shop_product_categories` ADD CONSTRAINT `shop_product_categories_FK_2`
	FOREIGN KEY (`category_id`)
	REFERENCES `shop_category` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_images` ADD CONSTRAINT `shop_product_images_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_properties_categories` ADD CONSTRAINT `shop_product_properties_categories_FK_1`
	FOREIGN KEY (`property_id`)
	REFERENCES `shop_product_properties` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_properties_categories` ADD CONSTRAINT `shop_product_properties_categories_FK_2`
	FOREIGN KEY (`category_id`)
	REFERENCES `shop_category` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_properties_data` ADD CONSTRAINT `shop_product_properties_data_FK_1`
	FOREIGN KEY (`property_id`)
	REFERENCES `shop_product_properties` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_properties_data` ADD CONSTRAINT `shop_product_properties_data_FK_2`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `shop_product_variants` CHANGE `price` `price` FLOAT (10,2) NOT NULL;

ALTER TABLE `shop_product_variants` ADD CONSTRAINT `shop_product_variants_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`);

ALTER TABLE `shop_products` ADD CONSTRAINT `shop_products_FK_1`
	FOREIGN KEY (`brand_id`)
	REFERENCES `shop_brands` (`id`);

ALTER TABLE `shop_products` ADD CONSTRAINT `shop_products_FK_2`
	FOREIGN KEY (`category_id`)
	REFERENCES `shop_category` (`id`);

ALTER TABLE `shop_products_rating` CHANGE `product_id` `product_id` INTEGER(11) NOT NULL;

ALTER TABLE `shop_products_rating` CHANGE `votes` `votes` INTEGER(11);

ALTER TABLE `shop_products_rating` CHANGE `rating` `rating` INTEGER(11);

ALTER TABLE `shop_products_rating` ADD CONSTRAINT `shop_products_rating_FK_1`
	FOREIGN KEY (`product_id`)
	REFERENCES `shop_products` (`id`);

CREATE TABLE `shop_delivery_methods_systems`
(
	`delivery_method_id` INTEGER NOT NULL,
	`payment_method_id` INTEGER NOT NULL,
	PRIMARY KEY (`delivery_method_id`,`payment_method_id`),
	INDEX `shop_delivery_methods_systems_FI_2` (`payment_method_id`),
	CONSTRAINT `shop_delivery_methods_systems_FK_1`
		FOREIGN KEY (`delivery_method_id`)
		REFERENCES `shop_delivery_methods` (`id`),
	CONSTRAINT `shop_delivery_methods_systems_FK_2`
		FOREIGN KEY (`payment_method_id`)
		REFERENCES `shop_payment_methods` (`id`)
) ENGINE=MyISAM CHARACTER SET=\'utf8\';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

	/**
	 * Get the SQL statements for the Down migration
	 *
	 * @return array list of the SQL strings to execute for the Down migration
	 *               the keys being the datasources
	 */
	public function getDownSQL()
	{
		return array (
  'Shop' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `shop_delivery_methods_systems`;

ALTER TABLE `shop_currencies` CHANGE `rate` `rate` FLOAT(6,3) DEFAULT 1.000;

ALTER TABLE `shop_delivery_methods` CHANGE `price` `price` FLOAT(10,2) NOT NULL;

ALTER TABLE `shop_delivery_methods` CHANGE `free_from` `free_from` FLOAT(10,2) NOT NULL;

ALTER TABLE `shop_orders` DROP FOREIGN KEY `shop_orders_FK_1`;

ALTER TABLE `shop_orders` CHANGE `delivery_price` `delivery_price` FLOAT(10,2);

ALTER TABLE `shop_orders_products` DROP FOREIGN KEY `shop_orders_products_FK_1`;

ALTER TABLE `shop_orders_products` DROP FOREIGN KEY `shop_orders_products_FK_2`;

ALTER TABLE `shop_orders_products` CHANGE `price` `price` FLOAT(10,2);

ALTER TABLE `shop_payment_methods` DROP FOREIGN KEY `shop_payment_methods_FK_1`;

ALTER TABLE `shop_payment_methods` CHANGE `currency_id` `currency_id` INTEGER;

ALTER TABLE `shop_payment_methods` CHANGE `position` `position` INTEGER;

ALTER TABLE `shop_product_categories` DROP FOREIGN KEY `shop_product_categories_FK_1`;

ALTER TABLE `shop_product_categories` DROP FOREIGN KEY `shop_product_categories_FK_2`;

ALTER TABLE `shop_product_images` DROP FOREIGN KEY `shop_product_images_FK_1`;

ALTER TABLE `shop_product_properties_categories` DROP FOREIGN KEY `shop_product_properties_categories_FK_1`;

ALTER TABLE `shop_product_properties_categories` DROP FOREIGN KEY `shop_product_properties_categories_FK_2`;

ALTER TABLE `shop_product_properties_data` DROP FOREIGN KEY `shop_product_properties_data_FK_1`;

ALTER TABLE `shop_product_properties_data` DROP FOREIGN KEY `shop_product_properties_data_FK_2`;

ALTER TABLE `shop_product_variants` DROP FOREIGN KEY `shop_product_variants_FK_1`;

ALTER TABLE `shop_product_variants` CHANGE `price` `price` FLOAT(10,2) NOT NULL;

ALTER TABLE `shop_products` DROP FOREIGN KEY `shop_products_FK_1`;

ALTER TABLE `shop_products` DROP FOREIGN KEY `shop_products_FK_2`;

ALTER TABLE `shop_products_rating` DROP FOREIGN KEY `shop_products_rating_FK_1`;

ALTER TABLE `shop_products_rating` CHANGE `product_id` `product_id` INTEGER NOT NULL;

ALTER TABLE `shop_products_rating` CHANGE `votes` `votes` INTEGER;

ALTER TABLE `shop_products_rating` CHANGE `rating` `rating` INTEGER;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

}