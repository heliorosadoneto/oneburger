-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Dez-2023 às 14:58
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `delicia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id` bigint(20) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `vencimento` date NOT NULL,
  `tipo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id`, `descricao`, `valor`, `vencimento`, `tipo`) VALUES
(13, 'energia', 36.00, '2023-12-12', 1),
(14, 'casa', 500.00, '2023-12-08', 1),
(15, 'moto', 800.00, '2023-12-20', 1),
(16, 'S.furtado', 400.50, '2023-12-15', 1),
(17, 'casa', 565.00, '0000-00-00', 1),
(18, 'carne', 50.00, '2023-12-01', 1),
(19, 'compras', 500.00, '2023-12-20', 1),
(20, 'helio', 500.00, '2023-12-12', 1),
(21, 'neto', 50.00, '2023-11-12', 1),
(22, 'carro', 522.00, '2023-11-11', 1),
(23, 'rooa', 626.00, '2023-11-11', 0),
(24, 'casa', 500.00, '2023-08-09', 1),
(25, 'moto', 500.00, '2023-12-25', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_a_pagar`
--

CREATE TABLE `contas_a_pagar` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `vencimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `valor`) VALUES
(1, 'Salgados-frito', 5.00),
(2, 'Espetinho de frango', 8.00),
(3, 'Pastel - simples', 8.00),
(4, 'Pastel dois Sabores', 9.00),
(5, 'Cachorro quente - simples', 10.00),
(6, 'Cachorro quente - especial', 18.00),
(7, 'Batata frita - simples', 15.00),
(8, 'Batata frita - especial', 35.00),
(9, 'Trufas', 4.00),
(10, 'Pão de mel', 5.00),
(11, 'Bolo de pote', 10.00),
(12, 'Rote Grütze', 20.00),
(13, 'Refrigerante Lata', 5.00),
(14, 'Refrigerante Pequena', 3.00),
(15, 'Água mineral', 3.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_venda` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `token`, `email`, `nome`, `senha`, `tipo_venda`) VALUES
(2, '1', 'helio@gmail.com', 'Helio', '141474', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` bigint(20) NOT NULL,
  `un` int(255) NOT NULL,
  `produto` varchar(45) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `tipo_venda` varchar(255) NOT NULL,
  `tipo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `un`, `produto`, `preco`, `data`, `hora`, `tipo_venda`, `tipo`) VALUES
(265, 1, 'Pastel - simples', 8.00, '2023-12-05', '14:57:08', 'Dinheiro', 5),
(266, 2, 'Cachorro quente - simples', 20.00, '2023-12-05', '14:57:15', 'Dinheiro', 5);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contas_a_pagar`
--
ALTER TABLE `contas_a_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `contas_a_pagar`
--
ALTER TABLE `contas_a_pagar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
