-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 05:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btask`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `uniqKey` varchar(100) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`id`, `date`, `author`, `title`, `content`, `image`, `uniqKey`, `dateAdded`) VALUES
(2, 'Tue Nov 2020', '350338', 'Hurricane Irma has devastated Florida -02', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. &lt;b&gt;great...&lt;/b&gt;', 'BlogPostImg-46775-52c7f6b7a876fa1a999c6edebbe7f4ee928118d7.jpg', '25351-Hurricane Irma has devastated Florida -02', '2020-11-03 12:48:10'),
(4, 'Wed Nov 2020', '425391', 'Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exerc', 'Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.\r\n\r\n\r\n\r\nQuisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.', 'BlogPostImg-64807-52c7f6b7a876fa1a999c6edebbe7f4ee928118d7.jpg', '27589-Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in.', '2020-11-04 10:16:30'),
(5, 'Fri Oct 2020', 'Aminu', 'Hurricane Irma has devastated Florida -05', 'Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.\r\n\r\nAdipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!\r\n\r\nVoluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis', 'BlogPostImg-36332-52c7f6b7a876fa1a999c6edebbe7f4ee928118d7.jpg', '36332-52c7f6b7a876fa1a999c6edebbe7f4ee928118d7', '2020-10-30 11:19:02'),
(6, 'Fri Oct 2020', 'Aminu', 'Hurricane Irma has devastated Florida -06', 'alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?&lt;br&gt;commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.\r\n\r\nAdipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!\r\n\r\nVo', 'BlogPostImg-30209-52c7f6b7a876fa1a999c6edebbe7f4ee928118d7.jpg', '30209-52c7f6b7a876fa1a999c6edebbe7f4ee928118d7', '2020-10-30 11:20:01'),
(7, 'Wed Nov 2020', 'Admin bn Admin', 'Hurricane Irma has devastated Florida -077', 'Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!&lt;br&gt; Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam! Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!', 'BlogPostImg-33856-52c7f6b7a876fa1a999c6edebbe7f4ee928118d7.jpg', '28934-Hurricane Irma has devastated Florida -077', '2020-11-04 10:51:05'),
(8, 'Mon Nov 2020', '293244', 'Aku', 'Aku', 'BlogPostImg-44112-52c7f6b7a876fa1a999c6edebbe7f4ee928118d7.jpg', '35756-Aku', '2020-11-02 10:33:37'),
(9, 'Wed Nov 2020', 'Admin bn Admin', 'Title 200000 boy', 'vjhjcvjhcvhvajhcvac  dvd dhjv dhv ds king', 'BlogPostImg-46974-68293.jpg', '31503-Title 200000 boy', '2020-11-04 12:11:08'),
(10, 'Tue Nov 2020', 'Admin bn Admin', 'new title', 'content', 'BlogPostImg-58894-52c7f6b7a876fa1a999c6edebbe7f4ee928118d7.jpg', '58894-52c7f6b7a876fa1a999c6edebbe7f4ee928118d7', '2020-11-03 12:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `amountRaised` varchar(100) NOT NULL,
  `amountToRaise` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `lastDonation` varchar(100) NOT NULL,
  `uniqKey` varchar(100) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `title`, `content`, `amountRaised`, `amountToRaise`, `image`, `lastDonation`, `uniqKey`, `dateAdded`) VALUES
(1, 'vgvhh', '', '6789', '8899', 'causesImg-33902-2345.jpg', 'On Fri Oct', '33902-2345', '2020-10-30 13:14:04'),
(2, 'vgvhh', 'vghjvhjvh', '6789', '8899', 'causesImg-43766-2345.jpg', 'On Fri Oct', '43766-2345', '2020-10-30 13:16:12'),
(3, 'vgvhh', 'vghjvhjvh', '6789', '8899', 'causesImg-54285-2345.jpg', 'On Fri Oct', '54285-2345', '2020-10-30 13:16:16'),
(4, 'bksdkjbakjc dsckjdbc', '980bjbcsdc dcjkbcc dsjk dkbd dd d  d d', '98890', '8789', 'causesImg-55014-2345.jpg', 'On Fri Oct', '55014-2345', '2020-10-30 13:17:01'),
(5, 'kmkckl', 'njkklnknl', '090099', '9009', 'causesImg-64794-2345.jpg', 'On Tue Nov', '64794-2345', '2020-11-03 03:25:56'),
(6, 'n m', 'hvhvjv kh', '5678', '678', 'causesImg-61162-2345.jpg', '', '61162-2345', '2020-11-04 07:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `uniqKey` varchar(255) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `twitterLink` varchar(100) NOT NULL,
  `fbLink` varchar(100) NOT NULL,
  `InsLink` varchar(100) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `amountDonated` varchar(100) NOT NULL,
  `causes` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `uniqKey` varchar(255) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `name`, `date`, `amountDonated`, `causes`, `image`, `uniqKey`, `dateAdded`) VALUES
(1, 'Ivan Mako', '2020-11-25', '200', 'Children needs food', 'donation-98y7986987.jpg', '', '2020-11-02 09:46:56'),
(2, 'Aki powu', '2020-11-10', '4567', 'School fees', 'donation-98y7986987.jpg', '', '2020-11-02 09:46:56'),
(3, 'bukar cairo', '2020-11-18', '4567', 'Children needs food', 'donation-98y7986987.jpg', '', '2020-11-02 09:46:56'),
(4, 'joe doe', '2020-11-11', '678', 'Children needs food', 'donation-98y7986987.jpg', '', '2020-11-02 09:46:56'),
(5, 'aki ki', '2020-11-09', '435678', 'School fees', 'donation-98y7986987.jpg', '', '2020-11-02 09:46:56'),
(10, 'yar Akwa', '2020-11-11', '45678', 'hi', 'DonateImg-34699-2345.jpg', '34699-2345', '2020-11-04 07:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `sttime` varchar(100) NOT NULL,
  `endtime` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `uniqKey` varchar(100) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `date`, `sttime`, `endtime`, `title`, `description`, `image`, `author`, `venue`, `uniqKey`, `dateAdded`) VALUES
(1, '2020-11-19', '06:53', '07:52', 'money Time good 2', 'jnklnlkn.........', 'EventImg-64834-70241.jpg', 'Admin bn Admin', 'kwanar maggi', '38191-money Time good 2', '2020-11-04 12:53:59'),
(2, '2020-11-19', '06:53', '07:52', 'money Time', 'jnklnlkn...', 'EventPostImg-56399-52c7f6b7a876fa1a999c6edebbe7f4ee928118d7.jpg', 'Admin bn Admin', 'kwanar maggi', '43766-money Time', '2020-11-04 12:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `eventjoin`
--

CREATE TABLE `eventjoin` (
  `id` int(11) NOT NULL,
  `eventKy` varchar(225) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `pass`, `dateadded`) VALUES
(1, 'Admin bn Admin', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-02 10:11:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventjoin`
--
ALTER TABLE `eventjoin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `causes`
--
ALTER TABLE `causes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eventjoin`
--
ALTER TABLE `eventjoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
