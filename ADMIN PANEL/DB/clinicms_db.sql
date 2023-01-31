-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 11:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinicms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `unique_id`, `email`, `password`, `fname`, `lname`, `img`, `status`) VALUES
(1, '19-1234', 'admin@gmail.com', 'adminmoto123', 'Juliana', 'Balingasa', 'profile.jpg', 'Active now'),
(2, '19-1235', 'juls@gmail.com', 'juls123', 'Juls', 'Balingasa', 'profile1.jfif', 'Active now'),
(3, '19-1236', 'juandelacruz@gmail.com', 'juan12345', 'Juan', 'Dela Cruz', 'student2.jpg', 'Active now'),
(4, '19-1237', 'hannahreyes@gmail.com', 'hannah12345', 'Hannah', 'Reyes', 'student1.jpg', 'Active now'),
(5, '19-1238', 'jopayhernandez@gmail.com', 'hernandez123', 'Jopay', 'Hernandez', 'nurse3.jpg', 'Active now'),
(6, '19-1239', 'aarronmacapagal@gmail.com', 'Aarron123', 'Aarron', 'Macapagal', 'student2.jpg', 'Active now'),
(7, '19-1240', 'janinetorres@gmail.com', 'janine123', 'Janine', 'Torres', 'nurse.jpg', 'Offline now'),
(8, '19-1241', 'bryanadmin@gmail.com', 'Bryan12345', 'Bryan', 'Admin', 'student2.jpg', 'Offline now'),
(9, '19-1242', 'sarrahdeguzman@gmail.com', 'deguzman123', 'Sarrah', 'De Guzman', 'nurse3.jpg', 'Offline now'),
(10, '19-1243', 'deibenrile@gmail.com', 'enrile12345', 'Deib Lohr', 'Enrile', 'profile.jpg', 'Offline now'),
(11, '19-1290', 'angelicajalmasco@gmail.com', 'angelica123', 'Angelica', 'Jalmasco', 'badang.JPG', 'Offline now');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(10) NOT NULL,
  `box_id` varchar(20) NOT NULL,
  `prod_id` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `genericName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prescribedFor` varchar(255) NOT NULL,
  `num_stocks` int(255) NOT NULL,
  `date_manufactured` date NOT NULL,
  `expirationDate` date NOT NULL,
  `prodCondition` varchar(255) NOT NULL,
  `manufacturerName` varchar(255) NOT NULL,
  `storage` varchar(255) NOT NULL,
  `establishment_of_procurement` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prod_barcode` varchar(255) NOT NULL,
  `prod_qrcode` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `box_id`, `prod_id`, `name`, `brand`, `genericName`, `image`, `prescribedFor`, `num_stocks`, `date_manufactured`, `expirationDate`, `prodCondition`, `manufacturerName`, `storage`, `establishment_of_procurement`, `source`, `contact_info`, `description`, `prod_barcode`, `prod_qrcode`, `remarks`) VALUES
(1, 'ZKY-1048', 'M-001', '	\r\nBiogesic', 'Unilab', 'Paracetamol/Acetaminophen', 'biogesic.jpg', '', 100, '2022-11-12', '2023-01-01', 'Goods', 'Jose Manuel David Santos Jr.', 'Box #3', '', '', '+639728917462', 'Biogesic is used and trusted for headache and fever relief. It can be consumed on an empty stomach, and can be taken by pregnant women, breastfeeding moms and the elderly.', '', 'Sample-qr-code.png', ''),
(2, 'YHD-2542', 'M-002', 'Neozep', 'Neozep Forte', 'Paracetamol/Phenylephrine HCl', 'neozep.png', '', 90, '2022-11-07', '2024-09-10', 'Goods Naman', 'Jose Manuel David Santos Sr.', 'Box #4', '', '', '+639122343412', 'Neozep® Non-Drowsy is for the relief of colds, without the drowse. It is used for the relief of clogged nose, post nasal drip, headache, body aches, and fever associated with the common cold, sinusitis, flu and other minor respiratory tract infections.', '', 'Sample-qr-code.png', ''),
(3, 'GQW-1234', 'M-003', 'Bioflu', 'Unilab', 'Chlorphenamine Maleate', 'bioflu.png', '', 80, '2022-09-05', '2024-06-13', 'Good', 'Juan Dela Cruz', 'Box #2', '', '', '+639123456789', 'Bioflu is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches and fever associated with the common cold, allergic rhinitis, sinusitis, flu and other minor respiratory tract infections.', '', 'Sample-qr-code.png', ''),
(4, 'KJS-3253', 'M-004', 'Diatabs', 'Unilab', 'Loperamide Hydrochloride', 'diatabs.png', '', 100, '2022-12-14', '2024-12-10', 'Goods', 'UNILAB, Inc.', 'Box #1', '', '', '+639457632822', 'Diatabs® is used for the control of acute non-specific diarrhea and/or chronic diarrhea associated with inflammatory bowel disease.', '', 'Sample-qr-code.png', ''),
(5, 'DSA-4321', 'M-005', 'Solmux', 'Unilab', 'Carbocisteine', 'solmux.png', '', 110, '2021-01-12', '2025-05-10', 'Good', 'UNILAB, Inc.', 'Box #6', '', '', '+639872737232', 'Solmux is a mucolytic agent used to relieve cough characterized by excessive or sticky sputum or phlegm to help treat respiratory tract disorders such as acute bronchitis.', '', '', ''),
(6, 'ABC-9823', 'M-008', 'Alaxan', 'Unilab', 'Carbocisteine', 'pills.jpg', '', 100, '2022-01-05', '2022-12-15', 'Good', 'UNILAB, Inc.', 'Box #6', '', '', '+639872737232', 'Alaxan is .....', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(20) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `student_id`, `fullname`, `image`, `message`, `reply`, `date`, `time`) VALUES
(1, '22-2222', 'Juan Dela Cruz', 'student2.jpg', 'Hindi po ako makakapasok, masama po ugali ko.', 'Bakit naman?', '2022-11-11', '07:08:13'),
(2, '22-2345', 'Maxpein Zin Del Valle', 'student1.jpg', 'Di po ako papasok masama po kasi ako.', 'Ayy ganon?', '2022-11-03', '05:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `schedule` varchar(50) NOT NULL,
  `contact_num` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `yrs_of_service` int(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `emp_id`, `username`, `password`, `profile_pic`, `lastname`, `firstname`, `middlename`, `gender`, `position`, `Department`, `schedule`, `contact_num`, `email`, `yrs_of_service`, `qr_code`, `birthdate`) VALUES
(1, '22-1234', 'juliana', 'juliana123', 'nurse.jpg', 'Balingasa', 'Juliana', 'Young', 'Female', 'Certified Nurse-Midwife', 'Nursing Department', 'M/T/W', 639123456, 'juliana@gmail.com', 5, '22-1234', '1996-07-11'),
(2, '22-1245', 'jessica', 'jessica123', 'nurse2.jpg', 'Bulleque', 'Jessica', 'Ombao', 'Female', 'Clinical Nurse Specialist', 'Nursing Department', 'M/T/W', 12345647, 'jessica@gmail.com', 4, '22-1245', '1995-06-08'),
(3, '22-1256', 'nicole', 'nicole123', 'nurse3.jpg', 'Abihay', 'John Nicole', '', 'Male', 'Nurse Practitioner', 'Nursing Department', 'M/W/F', 32458668, 'nicole@gmai.com', 3, '22-1256', '1993-11-24'),
(4, '22-8435', 'zarnaih_11', 'zarnaih123', 'student1.jpg', 'Marchessa', 'Zarnaih', '', 'Female', 'Nurse', 'Nursing Department', 'M/W/F', 2147483647, 'zarnaihmarchessa@gmail.com', 5, '22-8435', '1994-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `Id` int(255) NOT NULL,
  `Prof_Id` int(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Mname` varchar(255) NOT NULL,
  `Age` int(3) NOT NULL,
  `Birthday` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Contact_number` int(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Symptoms` varchar(255) NOT NULL,
  `Diagnosis` varchar(255) NOT NULL,
  `Prescription` varchar(255) NOT NULL,
  `Health_Status` varchar(255) NOT NULL,
  `Date_of_admission` datetime NOT NULL,
  `Date_of_release` datetime NOT NULL,
  `QR_code` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recieve_document`
--

CREATE TABLE `recieve_document` (
  `Id` int(255) NOT NULL,
  `Document_Id` int(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Name_of_document` varchar(255) NOT NULL,
  `Recieved_from` varchar(255) NOT NULL,
  `Recieved_by` varchar(255) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Date_recieved` datetime NOT NULL,
  `QR_code` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(50) NOT NULL,
  `data_id` varchar(30) NOT NULL,
  `nurse_name` varchar(255) NOT NULL,
  `consultation` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `data_id`, `nurse_name`, `consultation`, `patient_name`, `status`, `date`, `time`) VALUES
(1, 'C-01', 'Jessica Bulleque', 'Consultation', 'Kenneth Nunag', 'Complete', '2022-12-01', '06:00:00'),
(2, 'C-02', 'Kiara Raye Carganillo', 'Consultation', 'Regine Marie Bation', 'Pending', '2022-12-02', '07:00:00'),
(3, 'C-03', 'Juliana Balingasa', 'Consultation', 'Justine Halliasgo', 'Incomplete', '2022-12-03', '05:00:00'),
(4, 'C-04', 'Lawrence Tabunan', 'Consultation', 'John Nicole Abihay', 'Incomplete', '2022-12-03', '03:00:00'),
(5, 'C-05', 'Clarissa Calubaquib', 'Consultation', 'Clarice Obias', 'Complete', '2022-12-02', '06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sent_document`
--

CREATE TABLE `sent_document` (
  `Id` int(255) NOT NULL,
  `Document_Id` int(20) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Name_of_document` varchar(255) NOT NULL,
  `Sent_by` varchar(255) NOT NULL,
  `Send_to` varchar(255) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Date_created` datetime NOT NULL,
  `Date_sent` datetime NOT NULL,
  `QR_code` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `Age` int(3) NOT NULL,
  `Birthday` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Contact_number` int(15) NOT NULL,
  `image` varchar(255) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `Section` varchar(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Symptoms` varchar(255) NOT NULL,
  `Diagnosis` varchar(255) NOT NULL,
  `Prescription` varchar(255) NOT NULL,
  `health_status` varchar(255) NOT NULL,
  `Date_of_admission` datetime NOT NULL,
  `Date_of_release` datetime NOT NULL,
  `QR code` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `lastname`, `firstname`, `middlename`, `Age`, `Birthday`, `Address`, `Gender`, `Contact_number`, `image`, `course`, `year_level`, `Section`, `Email`, `Symptoms`, `Diagnosis`, `Prescription`, `health_status`, `Date_of_admission`, `Date_of_release`, `QR code`, `Remarks`) VALUES
(1, '22-2222', 'Dela Cruz', 'Juan', 'Samson', 22, '2000-05-02', 'Taga-dyan City', 'Male', 78994566, 'student2.jpg', 'BSIT', '3rd Year', 'SBIT-3G', 'juandelacruz@gmail.com', 'Headache', 'Ambot', 'Biogesic', 'Ambot', '2022-11-16 16:08:11', '2022-11-19 16:08:11', '22-2222', 'Complete'),
(2, '22-2345', 'Del Valle', 'Maxpein Zin', 'Moon', 21, '2001-02-10', 'Far far away', 'Female', 23154891, 'student1.jpg', 'BSA', '2nd Year', 'BAAC-2B', 'maxpeindelvalle@gmail.com', 'Hulaan mo', 'Dunno', 'Gamot', 'Hulaan Mo', '2022-11-02 17:41:28', '2022-11-20 17:41:28', '22-2345', 'Incomplete');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`,`box_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`,`emp_id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`Id`,`Prof_Id`);

--
-- Indexes for table `recieve_document`
--
ALTER TABLE `recieve_document`
  ADD PRIMARY KEY (`Document_Id`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sent_document`
--
ALTER TABLE `sent_document`
  ADD PRIMARY KEY (`Id`,`Document_Id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`,`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recieve_document`
--
ALTER TABLE `recieve_document`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sent_document`
--
ALTER TABLE `sent_document`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
