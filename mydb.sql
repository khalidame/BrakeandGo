CREATE DATABASE IF NOT EXISTS `mydb`; 

CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
   `username` nvarchar(50) not null,
  `password` nchar(60) not null,
  `Last_name` VARCHAR(255),
  `First_name` VARCHAR(255),
  `Email` VARCHAR(255) NOT NULL,
  `IsAdmin` TINYINT DEFAULT '0' ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

ALTER table `mydb`.`user` 
ADD COLUMN security_question VARCHAR(255) AFTER Email;

ALTER table `mydb`.`user` 
ADD COLUMN security_answer VARCHAR(255) AFTER security_question;

INSERT INTO `mydb`.`user`
(`username`,
`password`,
`Last_name`,
`First_name`,
`Email`,
`IsAdmin`)
VALUES
('admin',
'$2y$10$IXncJb.OQbsqYEfs6vhInOpUlOSrmLhKtSryGgUzJqd1RZZGDeci.',
'admin',
'admin',
'admin@test.com',
1);


CREATE TABLE IF NOT EXISTS `mydb`.`customer` (
  `Customer_id` INT NOT NULL AUTO_INCREMENT,
  `User_id` INT NOT NULL,
  `Phone` VARCHAR(12) NOT NULL,
  `Street_address` VARCHAR(255) NULL,
  `City` VARCHAR(255) ,
  `State` VARCHAR(2) ,
  `Zip` INT(5),
  PRIMARY KEY (`Customer_id`),
  INDEX `fk_user_idx` (`User_id` ASC) ,
  CONSTRAINT `fk_customer_user`
    FOREIGN KEY (`User_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `mydb`.`products` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(200) NOT NULL,
	`desc` text NOT NULL,
	`price` decimal(7,2) NOT NULL,
	`rrp` decimal(7,2) NOT NULL DEFAULT '0.00',
	`quantity` int(11) NOT NULL,
	`img` text NOT NULL,
	`date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `mydb`.`products` (`name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
('2016 Toyota Highlander SE Alternator', 'High Quality Fits: 2015, 2016, 2017, 2018 Toyota Highlanders Comes with one-year Manufacturer Warranty' , '29.99', '0.00', 10, 'part-1.png', '2019-03-13 17:55:22'),
('2001 Honda Odyssey LX Alternator', 'High Quality Fits: 2009, 2010, 2011, and 2012 Honda Odysseys Comes with one-year Manufacturer Warranty', '14.99', '19.99', 34, 'part-2.png', '2019-03-13 18:52:49'),
('product-3', 'Product Description', '19.99', '0.00', 23, 'part-3.jpg', '2019-03-13 19:47:56'),
('product-4', 'Product Description', '69.99', '0.00', 7, 'part-4.png', '2019-03-13 20:20:30'),
('Ball Bearing', 'Made in Germany 2013 Toyota Corolla LE ball bearing', '69.99', '0.00', 7, 'part.5-jpg', '2019-03-13 21:42:04'),
('product-3', 'Product Description', '69.99', '0.00', 7, 'part-3.jpg', '2019-03-13 22:40:00'),
('2016 Toyota Highlander SE Alternator', 'High Quality Fits: 2015, 2016, 2017, 2018 Toyota Highlanders Comes with one-year Manufacturer Warranty' , '29.99', '0.00', 10, 'part-1.png', '2019-03-13 22:39:04'),
('2001 Honda Odyssey LX Alternator', 'High Quality Fits: 2009, 2010, 2011, and 2012 Honda Odysseys Comes with one-year Manufacturer Warranty', '14.99', '19.99', 34, 'part-2.png', '2019-03-13 23:50:04');


CREATE TABLE IF NOT EXISTS `mydb`.`Supplier` (
  `Supplier_id` INT NOT NULL,
  `Supplier_name` VARCHAR(255) NOT NULL,
  `Supplier_email` VARCHAR(255) NOT NULL,
  `Supplier_phone` INT(10) NOT NULL,
  `Address` VARCHAR(255) NULL,
  `City` VARCHAR(255) NULL,
  `State` VARCHAR(255) NULL,
  `Zip` INT(10) NULL,
  PRIMARY KEY (`Supplier_id`))
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `mydb`.`Products_supplier` (
  `Products_supplier_id` INT NOT NULL AUTO_INCREMENT,
  `Product_id` INT NOT NULL,
  `Supplier_id` INT NOT NULL,
  PRIMARY KEY (`Products_supplier_id`),
  INDEX `fk_Products_supplier_Products_idx` (`Product_id` ASC) ,
  INDEX `fk_Products_supplier_Supplier1_idx` (`Supplier_id` ASC) ,
  CONSTRAINT `fk_Products_supplier_Products`
    FOREIGN KEY (`Product_id`)
    REFERENCES `mydb`.`Products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Products_supplier_Supplier1`
    FOREIGN KEY (`Supplier_id`)
    REFERENCES `mydb`.`Supplier` (`Supplier_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `mydb`.`Stock` (
  `Stock_id` INT NOT NULL,
  `Product_id` INT NOT NULL,
  `Quantity` INT NULL,
  PRIMARY KEY (`Stock_id`),
  INDEX `fk_Stock_Products1_idx` (`Product_id` ASC),
  CONSTRAINT `fk_Stock_Products1`
    FOREIGN KEY (`Product_id`)
    REFERENCES `mydb`.`Products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`invioce` (
  `Invoice_number` INT NOT NULL AUTO_INCREMENT,
  `Order_id` INT NOT NULL,
  `Unit_price` DECIMAL(2) NOT NULL,
  `Quantity` INT NOT NULL,
  `Total_before_tax` DECIMAL(2) NOT NULL,
  `Tax` DECIMAL(2) NOT NULL,
  `Total_after_tax` DECIMAL(2) NOT NULL,
  PRIMARY KEY (`Invoice_number`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Orders` (
  `Order_id` INT NOT NULL,
  `Customer_id` INT NOT NULL,
  `Product_id` INT NOT NULL,
  `Order_status` VARCHAR(255) NULL,
  `Order_date` DATE NULL,
  `Required_date` DATE NOT NULL,
  `Shipped_date` DATE NULL,
  `Invoice_number` INT NOT NULL,
  PRIMARY KEY (`Order_id`),
  INDEX `fk_Orders_customer1_idx` (`Customer_id` ASC),
  INDEX `fk_Orders_Products1_idx` (`Product_id` ASC) ,
  INDEX `fk_Orders_invioce1_idx` (`Invoice_number` ASC) ,
  CONSTRAINT `fk_Orders_customer1`
    FOREIGN KEY (`Customer_id`)
    REFERENCES `mydb`.`customer` (`Customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Orders_Products1`
    FOREIGN KEY (`Product_id`)
    REFERENCES `mydb`.`Products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Orders_invioce1`
    FOREIGN KEY (`Invoice_number`)
    REFERENCES `mydb`.`invioce` (`Invoice_number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Payment` (
  `Payment_id` INT NOT NULL,
  `Customer_id` INT NOT NULL,
  `Payment_method` VARCHAR(255) NULL,
  `Card_Number` INT NOT NULL,
  `Expiration_date` DATE NULL,
  `security_code` INT NULL,
  PRIMARY KEY (`Payment_id`),
  INDEX `fk_Payment_customer1_idx` (`Customer_id` ASC),
  CONSTRAINT `fk_Payment_customer1`
    FOREIGN KEY (`Customer_id`)
    REFERENCES `mydb`.`customer` (`Customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB

