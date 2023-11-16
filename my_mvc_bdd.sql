-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 16 nov. 2023 à 15:30
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
-- Base de données : `my_mvc_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
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

INSERT INTO `picture` (`id`, `title`, `description`, `src`, `author`, `created_at`, `updated_at`) VALUES
(1, 'La noix est un fruit comestible à coque.', 'La noix est un fruit comestible à coque. Elle est produite par les noyers, arbres de la famille des Juglandacées. La forme commercialisée la plus importante des régions tempérées provient de la culture du noyer commun1', 'https://cdn.pixabay.com/photo/2023/10/15/13/59/walnuts-8316999_1280.jpg', 'Nestor Bouboule', '2023-10-24 09:19:49', '2023-10-24 09:19:49'),
(2, 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera).', 'La noix de coco, ou le coco, est le fruit (drupe) du cocotier (Cocos nucifera), un des représentants de la famille des palmiers ou Arécacées. L\'inflorescence complète peut atteindre 1 mètre de long.', 'https://cdn.pixabay.com/photo/2016/07/06/20/56/coconut-1501334_1280.jpg', 'Vendredi Crusoé', '2023-10-24 09:26:45', '2023-10-25 17:22:33'),
(3, 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana)', 'La noisette, parfois appelée « aveline », est le fruit du noisetier commun (Corylus avellana), ainsi que de diverses espèces voisines du genre Corylus (non étudiées ici).', 'https://cdn.pixabay.com/photo/2018/10/30/08/39/hazelnuts-3783066_1280.jpg', 'Pierre Kiroule', '2023-10-24 09:32:36', '2023-10-24 09:32:36'),
(7, 'Les myrtilles sont de petites baies de couleur bleu-violacé', 'Les myrtilles sont de petites baies de couleur bleu-violacé à la saveur douce et légèrement sucrée, elles poussent sur le myrtillier. Elle est appelée également brimbelle dans l\'est de la France et en particulier dans les Vosges.', 'https://cdn.pixabay.com/photo/2016/04/13/07/18/blueberries-1326154_1280.jpg', 'Petit Pimousse', '2023-10-25 16:18:01', '2023-10-25 16:18:01'),
(8, 'La poire est le fruit à pépins comestible au goût doux et sucré', 'La poire est le fruit à pépins comestible au goût doux et sucré, produit par le poirier commun (Pyrus communis L.), arbre de la famille des Rosaceae.', 'https://cdn.pixabay.com/photo/2016/07/22/09/59/fruits-1534494_1280.jpg', 'Belle Hélène ', '2023-10-25 16:19:56', '2023-10-25 16:19:56'),
(9, 'L\'orange ou orange douce est le fruit de l\'oranger', 'L\'orange ou orange douce est le fruit de l\'oranger de la famille des Rutacées. Comme pour tous les agrumes, il s\'agit d\'une forme particulière de baie appelée hespéride.', 'https://cdn.pixabay.com/photo/2017/01/20/15/06/oranges-1995056_1280.jpg', 'Mécanique Orange', '2023-10-25 16:21:58', '2023-10-25 16:47:26'),
(11, 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées.', 'La framboise est un fruit rouge issu du framboisier, un arbre de la famille des rosacées. Selon qu\'il s\'agit de framboisiers sauvages ou cultivés, la framboise pèse de 4 à 10 g, mesure jusqu\'à 2,5 cm et compte de 40 à 80 drupéoles', 'https://cdn.pixabay.com/photo/2016/05/31/13/01/raspberries-1426859_1280.jpg', 'Framboise Hardy', '2023-10-25 16:54:08', '2023-10-25 16:54:08'),
(26, 'La cerise est le fruit comestible du cerisier. HELLO !!', 'La cerise est le fruit comestible du cerisier. Il s\'agit d\'une drupe (fruit charnu à noyau), de forme sphérique, de couleur généralement rouge plus ou moins foncé jusque noire, plus rarement jaune. ', './uploads/la-cerise-est-le-fruit-comestible-du-cerisier--1699625609.jpeg', 'Podek', '2023-11-10 14:13:29', '2023-11-16 14:55:55');

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
(6, 'Yologaza', 'dekpo@me.com', '$2y$10$VRn7nFLrJhuhu4qOA6RBI.ZL4yFoQDy9hRZWf85ffoMV6oTjvRA5.', '[]');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
