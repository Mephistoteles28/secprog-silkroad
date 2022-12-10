-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 05:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silkroad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$XHSVLdZIV5f5jjzbKFqXH.3MnjqTG5AbBq4ZGWyN4qrE97oEljo9m'),
(3, 'admin2', '$2y$10$1n85oqZRf1xDRxy7Vpz4dOusq9fIq.KNkUWcwhDfRcz8r1GdUUa7O');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_img`, `product_quantity`, `product_description`, `product_details`) VALUES
(1, 'Aspirin', '13000', 'aspirin.jpg', 20, 'Aspirin is a salicylate used to treat pain, fever, inflammation, migraines, and reducing the risk of major adverse cardiovascular events.','Also known as Aspirin, acetylsalicylic acid (ASA) is a commonly used drug for the treatment of pain and fever due to various causes. Acetylsalicylic acid has both anti-inflammatory and antipyretic effects. This drug also inhibits platelet aggregation and is used in the prevention of blood clots stroke, and myocardial infarction (MI).\nInterestingly, the results of various studies have demonstrated that long-term use of acetylsalicylic acid may decrease the risk of various cancers, including colorectal, esophageal, breast, lung, prostate, liver and skin cancer. Aspirin is classified as a non-selective cyclooxygenase (COX) inhibitor and is available in many doses and forms, including chewable tablets, suppositories, extended release formulations, and others.\nAcetylsalicylic acid is a very common cause of accidental poisoning in young children. It should be kept out of reach from young children, toddlers, and infants.'),
(2, 'Amphetamine', '45000', 'adderall.jpg', 50, 'Amphetamine is a CNS stimulant and sympathomimetic agent indicated for the treatment of Attention Deficit Hyperactivity Disorder (ADHD).', 'Amphetamine, a compound discovered over 100 years ago, is one of the more restricted controlled drugs. It was previously used for a large variety of conditions and this changed until this point where its use is highly restricted. Amphetamine, with the chemical formula alpha-methylphenethylamine, was discovered in 1910 and first synthesized by 1927. After being proven to reduce drug-induced anesthesia and produce arousal and insomnia, amphetamine racemic mix was registered by Smith, Kline and French in 1935. Amphetamine structure presents one chiral center and it exists in the form of dextro- and levo-isomers. The first product of Smith, Kline and French was approved by the FDA on 1976.\nDuring World War II, amphetamine was used to promote wakefulness in the soldiers. This use derived into a large overproduction of amphetamine and all the surplus after the war finalized ended up in the black market, producing the initiation of the illicit abuse.'),
(3, 'Benztropine', '39000', 'benztropine-mesylate.jpg', 45, 'Benzatropine is an anticholinergic drug used to treat Parkinson\'s disease (PD) and extrapyramidal symptoms, except tardive dyskinesia.', 'Benztropine, with the chemical formula 3alpha-diphenylmethoxytropane, is a tropane-based dopamine inhibitor used for the symptomatic treatment of Parkinson\'s disease. It is a combination molecule between a tropane ring, similar to cocaine, and a diphenyl ether from the dialkylpiperazines determined to be a dopamine uptake inhibitor since 1970.\nThe generation of structure-activity relationships proved that benztropine derivatives with the presence of a chlorine substituent in the para position in one of the phenyl rings produces an increased potency for dopamine uptake inhibition as well as a decreased inhibition of serotonin and norepinephrine. Benztropine was developed by USL Pharma and officially approved by the FDA on 1996.'),
(4, 'Benzonatate', '32000', 'benzonatate.jpg', 30, 'Benzonatate is a non-narcotic oral antitussive drug used to suppress coughing.\r\nBenzonatate works by numbing the throat and lungs, making the cough reflex less active.','Benzonatate is an oral antitussive drug used in the relief and suppression of cough in patients older than ten years of age. Currently, benzonatate is the only non-narcotic antitussive available as a prescription drug. It works to reduce the activity of cough reflex by desensitizing the tissues of the lungs and pleura involved in the cough reflex.\nBenzonatate was approved by the FDA in 1958 under the market name Tessalon Perles. Because its chemical structure resembles that of the anesthetic agents in the para-amino-benzoic acid class (such as procaine and tetracaine), benzonatate exhibits anesthetic or numbing action. Although it not prone to drug misuse or abuse, benzonatate is associated with a risk for severe toxicity and overdose, especially in children.'),
(5, 'Cephalexin', '45000', 'cephalexin.jpg', 32, 'Cephalexin is a first generation cephalosporin used to treat certain susceptible bacterial infections.\nCephalexin is used to treat infections caused by bacteria, including upper respiratory infect','Cephalexin is the first of the first generation cephalosporins. This antibiotic contains a beta lactam and a dihydrothiazide. Cephalexin is used to treat a number of susceptible bacterial infections through inhibition of cell wall synthesis. Cephalexin was approved by the FDA on 4 January 1971.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'user', '$2y$10$yoChafH38xZTIclBY/ic1.9e7E7kkQyzoz6jMPhWt9Ffa6Dd4AWtC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
