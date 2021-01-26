-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 02:43 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegcov1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kel`
--

CREATE TABLE `tb_kel` (
  `kel_id` int(11) NOT NULL,
  `kel_peg_id` int(11) NOT NULL,
  `kel_peg_nama` varchar(30) NOT NULL,
  `kel_peg_nip` varchar(20) NOT NULL,
  `kel_peg_nik` varchar(20) NOT NULL,
  `kel_nama` varchar(30) NOT NULL,
  `kel_jk` enum('Laki-laki','Perempuan') NOT NULL,
  `kel_hubungan` enum('Suami/Istri','Anak/Menantu','Bapak/Ibu/Mertua','Kakak/Adik','Kakek/Nenek','Cucu','Paman/Bibi','Sepupu','Keponakan','Teman','Lainnya') NOT NULL,
  `kel_tgllahir` date NOT NULL,
  `kel_nik` varchar(20) NOT NULL,
  `kel_stapeg` varchar(30) NOT NULL,
  `kel_unitkerja` varchar(40) NOT NULL,
  `kel_nip` varchar(20) NOT NULL,
  `kel_tglswab` date NOT NULL,
  `kel_tglhasil` date NOT NULL,
  `kel_starawat` enum('Isman','Rujuk') NOT NULL,
  `kel_staakhir` enum('Dalam Proses','Sembuh','Meninggal') NOT NULL,
  `kel_ket` text NOT NULL,
  `kel_tgl` date NOT NULL,
  `kel_tglinput` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kel`
--

INSERT INTO `tb_kel` (`kel_id`, `kel_peg_id`, `kel_peg_nama`, `kel_peg_nip`, `kel_peg_nik`, `kel_nama`, `kel_jk`, `kel_hubungan`, `kel_tgllahir`, `kel_nik`, `kel_stapeg`, `kel_unitkerja`, `kel_nip`, `kel_tglswab`, `kel_tglhasil`, `kel_starawat`, `kel_staakhir`, `kel_ket`, `kel_tgl`, `kel_tglinput`) VALUES
(6, 3, 'marti', '5656', '5566', 'naruto', 'Laki-laki', 'Anak/Menantu', '1996-04-15', '1112', '0', '', '', '2021-01-11', '0000-00-00', 'Isman', 'Dalam Proses', ' esdgfhjk\r\n                    ', '2020-12-20', '2021-01-20'),
(7, 3, 'marti', '5656', '5566', 'naruto', 'Laki-laki', 'Anak/Menantu', '1996-04-15', '1112', '0', '', '', '2021-01-11', '0000-00-00', 'Isman', 'Dalam Proses', ' ssdgvfhbjnkm\r\n                    ', '2020-12-20', '2021-01-20'),
(8, 3, 'marti', '5656', '5566', 'naruto', 'Laki-laki', 'Anak/Menantu', '1996-04-15', '1112', '0', '', '', '2021-01-11', '0000-00-00', 'Rujuk', 'Dalam Proses', 'efdsfdsfdsf \r\n                    ', '2021-01-20', '2021-01-20'),
(9, 3, 'marti', '5656', '5566', 'naruto', 'Laki-laki', 'Anak/Menantu', '1996-04-15', '1112', '0', '', '', '2021-01-11', '0000-00-00', '', 'Dalam Proses', 'rssdfdsf\r\n                    ', '2021-01-20', '2021-01-20'),
(10, 3, 'marti', '5656', '5566', 'sasuke', 'Laki-laki', 'Sepupu', '1983-06-09', '2229', '0', '', '', '2021-01-12', '0000-00-00', 'Isman', 'Dalam Proses', ' rrgrrwererwe\r\n                    ', '2021-01-20', '2021-01-20'),
(11, 3, 'marti', '5656', '5566', 'sasuke', 'Laki-laki', 'Sepupu', '1983-06-09', '2229', '0', '', '', '2021-01-12', '0000-00-00', '', 'Dalam Proses', ' gsgrsgrrg\r\n                    ', '2021-01-20', '2021-01-20'),
(12, 5, 'aprilia', '7878', '7788', 'goku', 'Laki-laki', 'Bapak/Ibu/Mertua', '1966-01-06', '3331', '0', '', '', '2021-01-13', '0000-00-00', 'Rujuk', 'Dalam Proses', 'hjghjkj\r\n                    ', '2020-12-20', '2021-01-20'),
(13, 5, 'aprilia', '7878', '7788', 'goku', 'Laki-laki', 'Bapak/Ibu/Mertua', '1966-01-06', '3331', '0', '', '', '2021-01-13', '0000-00-00', '', 'Dalam Proses', 'jhghkkhjkh  ', '2021-01-20', '2021-01-20'),
(14, 8, 'julius', '8282', '8822', 'nami', 'Perempuan', 'Suami/Istri', '2021-04-08', '5550', '0', '', '', '2021-01-14', '0000-00-00', 'Isman', 'Dalam Proses', ' khkbbkuhnnhk\r\n                    ', '2020-12-20', '2021-01-20'),
(15, 8, 'julius', '8282', '8822', 'nami', 'Perempuan', 'Suami/Istri', '2021-04-08', '5550', '0', '', '', '2021-01-14', '0000-00-00', 'Rujuk', 'Dalam Proses', ' jhnjnhjkkjn\r\n                    ', '2021-01-20', '2021-01-20'),
(16, 8, 'julius', '8282', '8822', 'nami', 'Perempuan', 'Suami/Istri', '2021-04-08', '5550', '0', '', '', '2021-01-14', '0000-00-00', '', 'Dalam Proses', 'iikuyhg          ', '2021-01-20', '2021-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kon`
--

CREATE TABLE `tb_kon` (
  `kon_id` int(11) NOT NULL,
  `kon_peg_id` int(11) NOT NULL,
  `kon_peg_nama` varchar(30) NOT NULL,
  `kon_peg_jk` enum('Laki-laki','Perempuan') NOT NULL,
  `kon_peg_tgllahir` date NOT NULL,
  `kon_peg_nip` varchar(20) NOT NULL,
  `kon_peg_nik` varchar(20) NOT NULL,
  `kon_peg_stapeg` varchar(30) NOT NULL,
  `kon_peg_org` varchar(40) NOT NULL,
  `kon_peg_orgunit` varchar(40) NOT NULL,
  `kon_tglswab` date NOT NULL,
  `kon_tglhasil` date NOT NULL,
  `kon_starawat` enum('Isman','Rujuk') NOT NULL,
  `kon_staakhir` enum('Dalam Proses','Sembuh','Meninggal') NOT NULL,
  `kon_ket` text NOT NULL,
  `kon_tgl` date NOT NULL,
  `kon_tglinput` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kon`
--

INSERT INTO `tb_kon` (`kon_id`, `kon_peg_id`, `kon_peg_nama`, `kon_peg_jk`, `kon_peg_tgllahir`, `kon_peg_nip`, `kon_peg_nik`, `kon_peg_stapeg`, `kon_peg_org`, `kon_peg_orgunit`, `kon_tglswab`, `kon_tglhasil`, `kon_starawat`, `kon_staakhir`, `kon_ket`, `kon_tgl`, `kon_tglinput`) VALUES
(32, 1, 'januar', 'Laki-laki', '1990-01-04', '1212', '1122', '', '', '', '2021-01-01', '0000-00-00', 'Isman', 'Dalam Proses', ' qwertyuiop\r\n                    ', '2020-12-20', '2021-12-20'),
(33, 1, 'januar', 'Laki-laki', '1990-01-04', '1212', '1122', '', '', '', '2021-01-01', '0000-00-00', 'Rujuk', 'Dalam Proses', ' asdfghjkl\r\n                    ', '2020-12-20', '2021-12-20'),
(34, 1, 'januar', 'Laki-laki', '1990-01-04', '1212', '1122', 'PNS', 'x', 'x', '2021-03-04', '2021-03-08', 'Rujuk', 'Meninggal', ' xxx\r\n                    ', '2021-01-20', '2021-01-25'),
(35, 2, 'febri', 'Perempuan', '1991-01-29', '3434', '3344', '', '', '', '2020-12-01', '0000-00-00', 'Isman', 'Dalam Proses', 'hgfhgff\r\n                    ', '2020-12-20', '2021-12-20'),
(36, 2, 'febri', 'Perempuan', '1991-01-29', '3434', '3344', '', '', '', '2020-12-01', '0000-00-00', '', 'Dalam Proses', ' asdfghjk\r\n                    ', '2021-01-20', '2021-01-20'),
(37, 3, 'marti', 'Laki-laki', '1992-01-17', '5656', '5566', '', '', '', '2021-01-03', '0000-00-00', 'Isman', 'Dalam Proses', ' ersrdfghjkl\r\n                    ', '2020-12-20', '2021-01-20'),
(38, 3, 'marti', 'Laki-laki', '1992-01-17', '5656', '5566', '', '', '', '2021-01-03', '0000-00-00', 'Isman', 'Dalam Proses', ' likugjhfv\r\n                    ', '2020-12-20', '2021-01-20'),
(39, 3, 'marti', 'Laki-laki', '1992-01-17', '5656', '5566', '', '', '', '2021-01-03', '0000-00-00', 'Isman', 'Dalam Proses', 'jjokjlhkghk\r\n                    ', '2021-01-20', '2021-01-20'),
(40, 5, 'aprilia', 'Perempuan', '1988-02-22', '7878', '7788', '', '', '', '2021-01-04', '0000-00-00', 'Rujuk', 'Dalam Proses', ' yigm hmj\r\n                    ', '2021-01-20', '2021-01-20'),
(41, 5, 'aprilia', 'Perempuan', '1988-02-22', '7878', '7788', '', '', '', '2021-01-04', '0000-00-00', '', 'Dalam Proses', ' piolikhujgy\r\n                    ', '2021-01-20', '2021-01-20'),
(42, 6, 'mei mei', 'Perempuan', '1986-07-24', '9090', '9900', '', '', '', '2021-01-05', '0000-00-00', 'Rujuk', 'Dalam Proses', 'poiughfghg \r\n                    ', '2020-12-20', '2021-01-20'),
(43, 6, 'mei mei', 'Perempuan', '1986-07-24', '9090', '9900', '', '', '', '2021-01-05', '0000-00-00', 'Isman', 'Dalam Proses', 'jkouiygjy\r\n                    ', '2021-01-20', '2021-01-20'),
(44, 7, 'juna', 'Laki-laki', '1985-08-15', '9191', '9911', '', '', '', '2021-01-06', '0000-00-00', 'Rujuk', 'Dalam Proses', ' jghhjbfh\r\n                    ', '2021-01-20', '2021-01-20'),
(45, 7, 'juna', 'Laki-laki', '1985-08-15', '9191', '9911', '', '', '', '2021-01-06', '0000-00-00', '', 'Dalam Proses', ' iuyyjgfj\r\n                    ', '2021-01-20', '2021-01-20'),
(46, 1, 'januar', 'Laki-laki', '1990-01-04', '1212', '1122', 'PNS', 'x', 'x', '2021-01-25', '2021-01-25', 'Rujuk', 'Meninggal', '2525525252525\r\n                    ', '2021-01-25', '2021-01-25'),
(47, 1, 'januar', 'Laki-laki', '1990-01-04', '1212', '1122', 'PNS', 'x', 'x', '2021-01-26', '2021-01-26', 'Isman', 'Dalam Proses', ' jjjjjj\r\n                    ', '2021-01-25', '2021-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peg`
--

CREATE TABLE `tb_peg` (
  `peg_id` int(11) NOT NULL,
  `peg_nama` varchar(30) NOT NULL,
  `peg_jk` enum('Laki-laki','Perempuan') NOT NULL,
  `peg_tgllahir` date NOT NULL,
  `peg_nip` varchar(20) NOT NULL,
  `peg_nik` varchar(20) NOT NULL,
  `peg_stapeg` varchar(30) NOT NULL,
  `peg_org` varchar(40) NOT NULL,
  `peg_orgunit` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peg`
--

INSERT INTO `tb_peg` (`peg_id`, `peg_nama`, `peg_jk`, `peg_tgllahir`, `peg_nip`, `peg_nik`, `peg_stapeg`, `peg_org`, `peg_orgunit`) VALUES
(1, 'januar', 'Laki-laki', '1990-01-04', '1212', '1122', 'PNS', 'x', 'x'),
(2, 'febri', 'Perempuan', '1991-01-29', '3434', '3344', '', '', ''),
(3, 'marti', 'Laki-laki', '1992-01-17', '5656', '5566', '', '', ''),
(5, 'aprilia', 'Perempuan', '1988-02-22', '7878', '7788', '', '', ''),
(6, 'mei mei', 'Perempuan', '1986-07-24', '9090', '9900', '', '', ''),
(7, 'juna', 'Laki-laki', '1985-08-15', '9191', '9911', '', '', ''),
(8, 'julius', 'Laki-laki', '1990-01-01', '8282', '8822', '', '', ''),
(9, 'agusti', 'Perempuan', '1979-05-26', '3737', '3377', '', '', ''),
(10, 'septiono', 'Laki-laki', '1978-05-11', '4646', '4466', '', '', ''),
(11, 'y', 'Laki-laki', '2021-01-05', '2', '2', 'PNS', 'rewr', 'fdsfs');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekap`
--

CREATE TABLE `tb_rekap` (
  `rekap_id` int(11) NOT NULL,
  `rekap_tahun` varchar(4) NOT NULL,
  `rekap_bulan` varchar(10) NOT NULL,
  `rekap_minggu` varchar(10) NOT NULL,
  `rekap_konisman` int(11) NOT NULL,
  `rekap_konrujuk` int(11) NOT NULL,
  `rekap_konsembuh` int(11) NOT NULL,
  `rekap_konmeninggal` int(11) NOT NULL,
  `rekap_konjumlah` int(11) NOT NULL,
  `rekap_kelisman` int(11) NOT NULL,
  `rekap_kelrujuk` int(11) NOT NULL,
  `rekap_kelsembuh` int(11) NOT NULL,
  `rekap_kelmeninggal` int(11) NOT NULL,
  `rekap_keljumlah` int(11) NOT NULL,
  `rekap_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekap`
--

INSERT INTO `tb_rekap` (`rekap_id`, `rekap_tahun`, `rekap_bulan`, `rekap_minggu`, `rekap_konisman`, `rekap_konrujuk`, `rekap_konsembuh`, `rekap_konmeninggal`, `rekap_konjumlah`, `rekap_kelisman`, `rekap_kelrujuk`, `rekap_kelsembuh`, `rekap_kelmeninggal`, `rekap_keljumlah`, `rekap_total`) VALUES
(32, '2020', 'December', '', 4, 2, 0, 0, 6, 3, 1, 0, 0, 4, 10),
(33, '2021', 'January', '', 2, 2, 3, 1, 8, 1, 2, 3, 1, 7, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_telp` varchar(15) NOT NULL,
  `user_akses` enum('Super','Admin') NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_nip` varchar(20) NOT NULL,
  `user_nik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_nama`, `user_email`, `user_telp`, `user_akses`, `user_name`, `user_pass`, `user_nip`, `user_nik`) VALUES
(1, 'g', 'g@g4', '124', 'Super', 'u', '7b774effe4a349c6dd82ad4f4f21d34c', '21214', '11224'),
(2, 'Sumit Sodoku', 'sumut@yahoo.com', '085476540987', 'Super', 'w', 'f1290186a5d0b1ceab27f4e77c0c5d68', '3333', '4444'),
(3, 'Sapeloh Ariati', 'sapeloh@rocket.mail', '085477651254', 'Admin', '8', 'c9f0f895fb98ab9159f51fd0297e236d', '5555', '6666'),
(5, 'Sakura Takiya', 'sakura@gmail.com', '085745760949', 'Super', '5', 'e4da3b7fbbce2345d7772b0674a318d5', '7777', '8888'),
(6, '78', '78', '78', 'Super', '78', '78', '78', '78');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kel`
--
ALTER TABLE `tb_kel`
  ADD PRIMARY KEY (`kel_id`);

--
-- Indexes for table `tb_kon`
--
ALTER TABLE `tb_kon`
  ADD PRIMARY KEY (`kon_id`);

--
-- Indexes for table `tb_peg`
--
ALTER TABLE `tb_peg`
  ADD PRIMARY KEY (`peg_id`);

--
-- Indexes for table `tb_rekap`
--
ALTER TABLE `tb_rekap`
  ADD PRIMARY KEY (`rekap_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kel`
--
ALTER TABLE `tb_kel`
  MODIFY `kel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_kon`
--
ALTER TABLE `tb_kon`
  MODIFY `kon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tb_peg`
--
ALTER TABLE `tb_peg`
  MODIFY `peg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_rekap`
--
ALTER TABLE `tb_rekap`
  MODIFY `rekap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
