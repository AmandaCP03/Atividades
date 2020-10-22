-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 22-Out-2020 às 17:05
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `musicaplayer`
--
CREATE DATABASE IF NOT EXISTS `musicaplayer` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `musicaplayer`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banda`
--

CREATE TABLE IF NOT EXISTS `banda` (
  `id_banda` int(11) NOT NULL AUTO_INCREMENT,
  `nome_banda` varchar(100) NOT NULL,
  `cod_genero` int(11) NOT NULL,
  PRIMARY KEY (`id_banda`),
  KEY `cod_genero` (`cod_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `banda`
--

INSERT INTO `banda` (`id_banda`, `nome_banda`, `cod_genero`) VALUES
(1, 'Ramones', 1),
(2, 'BTS', 2),
(3, 'ChitÃ£ozinho e XororÃ³', 5),
(4, 'Paralamas do Sucesso', 1),
(5, 'Pitty', 1),
(6, 'DemÃ´nios da Garoa', 3),
(7, 'Bruno e Marrone', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `Id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `nome_genero` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`Id_genero`, `nome_genero`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Samba'),
(4, 'Pop'),
(5, 'Sertanejo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica`
--

CREATE TABLE IF NOT EXISTS `musica` (
  `id_musica` int(11) NOT NULL AUTO_INCREMENT,
  `nome_musica` varchar(100) NOT NULL,
  `cod_musica` varchar(50) NOT NULL,
  `cod_genero` int(11) NOT NULL,
  `cod_banda` int(11) NOT NULL,
  PRIMARY KEY (`id_musica`),
  KEY `cod_genero` (`cod_genero`),
  KEY `cod_banda` (`cod_banda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `musica`
--

INSERT INTO `musica` (`id_musica`, `nome_musica`, `cod_musica`, `cod_genero`, `cod_banda`) VALUES
(1, 'Dynamite', 'gdZLi9oWNZg', 2, 2),
(2, 'Busca Vida', 'NOnNeOlRhAY', 1, 4),
(3, 'EvidÃªncias', 'ePjtnSPFWK8', 5, 3),
(4, 'Meu Erro', 'YZibNACT9b8', 1, 4),
(5, 'Teto de Vidro', 'hWhl6ijsAXw', 1, 5),
(6, 'Trem das Onze', 'XoUtxWU8lW8', 3, 6),
(7, 'Dormi na praÃ§a', ' uWX0O8ATY3k', 5, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica_playlist`
--

CREATE TABLE IF NOT EXISTS `musica_playlist` (
  `id_musica_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `cod_musica` int(11) NOT NULL,
  `cod_playlist` int(11) NOT NULL,
  PRIMARY KEY (`id_musica_playlist`),
  KEY `cod_musica` (`cod_musica`),
  KEY `cod_playlist` (`cod_playlist`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `musica_playlist`
--

INSERT INTO `musica_playlist` (`id_musica_playlist`, `cod_musica`, `cod_playlist`) VALUES
(6, 2, 13),
(7, 4, 13),
(8, 5, 13),
(9, 2, 14),
(10, 1, 14),
(11, 3, 14),
(13, 6, 14),
(17, 6, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `nome_playlist` varchar(100) NOT NULL,
  PRIMARY KEY (`id_playlist`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `nome_playlist`) VALUES
(13, 'Rock nacional 2'),
(14, 'AleatÃ³ria'),
(16, 'Samba');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `banda`
--
ALTER TABLE `banda`
  ADD CONSTRAINT `banda_ibfk_1` FOREIGN KEY (`cod_genero`) REFERENCES `genero` (`Id_genero`);

--
-- Limitadores para a tabela `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `musica_ibfk_1` FOREIGN KEY (`cod_genero`) REFERENCES `genero` (`Id_genero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `musica_ibfk_2` FOREIGN KEY (`cod_banda`) REFERENCES `banda` (`id_banda`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `musica_playlist`
--
ALTER TABLE `musica_playlist`
  ADD CONSTRAINT `musica_playlist_ibfk_1` FOREIGN KEY (`cod_musica`) REFERENCES `musica` (`id_musica`) ON UPDATE CASCADE,
  ADD CONSTRAINT `musica_playlist_ibfk_2` FOREIGN KEY (`cod_playlist`) REFERENCES `playlist` (`id_playlist`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
