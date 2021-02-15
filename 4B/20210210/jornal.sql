-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Fev-2021 às 17:12
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8
USE jornal;



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jornal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id_adm` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id_adm`, `nome`, `email`, `senha`, `permissao`) VALUES
(1, 'Paula dos Santos', 'paula@email.com', '123', 1),
(2, 'Roberto Alves', 'roberto@email.com', '123', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `assinantes`
--

CREATE TABLE `assinantes` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_inscricao` date NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `assinantes`
--

INSERT INTO `assinantes` (`cpf`, `nome`, `email`, `data_inscricao`, `senha`) VALUES
('090.998.608-89', 'Aparecida Melo', 'aparecida@email.com', '2021-02-14', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('385.402.320-06', 'Amanda Campezam', 'amanda@email.com', '2021-02-13', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE `permissao` (
  `nivel` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`nivel`, `descricao`) VALUES
(1, 'Alta'),
(2, 'baixa');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_adm`),
  ADD KEY `permissao` (`permissao`);

--
-- Índices para tabela `assinantes`
--
ALTER TABLE `assinantes`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`nivel`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `permissao` FOREIGN KEY (`permissao`) REFERENCES `permissao` (`nivel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
