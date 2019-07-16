-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 02:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artwork_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artwork_path`) VALUES
(1, 'Kinecism', 1, 1, 'img/album_artwork/kinematic-kinecism.jpg'),
(2, 'Kites', 1, 1, 'img/album_artwork/kinematic-kites.jpg'),
(3, 'One Way Street', 2, 4, 'img/album_artwork/themadpixproject-onewaystreet.jpg'),
(4, 'Strong', 3, 4, 'img/album_artwork/jekk-strong.jpg'),
(5, 'If You Insist', 4, 2, 'img/album_artwork/samiebower-ifyouinsist.jpg'),
(6, 'Crown', 5, 6, 'img/album_artwork/kelleemaize-crown.jpg'),
(7, 'Inception', 6, 1, 'img/album_artwork/screaminc-inception.jpg'),
(8, 'What Is Love', 7, 3, 'img/album_artwork/melanieungar-whatislove.jpg'),
(9, 'Illusions', 8, 6, 'img/album_artwork/atomiccat-illusions.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `artwork_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `artwork_path`) VALUES
(1, 'Kinematic', ''),
(2, 'The.madpix.project', 'img/artist_artwork/The.madpix.project.jpg'),
(3, 'Jekk', ''),
(4, 'Samie Bower', 'img/artist_artwork/SamieBower.jpg'),
(5, 'Kellee Maize', ''),
(6, 'Scream Inc.', 'img/artist_artwork/screaminc.jpg'),
(7, 'Melanie Ungar', 'img/artist_artwork/MelanieUngar.jpg'),
(8, 'Atomic Cat', 'img/artist_artwork/AtomicCat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'Hip Hop'),
(3, 'Country'),
(4, 'Dance Music'),
(5, 'Jazz'),
(6, 'Pop'),
(7, 'Reggae');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `date_created`) VALUES
(2, 'test', 'tgrauer', '2019-02-16 10:12:08'),
(3, 'testagain', 'tgrauer', '2019-02-16 10:12:36'),
(5, 'ally', 'tgrauer', '2019-02-18 21:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `playlists_songs`
--

CREATE TABLE `playlists_songs` (
  `id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `playlist_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlists_songs`
--

INSERT INTO `playlists_songs` (`id`, `song_id`, `playlist_id`, `playlist_order`) VALUES
(3, 1, 2, 1),
(4, 12, 2, 2),
(6, 36, 2, 0),
(7, 35, 2, 0),
(9, 1, 5, 0),
(10, 56, 5, 0),
(11, 58, 5, 0),
(12, 35, 5, 0),
(13, 36, 5, 0),
(14, 37, 5, 0),
(15, 11, 5, 0),
(16, 13, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `album_order` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `album_order`, `plays`) VALUES
(1, 'Even Then', 1, 1, 1, '3:50', 'music/01-1607583-Kinematic-_Even Then_ The Band Played On.mp3', 0, 119),
(2, 'We Are The Sanitation Department Of Power Ballad City', 1, 1, 1, '4:37', 'music/02-1607588-Kinematic-We Are The Sanitation Department Of Power Ballad City.mp3', 0, 31),
(3, 'Come Into The Light', 1, 1, 1, '2:38', 'music/03-1607590-Kinematic-Come Into The Light.mp3', 0, 32),
(4, 'Davy Jones', 1, 1, 1, '4:40', 'music/04-1607584-Kinematic-Davy Jones.mp3', 0, 18),
(5, 'Broken Strings', 1, 1, 1, '4:58', 'music/05-1607591-Kinematic-Broken Strings.mp3', 0, 28),
(6, 'Errol Street', 1, 1, 1, '5:06', 'music/06-1607605-Kinematic-Errol Street.mp3', 0, 24),
(7, 'The Wedding Song', 1, 1, 1, '3:39', 'music/07-1607589-Kinematic-The Wedding Song.mp3', 0, 25),
(8, 'No Sunshine In Sunshine', 1, 1, 1, '3:11', 'music/08-1607586-Kinematic-No Sunshine In Sunshine.mp3', 0, 24),
(9, 'North By North West', 1, 1, 1, '4:23', 'music/09-1607603-Kinematic-North By North West.mp3', 0, 40),
(10, 'Red Card', 1, 1, 1, '3:34', 'music/10-1607592-Kinematic-Red Card.mp3', 0, 17),
(11, 'Already Here', 1, 2, 1, '3:16', 'music/01-1442018-Kinematic-Already Here.mp3', 0, 83),
(12, 'Whirlwind', 1, 2, 1, '3:29', 'music/02-1442027-Kinematic-Whirlwind.mp3', 0, 34),
(13, '5 O clock High', 1, 2, 1, '2:46', 'music/03-1442028-Kinematic-5 O clock High.mp3', 0, 66),
(14, 'Jefferson High', 1, 2, 1, '2:30', 'music/04-1442029-Kinematic-Jefferson High.mp3', 0, 40),
(15, 'Peyote', 1, 2, 1, '3:03', 'music/05-1442030-Kinematic-Peyote.mp3', 0, 20),
(16, 'Pinpoints', 1, 2, 1, '3:05', 'music/06-1442031-Kinematic-Pinpoints.mp3', 0, 19),
(17, 'Pretty, Ugly', 1, 2, 1, '3:27', 'music/07-1442032-Kinematic-Pretty, Ugly.mp3', 0, 18),
(18, 'Weak and Splendid', 1, 2, 1, '4:11', 'music/08-1442033-Kinematic-Weak and Splendid.mp3', 0, 20),
(19, 'Jika Jika', 1, 2, 1, '4:33', 'music/09-1442034-Kinematic-Jika Jika.mp3', 0, 23),
(20, 'One Way Street', 2, 3, 4, '2:51', 'music/01-1530532-The.madpix.project-One Way Street.mp3', 0, 23),
(21, 'One Way Street (Instrumental)', 2, 3, 4, '2:51', 'music/02-1530531-The.madpix.project-One Way Street _instrumental_.mp3', 0, 21),
(22, 'Strong', 3, 4, 4, '3:07', 'music/01-1528165-JekK-Strong.mp3', 0, 50),
(23, 'By Your Side', 3, 4, 4, '3:30', 'music/02-1528161-JekK-By Your Side _Feat Lili_.mp3', 0, 79),
(24, 'Big Boy', 3, 4, 4, '3:18', 'music/03-1528160-JekK-Big Boy.mp3', 0, 47),
(25, 'Disobey', 3, 4, 4, '2:59', 'music/04-1528162-JekK-Disobey.mp3', 0, 30),
(26, 'So Strong', 3, 4, 4, '3:12', 'music/05-1528163-JekK-So Strong _LA Style Remix_.mp3', 0, 34),
(27, 'Beautiful day', 3, 4, 4, '2:57', 'music/06-1528164-JekK-Beautiful day.mp3', 0, 64),
(28, 'Intro', 4, 5, 2, '0.42', 'music/01-1448351-Samie Bower-Intro.mp3', 0, 36),
(29, 'Blame', 4, 5, 2, '2:56', 'music/02-1448349-Samie Bower-Blame _Radio Edit_.mp3', 0, 16),
(30, 'Dorothy Gale', 4, 5, 2, '4:25', 'music/03-1448353-Samie Bower-Dorothy Gale.mp3', 0, 29),
(31, 'I Know, You Know', 4, 5, 2, '2:33', 'music/04-1448348-Samie Bower-I Know, You Know _Radio Edit_.mp3', 0, 13),
(32, 'F.T.H', 4, 5, 2, '4:28', 'music/05-1448355-Samie Bower-F.T.H. _Radio Edit_.mp3', 0, 18),
(33, 'So Much', 4, 5, 2, '3:36', 'music/06-1448357-Samie Bower-So Much.mp3', 0, 26),
(34, 'Another One', 4, 5, 2, '3:31', 'music/07-1448354-Samie Bower-Another One _Radio Edit_.mp3', 0, 23),
(35, 'Crown', 5, 6, 6, '4:10', 'music/01-1585652-Kellee Maize-Crown.mp3', 0, 89),
(36, 'Shining', 5, 6, 6, '3:46', 'music/02-1585653-Kellee Maize-Shining.mp3', 0, 90),
(37, 'Cream', 5, 6, 6, '3:18', 'music/03-1585654-Kellee Maize-Scream.mp3', 0, 70),
(38, 'Doubt', 5, 6, 6, '3:22', 'music/04-1585655-Kellee Maize-Doubt.mp3', 0, 33),
(39, 'Brun', 5, 6, 6, '3:05', 'music/05-1585656-Kellee Maize-Burn.mp3', 0, 18),
(40, 'Want', 5, 6, 6, '4:54', 'music/06-1585657-Kellee Maize-Want.mp3', 0, 24),
(41, 'Runnin', 5, 6, 6, '3:51', 'music/07-1585658-Kellee Maize-Runnin.mp3', 0, 27),
(42, 'Higher and Higher', 6, 7, 1, '3:51', 'music/01-1460209-Scream Inc.-Higher And Higher.mp3', 0, 87),
(43, 'Lyrics Of Life', 6, 7, 1, '4:21', 'music/02-1460212-Scream Inc.-Lyrics Of Life.mp3', 0, 126),
(44, 'Open Fire', 6, 7, 1, '4:03', 'music/03-1460211-Scream Inc.-Openfire.mp3', 0, 112),
(46, 'Machinegun', 6, 7, 1, '3:06', 'music/04-1460214-Scream Inc.-Machinegun.mp3', 0, 105),
(47, 'Be The One', 6, 7, 1, '4:59', 'music/05-1460213-Scream Inc.-I_ll Be The One.mp3', 0, 95),
(48, 'Soul Apart', 6, 7, 1, '6:01', 'music/06-1460210-Scream Inc.-Soul Apart.mp3', 0, 91),
(49, 'What Is Love', 7, 8, 3, '3:32', 'music/01-1204669-Melanie Ungar-What Is Love.mp3', 0, 26),
(50, 'Madly, Deeply', 7, 8, 3, '4:10', 'music/02-1204663-Melanie Ungar-Madly, Deeply.mp3', 0, 14),
(51, 'Deeper For You', 7, 8, 3, '3:49', 'music/03-1204670-Melanie Ungar-Deeper For You.mp3', 0, 22),
(52, 'One Day', 7, 8, 3, '3:52', 'music/04-1204667-Melanie Ungar-One Day.mp3', 0, 21),
(53, 'Open', 7, 8, 3, '4:03', 'music/05-1204666-Melanie Ungar-Open.mp3', 0, 14),
(54, 'Lets Start Again', 7, 8, 3, '3:50', 'music/06-1204665-Melanie Ungar-Lets Start Again.mp3', 0, 23),
(55, 'Madly, Deeply (Acoustic)', 7, 8, 3, '4:07', 'music/07-1204668-Melanie Ungar-Madly, Deeply _Acoustic_.mp3', 0, 21),
(56, 'Butterflies', 8, 9, 6, '4:08', 'music/01-1533089-Atomic cat-Butterflies.mp3', 0, 121),
(57, 'Just a Fool', 8, 9, 6, '4:00', 'music/02-1533090-Atomic cat-Just a Fool.mp3', 0, 25),
(58, 'ever Parted', 8, 9, 6, '2:51', 'music/03-1533091-Atomic cat-Never parted.mp3', 0, 77),
(59, 'Shamed', 8, 9, 6, '4:23', 'music/04-1533092-Atomic cat-Shamed.mp3', 0, 28),
(60, 'Waiting for you', 8, 9, 6, '3:51', 'music/05-1533093-Atomic cat-Waiting for you.mp3', 0, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL,
  `profile_pic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `email`, `password`, `reg_date`, `profile_pic`) VALUES
(1, 'tgrauer', 'Thomas', 'Grauer', 'tgrauer1@me.com', '05a671c66aefea124cc08b76ea6d30bb', '2019-02-04 20:31:03', 'img/profile_pics/default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists_songs`
--
ALTER TABLE `playlists_songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `playlists_songs`
--
ALTER TABLE `playlists_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
