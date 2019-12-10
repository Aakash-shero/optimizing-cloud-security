-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2015 at 02:56 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `be`
--

-- --------------------------------------------------------

--
-- Table structure for table `ait`
--

CREATE TABLE IF NOT EXISTS `ait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `contents` longblob,
  `size` bigint(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ait`
--


-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE IF NOT EXISTS `companyinfo` (
  `company_name` varchar(50) NOT NULL,
  `company_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`company_name`, `company_info`) VALUES
('Accenture', 'Website	www.accenture.com Headquarters	Dublin, Ireland Size	5000+ Employees Founded	1989 Type	Company - Public (ACN)  Industry	Business Services  Revenue	$10+ billion (USD) per year Competitors	Deloitte, EY, PwC\r\n\nBring your talent and passion to Accenture – sharpen your skills, build an extraordinary career and play a key role in creating consulting, technology and outsourcing solutions that transform organizations and communities around the world.\r\n\nMission: We are one of the world’s leading organizations providing management consulting, technology and outsourcing services, with approximately 319,000 employees. Our four growth platforms—Accenture Strategy, Accenture Digital, Accenture Technology, Accenture Operations—are the innovation engines through which we build world-class skills and capabilities; develop knowledge capital; and create, acquire and manage key assets central to the development of integrated services and solutions for our clients.\r\n\n'),
('TCS', 'Website	www.tcs.com Headquarters	Mumbai, India Size	5000+ Employees Founded	1968 Type	Company - Public (TCSN)  Industry	Information Technology  Revenue	$10+ billion (USD) per year Competitors	Accenture, IBM, Infosys\r\n\nTata Consultancy Services (TCS) helps its clients say farewell to business inefficiencies. The company is a leading global provider of IT, consulting, and outsourcing services, with operations in more than 40 countries. Its offerings include business process outsourcing, data center management, IT and strategic consulting, new product development and engineering, and systems integration. One of its specialties is developing and maintaining customized software for businesses. Most of its clients, in industries ranging from energy to financial services to retail to telecom, are located in North America, Latin America, and Europe. TCS is controlled by textiles and manufacturing conglomerate Tata Group.'),
('Infosys', 'Website	www.infosys.com Headquarters	Bangalore, India Size	5000+ Employees Founded	1982 Type	Company - Public (INFY)  Industry	Information Technology  Revenue	$5 to $10 billion (USD) per year Competitors	Tata Consultancy Services, Wipro, Cognizant Technology Solutions\r\n\nInfosys Technologies is one of India''s leading technology services firms, providing software development and engineering to corporate clients from its subsidiaries and numerous regional offices and development centers worldwide. It also provides data management, systems integration, project management, support, and maintenance services. Infosys'' US-based consulting business provides strategic IT and professional consulting services, while subsidiary Infosys BPO provides business process outsourcing (BPO) services. The company makes almost all of its sales overseas, with North America accounting for two-thirds of the total. Clients come largely from the financial services, manufacturing, telecom, and retail industries.');

-- --------------------------------------------------------

--
-- Table structure for table `encryptedfileindex`
--

CREATE TABLE IF NOT EXISTS `encryptedfileindex` (
  `file_id` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `encryptedfileindex`
--


-- --------------------------------------------------------

--
-- Table structure for table `encryptedindex`
--

CREATE TABLE IF NOT EXISTS `encryptedindex` (
  `file_id` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `term_frequency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `encryptedindex`
--

INSERT INTO `encryptedindex` (`file_id`, `keyword`, `frequency`, `term_frequency`) VALUES
('ÅX÷QTXõ‹²¿þìÂ,', 'QÚ-–ú‚Ÿ«®ù#8', 'ÅX÷QTXõ‹²¿þìÂ,', 'è@QÊ\r=Zcß¤9rÌÊé9}r³ø„³ñÙ¨Ð'),
('ÅX÷QTXõ‹²¿þìÂ,', 'M	êÓÜI üÄOºq3£=™', 'ÅX÷QTXõ‹²¿þìÂ,', 'è@QÊ\r=Zcß¤9rÌÊé9}r³ø„³ñÙ¨Ð'),
('ÅX÷QTXõ‹²¿þìÂ,', 'Æ¢×;•pc}žÌE¤!år1/-íPÁ¡‚/g›Îæ', 'ÅX÷QTXõ‹²¿þìÂ,', 'è@QÊ\r=Zcß¤9rÌÊé9}r³ø„³ñÙ¨Ð'),
('ÅX÷QTXõ‹²¿þìÂ,', '+â	\\ožrOm)xØä', 'ÅX÷QTXõ‹²¿þìÂ,', 'è@QÊ\r=Zcß¤9rÌÊé9}r³ø„³ñÙ¨Ð'),
('ÅX÷QTXõ‹²¿þìÂ,', '7}$Ø6ýàG­„%mÍß', 'ÅX÷QTXõ‹²¿þìÂ,', 'è@QÊ\r=Zcß¤9rÌÊé9}r³ø„³ñÙ¨Ð'),
('ÅX÷QTXõ‹²¿þìÂ,', 'Øª;‡×ú+yw›™]›', 'ÅX÷QTXõ‹²¿þìÂ,', 'è@QÊ\r=Zcß¤9rÌÊé9}r³ø„³ñÙ¨Ð'),
('±N‹¯Ð¹· òÁ¡•', 'SÃjÓáràÚ‘Žˆ“ äï', 'ò”B4Ý/%°­ý^.•\r', '?Zö?®ñ”‹ºß¬X¢±N‹¯Ð¹· òÁ¡•'),
('±N‹¯Ð¹· òÁ¡•', '„½®ájÚš=eéØ|4¹f', '‡ýO"$ž×R€YusÌ˜à', 'Š''—ÿ¾ÚROäxËå¼LöÇÅX÷QTXõ‹²¿þìÂ,'),
('±N‹¯Ð¹· òÁ¡•', '¸P®]ßã`e?·×œÏ¿ø', '±N‹¯Ð¹· òÁ¡•', 'õð¸³Y¸á…KÞ­áÊ"uÅX÷QTXõ‹²¿þìÂ,'),
('±N‹¯Ð¹· òÁ¡•', 'þHj¨ÜïxÐ‘\\W	yZ', '±N‹¯Ð¹· òÁ¡•', 'õð¸³Y¸á…KÞ­áÊ"uÅX÷QTXõ‹²¿þìÂ,'),
('±N‹¯Ð¹· òÁ¡•', '—V''Œ+(çÎf³ÌZYÑÃ', '±N‹¯Ð¹· òÁ¡•', 'õð¸³Y¸á…KÞ­áÊ"uÅX÷QTXõ‹²¿þìÂ,'),
('±N‹¯Ð¹· òÁ¡•', ':2ô³x8IøL3ç†ÈÚ', '±N‹¯Ð¹· òÁ¡•', 'õð¸³Y¸á…KÞ­áÊ"uÅX÷QTXõ‹²¿þìÂ,'),
('‡ýO"$ž×R€YusÌ˜à', 'àƒGZ §/N¦*Oc9Z', 'ÅX÷QTXõ‹²¿þìÂ,', 'É—*côˆˆ‹œÏrÒNmk'),
('‡ýO"$ž×R€YusÌ˜à', 'ÅX÷QTXõ‹²¿þìÂ,', 'ÅX÷QTXõ‹²¿þìÂ,', 'É—*côˆˆ‹œÏrÒNmk'),
('‡ýO"$ž×R€YusÌ˜à', 'w2ùˆæ‘þ_‘Kƒ5¯', 'ÅX÷QTXõ‹²¿þìÂ,', 'É—*côˆˆ‹œÏrÒNmk'),
('ò”B4Ý/%°­ý^.•\r', 'áR=½ã\0‰šÉ“€î\\ÌRßµ¥éôúW÷¦6©“8', 'ÅX÷QTXõ‹²¿þìÂ,', 'ÿd@2Y\0Ž\Z<eY8ùÖ‡ýO"$ž×R€YusÌ˜à'),
('ò”B4Ý/%°­ý^.•\r', 'Iªò7‚\n0''žà;ßÕ`ê', 'ÅX÷QTXõ‹²¿þìÂ,', 'ÿd@2Y\0Ž\Z<eY8ùÖ‡ýO"$ž×R€YusÌ˜à'),
('ò”B4Ý/%°­ý^.•\r', 'ÚÖââFlÝ òÉÿ|Áj', 'ÅX÷QTXõ‹²¿þìÂ,', 'ÿd@2Y\0Ž\Z<eY8ùÖ‡ýO"$ž×R€YusÌ˜à'),
('ò”B4Ý/%°­ý^.•\r', 'Šò€~M0.¤€ü-/Iƒ	', 'ÅX÷QTXõ‹²¿þìÂ,', 'ÿd@2Y\0Ž\Z<eY8ùÖ‡ýO"$ž×R€YusÌ˜à'),
('æì\n7QÌøšÐöNât', '‰Q‡žû€ó ß£G"', 'Êé9}r³ø„³ñÙ¨Ð', '©jÈŒÅzëó¸ù«”ÔÒpò”B4Ý/%°­ý^.•\r'),
('æì\n7QÌøšÐöNât', 'GÒïµƒ¸þ‡ZÙÆÖP-', 'æì\n7QÌøšÐöNât', 'ø{€Ê]üq\\öíœ±È¢˜öë÷°öˆtŠ`œM÷«E'),
('æì\n7QÌøšÐöNât', '‹k¥0höÓÂ0—%Û÷', 'ò”B4Ý/%°­ý^.•\r', '	Il&ó’†A†£\Z\0ÊNÁ0¢B\ZrñAþq©J©N3'),
('æì\n7QÌøšÐöNât', 'ü¬\\IÊVÁ2j¤¢ð', 'ò”B4Ý/%°­ý^.•\r', '	Il&ó’†A†£\Z\0ÊNÁ0¢B\ZrñAþq©J©N3'),
('æì\n7QÌøšÐöNât', '÷‘¹{‡qîUu1Ò°´ç', 'ò”B4Ý/%°­ý^.•\r', '	Il&ó’†A†£\Z\0ÊNÁ0¢B\ZrñAþq©J©N3'),
('æì\n7QÌøšÐöNât', ':Ú7ÙëiË	Ÿ!µuE', 'ò”B4Ý/%°­ý^.•\r', '	Il&ó’†A†£\Z\0ÊNÁ0¢B\ZrñAþq©J©N3'),
('æì\n7QÌøšÐöNât', 'ý=>íc»6v`ÙqO%"Á', '±N‹¯Ð¹· òÁ¡•', '®ýãƒ^Ñå\Z0cU-L^ê¸—Ü¾Z)dÈvK'),
('æì\n7QÌøšÐöNât', '“´U›ÓOÀž,ÌåaèB¯', '±N‹¯Ð¹· òÁ¡•', '®ýãƒ^Ñå\Z0cU-L^ê¸—Ü¾Z)dÈvK'),
('æì\n7QÌøšÐöNât', 'ÈØs0b@|€Æœ3¡2#', '±N‹¯Ð¹· òÁ¡•', '®ýãƒ^Ñå\Z0cU-L^ê¸—Ü¾Z)dÈvK'),
('æì\n7QÌøšÐöNât', 'ºƒ£zßÈ%Sÿ_^´9', '±N‹¯Ð¹· òÁ¡•', '®ýãƒ^Ñå\Z0cU-L^ê¸—Ü¾Z)dÈvK'),
('¢˜öë÷°öˆtŠ`œM÷«E', '‰Q‡žû€ó ß£G"', 'æì\n7QÌøšÐöNât', '–ÌW§óºYÈ69j»n}k\n}ÿ‚Éq¶¥cä\nð''Ô¾'),
('¢˜öë÷°öˆtŠ`œM÷«E', 'GÒïµƒ¸þ‡ZÙÆÖP-', '‡ýO"$ž×R€YusÌ˜à', 'išuvÖ®GP¹Âi1=\n}ÿ‚Éq¶¥cä\nð''Ô¾'),
('¢˜öë÷°öˆtŠ`œM÷«E', '‹k¥0höÓÂ0—%Û÷', '‡ýO"$ž×R€YusÌ˜à', 'išuvÖ®GP¹Âi1=\n}ÿ‚Éq¶¥cä\nð''Ô¾'),
('¢˜öë÷°öˆtŠ`œM÷«E', 'ÃÖ’Îò\\~_¥l3³múé', '±N‹¯Ð¹· òÁ¡•', 'ÉÓÌ"ÈÅáÄ¥P’Ç)­q³Ûao=ÈtÍÝ¼'),
('¢˜öë÷°öˆtŠ`œM÷«E', ';•Í&ñhiEª—òI»7', '±N‹¯Ð¹· òÁ¡•', 'ÉÓÌ"ÈÅáÄ¥P’Ç)­q³Ûao=ÈtÍÝ¼'),
('¢˜öë÷°öˆtŠ`œM÷«E', 'v–f\0ŒYº€Ë&ámæ§', 'ÅX÷QTXõ‹²¿þìÂ,', '\Zý£}¤øa2`A [ÖÏ\n}ÿ‚Éq¶¥cä\nð''Ô¾'),
('¢˜öë÷°öˆtŠ`œM÷«E', '¯}‡~u 1Yh''Zˆq«', 'ÅX÷QTXõ‹²¿þìÂ,', '\Zý£}¤øa2`A [ÖÏ\n}ÿ‚Éq¶¥cä\nð''Ô¾'),
('¢˜öë÷°öˆtŠ`œM÷«E', ':Ú7ÙëiË	Ÿ!µuE', 'ÅX÷QTXõ‹²¿þìÂ,', '\Zý£}¤øa2`A [ÖÏ\n}ÿ‚Éq¶¥cä\nð''Ô¾'),
('¢˜öë÷°öˆtŠ`œM÷«E', ']†u€÷–ÏíV™¢ü', 'ÅX÷QTXõ‹²¿þìÂ,', '\Zý£}¤øa2`A [ÖÏ\n}ÿ‚Éq¶¥cä\nð''Ô¾'),
('¢˜öë÷°öˆtŠ`œM÷«E', 'ß6\\‰ñ)ã¤©#óÒŽ>', 'ÅX÷QTXõ‹²¿þìÂ,', '\Zý£}¤øa2`A [ÖÏ\n}ÿ‚Éq¶¥cä\nð''Ô¾'),
('Á0¢B\ZrñAþq©J©N3', 'ÀÆU<~˜šn¾¨Bêààó', 'A~eÕäH=©&bY$Wb', 'N5‹g¡*u„j''i‡ýO"$ž×R€YusÌ˜à'),
('Á0¢B\ZrñAþq©J©N3', '×-óþÐ>‡°ù‰¥Î™', 'æì\n7QÌøšÐöNât', '‡s}\0é~C{½æWKøa±=1¥ZþKÃ™À-ƒ\\ÐìS8…'),
('Á0¢B\ZrñAþq©J©N3', ')CYiZžsDðKP$4ŸÓ', 'ò”B4Ý/%°­ý^.•\r', 'û‰’æÿ"+k?úeb:_µÁ0¢B\ZrñAþq©J©N3'),
('Á0¢B\ZrñAþq©J©N3', 'ÃËw»%rH>Q(ÿÞª#_ö', '‡ýO"$ž×R€YusÌ˜à', '+õ‚EÒS_âñmÏmØaX©RŸ;œì$\\LéVßÐi'),
('Á0¢B\ZrñAþq©J©N3', 'Ô]å¥3#ëºlÉp	0', '‡ýO"$ž×R€YusÌ˜à', '+õ‚EÒS_âñmÏmØaX©RŸ;œì$\\LéVßÐi'),
('Á0¢B\ZrñAþq©J©N3', 'ªLáTÇÏfa0Ï*—sfi', '‡ýO"$ž×R€YusÌ˜à', '+õ‚EÒS_âñmÏmØaX©RŸ;œì$\\LéVßÐi'),
('Á0¢B\ZrñAþq©J©N3', 'ˆÔId*žïèáv¯S\ZV', '‡ýO"$ž×R€YusÌ˜à', '+õ‚EÒS_âñmÏmØaX©RŸ;œì$\\LéVßÐi'),
('Á0¢B\ZrñAþq©J©N3', '>ë¦CÞBYÈ	d·¨šÜ‰…', '‡ýO"$ž×R€YusÌ˜à', '+õ‚EÒS_âñmÏmØaX©RŸ;œì$\\LéVßÐi'),
('Á0¢B\ZrñAþq©J©N3', 'ÌoÃ;dpx§á\Z ðF&L', '±N‹¯Ð¹· òÁ¡•', 'ˆÊ“{ü)©ÀAQÜÉ!O<\\úÀ,%ð¸³IOý^i¯P'),
('Á0¢B\ZrñAþq©J©N3', 'jY-Š;µX”ÍÆŒ4', '±N‹¯Ð¹· òÁ¡•', 'ˆÊ“{ü)©ÀAQÜÉ!O<\\úÀ,%ð¸³IOý^i¯P'),
('Êé9}r³ø„³ñÙ¨Ð', 'dû¬žÏþt¯&iB®ßÊ~', 'b¢O”nË]û¸ï#:%Î', 'œŠ"a.$mR¶f\\‡ýO"$ž×R€YusÌ˜à'),
('Êé9}r³ø„³ñÙ¨Ð', '[¼‘|l}U¨Ov{ieg', '<"Ú*Ùª,uøl”ê¢)', '³ÝZÃv§3Q(ïìl''½t1¥ZþKÃ™À-ƒ\\ÐìS8…'),
('Êé9}r³ø„³ñÙ¨Ð', 'ˆ·Ádñü§Ç(öNŸk', 'ÉƒÑ)Ý…Š}ÜÛ¢ž', '>|²8Lã“JdÜw;=±1¥ZþKÃ™À-ƒ\\ÐìS8…'),
('Êé9}r³ø„³ñÙ¨Ð', 'XÖE2Í~ArÅÜ½ÙëX0', '²à¿ðIŒÓL”§ÌÔx\r', 'mâjÙôöPc0SDð¨ášÁ0¢B\ZrñAþq©J©N3'),
('Êé9}r³ø„³ñÙ¨Ð', 'åž†1îFg†­DŸ .y', '(ßU/‘¨U&P€’ïZlé', 'ÔÄŠ, V»»^¶¥wÒ›Á»U.Ô	‹t¥þ\r\Z{¨'),
('Êé9}r³ø„³ñÙ¨Ð', 'é&è,q€qo?è¦pøìýŒ', '(ßU/‘¨U&P€’ïZlé', 'ÔÄŠ, V»»^¶¥wÒ›Á»U.Ô	‹t¥þ\r\Z{¨'),
('Êé9}r³ø„³ñÙ¨Ð', 'Ð:Fó†«6D†’™Äô7', 'A<fg35ô±ÑÐ¶]j…', 'ÜˆeÈÅ‘Ž pd´ÂÏ@h‹ùVÏØy`ñ×¡þqdÚÊ'),
('Êé9}r³ø„³ñÙ¨Ð', ';ºy?.Hþªnùø¡€þ', 'A<fg35ô±ÑÐ¶]j…', 'ÜˆeÈÅ‘Ž pd´ÂÏ@h‹ùVÏØy`ñ×¡þqdÚÊ'),
('Êé9}r³ø„³ñÙ¨Ð', '÷ô9£†PœoÐCì’/ò', 'Î«-;NEëI¤h~FMdk', '?é¸iªoØ»Ì]at&%ÜïŸEié@5B6(vÑô|'),
('Êé9}r³ø„³ñÙ¨Ð', '£Ìd˜wGùî¦(§', '™Á¦…®2vÃL<§*iô', 'Ìej‹š®»ú…Œ¹K0‡x†\Z ¿f†$;£/ì'),
('Êé9}r³ø„³ñÙ¨Ð', 'µ\rwy´®C*h6ú¹z\rq', 'é—gÀà‡DÑCó	Þi', '¢òÕé’tHÜO;é±''ðt}VŒmÜJ‘2Py6'),
('Êé9}r³ø„³ñÙ¨Ð', '''*“ÌÄð4Û’! ÌsK', '<\\úÀ,%ð¸³IOý^i¯P', '[Nœ,†¬·Ç¨ñ©™Úu¶kÍÜ$"V·Q£á‘Ì?'),
('Êé9}r³ø„³ñÙ¨Ð', '¾³ÚD„xÈ@5f¨}Ÿ', 'ƒXèxý³çjYÕ_‚Ç', '~2.þQ<6±1¢U$Q…É¢˜öë÷°öˆtŠ`œM÷«E'),
('Êé9}r³ø„³ñÙ¨Ð', 'x|à»çµnŸØ§@6˜°', '™cà$Š‹)ÓQ¢µr/›”¤', '—FB5«nJ`,ñÄýþ\rì¬føi›­ž#>-ïìþÆÿj'),
('Êé9}r³ø„³ñÙ¨Ð', ']>ïtaêþmB;fü', 'Tî?ó“²#Ž“Îì+#', '¾ª÷6Eõ!N_ô|3]ZÇÝ,L	€€,èn<S«ðæ'),
('‡ýO"$ž×R€YusÌ˜à', 'àƒGZ §/N¦*Oc9Z', 'ÅX÷QTXõ‹²¿þìÂ,', 'É—*côˆˆ‹œÏrÒNmk'),
('‡ýO"$ž×R€YusÌ˜à', 'ÅX÷QTXõ‹²¿þìÂ,', 'ÅX÷QTXõ‹²¿þìÂ,', 'É—*côˆˆ‹œÏrÒNmk'),
('‡ýO"$ž×R€YusÌ˜à', 'w2ùˆæ‘þ_‘Kƒ5¯', 'ÅX÷QTXõ‹²¿þìÂ,', 'É—*côˆˆ‹œÏrÒNmk'),
('1¥ZþKÃ™À-ƒ\\ÐìS8…', 'o·!‰¡ôÕwf´¦ÈÿÈ‰', 'YÌrDtxÿZ\Zþ\0!', '6$dÏíAüÄº:ÕýËYÅX÷QTXõ‹²¿þìÂ,'),
('1¥ZþKÃ™À-ƒ\\ÐìS8…', 'XÖE2Í~ArÅÜ½ÙëX0', '1¥ZþKÃ™À-ƒ\\ÐìS8…', 'ŸøMâ~ÔàöÝ?]]¢˜öë÷°öˆtŠ`œM÷«E'),
('1¥ZþKÃ™À-ƒ\\ÐìS8…', ';áR½ÝUðAˆªÑ&?–', 'Êé9}r³ø„³ñÙ¨Ð', 'e·òàiø¹smß€]€‡ýO"$ž×R€YusÌ˜à'),
('1¥ZþKÃ™À-ƒ\\ÐìS8…', '¸P®]ßã`e?·×œÏ¿ø', 'Êé9}r³ø„³ñÙ¨Ð', 'e·òàiø¹smß€]€‡ýO"$ž×R€YusÌ˜à'),
('1¥ZþKÃ™À-ƒ\\ÐìS8…', 'œÖÊ®Zj''BQÉ´', '¢˜öë÷°öˆtŠ`œM÷«E', 'GÄx­êgâÿ>Nµ9³Á0¢B\ZrñAþq©J©N3'),
('1¥ZþKÃ™À-ƒ\\ÐìS8…', 'åž†1îFg†­DŸ .y', 'ò”B4Ý/%°­ý^.•\r', 'Œ¦X˜$»u¨§QÓèÅX÷QTXõ‹²¿þìÂ,'),
('1¥ZþKÃ™À-ƒ\\ÐìS8…', 'àƒGZ §/N¦*Oc9Z', 'ò”B4Ý/%°­ý^.•\r', 'Œ¦X˜$»u¨§QÓèÅX÷QTXõ‹²¿þìÂ,'),
('1¥ZþKÃ™À-ƒ\\ÐìS8…', 'ˆ·Ádñü§Ç(öNŸk', 'ò”B4Ý/%°­ý^.•\r', 'Œ¦X˜$»u¨§QÓèÅX÷QTXõ‹²¿þìÂ,'),
('1¥ZþKÃ™À-ƒ\\ÐìS8…', '[¼‘|l}U¨Ov{ieg', 'ò”B4Ý/%°­ý^.•\r', 'Œ¦X˜$»u¨§QÓèÅX÷QTXõ‹²¿þìÂ,'),
('1¥ZþKÃ™À-ƒ\\ÐìS8…', 'Ã± ýy=\Zƒð½ÿá	#)', '‡ýO"$ž×R€YusÌ˜à', 'j˜”¡Cd¦z?’½£VÝG¸—Ü¾Z)dÈvK'),
('''½:,ðÑ Œ–:\rcz', 'W“åjÿ.rÓe–éxoÇ''', '¢˜öë÷°öˆtŠ`œM÷«E', 'åóW!Õß3ä\0¬»¿€×±¢˜öë÷°öˆtŠ`œM÷«E'),
('''½:,ðÑ Œ–:\rcz', 'ô™ôŒçÉ\\Ÿ~_ãÝKŽ', 'æì\n7QÌøšÐöNât', '"çlbQ6ó"Ê$<ž?½¸Êé9}r³ø„³ñÙ¨Ð'),
('''½:,ðÑ Œ–:\rcz', '>p²Œ˜‘ê1’çï"½Ú', 'ò”B4Ý/%°­ý^.•\r', 'JD£;GqÈ¯¢º¡árÅX÷QTXõ‹²¿þìÂ,'),
('''½:,ðÑ Œ–:\rcz', 'XÖE2Í~ArÅÜ½ÙëX0', 'ò”B4Ý/%°­ý^.•\r', 'JD£;GqÈ¯¢º¡árÅX÷QTXõ‹²¿þìÂ,'),
('''½:,ðÑ Œ–:\rcz', 'åž†1îFg†­DŸ .y', 'ò”B4Ý/%°­ý^.•\r', 'JD£;GqÈ¯¢º¡árÅX÷QTXõ‹²¿þìÂ,'),
('''½:,ðÑ Œ–:\rcz', 'ˆ·Ádñü§Ç(öNŸk', '‡ýO"$ž×R€YusÌ˜à', 'ÝñÚìŸ^Çž°_‘xCNG‡ýO"$ž×R€YusÌ˜à'),
('''½:,ðÑ Œ–:\rcz', 'o·!‰¡ôÕwf´¦ÈÿÈ‰', '‡ýO"$ž×R€YusÌ˜à', 'ÝñÚìŸ^Çž°_‘xCNG‡ýO"$ž×R€YusÌ˜à'),
('''½:,ðÑ Œ–:\rcz', 'Ã± ýy=\Zƒð½ÿá	#)', '‡ýO"$ž×R€YusÌ˜à', 'ÝñÚìŸ^Çž°_‘xCNG‡ýO"$ž×R€YusÌ˜à'),
('''½:,ðÑ Œ–:\rcz', '«§y)É^Aùñ±†v7 t', '‡ýO"$ž×R€YusÌ˜à', 'ÝñÚìŸ^Çž°_‘xCNG‡ýO"$ž×R€YusÌ˜à'),
('''½:,ðÑ Œ–:\rcz', 'n•ãö%êøí¦X..“Öÿ', '‡ýO"$ž×R€YusÌ˜à', 'ÝñÚìŸ^Çž°_‘xCNG‡ýO"$ž×R€YusÌ˜à'),
('YÌrDtxÿZ\Zþ\0!', 'Ìa©yTgÝÅ4ÊH3Y', 'ò”B4Ý/%°­ý^.•\r', '9 Ô×Øów”œp|ñ…ò”B4Ý/%°­ý^.•\r'),
('YÌrDtxÿZ\Zþ\0!', '”¶‚ú/›w—ihc­”,{', '‡ýO"$ž×R€YusÌ˜à', 'žPÍ?Þ‡0ãÙ9­Pq‡ýO"$ž×R€YusÌ˜à'),
('YÌrDtxÿZ\Zþ\0!', 'Èfa]µÊwBÿEòØDw¤', '‡ýO"$ž×R€YusÌ˜à', 'žPÍ?Þ‡0ãÙ9­Pq‡ýO"$ž×R€YusÌ˜à'),
('YÌrDtxÿZ\Zþ\0!', 'º”î°ÜÕ²ûÝ¡''+-N&í', '‡ýO"$ž×R€YusÌ˜à', 'žPÍ?Þ‡0ãÙ9­Pq‡ýO"$ž×R€YusÌ˜à'),
('YÌrDtxÿZ\Zþ\0!', '€©Ã[{€ý,Î}ûc¦"', '‡ýO"$ž×R€YusÌ˜à', 'žPÍ?Þ‡0ãÙ9­Pq‡ýO"$ž×R€YusÌ˜à'),
('YÌrDtxÿZ\Zþ\0!', 'ˆ7AF$½ÖXFÙ JVÉš', '±N‹¯Ð¹· òÁ¡•', 'Ýp,"ÓtÔJÍ8“‘|±N‹¯Ð¹· òÁ¡•'),
('"—Mž PûÀ5y¬P?"', 'åž†1îFg†­DŸ .y', '¢˜öë÷°öˆtŠ`œM÷«E', '8Ù\nñŒK$ÂL­§¹D‡ýO"$ž×R€YusÌ˜à'),
('"—Mž PûÀ5y¬P?"', '%žs×ýj‹ÄB-HÿÑrñä', '¢˜öë÷°öˆtŠ`œM÷«E', '8Ù\nñŒK$ÂL­§¹D‡ýO"$ž×R€YusÌ˜à'),
('"—Mž PûÀ5y¬P?"', '9`2¢<ÄBéƒsÜò', '¢˜öë÷°öˆtŠ`œM÷«E', '8Ù\nñŒK$ÂL­§¹D‡ýO"$ž×R€YusÌ˜à'),
('"—Mž PûÀ5y¬P?"', '#Ðé\0+w…]éR©\n2Z', 'æì\n7QÌøšÐöNât', 'IÀW<¡*¾‹Ð&›jbÑÁ0¢B\ZrñAþq©J©N3'),
('"—Mž PûÀ5y¬P?"', 'òŸ7A-ÑtÓ’2¡¥šÜ', 'æì\n7QÌøšÐöNât', 'IÀW<¡*¾‹Ð&›jbÑÁ0¢B\ZrñAþq©J©N3'),
('"—Mž PûÀ5y¬P?"', 'ÖÖŽQXóp±”ÂèÝ.„Ã', 'æì\n7QÌøšÐöNât', 'IÀW<¡*¾‹Ð&›jbÑÁ0¢B\ZrñAþq©J©N3'),
('"—Mž PûÀ5y¬P?"', '[¼‘|l}U¨Ov{ieg', 'ò”B4Ý/%°­ý^.•\r', '‘—³ÚHÓÅûå\r©ª5±N‹¯Ð¹· òÁ¡•'),
('"—Mž PûÀ5y¬P?"', 'ÑüjáaÇA®Ooc^C|', 'ò”B4Ý/%°­ý^.•\r', '‘—³ÚHÓÅûå\r©ª5±N‹¯Ð¹· òÁ¡•'),
('"—Mž PûÀ5y¬P?"', '¼/áTe_>§íG¿ìÈ', '‡ýO"$ž×R€YusÌ˜à', '•²“#§…°.Çk"9ß«P$g¥¯FÛ\Zë?¾‘$æ'),
('"—Mž PûÀ5y¬P?"', '³Ž“WG ÀŸˆÍ²€¯(', '‡ýO"$ž×R€YusÌ˜à', '•²“#§…°.Çk"9ß«P$g¥¯FÛ\Zë?¾‘$æ'),
('"—Mž PûÀ5y¬P?"', 'ùÀD1ýžg v|í­oZ\Z®', '‡ýO"$ž×R€YusÌ˜à', '•²“#§…°.Çk"9ß«P$g¥¯FÛ\Zë?¾‘$æ'),
('"—Mž PûÀ5y¬P?"', 'œˆb3ÞI±æE&š&íJ', '‡ýO"$ž×R€YusÌ˜à', '•²“#§…°.Çk"9ß«P$g¥¯FÛ\Zë?¾‘$æ'),
('"—Mž PûÀ5y¬P?"', 'XÖE2Í~ArÅÜ½ÙëX0', '‡ýO"$ž×R€YusÌ˜à', '•²“#§…°.Çk"9ß«P$g¥¯FÛ\Zë?¾‘$æ'),
('"—Mž PûÀ5y¬P?"', '%™ÿŒ‡»Œw-ýîñ', '‡ýO"$ž×R€YusÌ˜à', '•²“#§…°.Çk"9ß«P$g¥¯FÛ\Zë?¾‘$æ'),
('"—Mž PûÀ5y¬P?"', '}ëÎ°\\zìoïv}î7’', '‡ýO"$ž×R€YusÌ˜à', '•²“#§…°.Çk"9ß«P$g¥¯FÛ\Zë?¾‘$æ'),
('A~eÕäH=©&bY$Wb', '¡ž§ž''…T)\Z\\¸±½q', 'æì\n7QÌøšÐöNât', '»–EAîsnŽŽÎ‚#‡ýO"$ž×R€YusÌ˜à'),
('A~eÕäH=©&bY$Wb', 'åž†1îFg†­DŸ .y', '‡ýO"$ž×R€YusÌ˜à', 'G’ð¢tJ¯¼o2“]Á{Ó±N‹¯Ð¹· òÁ¡•'),
('A~eÕäH=©&bY$Wb', '_……>»ÑVKü„¢Æ‚', '‡ýO"$ž×R€YusÌ˜à', 'G’ð¢tJ¯¼o2“]Á{Ó±N‹¯Ð¹· òÁ¡•'),
('A~eÕäH=©&bY$Wb', 'ý”Ý`<„ë‡¤ Ú“ÝÂþˆ', '‡ýO"$ž×R€YusÌ˜à', 'G’ð¢tJ¯¼o2“]Á{Ó±N‹¯Ð¹· òÁ¡•'),
('A~eÕäH=©&bY$Wb', 'íÕãš×Ÿ''Ê8xk`c,ðñ', '±N‹¯Ð¹· òÁ¡•', 'ê…“ñÈ„ñ*ë–}Gü«•ÅX÷QTXõ‹²¿þìÂ,'),
('A~eÕäH=©&bY$Wb', 'Yìº_:RTçÖ`d„a?Ù', '±N‹¯Ð¹· òÁ¡•', 'ê…“ñÈ„ñ*ë–}Gü«•ÅX÷QTXõ‹²¿þìÂ,'),
('¢=Þ‘°¹5nôÍö¸Ž', '[¼‘|l}U¨Ov{ieg', 'Á0¢B\ZrñAþq©J©N3', '‘fp÷è.èÈºš¦/¢˜öë÷°öˆtŠ`œM÷«E'),
('¢=Þ‘°¹5nôÍö¸Ž', '/<g)ýÿ> cÂ;ôû,', '¢˜öë÷°öˆtŠ`œM÷«E', 'š³l’\nä+Ø½näõ„ËÊé9}r³ø„³ñÙ¨Ð'),
('¢=Þ‘°¹5nôÍö¸Ž', 'XÖE2Í~ArÅÜ½ÙëX0', '‡ýO"$ž×R€YusÌ˜à', 'õÀúä%P¼éÊ ™×Ý­Ðò”B4Ý/%°­ý^.•\r'),
('¢=Þ‘°¹5nôÍö¸Ž', '1°wÑéeaß"¶{<', '‡ýO"$ž×R€YusÌ˜à', 'õÀúä%P¼éÊ ™×Ý­Ðò”B4Ý/%°­ý^.•\r'),
('¢=Þ‘°¹5nôÍö¸Ž', 'Ú´ràk%DbƒÈ•“Kc»', '‡ýO"$ž×R€YusÌ˜à', 'õÀúä%P¼éÊ ™×Ý­Ðò”B4Ý/%°­ý^.•\r'),
('¢=Þ‘°¹5nôÍö¸Ž', '«§y)É^Aùñ±†v7 t', '‡ýO"$ž×R€YusÌ˜à', 'õÀúä%P¼éÊ ™×Ý­Ðò”B4Ý/%°­ý^.•\r'),
('¢=Þ‘°¹5nôÍö¸Ž', 'åž†1îFg†­DŸ .y', '‡ýO"$ž×R€YusÌ˜à', 'õÀúä%P¼éÊ ™×Ý­Ðò”B4Ý/%°­ý^.•\r'),
('¢=Þ‘°¹5nôÍö¸Ž', '=ôÚ¨À—K‹E{îr.´&Ö', '±N‹¯Ð¹· òÁ¡•', '4±Zìß˜µï úuÇ$½¢ÜÌµ;/>d\ræ²J;p¨ÏÄ'),
('¢=Þ‘°¹5nôÍö¸Ž', '}ëÎ°\\zìoïv}î7’', '±N‹¯Ð¹· òÁ¡•', '4±Zìß˜µï úuÇ$½¢ÜÌµ;/>d\ræ²J;p¨ÏÄ'),
('¢=Þ‘°¹5nôÍö¸Ž', 'É†_Ô[º WfÓÃŠ', '±N‹¯Ð¹· òÁ¡•', '4±Zìß˜µï úuÇ$½¢ÜÌµ;/>d\ræ²J;p¨ÏÄ');

-- --------------------------------------------------------

--
-- Table structure for table `fileindex`
--

CREATE TABLE IF NOT EXISTS `fileindex` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  PRIMARY KEY (`file_id`),
  UNIQUE KEY `file_name` (`file_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fileindex`
--


-- --------------------------------------------------------

--
-- Table structure for table `jobs8home`
--

CREATE TABLE IF NOT EXISTS `jobs8home` (
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs8home`
--

INSERT INTO `jobs8home` (`name`, `password`, `email`, `contact`) VALUES
('AakashGoplani', '123456', 'goplaniaakash14@gmail.com', 8600223633),
('RashmiKhemani', '123456', 'rashmi.khemani@ves.ac.in', 1236547890),
('NeelimaNebhani', '123456', 'neelima.nembhani@ves.ac.in', 8087396268);

-- --------------------------------------------------------

--
-- Table structure for table `mmencryptedfileindex`
--

CREATE TABLE IF NOT EXISTS `mmencryptedfileindex` (
  `file_id` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmencryptedfileindex`
--


-- --------------------------------------------------------

--
-- Table structure for table `mmencryptedindex`
--

CREATE TABLE IF NOT EXISTS `mmencryptedindex` (
  `file_id` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `term_frequency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmencryptedindex`
--


-- --------------------------------------------------------

--
-- Table structure for table `mmfileindex`
--

CREATE TABLE IF NOT EXISTS `mmfileindex` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  PRIMARY KEY (`file_id`),
  UNIQUE KEY `file_name` (`file_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mmfileindex`
--


-- --------------------------------------------------------

--
-- Table structure for table `mmkeywordindex`
--

CREATE TABLE IF NOT EXISTS `mmkeywordindex` (
  `file_id` int(11) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `frequency` int(11) NOT NULL,
  `term_frequency` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mmkeywordindex`
--


-- --------------------------------------------------------

--
-- Table structure for table `modifiedindex`
--

CREATE TABLE IF NOT EXISTS `modifiedindex` (
  `file_id` int(11) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `frequency` int(11) NOT NULL,
  `term_frequency` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modifiedindex`
--


-- --------------------------------------------------------

--
-- Table structure for table `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `multimedia`
--


-- --------------------------------------------------------

--
-- Table structure for table `sa`
--

CREATE TABLE IF NOT EXISTS `sa` (
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `bloodgroup` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa`
--

INSERT INTO `sa` (`name`, `password`, `email`, `contact`, `bloodgroup`) VALUES
('AakashGoplani', '123456', 'goplaniaakash14@gmail.com', 8600223633, 'b+'),
('JyotiVaswani', '123456', 'jyoti.vaswani@ves.ac.in', 9969543210, 'a-'),
('Admin', '123456', 'be_a_cmpn@ves.ac.in', 2278965412, 'o+'),
('user123', '123456', 'user123@gmail.com', 9876543210, 'ab+');

-- --------------------------------------------------------

--
-- Table structure for table `topkencryptresults`
--

CREATE TABLE IF NOT EXISTS `topkencryptresults` (
  `file_id` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `idf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topkencryptresults`
--


-- --------------------------------------------------------

--
-- Table structure for table `topkresults`
--

CREATE TABLE IF NOT EXISTS `topkresults` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `idf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topkresults`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`password`,`email`,`contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--

