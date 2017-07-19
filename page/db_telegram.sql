-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jun 2017 pada 08.00
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_telegram`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `json_data`
--

CREATE TABLE `json_data` (
  `json` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `json_data`
--

INSERT INTO `json_data` (`json`) VALUES
('{"ok":true,"result":{"message_id":614,"from":{"id":369348634,"first_name":"w4rl0ck_bot","username":"w4rl0ck_bot"},"chat":{"id":248735818,"first_name":"Asnan Zulfikar","last_name":"Ardianto","type":"private"},"date":1497419414,"text":"ngguna yang sah.."}}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
