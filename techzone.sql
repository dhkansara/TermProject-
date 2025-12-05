-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2025 at 01:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `password`, `created_at`) VALUES
(1, 'Site Admin', 'admin@techzone.com', '$2y$10$jwm4ZBMeLxCfyTNZkXcLVeEDlD1scS06JNrqxWqr0qm6VW2EIGUcO', '2025-12-03 02:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `created_at`) VALUES
(1, 'Dhruv Kansara', 'dhruvkansara332@gmail.com', '$2y$10$YVBjT6Nb0EUbw1NNyLIzIO8ysYiVzz1FBFLONTlUaSCfKSCnlk5U.', '4375669406', '4 Chatsworth Drive', '2025-12-02 22:21:11'),
(2, 'Dhruv Kansara', 'dhruvkansara332@gmail.com', '$2y$10$LVNkHCzliTo3uEPBTLQtm.gR8jlC6vNQWR5sM/ajHzz76eBuZjU9O', NULL, NULL, '2025-12-02 22:31:23'),
(3, 'Dhruv Kansara', 'dhruvkansara332@gmail.com', '$2y$10$gYgwd1M3xRkppkhzjH2yB.Y6MvnC/jhK9dYeIznh3nJKaiVWpMVTa', NULL, NULL, '2025-12-02 22:32:15'),
(4, 'Dhruv Kansara', 'dhruvkansara332@gmail.com', '$2y$10$qRuql4ndGt7LUG9qfMNXL.Zuh1LZ1F/lbINJEAe14GzSK36E8hWfq', NULL, NULL, '2025-12-02 22:32:27'),
(5, 'Dhruv Kansara', 'dhruvkansara332@gmail.com', '$2y$10$LcZhMfF0Sl7ZHYIk.ge7qeXG2C0MmNAMlBxTcFI4Hb0J.VfKKQBMK', NULL, NULL, '2025-12-02 22:33:14'),
(6, 'Dhruv Kansara', 'dhruvkansara332@gmail.com', '$2y$10$LY/gdDJcHaisojUoOKDcE.9IOn./QFIFgSxNno6Eg6VSfc9dH4BWK', NULL, NULL, '2025-12-03 01:14:45'),
(7, 'Dhruv Kansara', 'dhruvkansara332@gmail.com', '$2y$10$Ws/4V7V3eNP015MiRnyZWeOYJ6x7yWLPaObO49xe0KEgxspwBx2XW', NULL, NULL, '2025-12-03 01:24:00'),
(8, 'Aksh Patel', 'akshpatel1434@gmail.com', '$2y$10$J2p7KDx4t7nkdqtxAv2FDuprAvoWag9MVsZ6na8C35KcbtKbi9VOe', NULL, NULL, '2025-12-03 02:01:29'),
(9, 'Aksh Patel', 'akshpatel1434@gmail.com', '$2y$10$LjGfVAAK43BTvXUn7QyiTujjUiD6AuDXetGus8urPaJQjwukSnNpe', NULL, NULL, '2025-12-03 02:02:15'),
(10, 'Dhruv Kansara', 'dhruvkansara332@gmail.com', '$2y$10$.p.XtG7KT70Dv.D2ZhRUHO58n6usJmZkCFYjudnoHk2iUD/ZvbUxu', NULL, NULL, '2025-12-03 02:02:40'),
(11, 'Dhruv Kansara', 'admin@techzone.com', '$2y$10$BbeG6/3TZdfsqGAurpfnd.G5U7XLfLLgxZvH4MUz.q4fvQ.FMl8tu', NULL, NULL, '2025-12-03 02:32:01'),
(12, 'Dhruv Kansara', 'dhruvkansara332@gmail.com', '', '4375669406', '20 locustwood Dr', '2025-12-04 20:47:20'),
(13, 'Dhruv Kansara', 'dhruvkansara332@gmail.com', '', '4375669406', '4 Chatsworth Drive', '2025-12-04 21:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` varchar(50) DEFAULT 'Paid',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_amount`, `payment_status`, `order_date`) VALUES
(1, 12, 1299.00, 'Paid', '2025-12-04 20:47:20'),
(2, 13, 299.00, 'Paid', '2025-12-04 21:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 1, 1299.00),
(2, 2, 3, 1, 299.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `card_name` varchar(255) DEFAULT NULL,
  `card_last4` varchar(4) DEFAULT NULL,
  `expiry` varchar(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `card_name`, `card_last4`, `expiry`, `created_at`) VALUES
(1, 1, 'Dhruv Kansara', '4561', '12/28', '2025-12-04 20:47:20'),
(2, 2, 'Dhruv kansara', '3456', '12/28', '2025-12-04 21:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `short_description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `features` text DEFAULT NULL,
  `specs` text DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `short_description`, `image`, `description`, `features`, `specs`, `category`, `created_at`) VALUES
(1, 'NeonEdge Pro 14\" Laptop', 1999.00, 'Ultra-slim RGB-lit laptop with fast SSD storage and powerful graphics — perfect for gaming, editing, and everyday productivity.', 'pics/laptop.jpeg', '', '[\"14\\\" Full HD IPS display with vivid color and ultra-thin bezels\",\"Intel Core i7 12th Gen processor (8 cores) for smooth multitasking\",\"16GB DDR4 RAM and 512GB NVMe SSD for fast boot and load times\",\"Dedicated RTX-series graphics for gaming and creative apps\",\"Backlit keyboard with soft-touch keys and large precision trackpad\",\"Wi-Fi 6, Bluetooth 5.2 and USB-C \\/ HDMI ports for modern connectivity\"]', '{\"Processor\":\"Intel Core i7 12th Gen (8-core, up to 4.7GHz)\",\"Graphics\":\"NVIDIA RTX-series 6GB GDDR6\",\"Memory\":\"16GB DDR4 3200MHz\",\"Storage\":\"512GB NVMe SSD\",\"Display\":\"14\\\" 1920×1080 IPS, 144Hz\",\"Keyboard\":\"RGB backlit chiclet keyboard\",\"Wireless\":\"Wi-Fi 6, Bluetooth 5.2\",\"Ports\":\"2× USB-A, 1× USB-C, HDMI, Audio combo jack\",\"Battery\":\"Up to 8 hours mixed usage\",\"Operating System\":\"Windows 11 Home\",\"Weight\":\"1.4 kg\"}', '', '2025-12-02 21:20:56'),
(2, 'NVIDIA GeForce GTX 1080 Ti Founders Edition', 899.00, 'A high-performance GPU built for 4K gaming and demanding workloads.', 'pics/gpu.jpeg', 'The NVIDIA GeForce GTX 1080 Ti Founders Edition is one of the most iconic high-end GPUs ever created. Built on NVIDIA’s Pascal architecture, it delivers exceptional performance for modern AAA games, professional rendering, and VR applications. Featuring 11GB of fast GDDR5X memory and an advanced cooling design, the GTX 1080 Ti continues to be a reliable powerhouse for gamers and creators alike.', '[\"11GB GDDR5X high-speed video memory\",\"3584 CUDA cores for extreme gaming performance\",\"Boost clock up to 1582 MHz\",\"VR-Ready with low-latency performance\",\"Premium Founders Edition cooling and metal shroud\"]', '{\"Architecture\":\"NVIDIA Pascal\",\"CUDA Cores\":\"3584\",\"Base Clock\":\"1480 MHz\",\"Boost Clock\":\"1582 MHz\",\"Memory\":\"11GB GDDR5X\",\"Memory Speed\":\"11 Gbps\",\"Memory Bus\":\"352-bit\",\"Bandwidth\":\"484 GB\\/s\",\"TDP\":\"250W\",\"Ports\":\"3× DisplayPort, 1× HDMI, 1× DVI\",\"Power Connectors\":\"1× 8-pin + 1× 6-pin\"}', '', '2025-12-02 21:20:56'),
(3, 'Gigabyte M32UC — 32” 4K UHD Curved Gaming Monitor', 299.00, 'An ultra-sharp 4K curved gaming monitor designed for immersive gameplay and smooth motion.', 'pics/monitor.jpeg', 'The Gigabyte M32UC is a premium 32-inch curved gaming monitor built for players who demand stunning visual clarity and fluid motion. With its 4K UHD resolution, wide color gamut, and curved 1500R display, this monitor delivers an immersive viewing experience ideal for gaming, streaming, and creative work. Combined with Gigabyte’s advanced gaming features and ergonomic stand, it provides exceptional performance at an unbeatable value.', '[\"32-inch curved 1500R VA panel\",\"4K UHD resolution (3840 × 2160)\",\"144Hz refresh rate (160Hz OC)\",\"1ms response time\",\"AMD FreeSync Premium Pro\",\"HDR400 certification\",\"Black Equalizer & Game Assist\"]', '{\"Screen Size\":\"32 inches\",\"Panel Type\":\"VA\",\"Resolution\":\"3840 × 2160\",\"Curvature\":\"1500R\",\"Refresh Rate\":\"144Hz (160Hz OC)\",\"Response Time\":\"1ms\",\"Color Support\":\"93% DCI-P3, 123% sRGB\",\"HDR\":\"VESA DisplayHDR 400\",\"HDMI Ports\":\"2× HDMI 2.1\",\"DisplayPort\":\"1× DisplayPort 1.4\",\"USB Ports\":\"2× USB 3.0, USB-C\"}', '', '2025-12-02 21:20:56'),
(4, 'RGB Mechanical Gaming Keyboard (Compact 60%)', 99.00, 'Compact 60% mechanical keyboard with RGB lighting and fast switches.', 'pics/keyboard.png', 'This RGB Mechanical Gaming Keyboard delivers top-tier performance with ultra-responsive mechanical switches, customizable RGB lighting, and a compact 60% layout perfect for both gaming and productivity. Built with high-quality keycaps and durable construction, it ensures smooth actuation and long-lasting comfort.', '[\"Hot-swappable mechanical switches\",\"Customizable RGB lighting with 16.8M colors\",\"Compact 60% layout for maximum desk space\",\"Durable double-shot keycaps\",\"Anti-ghosting & full N-key rollover\",\"USB-C wired connection with detachable cable\"]', '{\"Layout\":\"60%\",\"Switch Type\":\"Mechanical\",\"Connection\":\"USB-C Wired\",\"Lighting\":\"RGB, per-key customization\",\"Keycaps\":\"Double-shot PBT\",\"Weight\":\"550g\",\"Compatibility\":\"Windows, macOS, Linux\"}', '', '2025-12-02 21:20:56'),
(5, 'RGB Gaming PC Tower (GX550 Edition)', 199.00, 'High-performance gaming PC case with tempered glass, RGB lighting, and 5 adjustable cooling fans.', 'pics/pc.jpeg', 'This RGB Gaming PC Tower is designed for gamers who want stunning aesthetics and superior airflow. Featuring a tempered-glass side panel, a mesh front for airflow optimization, and 5 fully customizable RGB fans, this case delivers the perfect balance of performance and style. Ideal for mid to high-end gaming builds.', '[\"Tempered-glass side panel\",\"5 RGB cooling fans included\",\"Optimized high-airflow mesh front\",\"Supports ATX \\/ Micro-ATX \\/ Mini-ITX motherboards\",\"Spacious interior for GPU & liquid cooling\",\"Cable-management friendly back panel\",\"Dust-filter system for cleaner operation\"]', '{\"Case Type\":\"Mid Tower\",\"Front Fans\":\"3x RGB 120mm\",\"Rear Fans\":\"1x RGB 120mm\",\"Top Fans\":\"1x RGB 120mm\",\"Side Panel\":\"4mm Tempered Glass\",\"PSU Support\":\"ATX (GX550 Compatible)\",\"Max GPU Length\":\"330mm\",\"Max CPU Cooler Height\":\"160mm\",\"Motherboard Support\":\"ATX \\/ Micro-ATX \\/ Mini-ITX\",\"Material\":\"Steel + Tempered Glass\"}', '', '2025-12-02 21:20:56'),
(6, 'Beats Studio3 Wireless Headphones – Mocha Edition', 120.00, 'Premium wireless over-ear headphones with pure adaptive noise cancelling and long battery life.', 'pics/headphones.jpeg', 'Experience immersive sound with the Beats Studio3 Wireless Headphones. Featuring Pure Adaptive Noise Cancelling (Pure ANC), real-time audio calibration, and plush over-ear cushions, these headphones deliver superior comfort and performance. Perfect for travel, gaming, workouts, or daily listening, with 22 hours of wireless playback.', '[\"Pure Adaptive Noise Cancelling (Pure ANC)\",\"Apple W1 chip for seamless connectivity\",\"Up to 22 hours of battery life\",\"Fast Fuel: 10 minutes charge = 3 hours playback\",\"Soft, comfortable over-ear cushioning\",\"Built-in microphone for calls\",\"Compatible with iOS & Android\"]', '{\"Type\":\"Wireless Over-Ear\",\"Noise Cancellation\":\"Pure ANC\",\"Battery Life\":\"22 hours (ANC on)\",\"Fast Charging\":\"10 mins = 3 hrs\",\"Bluetooth\":\"Class 1 Wireless\",\"Driver Size\":\"40mm optimized drivers\",\"Weight\":\"260g\",\"Microphone\":\"Built-in mic\"}', '', '2025-12-02 21:20:56'),
(7, 'Intel Core i7 Processor (9th Gen)', 499.00, 'High-performance Intel Core i7 CPU designed for gaming, multitasking, and productivity.', 'pics/processor.jpeg', 'The Intel Core i7 9th Generation processor delivers exceptional power for gamers, creators, and professionals. With fast turbo boost frequencies, smooth multitasking, and efficient power usage, it is ideal for performance-heavy workloads such as gaming, programming, video editing, and rendering.', '[\"8 Cores and 8 Threads for powerful multitasking\",\"Turbo Boost Technology for increased clock speeds\",\"Ideal for gaming, editing, and productivity\",\"Optimized thermal performance\",\"Support for Intel UHD Graphics\",\"Fast and responsive system performance\"]', '{\"Generation\":\"9th Gen\",\"Cores\":\"8 Cores\",\"Threads\":\"8 Threads\",\"Base Clock\":\"3.6 GHz\",\"Max Turbo Clock\":\"4.9 GHz\",\"Cache\":\"12 MB Intel Smart Cache\",\"TDP\":\"95W\",\"Socket\":\"LGA 1151\"}', '', '2025-12-02 21:20:56'),
(8, 'Samsung 990 PRO NVMe M.2 SSD (4TB)', 129.00, 'Ultra-fast PCIe 4.0 NVMe SSD with industry-leading speed, efficiency, and reliability.', 'pics/ssd.jpeg', 'The Samsung 990 PRO M.2 NVMe SSD delivers exceptional performance with blazing read/write speeds, making it the perfect choice for high-end gaming, professional workloads, video editing, and heavy multitasking. Engineered with Samsung’s latest V-NAND technology, it ensures top-tier reliability and durability while maintaining excellent thermal control.', '[\"PCIe 4.0 NVMe interface for extreme performance\",\"Blazing fast read and write speeds\",\"Optimized for gaming, rendering, and content creation\",\"High endurance and improved power efficiency\",\"Samsung Magician software support\",\"Ideal for PS5, laptops, and high-end PCs\"]', '{\"Capacity\":\"4TB\",\"Interface\":\"PCIe 4.0 NVMe M.2 2280\",\"Read Speed\":\"Up to 7450 MB\\/s\",\"Write Speed\":\"Up to 6900 MB\\/s\",\"Controller\":\"Samsung in-house controller\",\"NAND Type\":\"Samsung V-NAND\",\"Form Factor\":\"M.2 2280\",\"Compatibility\":\"PC, Laptop, PS5\"}', '', '2025-12-02 21:20:56'),
(9, 'ASUS Prime Z790 Gaming WiFi 7 Motherboard', 259.00, 'High-performance ATX motherboard with WiFi 7, PCIe 5.0 support, advanced cooling, and next-gen connectivity.', 'pics/motherboard.png', 'The ASUS Prime Z790 Gaming WiFi 7 is engineered for gamers, creators, and performance enthusiasts. Featuring support for Intel’s latest processors, PCIe 5.0, DDR5 memory, and WiFi 7, this motherboard delivers cutting-edge speed, reliability, and thermal performance. With multiple M.2 slots, enhanced power delivery, and customizable RGB, it\'s the perfect base for any high-end gaming PC or workstation.', '[\"Supports Intel 12th, 13th & 14th Gen CPUs\",\"Next-gen WiFi 7 wireless connectivity\",\"PCIe 5.0 slot for ultra-fast GPUs\",\"DDR5 memory support for high-speed performance\",\"Multiple M.2 slots with heatsinks\",\"14+1 power stages for stable overclocking\",\"Advanced cooling and optimization features\",\"ASUS Aura Sync RGB compatibility\"]', '{\"Chipset\":\"Intel Z790\",\"CPU Support\":\"Intel 12th\\/13th\\/14th Gen\",\"Memory Support\":\"DDR5, up to 192GB\",\"Expansion Slots\":\"1× PCIe 5.0 x16, 2× PCIe 4.0\",\"Storage\":\"4× M.2 PCIe 4.0 + 4× SATA Ports\",\"Networking\":\"WiFi 7 + 2.5G Ethernet\",\"Form Factor\":\"ATX\",\"USB Ports\":\"USB-C, USB 3.2 Gen 2, USB 2.0\"}', '', '2025-12-02 21:20:56'),
(10, 'RGB Programmable Gaming Mouse', 59.00, 'Ergonomic RGB gaming mouse with customizable buttons, high DPI sensor, and vibrant lighting effects.', 'pics/mouse.jpeg', 'This RGB Programmable Gaming Mouse delivers precision, speed, and comfort for gamers. Featuring a high-performance optical sensor, fully customizable buttons, adjustable DPI levels, and stunning RGB lighting, this mouse is built for competitive gaming. Its ergonomic design ensures long-lasting comfort, making it ideal for FPS, MOBA, and everyday use.', '[\"Up to 12,000 DPI adjustable sensitivity\",\"7 programmable buttons with macro support\",\"Full-spectrum RGB lighting\",\"High-precision optical sensor\",\"Ergonomic design for long gaming sessions\",\"Durable switches rated for 20 million clicks\",\"Braided cable for superior durability\",\"On-the-fly DPI adjustment\"]', '{\"Sensor Type\":\"High-precision Optical\",\"Max DPI\":\"12,000 DPI\",\"Buttons\":\"7 Programmable\",\"Lighting\":\"RGB Multi-Color\",\"Connection\":\"USB Wired\",\"Cable Type\":\"Braided\",\"Weight\":\"120g (adjustable)\",\"Compatibility\":\"Windows \\/ macOS\"}', '', '2025-12-02 21:20:56'),
(11, 'Apple iPad 10th Generation (64GB, Wi-Fi)', 569.00, 'The all-new Apple iPad 10th Gen features a stunning Liquid Retina display, A14 Bionic chip, and all-day battery life.', 'pics/ipad.jpeg', 'The Apple iPad 10th Generation is designed for creativity, productivity, and entertainment. Powered by the A14 Bionic chip, it delivers fast performance for gaming, streaming, multitasking, and everyday use. With a vibrant 10.9-inch Liquid Retina display, landscape stereo speakers, Touch ID, and USB-C, it\'s more powerful and versatile than ever.', '[\"10.9-inch Liquid Retina display\",\"A14 Bionic chip for powerful performance\",\"12MP Ultra Wide front camera (landscape mode)\",\"12MP rear camera with 4K video recording\",\"USB-C charging and connectivity\",\"All-day battery life\",\"Works with Apple Pencil (1st Gen) and Magic Keyboard Folio\",\"iPadOS for seamless productivity and multitasking\"]', '{\"Display\":\"10.9-inch Liquid Retina, 2360×1640 resolution\",\"Chip\":\"A14 Bionic\",\"Storage\":\"64GB\",\"Front Camera\":\"12MP Ultra Wide\",\"Rear Camera\":\"12MP Wide, 4K video\",\"Battery Life\":\"Up to 10 hours\",\"Charging Port\":\"USB-C\",\"Connectivity\":\"Wi-Fi 6\",\"OS\":\"iPadOS\"}', '', '2025-12-02 21:20:56'),
(12, 'Apple iPhone 17 (128GB)', 1799.00, 'The all-new iPhone 15 delivers Dynamic Island, an advanced dual-camera system, A16 Bionic power, and a stunning 6.1-inch Super Retina XDR display.', 'pics/iphone.jpeg', 'The Apple iPhone 15 features a beautiful new design with color-infused glass and aerospace-grade aluminum. Equipped with the A16 Bionic chip, a 48MP main camera, USB-C connectivity, and Dynamic Island for realtime notifications, the iPhone 15 offers premium performance and next-level photography in a sleek compact form.', '[\"Dynamic Island for real-time alerts & interactions\",\"48MP Main camera with 2x optical-quality zoom\",\"6.1-inch Super Retina XDR display\",\"A16 Bionic chip for powerful performance\",\"USB-C charging & data transfer\",\"All-day battery life\",\"Night Mode, Portrait Mode & 4K video\",\"Crash Detection & Emergency SOS via satellite\"]', '{\"Display\":\"6.1-inch Super Retina XDR OLED\",\"Chip\":\"A16 Bionic\",\"Storage\":\"128GB\",\"Rear Cameras\":\"48MP Main + 12MP Ultra Wide\",\"Front Camera\":\"12MP TrueDepth\",\"Battery Life\":\"Up to 20 hours video playback\",\"Charging Port\":\"USB-C\",\"Connectivity\":\"5G, Wi-Fi 6, Bluetooth 5.3\",\"Water Resistance\":\"IP68\"}', '', '2025-12-02 21:20:56'),
(13, 'TCL 55-inch 4K QLED Smart TV', 468.00, 'Stunning 4K QLED display with vibrant colors, high contrast, and smart streaming features for an immersive entertainment experience.', 'pics/tv.jpeg', 'The TCL 55-inch 4K QLED Smart TV delivers incredibly sharp visuals with Quantum Dot color, HDR, and ultra-high 4K resolution. Equipped with advanced image processing and built-in smart apps, it offers a premium cinematic experience for movies, gaming, and sports. Enjoy crystal-clear motion, deep blacks, and vibrant highlights on a bezel-less modern design.', '[\"4K UHD QLED Display for ultra-bright, vivid colors\",\"HDR10 & Dolby Vision support\",\"Bezel-less modern design\",\"Ultra-low input lag for gaming\",\"Motion Rate enhancement for fast-action scenes\",\"Built-in streaming apps (Netflix, YouTube, Prime Video)\",\"Voice control support (Google Assistant \\/ Alexa)\",\"Multiple HDMI & USB ports\"]', '{\"Screen Size\":\"55 inches\",\"Display Type\":\"4K QLED (Quantum Dot)\",\"Resolution\":\"3840 x 2160\",\"HDR Support\":\"HDR10, Dolby Vision\",\"Refresh Rate\":\"60Hz (Motion Rate enhanced)\",\"Smart OS\":\"Android TV \\/ Google TV (varies by region)\",\"Audio\":\"Dolby Audio\",\"Ports\":\"3x HDMI, 2x USB, Ethernet, Optical\",\"Connectivity\":\"Wi-Fi, Bluetooth\"}', '', '2025-12-02 21:20:56'),
(14, 'Wireless Galaxy Gaming Controller', 90.00, 'Ergonomic wireless gaming controller with galaxy-themed design, responsive triggers, and vibration feedback.', 'pics/controler.jpeg', 'Experience next-level comfort and precision with the Wireless Galaxy Gaming Controller. Designed with an eye-catching cosmic skin, anti-slip textured grips, and responsive analog sticks, this controller is perfect for long gaming sessions. Enjoy fast pairing, low-latency input, vibration feedback, and seamless compatibility with consoles, PC, and mobile devices.', '[\"Wireless Bluetooth connectivity\",\"Galaxy-themed premium design\",\"Responsive dual analog sticks\",\"Precision triggers and bumpers\",\"Dual vibration feedback motors\",\"Anti-slip textured grip\",\"Touchpad functionality (PS-style)\",\"Long-lasting rechargeable battery\",\"Includes two galaxy thumb grips\"]', '{\"Connectivity\":\"Bluetooth 5.0 + USB wired\",\"Compatibility\":\"PC, PS4\\/PS5 (limited), Android, iOS\",\"Battery Life\":\"Up to 10 hours\",\"Charging Port\":\"USB Type-C\",\"Vibration\":\"Dual motor vibration feedback\",\"Weight\":\"Approx. 210g\",\"Material\":\"ABS + textured rubber grip\"}', '', '2025-12-02 21:20:56'),
(15, 'Apple AirPods Pro (2nd Generation)', 219.00, 'Premium wireless earbuds with Active Noise Cancellation, Transparency mode, and immersive spatial audio.', 'pics/airpods.jpeg', 'Apple AirPods Pro (2nd Generation) deliver breakthrough audio performance with advanced Active Noise Cancellation, Adaptive Transparency, and personalized Spatial Audio. The lightweight in-ear design ensures all-day comfort, while the improved H2 chip enhances sound clarity and battery efficiency. With touch controls, sweat resistance, and an upgraded MagSafe charging case, these AirPods are the ultimate premium earbuds for Apple users.', '[\"Active Noise Cancellation\",\"Adaptive Transparency Mode\",\"Personalized Spatial Audio with dynamic head tracking\",\"Powered by Apple H2 chip\",\"Touch control for play, pause, volume, and calls\",\"Sweat and water resistant (IPX4)\",\"MagSafe + Lightning + USB-C charging support\",\"6 hours of listening time per charge\",\"Up to 30 hours with charging case\"]', '{\"Chip\":\"Apple H2 chip\",\"Noise Control\":\"Active Noise Cancellation & Adaptive Transparency\",\"Battery Life\":\"Up to 6 hours (ANC on)\",\"Total Battery (Case)\":\"Up to 30 hours\",\"Charging\":\"MagSafe \\/ Qi wireless \\/ Lightning\",\"Water Resistance\":\"IPX4 sweat & water resistance\",\"Compatibility\":\"iPhone, iPad, Mac, Apple Watch\"}', '', '2025-12-02 21:20:56'),
(16, 'Apple Watch Ultra (49mm)', 699.00, 'A rugged, high-performance smartwatch built for adventure, endurance, fitness, and extreme conditions.', 'pics/iwatch.jpeg', 'The Apple Watch Ultra delivers the most powerful smartwatch experience Apple has ever engineered. Built with aerospace-grade titanium, it provides exceptional durability while remaining lightweight. Its 49mm Retina display is the brightest on any Apple Watch, ensuring visibility even in harsh sunlight. With advanced fitness tracking, dual-frequency GPS, depth gauge, 100m water resistance, and up to 36 hours of battery life, the Watch Ultra is designed for athletes, explorers, and professionals who demand peak performance in every environment.', '[\"Rugged aerospace-grade titanium case (49mm)\",\"Always-On Retina display – brightest Apple Watch display ever\",\"Dual-frequency GPS (L1 + L5) for extreme accuracy\",\"Up to 36 hours of battery life\",\"Specialized Action Button for fast controls\",\"Precision dual speakers + 3-mic array\",\"100m water resistance + EN13319 certified\",\"Depth gauge + temperature sensor\",\"Advanced workout metrics for running, cycling, diving, and more\",\"Heart rate, ECG, and blood oxygen monitoring\"]', '{\"Case Material\":\"Titanium\",\"Display Size\":\"49mm Always-On Retina\",\"Water Resistance\":\"100m \\/ Dive-ready\",\"Battery Life\":\"Up to 36 hours\",\"GPS\":\"Dual-frequency (L1 + L5)\",\"Sensors\":\"Heart rate, ECG, SpO2, Depth sensor, Compass\",\"Connectivity\":\"Wi-Fi, Bluetooth 5.3, GPS, Cellular (optional)\",\"Compatibility\":\"Requires iPhone (latest iOS)\"}', '', '2025-12-02 21:20:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
