-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 10:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i-internship_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_user_id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_description` text DEFAULT NULL,
  `company_address` varchar(500) NOT NULL,
  `company_email` varchar(256) NOT NULL,
  `company_contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_user_id`, `company_name`, `company_description`, `company_address`, `company_email`, `company_contact`) VALUES
(1, 2, 'McKinsey & Company', 'McKinsey & Company is one of the world’s leading management consulting firms with more than 90 offices in 50 countries. The Firm provides a full spectrum of consulting services (finance, technology, operations, organisation, strategy, etc.) for private, public and non-profit organizations. Clients include 100 of the top 150 global companies, touching every major industry.', 'Level 27, Tower 3, Kuala Lumpur City Centre, 50088 Kuala Lumpur', 'career@mckinseyco.com.my', '03-2382 5500'),
(2, 3, 'Sun Life Malaysia Assurance Berhad', 'Sun Life Malaysia (Sun Life Malaysia Assurance Berhad and Sun Life Malaysia Takaful Berhad) is a joint venture by Sun Life Assurance Company of Canada and Khazanah Nasional Berhad. As a Life Insurance and Family Takaful provider, Sun Life Malaysia offers a comprehensive range of products and services to Malaysians across the country and is focused on helping Clients achieve lifetime financial security and live healthier lives. Sun Life Malaysia distributes its products through a range of distribution channels including bancassurance and bancatakaful, agency force, direct marketing and telemarketing, corporate and government business and e-distribution.', '338, Jalan Tuanku Abdul Rahman, Chow Kit, 50100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'career@sunlifeassurance.com.my', '03-2612 3600'),
(3, 4, 'Top Glove', 'Established in 1991 in Malaysia, Top Glove Corporation Bhd is the world’s largest manufacturer of gloves. What started as a local business enterprise with 1 factory and 1 glove production line, today has manufacturing operations in Malaysia, Thailand, Vietnam and China. The company also has marketing offices in these countries as well as USA, Germany and Brazil; and exports to over 2,000 customers in 195 countries worldwide.', 'Level 21, Top Glove Tower, 16, Persiaran Setia Dagang, Setia Alam, Seksyen U13, 40170 Shah Alam, Selangor, Malaysia', 'career@tg.com.my', '03-3362 3098'),
(4, 5, 'Exact Asia Development Centre Sdn Bhd', 'Exact is the business software market leader in the Benelux. We are the go-to provider for companies looking to automate their accounting, financial, ERP, HRM and CRM processes. We also offer a range of industry-specific solutions to fully manage all of your business processes needs.', 'Suite 8-01 & 8-02, Level 8, G Tower, 199, Jalan Tun Razak, 50400, Kuala Lumpur', 'jobs@exactasiadev.com.my', '03-2179 4242'),
(5, 6, 'Petronas', 'We seek energy potential across the globe, optimizing value through an integrated business model. Our portfolio includes oil and gas, renewable sources, and a range of advanced products and adaptive solutions. Our commitment to sustainability starts at the core of our operations and extends throughout our value chain. People are our strength and partners for growth, driving innovation to deliver a unique spectrum of solutions.', 'Level 78, Tower 1, PETRONAS Twin Towers, Kuala Lumpur City Centre, 50088, Kuala Lumpur, WP Kuala Lumpur', 'precise@petronas.com.my', '03-2051 5000');

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `internship_id` int(11) NOT NULL,
  `internship_title` varchar(200) NOT NULL,
  `internship_description` text NOT NULL,
  `internship_responsibility` text NOT NULL,
  `internship_qualification` text NOT NULL,
  `internship_allowance` varchar(50) NOT NULL,
  `internship_location` varchar(50) NOT NULL,
  `internship_company_id` int(11) NOT NULL,
  `internship_deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`internship_id`, `internship_title`, `internship_description`, `internship_responsibility`, `internship_qualification`, `internship_allowance`, `internship_location`, `internship_company_id`, `internship_deadline`) VALUES
(1, 'Internship for Systems Management Students', 'As an Information Systems Management Intern at Petronas, you will have the unique opportunity to apply your academic knowledge to real-world business challenges. You will work closely with our experienced team members to gain hands-on experience in various aspects of information systems management, including system analysis, design, implementation, and maintenance.', '1. Assist in the analysis of current business processes and identify opportunities for improvement through technology.\r\n\r\n2. Support the design and development of new information systems or enhancements to existing systems.\r\n\r\n3. Help with the implementation of new software applications and ensure proper integration with existing systems.\r\n\r\n4. Participate in the testing of new systems and troubleshoot any issues that arise.\r\n\r\n5. Contribute to the documentation of system processes, user manuals, and technical specifications.\r\n\r\n6. Collaborate with cross-functional teams to gather requirements and provide IT solutions that meet business needs.\r\n\r\n7. Assist in the management of IT projects, including tracking progress, updating project plans, and communicating with stakeholders.\r\n\r\n8. Gain exposure to IT governance, compliance, and risk management practices.', '1. Currently pursuing a degree in Information Systems Management, Computer Science, Information Technology, or a related field.\r\n\r\n2. Basic understanding of information systems and business processes.\r\n\r\n3. Familiarity with project management principles and tools is a plus.\r\n\r\n4. Strong analytical and problem-solving skills.\r\n\r\n5. Excellent communication and teamwork abilities.\r\n\r\n6. Proficiency in Microsoft Office products and a willingness to learn new software tools.', 'RM1000', 'Kuala Lumpur', 1, '2024-09-05'),
(2, 'Internship for Computer Science Students', 'As a Computer Science Intern at Top Glove, you will be immersed in a stimulating environment where you can apply your academic learning to real-world software development and technological challenges. You will work alongside our team of experienced software engineers and computer scientists, gaining valuable experience in software design, development, and testing.', '1. Contribute to the design and development of software applications and features.\r\n\r\n2. Write clean, efficient, and well-documented code.\r\n\r\n3. Collaborate with team members to solve complex problems and develop innovative solutions.\r\n\r\n4. Participate in code reviews and adhere to best practices in software development.\r\n\r\n5. Assist in the testing and debugging of new software to ensure quality and functionality.\r\n\r\n6. Engage in the research and evaluation of new technologies and tools.\r\n\r\n7. Help maintain and update existing systems and software.\r\n\r\n8. Attend team meetings and present your work and progress.', '1. Currently pursuing a degree in Computer Science, Software Engineering, or a related field.\r\n\r\n2. Proficiency in at least one programming language (e.g., Java, Python, C++).\r\n\r\n3. Familiarity with software development methodologies (e.g., Agile, Waterfall).\r\n\r\n4. Basic understanding of data structures, algorithms, and software design patterns.\r\n\r\n5. Strong problem-solving skills and attention to detail.\r\n\r\n6. Excellent communication and teamwork abilities.\r\n\r\n7. Eagerness to learn and adapt to new technologies.', 'RM 800', 'Shah Alam', 2, '2024-08-25'),
(3, 'Internship for Information Systems Management Students', 'This internship is designed for a motivated Information Systems Management student looking to gain practical experience in a corporate setting. You will be involved in various projects that align with your academic background and career interests, providing you with a comprehensive understanding of how information systems support business objectives.', '1. Assist in the assessment of current IT systems and processes to identify areas for improvement.\r\n\r\n2. Support the development of IT policies and procedures to enhance security and efficiency.\r\n\r\n3. Help with the implementation of new IT solutions and manage the integration with existing systems.\r\n\r\n4. Contribute to data analysis projects to inform business decisions.\r\n\r\n5. Participate in the management of IT projects, ensuring they are completed on time and within budget.\r\n\r\n6. Collaborate with IT and business teams to ensure technology aligns with business needs.\r\n\r\n7. Gain exposure to IT service management frameworks and best practices.\r\n', '1. Currently pursuing a degree in Information Systems Management, Business Information Systems, or a related field.\r\n\r\n2. Basic understanding of IT infrastructure, networks, and databases.\r\n\r\n3. Familiarity with project management and IT service management concepts.\r\n\r\n4. Strong analytical and organizational skills.\r\n\r\n5. Excellent communication and interpersonal skills.\r\n\r\n6. Ability to work independently and as part of a team.\r\n\r\n7. Proficiency in Microsoft Office products and a willingness to learn new software.', 'RM700', 'Kuala Lumpur', 3, '2024-07-31'),
(4, 'Internship (Information Security)', 'As an Information Security Intern at [Company Name], you will have the unique opportunity to contribute to our robust cybersecurity posture. You will work alongside experienced security professionals, gaining hands-on experience in various aspects of information security, including risk assessment, policy development, and the implementation of security controls.', '1. Assist in conducting security assessments and vulnerability analyses.\r\n\r\n2. Help develop and review information security policies and procedures.\r\n\r\n3. Support the implementation of security awareness training programs for employees.\r\n\r\n4. Participate in the monitoring and analysis of security events and incidents.\r\n\r\n5. Contribute to the documentation of security protocols and best practices.\r\n\r\n6. Collaborate with IT teams to ensure the integration of security measures into new and existing systems.\r\n\r\n7. Stay updated on the latest cybersecurity trends, threats, and technologies.', '1. Currently pursuing a degree in Information Security, Cybersecurity, Computer Science, or a related field.\r\n\r\n2. Basic understanding of information security principles and practices.\r\n\r\n3. Familiarity with security frameworks and standards (e.g., ISO 27001, NIST).\r\n\r\n4. Strong analytical and problem-solving skills.\r\n\r\n5. Excellent attention to detail and the ability to work methodically.\r\n\r\n6. Good communication and teamwork skills.\r\n\r\n7. A passion for learning and a proactive approach to identifying and mitigating security risks.', 'RM1000', 'Kuala Lumpur', 4, '2024-08-11'),
(5, 'Internship (Software Engineer)', 'As a Software Engineer Intern at Exact Asia, you will be an integral part of our engineering team, contributing to the design, development, and deployment of software applications. This is a hands-on role that will allow you to apply your technical skills and creativity to real-world projects.', '1. Collaborate with senior software engineers to understand project requirements and contribute to the design process.\r\n\r\n2. Write clean, efficient, and well-documented code in [programming languages] to develop new features or maintain existing ones.\r\n\r\n3. Participate in code reviews and contribute to the collective code quality.\r\n\r\n4. Assist in the implementation of automated tests to ensure software reliability and performance.\r\n\r\n5. Help troubleshoot and debug software issues in a timely manner.\r\n\r\n6. Contribute to the continuous integration and deployment processes.\r\n\r\n7. Stay updated with emerging technologies and industry best practices.', '1. Currently pursuing a degree in Computer Science, Software Engineering, or a related field.\r\n\r\n2. Proficiency in [programming languages] and familiarity with software development tools.\r\n\r\n3. Understanding of software development lifecycle and agile methodologies.\r\n\r\n4. Strong problem-solving skills and attention to detail.\r\n\r\n5. Excellent communication and teamwork abilities.\r\n\r\n6. Eagerness to learn and adapt to new technologies and challenges.', 'RM 1200', 'Petaling Jaya', 5, '2024-09-15'),
(6, 'Internship (Mechanical Engineering)', 'We are seeking a highly motivated and detail-oriented Mechanical Engineering Intern to join our team. The intern will work closely with experienced engineers to assist in the design, analysis, and testing of mechanical systems and components. This is an excellent opportunity for a student pursuing a degree in Mechanical Engineering to gain hands-on experience in a dynamic engineering environment.', '1. Assist in the design and development of mechanical systems and components using CAD software.\r\n\r\nPerform engineering calculations and analyses to ensure designs meet specifications and industry standards.\r\n\r\n2. Participate in design reviews and contribute to team discussions.\r\n\r\n3. Support the testing and validation of prototypes and products.\r\n\r\n4. Help with the preparation of technical reports and presentations.\r\n\r\n5. Assist in the creation of engineering drawings and documentation.', '1. Currently pursuing a Bachelor’s or Master’s degree in Mechanical Engineering or a related field.\r\n\r\n2. Basic knowledge of mechanical design principles and CAD software (e.g., AutoCAD, SolidWorks, CATIA).\r\n\r\n3. Familiarity with engineering analysis tools and methods.\r\n\r\n4. Strong analytical and problem-solving skills.\r\n\r\n5. Excellent communication and teamwork abilities.\r\n\r\n6. Ability to work independently with minimal supervision.\r\n\r\n7. Strong attention to detail and organizational skills.', '1000', 'Kuala Lumpur', 5, '2024-08-30'),
(7, 'Internship for Accounting Student', 'We are seeking a diligent and analytical Accounting Intern to join our dynamic finance team. The intern will work closely with accounting professionals to assist in various accounting functions, including but not limited to, financial reporting, accounts payable, accounts receivable, and general ledger maintenance. This internship is an excellent opportunity for a student pursuing a degree in Accounting or a related field to apply their knowledge in a real-world business environment.', '1. Assist with the preparation of financial statements, including balance sheets, income statements, and cash flow statements.\r\n\r\n2. Help with the reconciliation of bank statements and accounts.\r\n\r\n3. Support the accounts payable process by verifying and processing invoices.\r\n\r\n4. Assist in the accounts receivable process by generating invoices and monitoring payments.\r\n\r\n5. Participate in the month-end closing process and prepare related journal entries.\r\n\r\n6. Help maintain the general ledger and ensure all transactions are recorded accurately.', '1. Currently pursuing a Bachelor’s or Master’s degree in Accounting, Finance, or a related field.\r\n\r\n2. Basic understanding of accounting principles and financial reporting standards (e.g., GAAP).\r\n\r\n3. Proficiency in Microsoft Office Suite, especially Excel.\r\n\r\n4. Familiarity with accounting software is a plus (e.g., QuickBooks, SAP, Oracle).', '900', 'Petaling Jaya', 2, '2024-09-24'),
(8, 'Internship for Human Resource Student', 'We are looking for a motivated and organized Human Resources Intern to join our HR team. The intern will work closely with HR professionals to assist in various human resources functions, including recruitment, onboarding, employee relations, and HR administration. This internship is an excellent opportunity for a student pursuing a degree in Human Resources, Business Administration, or a related field to gain hands-on experience in a corporate HR environment.', '1. Assist with the recruitment process, including sourcing candidates, scheduling interviews, and conducting initial screenings.\r\n\r\n2. Help with onboarding new employees by preparing paperwork, conducting orientation sessions, and ensuring they have the necessary resources to start their roles.\r\n\r\n3. Support the maintenance of employee records and files, ensuring compliance with data protection and confidentiality standards.\r\n\r\n4. Assist in the organization of HR-related events, training sessions, and team-building activities.\r\n\r\n5. Help with the administration of employee benefits and respond to inquiries from staff regarding benefits-related issues.', '1. Currently pursuing a Bachelor’s or Master’s degree in Human Resources, Business Administration, or a related field.\r\n\r\n2. Basic understanding of human resources principles and practices.\r\n\r\n3. Proficiency in Microsoft Office Suite and familiarity with HR information systems.\r\n\r\n4. Strong organizational and multitasking skills.\r\n\r\n5. Excellent communication and interpersonal skills.', '600', 'Shah Alam', 3, '2024-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_user_id` int(11) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `student_address` varchar(600) NOT NULL,
  `student_program` varchar(200) NOT NULL,
  `student_cgpa` varchar(4) NOT NULL,
  `student_contact` varchar(12) NOT NULL,
  `student_supervisor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_user_id`, `student_name`, `student_address`, `student_program`, `student_cgpa`, `student_contact`, `student_supervisor_id`) VALUES
(1, 7, 'Norfazana Ifazah', '34, Jalan Bahagia, 34600, Taiping, Perak', 'Bachelor of Information Science (Hons.) Information Systems Management', '3.87', '0124459087', 4),
(2, 13, 'Nur Amirah Syahidah', 'Lot 234, Lorong Rahman Rashim 1, Ampang, Selangor', 'Bachelor of Information Science (Hons.) Information Systems Management', '3.88', '0182181701', 1),
(3, 14, 'Nina Armilla', '23, Jalan Megah Ria, 93150, Kuching, Sarawak', 'Bachelor of Information Technology With Honours', '3.77', '0198876532', 2),
(4, 15, 'Nur Farhana', '98, Jalan Teguh, 73000, Tampin, Negeri Sembilan', 'Bachelor of Accounting With Honours', '3.67', '0114553487', 5),
(5, 16, 'Nur Nadirah', '25, Jalan Paip, 41050, Meru, Selangor', 'Bachelor of Mechanical Engineering Technology With Honours', '3.66', '0124538876', 4),
(6, 17, 'Nurul Nabella Natasha', '87, Jalan Francis, 30200, Ipoh, Perak', 'Bachelor of Business Administration (Hons.) Human Resource Management', '3.84', '0113248896', 4),
(7, 18, 'Eunice Sagun', '67, Jalan New York, 93350, Kuching, Sarawak', 'Bachelor of Business Administration (Hons.) Human Resource Management', '3.65', '0124549908', NULL),
(8, 19, 'Nuradilah Syafiqah', '56, Jalan Kosas 4/10, 68000, Ampang, Selangor', 'Bachelor of Mechanical Engineering Technology With Honours', '3.7', '0113478865', NULL),
(9, 20, 'Muhammad Aqil', '54, Jalan Indah 3/4, 68000, Ampang, Selangor', 'Bachelor of Computer Science With Honours', '3.78', '0198845632', NULL),
(10, 22, 'Nur Damia Inara', '43, Jalan Persiaran Angsa, 68000, Ampang, Selangor', 'Bachelor of Business Administration (Hons.) Human Resource Management', '3.65', '0197765439', NULL),
(11, 23, 'Dani Iman Shah', '12, Lorong Haji Ahmad Ton, 68000, Ampang, Selangor', 'Bachelor of Computer Science With Honours', '3.6', '0185546098', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_internships`
--

CREATE TABLE `student_internships` (
  `student_internship_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `internship_id` int(11) NOT NULL,
  `student_internship_resume` varchar(500) NOT NULL,
  `student_internship_status` enum('Applied','Accepted','Rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_internships`
--

INSERT INTO `student_internships` (`student_internship_id`, `student_id`, `internship_id`, `student_internship_resume`, `student_internship_status`) VALUES
(1, 2, 1, '66a52c83c6558.pdf', 'Accepted'),
(2, 1, 3, '66a52dc84401d.pdf', 'Accepted'),
(3, 1, 1, '66a52dd96cda0.pdf', 'Rejected'),
(4, 3, 4, '66a52e748adc2.pdf', 'Rejected'),
(5, 3, 2, '66a52ec7590ed.pdf', 'Accepted'),
(6, 4, 7, '66a5328c08a76.pdf', 'Accepted'),
(7, 5, 6, '66a5331174739.pdf', 'Accepted'),
(8, 6, 8, '66a533c20d463.pdf', 'Accepted'),
(9, 7, 8, '66a534405006b.pdf', 'Rejected'),
(10, 8, 6, '66a534bc9beef.pdf', 'Accepted'),
(11, 9, 2, '66a535683c09d.pdf', 'Accepted'),
(12, 9, 5, '66a5358657644.pdf', 'Rejected'),
(13, 9, 4, '66a5359bd00a3.pdf', 'Accepted'),
(14, 2, 5, '66a5f3d43aa1c.pdf', 'Applied');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `supervisor_id` int(11) NOT NULL,
  `supervisor_user_id` int(11) NOT NULL,
  `supervisor_name` varchar(200) NOT NULL,
  `supervisor_contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`supervisor_id`, `supervisor_user_id`, `supervisor_name`, `supervisor_contact`) VALUES
(1, 8, 'Norazlina', '012445673'),
(2, 9, 'Rahayu', '0198874332'),
(3, 10, 'Ashikin', '019095429'),
(4, 24, 'Abdurrahman Jalil', '0197887548'),
(5, 25, 'Yamin Kamis', '0116550967');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_role` enum('admin','student','supervisor','company') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_username`, `user_password`, `user_role`) VALUES
(1, 'admin@uitm.edu.my', 'Admin', '$2y$10$ov6kPrrPX2ddgi8psMl2QOKoJFe.xcFeDdRMYdJJ9X77LMrAmwYKq', 'admin'),
(2, 'career@mckinseyco.com.my', 'McKinsey', '$2y$10$ov6kPrrPX2ddgi8psMl2QOKoJFe.xcFeDdRMYdJJ9X77LMrAmwYKq', 'company'),
(3, 'career@sunlifeassurance.com.my', 'Sunlife', '$2y$10$ov6kPrrPX2ddgi8psMl2QOKoJFe.xcFeDdRMYdJJ9X77LMrAmwYKq', 'company'),
(4, 'career@tg.com.my', 'Topglove', '$2y$10$ov6kPrrPX2ddgi8psMl2QOKoJFe.xcFeDdRMYdJJ9X77LMrAmwYKq', 'company'),
(5, 'jobs@exactasiadev.com.my', 'ExactAsia', '$2y$10$ov6kPrrPX2ddgi8psMl2QOKoJFe.xcFeDdRMYdJJ9X77LMrAmwYKq', 'company'),
(6, 'precise@petronas.com.my', 'Petronas', '$2y$10$ov6kPrrPX2ddgi8psMl2QOKoJFe.xcFeDdRMYdJJ9X77LMrAmwYKq', 'company'),
(7, 'fazana01@gmail.com', 'Fazana', '$2y$10$ov6kPrrPX2ddgi8psMl2QOKoJFe.xcFeDdRMYdJJ9X77LMrAmwYKq', 'student'),
(8, 'azlina@uitm.edu.my', 'Norazlina', '$2y$10$ov6kPrrPX2ddgi8psMl2QOKoJFe.xcFeDdRMYdJJ9X77LMrAmwYKq', 'supervisor'),
(9, 'rahayu@uitm.edu.my', 'Rahayu', '$2y$10$ov6kPrrPX2ddgi8psMl2QOKoJFe.xcFeDdRMYdJJ9X77LMrAmwYKq', 'supervisor'),
(10, 'ashikin@uitm.edu.my', 'Ashikin', '$2y$10$ov6kPrrPX2ddgi8psMl2QOKoJFe.xcFeDdRMYdJJ9X77LMrAmwYKq', 'supervisor'),
(13, 'amrhsydh@gmail.com', 'Amirah', '$2y$10$Qq0aTRZ1KoiRYjlWyWSOAOBm5oaJosgrFf/lWXIcweBxCm0qLQRgG', 'student'),
(14, 'nina01@gmail.com', 'Nina', '$2y$10$v92Vk2pSZ8uW3v7KDcakWexAmkd6J3tcfrFcDawcOVim8StdhLRKC', 'student'),
(15, 'farhana99@gmail.com', 'Hana', '$2y$10$pW2k.3QkUrdDAcO//LVFaupShi9bvnWydQR9ynbmiVbi.weK9sFpq', 'student'),
(16, 'nad01@gmail.com', 'Nadirah', '$2y$10$EffoRfs2VblNOo2gKhXMiO2CarCtWAWH4d5MQr09MzlCCa0TEyITG', 'student'),
(17, 'bella00@gmail.com', 'Bella', '$2y$10$avoTKRUvvpeuU9a5X/AKtu0L1RR20IKJFRRbsWNo0obo4so7m3kma', 'student'),
(18, 'eunice01@gmail.com', 'Eunice', '$2y$10$ATXotMokGz5.xucaklHgKO05gcyiLaemQAEXrZlItASUhWrCr5L1.', 'student'),
(19, 'adlh02@gmail.com', 'Adilah', '$2y$10$1YBfz1xC8opi0G1yZVtuqOgv9nw9.FRRKFwEVTOpty7hfMq53.qiu', 'student'),
(20, 'aqil05@gmail.com', 'Aqil', '$2y$10$ioiIAz31/.IXlUwT3mDgmOTtkyoN2/JVEGciwLYMNA34tiyRWVMTW', 'student'),
(21, 'admin2@uitm.edu.my', 'Admin 2', '$2y$10$uS22jZcRIhbrIdM7aYWaueLoSZQ.qzSKLKIlRk2xYQaQ1Y9gI1PMG', 'admin'),
(22, 'damia00@gmail.com', 'Damia', '$2y$10$/tE4MOj/Pm3nAbgsPxelwO7FYURG0rxrIVduM2D5wusBcSHbG6lmW', 'student'),
(23, 'dani01@gmail.com', 'Dani', '$2y$10$XW68O0fUGM.jwVVcn8.mku/zE1TmE3wWcfXfO7iH2g/mLN/e/TctK', 'student'),
(24, 'abdurrahman@uitm.edu.my', 'Abdurrahman', '$2y$10$oWj0l3kC3LkxkR9DBFchxeQ223XgcGAdXe/YYykIpBtGIJq3cLdE6', 'supervisor'),
(25, 'yamin@uitm.edu.my', 'Yamin', '$2y$10$djNjssgKIIpTVmF9AG6Py.aIROZqpXqsItBJrim9PN.MiM78DvXIK', 'supervisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `company_user_id` (`company_user_id`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`internship_id`),
  ADD KEY `internship_company_id` (`internship_company_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_user_id` (`student_user_id`),
  ADD KEY `student_supervisor_id` (`student_supervisor_id`);

--
-- Indexes for table `student_internships`
--
ALTER TABLE `student_internships`
  ADD PRIMARY KEY (`student_internship_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `internship_id` (`internship_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`supervisor_id`),
  ADD KEY `supervisor_user_id` (`supervisor_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `internship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_internships`
--
ALTER TABLE `student_internships`
  MODIFY `student_internship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`company_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_ibfk_1` FOREIGN KEY (`internship_company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`student_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`student_supervisor_id`) REFERENCES `supervisors` (`supervisor_id`);

--
-- Constraints for table `student_internships`
--
ALTER TABLE `student_internships`
  ADD CONSTRAINT `student_internships_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `student_internships_ibfk_2` FOREIGN KEY (`internship_id`) REFERENCES `internships` (`internship_id`);

--
-- Constraints for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD CONSTRAINT `supervisors_ibfk_1` FOREIGN KEY (`supervisor_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
