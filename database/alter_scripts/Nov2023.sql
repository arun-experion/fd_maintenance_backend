/*Delete entire data for product_vehicles table*/
TRUNCATE TABLE `product_vehicles`;

/*Delete entire data for product_quantities table*/
TRUNCATE TABLE `product_quantities`;

/*Delete entire data for product_prices table*/
TRUNCATE TABLE `product_prices`;

/*Delete entire data for product_images table*/
TRUNCATE TABLE `product_images`;

/*Delete entire data for product_categories table*/
TRUNCATE TABLE `product_categories`;

/*Delete entire data for cart table*/
TRUNCATE TABLE `cart`;

/*Delete entire data for ced_product_criteria table*/
TRUNCATE TABLE `ced_product_criteria`;

/*Delete entire data for notes table*/
TRUNCATE TABLE `notes`;

/*Delete entire data for order_products table*/
TRUNCATE TABLE `order_products`;

/*Delete entire data for favourite_orders table*/
TRUNCATE TABLE `favourite_orders`;

/*Delete entire data for porduct_company_web_statuses table*/
TRUNCATE TABLE `porduct_company_web_statuses`;

/*Delete entire data for makes table*/
TRUNCATE TABLE `search_histories`;

/*Delete entire data for product_stock_import_status table*/
TRUNCATE TABLE `product_stock_import_status`;

TRUNCATE TABLE `product_images_backup`;

/*Delete entire data for vehicles table*/
DELETE FROM `vehicles`;

/*Restart the auto_increment */
ALTER TABLE `vehicles` AUTO_INCREMENT = 1;

/*Delete entire data for products table*/
DELETE FROM `products`;

/*Restart the auto_increment */
ALTER TABLE `products` AUTO_INCREMENT = 1;

/*Delete entire data for orders table*/
DELETE FROM `orders`;

/*Restart the auto_increment */
ALTER TABLE `orders` AUTO_INCREMENT = 1;

/*Delete entire data for models table*/
DELETE FROM `models`;

/*Restart the auto_increment */
ALTER TABLE `models` AUTO_INCREMENT = 1;

/*Delete entire data for makes table*/
DELETE FROM `makes`;

/*Restart the auto_increment */
ALTER TABLE `makes` AUTO_INCREMENT = 1;

/*Delete entire data for categories table*/
DELETE FROM `categories`;

/*Restart the auto_increment */
ALTER TABLE `categories` AUTO_INCREMENT = 1;

/*Delete entire data for brands table*/
DELETE FROM `brands`;

/*Restart the auto_increment */
ALTER TABLE `brands` AUTO_INCREMENT = 1;

