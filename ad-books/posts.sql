-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2016 at 09:36 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `multidl1_posts`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf16 COLLATE utf16_swedish_ci,
  `author` tinytext CHARACTER SET utf16 COLLATE utf16_swedish_ci,
  `post_date` date DEFAULT NULL,
  `additional_info` text CHARACTER SET utf16 COLLATE utf16_swedish_ci,
  `description` text CHARACTER SET utf8 COLLATE utf8_swedish_ci
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `author`, `post_date`, `additional_info`, `description`) VALUES
(1, 'Dedication', 'Dwight Stoll', '2012-01-04', NULL, 'This is a new site dedicated to multi-dimensional separations, with an emphasis on the liquid phase.  Stay tuned for content!'),
(2, 'Short Course on 2DLC at Pittcon 2013', 'Dwight Stoll', '2012-12-26', NULL, 'Profs. <a href="http://www.chem.umn.edu/groups/carr/main.html">Peter Carr</a> (University of Minnesota) and <a href="about/dwight-stoll.html">Dwight Stoll</a> (Gustavus Adolphus College) will offer a one-day short course on the theory and practice of 2DLC at Pittcon 2013 in Philadelphia. The course is intended for students of all experience levels, and with interests ranging from pharmaceutical to environmental analysis. Click <a href="http://ca.pittcon.org/Technical+Program/tpabstra13.nsf/SCoursesByCat/2B7E61B3F725674A85257A2D0011F2F3?opendocument">here</a> for more information, or email the instructors (see contact information on About page).\r\n'),
(7, 'Literature Review: Direct bioanalytical sample injection with 2D LC-MS', 'Dwight Stoll', '2013-01-16', 'Cassiano, N.; Barreiro, J.; Oliveira, R.; Cass, Q. <em>Bioanalysis</em>. <strong>2012</strong>, <em>4</em>, 2737-2756. doi: 10.4155/bio.12.226', '									<div>\r\n										This recent review <a href="http://dx.doi.org/10.4155/bio.12.226" >article</a> with 178 references is an application oriented review of papers appearing in the time period 2008-2012 describing the use of various forms of two-dimensional liquid chromatography for bioanalysis, with a focus on those applications involving mass spectrometric detection. Tables 1 and 2 primarily describe applications of heartcutting or coupled column configurations (LC-LC) involving the use of Restricted Access Media (RAM) columns, and/or Turbulent Flow Chromatography (TFC) for sample cleanup in the first column. Table 3 summarizes proteomic applications involving comprehensive 2DLC (LC x LC). The article concludes with a discussion of the capabilities of different types of mass analyzers in the context of 2DLC separations.\r\n									</div>'),
(5, 'New HILIC Book by Wiley Contains Chapter on 2D Separations Involving the HILIC Mode', 'Dwight Stoll', '2013-01-08', NULL, '									<p>\r\n										A new <a href="http://www.amazon.com/Hydrophilic-Interaction-Chromatography-Practitioners-Applications/dp/1118054172/ref=sr_1_3?ie=UTF8&amp;qid=1357662419&amp;sr=8-3&amp;keywords=HILIC">book</a> (Hydrophilic Interaction Chromatography: A Practitioner&#8217;s Guide) by Wiley on various aspects of the increasingly popular Hydrophilic Interaction Liquid Chromatography (HILIC) contains a chapter (Chapter 9) focused on theoretical and practical aspects of 2D separations involving the HILIC mode in at least one of the dimensions. This book is currently available for pre-order on Amazon.com, and is supposed to be available in print in February of 2013.\r\n									</p>'),
(6, 'Literature Review: Analysis of fatty alcohol derivatives with comprehensive two-dimensional liquid chromatography coupled with mass spectrometry', 'Dwight Stoll', '2013-01-08', 'Elsner, V.; Laun, S.; Melchior, D.; K?hler, M.; Schmitz, O. J. <em>Journal of Chromatography A</em>. <strong>2012</strong>, <em>1268</em>, 22-28.', '								<p>\r\n										<span style="text-align: justify;">This </span><a style="text-align: justify;" href="http://linkinghub.elsevier.com/retrieve/pii/S0021967312014847" >article</a><span style="text-align: justify;"> describes the use of online LC x LC coupled with mass spectrometric detection for the analysis of anionic, non-ionic, and amphoteric surfactants with with different end groups in a single analysis. A HILIC separation is used in the first dimension followed by a reversed-phases separation in the second dimension. With this combination of phases, separation in the first dimension is based primarily on the degree of ethoxylation, whereas separation in the second dimension is based primarily on surfactant chain length. Modern HPLC components are used and the performance of two different systems composed of different components is compared. The interface between the two separation dimensions is a standard 10-port, 2-position valve.</span>\r\n									</p>\r\n									<div style="text-align: justify;">\r\n										Figures 7 and 8 are beautiful examples of separations with a high degree of orthogonality, and good separation performance in both dimensions. Unfortunately, no estimates of peak capacities of the separations are mentioned. Nevertheless, over 100 surfactant species are identified in separations of standard mixtures. The authors suggest that next steps should involve the analysis of these surfactants in commercial formulations such as cleaning agents.\r\n									</div>'),
(3, 'Literature Review - Ultrahigh pressure in the second dimension of a comprehensive two-dimensional liquid chromatographic system for carotenoid separation in red chili peppers', 'Steve Groskreutz', '2012-12-27', 'Cacciola, F.; Donato, P.; Giuffrida, D.; Torre, G.; Dugo, P.; Mondello, L. <em>Journal of Chromatography A</em><strong>2012</strong>, <em>1255</em>, 244-251.', '									<p>\r\n										This paper is focused on the separation and identification of intact carotenoids in red chili pepper extracts by NP x RP. A micro-bore cyano<sup>1</sup>D column, dimensions 25 cm x 1.0 mm i.d., 5 ?m d<sub>p</sub>, was paired with a 3 cm x 4.6 mm i.d., 2.7 ?m d<sub>p</sub> superficially porous C18 <sup>2</sup>D column. The motivation for this work was the application of ultrahigh pressure conditions to the second dimension separation as a means to increase overall analysis peak capacity.\r\n									</p>\r\n									<p>\r\n										To demonstrate the advantage of UHPLC in the second dimension, a total of three instrumental conditions were evaluated: 1) conventional NP x RP with a modulation time of 1.0 min, 2) NP x UPHLC- RP, with a modulation time of 1.5 min, and 3) NP x UPHLC- RP, modulation time 1.0 min. In the UHPLC separations column length was doubled to 6 cm by serially coupling two 3 cm columns. Each of these instruments was operated with identical 110 min linear <sup>1</sup>D gradients providing a <sup>1</sup>n<sub>c</sub> of 45. Overall peak capacity values were calculated for each system, corrected for undersampling, and determined to be 526 for the NP x RP, t<sub>m</sub> = 1.0 min, and 373 for the NP x RP (UHPLC), t<sub>m</sub> = 1.5 and 636 for the NP x RP (UHPLC) system with a 1.0 min t<sub>m</sub>.\r\n									</p>\r\n									<p>\r\n										Despite the doubling of the <sup>2</sup>D column length, with respect to the ?conventional? NP x RP set-up, the peak capacity of the 1.5 min modulation time separations were greatly reduced by undersampling. The authors indicate that a lot of work needs to be done to optimize this separation and reduce the detrimental effect of undersampling.\r\n									</p>\r\n									<p>\r\n										The authors also report this to be the first work incorporating UHPLC conditions in the <span style="font-size: 14px;">second dimension</span> and the use of a C18 column with 2.7 ?m SPPs.\r\n									</p>'),
(4, 'Literature Review - Comparison of orthogonally estimation methods for the two-dimensional separations of peptides', 'Dwight Stoll', '2012-12-27', 'Gilar, M.; Fridrich, J.; Schure, M. R.; Jaworski, A. <em>Analytical Chemistry</em><strong>2012</strong>, <em>84</em>, 8722-8732.', '									<p>\r\n										In this recent paper the metrics used to calculate orthogonality in LC x LC were evaluated using retention data for 194 different peptides. Correlation coefficients, mutual information, box-counting dimensionality, and surface fractional coverage were all applied to determine the orthogonality of the peptide separations. In addition, six simulated data sets were used to determine how applicable each metric was at determining LC x LC orthogonality in other types of highly correlated separations, i.e., bananagrams.\r\n									</p>\r\n									<p>\r\n										The statistical metrics corresponding to the surface coverage method were found to be the most useful and understandable for the sample sets typically seen in practice. The Gilar, convex hull, and dimensionality box counting surface coverage methods were found to be intuitively easy to understand, but the degree of orthogonality was determined to be highly dependent on the discretization (i.e., binning) of the separation space and susceptible to overestimates due to outliers.\r\n									</p>\r\n									<p>\r\n										The authors advocate the use of the surface coverage method for determining orthogonality because of its usefulness in calculating the achievable peak capacity of the separation (see equation 2). It is still unclear which of the surface coverage methods correlates best with the overall performance of real separations.\r\n									</p>'),
(8, 'Paper on Selective Comprehensive 2DLC with Parallel Operations Appears in Analytical and Bioanalytical Chemistry', 'Dwight Stoll', '2013-02-20', NULL, '									<p>\r\n										A <a href="http://dx.doi.org/10.1007/s00216-013-6758-8">research paper</a> by Gustavus chemistry assistant professor Dwight Stoll, Gustavus students Elliot Larson (''14), Ian Gibbs-Hall (''13), Steve Groskreutz (''12), research associate Dr. Chris Harmes, and several collaborators has appeared in a special issue on the analysis of nutraceuticals in the journal<em>Analytical and Bioanalytical Chemistry</em>. The paper, focused on the analysis of furanocoumarins in vegetables, describes the implementation of a novel approach to selective comprehensive two-dimensional liquid chromatography where the operations of first dimension sampling and second dimension separation are carried out in parallel.\r\n									</p>'),
(9, 'Short courses on two-dimensional chromatography at Pittcon 2015', 'Dwight Stoll', '2014-09-25', NULL, '								<p>\r\n										At Pittcon 2015 there will be three courses offered in the area of two-dimensional chromatography. First, a one-day<a href="https://ca.pittcon.org/Technical+Program/tpabstra15.nsf/SCoursesByCat/79258623C93F50E885257D0700694CFC?opendocument" > overview course</a> on two-dimensional liquid chromatography (2D-LC) will be taught by Dr. Dwight Stoll (Gustavus Adolphus College) and Dr. Peter Carr (University of Minnesota). Second, a one-day course focused on the use of <a href="https://ca.pittcon.org/Technical+Program/tpabstra15.nsf/SCoursesByCat/300D7C0D8E4CF9DC85257D07006B13E1?opendocument" >2D-LC in pharmaceutical analysis</a> will be taught by Dr. Dwight Stoll and Dr. Kelly Zhang (Genentech). Finally, a one-day course on the use of tools for the <a href="https://ca.pittcon.org/Technical+Program/tpabstra15.nsf/SCoursesByCat/63CAEBF8F0671D6785257D2300708D68?opendocument" >analysis of two-dimensional datasets</a> from 2D-LC and 2D-GC will be taught by Dr. Steve Reichenbach.\r\n									</p>'),
(10, 'Short courses on 2D-LC at Pittcon 2016', 'Dwight Stoll', '2016-02-06', NULL, '									<p>\r\n										This year Pittcon will offer two short courses on 2D-LC.\r\n									</p>\r\n									<p>\r\n										The first course (<a href="https://ca.pittcon.org/Technical+Program/tpabstra16.nsf/SCoursesByCat/44E8AB990453518885257E77005D9761?opendocument" >Introduction to two-dimensional liquid chromatography</a>) will be general in scope, taught by Dwight Stoll and Peter Carr, for the full day of Saturday, March 5th.\r\n									</p>\r\n									<p>\r\n										The second course (<a href="https://ca.pittcon.org/Technical+Program/tpabstra16.nsf/SCoursesByCat/269EF93732379EB485257E77005DC8EC?opendocument" >Two-dimensional liquid chromatography for pharmaceutical analysis</a>) will be focused on small and large molecule pharmaceutical analysis, taught by Dwight Stoll and Kelly Zhang, for a half-day on Sunday, March 6th.\r\n									</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
