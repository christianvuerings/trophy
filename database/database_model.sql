SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `trophy` ;
CREATE SCHEMA IF NOT EXISTS `trophy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `trophy` ;

-- -----------------------------------------------------
-- Table `trophy`.`country`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`country` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`country` (
  `country_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`country_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`province`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`province` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`province` (
  `province_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(255) NOT NULL ,
  `country_id` INT(11) NOT NULL ,
  PRIMARY KEY (`province_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`city`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`city` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`city` (
  `city_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `province_id` INT(11) NOT NULL ,
  `zipcode` VARCHAR(10) NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`city_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`language`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`language` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`language` (
  `language_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`language_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`occupation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`occupation` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`occupation` (
  `occupation_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`occupation_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`user` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(255) NOT NULL ,
  `last_name` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(32) NOT NULL ,
  `last_login` DATE NOT NULL ,
  `member_since` DATE NOT NULL ,
  `twitter_id` VARCHAR(20) NULL ,
  `facebook_id` VARCHAR(20) NULL ,
  `blog_rss` VARCHAR(255) NULL ,
  `address_street` VARCHAR(255) NOT NULL ,
  `address_number` VARCHAR(45) NOT NULL ,
  `address_bus` VARCHAR(45) NULL ,
  `city_id` INT(11) NOT NULL ,
  `telephone` VARCHAR(30) NULL ,
  `fax` VARCHAR(30) NULL ,
  `gsm` VARCHAR(30) NULL ,
  `language_id` INT(11) NOT NULL ,
  PRIMARY KEY (`user_id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`payment_method`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`payment_method` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`payment_method` (
  `payment_method_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`payment_method_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`payment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`payment` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`payment` (
  `payment_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `date` DATE NOT NULL ,
  `amount` FLOAT NOT NULL ,
  `user_id` INT(11) NOT NULL ,
  `payment_method_id` INT(11) NOT NULL ,
  PRIMARY KEY (`payment_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`speciality`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`speciality` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`speciality` (
  `speciality_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`speciality_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`user_speciality`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`user_speciality` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`user_speciality` (
  `user_id` INT(11) NOT NULL ,
  `speciality_id` INT(11) NOT NULL ,
  PRIMARY KEY (`user_id`, `speciality_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`user_occupation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`user_occupation` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`user_occupation` (
  `user_id` INT(11) NOT NULL ,
  `occupation_id` INT(11) NOT NULL ,
  PRIMARY KEY (`user_id`, `occupation_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
