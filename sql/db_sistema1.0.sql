/*Para criar o banco de dados*/
CREATE Database `db_sistema1.0`;/*nome do seu banco ex:db_sistema1.0*/
USE `db_sistema1.0`;

--
-- Banco de Dados: `db_sistema1.0`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `idaluno` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `turma` varchar(20) NOT NULL,
  `turno` varchar(20) NOT NULL,
  PRIMARY KEY (`idaluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` int(11) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `idfuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(11) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `dataadmissao` date DEFAULT NULL,
  PRIMARY KEY (`idfuncionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(45) NOT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idperfil`, `perfil`) VALUES
(1, 'Administrador'),
(2, 'Usuário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `perfil_idperfil` int(11) NOT NULL,
  `sexo` int(2) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_perfil_idx` (`perfil_idperfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `senha`, `perfil_idperfil`) VALUES
(1, 'daniel', '202cb962ac59075b964b07152d234b70', 1),
(2, 'vanessa', '202cb962ac59075b964b07152d234b70', 2);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`perfil_idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Estrutura tabela Produto 
--

CREATE TABLE IF NOT EXISTS `produto` (
  `idproduto` int(14) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `quantidade` varchar(45) NOT NULL,
  `descrição` varchar(300) NOT NULL,
  `datavalidade` date NULL DEFAULT NULL,
  `preco` DECIMAL(10,2) NOT NULL;,
  `tipo` varchar(20)  not NULL,
  PRIMARY KEY (`idproduto`),

  
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
DEFAULT CHARACTER SET = utf8

--Tabela Carrinho 

- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_sistema1.0
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_sistema1.0
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_sistema1.0` DEFAULT CHARACTER SET utf8mb4 ;
USE `db_sistema1.0` ;

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
  `preco` DOUBLE NOT NULL,
  `tipo` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`idproduto`))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `db_sistema1.0`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema1.0`.`perfil` (
  `idperfil` INT(11) NOT NULL AUTO_INCREMENT,
  `perfil` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idperfil`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


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
  `arquivo` BLOB NULL DEFAULT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `cpf` INT(15) NULL DEFAULT NULL,
  `rg` INT(15) NULL DEFAULT NULL,
  `datanascimento` DATE NULL DEFAULT NULL,
  `endereco` VARCHAR(200) NULL DEFAULT NULL,
  `nome` VARCHAR(50) NULL DEFAULT NULL,
  `perfil_idperfil1` INT(11) NOT NULL,
  `datacadastro` DATETIME NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idusuario`),
  INDEX `perfil_idperfil` (`perfil_idperfil` ASC),
  INDEX `fk_usuario_perfil1_idx` (`perfil_idperfil1` ASC),
  CONSTRAINT `fk_usuario_perfil1`
    FOREIGN KEY (`perfil_idperfil1`)
    REFERENCES `db_sistema1.0`.`perfil` (`idperfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 36
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `db_sistema1.0`.`carrinho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema1.0`.`carrinho` (
  `idpedido` INT NOT NULL AUTO_INCREMENT,
  `quantidade` INT(11) NULL DEFAULT NULL,
  `total` DOUBLE NULL DEFAULT NULL,
  `usuario_idusuario` INT(11) NOT NULL,
  `produto_idproduto` INT(15) NOT NULL,
  `datapedido` DATETIME NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idpedido`),
  INDEX `fk_carrinho_usuario1_idx` (`usuario_idusuario` ASC),
  INDEX `fk_carrinho_produto1_idx` (`produto_idproduto` ASC),
  CONSTRAINT `fk_carrinho_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `db_sistema1.0`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carrinho_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `db_sistema1.0`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_sistema1.0`.`imagem_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_sistema1.0`.`imagem_produtos` (
  `idImagem_produtos` INT(11) NOT NULL,
  `Imagem_produto` VARCHAR(45) NULL DEFAULT NULL,
  `produto_idproduto` INT(15) NOT NULL,
  PRIMARY KEY (`idImagem_produtos`),
  INDEX `fk_Imagem_produtos_produto1_idx` (`produto_idproduto` ASC),
  CONSTRAINT `fk_Imagem_produtos_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `db_sistema1.0`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
