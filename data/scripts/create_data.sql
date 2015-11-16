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
  `mug` varchar(256) NULL,
  `number` int(2) NOT NULL,
  `position` varchar(2) NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `city`, `conference`, `division`, `logo`) VALUES
('DAL', 'Cowboys', 'Dallas', 'NFC', 'East', 'dal.png'),
('NYG', 'Giants', 'New York', 'NFC', 'East', 'nyg.png'),
('WAS', 'Redskins', 'Washington', 'NFC', 'East', 'was.png'),
('PHI', 'Eagles', 'Philadelphia', 'NFC', 'East', 'phi.png'),
('GB', 'Packers', 'Green Bay', 'NFC', 'North', 'gb.png'),
('MIN', 'Vikings', 'Minnesota', 'NFC', 'North', 'min.png'),
('DET', 'Lions', 'Detroit', 'NFC', 'North', 'det.png'),
('CHI', 'Bears', 'Chicago', 'NFC', 'North', 'chi.png'),
('CAR', 'Panthers', 'Carolina', 'NFC', 'South', 'car.png'),
('ATL', 'Falcons', 'Atlanta', 'NFC', 'South', 'atl.png'),
('TB', 'Buccaneers', 'Tampa Bay', 'NFC', 'South', 'tb.png'),
('NO', 'Saints', 'New Orleans', 'NFC', 'South', 'no.png'),
('ARI', 'Cardinals', 'Arizona', 'NFC', 'West', 'ari.png'),
('STL', 'Rams', 'St. Louis', 'NFC', 'West', 'stl.png'),
('SF', '49ers', 'San Francisco', 'NFC', 'West', 'sf.png'),
('SEA', 'Seahawks', 'Seattle', 'NFC', 'West', 'sea.png'),
('NE', 'Patriots', 'New England', 'AFC', 'East', 'ne.png'),
('BUF', 'Bills', 'Buffalo', 'AFC', 'East', 'buf.png'),
('NYJ', 'Jets', 'New York', 'AFC', 'East', 'nyj.png'),
('MIA', 'Dolphins', 'Miami', 'AFC', 'East', 'mia.png'),
('CIN', 'Bengals', 'Cincinnati', 'AFC', 'North', 'cin.png'),
('PIT', 'Steelers', 'Pittsburgh', 'AFC', 'North', 'pit.png'),
('CLE', 'Browns', 'Cleveland', 'AFC', 'North', 'cle.png'),
('BAL', 'Ravens', 'Baltimore', 'AFC', 'North', 'bal.png'),
('IND', 'Colts', 'Indianapolis', 'AFC', 'South', 'ind.png'),
('TEN', 'Titans', 'Tennessee', 'AFC', 'South', 'ten.png'),
('HOU', 'Texans', 'Houston', 'AFC', 'South', 'hou.png'),
('JAC', 'Jaguars', 'Jacksonville', 'AFC', 'South', 'jac.png'),
('DEN', 'Broncos', 'Denver', 'AFC', 'West', 'den.png'),
('OAK', 'Raiders', 'Oakland', 'AFC', 'West', 'oak.png'),
('KC', 'Chiefs', 'Kansas City', 'AFC', 'West', 'kc.png'),
('SD', 'Chargers', 'San Diego', 'AFC', 'West', 'sd.png');

-- --------------------------------------------------------