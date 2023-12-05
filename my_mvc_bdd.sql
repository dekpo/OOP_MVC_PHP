-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mar. 05 déc. 2023 à 17:19
-- Version du serveur : 11.1.2-MariaDB-1:11.1.2+maria~ubu2204
-- Version de PHP : 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `oop_mvc_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `slug` varchar(80) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `created_at`) VALUES
(1, 'Unknown', 'unknown', '2023-12-05 13:14:44');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 1,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `author` varchar(55) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `category_id`, `title`, `description`, `src`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'La noix est un fruit comestible à coque.', 'La noix est un fruit comestible à coque. Elle est produite par les noyers, arbres de la famille des Juglandacées. La forme commercialisée la plus importante des régions tempérées provient de la culture du noyer commun1', 'https://cdn.pixabay.com/photo/2023/10/15/13/59/walnuts-8316999_1280.jpg', 'Nestor Bouboule', '2023-10-24 09:19:49', '2023-10-24 09:19:49'),
(2, 1, 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera).', 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera), un des représentants de la famille des palmiers ou Arécacées. L\'inflorescence complète peut atteindre 1 mètre de long.', 'https://cdn.pixabay.com/photo/2016/07/06/20/56/coconut-1501334_1280.jpg', 'Vendredi Crusoé', '2023-10-24 09:26:45', '2023-10-25 17:22:33'),
(3, 1, 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana)', 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana), ainsi que de diverses espèces voisines du genre Corylus (non étudiées ici).', 'https://cdn.pixabay.com/photo/2018/10/30/08/39/hazelnuts-3783066_1280.jpg', 'Pierre Kiroule', '2023-10-24 09:32:36', '2023-10-24 09:32:36'),
(7, 1, 'Les myrtilles sont de petites baies de couleur bleu-violacé', 'Les myrtilles sont de petites baies de couleur bleu-violacé à la saveur douce et légèrement sucrée, elles poussent sur le myrtillier. Elle est appelée également brimbelle dans l\'est de la France et en particulier dans les Vosges.', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Petit Pimousse', '2023-10-25 16:18:01', '2023-10-25 16:18:01'),
(8, 1, 'La poire est le fruit à pépins comestible au goût doux et sucré', 'La poire est le fruit à pépins comestible au goût doux et sucré, produit par le poirier commun (Pyrus communis L.), arbre de la famille des Rosaceae.', 'https://cdn.pixabay.com/photo/2016/07/22/09/59/fruits-1534494_1280.jpg', 'Belle Hélène ', '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(9, 1, 'L\'orange ou orange douce est le fruit de l\'oranger', 'L\'orange ou orange douce est le fruit de l\'oranger de la famille des Rutacées. Comme pour tous les agrumes, il s\'agit d\'une forme particulière de baie appelée hespéride.', 'https://cdn.pixabay.com/photo/2017/01/20/15/06/oranges-1995056_1280.jpg', 'Mécanique Orange', '2023-10-25 16:21:58', '2023-10-25 16:47:26'),
(11, 1, 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées.', 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées. Selon qu\'il s\'agit de framboisiers sauvages ou cultivés, la framboise pèse de 4 à 10 g, mesure jusqu\'à 2,5 cm et compte de 40 à 80 drupéoles', 'https://cdn.pixabay.com/photo/2016/05/31/13/01/raspberries-1426859_1280.jpg', 'Framboise Hardy', '2023-10-25 16:54:08', '2023-10-25 16:54:08'),
(26, 1, 'La cerise est le fruit comestible du cerisier. HELLO !!', 'La cerise est le fruit comestible du cerisier. Il s\'agit d\'une drupe (fruit charnu à noyau), de forme sphérique, de couleur généralement rouge plus ou moins foncé jusque noire, plus rarement jaune. ', './uploads/la-cerise-est-le-fruit-comestible-du-cerisier--1699625609.jpeg', 'Podek', '2023-11-10 14:13:29', '2023-11-16 14:55:55'),
(31, 1, 'La noix est un fruit comestible à coque.', 'La noix est un fruit comestible à coque. Elle est produite par les noyers, arbres de la famille des Juglandacées. La forme commercialisée la plus importante des régions tempérées provient de la culture du noyer commun1', 'https://cdn.pixabay.com/photo/2023/10/15/13/59/walnuts-8316999_1280.jpg', 'Nestor Bouboule', '2023-10-24 09:19:49', '2023-10-24 09:19:49'),
(32, 1, 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera).', 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera), un des représentants de la famille des palmiers ou Arécacées. L\'inflorescence complète peut atteindre 1 mètre de long.', 'https://cdn.pixabay.com/photo/2016/07/06/20/56/coconut-1501334_1280.jpg', 'Vendredi Crusoé', '2023-10-24 09:26:45', '2023-10-25 17:22:33'),
(33, 1, 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana)', 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana), ainsi que de diverses espèces voisines du genre Corylus (non étudiées ici).', 'https://cdn.pixabay.com/photo/2018/10/30/08/39/hazelnuts-3783066_1280.jpg', 'Pierre Kiroule', '2023-10-24 09:32:36', '2023-10-24 09:32:36'),
(34, 1, 'Les myrtilles sont de petites baies de couleur bleu-violacé', 'Les myrtilles sont de petites baies de couleur bleu-violacé à la saveur douce et légèrement sucrée, elles poussent sur le myrtillier. Elle est appelée également brimbelle dans l\'est de la France et en particulier dans les Vosges.', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Petit Pimousse', '2023-10-25 16:18:01', '2023-10-25 16:18:01'),
(35, 1, 'La poire est le fruit à pépins comestible au goût doux et sucré', 'La poire est le fruit à pépins comestible au goût doux et sucré, produit par le poirier commun (Pyrus communis L.), arbre de la famille des Rosaceae.', 'https://cdn.pixabay.com/photo/2016/07/22/09/59/fruits-1534494_1280.jpg', 'Belle Hélène ', '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(36, 1, 'L\'orange ou orange douce est le fruit de l\'oranger', 'L\'orange ou orange douce est le fruit de l\'oranger de la famille des Rutacées. Comme pour tous les agrumes, il s\'agit d\'une forme particulière de baie appelée hespéride.', 'https://cdn.pixabay.com/photo/2017/01/20/15/06/oranges-1995056_1280.jpg', 'Mécanique Orange', '2023-10-25 16:21:58', '2023-10-25 16:47:26'),
(37, 1, 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées.', 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées. Selon qu\'il s\'agit de framboisiers sauvages ou cultivés, la framboise pèse de 4 à 10 g, mesure jusqu\'à 2,5 cm et compte de 40 à 80 drupéoles', 'https://cdn.pixabay.com/photo/2016/05/31/13/01/raspberries-1426859_1280.jpg', 'Framboise Hardy', '2023-10-25 16:54:08', '2023-10-25 16:54:08'),
(38, 1, 'La cerise est le fruit comestible du cerisier. HELLO !!', 'La cerise est le fruit comestible du cerisier. Il s\'agit d\'une drupe (fruit charnu à noyau), de forme sphérique, de couleur généralement rouge plus ou moins foncé jusque noire, plus rarement jaune. ', './uploads/la-cerise-est-le-fruit-comestible-du-cerisier--1699625609.jpeg', 'Podek', '2023-11-10 14:13:29', '2023-11-16 14:55:55'),
(39, 1, 'La noix est un fruit comestible à coque.', 'La noix est un fruit comestible à coque. Elle est produite par les noyers, arbres de la famille des Juglandacées. La forme commercialisée la plus importante des régions tempérées provient de la culture du noyer commun1', 'https://cdn.pixabay.com/photo/2023/10/15/13/59/walnuts-8316999_1280.jpg', 'Nestor Bouboule', '2023-10-24 09:19:49', '2023-10-24 09:19:49'),
(40, 1, 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera).', 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera), un des représentants de la famille des palmiers ou Arécacées. L\'inflorescence complète peut atteindre 1 mètre de long.', 'https://cdn.pixabay.com/photo/2016/07/06/20/56/coconut-1501334_1280.jpg', 'Vendredi Crusoé', '2023-10-24 09:26:45', '2023-10-25 17:22:33'),
(41, 1, 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana)', 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana), ainsi que de diverses espèces voisines du genre Corylus (non étudiées ici).', 'https://cdn.pixabay.com/photo/2018/10/30/08/39/hazelnuts-3783066_1280.jpg', 'Pierre Kiroule', '2023-10-24 09:32:36', '2023-10-24 09:32:36'),
(42, 1, 'Les myrtilles sont de petites baies de couleur bleu-violacé', 'Les myrtilles sont de petites baies de couleur bleu-violacé à la saveur douce et légèrement sucrée, elles poussent sur le myrtillier. Elle est appelée également brimbelle dans l\'est de la France et en particulier dans les Vosges.', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Petit Pimousse', '2023-10-25 16:18:01', '2023-10-25 16:18:01'),
(43, 1, 'La poire est le fruit à pépins comestible au goût doux et sucré', 'La poire est le fruit à pépins comestible au goût doux et sucré, produit par le poirier commun (Pyrus communis L.), arbre de la famille des Rosaceae.', 'https://cdn.pixabay.com/photo/2016/07/22/09/59/fruits-1534494_1280.jpg', 'Belle Hélène ', '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(44, 1, 'L\'orange ou orange douce est le fruit de l\'oranger', 'L\'orange ou orange douce est le fruit de l\'oranger de la famille des Rutacées. Comme pour tous les agrumes, il s\'agit d\'une forme particulière de baie appelée hespéride.', 'https://cdn.pixabay.com/photo/2017/01/20/15/06/oranges-1995056_1280.jpg', 'Mécanique Orange', '2023-10-25 16:21:58', '2023-10-25 16:47:26'),
(45, 1, 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées.', 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées. Selon qu\'il s\'agit de framboisiers sauvages ou cultivés, la framboise pèse de 4 à 10 g, mesure jusqu\'à 2,5 cm et compte de 40 à 80 drupéoles', 'https://cdn.pixabay.com/photo/2016/05/31/13/01/raspberries-1426859_1280.jpg', 'Framboise Hardy', '2023-10-25 16:54:08', '2023-10-25 16:54:08'),
(46, 1, 'La cerise est le fruit comestible du cerisier. HELLO !!', 'La cerise est le fruit comestible du cerisier. Il s\'agit d\'une drupe (fruit charnu à noyau), de forme sphérique, de couleur généralement rouge plus ou moins foncé jusque noire, plus rarement jaune. ', './uploads/la-cerise-est-le-fruit-comestible-du-cerisier--1699625609.jpeg', 'Podek', '2023-11-10 14:13:29', '2023-11-16 14:55:55'),
(47, 1, 'La noix est un fruit comestible à coque.', 'La noix est un fruit comestible à coque. Elle est produite par les noyers, arbres de la famille des Juglandacées. La forme commercialisée la plus importante des régions tempérées provient de la culture du noyer commun1', 'https://cdn.pixabay.com/photo/2023/10/15/13/59/walnuts-8316999_1280.jpg', 'Nestor Bouboule', '2023-10-24 09:19:49', '2023-10-24 09:19:49'),
(48, 1, 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera).', 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera), un des représentants de la famille des palmiers ou Arécacées. L\'inflorescence complète peut atteindre 1 mètre de long.', 'https://cdn.pixabay.com/photo/2016/07/06/20/56/coconut-1501334_1280.jpg', 'Vendredi Crusoé', '2023-10-24 09:26:45', '2023-10-25 17:22:33'),
(49, 1, 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana)', 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana), ainsi que de diverses espèces voisines du genre Corylus (non étudiées ici).', 'https://cdn.pixabay.com/photo/2018/10/30/08/39/hazelnuts-3783066_1280.jpg', 'Pierre Kiroule', '2023-10-24 09:32:36', '2023-10-24 09:32:36'),
(50, 1, 'Les myrtilles sont de petites baies de couleur bleu-violacé', 'Les myrtilles sont de petites baies de couleur bleu-violacé à la saveur douce et légèrement sucrée, elles poussent sur le myrtillier. Elle est appelée également brimbelle dans l\'est de la France et en particulier dans les Vosges.', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Petit Pimousse', '2023-10-25 16:18:01', '2023-10-25 16:18:01'),
(51, 1, 'La poire est le fruit à pépins comestible au goût doux et sucré', 'La poire est le fruit à pépins comestible au goût doux et sucré, produit par le poirier commun (Pyrus communis L.), arbre de la famille des Rosaceae.', 'https://cdn.pixabay.com/photo/2016/07/22/09/59/fruits-1534494_1280.jpg', 'Belle Hélène ', '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(52, 1, 'L\'orange ou orange douce est le fruit de l\'oranger', 'L\'orange ou orange douce est le fruit de l\'oranger de la famille des Rutacées. Comme pour tous les agrumes, il s\'agit d\'une forme particulière de baie appelée hespéride.', 'https://cdn.pixabay.com/photo/2017/01/20/15/06/oranges-1995056_1280.jpg', 'Mécanique Orange', '2023-10-25 16:21:58', '2023-10-25 16:47:26'),
(53, 1, 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées.', 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées. Selon qu\'il s\'agit de framboisiers sauvages ou cultivés, la framboise pèse de 4 à 10 g, mesure jusqu\'à 2,5 cm et compte de 40 à 80 drupéoles', 'https://cdn.pixabay.com/photo/2016/05/31/13/01/raspberries-1426859_1280.jpg', 'Framboise Hardy', '2023-10-25 16:54:08', '2023-10-25 16:54:08'),
(54, 1, 'La cerise est le fruit comestible du cerisier. HELLO !!', 'La cerise est le fruit comestible du cerisier. Il s\'agit d\'une drupe (fruit charnu à noyau), de forme sphérique, de couleur généralement rouge plus ou moins foncé jusque noire, plus rarement jaune. ', './uploads/la-cerise-est-le-fruit-comestible-du-cerisier--1699625609.jpeg', 'Podek', '2023-11-10 14:13:29', '2023-11-16 14:55:55'),
(55, 1, 'La noix est un fruit comestible à coque.', 'La noix est un fruit comestible à coque. Elle est produite par les noyers, arbres de la famille des Juglandacées. La forme commercialisée la plus importante des régions tempérées provient de la culture du noyer commun1', 'https://cdn.pixabay.com/photo/2023/10/15/13/59/walnuts-8316999_1280.jpg', 'Nestor Bouboule', '2023-10-24 09:19:49', '2023-10-24 09:19:49'),
(56, 1, 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera).', 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera), un des représentants de la famille des palmiers ou Arécacées. L\'inflorescence complète peut atteindre 1 mètre de long.', 'https://cdn.pixabay.com/photo/2016/07/06/20/56/coconut-1501334_1280.jpg', 'Vendredi Crusoé', '2023-10-24 09:26:45', '2023-10-25 17:22:33'),
(57, 1, 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana)', 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana), ainsi que de diverses espèces voisines du genre Corylus (non étudiées ici).', 'https://cdn.pixabay.com/photo/2018/10/30/08/39/hazelnuts-3783066_1280.jpg', 'Pierre Kiroule', '2023-10-24 09:32:36', '2023-10-24 09:32:36'),
(58, 1, 'Les myrtilles sont de petites baies de couleur bleu-violacé', 'Les myrtilles sont de petites baies de couleur bleu-violacé à la saveur douce et légèrement sucrée, elles poussent sur le myrtillier. Elle est appelée également brimbelle dans l\'est de la France et en particulier dans les Vosges.', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Petit Pimousse', '2023-10-25 16:18:01', '2023-10-25 16:18:01'),
(59, 1, 'La poire est le fruit à pépins comestible au goût doux et sucré', 'La poire est le fruit à pépins comestible au goût doux et sucré, produit par le poirier commun (Pyrus communis L.), arbre de la famille des Rosaceae.', 'https://cdn.pixabay.com/photo/2016/07/22/09/59/fruits-1534494_1280.jpg', 'Belle Hélène ', '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(60, 1, 'L\'orange ou orange douce est le fruit de l\'oranger', 'L\'orange ou orange douce est le fruit de l\'oranger de la famille des Rutacées. Comme pour tous les agrumes, il s\'agit d\'une forme particulière de baie appelée hespéride.', 'https://cdn.pixabay.com/photo/2017/01/20/15/06/oranges-1995056_1280.jpg', 'Mécanique Orange', '2023-10-25 16:21:58', '2023-10-25 16:47:26'),
(61, 1, 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées.', 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées. Selon qu\'il s\'agit de framboisiers sauvages ou cultivés, la framboise pèse de 4 à 10 g, mesure jusqu\'à 2,5 cm et compte de 40 à 80 drupéoles', 'https://cdn.pixabay.com/photo/2016/05/31/13/01/raspberries-1426859_1280.jpg', 'Framboise Hardy', '2023-10-25 16:54:08', '2023-10-25 16:54:08'),
(62, 1, 'La cerise est le fruit comestible du cerisier. HELLO !!', 'La cerise est le fruit comestible du cerisier. Il s\'agit d\'une drupe (fruit charnu à noyau), de forme sphérique, de couleur généralement rouge plus ou moins foncé jusque noire, plus rarement jaune. ', './uploads/la-cerise-est-le-fruit-comestible-du-cerisier--1699625609.jpeg', 'Podek', '2023-11-10 14:13:29', '2023-11-16 14:55:55'),
(63, 1, 'La noix est un fruit comestible à coque.', 'La noix est un fruit comestible à coque. Elle est produite par les noyers, arbres de la famille des Juglandacées. La forme commercialisée la plus importante des régions tempérées provient de la culture du noyer commun1', 'https://cdn.pixabay.com/photo/2023/10/15/13/59/walnuts-8316999_1280.jpg', 'Nestor Bouboule', '2023-10-24 09:19:49', '2023-10-24 09:19:49'),
(64, 1, 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera).', 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera), un des représentants de la famille des palmiers ou Arécacées. L\'inflorescence complète peut atteindre 1 mètre de long.', 'https://cdn.pixabay.com/photo/2016/07/06/20/56/coconut-1501334_1280.jpg', 'Vendredi Crusoé', '2023-10-24 09:26:45', '2023-10-25 17:22:33'),
(65, 1, 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana)', 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana), ainsi que de diverses espèces voisines du genre Corylus (non étudiées ici).', 'https://cdn.pixabay.com/photo/2018/10/30/08/39/hazelnuts-3783066_1280.jpg', 'Pierre Kiroule', '2023-10-24 09:32:36', '2023-10-24 09:32:36'),
(66, 1, 'Les myrtilles sont de petites baies de couleur bleu-violacé', 'Les myrtilles sont de petites baies de couleur bleu-violacé à la saveur douce et légèrement sucrée, elles poussent sur le myrtillier. Elle est appelée également brimbelle dans l\'est de la France et en particulier dans les Vosges.', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Petit Pimousse', '2023-10-25 16:18:01', '2023-10-25 16:18:01'),
(67, 1, 'La poire est le fruit à pépins comestible au goût doux et sucré', 'La poire est le fruit à pépins comestible au goût doux et sucré, produit par le poirier commun (Pyrus communis L.), arbre de la famille des Rosaceae.', 'https://cdn.pixabay.com/photo/2016/07/22/09/59/fruits-1534494_1280.jpg', 'Belle Hélène ', '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(68, 1, 'L\'orange ou orange douce est le fruit de l\'oranger', 'L\'orange ou orange douce est le fruit de l\'oranger de la famille des Rutacées. Comme pour tous les agrumes, il s\'agit d\'une forme particulière de baie appelée hespéride.', 'https://cdn.pixabay.com/photo/2017/01/20/15/06/oranges-1995056_1280.jpg', 'Mécanique Orange', '2023-10-25 16:21:58', '2023-10-25 16:47:26'),
(69, 1, 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées.', 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées. Selon qu\'il s\'agit de framboisiers sauvages ou cultivés, la framboise pèse de 4 à 10 g, mesure jusqu\'à 2,5 cm et compte de 40 à 80 drupéoles', 'https://cdn.pixabay.com/photo/2016/05/31/13/01/raspberries-1426859_1280.jpg', 'Framboise Hardy', '2023-10-25 16:54:08', '2023-10-25 16:54:08'),
(70, 1, 'La cerise est le fruit comestible du cerisier. HELLO !!', 'La cerise est le fruit comestible du cerisier. Il s\'agit d\'une drupe (fruit charnu à noyau), de forme sphérique, de couleur généralement rouge plus ou moins foncé jusque noire, plus rarement jaune. ', './uploads/la-cerise-est-le-fruit-comestible-du-cerisier--1699625609.jpeg', 'Podek', '2023-11-10 14:13:29', '2023-11-16 14:55:55'),
(71, 1, 'La noix est un fruit comestible à coque.', 'La noix est un fruit comestible à coque. Elle est produite par les noyers, arbres de la famille des Juglandacées. La forme commercialisée la plus importante des régions tempérées provient de la culture du noyer commun1', 'https://cdn.pixabay.com/photo/2023/10/15/13/59/walnuts-8316999_1280.jpg', 'Nestor Bouboule', '2023-10-24 09:19:49', '2023-10-24 09:19:49'),
(72, 1, 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera).', 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera), un des représentants de la famille des palmiers ou Arécacées. L\'inflorescence complète peut atteindre 1 mètre de long.', 'https://cdn.pixabay.com/photo/2016/07/06/20/56/coconut-1501334_1280.jpg', 'Vendredi Crusoé', '2023-10-24 09:26:45', '2023-10-25 17:22:33'),
(73, 1, 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana)', 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana), ainsi que de diverses espèces voisines du genre Corylus (non étudiées ici).', 'https://cdn.pixabay.com/photo/2018/10/30/08/39/hazelnuts-3783066_1280.jpg', 'Pierre Kiroule', '2023-10-24 09:32:36', '2023-10-24 09:32:36'),
(74, 1, 'Les myrtilles sont de petites baies de couleur bleu-violacé', 'Les myrtilles sont de petites baies de couleur bleu-violacé à la saveur douce et légèrement sucrée, elles poussent sur le myrtillier. Elle est appelée également brimbelle dans l\'est de la France et en particulier dans les Vosges.', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Petit Pimousse', '2023-10-25 16:18:01', '2023-10-25 16:18:01'),
(75, 1, 'La poire est le fruit à pépins comestible au goût doux et sucré', 'La poire est le fruit à pépins comestible au goût doux et sucré, produit par le poirier commun (Pyrus communis L.), arbre de la famille des Rosaceae.', 'https://cdn.pixabay.com/photo/2016/07/22/09/59/fruits-1534494_1280.jpg', 'Belle Hélène ', '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(76, 1, 'L\'orange ou orange douce est le fruit de l\'oranger', 'L\'orange ou orange douce est le fruit de l\'oranger de la famille des Rutacées. Comme pour tous les agrumes, il s\'agit d\'une forme particulière de baie appelée hespéride.', 'https://cdn.pixabay.com/photo/2017/01/20/15/06/oranges-1995056_1280.jpg', 'Mécanique Orange', '2023-10-25 16:21:58', '2023-10-25 16:47:26'),
(77, 1, 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées.', 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées. Selon qu\'il s\'agit de framboisiers sauvages ou cultivés, la framboise pèse de 4 à 10 g, mesure jusqu\'à 2,5 cm et compte de 40 à 80 drupéoles', 'https://cdn.pixabay.com/photo/2016/05/31/13/01/raspberries-1426859_1280.jpg', 'Framboise Hardy', '2023-10-25 16:54:08', '2023-10-25 16:54:08'),
(78, 1, 'La cerise est le fruit comestible du cerisier. HELLO !!', 'La cerise est le fruit comestible du cerisier. Il s\'agit d\'une drupe (fruit charnu à noyau), de forme sphérique, de couleur généralement rouge plus ou moins foncé jusque noire, plus rarement jaune. ', './uploads/la-cerise-est-le-fruit-comestible-du-cerisier--1699625609.jpeg', 'Podek', '2023-11-10 14:13:29', '2023-11-16 14:55:55'),
(79, 1, 'La noix est un fruit comestible à coque.', 'La noix est un fruit comestible à coque. Elle est produite par les noyers, arbres de la famille des Juglandacées. La forme commercialisée la plus importante des régions tempérées provient de la culture du noyer commun1', 'https://cdn.pixabay.com/photo/2023/10/15/13/59/walnuts-8316999_1280.jpg', 'Nestor Bouboule', '2023-10-24 09:19:49', '2023-10-24 09:19:49'),
(80, 1, 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera).', 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera), un des représentants de la famille des palmiers ou Arécacées. L\'inflorescence complète peut atteindre 1 mètre de long.', 'https://cdn.pixabay.com/photo/2016/07/06/20/56/coconut-1501334_1280.jpg', 'Vendredi Crusoé', '2023-10-24 09:26:45', '2023-10-25 17:22:33'),
(81, 1, 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana)', 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana), ainsi que de diverses espèces voisines du genre Corylus (non étudiées ici).', 'https://cdn.pixabay.com/photo/2018/10/30/08/39/hazelnuts-3783066_1280.jpg', 'Pierre Kiroule', '2023-10-24 09:32:36', '2023-10-24 09:32:36'),
(82, 1, 'Les myrtilles sont de petites baies de couleur bleu-violacé', 'Les myrtilles sont de petites baies de couleur bleu-violacé à la saveur douce et légèrement sucrée, elles poussent sur le myrtillier. Elle est appelée également brimbelle dans l\'est de la France et en particulier dans les Vosges.', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Petit Pimousse', '2023-10-25 16:18:01', '2023-10-25 16:18:01'),
(83, 1, 'La poire est le fruit à pépins comestible au goût doux et sucré', 'La poire est le fruit à pépins comestible au goût doux et sucré, produit par le poirier commun (Pyrus communis L.), arbre de la famille des Rosaceae.', 'https://cdn.pixabay.com/photo/2016/07/22/09/59/fruits-1534494_1280.jpg', 'Belle Hélène ', '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(84, 1, 'L\'orange ou orange douce est le fruit de l\'oranger', 'L\'orange ou orange douce est le fruit de l\'oranger de la famille des Rutacées. Comme pour tous les agrumes, il s\'agit d\'une forme particulière de baie appelée hespéride.', 'https://cdn.pixabay.com/photo/2017/01/20/15/06/oranges-1995056_1280.jpg', 'Mécanique Orange', '2023-10-25 16:21:58', '2023-10-25 16:47:26'),
(85, 1, 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées.', 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées. Selon qu\'il s\'agit de framboisiers sauvages ou cultivés, la framboise pèse de 4 à 10 g, mesure jusqu\'à 2,5 cm et compte de 40 à 80 drupéoles', 'https://cdn.pixabay.com/photo/2016/05/31/13/01/raspberries-1426859_1280.jpg', 'Framboise Hardy', '2023-10-25 16:54:08', '2023-10-25 16:54:08'),
(86, 1, 'La cerise est le fruit comestible du cerisier. HELLO !!', 'La cerise est le fruit comestible du cerisier. Il s\'agit d\'une drupe (fruit charnu à noyau), de forme sphérique, de couleur généralement rouge plus ou moins foncé jusque noire, plus rarement jaune. ', './uploads/la-cerise-est-le-fruit-comestible-du-cerisier--1699625609.jpeg', 'Podek', '2023-11-10 14:13:29', '2023-11-16 14:55:55'),
(88, 1, 'Nouvelle pic', 'Description test', 'https://cdn.pixabay.com/photo/2023/10/13/14/39/book-8312948_1280.jpg', 'Charles', '2023-11-22 15:33:28', '2023-11-22 15:33:28'),
(89, 1, 'Nouvelle pic', 'Description test', 'https://cdn.pixabay.com/photo/2023/10/13/14/39/book-8312948_1280.jpg', 'Charles', '2023-11-22 15:34:22', '2023-11-22 15:34:22'),
(90, 1, 'Titre de la picture', 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera), un des représentants de la famille des palmiers ou Arécacées. L\'inflorescence complète peut atteindre 1 mètre de long.', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Charles', '2023-11-22 15:38:47', '2023-11-22 15:38:47'),
(91, 1, 'Titre de la picture', 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera), un des représentants de la famille des palmiers ou Arécacées. L\'inflorescence complète peut atteindre 1 mètre de long.', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Charles', '2023-11-22 15:39:03', '2023-11-22 15:39:03'),
(92, 1, 'Titre bidule', 'Description test', 'https://cdn.pixabay.com/photo/2016/07/22/09/59/fruits-1534494_1280.jpg', 'Charles', '2023-11-22 15:57:53', '2023-11-22 15:57:53'),
(93, 1, 'Test', 'Description test', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Podek', '2023-11-22 16:12:14', '2023-11-22 16:12:14');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[]' CHECK (json_valid(`roles`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `roles`) VALUES
(6, 'Yologaza', 'dekpo@me.com', '$2y$10$VRn7nFLrJhuhu4qOA6RBI.ZL4yFoQDy9hRZWf85ffoMV6oTjvRA5.', '[\"ROLE_ADMIN\",\"ROLE_EDITOR\",\"ROLE_MEMBER\"]'),
(19, 'Yologaza', 'dw.yologaza@gmail.com', '$2y$10$3kVCwLtz6P6oZ50Lmntxx.3SvsSmyd5pnIxETPe.c3nY0VC6nLZA.', '[\"ROLE_MEMBER\"]'),
(20, 'Dekpave', 'dw.yologaza@wanadoo.com', '$2y$10$ZxCRZD66xHiVhi54cQXGruJ8PY3NB.mbWd3ZNOzy0p3p2rfuOl1k6', '[]');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_picture_category` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `fk_picture_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
