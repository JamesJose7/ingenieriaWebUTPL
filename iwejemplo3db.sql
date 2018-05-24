-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2018 at 12:47 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwejemplo3db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `id` int(100) NOT NULL,
  `codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `costo` int(5) NOT NULL,
  `cupos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`id`, `codigo`, `nombre`, `costo`, `cupos`) VALUES
(1, '1010', 'Java', 80, 5),
(2, '12004', 'React', 70, 7),
(3, '10204', 'Android', 90, 0),
(5, '348014', 'SQL', 10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tipo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `curso` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `taller` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registros`
--

INSERT INTO `registros` (`id`, `nombres`, `apellidos`, `direccion`, `correo`, `cedula`, `telefono`, `fecha_nacimiento`, `tipo`, `curso`, `taller`) VALUES
(29, 'Andre', 'Herrer', 'En una casa', 'sdfm@sdf.com', '01489081', '12348', '1992-11-21', 'd', 'j', '1'),
(30, 'Jaime', 'Aguirre', 'Esto es una direccion', 'sdfm@sdf.com', '01489081', '12348', '1992-11-21', 'd', 'r', '3'),
(31, 'Peter', 'Main', 'No se me ocurre algo mas', 'sdfm@sdf.com', '01489081', '12348', '1992-11-21', 'd', 'r', '3'),
(32, 'Dieguito', 'Castillo', 'alado del vecino', 'dieguito@gmailcom', '110202049', '099248912', '2018-05-04', 'e', 'a', '1'),
(33, 'Doctor', 'Strange', 'Thanos sabe', 'strange@gmail.com', '1102049', '012948934', '1930-11-01', 'd', 'j', '1'),
(34, 'Alguien', 'Mas', 'Por ahi', 'ojsidjf@sdf.com', '11082488', '3242384', '1924-11-22', 'd', '', ''),
(35, 'sadf', 'jlksdjfkl', 'jjfskldj', 'jsldkfj@wdf.com', '31413', '23984892', '1923-03-23', 'd', '1', '2'),
(36, 'fsadf', 'sdofij', 'jsdf', 'jsoidf@sdf.com', '123123', '9823489', '2922-11-11', 'd', '1', '3'),
(37, 'fsadf', 'sdofij', 'jsdf', 'jsoidf@sdf.com', '123123', '9823489', '2922-11-11', 'd', '1', '3'),
(38, 'fsadf', 'sdofij', 'jsdf', 'jsoidf@sdf.com', '123123', '9823489', '2922-11-11', 'd', '1', '3'),
(39, 'fsadf', 'sdofij', 'jsdf', 'jsoidf@sdf.com', '123123', '9823489', '2922-11-11', 'd', '1', '3'),
(40, 'sadf', 'jsodfij', '', '', '11111', '', '0000-00-00', 'd', '2', '3'),
(41, 'asdf', 'asdf', '', '', '11', '', '1111-12-11', 'd', '', '3'),
(42, 'asdf', 'asdf', '', '', '11', '', '1111-12-11', 'd', '3', '3'),
(43, 'asdf', 'asdf', '', '', '11', '', '1111-12-11', 'd', '3', '3'),
(44, 'asdf', 'asdf', '', '', '11', '', '1111-12-11', 'd', '3', '1'),
(45, 'asdf', 'asdf', '', '', '11', '', '1111-12-11', 'd', '3', '1'),
(46, 'asdf', 'sdfsdf', '', '', '11', '', '0011-11-11', 'd', '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `registrotaller`
--

CREATE TABLE `registrotaller` (
  `id` int(11) NOT NULL,
  `id_registro` int(6) NOT NULL,
  `id_taller` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registrotaller`
--

INSERT INTO `registrotaller` (`id`, `id_registro`, `id_taller`) VALUES
(34, 29, 1),
(35, 29, 2),
(36, 29, 3),
(37, 30, 3),
(38, 30, 4),
(39, 31, 3),
(40, 32, 1),
(41, 32, 2),
(42, 32, 3),
(43, 32, 4),
(44, 33, 1),
(45, 33, 2),
(46, 33, 3),
(47, 35, 2),
(48, 35, 4),
(49, 36, 3),
(50, 37, 3),
(51, 37, 3),
(52, 38, 3),
(53, 39, 3),
(54, 40, 3),
(55, 41, 3),
(56, 42, 3),
(57, 43, 3),
(58, 44, 1),
(59, 44, 2),
(60, 44, 3),
(61, 44, 4),
(62, 44, 5),
(63, 44, 6),
(64, 45, 1),
(65, 45, 2),
(66, 45, 3),
(67, 45, 4),
(68, 45, 5),
(69, 45, 6);

-- --------------------------------------------------------

--
-- Table structure for table `talleres`
--

CREATE TABLE `talleres` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `costo` int(5) NOT NULL,
  `cupos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `talleres`
--

INSERT INTO `talleres` (`id`, `codigo`, `nombre`, `costo`, `cupos`) VALUES
(2, '10002', 'Python', 50, 7),
(3, '10002', 'Oracle', 50, 0),
(4, '10002', 'MySQL', 19, 2),
(5, '11012', 'Django', 10, 3),
(6, '1005', 'XML', 5, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrotaller`
--
ALTER TABLE `registrotaller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_registro` (`id_registro`),
  ADD KEY `id_taller` (`id_taller`);

--
-- Indexes for table `talleres`
--
ALTER TABLE `talleres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `registrotaller`
--
ALTER TABLE `registrotaller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `talleres`
--
ALTER TABLE `talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrotaller`
--
ALTER TABLE `registrotaller`
  ADD CONSTRAINT `registrotaller_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`),
  ADD CONSTRAINT `registrotaller_ibfk_2` FOREIGN KEY (`id_taller`) REFERENCES `talleres` (`id`),
  ADD CONSTRAINT `registrotaller_ibfk_3` FOREIGN KEY (`id_registro`) REFERENCES `registros` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
