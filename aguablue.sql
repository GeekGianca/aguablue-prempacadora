-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2019 at 04:42 AM
-- Server version: 8.0.16
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aguablue`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartera`
--

CREATE TABLE `cartera` (
  `idcartera` int(11) NOT NULL,
  `fecha_cartera` date NOT NULL,
  `gasto_diario` double NOT NULL,
  `ganancia_diaria` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `domicilio`
--

CREATE TABLE `domicilio` (
  `iddomicilio` int(11) NOT NULL,
  `hora_domicilio` time NOT NULL,
  `fecha_domicilio` date NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `apellidos` varchar(500) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lote`
--

CREATE TABLE `lote` (
  `idlote` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `tipo_lote` varchar(500) NOT NULL,
  `cantidad_unidad` double NOT NULL,
  `cantidad_total` int(11) NOT NULL,
  `precio_unitario` double NOT NULL,
  `hora_salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lote_has_domicilio`
--

CREATE TABLE `lote_has_domicilio` (
  `costo_venta` double NOT NULL,
  `cartera_idcartera` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `lote_idlote` int(11) NOT NULL,
  `domicilio_iddomicilio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `idpago` int(11) NOT NULL,
  `fehca_pago` date NOT NULL,
  `hora_pago` time NOT NULL,
  `empleado_idempleado` int(11) NOT NULL,
  `cartera_idcartera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartera`
--
ALTER TABLE `cartera`
  ADD PRIMARY KEY (`idcartera`),
  ADD UNIQUE KEY `fecha_cartera_UNIQUE` (`fecha_cartera`);

--
-- Indexes for table `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`iddomicilio`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`);

--
-- Indexes for table `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`idlote`);

--
-- Indexes for table `lote_has_domicilio`
--
ALTER TABLE `lote_has_domicilio`
  ADD KEY `fk_lote_has_domicilio_cartera1_idx` (`cartera_idcartera`),
  ADD KEY `fk_lote_has_domicilio_lote1_idx` (`lote_idlote`),
  ADD KEY `fk_lote_has_domicilio_domicilio1_idx` (`domicilio_iddomicilio`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `fk_pago_empleado_idx` (`empleado_idempleado`),
  ADD KEY `fk_pago_cartera1_idx` (`cartera_idcartera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartera`
--
ALTER TABLE `cartera`
  MODIFY `idcartera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `iddomicilio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lote`
--
ALTER TABLE `lote`
  MODIFY `idlote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pago`
--
ALTER TABLE `pago`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lote_has_domicilio`
--
ALTER TABLE `lote_has_domicilio`
  ADD CONSTRAINT `fk_lote_has_domicilio_cartera1` FOREIGN KEY (`cartera_idcartera`) REFERENCES `cartera` (`idcartera`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lote_has_domicilio_domicilio1` FOREIGN KEY (`domicilio_iddomicilio`) REFERENCES `domicilio` (`iddomicilio`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lote_has_domicilio_lote1` FOREIGN KEY (`lote_idlote`) REFERENCES `lote` (`idlote`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_pago_cartera1` FOREIGN KEY (`cartera_idcartera`) REFERENCES `cartera` (`idcartera`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pago_empleado` FOREIGN KEY (`empleado_idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
