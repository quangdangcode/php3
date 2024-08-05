-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 05, 2024 lúc 07:00 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asmphp3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catelories`
--

CREATE TABLE `catelories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catelories`
--

INSERT INTO `catelories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chính Trị', '2024-08-04 07:50:51', '2024-08-04 07:50:51'),
(2, 'Xã Hội', '2024-08-04 08:29:46', '2024-08-04 08:29:46'),
(3, 'Thể thao', '2024-08-04 08:29:59', '2024-08-04 08:29:59'),
(4, 'Giáo Dục', '2024-08-04 08:30:19', '2024-08-04 17:43:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Hello', '2024-08-04 08:34:40', '2024-08-04 08:34:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2024_08_01_170234_add_role_to_users_table', 1),
(63, '2014_10_12_000000_create_users_table', 2),
(64, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(65, '2019_08_19_000000_create_failed_jobs_table', 2),
(66, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(67, '2024_08_01_161137_create_catelories_table', 2),
(68, '2024_08_01_161235_create_posts_table', 2),
(69, '2024_08_01_161510_create_comments_table', 2),
(70, '2024_08_01_162339_create_tags_table', 2),
(71, '2024_08_01_162411_create_post_tags_table', 2),
(72, '2024_08_01_162645_create_likes_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `catelory_id` bigint UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `catelory_id`, `title`, `content`, `image`, `IsActive`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quyết tâm xây dựng Đảng vững mạnh, nước Việt Nam giàu mạnh, dân chủ, công bằng, văn minh', 'Để tranh thủ tối đa thời cơ, thuận lợi, đẩy lùi nguy cơ, thách thức, tăng cường tiềm lực, sức mạnh thực hiện thắng lợi các mục tiêu chiến lược mà Đại hội lần thứ XIII của Đảng đã đề ra; toàn Đảng, toàn dân, toàn quân ta cần nỗ lực phấn đấu, chung sức đồng lòng, kế thừa, phát huy mạnh mẽ truyền thống vẻ vang và kinh nghiệm quý báu của Đảng ta; phát huy cao nhất tinh thần \'tự chủ, tự tin, tự lực, tự cường, tự hào dân tộc\'; không ngừng tìm tòi, mở ra triển vọng mới to lớn để phát triển con người và xã hội.', 'posts/hIxa9QVtkb3U3lDhTeRpjUD2ovCZMgAVFccnagjK.png', 1, '2024-08-04 07:57:40', '2024-08-04 18:52:39'),
(2, 4, 'Thực hư chuyện tốt nghiệp đại học loại khá, TOEIC 700 vẫn xin làm… giúp việc nhà', 'Trên một nhóm việc làm có bài đăng tuyển người giúp việc nhà. Lập tức có những thành viên tự ứng tuyển. Đáng chú ý, trong số đó có người tốt nghiệp đại học loại khá, chứng chỉ TOEIC 700… Câu chuyện này liệu có thật?\r\nChọn đại vì...\r\nNhiều người cho rằng chuyện một số thành viên tự nhận đã tốt nghiệp đại học loại khá xin công việc giúp việc nhà kể trên là đùa. Vậy những người tự ứng tuyển này nói gì?\r\n\r\nThành viên có tên N.T.D.H cho biết bản thân 24 tuổi, ngụ ở tỉnh Thanh Hóa, từng tốt nghiệp đại học ngành quản trị kinh doanh vào năm 2022 tại một trường ĐH ở Q.Bình Thạnh, TP.HCM.', 'posts/Tbr3wUr7W1Gkc0SLxonAYdz5yQr0YDj4AZDDC1Lt.png', 1, '2024-08-04 08:32:09', '2024-08-04 08:32:09'),
(3, 2, 'Gia đình chủ tiệm vàng chi 10 triệu nấu cơm 0 đồng đãi người dưng mỗi ngày', 'Gia đình anh Trần Văn Tuấn (ngụ TP.Thuận An, Bình Dương) hơn 1 tháng nay mỗi ngày chi khoảng 10 triệu đồng, nấu 600 suất cơm 0 đồng cả chay lẫn mặn đãi người lao động nghèo. Trước đó, họ đầu tư gần 1 tỉ đồng sửa sang nhà, mua sắm vật dụng bếp.\r\nVới tâm nguyện mong muốn làm từ thiện, giúp đỡ những hoàn cảnh khó khăn nên từ lâu, gia đình anh Tuấn - chủ tiệm vàng ở TP.Thuận An ấp ủ dự định nấu cơm 0 đồng. Hơn 1 tháng trước, anh Tuấn sửa lại căn nhà mặt tiền đường Phan Chu Trinh, thuê thêm mặt bằng bên cạnh và sắm mới toàn bộ vật dụng nấu bếp với chi phí cả tỉ đồng rồi cùng nhiều thành viên trong nhà chung tay nấu cơm từ thiện.\r\n\r\n\"Nhân viên trong bếp cơm hầu hết là người nhà và nhân viên bán vàng. Bếp chỉ hoạt động từ thứ hai đến thứ sáu, cuối tuần nghỉ ngơi. Ban đầu dự định nấu khoảng 300 suất nhưng hiện giờ đã lên hơn 600 suất ăn/ngày\", anh Tuấn chia sẻ.', 'posts/Ue7Q6NwtNwDDyDba9GNGMhX5zgZxfxsbEzcjMSvc.png', 1, '2024-08-04 08:33:32', '2024-08-04 08:33:32'),
(4, 3, 'Djokovic gầm thét hạ Alcaraz trong trận chung kết hay tuyệt đỉnh: HCV Olympic đi vào lịch sử', 'Novak Djokovic đã thể hiện bản lĩnh khi đánh bại Carlos Alcaraz sau 2 ván đấu phải trải qua loạt tie-break cân não trong trận chung kết quần vợt đơn nam Olympic 2024 gay cấn và tuyệt đỉnh diễn ra tối 4.8.\r\nDjokovic lần đầu tiên lọt vào trận chung kết Olympic và đang nỗ lực chấm dứt thời gian chờ đợi đoạt HCV đầu tiên để hoàn thành bộ sưu tập danh hiệu trong sự nghiệp. Trong khi đó, ở tuổi 21, Alcaraz là tay vợt trẻ nhất trong lịch sử lọt vào trận chung kết Olympic và cố gắng giành thêm vinh quang sau danh hiệu Pháp mở rộng và Wimbledon mùa giải này.', 'posts/4ClohLLflwBQpaSR8h7E8bWBtXxrtTHmrTDptU4Q.png', 1, '2024-08-04 08:34:20', '2024-08-04 08:34:20'),
(5, 1, 'Trung Quốc bị tố đã điều lực lượng lớn quanh Đài Loan', 'Cơ quan Phòng vệ Đài Loan ngày 4.8 thông báo 36 máy bay và 12 tàu của quân đội Trung Quốc đã bị phát hiện xung quanh hòn đảo trong 24 giờ kể từ 6 giờ sáng 3.8.\r\nCơ quan Phòng vệ Đài Loan ngày 4.8 khẳng định hai máy bay không người lái (UAV) của quân đội Trung Quốc (PLA) đã bay vòng quanh hòn đảo trong nhiều giờ trong ngày 3.8, theo tờ South China Morning Post (SCMP).\r\n\r\nHai UAV đó đã vượt qua đường trung tuyến ở eo biển Đài Loan và tuần tra quanh Đài Loan từ khoảng trưa đến 21 ngày 3.8, theo Cơ quan Phòng vệ Đài Loan.', 'posts/Jv9It2RfMIpceahor9Ju2mOJeEgnN1Se1gFrdTI3.png', 1, '2024-08-04 08:39:26', '2024-08-04 08:39:26'),
(6, 1, 'Houthi bắn hạ \'thần chết\' giá 30 triệu USD của Mỹ?', 'Reuters hôm nay 4.8 dẫn hai nguồn tin từ lực lượng Houthi khẳng định lực lượng này đã bắn hạ một máy bay không người lái (UAV) MQ-9 Reaper - được mệnh danh là \"thần chết\" - của Mỹ.\r\nVụ bắn hạ được cho là xảy ra tại tỉnh Saada của Yemen. Hiện chưa có thông tin về phản ứng của Houthi cũng như Mỹ đối với thông tin UAV MQ-9 bị bắn.\r\n\r\nTrong khi đó, Bộ Tư lệnh Trung tâm Mỹ (CENTCOM) ngày 3.8 tuyên bố đã phá hủy thành công một tên lửa và bệ phóng của Houthi ở Yemen. Hiện chưa có thông tin về phản ứng của Houthi đối với tuyên bố của CENTCOM.', 'posts/rkhm7WLtJvDHMVJAPv0yaB6qKJ0aZtARFSW8eGuX.png', 1, '2024-08-04 08:39:48', '2024-08-04 08:39:48'),
(7, 1, 'Lũ quét, lở đất gây chết người, Trung Quốc điều động UAV cỡ lớn', 'Tính đến chiều 4.8, đã có 8 người chết và 19 người mất tích sau khi lũ quét và lở đất xảy ra ở thành phố Khang Định thuộc tỉnh Tứ Xuyên (Trung Quốc).\r\nSố người chết và mất tích do lũ quét và lở đất nói trên do chính quyền địa phương đưa ra, theo Tân Hoa xã. Thảm họa này xảy ra vào khoảng 3 giờ 30 sáng 3.8 (theo giờ Trung Quốc) tại thành phố Khang Định, phá hủy nhà cửa ở một ngôi làng.', 'posts/es4FREh4jQX4PEHb7sfcNyLjszk4x9r9YaWQJCXr.png', 1, '2024-08-04 08:40:19', '2024-08-04 08:40:19'),
(8, 2, 'Mưa lớn giữa trưa ở TP.HCM, \'phố nhà giàu\' Thảo Điền lại ngập', 'Trưa 4.8, đường Quốc Hương (P.Thảo Điền, TP.Thủ Đức) lại bị ngập nặng trong thời gian dài cơn mưa lớn diễn ra vào giữa trưa.\r\nTheo đó, một cơn mưa lớn bắt đầu vào khoảng 12 giờ phủ kín nhiều khu vực ở TP.HCM. Trong đó, các nơi như Q.3, Q.Bình Thạnh, Q.Phú Nhuận và TP.Thủ Đức đều hứng trọn cơn mưa.\r\n\r\nNgay sau đó khoảng 15 phút, con đường được xem là \"rốn ngập\" ở P.Thảo Điền nước bắt đầu dâng cao trong cơn mưa. Đồng thời kéo theo đó các con đường nhánh cũng bị ngập. Đoạn ngập trên đường Quốc Hương này kéo dài khoảng 300 m, từ giao lộ Quốc Hương – Xuân Thủy đến đường Thái Lý. Mực nước ở đây ngập sâu, có nơi lên đến hơn bánh xe máy. Tuy nhiên, điểm ngập sâu và thường xuyên nhất ở đây vẫn là đoạn phía trước Trường ĐH Văn hóa TP.HCM.', 'posts/MbsE8PGZ26klROkiioL2hFYM296KUO0lDFhYGfOc.png', 1, '2024-08-04 08:41:34', '2024-08-04 08:41:34'),
(9, 2, 'Chàng trai mang thịt bò thượng hạng từ Nhật về Việt Nam làm quà cho cha mẹ', 'Anh Quốc Trung tự tay mua thịt bò Wagyu từ Nhật Bản đem về Việt Nam làm quà vì cha mẹ chưa bao giờ được thưởng thức món này.\r\nMạng xã hội chia sẻ câu chuyện chàng trai đang làm việc ở Nhật Bản đã tự tay mua thịt bò thượng hạng để chiêu đãi gia đình nhận được nhiều sự quan tâm của cư dân mạng. Ai nấy đều bày tỏ sự thích thú vì tình cảm của người con dành cho ba mẹ và không quên hỏi cách bảo quản khi mang thịt bò vượt khoảng 4.000 km về Việt Nam.\r\n\r\nGửi chân tình vào món quà nhỏ\r\nChia sẻ với Thanh Niên, anh Phạm Quốc Trung (31 tuổi, quê ở Vĩnh Long) cho biết thường thấy mọi người mang mĩ phẩm, bánh kẹo về Việt Nam nên muốn mang gì đó khác biệt và ý nghĩa hơn. Anh quyết định mua thịt bò Wagyu - một trong những loại thịt bò thượng hạng và đắt đỏ nhất thế giới cùng với sữa chua, socola, bánh matcha misu… về biếu gia đình.', 'posts/15n9HnubeAkudY5l68tdG6mj4H8x0Al3JYJFYNgq.png', 1, '2024-08-04 08:42:01', '2024-08-04 08:42:01'),
(10, 2, 'Tháng 7 âm lịch: Vì sao dân gian gọi là tháng \'cô hồn\', có phải kiêng làm những chuyện đại sự?', 'Dân gian người Việt thường gọi tháng 7 âm lịch là tháng \'cô hồn\' và kiêng làm những chuyện lớn trong gia đình. Quan niệm này có từ lâu và mang tính phổ biến, vậy vì sao lại có điều này?\r\nTháng cô hồn là bắt đầu từ ngày 1.7 đến 30.7 âm lịch (tức từ 4.8 đến 2.9 dương lịch). Tuy nhiên, theo quan niệm xưa sau ngày 15.7 âm lịch các cô hồn không còn nhiều nữa do Diêm vương đã cho đóng cửa Quỷ Môn Quan vào 12 giờ ngày 14.7 âm lịch.\r\n\r\nTháng \"cô hồn\" có nguồn gốc từ đâu?\r\nChia sẻ với Thanh Niên, ông Vũ Gia Hiền, Giám đốc Trung tâm Nghiên cứu và Ứng dụng văn hóa Du lịch cho biết, việc gọi tháng 7 âm lịch là tháng \"cô hồn\" không có lịch sử rõ ràng. Tuy nhiên, theo truyền thuyết tháng 7 âm lịch là tháng có những người chết không có nơi nương tựa, không có gia đình, ma quỷ đi lang thang khắp nơi. Điều này gắn liền với thời xa xưa, mang tính phong tục.', 'posts/WfeH3vmioqhc0hQmTmpssouRQvDaCHtz7g22mvwy.png', 1, '2024-08-04 08:44:58', '2024-08-04 08:44:58'),
(11, 3, 'Nhân tố kiệt xuất cực lạ đến từ đảo quốc chỉ 200.000 dân, giành HCV Olympic là ai?', 'Kỳ tích từ đảo quốc \'tí hon\'\r\nJulien Alfred đã viết nên câu chuyện cổ tích thời hiện đại, khi cô mang về cho đảo quốc Saint Lucia tấm HCV lịch sử ở Olympic Paris. Có hai điều đáng nói về Alfred. Thứ nhất, cô chiến thắng nhà vô địch thế giới Sha\'Carri Richardson (Mỹ) ở đường chạy 100 m, vốn là nội dung danh giá nhất trong môn điền kinh. Thứ hai, phải đến khi Alfred chiến thắng, có lẽ phần lớn người hâm mộ thể thao thế giới mới lần đầu nghe đến tên quê hương của cô.\r\n\r\nSaint Lucia, nơi Julien Alfred cất tiếng khóc chào đời, là quốc đảo nằm trong lòng Đại Tây Dương, phía đông vùng biển Caribe. Đảo quốc này có diện tích 617 km2, chỉ lớn hơn đôi chút so với đảo Phú Quốc của Việt Nam (571 km2). Dân số của Saint Lucia là khoảng 180.000 người. Để so sánh, con số này chưa bằng một nửa dân số quận Đống Đa, TP.Hà Nội.', 'posts/nL8b4KCMJg0eJCtmKkUVILGVXJvnl4pmimvDo3IO.png', 1, '2024-08-04 08:45:53', '2024-08-04 08:45:53'),
(12, 3, 'AFF Cup bất ngờ có tin rất mới về lịch thi đấu, Việt Nam tránh được xung đột', 'Liên đoàn Bóng đá Đông Nam Á đang lên kế hoạch lùi lịch thi đấu AFF Cup 2024, để tránh xung đột quyền lợi với các cúp châu Á mùa giải 2024-2025, đồng thời tránh xung đột quyền lợi với các giải vô địch ở các quốc gia.Theo đó, lịch thi đấu mới của AFF Cup (tên gọi mới là ASEAN Championship), dự kiến sẽ bắt đầu từ ngày 9.12.2024 (lịch cũ khai mạc ngày 23.11) và kết thúc bằng trận chung kết vào ngày 5.1.2025 (lịch cũ ngày 21.12.2024). Theo lý giải của Liên đoàn Bóng đá Đông Nam Á (AFF), sở dĩ họ lùi lịch thi đấu của AFF Cup, nhằm tránh xung đột với lịch thi đấu của 2 cúp châu Á, gồm AFC Champions League Elite (tên cũ là AFC Champions League, hay Cúp C1) và AFC Champions League 2 (tên cũ là AFC Cup, hay Cúp C2).', 'posts/ZbW6mcrJ2xJrNI1DJlmrD5ccvAdpGd6eN8dSxyf8.png', 1, '2024-08-04 08:46:16', '2024-08-04 08:47:28'),
(13, 3, 'Lại thêm võ sĩ nữ bị nghi ngờ giới tính giành huy chương, Olympic 2024 thật kỳ lạ', 'Nữ võ sĩ Đài Loan Lin Yu-ting, người gây tranh cãi lớn về giới tính tại Olympic 2024, đã đảm bảo đoạt ít nhất HCĐ sau khi giành chiến thắng thuyết phục ở trận tứ kết diễn ra ngày 4.8.\r\nLin Yu-ting cùng với võ sĩ người Algeria Imane Khelif đang là tâm điểm của câu chuyện hậu trường liên quan đến giới tính tại Olympic năm nay. Lin Yu-ting đã đánh bại Svetlana Staneva của Bulgaria bằng quyết định tính điểm nhất trí để lọt vào bán kết quyền anh hạng cân 57 kg nữ.', 'posts/XnOA0QVxyN2Xk00GRrw8Q7UVwt7KfejpVFEiBARA.png', 1, '2024-08-04 08:47:48', '2024-08-04 08:47:48'),
(14, 4, 'Sở GD-ĐT TP.HCM lưu ý về tuyển sinh lớp 10 ở trường ngoài công lập', 'Theo đó, Sở GD-ĐT TP.HCM yêu cầu các trường ngoài công lập chỉ thực hiện công tác tuyển sinh lớp 10 năm học 2024-2025 và hoạt động tại những cơ sở đảm bảo đủ điều kiện cơ sở vật chất. Những cơ sở này đã được Sở GD-ĐT cấp quyết định cho phép hoạt động giáo dục.\r\n\r\nĐồng thời, trong quá trình tuyển sinh, các trường không được vượt quá chỉ tiêu tuyển sinh lớp 10 đã được phê duyệt. Trường hợp nhà trường có nhu cầu điều chỉnh chỉ tiêu tuyển sinh lớp 10 năm học 2024-2025, cần rà soát các điều kiện về cơ sở vật chất, trang thiết bị, nhân sự, đảm bảo đủ điều kiện tiếp nhận thêm học sinh, gửi công văn kèm hồ sơ minh chứng về hệ thống văn phòng điện tử của Sở GD-ĐT TP.HCM trước ngày 15.8.', 'posts/qvScBP4Mnmpns3s3d1HED0AfoBgIte5gKGJ4dyus.png', 1, '2024-08-04 08:49:26', '2024-08-04 08:49:26'),
(15, 4, 'Thương binh 2/4 nhận bằng tiến sĩ ở tuổi 73', 'Ông Đoàn Hoàng Hải (ngụ H.Ba Tri, Bến Tre), thương binh 2/4, vừa nhận bằng tiến sĩ ngành kinh tế tại Trường ĐH Trà Vinh. Nghị lực phi thường của ông khiến nhiều người trẻ cảm phục.\r\nTân tiến sĩ ngành kinh tế 73 tuổi\r\nNgày 3.8, Trường ĐH Trà Vinh tổ chức lễ trao bằng tốt nghiệp cho 7 tân tiến sĩ và 408 thạc sĩ. Trong đó, ông Đoàn Hoàng Hải (tuổi 73, ngụ H.Ba Tri, Bến Tre) là người lớn tuổi nhất từ trước đến nay nhận bằng tiến sĩ của trường.\r\n\r\nÔng Đoàn Hoàng Hải hiện là Phó trưởng ban Thường trực Ban liên lạc đồng hương Bến Tre tại TP.HCM và là ủy viên Ủy ban MTTQ Việt Nam tỉnh Bến Tre (nhiệm kỳ 2024 -2029). Ông tham gia nghiên cứu sinh chuyên ngành quản trị kinh doanh tại Trường ĐH Trà Vinh và bảo vệ thành công luận án tiến sĩ với đề tài \"Các nhân tố ảnh hưởng đến phát triển nguồn nhân lực trong doanh nghiệp: Trường hợp Viễn thông TP.HCM\".', 'posts/4vju1MvSu3hNCu5EFd3uzOCjGLcJSMiSwXPOrJ7x.png', 1, '2024-08-04 08:49:44', '2024-08-04 08:49:44'),
(16, 4, 'Những trường ĐH không đăng ký nguyện vọng xét tuyển theo hệ thống Bộ GD-ĐT', 'Theo quy định, thí sinh muốn xét tuyển ĐH cần thực hiện đăng ký nguyện vọng trên cổng xét tuyển chung của Bộ GD-ĐT. Nhưng với một số trường ĐH, thí sinh xét tuyển không cần thực hiện đăng ký này.\r\nMột số trường ĐH tại Việt Nam quy định thí sinh xét tuyển cần nộp hồ sơ trực tuyến theo quy định riêng tại trường, không thực hiện đăng ký nguyện vọng trên cổng xét tuyển chung của Bộ GD-ĐT.\r\n\r\nTrường ĐH RMIT Việt Nam\r\nNăm 2024, Trường ĐH RMIT Việt Nam có 3 kỳ nhập học gồm: tháng 2-3, tháng 6-7 và tháng 10. Trong kỳ nhập học tháng 10, hạn cuối nộp hồ sơ vào ngày 11.10 hoặc đến khi ngành học nhận đủ hồ sơ. Ứng viên điền mẫu đơn đăng ký nhập học theo hình thức trực tuyến theo quy định của trường.', 'posts/364Vhn49E2AJl9FoEHFsN6SHfwJlseYlNWLG15zQ.png', 1, '2024-08-04 08:50:11', '2024-08-04 08:50:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'quangntph32839@fpt.edu.vn', NULL, '$2y$12$sIjuodPePsuLEaEa22M5iOo1/QiDauSh2Bbs.mM9CJyNHwZg1ENAG', 'admin', NULL, '2024-08-04 07:50:29', '2024-08-04 07:50:29'),
(3, 'Quang', 'quangcachekk20042004@gmail.com', NULL, '$2y$12$v4KTh4CYb6YaUuje0w4agufIgMMn0U/GmYFb4tJwiGDvTcdj/qnv.', 'client', NULL, '2024-08-04 18:30:46', '2024-08-04 18:30:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catelories`
--
ALTER TABLE `catelories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_catelory_id_foreign` (`catelory_id`);

--
-- Chỉ mục cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `post_tags_tag_id_foreign` (`tag_id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catelories`
--
ALTER TABLE `catelories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_catelory_id_foreign` FOREIGN KEY (`catelory_id`) REFERENCES `catelories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
