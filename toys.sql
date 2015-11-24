-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2015 at 06:45 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toys`
--

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE IF NOT EXISTS `age` (
  `age_id` int(11) NOT NULL,
  `age` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`age_id`, `age`) VALUES
(1, 'Above 1 Year'),
(2, 'Above 3 Years'),
(3, 'Above 5 Years'),
(4, 'Above 7 Years'),
(5, 'Above 10 Years'),
(6, 'Above 15 Years'),
(7, 'All Age Groups');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Educational'),
(2, 'Outdoor and Sports'),
(3, 'Puzzles'),
(4, 'Board Games'),
(5, 'Musical Toys'),
(6, 'Soft Toys'),
(7, 'Video Games'),
(8, 'Water Toys'),
(9, 'Vehicles'),
(10, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Both');

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE IF NOT EXISTS `purchased` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0',
  `address` text NOT NULL,
  `toy_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`purchase_id`, `user_id`, `status`, `address`, `toy_id`) VALUES
(13, 3, 1, '7825 McCallum Blvd', 32),
(14, 3, 1, '7825 McCallum Blvd', 39),
(15, 2, 1, '800 west renner road', 54),
(16, 2, 1, '800 west renner road', 54);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `toys`
--

CREATE TABLE IF NOT EXISTS `toys` (
  `toy_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `age_group_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `toy_name` text NOT NULL,
  `description` text NOT NULL,
  `image_url` text NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`toy_id`, `category_id`, `gender_id`, `age_group_id`, `price`, `toy_name`, `description`, `image_url`, `deleted`) VALUES
(22, 7, 1, 7, 399.99, 'Xbox One 1 TB Holiday Bundle', 'Own the Xbox One 1TB Holiday Bundle, featuring Gears of War: Ultimate Edition, Rare Replay, and a full-game download of Ori and the Blind Forest. Play and store more games than ever, including your Xbox 360 games, with the 1TB hard drive. Experience the original Gears of War rebuilt from the ground up in 1080p, including 60FPS competitive multiplayer with 19 maps and six game modes, and five campaign chapters never released on console. Play a jaw-dropping collection of 30 iconic games with Rare Replay, from Battletoads and Banjo-Kazooie to Perfect Dark and more. And immerse yourself in the critically acclaimed action-platformer, Ori and the Blind Forest. Experience the greatest games lineup in Xbox history this year with exclusives like Halo 5: Guardians, Rise of the Tomb Raider, and Forza Motorsport 6. With new features added all the time, and over two hundred since launch, there is never been a better time to jump ahead with Xbox One.', 'http://www.toysrus.com/graphics/tru_prod_images/Xbox-One-1-TB-Holiday--pTRU1-22160278dt.jpg', 0),
(23, 3, 3, 1, 15.99, 'LEGO DUPLO My First Farm (10617)', 'Play and learn on the farm! The big and chunky bricks make LEGOÂ® DUPLOÂ® My First Farm an ideal introduction to basic construction skills. The brightly colored LEGO DUPLO bricks are designed specially to be safe and suitable for little hands. Use the animal figures and special decorated bricks to teach any little farmer about life on the farm - talk about animal noises and the foods that animals produce. Start your stories with this easy-to-build set and help the 2 LEGO DUPLO figures discover life on the farm. Combine with 10615 LEGO DUPLO My First Tractor for even more barnyard fun. Includes 2 child LEGO DUPLO figures plus a sheep, cow and a chicken.', 'http://www.toysrus.com/graphics/tru_prod_images/LEGO-DUPLO-My-First-Farm--pTRU1-19393485dt.jpg', 0),
(24, 3, 3, 2, 15.99, 'LEGO DUPLO LEGO Ville Farm Tractor', 'Climb aboard the Farm Tractor and drive out to the shelter where the friendly cow is waiting to be fed. Lift the trailer bucket, offload the food and help the old farmer to give the cow a tasty meal before it settles down for a nap. And if the Tractor breaks down, fix it once more with the oil can and wrench. This fun set also includes a fence and a selection of bright, colorful LEGO DUPLO bricks. Includes an old farmer LEGO DUPLO figure.', 'http://www.toysrus.com/graphics/tru_prod_images/LEGO-DUPLO-LEGO-Ville-Farm--pTRU1-17780759dt.jpg', 0),
(25, 3, 3, 2, 13.99, 'LEGO DUPLO Creative Ice Cream', 'Create the tastiest Creative Ice Cream out of LEGO DUPLO bricks! This amazing set features a collection of colorful DUPLO brick scoops of tasty ice cream, fun toppings and cones. Your child will love to stack the large, tactile bricks and serve up fun ice cream combinations for the whole family!', 'http://www.toysrus.com/graphics/tru_prod_images/LEGO-DUPLO-Creative-Ice-Cream--pTRU1-17664744dt.jpg', 0),
(26, 8, 2, 2, 10, 'HEXBUGÂ® AquaBotâ„¢ 4 Pack', 'This set of HEXBUG Aquabot includes a variety of fish to keep kids entertained for hours! Each set comes with one Hammerhead Shark, Clownfish, Angelfish and Glow-in-the-Dark Shark. These hi-tech swimmers are powered by electro-magnetic propulsion and an automatic on and off sensor that activates when submerged in water. Each fish will propel around to explore their environment, swimming, diving and changing directions. After five minutes without activity, the HEXBUG Aquabot will go into sleep mode and wake when activated. Now you can truly experience the fun of having a pet fish collection, without all the messy clean-up! ', 'http://www.toysrus.com/graphics/tru_prod_images/HEXBUG%C2%AE-AquaBot&153;-4-Pack--pTRU1-19301068dt.jpg', 0),
(27, 8, 2, 2, 19.99, 'HEXBUGÂ® AquaBotâ„¢ 2.0 Shark Tank', 'Introducing the HEXBUG Aquabot 2.0 Shark Tank, an expanded interactive environment for kids to play with their Aquabot collection, providing the fun experience of having a pet fish, without all the messy clean-up! Each Shark Tank comes with an Angelfish, engineered with smart fish technology, including a Tap on Tank wake sensor and an inner LED glow that makes it appear more alive than ever before! After five minutes without activity, the Aquabot 2.0 will go into sleep mode to conserve battery life, but this smart fish is equipped a hi-tech sensor that allows you to wake it by tapping on the tank. The Shark Tank encourages kids to let their imaginations run wild as they design their own underwater landscape with brightly colored coral pieces, and have the ability to snatch their Aquabot right out of the water using the new, action-ready shark accessory.', 'http://www.toysrus.com/graphics/tru_prod_images/HEXBUG%C2%AE-AquaBot&153;-2.0-Shark-Tank--pTRU1-18008661dt.jpg', 0),
(28, 8, 3, 2, 10.39, 'HEXBUGÂ® AquaBotâ„¢ Glow in the Dark Zombie', 'The Zombie Aquabot is equipped with an automatic on and off sensor that activates when submerged in water, a design element meant to get kids thinking about the science behind the robot. Powered by electro-magnetic propulsion, the Zombie Aquabot swims just like a real fish, diving down and around to explore its environment.', 'http://www.toysrus.com/graphics/tru_prod_images/HEXBUG%C2%AE-AquaBot&153;-Glow-in-the--pTRU1-18437807dt.jpg', 0),
(29, 10, 1, 7, 8.99, 'Marvel Hulk and the Agents of S.M.A.S.H. Red Hulk Hero Mask', 'Feel just like the arch-enemy of most powerful Avenger of all with this awesome Red Hulk Hero Mask! When you put the mask on, you will be battle-ready to smash just like the Red Hulk! All who oppose you will fear your power. See the world through the eyes of your favorite hero-smashing villain!\r\n\r\nMarvel products are produced by Hasbro under license from Marvel Characters B.V.', 'http://www.toysrus.com/graphics/tru_prod_images/Marvel-Hulk-and-the-Agents--pTRU1-18206197dt.jpg', 0),
(30, 10, 1, 7, 10.99, 'Marvel X-Men Wolverine Hero Mask', 'Suit up for battle like your favorite mutant superhero with this fierce Wolverine Hero Mask! The mask lets you take on the identity of Wolverine for extra realistic action. With the Wolverine Claw toy on your hand (sold separately) you will be ready for a hardcore mutant attack on the bad guys! \r\n', 'http://www.toysrus.com/graphics/tru_prod_images/Marvel-X-Men-Wolverine-Hero-Mask--pTRU1-17921202dt.jpg', 0),
(31, 10, 1, 5, 2.99, 'Batman Cowl Mask', 'Become Batman in this highly-detailed Batsuit including cowl, sculpted chest plate, soft cape and wrist gauntlets. Cowl and wrist gauntlets have adjustable straps for an easy fit. Highly detailed chest plate is made of soft & safe, flexible material with adjustable straps for easy fit and sizing. (Each item is sold seperately)', 'http://www.toysrus.com/graphics/tru_prod_images/Batman-Cowl-Mask--pTRU1-19189030dt.jpg', 0),
(32, 2, 1, 4, 12.99, 'NERF Firevision Sports - Football', 'Energize your football play with the bright blazing light of this awesome Firevision Sports Football! Includes Firevision Frames to activate ball. The balls unique Microprism Technology lets you play for hours with blazing energy and a bright glow with no charging. Whether you are slamming through a hardcore game or scrimmaging with a friend, you will be at the top of your game with the Firevision Sports Football and activation frames! ', 'http://www.toysrus.com/graphics/tru_prod_images/NERF-Firevision-Sports---Football--pTRU1-12844831dt.jpg', 0),
(33, 9, 1, 2, 12.99, 'Stats Soft Bounce Pogo Stick', 'Stats Soft Bounce Pogo Stick for kids .Made from soft, durable foam .Stretchy bungee accommodates any height .Built in squeaker squeaks with every hop.', 'http://www.toysrus.com/graphics/tru_prod_images/Stats-Soft-Bounce-Pogo-Stick--pTRU1-20509946dt.jpg', 0),
(34, 9, 3, 3, 23.34, 'Sumo Bumper Bopper', 'More fun than bumper cars, our inflatable Sumo Bumper Bopper has a fun, bop and sock design! Bop, sock and bump! Fun for everyone! ', 'http://www.toysrus.com/graphics/tru_prod_images/Sumo-Bumper-Bopper--pTRU1-13268248dt.jpg', 0),
(35, 6, 1, 2, 7.88, 'Barbie in Princess Power Reporter Ken Doll', 'In Barbie in Princess Power movie, a modern-day princess is kissed by a magical butterfly and discovers she has super powers. Will she join forces with her super friends and rid the kingdom of its enemy? The kingdom is curious reporter is on board and ready to document the moment in his iconic look: jeans, short-sleeve button-down shirt, trendy reporter glasses and lightning bolt-printed tie. Girls will love recreating scenes and imagining new adventures with this key character! Includes Reporter doll wearing fashion and accessories. Ages 3 and older.', 'http://www.toysrus.com/graphics/tru_prod_images/Barbie-in-Princess-Power-Reporter--pTRU1-19290699dt.jpg', 0),
(36, 6, 1, 3, 10.98, 'Barbie Fashionistas Ken Doll', 'Barbie Fashionistas Ken Doll: Consider this your personal invitation to party with the Fashionistas dolls! Dressed for a night of festive mixing and mingling, this stylishly handsome Ken doll is dressed for a night on the town - whether with his Fashionistas friends or his gorgeous girlfriend Barbie doll. Handsome as ever, he sports his signature golden tan and is outfitted in a printed shirt, casual khakis and brown loafers. Mix and match with Ryan doll (sold separately) to create your own spin on style! With dynamic poses, he looks dashing and ready to dash. Collect his friends (each sold separately) to expand the options and the guest list! Doll cannot stand alone. Ages 3 and older.', 'http://www.toysrus.com/graphics/tru_prod_images/Barbie-Fashionistas-Ken-Doll--pTRU1-18058197dt.jpg', 0),
(37, 6, 2, 2, 20.09, 'Barbie Store It All Carrying Case', 'Wow, a durable storage case designed to fit in your closet or roll in the house with our Barbie Store It All Carrying Case! Lift the handle and wheel the case everywhere you go.', 'http://www.toysrus.com/graphics/tru_prod_images/Barbie-Store-It-All-Carrying--pTRU1-2895020dt.jpg', 0),
(38, 9, 1, 5, 40.99, 'Lil Fishys Pirate Ship Interactive Habitat', 'Lil Fishys Pirate Ship Interactive Habitat is a Sunken Pirate Ship Playset that includes an authentic-looking sailing vessel that appears to be on the bottom of the sea. This playset features a special Lil Fishys shark that patrols and protects the ship as it swims throught-out the 19 x 10 wide tank that lies beneath the deep blue sea. Also has special trick latches that are triggered for extra fun and excitement. ', 'http://www.toysrus.com/graphics/tru_prod_images/Lil-Fishys-Pirate-Ship-Interactive--pTRU1-18321723dt.jpg', 0),
(39, 3, 1, 5, 10.57, 'Mega Bloks Call of Duty Attack Turret Building Set', 'The Attack Turret features an iconic World War II style anti-aircraft cannon manned by two Allied infantry troops. This buildable heavy-caliber cannon measures 5.8 inches L x 3.8 inches W x 2.4 inches H, can rotate a full 360 degrees and move over 90 degrees vertically. It comes with seven artillery shells, with which to recreate immortalized scenes of legendary soldiers reloading the cannon and firing at enemy aircraft. The Turret Attack includes two extremely poseable micro action figures and highly detailed, authentic interchangeable WWII accessories and weapons.', 'http://www.toysrus.com/graphics/tru_prod_images/Mega-Bloks-Call-of-Duty--pTRU1-17951542dt.jpg', 0),
(40, 5, 2, 5, 100, 'First Act Discovery Designer Acoustic Guitar - Pink Winged Heart', 'The First Act Discovery designer acoustic guitar is perfect for beginning players. With great tone, comfort, and playability, it is sized especially for young players. Thin frets and low string action make it easier to play. All First Act Discovery guitars include patented string post covers to protect little fingers and exclusive Learn-a-Chord cards to get kids started playing right away. ', 'http://www.toysrus.com/graphics/tru_prod_images/First-Act-Discovery-Designer-Acoustic--pTRU1-10941825dt.jpg', 0),
(41, 5, 3, 4, 50, 'First Act Discovery Acoustic Guitar - Natural', 'Sound meets style! The perfect instrument for your budding music star. Sized especially for kids, this guitar has easy playability and great tone. All First Act Discovery guitars come with patented string post covers to protect little fingers and our exclusive Learn-a-Chord cards to get young players started playing right away.\r\n', 'http://www.toysrus.com/graphics/tru_prod_images/First-Act-Discovery-Acoustic-Guitar--pTRU1-6003577dt.jpg', 0),
(42, 5, 3, 3, 7.99, 'First Act Designer Guitar Picks', 'Pick your style! These durable, medium gauge guitar picks are the perfect accessory for those who want play with a softer touch, whether on acoustic, electric, or bass. This package of 12 features six different color and graphic combinations with fun, stylish designs to match your mood. ', 'http://www.toysrus.com/graphics/tru_prod_images/First-Act-Designer-Guitar-Picks--pTRU1-4999331dt.jpg', 0),
(43, 9, 1, 6, 20.99, 'MXS Stunt Ramp Playset', 'The MXS Ultimate Stunt Ramp lets you perform extreme freestyle motocross stunts just like the pros! Adjustable ramp allows for multiple stunt options. Works with all 1:16 scale MXS bike & riders using the included stunt clip. Use the MXS Freestyle bike & rider (sold separately) for even more extreme stunt action!', 'http://www.toysrus.com/graphics/tru_prod_images/MXS-Stunt-Ramp-Playset--pTRU1-17998346dt.jpg', 0),
(44, 7, 1, 5, 14.98, 'Trivial Pursuit Hints Game', 'Take your trivia game to the next level with this awesome electronic Trivial Pursuit Hints game! With each turn in the game, you and your team have 2 minutes to answer as many questions as you can. But if you do not know the answer, you can get up to 3 hints to help you figure it out! If your team answers the most questions with the fewest hints after 4 turns, you are the Trivial Pursuit champs!', 'http://www.toysrus.com/graphics/tru_prod_images/Trivial-Pursuit-Hints-Game--pTRU1-18170991dt.jpg', 0),
(45, 7, 1, 4, 18.99, 'Catch Phrase Decades Game', 'Grab it, guess it and pass it! This challenging electronic Catch Phrase game challenges you to come up with words and phrases from 5 different decades, but you have to pass the game fast so you do not get caught holding the bag! Can you give your teammates the right clues so they can guess the word or phrase on the game units screen? You cannot rhyme or use first letters or parts of the word, so you will have to put your thinking cap on fast. Once your team has guessed it, pass the unit to the other team. When the buzzer goes off, whoever has the unit loses a point to the other side - so move fast! When your team gets to 7 points, you win!\r\n', 'http://www.toysrus.com/graphics/tru_prod_images/Catch-Phrase-Decades-Game--pTRU1-18171119dt.jpg', 0),
(46, 2, 1, 7, 2.98, 'BOOMco. Ultimate Rounds Pack', 'HaveABlast with BOOMco.! Our awesome Smart Stick system lets you see exactly where you nailed it! Boost your battle play with the Ultimate Rounds Pack, six 2 inches ball-shaped rounds made completely of Smart Stick material so they stick to all BOOMco. targets and shields! Toss them for added firepower on the battlefield! Each round is composed of 2 detachable sides so you can mix and match colors. The pack also comes with a Smart Stick target to create your own battle zone! Ages 6 and older.', 'http://www.toysrus.com/graphics/tru_prod_images/BOOMco.-Ultimate-Rounds-Pack--pTRU1-18885150dt.jpg', 0),
(47, 6, 2, 3, 39.98, 'FurReal Friends Get Up and Go Go My Walkin Pup Pet', 'A day together is the best day ever with your adorable Get Up and GoGo My Walkin Pup pet! She is your very own pup to take on walks and more! Take her for a walk on her leash, pet her head and she will sit for you. When you talk to her she will bark back with sweet ruffs and other puppy sounds. Her tail wags and her head even tilts to show off her personality. Your Get Up and GoGo My Walkin Pup pet can even talk to your Pom Pom My Baby Panda pet (sold separately)! \r\n', 'http://www.toysrus.com/graphics/tru_prod_images/FurReal-Friends-Get-Up-and--pTRU1-18036494dt.jpg', 0),
(48, 4, 1, 4, 7.98, 'Elefun and Friends Chutes and Ladders Board Game', 'Join Elefun & Friends characters in this fun up-and-down version of the classic Chutes and Ladders game! You and your character, whether its Chasin Cheeky, Giraffalaff or Hungry Hippo, can see the square marked 100, but its not so easy to get there. If you land on the right spot you can shimmy up a ladder, but land on the wrong spot and you will shoot down a chute! Spin the spinner to see how many spots you will move - and whether your new spot will send your character down or move you up, up, up!', 'http://www.toysrus.com/graphics/tru_prod_images/Elefun-and-Friends-Chutes-and--pTRU1-18212518dt.jpg', 0),
(49, 4, 2, 3, 10.88, 'Doc McStuffins Operation Board Game', 'Doc McStuffins is under the weather, and its up to you to operate! Can you fix his boo-boos without tripping off the buzzer? Use your best operating moves to remove his ailments, and be the one to use the most bandages to win!\r\n', 'http://www.toysrus.com/graphics/tru_prod_images/Doc-McStuffins-Operation-Board-Game--pTRU1-16102372dt.jpg', 0),
(50, 4, 3, 7, 8.99, 'Connect 4 Game', 'Challenge a friend to disc-dropping fun with the classic game of Connect 4! Drop your red or yellow discs in the grid and be the first to get 4 in a row to win. If your opponent is getting too close to 4 in a row, block them with your own disc! Whoever wins can pull out the slider bar to release all the discs and start the fun all over again!\r\n', 'http://www.toysrus.com/graphics/tru_prod_images/Connect-4-Game--pTRU1-16504056dt.jpg', 0),
(51, 1, 2, 4, 9.98, 'VTech InnoTab Learning Game Cartridge - Team Umizoomi', 'Take learning to the next level with the Team Umizoomi learning game cartridge for the VTech InnoTab systems! This cartridge includes three interactive learning games that use the color touch screen or tilt sensor to play. Your child will have fun as they learn about matching, counting, sequencing, and more. Kids can also read along with an e-book featuring Team Umizoomi while the pop-up dictionary gives animated definitions of words found in the e-book. Engaging creative activities allow kids to play and create with their favorite characters.', 'http://www.toysrus.com/graphics/tru_prod_images/VTech-InnoTab-Learning-Game-Cartridge--pTRU1-13317239dt.jpg', 0),
(52, 1, 2, 2, 49.98, 'LeapFrog LeapReader Toys R Us Starter Kit - Green', 'Bundle includes: LeapReader Reading & Writing System ? green, LeapReader writing workbook : Learn to Write Letters with Mr. Pencil and LeapReader and 3D book Disney?Pixar Monsters University. LeapReader helps your child learn to read and write by building reading fundamentals and guiding letter strokes. ', 'http://www.toysrus.com/graphics/tru_prod_images/LeapFrog-LeapReader-Toys-R-Us--pTRU1-16791188dt.jpg', 0),
(53, 2, 3, 3, 8.99, 'Mickey Mouse Adventure Hut Play Tent', 'Young Disney fans will love this Mickey Mouse Adventure Hut Play Tent from Playhut! This kid-sized play structure will allow for hours of fun activity. Hot Dog! We have got ears, it is time for cheers with Mickey Mouse! Get ready for some club house fun with our selection of toys, games, accessories, clothing, baby care, and more right here at Toys R Us!', 'http://www.toysrus.com/graphics/tru_prod_images/Mickey-Mouse-Adventure-Hut-Play--pTRU1-19132221dt.jpg', 0),
(54, 1, 3, 4, 4.99, 'Hoppy Learning with Harry the Bunny DVD', 'This item can be shipped to the entire United States including Alaska, Hawaii, and all U.S. territories including Puerto Rico. This item can also be shipped to APO/FPO addresses and to P.O. Boxes in all 50 states', 'http://www.toysrus.com/graphics/tru_prod_images/Hoppy-Learning-with-Harry-the--pTRU1-18369322dt.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email_id` text NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email_id`, `role_id`) VALUES
(1, 'admin', '123', 'sujitsajja@outlook.com', 1),
(2, 'sujit', 'sujit', 'sujit.sajja@utdallas.edu', 2),
(3, 'varun', 'varun', 'varun@utdallas.edu', 2),
(4, 'Abhimanyu', 'abhi', 'sujitsajja@outlook.vom', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age`
--
ALTER TABLE `age`
  ADD PRIMARY KEY (`age_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `toy_id` (`toy_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `toys`
--
ALTER TABLE `toys`
  ADD PRIMARY KEY (`toy_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `age_group_id` (`age_group_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age`
--
ALTER TABLE `age`
  MODIFY `age_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `toys`
--
ALTER TABLE `toys`
  MODIFY `toy_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchased`
--
ALTER TABLE `purchased`
  ADD CONSTRAINT `purchased_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchased_ibfk_2` FOREIGN KEY (`toy_id`) REFERENCES `toys` (`toy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `toys`
--
ALTER TABLE `toys`
  ADD CONSTRAINT `toys_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `toys_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `toys_ibfk_5` FOREIGN KEY (`age_group_id`) REFERENCES `age` (`age_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
