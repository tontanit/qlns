-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2022 lúc 03:56 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlns`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvct`
--

CREATE TABLE `bvct` (
  `id` int(11) NOT NULL,
  `id_nhansu` int(11) DEFAULT NULL,
  `ketluan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noidung_kl` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lsct_ruot` int(11) DEFAULT NULL,
  `lsct_vc` int(11) DEFAULT NULL,
  `cthn_ruot` int(11) DEFAULT NULL,
  `cthn_vc` int(11) DEFAULT NULL,
  `ghichu` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daotao`
--

CREATE TABLE `daotao` (
  `id` int(11) NOT NULL,
  `id_nhansu` int(11) DEFAULT NULL,
  `ten_dt` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namdangky` date DEFAULT NULL,
  `namdaotao` date DEFAULT NULL,
  `ghichu` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhansu`
--

CREATE TABLE `nhansu` (
  `id` int(11) NOT NULL,
  `hoten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dantoc` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tongiao` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vanhoa` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trinhdo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llct` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namvaodang` date DEFAULT NULL,
  `chucvu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quequan` varchar(110) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noio` varchar(65) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dh_hdnd` int(11) DEFAULT NULL,
  `ghichu` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhansu`
--

INSERT INTO `nhansu` (`id`, `hoten`, `ngaysinh`, `gioitinh`, `dantoc`, `tongiao`, `vanhoa`, `trinhdo`, `llct`, `namvaodang`, `chucvu`, `quequan`, `noio`, `dh_hdnd`, `ghichu`) VALUES
(1, 'Hà Đình Ân', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Hành chính', 'CC', NULL, 'HUV, Bí thư Đảng uỷ xã Công Hải', NULL, NULL, NULL, NULL),
(2, 'Trần Ngọc Bình', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'Th.sỹ XD công trình ', 'CC', NULL, 'HUV, Phó CT.UBND huyện', NULL, NULL, NULL, NULL),
(3, 'Nguyễn Châu Cảnh', NULL, 'Nam', 'Kinh', 'Công giáo', '12/12', 'ĐH Thủy sản', 'CC', NULL, 'HUV, Trưởng Phòng NN&PTNT', NULL, NULL, NULL, NULL),
(4, 'Châu Quốc Cường', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Quản trị kinh doa', 'CC', NULL, 'Phó phụ trách Phòng TC-KH', NULL, NULL, NULL, NULL),
(5, 'Đỗ Nguyên Hải Đăng', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Luật', 'CC', NULL, 'Chánh VP.HĐND&UBND huyện', NULL, NULL, NULL, NULL),
(6, 'Phạm Hữu Đức', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Kinh tế XD và QLD', 'CC', NULL, 'Phó Trưởng Phòng Kinh tế-Hạ tầng', NULL, NULL, NULL, NULL),
(7, 'Nguyễn Võ Phương Dung', NULL, 'Nữ', 'Kinh', 'Không', '12/12', 'ĐH Xã hội học', 'CC', NULL, 'HUV, Chủ tịch\nHội LHPN huyện', NULL, NULL, NULL, NULL),
(8, 'Lê Quang Dũng', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'Th.sỹ Luật', 'CC', NULL, 'UVTV, Trưởng Công an huyện', NULL, NULL, NULL, NULL),
(9, 'Katơr Đượng', NULL, 'Nam', 'Raglai', 'Không', '12/12', 'Đang học ĐH luật', 'TC', NULL, 'HUV, Bí thư Đảng uỷ xã Phước Kháng', NULL, NULL, NULL, NULL),
(10, 'Chamaléa Hiến', NULL, 'Nam', 'Raglai', 'Không', '12/12', 'ĐH XDĐ-QNN', 'TC', NULL, 'Bí thư Đảng ủy xã Phước Chiến', NULL, NULL, NULL, NULL),
(11, 'Trần Bá Hòa', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Báo chí', 'CC', NULL, 'HUV, nguyên Bí thư Đảng ủy xã Bắc Phong', NULL, NULL, NULL, NULL),
(12, 'Đoàn Hữu Hoan', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'Đại học CNTT', 'TC; đang h', NULL, 'HUV, Bí thư Huyện đoàn', NULL, NULL, NULL, NULL),
(13, 'Nguyễn Xuân Hoàng', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH XDĐ-CQNN', 'CC', NULL, 'UVTV, Trưởng Ban Tổ chức huyện ủy; Trưởng Phòng Nội vụ', NULL, NULL, NULL, NULL),
(14, 'Nguyễn Hùng', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH\nQTKD', 'CC', NULL, 'HUV, Bí thư Đảng ủy xã Lợi Hải', NULL, NULL, NULL, NULL),
(15, 'Phạm Trọng Hùng', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'Th. Sỹ KT XDCT giao ', 'CC', NULL, 'UVTV, PBT - CT UBND huyện', NULL, NULL, NULL, NULL),
(16, 'Trần Thị Thu Hương', NULL, 'Nữ', 'Kinh', 'Không', '12/12', 'ĐH Sư phạm', 'CC', NULL, 'HUV, Trưởng Phòng GD&ĐT', 'Từ năm 2017 đến năm 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(17, 'Nguyễn Văn Khoa', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH kinh tế nông lâm', 'CC', NULL, 'Bí thư Đảng ủy xã Bắc Phong', 'Từ năm 2017 đến năm 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(18, 'Phạm Duy Khương', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Kinh tế\nXD và QLD', 'CC', NULL, 'Phó Chủ nhiệm UBKT huyện ủy', '2017, 2018 HTXS; 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(19, 'Nguyễn Văn Lâm', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'Cử nhân luật', 'CC', NULL, 'Viện trưởng VKSND huyện', 'Từ năm 2017 đến năm 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(20, 'Nguyễn Văn Lắm', NULL, 'Nam', 'Chăm', 'Bàni', '12/12', 'ĐH Vật lý; ĐH Hành c', 'CC', NULL, 'HUV, Phó Chủ tịch HĐND huyện', '2017 HTXS; 2018, 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(21, 'Nguyễn Văn Lăng', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Hành chính', 'CC', NULL, 'HUV, Chủ tịch Hội Nông dân', 'Từ năm 2017 đến năm 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(22, 'Nguyễn Duy Liêm', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH\nHành chính', 'CC', NULL, 'HUV, Chánh Văn phòng huyện ủy', '2017, 2019 HTXS; 2018 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(23, 'Nguyễn Duy Liên', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH sư phạm ngữ văn', 'CC', NULL, 'Phó trưởng Ban Tuyên giáo huyện ủy', '2017, 2018 HTT; 2019 HTXS', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(24, 'Phan Xuân Linh', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Triết; ĐH hành ch', 'CC', NULL, 'UVTV, Chủ nhiệm UBKT', '2017 HTXS; 2018, 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(25, 'Nguyễn Văn Long', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Quản trị kinh doa', 'CC', NULL, 'Bí thư Đảng ủy xã Bắc Sơn', 'Từ năm 2017 đến năm 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(26, 'Phạm Thị Lụm', NULL, 'Nữ', 'Kinh', 'Không', '12/12', 'ĐH Xã hội học', 'CC', NULL, 'HUV, Phó trưởng Ban dân vận huyện ủy', 'Từ năm 2017 đến 2019 HTTNV', 'Bảo đảm tiêu chuẩn chính trị theo Quy định số 57', NULL, NULL),
(27, 'Huỳnh Ngọc Ngân', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Hành chính', 'CC', NULL, 'HUV, Trưởng Phòng VHTT', '2017, 2018 HTT; 2019 HTXS', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(28, 'Nguyễn Đức Nhì', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Chính trị', 'CC', NULL, 'HUV, Chính trị viên BCH Quân sự', '2017, 2019 HTXS; 2018 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(29, 'Đặng Ngọc Minh Quang', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Ngữ văn; ĐH XDĐ-C', 'CC', NULL, 'UVTV, PCT.UBND huyện', 'Từ năm 2017 đến năm 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(30, 'Nguyễn Thành Sơn', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Luật', 'CC', NULL, 'HUV, Phó Trưởng Công an huyện', '2017, 2019 HTXS; 2018 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(31, 'Lê Quân Sơn', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'Cử nhân Quân sự', 'CC', NULL, 'Chỉ huy trưởng BCH Quân sự', '2017, 2018 HTT; 2019 HTXS', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(32, 'Trần Kim Tiên', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Lâm nghiệp', 'CC', NULL, 'HUV, Trưởng phòngTN&MT', 'Từ năm 2017 đến năm 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(33, 'Trương Văn Trí', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'Cử nhân luật', 'CC', NULL, 'Phó trưởng Ban Tổ chức huyện ủy', 'Từ năm 2017 đến năm 2019 HTXS', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(34, 'Phan Phước Trí', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'Cử nhân luật', 'CC', NULL, 'Phó Chánh án phụ trách TAND huyện', '2017,2018 HTXS; 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(35, 'Lữ Phụng Trường', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐHSP, ĐH Hành chính', 'CC', NULL, 'UVTV, Trưởng Ban Dân vận; Chủ tịch UBMTTQVN', '2017 HTXS; 2018, 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(36, 'Nguyễn Dâng Tuyển', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'Th. Sỹ Kinh tế', 'CC', NULL, 'TUV, Bí thư huyện uỷ', '2017 HTXS; 2018, 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(37, 'Ngô Thời Vụ', NULL, 'Nam', 'Kinh', 'Không', '12/12', 'ĐH Xã hội học', 'CC', NULL, 'UVTV, Trưởng Ban Tuyên giáo; Giám đốc Trung tâm chính trị', '2017 HTXS; 2018, 2019 HTT', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL),
(38, 'Mai Thị Hà', NULL, 'Nữ', 'Kinh', 'Không', '12/12', 'ĐH XDĐ-CQNN', 'TC', NULL, 'Phó Giám đốc Trung tâm Chính trị huyện', 'Từ năm 2017 đến năm 2019 HTTNV', 'Bảo đảm tiêu chuẩn chính trị theo Quy định 126', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyhoach`
--

CREATE TABLE `quyhoach` (
  `id` int(11) NOT NULL,
  `id_nhansu` int(11) DEFAULT NULL,
  `qh_chucvu` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qh_phongban` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ghichu` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bvct`
--
ALTER TABLE `bvct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhansu` (`id_nhansu`);

--
-- Chỉ mục cho bảng `daotao`
--
ALTER TABLE `daotao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhansu`
--
ALTER TABLE `nhansu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quyhoach`
--
ALTER TABLE `quyhoach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nhansu` (`id_nhansu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bvct`
--
ALTER TABLE `bvct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `daotao`
--
ALTER TABLE `daotao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhansu`
--
ALTER TABLE `nhansu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `quyhoach`
--
ALTER TABLE `quyhoach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bvct`
--
ALTER TABLE `bvct`
  ADD CONSTRAINT `bvct_ibfk_1` FOREIGN KEY (`id_nhansu`) REFERENCES `nhansu` (`id`);

--
-- Các ràng buộc cho bảng `daotao`
--
ALTER TABLE `daotao`
  ADD CONSTRAINT `daotao_ibfk_1` FOREIGN KEY (`id`) REFERENCES `nhansu` (`id`);

--
-- Các ràng buộc cho bảng `quyhoach`
--
ALTER TABLE `quyhoach`
  ADD CONSTRAINT `quyhoach_ibfk_1` FOREIGN KEY (`id_nhansu`) REFERENCES `nhansu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
