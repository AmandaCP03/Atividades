-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 19-Jan-2021 às 22:18
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `revisao`
--
CREATE DATABASE IF NOT EXISTS `revisao` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `revisao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `nivel_permissao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nivel_permissao_fk` (`nivel_permissao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `nome`, `nivel_permissao`) VALUES
(1, 'Administrador', 3),
(2, 'Professor', 2),
(3, 'Aluno', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE IF NOT EXISTS `permissao` (
  `nivel` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`nivel`, `descricao`) VALUES
(1, 'Permissão básica'),
(2, 'Permissão média'),
(3, 'Permissão alta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cpf` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`cpf`),
  KEY `id_perfil_fk` (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cpf`, `email`, `senha`, `id_perfil`) VALUES
('32397985810', 'deniszaniro@ifsp.edu.br', '5e543256c480ac577d30f76f9120eb74', 2),
('51339432889', 'pauloholanda@aluno.ifsp.edu.br', '5e543256c480ac577d30f76f9120eb74', 3),
('78635220803', 'maria@ifsp.edu.br', '5e543256c480ac577d30f76f9120eb74', 1),
('83384464168', 'matheus@aluno.ifsp.edu.br', '5e543256c480ac577d30f76f9120eb74', 3);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `nivel_permissao_fk` FOREIGN KEY (`nivel_permissao`) REFERENCES `permissao` (`nivel`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_perfil_fk` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
