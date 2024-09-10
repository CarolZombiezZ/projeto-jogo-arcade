-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Set-2024 às 19:01
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdprojetofs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbjogador`
--

CREATE TABLE `tbjogador` (
  `JgID` int(11) NOT NULL,
  `Players` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbjogador`
--

INSERT INTO `tbjogador` (`JgID`, `Players`) VALUES
(1, ''),
(2, ''),
(36, 'pdr'),
(37, 'zbz'),
(38, 'pdr'),
(39, 'zbz'),
(40, 'pdr'),
(41, 'zbz'),
(42, 'pdr'),
(43, 'zbz'),
(44, 'pdr'),
(45, 'zbz'),
(46, 'pdr'),
(47, 'zbz'),
(48, 'pdr'),
(49, 'zbz'),
(50, 'pdr'),
(51, 'zbz'),
(52, 'pdr'),
(53, 'zbz'),
(54, 'pdr'),
(55, 'zbz'),
(56, 'fsd'),
(57, 'hfj'),
(58, 'fsd'),
(59, 'hfj'),
(60, 'fsd'),
(61, 'hfj'),
(62, 'fsd'),
(63, 'hfj'),
(64, 'fsd'),
(65, 'hfj'),
(66, 'fsd'),
(67, 'hfj'),
(68, 'fsd'),
(69, 'hfj'),
(70, 'aaa'),
(71, 'sss'),
(72, 'aaa'),
(73, 'sss'),
(74, 'aaa'),
(75, 'sss'),
(76, 'aaa'),
(77, 'sss'),
(78, 'aaa'),
(79, 'sss'),
(80, 'aaa'),
(81, 'sss'),
(82, 'aaa'),
(83, 'sss'),
(84, 'ola'),
(85, 'ioi'),
(86, 'ola'),
(87, 'ioi'),
(88, 'ryt'),
(89, 'rtn'),
(90, 'ryt'),
(91, 'rtn'),
(92, 'kjk'),
(93, 'fj,'),
(94, 'kjk'),
(95, 'fj,'),
(96, 'fdv'),
(97, 'gbf'),
(98, 'fdv'),
(99, 'gbf'),
(100, 'fdv'),
(101, 'gbf'),
(102, 'fdv'),
(103, 'gbf'),
(104, 'fdv'),
(105, 'gbf'),
(106, 'vds'),
(107, 'sdf'),
(108, 'vds'),
(109, 'sdf'),
(110, 'vds'),
(111, 'sdf'),
(112, 'edw'),
(113, 'vss'),
(114, 'edw'),
(115, 'vss'),
(116, 'edw'),
(117, 'vss'),
(118, 'edw'),
(119, 'vss'),
(120, 'edw'),
(121, 'vss'),
(122, 'vet'),
(123, 'pcc'),
(124, 'vet'),
(125, 'pcc'),
(126, 'vet'),
(127, 'pcc'),
(128, 'vet'),
(129, 'pcc'),
(130, 'vet'),
(131, 'pcc'),
(132, 'vet'),
(133, 'pcc'),
(134, 'vet'),
(135, 'pcc'),
(136, 'ljh'),
(137, 'hgk'),
(138, 'ljh'),
(139, 'hgk'),
(140, 'ljh'),
(141, 'hgk'),
(142, 'ljh'),
(143, 'hgk'),
(144, 'ljh'),
(145, 'hgk'),
(146, 'ljh'),
(147, 'hgk'),
(148, 'ljh'),
(149, 'hgk'),
(150, 'ljh'),
(151, 'hgk'),
(152, 'fgd'),
(153, 'ads'),
(154, 'heh'),
(155, 'hfh'),
(156, 'heh'),
(157, 'hfh'),
(158, 'gar'),
(159, 'gff'),
(160, 'gar'),
(161, 'gff'),
(162, 'gar'),
(163, 'gff'),
(164, 'fbz'),
(165, 'ggh'),
(166, 'fbz'),
(167, 'ggh'),
(168, 'gfh'),
(169, 'jrj'),
(170, 'gfh'),
(171, 'jrj'),
(172, 'gfh'),
(173, 'jrj'),
(174, 'gfh'),
(175, 'jrj'),
(176, 'fwa'),
(177, 'dry'),
(178, 'fwa'),
(179, 'dry'),
(180, 'dbg'),
(181, 'hdt'),
(182, 'dbg'),
(183, 'hdt'),
(184, 'dbg'),
(185, 'hdt'),
(186, 'dbg'),
(187, 'hdt'),
(188, 'pdr'),
(189, 'zbz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpartidas`
--

CREATE TABLE `tbpartidas` (
  `PtID` int(11) NOT NULL,
  `PtJg1ID` int(11) NOT NULL,
  `PtJg2ID` int(11) NOT NULL,
  `VitoriaJg1` int(11) NOT NULL,
  `VitoriaJg2` int(11) NOT NULL,
  `DerrotaJg1` int(11) NOT NULL,
  `DerrotaJg2` int(11) NOT NULL,
  `EmpateJg1` int(11) NOT NULL,
  `EmpateJg2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpersonagens`
--

CREATE TABLE `tbpersonagens` (
  `PsID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbpersonagens`
--

INSERT INTO `tbpersonagens` (`PsID`, `Nome`) VALUES
(1, 'Guts'),
(2, 'Cavaleira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpontuacao`
--

CREATE TABLE `tbpontuacao` (
  `PoID` int(11) NOT NULL,
  `PoPsID` int(11) NOT NULL,
  `Vitorias` int(11) NOT NULL,
  `Derrotas` int(11) NOT NULL,
  `Empate` int(11) NOT NULL,
  `PoJgID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbpontuacao`
--

INSERT INTO `tbpontuacao` (`PoID`, `PoPsID`, `Vitorias`, `Derrotas`, `Empate`, `PoJgID`) VALUES
(1, 1, 18228, 8, 6, 1),
(2, 2, 52455, 8, 6, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbjogador`
--
ALTER TABLE `tbjogador`
  ADD PRIMARY KEY (`JgID`);

--
-- Índices para tabela `tbpartidas`
--
ALTER TABLE `tbpartidas`
  ADD PRIMARY KEY (`PtID`),
  ADD KEY `FK_JG1_PT` (`PtJg1ID`),
  ADD KEY `FK_JG2_PT` (`PtJg2ID`);

--
-- Índices para tabela `tbpersonagens`
--
ALTER TABLE `tbpersonagens`
  ADD PRIMARY KEY (`PsID`);

--
-- Índices para tabela `tbpontuacao`
--
ALTER TABLE `tbpontuacao`
  ADD PRIMARY KEY (`PoID`),
  ADD KEY `FOREIGNKEY` (`PoPsID`),
  ADD KEY `FK_JG_PO` (`PoJgID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbjogador`
--
ALTER TABLE `tbjogador`
  MODIFY `JgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT de tabela `tbpartidas`
--
ALTER TABLE `tbpartidas`
  MODIFY `PtID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpersonagens`
--
ALTER TABLE `tbpersonagens`
  MODIFY `PsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbpontuacao`
--
ALTER TABLE `tbpontuacao`
  MODIFY `PoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbpartidas`
--
ALTER TABLE `tbpartidas`
  ADD CONSTRAINT `FK_JG1_PT` FOREIGN KEY (`PtJg1ID`) REFERENCES `tbjogador` (`JgID`),
  ADD CONSTRAINT `FK_JG2_PT` FOREIGN KEY (`PtJg2ID`) REFERENCES `tbjogador` (`JgID`);

--
-- Limitadores para a tabela `tbpontuacao`
--
ALTER TABLE `tbpontuacao`
  ADD CONSTRAINT `FK_JG_PO` FOREIGN KEY (`PoJgID`) REFERENCES `tbjogador` (`JgID`),
  ADD CONSTRAINT `FK_PS_PO` FOREIGN KEY (`PoPsID`) REFERENCES `tbpersonagens` (`PsID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
