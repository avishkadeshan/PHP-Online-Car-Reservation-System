-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 01:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imasha_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_id` int(11) NOT NULL,
  `UserEmail` varchar(200) DEFAULT NULL,
  `Car_id` int(11) NOT NULL,
  `FromDate` varchar(200) DEFAULT NULL,
  `ToDate` varchar(200) DEFAULT NULL,
  `Message` varchar(200) DEFAULT NULL,
  `far` varchar(200) NOT NULL,
  `charge_type` varchar(200) NOT NULL,
  `distance` varchar(200) DEFAULT NULL,
  `no_of_days` varchar(200) DEFAULT NULL,
  `advance` varchar(200) DEFAULT NULL,
  `arrears` varchar(200) DEFAULT NULL,
  `additional` int(11) DEFAULT 0,
  `total_amount` varchar(200) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_id`, `UserEmail`, `Car_id`, `FromDate`, `ToDate`, `Message`, `far`, `charge_type`, `distance`, `no_of_days`, `advance`, `arrears`, `additional`, `total_amount`, `Status`, `PostingDate`) VALUES
(59, 'kasun@gmail.com', 25, '2021-12-04', '2021-12-06', NULL, '35000', 'day', NULL, '2', '35000', '35000', 0, '70000', 0, '2021-12-04 09:59:27'),
(60, 'kasun@gmail.com', 24, '2021-12-04', '2021-12-05', NULL, '25000', 'day', NULL, '1', '12500', '12500', 0, '25000', 0, '2021-12-04 14:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `Brand_id` int(11) NOT NULL,
  `BrandName` varchar(200) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`Brand_id`, `BrandName`, `RegDate`, `UpdateDate`) VALUES
(11, 'Maruti', '2021-11-30 00:52:32', NULL),
(12, 'BMW', '2021-11-30 00:52:41', NULL),
(13, 'Audi', '2021-11-30 00:52:52', NULL),
(14, 'Nissan', '2021-11-30 00:53:03', NULL),
(15, 'Toyota', '2021-11-30 00:53:17', NULL),
(16, 'Honda', '2021-11-30 00:58:09', NULL),
(17, 'Suzuki', '2021-11-30 01:43:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `Car_id` int(11) NOT NULL,
  `CarName` varchar(200) NOT NULL,
  `car_nameplate` varchar(200) NOT NULL,
  `CarOverview` longtext DEFAULT NULL,
  `FuelType` varchar(200) NOT NULL,
  `ModelYear` varchar(200) NOT NULL,
  `SeatingCapacity` int(11) NOT NULL,
  `PricePerDay` varchar(200) NOT NULL,
  `Price_Pe_KM` varchar(200) DEFAULT NULL,
  `Pic1` varchar(200) DEFAULT NULL,
  `Pic2` varchar(200) DEFAULT NULL,
  `Pic3` varchar(200) DEFAULT NULL,
  `Pic4` varchar(200) DEFAULT NULL,
  `Pic5` varchar(200) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Brand_id` int(11) NOT NULL,
  `car_availability` varchar(200) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`Car_id`, `CarName`, `car_nameplate`, `CarOverview`, `FuelType`, `ModelYear`, `SeatingCapacity`, `PricePerDay`, `Price_Pe_KM`, `Pic1`, `Pic2`, `Pic3`, `Pic4`, `Pic5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`, `Brand_id`, `car_availability`) VALUES
(20, 'Vezel', 'HR 52556GSD', 'Honda Vezel is including in the top 10 Best Selling Cars in Sri Lanka. Honda Vezel including in the best performance cars. This car gives an excellent performance that’s why it’s a most favorite car. You can find Vezel with all the latest features in which cruise control, multi-function steering, keyless entry,  all other advanced features.\r\nEvery year thousands of Honda Vezel imports from Japan to Sri Lanka. Its 1500cc engine power provides high-class driving to its users. Hybrid cars are fuel-efficient and the fuel average of hybrid cars is better than non-hybrid cars. The body of the car is like an SUV Honda Vezel is like a small SUV vehicle.', 'Petrol', '2015', 4, '30000', '2000', 'vezel.png', 'vezel1.png', 'vezel2.png', 'vezel3.png', 'vezel4.png', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-11-30 01:24:50', '2021-12-02 20:58:36', 16, 'yes'),
(21, 'Aqua', ' AB 55695546', 'Toyota aqua is the best-selling Japanese car. Toyota aqua is the best-selling unit in the global auto market. Its hybrid engine with an electric motor. The car is very popular in the line of Toyota hybrid cars. Its equipped with a 1.5liter engine and all the latest features attract the eyes of its customers. The price of the car is lower as compared to the other hybrid line cars.\r\n\r\nIt’s including in the 10 top-selling cars in Sri Lanka because of its performance. The fuel average is excellent. It’s available in multiple body colors. The seats are comfortable for drivers and passengers for a long trip. In Sri Lanka, the car is famous for a family used the best performance car.', 'Petrol', '2016', 4, '26000', '1600', 'toyota-aqua-removebg-preview.png', 'toyota-aqua1.jpg', 'aqua-2.jpg', 'aqua-3.jpg', 'toyota-aqua-removebg-preview.png', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-11-30 01:41:29', NULL, 15, 'yes'),
(22, 'Alto', 'XT 125FG674', 'Suzuki Alto including in a small car and available at a cheap price. A large number of Suzuki Alto sold in Sri Lanka every year. Suzuki Alto engine is paired with 800cc power the engine type of this small car is petrol. Its small engine is including in fuel-efficient cars.\r\n\r\nThe sale of Alto is very high in the country. Suzuki Alto is available with manual transmission and manual transmission cars are take less fuel as compared to the automatic. You can also find a used automatic or fresh imported automatic transmission Alto in Sri Lanka. Suzuki Alto is highly recommended in Sri Lanka because it’s available with a low price tag.', 'Petrol', '2015', 4, '25000', '1500', 'Suzuki Alto.png', 'Suzuki Alto1.jpg', 'Suzuki Alto2.jpg', 'Suzuki Alto3.JPG', 'toyota-aqua1.jpg', 1, NULL, 1, 1, 1, 1, 1, 1, 1, NULL, 1, NULL, '2021-11-30 01:52:50', '2021-12-01 05:25:29', 17, 'yes'),
(23, 'Fit Hybrid', 'AVD 25145888', 'Honda Fit is available with an electric motor hybrid engine and petrol engine. The demand for its hybrid engine is higher because fuel rates are high in the international market. Honda Fit Hybrid is available with advanced specifications.\r\n\r\nSafety features are the priority of consumers and its available with all safety features for secure driving. If you are going to the latest model of Fit Hybrid you can find more advanced features. Although its old model 2013 2014 also offers cruise control, power windows, power steering, and many other options that you want in your car.', 'Petrol', '2013', 4, '30000', '2500', 'honda-fit.png', 'CKS_3220.jpg', '1366_p1_s_6.jpg', 'aqua-3.jpg', 'aqua-2.jpg', 1, 1, 1, NULL, 1, 1, 1, 1, 1, NULL, 1, 1, '2021-11-30 02:09:22', '2021-11-30 06:52:24', 16, 'yes'),
(24, 'WagonRGrey', 'XX 04243345', 'Suzuki Stingray is highly recommended Suzuki cars are very excellent in performance. Stingray is including fuel-efficient cars. Its engine is equipped with 850cc power and offers a semi-hybrid option. The hybrid engine adds to increases the fuel efficiency ratio. The shape of the vehicle is like a mini-van. Suzuki provides full safety in this model. You can use this hatchback for family use. This is the best option for fuel efficiency problems.', 'Petrol', '2012', 4, '25000', '1800', 'WagonRGrey.png', 'Maruti-Wagon-R-Stingray-spied-interiors.jpg', 'unnamed.jpg', '1020383A30210120W00119.jpg', '18065.jpg', 1, NULL, NULL, 1, NULL, 1, 1, 1, 1, NULL, NULL, 1, '2021-11-30 02:24:35', '2021-12-04 14:19:26', 17, 'no'),
(25, 'KDH', 'HD 1555DJ00', 'Toyota KDH is the best-selling Japanese car. Toyota KDH is the best-selling unit in the global auto market. Its hybrid engine with an electric motor. The car is very popular in the line of Toyota hybrid cars. Its equipped with a 1.5liter engine and all the latest features attract the eyes of its customers. The price of the car is lower as compared to the other hybrid line cars.\r\n\r\nIt’s including in the 10 top-selling cars in Sri Lanka because of its performance. The fuel average is excellent. It’s available in multiple body colors. The seats are comfortable for drivers and passengers for a long trip. In Sri Lanka, the car is famous for a family used the best performance car.', 'Petrol', '2015', 12, '35000', '3000', 'kdh-removebg-preview.png', 'Suzuki Alto1.jpg', '1020383A30210120W00119.jpg', 'aqua-2.jpg', 'CKS_3220.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, '2021-11-30 02:39:27', '2021-12-04 09:59:27', 15, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `contactusquery`
--

CREATE TABLE `contactusquery` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Message` mediumtext NOT NULL,
  `ContactNo` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactusquery`
--

INSERT INTO `contactusquery` (`Id`, `Name`, `Email`, `Message`, `ContactNo`, `status`, `PostingDate`) VALUES
(2, 'Avishka Deshan', 'ad@gmail.com', 'Hello...I want to know more about your company..I\'m Indian Citizen. I want to details about can i booking a car for some long days..please inform me about that.', 775485426, 0, '2021-12-04 10:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `type` varchar(200) NOT NULL,
  `details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `PageName`, `type`, `details`) VALUES
(1, 'Terms and Conditions', 'terms', '<P align=justify> For the purpose of all rental transactions, financial and otherwise, with regards to the hiring of vehicles on a self-drive basis, Imasha Cabs and tour (Pvt) Ltd, herein is referred to as Imasha Cabs and tour rent-a-car Sri Lanka and the person or any organization herein is referred to as the hirer.\r\n<br>\r\n<br>\r\n<br>\r\n<ul style=\"text-align: left;\">\r\n<li>Rental charges are inclusive of all taxes.</li>\r\n<li>Supply of fuel to the vehicle will be at the hirer’s cost.</li>\r\n<li>The vehicle should be driven only by the hirer. However, the hirer may authorize any other individual to drive the vehicle provided the person is the holder of a valid driving license. The details of such a license should be furnished to Imasha cabs and tour rent-a-car Sri Lanka without delay.</li>\r\n<li>Damages to the vehicle whilst in the custody of the hirer and the extent not covered by the insurance contract, will have to be borne by the hirer to a maximum extent of USD 200.00 plus towing charges.</li>\r\n<li>Imasha cabs and tour rent-a-car Sri Lanka will make all necessary arrangements to provide a replacement vehicle in the event accident / mechanical repairs have to be carried out on the vehicle that has been hired.</li>\r\n<li>The hirer must sign all necessary documents to enable Imasha cabs and tour rent-a-car Sri Lanka to claim insurance as maybe required from the relevant insurance providers.</li>\r\n<li>The hirer will have to bear the cost of damages caused to the mechanical components of the vehicle such as engine, drive train etc. resulting from operating the vehicle without adequate coolant, oil etc.</li>\r\n<li>All minor repairs such as tire punctures, replacement of lamp bulbs, wiper blades etc. will be reimbursed by Imasha cabs and tour rent-a-car Sri Lanka on production of bills/receipts.</li>\r\n<li>A request for an extension of the hiring period by the hirer should be intimated to Imasha cabs and tour-rent-a-car Sri Lanka at least 48 hours before the expiry of the original hiring agreement.</li>\r\n<li>The vehicle will be handed over to the hirer, cleaned and washed. The hirer should return the vehicle in the same condition. If not, a sum of USD 5.00 will be charged by Imasha cabs and tour rent-a-car Sri Lanka as cleaning charges.\r\n<li>If the hirer requests Imasha cabs and tour rent-a-car Sri Lanka to deliver the vehicle to a certain location, the meter reading of the vehicle at the office/yard of Imasha cabs and tour rent-a-car Sri Lanka, will be considered as the starting meter reading for the purpose of computation of the total mileage run at the completion of the hiring period.</li>\r\n<li>Airport pick up and drop off of the hirer can be arranged. A sum of USD 45.00 each way will be charged for pick up at the airport and drop off by Imasha cabs and tour rent-a-car Sri Lanka.</li>\r\n</P>'),
(2, 'Privacy Policy', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(3, 'About Us', 'aboutus', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><b>Counting twenty years of excellence in the rental car industry, Imasha cabs and tours rental car Sri Lanka has maintained its leading position as a trustworthy, efficient and innovative one-stop-shop for all your vehicle rental needs. We rent everything from standard sedans to top of the range luxury cars, vans and jeeps on self-drive at the cheapest rates in town.</b><br><br>\r\n\r\nImasha cabs and tours rental car Sri Lanka services are sought after by holidaymakers and business travellers alike from North America, Europe, the Indian subcontinent, Australia and many other countries. What makes our clients keep coming back to us?\r\n</span>'),
(4, 'FAQs', 'faqs', '																														<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">\r\n<ul style=\"text-align:left;\">\r\n<li style=\"font-size: 22px\">How can I make a reservation ? </li>\r\nYou can fill our reservation form and send us, we will reply you back. For more details you can call or contact us via WhatsApp using the our hotline number 033-4931931\r\n<br><br>\r\n<li style=\"font-size: 22px\">What documents are required to rent a vehicle ? </li>\r\nFor Sri Lankan Citizens National Identity card/ Passport and a valid Sri Lankan Driving License, For Foreign Citizens Passport and International Driving License or the Driving License issued by their own country subject to endorsement by Automobile Association of Ceylon or Sri Lanka Motor Department.\r\n<br><br>\r\n<li style=\"font-size: 22px\">Where can I pick up and/or drop off the vehicle ? </li>\r\nYou could pick up the vehicle at our office during office hours between 7.30 am and 5.00 pm. As an additional service, we provide airport (CMB) pick up for an extra charge of USD 45.00. If you want to drop off the vehicle at the CMB airport a further charge of USD. 45.00 will be levied. (both ways USD 90.00) If you want us to deliver the vehicle to you within Colombo city limits, an additional charge of USD 15.00 will be levied and for delivery and drop of out side Colombo, the additional charge will depend on the distance to the delivery point.\r\n<br><br>\r\n<li style=\"font-size: 22px\">Credit card payments? </li>\r\nAll major credit cards will be accepted and this facility is available only in our office in Colombo between 7.30 am and 5.00 pm. A surcharge of 4.5% will be levied for payment by credit card. All payments outside our office (including Colombo Airport) should be made by cash in whatever currency you prefer.\r\n</ul>\r\n</span>');

-- --------------------------------------------------------

--
-- Table structure for table `previous_booked`
--

CREATE TABLE `previous_booked` (
  `id` int(11) NOT NULL,
  `Booking_id` int(11) NOT NULL,
  `UserEmail` varchar(200) DEFAULT NULL,
  `Car_id` int(11) NOT NULL,
  `FromDate` varchar(200) DEFAULT NULL,
  `ToDate` varchar(200) DEFAULT NULL,
  `Message` varchar(200) DEFAULT NULL,
  `far` varchar(200) NOT NULL,
  `charge_type` varchar(200) NOT NULL,
  `distance` varchar(200) DEFAULT NULL,
  `no_of_days` varchar(200) DEFAULT NULL,
  `advance` varchar(200) DEFAULT NULL,
  `arrears` varchar(200) DEFAULT NULL,
  `additional` int(11) NOT NULL DEFAULT 0,
  `total_amount` varchar(200) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `booking_date` varchar(200) NOT NULL,
  `ReturnDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `previous_booked`
--

INSERT INTO `previous_booked` (`id`, `Booking_id`, `UserEmail`, `Car_id`, `FromDate`, `ToDate`, `Message`, `far`, `charge_type`, `distance`, `no_of_days`, `advance`, `arrears`, `additional`, `total_amount`, `Status`, `booking_date`, `ReturnDate`) VALUES
(1, 53, 'kasun@gmail.com', 22, '2021-12-03', '2021-12-04', NULL, '25000', 'day', NULL, '1', '12500', '12500', 1000, '27000', 3, '2021-12-01 10:48:28', '2021-12-02 04:09:17'),
(2, 52, 'kasun@gmail.com', 22, '2021-12-01', '2021-12-03', NULL, '1500', 'km', '20', '2', '5000', '25000', 1000, '30000', 3, '2021-12-01 10:39:54', '2021-12-02 04:32:45'),
(3, 52, 'kasun@gmail.com', 22, '2021-12-01', '2021-12-03', NULL, '1500', 'km', '20', '2', '5000', '25000', 1000, '31000', 3, '2021-12-01 10:39:54', '2021-12-02 04:34:41'),
(4, 53, 'kasun@gmail.com', 22, '2021-12-03', '2021-12-04', NULL, '25000', 'day', NULL, '1', '12500', '12500', 1000, '28000', 3, '2021-12-01 10:48:28', '2021-12-02 04:44:15'),
(5, 53, 'kasun@gmail.com', 22, '2021-12-03', '2021-12-04', NULL, '25000', 'day', NULL, '1', '12500', '12500', 3000, '28000', 3, '2021-12-01 10:48:28', '2021-12-02 04:45:42'),
(6, 52, 'kasun@gmail.com', 22, '2021-12-01', '2021-12-03', NULL, '1500', 'km', '30', '2', '5000', '40000', 2000, '47000', 3, '2021-12-01 10:39:54', '2021-12-02 04:48:07'),
(8, 55, 'avishkad934@gmail.com', 24, '2021-12-03', '2021-12-05', NULL, '25000', 'day', NULL, '2', '25000', '25000', 5000, '56000', 3, '2021-12-03 01:25:16', '2021-12-02 20:22:59'),
(9, 55, 'avishkad934@gmail.com', 24, '2021-12-03', '2021-12-05', NULL, '25000', 'day', NULL, '2', '25000', '25000', 0, '56000', 3, '2021-12-03 01:25:16', '2021-12-02 20:25:19'),
(10, 56, 'avishkad934@gmail.com', 24, '2021-12-03', '2021-12-04', NULL, '25000', 'day', NULL, '1', '12500', '12500', 0, '25000', 3, '2021-12-03 02:19:39', '2021-12-02 20:53:09'),
(11, 51, 'kasun@gmail.com', 22, '2021-11-30', '2021-12-02', NULL, '25000', 'day', NULL, '2', '25000', '25000', 0, '50000', 3, '2021-11-30 15:31:36', '2021-12-02 20:58:04'),
(12, 54, 'kasun@gmail.com', 20, '2021-12-02', '2021-12-03', NULL, '2000', 'km', '0', '1', '5000', '0', 0, '0', 3, '2021-12-02 14:56:38', '2021-12-02 20:58:36'),
(13, 50, 'kasun@gmail.com', 22, '2021-12-03', '2021-12-04', NULL, '25000', 'day', NULL, '1', '12500', '12500', 0, '25000', 3, '2021-11-30 08:13:03', '2021-12-02 20:58:55'),
(14, 57, 'avishkad934@gmail.com', 25, '2021-12-03', '2021-12-04', NULL, '35000', 'day', NULL, '1', '17500', '17500', 0, '35000', 3, '2021-12-03 02:30:49', '2021-12-02 21:02:56'),
(15, 58, 'avishkad934@gmail.com', 25, '2021-12-06', '2021-12-07', NULL, '35000', 'day', NULL, '1', '17500', '17500', 0, '35000', 3, '2021-12-03 02:32:10', '2021-12-02 21:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Role_id` int(11) NOT NULL,
  `Role_Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Role_id`, `Role_Name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `Id` int(11) NOT NULL,
  `UserEmail` varchar(200) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `FName` varchar(200) NOT NULL,
  `LName` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Contact_No` char(10) NOT NULL,
  `DOB` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Country` varchar(200) NOT NULL,
  `NIC_no` char(13) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `Reg_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updating_Date` timestamp NULL DEFAULT NULL,
  `Role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `FName`, `LName`, `Email`, `Password`, `Contact_No`, `DOB`, `Address`, `City`, `Country`, `NIC_no`, `code`, `status`, `Reg_Date`, `Updating_Date`, `Role_id`) VALUES
(1, 'Avishka', 'Deshan', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '0771254625', '12-06-1999', '12/A,Gampaha', 'Miriswaththa', 'Sri Lanka', '992154784v', 0, '', '2021-10-05 19:05:02', NULL, 1),
(2, 'Kasun', 'Chathuranga', 'kasun@gmail.com', '202cb962ac59075b964b07152d234b70', '0775485246', '1999-08-24', '2/G,Ruggahawila', 'Wathupitiwala', 'Sri Lanka', '995487521v', 0, '', '2021-11-18 01:19:02', NULL, 2),
(16, 'Harsha', 'Mithum', 'harsha@gmail.com', '202cb962ac59075b964b07152d234b70', '0776547654', '1999-11-29', '12/B', 'Pasyala', 'Sri Lanka', '965482461v', 0, '', '2021-11-30 05:22:52', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Brand_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`Car_id`);

--
-- Indexes for table `contactusquery`
--
ALTER TABLE `contactusquery`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `previous_booked`
--
ALTER TABLE `previous_booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Role_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `Brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `Car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contactusquery`
--
ALTER TABLE `contactusquery`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `previous_booked`
--
ALTER TABLE `previous_booked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `Role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`Car_id`) REFERENCES `car` (`Car_id`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`Brand_id`) REFERENCES `brands` (`Brand_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Role_id`) REFERENCES `role` (`Role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
