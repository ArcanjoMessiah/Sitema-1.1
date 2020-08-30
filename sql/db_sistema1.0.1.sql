-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_sistema1.0
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_sistema1.0
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_sistema1.0` DEFAULT CHARACTER SET utf8mb4 ;
USE `db_sistema1.0` ;

-- -----------------------------------------------------
-- Table `db_sistema1.0`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema1.0`.`cliente` (
  `idcliente` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `cpf` INT(11) NOT NULL,
  `rg` INT(11) NULL DEFAULT NULL,
  `datanascimento` DATE NULL DEFAULT NULL,
  `endereco` VARCHAR(150) NULL DEFAULT NULL,
  `sexo` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `senha` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_sistema1.0`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema1.0`.`produto` (
  `idproduto` INT(15) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `categoria` VARCHAR(50) NULL DEFAULT NULL,
  `quantidade` INT(15) NULL DEFAULT NULL,
  `descricao` VARCHAR(300) NULL DEFAULT NULL,
  `datavalidade` DATE NULL DEFAULT NULL,
  `preco` VARCHAR(20) NOT NULL,
  `tipo` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`idproduto`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `db_sistema1.0`.`cliente_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema1.0`.`cliente_produto` (
  `cliente_idcliente` INT(11) NOT NULL,
  `produto_idproduto` INT(15) NOT NULL,
  PRIMARY KEY (`cliente_idcliente`, `produto_idproduto`),
  INDEX `fk_cliente_has_produto_produto1_idx` (`produto_idproduto` ASC),
  INDEX `fk_cliente_has_produto_cliente1_idx` (`cliente_idcliente` ASC),
  CONSTRAINT `fk_cliente_has_produto_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `db_sistema1.0`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_has_produto_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `db_sistema1.0`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_sistema1.0`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema1.0`.`perfil` (
  `idperfil` INT(11) NOT NULL AUTO_INCREMENT,
  `perfil` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idperfil`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `db_sistema1.0`.`Imagem_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema1.0`.`Imagem_perfil` (
  `idImagem_perfil` INT NOT NULL AUTO_INCREMENT,
  `arquivo_perfil` VARCHAR(45) NULL,
  `cliente_idcliente` INT(11) NOT NULL,
  PRIMARY KEY (`idImagem_perfil`),
  INDEX `fk_Imagem_perfil_cliente1_idx` (`cliente_idcliente` ASC),
  CONSTRAINT `fk_Imagem_perfil_cliente1`
    FOREIGN KEY (`cliente_idcliente`)
    REFERENCES `db_sistema1.0`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_sistema1.0`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema1.0`.`usuario` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `perfil_idperfil` INT(11) NOT NULL,
  `sexo` INT(2) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `Imagem_perfil_idImagem_perfil` INT NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_perfil_idx` (`perfil_idperfil` ASC),
  INDEX `fk_usuario_Imagem_perfil1_idx` (`Imagem_perfil_idImagem_perfil` ASC),
  CONSTRAINT `fk_usuario_perfil`
    FOREIGN KEY (`perfil_idperfil`)
    REFERENCES `db_sistema1.0`.`perfil` (`idperfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_Imagem_perfil1`
    FOREIGN KEY (`Imagem_perfil_idImagem_perfil`)
    REFERENCES `db_sistema1.0`.`Imagem_perfil` (`idImagem_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `db_sistema1.0`.`Imagem_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema1.0`.`Imagem_produtos` (
  `idImagem_produtos` INT NOT NULL,
  `Imagem_produto` VARCHAR(45) NULL,
  `produto_idproduto` INT(15) NOT NULL,
  PRIMARY KEY (`idImagem_produtos`),
  INDEX `fk_Imagem_produtos_produto1_idx` (`produto_idproduto` ASC),
  CONSTRAINT `fk_Imagem_produtos_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `db_sistema1.0`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
