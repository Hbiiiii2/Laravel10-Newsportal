-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 03:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tembokberita`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '/storage/about/1717430215.jpg', 'Selamat Datang di Tembok Berita', '<p style=\"text-align:justify\">Selamat datang di Tembok Berita, platform berita terdepan yang dikembangkan oleh Tim Gacor. Kami berdedikasi untuk menyajikan berita terbaru dan analisis mendalam dengan integritas dan inovasi. Tembok Berita lahir dari semangat untuk menyediakan informasi yang akurat, relevan, dan berkualitas kepada masyarakat. Kami percaya bahwa informasi yang tepat dapat memberdayakan masyarakat untuk membuat keputusan yang lebih baik dan bijaksana dalam kehidupan sehari-hari.</p>\r\n\r\n<p style=\"text-align:justify\">Misi kami adalah menjadi sumber berita utama yang dapat dipercaya oleh semua kalangan. Kami berkomitmen untuk menjaga standar jurnalistik yang tinggi, dengan mengutamakan keakuratan, keseimbangan, dan keberagaman perspektif dalam setiap berita yang kami sajikan. Tim Gacor terdiri dari jurnalis profesional, peneliti, dan editor berpengalaman yang bekerja tanpa lelah untuk memastikan setiap berita yang diterbitkan telah melalui proses verifikasi yang ketat.</p>\r\n\r\n<p style=\"text-align:justify\">Di Tembok Berita, kami memahami pentingnya inovasi dalam dunia digital yang terus berkembang. Oleh karena itu, kami selalu berusaha untuk menghadirkan fitur-fitur terbaru yang memudahkan pembaca dalam mengakses dan menikmati berita. Dengan tampilan yang user-friendly dan navigasi yang intuitif, kami memastikan bahwa pengalaman membaca Anda selalu menyenangkan dan informatif.</p>\r\n\r\n<p style=\"text-align:justify\">Kami juga sangat menghargai umpan balik dari pembaca. Setiap komentar dan masukan yang Anda berikan sangat berarti bagi kami untuk terus meningkatkan kualitas layanan dan konten yang kami sajikan. Di Tembok Berita, kami tidak hanya menyampaikan berita, tetapi juga mendengarkan dan berinteraksi dengan komunitas kami. Kami percaya bahwa keterlibatan aktif pembaca adalah kunci untuk menciptakan platform berita yang benar-benar bermanfaat bagi semua orang.</p>\r\n\r\n<p style=\"text-align:justify\">Selain menyajikan berita terkini, Tembok Berita juga menyediakan berbagai rubrik menarik yang mencakup beragam topik seperti politik, ekonomi, teknologi, kesehatan, hiburan, olahraga, dan lain-lain. Kami ingin memastikan bahwa Anda selalu mendapatkan informasi terbaru di berbagai bidang yang Anda minati. Setiap artikel yang kami sajikan disusun dengan teliti oleh para ahli di bidangnya, sehingga Anda dapat menikmati konten yang mendalam dan informatif.</p>\r\n\r\n<p style=\"text-align:justify\">Tembok Berita juga berkomitmen untuk menjadi platform yang inklusif dan ramah bagi semua pembaca. Kami menghargai keberagaman dan berusaha untuk mencerminkan hal tersebut dalam setiap konten yang kami sajikan. Baik Anda seorang profesional yang sibuk, mahasiswa, ibu rumah tangga, atau siapa pun, kami percaya bahwa Tembok Berita dapat menjadi sumber informasi yang bermanfaat bagi Anda.</p>\r\n\r\n<p style=\"text-align:justify\">Tim Gacor selalu berusaha untuk berkembang dan berinovasi. Kami bertekad untuk terus memperbaiki dan memperluas layanan kami, menjalin kemitraan dengan berbagai pihak, serta menghadirkan konten-konten eksklusif yang hanya bisa Anda temukan di Tembok Berita. Kami juga berkomitmen untuk menjaga keberlanjutan lingkungan dengan memanfaatkan teknologi ramah lingkungan dalam operasional kami.</p>\r\n\r\n<p style=\"text-align:justify\">Kami mengundang Anda untuk menjelajahi Tembok Berita dan menemukan berbagai artikel menarik yang telah kami sajikan. Dengan dukungan Anda, kami yakin bahwa Tembok Berita akan terus berkembang menjadi platform berita yang lebih baik dan bermanfaat bagi semua. Terima kasih telah menjadi bagian dari komunitas Tembok Berita. Bersama-sama, mari kita wujudkan masyarakat yang lebih cerdas dan terinformasi.</p>', '2024-06-03 08:36:16', '2024-06-03 10:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `breaking_news`
--

CREATE TABLE `breaking_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `breaking_news`
--

INSERT INTO `breaking_news` (`id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 8, '2024-06-02 09:55:10', '2024-06-02 09:55:10'),
(3, 5, '2024-06-02 11:06:25', '2024-06-02 11:06:25'),
(4, 13, '2024-06-03 15:48:41', '2024-06-03 15:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'https://via.placeholder.com/640x480.png/0077dd?text=suscipit', 'Berita', 'sed-qui-odit-et-suscipit-molestiae-vitae', '2024-06-02 09:54:03', '2024-06-02 09:54:03'),
(2, 'https://via.placeholder.com/640x480.png/00ee77?text=voluptatem', 'Olahraga', 'sit-sed-vel-at-beatae', '2024-06-02 09:54:03', '2024-06-02 09:54:03'),
(3, 'https://via.placeholder.com/640x480.png/0000aa?text=velit', 'Politik', 'eligendi-accusamus-ut-repellat-beatae', '2024-06-02 09:54:03', '2024-06-02 09:54:03'),
(4, 'https://via.placeholder.com/640x480.png/005566?text=odit', 'Hiburan', 'ullam-qui-commodi-dolorem-ea-iste', '2024-06-02 09:54:03', '2024-06-02 09:54:03'),
(5, 'https://via.placeholder.com/640x480.png/006699?text=placeat', 'Kesehatan', 'omnis-aut-occaecati-ab-ut-eius', '2024-06-02 09:54:03', '2024-06-02 09:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `content`, `created_at`, `updated_at`) VALUES
(11, 9, 'Lazuardi Irham Karaman', 'irhamkaraman@gmail.com', 'sdafasdfasdfasfa', '2024-06-03 07:26:22', '2024-06-03 07:26:22'),
(12, 3, 'Lazuardi Irham Karaman', 'irhamkaraman@gmail.com', 'sdfasdfsadfas', '2024-06-03 07:26:39', '2024-06-03 07:26:39'),
(13, 2, 'Lazuardi Irham Karaman', 'irhamkaraman@gmail.com', 'dfaskdfasjdfklasf', '2024-06-03 07:37:11', '2024-06-03 07:37:11'),
(15, 12, 'Admin', 'admin@gmail.com', 'hallo mas brouh', '2024-06-03 15:46:00', '2024-06-03 15:46:00'),
(16, 14, 'Admin', 'admin@gmail.com', 'sdfawini ts postinganini ts postinganini ts postinganini ts postinganini ts postingan', '2024-06-03 15:47:58', '2024-06-03 15:47:58'),
(17, 13, 'Admin', 'admin@gmail.com', 'ini ts postinganini ts postinganini ts postinganini ts postinganini ts postinganini ts postingan', '2024-06-03 15:48:09', '2024-06-03 15:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_10_12_000000_create_roles_table', 1),
(2, '2014_10_12_000001_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_30_070100_create_categories_table', 1),
(7, '2024_05_30_075918_create_posts_table', 1),
(8, '2024_05_31_120153_create_breaking_news_table', 1),
(9, '2024_06_03_083743_create_comments_table', 2),
(10, '2024_06_03_151518_create_abouts_table', 3),
(11, '2024_06_03_171823_create_videos_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `views` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `slug`, `title`, `image`, `body`, `views`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'est-accusamus-nemo-voluptatem-incidunt', 'Harum beatae consequatur cumque repudiandae est alias ut.', 'https://via.placeholder.com/640x480.png/00aa33?text=ut', 'Et voluptates distinctio sed et. Non sed tenetur minus aut delectus iste quisquam.', '56', '2023-06-27 05:07:29', '2024-01-12 03:00:49'),
(2, 1, 4, 'ut-ullam-neque-dolores-corporis-recusandae-suscipit', 'Voluptas natus et deserunt harum consequatur ut quas.', 'https://via.placeholder.com/640x480.png/009999?text=ut', 'Commodi et dolore hic voluptatem. Doloremque ut in accusantium itaque. Et quae reiciendis eveniet. Rerum voluptatum in cupiditate libero est qui.', '47', '2023-12-31 15:20:40', '2024-06-03 08:00:44'),
(3, 1, 5, 'voluptatibus-excepturi-beatae-exercitationem-voluptates-et-rerum-cumque-consequuntur', 'Voluptatem blanditiis id totam tempora.', 'https://via.placeholder.com/640x480.png/00ff77?text=velit', 'Sed tempora et porro ducimus. Mollitia officiis quod consequatur laudantium molestias. Voluptatem fugit officia quo quisquam dolores praesentium.', '84', '2024-01-24 06:58:32', '2024-06-03 07:36:59'),
(4, 1, 5, 'amet-nihil-nisi-corporis-labore-libero-sed', 'Adipisci at ut voluptate.', 'https://via.placeholder.com/640x480.png/001188?text=sit', 'Tenetur necessitatibus quia molestiae natus provident. Unde quis excepturi aut aut. Facere eos et quo fugiat non quae. Assumenda velit aut ratione sint veritatis aliquid ea.', '54', '2023-07-19 04:55:16', '2024-06-03 07:36:50'),
(5, 1, 4, 'sint-et-aliquam-voluptate-aut-molestiae-qui', 'Placeat vel voluptates earum expedita minima.', 'https://via.placeholder.com/640x480.png/0077ff?text=eaque', 'Incidunt esse molestias sit qui laborum at. Laudantium a consectetur culpa aliquid odio sunt. Recusandae aut doloribus quo libero sunt. Maxime voluptatem veritatis sunt laborum omnis.', '82', '2024-04-22 12:22:55', '2024-06-03 02:17:24'),
(6, 1, 5, 'voluptatem-sed-molestiae-sapiente-occaecati-rerum', 'In quod qui ratione magnam est quia dolore.', 'https://via.placeholder.com/640x480.png/00aa00?text=quis', 'Dicta id distinctio minus placeat omnis fuga. Qui illum aspernatur ea id animi inventore fuga. Adipisci veniam voluptatem sit id. Neque doloremque consequuntur esse ratione eum.', '73', '2023-11-29 23:39:34', '2024-06-03 07:19:05'),
(7, 1, 4, 'ullam-quam-praesentium-sit-qui-reprehenderit-et-ex', 'Illo ut est velit sunt.', 'https://via.placeholder.com/640x480.png/0044bb?text=maxime', 'Et maxime ipsa quos autem dolore. Et blanditiis aut ducimus aspernatur non rerum sed. Mollitia aperiam harum excepturi architecto expedita porro. Vero non ea rerum dolor.', '0', '2023-06-24 22:41:41', '2023-10-15 05:45:18'),
(8, 1, 2, 'dolor-eveniet-natus-et-eligendi-iure-quod', 'Maxime quasi quas ad molestiae.', 'https://via.placeholder.com/640x480.png/00ee55?text=quo', 'Repellat voluptate iusto veritatis qui consequatur omnis eos. Est placeat ipsa animi doloremque. Iure accusantium perferendis adipisci dicta dolores reiciendis excepturi id. Saepe quia blanditiis sit consequatur.', '83', '2024-03-13 13:46:48', '2024-06-03 07:37:55'),
(9, 1, 5, 'voluptatibus-rerum-error-voluptas-laborum', 'Ab architecto consequatur laborum ut in.', 'https://via.placeholder.com/640x480.png/00ff22?text=velit', 'Nostrum enim sunt quam repellat illo sunt. Quibusdam quos sunt quis nisi expedita. Quibusdam non sunt tenetur est.', '18', '2024-03-01 06:39:53', '2024-06-03 07:26:23'),
(10, 1, 4, 'eos-mollitia-et-mollitia-rerum-earum-voluptas', 'Est corrupti ea tenetur autem.', 'https://via.placeholder.com/640x480.png/008888?text=quia', 'Provident minima rerum iusto. Suscipit sit sint voluptas aperiam officiis. Beatae ipsum harum adipisci sapiente et inventore.', '16', '2023-09-18 12:54:32', '2024-06-03 02:11:05'),
(12, 1, 2, 'terserah', 'terserah', '/storage/posts/1717434731.jpg', '<p>terserah jawab sendiri</p>', '4', '2024-06-03 10:12:11', '2024-06-03 15:46:00'),
(13, 1, 5, 'xontoll-pak', 'xontoll pak', '/storage/posts/1717454838.jpg', '<p>xontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pak</p>\r\n\r\n<p>xontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pak</p>\r\n\r\n<p>xontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pakxontoll pak</p>', '2', '2024-06-03 15:47:19', '2024-06-03 15:48:09'),
(14, 1, 2, 'ini-ts-postingan', 'ini ts postingan', '/storage/posts/1717454863.jpg', '<p>ini ts postinganini ts postinganini ts postinganini ts postinganini ts postinganini ts postinganini ts postinganini ts postinganini ts postinganini ts postinganini ts postinganini ts postinganini ts postinganini ts postingan</p>\r\n\r\n<p>ini ts postinganini ts postinganini ts postinganini ts postingan</p>', '15', '2024-06-03 15:47:43', '2024-06-03 18:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-06-02 09:54:02', '2024-06-02 09:54:02'),
(2, 'member', '2024-06-02 09:54:02', '2024-06-02 09:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `google_id`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '2024-06-02 09:54:03', '$2y$12$TgneXY/qUVjbFpzXRAmHzugpMOk7hf7zCuggDyBcbaOs6kJGQOyou', 1, NULL, '2024-06-02 09:54:03', '2024-06-02 09:54:03'),
(2, 'Lazuardi Irham Karaman', 'irhamkaraman@gmail.com', '109066322600372036992', NULL, '$2y$12$uPzuVHUV1rBS8TJG83UqmOKBhw1uAUxfZYKw59NKFhxsGx6..a.w.', 2, NULL, '2024-06-02 10:38:33', '2024-06-02 10:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Update Kasus Vina, Saka: Sosok Pegi Beda Dengan Foto DPO', 'https://www.youtube.com/embed/GOkOev8MXBY', '2024-06-03 15:14:10', '2024-06-03 15:14:10'),
(2, 'Misteri Rekaman CCTV Pembunuhan Vina Cirebon Disebar Hacker?', 'https://www.youtube.com/embed/yqZ89O0Vm1w', '2024-06-03 15:39:03', '2024-06-03 15:39:03'),
(3, 'Momen Pesawat TNI AU Airdrop Bantuan ke Gaza dari Ketinggian 2.000 Kaki', 'https://www.youtube.com/embed/zHkWIfaCyKg', '2024-06-03 15:39:40', '2024-06-03 15:39:40'),
(4, 'Fakta Baru Kasus Vina Cirebon, Foto DPO Bukan Pegi Setiawan', 'https://www.youtube.com/embed/VImosMZX1rI', '2024-06-03 15:40:28', '2024-06-03 15:40:28'),
(5, 'Ahli Ungkap Keaslian Video CCTV Yang Tangkap Wajah Para Pelaku Saat Eksekusi Vina Cirebon! | INDEPTH', 'https://www.youtube.com/embed/vO5pa0kqxXc', '2024-06-03 15:41:12', '2024-06-03 15:41:12'),
(6, 'Menhan Prabowo Ingatkan AS dan China Bijaksana dalam Persaingan Global', 'https://www.youtube.com/embed/qurC2oS29tM', '2024-06-03 15:42:09', '2024-06-03 15:42:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breaking_news`
--
ALTER TABLE `breaking_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `breaking_news_post_id_foreign` (`post_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `breaking_news`
--
ALTER TABLE `breaking_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `breaking_news`
--
ALTER TABLE `breaking_news`
  ADD CONSTRAINT `breaking_news_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
