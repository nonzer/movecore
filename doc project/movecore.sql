-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema movecore
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `movecore` ;

-- -----------------------------------------------------
-- Schema movecore
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `movecore` DEFAULT CHARACTER SET utf8 ;
USE `movecore` ;

-- -----------------------------------------------------
-- Table `movecore`.`countries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movecore`.`countries` ;

CREATE TABLE IF NOT EXISTS `movecore`.`countries` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `slug` VARCHAR(5) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movecore`.`cities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movecore`.`cities` ;

CREATE TABLE IF NOT EXISTS `movecore`.`cities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `slug` VARCHAR(5) NULL,
  `countries_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_cities_countries1`
    FOREIGN KEY (`countries_id`)
    REFERENCES `movecore`.`countries` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_cities_countries1_idx` ON `movecore`.`cities` (`countries_id` ASC);


-- -----------------------------------------------------
-- Table `movecore`.`arrondissements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movecore`.`arrondissements` ;

CREATE TABLE IF NOT EXISTS `movecore`.`arrondissements` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `slug` VARCHAR(45) NULL,
  `cities_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_arrondissements_cities`
    FOREIGN KEY (`cities_id`)
    REFERENCES `movecore`.`cities` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_arrondissements_cities_idx` ON `movecore`.`arrondissements` (`cities_id` ASC);


-- -----------------------------------------------------
-- Table `movecore`.`quaters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movecore`.`quaters` ;

CREATE TABLE IF NOT EXISTS `movecore`.`quaters` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `arrondissements_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_quaters_arrondissements1`
    FOREIGN KEY (`arrondissements_id`)
    REFERENCES `movecore`.`arrondissements` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_quaters_arrondissements1_idx` ON `movecore`.`quaters` (`arrondissements_id` ASC);


-- -----------------------------------------------------
-- Table `movecore`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movecore`.`roles` ;

CREATE TABLE IF NOT EXISTS `movecore`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movecore`.`personals`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movecore`.`personals` ;

CREATE TABLE IF NOT EXISTS `movecore`.`personals` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `birth_date` DATE NULL,
  `login` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `tel` VARCHAR(15) NULL,
  `avatar` VARCHAR(255) NULL,
  `roles_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_personals_roles1`
    FOREIGN KEY (`roles_id`)
    REFERENCES `movecore`.`roles` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_personals_roles1_idx` ON `movecore`.`personals` (`roles_id` ASC);


-- -----------------------------------------------------
-- Table `movecore`.`customers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movecore`.`customers` ;

CREATE TABLE IF NOT EXISTS `movecore`.`customers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  `sex` CHAR(1) NULL,
  `tel` VARCHAR(10) NULL,
  `birthday` DATE NULL,
  `sector` VARCHAR(45) NULL,
  `particular_landmark` VARCHAR(45) NULL COMMENT 'Repère particulier',
  `landmark` VARCHAR(45) NULL COMMENT 'repere',
  `quaters_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_customers_quaters1`
    FOREIGN KEY (`quaters_id`)
    REFERENCES `movecore`.`quaters` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_customers_quaters1_idx` ON `movecore`.`customers` (`quaters_id` ASC);

CREATE UNIQUE INDEX `code_UNIQUE` ON `movecore`.`customers` (`code` ASC);


-- -----------------------------------------------------
-- Table `movecore`.`category_customers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movecore`.`category_customers` ;

CREATE TABLE IF NOT EXISTS `movecore`.`category_customers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  `period` INT NOT NULL COMMENT 'Période ou nombre de jours pour relancer le client.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movecore`.`gaz`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movecore`.`gaz` ;

CREATE TABLE IF NOT EXISTS `movecore`.`gaz` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `weight` VARCHAR(45) NOT NULL COMMENT 'Le poids du ',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movecore`.`customer_gaz`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movecore`.`customer_gaz` ;

CREATE TABLE IF NOT EXISTS `movecore`.`customer_gaz` (
  `customer_id` INT NOT NULL,
  `gaz_id` INT NOT NULL,
  `time_order` VARCHAR(45) NULL,
  `date_order` TIME NULL,
  `time_deliver` TIME NULL,
  `status_order` VARCHAR(45) NULL,
  `deliver_delay` VARCHAR(45) NULL COMMENT 'Différence entre time_ordre et  time_deliver',
  `personals_id` INT NOT NULL,
  PRIMARY KEY (`gaz_id`, `customer_id`),
  CONSTRAINT `fk_customers_has_gaz_customers1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `movecore`.`customers` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customers_has_gaz_gaz1`
    FOREIGN KEY (`gaz_id`)
    REFERENCES `movecore`.`gaz` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customer_gaz_personals1`
    FOREIGN KEY (`personals_id`)
    REFERENCES `movecore`.`personals` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_customers_has_gaz_gaz1_idx` ON `movecore`.`customer_gaz` (`gaz_id` ASC);

CREATE INDEX `fk_customers_has_gaz_customers1_idx` ON `movecore`.`customer_gaz` (`customer_id` ASC);

CREATE INDEX `fk_customer_gaz_personals1_idx` ON `movecore`.`customer_gaz` (`personals_id` ASC);


-- -----------------------------------------------------
-- Table `movecore`.`relauches`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `movecore`.`relauches` ;

CREATE TABLE IF NOT EXISTS `movecore`.`relauches` (
  `id` INT NOT NULL,
  `statuts` VARCHAR(45) NULL,
  `date` DATE NULL,
  `date_reminder` DATE NULL,
  `customer_gaz_customer_id` INT NOT NULL,
  `customer_gaz_gaz_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_relauches_customer_gaz1`
    FOREIGN KEY (`customer_gaz_customer_id` , `customer_gaz_gaz_id`)
    REFERENCES `movecore`.`customer_gaz` (`customer_id` , `gaz_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_relauches_customer_gaz1_idx` ON `movecore`.`relauches` (`customer_gaz_customer_id` ASC, `customer_gaz_gaz_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
