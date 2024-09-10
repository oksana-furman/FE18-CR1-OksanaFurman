-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 07:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_blog_2`
--
CREATE DATABASE IF NOT EXISTS `food_blog_2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `food_blog_2`;

-- --------------------------------------------------------

--
-- Table structure for table `desserts`
--

CREATE TABLE `desserts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `cuisine` varchar(55) NOT NULL,
  `prep_time` varchar(55) NOT NULL,
  `cook_time` varchar(55) NOT NULL,
  `total_time` varchar(55) NOT NULL,
  `servings` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desserts`
--

INSERT INTO `desserts` (`id`, `name`, `type`, `cuisine`, `prep_time`, `cook_time`, `total_time`, `servings`, `picture`, `status`, `link`) VALUES
(1, 'Sachertorte Austrian Chocolate Cake', 'bake', 'Austrian', '30 minutes', '30 minutes', '2 hours', 8, '65a26761e3b15.jpg', 1, 'https://electricbluefood.com/sachertorte-my-viennese-challenge/#wprm-recipe-container-18446'),
(2, 'Pavlova With Mango Cream, Blueberries And Banana', 'bake', 'Australian', '20 minutes', '1 hour 30 minutes', '1 hour 50 minutes (+ 2 hours resting)', 8, '65959b2c654bc.jpg', 0, 'https://electricbluefood.com/pavlova-mango-blueberries-banana/#wprm-recipe-container-12853'),
(3, 'Swedish Cinnamon Buns Kanelbullar', 'bake', 'Scandinavian, Swedish', '50 minutes', '15 minutes', '1 hour 5 minutes (+ 40 minutes rest)', 13, '65959f6adf57e.jpg', 0, 'https://electricbluefood.com/swedish-cinnamon-buns-kanelbullar/#wprm-recipe-container-18501'),
(4, 'Carrot Cake With Sunflower And Pumpkin Seeds', 'bake', 'American', '20 minutes', '40 minutes', '1 hour', 10, '65959db258a22.jpg', 0, 'https://electricbluefood.com/carrot-cake/#wprm-recipe-container-17371 / https://electricbluefood.com/zesty-cream-cheese-frosting/#wprm-recipe-container-17282'),
(5, 'Polish Apple Cake Fale Dunaju', 'bake', 'Polish', '20 minutes', '40 minutes', '1 hour', 12, '65959d9b27dba.jpg', 0, 'https://electricbluefood.com/fale-dunaju-or-polish-apple-cake#wprm-recipe-container-11469'),
(6, 'Risgrynsgröt, The Christmas Rice Porridge', 'no bake', 'Scandinavian', '5 minutes', '40 minutes', '45 minutes', 2, '65959d4557a09.jpg', 0, 'https://electricbluefood.com/risgrynsgrot-christmas-rice-porridge#wprm-recipe-container-13115'),
(7, 'Swedish Blueberry Pie Blåbärspaj', 'bake', 'Swedish', '10 minutes', '40 minutes', '50 minutes', 8, '65959d27d756f.jpg', 0, 'https://electricbluefood.com/blabarspaj-or-swedish-blueberry-pie/#wprm-recipe-container-17038'),
(8, 'Strawberry Rhubarb Crisp', 'bake', 'American, Scandinavian', '20 minutes', '40 minutes', '1 hour', 8, '65959d80650c9.jpg', 0, 'https://electricbluefood.com/strawberry-rhubarb-crisp#wprm-recipe-container-12730'),
(9, 'Swedish Christmas Chocolate Praline Ischoklad', 'no bake', 'Swedish', '10 minutes', '30 minutes', '40 minutes', 16, '66bc9698853c9.jpg', 0, 'https://electricbluefood.com/ischoklad-winters-chocolate/#wprm-recipe-container-18401'),
(10, 'Earl Grey Tiramisu *TEAramisu*', 'no bake', 'Italian', '30 minutes', '2 hours', '2 hours 30 minutes', 4, '65959c6f4e2f9.jpg', 0, 'https://electricbluefood.com/earl-grey-tiramisu/#wprm-recipe-container-18054'),
(11, 'Chocolate Oatmeal Balls (Swedish Chokladbollar)', 'no bake', 'Scandinavian', '5 minutes', '10 minutes', '15 minutes', 13, '65959c909b809.jpg', 0, 'https://electricbluefood.com/chocolate-oatmeal-balls/#wprm-recipe-container-16542'),
(23, '1', 'bake', 'American', '1', '1', '1', 1, 'cakefault.png', 0, '1'),
(25, '111', 'no bake', 'American', '1', '1', '1', 5, 'cakefault.png', 0, '1'),
(27, '1', 'no bake', 'American', '11', '1', '111', 1, 'cakefault.png', 0, '1'),
(28, '1', '', 'Austrian', '5 minutes', '5 minutes', '10 minutes', 2, '665efde904a7e.jpg', 0, 'https://electricbluefood.com/ischoklad-winters-chocolate/#wprm-recipe-container-18401'),
(31, 'Black Forest Crepe Cake', '', 'German', '30 minutes', '1 hour', '2 hours 30 minutes', 10, '6670323447a04.jpg', 0, 'https://electricbluefood.com/black-forest-crepe-cake#wprm-recipe-container-14520');

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `text_id` int(11) NOT NULL,
  `text_content` text NOT NULL,
  `text_status` varchar(20) NOT NULL,
  `text_type` varchar(20) NOT NULL,
  `text_order` int(11) NOT NULL,
  `fk_dessert_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`text_id`, `text_content`, `text_status`, `text_type`, `text_order`, `fk_dessert_id`) VALUES
(1, 'For the cake', 'headline', 'ingredient', 1, 1),
(2, '150 g butter room temperature', 'entry', 'ingredient', 2, 1),
(3, '150 g dark chocolate', 'entry', 'ingredient', 3, 1),
(4, '200 g sugar', 'entry', 'ingredient', 4, 1),
(5, '6 eggs', 'entry', 'ingredient', 5, 1),
(6, '100 g almond meal', 'entry', 'ingredient', 6, 1),
(7, '50 g flour', 'entry', 'ingredient', 7, 1),
(8, '8 g baking powder', 'entry', 'ingredient', 8, 1),
(9, '150 g apricot jam', 'entry', 'ingredient', 9, 1),
(10, 'For the ganache', 'headline', 'ingredient', 10, 1),
(11, '250 g dark chocolate', 'entry', 'ingredient', 11, 1),
(12, '400 ml cream', 'entry', 'ingredient', 12, 1),
(13, 'How to make the cake', 'headline', 'instruction', 13, 1),
(14, 'Melt the chocolate and let cool to room temperature. If using the microwave, do 30-second intervals and stir in between.', 'entry', 'instruction', 14, 1),
(15, 'Separate the yolks from egg whites and beat the whites until firm, then add about 1/4 of the sugar and keep mixing until dissolved.', 'entry', 'instruction', 15, 1),
(16, 'In another bowl cream the butter and rest of the sugar. Always mixing, incorporate the yolks one at a time, followed by the melted chocolate. Set the mixer aside.', 'entry', 'instruction', 16, 1),
(17, 'In a separate bowl combine almond meal, flour and baking powder. With a rubber spatula fold half of the egg whites into the butter mixture. Next, incorporate the flour mixture. Lastly, fold in the rest of the egg whites.', 'entry', 'instruction', 17, 1),
(18, 'Divide cake batter among two 20-cm cake pans and bake them in the preheated oven at 175°C for 30 minutes or until a toothpick inserted in the centre comes out clean.', 'entry', 'instruction', 18, 1),
(19, 'How to make the ganache', 'headline', 'instruction', 19, 1),
(20, 'As the cakes bake, warm up the heavy cream and remove from the heat (or microwave) just before it reaches boiling temperature. Add the chocolate in pieces and stir until melted. Set aside and let cool – the ganache will thicken as it cools.', 'entry', 'instruction', 20, 1),
(21, 'How to fill and coat', 'headline', 'instruction', 21, 1),
(22, 'When the cakes have cooled down, slice a thin layer off from the top of both cakes to level them and remove the crunchier outer part. The top of the baked cakes might turn out a little crusty, brownie-like, and we want to expose the softer inside before spreading the apricot jam.', 'entry', 'instruction', 22, 1),
(23, 'Spread some apricot jam over one of the cakes, then stack the next one on top. Spread apricot jam over the top layer as well as the sides. Keep adding more jam as it gets sucked into the sponge cake and use it all up. Let rest until the ganache has reached the right texture.', 'entry', 'instruction', 23, 1),
(24, 'To try if the ganache is ready to use dip a spoon in it: it should coat the spoon quite thick but still be runny enough to pour so don', 'entry', 'instruction', 24, 1),
(25, 'Place the cake over a rack and set over a large plate. Pour the ganache in one continuous stream over the cake, starting from the centre and moving outwards as it expands. Make sure to let the ganache drizzle down the sides to coat the whole cake evenly, and pour some more to make a properly thick coating everywhere until you have used it all up.', 'entry', 'instruction', 25, 1),
(26, 'For the classic lettering finish, save a small quantity of the ganache in a piping bag and put it in the fridge for about 15 minutes. When firm enough so that it does not drizzle out of the piping bag, cut a small circular opening in the piping bag and write the word Sacher across the top of the cake. ', 'entry', 'instruction', 26, 1),
(27, 'For the meringue base', 'headline', 'ingredient', 1, 2),
(28, '6 egg whites', 'entry', 'ingredient', 2, 2),
(29, '330 g superfine sugar', 'entry', 'ingredient', 3, 2),
(30, '1/2 tsp white wine vinegar', 'entry', 'ingredient', 4, 2),
(31, '1 tbsp cornstarch', 'entry', 'ingredient', 5, 2),
(32, 'For the topping', 'headline', 'ingredient', 6, 2),
(33, '200 ml whipping cream', 'entry', 'ingredient', 7, 2),
(34, '80 g diced mango', 'entry', 'ingredient', 8, 2),
(35, '1/2 tbsp powdered sugar', 'entry', 'ingredient', 9, 2),
(36, '1 tsp vanilla extract', 'entry', 'ingredient', 10, 2),
(37, '100 g fresh blueberries', 'entry', 'ingredient', 11, 2),
(38, '1/2 banana', 'entry', 'ingredient', 12, 2),
(39, 'mint leaves and pansies for decoration', 'entry', 'ingredient', 13, 2),
(40, '100 ml lime juice', 'entry', 'ingredient', 14, 2),
(41, '120 g sugar', 'entry', 'ingredient', 15, 2),
(42, '30 g butter', 'entry', 'ingredient', 16, 2),
(43, '3 egg yolks', 'entry', 'ingredient', 17, 2),
(44, 'How to make the meringue base', 'headline', 'instruction', 18, 2),
(45, 'Separate the egg whites from the yolks. Beat the whites with an electric mixer to soft peaks. Gradually add the sugar, always mixing. Keep mixing until the sugar is completely dissolved and the meringue feels smooth to the touch. Fold in the vinegar and cornstarch.', 'entry', 'instruction', 19, 2),
(46, 'Transfer meringue to a baking tray lined with baking paper. Draw a circle on the paper to ease the process. Shape the meringue base and level the top. Bake in the preheated oven at 120°C for 1 1/2 hours or until the meringue is dry to the touch. After that time, turn the oven off and leave meringue inside with the oven door slightly open until it has cooled to room temperature.', 'entry', 'instruction', 20, 2),
(47, 'How to make the topping', 'headline', 'instruction', 21, 2),
(48, 'In a small saucepan over a double boiler combine the lime juice, sugar and butter and stir to dissolve. In a bowl aside, lightly whish the egg yolks. When the lime mixture is homogeneous, transfer a spoonful of the hot mixture to the egg mix and whisk to combine. Then gradually pour the egg mixture back into the hot mixture, always keeping it over a double boiler. Whisk continuously until the mixture thickens enough to coat the back of your spoon. Set aside and let cool.', 'entry', 'instruction', 22, 2),
(49, 'Blend the mango with the powdered sugar and vanilla. Whip the cream to soft peaks, then gently add the mango purée and keep mixing until it reaches har peaks.', 'entry', 'instruction', 23, 2),
(50, 'When the meringue base has cooled to room temperature, spread the mango cream over the top. Add the blueberries and banana slices, drizzle cool lime curd and garnish with mint leaves and pansies. Keep refrigerated.', 'entry', 'instruction', 24, 2),
(51, 'For the dough', 'headline', 'ingredient', 1, 3),
(52, '420 g flour', 'entry', 'ingredient', 2, 3),
(53, '250 ml milk', 'entry', 'ingredient', 3, 3),
(54, '25 g fresh yeast', 'entry', 'ingredient', 4, 3),
(55, '75 g butter', 'entry', 'ingredient', 5, 3),
(56, '50 g sugar', 'entry', 'ingredient', 6, 3),
(57, '1 egg', 'entry', 'ingredient', 7, 3),
(58, '10 cardamom pods', 'entry', 'ingredient', 8, 3),
(59, 'pinch of salt', 'entry', 'ingredient', 9, 3),
(60, 'For the filling', 'headline', 'ingredient', 10, 3),
(61, '100 g butter', 'entry', 'ingredient', 11, 3),
(62, '50 g sugar', 'entry', 'ingredient', 12, 3),
(63, '8 g cinnamon powder', 'entry', 'ingredient', 13, 3),
(64, '50 g pearl sugar', 'entry', 'ingredient', 14, 3),
(65, 'Break open the cardamom pods and add the seeds to a mortar. Crush with the pestle to a medium-fine grind.', 'entry', 'instruction', 15, 3),
(66, 'Separate the egg white from the yolk. Warm the milk to lukewarm (37°C or 99°F) and dissolve the fresh yeast in it. Transfer to the bowl of a stand mixer along with egg yolk, softened butter, sugar and crushed cardamom.', 'entry', 'instruction', 16, 3),
(67, 'Start the mixer on low speed and carefully add the flour. When the dough starts coming together, increase the speed to medium and mix for 5 minutes.', 'entry', 'instruction', 17, 3),
(68, 'Cover the dough with cling film or a plastic lid and let prove for 40 minutes.', 'entry', 'instruction', 18, 3),
(69, 'Transfer the proofed dough onto a lightly floured working surface. Roll it out to a rectangular shape measuring about 45*30 cm.', 'entry', 'instruction', 19, 3),
(70, 'Combine the softened butter with the sugar and cinnamon and whisk together until homogeneous.. Spread the filling all over the dough using an angled spatula, then roll the dough up the short side.', 'entry', 'instruction', 20, 3),
(71, 'Slice up the dough every 2 cm either with a sharp knife or using a thread. Place each cinnamon roll on an oven tray lined with baking paper leaving some room in between for growing. Cover the cinnamon rolls with a tea towel and allow to prove for another 40 minutes.', 'entry', 'instruction', 21, 3),
(72, 'Add a tablespoon of cold water to the egg white and lightly whisk together. Brush the top of each cinnamon roll with egg wash and sprinkle pearl sugar over each bun.', 'entry', 'instruction', 22, 3),
(73, 'Bake in the preheated oven at 225°C for 12-15 minutes, or until golden. Fan-forced ovens usually require the minimum time.', 'entry', 'instruction', 23, 3),
(74, 'For the cake', 'headline', 'ingredient', 1, 4),
(75, '350 g carrots', 'entry', 'ingredient', 2, 4),
(76, '35 g pumpkin seeds', 'entry', 'ingredient', 3, 4),
(77, '35 g sunflower seeds', 'entry', 'ingredient', 4, 4),
(78, '4 eggs', 'entry', 'ingredient', 5, 4),
(79, '300 g granulated sugar', 'entry', 'ingredient', 6, 4),
(80, '250 ml vegetable oil', 'entry', 'ingredient', 7, 4),
(81, '260 g flour', 'entry', 'ingredient', 8, 4),
(82, '2 tsp baking powder', 'entry', 'ingredient', 9, 4),
(83, '1/2 tsp salt', 'entry', 'ingredient', 10, 4),
(84, '1 1/2 tsp ground cinnamon', 'entry', 'ingredient', 11, 4),
(85, '1 tbsp vanilla extract', 'entry', 'ingredient', 12, 4),
(86, 'For the cream cheese frosting', 'headline', 'ingredient', 13, 4),
(87, '400 g cream cheese', 'entry', 'ingredient', 14, 4),
(88, '40 g powdered sugar', 'entry', 'ingredient', 15, 4),
(89, '2 tbsp granulated sugar', 'entry', 'ingredient', 16, 4),
(90, 'zest of 1/2 lemon', 'entry', 'ingredient', 17, 4),
(91, '60 ml whipping cream (30% or more)', 'entry', 'ingredient', 18, 4),
(92, 'How to make the cake', 'headline', 'instruction', 19, 4),
(93, 'Preheat the oven to 180°C. Place mixed seeds over an oven-safe dish spreading them out well. When the oven has reached temperature toast the seeds for about 4-5 minutes, tossing them halfway. If your oven is fan-forced or particularly good, you may want to keep them a minute less or they may burn too quickly. Take out and let cool. When the seeds have cooled, crush and set aside.', 'entry', 'instruction', 20, 4),
(94, 'Peel and grate the carrots and set aside. If you are using a food processor, you may consider to first crush the seeds, set aside, then grate the carrots.', 'entry', 'instruction', 21, 4),
(95, 'Crack the eggs in a bowl and beat with a hand mixer until light and frothy. Mixing at medium speed gradually add the sugar (this will make the mixture thicken) and the vanilla, then pour in the oil in one slow stream. When incorporated stop the mixer.', 'entry', 'instruction', 22, 4),
(96, 'In a separate bowl combine the flour, baking powder, cinnamon and salt (the dry ingredients). Add half of dry ingredients mix to egg mixture and mix at slow speed. Once incorporated, add the second half and mix in, then set mixer aside.', 'entry', 'instruction', 23, 4),
(97, 'Fold in the grated carrots and ground seeds. Pour batter in a springform pan lined with baking paper and bake at 180°C for about 40 minutes or until a toothpick inserted in the centre comes out clean.', 'entry', 'instruction', 24, 4),
(98, 'Let the cake cool completely before adding the frosting.', 'entry', 'instruction', 25, 4),
(99, 'How to make a cream cheese frosting', 'headline', 'instruction', 26, 4),
(100, 'Combine the lemon zest and granulated sugar and whip with a hand mixer at low speed for a couple of minutes. This will rub the essential oil from the lemon zest into the sugar, flavouring it.', 'entry', 'instruction', 27, 4),
(101, 'Add the cream cheese and mix at medium speed for 5 minutes, in order to dissolve the granulated sugar as much as possible. Incorporate the powdered sugar one tablespoon at a time while mixing.', 'entry', 'instruction', 28, 4),
(102, 'Stop the mixer and pour in the whipping cream. Start the mixer again at very low speed. The mixture thins after adding the cream, but it will whip again. Stop the mixer when the frosting holds firm peaks, after about 1-2 minutes.', 'entry', 'instruction', 29, 4),
(103, '250 g margarine', 'entry', 'ingredient', 1, 5),
(104, '200 g sugar', 'entry', 'ingredient', 2, 5),
(105, '5 eggs', 'entry', 'ingredient', 3, 5),
(106, '300 g flour', 'entry', 'ingredient', 4, 5),
(107, '2 tsp baking powder', 'entry', 'ingredient', 5, 5),
(108, '2 tbsp unsweetened cocoa powder', 'entry', 'ingredient', 6, 5),
(109, '2 apples', 'entry', 'ingredient', 7, 5),
(110, '1 tbsp coarse cane sugar', 'entry', 'ingredient', 8, 5),
(111, 'Peel and slice the apples, and set aside. Don', 'entry', 'instruction', 9, 5),
(112, 'Separate the egg whites from the yolks. Beat the whites to soft peaks. While mixing, add a little sugar, then set aside.', 'entry', 'instruction', 10, 5),
(113, 'In another bowl, cream the margarine with the rest of the sugar. Add the yolks, one at a time.', 'entry', 'instruction', 11, 5),
(114, 'Sift the baking powder and half of the flour into the margarine mixture and fold in by hand using a spatula. Once incorporated, fold in the second half of the flour. The batter should be rather firm.', 'entry', 'instruction', 12, 5),
(115, 'Gently fold in the egg whites making sure not to knock too much air out of them. This will make the batter runnier and fluffier.', 'entry', 'instruction', 13, 5),
(116, 'Pour half of the batter into a 24-cm round cake pan and spread it all over the bottom, making an even layer.', 'entry', 'instruction', 14, 5),
(117, 'Sift the cocoa powder into the rest of the batter and fold in. Spread cocoa batter all over the other batter layer in the baking pan.', 'entry', 'instruction', 15, 5),
(118, 'Press apple slices into the batter, making sure to pierce right through both layers so that the fruits touch the bottom of the pan.', 'entry', 'instruction', 16, 5),
(119, 'Sprinkle the cane sugar all over the cake top.', 'entry', 'instruction', 17, 5),
(120, 'Bake the cake at 180°C (360°F) for 40 minutes or until a toothpick inserted in the middle comes out clean. Avoid testing near an apple slice as the cake might be more moist there.', 'entry', 'instruction', 18, 5),
(121, '80 g round grain rice', 'entry', 'ingredient', 1, 6),
(122, '150 ml water', 'entry', 'ingredient', 2, 6),
(123, '300 ml milk', 'entry', 'ingredient', 3, 6),
(124, '20 g butter', 'entry', 'ingredient', 4, 6),
(125, '2 tbsp sugar', 'entry', 'ingredient', 5, 6),
(126, 'pinch of salt', 'entry', 'ingredient', 6, 6),
(127, 'cinnamon powder', 'entry', 'ingredient', 7, 6),
(128, 'almonds', 'entry', 'ingredient', 8, 6),
(129, 'Cook rice, water and pinch of salt in a saucepan on medium heat for 10 minutes, with the lid on.', 'entry', 'instruction', 9, 6),
(130, 'Warm the milk and add 250 ml to the rice. Lower the heat to the minimum and keep cooking the rice for about 20 more minutes, stirring from time to time.', 'entry', 'instruction', 10, 6),
(131, 'When the milk has been absorbed, stir in the sugar, butter and remaining milk. Simmer on low heat for 10 more minutes, covered. Stir occasionally.', 'entry', 'instruction', 11, 6),
(132, 'Remove the lid and let excess moisture evaporate. Transfer the rice porridge to two serving bowls and dust with cinnamon powder and almonds to taste.', 'entry', 'instruction', 12, 6),
(133, '350 g blueberries /bilberries', 'entry', 'ingredient', 1, 7),
(134, '250 g flour', 'entry', 'ingredient', 2, 7),
(135, '150 g butter', 'entry', 'ingredient', 3, 7),
(136, '150 g sugar', 'entry', 'ingredient', 4, 7),
(137, '1/2 tbsp potato starch', 'entry', 'ingredient', 5, 7),
(138, '1/2 tsp baking powder', 'entry', 'ingredient', 6, 7),
(139, '2 tbsp water', 'entry', 'ingredient', 7, 7),
(140, 'Add to a food processor the flour, butter, half of the sugar, baking powder and water. Blitz for a couple of minutes until the dough comes together. Divide the dough into 2 balls - one being slightly bigger than the other.', 'entry', 'instruction', 8, 7),
(141, 'Press the larger portion of the dough onto a deep-dish pie tin, over the bottom and sides. Do not prick it to prevent any blueberry juice leaks later on. Bake in the preheated oven at 180°C for 8 minutes.', 'entry', 'instruction', 9, 7),
(142, 'As the bottom pastry is blind baking, roll out the other portion of dough between two sheets of baking paper. Aim for a circumference that slightly overlaps with the edges of the bottom crust.', 'entry', 'instruction', 10, 7),
(143, 'Combine the blueberries with the other half of the sugar and the potato starch and toss.', 'entry', 'instruction', 11, 7),
(144, 'Take the pre-baked crust out of the oven and pour the blueberry mixture in, spreading it out evenly. Scatter around the flour and sugar that may not have combined with the blueberries, and lightly toss to distribute being careful not to crack the fragile half-baked pastry.', 'entry', 'instruction', 12, 7),
(145, 'Gently transfer the rolled out pastry and place it on the top of the filling. Gently press around the sides and trim off the excess pastry round the edges. Seal the upper and lower pastries by pressing a fork all around. Gently cut some slits on the top pastry to allow for the steam from the blueberries to evaporate while the pie bakes. Return the pie to the oven for another 30 minutes, or until golden brown.', 'entry', 'instruction', 13, 7),
(146, 'Fruit base', 'headline', 'ingredient', 1, 8),
(147, '275 g rhubarb', 'entry', 'ingredient', 2, 8),
(148, '200 g strawberries', 'entry', 'ingredient', 3, 8),
(149, '55 g sugar', 'entry', 'ingredient', 4, 8),
(150, '1/2 tbsp potato starch', 'entry', 'ingredient', 5, 8),
(151, 'Oat crisp', 'headline', 'ingredient', 6, 8),
(152, '150 g butter', 'entry', 'ingredient', 7, 8),
(153, '50 ml maple syrup', 'entry', 'ingredient', 8, 8),
(154, '1 tsp vanilla extract', 'entry', 'ingredient', 9, 8),
(155, '115 g rolled oats', 'entry', 'ingredient', 10, 8),
(156, '165 g sugar', 'entry', 'ingredient', 11, 8),
(157, '90 g flour', 'entry', 'ingredient', 12, 8),
(158, 'Clean and cut the rhubarb and strawberries into small pieces about the same size. Add the sugar and potato starch and stir to distribute. Spread fruit mixture over the bottom of a pyrex or ceramic tart pan.', 'entry', 'instruction', 13, 8),
(159, 'Melt the butter and stir in the maple syrup and vanilla extract. Combine rolled oats, sugar and flour and pour butter mixture in. Stir to combine.', 'entry', 'instruction', 14, 8),
(160, 'Transfer crisp batter over the fruits and gently spread all over. Bake in the preheated oven for 40 minutes at 180°C.', 'entry', 'instruction', 15, 8),
(161, '100 g chocolate', 'entry', 'ingredient', 1, 9),
(162, '50 g coconut oil', 'entry', 'ingredient', 2, 9),
(163, 'Combine the chocolate and coconut oil in a small saucepan and set over a double boiler. Stir from time to time as the mixture melts. When fully melted stir to ensure the mixture has a homogeneous texture.', 'entry', 'instruction', 3, 9),
(164, 'Place tinfoil molds over a flat plate. Divide the chocolate mixture between molds. A small jug or small funnel might make this precision job easier.', 'entry', 'instruction', 4, 9),
(165, 'Transfer to the fridge to harden, the pralines will be ready in slightly over a half hour.', 'entry', 'instruction', 5, 9),
(166, '250 g mascarpone', 'entry', 'ingredient', 1, 10),
(167, '2 eggs', 'entry', 'ingredient', 2, 10),
(168, '50 g sugar +2 tsp', 'entry', 'ingredient', 3, 10),
(169, '100 g savoiardi/ladyfinger biscuits', 'entry', 'ingredient', 4, 10),
(170, '2 tsp loose leaf Earl Grey tea', 'entry', 'ingredient', 5, 10),
(171, '160 ml water', 'entry', 'ingredient', 6, 10),
(172, 'Add the tea and sugar to freshly-boiled water. Stir to dissolve the sugar and steep for 20 minutes, then pour through a strainer and discard tea leaves.', 'entry', 'instruction', 7, 10),
(173, 'Separate the egg yolks from the whites and add to two separate bowls. Add half of the sugar to the whites and beat to hard peaks.', 'entry', 'instruction', 8, 10),
(174, 'Beat the yolks with the rest of the sugar until fluffy and light in colour. Add the mascarpone and mix well until homogeneous. Set mixer aside and fold in the egg whites.', 'entry', 'instruction', 9, 10),
(175, 'Spread a thin layer of cream over the bottom of a casserole dish. Quickly dip the ladyfinger biscuits in the sweetened tea on both sides, then place over mascarpone cream. Repeat creating a layer of dipped biscuits.', 'entry', 'instruction', 10, 10),
(176, 'Add another layer of mascarpone cream, then proceed to create a second layer of dipped biscuits. Spread a final layer of mascarpone cream on top.', 'entry', 'instruction', 11, 10),
(177, 'Cover the tea tiramisu with cling film. Place it in the fridge and let it rest for 2 hours or overnight. Serve with a sprinkle of powdered tea on top or some dried cornflower petals.', 'entry', 'instruction', 12, 10),
(178, '150 g salted butter', 'entry', 'ingredient', 1, 11),
(179, '200 g rolled oats', 'entry', 'ingredient', 2, 11),
(180, '90 g powdered sugar', 'entry', 'ingredient', 3, 11),
(181, '20 g cocoa powder', 'entry', 'ingredient', 4, 11),
(182, '40 ml coffee', 'entry', 'ingredient', 5, 11),
(183, '1 tsp vanilla extract', 'entry', 'ingredient', 6, 11),
(184, '25 g shredded coconut', 'entry', 'ingredient', 7, 11),
(185, 'pinch of salt', 'entry', 'ingredient', 8, 11),
(186, 'Combine the butter and powdered sugar and cream with a hand mixer at medium speed for 2 minutes.', 'entry', 'instruction', 9, 11),
(187, 'Add the rolled oats, cocoa powder, coffee and vanilla and mix again until combined.', 'entry', 'instruction', 10, 11),
(188, 'With slightly wet hands divide the mixture into 13 balls, rolling them between the palms of your hands. I weighed mine at 36 g each.', 'entry', 'instruction', 11, 11),
(189, 'Pour the shredded coconut into a shallow bowl and toss each ball in it until fully coated. Transfer chocolate balls to a serving plate and serve.', 'entry', 'instruction', 12, 11),
(192, '4 eggs', 'entry', 'ingredient', 1, 31),
(193, '800 ml milk', 'entry', 'ingredient', 2, 31),
(194, '150 g granulated sugar', 'entry', 'ingredient', 3, 31),
(195, '300 g flour', 'entry', 'ingredient', 4, 31),
(196, '50 g cocoa powder', 'entry', 'ingredient', 5, 31),
(197, '60 ml vegetable oil', 'entry', 'ingredient', 6, 31),
(198, '700 ml whipping cream', 'entry', 'ingredient', 7, 31),
(199, '100 g powdered sugar', 'entry', 'ingredient', 8, 31),
(200, '200 g dark chocolate chips', 'entry', 'ingredient', 9, 31),
(201, '200 g sour cherries in syrup', 'entry', 'ingredient', 10, 31),
(202, 'Combine the eggs, flour, milk, granulated sugar, cocoa powder and vegetable oil in a blender and mix until homogeneous.', 'entry', 'instruction', 11, 31),
(203, 'Warm a crepe pan and when hot pour in a ladleful of crepe batter. Cook on medium-high heat until the top looks set and the edges of the crepe naturally peel off the pan (about 2 minutes). Gently slide a spatula under the crepe and flip it over. Cook the other side for just about a half minute. Repeat until all of the batter has been used.', 'entry', 'instruction', 12, 31),
(204, 'Let crepes cool completely before moving on to the next step. If making ahead, stack them on a plate, cover with cling film and keep refrigerated.', 'entry', 'instruction', 13, 31),
(205, 'Optionally you can trim the edges of the crepes. Find a plate the desired size, place it on top of each crepe and run a knife around the edges. This is not an obigatory step, but helps achieve more regular edges to your cake.', 'entry', 'instruction', 14, 31),
(206, 'Combine 500 ml of whipping cream with the powdered sugar and whip to hard peaks.', 'entry', 'instruction', 15, 31),
(207, 'Finely mince about half of the drained sour cherries.', 'entry', 'instruction', 16, 31),
(208, 'Place a crepe on a cake stand. Spread a thin layer of whipped cream on a crepe using an angled spatula, then add some minced cherries on top. Stack the next crepe on top and proceed working this way. Remember that the last crepe should have no frosting over it.', 'entry', 'instruction', 17, 31),
(209, 'Place the cake in the fridge to set as you prepare the ganache.', 'entry', 'instruction', 18, 31),
(210, 'Warm the remaining cream in a double boiler or in the microwave. When hot stir in the chocolate chips until dissolved. Let cool for a couple of minutes.', 'entry', 'instruction', 19, 31),
(211, 'Take the cake out of the fridge and place it over a rack. Pour the ganache in a slow stream allowing it to pour over the edges of the top layer and down the sides of the cake.', 'entry', 'instruction', 20, 31),
(212, 'Before the ganache hardens, add remaining cherries on the top as decoration. Chill in the fridge for a minimum of 1 hour before serving.', 'entry', 'instruction', 21, 31);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `birth_date` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `birth_date`, `password`, `email`, `picture`, `status`) VALUES
(1, 'John', 'Doe', 'john1', '2000-06-04', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 'john@gmail.com', '65b57b9d666f2.png', 'adm'),
(3, 'James', 'Doe', 'james1', '1993-02-13', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 'james1@gmail.com', '65a254aec9628.jpg', 'user'),
(4, 'Jane', 'Doe', 'jane1', '1999-01-27', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', 'jane@gmail.com', '65b569789703e.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`text_id`),
  ADD KEY `fk_dessert_id` (`fk_dessert_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `text`
--
ALTER TABLE `text`
  MODIFY `text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `text`
--
ALTER TABLE `text`
  ADD CONSTRAINT `fk_dessert_id` FOREIGN KEY (`fk_dessert_id`) REFERENCES `desserts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
