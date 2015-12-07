-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comp4711`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mug` varchar(256),
  `number` int(2) NOT NULL,
  `position` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`firstname`, `lastname`, `mug`, `number`, `position`) VALUES
('Prince', 'Amukamara', 'amukamara.png', '20', 'CB'),
('Robert', 'Ayers', 'ayers.png', '91', 'DE'),
('Jon', 'Beason', 'beason.png', '52', 'MLB'),
('Will', 'Beatty', 'beatty.png', '65', 'T'),
('Odell', 'Beckham', 'beckham.png', '13', 'WR'),
('Nat', 'Berhe', 'berhe.png', '29', 'SS'),
('Jasper', 'Brinkley', 'brinkley.png', '53', 'LB'),
('Jay', 'Bromley', 'bromley.png', '96', 'DT'),
('Josh', 'Brown', 'brown.png', '3', 'K'),
('Jonathan', 'Casillas', 'casillas.png', '54', 'LB'),
('Landon', 'Collins', 'collins.png', '21', 'FS'),
('Victor', 'Cruz', 'cruz.png', '80', 'WR'),
('Jerome', 'Cunningham', 'cunningham.png', '86', 'TE'),
('Justin', 'Currie', 'currie.png', '36', 'DB'),
('Craig', 'Dahl', 'dahl.png', '25', 'DB'),
('Orleans', 'Darkwa', 'darkwa.png', '26', 'RB'),
('Geremy', 'Davis', 'davis.png', '18', 'WR'),
('Zak', 'DeOssie', 'deossie.png', '51', 'LS'),
('Larry', 'Donnell', 'donnell.png', '84', 'TE'),
('Kenrick', 'Ellis', 'ellis.png', '71', 'DT'),
('Daniel', 'Fells', 'fells.png', '85', 'TE'),
('Ereck', 'Flowers', 'flowers.png', '76', 'OT'),
('Jonathan', 'Hankins', 'hankins.png', '95', 'DT'),
('Dwayne', 'Harris', 'harris.png', '17', 'WR'),
('Marcus', 'Harris', 'harris_m.png', '18', 'WR');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `conference` varchar(3) NOT NULL,
  `division` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `net_points` int NOT NULL,
  `wins` int NOT NULL,
  `losses` int NOT NULL,
  `points_for` int NOT NULL,
  `points_against` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `city`, `conference`, `division`, `logo`, `net_points`, `wins`, `losses`, `points_for`, `points_against`) VALUES
('DAL', 'Cowboys', 'Dallas', 'NFC', 'East', 'dal.png', 1, 0, 0, 1, 0),
('NYG', 'Giants', 'New York', 'NFC', 'East', 'nyg.png', 2, 0, 0, 2, 0),
('WAS', 'Redskins', 'Washington', 'NFC', 'East', 'was.png', 3, 0, 0, 3, 0),
('PHI', 'Eagles', 'Philadelphia', 'NFC', 'East', 'phi.png', 4, 0, 0, 4, 0),
('GB', 'Packers', 'Green Bay', 'NFC', 'North', 'gb.png', 5, 0, 0, 5, 0),
('MIN', 'Vikings', 'Minnesota', 'NFC', 'North', 'min.png', 6, 0, 0, 6, 0),
('DET', 'Lions', 'Detroit', 'NFC', 'North', 'det.png', 7, 0, 0, 7, 0),
('CHI', 'Bears', 'Chicago', 'NFC', 'North', 'chi.png', 8, 0, 0, 8, 0),
('CAR', 'Panthers', 'Carolina', 'NFC', 'South', 'car.png', 9, 0, 0, 9, 0),
('ATL', 'Falcons', 'Atlanta', 'NFC', 'South', 'atl.png', 10, 0, 0, 10, 0),
('TB', 'Buccaneers', 'Tampa Bay', 'NFC', 'South', 'tb.png', 11, 0, 0, 11, 0),
('NO', 'Saints', 'New Orleans', 'NFC', 'South', 'no.png', 12, 0, 0, 12, 0),
('ARI', 'Cardinals', 'Arizona', 'NFC', 'West', 'ari.png', 13, 0, 0, 13, 0),
('STL', 'Rams', 'St. Louis', 'NFC', 'West', 'stl.png', 14, 0, 0, 14, 0),
('SF', '49ers', 'San Francisco', 'NFC', 'West', 'sf.png', 15, 0, 0, 15, 0),
('SEA', 'Seahawks', 'Seattle', 'NFC', 'West', 'sea.png', 16, 0, 0, 16, 0),
('NE', 'Patriots', 'New England', 'AFC', 'East', 'ne.png', 17, 0, 0, 17, 0),
('BUF', 'Bills', 'Buffalo', 'AFC', 'East', 'buf.png', 18, 0, 0, 18, 0),
('NYJ', 'Jets', 'New York', 'AFC', 'East', 'nyj.png', 19, 0, 0, 19, 0),
('MIA', 'Dolphins', 'Miami', 'AFC', 'East', 'mia.png', 20, 0, 0, 20, 0),
('CIN', 'Bengals', 'Cincinnati', 'AFC', 'North', 'cin.png', 21, 0, 0, 21, 0),
('PIT', 'Steelers', 'Pittsburgh', 'AFC', 'North', 'pit.png', 22, 0, 0, 22, 0),
('CLE', 'Browns', 'Cleveland', 'AFC', 'North', 'cle.png', 23, 0, 0, 23, 0),
('BAL', 'Ravens', 'Baltimore', 'AFC', 'North', 'bal.png', 24, 0, 0, 24, 0),
('IND', 'Colts', 'Indianapolis', 'AFC', 'South', 'ind.png', 25, 0, 0, 25, 0),
('TEN', 'Titans', 'Tennessee', 'AFC', 'South', 'ten.png', 26, 0, 0, 26, 0),
('HOU', 'Texans', 'Houston', 'AFC', 'South', 'hou.png', 27, 0, 0, 27, 0),
('JAC', 'Jaguars', 'Jacksonville', 'AFC', 'South', 'jac.png', 28, 0, 0, 28, 0),
('DEN', 'Broncos', 'Denver', 'AFC', 'West', 'den.png', 29, 0, 0, 29, 0),
('OAK', 'Raiders', 'Oakland', 'AFC', 'West', 'oak.png', 30, 0, 0, 30, 0),
('KC', 'Chiefs', 'Kansas City', 'AFC', 'West', 'kc.png', 31, 0, 0, 31, 0),
('SD', 'Chargers', 'San Diego', 'AFC', 'West', 'sd.png', 32, 0, 0, 32, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `team` varchar(3) NOT NULL,
  `opponent` varchar(3) NOT NULL,
  `date` date NOT NULL,
  `score` varchar(50) NOT NULL,
  `scoreAgainst` varchar(50),
  `win` bool NOT NULL,
  `isHomeGame` bool NOT NUll,
  PRIMARY KEY (`team`, `date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `history` (`team`, `opponent`, `date`, `score`, `win`, `isHomeGame`) VALUES
('NYG', 'WAS', '2015-01-01', 5, true, true),
('WAS', 'NYG', '2015-01-01', 3, false, false),
('NYG', 'WAS', '2015-02-01', 15, true, false),
('WAS', 'NYG', '2015-02-01', 3, false, true),
('NYG', 'WAS', '2015-03-01', 15, true, true),
('WAS', 'NYG', '2015-03-01', 3, false, false),
('NYG', 'WAS', '2015-04-01', 12, true, false),
('WAS', 'NYG', '2015-04-01', 3, false, true),
('NYG', 'WAS', '2015-05-01', 10, true, true),
('WAS', 'NYG', '2015-05-01', 3, false, false);

-- --------------------------------------------------------