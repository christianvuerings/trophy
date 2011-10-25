SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `trophy` ;
CREATE SCHEMA IF NOT EXISTS `trophy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `trophy` ;

-- -----------------------------------------------------
-- Table `trophy`.`countries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`countries` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`countries` (
  `countries_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`countries_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`provinces`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`provinces` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`provinces` (
  `provinces_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(255) NOT NULL ,
  `countries_id` INT(11) NOT NULL ,
  PRIMARY KEY (`provinces_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`cities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`cities` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`cities` (
  `cities_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `provinces_id` INT(11) NOT NULL ,
  `zipcode` VARCHAR(10) NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`cities_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`languages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`languages` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`languages` (
  `languages_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`languages_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`occupations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`occupations` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`occupations` (
  `occupations_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`occupations_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`users` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`users` (
  `users_id` INT(11) NOT NULL AUTO_INCREMENT ,
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
  `cities_id` INT(11) NOT NULL ,
  `telephone` VARCHAR(30) NULL ,
  `fax` VARCHAR(30) NULL ,
  `gsm` VARCHAR(30) NULL ,
  `languages_id` INT(11) NOT NULL ,
  PRIMARY KEY (`users_id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`payment_methods`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`payment_methods` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`payment_methods` (
  `payment_methods_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`payment_methods_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`payments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`payments` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`payments` (
  `payments_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `date` DATE NOT NULL ,
  `amount` FLOAT NOT NULL ,
  `users_id` INT(11) NOT NULL ,
  `payment_methods_id` INT(11) NOT NULL ,
  PRIMARY KEY (`payments_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`specialties`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`specialties` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`specialties` (
  `specialties_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`specialties_id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`users_specialties`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`users_specialties` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`users_specialties` (
  `users_id` INT(11) NOT NULL ,
  `specialties_id` INT(11) NOT NULL ,
  PRIMARY KEY (`users_id`, `specialties_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`users_occupations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`users_occupations` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`users_occupations` (
  `users_id` INT(11) NOT NULL ,
  `occupations_id` INT(11) NOT NULL ,
  PRIMARY KEY (`users_id`, `occupations_id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
