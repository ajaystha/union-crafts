-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2008 at 11:10 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `unioncra_unioncra`
--
CREATE DATABASE `unioncra_unioncra` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `unioncra_unioncra`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(12) NOT NULL auto_increment,
  `cat_name` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  PRIMARY KEY  (`category_id`),
  UNIQUE KEY `category_id` (`category_id`),
  KEY `category_id_2` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `cat_name`, `description`) VALUES
(17, 'Necklaces & Beads', 'Necklaces and Beads '),
(18, 'Bangles', ''),
(2, 'Masks', ''),
(3, 'Paper Products', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><FONT face="Verdana, Arial, Helvetica, sans-serif">This unique paper comes to you from an ancient tradition of Nepal paper making, using no chemicals, pounded with hand, washed in Himalayan springs, and dried in the sun. It is made entirely of plant materials specifically the Lokta plant, which grows in the altitude between 7000 to 9000ft. Unlike wood pulp, which requires many acres of land, Lokta plants are simply pruned every year for paper production. Hence it is environmentally friendly.</FONT></P>'),
(15, 'Metal Crafts', ''),
(10, 'Pipes', '<P>The Mask was simply one of the most hilarious movies in Hollywood. The Mask was simply one of the most hilarious movies in Hollywood. The Mask was simply one of the most hilarious movies in Hollywood. </P>'),
(9, 'Silverware', 'The silverware products are quite popular among middle aged womans round the world. ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE IF NOT EXISTS `tbl_faq` (
  `faq_id` int(12) NOT NULL auto_increment,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY  (`faq_id`),
  UNIQUE KEY `faq_id` (`faq_id`),
  KEY `faq_id_2` (`faq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `question`, `answer`) VALUES
(1, 'FAQs in detail--==>> coming soon!', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_updated`
--

CREATE TABLE IF NOT EXISTS `tbl_last_updated` (
  `id` int(12) NOT NULL auto_increment,
  `date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_last_updated`
--

INSERT INTO `tbl_last_updated` (`id`, `date`) VALUES
(1, '2007-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(12) NOT NULL auto_increment,
  `news_posted_on` date NOT NULL default '0000-00-00',
  `news_in_detail` text NOT NULL,
  PRIMARY KEY  (`news_id`),
  UNIQUE KEY `news_id` (`news_id`),
  KEY `news_id_2` (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_posted_on`, `news_in_detail`) VALUES
(9, '2005-08-25', '<P><STRONG>Volunter Nepal </STRONG>-&nbsp;Partner in Promotion for a social and&nbsp;noble cause with <STRONG>Unioncrafts.com!</STRONG></P>\r\n<P>VOLUNTEER NEPAL, National Group is a community-based organization, non-profit organization without any Political or religious affiliation and registered in Chief District Administration Office Kathmandu. It co-ordinates local and international work camps with community groups or institutions in need of voluntary labor or service to empower community self-help initiatives.</P>\r\n<P>Our objective is to co-ordinate socio-cultural interaction between people of diverse background by creating&nbsp; opportunities for both local and international volunteers to exchange their experience and skills.</P>\r\n<P>We are also running different volunteer programs in Nepal. We offers year round volunteer program in the areas of Teaching English, orphanage, Internship in Medical and Newspaper, Conservation Work, Conduct Short term Training, Conference, Workshop, Other Community Development Program etc... </P>\r\n<P>To develop linkages with similar institutions and networks in the country and internationally to effectively achieve the aims and objectives.</P>\r\n<P>To organize training programs for furthering development of skills and knowledge of trainers and practitioners as and when needed, especially when such trainings are not already being offered or can not be offered by any one member institution or individual and when such trainings and workshops will strengthen and bring synergy among members. </P>\r\n<P><EM>For more details, contact: -</EM></P>\r\n<P><STRONG>Mr Anish Neupane<BR>Volunteer Nepal National Group</STRONG><BR>P.B.N. 10210 Kathmandu<BR>Nepal<BR>Telephone: +977-1-6613724<BR>Email: <A href="mailto:info@volnepal.np.org">info@volnepal.np.org</A><BR><A href="http://www.volnepal.np.org">www.volnepal.np.org</A></P>'),
(4, '2005-08-01', '<P><STRONG>Soft-Launch!</STRONG></P>\r\n<P>Namaste! And Welcome to <STRONG><A href="http://www.unioncrafts.com">UnionCrafts.com</A></STRONG>! </P>\r\n<P><EM>A one-stop solution website to find various handicraft products of Nepal. Please browse through the website, and feel free to contact us for any further information you would like to have about the products listed on our website. </EM></P>\r\n<P><EM>Happy surfing &amp; shopping!</EM></P>\r\n<P><EM>Unioncrafts.com Team</EM></P>'),
(5, '2005-08-05', '<P><STRONG>Hotel Nepa International</STRONG>&nbsp;- Partner in Promotion with&nbsp;<STRONG>UnionCrafts.com!</STRONG></P>\r\n<P>Hotel Nepa International conveniently located within a secure compound at Jyatha, the junction of Thamel and Kantipath offers you an ideal base from where you can explore the cultural splendor of the Kathmandu Valley. We bring you within the walking distance of major attractions - The Royal Palace, the pulsating tourist hub of Thamel, the colorful Asan Bazaar, historic Kathmandu Durbar Square and New Road area, a shopping heaven.</P>\r\n<P>The design of the Hotel is the result of a delightful combination of eco-friendly modern engineering concepts along with traditional Newari elements and classical architectural theme or ‘Vaastukala’; thus creating a visually appreciable design. It is the only hotel around Jyatha Kantipath area with an emergency fire escape.</P>\r\n<P>The Hotel offers 30 spacious standard and deluxe guest rooms with telephone, color TV and private bath with 24 hours running hot and cold water.<BR></P>\r\n<P>Contact Information:-</P>\r\n<P><STRONG>Hotel Nepa International <BR></STRONG>150 Jyatha Marg, Kantipath<BR>Kathmandu, Nepal<BR>Tel: 977-1-4251368, 4251369, Fax: 977-1-4256306<BR>Email: <A href="mailto:nepa@info.com.np">nepa@info.com.np</A>, <A href="mailto:info@hotelnepa.com">info@hotelnepa.com</A><BR>URL: <A href="http://www.hotelnepa.com">www.hotelnepa.com</A>, <A href="http://www.hotelnepaintl.com">www.hotelnepaintl.com</A></P>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(12) NOT NULL auto_increment,
  `category_id` int(12) NOT NULL default '0',
  `product_name` varchar(255) NOT NULL default '',
  `prod_key` varchar(20) NOT NULL default '',
  `product_description` text NOT NULL,
  `single_unit_price` varchar(255) NOT NULL default '',
  `bulk_unit_price` varchar(255) NOT NULL default '',
  `min_bulk_order` int(10) NOT NULL default '0',
  `unit` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`product_id`),
  UNIQUE KEY `product_id` (`product_id`),
  KEY `product_id_2` (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=203 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `prod_key`, `product_description`, `single_unit_price`, `bulk_unit_price`, `min_bulk_order`, `unit`) VALUES
(32, 9, 'Silver Chain', 'SL018', 'Silver Snake Chain', '25', '16', 25, 'pcs'),
(30, 9, 'Silver Bangle', 'SL016', '<P>Silver Bangle with Garnet</P>', '20', '10', 25, 'pcs'),
(31, 9, 'Silver Bracelet', 'SL017', '<P>Silver Bracelet with Five Turquoise and Four Corals</P>', '25', '16', 25, 'pcs'),
(27, 9, 'Silver Bracelet', 'SL014', 'Silver Beads Bracelet with coral and lapis beads in between.', '30', '20', 25, 'Pcs'),
(28, 9, 'Silver Bracelet', 'SL015', 'Silver Bracelet with Nine Black Onyx', '25', '16', 25, 'pcs'),
(25, 9, 'Silver Bangle', 'SL012', 'Silver Bangle with Turquoise and Two Corals', '25', '15', 25, 'pcs'),
(26, 9, 'Silver Bracelet', 'SL013', 'Silver Beads Bracelet&nbsp;with&nbsp;coral beads in between. ', '30', '20', 25, 'Pcs'),
(23, 9, 'Silver Bracelet', 'SL010', '<P>Silver Bracelet with Turquoise and Two Red Corals.</P>', '25', '15', 25, 'pcs'),
(24, 9, 'Silver Bangle', 'SL011', 'Silver Bangle with carving', '20', '10', 25, 'pcs'),
(21, 9, 'Silver Bracelet', 'SL008', 'Silver Bracelet chain', '30', '20', 25, 'pcs'),
(22, 9, 'Silver Bracelet', 'SL009', 'Silver Bracelet with Twelve Black Onyx, especially made for the ladies.', '25', '15', 25, 'pcs'),
(19, 9, 'Silver Bracelet', 'SL006', 'Silver Bracelet&nbsp;with Ten Amethyst stones', '25', '15', 25, 'pcs'),
(20, 9, 'Silver Bangle', 'SL007', 'Silver Bangle with Turquoise', '20', '10', 25, 'pcs'),
(17, 9, 'Silver Bracelet', 'SL004', '<P>Silver Bracelet with Turquoise</P>', '25', '15', 25, 'Pcs'),
(18, 9, 'Silver Bracelet', 'SL005', 'Silver Bracelet with Six Stones Turquoise', '25', '15', 25, 'Pcs'),
(16, 9, 'Silver Bracelet', 'SL058', '<P>Silver Bracelet with different stones</P>', '25', '16', 25, 'pcs'),
(14, 9, 'Silver Bracelet', 'SL002', 'Silver Bracelet with Turquoise ', '25', '15', 25, 'Pcs'),
(15, 9, 'Silver Ring', 'SL003', 'Silver&nbsp;Ring with Amethyst ', '10', '5', 50, 'Pcs'),
(13, 9, 'Silver Bracelet', 'SL001', 'Silver Bracelet with Red Onyx ', '25', '15', 25, 'Pcs'),
(33, 9, 'Silver Chain', 'SL019', 'Silver Flat Chain', '25', '16', 25, 'pcs'),
(34, 9, 'Silver Pendant', 'SL020', 'Silver Dolphins Pendant with Garnet', '25', '16', 25, 'pcs'),
(35, 9, 'Silver Hairclip', 'SL021', 'Silver Hairclip with Turquoise', '25', '15', 25, 'pcs'),
(36, 9, 'Silver Hairclip', 'SL022', 'Silver Dolphins Hairclip with Two Corals', '25', '15', 25, 'pcs'),
(37, 9, 'Silver Hairclip', 'SL023', 'Silver Hairclip with Turquoise and Corals', '35', '25', 25, 'pcs'),
(39, 9, 'Hair Clip', 'SL024', 'SL024', '', '', 0, 'kgs'),
(40, 9, 'Necklace', 'SL025', 'Necklace', '', '', 0, 'kgs'),
(41, 9, 'blue necklace', 'SL026', 'blue necklace', '', '', 0, 'ksgs'),
(42, 9, 'green torquoise', 'SL027', 'green torquoise', '', '', 0, 'kgs'),
(43, 9, '5 stones', 'SL028', '5 stones', '', '', 0, 'kgs'),
(44, 9, 'Red Locket', 'SL029', 'Red Locket', '', '', 0, 'pcs'),
(45, 9, 'Round Locket', 'SL030', 'Round Locket', '', '', 0, 'pcs'),
(46, 9, 'black centered', 'SL031', 'black centered', '', '', 0, 'bundle'),
(47, 9, 'maroon Centered', 'SL032', 'maroon Centered', '', '', 0, 'kgs'),
(48, 9, 'Christ', 'SL033', 'Christ', '', '', 0, 'kgs'),
(49, 9, 'ROunded Locket', 'SL034', 'ROunded Locket', '', '', 0, 'kgs'),
(50, 9, 'Green Teeth', 'SL035', '<STRONG>Green Teeth</STRONG><STRONG></STRONG>', '', '', 0, 'kgs'),
(51, 9, 'Spider', 'SL036', 'Spider', '', '', 100, 'kgs'),
(53, 9, 'silver 37', 'SL037', 'silver 37', '', '', 0, 'kgs'),
(55, 9, 'Dolphin Locket', 'SL038', 'Dolphin Locket ', '', '', 0, 'pcs'),
(56, 9, 'Silver 39', 'SL039', 'Silver 39', '', '', 100, 'kgs'),
(57, 9, 'Blue Cross', 'SL040', 'Blue Cross', '', '', 0, 'kgs'),
(58, 9, 'Green Locket', 'SL041', 'Green Locket', '', '', 100, 'kgs'),
(59, 9, 'Rounded locket with turquoise', 'SL042', 'Rounded locket with turquoise', '', '', 0, 'khs'),
(60, 9, 'Red Ring', 'SL043', 'Red Ring', '', '', 0, 'kgs'),
(61, 9, 'Rounded Ring (green)', 'SL044', 'Rounded Ring (green)', '', '', 0, 'kgs'),
(62, 9, 'Topaz Ring', 'SL045', 'Topaz Ring', '', '', 0, 'kgs'),
(63, 9, 'Green ring', 'SL046', 'Green ring', '', '', 0, 'KGS'),
(64, 9, 'Turquoise Ring', 'SL047', 'Turquoise Ring', '', '', 0, 'kgs'),
(65, 9, 'Red Ring', 'SL048', 'Red Ring', '', '', 0, ''),
(66, 9, 'Plain Ring', 'SL049', 'Plain Ring', '', '', 0, ''),
(67, 9, 'Browned Ring', 'SL050', 'Browned Ring', '', '', 0, ''),
(68, 9, 'Red Ring', 'SL051', 'Red Ring', '', '', 0, ''),
(69, 9, 'Long Red ring', 'SL052', 'Long Red ring', '', '', 0, ''),
(71, 9, 'Long red', 'SL053', 'Long red', '', '', 0, ''),
(72, 9, 'Three stoned ring', 'SL054', 'Three stoned ring', '', '', 0, ''),
(73, 9, '5 stoned ring', 'SL055', '5 stoned ring', '', '', 0, ''),
(74, 9, 'Red with flower ring', 'SL056', 'Red with flower ring', '', '', 0, ''),
(75, 9, 'Browny', 'SL057', 'Browny', '', '', 0, ''),
(76, 9, 'Plain round ring', 'SL059', 'Plain round ring', '', '', 0, ''),
(77, 18, 'White metal bangles', 'Bangles1', '<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: ''Times New Roman''; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA"><FONT face="Verdana, Arial, Helvetica, sans-serif" size=2>White metal bangle with three stones.</FONT></SPAN> ', '2.25', 'Please contact us!', 0, 'pcs'),
(78, 18, 'Copper bangles', 'Bangles 15', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Copper bangle. It is useful for people having blood pressure problems – high and low -&nbsp;since these bangles help to control blood pressure. </SPAN>', '2.00', 'Please contact us!', 0, 'pcs'),
(79, 18, 'White metal bangle', 'Bangles 14', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">White metal bangle with Tibetan letters and stone.&nbsp;Size: 17.5cm X 1.5cm. </SPAN>', '2.00', 'Please contact us!', 0, 'pcs'),
(80, 18, 'White metal bangles', 'Bangles 2', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">White metal bangle with 7 stones. </SPAN>', '3.00', 'Please contact us!', 0, 'pcs'),
(81, 18, 'White Metal Bangles', 'Bangles 13', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">White metal bangles with Tibetan letters.</SPAN>', '4.00', 'Please contact us!', 0, 'pcs'),
(82, 18, 'White metal bangles', 'Bangles 12', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">White metal bangle with one stone, net design</SPAN> ', '3.00', 'Please contact us!', 0, 'pcs'),
(83, 18, 'Copper bangles', 'Bangles 11', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Copper bangle. It is useful for people having blood pressure problems – high and low - since these bangles help to control blood pressure.</SPAN> ', '3.00', 'Please contact us!', 0, 'pcs'),
(84, 18, 'White metal bangles', 'Bangles 16', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">White metal bangle with stone. Size: 17cm X 3.5cm.</SPAN> ', '4.00', 'Please contact us!', 0, 'pcs'),
(85, 18, 'White metal bangles', 'Bangles 3', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">White metal bangle.&nbsp;Size: 17cm X 1cm. </SPAN>', '2.00', 'Please contact us!', 0, 'pcs'),
(86, 18, 'White metal bangles', 'Bangles 4', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">White metal bangle with Tibetan letters in mixed designs. Size: 18cm X 2.5cm.</SPAN> ', '3.00', 'Please contact us!', 0, 'pcs'),
(87, 18, 'Copper bangles', 'Bangles 5', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Copper bangle with Tibetan letters and stone. Size:17cm X 1cm</SPAN> ', '2.00', 'Please contact us!', 0, 'pcs'),
(88, 18, 'White metal bangles', 'Bangles 6', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">White metal bangle. Size: 18cm&nbsp;X 2.5cm. </SPAN>', '3.00', 'Please contact us!', 0, 'pcs'),
(89, 18, 'White metal bangles', 'Bangles 7', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">White metal bangle. Size 17.5cm X 5.5cm. </SPAN>', '4.00', 'Please contact us!', 0, 'pcs'),
(90, 18, 'White metal bangles', 'Bangles 8', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">White metal bangle with stone.&nbsp;Size 18cm X 2.5cm.</SPAN> ', '4.00', 'Please contact us!', 0, 'pcs'),
(91, 18, 'Bangles 9', 'Bangles 9', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">White metal bangle with stone. Size 17.5cm X 5.5cm.</SPAN>', '5.00', 'Please contact us!', 0, 'pcs'),
(92, 18, 'Bangles 10', 'Bangles 10', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Copper bangle. It is useful for people having blood pressure problems – high and low - since these bangles help to control blood pressure. </SPAN>', '2.00', 'Please contact us!', 0, 'pcs'),
(93, 2, 'Mask01', 'Mask01', '<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: ''Times New Roman''; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Wooden mask. Size: 12inches X 9inches. </SPAN>', '4.00', 'Please contact us!', 0, 'pcs'),
(94, 2, 'Mask02', 'Mask02', '<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: ''Times New Roman''; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Wooden mask of the Singha, the lion. Size: 17inches X 10inches. </SPAN>', '12.00', 'Please contact us!', 0, 'pcs'),
(95, 2, 'Mask03', 'Mask03', 'Wooden Mask of Lord Bhairab. Size: 21inches X 14inches ', '4.00', 'Please contact us!', 0, 'pcs'),
(96, 2, 'Mask04', 'Mask04', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of Lord Buddha. Size: 22inches X15 inches.</SPAN> ', '16.00', 'Please contact us!', 0, 'pcs'),
(97, 2, 'Mask05', 'Mask05', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of bird’s beak. Size: 20inches X 4 inches </SPAN></P>', '4.00', 'Please contact us!', 0, 'pcs'),
(98, 2, 'Mask06A', 'Mask06A', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of old sage “Rishimuni”. Size: 20inches X4 inches. </SPAN></P>', '4.00', 'Please contact us!', 0, 'pcs'),
(99, 2, 'Mask06B', 'Mask06B', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of old sage “Rishimuni”. Size: 20inches X 4inches. </SPAN></P>', '4.00', 'Please contact us!', 0, 'pcs'),
(100, 2, 'Mask07', 'Mask07', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of the Garuda with golden and silver painting. Size: 10inches X 6inches. </SPAN></P>', '5.00', 'Please contact us!', 0, 'pcs'),
(101, 2, 'Mask08', 'Mask08', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask. Size: 12inches X 5inches. </SPAN></P>', '5.00', 'Please contact us!', 0, 'pcs'),
(102, 2, 'Mask09', 'Mask09', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">20 years old wooden mask of Lord Ganesha. Size: 15inches X 9inches.</SPAN></P>', '42.00', 'Please contact us!', 0, 'pcs'),
(103, 2, 'Mask10', 'Mask10', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask. Size: 12inches X 9inches. </SPAN></P>', '14.00', 'Please contact us!', 0, 'pcs'),
(104, 2, 'Mask13', 'Mask13', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Double wooden mask. Size: 24inches X 12inches. </SPAN></P>', '38.00', 'Please contact us!', 0, 'pcs'),
(105, 2, 'Mask14', 'Mask14', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of&nbsp;Lord Buddha. Size: 12inches X 8inches. </SPAN></P>', '5.00', 'Please contact us!', 0, 'pcs'),
(106, 2, 'Mask15', 'Mask15', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of the Sun God. Size: 10inches X 10inches. </SPAN></P>', '5.00', 'Please contact us!', 0, 'pcs'),
(107, 2, 'Mask16', 'Mask16', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of an old man. Size: 12inches X 10inches. </SPAN></P>', '5.00', 'Please contact us!', 0, 'pcs'),
(108, 2, 'Mask17', 'Mask17', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask. Size:&nbsp;23inches X 6inches. </SPAN></P>', '50.00', 'Please contact us!', 0, 'pcs'),
(109, 2, 'Mask18', 'Mask18', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of an old man. Size: 12inches X 6inches. </SPAN></P>', '5.00', 'Please contact us!', 0, 'pcs'),
(110, 2, 'Mask19', 'Mask19', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of Lord Buddha with crown. Size: 10inches X 8inches. </SPAN></P>', '4.00', 'Please contact us!', 0, 'pcs'),
(111, 2, 'Mask20', 'Mask20', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of the Ganesha without painting. Size: 9inches X 6inches. </SPAN></P>', '5.00', 'Please contact us!', 0, 'pcs'),
(112, 2, 'Mask21', 'Mask21', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of the Garuda. Size: 15inches X 11inches. </SPAN></P>', '10.00', 'Please contact us!', 0, 'pcs'),
(113, 2, 'Mask22', 'Mask22', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of the elephant trunk. Size: 11inches X 7inches.</SPAN></P>', '5.00', 'Please contact us!', 0, 'pcs'),
(114, 2, 'Mask24', 'Mask24', '<SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Wooden mask of the Bhairab, with old painting. Size: 18inches X 14inches. </SPAN>', '29.00', 'Please contact us!', 0, 'pcs'),
(115, 2, 'Mask25', 'Mask25', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Painted mask of handmade nepali Lokta paper of the Buddha. Size: 12inches X 9inches. </SPAN></P>', '5.00', 'Please contact us!', 0, 'pcs'),
(118, 2, 'Mask26', 'Mask26', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA; mso-bidi-font-family: ''Times New Roman''">Ceramic mask with nepali-style painting. Size: 12inches X 9inches. </SPAN></P>', '6.00', 'Please contact us!', 0, 'pcs'),
(119, 15, 'Shakyamuni Buddha', 'Metal2', '<SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: ''Times New Roman''; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">\r\n<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Shakyamuni Buddha made up of copper with gold painting. Size: 5, 6, 8inches. </SPAN></SPAN></P>', '28.00, 42.00, 64.00', 'Please contact us!', 0, 'pcs'),
(120, 15, 'Tara (White)', 'Metal3', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><?xml:namespace prefix = st1 ns = "urn:schemas-microsoft-com:office:smarttags" /><st1:place w:st="on"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Tara</SPAN></st1:place><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA"> (White) made up of copper with gold painting. Size: 4, 5, 6inches. </SPAN></P>', '28.00, 42.00, 64.00', 'Please contact us!', 0, 'pcs'),
(121, 15, 'Tara (Green)', 'Metal4', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Tara (Green) made up of copper with gold painting. Size: 4, 5, 6inches. </SPAN></P>', '28.00, 42.00, 64.00', 'Please contact us!', 0, 'pcs'),
(122, 15, 'Ganesh', 'Metal5', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Lord Ganesh made up of copper with gold painting. Size: &nbsp;6inches. </SPAN></P>', '42.00', 'Please contact us!', 0, 'pcs'),
(124, 15, 'Aparmita', 'Metal6', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Aparmita made up of copper with gold painting. Size:&nbsp;5, 6, 8inches. </SPAN></P>', '28.00, 42.00, 64.00', 'Please contact us!', 0, 'pcs'),
(125, 15, 'Manjushree', 'Metal7', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Manjushree made up of copper with gold painting. Size: 4, 6, 8inches. </SPAN></P>', '21.00, 35.00, 50.00', 'Please contact us!', 0, 'pcs'),
(126, 15, 'Naag Kanya', 'Metal8', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Nagkanya or “Snakelady” made up of copper with gold painting. Size: 5, 6, 8inches. </SPAN></P>', '28.00, 42.00, 64.00', 'Please contact us!', 0, 'pcs'),
(127, 15, 'Maitreya Buddha', 'Metal9', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Maitreya Buddha made up of copper with gold painting. Size: 6, 8inches.</SPAN></P>', '42.00, 64.00', 'Please contact us!', 0, 'pcs'),
(134, 15, 'Prayer Wheel', 'MetalAA-13', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Prayer wheel with stand made up of copper and brass with mixed designs. Size: small, medium, large. </SPAN></P>', '3.00, 9.00, 18.00', 'Please contact us!', 0, 'pcs'),
(132, 15, 'Bajra', 'MetalAA-2', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Double Dorjee or Bishwa Bajra made up of copper and brass with Nepali carving. Size 7inches X 7inches.</SPAN></P>', '31.00', 'Please contact us!', 0, 'pcs'),
(133, 15, 'Bajra', 'MetalAA- 4', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Bajra/Dorjee made up of copper and brass with Nepali carving. Size: 6, 7, 8inches. </SPAN></P>', '3.00, 7.00, 14.00', 'Please contact us!', 0, 'pcs'),
(135, 15, 'Prayer Wheel', 'MetalAA-14', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Prayer wheel with stand made up of copper and brass with mixed designs. Size: small, medium, large. </SPAN></P>', '3.00, 9.00, 18.00', 'Please contact us!', 0, 'pcs'),
(136, 15, 'Prayer Wheel', 'MetalAA-16', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">White metal prayer wheel “mane” filigiri work. Size: small, medium, large. </SPAN></P>', '5.00, 8.00, 12.00', 'Please contact us!', 0, 'pcs'),
(137, 15, 'Prayer Wheel', 'MetalAA-17', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">White metal prayer wheel “mane” made up with brass and copper. </SPAN></P>', '12.00', 'Please contact us!', 0, 'pcs'),
(138, 15, 'Incense Holder', 'MetalAA- 28', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Incense holder made up of copper and brass. Size: 9inches.</SPAN></P>', '3.50', 'Please contact us!', 0, 'pcs'),
(139, 15, 'Incense Holder', 'MetalAA- 29', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Incense holder made up of copper, brass &amp; white metal. Size: 9inches</SPAN></P>', '4.00', 'Please contact us!', 0, 'pcs'),
(140, 15, 'Incense Burner', 'MetalAA- 35', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Incense burner made up of copper and brass with Nepali carving. </SPAN></P>', '8.00', 'Please contact us!', 0, 'pcs'),
(141, 15, 'Incense Burner', 'MetalAA- 39', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Incense burner made up of copper and brass with Nepali carving. </SPAN></P>', '10.00', 'Please contact us!', 0, 'pcs'),
(142, 15, 'Incense Burner', 'MetalAA- 44', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Incense burner with candle stand. Made up of copper and brass. </SPAN></P>', '10.00', 'Please contact us!', 0, 'pcs'),
(143, 15, 'Singing Bowl', 'MetalAA-53', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Plain singing bowl. Size: 4inches. Made up of brass or bronze.</SPAN></P>', '15.00, 13.00', 'Please contact us!', 0, 'pcs'),
(144, 15, 'Singing Bowl', 'MetalAA-54', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Singing bowl with handmade designs. Size 5”. Made up of brass &amp; bronze.</SPAN></P>', '15.00, 13.00', 'Please contact us!', 0, 'pcs'),
(145, 15, 'Singing Bowl', 'MetalAA- 55', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Singing bowl with handmade designs. Size: 5.5inches. Made up of brass or bronze.</SPAN></P>', '15.00, 13.00', 'Please contact us!', 0, 'pcs'),
(146, 15, 'Singing Bowl', 'MetalAA-56', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Singing bowl with handmade designs. Size: 4inches. Made up of brass or bronze.</SPAN></P>', '15.00, 13.00', 'Please contact us!', 0, 'pcs'),
(147, 15, 'Bell & Bajra', 'MetalAA-60', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Bronze and brass bell &amp; bajra. Sizes available in&nbsp;large, medium and small. </SPAN></P>', '9.00, 6.00, 5.00', 'Please contact us!', 0, 'pcs'),
(148, 15, 'Trumpet', 'MetalAA-62', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Copper and brass trumpet. Size: 3, 4, 5, 6, 8, 10, 12 feet.</SPAN></P>', '10.00, 20.00, 30.00, 50.00, 64.00, 78.00, 100.00', 'Please contact us!', 0, 'pcs'),
(149, 10, 'Smoking Pipes', 'Pipe0001', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Made of Abony Wood, plain design, mini pipe in black and&nbsp;brown colours. Size: 3inches.</SPAN></P>\r\n<P><SPAN style="FONT-SIZE: 12pt; FONT-FAMILY: ''Times New Roman''; mso-fareast-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA"></SPAN>&nbsp;</P>', '0.65', 'Please contact us!', 0, 'pcs'),
(150, 10, 'Smoking Pipes', 'Pipe0002', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Made of Abony Wood, carved designs, black &amp; brown colour , 2 in 1 pipe available in different sizes – 4,5,6,8,14 inches. Please take note that prices vary according to&nbsp;the size.</SPAN></P>', '0.60, 0.75, 1.00, 2.00, 5.00', 'Please contact us!', 0, 'pcs'),
(151, 10, 'Smoking Pipes', 'Pipe0003', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Made of Abony Wood, carved design, black &amp; brown colour, single system.&nbsp;Sizes – 4, 5, 6 inches. Please take note that prices vary according to the size.</SPAN></P>', '0.70, 1.00, 1.25', 'Please contact us!', 0, 'pcs'),
(152, 10, 'Smoking Pipes', 'Pipe0004', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Made of Abony Wood, carved design, black &amp; brown colour, mini pipe.&nbsp;Size 3inches. </SPAN></P>', '0.35', 'Please contact us!', 0, 'pcs'),
(153, 10, 'Smoking Pipes', 'Pipe0005', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Made of Abony Wood, carved design, black &amp; brown colour, cigarette-pipe.&nbsp;Size: 3inches</SPAN></P>', '0.25', 'Please contact us!', 0, 'pcs'),
(154, 10, 'Smoking Pipes', 'Pipe0006', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Made of Abony Wood, carved design, black &amp; brown colour, 7 in 1 pipe.&nbsp;Sizes 4,5,6,8,10,12,14 inches. Please take note that prices vary according to the size.</SPAN></P>', '1.00,1.50,2.00,3.50,5.00,7.00,9.00', 'Please contact us!', 0, 'pcs'),
(155, 10, 'Smoking Pipes', 'Pipe0007', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Made of Abony Wood, flat pipe, mixed carved designs, black colour. Size:&nbsp;3inches. </SPAN></P>', '0.75', 'Please contact us!', 0, 'pcs'),
(156, 10, 'Smoking Pipes', 'Pipe0008', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt">\r\n<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana"><?xml:namespace prefix = o ns = "urn:schemas-microsoft-com:office:office" /><o:p></o:p></SPAN></P><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Stone-carved, multi-colour&nbsp;pipe. Sizes: 3, 4, 5inches. Please&nbsp;take note that&nbsp;prices vary according to the size.</SPAN> \r\n<P></P>', '1.00, 1.50, 2.00', 'Please contact us!', 0, 'pcs'),
(157, 10, 'Smoking Pipes', 'Pipe0009', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Marble chillum, multi colour pipe. Sizes: 3, 4, 5, 6, 8inches. Please take note that the prices vary according to the size.</SPAN></P>', '1.00, 1.50, 2.00, 2.25, 3.00', 'Please contact us!', 0, 'pcs'),
(158, 10, 'Smoking Pipes', 'Pipe0010', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Stone thumb pipe of multi colour. Sizes 3, 4inches. </SPAN></P>\r\n<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Please take note that the prices vary according to the size.</SPAN></P>\r\n<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">(Also available in wood in black or brown colour of size 3inches.)</SPAN></P>', '1.00, 1.50', 'Please contact us!', 0, 'pcs'),
(159, 10, 'Smoking Pipes', 'Pipe0011', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Clay chillum,&nbsp;plain and designed in multi colour. Sizes 4, 5, 6, 8inches. Please take note that the prices vary according to the size.</SPAN></P>', '1.00, 1.25, 1.75, 2.00', 'Please contact us!', 0, 'pcs'),
(160, 10, 'Smoking Pipes', 'Pipe0012', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Stone-carved chillum with <?xml:namespace prefix = st1 ns = "urn:schemas-microsoft-com:office:smarttags" /><st1:place w:st="on">Om</st1:place> and Marijuana leaf designs. Sizes 5inches. </SPAN></P>', '2.00', 'Please contact us!', 0, 'pcs'),
(161, 10, 'Smoking Pipes', 'Pipe0013', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Beaten-nut pipe of&nbsp;different shapes and design. Size 3inches. </SPAN></P>', '0.65', 'Please contact us!', 0, 'pcs'),
(162, 10, 'Wooden Grinder, Smoking Pipes', 'Pipe0014', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Wooden grinder in natural colours. Size 2, 3inches. (Also available in plastic, metal and acrylic in various colours of size 2inches.) Please take note that the prices vary according to the size.</SPAN></P>', '1.00, 3.00', 'Please contact us!', 0, 'pcs'),
(163, 10, 'Smoking Pipes', 'Pipe0015', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Wooden plain pipe in black and brown colours. Size: &nbsp;3, 4inches.&nbsp;Please take note that prices vary according to the size.</SPAN></P>', '0.65, 1.00', 'Please contact us!', 0, 'pcs'),
(164, 10, 'Smoking Pipe Screens', 'Pipe0016', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Pipe screen of sizes 10, 15, 20mm.</SPAN></P>\r\n<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">5pcs in 1packet &amp; 100packets in 1 box. </SPAN></P>', '9.00', 'Please contact us!', 0, 'boxes'),
(165, 10, 'Smoking Pipes', 'Pipe0017', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Metal pipe in&nbsp;different colours. Size:&nbsp;4inches. </SPAN></P>', '1.00', 'Please contact us!', 0, 'pcs'),
(166, 10, 'Smoking Pipes', 'Pipe0018', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Bottle converter in plain and marijuana leaf designs. Size:&nbsp;long and short. </SPAN></P>', '2.00', 'Please contact us!', 0, 'pcs'),
(167, 10, 'Smoking Pipes', 'Pipe0019', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">7-in-1 stone-carved pipe in&nbsp;multi colours. Size: 4, 5, 6inches. Please take note that prices vary according to the size.</SPAN></P>', '3.00, 4.00, 5.00', 'Please contact us!', 0, 'pcs'),
(168, 10, 'Smoking Pipes', 'Pipe0020', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Wooden shutter pipe in&nbsp;natural colour. Size:&nbsp;3, 4inches. Please take note that prices vary according to the size.</SPAN></P>', '0.75, 1.50', 'Please contact us!', 0, 'pcs'),
(169, 10, 'Smoking Pipes', 'Pipe0021', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Wooden carved chillum in&nbsp;black colour. Size:&nbsp;4, 6inches.</SPAN></P>\r\n<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">(Also available in plain design.) Please take note that prices vary according to the size.</SPAN></P>', '1.00, 2.00', 'Please contact us!', 0, 'pcs'),
(170, 10, 'Smoking Pipes', 'Pipe0022', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Coloured glass bubbler-pipe, Nepali handmade Inside/Outside Art product. Size: 5, 6inches. Please take note that prices vary according to the size.</SPAN></P>', '7.00, 9.00', 'Please contact us!', 0, 'pcs'),
(171, 10, 'Smoking Pipes', 'Pipe0023', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Coloured glass bubbler-pipe, Nepali handmade Inside/Outside Art product. Size:&nbsp;5, 6inches. Please take note that prices vary according to the size.</SPAN></P>', '7.00, 9.00', 'Please contact us!', 0, ''),
(172, 10, 'Smoking Pipes', 'Pipe0024', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Coloured glass pipe, Nepali handmade Inside Art product. Size:&nbsp;3, 4, 5inches. Please tale note that prices vary according to the size.</SPAN></P>', '4.00, 6.00, 8.00', 'Please contact us!', 0, 'pcs'),
(173, 10, 'Pipe0025', 'Pipe0025', '<P class=MsoNormal style="MARGIN: 0in 0in 0pt"><SPAN style="FONT-SIZE: 10pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA">Coloured glass pipe, Nepali handmade Inside Art product. Size:&nbsp;3, 4, 5inches. Please take note that prices vary according to the size.</SPAN></P>', '4.00, 6.00, 8.00', 'Please contact us!', 0, 'pcs'),
(178, 3, 'Greeting Cards', 'Card01', 'Greeting Cards made up of Nepali handmade paper with various designs.', '3.00', 'Please contact us!', 0, 'pcs'),
(177, 3, 'Greeting Cards', 'Card02', 'Greeting Cards made up of Nepali handmade paper with various designs.', '3.00', 'Please contact us!', 0, 'pcs'),
(179, 3, 'Greeting Cards', 'Card03', 'Greeting Cards made up of Nepali handmade paper with various designs. ', '3.00', 'Please contact us!', 0, 'pcs'),
(180, 3, 'Greeting Cards', 'Card04', 'Greeting Cards made up of Nepali handmade paper with various designs.', '3.00', 'Please contact us!', 0, 'pcs'),
(181, 3, 'Greeting Cards', 'Card05', 'Greeting Cards made up of Nepali handmade paper with various designs.', '3.00', 'Please contact us!', 0, 'pcs'),
(182, 3, 'Greeting Cards', 'Card06', 'Greeting Cards made up of Nepali handmade paper with various designs.', '3.00', 'Please contact us!', 0, 'pcs'),
(183, 3, 'Greeting Cards', 'Card07', 'Greeting Cards made up of Nepali handmade paper with various designs.', '3.00', 'Please contact us!', 0, 'pcs'),
(184, 3, 'Greeting Cards', 'Card08', 'Greeting Cards made up of Nepali handmade paper with various designs.', '3.00', 'Please contact us!', 0, 'pcs'),
(185, 3, 'Greeting Cards', 'Card09', 'Greeting Cards made up of Nepali handmade paper with various designs.', '3.00', 'Please contact us!', 0, 'pcs'),
(186, 3, 'Greeting Cards', 'Card10', 'Greeting Cards made up of Nepali handmade paper with various designs.', '3.00', 'Please contact us!', 0, 'pcs'),
(188, 3, 'Greeting Cards', 'Card11', 'Greeting Cards made up of Nepali handmade paper with various designs.', '3.00', 'Please contact us!', 0, 'pcs'),
(189, 3, 'Paper Handbag', 'handbag01', 'Handbag&nbsp;made up of Nepali handmade paper with various designs.', '1.00', 'Please contact us!', 0, 'pcs'),
(190, 3, 'Paper Lampshade', 'lampshed01', 'Lampshade made up of Nepali handmade paper with various designs. ', '1.00', 'Please contact us!', 0, 'pcs'),
(191, 3, 'Paper Lampshade', 'lampshed02', 'Lampshade made up of Nepali handmade paper with various designs. ', '1.00', 'Please contact us!', 0, 'pcs'),
(192, 3, 'Paper Lampshade', 'lampshed03', 'Lampshade made up of Nepali handmade paper with various designs. ', '1.00', 'Please contact us!', 0, 'pcs'),
(193, 3, 'Paper Lampshade', 'lampshed04', 'Lampshade made up of Nepali handmade paper with various designs. ', '3.00', 'Please contact us!', 0, 'pcs'),
(194, 3, 'Paper Lampshade', 'lampshed05', 'Lampshade made up of Nepali handmade paper with various designs. ', '3.00', 'Please contact us!', 0, 'pcs'),
(195, 3, 'Paper Lampshade', 'lampshed06', 'Lampshade made up of Nepali handmade paper with various designs. ', '1.00', 'Please contact us!', 0, 'pcs'),
(196, 3, 'Paper Lampshade', 'lampshed07', 'Lampshade made up of Nepali handmade paper with various designs. ', '1.00', 'Please contact us!', 0, 'pcs'),
(197, 3, 'Paper Notebooks', 'notebook01', 'Notebooks made up of Nepali handmade paper with various designs.', '3.50', 'Please contact us!', 0, 'pcs'),
(198, 3, 'Paper Notebooks', 'notebook02', 'Notebooks made up of Nepali handmade paper with various designs.', '3.50', 'Please contact us!', 0, 'pcs'),
(199, 3, 'Paper Notebook', 'notebook03', 'Notebooks made up of Nepali handmade paper with various designs.', '3.50', 'Please contact us!', 0, 'pcs'),
(200, 3, 'Paper Notebooks', 'notebook04', 'Notebooks made up of Nepali handmade paper with various designs.', '3.50', 'Please contact us!', 0, 'pcs'),
(201, 3, 'Paper Notebooks', 'notebook05', 'Notebooks made up of Nepali handmade paper with various designs.', '3.50', 'Please contact us!', 0, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_showcase`
--

CREATE TABLE IF NOT EXISTS `tbl_showcase` (
  `product_id` int(12) NOT NULL auto_increment,
  `category_id` int(12) NOT NULL default '0',
  `product_name` varchar(255) NOT NULL default '',
  `prod_key` varchar(20) NOT NULL default '',
  `product_description` text NOT NULL,
  `single_unit_price` varchar(255) NOT NULL default '',
  `unit` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`product_id`),
  UNIQUE KEY `product_id` (`product_id`),
  KEY `product_id_2` (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_showcase`
--

INSERT INTO `tbl_showcase` (`product_id`, `category_id`, `product_name`, `prod_key`, `product_description`, `single_unit_price`, `unit`) VALUES
(1, 2, 'Ancient Wooden mask', 'AWM001', 'The ancient wooden mask are rare and an be found with only selected collectors in Nepal.', '1254', 'pcs'),
(2, 3, 'SILVER BANGLES', 'SB003', 'The ancient wooden mask are rare and an be found with only selected collectors in Nepal.', '1254', 'pcs'),
(3, 5, 'TRADITIONAL MASKS', 'TM005', 'The ancient wooden mask are rare and an be found with only selected collectors in Nepal.', '1254', 'pcs');
