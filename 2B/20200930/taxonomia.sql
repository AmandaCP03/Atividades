-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Set-2020 às 21:14
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `taxonomia`
--
CREATE DATABASE IF NOT EXISTS `taxonomia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `taxonomia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `especie`
--

CREATE TABLE IF NOT EXISTS `especie` (
  `id_especie` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nome_cientifico` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cod_genero` int(11) NOT NULL,
  PRIMARY KEY (`id_especie`),
  KEY `cod_genero` (`cod_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `especie`
--

INSERT INTO `especie` (`id_especie`, `nome`, `nome_cientifico`, `cod_genero`) VALUES
(1, 'Cachorro', 'Canis lupus familiaris', 1),
(2, 'Leão', 'Panthera leo', 3),
(3, 'Tigre', 'Panthera tigris', 3),
(4, 'Lobo', 'Canis lupus lupus', 1),
(5, 'Cachorro do Mato', 'Cerdocyon thous', 2),
(6, 'Leopardo', 'Panthera pardus', 3),
(7, 'Onça Pintada', 'Panthera onca', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `familia`
--

CREATE TABLE IF NOT EXISTS `familia` (
  `id_familia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `nome_cientifico` varchar(100) NOT NULL,
  PRIMARY KEY (`id_familia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `familia`
--

INSERT INTO `familia` (`id_familia`, `nome`, `nome_cientifico`) VALUES
(1, 'Canídeos', 'canidae\r\n'),
(2, 'Felinos', 'felidae');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cientifico` varchar(100) NOT NULL,
  `cod_familia` int(11) NOT NULL,
  PRIMARY KEY (`id_genero`),
  KEY `cod_familia` (`cod_familia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id_genero`, `nome_cientifico`, `cod_familia`) VALUES
(1, 'Canis', 1),
(2, 'Cerdocyon', 1),
(3, 'Panthera', 2);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `especie`
--
ALTER TABLE `especie`
  ADD CONSTRAINT `especie_ibfk_1` FOREIGN KEY (`cod_genero`) REFERENCES `genero` (`id_genero`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `genero`
--
ALTER TABLE `genero`
  ADD CONSTRAINT `genero_ibfk_1` FOREIGN KEY (`cod_familia`) REFERENCES `familia` (`id_familia`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
