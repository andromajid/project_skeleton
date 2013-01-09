-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2012 at 04:54 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `project_start`
--

-- --------------------------------------------------------

--
-- Table structure for table `site_menu`
--

CREATE TABLE IF NOT EXISTS `site_menu` (
  `menu_id` int(15) NOT NULL AUTO_INCREMENT,
  `menu_par_id` int(15) NOT NULL DEFAULT '0',
  `menu_title` varchar(255) DEFAULT NULL,
  `menu_description` text,
  `menu_link` varchar(255) DEFAULT NULL,
  `menu_page_id` int(15) NOT NULL DEFAULT '0',
  `menu_order_by` int(15) NOT NULL DEFAULT '0',
  `menu_location` enum('user','member','stockist','admin') NOT NULL,
  `menu_is_active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `site_menu`
--

INSERT INTO `site_menu` (`menu_id`, `menu_par_id`, `menu_title`, `menu_description`, `menu_link`, `menu_page_id`, `menu_order_by`, `menu_location`, `menu_is_active`) VALUES
(2, 0, 'Kelola Halaman', 'Menu untuk mengelola Halaman User dan Halaman Member', '#', 0, 0, 'admin', '1'),
(3, 0, 'Kelola Menu', 'Menu untuk mengelola Menu Halaman User, Halaman Member, Halaman Administrator', '#', 0, 14, 'admin', '1'),
(4, 0, 'Informasi', 'Menu untuk mengelola Informasi Berita, Promo, Top Leader', '#', 0, 2, 'admin', '1'),
(5, 0, 'Data Kartu', 'Menu untuk menampilkan Data Kartu Perusahaan', '#', 0, 3, 'admin', '1'),
(6, 0, 'Data Member', 'Menu untuk menampilkan Data Member yang telah terdaftar', 'admin/member/', 0, 5, 'admin', '1'),
(7, 0, 'Transfer Komisi', 'Menu untuk rekapitulasi Komisi Member yang akan ditransfer', '#', 0, 6, 'admin', '1'),
(8, 0, 'Reward', 'Menu untuk mengelola Reward Member', '#', 0, 7, 'admin', '1'),
(9, 0, 'Testimoni', 'Menu untuk mengelola testimoni dari Member', 'admin/testimonial/', 0, 8, 'admin', '1'),
(10, 0, 'Online Support', 'Menu untuk mengelola Online Support pada web', 'admin/support', 0, 9, 'admin', '1'),
(11, 0, 'Data Bank', 'Menu unuk mengelola Data Bank yang dipakai sebagai Bank yang terdaftar (dipakai pada saat registrasi member)', 'admin/bank/', 0, 10, 'admin', '1'),
(13, 0, 'Galeri', 'Menu untuk mengelola Data Galeri', '#', 0, 11, 'admin', '1'),
(16, 0, 'Kelola Administrator', 'Menu untuk mengelola Administrator dan hak akses tiap Group Administrator', '#', 0, 18, 'admin', '1'),
(88, 0, 'TERM OF SERVICE', '', 'page/view/21', 21, 8, 'user', '1'),
(20, 3, 'Menu User', '', 'admin/menu/list_menu/user', 0, 1, 'admin', '1'),
(22, 3, 'Menu Administrator', '', 'admin/menu/list_menu/admin', 0, 3, 'admin', '1'),
(23, 4, 'Berita', '', 'admin/info/news', 0, 1, 'admin', '1'),
(24, 4, 'Promo', '', 'admin/info/promo/', 0, 2, 'admin', '1'),
(25, 4, 'Top Leader', NULL, 'index.php?do=news_admin.leaders&act=list', 0, 3, 'admin', '0'),
(26, 5, 'Daftar Kartu', '', 'admin/serial/serial_list', 0, 1, 'admin', '1'),
(27, 5, 'Pembelian Kartu Pasif', '', 'admin/serial/buy', 0, 2, 'admin', '1'),
(63, 0, 'test', NULL, 'page/view/12', 12, 1, 'member', '0'),
(80, 0, 'CEK KARTU', '', 'serial/', 0, 1, 'user', '1'),
(81, 7, 'History', 'menu history transfer', 'admin/transfer/history/', 0, 31, 'admin', '1'),
(65, 0, 'Marketing toll', NULL, 'page/view/14', 14, 2, 'member', '0'),
(35, 16, 'Grup Administrator', NULL, 'admin/system/group_admin', 0, 1, 'admin', '1'),
(36, 16, 'User Administrator', '', 'admin/system/user', 0, 2, 'admin', '1'),
(40, 0, 'Iklan', 'Menu untuk menampilkan iklan dari member', 'admin/iklan/', 0, 1, 'admin', '0'),
(43, 0, 'produk', 'daftar produk', 'admin/product/', 0, 21, 'admin', '1'),
(49, 2, 'Halaman User', 'hmmmmmm', 'admin/page/user', 0, 19, 'admin', '1'),
(50, 2, 'Halaman Member', 'lllll', 'admin/page/member', 0, 20, 'admin', '1'),
(52, 0, 'widget', '', 'admin/widget/', 0, 22, 'admin', '0'),
(55, 13, 'Kategori Galeri', 'daftar kategori', 'admin/gallery/category', 0, 23, 'admin', '1'),
(56, 13, 'Daftar Galleri', '', 'admin/gallery', 0, 24, 'admin', '1'),
(57, 7, 'Komisi Bulanan', 'Transfer Komisi Cash', 'admin/transfer/', 0, 25, 'admin', '1'),
(60, 8, 'Daftar Reward', '', 'admin/reward/', 0, 28, 'admin', '1'),
(61, 8, 'Reward Member', '', 'admin/reward/member/', 0, 29, 'admin', '1'),
(98, 0, 'PRODUK', '', 'page/view/25', 25, 40, 'user', '1'),
(73, 0, 'TESTIMONIAL', '', 'testimonial', 0, 2, 'user', '1'),
(69, 0, 'MARKETING PLAN', '', 'page/view/2', 0, 3, 'user', '1'),
(78, 0, 'REWARD', NULL, 'page/view/18', 18, 9, 'user', '1'),
(99, 43, 'Produk', 'penambahan Produk', 'admin/product/', 0, 39, 'admin', '1'),
(82, 0, 'Download', '', 'admin/download/', 0, 32, 'admin', '0'),
(83, 0, 'DOWNLOAD', 'menu untuk download', 'download', 0, 10, 'user', '1'),
(84, 0, 'Automaintenance', 'Menu Untuk Automaintenance', 'admin/automaintenance/auto_list', 0, 33, 'admin', '1'),
(87, 0, 'FAQ', NULL, 'page/view/20', 20, 7, 'user', '1'),
(89, 0, 'Pesan Member', '', 'admin/message/', 0, 34, 'admin', '0'),
(90, 7, 'Komisi Harian', '', 'admin/transfer/mingguan', 0, 35, 'admin', '1'),
(91, 0, 'Report', '', 'admin/report', 0, 36, 'admin', '1'),
(92, 91, 'Report Harian', '', 'admin/report/', 0, 37, 'admin', '1'),
(93, 91, 'Report Aktivasi', '', 'admin/report/aktivasi', 0, 38, 'admin', '1'),
(94, 0, 'KODE ETIK', '', 'page/view/11', 0, 39, 'user', '1'),
(101, 43, 'Daftar Excel Member List', '', '/admin/repeat_order/approval_list', 0, 41, 'admin', '1'),
(100, 43, 'Approval Repeat order', '', 'admin/repeat_order/', 0, 40, 'admin', '1'),
(102, 13, 'Slide', '', 'admin/slide', 0, 42, 'admin', '1');
