-- MySQL Script generated by MySQL Workbench
-- Sat Aug 10 04:20:04 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema aguablue
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema aguablue
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aguablue` DEFAULT CHARACTER SET utf8 ;
USE `aguablue` ;

-- -----------------------------------------------------
-- Table `aguablue`.`lote`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aguablue`.`lote` (
  `idlote` INT NOT NULL AUTO_INCREMENT,
  `fecha_salida` DATE NOT NULL,
  `tipo_lote` VARCHAR(500) NOT NULL,
  `cantidad_unidad` DOUBLE NOT NULL,
  `cantidad_total` INT NOT NULL,
  `precio_unitario` DOUBLE NOT NULL,
  `hora_salida` TIME NOT NULL,
  PRIMARY KEY (`idlote`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aguablue`.`cartera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aguablue`.`cartera` (
  `idcartera` INT NOT NULL AUTO_INCREMENT,
  `fecha_cartera` DATE NOT NULL,
  `gasto_diario` DOUBLE NOT NULL,
  `ganancia_diaria` DOUBLE NOT NULL,
  `total` DOUBLE NOT NULL,
  PRIMARY KEY (`idcartera`),
  UNIQUE INDEX `fecha_cartera_UNIQUE` (`fecha_cartera` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aguablue`.`empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aguablue`.`empleado` (
  `idempleado` INT NOT NULL,
  `nombre` VARCHAR(500) NOT NULL,
  `apellidos` VARCHAR(500) NOT NULL,
  `direccion` TEXT NOT NULL,
  `telefono` VARCHAR(14) NOT NULL,
  `cargo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idempleado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aguablue`.`pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aguablue`.`pago` (
  `idpago` INT NOT NULL AUTO_INCREMENT,
  `fehca_pago` DATE NOT NULL,
  `hora_pago` TIME NOT NULL,
  `empleado_idempleado` INT NOT NULL,
  `cartera_idcartera` INT NOT NULL,
  PRIMARY KEY (`idpago`),
  INDEX `fk_pago_empleado_idx` (`empleado_idempleado` ASC),
  INDEX `fk_pago_cartera1_idx` (`cartera_idcartera` ASC),
  CONSTRAINT `fk_pago_empleado`
    FOREIGN KEY (`empleado_idempleado`)
    REFERENCES `aguablue`.`empleado` (`idempleado`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_pago_cartera1`
    FOREIGN KEY (`cartera_idcartera`)
    REFERENCES `aguablue`.`cartera` (`idcartera`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aguablue`.`domicilio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aguablue`.`domicilio` (
  `iddomicilio` INT NOT NULL AUTO_INCREMENT,
  `hora_domicilio` TIME NOT NULL,
  `fecha_domicilio` DATE NOT NULL,
  `direccion` TEXT NOT NULL,
  PRIMARY KEY (`iddomicilio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aguablue`.`lote_has_domicilio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aguablue`.`lote_has_domicilio` (
  `costo_venta` DOUBLE NOT NULL,
  `cartera_idcartera` INT NOT NULL,
  `cantidad_producto` INT NOT NULL,
  `lote_idlote` INT NOT NULL,
  `domicilio_iddomicilio` INT NOT NULL,
  INDEX `fk_lote_has_domicilio_cartera1_idx` (`cartera_idcartera` ASC),
  INDEX `fk_lote_has_domicilio_lote1_idx` (`lote_idlote` ASC),
  INDEX `fk_lote_has_domicilio_domicilio1_idx` (`domicilio_iddomicilio` ASC),
  CONSTRAINT `fk_lote_has_domicilio_cartera1`
    FOREIGN KEY (`cartera_idcartera`)
    REFERENCES `aguablue`.`cartera` (`idcartera`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_lote_has_domicilio_lote1`
    FOREIGN KEY (`lote_idlote`)
    REFERENCES `aguablue`.`lote` (`idlote`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_lote_has_domicilio_domicilio1`
    FOREIGN KEY (`domicilio_iddomicilio`)
    REFERENCES `aguablue`.`domicilio` (`iddomicilio`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;