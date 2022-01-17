SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema tcc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tcc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tcc` DEFAULT CHARACTER SET utf8 ;
USE `tcc` ;

-- -----------------------------------------------------
-- Table `tcc`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`evento` (
  `id_evento` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(250) NOT NULL,
  `imagem` VARCHAR(250) NOT NULL,
  `status` TINYINT NOT NULL,
  PRIMARY KEY (`id_evento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`sexo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`sexo` (
  `id_sexo` INT NOT NULL AUTO_INCREMENT,
  `sexo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_sexo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`raca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`raca` (
  `id_raca` INT NOT NULL AUTO_INCREMENT,
  `raca` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_raca`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`porte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`porte` (
  `id_porte` INT NOT NULL AUTO_INCREMENT,
  `porte` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_porte`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`especie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`especie` (
  `id_especie` INT NOT NULL AUTO_INCREMENT,
  `especiel` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_especie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`animal` (
  `id_animal` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(250) NULL,
  `imagem` VARCHAR(250) NOT NULL,
  `status` TINYINT NOT NULL,
  `sexo_id_sexo` INT NOT NULL,
  `raca_id_raca` INT NOT NULL,
  `porte_id_porte` INT NOT NULL,
  `especie_id_especie` INT NOT NULL,
  PRIMARY KEY (`id_animal`),
  INDEX `fk_animal_sexo1_idx` (`sexo_id_sexo` ASC),
  INDEX `fk_animal_raca1_idx` (`raca_id_raca` ASC),
  INDEX `fk_animal_porte1_idx` (`porte_id_porte` ASC),
  INDEX `fk_animal_especie1_idx` (`especie_id_especie` ASC),
  CONSTRAINT `fk_animal_sexo1`
    FOREIGN KEY (`sexo_id_sexo`)
    REFERENCES `tcc`.`sexo` (`id_sexo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animal_raca1`
    FOREIGN KEY (`raca_id_raca`)
    REFERENCES `tcc`.`raca` (`id_raca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animal_porte1`
    FOREIGN KEY (`porte_id_porte`)
    REFERENCES `tcc`.`porte` (`id_porte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animal_especie1`
    FOREIGN KEY (`especie_id_especie`)
    REFERENCES `tcc`.`especie` (`id_especie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcc`.`adocao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tcc`.`adocao` (
  `id_adocao` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(250) NOT NULL,
  `email` VARCHAR(250) NOT NULL,
  `contato` VARCHAR(45) NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `rg` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `rua` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `complemento` VARCHAR(45) NULL,
  `data` DATE NOT NULL,
  `status` TINYINT NOT NULL,
  `observacoes` VARCHAR(250) NULL,
  `animal_id_animal` INT NOT NULL,
  PRIMARY KEY (`id_adocao`),
  INDEX `fk_adocao_animal1_idx` (`animal_id_animal` ASC),
  CONSTRAINT `fk_adocao_animal1`
    FOREIGN KEY (`animal_id_animal`)
    REFERENCES `tcc`.`animal` (`id_animal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;