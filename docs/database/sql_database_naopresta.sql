-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela naopresta.estado
DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_nome` varchar(100) DEFAULT NULL,
  `estado_sigla` char(2) DEFAULT NULL,
  PRIMARY KEY (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela naopresta.estado: ~27 rows (aproximadamente)
DELETE FROM `estado`;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`estado_id`, `estado_nome`, `estado_sigla`) VALUES
	(1, 'Acre', 'AC'),
	(2, 'Alagoas', 'AL'),
	(3, 'Amapá ', 'AP'),
	(4, 'Amazonas ', 'AM'),
	(5, 'Bahia', 'BA'),
	(6, 'Ceará', 'CE'),
	(7, 'Distrito Federal', 'DF'),
	(8, 'Espírito Santo', 'ES'),
	(9, 'Goiás', 'GO'),
	(10, 'Maranhão', 'MA'),
	(11, 'Mato Grosso', 'MT'),
	(12, 'Mato Grosso do Sul', 'MS'),
	(13, 'Minas Gerais', 'MG'),
	(14, 'Pará', 'PA'),
	(15, 'Paraíba', 'PB'),
	(16, 'Paraná', 'PR'),
	(17, 'Pernambuco', 'PE'),
	(18, 'Piauí', 'PI'),
	(19, 'Rio de Janeiro', 'RJ'),
	(20, 'Rio Grande do Norte', 'RN'),
	(21, 'Rio Grande do Sul', 'RS'),
	(22, 'Rondônia', 'RO'),
	(23, 'Roraima', 'RR'),
	(24, 'Santa Catarina', 'SC'),
	(25, 'São Paulo', 'SP'),
	(26, 'Sergipe', 'SE'),
	(27, 'Tocantins', 'TO');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;


-- Copiando estrutura para tabela naopresta.fabricante
DROP TABLE IF EXISTS `fabricante`;
CREATE TABLE IF NOT EXISTS `fabricante` (
  `fabricante_id` int(11) NOT NULL AUTO_INCREMENT,
  `fabricante_nome` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`fabricante_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela naopresta.fabricante: ~0 rows (aproximadamente)
DELETE FROM `fabricante`;
/*!40000 ALTER TABLE `fabricante` DISABLE KEYS */;
/*!40000 ALTER TABLE `fabricante` ENABLE KEYS */;


-- Copiando estrutura para tabela naopresta.marca
DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `marca_id` int(11) NOT NULL AUTO_INCREMENT,
  `fabricante_id` int(11) NOT NULL,
  `marca_nome` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`marca_id`),
  KEY `fk_marca_fabricante1_idx` (`fabricante_id`),
  CONSTRAINT `fk_marca_fabricante1` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricante` (`fabricante_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela naopresta.marca: ~0 rows (aproximadamente)
DELETE FROM `marca`;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;


-- Copiando estrutura para tabela naopresta.produto
DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `produto_id` int(11) NOT NULL AUTO_INCREMENT,
  `marca_id` int(11) NOT NULL,
  `produto_nome` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`produto_id`),
  KEY `fk_produto_marca1_idx` (`marca_id`),
  CONSTRAINT `fk_produto_marca1` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`marca_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela naopresta.produto: ~0 rows (aproximadamente)
DELETE FROM `produto`;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


-- Copiando estrutura para tabela naopresta.reclamacao
DROP TABLE IF EXISTS `reclamacao`;
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

-- Copiando dados para a tabela naopresta.reclamacao: ~0 rows (aproximadamente)
DELETE FROM `reclamacao`;
/*!40000 ALTER TABLE `reclamacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `reclamacao` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
