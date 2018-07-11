SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `example`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE IF NOT EXISTS `acteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` text NOT NULL,
  `nom` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Acteurs' AUTO_INCREMENT=10 ;

--
-- Contenu de la table `acteurs`
--

INSERT INTO `acteurs` (`id`, `prenom`, `nom`, `image`) VALUES
(1, 'Bruce', 'Willis', 'http://images.allocine.fr/cx_160_213/b_1_d6d6d6/medias/nmedia/18/35/21/80/19457599.jpg'),
(2, 'Milla', 'Jovovich', 'http://fr.web.img2.acsta.net/cx_160_213/b_1_d6d6d6/medias/nmedia/18/35/36/09/19537428.jpg'),
(3, 'Haley', 'Joel Osment', 'http://images.allocine.fr/cx_160_213/b_1_d6d6d6/medias/nmedia/18/35/40/74/18389034.jpg'),
(4, 'Kevin', 'Spacey', 'http://fr.web.img2.acsta.net/cx_160_213/b_1_d6d6d6/medias/nmedia/18/35/28/48/19598003.jpg'),
(5, 'Helen', 'Hunt', 'http://images.allocine.fr/cx_160_213/b_1_d6d6d6/medias/nmedia/18/35/25/09/18988013.jpg'),
(6, 'Gabriel', 'Byrne', 'http://images.allocine.fr/cx_160_213/b_1_d6d6d6/medias/nmedia/18/35/33/74/20282977.jpg'),
(7, 'Samuel', 'L. Jackson ', 'http://images.allocine.fr/cx_160_213/b_1_d6d6d6/medias/nmedia/18/35/27/53/19541282.jpg'),
(8, 'John', 'Travolta', 'http://images.allocine.fr/cx_160_213/b_1_d6d6d6/medias/nmedia/18/35/26/97/20186850.jpg'),
(9, 'Uma', 'Thurman', 'http://images.allocine.fr/cx_160_213/b_1_d6d6d6/medias/nmedia/18/35/20/10/18965158.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `critiques`
--

CREATE TABLE IF NOT EXISTS `critiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `commentaire` text NOT NULL,
  `note` double NOT NULL,
  `film_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Critiques des films' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annee` tinytext NOT NULL,
  `description` text NOT NULL,
  `nom` text NOT NULL,
  `genre_id` int(11) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Films' AUTO_INCREMENT=7 ;

--
-- Contenu de la table `films`
--

INSERT INTO `films` (`id`, `annee`, `description`, `nom`, `genre_id`, `image`) VALUES
(1, '1997', 'Au XXIII siècle, dans un univers étrange et coloré, ou tout espoir de survie est impossible sans la découverte du cinquième élément, un héros affronte le mal pour sauver l''humanité. ', 'Le Cinquième élément', 1, 'http://images.allocine.fr/r_160_240/b_1_d6d6d6/medias/nmedia/18/36/08/43/18686562.jpg'),
(2, '2000', 'Cole Sear, garconnet de huit ans est hanté par un terrible secret. Son imaginaire est visité par des esprits menaçants. Trop jeune pour comprendre le pourquoi de ces apparitions et traumatisé par ces pouvoirs paranormaux, Cole s''enferme dans une peur maladive et ne veut reveler à personne la cause de son enfermement, à l''exception d''un psychologue pour enfants. La recherche d''une explication rationnelle guidera l''enfant et le thérapeute vers une vérité foudroyante et inexplicable. ', 'Sixième Sens', 2, 'http://images.allocine.fr/r_160_240/b_1_d6d6d6/medias/nmedia/18/66/15/77/19255607.jpg'),
(3, '2001', 'Une nouvelle année scolaire commence pour Trevor McKinney, un garçon de douze ans, une année qui ne ressemblera à aucune autre et changera peut-être la vie de milliers d''hommes. Le jour de la rentrée, Trevor reçoit de la part de son professeur Eugene Simonet un sujet de devoir pour le moins inhabituel : trouver une solution pour rendre le monde meilleur et la mettre en pratique.\r\n\r\nPlus mûr, plus sensible que ses camarades, Trevor prend très au sérieux ce devoir. Il suggère d''aider de façon désintéressée trois personnes qui deviendront ses obligées, et chacune d''entre elles devra passer le relais à trois inconnus qui en feront de même à leur tour.\r\n\r\nOn ne peut pas changer le monde à douze ans, mais on peut tenter de redonner espoir à son entourage : une mère déboussolée, un professeur solitaire et un SDF sont des cobayes de rêve pour un garçon inventif, généreux, en manque d''affection. ', 'Un Monde meilleur', 3, 'http://images.allocine.fr/r_160_240/b_1_d6d6d6/medias/nmedia/00/00/00/85/69197222_af.jpg'),
(4, '2001', 'Une légende du crime contraint cinq malfrats à aller s''acquitter d''une tâche très périlleuse. Ceux qui survivent pourront se partager un butin de 91 millions de dollars. ', 'Usual Suspects', 2, 'http://fr.web.img1.acsta.net/r_160_240/b_1_d6d6d6/medias/nmedia/00/02/29/04/69199504_af.jpg'),
(5, '1995', 'John McClane est cette fois-ci aux prises avec un maître chanteur, facétieux et dangereux, qui dépose des bombes dans New York. ', 'Une journée en enfer', 4, 'http://images.allocine.fr/r_160_240/b_1_d6d6d6/medias/nmedia/18/36/04/16/18686568.jpg'),
(6, '1994', 'L''odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s''entremêlent.', 'Pulp Fiction', 2, 'http://fr.web.img3.acsta.net/r_160_240/b_1_d6d6d6/medias/nmedia/18/36/02/52/18686501.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Genres de films' AUTO_INCREMENT=5 ;

--
-- Contenu de la table `genres`
--

INSERT INTO `genres` (`id`, `nom`) VALUES
(1, 'Science Fiction'),
(2, 'Thriller'),
(3, 'Comédie dramatique'),
(4, 'Action');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acteur_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `role` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acteur_id` (`acteur_id`,`film_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Roles joués par les acteurs dans les films' AUTO_INCREMENT=15 ;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `acteur_id`, `film_id`, `role`) VALUES
(1, 1, 1, 'Korben Dallas'),
(2, 2, 1, 'Leeloo'),
(3, 3, 2, 'Cole Sear'),
(4, 1, 2, 'Malcolm Crowe'),
(5, 3, 3, 'Trevor McKinney'),
(6, 4, 3, 'Eugene Simonet'),
(7, 5, 3, 'Arlene McKinney'),
(8, 6, 4, 'Dean Keaton'),
(9, 4, 4, 'Verbal Kint'),
(10, 1, 5, 'John McClane '),
(11, 7, 5, 'Zeus Carver'),
(12, 7, 6, 'Jules Winnfield'),
(13, 8, 6, 'Vincent Vega'),
(14, 9, 6, 'Mia Wallace'),
(15, 1, 6, 'Butch Coolidge');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `critiques`
--
ALTER TABLE `critiques`
  ADD CONSTRAINT `critiques_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);

--
-- Contraintes pour la table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Contraintes pour la table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`acteur_id`) REFERENCES `acteurs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
