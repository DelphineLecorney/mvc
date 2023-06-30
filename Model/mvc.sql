
CREATE DATABASE IF NOT EXISTS mvc;

USE mvc;

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `articles` (`id`, `title`, `description`, `publish_date`, `image_url`, `author`) VALUES
(1, 'Wout van aert', "Wout van Aert (né le 15 septembre 1994 à Herentals) est un coureur cycliste belge, membre de l'équipe Jumbo-Visma depuis 2019.
Spécialisé en cyclo-cross, il est triple champion du monde de cyclo-cross en 2016, 2017 et 2018. Il a également été champion de Belgique sur route en 2021, champion de Belgique du contre-la-montre en 2019, 2020 et 2023 et a remporté neuf étapes du Tour de France, dont il a aussi remporté en 2022 le classement par points et le titre de super-combatif. Il a également brillé sur les classiques, remportant les Strade Bianche, ainsi que Milan-San Remo en 2020 et Gand-Wevelgem et l'Amstel Gold Race en 2021. Il compte trois médailles d'argent aux mondiaux sur route et est également médaillé d'argent lors de la course sur route des Jeux olympiques de Tokyo.", '2023-06-28 10:00:00', 'https://upload.wikimedia.org/wikipedia/commons/e/ed/WVA_Paris-Roubaix_2022.jpg', 'Lecorney Delphine'),
(2, 'Mathier van der Poel', "Mathieu van der Poel, né le 19 janvier 1995 à Kapellen en Belgique, est un coureur cycliste néerlandais et français 1qui pratique le cyclo-cross, le VTT cross-country et le cyclisme sur route, au sein de l'équipe Alpecin-Deceuninck. Sa nationalité sportive est néerlandaise.
Coureur polyvalent, il est notamment quintuple champion du monde de cyclo-cross (2015, 2019, 2020, 2021 et 2023), ainsi que triple champion d'Europe de cyclo-cross (2017, 2018 et 2019), et champion d'Europe de VTT cross-country 2019. En outre, il est sextuple champion des Pays-Bas de cyclo-cross, double champion des Pays-Bas sur route (2018 et 2020) et champion des Pays-Bas de VTT cross-country 2018. Il est ainsi le premier coureur néerlandais champion dans ces trois disciplines.", '2023-06-29 14:30:00', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/MVDP_Paris-Roubaix_2022.jpg/800px-MVDP_Paris-Roubaix_2022.jpg', 'Lecorney Delphine'),
(3, 'Tour de France', 'Le Grand Départ de la Communauté autonome du Pays Basque sera le deuxième après celui de Saint-Sébastien en 1992 et le 25e de l’étranger. Après trois étapes au-delà des Pyrénées, le Tour se poursuivra ensuite en intégralité dans l’Hexagone. 6 Régions et 23 départements seront visités.', '2023-06-30 09:15:00', 'https://cyclismerevue.be/wp-content/uploads/2023/06/Tour-de-France-2023-Couverture.png', 'Dupuis dupuis');
