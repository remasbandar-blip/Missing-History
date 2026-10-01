-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 مايو 2026 الساعة 16:13
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `missing_history`
--

-- --------------------------------------------------------

--
-- بنية الجدول `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `status` enum('lost','found','stolen') DEFAULT 'lost',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `image_url`, `status`, `created_at`) VALUES
(2, 'تماثيل مملكة لحيان', 'تم العثور على بعض القطع خلال التنقيبات الأثرية، تعود للقرن السادس إلى الثاني قبل الميلاد في العلا, السعودية, وتم توثيقها وحفظها في المتحف الوطني السعودي.\r\nالقيمة التاريخية:\r\nتعكس الحياة السياسية والتجارية والفنية لمملكة لحيان، وتُظهر مستوى متقدمًا من النحت والكتابة في الجزيرة العربية القديمة.', 'uploads/articles/article_6994dffb215a26.65472973.jpeg', 'stolen', '2026-02-17 20:26:45'),
(3, 'الثور المجنح (لامماسو)', 'عُثر على هذه التماثيل الضخمة في مدن الموصل ونمرود القديمة بالعراق، وهي تعود للحضارة الآشورية. خلال القرن التاسع عشر، نُقلت أجزاء كبيرة منها إلى أوروبا بواسطة بعثات تنقيب بريطانية وفرنسية، وتُعرض حالياً في المتحف البريطاني ومتحف اللوفر. أما ما تبقى منها في موطنه الأصلي، فقد تعرض لعملية تدمير مأساوية على يد تنظيم داعش عام 2015م، بينما سُرقت القطع الصغيرة منها لتهريبها وبيعها في الأسواق السوداء.\r\nقيمته التاريخية:\r\nيعود تاريخه للقرن الثامن قبل الميلاد، وهو تمثال برأس إنسان وجسد ثور وأجنحة نسر. كان يُوضع على بوابات القصور لحمايتها، ويرمز للقوة والحكمة والذكاء في بلاد الرافدين، ويُعد من أضخم وأعقد المنحوتات في العالم القديم.', 'uploads/articles/article_6994dbd4291781.23099834.jpg', 'stolen', '2026-02-17 20:27:13'),
(4, 'رجل المعاناة', 'تم العثور على التمثال عام 1974م على يد راعية غنم في منطقة الكهف ,حائل, السعودية، عمره حوالي 6000 سنه, وتم حفظه من الضياع ليصبح من أشهر القطع الأثرية السعودية، ويُعرَض أحيانًا في معارض دولية لتعريف العالم بالتراث السعودي.\r\nالقيمة التاريخية:\r\nيُعد من أقدم وأندر الأعمال الفنية في الجزيرة العربية، ويُظهر مستوى عالي من الفن والتعبير لدى الشعوب القديمة، ويُعتبر وثيقة مهمة لفهم الحياة والمشاعر الإنسانية في تلك الفترة.', 'uploads/articles/article_6994cf3d7285f7.00238300.jpeg', 'stolen', '2026-02-17 20:27:41'),
(5, 'سقف معبد دندرة', 'المقصود هو نقش زودياك دندرة الدائري الذي كان يزين سقف أحد أجزاء معبد دندرة في صعيد مصر. في عام 1820 تقريبًا، وخلال الوجود الفرنسي في مصر، قام مغامر فرنسي بقطع اللوحة الحجرية من مكانها في السقف باستخدام أدوات خاصة، ثم نُقلت إلى فرنسا. وهي معروضة حاليًا في متحف اللوفر في باريس.\r\nقيمته التاريخية:\r\nيمثل خريطة فلكية تتضمن الأبراج والكواكب كما فهمها المصريون القدماء, ويدل على تقدمهم في علم الفلك وحساب الزمن ويُعد من أهم النقوش الفلكية المكتشفة من الحضارة المصرية ويعكس ارتباط الدين بعلم الفلك في مصر القديمة.', 'uploads/articles/article_6994e2200f14c3.60117172.jpeg', 'stolen', '2026-02-17 21:48:16'),
(6, 'بوابة عشتار', 'بوابة عشتار كانت المدخل الشمالي لمدينة بابل القديمة في العراق، وبُنيت في عهد الملك نبوخذ نصر الثاني حوالي 575 قبل الميلاد.\r\nفي أوائل القرن العشرين (بين 1902–1914م)، قامت بعثة ألمانية بالتنقيب في بابل، وتم نقل أجزاء كبيرة من البوابة إلى ألمانيا بموافقة السلطات العثمانية آنذاك. بعد ذلك أُعيد تركيبها في متحف برلين، وما زالت هناك حتى اليوم.\r\nقيمتها الأثرية:\r\nتمثل عظمة الحضارة البابلية وقوتها, مميزة بزخارف الطوب الأزرق اللامع, تحتوي على رسومات بارزة لثيران وتنانين ترمز للآلهة البابلية, تُعد من أهم الشواهد المعمارية في حضارة بلاد الرافدين.', 'uploads/articles/article_6994e2d05fc467.58422580.jpeg', 'stolen', '2026-02-17 21:51:12');

-- --------------------------------------------------------

--
-- بنية الجدول `missing_artifacts`
--

CREATE TABLE `missing_artifacts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `date_lost` date DEFAULT NULL,
  `status` enum('lost','found','stolen') NOT NULL DEFAULT 'lost',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `missing_artifacts`
--

INSERT INTO `missing_artifacts` (`id`, `title`, `description`, `image_url`, `location`, `date_lost`, `status`, `created_by`, `created_at`) VALUES
(2, 'رأس تمثال من دادان (العلا)', 'قطعة حجرية تعود لحضارة دادان في منطقة العلا. كانت من ضمن قطع أثرية هُرّبت خارج المملكة في فترات سابقة، ثم نجحت هيئة التراث السعودية في استعادتها ضمن جهود استرجاع الآثار المهربة.\r\nقيمته التاريخية:\r\nيعود تقريبًا إلى القرن الخامس قبل الميلاد، ويعكس تطور الفن والنحت في شمال غرب الجزيرة العربية، ويدل على عراقة الحضارات القديمة في أرض المملكة.', 'uploads/artifact_699494d57f4860.16948340.jpeg', 'دادان منطقة (العلا)', NULL, 'stolen', 1, '2026-02-17 13:21:50'),
(3, 'تمثال بنين البرونزية', 'هي مجموعة تماثيل ولوحات معدنية كانت تزيّن قصر مملكة بنين (في نيجيريا حاليًا). عام 1897م شنّت بريطانيا حملة عسكرية ونهبت آلاف القطع، ثم نُقلت إلى أوروبا، وأشهر مكان تُعرض فيه هو المتحف البريطاني، إضافةً إلى متاحف أخرى. وفي السنوات الأخيرة بدأت بعض الدول بإعادة أجزاء منها إلى نيجيريا.\r\nقيمتها التاريخية:\r\nتعود للقرنين 13–19م، وتُعد من أرقى الفنون الإفريقية التقليدية، وتوثّق تاريخ وحياة ملوك وشعب مملكة بنين بدقة فنية عالية.', 'uploads/artifact_6994928957d7b1.30716508.jpeg', 'القصر الملكي لمملكة \"بنين\" (التي تقع في نيجيريا الحاليا)', NULL, 'stolen', 1, '2026-02-17 13:22:29'),
(4, 'حجر رشيد', 'اكتُشف سنة 1799م في مدينة رشيد بمصر على يد جنود الحملة الفرنسية بقيادة نابليون بونابرت. وبعد هزيمة فرنسا، استولت بريطانيا عليه سنة 1801م ونقلته إلى المتحف البريطاني في لندن، حيث يُعرض حتى اليوم.\r\n\r\nقيمته التاريخية:\r\nيعود إلى عام 196 ق.م، ومكتوب بثلاث لغات (الهيروغليفية، الديموطيقية، واليونانية). وكان المفتاح الذي مكّن العالم الفرنسي جان فرانسوا شامبليون من فك رموز الكتابة الهيروغليفية سنة 1822م، لذلك يُعد من أهم الاكتشافات في تاريخ علم المصريات.', 'uploads/artifact_69948bef4a6870.03231916.jpeg', 'مدينة رشيد بمحافظة البحيرة', NULL, 'stolen', 1, '2026-02-17 13:23:00'),
(5, 'تمثال نفرتيتي', 'تم اكتشافه سنة 1912م في تل العمارنة بمصر على يد بعثة ألمانية بقيادة عالم الآثار لودفيغ بورخارت. بعدها نُقل التمثال إلى ألمانيا بطريقة مثيرة للجدل؛ حيث يرى كثير من المصريين أن تفاصيل أهميته لم تُوضَّح بشكل كامل أثناء تقسيم الآثار، فخرج من مصر واستقر في برلين، ويُعرض حاليًا في متحف برلين الجديد. ولا تزال مصر تطالب باستعادته.\r\nقيمته التاريخية:\r\nالتمثال يعود لأكثر من 3300 سنة، ويُعد من أروع نماذج الفن المصري القديم، ويرمز لقوة وجمال الملكة نفرتيتي وعصرها في الدولة الحديثة. قيمته الأثرية والتاريخية لا تُقدّر بثمن لأنه قطعة فريدة ونادرة جدًا.', 'uploads/artifact_69948225a07883.01477307.jpeg', 'منطقة تل العمرانية', NULL, 'stolen', 1, '2026-02-17 13:23:32');

-- --------------------------------------------------------

--
-- بنية الجدول `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `welcome_image` varchar(500) DEFAULT 'welcome-image.jpg',
  `site_title` varchar(200) DEFAULT 'MISSING HISTORY',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `site_settings`
--

INSERT INTO `site_settings` (`id`, `welcome_image`, `site_title`, `updated_at`) VALUES
(1, 'uploads/welcome/welcome_69949904482c2.jpeg', 'MISSING HISTORY', '2026-02-17 16:36:20');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','editor','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$XDxp4mAo0AqtWeRDkIH4f.rO7m/TnwDaKrYZnuVdup.kLi4CRG84O', 'admin', '2026-02-17 13:09:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missing_artifacts`
--
ALTER TABLE `missing_artifacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `missing_artifacts`
--
ALTER TABLE `missing_artifacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `missing_artifacts`
--
ALTER TABLE `missing_artifacts`
  ADD CONSTRAINT `missing_artifacts_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
