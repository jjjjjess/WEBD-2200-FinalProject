-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2026 at 12:15 AM
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
-- Database: `hospital_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `ward_number` varchar(20) DEFAULT NULL,
  `status` enum('Admitted','Outgoing','Deceased') DEFAULT 'Admitted',
  `admission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `discharge_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `patient_id`, `ward_number`, `status`, `admission_date`, `discharge_date`) VALUES
(1, 1, 'Emergency', 'Admitted', '2026-05-05 14:01:35', '2026-05-21 00:01:35'),
(2, 2, 'Pediatric', 'Admitted', '2026-05-27 16:30:50', '2026-05-28 22:30:50'),
(3, 3, 'Maternity', 'Deceased', '2026-05-22 14:47:04', '2026-05-23 04:47:04'),
(4, 4, 'General Ward', 'Outgoing', '2026-05-29 16:28:14', '2026-05-29 20:28:14'),
(5, 5, 'Emergency', 'Admitted', '2026-05-24 14:09:28', '2026-05-13 19:17:16'),
(6, 6, 'Pediatric', 'Outgoing', '2026-05-29 14:17:13', '2026-05-29 23:17:13'),
(7, 7, 'Maternity', 'Deceased', '2026-05-10 17:21:38', '2026-05-10 23:21:38'),
(8, 8, 'General Ward', 'Outgoing', '2026-05-05 17:01:42', '2026-05-06 00:01:42'),
(9, 9, 'Emergency', 'Outgoing', '2026-05-16 15:44:56', '2026-05-17 01:44:56'),
(10, 10, 'Pediatric', 'Deceased', '2026-05-15 16:46:07', '2026-05-04 19:17:51'),
(11, 11, 'Maternity', 'Admitted', '2026-05-07 16:18:51', '2026-05-28 03:18:51'),
(12, 12, 'General Ward', 'Outgoing', '2026-05-14 16:12:52', '2026-05-14 20:12:52'),
(13, 13, 'Emergency', 'Outgoing', '2026-05-24 15:03:39', '2026-05-24 21:03:39'),
(14, 14, 'Pediatric', 'Outgoing', '2026-05-05 17:53:27', '2026-05-06 02:53:27'),
(15, 15, 'Maternity', 'Admitted', '2026-05-18 16:57:24', '2026-05-27 19:19:17'),
(16, 16, 'General Ward', 'Outgoing', '2026-05-06 16:03:07', '2026-05-06 20:03:07'),
(17, 17, 'Emergency', 'Outgoing', '2026-05-14 17:42:05', '2026-05-15 03:42:05'),
(18, 18, 'Pediatric', 'Outgoing', '2026-05-08 14:19:10', '2026-05-09 00:19:10'),
(19, 19, 'Maternity', 'Admitted', '2026-05-28 17:28:10', '2026-05-31 20:28:10'),
(20, 20, 'General Ward', 'Deceased', '2026-05-15 17:51:23', '2026-05-04 19:21:21'),
(21, 21, 'Emergency', 'Admitted', '2026-05-10 15:38:00', '2026-05-10 23:38:00'),
(22, 22, 'Pediatric', 'Admitted', '2026-05-03 15:23:06', '2026-06-18 04:23:06'),
(23, 23, 'Maternity', 'Admitted', '2026-05-13 16:51:49', '2026-05-19 21:51:49'),
(24, 24, 'General Ward', 'Admitted', '2026-05-17 14:44:16', '2026-05-14 00:44:16'),
(25, 25, 'Emergency', 'Admitted', '2026-05-05 17:47:58', '2026-05-27 19:22:40'),
(26, 26, 'Pediatric', 'Outgoing', '2026-05-17 17:28:57', '2026-05-05 21:28:57'),
(27, 27, 'Maternity', 'Admitted', '2026-05-13 14:29:01', '2026-05-20 03:29:01'),
(28, 28, 'General Ward', 'Outgoing', '2026-05-18 17:55:30', '2026-05-19 02:55:30'),
(29, 29, 'Emergency', 'Deceased', '2026-05-24 15:55:12', '2026-05-24 21:55:12'),
(30, 30, 'Pediatric', 'Deceased', '2026-05-08 16:24:21', '2026-05-29 19:24:03'),
(31, 31, 'Maternity', 'Deceased', '2026-05-17 16:47:24', '2026-05-18 00:47:24'),
(32, 32, 'General Ward', 'Admitted', '2026-05-20 17:27:43', '2026-05-21 03:27:43'),
(33, 33, 'Emergency', 'Deceased', '2026-05-09 14:08:16', '2026-05-09 21:08:16'),
(34, 34, 'Pediatric', 'Admitted', '2026-05-30 14:24:09', '2026-05-06 22:24:09'),
(35, 35, 'Maternity', 'Admitted', '2026-05-16 14:16:58', '2026-05-28 19:25:03'),
(36, 36, 'General Ward', 'Admitted', '2026-05-03 15:13:44', '2026-05-25 21:13:44'),
(37, 37, 'Emergency', 'Deceased', '2026-05-03 14:46:19', '2026-05-03 21:46:19'),
(38, 38, 'Pediatric', 'Admitted', '2026-05-10 16:04:11', '2026-05-11 02:04:11'),
(39, 39, 'Maternity', 'Deceased', '2026-05-22 14:44:49', '2026-05-23 04:44:49'),
(40, 40, 'General Ward', 'Deceased', '2026-05-30 15:20:46', '2026-05-04 19:27:42'),
(41, 41, 'Emergency', 'Deceased', '2026-05-27 14:21:20', '2026-05-28 00:21:20'),
(42, 42, 'Pediatric', 'Outgoing', '2026-05-21 15:21:47', '2026-05-22 02:21:47'),
(43, 43, 'Maternity', 'Admitted', '2026-05-28 14:26:38', '2026-05-07 21:26:38'),
(44, 44, 'General Ward', 'Admitted', '2026-05-28 16:51:35', '2026-05-28 01:51:35'),
(45, 45, 'Emergency', 'Admitted', '2026-05-12 14:26:12', '2026-05-28 19:27:58'),
(46, 46, 'Pediatric', 'Outgoing', '2026-05-22 17:43:29', '2026-05-23 02:43:29'),
(47, 47, 'Maternity', 'Admitted', '2026-05-09 17:21:17', '2026-05-22 03:21:17'),
(48, 48, 'General Ward', 'Admitted', '2026-05-12 17:15:46', '2026-05-13 03:15:46'),
(49, 49, 'Emergency', 'Outgoing', '2026-05-05 15:25:36', '2026-05-06 00:25:36'),
(50, 50, 'Pediatric', 'Deceased', '2026-05-24 14:31:51', '2026-05-27 19:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `appointment_date` datetime DEFAULT NULL,
  `appointment_time` varchar(50) DEFAULT NULL,
  `status` enum('Scheduled','Completed','Cancelled') DEFAULT 'Scheduled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `dept_id`, `doctor_id`, `appointment_date`, `appointment_time`, `status`) VALUES
(1, 1, 1, 1, '2026-05-10 00:00:00', '09:00 - 10:00', 'Scheduled'),
(2, 2, 2, 2, '2026-05-10 00:00:00', '10:00 - 11:00', 'Scheduled'),
(3, 3, 10, 3, '2026-05-11 00:00:00', '14:00 - 15:00', 'Scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Paid','Pending') DEFAULT 'Pending',
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `patient_id`, `amount`, `description`, `status`, `payment_date`) VALUES
(1, 1, 5000.00, 'X-ray and Urine analysis', 'Pending', '2026-05-01'),
(2, 2, 90000.00, 'Consultation', 'Paid', '2026-05-01'),
(3, 3, 78000.00, 'Laboratory Tests', 'Pending', '2026-05-01'),
(4, 4, 67000.00, 'Emergency Services', 'Paid', '2026-05-02'),
(5, 5, 79000.00, 'Pharmacy - Antibiotics', 'Paid', '2026-05-02'),
(6, 6, 67000.00, 'Ultrasound Scan', 'Pending', '2026-05-02'),
(7, 7, 89000.00, 'General Checkup', 'Paid', '2026-05-02'),
(8, 8, 56000.00, 'Minor Surgery', 'Pending', '2026-05-03'),
(9, 9, 90000.00, 'Malaria Test & Treatment', 'Paid', '2026-05-03'),
(10, 10, 34500.00, 'Dental Cleaning', 'Pending', '2026-05-03'),
(11, 11, 45000.00, 'Physiotherapy Session', 'Paid', '2026-05-03'),
(12, 12, 56700.00, 'CT Scan', 'Pending', '2026-05-03'),
(13, 13, 23000.00, 'Eye Examination', 'Paid', '2026-05-03'),
(14, 14, 90000.00, 'Specialist Consultation', 'Pending', '2026-05-04'),
(15, 15, 45000.00, 'Immunization', 'Paid', '2026-05-04'),
(16, 16, 46000.00, 'Blood Work', 'Pending', '2026-05-04'),
(17, 17, 320000.00, 'Maternity Fees', 'Paid', '2026-05-04'),
(18, 18, 56000.00, 'Pain Medication', 'Paid', '2026-05-04'),
(19, 19, 46000.00, 'Orthopedic Brace', 'Pending', '2026-05-04'),
(20, 20, 78000.00, 'Vaccination', 'Paid', '2026-05-04'),
(21, 21, 90000.00, 'Cardiac Screening', 'Pending', '2026-05-04'),
(22, 22, 90000.00, 'Dermatology Visit', 'Paid', '2026-05-04'),
(23, 23, 45000.00, 'Nutritional Counseling', 'Pending', '2026-05-04'),
(24, 24, 89000.00, 'MRI Referral', 'Paid', '2026-05-04'),
(25, 25, 45000.00, 'Flu Treatment', 'Pending', '2026-05-04'),
(26, 26, 45000.00, 'Allergy Testing', 'Paid', '2026-05-04'),
(27, 27, 56000.00, 'Psychiatry Session', 'Pending', '2026-05-04'),
(28, 28, 90000.00, 'Ears/Nose/Throat Exam', 'Paid', '2026-05-04'),
(29, 29, 77000.00, 'Surgical Follow-up', 'Pending', '2026-05-04'),
(30, 30, 34500.00, 'Wound Dressing', 'Paid', '2026-05-04'),
(31, 31, 200000.00, 'Kidney Function Test', 'Pending', '2026-05-04'),
(32, 32, 200000.00, 'Liver Profile', 'Paid', '2026-05-04'),
(33, 33, 45000.00, 'Diabetes Screening', 'Pending', '2026-05-04'),
(34, 34, 34500.00, 'Intensive Care Unit Fee', 'Paid', '2026-05-04'),
(35, 35, 89000.00, 'Prescription Refill', 'Pending', '2026-05-04'),
(36, 36, 45000.00, 'Thyroid Test', 'Paid', '2026-05-04'),
(37, 37, 45000.00, 'Neurology Evaluation', 'Pending', '2026-05-04'),
(38, 38, 4500.00, 'Pediatric Care', 'Paid', '2026-05-04'),
(39, 39, 56000.00, 'Oncology Screening', 'Pending', '2026-05-04'),
(40, 40, 43000.00, 'Annual Physical', 'Paid', '2026-05-04'),
(41, 41, 39000.00, 'Hospital Stay (Overnight)', 'Pending', '2026-05-04'),
(42, 42, 78000.00, 'Asthma Management', 'Paid', '2026-05-04'),
(43, 43, 90000.00, 'ECG Test', 'Pending', '2026-05-04'),
(44, 44, 67000.00, 'Gastroenterology Visit', 'Paid', '2026-05-04'),
(45, 45, 45000.00, 'Generic Medication', 'Pending', '2026-05-04'),
(46, 46, 67000.00, 'Bone Density Scan', 'Paid', '2026-05-04'),
(47, 47, 89000.00, 'Occupational Therapy', 'Pending', '2026-05-04'),
(48, 48, 45000.00, 'Speech Therapy', 'Paid', '2026-05-04'),
(49, 49, 500000.00, 'Internal Medicine', 'Pending', '2026-05-04'),
(50, 50, 20000.00, 'Consultation', 'Paid', '2026-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`) VALUES
(1, 'Cardiology', 'Heart and vascular care'),
(2, 'Pediatrics', 'Children health services'),
(3, 'Emergency', 'Critical and urgent care'),
(4, 'General Ward', 'Routine inpatient care'),
(5, 'Maternity', 'Pregnancy and childbirth services'),
(6, 'Cardiology', 'Heart and vascular system care'),
(7, 'Pediatrics', 'Medical care for infants, children, and adolescents'),
(8, 'Neurology', 'Disorders of the nervous system'),
(9, 'Orthopedics', 'Musculoskeletal system and bone health'),
(10, 'General Medicine', 'Standard health checkups and non-surgical care');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `name`, `specialization`, `department_id`, `phone`) VALUES
(1, 1, 'Dr. Emily Chen', 'Pediatrician', 1, '+1-555-0102'),
(2, 2, 'Dr. John Smith', 'Cardiologist', 2, '+1-555-0101'),
(3, 3, ' Dr,Khina', 'Cardiologist', 2, '0894646140'),
(4, 4, 'Dr. Chisomo Banda', 'Cardiologist', 1, '0991000101'),
(5, 5, 'Dr. Sarah Tsonga', 'Pediatrician', 2, '0991000102'),
(6, 6, 'Dr. John Phiri', 'Emergency Specialist', 3, '0991000103'),
(7, 7, 'Dr. Grace Mlowoka', 'Obstetrician', 5, '0991000104'),
(8, 8, 'Dr. Isaac Newton', 'Neurologist', 8, '0991000105'),
(9, 9, 'Dr. Faith Kumwenda', 'Orthopedic Surgeon', 9, '0991000106'),
(10, 10, 'Dr. Peter Moyo', 'General Practitioner', 10, '0991000107');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `diagnosis` text NOT NULL,
  `treatment` text DEFAULT NULL,
  `recorded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`id`, `patient_id`, `doctor_id`, `diagnosis`, `treatment`, `recorded_at`) VALUES
(1, 1, 1, 'Hypertension', 'Lisinopril 10mg daily', '2026-05-04 21:16:19'),
(2, 2, 2, 'Common Cold', 'Rest and Paracetamol', '2026-05-04 21:16:19'),
(3, 3, 3, 'Acute Gastritis', 'Antacids and bland diet', '2026-05-04 21:16:19'),
(4, 4, 4, 'Type 2 Diabetes', 'Metformin 500mg', '2026-05-04 21:16:19'),
(5, 5, 5, 'Pregnancy Routine Checkup', 'Prenatal Vitamins', '2026-05-04 21:16:19'),
(6, 6, 6, 'Migraine', 'Sumatriptan as needed', '2026-05-04 21:16:19'),
(7, 7, 7, 'Fractured Radius', 'Casting and Pain Relief', '2026-05-04 21:16:19'),
(8, 8, 8, 'Seasonal Allergies', 'Cetirizine 10mg', '2026-05-04 21:16:19'),
(9, 9, 1, 'Arrhythmia', 'Beta-blockers', '2026-05-04 21:16:19'),
(10, 10, 2, 'Bronchitis', 'Antibiotics and Cough Syrup', '2026-05-04 21:16:19'),
(11, 11, 3, 'Food Poisoning', 'Rehydration salts', '2026-05-04 21:16:19'),
(12, 12, 4, 'Anemia', 'Iron Supplements', '2026-05-04 21:16:19'),
(13, 13, 5, 'Post-natal Checkup', 'General Observation', '2026-05-04 21:16:19'),
(14, 14, 6, 'Epilepsy Control', 'Valproate Sodium', '2026-05-04 21:16:19'),
(15, 15, 7, 'Lower Back Pain', 'Physiotherapy', '2026-05-04 21:16:19'),
(16, 16, 8, 'Tonsillitis', 'Amoxicillin', '2026-05-04 21:16:19'),
(17, 17, 9, 'Knee Bursitis', 'Anti-inflammatory gel', '2026-05-04 21:16:19'),
(18, 18, 10, 'General Fatigue', 'Vitamin B Complex', '2026-05-04 21:16:19'),
(19, 19, 1, 'High Cholesterol', 'Atorvastatin', '2026-05-04 21:16:19'),
(20, 20, 2, 'Asthma Flare-up', 'Salbutamol Inhaler', '2026-05-04 21:16:19'),
(21, 21, 3, 'Dehydration', 'IV Fluids', '2026-05-04 21:16:19'),
(22, 22, 4, 'Thyroid Issues', 'Levothyroxine', '2026-05-04 21:16:19'),
(23, 23, 5, 'UTI', 'Nitrofurantoin', '2026-05-04 21:16:19'),
(24, 24, 6, 'Insomnia', 'Sleep hygiene counseling', '2026-05-04 21:16:19'),
(25, 25, 7, 'Sprained Ankle', 'RICE Method', '2026-05-04 21:16:19'),
(26, 26, 8, 'Eczema', 'Hydrocortisone cream', '2026-05-04 21:16:19'),
(27, 27, 9, 'Arthritis', 'Pain management', '2026-05-04 21:16:19'),
(28, 28, 10, 'Common Cold', 'Vitamin C', '2026-05-04 21:16:19'),
(29, 29, 1, 'Chest Pain', 'ECG and Observation', '2026-05-04 21:16:19'),
(30, 30, 2, 'Ear Infection', 'Ear drops', '2026-05-04 21:16:19'),
(31, 31, 3, 'Stomach Ulcer', 'Omeprazole', '2026-05-04 21:16:19'),
(32, 32, 4, 'Hypoglycemia', 'Glucose management', '2026-05-04 21:16:19'),
(33, 33, 5, 'Anxiety', 'Counseling', '2026-05-04 21:16:19'),
(34, 34, 6, 'Vertigo', 'Betahistine', '2026-05-04 21:16:19'),
(35, 35, 7, 'Hip Pain', 'Referral to Ortho', '2026-05-04 21:16:19'),
(36, 36, 8, 'Skin Rash', 'Antihistamines', '2026-05-04 21:16:19'),
(37, 37, 9, 'Joint Swelling', 'Cold Compress', '2026-05-04 21:16:19'),
(38, 38, 10, 'Flu', 'Oseltamivir', '2026-05-04 21:16:19'),
(39, 39, 1, 'Mild Tachycardia', 'Rest', '2026-05-04 21:16:19'),
(40, 40, 2, 'Chickenpox', 'Calamine lotion', '2026-05-04 21:16:19'),
(41, 41, 3, 'Heartburn', 'Magnesium Trisilicate', '2026-05-04 21:16:19'),
(42, 42, 4, 'Obesity', 'Dietary Plan', '2026-05-04 21:16:19'),
(43, 43, 5, 'Anemia', 'Folic Acid', '2026-05-04 21:16:19'),
(44, 44, 6, 'Chronic Headache', 'MRI Referral', '2026-05-04 21:16:19'),
(45, 45, 7, 'Muscle Strain', 'Rest', '2026-05-04 21:16:19'),
(46, 46, 8, 'Conjunctivitis', 'Antibiotic eye drops', '2026-05-04 21:16:19'),
(47, 47, 9, 'Tennis Elbow', 'Elbow brace', '2026-05-04 21:16:19'),
(48, 48, 10, 'Vitamin D Deficiency', 'Supplements', '2026-05-04 21:16:19'),
(49, 49, 1, 'Hyperlipidemia', 'Diet control', '2026-05-04 21:16:19'),
(50, 50, 2, 'Hand-Foot-Mouth', 'Symptomatic treatment', '2026-05-04 21:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `user_id`, `name`, `phone`, `department_id`) VALUES
(1, 11, 'Grace Phiri', '0888123456', 1),
(2, 12, 'Limbani Tembo', '0888654321', 2),
(3, 13, 'Mary Lungu', '0999000111', 5),
(4, 14, 'Tionge Maseko', '0881223344', 3),
(5, 15, 'Kondwani Zulu', '0995667788', 8),
(6, 16, 'Chisomo Banda', '0882990011', 10);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `dob`, `gender`, `phone`, `address`) VALUES
(1, 'James Smith', '1980-05-12', 'Male', '0991234567', 'Chilomoni, Blantyre'),
(2, 'Mary Johnson', '1992-08-24', 'Female', '0882345678', 'Area 47, Lilongwe'),
(3, 'Robert Williams', '1975-11-02', 'Male', '0993456789', 'Ndirande, Blantyre'),
(4, 'Patricia Brown', '2001-01-15', 'Female', '0884567890', 'Chimwankhunda, Blantyre'),
(5, 'Michael Jones', '1968-03-30', 'Male', '0995678901', 'Kawale 1, Lilongwe'),
(6, 'Linda Garcia', '1995-07-19', 'Female', '0886789012', 'Mbayani, Blantyre'),
(7, 'William Miller', '1988-12-05', 'Male', '0997890123', 'Area 25, Lilongwe'),
(8, 'Elizabeth Davis', '1970-02-28', 'Female', '0888901234', 'Zomba City Center'),
(9, 'David Rodriguez', '1983-09-14', 'Male', '0999012345', 'Lunzu, Blantyre'),
(10, 'Barbara Martinez', '1999-06-21', 'Female', '0880123456', 'Likuni, Lilongwe'),
(11, 'Richard Hernandez', '1962-10-10', 'Male', '0991112223', 'Bangwe, Blantyre'),
(12, 'Susan Lopez', '1990-04-03', 'Female', '0882223334', 'Area 18, Lilongwe'),
(13, 'Joseph Gonzalez', '1977-08-17', 'Male', '0993334445', 'Soche, Blantyre'),
(14, 'Jessica Wilson', '2003-12-25', 'Female', '0884445556', 'Chinyonga, Blantyre'),
(15, 'Thomas Anderson', '1985-01-30', 'Male', '0995556667', 'Mchenga, Mzuzu'),
(16, 'Sarah Taylor', '1994-05-11', 'Female', '0886667778', 'Manyowe, Blantyre'),
(17, 'Charles Thomas', '1965-09-09', 'Male', '0997778889', 'Area 49, Lilongwe'),
(18, 'Karen Moore', '1981-03-22', 'Female', '0888889990', 'Limbe, Blantyre'),
(19, 'Christopher Jackson', '1989-11-14', 'Male', '0999990001', 'Zingwangwa, Blantyre'),
(20, 'Nancy Martin', '1972-07-07', 'Female', '0881231234', 'Chikanda, Zomba'),
(21, 'Daniel Lee', '1996-02-14', 'Male', '0992342345', 'Area 10, Lilongwe'),
(22, 'Lisa Perez', '1984-06-18', 'Female', '0883453456', 'Manase, Blantyre'),
(23, 'Matthew Thompson', '1979-04-30', 'Male', '0994564567', 'Zolozolo, Mzuzu'),
(24, 'Betty White', '1960-10-12', 'Female', '0885675678', 'Falls Estate, Lilongwe'),
(25, 'Anthony Harris', '1991-08-08', 'Male', '0996786789', 'Kanjedza, Blantyre'),
(26, 'Sandra Clark', '1987-01-05', 'Female', '0887897890', 'Chitawira, Blantyre'),
(27, 'Mark Lewis', '1973-12-12', 'Male', '0998908901', 'Area 3, Lilongwe'),
(28, 'Ashley Robinson', '2002-09-29', 'Female', '0889019012', 'Mapanga, Blantyre'),
(29, 'Steven Walker', '1967-05-25', 'Male', '0990120123', 'Luwinga, Mzuzu'),
(30, 'Dorothy Young', '1993-11-11', 'Female', '0881111111', 'Namatete, Lilongwe'),
(31, 'Paul Allen', '1986-03-13', 'Male', '0992222222', 'Chirimba, Blantyre'),
(32, 'Kimberly King', '1974-02-14', 'Female', '0883333333', 'Mponela, Dowa'),
(33, 'Andrew Wright', '1998-07-20', 'Male', '0994444444', 'Salima Boma'),
(34, 'Donna Scott', '1969-04-04', 'Female', '0885555555', 'Mchinji Crossing'),
(35, 'Joshua Nguyen', '1982-12-30', 'Male', '0996666666', 'Monkey Bay, Mangochi'),
(36, 'Michelle Hill', '1997-10-10', 'Female', '0887777777', 'Malosa, Zomba'),
(37, 'Kenneth Adams', '1964-08-15', 'Male', '0998888888', 'Liwonde, Machinga'),
(38, 'Emily Baker', '2000-01-01', 'Female', '0889999999', 'Dedza Boma'),
(39, 'Kevin Nelson', '1988-11-20', 'Male', '0990000000', 'Ntcheu Boma'),
(40, 'Helen Carter', '1971-06-06', 'Female', '0881010101', 'Nkhotakota Boma'),
(41, 'Brian Mitchell', '1990-09-09', 'Male', '0992020202', 'Chitipa Boma'),
(42, 'Deborah Perez', '1963-05-05', 'Female', '0883030303', 'Karonga Boma'),
(43, 'Edward Roberts', '1976-03-03', 'Male', '0994040404', 'Nkhata Bay Boma'),
(44, 'Sharon Turner', '1984-02-02', 'Female', '0885050505', 'Nsanje Boma'),
(45, 'Ronald Phillips', '1966-01-01', 'Male', '0996060606', 'Chikwawa Boma'),
(46, 'Cynthia Campbell', '1995-12-12', 'Female', '0887070707', 'Rumphi Boma'),
(47, 'George Parker', '1982-11-11', 'Male', '0998080808', 'Mulanje Boma'),
(48, 'Amy Evans', '1978-10-10', 'Female', '0889090909', 'Phalombe Boma'),
(49, 'Jason Edwards', '1989-08-08', 'Male', '0991212121', 'Thyolo Boma'),
(50, 'Angela Stewart', '1991-07-07', 'Female', '0882323232', 'Balaka Boma');

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`id`, `user_id`, `name`, `phone`) VALUES
(1, 17, 'Alice Banda', '0111666777'),
(2, 18, 'David Moyo', '0111888999'),
(3, 19, 'Faith Jere', '0111222000'),
(4, 20, 'Samuel Phiri', '0111333111'),
(5, 21, 'Loveness Gondwe', '0111444222');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` enum('Admin','Doctor','Nurse','Receptionist') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `created_at`, `email`, `password`) VALUES
(1, '', 'Doctor', '2026-05-04 19:48:57', 'emily@medicare.test', 'password123'),
(2, 'jsmith', 'Doctor', '2026-05-04 19:54:37', 'doctor@medicare.test', 'password123'),
(3, 'khina', 'Doctor', '2026-05-04 19:54:37', 'khina@email.com', 'password123'),
(4, 'cbanda', 'Doctor', '2026-05-04 20:56:44', 'cbanda@medicare.com', 'password123'),
(5, 'stsonga', 'Doctor', '2026-05-04 20:56:44', 'stsonga@medicare.com', 'password123'),
(6, 'jphiri', 'Doctor', '2026-05-04 20:56:44', 'jphiri@medicare.com', 'password123'),
(7, 'gmlowoka', 'Doctor', '2026-05-04 20:56:44', 'gmlowoka@medicare.com', 'password123'),
(8, 'inewton', 'Doctor', '2026-05-04 20:56:44', 'inewton@medicare.com', 'password123'),
(9, 'fkumwenda', 'Doctor', '2026-05-04 20:56:44', 'fkumwenda@medicare.com', 'password123'),
(10, 'pmoyo', 'Doctor', '2026-05-04 20:56:44', 'pmoyo@medicare.com', 'password123'),
(11, 'n_grace', 'Nurse', '2026-05-04 21:07:12', 'g.phiri@medicare.com', 'nurse123'),
(12, 'n_tembo', 'Nurse', '2026-05-04 21:07:12', 'l.tembo@medicare.com', 'nurse123'),
(13, 'n_mary', 'Nurse', '2026-05-04 21:07:12', 'm.lungu@medicare.com', 'nurse123'),
(14, 'n_tione', 'Nurse', '2026-05-04 21:07:12', 't.maseko@medicare.com', 'nurse123'),
(15, 'n_kondwa', 'Nurse', '2026-05-04 21:07:12', 'k.zulu@medicare.com', 'nurse123'),
(16, 'n_chisomo', 'Nurse', '2026-05-04 21:07:12', 'c.banda_n@medicare.com', 'nurse123'),
(17, 'alice_banda', 'Receptionist', '2026-05-04 21:10:59', 'a.banda@medicare.com', 'recep123'),
(18, 'david_moyo', 'Receptionist', '2026-05-04 21:10:59', 'd.moyo@medicare.com', 'recep123'),
(19, 'faith_jere', 'Receptionist', '2026-05-04 21:10:59', 'f.jere@medicare.com', 'recep123'),
(20, 'sam_phiri', 'Receptionist', '2026-05-04 21:10:59', 's.phiri@medicare.com', 'recep123'),
(21, 'love_gondwe', 'Receptionist', '2026-05-04 21:10:59', 'l.gondwe@medicare.com', 'recep123');

-- --------------------------------------------------------

--
-- Table structure for table `vitals`
--

CREATE TABLE `vitals` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `temperature` decimal(4,2) DEFAULT NULL,
  `blood_pressure` varchar(20) DEFAULT NULL,
  `recorded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vitals`
--

INSERT INTO `vitals` (`id`, `patient_id`, `temperature`, `blood_pressure`, `recorded_at`) VALUES
(1, 1, 36.50, '120/80', '2026-05-04 21:18:19'),
(2, 2, 37.20, '118/75', '2026-05-04 21:18:19'),
(3, 3, 38.10, '130/85', '2026-05-04 21:18:19'),
(4, 4, 36.80, '115/70', '2026-05-04 21:18:19'),
(5, 5, 37.00, '122/82', '2026-05-04 21:18:19'),
(6, 6, 36.40, '110/70', '2026-05-04 21:18:19'),
(7, 7, 39.20, '140/90', '2026-05-04 21:18:19'),
(8, 8, 36.70, '119/79', '2026-05-04 21:18:19'),
(9, 9, 37.50, '125/85', '2026-05-04 21:18:19'),
(10, 10, 36.90, '117/76', '2026-05-04 21:18:19'),
(11, 11, 37.10, '121/81', '2026-05-04 21:18:19'),
(12, 12, 38.50, '135/88', '2026-05-04 21:18:19'),
(13, 13, 36.60, '116/74', '2026-05-04 21:18:19'),
(14, 14, 37.30, '128/84', '2026-05-04 21:18:19'),
(15, 15, 36.50, '120/80', '2026-05-04 21:18:19'),
(16, 16, 37.80, '132/86', '2026-05-04 21:18:19'),
(17, 17, 36.80, '114/72', '2026-05-04 21:18:19'),
(18, 18, 37.00, '123/83', '2026-05-04 21:18:19'),
(19, 19, 36.40, '112/71', '2026-05-04 21:18:19'),
(20, 20, 39.00, '145/95', '2026-05-04 21:18:19'),
(21, 21, 36.70, '118/78', '2026-05-04 21:18:19'),
(22, 22, 37.40, '126/82', '2026-05-04 21:18:19'),
(23, 23, 36.90, '117/75', '2026-05-04 21:18:19'),
(24, 24, 37.20, '120/80', '2026-05-04 21:18:19'),
(25, 25, 38.20, '131/85', '2026-05-04 21:18:19'),
(26, 26, 36.60, '115/73', '2026-05-04 21:18:19'),
(27, 27, 37.10, '122/81', '2026-05-04 21:18:19'),
(28, 28, 36.50, '119/79', '2026-05-04 21:18:19'),
(29, 29, 37.60, '129/84', '2026-05-04 21:18:19'),
(30, 30, 36.80, '116/72', '2026-05-04 21:18:19'),
(31, 31, 37.00, '121/80', '2026-05-04 21:18:19'),
(32, 32, 38.80, '138/89', '2026-05-04 21:18:19'),
(33, 33, 36.40, '111/70', '2026-05-04 21:18:19'),
(34, 34, 37.30, '124/83', '2026-05-04 21:18:19'),
(35, 35, 36.90, '118/77', '2026-05-04 21:18:19'),
(36, 36, 37.50, '127/82', '2026-05-04 21:18:19'),
(37, 37, 36.70, '115/74', '2026-05-04 21:18:19'),
(38, 38, 37.20, '120/80', '2026-05-04 21:18:19'),
(39, 39, 38.00, '133/87', '2026-05-04 21:18:19'),
(40, 40, 36.60, '113/71', '2026-05-04 21:18:19'),
(41, 41, 37.10, '122/82', '2026-05-04 21:18:19'),
(42, 42, 36.80, '118/79', '2026-05-04 21:18:19'),
(43, 43, 37.40, '125/85', '2026-05-04 21:18:19'),
(44, 44, 36.50, '119/76', '2026-05-04 21:18:19'),
(45, 45, 39.50, '150/100', '2026-05-04 21:18:19'),
(46, 46, 36.70, '116/74', '2026-05-04 21:18:19'),
(47, 47, 37.00, '121/81', '2026-05-04 21:18:19'),
(48, 48, 36.90, '117/75', '2026-05-04 21:18:19'),
(49, 49, 37.30, '123/82', '2026-05-04 21:18:19'),
(50, 50, 36.40, '110/68', '2026-05-04 21:18:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nurse_user` (`user_id`),
  ADD KEY `fk_nurse_dept` (`department_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vitals`
--
ALTER TABLE `vitals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vitals`
--
ALTER TABLE `vitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admissions`
--
ALTER TABLE `admissions`
  ADD CONSTRAINT `admissions_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medical_records_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `nurses`
--
ALTER TABLE `nurses`
  ADD CONSTRAINT `fk_nurse_dept` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `fk_nurse_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `nurses_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD CONSTRAINT `receptionists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vitals`
--
ALTER TABLE `vitals`
  ADD CONSTRAINT `vitals_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
