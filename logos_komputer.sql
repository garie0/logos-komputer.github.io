-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2023 at 05:25 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logos_komputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id_laptop` int NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `nama_laptop` varchar(255) NOT NULL,
  `id_merek` int NOT NULL,
  `spek` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`id_laptop`, `nama_pegawai`, `nama_laptop`, `id_merek`, `spek`, `gambar`, `tanggal`) VALUES
(3, 'Refky', 'Asus TUF Dash', 19, 'Prosesor: Prosesor Intel Core generasi terbaru atau AMD Ryzen dengan performa tinggi, seperti Intel Core i7 atau AMD Ryzen 7.\r\nRAM: Biasanya memiliki RAM DDR4 dengan kapasitas mulai dari 8GB hingga 32GB, tergantung pada modelnya.\r\nPenyimpanan: SSD (Solid State Drive) dengan kapasitas bervariasi mulai dari 256GB hingga 1TB atau lebih, untuk kecepatan baca/tulis data yang tinggi.\r\nKartu Grafis: Menggunakan kartu grafis NVIDIA GeForce RTX series untuk kinerja gaming yang tinggi dan visual yang lebih baik.\r\nLayar: Layar IPS dengan refresh rate tinggi, seperti 144Hz atau 240Hz, untuk pengalaman gaming yang mulus.\r\nKonektivitas: Port USB 3.2, HDMI, jack audio, Wi-Fi, dan Bluetooth untuk konektivitas nirkabel.\r\nDesain: Biasanya memiliki desain yang kokoh dan tahan lama dengan fitur khusus untuk pendinginan yang efisien.\r\nBaterai: Baterai dengan daya tahan yang cukup untuk penggunaan sehari-hari, namun dapat bervariasi tergantung pada penggunaan.\r\nSistem Operasi: Bisa berjalan dengan Windows 10 atau Windows 11 tergantung pada versi peluncuran.', '655ce6c876ea1.jpeg', '2023-11-19'),
(4, 'Refky', 'Acer Nitro', 20, 'Prosesor: Biasanya dilengkapi dengan prosesor Intel Core i5 atau i7 generasi terbaru, atau AMD Ryzen 5 atau Ryzen 7.\r\nRAM: Kapasitas RAM biasanya mulai dari 8GB hingga 16GB DDR4, tetapi dapat diperluas tergantung pada modelnya.\r\nPenyimpanan: SSD (Solid State Drive) atau kombinasi SSD dengan HDD untuk kapasitas penyimpanan yang besar. Kapasitas SSD mulai dari 256GB hingga 1TB, sedangkan HDD biasanya memiliki kapasitas lebih besar.\r\nKartu Grafis: Biasanya menggunakan kartu grafis NVIDIA GeForce GTX series atau NVIDIA GeForce RTX series untuk kinerja gaming yang baik.\r\nLayar: Layar IPS dengan resolusi Full HD (1920 x 1080 piksel) dengan refresh rate yang dapat bervariasi mulai dari 60Hz hingga 144Hz, tergantung pada modelnya.\r\nKonektivitas: Port USB 3.1 atau USB-C, HDMI, jack audio, Wi-Fi, dan Bluetooth untuk konektivitas nirkabel.\r\nDesain: Desain yang umumnya agresif dengan pencahayaan RGB pada beberapa model. Sistem pendinginan yang efisien juga menjadi fitur umum.\r\nBaterai: Karena ini adalah laptop gaming, daya tahan baterai mungkin tidak sepanjang laptop non-gaming, biasanya berkisar antara 4-6 jam tergantung pada penggunaan.\r\nSistem Operasi: Bisa berjalan dengan Windows 10 atau Windows 11 tergantung pada versi peluncurannya.', '655ce5cb598c7.jpeg', '2023-11-22'),
(5, 'Refky', 'HP Omen', 21, 'Prosesor: Biasanya dilengkapi dengan prosesor Intel Core i7 atau i9 terbaru, atau AMD Ryzen 7 atau Ryzen 9 untuk kinerja yang tinggi dalam gaming dan tugas-tugas berat lainnya.\r\nRAM: Kapasitas RAM biasanya mulai dari 8GB hingga 32GB DDR4, tergantung pada modelnya. Beberapa varian juga memungkinkan untuk peningkatan RAM lebih lanjut.\r\nPenyimpanan: SSD (Solid State Drive) dengan kapasitas yang bervariasi mulai dari 256GB hingga 1TB atau lebih, memberikan kecepatan akses data yang tinggi. Beberapa model juga dapat dilengkapi dengan HDD tambahan untuk penyimpanan lebih lanjut.\r\nKartu Grafis: Menggunakan kartu grafis NVIDIA GeForce RTX series, seperti RTX 3060, RTX 3070, atau RTX 3080, untuk kinerja gaming yang tinggi dan visual yang luar biasa.\r\nLayar: Layar IPS dengan resolusi Full HD (1920 x 1080 piksel) atau 4K pada beberapa varian. Refresh rate bisa mulai dari 60Hz hingga 300Hz untuk pengalaman gaming yang mulus dan responsif.\r\nKonektivitas: Port USB 3.1 atau USB-C, HDMI, jack audio, Wi-Fi, Bluetooth, dan beberapa varian dapat memiliki port Ethernet untuk koneksi jaringan yang lebih stabil.\r\nDesain: Desain yang seringkali agresif dengan pencahayaan RGB, serta sistem pendinginan yang dirancang khusus untuk menjaga suhu tetap rendah selama penggunaan yang intens.\r\nBaterai: Karena fokus pada kinerja gaming, daya tahan baterai mungkin tidak sepanjang laptop non-gaming, berkisar antara 3-5 jam tergantung pada penggunaan.\r\nSistem Operasi: Bisa berjalan dengan Windows 10 atau Windows 11 tergantung pada versi peluncuran.', '655ce613d911c.jpeg', '2023-11-22'),
(6, 'Refky', 'Lenovo Legion', 22, 'Prosesor: Biasanya dilengkapi dengan prosesor Intel Core i5, i7, atau i9 terbaru, atau AMD Ryzen 5, Ryzen 7, atau Ryzen 9 untuk kinerja gaming yang tinggi.\r\nRAM: Kapasitas RAM seringkali mulai dari 8GB hingga 32GB DDR4, dengan opsi peningkatan kapasitas pada beberapa model.\r\nPenyimpanan: SSD (Solid State Drive) dengan kapasitas yang bervariasi mulai dari 256GB hingga 1TB atau lebih, kadang juga dengan opsi HDD tambahan untuk penyimpanan lebih besar.\r\nKartu Grafis: Menggunakan kartu grafis NVIDIA GeForce RTX series seperti RTX 3060, RTX 3070, atau RTX 3080, untuk kinerja gaming yang tinggi dan visual yang luar biasa.\r\nLayar: Layar IPS dengan resolusi Full HD (1920 x 1080 piksel) atau 4K pada beberapa varian. Refresh rate dapat bervariasi dari 60Hz hingga 360Hz untuk pengalaman gaming yang responsif.\r\nKonektivitas: Port USB 3.1 atau USB-C, HDMI, jack audio, Wi-Fi, Bluetooth, dan port Ethernet pada beberapa model untuk koneksi jaringan yang stabil.\r\nDesain: Desain yang seringkali keren dengan pencahayaan RGB yang dapat disesuaikan, serta sistem pendinginan yang efisien untuk menjaga suhu tetap rendah saat gaming dalam waktu lama.\r\nBaterai: Karena laptop gaming lebih fokus pada kinerja, daya tahan baterai biasanya berkisar antara 3-6 jam tergantung pada penggunaan.\r\nSistem Operasi: Bisa berjalan dengan Windows 10 atau Windows 11 tergantung pada versi peluncuran.', '655ce655904cf.jpeg', '2023-11-21'),
(7, 'Refky', 'MSI Katana', 23, 'Prosesor: Intel Core i5, i7, atau i9 terbaru, atau AMD Ryzen 5, Ryzen 7, atau Ryzen 9.\r\nRAM: Kapasitas RAM mulai dari 8GB hingga 32GB DDR4 atau lebih.\r\nPenyimpanan: SSD (Solid State Drive) dengan kapasitas mulai dari 256GB hingga 1TB atau lebih, kadang juga dengan opsi HDD tambahan.\r\nKartu Grafis: Menggunakan kartu grafis NVIDIA GeForce RTX series atau seri grafis terbaru untuk kinerja gaming yang optimal.\r\nLayar: Layar dengan resolusi Full HD (1920 x 1080 piksel) atau 4K, refresh rate tinggi untuk pengalaman gaming yang mulus.\r\nKonektivitas: Port USB 3.1 atau USB-C, HDMI, jack audio, Wi-Fi, Bluetooth, dan port Ethernet pada beberapa model.\r\nDesain: Desain yang seringkali menarik, dengan pencahayaan RGB yang dapat disesuaikan dan sistem pendinginan yang efisien.\r\nBaterai: Daya tahan baterai tergantung pada penggunaan, biasanya berkisar antara 3-6 jam untuk laptop gaming.', '655ce6a8f0b1a.jpeg', '2023-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'user', 'user', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` int NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `merek`) VALUES
(19, 'ASUS'),
(20, 'ACER'),
(21, 'HP'),
(22, 'LENOVO'),
(23, 'MSI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id_laptop`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id_laptop` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
