SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `webdev` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `webdev` ;

-- -----------------------------------------------------
-- Table `webdev`.`formFields`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webdev`.`formFields` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `label` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webdev`.`formSubmit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webdev`.`formSubmit` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `webdev`.`formSubmitData`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webdev`.`formSubmitData` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `formSubmit_id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `value` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_table1_formSubmit_idx` (`formSubmit_id` ASC),
  CONSTRAINT `fk_table1_formSubmit`
    FOREIGN KEY (`formSubmit_id`)
    REFERENCES `webdev`.`formSubmit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `webdev`.`formFields`
-- -----------------------------------------------------
START TRANSACTION;
USE `webdev`;
INSERT INTO `webdev`.`formFields` (`id`, `name`, `label`) VALUES (1, 'name', 'first name');
INSERT INTO `webdev`.`formFields` (`id`, `name`, `label`) VALUES (2, 'surname', 'last name');
INSERT INTO `webdev`.`formFields` (`id`, `name`, `label`) VALUES (3, 'country', 'country');
INSERT INTO `webdev`.`formFields` (`id`, `name`, `label`) VALUES (4, 'email', 'email');
INSERT INTO `webdev`.`formFields` (`id`, `name`, `label`) VALUES (5, 'telephone', 'phone number');

COMMIT;

