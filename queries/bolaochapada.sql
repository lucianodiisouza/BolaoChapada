-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jul-2019 às 18:54
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bolaochapada`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `timeA` varchar(5) DEFAULT NULL,
  `nomeTimeA` varchar(200) DEFAULT NULL,
  `placarA` varchar(5) DEFAULT NULL,
  `timeB` varchar(5) DEFAULT NULL,
  `nomeTimeB` varchar(200) DEFAULT NULL,
  `placarB` varchar(5) DEFAULT NULL,
  `local` varchar(250) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `alterado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `timeA`, `nomeTimeA`, `placarA`, `timeB`, `nomeTimeB`, `placarB`, `local`, `data`, `hora`, `alterado`) VALUES
(1, 'CRU', 'Cruzeiro', NULL, 'CAM', 'Atlético Mineiro', NULL, 'Mineirão', '2019-07-09', '15:00:00', NULL),
(2, 'GRE', 'Grêmio', NULL, 'PON', 'Ponte Preta', NULL, 'Horto', '2019-07-11', '20:00:00', NULL),
(3, 'PAL', 'Palmeiras', NULL, 'PON', 'Ponte Preta', NULL, 'Pacaembu', '2019-12-25', '14:45:00', NULL),
(4, 'CRF', 'Flamengo', NULL, 'GRE', 'Grêmio', NULL, 'Ribeirão das Neves', '2019-12-31', '23:59:00', NULL),
(5, 'PON', 'Ponte Preta', NULL, 'CAM', 'Atlético Mineiro', NULL, 'Horto', '2019-07-18', '12:00:00', NULL),
(6, 'CRF', 'Flamengo', NULL, 'CRU', 'Cruzeiro', NULL, 'Mineirão', '2019-07-10', '22:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `id_de` varchar(200) DEFAULT NULL,
  `id_para` varchar(200) DEFAULT NULL,
  `assunto` text DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `id_de`, `id_para`, `assunto`, `mensagem`, `data`) VALUES
(1, 'admin', 'teste@mail.com', 'Início das Atividades', 'rwearwarwa', '2019-07-08 19:17:41'),
(2, 'admin', 'teste@mail.com', 'Enviando email para mim mesmo.', 'testestse', '2019-07-08 19:19:32'),
(3, 'admin', '1', 'Enviando email para mim mesmo.', 'testest', '2019-07-08 19:22:20'),
(4, 'admin', '1', 'Outro assunto aleatório', 'Mensagem aleatória para alguém!', '2019-07-08 20:07:48'),
(5, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(6, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(7, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(8, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(9, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(10, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(11, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(12, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(13, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(14, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(15, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(16, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(17, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(18, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24'),
(19, 'teste@mail.com', 'teste@mail.com', 'assunto aleatorio', 'mensagem aleatoria para testar o sistema', '2019-07-08 21:31:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `palpites`
--

CREATE TABLE `palpites` (
  `id` int(11) NOT NULL,
  `idRodada` varchar(255) DEFAULT NULL,
  `idUsuario` varchar(255) DEFAULT NULL,
  `jogoAMandante` varchar(255) DEFAULT NULL,
  `jogoAVisitante` varchar(255) DEFAULT NULL,
  `jogoBMandante` varchar(255) DEFAULT NULL,
  `jogoBVisitante` varchar(255) DEFAULT NULL,
  `jogoCMandante` varchar(255) DEFAULT NULL,
  `jogoCVisitante` varchar(255) DEFAULT NULL,
  `jogoDMandante` varchar(255) DEFAULT NULL,
  `jogoDVisitante` varchar(255) DEFAULT NULL,
  `jogoEMandante` varchar(255) DEFAULT NULL,
  `jogoEVisitante` varchar(255) DEFAULT NULL,
  `jogoFMandante` varchar(255) DEFAULT NULL,
  `jogoFVisitante` varchar(255) DEFAULT NULL,
  `jogoGMandante` varchar(255) DEFAULT NULL,
  `jogoGVisitante` varchar(255) DEFAULT NULL,
  `jogoHMandante` varchar(255) DEFAULT NULL,
  `jogoHVisitante` varchar(255) DEFAULT NULL,
  `jogoIMandante` varchar(255) DEFAULT NULL,
  `jogoIVisitante` varchar(255) DEFAULT NULL,
  `jogoJMandante` varchar(255) DEFAULT NULL,
  `jogoJVisitante` varchar(255) DEFAULT NULL,
  `dataPalpite` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rodada`
--

CREATE TABLE `rodada` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `dataInicio` datetime DEFAULT NULL,
  `dataTermino` datetime DEFAULT NULL,
  `jogoA` varchar(20) DEFAULT NULL,
  `jogoB` varchar(20) DEFAULT NULL,
  `jogoC` varchar(20) DEFAULT NULL,
  `jogoD` varchar(20) DEFAULT NULL,
  `jogoE` varchar(20) DEFAULT NULL,
  `jogoF` varchar(20) DEFAULT NULL,
  `jogoG` varchar(20) DEFAULT NULL,
  `jogoH` varchar(20) DEFAULT NULL,
  `jogoI` varchar(20) DEFAULT NULL,
  `jogoJ` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rodada`
--

INSERT INTO `rodada` (`id`, `nome`, `dataInicio`, `dataTermino`, `jogoA`, `jogoB`, `jogoC`, `jogoD`, `jogoE`, `jogoF`, `jogoG`, `jogoH`, `jogoI`, `jogoJ`) VALUES
(1, 'Rodada Final do Brasileirão', '2019-07-09 08:00:00', '2019-07-09 18:00:00', '4', '3', '5', '6', '6', '1', '6', '6', '6', '1'),
(2, 'Rodada da Semifinal', '2019-07-09 18:15:00', '2019-07-09 23:00:00', '3', '6', '1', '1', '1', '1', '1', '2', '6', '6'),
(4, 'Rodada Especial', '2019-07-09 21:00:00', '2019-07-10 23:00:00', '5', '3', '5', '2', '2', '6', '1', '5', '6', '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `sigla` varchar(250) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `serie` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `times`
--

INSERT INTO `times` (`id`, `nome`, `sigla`, `logo`, `serie`) VALUES
(1, 'Cruzeiro Esporte Clube', 'CRU', NULL, 'A'),
(2, 'Palmeiras', 'PAL', NULL, 'A'),
(3, 'Grêmio', 'GRE', NULL, 'A'),
(4, 'Flamengo', 'CRF', NULL, 'A'),
(5, 'Clube Atlético Mineiro', 'CAM', NULL, 'A'),
(6, 'Bahia', 'BAH', NULL, 'A'),
(7, 'Ponte Preta', 'PON', NULL, 'A'),
(8, 'Clube Atlético Paranaense', 'CAP', NULL, 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `usuario` varchar(200) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `meutime` varchar(30) DEFAULT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `celular` varchar(13) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `rua` varchar(200) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `banco` varchar(50) DEFAULT NULL,
  `agencia` varchar(15) DEFAULT NULL,
  `conta` varchar(200) DEFAULT NULL,
  `operacao` varchar(15) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `avatar`, `usuario`, `nome`, `email`, `senha`, `meutime`, `telefone`, `celular`, `sexo`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `banco`, `agencia`, `conta`, `operacao`, `cpf`) VALUES
(1, 'img/avatar_default.png', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'Masculino', '', '', '', '', '', '', '', '', '', ''),
(2, 'img/avatar_default.png', 'administrador', 'Administrador do Sistema', 'administrador@bolaochapada.com', '81f2746b1d608bef14a2d96362616d6f', '', '000000000000', '00000000000', 'Masculino', 'São José do Goiabal', '000', 'Sevilha', 'Ribeirão das Neves', 'Minas Gerais', 'Itau', '0000', '00000', '000000', '12345678912'),
(3, 'img/avatar_default.png', 'joaozinho', 'Joao Zinho', 'joao@zinho.com', 'e10adc3949ba59abbe56e057f20f883e', 'Santos', '3100000000', '31000000000', 'm', 'das Ruas', '123', 'Bairro dele', 'Cidade do Joao', 'SP', 'Caixa', '0000', '000000', '0', '00000000000'),
(4, 'img/avatar_default.png', 'lucianodiisouza', 'Luciano', 'luciano@mail.com', '81f2746b1d608bef14a2d96362616d6f', 'Cruzeiro', '31987654321', '31987654321', 'm', 'rua', '445', 'Sevilha', 'Ribeirão das Neves', 'minas gerais', 'Itau', '6572', '565668', '565668', '00000000000'),
(5, 'img/avatar_default.png', 'lucianodiisouza', 'Luciano Ferreira de Souza', 'ligadaslendasbronze@gmail.com', '81f2746b1d608bef14a2d96362616d6f', 'Cruzeiro', '31987806772', '31987806772', 'f', 'R. São José do Goiabal 445 Sevilha', '445', 'Sevilha', 'Ribeirão das Neves', 'minas gerais', 'Itau', '6572', '56566', '565668', '00000000000');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `palpites`
--
ALTER TABLE `palpites`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `rodada`
--
ALTER TABLE `rodada`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `palpites`
--
ALTER TABLE `palpites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rodada`
--
ALTER TABLE `rodada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `times`
--
ALTER TABLE `times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
