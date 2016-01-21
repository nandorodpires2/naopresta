-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.3.0.4992
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para naopresta
CREATE DATABASE IF NOT EXISTS `naopresta` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `naopresta`;


-- Copiando estrutura para tabela naopresta.fabricante
CREATE TABLE IF NOT EXISTS `fabricante` (
  `fabricante_id` int(11) NOT NULL AUTO_INCREMENT,
  `fabricante_nome` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`fabricante_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela naopresta.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `marca_id` int(11) NOT NULL AUTO_INCREMENT,
  `fabricante_id` int(11) NOT NULL,
  `marca_nome` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`marca_id`),
  KEY `fk_marca_fabricante1_idx` (`fabricante_id`),
  CONSTRAINT `fk_marca_fabricante1` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricante` (`fabricante_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela naopresta.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `produto_id` int(11) NOT NULL AUTO_INCREMENT,
  `marca_marca_id` int(11) NOT NULL,
  `produto_nome` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`produto_id`),
  KEY `fk_produto_marca1_idx` (`marca_marca_id`),
  CONSTRAINT `fk_produto_marca1` FOREIGN KEY (`marca_marca_id`) REFERENCES `marca` (`marca_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.


-- Copiando estrutura para tabela naopresta.reclamacao
CREATE TABLE IF NOT EXISTS `reclamacao` (
  `reclamacao_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL,
  `reclamacao_descricao` varchar(500) DEFAULT NULL,
  `reclamacao_email` varchar(500) DEFAULT NULL,
  `reclamacao_cidade` varchar(500) DEFAULT NULL,
  `reclamacao_estado` varchar(500) DEFAULT NULL,
  `reclamacao_nota` int(11) DEFAULT NULL,
  `reclamacao_resposta` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`reclamacao_id`),
  KEY `fk_reclamacao_produto_idx` (`produto_id`),
  CONSTRAINT `fk_reclamacao_produto` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`produto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
