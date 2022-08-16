-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 05:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flare`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `UpdationDate` datetime DEFAULT NULL,
  `Is_Active` int(1) NOT NULL,
  `violation_lvl` int(1) NOT NULL,
  `violation_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`id`, `username`, `password`, `name`, `email`, `CreationDate`, `UpdationDate`, `Is_Active`, `violation_lvl`, `violation_datetime`) VALUES
(1, 'nicholguasa', '45977e064b593f32120b82c095bf5423', 'Nichol Guasa', 'nichol.guasa@cvsu.edu.ph', '2022-05-20 14:07:58', '2022-05-28 18:09:57', 1, 0, NULL),
(2, 'lalaloulia', 'fe9bc102dacbe184a5501fd43256542a', 'Laralou Galano', 'laralouemilia.galano@cvsu.edu.ph', '2022-05-20 14:07:58', '2022-05-30 09:41:07', 1, 1, NULL),
(3, 'theBucket', '8de94c84a996bb76217e49730ca6123f', 'Kate', 'katedelacruz28@gmail.com', '2022-05-20 15:19:41', '2022-05-20 15:34:07', 1, 3, '2022-06-07 07:37:41'),
(4, 'Monggo', '49006e87050355a34f1cd349170bb88d', 'Patrick', 'patrickjames.fetizanan@cvsu.edu.ph', '2022-05-21 19:44:55', NULL, 1, 1, NULL),
(5, 'Jean', 'f2bf04a3db0ce9795c0a49b9fb3470da', 'Jean Paula', 'paulangbacus@gmail.com', '2022-05-22 15:00:09', NULL, 1, 0, NULL),
(6, 'mikebael18', '563dc8c7451642e717e3820ebbabf94d', 'mike bael', 'mikebaelhayag5@gmail.com', '2022-05-22 15:04:03', NULL, 1, 0, NULL),
(7, 'Courtny', '28f3694246cbcad048aff87abaa97a5f', 'Courtny Capistrano', 'courtnylove.capistrano@cvsu.edu.ph', '2022-05-22 15:07:39', NULL, 1, 0, NULL),
(8, 'lopits05', 'efacf0c34489e7867403e078f48bffe6', 'Enriqu', 'quillopoenrique@gmail.com', '2022-05-22 15:18:15', NULL, 1, 0, NULL),
(9, 'apriljoyadi', '2cc0ee2e7eb2b7ca2974dd0559a4631a', 'April Joy Adi', 'apriljoy.adi@cvsu.edu.ph', '2022-05-22 15:18:53', NULL, 1, 0, NULL),
(10, 'Sean', '5d6148b383568c793721f1e43c78287c', 'Sean Ison', 'seanison1122@gmail.com', '2022-05-22 15:27:12', '2022-05-22 15:49:06', 1, 0, NULL),
(11, 'Jaybe', '876ac5f1f4e765fef9d6480bfb5070f8', 'Jaybe Rinrod Telin', 'jbtelin25@gmail.com', '2022-05-22 15:29:19', NULL, 1, 0, NULL),
(12, '@susie.merdegia', '05a742dc32ed6d8a40e1e2aac37880d9', 'Susie Jane D. Merdegia', 'sjdhemon@gmail.com', '2022-05-22 15:30:58', NULL, 1, 0, NULL),
(13, 'KatYna', '9a94a0b677d7b6295d5ac91d3d6beefe', 'Kat Yna', 'ynamarasigan14@gmail.com', '2022-05-22 15:38:26', '2022-05-22 15:47:18', 1, 0, NULL),
(14, '201811047', '3c56fe96a801693d98aa15fd05ddbd63', 'Christian Andrey T. Salonoy', 'christianandrey.salonoy@cvsu.edu.ph', '2022-05-22 15:40:36', NULL, 1, 0, NULL),
(15, 'Ericasheinab', 'ada0b466bd380efc84902ddde56aa6b3', 'Erica Sheina L. Bertulfo', 'ericasheina@cvsu.edu.ph', '2022-05-22 15:42:06', NULL, 1, 0, NULL),
(16, 'alexmapagmahal47', '2294dbcb3025f18d9952d7cf8c04834f', 'alex', 'alexieferrer41@gmail.com', '2022-05-22 16:17:00', NULL, 1, 0, NULL),
(17, 'cjmabini13', '7516d9904e771d5e3e3737965068c652', 'CJ Mabini', 'cleffjeo.mabini@cvsu.edu.ph', '2022-05-22 16:23:14', NULL, 1, 0, NULL),
(18, 'Akatzuki312', '65c5daa4bd5e47f38d54a12e7c6cdb92', 'Jefferson Antonio', 'jefferson.antonio@gmail.com', '2022-05-22 16:42:03', NULL, 1, 0, NULL),
(19, 'Einzo', '9b8772373bb55a7b2c52466fcd1f1f94', 'Renzo Cruz', 'renzo.cruz@cvsu.edu.ph', '2022-05-22 16:44:43', NULL, 1, 0, NULL),
(20, 'erick1598', 'd60ad6e49068fec482115f0bc5d6ba6a', 'erick', 'chriserick0101@gmail.com', '2022-05-22 17:28:26', NULL, 1, 0, NULL),
(21, 'JJM', '53d066853d127f095958e253968ee9a8', 'Jm matabang', 'jmmatabang24@gmail.com', '2022-05-22 18:12:38', NULL, 1, 0, NULL),
(22, 'kayil08', '76037825639b03206966c28e6db616bc', 'kyle greffin', 'kayil.baguio@gmail.com', '2022-05-22 19:03:33', NULL, 1, 0, NULL),
(23, 'Jhames', '9723fceb28f871ddbe2d0843540ec15c', 'Jhames Sabellano', 'jhames1.sabellano7@gmail.com', '2022-05-22 19:49:35', NULL, 1, 0, NULL),
(24, 'Phiam', '17d33cec0c7d2e9e0ce523ac933b7803', 'Sophia', 'sophiamarie.guevarra@cvsu.edu.ph', '2022-05-22 19:59:21', NULL, 1, 0, NULL),
(25, 'Managung Editor', '71f3850318df67e8233c4d03911da994', 'Karina Tesaluna', 'karina.tesaluna@cvsu.edu.ph', '2022-05-22 21:15:23', NULL, 1, 0, NULL),
(26, 'jezasismagdua', 'd71d9faf6aeed03b4a00db9ee5a5f49d', 'Jezel Magdua', 'jezel.magdya@cvsu.edu.ph', '2022-05-22 21:17:10', NULL, 1, 0, NULL),
(27, 'tessy', 'fea27f3a499985d3a8ea34a7e3c14dad', 'tessywiththeheart', 'tesalunakarina@gmail.com', '2022-05-22 21:19:46', NULL, 1, 0, NULL),
(28, 'Gabriel_Paredes', 'e5e29e1fcee800acca04518219474abf', 'Gabriel Louiz A Paredes', 'gabriellouiz.paredes@cvsu.edu.ph', '2022-05-22 21:23:46', NULL, 1, 0, NULL),
(29, 'Kevin_Ortiz', '6c3f5fd59343aaa8640ee90357116638', 'Kevin Angelo Ortiz', 'kevinangelo.ortiz@cvsu.edu.ph', '2022-05-22 21:36:31', NULL, 1, 0, NULL),
(30, 'Anje', '260ca8b6a14331375d6e11b4acda1520', 'Angelika', 'angelikaarenas8@gmail.com', '2022-05-22 21:37:23', NULL, 1, 0, NULL),
(31, 'vince0821', 'ae8b435589a00382682c287e179714c1', 'vince', 'johnvincentdallgo082193@gmail.com', '2022-05-22 21:59:43', NULL, 1, 0, NULL),
(32, 'asdsa', '75a65c156d35e134347e8ceaad533ed3', 'sad', 'sdsada@dsaa', '2022-05-22 22:07:45', NULL, 1, 0, NULL),
(33, 'william', '96995f65a7920be50d360b9cde41c083', 'William Fuentes', 'william.fuentes@cvsu.edu.ph', '2022-05-22 22:12:46', NULL, 1, 0, NULL),
(34, 'Dyaseeya', '7404db679c33e75b5d63b8751aeb83f1', 'Jazzie Navarro', 'jazzie.navarro@cvsu.edu.ph', '2022-05-22 22:21:37', NULL, 1, 0, NULL),
(35, 'aileenjoeimee_', '145add55327c7a6095be34e53972d462', 'Aileen Joeimee Castillo', 'missaileenjoeimeecastillo@gmail.com', '2022-05-22 22:54:55', NULL, 1, 0, NULL),
(36, 'CarlAlquero', '37f993b6e54eec23c7b8e6eea6d6b52a', 'Carl Andrei Alquero', 'carlandrei.alquero@cvsu.edu.ph', '2022-05-23 00:34:43', NULL, 1, 0, NULL),
(37, 'daclesonii_01rodolfo', '98e81e569122ceed4c71cfbfd30a29ca', 'Rodolfo Dacleson II', 'rodolfo.daclesonii@cvsu.edu.ph', '2022-05-23 00:54:08', NULL, 1, 0, NULL),
(38, 'Elrex03', 'e84086b4117e7bc8bd57d55e2dc015a4', 'El Rex Africa', 'elrex.africa@cvsu.edu.ph', '2022-05-23 06:19:42', NULL, 1, 0, NULL),
(39, 'Pewpew', '2ac9cb7dc02b3c0083eb70898e549b63', 'Pewpew', 'pewpew@gmail.com', '2022-05-23 10:06:44', NULL, 1, 0, NULL),
(40, 'hanamlee__', 'c3d99e82bf58304e08463cb06f86fa99', 'Kerstein', 'kerstein.sarmiento@cvsu.edu.ph', '2022-05-23 10:57:47', NULL, 1, 0, NULL),
(41, 'alden', 'f191fabb1dd8b8f78979184fa00aa78d', 'Alden Cataluna', 'aldencraig03@gmail.com', '2022-05-23 19:05:50', NULL, 1, 0, NULL),
(42, 'nixxxin18', '140ace773a5425def6897c53db95b8c4', 'Nicki Urmatam', 'nicki.urmatam@cvsu.edu.ph', '2022-05-23 19:09:56', NULL, 1, 0, NULL),
(43, 'BetaTech', '35a9fe254905d708e12b1a318bf734d0', 'Beta Tech', 'beta.tech@gmail.com', '2022-05-23 19:28:59', NULL, 1, 0, NULL),
(44, 'Lea.Serantes', 'd263b9278ecb9179462b966bfd28a035', 'Princess Lea P. Serantes', 'princesslea.serantes@cvsu.edu.ph', '2022-05-23 19:35:35', NULL, 1, 0, NULL),
(45, 'Nullings', '519098636b7c19d07dc125a1da3edb0b', 'Daryll Clemeno', 'clemeno45@gmail.com', '2022-05-23 19:40:03', NULL, 1, 0, NULL),
(46, 'wen001', '99bab1f9e9ad88bdea356d99223c7093', 'Howen Leonar', 'howen.leonar@cvsu.edu.ph', '2022-05-23 20:52:03', NULL, 1, 0, NULL),
(47, 'Diana30', '1fb15f1e104c4a04fb1f776eb340b201', 'Diana A. Gutierrez', 'diana.gutierrez@cvsu.edu.ph', '2022-05-23 21:52:55', NULL, 1, 0, NULL),
(48, 'abbybba7', '5aba661d1f96a7bfdc9cb3950c6bae58', 'Abby Sapitanan', 'abby.sapitanan@stjude.edu.ph', '2022-05-24 12:40:35', NULL, 1, 0, NULL),
(49, 'Gambino', '70780f20889c15c200b97087a2c610bb', 'Gabby', 'gabby.brizuela@gmail.com', '2022-05-24 12:52:35', NULL, 1, 0, NULL),
(50, 'elcciii', '95e37c47103106b5b2ea1b8c03134213', 'Edgardo Laurentti Cruz III', 'elcciii@gmail.com', '2022-05-24 16:15:28', NULL, 1, 0, NULL),
(51, 'News Editor Gee', '45accf0d7b6f529e8f9094e929efb043', 'Germar J. Erfe', 'germar.erfe@cvsu.edu.ph', '2022-05-24 16:24:58', NULL, 1, 0, NULL),
(52, 'rayzen', '2af9b1ba42dc5eb01743e6b3759b6e4b', 'Raymond', 'johnraymond@gmail.com', '2022-05-25 08:11:32', NULL, 1, 0, NULL),
(53, 'cmalabanan25', '6cc7e04f1bdd4422c8a67b3ae44b7267', 'CARLO PAULITE MALABANAN', 'carlo.malabanan@cvsu.edu.ph', '2022-05-28 16:07:40', NULL, 1, 0, NULL),
(54, 'emilya', '3ee1462a957ac912d473352c746f54ad', 'Emilia Galano', 'galanolaralou.aristotle@gmail.com', '2022-05-30 09:48:09', NULL, 1, 0, NULL),
(55, 'jnll@theflare', '486d67bf5518008c397c28707c409597', 'Janelle', 'janelleanilao07@gmail.com', '2022-05-30 10:12:46', NULL, 1, 0, NULL),
(56, 'Mabii', '2504660fc50f488f236e0516b7e6bf21', 'Ma. Luz Victoria Rogelyn N. Abog', 'mavy.abog20@gmail.com', '2022-05-30 10:28:56', NULL, 1, 0, NULL),
(57, 'colguasa', 'e05099a60616a953750e5972418c96df', 'Col Guasa', 'nichol.guasa@gmail.com', '2022-05-31 15:27:11', NULL, 1, 0, NULL),
(58, 'test', 'b47234810ab2de5cd40de24202dd0559', 'test', 'test@yahoo.com', '2022-05-31 15:31:11', NULL, 1, 0, NULL),
(59, 'joy_ligayaa', '80e614ef12e7cf6873e9ecd2a9c13e1e', 'Cristine Joy Relles', 'cristinejoy.relles@cvsu.edu.pjh', '2022-06-04 21:06:11', NULL, 1, 0, NULL),
(60, 'sample123', '45977e064b593f32120b82c095bf5423', 'sample', 'sample_email@gmail.com', '2022-08-16 23:17:52', NULL, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Description` mediumtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `PostingDate` datetime DEFAULT NULL,
  `UpdationDate` datetime DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 'Straight/Hard News', 'News stories that are written in a concise and impartial manner only containing relevant and needed informations. Eg. Police beat stories, Campus Elections, National Election, etc', '2022-04-13 21:12:44', '2022-04-29 22:19:58', 1),
(2, 'Feature News', 'Are News stories that are softer compared to straight news and contains stories that are entertaining. Eg. Events, Human Interest stories, Biographical narratives, etc.', '2022-04-13 21:13:10', '2022-04-27 18:21:53', 1),
(3, 'Editorial', 'Are Articles that are centered on Opinion and Commentaries of the writer aiming to amplify or sway the reader’s opinion.', '2022-04-13 21:13:24', NULL, 1),
(4, 'Feature', 'Are Articles that are similar to a News Feature as it tackles topical events, people or issues.', '2022-04-13 21:13:55', NULL, 1),
(5, 'Literary', 'Is our section which covers a wide range of different literary pieces such as Short Stories, Poetry, Flash Fictions, Literary Narratives, etc\n', '2022-04-13 21:14:03', '2022-04-17 15:44:49', 1),
(6, 'Sports', 'News stories that are related to Sports and athletes.', '2022-04-13 21:14:13', NULL, 1),
(7, 'Photos and Cartoons', '.', '2022-04-13 22:31:18', '2022-04-29 22:18:19', 1),
(10, 'Test', 'Test', '2022-05-31 15:24:32', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` int(11) DEFAULT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 DEFAULT NULL,
  `comment` mediumtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `PostingDate` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `PostingDate`, `status`) VALUES
(1, 13, 'Kate', 'katedelacruz28@gmail.com', 'nanttrip lang yung nakatayo ee\r\n', '2022-05-21 15:58:34', 1),
(2, 13, 'Patrick', 'patrickjames.fetizanan@cvsu.edu.ph', 'Shout out sa mga viewers!!!', '2022-05-21 19:46:01', 1),
(3, 5, 'April Joy Adi', 'apriljoy.adi@cvsu.edu.ph', '#ParaSaBayan', '2022-05-22 15:20:40', 1),
(4, 13, 'Enriqu', 'quillopoenrique@gmail.com', 'hi', '2022-05-22 15:25:19', 1),
(5, 3, 'Kat Yna', 'ynamarasigan14@gmail.com', 'I agree. Every vote counts', '2022-05-22 15:46:17', 1),
(6, 1, 'Sean Ison', 'seanison1122@gmail.com', 'Good job! ', '2022-05-22 15:48:22', 1),
(7, 5, 'Nichol Guasa', 'nichol.guasa@cvsu.edu.ph', '#ParaSaKinabukasan', '2022-05-22 16:09:30', 1),
(8, 13, 'alex', 'alexieferrer41@gmail.com', 'crush kita franzis', '2022-05-22 16:18:52', 0),
(9, 1, 'Jefferson Antonio', 'jefferson.antonio@gmail.com', 'Sheesh!', '2022-05-22 16:43:55', 1),
(14, 13, 'Nichol Guasa', 'nichol.guasa@cvsu.edu.ph', 'hi', '2022-05-22 18:09:21', 1),
(16, 14, 'Jm matabang', 'jmmatabang24@gmail.com', '#kinabukasan', '2022-05-22 18:14:43', 1),
(17, 14, 'tessywiththeheart', 'tesalunakarina@gmail.com', '✊🤍', '2022-05-22 21:22:54', 1),
(18, 13, 'vince', 'johnvincentdallgo082193@gmail.com', 'hi\r\n', '2022-05-22 22:00:25', 1),
(19, 4, 'Alden Cataluna', 'aldencraig03@gmail.com', 'test', '2022-05-23 19:06:53', 0),
(20, 14, 'Howen Leonar', 'howen.leonar@cvsu.edu.ph', '<3', '2022-05-23 20:56:17', 1),
(22, 2, 'Nichol Guasa', 'nichol.guasa@cvsu.edu.ph', 'Test', '2022-05-26 15:08:54', 1),
(23, 20, 'Nichol Guasa', 'nichol.guasa@cvsu.edu.ph', 'Test', '2022-05-27 21:11:11', 1),
(24, 20, 'Kate', 'katedelacruz28@gmail.com', 'Luma aa', '2022-05-28 00:05:36', 1),
(25, 20, 'CARLO PAULITE MALABANAN', 'carlo.malabanan@cvsu.edu.ph', 'Mayroon bang insurance coverage ang mga students na gusto ng bumalik sa eskwela?', '2022-05-28 16:11:14', 1),
(26, 18, 'Nichol Guasa', 'nichol.guasa@cvsu.edu.ph', 'Congrats', '2022-05-30 09:11:21', 1),
(27, 3, 'Laralou Galano', 'laralouemilia.galano@cvsu.edu.ph', 'I agree ', '2022-05-30 09:25:26', 1),
(32, 1, 'Emilia Galano', 'galanolaralou.aristotle@gmail.com', 'so cute 🥺', '2022-05-30 09:53:51', 1),
(33, 20, 'Janelle', 'janelleanilao07@gmail.com', 'Sana magkaroon ng voluntary health insurance ang mga estudyante. Sana waf rin alisin ang online class para sa working student', '2022-05-30 10:19:58', 1),
(35, 20, 'Kate', 'katedelacruz28@gmail.com', 'press f', '2022-05-31 01:45:53', 1),
(36, 20, 'Kate', 'katedelacruz28@gmail.com', 'jv', '2022-05-31 01:49:45', 1),
(37, 18, 'Kate', 'katedelacruz28@gmail.com', 'sheeesh', '2022-05-31 01:51:37', 1),
(38, 18, 'Laralou Galano', 'laralouemilia.galano@cvsu.edu.ph', 'ang luma naman nyan 2019 pa', '2022-05-31 02:10:11', 0),
(40, 18, 'Laralou Galano', 'laralouemilia.galano@cvsu.edu.ph', 'GG', '2022-05-31 07:39:41', 1),
(41, 22, 'Col Guasa', 'nichol.guasa@gmail.com', '<3', '2022-06-01 15:25:35', 1),
(42, 22, 'Nichol Guasa', 'nichol.guasa@cvsu.edu.ph', 'Hi', '2022-06-01 15:35:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbllikes`
--

CREATE TABLE `tbllikes` (
  `id` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllikes`
--

INSERT INTO `tbllikes` (`id`, `accountid`, `postid`, `date`) VALUES
(3, 3, 14, '2022-05-21'),
(8, 9, 3, '2022-05-22'),
(9, 8, 13, '2022-05-22'),
(10, 8, 4, '2022-05-22'),
(11, 10, 1, '2022-05-22'),
(12, 13, 14, '2022-05-22'),
(13, 13, 4, '2022-05-22'),
(14, 13, 3, '2022-05-22'),
(15, 16, 14, '2022-05-22'),
(16, 20, 13, '2022-05-22'),
(17, 20, 14, '2022-05-22'),
(19, 1, 3, '2022-05-22'),
(23, 1, 13, '2022-05-22'),
(24, 1, 4, '2022-05-22'),
(25, 1, 2, '2022-05-22'),
(26, 31, 13, '2022-05-22'),
(27, 34, 14, '2022-05-22'),
(28, 2, 13, '2022-05-22'),
(29, 2, 4, '2022-05-22'),
(32, 2, 14, '2022-05-24'),
(33, 1, 14, '2022-05-26'),
(37, 1, 1, '2022-05-26'),
(38, 3, 19, '2022-05-26'),
(39, 1, 18, '2022-05-27'),
(41, 2, 3, '2022-05-29'),
(42, 2, 20, '2022-05-30'),
(43, 1, 5, '2022-05-30'),
(44, 2, 19, '2022-05-30'),
(45, 2, 18, '2022-05-30'),
(46, 2, 1, '2022-05-30'),
(47, 54, 20, '2022-05-30'),
(48, 54, 1, '2022-05-30'),
(49, 54, 13, '2022-05-30'),
(50, 54, 19, '2022-05-30'),
(51, 54, 14, '2022-05-30'),
(52, 57, 22, '2022-05-31'),
(54, 1, 22, '2022-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `tblofficer`
--

CREATE TABLE `tblofficer` (
  `id` int(11) NOT NULL,
  `positionid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `UpdationDate` datetime DEFAULT NULL,
  `db` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `co` int(11) NOT NULL,
  `ca` int(11) NOT NULL,
  `of` int(11) NOT NULL,
  `us` int(11) NOT NULL,
  `pa` int(11) NOT NULL,
  `Is_Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblofficer`
--

INSERT INTO `tblofficer` (`id`, `positionid`, `username`, `password`, `name`, `CreationDate`, `UpdationDate`, `db`, `ar`, `co`, `ca`, `of`, `us`, `pa`, `Is_Active`) VALUES
(1, 1, 'admin', '25f9e794323b453885f5181f1b624d0b', 'ADMIN', '2022-04-29 22:12:49', '2022-05-20 12:56:45', 1, 0, 1, 1, 1, 1, 1, 1),
(15, 2, 'adviser', 'e05099a60616a953750e5972418c96df', 'Janel Evan Akim', '2022-05-11 23:28:23', '2022-05-20 16:31:43', 1, 1, 1, 1, 1, 1, 1, 1),
(19, 3, 'Gabriel', '0975e3dc27338554164a4b3b48993f16', 'Gabriel Paredes', '2022-05-21 14:31:04', '2022-05-31 15:25:41', 1, 1, 1, 1, 0, 0, 0, 1),
(22, 6, 'tessy', 'de9fe800b294a74aba696c31107ad448', 'Karina Tesaluna', '2022-05-24 18:44:41', NULL, 1, 1, 1, 1, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `PageTitle` mediumtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `Description` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Flare', '<h1 style=\"text-align: center; \"><b><font face=\"Verdana\">Preamble of the Flare</font></b></h1><p><font face=\"Verdana\"><br></font></p><p style=\"text-align: center; \"><font face=\"Verdana\">We, the young journalist of Cavite State University- Imus Campus imploring the aid of our Almighty God, in order to promote social awareness and consciousness among students, to act as liaison between the students and the administration; to be catalysts for social change in the campus; and to promote Cavite State University- Imus Campus, hereby ordain and promulgate this constitution.</font></p><p style=\"text-align: center; \"><font face=\"Verdana\"><br></font></p><div><div style=\"text-align: left;\"><b><font face=\"Verdana\">The Flare Maxim</font></b></div><div><font face=\"Verdana\"><br></font></div><div style=\"text-align: center; \"><b><i><font face=\"Verdana\">Corda populi ad veritatem accendens!</font></i></b></div><div style=\"text-align: center; \"><font face=\"Verdana\">Igniting the hearts of people on truth</font></div><div style=\"text-align: center; \"><font face=\"Verdana\"><br></font></div><div style=\"text-align: left;\"><font face=\"Verdana\"><br></font></div><div style=\"text-align: left;\"><b><font face=\"Verdana\">Information</font></b></div><div style=\"text-align: left;\"><b><font face=\"Verdana\"><br></font></b></div><div style=\"text-align: left;\"><div style=\"\"><font face=\"Verdana\">&nbsp;&nbsp;&nbsp;&nbsp;The Flare is the official student publication unit of Cavite State University- Imus Campus located at 2nd floor, old building of CvSU- Imus Campus, LTO Compound, Palico 4, Imus City, Cavite. The unit and its entire member has served with its aims to be the bridge between the students and the administration by providing transparent, fair, and unbiased news and articles. Promulgate awareness among students and all its readers. Uphold the freedom of expression. Serve as liaison between the students and the school administration. And be the catalyst for social change in the university.</font></div><div style=\"\"><font face=\"Verdana\"><br></font></div></div></div>', '2018-06-30 18:01:03', '2022-05-31 07:28:16'),
(2, 'contactus', 'Contact Details', '<p><font face=\"Verdana\"><b><font face=\"Verdana\">The Flare Email</font></b><br></font></p><p><a href=\"http://sputheflare.cvsuimus@gmail.com\"><font face=\"Verdana\">sputheflare.cvsuimus@gmail.com</font></a></p><p><font face=\"Verdana\"><br></font></p><p><b><font face=\"Verdana\">The Flare Officials contact information</font></b></p><table class=\"table table-bordered\"><tbody><tr><td><p style=\"text-align: center; padding-top: 10px;\"><font face=\"Verdana\"><b style=\"\">Editior-in-chief</b> -&nbsp;Gabriel Louiz A Paredes&nbsp;</font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Email:&nbsp;<a href=\"http://gabriellouiz.paredes@cvsu.edu.ph/\" target=\"_blank\">gabriellouiz.paredes@cvsu.edu.ph</a></font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Mobile #: 0976 - 152 - 5613</font></p></td></tr><tr><td><p style=\"text-align: center; padding-top: 10px;\"><font face=\"Verdana\"><b style=\"\">Associate EIC for Internal Affairs</b> -&nbsp;Carl Andrei Alquero</font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Email:&nbsp;<a href=\"http://carlandrei.alquero@cvsu.edu.ph/\" target=\"_blank\">carlandrei.alquero@cvsu.edu.ph</a></font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Mobile #: 0955 - 026 - 1966</font></p></td></tr><tr><td><p style=\"text-align: center; padding-top: 10px;\"><font face=\"Verdana\"><b style=\"\">Managing Editor</b> -&nbsp;Karina Tesaluna</font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Email:&nbsp;<a href=\"http://karina.tesaluna@cvsu.edu.ph/\">karina.tesaluna@cvsu.edu.ph</a></font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Mobile #: 0999 - 945 - 5417</font></p></td></tr><tr><td><p style=\"text-align: center; padding-top: 10px;\"><font face=\"Verdana\" style=\"\"><b style=\"\"><font face=\"Verdana\">Production Editor</font></b> - Howard Christian Marquez</font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Email:&nbsp;<a href=\"http://howardchristian.marquez@cvsu.edu.ph/\">howardchristian.marquez@cvsu.edu.ph</a></font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Mobile #: 0976 - 152 - 5613</font></p></td></tr></tbody></table><p><font face=\"Verdana\"><br></font></p><p><b><font face=\"Verdana\">The Flare Developer contact information</font></b></p><table class=\"table table-bordered\"><tbody><tr><td><p style=\"text-align: center; padding-top: 10px;\"><font face=\"Verdana\"><b style=\"\"><font face=\"Verdana\">Software Developer&nbsp;</font></b>&nbsp;-&nbsp;Nichol C. Guasa</font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Email:&nbsp;<a href=\"http://nichol.guasa@cvsu.edu.ph\">nichol.guasa@cvsu.edu.ph</a></font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Mobile #: 0966 - 160 - 3185</font></p></td></tr><tr><td><p style=\"text-align: center; padding-top: 10px;\"><font face=\"Verdana\"><b><font face=\"Verdana\">Researcher</font></b> -&nbsp;Laralou Emilia P. Galano</font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Email:&nbsp;<a href=\"http://laralouemilia.galano@cvsu.edu.ph\">laralouemilia.galano@cvsu.edu.ph</a></font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Mobile #: 0947 - 428 - 3874<br></font></p></td></tr><tr><td><p style=\"text-align: center; padding-top: 10px;\"><font face=\"Verdana\"><b><font face=\"Verdana\">Software Tester</font></b> -&nbsp;F<span style=\"background-color: transparent;\">ranzis Kate D. De La Cruz</span></font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Email:&nbsp;<a href=\"http://franziskate.delacruz@cvsu.edu.ph\">franziskate.delacruz@cvsu.edu.ph</a></font></p><p style=\"text-align: center;\"><font face=\"Verdana\">Mobile #: 0956 - 702 - 1456<br></font></p></td></tr></tbody></table><p><span style=\"font-weight: 600;\"><font face=\"Verdana\"><br></font></span></p><p><br></p>', '2018-06-30 18:01:36', '2022-05-28 07:09:17'),
(3, 'termsandconditions', 'Terms and Conditions', '<div><b><font face=\"Verdana\">General Terms&nbsp;</font></b></div><div><br></div><div><font face=\"Tahoma\">By accessing with, you confirm that you are in agreement with and bound by the terms of service contained in the Terms &amp; Conditions outlined below. These terms apply to the entire website and any email or other type of communication between you and&nbsp;</font></div><div><font face=\"Tahoma\"><br></font></div><div><font face=\"Tahoma\">Under no circumstances shall team be liable for any direct, indirect, special, incidental or consequential damages, including, but not limited to, loss of data, arising out of the use or the inability to use, the materials on this site, even if team or an authorized representative has been advised of the possibility of such damages. If your use of materials from this site results in the need for servicing repair or correction of equipment or data, you assume any costs thereof&nbsp;</font></div><div><font face=\"Tahoma\">will not be responsible for any outcome that may occur during the course of usage of our resources. We reserve the rights to revise the resources usage policy in any moment.</font></div><div><br></div><div><br></div><div><div><b><font face=\"Verdana\">License</font></b></div><div><br></div><div>The Flare - Student Publication grants you a revocable, non-exclusive, non- transferable, limited license to download, install and use our service strictly in accordance with the terms of this Agreement.&nbsp;</div><div><br></div><div>These Terms &amp; Conditions are a contract between you and The Flare - Student Publication (referred to in these Terms &amp; Conditions as \"The Flare - Student Publication\", \"us\", \"we\" or \"our\"), the provider of the The Flare - Student Publication website and the services accessible from the The Flare - Student Publication website (which are collectively referred to in these Terms &amp; Conditions as the The Flare-Student Publication Service\")&nbsp;</div><div><br></div><div>You are agreeing to be bound by these Terms &amp; Conditions. If you do not agree to these Terms &amp; Conditions please do not use the Service in these Terms &amp; Conditions, \"you\" refers both to you as an individual and to the entity you represent. If you violate any of these Terms &amp; Conditions, we reserve the right to cancel your account or block access to your account without notice.</div><div><br></div><div><br></div><div><div><b><font face=\"Verdana\">Restrictions&nbsp;</font></b></div><div><br></div><div>You agree not to, and you will not permit others to:&nbsp;</div><div>• License, sell, rent, lease, assign, distribute, transmit, host, outsource, disclose or otherwise commercially exploit the service or make the platform available to any third party&nbsp;</div><div>• Modify, make derivative works of disassemble, decrypt reverse compile or reverse engineer any part of the service.&nbsp;</div><div>• Remove, alter or obscure any proprietary notice (including any notice of copyright or trademark) of or its affiliates, partners suppliers or the licensors of the service.</div><div><br></div><div><br></div><div><div><b><font face=\"Verdana\">Your Suggestions</font></b></div><div><br></div><div>Any feedback comments, ideas, improvements or suggestions (collectively. \"Suggestions\") provided by you to us with respect to the service shall remain the sole and exclusive property of us. We shall be free to use, copy, modify publish, or redistribute the Suggestions for any purpose and in any way without any credit or any compensation to you.</div></div></div></div><div><br></div><div><br></div><div><div><b><font face=\"Verdana\">Your Consent</font></b></div><div><br></div><div>We’ve updated our Terms &amp; Conditions to provide you with complete transparency into what is being set when you visit our site and how it’s being used. By using our service, registering an account, you hereby consent to our Terms &amp; Conditions&nbsp;</div></div><div><br></div><div><div><br></div><div><b><font face=\"Verdana\">Links to Other Websites</font></b></div><div><br></div><div>Our service may contain links to other websites that are not operated by Us. If You click on a third-party link, You will be directed to that third party’s site. We strongly advise You to review the Terms &amp; Conditions of every site You visit. We have no control over and assume no responsibility for the content, Terms &amp; Conditions or practices of any third-party sites or services&nbsp;</div></div><div><br></div>', '2022-04-15 13:34:35', '2022-05-21 18:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblposition`
--

CREATE TABLE `tblposition` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `Is_Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblposition`
--

INSERT INTO `tblposition` (`id`, `name`, `description`, `Is_Active`) VALUES
(1, 'ADMIN', '', 1),
(2, 'SPU ADVISER', '', 1),
(3, 'EDITOR-IN-CHIEF', '', 1),
(4, 'ASSOCIATE EDITOR-IN-CHIEF FOR INTERNAL AFFAIRS\r\n', '', 0),
(5, 'ASSOCIATE EDITOR-IN-CHIEF FOR EXTERNAL AFFAIRS', '', 0),
(6, 'MANAGING EDITOR', '', 1),
(7, 'COPY EDITOR', '', 0),
(8, 'PRODUCTION EDITOR', '', 0),
(9, 'BUSINESS AND CIRCULATION MANAGER', '', 0),
(10, 'NEWS EDITOR', '', 0),
(11, 'SPORTS EDITOR', '', 0),
(12, 'FEATURE EDITOR', '', 0),
(13, 'LITERARY EDITOR', '', 0),
(14, 'PHOTO EDITOR', '', 0),
(15, 'CARTOONS AND COMICS EDITOR', '', 0),
(16, 'LAYOUT AND GRAPHIC EDITOR', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `PostingDate` datetime DEFAULT NULL,
  `UpdationDate` datetime DEFAULT NULL,
  `PostUrl` mediumtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `PostImage` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `PostUrl`, `PostImage`, `Is_Active`) VALUES
(1, 'USAPANG KALYE', 7, '<p><font face=\"Tahoma\">Si Kabsuy at Mingming</font></p><p><font face=\"Tahoma\">Guhit nina: Janna Babaran at Aldrian Barias</font></p><p><font face=\"Tahoma\">Sulat ni: Carl Andrei Aquero</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">#KabsuyAtMingming</font></p><p><font face=\"Tahoma\">#EditorialCartoon</font></p><p><font face=\"Tahoma\">#ArtsandLiterature</font></p><p><font face=\"Tahoma\">#Recruitment</font></p>', '2022-05-20 13:06:06', '2022-05-20 13:12:39', 'USAPANG-KALYE', '45e259211c0c3046e584b81213ee4c23.jpg', 1),
(2, 'What She Can Do? ', 5, '<p><font face=\"Tahoma\">&nbsp; &nbsp; Everybody knows she was there but what’s her ability?<br></font></p><p><font face=\"Tahoma\">Someone who can do this and that makes a difference</font></p><p><font face=\"Tahoma\">The one who makes an impact and doesn’t forget</font></p><p><font face=\"Tahoma\">The world is an open book</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">A woman is a writer</font></p><p><font face=\"Tahoma\">Embodiment of Literature</font></p><p><font face=\"Tahoma\">Writes her stories</font></p><p><font face=\"Tahoma\">Compose her songs</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">She inspires people through her works</font></p><p><font face=\"Tahoma\">Making them motivated and enlightening minds</font></p><p><font face=\"Tahoma\">She wakes everyone up when all of them are confused</font></p><p><font face=\"Tahoma\">Making them realize the reality of life</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">A woman is a composer</font></p><p><font face=\"Tahoma\">Makes her own melodies</font></p><p><font face=\"Tahoma\">Makes the harmonies</font></p><p><font face=\"Tahoma\">Makes the rhythm</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">She forms her own band to get the attention of the public</font></p><p><font face=\"Tahoma\">Making them listen and temporarily forget their own problems</font></p><p><font face=\"Tahoma\">She forms her own orchestra with a lot of instruments</font></p><p><font face=\"Tahoma\">Making the silent hearts ponder for more</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">A woman is a dancer</font></p><p><font face=\"Tahoma\">Following a sequence of steps</font></p><p><font face=\"Tahoma\">Following the movement of the correct choreography</font></p><p><font face=\"Tahoma\">Following the impression of beauty</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">She is an artist who paints the faces of every people she sees</font></p><p><font face=\"Tahoma\">Dancing with grace and confidence</font></p><p><font face=\"Tahoma\">Dancing her vision to canvas the stage</font></p><p><font face=\"Tahoma\">Dancing the ashes beneath the stars</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">Photo by: Andie Boqueo</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">#LitMondays</font></p><p><font face=\"Tahoma\">#Literature</font></p><p><font face=\"Tahoma\">#TheFlare</font></p><p><font face=\"Tahoma\">#TheFlareDaily</font></p><div><br></div><div><br></div>', '2022-05-20 13:11:50', NULL, 'What-She-Can-Do?-', 'ddbeb8248914df05b9ade7761045ad0c.jpg', 1),
(3, 'Most Powerful Weapon ', 2, '<p><font face=\"Tahoma\">\"Your vote serves as the most powerful weapon you can use to shape the future into a better place.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">Open your eyes to the truth and stop fixating on what you only choose to see.\"</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">Photo by Nastassja Braceros</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">#PhotoBoomBoom</font></p><p><font face=\"Tahoma\">#Photojournalism</font></p><p><font face=\"Tahoma\">#TheFlareDaily</font></p><p><font face=\"Tahoma\">#TheFlarePBB</font></p><div><br></div>', '2022-05-20 13:12:25', NULL, 'Most-Powerful-Weapon-', 'da67c921d262bd5202e382c012895f9a.jpg', 1),
(4, 'ELEKSYON NA! ', 1, '<p><font face=\"Tahoma\">Ngayong May 9, 2022 ang nakatakdang araw ng paghahalal ng mga susunod na lider ng ating Bayan sa pamunuang Lokal at Nasyonal.</font></p><p><font face=\"Tahoma\">Paalala! Bago pumunta sainyong mga designated Precints, siguraduhing dala ninyo ang inyong Valid ID/s, Vaccination Card, at ,kung maaari, kodigo ng inyong mga nais Iboto. Pag dating sa voting center, mag tungo sa Voters Assistance Desk (VAD) para alamin ang inyong Precinct at Sequence Number.&nbsp;</font></p><p><font face=\"Tahoma\">Sa pag boto, itiman ang loob ng bilog sa tabi ng pangalan ng kandidatong nais Iboto. Tandaan na ang bilog ay matatagpuan sa gawing kaliwa ng pangalan ng kandidato. Siguraduhing hindi lalagpas, kukulangin, o masyadong didiinan ang pag shade sa balota. Ang iyong balota ay nag-iisa lamang kayat alagaan itong mabuti. Bago lumabas, suriing maigi ang inyong resibo at ihulog Ito sa nakatalagang lagayan.</font></p><p><font face=\"Tahoma\">Make your votes count, CvSUeños. Maging bahagi ng pagbuo ng kasaysayan. Wag sayangin ang pagkakataon at bumoto ng naaayon sa kunsensya, prinsipyot pananaw. Alalahaning ang bawat boto ay may kakayanang makapagpabago ng hinaharap.</font></p><p><font face=\"Tahoma\">Vote wisely, CvSUeños! Vote wisely, Pilipinas!</font></p><p><font face=\"Tahoma\">Corda populi ad veritatem accendens!&nbsp;</font></p><p><font face=\"Tahoma\">Igniting the hearts of people on truth!&nbsp;</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">Layout ni Nicole Ann Teotico</font></p><p><font face=\"Tahoma\">#TheFlare</font></p><p><font face=\"Tahoma\">#May9Elections</font></p><p><font face=\"Tahoma\">#Election2022</font></p><p><font face=\"Tahoma\">#PHNationalElection</font></p><p><font face=\"Tahoma\">#PHLocalElection</font></p><div><br></div>', '2022-05-20 13:13:27', NULL, 'ELEKSYON-NA!-', '2c46236543f49182ab862f771b16b303.jpg', 1),
(5, 'D-DAY ', 5, '<p><font face=\"Verdana\">ni Teresa May Sarzata</font></p><p><font face=\"Verdana\"><br></font></p><p><font face=\"Verdana\">Iminulat ko ang aking mga mata nang maramdaman ko ang pagtama ng sinag ng araw sa aking mukha.</font></p><p><font face=\"Verdana\">Inunat ko ang aking mga braso, at dahan-dahang bumangon. Sinipat ko ang labas ng aming payak na tahanan, sinamyo ang ihip ng hangin, at tumingala sa nagliliwanag na kalangitan.</font></p><p><font face=\"Verdana\">\"Naway isa itong mabuting senyales ng magandang kinabukasan.\" ani ko sa aking sarili.</font></p><p><font face=\"Verdana\">Matapos malamanan ang sikmura, at ayusin ang sarili. Inihanda ko ang mga dadalhin ko para sa araw na ito, at humugot ng malalim na hinga.</font></p><p><font face=\"Verdana\">Sa wakas, ito na ang araw na magagawa ko na ang aking tungkulin.</font></p><p><font face=\"Verdana\">Bahagyang nakalulula ang mga pangyayari nitong mga nakaraang araw. Sa ilalim ng katirikan ng araw, at maging sa pagbuhos ng ulan, hindi matapos-tapos ang kaliwa’t-kanang kampanya, debate, at diskurso sa bawat kanto tungkol sa mga pulitiko.</font></p><p><font face=\"Verdana\">Tama ang nasa isip mo. Ito na ang araw na titintahan ko ang aking balota ng mga pangalang maaaring magsalba sa lupang ating tinatapakan.</font></p><p><font face=\"Verdana\">Nakatutuwang isipin na isa ako sa binigyan ng karapatan na maghalal ng isa sa pinakamataas na posisyon para sa bayan.</font></p><p><font face=\"Verdana\">Kabado akong naglalakad patungo sa silid sa unang pagkakataon. Batid ko ang malalagkit na titig ng ilan, may ilan na sumisensyas-senyas pa, at may ilan din namang tahimik na nagmamasid sa isang sulok.</font></p><p><font face=\"Verdana\">Alam kong may mga iniisip ang bawat isa, ngunit heto ako. Bitbit lamang ay ang tapang at ang buong desisyon na nagawa ko.</font></p><p><font face=\"Verdana\">Bitbit ang papel at lapis, buong lakas akong tumungo sa silya, at ngumiti ng bahagya.</font></p><p><font face=\"Verdana\">“Wala man akong isang libo sa kamay, mayroon naman akong lakas ng loob para tumindig sa inaasam na kinabukasan.” bulong sa sarili habang binabagtas ko ang daan pabalik sa aming tahanan.</font></p><p><font face=\"Verdana\">Bayan, naway maisalba ka.</font></p><p><font face=\"Verdana\"><br></font></p><p><font face=\"Verdana\">Photo taken by: Nastassja Braceros | Photo Editor</font></p><p><font face=\"Verdana\"><br></font></p><p><font face=\"Verdana\">#Eleksyon2022</font></p><p><font face=\"Verdana\">#ParaSaBayan</font></p><p><font face=\"Verdana\">#ParaSaKinabukasan</font></p><p><font face=\"Verdana\">#NasaKamayMoAngBuhayNgLahat</font></p><p><font face=\"Verdana\">#LitMonday</font></p><p><font face=\"Verdana\">#TheFlare</font></p><div><br></div>', '2022-05-20 13:14:23', '2022-05-20 19:20:33', 'D-DAY-', '130910715bc7f94e44f29cefdeeae73e.jpg', 1),
(13, 'Who are they? ', 5, '<p><font face=\"Verdana\">by Julienne Eunice Irinco</font></p><p><font face=\"Verdana\">Who are those people perspiring inside the building, in the field, in the sky, and above the waters? Appearing like they never take a break. Shifting the night into day. Working hard to provide necessities.&nbsp;</font></p><p><font face=\"Verdana\">They are the Filipino laborers, who work an average of 8 hours per day, however some work longer. They have been fighting for better working conditions for centuries, and continue to do so every year.</font></p><p><font face=\"Verdana\">If there are enough fish in the ocean, they will not go to another. It is not worthy to be enslaved to a work that you do not adore. One must work in a career that will meet their everyday expenses while also allowing them to save for the future.</font></p><p><font face=\"Verdana\">If the government is unable to offer what they deserve and if socio-political issues cannot be resolved, we cannot blame those laborers who sail away from the island, yearning for a better place beyond. Again, who are they? They are labor workers from the Philippines. Responsible, trustworthy, and diligent.&nbsp;</font></p><p><font face=\"Verdana\">Who are they? Amidst having little income, and demanding work, they continue to work in a nation where the majority of ones pay is spent on loans, taxes, and debts, and what is left is insufficient. Again, they are the Filipino laborers. Remember them.</font></p><p><font face=\"Verdana\"><br></font></p><p><font face=\"Verdana\">Photo taken by: Wayne Gerodias | Senior Photojournalist</font></p><p><font face=\"Verdana\">#Eleksyon2022</font></p><p><font face=\"Verdana\">#ParaSaBayan</font></p><p><font face=\"Verdana\">#ParaSaKinabukasan</font></p><p><font face=\"Verdana\">#NasaKamayMoAngBuhayNgLahat</font></p><p><font face=\"Verdana\">#LitMonday</font></p><p><font face=\"Verdana\">#TheFlare</font></p><div><br></div>', '2022-05-20 21:53:23', NULL, 'Who-are-they?-', 'b9240ce6d66470ec195d9e1b4d9052bd.jpg', 1),
(14, 'For', 5, '<p><font face=\"Tahoma\">by Rickie Cathleen Javier</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">Tensed. Excited. That is how I am feeling today.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">As I saw strange faces wearing the same color shirt as mine, my heart pounded. Their gaze was drawn to me.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">\"Hey everyone, this is my blockmate, and she will be joining us today,\" my blockmate introduced me, and the volunteers waved their hands. I waved back and genuinely smiled, ignoring the fact that my face was obscured by the mask I was wearing.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">We talked for a while before deciding to wait for the shuttle to pick us up in a pastry shop.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">There are three small tables with benches, then I noticed an elderly man sitting quietly on the last table. He had my entire attention.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">His clothes and slippers appear worn, and his eyes seem tired and glassy. His wrinkles are apparent, and his nails are long. His body was frail. I lowered my gaze to the floor and bit my lower lip, trying hard not to shed tears.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">Volunteers gave him doughnuts and addressed him as tatay.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">I shifted my focus, and since it was humid, I decided to buy extra bottled water just in case.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">I stood up and went to the pastry shops cashier. But as soon as I sat back down on the stool, I noticed tatay crying, as well as some of the volunteers; some are already crying, while others appear to be fighting hard not to shed a single tear.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">I found myself handling the water bottles to Tatay out of nowhere. He took it and set it beside him.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">My heart felt as if it had been shattered. I sat down quietly next to my blockmate, who was also crying. I nodded and settled in to hear Tatays story.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">It was vague because he was struggling to speak due to his age, but I knew he has no permanent shelter and is also raising his grandchildren. They are unable to eat three times a day due to a lack of financial resources. To put it succinctly, they are struggling.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">I inhaled a harsh breath while formulating my thoughts.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">Now, tell me, are we really going to vote for a candidate who lacks real vision of the lives of the marginalized sector?</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">Will we really vote for a candidate who will make a fool of himself?</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">Are we really going to vote for a candidate who does not intend to serve the people genuinely?</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">So, are we still humane?</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">We always have these high standards when it comes to self-interest, but what happened to our standard for governance?</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">Now I know.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">We are not voting solely for ourselves.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">We are not voting for the purpose of electing a President for a six-year term.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">We are not simply doing the trend.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">We are not just exercising our right and duty by voting.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">We are casting our ballots for others.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">For the elderly.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">For the childrens sake.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">For the time being.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">For the future.</font></p><p><font face=\"Tahoma\"><br></font></p><p><font face=\"Tahoma\">Photo taken by: Howard Marquez | Production Editor</font></p><p><font face=\"Tahoma\">#Eleksyon2022</font></p><p><font face=\"Tahoma\">#ParaSaBayan</font></p><p><font face=\"Tahoma\">#ParaSaKinabukasan</font></p><p><font face=\"Tahoma\">#NasaKamayMoAngBuhayNgLahat</font></p><p><font face=\"Tahoma\">#LitMonday</font></p><p><font face=\"Tahoma\">#TheFlare</font></p><div><br></div>', '2022-05-21 20:28:36', NULL, 'For', 'fe83fafd229989cd50fc7d8c4e7a7be1.jpg', 1),
(18, 'CS Dragons', 6, '<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0px;\"><div dir=\"auto\" style=\"\"><div dir=\"auto\"><div dir=\"auto\">JUST IN | CS Dragons took the breath away of EDUC Phoenix advancing in the lower bracket to finals of Junior Division during the Sportfest 2019 held at Room 505 in CvSU - Imus.</div><div dir=\"auto\"><br></div><div dir=\"auto\"><a href=\"http://#CvSUImusSportsfest2019\">#CvSUImusSportsfest2019</a></div><div dir=\"auto\"><a href=\"http://#TheFlareUpdates\">#TheFlareUpdates</a></div></div></div></div>', '2022-05-26 22:05:14', '2022-05-30 00:42:39', 'CS-Dragons', '0ee4987cd458c0771d39b6b9bec7c8ca.jpg', 1),
(19, 'Ignorantia Juris Non Excusat', 4, '<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0px;\"><div dir=\"auto\" style=\"\">By Julienne Eunice Irinco</div><div dir=\"auto\" style=\"\"><br></div></div><div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><div dir=\"auto\" style=\"\">\"Ignorance of the law excuses no one from compliance therewith.\"</div><div dir=\"auto\" style=\"\">Act. 3, Civil Code of the Phil.</div></div><div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><div dir=\"auto\" style=\"\">This latin maxim is a legal principle that states that a person who is unaware of a law may not be excused from liability just because they were unaware of a law that they have violated.</div></div><div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><div dir=\"auto\" style=\"\">Ignorance of the law is not a valid legal defense. Even if you honestly did not realize you were breaking the law, you cannot justify your acts by claiming you were unaware they were illegal.</div></div><div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><div dir=\"auto\" style=\"\">It is a matter of convenience that the rule of law ignorance exists. If it were the other way around, it would be too easy for people to avoid the consequences of their actions, which would be troublesome for our legal system.</div></div><div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><div dir=\"auto\" style=\"\">For example,  if a woman fails to file and/or pay any internal revenue tax at the time or times specified by law or regulation, she cannot claim ignorance of the consequences of the offense for which she was convicted.</div></div><div class=\"cxmmr5t8 oygrvhab hcukyx3x c1et5uql o9v6fnle ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px;\"><div dir=\"auto\" style=\"\"><a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 q66pz984 b1v8xokw\" href=\"https://www.facebook.com/hashtag/wordsonwednesday?__eep__=6&amp;__cft__[0]=AZW2Ug6KQxBVwMIIF8rK1cb9ZflcTC3bDuY3AF3DCyEprmPcOQaAos0WN8WI4YDAdwK2bJvgn9sUyJPClOQ32ozT-M2r1uOsvYVTfKI4Y5_qTAm4Lyt7u0-xP_Y9HNBvUHYo8xt_bmVquq-7B6ZOyuFU&amp;__tn__=*NK-R\" role=\"link\" tabindex=\"0\" style=\"cursor: pointer; list-style: none; border-width: 0px; border-style: initial; border-color: initial; padding: 0px; margin: 0px; touch-action: manipulation; text-align: inherit; display: inline; -webkit-tap-highlight-color: transparent;\">#WordsonWednesday</a></div><div dir=\"auto\" style=\"\"><a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 q66pz984 b1v8xokw\" href=\"https://www.facebook.com/hashtag/feature?__eep__=6&amp;__cft__[0]=AZW2Ug6KQxBVwMIIF8rK1cb9ZflcTC3bDuY3AF3DCyEprmPcOQaAos0WN8WI4YDAdwK2bJvgn9sUyJPClOQ32ozT-M2r1uOsvYVTfKI4Y5_qTAm4Lyt7u0-xP_Y9HNBvUHYo8xt_bmVquq-7B6ZOyuFU&amp;__tn__=*NK-R\" role=\"link\" tabindex=\"0\" style=\"cursor: pointer; list-style: none; border-width: 0px; border-style: initial; border-color: initial; padding: 0px; margin: 0px; touch-action: manipulation; text-align: inherit; display: inline; -webkit-tap-highlight-color: transparent;\">#Feature</a></div><div dir=\"auto\" style=\"\"><a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 q66pz984 b1v8xokw\" href=\"https://www.facebook.com/hashtag/languageanddefinition?__eep__=6&amp;__cft__[0]=AZW2Ug6KQxBVwMIIF8rK1cb9ZflcTC3bDuY3AF3DCyEprmPcOQaAos0WN8WI4YDAdwK2bJvgn9sUyJPClOQ32ozT-M2r1uOsvYVTfKI4Y5_qTAm4Lyt7u0-xP_Y9HNBvUHYo8xt_bmVquq-7B6ZOyuFU&amp;__tn__=*NK-R\" role=\"link\" tabindex=\"0\" style=\"cursor: pointer; list-style: none; border-width: 0px; border-style: initial; border-color: initial; padding: 0px; margin: 0px; touch-action: manipulation; text-align: inherit; display: inline; -webkit-tap-highlight-color: transparent;\">#LanguageandDefinition</a></div><div dir=\"auto\" style=\"\"><a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 q66pz984 b1v8xokw\" href=\"https://www.facebook.com/hashtag/theflaredaily?__eep__=6&amp;__cft__[0]=AZW2Ug6KQxBVwMIIF8rK1cb9ZflcTC3bDuY3AF3DCyEprmPcOQaAos0WN8WI4YDAdwK2bJvgn9sUyJPClOQ32ozT-M2r1uOsvYVTfKI4Y5_qTAm4Lyt7u0-xP_Y9HNBvUHYo8xt_bmVquq-7B6ZOyuFU&amp;__tn__=*NK-R\" role=\"link\" tabindex=\"0\" style=\"cursor: pointer; list-style: none; border-width: 0px; border-style: initial; border-color: initial; padding: 0px; margin: 0px; touch-action: manipulation; text-align: inherit; display: inline; -webkit-tap-highlight-color: transparent;\">#TheFlareDaily</a></div><div dir=\"auto\" style=\"\"><a class=\"oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl gpro0wi8 q66pz984 b1v8xokw\" href=\"https://www.facebook.com/hashtag/theflarewow?__eep__=6&amp;__cft__[0]=AZW2Ug6KQxBVwMIIF8rK1cb9ZflcTC3bDuY3AF3DCyEprmPcOQaAos0WN8WI4YDAdwK2bJvgn9sUyJPClOQ32ozT-M2r1uOsvYVTfKI4Y5_qTAm4Lyt7u0-xP_Y9HNBvUHYo8xt_bmVquq-7B6ZOyuFU&amp;__tn__=*NK-R\" role=\"link\" tabindex=\"0\" style=\"cursor: pointer; list-style: none; border-width: 0px; border-style: initial; border-color: initial; padding: 0px; margin: 0px; touch-action: manipulation; text-align: inherit; display: inline; -webkit-tap-highlight-color: transparent;\">#TheFlareWow</a></div></div>', '2022-05-26 22:20:26', NULL, 'Ignorantia-Juris-Non-Excusat', 'c120aab18f188f7879ea800c01181674.jpg', 1),
(20, 'LigtasNaBalikEskwela ', 3, '<p>Tandaang karapatan natin ang edukasyon kaya’t marapat tayong makibaka para rito. Kalampagin ang dapat kalampagin. Huwag nating hayaang maging ignorante ang susunod na salinlahi dahil sa kakulangan ng kaalaman at kamalayan sa iba’t ibang disiplina at samot-saring isyung panlipunan.&nbsp;<br></p><p><br></p><p>Maaari rin itong ma-access sa Google Drive link na ito ang aming kauna-unahang news magazine:</p><p><a href=\"https://bit.ly/3BnNthh\">https://bit.ly/3BnNthh</a></p><p><br></p><p>Guhit at disenyo ni: Rae Niño Pelagia&nbsp;</p><p>Layout ni: Jessabell Encarnacion</p>', '2022-05-27 13:05:37', '2022-05-30 00:41:27', 'LigtasNaBalikEskwela-', 'aa2aff4865e1b099c9c5009af6c14ccf.jpg', 1),
(22, 'PANINIWALA', 7, '<p>Kwentuhan ni Kabsuy at Mingming</p><p>Guhit Nina: Van Mercado &amp; Aldrian Barias</p><p>Sulat ni: Carl Andrei Alquero&nbsp;</p><p><br></p><p>#EditorialCartoon</p><p>#KabsuyatMingming</p><p>#TheFlareDaily</p><p>#TheFlRe</p>', '2022-05-31 15:23:21', NULL, 'PANINIWALA', 'fe83fafd229989cd50fc7d8c4e7a7be1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblresetrequest`
--

CREATE TABLE `tblresetrequest` (
  `id` int(11) NOT NULL,
  `code` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresetrequest`
--

INSERT INTO `tblresetrequest` (`id`, `code`, `email`) VALUES
(14, '1628a37ab8e466', 'karina.tesaluna@cvsu.edu.ph'),
(16, '1628c9255b5094', 'tesalunakarina@gmail.com'),
(17, '1628c92916fe4f', 'tesalunakarina@gmail.com'),
(18, '1628c92a6b05cf', 'tesalunakarina@gmail.com'),
(19, '1628c92da13346', 'tesalunakarina@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblviews`
--

CREATE TABLE `tblviews` (
  `id` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblviews`
--

INSERT INTO `tblviews` (`id`, `accountid`, `postid`, `date`) VALUES
(1, 1, 1, '2022-05-21'),
(2, 1, 13, '2022-05-21'),
(3, 3, 1, '2022-05-21'),
(4, 3, 13, '2022-05-21'),
(5, 4, 13, '2022-05-21'),
(6, 4, 1, '2022-05-21'),
(7, 3, 14, '2022-05-21'),
(8, 3, 5, '2022-05-22'),
(9, 3, 4, '2022-05-22'),
(10, 3, 3, '2022-05-22'),
(11, 3, 2, '2022-05-22'),
(12, 1, 14, '2022-05-22'),
(13, 1, 5, '2022-05-22'),
(14, 1, 4, '2022-05-22'),
(15, 5, 14, '2022-05-22'),
(16, 6, 4, '2022-05-22'),
(17, 7, 14, '2022-05-22'),
(18, 9, 14, '2022-05-22'),
(19, 9, 3, '2022-05-22'),
(20, 9, 5, '2022-05-22'),
(21, 8, 13, '2022-05-22'),
(22, 8, 4, '2022-05-22'),
(23, 11, 14, '2022-05-22'),
(24, 11, 13, '2022-05-22'),
(25, 11, 5, '2022-05-22'),
(26, 11, 4, '2022-05-22'),
(27, 11, 3, '2022-05-22'),
(28, 11, 2, '2022-05-22'),
(29, 11, 1, '2022-05-22'),
(30, 10, 1, '2022-05-22'),
(31, 13, 3, '2022-05-22'),
(32, 13, 14, '2022-05-22'),
(33, 13, 4, '2022-05-22'),
(34, 10, 5, '2022-05-22'),
(35, 16, 14, '2022-05-22'),
(36, 16, 13, '2022-05-22'),
(37, 16, 3, '2022-05-22'),
(38, 16, 2, '2022-05-22'),
(39, 17, 13, '2022-05-22'),
(40, 17, 5, '2022-05-22'),
(41, 17, 2, '2022-05-22'),
(42, 17, 14, '2022-05-22'),
(43, 18, 1, '2022-05-22'),
(44, 19, 14, '2022-05-22'),
(45, 20, 13, '2022-05-22'),
(46, 20, 14, '2022-05-22'),
(47, 21, 14, '2022-05-22'),
(48, 1, 3, '2022-05-22'),
(49, 22, 13, '2022-05-22'),
(50, 1, 2, '2022-05-22'),
(51, 23, 14, '2022-05-22'),
(52, 26, 14, '2022-05-22'),
(53, 27, 14, '2022-05-22'),
(54, 29, 5, '2022-05-22'),
(55, 29, 4, '2022-05-22'),
(56, 30, 14, '2022-05-22'),
(57, 30, 1, '2022-05-22'),
(58, 28, 14, '2022-05-22'),
(59, 31, 13, '2022-05-22'),
(60, 31, 14, '2022-05-22'),
(61, 31, 4, '2022-05-22'),
(62, 33, 14, '2022-05-22'),
(63, 33, 13, '2022-05-22'),
(64, 34, 14, '2022-05-22'),
(65, 2, 13, '2022-05-22'),
(66, 2, 4, '2022-05-22'),
(67, 36, 14, '2022-05-23'),
(68, 36, 1, '2022-05-23'),
(69, 36, 3, '2022-05-23'),
(70, 39, 5, '2022-05-23'),
(71, 40, 4, '2022-05-23'),
(72, 41, 14, '2022-05-23'),
(73, 41, 4, '2022-05-23'),
(74, 41, 5, '2022-05-23'),
(75, 43, 14, '2022-05-23'),
(76, 44, 13, '2022-05-23'),
(77, 45, 5, '2022-05-23'),
(78, 45, 14, '2022-05-23'),
(79, 45, 2, '2022-05-23'),
(80, 45, 3, '2022-05-23'),
(81, 45, 13, '2022-05-23'),
(82, 46, 13, '2022-05-23'),
(83, 46, 14, '2022-05-23'),
(86, 2, 14, '2022-05-24'),
(87, 48, 1, '2022-05-24'),
(90, 50, 4, '2022-05-24'),
(91, 50, 2, '2022-05-24'),
(92, 51, 4, '2022-05-24'),
(93, 51, 3, '2022-05-24'),
(94, 52, 13, '2022-05-25'),
(95, 52, 14, '2022-05-25'),
(96, 1, 18, '2022-05-26'),
(97, 1, 19, '2022-05-26'),
(98, 3, 19, '2022-05-26'),
(99, 3, 20, '2022-05-27'),
(100, 1, 20, '2022-05-27'),
(101, 17, 19, '2022-05-28'),
(102, 53, 20, '2022-05-28'),
(103, 2, 18, '2022-05-29'),
(104, 2, 3, '2022-05-29'),
(105, 2, 20, '2022-05-29'),
(106, 2, 19, '2022-05-29'),
(107, 2, 1, '2022-05-30'),
(108, 54, 20, '2022-05-30'),
(109, 54, 4, '2022-05-30'),
(110, 54, 19, '2022-05-30'),
(111, 54, 3, '2022-05-30'),
(112, 54, 1, '2022-05-30'),
(113, 54, 13, '2022-05-30'),
(114, 54, 14, '2022-05-30'),
(115, 55, 20, '2022-05-30'),
(116, 55, 19, '2022-05-30'),
(117, 56, 20, '2022-05-30'),
(118, 3, 18, '2022-05-31'),
(119, 57, 22, '2022-05-31'),
(120, 58, 20, '2022-05-31'),
(121, 1, 22, '2022-06-01'),
(122, 3, 22, '2022-06-03'),
(123, 2, 22, '2022-06-03'),
(124, 59, 19, '2022-06-04'),
(125, 59, 4, '2022-06-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `tbllikes`
--
ALTER TABLE `tbllikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountid` (`accountid`),
  ADD KEY `postid` (`postid`);

--
-- Indexes for table `tblofficer`
--
ALTER TABLE `tblofficer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positionid` (`positionid`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposition`
--
ALTER TABLE `tblposition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `tblresetrequest`
--
ALTER TABLE `tblresetrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblviews`
--
ALTER TABLE `tblviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountid` (`accountid`),
  ADD KEY `postid` (`postid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbllikes`
--
ALTER TABLE `tbllikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tblofficer`
--
ALTER TABLE `tblofficer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblposition`
--
ALTER TABLE `tblposition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblresetrequest`
--
ALTER TABLE `tblresetrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblviews`
--
ALTER TABLE `tblviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
