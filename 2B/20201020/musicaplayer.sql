-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Out-2020 às 13:28
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `musicasplayer'
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banda`
--

CREATE TABLE `banda` (
  `id_banda` int(11) NOT NULL,
  `nome_banda` varchar(100) NOT NULL,
  `cod_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `banda`
--

INSERT INTO `banda` (`id_banda`, `nome_banda`, `cod_genero`) VALUES
(8, 'Jorge e Matheus', 6),
(9, 'Henrique e Juliano', 6),
(10, 'Marilia Mendonça', 6),
(11, 'Exaltasamba', 8),
(12, 'Pereicles', 8),
(13, 'Gigantes do Samba', 8),
(14, 'Queen ', 9),
(15, 'Nirvana', 9),
(16, 'Detonautas', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `Id_genero` int(11) NOT NULL,
  `nome_genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`Id_genero`, `nome_genero`) VALUES
(6, 'Sertanejo'),
(8, 'Samba'),
(9, 'Rock'),
(11, 'Pop'),
(13, 'Eletronica'),
(14, 'Gospel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica`
--

CREATE TABLE `musica` (
  `id_musica` int(11) NOT NULL,
  `nome_musica` varchar(100) NOT NULL,
  `cod_musica` varchar(50) NOT NULL,
  `cod_genero` int(11) NOT NULL,
  `cod_banda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `musica`
--

INSERT INTO `musica` (`id_musica`, `nome_musica`, `cod_musica`, `cod_genero`, `cod_banda`) VALUES
(8, 'Duas Metades', 'HR4ZxjGQGYY', 6, 8),
(10, 'Ame o tanto que puder', 'S2Od4g9uqMg', 6, 9),
(11, 'Graveto', 'CKtHg1jBREY', 6, 10),
(12, 'Teu segredo', 'Bcatg28KpdM', 8, 11),
(13, 'Se eu largar o freio', 'lTeb3xT0pG4', 8, 12),
(14, 'É tarde demais', 'fOGVqrMJiTw', 8, 13),
(15, 'We Will Rock You', '-tJYN-eG1zk', 9, 14),
(16, 'The Man Who Sold The World', 'iz3tmYDl6XI', 9, 15),
(17, 'Olhos certos', 'm2TIIJvW-xk', 9, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica_playlist`
--

CREATE TABLE `musica_playlist` (
  `id_musica_playlist` int(11) NOT NULL,
  `cod_musica` int(11) NOT NULL,
  `cod_playlist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `musica_playlist`
--

INSERT INTO `musica_playlist` (`id_musica_playlist`, `cod_musica`, `cod_playlist`) VALUES
(24, 10, 19),
(25, 8, 19),
(26, 11, 19),
(27, 14, 20),
(28, 13, 20),
(29, 12, 20),
(30, 17, 21),
(31, 16, 21),
(32, 15, 21),
(33, 10, 22),
(34, 11, 22),
(35, 13, 22),
(36, 12, 22),
(37, 16, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `playlist`
--

CREATE TABLE `playlist` (
  `id_playlist` int(11) NOT NULL,
  `nome_playlist` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `nome_playlist`) VALUES
(19, 'Sertanejo'),
(20, 'Samba'),
(21, 'Rock'),
(22, 'Aleatoria');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `banda`
--
ALTER TABLE `banda`
  ADD PRIMARY KEY (`id_banda`),
  ADD KEY `cod_genero` (`cod_genero`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`Id_genero`);

--
-- Índices para tabela `musica`
--
ALTER TABLE `musica`
  ADD PRIMARY KEY (`id_musica`),
  ADD KEY `cod_genero` (`cod_genero`),
  ADD KEY `cod_banda` (`cod_banda`);

--
-- Índices para tabela `musica_playlist`
--
ALTER TABLE `musica_playlist`
  ADD PRIMARY KEY (`id_musica_playlist`),
  ADD KEY `cod_musica` (`cod_musica`),
  ADD KEY `cod_playlist` (`cod_playlist`);

--
-- Índices para tabela `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id_playlist`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banda`
--
ALTER TABLE `banda`
  MODIFY `id_banda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `Id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `musica`
--
ALTER TABLE `musica`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `musica_playlist`
--
ALTER TABLE `musica_playlist`
  MODIFY `id_musica_playlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id_playlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para despejos de tabelas
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
