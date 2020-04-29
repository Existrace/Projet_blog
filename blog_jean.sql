-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 avr. 2020 à 16:45
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_jean`
--

-- --------------------------------------------------------

--
-- Structure de la table `adminuser`
--

CREATE TABLE `adminuser` (
  `ID_Admin` int(11) NOT NULL,
  `Username` char(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` char(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `User_Email` char(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `adminuser`
--

INSERT INTO `adminuser` (`ID_Admin`, `Username`, `Password`, `User_Email`) VALUES
(1, 'Cally', 'azerti', 'truc@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `ID_comment` int(11) NOT NULL,
  `Comment_Email` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Comment_Content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Comment_Date` datetime DEFAULT NULL,
  `ID_post` int(11) NOT NULL,
  `flag_reporting` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`ID_comment`, `Comment_Email`, `Comment_Content`, `Comment_Date`, `ID_post`, `flag_reporting`) VALUES
(68, 'samuel_jackson@outlook.fr', 'Now that we know who you are, I know who I am. I\'m not a mistake! It all makes sense! In a comic, you know how you can tell who the arch-villain\'s going to be? He\'s the exact opposite of the hero. And most times they\'re friends, like you and me! I should\'ve known way back when... You know why, David? Because of the kids. They called me Mr Glass.', '2020-04-28 11:47:21', 4, 0),
(76, 'love_wolf@outlook.fr', 'Super article, on en sait plus sur l\'habitat des loups en Alaska !', '2020-04-29 11:39:52', 2, NULL),
(79, 'lord_fannard@hotmail.com', 'j\'aime beaucoup ce nom donné à l\'Alaska !', '2020-04-29 13:47:42', 4, NULL),
(82, 'death_throne@hotmail.fr', 'My child, I watched with pride as you grew into a weapon of righteousness. Remember, our line has always ruled with wisdom and strength.', '2020-04-29 13:52:39', 1, NULL),
(85, 'search_dune@hotmail.fr', 'Make Alaska great again', '2020-04-29 15:16:35', 3, NULL),
(86, 'dark_glouch@hotmail.fr', 'j\'aime bien!', '2020-04-29 16:19:02', 1, NULL),
(87, 'truc@machin@yahoo.fr', 'yeah love it', '2020-04-29 16:19:13', 1, NULL),
(88, 'darth_love@gmail.com', 'Trop cool !', '2020-04-29 16:19:31', 2, NULL),
(89, 'lara_daniel@mediateque.com', 'J\'aime bien, je vais m\'en inspirer !', '2020-04-29 16:19:52', 2, NULL),
(90, 'yeah@yahoo.fr', 'Brrr !', '2020-04-29 16:20:09', 3, NULL),
(91, 'dontcare@lol.com', 'I don\'t care about that, you\'re useless dude', '2020-04-29 16:20:34', 1, 1),
(93, 'useless@hotmail.fr', 'useless dumb', '2020-04-29 16:37:28', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `ID_post` int(11) NOT NULL,
  `title` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Post_Content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Post_Date` datetime DEFAULT NULL,
  `ID_Admin` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`ID_post`, `title`, `Post_Content`, `Post_Date`, `ID_Admin`, `slug`) VALUES
(1, 'Alaska des temps modernes', 'Nulla tempus ligula sapien, vel congue libero finibus non. Quisque quis eros porttitor, ultricies augue sit amet, porta erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean sagittis purus vitae consectetur dapibus. Aenean ullamcorper arcu ante, vitae venenatis felis fermentum eu. Nam in tortor eu eros elementum volutpat. Fusce vulputate eleifend quam a efficitur. Proin non elit tempor, consectetur mi vitae, ultricies risus. Nullam commodo justo vitae nisl consequat tincidunt ut sed felis. Nullam varius leo a leo ullamcorper dignissim. Proin auctor turpis ac tortor tempor, non rhoncus nulla semper.\r\n\r\nPraesent dignissim massa tincidunt ex vulputate tristique. Pellentesque pretium luctus nulla eu euismod. Proin vitae eros eu purus congue facilisis. Suspendisse mauris velit, posuere et enim non, ultricies lobortis ex. Donec non consequat nulla. Quisque non quam odio. Curabitur et nunc interdum, congue augue ultricies, egestas eros. In posuere vel mi sed mollis. Maecenas malesuada lectus sagittis dui euismod, non convallis lorem elementum. Proin iaculis mi quis sapien fringilla, tincidunt scelerisque justo sagittis.\r\n\r\nNunc vitae mauris ut ante convallis pharetra. Proin elementum eleifend tellus sit amet finibus. Donec viverra ultricies ex nec fermentum. Morbi eros ipsum, vestibulum a enim et, vehicula pulvinar nisl. Proin vitae sodales nulla, at rhoncus mi. Mauris maximus mattis justo, a semper urna volutpat a. Cras congue, mi ut elementum sodales, urna est malesuada lacus, ut blandit libero nisl at velit. Phasellus id semper velit. Nunc cursus mollis ex et varius. Maecenas nec felis nec neque fringilla laoreet.\r\n\r\nInteger quis auctor purus. Vestibulum a fringilla velit. Curabitur accumsan condimentum nisl eget laoreet. Suspendisse potenti. Proin sapien felis, placerat eget mattis pretium, volutpat in turpis. Suspendisse non nunc quis dolor tincidunt porta sed ac diam. Nam rhoncus, risus quis consequat viverra, urna nisl rutrum leo, nec tincidunt dui lectus vitae lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie dignissim ipsum, a interdum dui.\r\n\r\nPhasellus turpis urna, aliquam mollis volutpat eu, placerat nec risus. Proin ullamcorper arcu ut augue venenatis luctus. Pellentesque augue ligula, pharetra eu nisi at, luctus maximus tellus. Curabitur maximus mi lacus, vitae auctor nibh luctus sit amet. Vivamus nec condimentum magna. Aliquam vestibulum pretium lorem non efficitur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec eu maximus massa. Integer a enim pretium, lobortis lorem non, euismod nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce mattis diam sit amet eros tempus vestibulum. Fusce ornare dolor nec purus varius, non fringilla justo feugiat. Praesent scelerisque quis tellus posuere ullamcorper. Aenean ultrices eleifend mattis.', '2020-04-23 17:40:51', 1, 'alaska-des-temps-modernes'),
(2, 'Royaume des loups', 'In fringilla, leo nec ultricies luctus, magna dui cursus dolor, vitae consequat nunc lectus a sapien. Pellentesque a lorem interdum, pretium lectus nec, commodo quam. Pellentesque lacinia aliquet euismod. Nunc eu leo maximus, varius quam cursus, eleifend odio. Pellentesque et odio turpis. Pellentesque et purus semper, pulvinar elit vel, auctor metus. Cras congue nunc a eros semper faucibus. Etiam hendrerit nunc at justo venenatis molestie. Morbi quis viverra nibh. Curabitur viverra tellus a tellus venenatis pharetra. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed dictum lectus vitae urna faucibus vestibulum.\r\n\r\nDonec id egestas ipsum. Cras eu elementum orci. Sed porttitor magna id enim pellentesque, sed dignissim metus posuere. Nunc placerat nisl metus, at vulputate nulla tempus quis. In hac habitasse platea dictumst. Quisque ut pharetra justo. Morbi gravida tellus ultricies pulvinar pretium. In finibus diam eget neque dictum consectetur. Cras ultrices consequat quam non molestie. Sed rutrum faucibus augue, nec egestas justo. Vestibulum hendrerit libero at purus venenatis, quis dignissim eros sagittis. Donec nec tortor ex. Aenean eget dignissim purus. Nunc ligula ex, egestas ac velit et, maximus porta nulla.\r\n\r\nPhasellus venenatis lorem mauris, vitae fermentum nunc pellentesque id. Nunc velit magna, porttitor vitae vestibulum quis, efficitur sed arcu. Ut malesuada dolor sit amet tristique pellentesque. Donec magna dui, varius aliquam libero a, porttitor mollis erat. Aenean ut bibendum tellus. Phasellus in pretium sapien. Morbi quis justo justo. Aenean lacus dui, cursus eu nulla eu, vulputate rhoncus leo.\r\n\r\nAliquam eu placerat purus. Nam eu ligula massa. Quisque sollicitudin quam venenatis tellus vulputate, id interdum elit ornare. Mauris consequat augue sed nunc gravida feugiat. Proin consectetur leo et convallis dignissim. Sed porttitor, velit non faucibus scelerisque, dolor sapien vestibulum erat, eget congue tellus nunc gravida arcu. Maecenas fermentum varius risus, nec maximus urna venenatis quis. Cras porta at neque ut suscipit. Sed dictum eros eu nisl pharetra, ut eleifend quam convallis. Vivamus urna nibh, maximus non scelerisque pharetra, viverra id nisi.\r\n\r\nNam vitae nulla felis. Curabitur id felis malesuada, aliquam magna quis, congue turpis. Duis id porta nisi. Nam condimentum nibh nec lorem venenatis, id luctus diam vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce ac justo sed justo sodales faucibus. Integer et eros leo. Pellentesque velit nisl, sollicitudin quis nisi et, commodo auctor est. Integer est ligula, sagittis a cursus vel, venenatis a odio. Ut mauris ligula, placerat a volutpat et, pellentesque et ligula. Nunc quis sodales mi.', '2020-04-23 11:01:59', 1, 'royaume-des-loups'),
(3, ' Alaska, froid mordant', '<p>Morbi a tortor enim. Nam at luctus ante. Aenean est neque, placerat suscipit scelerisque bibendum, sollicitudin id tellus. Aliquam auctor mauris vel arcu pulvinar, et ornare ipsum aliquam. Cras euismod dolor sit amet erat fringilla cursus. Maecenas eget ante convallis, ornare odio in, ultricies eros. In dui tortor, posuere non porttitor eu, ullamcorper vel augue. Mauris tempor diam sit amet augue placerat auctor. Sed fringilla, neque vitae mattis lacinia, orci nunc luctus sem, eu scelerisque tellus quam sit amet libero. Nam id tincidunt orci. Sed cursus aliquet pharetra. Quisque nisi neque, hendrerit mollis accumsan nec, dignissim in nunc. Nulla iaculis, neque hendrerit viverra ultricies, nibh sem semper orci, at placerat nisl ipsum at orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque ultrices nunc nec nisl finibus luctus. In finibus convallis magna, in ultricies ligula vehicula in. Aliquam erat volutpat. Maecenas id erat ultrices, aliquam nisi sit amet, vulputate libero. Interdum et malesuada fames ac ante ipsum primis in faucibus. In pulvinar vehicula tincidunt. Sed lectus odio, porta quis dolor nec, placerat convallis lacus. Donec nulla nisi, aliquet eu nunc eleifend, laoreet maximus urna. Mauris a lobortis orci. Morbi rhoncus porta aliquet. Fusce malesuada cursus libero, sit amet aliquet nulla ultricies et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce vitae scelerisque nulla. Cras pulvinar mattis urna, ac egestas sapien pellentesque ut. Nulla volutpat ipsum lacus, eu euismod ante finibus nec. Praesent quis ipsum ac erat lobortis commodo in dictum magna. Fusce pretium vitae sem nec lacinia. Etiam nisi ipsum, lobortis ac tellus at, pellentesque bibendum nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus eleifend iaculis ipsum non finibus. In hac habitasse platea dictumst. Maecenas sed magna tortor. Modif.</p>', '2020-04-23 15:22:48', 1, 'alaska-froid-mordant'),
(4, 'La terre du soleil de minuit', 'Quisque ut urna nec tortor gravida porttitor. Sed et hendrerit sem. Integer venenatis nisl vitae tortor faucibus imperdiet. In pulvinar suscipit tortor nec molestie. Nulla sit amet vehicula tellus. Pellentesque accumsan mi in metus aliquet ultricies. Mauris volutpat ante ac ex imperdiet, ac congue ex vulputate. Donec elementum nulla a nibh sollicitudin, in gravida velit pretium. Nullam nisl leo, luctus sed luctus non, ullamcorper sollicitudin arcu. Vivamus arcu ante, sodales quis gravida et, imperdiet eleifend lectus. Aliquam blandit odio sit amet elit auctor fermentum. In faucibus consequat condimentum. Donec malesuada consequat laoreet. Proin euismod aliquam tellus, a vehicula nisl luctus id. In et dignissim lacus.\r\n\r\nFusce tincidunt eros quis metus pellentesque, non pulvinar massa varius. Duis cursus quam nec leo viverra fringilla. Phasellus ut mattis sapien, id placerat leo. Ut a molestie ante, ac ultrices velit. In cursus mi hendrerit, gravida justo ullamcorper, suscipit elit. Sed dolor libero, ullamcorper sit amet arcu eu, accumsan hendrerit lacus. Curabitur sed ornare nunc. Nullam a porttitor sem.\r\n\r\nNam sed semper arcu. Maecenas maximus arcu vel est placerat, vitae bibendum enim gravida. Fusce eu malesuada mauris. Maecenas vulputate ornare leo ornare rutrum. Sed lobortis sapien non pellentesque pharetra. Suspendisse ut purus ultrices ipsum sodales interdum. Sed imperdiet eros quam, scelerisque feugiat nunc commodo et. Maecenas mattis fermentum ipsum vel interdum. Pellentesque mollis metus nulla, nec congue ipsum egestas ut. Ut turpis leo, interdum vel velit lacinia, euismod laoreet tellus. Vestibulum posuere tincidunt magna blandit congue. Vestibulum malesuada eu odio a gravida. Proin mollis at sapien ut auctor. In porttitor, arcu nec auctor fringilla, libero mauris maximus ligula, eget dapibus nisi massa placerat enim. Nullam porttitor purus at arcu pulvinar consequat.\r\n\r\nNullam sagittis magna vitae diam semper dictum. Nulla et mollis nibh. Morbi vitae nunc eget dolor accumsan mattis. In fringilla aliquet risus, et euismod metus scelerisque ut. In eget pulvinar lacus, in eleifend lectus. Phasellus porta, diam a placerat pulvinar, augue sapien tempus quam, et semper sem lacus et dolor. Mauris nulla lacus, sollicitudin consectetur dolor vel, iaculis laoreet quam. Aenean velit dolor, hendrerit ut maximus vel, elementum et nulla. Sed bibendum, ante a dapibus pellentesque, nulla augue tincidunt orci, sit amet accumsan nisl lectus et lorem. Morbi sollicitudin nisi dictum felis tempor, scelerisque bibendum dolor euismod. Vestibulum dignissim turpis ultricies tortor suscipit, id pretium ex vulputate. Nullam vehicula felis et mauris maximus, et cursus ligula semper.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vestibulum gravida felis sit amet fringilla. Pellentesque semper erat sit amet tempus vulputate. Mauris semper, sem eu bibendum malesuada, ipsum quam consectetur orci, nec dapibus ex ante at dui. Mauris sit amet finibus metus, at suscipit enim. Aliquam gravida molestie rhoncus. Ut lorem lectus, tempor at nisl sit amet, vestibulum consequat urna. Sed purus odio, venenatis sed elementum a, aliquet vitae nunc. Phasellus consequat elit vitae est semper, id vestibulum orci laoreet. Maecenas condimentum metus mauris, nec pharetra sapien bibendum quis. Phasellus sed magna id elit sagittis pharetra a nec diam. Duis id felis massa. Suspendisse potenti. Integer eget volutpat turpis. Vivamus leo est, vulputate id vulputate nec, porta laoreet nisi.', '2020-04-23 15:24:18', 1, 'la-terre-du-soleil-de-minuit'),
(12, 'Spécialités Alaskiennes', '<p>My money\'s in that office, right? If she start giving me some bullshit about it ain\'t there, and we got to go someplace else and get it, I\'m gonna shoot you in the head then and there. Then I\'m gonna shoot that bitch in the kneecaps, find out where my goddamn money is. She gonna tell me too. Hey, look at me when I\'m talking to you, motherfucker. You listen: we go in there, and that nigga Winston or anybody else is in there, you the first motherfucker to get shot. You understand?</p>\r\n<p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don\'t know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I\'m breaking now. We said we\'d say it was the snow that killed the other two, but it wasn\'t. Nature is lethal but it doesn\'t hold a candle to man.</p>\r\n<p>Well, the way they make shows is, they make one show. That show\'s called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they\'re going to make more shows. Some pilots get picked and become television programs. Some don\'t, become nothing. She starred in one of the ones that became nothing.</p>\r\n<p>Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most popular gun in American crime. Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime.&nbsp;</p>\r\n<p>&nbsp;</p>', '2020-04-28 18:00:20', 1, 'specialites-alaskiennes');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID_comment`),
  ADD KEY `FK_post` (`ID_post`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID_post`),
  ADD KEY `FK_AdminUser` (`ID_Admin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `ID_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_post` FOREIGN KEY (`ID_post`) REFERENCES `post` (`ID_post`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_AdminUser` FOREIGN KEY (`ID_Admin`) REFERENCES `adminuser` (`ID_Admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
