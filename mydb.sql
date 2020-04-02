CREATE TABLE IF NOT EXISTS `mydb`.`customer` (
  `Customer_id` INT NOT NULL AUTO_INCREMENT,
   `username` nvarchar(50) not null,
    `password` nchar(60) not null,
  `Last_name` VARCHAR(255),
  `First_name` VARCHAR(255),
  `Email` VARCHAR(255) NOT NULL,
  `Phone` VARCHAR(12) NOT NULL,
  `Street_address` VARCHAR(255) NULL,
  `City` VARCHAR(255) ,
  `State` VARCHAR(2) ,
  `Zip` INT(5),
  PRIMARY KEY (`Customer_id`))
ENGINE = InnoDB
CREATE TABLE IF NOT EXISTS `mydb`.`Products` (
  `Product_id` INT NOT NULL AUTO_INCREMENT,
  `Product_name` VARCHAR(255) NOT NULL,
  `Product_catergory` VARCHAR(255) NULL,
  `Purchase_price` VARCHAR(255) NULL,
  `Sale_price` VARCHAR(255) NULL,
  PRIMARY KEY (`Product_id`))
ENGINE = InnoDB
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
ENGINE = InnoDB
CREATE TABLE IF NOT EXISTS `mydb`.`Products_supplier` (
  `Products_supplier_id` INT NOT NULL AUTO_INCREMENT,
  `Product_id` INT NOT NULL,
  `Supplier_id` INT NOT NULL,
  PRIMARY KEY (`Products_supplier_id`),
  INDEX `fk_Products_supplier_Products_idx` (`Product_id` ASC) VISIBLE,
  INDEX `fk_Products_supplier_Supplier1_idx` (`Supplier_id` ASC) VISIBLE,
  CONSTRAINT `fk_Products_supplier_Products`
    FOREIGN KEY (`Product_id`)
    REFERENCES `mydb`.`Products` (`Product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Products_supplier_Supplier1`
    FOREIGN KEY (`Supplier_id`)
    REFERENCES `mydb`.`Supplier` (`Supplier_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
CREATE TABLE IF NOT EXISTS `mydb`.`Stock` (
  `Stock_id` INT NOT NULL,
  `Product_id` INT NOT NULL,
  `Quantity` INT NULL,
  PRIMARY KEY (`Stock_id`),
  INDEX `fk_Stock_Products1_idx` (`Product_id` ASC) VISIBLE,
  CONSTRAINT `fk_Stock_Products1`
    FOREIGN KEY (`Product_id`)
    REFERENCES `mydb`.`Products` (`Product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
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
  INDEX `fk_Orders_customer1_idx` (`Customer_id` ASC) VISIBLE,
  INDEX `fk_Orders_Products1_idx` (`Product_id` ASC) VISIBLE,
  INDEX `fk_Orders_invioce1_idx` (`Invoice_number` ASC) VISIBLE,
  CONSTRAINT `fk_Orders_customer1`
    FOREIGN KEY (`Customer_id`)
    REFERENCES `mydb`.`customer` (`Customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Orders_Products1`
    FOREIGN KEY (`Product_id`)
    REFERENCES `mydb`.`Products` (`Product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Orders_invioce1`
    FOREIGN KEY (`Invoice_number`)
    REFERENCES `mydb`.`invioce` (`Invoice_number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
CREATE TABLE IF NOT EXISTS `mydb`.`invioce` (
  `Invoice_number` INT NOT NULL AUTO_INCREMENT,
  `Order_id` INT NOT NULL,
  `Unit_price` DECIMAL(2) NOT NULL,
  `Quantity` INT NOT NULL,
  `Total_before_tax` DECIMAL(2) NOT NULL,
  `Tax` DECIMAL(2) NOT NULL,
  `Total_after_tax` DECIMAL(2) NOT NULL,
  PRIMARY KEY (`Invoice_number`))
ENGINE = InnoDB
CREATE TABLE IF NOT EXISTS `mydb`.`Payment` (
  `Payment_id` INT NOT NULL,
  `Customer_id` INT NOT NULL,
  `Payment_method` VARCHAR(255) NULL,
  `Card_Number` INT NOT NULL,
  `Expiration_date` DATE NULL,
  `Security_code` INT NULL,
  PRIMARY KEY (`Payment_id`),
  INDEX `fk_Payment_customer1_idx` (`Customer_id` ASC) VISIBLE,
  CONSTRAINT `fk_Payment_customer1`
    FOREIGN KEY (`Customer_id`)
    REFERENCES `mydb`.`customer` (`Customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB


