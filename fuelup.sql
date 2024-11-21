-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2024 at 03:47 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.13


--
-- Database: `fuelup`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` varchar(500) NOT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `fuel_price`
--

DROP TABLE IF EXISTS `fuel_price`;
CREATE TABLE IF NOT EXISTS `fuel_price` (
  `Supplier_Type` varchar(20) NOT NULL,
  `Updated_Date` date NOT NULL,
  `Updated_Time` time NOT NULL,
  `Petrol_92` double NOT NULL,
  `Petrol_95` double NOT NULL,
  `Diesel` double NOT NULL,
  `Super_Diesel` double NOT NULL,
  `Kerosine_Oil` double NOT NULL,
  `Industrial_Kerosine_Oil` double NOT NULL,
  `Fuel_Oil` double NOT NULL,
  PRIMARY KEY (`Supplier_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Table structure for table `fuel_station_registration`
--

DROP TABLE IF EXISTS `fuel_station_registration`;
CREATE TABLE IF NOT EXISTS `fuel_station_registration` (
  `Registration_No` varchar(20) NOT NULL,
  `Supplier_Type` varchar(15) NOT NULL,
  `Station_Name` varchar(50) NOT NULL,
  `No` varchar(25) NOT NULL,
  `Street` varchar(25) NOT NULL,
  `City` varchar(25) NOT NULL,
  `Telephone_No` int NOT NULL,
  `Fax_No` int NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Owner_Name` varchar(35) NOT NULL,
  `Owner_Mobile_No` int NOT NULL,
  PRIMARY KEY (`Registration_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Table structure for table `fuel_status`
--

DROP TABLE IF EXISTS `fuel_status`;
CREATE TABLE IF NOT EXISTS `fuel_status` (
  `Registration_No` varchar(20) NOT NULL,
  `Updated_Date` date NOT NULL,
  `Updated_Time` time NOT NULL,
  `P92_Avalibility` varchar(20) NOT NULL,
  `Petrol_92` double NOT NULL,
  `P95_Avalibility` varchar(20) NOT NULL,
  `Petrol_95` double NOT NULL,
  `D_Avalibility` varchar(20) NOT NULL,
  `Diesel` double NOT NULL,
  `SD_Avalibility` varchar(20) NOT NULL,
  `Super_Diesel` double NOT NULL,
  `KO_Avalibility` varchar(20) NOT NULL,
  `Kerosine_Oil` double NOT NULL,
  `IKO_Avalibility` varchar(20) NOT NULL,
  `Industrial_Kerosine_Oil` double NOT NULL,
  PRIMARY KEY (`Registration_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `instrument_registration`
--

DROP TABLE IF EXISTS `instrument_registration`;
CREATE TABLE IF NOT EXISTS `instrument_registration` (
  `Registration_No` varchar(20) NOT NULL,
  `Instrument_Type` varchar(20) NOT NULL,
  `Fuel_Capacity` int NOT NULL,
  `Fuel_Type` varchar(20) NOT NULL,
  PRIMARY KEY (`Registration_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passwordupdates`
--

DROP TABLE IF EXISTS `passwordupdates`;
CREATE TABLE IF NOT EXISTS `passwordupdates` (
  `No` int NOT NULL AUTO_INCREMENT,
  `UserEmail` varchar(100) NOT NULL,
  `VerificationCode` varchar(100) NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `passwordupdates`
--

INSERT INTO `passwordupdates` (`No`, `UserEmail`, `VerificationCode`) VALUES
(1, 'yasiruchamudithawijesinghe@gmail.com', '247676'),
(2, 'yasiruchamudithawijesinghe@gmail.com', '192200'),
(3, 'yasiruchamudithawijesinghe@gmail.com', '227253');

-- --------------------------------------------------------

--
-- Table structure for table `qr_code_verification`
--

DROP TABLE IF EXISTS `qr_code_verification`;
CREATE TABLE IF NOT EXISTS `qr_code_verification` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Code` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `qr_code_verification`
--

INSERT INTO `qr_code_verification` (`ID`, `Email`, `Code`) VALUES
(1, 'yasiruchamudithawijesinghe@gmail.com', 357453),
(2, 'yasiruchamudithawijesinghe@gmail.com', 221128),
(3, 'yasiruchamudithawijesinghe@gmail.com', 162091),
(4, 'yasiruchamudithawijesinghe@gmail.com', 157051),
(5, 'yasiruchamudithawijesinghe@gmail.com', 108642),
(6, 'fuelupgroup@gmail.com', 294738),
(7, 'yasiruchamudithatestmail@gmail.com', 196442);

-- --------------------------------------------------------

--
-- Table structure for table `qr_relesed`
--

DROP TABLE IF EXISTS `qr_relesed`;
CREATE TABLE IF NOT EXISTS `qr_relesed` (
  `Email` varchar(100) NOT NULL,
  `Date_Time` datetime NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `qr_relesed`
--

INSERT INTO `qr_relesed` (`Email`, `Date_Time`) VALUES
('chamudithawijesinghe22@gmail.com', '2026-07-23 03:37:56'),
('fuelupgroup@gmail.com', '2008-09-23 08:28:06'),
('yasiruchamuditha99@gmail.com', '2026-07-23 03:41:57'),
('yasiruchamudithatestmail@gmail.com', '2008-09-23 09:16:14'),
('yasiruchamudithawijesinghe@gmail.com', '2026-07-23 03:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

DROP TABLE IF EXISTS `review_table`;
CREATE TABLE IF NOT EXISTS `review_table` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_rating` varchar(128) NOT NULL,
  `user_review` varchar(128) NOT NULL,
  `datetime` time NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_registration`
--

DROP TABLE IF EXISTS `supplier_registration`;
CREATE TABLE IF NOT EXISTS `supplier_registration` (
  `Registration_No` varchar(20) NOT NULL,
  `Company_Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Telephone_No` int NOT NULL,
  `Fax_No` int NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Director_Name` varchar(100) NOT NULL,
  `Mobile_No` int NOT NULL,
  PRIMARY KEY (`Registration_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token_approved_instrument`
--

DROP TABLE IF EXISTS `token_approved_instrument`;
CREATE TABLE IF NOT EXISTS `token_approved_instrument` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Registration_No` varchar(20) NOT NULL,
  `preferd_Date` date NOT NULL,
  `preferd_Time` time NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FuelType` varchar(20) NOT NULL,
  `Approved_dateTime` datetime NOT NULL,
  `Fuel_station` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token_approved_vehicle`
--

DROP TABLE IF EXISTS `token_approved_vehicle`;
CREATE TABLE IF NOT EXISTS `token_approved_vehicle` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Registration_No` varchar(20) NOT NULL,
  `preferd_Date` date NOT NULL,
  `preferd_Time` time NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FuelType` varchar(20) NOT NULL,
  `Approved_dateTime` datetime NOT NULL,
  `Fuel_station` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Table structure for table `token_instrument`
--

DROP TABLE IF EXISTS `token_instrument`;
CREATE TABLE IF NOT EXISTS `token_instrument` (
  `Registration_No` varchar(20) NOT NULL,
  `Fuel_Station` varchar(100) NOT NULL,
  `preferd_Date` date NOT NULL,
  `preferd_Time` time NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile_No` int NOT NULL,
  `FuelType` varchar(20) NOT NULL,
  `Validity` varchar(20) NOT NULL,
  PRIMARY KEY (`Registration_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token_vehicle`
--

DROP TABLE IF EXISTS `token_vehicle`;
CREATE TABLE IF NOT EXISTS `token_vehicle` (
  `Registration_No` varchar(20) NOT NULL,
  `Fuel_Station` varchar(100) NOT NULL,
  `preferd_Date` date NOT NULL,
  `preferd_Time` time NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile_No` int NOT NULL,
  `FuelType` varchar(20) NOT NULL,
  `Validity` varchar(20) NOT NULL,
  PRIMARY KEY (`Registration_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

DROP TABLE IF EXISTS `user_registration`;
CREATE TABLE IF NOT EXISTS `user_registration` (
  `Name` varchar(128) NOT NULL,
  `Contact_No` int NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `User_Role` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Verification` varchar(32) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Table structure for table `vehicle_registration`
--

DROP TABLE IF EXISTS `vehicle_registration`;
CREATE TABLE IF NOT EXISTS `vehicle_registration` (
  `Reg_No` varchar(20) NOT NULL,
  `Engine_No` varchar(25) NOT NULL,
  `Chassis_No` varchar(25) NOT NULL,
  `Vehicle_Class` varchar(20) NOT NULL,
  `Fuel_Type` varchar(15) NOT NULL,
  PRIMARY KEY (`Reg_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

