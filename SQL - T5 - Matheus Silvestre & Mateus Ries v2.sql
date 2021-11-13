-- MySQL Script generated by MySQL Workbench
-- Sat Nov 13 02:38:50 2021
-- Model: Trabalho Condomínio - Banco de dados - CC - UNIVALI    Version: 1.2
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema trabalho5_ries_silvestre
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema trabalho5_ries_silvestre
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `trabalho5_ries_silvestre` DEFAULT CHARACTER SET utf8 ;
USE `trabalho5_ries_silvestre` ;

-- -----------------------------------------------------
-- Table `trabalho5_ries_silvestre`.`Cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho5_ries_silvestre`.`Cidade` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Código da cidade\n',
  `nome` VARCHAR(50) NOT NULL COMMENT 'Nome da cidade\n',
  `uf` VARCHAR(2) NOT NULL COMMENT 'UF da cidade\n',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho5_ries_silvestre`.`Endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho5_ries_silvestre`.`Endereco` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Codigo do endereço\n',
  `logradouro` VARCHAR(150) NULL COMMENT 'Rua do endereço\n',
  `numero` SMALLINT NULL COMMENT 'Numero do endereço\n',
  `bairro` VARCHAR(50) NULL COMMENT 'Bairro do endereço\n',
  `Cidade_id` INT NOT NULL COMMENT 'Código da cidade do endereço\n',
  PRIMARY KEY (`id`),
  INDEX `fk_Endereco_Cidade1_idx` (`Cidade_id` ASC) VISIBLE,
  CONSTRAINT `fk_Endereco_Cidade1`
    FOREIGN KEY (`Cidade_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Cidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho5_ries_silvestre`.`Condominio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho5_ries_silvestre`.`Condominio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL COMMENT 'Nome do condomínio',
  `cnpj` VARCHAR(18) NOT NULL COMMENT 'CNPJ do condomínio',
  `Endereco_id` INT NOT NULL COMMENT 'Código do endereço do condomínio\n',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC) VISIBLE,
  INDEX `fk_Condominio_Endereco1_idx` (`Endereco_id` ASC) VISIBLE,
  CONSTRAINT `fk_Condominio_Endereco1`
    FOREIGN KEY (`Endereco_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Endereco` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho5_ries_silvestre`.`Condomino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho5_ries_silvestre`.`Condomino` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `funcao` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Função do condômino	0 - Morador, 1 - Síndico, 2 - Subsíndico',
  `nome` VARCHAR(100) NULL COMMENT 'Nome do condômino',
  `cpf` VARCHAR(11) NOT NULL COMMENT 'CPF do condômino',
  `email` VARCHAR(50) NULL COMMENT 'Email do condômino',
  `senha` VARCHAR(32) NOT NULL COMMENT 'Senha do condômino	Salva em hash md5',
  `fixo` VARCHAR(14) NULL COMMENT 'Telefone Fixo do condômino	Formato: (XX) XXXX-XXXX',
  `celular` VARCHAR(15) NULL COMMENT 'Telefone Celular do condômino	Formato: (XX) XXXXX-XXXX',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho5_ries_silvestre`.`Condominio_has_Condomino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho5_ries_silvestre`.`Condominio_has_Condomino` (
  `Condominio_id` INT NOT NULL COMMENT 'Código do condomínio',
  `Condomino_id` INT NOT NULL COMMENT 'Código do condômino',
  `numBloco` TINYINT(1) NOT NULL COMMENT 'Numero do Bloco do condômino',
  `numApartamento` SMALLINT(4) NOT NULL COMMENT 'Numero do AP do condômino',
  PRIMARY KEY (`Condominio_id`, `Condomino_id`),
  INDEX `fk_Condominio_has_Condomino_Condomino1_idx` (`Condomino_id` ASC) VISIBLE,
  INDEX `fk_Condominio_has_Condomino_Condominio_idx` (`Condominio_id` ASC) VISIBLE,
  CONSTRAINT `fk_Condominio_has_Condomino_Condominio`
    FOREIGN KEY (`Condominio_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Condominio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Condominio_has_Condomino_Condomino1`
    FOREIGN KEY (`Condomino_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Condomino` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho5_ries_silvestre`.`Funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho5_ries_silvestre`.`Funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Código do Funcionário',
  `Condominio_id` INT NOT NULL COMMENT 'Codigo do condominio do funcionário',
  `nome` VARCHAR(100) NOT NULL COMMENT 'Nome do funcionário',
  `cpf` VARCHAR(11) NOT NULL,
  `turno` TINYINT(1) NOT NULL COMMENT 'Turno de trabalho do funcionário	0 - Matutino, 1 - Noturno',
  `funcao` TINYINT(1) NOT NULL COMMENT 'Função do funcionário	0 - Porteiro, 1 - Zelador',
  `salario` SMALLINT NULL COMMENT 'Salário do funcionário',
  `Endereco_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Funcionario_Condominio1_idx` (`Condominio_id` ASC) VISIBLE,
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) VISIBLE,
  INDEX `fk_Funcionario_Endereco1_idx` (`Endereco_id` ASC) VISIBLE,
  CONSTRAINT `fk_Funcionario_Condominio1`
    FOREIGN KEY (`Condominio_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Condominio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Funcionario_Endereco1`
    FOREIGN KEY (`Endereco_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Endereco` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho5_ries_silvestre`.`SalaoDeFesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho5_ries_silvestre`.`SalaoDeFesta` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Código do Salão de Festa',
  `Condominio_id` INT NOT NULL COMMENT 'Codigo do condominio do salão de festa',
  `capacidade` TINYINT NULL COMMENT 'Lotação máxima de pessoas do salão de festa',
  `numSala` TINYINT NULL COMMENT 'Número da sala do salão de festa',
  PRIMARY KEY (`id`),
  INDEX `fk_SalaoDeFesta_Condominio1_idx` (`Condominio_id` ASC) VISIBLE,
  CONSTRAINT `fk_SalaoDeFesta_Condominio1`
    FOREIGN KEY (`Condominio_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Condominio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho5_ries_silvestre`.`Reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho5_ries_silvestre`.`Reserva` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Código da Reserva',
  `Condomino_id` INT NOT NULL COMMENT 'Codigo do condomino da reserva',
  `Condominio_id` INT NOT NULL COMMENT 'Codigo do condominio da reserva',
  `SalaoDeFesta_id` INT NOT NULL COMMENT 'Código do salão de festa da reserva',
  `data` DATE NULL COMMENT 'Data da reserva',
  `horario` TIME NULL COMMENT 'Horario da reserva',
  PRIMARY KEY (`id`),
  INDEX `fk_Reserva_Condomino1_idx` (`Condomino_id` ASC) VISIBLE,
  INDEX `fk_Reserva_Condominio1_idx` (`Condominio_id` ASC) VISIBLE,
  INDEX `fk_Reserva_SalaoDeFesta1_idx` (`SalaoDeFesta_id` ASC) VISIBLE,
  CONSTRAINT `fk_Reserva_Condomino1`
    FOREIGN KEY (`Condomino_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Condomino` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_Condominio1`
    FOREIGN KEY (`Condominio_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Condominio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_SalaoDeFesta1`
    FOREIGN KEY (`SalaoDeFesta_id`)
    REFERENCES `trabalho5_ries_silvestre`.`SalaoDeFesta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho5_ries_silvestre`.`Ocorrencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho5_ries_silvestre`.`Ocorrencia` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Código da Ocorrencia',
  `Condomino_id` INT NOT NULL COMMENT 'Codigo do condomino da ocorrencia',
  `Condominio_id` INT NOT NULL COMMENT 'Codigo do condominio da ocorrencia',
  `categoria` TINYINT NOT NULL COMMENT 'Categoria da ocorrencia	0 - Pertubação de sossego, 1 - Dano material, 2 - Problema com condomínio, 3 - Outros',
  `descricao` TINYTEXT NULL COMMENT 'Descrição completa da ocorrência',
  PRIMARY KEY (`id`),
  INDEX `fk_Ocorrencia_Condomino1_idx` (`Condomino_id` ASC) VISIBLE,
  INDEX `fk_Ocorrencia_Condominio1_idx` (`Condominio_id` ASC) VISIBLE,
  CONSTRAINT `fk_Ocorrencia_Condomino1`
    FOREIGN KEY (`Condomino_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Condomino` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ocorrencia_Condominio1`
    FOREIGN KEY (`Condominio_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Condominio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trabalho5_ries_silvestre`.`AchadosPerdidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalho5_ries_silvestre`.`AchadosPerdidos` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Código do Achados e Perdidos',
  `Condominio_id` INT NOT NULL COMMENT 'Código do funcionário que encontrou o objeto',
  `Funcionario_id` INT NOT NULL COMMENT 'Código do condomínio que foi encontrado o objeto',
  `descricao` TINYTEXT NULL COMMENT 'Descrição do objeto encontrado',
  PRIMARY KEY (`id`),
  INDEX `fk_AchadosPerdidos_Condominio1_idx` (`Condominio_id` ASC) VISIBLE,
  INDEX `fk_AchadosPerdidos_Funcionario1_idx` (`Funcionario_id` ASC) VISIBLE,
  CONSTRAINT `fk_AchadosPerdidos_Condominio1`
    FOREIGN KEY (`Condominio_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Condominio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AchadosPerdidos_Funcionario1`
    FOREIGN KEY (`Funcionario_id`)
    REFERENCES `trabalho5_ries_silvestre`.`Funcionario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
