-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 18 Avril 2017 à 13:48
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dev_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(5) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--id_categorie : l'identifiant unique de la catégorie
--Nom : le nom de la catégorie
--Slug : le slug utilisé pour les URI
--Titre : pour la balise meta title de la page correspondante
--Description : pour la balise meta description de la page correspondante

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom`, `slug`, `titre`, `description`) VALUES
(1, 'Front end', 'front-end', 'Travaux front end', 'Description travaux front end'),
(2, 'Back end', 'back-end', 'Travaux back end', 'Description travaux back end'),
(3, 'UI design', 'ui-design', 'Travaux ui design', 'Description travaux ui design');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(15) NOT NULL,
  `id_travx_com` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nom` varchar(50) NOT NULL,
  `contenu` varchar(600) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `site_web` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id_competences` int(5) NOT NULL,
  `id_cat_compet` int(5) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `taux` int(7) NOT NULL,
  `technique_key` tinyint(1) DEFAULT '0',
  `travaux_key` tinyint(1) DEFAULT '0',
  `titre` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`id_competences`, `id_cat_compet`, `nom`, `slug`, `taux`, `technique_key`, `travaux_key`, `titre`, `description`) VALUES
(1, 1, 'html5/css3', 'html-css', 85, 1, 1, 'Travaux html/css ', 'Description html/css'),
(2, 1, 'JQuery/JS', 'jquery-js', 70, 1, 1, 'Travaux JQuery/JS', 'Description JQuery/JS'),
(3, 1, 'AngularJS', 'angular-js', 55, 0, 0, 'Travaux AngularJS', 'Description AngularJS'),
(4, 1, 'Ionic', 'ionic', 20, 0, 0, 'Travaux Ionic', 'Description Ionic'),
(5, 2, 'PHP/MySql', 'php-mysql', 70, 1, 1, 'Travaux PHP/MySql', 'Description PHP/MySql'),
(6, 2, 'NodeJS', 'node-js', 30, 1, 0, 'Travaux NodeJS', 'Description NodeJS'),
(7, 2, 'JavaEE', 'javaee', 20, 1, 0, 'Travaux JavaEE', 'Description JavaEE'),
(8, 3, 'Logo', 'logo', 60, 0, 1, 'Travaux Logo', 'Description Logo'),
(9, 3, 'Prestashop', 'prestashop', 40, 1, 0, 'Travaux Prestashop', 'Description Prestashop'),
(10, 3, 'Design Pattern', 'design-pattern', 65, 0, 0, 'Travaux Design Pattern', 'Description Design Pattern'),
(11, 3, 'Illustrator', 'illustrator', 65, 1, 1, 'Travaux Illustrator', 'Description Illustrator'),
(12, 3, 'Photoshop', 'photoshop', 60, 1, 0, 'Travaux Photoshop', 'Description Photoshop');

-- --------------------------------------------------------

--
-- Structure de la table `compteur`
--

CREATE TABLE `compteur` (
  `id_compteur` int(12) NOT NULL,
  `id_travx_compteur` int(12) NOT NULL,
  `mediocre` int(8) NOT NULL DEFAULT '0',
  `convenable` int(8) NOT NULL DEFAULT '0',
  `bon` int(8) NOT NULL DEFAULT '0',
  `tres_bon` int(8) NOT NULL DEFAULT '0',
  `excellent` int(8) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compteur`
--

INSERT INTO `compteur` (`id_compteur`, `id_travx_compteur`, `mediocre`, `convenable`, `bon`, `tres_bon`, `excellent`) VALUES
(1, 1, 0, 0, 0, 0, 1),
(2, 2, 0, 0, 0, 0, 1),
(3, 3, 0, 0, 0, 0, 1),
(4, 4, 0, 0, 0, 0, 1),
(5, 5, 0, 0, 0, 0, 1),
(6, 6, 0, 0, 2, 0, 1),
(7, 7, 0, 0, 0, 0, 1),
(8, 8, 0, 0, 0, 0, 1),
(9, 9, 0, 0, 0, 0, 1),
(10, 10, 0, 0, 0, 0, 1),
(11, 11, 0, 0, 0, 0, 1),
(12, 12, 0, 0, 0, 0, 1),
(13, 13, 0, 0, 0, 0, 1),
(14, 14, 0, 0, 0, 0, 1),
(15, 15, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(12) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `mail` int(50) NOT NULL,
  `tel` int(12) NOT NULL,
  `url` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `experiences_pro`
--

CREATE TABLE `experiences_pro` (
  `id_experience` int(5) NOT NULL,
  `id_cat_exp` int(5) NOT NULL,
  `entreprise` varchar(150) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `poste` varchar(60) NOT NULL,
  `techno_poste` varchar(25) NOT NULL,
  `environement` varchar(250) NOT NULL,
  `titre_mission` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `experiences_pro`
--

INSERT INTO `experiences_pro` (`id_experience`, `id_cat_exp`, `entreprise`, `periode`, `poste`, `techno_poste`, `environement`, `titre_mission`, `description`) VALUES
(1, 1, 'Inbox Group', 'Oct. 2016 - Nov.2016', 'D&eacute;veloppeur Front End Angular JS 1.5', 'angular', 'Angular JS 1.5, HTML5, CSS3, Git, Gulp, Bower, NPM, GitLab, Vivify', 'Refonte d''un application sous AngularJS de ciblage et de listing pour les campagnes Emailling de Grands comptes', 'Travail en &eacute;quipe &agrave; l''aide de l''outil de versionning GitLab et utilisation des lignes de commandes Linux pour la gestion des branches.|R&eacute;alisation de WebComponents pour le contr&ocirc;le et la gestion des donn&eacute;es c&ocirc;t&eacute; client et consommation d''un WebService RestFull sous Zend Expressive qui retourne apr&egrave;s v&eacute;rification des donn&eacute;es un Object Json.|Utilisation de la m&eacute;thode de travail SCRUM pour la gestion de l''avancement du projet sur des Sprints de deux semaines.');

-- --------------------------------------------------------

--
-- Structure de la table `interventions`
--

CREATE TABLE `interventions` (
  `id_intervention` int(9) NOT NULL,
  `id_cat_inter` int(5) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `definition` text NOT NULL,
  `utilite` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `interventions`
--

INSERT INTO `interventions` (`id_intervention`, `id_cat_inter`, `nom`, `slug`, `definition`, `utilite`) VALUES
(1, 1, 'HTML', 'html', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex eveniet sunt, at voluptatem ducimus. Ea, eveniet reiciendis rem maxime natus blanditiis! Accusantium doloribus dolores accusamus. Beatae repudiandae rem aut expedita ex aspernatur labore necessitatibus, ut at est doloremque ratione harum id consequatur error, voluptatum facilis veniam voluptatem a cupiditate, quidem. Repellat nemo nulla minus. Officiis sint dignissimos corporis tempora harum quia, nesciunt deleniti facilis dolor molestias porro est dolore obcaecati ullam non rem libero, nam consectetur qui nostrum assumenda pariatur perspiciatis. Ad soluta, dolores ipsum voluptas. Iusto natus nulla sint architecto, neque, possimus non culpa ad exercitationem, reprehenderit dolores. Deserunt ipsum saepe voluptate dignissimos, excepturi aperiam. Quasi in maxime eaque tempora aperiam consectetur unde nesciunt, dolores quam corporis temporibus iusto maiores deleniti sed alias incidunt sunt repellendus error repellat fugit ducimus at quas esse culpa quaerat! Temporibus harum iusto maiores ipsa expedita quis delectus! Aliquid laboriosam labore numquam dicta tenetur?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis dolorem rerum dicta neque laudantium exercitationem commodi ipsum quas, facilis alias odit, minima aliquid soluta. Iure unde iusto vitae repellendus, veritatis eaque consectetur, explicabo quibusdam nesciunt vel. Iste saepe, reprehenderit distinctio cum molestias odio perspiciatis quasi unde tempora quod esse quisquam.'),
(2, 1, 'CSS', 'css', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, cumque quo voluptate modi quibusdam atque debitis dolore animi tenetur tempora ipsa beatae iusto placeat reiciendis voluptates. Vitae reiciendis officia a, quisquam ad, nobis voluptatibus illo fuga sint similique tenetur quo asperiores, saepe impedit exercitationem consectetur autem. Enim voluptatibus sapiente officiis ad ratione, aut architecto nemo soluta quas, facere dolores esse blanditiis eius reprehenderit eaque? Illo praesentium nihil culpa soluta assumenda minus doloribus quo odit consequuntur officia reprehenderit aspernatur voluptatem laboriosam, delectus quasi repellat voluptatum temporibus nostrum, mollitia iure, dolore ad in error hic placeat! Architecto enim sint eligendi ut pariatur minus quas numquam nihil autem modi voluptatum nobis sed, ab! Eum maxime neque voluptates ut tenetur perspiciatis esse tempore maiores distinctio placeat assumenda numquam itaque porro ratione deserunt aperiam blanditiis accusamus corporis, consectetur nemo veniam odio doloribus? Ipsam, ex, illo nam delectus perspiciatis hic? Modi alias minus debitis porro, officia.&lt;/p&gt;', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae possimus repellat, nemo deserunt voluptatum commodi ab asperiores rem, laboriosam qui veniam corrupti aut, ullam nesciunt! Assumenda asperiores magnam, exercitationem alias facilis iusto porro fugiat debitis sed, excepturi eum ullam sunt voluptatem ab? Sapiente unde repellendus, sunt repudiandae nobis ab voluptatem.&lt;/p&gt;'),
(3, 1, 'JavaScript', 'javascript', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora aspernatur voluptatum facere, totam eaque, repellat aliquam debitis maiores molestiae quo, velit in laboriosam! Eveniet est necessitatibus reprehenderit voluptates, pariatur rerum nesciunt quo ab laudantium vel eaque animi hic non aperiam veniam, quae unde recusandae accusamus aliquid, nisi natus rem possimus! Quaerat, atque! Doloremque maiores minima ea, in excepturi voluptate eligendi non aperiam molestias, est, explicabo similique vel illo nisi? Maiores harum ullam hic natus architecto, est velit nobis sed quod in esse dolorem eligendi maxime blanditiis saepe iure perspiciatis quas fuga quaerat quisquam. Similique facilis, veniam repudiandae velit hic! Consequuntur quam libero ab, ut ipsa deserunt. Eligendi vel quas, aperiam praesentium, architecto in asperiores voluptatem vitae rerum at aut quae facere, rem necessitatibus, blanditiis odio velit autem. Quam ut odio blanditiis ad neque quaerat, maxime animi sit necessitatibus quisquam impedit amet, ab eum eos cumque perspiciatis voluptatibus pariatur quidem facilis.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque similique, commodi excepturi, iusto provident unde enim cupiditate. Quam impedit architecto alias, iste numquam adipisci illum id temporibus quasi expedita omnis, dignissimos veritatis recusandae, explicabo voluptatibus itaque illo totam autem animi? Harum natus cumque totam, voluptatibus dolores mollitia maxime aut recusandae.'),
(4, 2, 'D&eacute;veloppement', 'developpement', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt modi eaque laborum similique voluptatem. Dignissimos fuga quisquam soluta ex, ipsum libero optio fugiat aspernatur nulla perferendis cumque eos quod eligendi quo blanditiis repellat molestiae quam quos nobis deleniti ea quaerat distinctio, laudantium atque quia? Id ea quos aperiam, vel eaque dignissimos, ipsa cumque voluptatum, asperiores nostrum voluptatibus. Expedita officiis et totam qui sed, consectetur autem unde quis nesciunt eum minus tempora mollitia. Dolore nihil cumque magnam vel id dolorum? Libero reiciendis ullam voluptas facilis quos, aut in, placeat laborum iste cumque perspiciatis? Voluptate sequi soluta qui, optio. Ipsum, illo. Officia eligendi aliquid cumque sed, quos possimus blanditiis non debitis placeat, veritatis repellat totam. Est labore corporis voluptates dolore repudiandae officiis quas fugit, quaerat earum porro illo laborum necessitatibus, neque magni! Facere et, odit velit nam, quo voluptate quos veniam architecto omnis ex iste. Architecto dolor itaque aperiam illo. Temporibus, iste!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam eaque praesentium soluta incidunt, animi quam porro deleniti, optio. Saepe repudiandae deserunt veniam itaque, ullam ipsa amet assumenda accusantium doloremque numquam quaerat qui nobis animi molestias placeat ea rerum ducimus ipsum minima delectus quisquam fugit eaque excepturi. Cumque, quia optio dolorum!'),
(5, 1, 'Int&eacute;gration', 'integration', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem architecto delectus id similique odit dignissimos modi sunt accusantium, aliquam nisi fugiat nostrum voluptatibus. Eligendi tenetur porro doloremque consectetur officiis earum ducimus excepturi, voluptate atque, sed obcaecati delectus, pariatur minus aspernatur accusamus consequatur tempore omnis id iste ipsum sequi distinctio repellat ex saepe! Reprehenderit repudiandae ipsum a commodi, ut atque id, accusantium, maiores, nemo quae praesentium ad vitae? Totam dolorum corporis, incidunt necessitatibus praesentium quam ipsam eum tenetur eveniet! Atque, eius, eaque. Dolor alias fuga adipisci ab velit assumenda cupiditate? Recusandae itaque voluptas dolorem esse cupiditate veritatis, asperiores, commodi culpa magni expedita assumenda fugit possimus inventore odio cumque voluptates iusto enim rem maiores? Beatae enim, provident et, reiciendis eveniet, eius praesentium delectus at inventore distinctio id non officia maxime, mollitia asperiores rem repellendus itaque pariatur! Labore exercitationem enim, ex dolorum, officiis ratione ipsa molestiae vitae porro, velit beatae, officia odit alias!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione iusto vitae, maiores atque fugit ea delectus quia doloribus error magnam inventore aliquid neque nisi mollitia laboriosam culpa totam voluptatum ducimus. Pariatur tempora modi assumenda laborum natus hic magni blanditiis facilis repudiandae corporis aliquam, cumque deleniti ad nesciunt incidunt quos explicabo.'),
(6, 3, 'Web Design', 'web-design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, molestias atque consequuntur dolor ratione dolore, eum. Iusto quibusdam unde porro blanditiis voluptates, a laboriosam rem omnis optio dolor alias consequuntur, vel odio praesentium quaerat dolorum veritatis rerum reprehenderit repellat architecto earum, quidem dolorem voluptate. At qui deserunt, hic tenetur ex cum nobis repudiandae, cumque beatae culpa itaque est aut facilis vitae autem expedita quia eum nisi a illo cupiditate repellendus nam! Odio, enim! Ipsum alias temporibus possimus fugiat magni amet unde, nam ut labore deleniti quibusdam impedit porro facere, repellendus quos. Officia est voluptas alias explicabo ducimus quod tempora, dolores ullam in tempore. Illo reprehenderit non sapiente, repellendus ducimus, recusandae! Magni sunt et, animi sed qui facilis explicabo? Animi architecto maxime nobis temporibus, odio consequatur ullam quisquam at est soluta molestias, optio officia incidunt, porro quo non alias, repellat inventore aspernatur provident commodi! Quas nisi, rerum eius iste vero iure.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod vitae qui, dolore numquam dolorum iusto. Mollitia, dolores possimus quis autem quaerat nostrum vitae vel repudiandae a corporis quidem nihil molestiae, quas adipisci neque est reiciendis ipsam. Voluptatum mollitia ad eum, maxime assumenda, non! Architecto voluptas tempore mollitia nesciunt necessitatibus adipisci.'),
(7, 2, 'PHP', 'php', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil blanditiis maiores sequi molestiae expedita dignissimos veniam ducimus deserunt suscipit quaerat, sint asperiores. Delectus totam tempora, neque molestias soluta fugiat explicabo, provident rem sed, cum eos nisi ipsum sequi aspernatur error voluptatem. Quis asperiores dolorem inventore voluptatibus, recusandae ad et praesentium. Totam, quo, molestias. Reprehenderit corrupti veritatis laudantium ipsum repudiandae tenetur fugiat rerum, illum omnis perspiciatis ut error magnam, dignissimos animi debitis? Fuga iste ea autem in error aliquam dignissimos recusandae ab, ad architecto voluptas doloribus, suscipit deserunt expedita laboriosam unde velit fugit earum nisi quod aut repellat inventore atque. Quisquam expedita sapiente harum suscipit eum sunt sint error, necessitatibus ducimus! Explicabo tempore laudantium dolores architecto temporibus, eligendi nisi consectetur praesentium quaerat impedit magnam minima voluptas voluptate porro magni inventore quae, ipsam neque est. Iusto fuga sit eligendi, eos neque est, asperiores quae laboriosam commodi repellat, dolorum amet consequatur vitae labore.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, iste! Veniam praesentium neque, inventore magnam illo amet, repudiandae ab exercitationem harum laboriosam eaque consectetur aperiam nobis earum hic numquam ad similique vitae et! Modi vel tempora aliquid, fuga et iure, odit officia explicabo accusantium cumque saepe provident eligendi nulla nihil.'),
(8, 2, 'MySql', 'mysql', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat consectetur odit saepe, deserunt suscipit reprehenderit voluptas, accusamus, repudiandae corporis perspiciatis similique quidem vel dolor soluta necessitatibus quasi aperiam nam optio fugit ullam doloribus ut molestias repellat libero. Quibusdam alias quis, voluptas exercitationem dolorem, deleniti expedita corporis, molestiae consectetur voluptatibus aliquid. Ex nemo molestias obcaecati vero, ullam sequi dolorem, facere voluptatum libero quos culpa. Placeat vero soluta, recusandae voluptates aliquid quibusdam odit minus consectetur saepe harum quas explicabo officiis facilis molestias cumque eius dicta quidem eligendi, alias ab numquam omnis quae reiciendis, consequuntur! Hic ipsam, eos expedita magnam consectetur placeat optio voluptate modi maxime, commodi, consequuntur reprehenderit dolores! Sequi in debitis minima, labore optio tenetur odit. Nisi magnam vero enim corporis obcaecati doloremque laboriosam id facilis aut itaque possimus commodi ad, sint eum dolorem soluta assumenda dolores, maxime! Eum corporis quos ducimus, nulla provident numquam, nihil minima iste consequuntur molestiae ad.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa quos laboriosam excepturi nulla, placeat tempore dolores sunt necessitatibus fugit ea itaque ipsum repudiandae fugiat eligendi magnam quisquam non tempora labore harum, cumque odit maiores in voluptates obcaecati? Enim, vero, consectetur, assumenda blanditiis veritatis dolore ipsum qui amet accusamus incidunt accusantium.'),
(9, 1, 'W3C', 'w3c', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, recusandae tempora soluta placeat ipsam doloremque? Nihil ut assumenda reprehenderit dolore beatae eveniet numquam dolor, ab quibusdam laudantium fuga enim animi at reiciendis alias, inventore esse velit nemo accusamus vero voluptatem, facilis a? Quaerat ullam magnam voluptas labore dolores nihil saepe dolorem, quod alias itaque assumenda placeat aperiam, rem explicabo, maxime iusto, incidunt sapiente blanditiis! Voluptas, rerum, vero. Unde tempora soluta ducimus laudantium asperiores corporis, explicabo numquam, nisi pariatur fuga! Molestiae in cumque possimus vero harum voluptatum error rem ducimus? Qui odit, fuga est nesciunt iure aperiam labore dolor. Ipsum, cupiditate quae ipsa officiis tempora, animi eligendi, a blanditiis illo obcaecati ratione repellendus repellat quas voluptatum minima. Voluptate sint voluptatum, labore voluptatibus animi sit quo ipsa sequi culpa laborum fuga, illo? Neque cupiditate fugiat, aperiam earum accusantium minus expedita officiis incidunt unde eum perspiciatis inventore nemo, quisquam adipisci enim laudantium sunt.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet quia eos doloribus voluptatum doloremque inventore numquam sunt sit officia non iure fugiat magnam, pariatur ratione eius eaque. Saepe totam perspiciatis velit, labore adipisci fugiat, voluptatem sunt distinctio deleniti est similique libero. Laborum, libero. Libero iste quasi, a consectetur perferendis, magni.');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id_service` int(5) NOT NULL,
  `id_cat_serv` int(5) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`id_service`, `id_cat_serv`, `nom`, `slug`, `description`) VALUES
(1, 1, 'Responsive Design', 'responsive-design', 'Pour un affichage optimis&eacute; et un contenu visible sur les tablettes, smartphones et navigateurs web.'),
(2, 3, 'Ergonomie', 'ergonomie', 'Une navigation simple pour l''utilisateur et une meilleur accessibilit&eacute; &agrave; l''information. '),
(3, 3, 'Charte graphique', 'charte-graphique', 'La cr&eacute;ation d''un logo reste un support de communication fort pour l&rsquo;identit&eacute; de votre entreprise.'),
(4, 3, 'Web Design', 'web-design', 'De l''id&eacute;e &agrave; la maquette avec le respect de l&rsquo;image de l&rsquo;entreprise et ses activit&eacute;s.'),
(5, 2, 'D&eacute;veloppement web', 'developpement-web', 'D&eacute;veloppement d''applications web dynamiques avec base de donn&eacute;es relationnelles.'),
(6, 1, 'Int&eacute;gration', 'integration', 'D&eacute;coupage et int&eacute;gration de vos pages web dans le respect des normes W3C et S.E.O.'),
(7, 1, 'R&eacute;f&eacute;rencement naturel', 'referencement-naturel', 'Du contenu original et le respect des normes S.E.O pour une meilleur visibilit&eacute;'),
(8, 3, 'Prestashop', 'prestashop', 'Administration, installation et configuration de vos th&egrave;mes, plugins et contenu.');

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

CREATE TABLE `statistiques` (
  `id_stat` int(12) NOT NULL,
  `id_travx_stat` int(12) NOT NULL,
  `nb_vue` int(15) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `statistiques`
--

INSERT INTO `statistiques` (`id_stat`, `id_travx_stat`, `nb_vue`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 4),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `travaux`
--

CREATE TABLE `travaux` (
  `id_travaux` int(12) NOT NULL,
  `id_cat_travx` int(5) NOT NULL,
  `id_comp_travx` int(5) NOT NULL,
  `titre` varchar(155) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `projet` text NOT NULL,
  `technique` text NOT NULL,
  `fonctionnel` text NOT NULL,
  `source` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `travaux`
--

INSERT INTO `travaux` (`id_travaux`, `id_cat_travx`, `id_comp_travx`, `titre`, `slug`, `date`, `projet`, `technique`, `fonctionnel`, `source`) VALUES
(1, 2, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'au-jury-furent', '2017-04-14 08:28:38', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad veniam obcaecati commodi tempora quasi! Impedit molestias harum in illo unde veniam atque esse explicabo neque dicta ex non quas quibusdam, soluta, rem laudantium odit cumque. Tempora, sequi enim culpa est esse. Placeat impedit provident, atque sequi cumque, autem amet, natus voluptate similique nisi reprehenderit. Tempora quae quibusdam laborum voluptate doloremque, ipsa ipsam magnam dolore soluta. Eveniet, autem, facilis magni illo, quae aliquid deleniti animi cupiditate, sint voluptates veniam. Ipsum, odit, at. Eum illum, sed ullam fugiat possimus corporis nobis itaque, ea quisquam ex dolore numquam optio veniam modi provident dolorem totam voluptatem facilis. Impedit at est ea, quod vero quo exercitationem ad. Deleniti nulla molestias, itaque perspiciatis numquam, ab repellat blanditiis qui ducimus tenetur odio amet necessitatibus magni fugit, error fugiat impedit explicabo. Quas ipsa ut omnis, optio autem. A repudiandae accusantium consequuntur modi ad sed laboriosam cum id magnam molestias voluptatibus sequi ipsam facilis, voluptate quasi. Dolore sed itaque debitis asperiores adipisci, modi, suscipit aliquid odio. Possimus aliquam, laborum voluptatem inventore odio numquam blanditiis ipsam tempora placeat. Magni odio unde odit inventore voluptatibus laborum, dolorum deleniti non nostrum ducimus porro, illo a consequatur? Impedit blanditiis mollitia ipsam, voluptas similique.', 'git,html,css,bootstrap,jquery,php', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, aliquam enim rerum numquam repellat sed. Atque ipsum enim obcaecati? Adipisci, eius dolorum aut aliquid quam.|Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, vero?|Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed at excepturi exercitationem rem ad sit debitis expedita doloremque dolor repellat nihil quisquam, aspernatur cumque sunt magni, possimus blanditiis, consequatur quidem!', 'github|http://www.google.fr,pinterest|http://www.google.com,demo|http://www.one.com'),
(2, 3, 8, 'Quas consequuntur numquam ducimus rem fugit nam suscipit.', 'tous-les-hommes', '2017-04-14 08:29:21', 'Architecto recusandae facere optio perspiciatis, quae soluta magni ut earum. Aperiam a totam alias, obcaecati consequatur, illo nulla mollitia ratione consequuntur sit, fugiat illum reprehenderit cumque ducimus ad error quia maxime molestias iusto velit. Ipsam qui pariatur soluta fugit dignissimos delectus neque a! Possimus id quis voluptatibus sint ullam iste debitis similique labore expedita, aperiam voluptatem quidem itaque inventore ex repellat earum in. Cum nisi maxime, dolorum alias corrupti, recusandae numquam saepe, dolore eligendi repellat quis dicta vitae atque! Blanditiis cupiditate optio sunt odit, ipsum, architecto cum vero doloribus aut maxime ullam neque sapiente accusantium placeat eveniet voluptates tempora, ea dolore nesciunt eaque quidem porro! Obcaecati quia, velit necessitatibus sunt, facilis quod dolore nostrum odit. Veritatis harum ut nesciunt fugit rerum magnam, itaque voluptatibus autem! Dolore aliquid odio, mollitia quam quaerat illum quas, dicta alias error omnis laborum totam, libero quasi autem consectetur placeat necessitatibus provident quisquam asperiores eveniet. Dolores, obcaecati, accusamus. Eum id excepturi, laborum vitae ex, corporis quibusdam nobis earum accusantium tempora consectetur odio dicta quod nam voluptate aut dolor magni voluptatibus exercitationem. Eaque molestiae illum totam ad, doloribus, dolorem earum praesentium iusto. Laborum pariatur magni aperiam nobis earum deleniti consequatur qui ullam doloremque atque, aliquid, vel suscipit.', 'git,html,css,bootstrap,jquery,php', 'Ducimus dolore dolor eum ratione sequi rerum error inventore nulla quod hic, dicta minus sit omnis maiores atque iste consequatur dolores nobis vel est quia?|Cumque accusamus omnis quas sint consequuntur harum optio culpa voluptatum?|Beatae harum eos deleniti voluptatum rerum, molestias veritatis tenetur illo ex possimus animi ullam, placeat, ea. Neque, suscipit molestias optio in voluptatibus nam quam eius, sunt, sequi, minima officia ratione.', 'github|http://www.google.fr,pinterest|http://www.google.com,demo|http://www.one.com'),
(3, 1, 2, 'Eligendi id ab, impedit minima alias quas enim.', 'vingt-pieds-de-profondeur', '2017-04-14 08:30:04', 'Accusantium modi repellendus labore libero molestias, consequatur sequi cumque odit enim veniam, explicabo incidunt ipsum nisi mollitia vitae qui, numquam natus non eius eligendi odio ut earum autem dicta! Nesciunt vel voluptas consequuntur, nostrum suscipit ex dolorem blanditiis, tenetur impedit voluptatibus maxime vitae, nobis rerum neque quam voluptatem quod, deleniti accusantium expedita optio quisquam autem voluptate ullam nulla totam. Nemo fugit, fugiat corporis, perferendis mollitia repellendus. Aperiam placeat repudiandae tempore, laborum aliquam ex beatae rerum exercitationem eum saepe libero dolores temporibus est necessitatibus quis sunt, nam quos nobis quae, qui veniam consectetur! Deleniti quis aspernatur modi ab mollitia quo, molestias tenetur. Dolore eum illum sequi, doloremque iure cupiditate dolores laudantium ex tempora vel necessitatibus in impedit sunt consequatur distinctio nostrum ducimus ea, architecto vero odio quo. Pariatur reprehenderit eum, facere non, eos et in magni inventore? Fugiat quae earum aliquid ad harum, id distinctio sed debitis eum quia corrupti doloremque pariatur, ullam error alias cum nesciunt quo modi impedit at consequuntur perspiciatis, minima expedita. Voluptas est incidunt reprehenderit rem eum labore ipsum, voluptatibus molestiae, nemo dolor veniam consequatur aliquid voluptatem corporis. Ducimus excepturi molestias sunt iure omnis, nesciunt expedita maxime ab dolorem? Animi expedita, vero commodi praesentium quo, voluptatem tenetur.', 'git,html,css,bootstrap,jquery,php', 'Reprehenderit doloremque suscipit nam molestias, eligendi labore cupiditate odit adipisci natus, rerum autem deserunt temporibus commodi non aut ratione quis nihil nostrum aperiam assumenda ex.|Nisi sunt, laudantium possimus perferendis beatae magni quidem soluta consequuntur?|Omnis dolorum maiores aspernatur, eos soluta, eum consequuntur praesentium earum animi expedita at laborum nam nulla, facere assumenda quas laboriosam similique officiis nobis. Similique sequi, incidunt quam ut inventore asperiores.', 'github|http://www.google.fr,pinterest|http://www.google.com,demo|http://www.one.com'),
(4, 1, 2, 'Corrupti accusantium a totam, tempore optio! Quidem, accusantium?', 'enveloppait-de-nouveau', '2017-04-14 08:30:33', 'Quaerat suscipit, aspernatur perferendis ipsum porro, quibusdam. Incidunt iusto nesciunt quos id commodi, officia alias, harum. Voluptas nulla quis, maxime debitis necessitatibus vitae magni beatae nemo pariatur, obcaecati, enim odio quos est dicta. Corporis inventore necessitatibus accusantium dolorem quaerat explicabo dolore saepe quisquam, earum repellendus vero perspiciatis neque quasi laborum voluptate quae numquam incidunt dignissimos vitae, nemo deleniti repudiandae sunt quibusdam odit eum? Ea dolorum aliquid iste dolorem itaque minima commodi, molestias eveniet neque harum totam quidem recusandae temporibus eius necessitatibus veniam minus maxime consectetur, vel omnis voluptatem? Cupiditate minima sit ipsum debitis sunt dolor. Nostrum, magni velit tenetur molestias possimus. Et, eum corporis, odit consequuntur quam praesentium eius voluptatibus, quasi nihil saepe veniam. Nesciunt rerum aut sint ullam laboriosam unde ex quam quia enim officia quisquam, dolor dolorum deleniti reiciendis eligendi pariatur aliquam neque impedit! Doloribus dolores, sapiente possimus quos repellendus ullam dolorum distinctio amet aliquam nisi labore commodi inventore vitae molestiae repudiandae blanditiis velit omnis soluta perferendis saepe. Dolores quas, molestias sapiente, at, delectus aperiam suscipit veniam aut vero explicabo cumque reprehenderit veritatis nesciunt maxime voluptate dolor fuga architecto mollitia tempore amet voluptatem perspiciatis! Temporibus numquam neque perspiciatis atque voluptas. Quos vitae fugiat asperiores quia odio est, aut!', 'git,html,css,bootstrap,jquery,php', 'Culpa veniam quia maiores deserunt dicta, aperiam illum vero a animi! Labore corrupti, velit quos amet nostrum voluptates ab quam, ex non quae facere temporibus.|Pariatur iusto, similique tenetur deleniti eveniet, aspernatur quis itaque rem.|Delectus quod aperiam, consequuntur. Eligendi modi tenetur, quibusdam. Obcaecati inventore, fuga, repellat sit nemo numquam iure dignissimos accusamus libero consectetur quisquam vitae deserunt corrupti sequi adipisci et, saepe, aliquid consequatur!', 'github|http://www.google.fr,pinterest|http://www.google.com,demo|http://www.one.com'),
(5, 3, 11, 'Vero numquam molestiae quisquam consectetur, explicabo quae officia?', 'sans-doute-en-poche', '2017-04-14 08:31:04', 'Id dignissimos, nihil delectus eligendi minima voluptate aliquid repellat perspiciatis. Totam officia dolor culpa, optio at autem libero beatae dolorem voluptatibus reprehenderit hic tenetur itaque in sapiente sequi maxime. Molestiae enim facilis asperiores nulla maxime, quae eligendi aspernatur tenetur culpa, omnis itaque suscipit vel fuga quibusdam. Ipsum ea quia suscipit provident, perferendis possimus atque sint molestias porro, expedita, accusamus alias, voluptatum odio cum officia quos eius quisquam qui quasi ipsam amet mollitia? Non consequatur ipsa, incidunt commodi sint consequuntur expedita iste itaque veniam illo voluptate repudiandae quis molestias corporis quod velit. Qui reiciendis nisi aut est dolorem corporis eligendi assumenda amet, facilis sit quidem dignissimos hic accusantium, voluptates, in. Recusandae non voluptates quibusdam adipisci eveniet, ipsam vero fugit perspiciatis nam optio nemo soluta quaerat quos rem unde officia, ab harum placeat temporibus dolorum nulla consequatur nihil! Odit aliquid commodi modi cupiditate iusto laudantium facilis placeat. Explicabo ut quisquam ullam omnis repellendus. Quibusdam laudantium deleniti necessitatibus accusantium exercitationem, dolores culpa unde earum officia. Animi aspernatur odio molestias, dicta temporibus. Unde explicabo dolore dolores blanditiis! Fuga, beatae earum ipsa ducimus quis dolores suscipit provident consectetur, assumenda rem quisquam reprehenderit corporis. In laboriosam maiores reprehenderit, sunt cupiditate excepturi nobis ipsa, dolore alias debitis.', 'illustrator', 'Explicabo, eligendi, nisi velit nulla dolorum fugiat nostrum et non quas magni eaque culpa quia alias soluta a nesciunt quam accusantium mollitia eos, recusandae id!|Hic laboriosam, est maxime nostrum voluptate, quasi exercitationem nihil ipsum!|Reiciendis minima, sed eligendi nihil labore, suscipit nemo qui cumque iusto sapiente molestias ea provident, mollitia! Vel ad, quaerat ex dolorum quos corrupti fugiat, culpa qui iusto iure laudantium nobis.', 'github|http://www.google.fr,pinterest|http://www.google.com,demo|http://www.one.com'),
(6, 1, 1, 'Doloribus cum nobis pariatur voluptate, possimus fugiat, natus.', 'innocence-de-ces-amours', '2017-04-14 08:31:48', 'Quia soluta molestias, corrupti ipsum necessitatibus debitis, eveniet a quis optio non neque odit labore consectetur. Tempore, placeat ratione tempora debitis! Nesciunt id earum pariatur? Ad dolore beatae error perspiciatis aperiam animi totam vel voluptatibus ducimus sunt quaerat dolores, eligendi alias. Dicta similique praesentium veniam harum illum iure error? Debitis exercitationem facilis dolor deleniti quidem pariatur inventore corporis hic omnis aliquid, excepturi, esse, aliquam porro. Ad incidunt aliquid voluptatum cum maxime minima et ipsam, deserunt quasi repellat optio repellendus magni, mollitia inventore obcaecati fugit perspiciatis deleniti, quis nesciunt eos eligendi ratione omnis quaerat totam tempore. Quis, similique quas debitis, ipsa, reprehenderit, placeat harum nesciunt quam libero aut non. Veritatis id excepturi autem a suscipit pariatur distinctio amet enim cumque repellendus asperiores sit vel, dolores molestiae quod qui ad fugiat velit ullam harum ut similique eum maiores. Laboriosam, iusto exercitationem illum esse omnis inventore hic soluta quibusdam placeat. Accusamus itaque assumenda reiciendis, incidunt alias magni at sunt tempora vero sit quam aut ad ullam consectetur architecto quisquam eius dolor facilis odit asperiores eum? Eligendi error voluptatum ad quisquam reiciendis fugit est consequatur, nihil nam vitae amet facilis quos, eos soluta beatae id adipisci doloremque ab sequi consectetur. Iste laudantium, autem molestias.', 'git,html,css,bootstrap,jquery,php', 'Aperiam, in quas. Accusantium blanditiis provident obcaecati, voluptatibus totam inventore praesentium impedit deleniti ratione corporis ab beatae culpa, ea. Dignissimos tempora, voluptatibus atque corporis quidem.|Officia, ex ullam temporibus quae excepturi sequi explicabo ab similique.|Voluptates similique veritatis voluptas delectus recusandae molestiae quasi repellendus sint vero. Nulla veniam, vitae sapiente ducimus. Ipsam, id. Officia molestiae sit dicta natus, ullam officiis iste iure omnis qui illum!', 'github|http://www.google.fr,pinterest|http://www.google.com,demo|http://www.one.com'),
(7, 2, 5, 'Quibusdam iste porro rem molestias, ea magni maiores.', 'les-garder-dans-ses-bras', '2017-04-16 11:56:04', 'Rerum libero et vel eveniet accusantium labore, alias, officia similique, necessitatibus ipsum ex tempora nulla sunt, ipsa odio beatae unde. Corrupti sit hic earum, non architecto repudiandae voluptas accusantium vel placeat omnis eaque alias, pariatur, ad officia harum neque sint iusto incidunt dolores inventore labore. Quas recusandae ab doloremque minus ducimus atque reprehenderit aperiam placeat accusamus? Placeat, odit dolores alias, repudiandae voluptas aspernatur veritatis laboriosam voluptates amet illum id non consequuntur. Hic quasi, placeat porro magni veniam dignissimos quod, maxime accusamus voluptate praesentium nisi atque qui mollitia eaque, debitis velit laudantium assumenda animi. Recusandae commodi voluptate soluta at id inventore deserunt, ipsa omnis blanditiis sint quo sit dolores assumenda repellendus maiores, maxime officiis, ipsum laboriosam? Nostrum maiores ad id incidunt dolor culpa maxime necessitatibus, odit officiis quas voluptate nobis! Placeat explicabo saepe quas hic accusamus libero, alias, ex sequi voluptas aperiam ipsum pariatur facere est expedita blanditiis tempora minus maiores eveniet dignissimos dicta. Hic ex dolorum, accusantium adipisci deserunt amet saepe assumenda modi blanditiis praesentium ad ipsam error provident magni, numquam rem. Corrupti placeat, aliquam, eligendi magnam ipsa nisi! Cum aliquid accusamus optio facere quo enim quia nostrum facilis odit veniam dolorem, possimus, perspiciatis sed aspernatur itaque aperiam ex. Molestiae!', 'git,html,css,bootstrap,jquery,php', 'Ipsum similique iste omnis quidem earum molestias, porro accusantium beatae assumenda, aperiam labore cupiditate mollitia rem ullam, eaque reiciendis suscipit totam vitae tempore, nobis perspiciatis!|Laudantium temporibus adipisci dolor asperiores esse ipsa aut. Laboriosam, error!|Possimus tempora doloremque doloribus magni, aperiam optio accusamus officiis quam architecto illum. Mollitia sed optio ratione debitis eligendi possimus laudantium itaque perspiciatis qui assumenda, sapiente nostrum, quibusdam doloremque! Ut, optio.', 'github|http://www.google.fr,demo|http://www.one.com'),
(8, 1, 2, 'Eum vero molestias assumenda neque iusto esse nobis!', 'antique-et-respectable-coutume', '2017-04-14 17:51:55', 'Enim aut at, repellat veritatis omnis qui commodi unde vel a nam rem blanditiis ratione cumque porro excepturi suscipit dignissimos repellendus velit facilis inventore ipsum deserunt architecto. Id ratione eveniet at enim obcaecati mollitia tempora velit animi, dolorem, itaque dolores beatae veniam! Vel a, nihil pariatur, eveniet odio velit quasi molestias ratione facilis nemo, animi earum. Ipsa ullam, vero. Ab nostrum, accusamus cum doloremque aliquam ad atque nemo omnis, amet, impedit quaerat tempore eos quo dolore aut accusantium neque numquam hic culpa sint iure incidunt facere earum sequi! Odio libero repellat iure dolore cupiditate atque, natus nemo. Consequuntur, quidem quos eveniet doloremque tenetur minima maiores, aspernatur esse neque, provident earum minus temporibus voluptate ea nostrum eligendi dolor. Repellendus voluptates tenetur modi, provident hic quis, corporis pariatur fugit, dolorum commodi corrupti. Blanditiis excepturi architecto laudantium rerum voluptatibus praesentium, rem veritatis, velit repellendus dolor, officiis amet ullam itaque nihil repellat. Reiciendis quibusdam molestias totam, repudiandae beatae magnam dicta sequi maxime. Accusantium voluptatum aperiam, numquam debitis repellat nihil qui, laborum fugiat distinctio, necessitatibus asperiores alias error et, ea iste inventore. Rem libero placeat saepe, qui earum voluptatum obcaecati, atque excepturi corporis soluta consequatur incidunt est et velit facilis vel. Molestias facilis odit, ex.', 'git,html,css,bootstrap,jquery,php', 'Odit nulla odio natus eaque perferendis ad esse exercitationem dicta, inventore ipsa saepe fuga aliquid cupiditate! Mollitia, modi! Possimus non unde, odio, ipsum mollitia soluta.|Dicta doloribus, non perspiciatis, amet iusto cum maxime voluptates officiis.|Eum, reprehenderit facilis quos rerum pariatur voluptates ea alias voluptatum repellat incidunt, velit sunt soluta neque sint unde modi eos fuga doloremque id temporibus. Veritatis excepturi dolorum id odio similique!', 'github|http://www.google.fr,demo|http://www.one.com'),
(9, 2, 5, 'Beatae nulla at enim, dicta deleniti id aut.', 'elle-vous-recevra-bien', '2017-04-14 08:33:43', 'Neque, veniam quam quaerat facere veritatis dolor sint ab rerum quibusdam possimus! Quisquam accusamus quos ducimus veniam voluptas amet laudantium consequuntur reprehenderit, placeat voluptatibus ratione aspernatur officiis, exercitationem nisi at laboriosam earum, reiciendis nulla et culpa. Vel magni, fuga magnam quasi, iure omnis quas commodi facere quam corrupti id, consequatur autem ut. Accusantium quae ad ipsum aperiam illo perspiciatis laudantium natus est repudiandae porro magni voluptatum distinctio, quis totam hic. Corporis culpa aut pariatur doloribus temporibus ad placeat similique veniam sed. Doloribus eaque in, illum porro, non tempora, ducimus ex iusto eum aliquam repellendus iure voluptatem autem. Eius, repellat quas, soluta, asperiores repellendus hic quidem, ullam minima aperiam nisi ipsa magni nihil exercitationem magnam similique? Quasi, inventore eos eveniet fuga explicabo delectus sit sequi labore quod, harum esse suscipit magnam quae similique voluptatibus adipisci, nostrum expedita. Dolorum excepturi corrupti inventore saepe adipisci error iste consequuntur quasi, culpa, natus tenetur omnis enim mollitia tempora deleniti provident voluptatem incidunt maxime consequatur. Recusandae ratione quas eaque eos officia quo, blanditiis temporibus sequi necessitatibus unde earum, dolore asperiores, aliquam. Numquam alias rerum expedita earum cupiditate ipsum porro sequi vel, dolore consequatur, nostrum aut voluptatem deleniti, accusamus odit rem libero fuga animi, minima enim tempore.', 'git,html,css,bootstrap,jquery,php', 'Nam incidunt excepturi animi dolorem vero? Architecto aut velit hic cum laboriosam eum fugit amet facere debitis quasi, eligendi alias dolore fugiat suscipit temporibus vero?|Necessitatibus dolorum praesentium minima facilis, voluptatem tempora ea. Modi, nam!|Alias, animi modi error ullam delectus qui eaque sunt totam adipisci, ipsa magnam, rerum assumenda nemo iusto recusandae. Cumque, expedita! Velit natus, accusantium, a fuga officia porro quisquam repudiandae sapiente.', 'github|http://www.google.fr,demo|http://www.one.com'),
(10, 3, 8, 'Facilis assumenda commodi ut voluptas, suscipit similique quia.', 'remplir-les-devoirs-de-sa-charge', '2017-04-14 08:34:35', 'Nihil repudiandae rem aspernatur asperiores. Optio obcaecati voluptatem, expedita voluptate quia architecto laborum quasi ullam officia temporibus dignissimos amet ad dolorem, iste sequi nisi ab magni labore voluptas possimus libero, iusto saepe. Ea quia alias autem voluptate eligendi provident reiciendis deserunt, commodi assumenda deleniti cumque laudantium perspiciatis unde illo reprehenderit ipsum libero architecto optio placeat dicta ullam maxime veritatis quidem. Est libero recusandae nostrum labore. Quia, voluptate reprehenderit consequuntur amet obcaecati modi eos alias unde asperiores consectetur repudiandae tempora beatae quidem quis sunt debitis magni quas ex explicabo. Et ullam magnam nemo earum necessitatibus ducimus, nostrum, temporibus placeat quod mollitia minima? Tenetur, facere, veritatis. Fuga nobis eligendi accusantium exercitationem possimus totam sequi corporis ducimus nulla, qui necessitatibus reprehenderit explicabo optio veniam, inventore quas? Libero, asperiores? Sapiente, commodi odio, quis eaque debitis veniam! Deleniti quam et, culpa iste, quaerat id error porro voluptatibus ducimus explicabo natus assumenda dignissimos odio officiis provident dolor repudiandae excepturi. Possimus odit, alias. Voluptatem eligendi explicabo blanditiis amet officiis magni, deleniti impedit porro pariatur sed ut reprehenderit inventore laudantium, adipisci recusandae laboriosam quidem fugit minima perspiciatis! Laudantium officiis incidunt molestiae deserunt ut tempore aut cupiditate, adipisci, similique, odit, animi libero in fuga sint consequatur illo vel ab.', 'illustrator', 'Dolores corporis magnam fugiat voluptate perferendis facere mollitia sapiente est atque, culpa maxime maiores voluptatum eius non minima illum reiciendis distinctio doloremque ducimus eos cupiditate.|Sequi libero non in iste, cumque blanditiis. Ducimus, animi, quam.|Iusto inventore laudantium quibusdam qui dignissimos commodi? Voluptates labore error dolorem libero quod eos, illo voluptas? Repellendus blanditiis, quas dicta quis tempore velit, ullam amet fugit nulla quia beatae. Temporibus.', 'github|http://www.google.fr,demo|http://www.one.com'),
(11, 3, 8, 'Saepe nemo, debitis perspiciatis excepturi architecto.', 'combattant-sans-risque', '2017-04-16 07:50:44', 'Odio ex alias voluptatibus facere in labore officiis soluta illo, itaque, fugit iste necessitatibus rem repellendus? Dolorem, hic harum id vero omnis molestiae magnam sunt perspiciatis delectus error ipsum minima reiciendis optio impedit, porro illum unde expedita repellat. Earum doloremque hic, similique nesciunt. Dicta repellendus cumque veniam maiores, laboriosam accusamus eaque vel, recusandae consequuntur. Voluptas cupiditate iusto est eum. Enim nulla veniam alias ea reiciendis, pariatur, at sapiente quisquam iste corporis placeat incidunt facilis molestiae quam quibusdam molestias. Est, nobis dicta modi ullam, eius, repellat quibusdam a recusandae hic culpa, beatae maxime rem accusantium. Nobis dignissimos enim nam voluptates vero similique libero neque. Dicta, deleniti, harum quam suscipit quidem minima, amet eaque ipsam asperiores similique quo laboriosam quod quia dolorem. Sint magnam odio neque repudiandae eveniet corrupti minima in similique obcaecati unde voluptatum esse nostrum vero repellendus vel ipsa dolores, repellat vitae magni, hic ad. Aliquid ad harum nemo distinctio, optio labore eius inventore. Exercitationem iste accusantium soluta ab rerum error nulla hic odio doloremque commodi, omnis dicta culpa, illum illo molestiae minus vero. Amet fuga tenetur, consequuntur odit aut aliquid officiis ratione consectetur rerum molestiae dolore dolorum nulla temporibus voluptate eaque qui maxime molestias. Alias amet vel vitae similique.', 'illustrator', 'Dolorem consectetur, corrupti iure totam voluptate vitae delectus culpa in facere quod excepturi nemo alias aut molestiae. Qui quis dolor eius alias voluptatum, magnam distinctio?|Mollitia laborum commodi facilis blanditiis corporis aut qui, illo voluptas!|Magnam pariatur impedit asperiores suscipit provident error et eos distinctio neque perspiciatis. Vero hic voluptas quae adipisci, illo inventore impedit ducimus tempore molestiae beatae soluta dolorem suscipit ratione! Quam, vel.', 'github|http://www.google.fr,pinterest|http://www.google.com,demo|http://www.one.com'),
(12, 1, 1, 'Veniam similique distinctio, quaerat odit quia harum, accusamus.', 'yeux-clairs-de-savant-politique', '2017-04-14 08:35:44', 'Fuga enim cum odio, doloremque ipsam tempora ut, fugit laboriosam consequatur quaerat atque vitae, nam explicabo fugiat! Deleniti quidem doloribus blanditiis reprehenderit dolore hic dolor, unde cum harum, minima quod provident, beatae. Odio magnam repellendus repudiandae voluptate dolorem ullam laudantium quisquam fuga tempora nam illum excepturi, praesentium pariatur rerum doloremque, voluptates nihil, recusandae consectetur. Voluptate odio eum, harum enim, recusandae ullam eaque dolorum! Esse alias veritatis eveniet temporibus rem aliquam id hic distinctio repellendus consequatur accusantium ad doloribus, molestias illo laborum! Qui soluta illum debitis mollitia dolorum at fugit, repellendus fugiat ipsum. Cupiditate, dolorem quod impedit ratione similique consequatur natus provident? Quasi quod voluptatem corporis, voluptate autem rem ipsum praesentium labore nam impedit perspiciatis molestias, distinctio ipsam blanditiis repudiandae! Neque dolor facilis optio qui autem iusto amet aliquid! Neque placeat reiciendis, nam suscipit nisi officia aut rem quos quae maxime impedit sapiente unde quis velit optio earum, aspernatur quas repellendus alias voluptatibus similique, beatae voluptates provident adipisci, temporibus? Sapiente, autem. Blanditiis officia culpa, fugiat, voluptas molestias sapiente commodi. Iure unde quidem sed aliquam, deleniti quae, inventore debitis, eaque similique, molestiae sint sit. Totam deserunt ipsa aut praesentium ratione non voluptate, veritatis, doloremque sunt, aperiam, sequi alias dolores fugit beatae sit?', 'git,html,css,bootstrap,jquery,php', 'Saepe ratione expedita earum, neque debitis eveniet rem quidem quo, obcaecati provident natus, ut aliquam perspiciatis, sunt itaque doloribus tenetur dolores. Praesentium id laborum esse.|Debitis excepturi earum delectus tempora enim, a sed necessitatibus suscipit.|Delectus tempore tempora numquam iure, officia maiores repellat? Rem expedita nostrum dolorum ea molestias, corrupti ullam nemo, quo modi aliquid facere fugiat sint laboriosam ut obcaecati iste! Ex, quas, molestias.', 'github|http://www.google.fr,pinterest|http://www.google.com,demo|http://www.one.com'),
(13, 3, 11, 'Consequuntur, nihil asperiores aperiam iure dolorum accusantium vel.', 'regarde-cette-femme-qui-avait-des', '2017-04-14 08:37:30', 'Inventore nobis qui necessitatibus odio debitis, nostrum porro nesciunt omnis, iusto. Neque dolorem aut beatae, quis earum veritatis consequatur at sint delectus in, recusandae esse voluptates. Minima esse nulla, temporibus obcaecati qui modi unde molestias cum, neque. Magni optio unde aspernatur aliquid praesentium facere, nostrum totam voluptate numquam id quibusdam ipsum neque sint, dolor laudantium quae maxime suscipit eos. Praesentium id incidunt perspiciatis animi hic iste laboriosam cum a voluptatibus dolor inventore sapiente doloribus neque eius odit rerum, ducimus ut repellendus nemo architecto nostrum. Maiores facere iusto impedit excepturi quibusdam minus repellat. Iusto commodi, doloremque illo magnam unde, corrupti modi provident sequi quo, molestiae necessitatibus culpa architecto assumenda voluptas. Porro, doloremque atque error soluta harum, expedita quam! Quis, itaque. Ipsum nostrum mollitia distinctio blanditiis consectetur repellendus ea voluptatem, laudantium quaerat, nam enim assumenda aut natus facilis, reiciendis, sed! Saepe, delectus. Quo repellendus sint repudiandae porro error, placeat vero, recusandae? Esse, id, hic. Sit quia inventore maiores laborum quas quibusdam commodi et dicta voluptate odit aspernatur unde ullam qui, cumque omnis alias nihil! Officiis itaque repellendus reprehenderit architecto eius unde, fugiat labore recusandae mollitia veritatis porro voluptas, deleniti nesciunt ex reiciendis repudiandae sint dolorum molestias minus quos illo. Repellat, debitis, fugiat.', 'git,html,css,bootstrap,jquery,php', 'Eveniet quos delectus commodi obcaecati voluptatum corrupti cupiditate praesentium ratione voluptates quisquam? Tempora maiores mollitia, dicta, aspernatur similique delectus quisquam exercitationem repellat, aliquam, vitae incidunt!|Blanditiis corporis doloremque explicabo accusamus cumque error nesciunt rerum nam.|Fugit consequatur consectetur quis, esse ratione non porro at, eligendi sit minus voluptatem in error quam nihil magnam accusamus officiis optio nobis suscipit itaque rem, explicabo quae! Illum, rem, optio!', 'github|http://www.google.fr,demo|http://www.one.com'),
(14, 1, 1, 'Incidunt voluptas, eveniet quos ea eos, beatae amet.', 'et-fut-absolument-incapable', '2017-04-14 17:52:34', 'Ab nulla eum quidem velit hic laudantium excepturi nam aut sed perferendis fugit aliquid vitae nobis quae omnis debitis tenetur dolore in voluptatibus officiis deserunt, iure expedita minus non. Asperiores laborum aspernatur ipsum aliquid deserunt officiis earum cupiditate, placeat amet, nulla? Corporis eligendi debitis minima eveniet cum, fugit error, voluptate, perferendis, neque accusantium illo quas nihil voluptates quod vel quos eaque beatae. Nihil soluta, repellendus ab aspernatur et porro cumque sequi totam in, pariatur quos repellat nesciunt consequatur quia ipsa quaerat distinctio eaque eveniet. Omnis molestiae ullam odio explicabo eos nesciunt, magnam nulla nobis dolore nostrum, quod aut dolor. Eius culpa, illum porro animi blanditiis magnam repellendus fuga soluta dolor aperiam quibusdam quo quos corrupti. Sit doloremque debitis cupiditate numquam. Quis omnis consectetur aliquam animi iusto, ipsam necessitatibus nam dolor, ab dolorum dolores rerum nostrum. Perspiciatis beatae, et cumque pariatur accusantium id ullam est, libero voluptate, officiis eveniet, fugiat totam cum non nostrum corrupti consectetur eligendi quasi accusamus. Est veniam in, explicabo repellendus temporibus accusamus veritatis tenetur consequatur dolor, voluptate ullam deserunt qui dignissimos, repellat obcaecati! Ullam accusamus expedita, itaque accusantium! Fuga labore inventore, deleniti provident quod possimus nam dolores id maiores laborum dolorum consectetur vel, placeat vitae voluptate, repudiandae.', 'git,html,css,bootstrap,jquery,php', 'Possimus doloremque, blanditiis quaerat nihil. Voluptatum laborum nostrum sint temporibus at nobis nisi, animi itaque exercitationem quas. Eos nulla repudiandae commodi mollitia, ea, nihil vitae.|Rerum quaerat non natus aliquid quidem omnis quos, nisi labore!|Ducimus excepturi molestias, dolorem sunt, consectetur illo, incidunt nesciunt enim quod est obcaecati expedita nam modi voluptatum sapiente quibusdam. Quibusdam cum, fugiat praesentium neque, quo itaque nesciunt quas porro odit.', 'github|http://www.google.fr,demo|http://www.one.com'),
(15, 3, 11, 'Tenetur, eveniet, dolorem? Consequuntur harum quos aperiam neque.', 'la-canne-est-un-aristocrate', '2017-04-14 08:39:07', 'Fuga, illum fugiat architecto suscipit possimus laboriosam libero, accusamus, cumque modi perspiciatis adipisci. Fugit maiores cum, veritatis quaerat natus, beatae libero fugiat repellendus sit reprehenderit ducimus, accusamus? Earum placeat expedita voluptatibus numquam temporibus quasi. Voluptate vel, rerum asperiores nemo nisi. Est aut cupiditate, harum qui laudantium quod exercitationem, eveniet possimus mollitia commodi, perferendis aspernatur vitae repellat cumque fugit sequi in hic tempora quo facere dolorem vero. Nulla tenetur, accusamus odit autem eius vitae excepturi reprehenderit dolor, placeat, dicta magnam? Magnam provident quibusdam atque, consequatur ab perferendis minima similique expedita deserunt fugiat pariatur tempora, optio autem, itaque modi incidunt. Voluptate, tenetur. Fuga repellendus dolorem a omnis sit in, itaque. Aliquid nemo accusantium tempore neque alias quas repellat ex deserunt laudantium ipsum veritatis corporis, quam velit odio magni, voluptates impedit voluptatibus odit error quae. Vero id omnis tempore quia officia incidunt consequuntur velit excepturi quas aut sapiente voluptatibus nisi, earum, iusto! Officia alias, itaque esse neque qui animi ad accusamus doloremque, distinctio, sed consectetur cumque aspernatur possimus consequuntur nihil suscipit corporis optio, sint porro sit laboriosam omnis necessitatibus quos. Maiores quidem voluptatum repudiandae id tenetur consectetur et asperiores labore modi ullam doloremque amet, ipsum, sit. Dolorem necessitatibus ut sed quae minus accusamus?', 'git,html,css,bootstrap,jquery,php', 'Inventore, veniam ea! Quibusdam veritatis voluptate, molestias inventore? Assumenda, hic delectus. Nostrum tempora debitis praesentium cupiditate doloribus aperiam eaque unde quisquam natus, eum suscipit ad!|Quidem animi culpa aspernatur et eligendi illo facere corrupti illum!|Voluptatum impedit ipsam magni delectus eligendi dolorum quidem culpa harum labore? Voluptatibus facilis nulla dolorem, assumenda aperiam blanditiis ex quos voluptatem neque, asperiores in error obcaecati repudiandae. Minus, dolore nam.', 'github|http://www.google.fr,pinterest|http://www.google.com,demo|http://www.one.com');

-- --------------------------------------------------------

--
-- Structure de la table `vote_ip`
--

CREATE TABLE `vote_ip` (
  `id_vote` int(12) NOT NULL,
  `id_travx_vote` int(12) NOT NULL,
  `ip_user` varchar(20) NOT NULL,
  `date_vote` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_travx_com` (`id_travx_com`) USING BTREE;

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id_competences`),
  ADD KEY `id_cat_compet` (`id_cat_compet`);

--
-- Index pour la table `compteur`
--
ALTER TABLE `compteur`
  ADD PRIMARY KEY (`id_compteur`),
  ADD KEY `id_travx_comp` (`id_travx_compteur`) USING BTREE;

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `experiences_pro`
--
ALTER TABLE `experiences_pro`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `id_cat_exp` (`id_cat_exp`) USING BTREE;

--
-- Index pour la table `interventions`
--
ALTER TABLE `interventions`
  ADD PRIMARY KEY (`id_intervention`),
  ADD KEY `id_cat_inter` (`id_cat_inter`) USING BTREE;

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `id_cat_serv` (`id_cat_serv`);

--
-- Index pour la table `statistiques`
--
ALTER TABLE `statistiques`
  ADD PRIMARY KEY (`id_stat`),
  ADD KEY `id_travx_stat` (`id_travx_stat`) USING BTREE;

--
-- Index pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD PRIMARY KEY (`id_travaux`),
  ADD KEY `id_cat_travx` (`id_cat_travx`),
  ADD KEY `id_comp_travx` (`id_comp_travx`);

--
-- Index pour la table `vote_ip`
--
ALTER TABLE `vote_ip`
  ADD PRIMARY KEY (`id_vote`),
  ADD KEY `id_travx_vote` (`id_travx_vote`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id_competences` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `compteur`
--
ALTER TABLE `compteur`
  MODIFY `id_compteur` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `experiences_pro`
--
ALTER TABLE `experiences_pro`
  MODIFY `id_experience` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `interventions`
--
ALTER TABLE `interventions`
  MODIFY `id_intervention` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `statistiques`
--
ALTER TABLE `statistiques`
  MODIFY `id_stat` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `travaux`
--
ALTER TABLE `travaux`
  MODIFY `id_travaux` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `vote_ip`
--
ALTER TABLE `vote_ip`
  MODIFY `id_vote` int(12) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
