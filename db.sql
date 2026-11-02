/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ huntingdb /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE huntingdb;

DROP TABLE IF EXISTS categorias;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `categoria` varchar(255) DEFAULT NULL COMMENT 'Categoria',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de categorias';

DROP TABLE IF EXISTS artigos;
CREATE TABLE `artigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `nome` varchar(255) DEFAULT NULL COMMENT 'Nome do artigo',
  `preco` decimal(10,2) DEFAULT NULL COMMENT 'Preco em euros',
  `avaliacao` varchar(255) DEFAULT NULL COMMENT 'Avaliacao',
  `ano` varchar(255) DEFAULT NULL COMMENT 'Ano do modelo',
  `imagem` varchar(4000) DEFAULT NULL COMMENT 'Imagem do artigo',
  `categoria_id` int(11) DEFAULT NULL COMMENT 'FK para categorias',
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`),
  CONSTRAINT `artigos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de artigos de caca';

DROP TABLE IF EXISTS utilizador;
CREATE TABLE `utilizador` (
  `id_utilizador` varchar(255) NOT NULL COMMENT 'primary key',
  `palavra_passe` varchar(400) DEFAULT NULL COMMENT 'Password',
  `nome` varchar(400) DEFAULT NULL COMMENT 'Name',
  `fotografia` varchar(4000) DEFAULT NULL COMMENT 'Photo',
  `ativo` bit(1) DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_utilizador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User table';
