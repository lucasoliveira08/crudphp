-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
-- -----------------------------------------------------
-- Schema crud
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `crud` DEFAULT CHARACTER SET utf8 ;
USE `crud` ;

-- -----------------------------------------------------
-- Table `crud`.`produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crud`.`produto` ;

CREATE TABLE IF NOT EXISTS `crud`.`produto` (
  `idProduto` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomeProduto` VARCHAR(45) NOT NULL,
  `precoProduto` DOUBLE(9,2) NOT NULL,
  `qtdEstoque` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idProduto`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
