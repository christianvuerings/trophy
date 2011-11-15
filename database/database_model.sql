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
AUTO_INCREMENT = 2
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
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`city`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`city` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`city` (
  `id` BIGINT(15) NOT NULL AUTO_INCREMENT ,
  `alpha` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `longitude` DECIMAL(12,10) NULL DEFAULT NULL ,
  `latitude` DECIMAL(12,10) NULL DEFAULT NULL ,
  `code` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `name` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ,
  `province_id` BIGINT(15) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  INDEX `region` (`province_id` ASC) ,
  INDEX `code` (`code` ASC) ,
  INDEX `alpha` (`alpha` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 14297
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
AUTO_INCREMENT = 10
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
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`target_group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`target_group` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`target_group` (
  `target_group_id` INT(11) NOT NULL ,
  `label` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`target_group_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`user_target_group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`user_target_group` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`user_target_group` (
  `user_id` INT(11) NOT NULL ,
  `target_group_id` INT(11) NOT NULL ,
  PRIMARY KEY (`user_id`, `target_group_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`address`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`address` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`address` (
  `address_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `address_street` VARCHAR(30) NOT NULL ,
  `address_number` INT(11) NOT NULL ,
  `address_bus` INT(11) NULL ,
  `city_id` INT(11) NOT NULL ,
  PRIMARY KEY (`address_id`) )
ENGINE = InnoDB
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
  `last_login` TIMESTAMP NULL DEFAULT NULL ,
  `member_since` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `language_id` INT(11) NOT NULL ,
  `address_id` INT(11) NOT NULL COMMENT 'invoice address' ,
  `gsm` VARCHAR(30) NULL ,
  `avatar` VARCHAR(255) NULL ,
  `twitter` VARCHAR(255) NULL ,
  `facebook` VARCHAR(255) NULL ,
  `rss` VARCHAR(255) NULL ,
  PRIMARY KEY (`user_id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 4901
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


-- -----------------------------------------------------
-- Table `trophy`.`practice`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`practice` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`practice` (
  `practice_id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL DEFAULT NULL ,
  `telephone` VARCHAR(30) NULL DEFAULT NULL ,
  `fax` VARCHAR(30) NULL DEFAULT NULL ,
  `address_id` INT(11) NOT NULL ,
  PRIMARY KEY (`practice_id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 7001
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`contact_information`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`contact_information` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`contact_information` (
  `user_id` INT(11) NOT NULL ,
  `address_street` VARCHAR(30) NOT NULL ,
  `address_number` INT(11) NOT NULL ,
  `address_bus` INT(11) NOT NULL ,
  `city_id` INT(11) NOT NULL ,
  `telephone` VARCHAR(30) NOT NULL ,
  `fax` VARCHAR(30) NOT NULL ,
  `gsm` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `trophy`.`practice_user_specialty`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trophy`.`practice_user_specialty` ;

CREATE  TABLE IF NOT EXISTS `trophy`.`practice_user_specialty` (
  `practice_id` INT(11) NOT NULL ,
  `user_id` INT(11) NOT NULL ,
  `specialty_id` INT(11) NOT NULL ,
  PRIMARY KEY (`practice_id`, `user_id`, `specialty_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
