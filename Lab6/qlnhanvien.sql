-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 08:03 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlnhanvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `loainv`
--

CREATE TABLE `loainv` (
  `maLoaiNV` varchar(5) NOT NULL,
  `tenLoaiNV` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loainv`
--

INSERT INTO `loainv` (`maLoaiNV`, `tenLoaiNV`) VALUES
('NV001', 'Nhân viên thiết kế'),
('NV002', 'Kế toán'),
('NV003', 'Giám đốc'),
('NV004', 'Phân tích viên'),
('NV005', 'Nhân viên Marketing'),
('NV006', 'Nhân viên an ninh'),
('NV007', 'Nhân viên bảo vệ'),
('NV008', 'Lập trình viên'),
('NV009', 'Kiểm thử viên hệ thống'),
('NV010', 'Nhân viên IT');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `maNV` varchar(5) NOT NULL,
  `hoTen` varchar(30) NOT NULL,
  `ngaySinh` varchar(15) NOT NULL,
  `gioiTinh` bit(10) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `anh` varchar(50) NOT NULL,
  `maLoaiNV` varchar(5) NOT NULL,
  `maPhong` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`maNV`, `hoTen`, `ngaySinh`, `gioiTinh`, `diaChi`, `anh`, `maLoaiNV`, `maPhong`) VALUES
('N001', 'Lê Anh', '05/11/2000', b'0000000001', 'Ninh Hòa', 'employee1.jpg', 'NV001', 'P009'),
('N002', 'Trần Thị Hồng', '20/01/2000', b'0000000000', 'Nha Trang', 'employee0.jpg', 'NV001', 'P009'),
('N003', 'Lê Hoàng Thu Thủy', '05/11/2000', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV004', 'P006'),
('N005', 'Trần Thị Diễm Quỳnh', '16/01/1994', b'0000000000', 'Phú Yên', 'employee0.jpg', 'NV004', 'P006'),
('N006', 'Trần Thị Ngọc Hà', '16/01/1997', b'0000000000', 'Phú Yên', 'employee0.jpg', 'NV002', 'P002'),
('N007', 'Trần Thị Ngọc Thu', '16/01/1999', b'0000000000', 'Cam Ranh', 'employee0.jpg', 'NV001', 'P006'),
('N008', 'Trương Thị Hoàng Yến', '01/01/1996', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV002', 'P002'),
('N009', 'Trương Thị Hoàng Lê', '01/01/1996', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV005', 'P004'),
('N010', 'Võ Công Nam', '01/01/1992', b'0000000001', 'Ninh Hòa', 'employee1.jpg', 'NV006', 'P005'),
('N011', 'Võ Thị Nhật Lê', '01/01/1992', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV002', 'P002'),
('N012', 'Võ Thị Nhật Hồng', '01/01/1992', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV002', 'P002'),
('N013', 'Võ Thị Nhật Vi', '01/01/1992', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV002', 'P002'),
('N014', 'Võ Thị Nhật Vy', '01/01/1995', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV001', 'P001'),
('N015', 'Võ Thị Hoàng Yến', '01/01/1995', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV001', 'P001'),
('N016', 'Võ Thị Hoàng Vy', '01/01/1995', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV001', 'P001'),
('N017', 'Võ Thị Hoàng Thảo', '01/01/1995', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV001', 'P001'),
('N018', 'Võ Thị Hoàng Chi', '01/01/1995', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV001', 'P001'),
('N019', 'Trần Hữu Bắc Hàn', '01/01/1995', b'0000000001', 'Ninh Hòa', 'employee1.jpg', 'NV007', 'P005'),
('N020', 'Trần Hữu Chí', '01/01/1995', b'0000000001', 'Ninh Hòa', 'employee1.jpg', 'NV007', 'P005'),
('N021', 'Trần Hữu Tài', '01/01/1995', b'0000000001', 'Ninh Hòa', 'employee1.jpg', 'NV007', 'P005'),
('N022', 'Trần Thị Diễm Châu', '01/01/1995', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV002', 'P002'),
('N023', 'Trần Thị Diễm Na', '01/01/1995', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV002', 'P002'),
('N024', 'Trần Thị Diễm Yến', '01/01/1995', b'0000000000', 'Ninh Hòa', 'employee0.jpg', 'NV002', 'P002'),
('N025', 'Lê Thị Ánh Hồng', '02/05/2002', b'0000000000', 'Phú Yên', 'employee0.jpg', 'NV005', 'P001'),
('N026', 'Võ Hoàng Yến Nhi', '16/01/1994', b'0000000000', 'Phú Yên', 'employee0.jpg', 'NV005', 'P001'),
('N027', 'Lê Thị Hoàng Yến', '16/01/1994', b'0000000000', 'Nha Trang', 'jisoo11111.jpeg', 'NV003', 'P003');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `maPhong` varchar(5) NOT NULL,
  `tenPhong` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`maPhong`, `tenPhong`) VALUES
('P001', 'Phòng tuyển dụng'),
('P002', 'Phòng kế toán'),
('P003', 'Phòng giám đốc'),
('P004', 'Phòng pháp lý'),
('P005', 'Phòng an ninh và bảo mật'),
('P006', 'Phòng nghiên cứu và phát triển'),
('P007', 'Phòng IT'),
('P008', 'Phòng bảo vệ'),
('P009', 'Phòng Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'nvliem', '12345678', '1'),
(2, 'vbtoan', '123456', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loainv`
--
ALTER TABLE `loainv`
  ADD PRIMARY KEY (`maLoaiNV`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`maNV`),
  ADD KEY `maLoaiNV` (`maLoaiNV`),
  ADD KEY `maPhong` (`maPhong`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`maPhong`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`maPhong`) REFERENCES `phongban` (`maPhong`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`maLoaiNV`) REFERENCES `loainv` (`maLoaiNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
