-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2023 pada 06.38
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kategori` varchar(256) DEFAULT NULL,
  `kode_product` varchar(256) DEFAULT NULL,
  `nama_barang` varchar(256) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `diskon_harga` int(11) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `ukuran` varchar(100) DEFAULT NULL,
  `tipe` varchar(100) DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL,
  `stok` varchar(100) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kategori`, `kode_product`, `nama_barang`, `harga`, `berat`, `diskon_harga`, `deskripsi`, `ukuran`, `tipe`, `warna`, `stok`, `image`, `date_created`) VALUES
(1, 'JAM', '-', 'Xiomi Redmi Watch 3 Active', 459000, 0, 0, 'Xiomi Redmi Watch 3 Active', '-', '-', 'Putih', '100', 'redmi-watch-3.png', '2023-10-18 20:27:18'),
(3, 'JAM', '-', 'Xiomi Redmi Watch 2 Lite', 599000, 0, 0, 'Xiomi Redmi Watch 2 Lite', '-', '-', 'Hitam', '100', 'xiaomi-redmi-watch-2-lite.jpg', '2023-10-18 20:29:38'),
(5, 'EARBUD', '-', 'Xiomi Redmi Buds 4 Pro ANC 43dB Hi-Res', 799000, 0, 0, 'Xiomi Redmi Buds 4 Pro ANC 43dB Hi-Res audio LDAC', '-', '-', 'Hitam', '100', 'xiomi-redmi-buds-4-pro.png', '2023-10-18 20:31:34'),
(9, 'MOUSE', '-', 'Logitech B170 Mouse Wireless', 115000, 0, 0, 'Logitech B170 Mouse Wireless', '-', '-', 'Hitam', '100', 'logitech-b170.png', '2023-10-18 20:51:56'),
(10, 'MOUSE', '-', 'Rexus Mouse Wireless Gaming Arka II 107', 329000, 0, 0, 'Rexus Mouse Wireless Gaming Arka II 107 Dual Connection', '-', '-', 'Hitam', '100', 'rexus-arka2-107.png', '2023-10-18 20:52:43'),
(12, 'MOUSE', '-', 'Rexus Mouse Wireless Gaming SH10', 119000, 0, 0, 'Rexus Mouse Wireless Gaming SH10', '-', '-', 'Hitam', '100', 'rexus-mouse-gaming-sh10.jpg', '2023-10-18 20:53:36'),
(13, 'HEADSET', '-', 'Fantech TRINITY MH88 Multiplatform Headset', 155000, 0, 0, 'Fantech TRINITY MH88 Multiplatform Headset Gaming Mobile', '-', '-', 'Putih', '100', 'trinity-mh88.jpg', '2023-10-18 20:55:14'),
(15, 'HEADSET', '-', 'Fantech ALTO MH91 Multiplatform Headset', 399000, 0, 0, 'Fantech ALTO MH91 Multiplatform Headset Gaming Mobile', '-', '-', 'Hitam', '100', 'fantech-alto-mh91.png', '2023-10-18 20:57:08'),
(17, 'HEADSET', '-', 'Fantech CHIEF II HG20 RGB Space Edition', 169000, 0, 0, 'Fantech CHIEF II HG20 RGB Space Edition Gaming Headset', '-', '-', 'Putih', '100', 'fantech-chief-hg20.png', '2023-10-18 20:58:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_barang`
--

CREATE TABLE `gambar_barang` (
  `id_gambar_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gambar_barang`
--

INSERT INTO `gambar_barang` (`id_gambar_barang`, `id_barang`, `gambar`, `date_created`) VALUES
(1, 3, 'xiaomi-redmi-watch-2-lite.jpg', '2023-11-19 04:38:48'),
(2, 3, 'xiaomi-redmi-watch-2-lite-pic-2.jpg', '2023-11-19 04:38:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_pembayaran_pelanggan`
--

CREATE TABLE `rekap_pembayaran_pelanggan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_order` varchar(256) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(256) DEFAULT NULL,
  `provinsi` varchar(256) DEFAULT NULL,
  `kota` varchar(256) DEFAULT NULL,
  `alamat_penerima` text DEFAULT NULL,
  `kode_pos` varchar(100) DEFAULT NULL,
  `ekspedisi` varchar(256) DEFAULT NULL,
  `paket` varchar(256) DEFAULT NULL,
  `estimasi` varchar(256) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_pembayaran` varchar(256) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(256) DEFAULT NULL,
  `nama_bank` varchar(256) DEFAULT NULL,
  `no_rek` varchar(256) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(256) DEFAULT NULL,
  `keterangan` longtext DEFAULT NULL,
  `hp_penerima` varchar(128) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rekap_pembayaran_pelanggan`
--

INSERT INTO `rekap_pembayaran_pelanggan` (`id`, `id_user`, `no_order`, `tgl_order`, `nama_penerima`, `provinsi`, `kota`, `alamat_penerima`, `kode_pos`, `ekspedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_pembayaran`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`, `keterangan`, `hp_penerima`, `date_created`) VALUES
(27, 2, '20231118UZPHT0DM', '2023-11-18', 'Kevin ', 'Jakarta Utara', 'Jakarta', 'Jl. Sudirman RT 5/RW 03', NULL, NULL, NULL, NULL, NULL, NULL, 914000, NULL, '1', 'bukti_bayar_20231118uzpht0dm.jpg', 'Kevin', 'BCA', '7324362333', 3, 'JKT7836473GH5GH', NULL, '0865966558', '2023-11-18 06:17:44'),
(28, 2, '20231118QXW1MIYV', '2023-11-18', 'devi', 'Jakarta Utara', 'Jakarta', 'Jl. Sudirman RT 5/RW 03', NULL, NULL, NULL, NULL, NULL, NULL, 169000, NULL, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '0865966558', '2023-11-18 16:12:13'),
(29, 3, '20231118HC05V3GS', '2023-11-18', 'Adelia', 'DKI JAKARTA', 'JAKARTA', 'Jakarta Selatan RT 05 / RW 01', NULL, NULL, NULL, NULL, NULL, NULL, 1058000, NULL, '1', 'bukti_bayar_20231118hc05v3gs.jpg', 'Adelia', 'BCA', '85656895656', 3, 'JKTGDUWAGGDWA7873878', NULL, '0851549566', '2023-11-18 19:37:26'),
(30, 4, '20231118GTTHLQGK', '2023-11-18', 'adam', 'Jawa Tengah', 'KABUPATEN SEMARANG', 'Semarang indah', NULL, NULL, NULL, NULL, NULL, NULL, 1997000, NULL, '1', 'bukti_bayar_20231118gtthlqgk.jpg', 'Adam', 'BCA', '89295956565', 3, 'JKT732647863278', NULL, '08565898955', '2023-11-18 20:05:03'),
(31, 5, '20231118L4IVNHDN', '2023-11-18', 'Agus', 'Jawa Tengah', 'KABUPATEN SEMARANG', 'Semarang indah', NULL, NULL, NULL, NULL, NULL, NULL, 518000, NULL, '1', 'bukti_bayar_20231118l4ivnhdn.jpg', 'Agus', 'BCA', '5689231478', 3, 'JKT63487834835', NULL, '086598755855', '2023-11-18 20:18:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id` int(11) NOT NULL,
  `no_order` varchar(256) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id`, `no_order`, `id_barang`, `qty`) VALUES
(39, '20231118UZPHT0DM', 9, 1),
(40, '20231118UZPHT0DM', 5, 1),
(41, '20231118QXW1MIYV', 17, 1),
(42, '20231118HC05V3GS', 1, 1),
(43, '20231118HC05V3GS', 3, 1),
(44, '20231118GTTHLQGK', 3, 2),
(45, '20231118GTTHLQGK', 5, 1),
(46, '20231118L4IVNHDN', 12, 1),
(47, '20231118L4IVNHDN', 15, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `tgl_lahir` datetime DEFAULT NULL,
  `gender` varchar(128) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `tgl_lahir`, `gender`, `phone`, `username`, `email`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Kevin Lukas', '1997-10-01 03:28:07', 'Perempuan', '08569856565', 'kevin', 'kevinlukas1803@gmail.com', '$2y$10$1Y5ALImDUmwS.kCBQGzUeeo//N2l/rECscqfPRxLuLHnkzbYXNlia', 1, 1, '2023-10-24 22:28:07'),
(2, 'Siska', '2003-11-06 06:18:36', 'Perempuan', '0856985632', 'siska', 'siska@gmail.com', '$2y$10$1Y5ALImDUmwS.kCBQGzUeeo//N2l/rECscqfPRxLuLHnkzbYXNlia', 2, 1, '2023-11-17 00:18:36'),
(3, 'Adelia', NULL, NULL, NULL, NULL, 'adelia@gmail.com', '$2y$10$a878kSxtDcdftXd7savuv.su9CgdJCU6/eTA3sqmxFpIzV5OrccnS', 2, 1, '2023-11-18 19:13:39'),
(4, 'adam', NULL, NULL, NULL, NULL, 'adam@gmail.com', '$2y$10$d8nhFO1K332K6/1/RW.30O.cLghazxOPQxqjB/N99NMTC.R7lbNGa', 2, 1, '2023-11-18 20:00:16'),
(5, 'agus', NULL, NULL, NULL, NULL, 'agus@gmail.com', '$2y$10$mGXH/4fDrsv5ntJ.30PKuurxSLPE2LmfeLAo04MmRdYeBfDkDvUAi', 2, 1, '2023-11-18 20:16:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(13, 1, 3),
(16, 2, 7),
(17, 2, 8),
(18, 2, 6),
(19, 2, 9),
(22, 2, 11),
(24, 2, 13),
(27, 2, 15),
(28, 2, 16),
(29, 2, 17),
(30, 2, 18),
(31, 4, 19),
(32, 4, 20),
(33, 4, 21),
(34, 4, 22),
(35, 4, 23),
(36, 3, 24),
(37, 3, 25),
(38, 3, 26),
(39, 3, 27),
(40, 1, 1),
(41, 1, 28),
(42, 2, 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_has_sub_menu`
--

CREATE TABLE `user_has_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `status_sub` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_has_sub_menu`
--

INSERT INTO `user_has_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `status_sub`, `date_created`) VALUES
(4, 3, 'Menu Management', '-', 'fal fa-fw fa-bars', 1, 0, '2022-08-02 20:30:48'),
(10, 5, 'Pendataan UMKM', 'pendataanumkm/cpendataanumkm', 'fal fa-fw fa-barcode', 1, 1, '2023-04-07 13:45:56'),
(11, 6, 'Pengujian', 'naivebayes/datauji', 'fal fa-fw fa-pen', 1, 1, '2023-04-08 14:13:58'),
(12, 6, 'Calon', 'naivebayes/datacalon', 'fal fa-fw fa-profile', 1, 1, '2023-04-10 09:23:34'),
(13, 7, 'Dataset', 'c45/dataset', 'fal fa-fw fa-list', 1, 1, '2023-06-10 10:54:01'),
(14, 7, 'Init', 'c45/init', 'fal fa-fw fa-book', 1, 1, '2023-06-10 10:54:37'),
(15, 7, 'Prediction', 'c45/prediction', 'fal fa-fw fa-pen', 1, 1, '2023-06-10 10:55:24'),
(16, 8, 'Enkripsi', 'md4', 'fal fa-fw fa-pen', 1, 1, '2023-07-03 13:24:50'),
(19, 9, 'Beasiswa', 'beasiswa', 'fal fa-fw fa-book', 1, 1, '2023-09-11 07:40:06'),
(24, 10, 'Presensi Peserta', 'presensi', 'fal fa-fw fa-user', 1, 1, '2023-10-10 04:38:27'),
(27, 3, 'Role', 'admin/role', 'fal fa-fw fa-users', 1, 1, '2023-10-16 05:41:33'),
(28, 3, 'User Management', 'admin/user', 'fal fa-fw fa-user-plus', 1, 1, '2023-10-16 05:43:19'),
(29, 1, 'Dashboard', 'admin', 'fal fa-fw fa-dashboard', 1, 1, '2023-10-16 05:49:56'),
(32, 13, 'Pengaturan', 'pengaturan', 'fal fa-fw fa-wrench', 1, 1, '2023-10-16 06:11:57'),
(33, 12, 'Kelola Administrator', 'kelolaadmin', 'fal fa-fw fa-unlock-alt', 1, 1, '2023-10-16 06:16:09'),
(34, 13, 'Pengaturan Presensi', 'pengaturanpresensi', 'fal fa-fw fa-wrench', 1, 1, '2023-10-17 00:17:26'),
(35, 19, 'Dashboard', 'pesertamagang', 'fal fa-fw fa-dashboard', 1, 1, '2023-10-22 16:32:17'),
(36, 20, 'Presensi Peserta', 'presensipeserta', 'fal fa-fw fa-check', 1, 1, '2023-10-22 17:11:47'),
(37, 21, 'Riwayat Presensi Peserta', 'riwayatpresensipeserta', 'fal fa-fw fa-book', 1, 1, '2023-10-22 17:13:36'),
(38, 22, 'Kegiatan Harian Peserta', 'kegiatan', '', 1, 1, '2023-10-22 19:53:29'),
(39, 23, 'Nilai Akhir Peserta', 'nilaiakhirpeserta', 'fal fa-fw fa-book', 1, 1, '2023-10-22 21:31:50'),
(47, 3, 'Barang', 'barang', '', 1, 1, '2023-11-10 05:54:06'),
(48, 28, 'History Customer', 'rekappembayarancustomer', 'fal fa-fw fa-history', 1, 1, '2023-11-17 00:44:37'),
(49, 29, 'Pesanan', 'rekappembayaran', 'fal fa-fw fa-book', 1, 1, '2023-11-17 06:34:37'),
(50, 28, 'Laporan Customer', 'report', 'fal fa-fw fa-book', 1, 1, '2023-11-19 11:42:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `menu_nama` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `menu_nama`, `date_created`) VALUES
(1, 'Admin', 'Dashboard', '2022-06-14 00:00:00'),
(2, 'User', 'User', '2022-06-14 00:00:00'),
(3, 'Master', 'Data Master', '2023-10-10 22:56:42'),
(12, 'administrator', 'Kelola Administrator', '2023-10-10 22:57:10'),
(14, 'auth/logout', 'Keluar', '2023-10-10 22:58:17'),
(28, 'rekappembayarncustomer', 'Rekap Pembayaran Customer', '2023-11-17 00:43:20'),
(29, 'rekappembayaran', 'Rekap Pembayaran', '2023-11-17 06:33:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `has_sub_menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `has_sub_menu_id`, `title`, `url`, `icon`, `is_active`, `date_created`) VALUES
(1, 1, 4, 'Menu Management (Level 1)', 'master/menulevel1', 'fal fa-fw fa-folder', 1, '2022-07-06 00:00:00'),
(2, 1, 4, 'Submenu Management (Level 2)', 'master/menulevel2', 'fal fa-fw fa-folder-open', 1, '2022-07-06 00:00:00'),
(3, 1, 4, 'Submenu Management (Level 3)', 'master/menulevel3', 'fal fa-fw fa-folder-open', 1, '2022-07-06 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `token` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `gambar_barang`
--
ALTER TABLE `gambar_barang`
  ADD PRIMARY KEY (`id_gambar_barang`);

--
-- Indeks untuk tabel `rekap_pembayaran_pelanggan`
--
ALTER TABLE `rekap_pembayaran_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_has_sub_menu`
--
ALTER TABLE `user_has_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `gambar_barang`
--
ALTER TABLE `gambar_barang`
  MODIFY `id_gambar_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rekap_pembayaran_pelanggan`
--
ALTER TABLE `rekap_pembayaran_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `user_has_sub_menu`
--
ALTER TABLE `user_has_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
