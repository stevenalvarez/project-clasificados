SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `clasificados` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `clasificados` ;

-- -----------------------------------------------------
-- Table `clasificados`.`categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clasificados`.`categoria` (
  `idcategoria` INT NOT NULL ,
  PRIMARY KEY (`idcategoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clasificados`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clasificados`.`usuario` (
  `idusuario` INT NOT NULL ,
  `username` VARCHAR(45) NULL ,
  `pass` VARCHAR(45) NULL ,
  `tipo` VARCHAR(30) NULL ,
  `email` VARCHAR(100) NULL ,
  `nombre` VARCHAR(100) NULL ,
  `apellido` VARCHAR(100) NULL ,
  PRIMARY KEY (`idusuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clasificados`.`ciudad`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clasificados`.`ciudad` (
  `idciudad` INT NOT NULL ,
  PRIMARY KEY (`idciudad`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clasificados`.`provincia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clasificados`.`provincia` (
  `idprovincia` INT NOT NULL ,
  `ciudad_idciudad` INT NOT NULL ,
  PRIMARY KEY (`idprovincia`) ,
  INDEX `fk_provincia_ciudad1` (`ciudad_idciudad` ASC) ,
  CONSTRAINT `fk_provincia_ciudad1`
    FOREIGN KEY (`ciudad_idciudad` )
    REFERENCES `clasificados`.`ciudad` (`idciudad` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clasificados`.`post`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clasificados`.`post` (
  `idpost` INT NOT NULL ,
  `titulo` VARCHAR(200) NULL ,
  `descripcion` VARCHAR(300) NULL ,
  `telefono` INT NULL ,
  `email` VARCHAR(100) NULL ,
  `url` VARCHAR(200) NULL ,
  `zona` VARCHAR(200) NULL ,
  `tiempo` VARCHAR(45) NULL ,
  `precio` DOUBLE NULL ,
  `fecha_ini` DATETIME NULL ,
  `fecha_fin` DATETIME NULL ,
  `permalink` VARCHAR(200) NULL ,
  `usuario_idusuario` INT NOT NULL ,
  `categoria_idcategoria` INT NOT NULL ,
  `ciudad_idciudad` INT NOT NULL ,
  PRIMARY KEY (`idpost`) ,
  INDEX `fk_post_usuario` (`usuario_idusuario` ASC) ,
  INDEX `fk_post_categoria1` (`categoria_idcategoria` ASC) ,
  INDEX `fk_post_ciudad1` (`ciudad_idciudad` ASC) ,
  CONSTRAINT `fk_post_usuario`
    FOREIGN KEY (`usuario_idusuario` )
    REFERENCES `clasificados`.`usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_categoria1`
    FOREIGN KEY (`categoria_idcategoria` )
    REFERENCES `clasificados`.`categoria` (`idcategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_ciudad1`
    FOREIGN KEY (`ciudad_idciudad` )
    REFERENCES `clasificados`.`ciudad` (`idciudad` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clasificados`.`fotos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `clasificados`.`fotos` (
  `idfotos` INT NOT NULL ,
  `post_idpost` INT NOT NULL ,
  PRIMARY KEY (`idfotos`) ,
  INDEX `fk_fotos_post1` (`post_idpost` ASC) ,
  CONSTRAINT `fk_fotos_post1`
    FOREIGN KEY (`post_idpost` )
    REFERENCES `clasificados`.`post` (`idpost` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
