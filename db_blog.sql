-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 05 juil. 2018 à 08:23
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Billet simple pour l\'Alaska'),
(2, 'En préparation...');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `comment` text NOT NULL,
  `post_id_fk` int(11) NOT NULL,
  `user_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id_fk` (`post_id_fk`),
  KEY `user_id_fk` (`user_id_fk`)
) ;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `created_at`, `deleted_at`, `updated_at`, `comment`, `post_id_fk`, `user_id_fk`) VALUES
(1, '2018-05-01 10:00:00', NULL, NULL, 'Trop fort Heisenberg', 3, 1),
(2, '2018-05-01 13:00:00', NULL, '2018-05-13 18:40:15', 'baba', 1, 1),
(3, '2018-05-01 23:00:00', NULL, NULL, 'Bang Bang!', 2, 1),
(4, '2018-05-02 02:00:00', NULL, NULL, 'Los Pollos Hermanos', 4, 1),
(5, '2018-05-01 05:00:00', NULL, NULL, 'Hold the door!', 1, 1),
(6, '2018-05-02 08:29:00', NULL, NULL, 'J\'adore cette série', 3, 2),
(7, '2018-05-03 17:00:00', NULL, NULL, 'Mais tu vas fermer cette foutue porte!', 1, 2),
(8, '2018-05-06 20:34:16', NULL, NULL, 'Un teste de dingue!', 3, 1),
(9, '2018-05-06 21:39:11', NULL, NULL, 'Bang bang!', 4, 2),
(10, '2018-05-06 21:39:55', NULL, NULL, 'lol', 3, 2),
(11, '2018-05-07 11:17:15', NULL, NULL, 'Ding, ding ding dididing!', 4, 2),
(12, '2018-05-08 23:41:14', NULL, NULL, 'plein de com', 5, 1),
(13, '2018-05-08 23:41:21', NULL, NULL, 'encore et encore', 5, 1),
(14, '2018-05-08 23:41:28', NULL, NULL, 'tais toi', 5, 2),
(15, '2018-05-08 23:41:35', NULL, NULL, 'ok', 5, 1),
(16, '2018-05-08 23:43:58', NULL, NULL, 'blabalbalbla', 5, 2),
(20, '2018-05-17 11:19:26', NULL, NULL, 'Il faut bien des commentaires pour les supprimers', 7, 2),
(19, '2018-05-13 13:53:37', NULL, '2018-05-13 20:23:01', 'une autre modif c\'est trop cool\r\n', 7, 1),
(21, '2018-05-17 11:19:34', '2018-05-17 11:28:05', NULL, 'T\'as bien raison', 7, 1),
(22, '2018-05-17 11:19:44', '2018-05-17 11:26:13', NULL, 't\'es quand meme bete', 7, 2),
(23, '2018-05-27 12:05:58', NULL, NULL, 'hahahahh', 11, 1),
(24, '2018-05-27 12:06:06', NULL, NULL, 'popopoopo', 11, 2),
(25, '2018-05-27 15:56:05', NULL, NULL, 'aqe coucou', 5, 1),
(26, '2018-05-27 18:47:45', NULL, '2018-06-10 16:16:38', 'Rigolo lolololo', 11, 1),
(27, '2018-05-27 18:48:44', NULL, '2018-06-10 16:16:23', 'Rigolojhgjf', 11, 1),
(28, '2018-05-27 18:48:58', NULL, '2018-06-10 16:14:55', 'blabjdjfdjkfhslfk', 11, 2),
(29, '2018-06-12 13:15:29', NULL, NULL, 'Lololo', 8, 1),
(30, '2018-06-12 13:20:15', NULL, NULL, 'NOOOOOOO', 8, 2),
(31, '2018-06-12 14:02:49', NULL, NULL, 'lololalallajkdhfj', 9, 1),
(32, '2018-06-12 17:32:28', NULL, NULL, 'pouahhahalalal', 9, 2),
(33, '2018-06-12 17:41:38', '2018-06-20 18:24:26', NULL, 'NOOOO', 9, 2),
(34, '2018-06-15 20:50:56', NULL, NULL, 'lalalal', 9, 1),
(35, '2018-06-20 18:25:15', NULL, NULL, '<p>stong</p>', 9, 1),
(36, '2018-06-20 18:25:37', NULL, NULL, '<p>ldljhjdjjhdb</p>', 9, 6),
(37, '2018-06-20 18:26:05', NULL, NULL, '<p>ddfdfdlk,,,dkn,kcdnjk</p>', 10, 9),
(38, '2018-06-20 18:39:21', NULL, NULL, '<p>C\'est tellement moche!</p>', 14, 14),
(39, '2018-06-20 18:39:48', '2018-06-24 13:25:15', NULL, '<p>C\'est tellement moche!</p>', 14, 14),
(40, '2018-06-20 18:40:44', NULL, NULL, '<p>&ccedil;a doit cailler quand meme</p>\r\n<p>&nbsp;</p>', 12, 14),
(41, '2018-06-23 18:58:07', NULL, NULL, '<p>t\'es un dingue!</p>', 14, 16),
(42, '2018-06-23 19:01:05', NULL, NULL, '<p>loloo</p>', 14, 16),
(43, '2018-06-23 22:16:17', NULL, NULL, '<p>aie aie aie</p>', 5, 16),
(44, '2018-06-23 22:18:01', NULL, NULL, '<p>aie aie aie</p>', 5, 16),
(45, '2018-06-23 22:19:43', NULL, NULL, '<p>aie aie aie</p>', 5, 16),
(46, '2018-06-23 22:22:09', NULL, NULL, '<p>lololo</p>', 16, 16),
(47, '2018-06-23 22:28:50', NULL, NULL, '<p>tadatatata</p>', 11, 16),
(48, '2018-06-25 21:46:38', '2018-06-25 21:46:49', NULL, '<p>akjsjkzhdjkhz</p>', 10, 25),
(49, '2018-06-25 21:47:15', '2018-06-25 22:06:27', NULL, '<p>lsidsjkdkjn</p>', 10, 25),
(50, '2018-06-25 21:47:20', '2018-06-25 21:58:58', NULL, '<p>sd;ksnnd;k</p>', 10, 25),
(51, '2018-06-25 22:00:18', '2018-06-25 22:05:14', NULL, '<p>dkjhdkjhdjkf</p>', 10, 25),
(52, '2018-06-25 22:00:23', '2018-06-25 22:05:01', NULL, '<p>slskqjdkqsjd</p>', 10, 25),
(53, '2018-06-25 22:06:42', NULL, NULL, '<p>poulouo</p>\r\n<p>&nbsp;</p>', 12, 25),
(54, '2018-06-25 22:06:49', '2018-06-25 23:46:36', NULL, '<p>blajzkbd</p>', 12, 25),
(55, '2018-06-25 22:06:54', '2018-06-25 22:09:57', NULL, '<p>tatatata</p>', 12, 25),
(56, '2018-06-25 22:09:33', NULL, NULL, '<p>knlksnglken</p>', 12, 25),
(57, '2018-06-25 22:09:37', '2018-06-25 23:47:08', NULL, '<p>ldk,e:r,gler,g</p>', 12, 25),
(58, '2018-06-26 10:07:03', NULL, NULL, '<p>ahahaha</p>\r\n<p>&nbsp;</p>', 14, 14),
(59, '2018-06-26 10:07:10', '2018-06-26 10:07:24', NULL, '<p>hohohohohoh</p>', 14, 14),
(60, '2018-06-26 10:09:12', NULL, '2018-06-26 10:11:32', '<p>gundabad</p>', 6, 26),
(61, '2018-06-26 10:09:18', '2018-06-26 10:09:23', NULL, '<p>il quicha</p>', 6, 26),
(62, '2018-06-26 10:15:02', NULL, NULL, '<p>j\'avais pas comment&eacute; ici?</p>', 14, 26),
(63, '2018-06-30 09:30:29', NULL, NULL, '<p>06/30/2018</p>\r\n<p>kjhzefjzhkefh</p>', 1, 27),
(64, '2018-06-30 09:31:57', '2018-06-30 09:32:40', '2018-06-30 09:32:16', '<p>boula boula boula</p>', 2, 27),
(65, '2018-06-30 09:32:52', NULL, NULL, '<p>non mais oh</p>', 2, 27),
(66, '2018-06-30 09:32:57', NULL, NULL, '<p>hahahahha</p>', 2, 27),
(67, '2018-06-30 09:34:52', NULL, NULL, '<p>hahahahha</p>', 2, 27),
(68, '2018-06-30 10:08:57', NULL, NULL, '<p>bkjabjsba</p>', 14, 27),
(69, '2018-06-30 10:09:01', '2018-06-30 10:10:17', '2018-06-30 10:09:35', '<p>kbd;zndjlkzn</p>', 14, 27),
(70, '2018-06-30 10:09:54', NULL, NULL, '<p>azdajl</p>', 14, 27),
(71, '2018-06-30 13:01:38', NULL, '2018-06-30 13:01:46', '<p>kdjhzjkfhz</p>', 11, 14),
(72, '2018-06-30 13:09:05', NULL, NULL, '<p>jhjkh</p>', 2, 14),
(73, '2018-07-02 10:46:20', NULL, '2018-07-02 10:47:47', '<p>Que vois-je? Des commentaires? Et encore?</p>', 14, 28),
(74, '2018-07-02 10:46:57', '2018-07-02 10:47:25', NULL, '<p>Que vois-je? Des commentaires?</p>', 14, 28),
(75, '2018-07-02 10:57:30', NULL, '2018-07-02 10:57:42', '<p>ohlalalla loloolo</p>', 4, 29),
(76, '2018-07-04 17:53:40', NULL, NULL, '<p>un beau commentaire</p>', 14, 32),
(77, '2018-07-04 21:53:22', NULL, NULL, '<p>lololo</p>', 21, 14),
(78, '2018-07-04 23:34:07', NULL, NULL, '<p>lalalal</p>', 24, 14);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id_fk` int(11) NOT NULL,
  `category_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fk` (`user_id_fk`),
  KEY `category_id_fk` (`category_id_fk`)
) ;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `created_at`, `deleted_at`, `updated_at`, `user_id_fk`, `category_id_fk`) VALUES
(1, 'Préambule', '<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, <em>Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento,</em> concitatus orator, cum quaestor non hos sed tribunos fabricarum insimulasset promittentes armorum si novas res agitari conperissent.</p>\r\n<p>Erat autem diritatis eius <strong>hoc quoque indicium</strong> nec obscurum nec latens, quod ludicris cruentis delectabatur et in circo sex vel septem aliquotiens vetitis certaminibus pugilum vicissim se concidentium perfusorumque sanguine specie ut lucratus ingentia laetabatur.</p>\r\n<p>Nec piget dicere avide magis hanc insulam populum Romanum invasisse quam iuste. Ptolomaeo enim rege f<strong>oederato nobis et socio</strong> ob aerarii nostri angustias iusso sine ulla culpa proscribi ideoque hausto veneno voluntaria morte deleto et tributaria facta est et velut hostiles eius exuviae classi inpositae in urbem advectae sunt per Catonem, nunc repetetur ordo gestorum.</p>', '2018-06-11 13:36:23', NULL, NULL, 1, 1),
(2, 'Chapitre I: Tout allait bien...', '<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec hdignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento, concitatus orator, cum quaestor non o<em>s se</em>d tribunos fabricarum insimulasset promittentes armorum si novas res agitari conperissent.</p>\r\n<p>Erat autem diritatis eius hoc quoque indicium nec obscurum nec latens, quod ludicris cruentis delectabatur et in circo sex vel septem aliquotiens vetitis certaminibus pugilum vici<em>ssim se concidentium perfusorumque sanguine specie ut lucratus ingentia laetaba</em>tur.</p>\r\n<p>Nec piget dicere avide magis hanc insulam populum Romanum invasisse quam iuste. Ptolomaeo enim rege foederato nobis et socio ob aerarii nostri angustias iusso sine ulla culpa proscribi ideoque hausto veneno voluntaria morte deleto et tributaria facta est et velut hostiles eius exuviae classi inpositae in urbem advectae sunt per Catonem, nunc repetetur ordo gestorum.</p>\r\n<p>Qui cum venisset ob haec festinatis itineribus Antiochiam, praestrictis palatii ianuis, contempto Caesare, quem videri decuerat, ad praetorium cum pompa sollemni perrexit morbosque diu causatus nec regiam introiit nec processit in publicum, sed abditus multa in eius moliebatur exitium addens quaedam relationibus supervacua, quas subinde dimittebat ad principem.</p>\r\n<p>Tu autem, Fanni, quod mihi tantum tribui dicis quantum ego nec adgnosco nec postulo, facis amice; sed, ut mihi videris, non recte iudicas de Catone; aut enim nemo, quod quidem magis credo, aut si quisquam, ille sapiens fuit. Quo modo, ut alia omittam, mortem filii tulit! memineram Paulum, videram Galum, sed hi in pueris, Cato in perfecto et spectato viro.</p>\r\n<p>Nihil morati post hae<strong>c militares avidi saepe turbarum adorti sunt Montium primum, qui divertebat in proximo, levi corpore senem atque morbosum, et hirsutis resticulis cruribus ei</strong>us innexis divaricaturn sine spiramento ullo ad usque praetorium traxere praefecti.</p>\r\n<p>Quare hoc quidem praeceptum, cuiuscumque est, ad tollendam amicitiam valet; illud potius praecipiendum fuit, ut eam diligentiam adhiberemus in amicitiis comparandis, ut ne quando amare inciperemus eum, quem aliquando odisse possemus. Quin etiam si minus felices in diligendo fuissemus, ferendum id Scipio potius quam inimicitiarum tempus cogitandum putabat.</p>\r\n<p>Illud tamen te esse admonitum volo, primum ut qualis es talem te esse omnes existiment ut, quantum a rerum turpitudine abes,</p>', '2018-06-11 13:38:43', NULL, NULL, 1, 1),
(3, 'Chapitre II: La décision.', '<p>Illud tamen te esse admonitum volo, primum ut qualis es talem te esse omnes existiment ut, quantum a rerum turpitudine abes, tantum te a verborum libertate seiungas; deinde ut ea in alterum ne dicas, quae cum tibi falso responsa sint, erubescas. Quis est enim, cui via ista non pateat, qui isti aetati atque etiam isti dignitati <strong>non possit quam velit petulanter, etiamsi sine ulla suspicione, at non sine argumento male dicere? Sed istarum partium culpa est eorum, qui te agere voluerunt; laus pudoris tui, quod ea te invitum dicere videbamus, ingenii, quod ornate politeque dixisti.</strong></p>\r\n<p><strong>Dumque ibi diu moratur commeatus oppe</strong>riens, quorum translationem ex Aquitania verni imbres solito crebriores prohibebant auctique torrentes, Herculanus advenit protector domesticus, Hermogenis ex magistro equitum filius, apud Constantinopolim, ut supra rettulimus, populari quondam turbela discerpti. quo verissime referente quae Gallus egerat, damnis super praeteritis maerens et futurorum timore suspensus angorem animi quam diu potuit emendabat.</p>\r\n<p>Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, quod tibi ita videri necesse est, non satis politus iis artibus, quas qui tenent, eruditi appellantur aut ne deterruisset alios a studiis. quamquam te quidem video minime esse deterritum.</p>\r\n<p>Quod opera consulta cogitabatur astute, ut hoc insidiarum genere Galli periret avunculus, ne eum ut praepotens <em>acueret in fiduciam exitiosa coeptantem. verum navata est opera diligens hocque dilato Eus</em>ebius praepositus cubiculi missus est Cabillona aurum secum perferens, quo per turbulentos seditionum concitores occultius distributo et tumor consenuit militum et salus est in tuto locata praefecti. deinde cibo abunde perlato castra die praedicto sunt mota.</p>\r\n<p>Oportunum est, ut arbitror, explanare nunc causam, quae ad exitium praecipitem Aginatium inpulit iam inde a priscis maioribus nobilem, ut locuta est pertinacior fama. nec enim super hoc ulla documentorum rata est fides.</p>\r\n<p>Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in terram defluat, aut ne plus aequo quid in amicitiam congeratur.</p>\r\n<p>Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum v<strong>arietas fregerat et laboru</strong></p>', '2018-06-11 13:40:23', NULL, NULL, 1, 1),
(4, 'Chapitre III: Un aller sans retour!', '<p>Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in terram defluat, aut ne plus aequo quid in amicitiam congeratur.</p>\r\n<p>Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates alias rebus infudere communibus per multa illa et dira facinora Caesaris Galli, qui ex squalore imo miseriarum in aetatis adultae primitiis ad principale culmen insperato saltu provectus ultra terminos potestatis delatae procurrens asperitate nimia cun<em>cta foedabat. propinquitate enim regiae stirpis gentilitateque etiam tum Constantini nominis efferebatur in fastus, si plus valuisset, ausurus hostilia in auctorem suae felicitatis, ut videbatur.</em></p>\r\n<p><em>Denique Antiochensis ordinis vertices s</em>ub uno elogio iussit occidi ideo efferatus, quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa constantia restitisset.</p>\r\n<p>Quae dum ita struuntur, indicatum est apud Tyrum indumentum regale textum occulte, incertum quo locante vel cuius usibus apparatum. ideoque rector provinciae tunc pater Apollinaris eiusdem nominis ut conscius ductus est aliique congregati sunt ex diversis civitatibus multi, qui atrocium criminum ponderibus urgebantur.</p>\r\n<p>Incenderat autem audaces usque ad insaniam homines ad haec, quae nefariis egere conatibu<strong>s, Luscus quidam curator urbis subito visus: eosque ut heiulans baiolorum praecentor</strong> ad expediendum quod orsi sunt incitans vocibus crebris. qui haut longe postea ideo vivus exustus est.</p>\r\n<p>Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.</p>\r\n<p>Illud tamen te esse admonitum volo, primum ut qualis es</p>', '2018-06-11 13:41:13', NULL, NULL, 1, 1),
(5, 'Chapitre IV: La dictature du froid.', '<p>Denique Antiochensis ordinis vertices sub uno elogio iussit occidi ideo efferatus, quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa constantia restitisset.</p>\r\n<p>Quae dum ita struuntur, indicatum est apud Tyrum indumentum regale textum occulte, incertum quo locante vel cuius usibus apparatum. ideoque rector provinciae tunc pater Apollinaris eiusdem nominis ut conscius ductus est aliique congregati sunt ex diversis civitatibus multi, qui atrocium criminum ponderibus urgebantur.</p>\r\n<p>Incenderat autem audaces usque ad insaniam homines ad haec, quae nefariis egere conatibus, Luscus quidam curator urbis subito visus: eosque ut heiulans baiolorum praecentor ad expediendum quod orsi sunt incitans vocibus crebris. qui haut longe postea ideo vivus exustus est.</p>\r\n<p>Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.</p>\r\n<p>Illud tamen te esse admonitum volo, primum ut qualis es talem te esse omnes existiment ut, quantum a rerum turpitudine abes, tantum te a verborum libertate seiungas; deinde ut ea in alterum ne dicas, quae cum tibi falso responsa sint, erubescas. Quis est enim, cui via ista non pateat, qui isti aetati atque etiam isti dignitati non possit quam velit petulanter, etiamsi sine ulla suspicione, at non sine argumento male dicere? Sed istarum partium culpa est eorum, qui te agere voluerunt; laus pudoris tui, quod ea te invitum dicere videbamus, ingenii, quod ornate politeque dixisti.</p>\r\n<p>Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare</p>', '2018-06-11 13:41:45', NULL, NULL, 1, 1),
(6, 'Chapitre V: La recherche du confort.', '<p>n se r&eacute;veillant un matin apr&egrave;s des r&ecirc;ves agit&eacute;s, Gregor Samsa se retrouva, dans son lit, m&eacute;tamorphos&eacute; en un monstrueux insecte.</p>\r\n<p>Il &eacute;tait sur le dos, un dos aussi dur qu&rsquo;une carapace, et, en relevant un peu la t&ecirc;te, il vit, bomb&eacute;, brun, cloisonn&eacute; par des arceaux plus rigides, son abdomen sur le haut duquel la couverture, pr&ecirc;te &agrave; glisser tout &agrave; fait, ne tenait plus qu&rsquo;&agrave; peine.</p>\r\n<p >Ses nombreuses pattes, lamentablement gr&ecirc;les par comparaison avec la corpulence qu&rsquo;il avait par aille<strong>urs, grouillaient d&eacute;sesp&eacute;r&eacute;ment sous ses yeux. &laquo; Qu&rsquo;est-ce qui m&rsquo;est arriv&eacute; ? &raquo; pensa-t-il. Ce n&rsquo;&eacute;tait pas un</strong> r&ecirc;ve.</p>\r\n<p>Sa chambre, une vraie chambre humaine, juste un peu trop petite, &eacute;tait l&agrave; tranquille entre les quatre murs qu&rsquo;il connaissait bien.</p>\r\n<p >Au-dessus de la table o&ugrave; &eacute;tait d&eacute;ball&eacute;e une collection d&rsquo;&eacute;chantillons de tissus - Samsa &eacute;tait repr&eacute;sentant de commerce - o<em>n voyait accroch&eacute;e l&rsquo;</em>image qu&rsquo;il avait r&eacute;cemment d&eacute;coup&eacute;e dans un magazine et mise dans un joli cadre dor&eacute;.</p>\r\n<p >Elle repr&eacute;sentait une dam<strong>e munie d&rsquo;une toque et d&rsquo;un boa tous les deux en fourrure et qui, assise bien droite, tendait vers le spectateur un lourd manchon de fourrure o&ugrave; tout son avant-bras avait disparu. Le regard de Gregor se t</strong>ourna ensuite vers la fen&ecirc;tre, et le temps maussade - on entendait les gouttes de pluie frapper le rebord en zinc - le rendit tout m&eacute;lancolique.</p>\r\n<p >&laquo; Et si je redormais un peu et oubliais toutes ces sottises ? &raquo; se dit-il ; mais c&rsquo;&eacute;tait absolument irr&eacute;alisable, car il avait l&rsquo;habitude de dormir sur le c&ocirc;t&eacute; droit et, dans l&rsquo;&eacute;tat o&ugrave; il &eacute;tait &agrave; pr&eacute;sent, il &eacute;tait incapable de se mettre dans cette position. En se r&eacute;veillant un matin apr&egrave;s des r&ecirc;ves agit&eacute;s, Gregor Samsa se retrouva, dans son lit, m&eacute;tamorphos&eacute; en un monstrueux insecte. Il &eacute;tait sur le dos, un dos aussi</p>', '2018-06-11 13:43:26', NULL, NULL, 1, 1),
(7, 'Chapitre VI: Les dangers du cercle polaire.', '<p>Voyez ce jeu exquis wallon, de graphie en kit mais bref.</p>\r\n<p>Portez ce vieux whisky au juge blond qui fume sur son &icirc;le int&eacute;rieure, &agrave; c&ocirc;t&eacute; de l\'alc&ocirc;ve ovo&iuml;de, o&ugrave; les b&ucirc;ches se consument dans l\'&acirc;tre, ce qui lui permet de penser &agrave; la c&aelig;nogen&egrave;se de l\'&ecirc;tre dont il est question dans la cause ambigu&euml; entendue &agrave; Mo&yuml;, dans un capharna&uuml;m qui, pense-t-il, diminue &ccedil;&agrave; et l&agrave; la qualit&eacute; de son &oelig;uvre.</p>\r\n<p >Prouve<em>z, beau juge, que le fameux sandwich au yak tue. L\'&icirc;le exigu&euml;, O&ugrave; l\'ob&egrave;se jury m&ucirc;r F&ecirc;te l\'ha&iuml; volap&uuml;</em>k, &Acirc;ne ex &aelig;quo au whist, &Ocirc;tez ce v&oelig;u d&eacute;&ccedil;u. Vieux pelage que je modifie : breitschwanz ou yak ?</p>\r\n<p>D&egrave;s No&euml;l o&ugrave; un z&eacute;phyr ha&iuml; me v&ecirc;t de gla&ccedil;ons w&uuml;rmiens, je d&icirc;ne d&rsquo;exquis r&ocirc;tis de b&oelig;uf au kir &agrave; l&rsquo;a&yuml; d&rsquo;&acirc;ge m&ucirc;r &amp; c&aelig;tera ! Fougueux, j\'enivre la squaw au pack de beau zythum. Ketch, yawl, jonque flambant neuve&hellip; jugez des prix !</p>\r\n<p>Voyez le brick g&eacute;ant que j\'examine pr&egrave;s du wharf. Portez ce vieux whisky au juge blond qui fume. B&acirc;chez la queue du wagon-taxi avec les pyjamas du fakir. Voix ambigu&euml; d\'un c&oelig;ur qui, au z&eacute;phyr, pr&eacute;f&egrave;re les jattes de kiwis.</p>\r\n<p>Mon pauvre z&eacute;bu ankylos&eacute; choque deux fois ton wagon jaune. Perchez dix, vingt woks. Qu\'y flamb&eacute;-je ? Le moujik &eacute;quip&eacute; de faux breitschwanz voyage. Kiwi fade, apt&eacute;ryx, quel jambon vous g&acirc;chez ! Jugez qu\'un vieux whisky blond pur malt fonce.</p>\r\n<p>Faux kwachas ? Quel projet de voyage zambien ! Fripon, mixez l\'abject whisky qui vidange. Vif juge, trempez ce blond whisky aqueux.<strong> Vif P-DG mentor, exhibez la squaw jockey. Juge, flambez l\'exquis patchwork d\'Yvon. Voyez ce jeu exquis</strong> wallon, de graphie en kit mais bref. Portez ce vieux whisky au juge blond qui fume sur son &icirc;le int&eacute;rieure, &agrave; c&ocirc;t&eacute; de l\'alc&ocirc;ve ovo&iuml;de, o&ugrave; les b&ucirc;ches</p>\r\n', '2018-06-11 13:45:10', NULL, NULL, 1, 1),
(8, 'Chapitre VII: L\'arctique et la nature.', '<p>Loin, tr&egrave;s loin, au del&agrave; des monts Mots, &agrave; mille lieues des pays Voyellie et Consonnia, demeurent les Bolos Bolos. Ils vivent en retrait, &agrave; Bourg-en-Lettres, sur les c&ocirc;tes de la S&eacute;mantique, un vaste oc&eacute;an de langues.</p>\r\n<p style=\"font-family: Verdana, Geneva, sans-serif; font-style: normal; font-weight: normal; font-size: 10px; letter-spacing: normal; line-height: normal; text-transform: none; text-decoration: none; text-align: left;\">Un petit ruisseau, du nom de Larousse, coule en leur lieu et les approvisionne en r&egrave;glalades n&eacute;cessaires en tout genre; un pays paradisiagmatique, dans lequel des pans entiers de phrases pr&eacute;m&acirc;ch&eacute;es vous volent lit&eacute;ralement tout cuit dans la bouche.</p>\r\n<p>Pas m&ecirc;me la toute puissante Ponctuation ne r&eacute;git les Bolos Bolos - une vie on ne peut moins orthodoxographique. Un jour pourtant, une petite ligne de Bolo Bolo du nom de Lorem Ipsum d&eacute;cida de s\'aventurer dans la vaste Grammaire.</p>\r\n<p>Le grand Oxymore voulut l\'en <strong>dissuader, le prevenant que l&agrave;-bas cela fourmillait de vils Virgulos, de sauvages Pointdexclamators et de sournois Semicolons qui l\'attendraient pour s&ucirc;r au prochain paragraphe, mais ces mots ne firent &eacute;cho dans l\'oreille du petit Bolo qui ne se laissa point d&eacute;concerter.</strong></p>\r\n<p>Il pacqua ses 12 <em>lettrines, glissa son initiale dans sa panse et se mit en route.</em></p>\r\n<p><em>Alors qu\'il avait gravi les premiers flancs de la cha&icirc;ne des monts Italiques, il jeta un dernier regard sur la skyline de Bourg-en-Lettres, sa ville alphanatale, la headline d\'Alphabetville, la subline de sa propre rue, le passage Motus.</em></p>\r\n<p>Le coeur lourd et nostalgique, une question rh&eacute;torique lui coula le long de la joue, puis, il se remit en route. En chemin, il rencontra un Copy. Le Copy pr&eacute;vint le petit Bolo que l&agrave; d\'o&ugrave; il venait, il avait d&eacute;j&agrave; maintes et maintes fois &eacute;t&eacute; </p>\r\n', '2018-06-11 13:47:13', NULL, '2018-06-11 13:58:14', 1, 1),
(9, 'Chapitre VIII: L\'hiver boréal.', '<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.</p>\r\n<p>Blablablabalbalbal et puis blablablabla</p>\r\n<p>At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues.</p>\r\n<p>Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental.</p>\r\n<p>A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth.</p>\r\n<p>Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores.</p>\r\n<p>At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues.</p>\r\n<p>It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation</p>', '2018-06-11 13:48:15', NULL, '2018-06-26 17:22:46', 1, 1),
(24, 'kajdjazhd', '<p>zlkjdlkzjd</p>', '2018-06-30 13:17:58', NULL, NULL, 14, 2),
(15, 'llala', '<p>lkzlksdjfkldjglkfd</p>', '2018-06-15 21:09:18', '2018-06-25 09:35:38', NULL, 1, 2),
(16, 'Un fat test', '<p>glaglagla</p>', '2018-06-20 18:33:40', '2018-06-25 09:40:38', NULL, 14, 2),
(17, 'encore un test a supprimer', '<p>poulouolou</p>', '2018-06-25 09:41:24', '2018-06-25 09:43:58', NULL, 14, 2),
(18, 'et puis un autre', '<p>dingue!</p>', '2018-06-25 09:41:55', '2018-06-25 09:42:42', NULL, 14, 2),
(19, 'non', '<p>zfdfz</p>', '2018-06-25 09:46:37', '2018-06-25 09:48:59', NULL, 14, 2),
(20, 'dfzdf', '<p>dsfsfsd</p>', '2018-06-25 09:46:48', '2018-06-25 09:48:18', NULL, 14, 2),
(21, 'encore et encore des tests', '<p>zeflzkefopzej</p>\r\n<p>&nbsp;</p>', '2018-06-25 09:49:33', NULL, NULL, 14, 2),
(25, 'Encore un test', '<p>lalala aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhhhhhhhhhhhhhhhhhhhhhhhh</p>\r\n<p>jkjdhkskndq</p>\r\n<p>skjsqdjkqsnlkdnqsk</p>\r\n<p>kjsdkljsklflksdjflkdsjfkljsdlfkjsdlkfjsd</p>\r\n<p>kjsdfkjhsdkjfhsdklfklsdjfkljsdklfjslkdjfkds</p>', '2018-07-04 22:15:40', NULL, NULL, 14, 2),
(23, 'hkjjkqdsf', '<p>fdzlkdjfzlkjef</p>', '2018-06-25 09:50:43', '2018-06-25 09:56:03', NULL, 14, 2),
(26, 'Test formatage', '<h1>Ah voila<strong>,</strong></h1>\r\n<blockquote>\r\n<p>c\'est quand meme pas mal comme &ccedil;a. </p>\r\n<p>t\'en penses quoi?</p>\r\n<p><em>oulajajaj</em></p>\r\n</blockquote>', '2018-07-05 08:37:54', NULL, NULL, 14, 2),
(10, 'Chapitre IX: Les aurores du nord.', '<p>Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates alias rebus infudere communibus per multa illa et dira facinora Caesaris Galli, qui ex squalore imo miseriarum in aetatis adultae primitiis ad principale culmen insperato saltu provectus ultra terminos potestatis delatae procurrens asperitate nimia cuncta foedabat. propinquitate enim regiae stirpis gentilitateque etiam tum Constantini nominis efferebatur in fastus, si plus valuisset, ausurus hostilia in auctorem suae felicitatis, ut videbatur.</p>\r\n<p>Denique Antiochensis ordinis vertices sub uno elogio iussit occidi ideo efferatus, quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa constantia restitisset.</p>\r\n<p>Quae dum ita struuntur, indicatum est apud Tyrum indumentum regale textum occulte, incertum quo locante vel cuius usibus apparatum. ideoque rector provinciae tunc pater Apollinaris eiusdem nominis ut conscius ductus est aliique congregati sunt ex diversis civitatibus multi, qui atrocium criminum ponderibus urgebantur.</p>\r\n<p>Incenderat autem audaces usque ad insaniam homines ad haec, quae nefariis egere conatibus, Luscus quidam curator urbis subito visus: eosque ut heiulans baiolorum praecentor ad expediendum quod orsi sunt incitans vocibus crebris. qui haut longe postea ideo vivus exustus est.</p>\r\n<p>Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.</p>', '2018-06-11 13:49:12', NULL, NULL, 1, 1),
(11, 'Chapitre X: Le jour polaire.', '<p>Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates alias rebus infudere communibus per multa illa et dira facinora Caesaris Galli, qui ex squalore imo miseriarum in aetatis adultae primitiis ad principale culmen insperato saltu provectus ultra terminos potestatis delatae procurrens asperitate nimia cuncta foedabat. propinquitate enim regiae stirpis gentilitateque etiam tum Constantini nominis efferebatur in fastus, si plus valuisset, ausurus hostilia in auctorem suae felicitatis, ut videbatur.</p>\r\n<p>Denique Antiochensis ordinis vertices sub uno elogio iussit occidi ideo efferatus, quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa constantia restitisset.</p>\r\n<p>Quae dum ita struuntur, indicatum est apud Tyrum indumentum regale textum occulte, incertum quo locante vel cuius usibus apparatum. ideoque rector provinciae tunc pater Apollinaris eiusdem nominis ut conscius ductus est aliique congregati sunt ex diversis civitatibus multi, qui atrocium criminum ponderibus urgebantur.</p>\r\n<p>Incenderat autem audaces usque ad insaniam homines ad haec, quae nefariis egere conatibus, Luscus quidam curator urbis subito visus: eosque ut heiulans baiolorum praecentor ad expediendum quod orsi sunt incitans vocibus crebris. qui haut longe postea ideo vivus exustus est.</p>\r\n<p>Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.</p>', '2018-06-11 13:49:32', NULL, NULL, 1, 1),
(12, 'Chapitre XI: Les alskains.', '<p>Oportunum est, ut arbitror, explanare nunc causam, quae ad exitium praecipitem Aginatium inpulit iam inde a priscis maioribus nobilem, ut locuta est pertinacior fama. nec enim super hoc ulla documentorum rata est fides.</p>\r\n<p>Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in terram defluat, aut ne plus aequo quid in amicitiam congeratur.</p>\r\n<p>Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates alias rebus infudere communibus per multa illa et dira facinora Caesaris Galli, qui ex squalore imo miseriarum in aetatis adultae primitiis ad principale culmen insperato saltu provectus ultra terminos potestatis delatae procurrens asperitate nimia cuncta foedabat. propinquitate enim regiae stirpis gentilitateque etiam tum Constantini nominis efferebatur in fastus, si plus valuisset, ausurus hostilia in auctorem suae felicitatis, ut videbatur.</p>\r\n<p>Denique Antiochensis ordinis vertices sub uno elogio iussit occidi ideo efferatus, quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa constantia restitisset.</p>\r\n<p>Quae dum ita struuntur, indicatum est apud Tyrum indumentum regale textum occulte, incertum quo locante vel cuius usibus apparatum. ideoque rector provinciae tunc pater Apollinaris eiusdem nominis ut conscius ductus est aliique congregati sunt ex diversis civitatibus multi, qui atrocium criminum ponderibus urgebantur.</p>\r\n<p>Incenderat autem audaces usque ad insaniam homines ad haec, quae nefariis egere conatibus, Luscus quidam curator urbis subito visus: eosque ut heiulans baiolorum praecentor ad expediendum quod orsi sunt incitans vocibus crebris. qui haut longe postea ideo vivus exustus est.</p>', '2018-06-11 13:50:07', NULL, NULL, 1, 1),
(13, 'Chapitre XII: Anchorage.', '<p>Quod opera consulta cogitabatur astute, ut hoc insidiarum genere Galli periret avunculus, ne eum ut praepotens acueret in fiduciam exitiosa coeptantem. verum navata est opera diligens hocque dilato Eusebius praepositus cubiculi missus est Cabillona aurum secum perferens, quo per turbulentos seditionum concitores occultius distributo et tumor consenuit militum et salus est in tuto locata praefecti. deinde cibo abunde perlato castra die praedicto sunt mota.</p>\r\n<p>Oportunum est, ut arbitror, explanare nunc causam, quae ad exitium praecipitem Aginatium inpulit iam inde a priscis maioribus nobilem, ut locuta est pertinacior fama. nec enim super hoc ulla documentorum rata est fides.</p>\r\n<p>Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in terram defluat, aut ne plus aequo quid in amicitiam congeratur.</p>\r\n<p>Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates alias rebus infudere communibus per multa illa et dira facinora Caesaris Galli, qui ex squalore imo miseriarum in aetatis adultae primitiis ad principale culmen insperato saltu provectus ultra terminos potestatis delatae procurrens asperitate nimia cuncta foedabat. propinquitate enim regiae stirpis gentilitateque etiam tum Constantini nominis efferebatur in fastus, si plus valuisset, ausurus hostilia in auctorem suae felicitatis, ut videbatur.</p>\r\n<p>Denique Antiochensis ordinis vertices sub uno elogio iussit occidi ideo efferatus, quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa constantia restitisset.</p>\r\n<p>Quae dum ita struuntur, indicatum est apud Tyrum in</p>', '2018-06-11 13:51:21', NULL, NULL, 1, 1),
(14, 'Remerciement', '<p>Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, quod tibi ita videri necesse est, non satis politus iis artibus, quas qui tenent, eruditi appellantur aut ne deterruisset alios a studiis. quamquam te quidem video minime esse deterritum.</p>\r\n<p>Quod opera consulta cogitabatur astute, ut hoc insidiarum genere Galli periret avunculus, ne eum ut praepotens acueret in fiduciam exitiosa coeptantem. verum navata est opera diligens hocque dilato Eusebius praepositus cubiculi missus est Cabillona aurum secum perferens, quo per turbulentos seditionum concitores occultius distributo et tumor consenuit militum et salus est in tuto locata praefecti. deinde cibo abunde perlato castra die praedicto sunt mota.</p>\r\n<p>Oportunum est, ut arbitror, explanare nunc causam, quae ad exitium praecipitem Aginatium inpulit iam inde a priscis maioribus nobilem, ut locuta est pertinacior fama. nec enim super hoc ulla documentorum rata est fides.</p>\r\n<p>Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in terram defluat, aut ne plus aequo quid in amicitiam congeratur.</p>\r\n<p>Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates alias rebus infudere communibus per multa illa et dira facinora Caesaris Galli, qui ex squalore imo miseriarum in aetatis adultae primitiis ad principale culmen insperato saltu provectus ultra terminos potestatis delatae procurrens asperitate nimia cuncta foedabat. propinquitate enim regiae stirpis gentilitateque etiam tum Constantini nominis efferebatur in fastus, si plus valuisset, ausurus hostilia in auctorem suae felicitatis, ut videbatur.</p>\r\n<p>Denique Antiochensis ordinis vertices sub uno elogio iussit occidi ideo efferatus, quod ei celebrari vilitatem intempestivam urgenti, cum inpenderet inopia, gravius rationabili responderunt; et perissent ad unum ni comes orientis tunc Honoratus fixa</p>', '2018-06-11 13:51:46', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `report_comment`
--

DROP TABLE IF EXISTS `report_comment`;
CREATE TABLE IF NOT EXISTS `report_comment` (
  `id_comment_pfk` int(11) NOT NULL,
  `id_user_pfk` int(11) NOT NULL,
  `reported_at` datetime NOT NULL
) ;

--
-- Déchargement des données de la table `report_comment`
--

INSERT INTO `report_comment` (`id_comment_pfk`, `id_user_pfk`, `reported_at`) VALUES
(28, 1, '2018-05-29 23:35:56'),
(28, 1, '2018-05-29 23:36:01'),
(28, 1, '2018-05-29 23:37:28'),
(27, 1, '2018-05-30 16:42:14'),
(28, 1, '2018-05-30 16:43:25'),
(28, 1, '2018-05-30 16:45:49'),
(28, 1, '2018-05-30 16:45:56'),
(28, 1, '2018-05-30 16:51:04'),
(28, 1, '2018-05-30 16:51:33'),
(28, 1, '2018-05-30 16:52:27'),
(28, 1, '2018-05-30 16:52:54'),
(28, 1, '2018-05-30 17:09:48'),
(28, 1, '2018-05-30 17:15:40'),
(28, 1, '2018-05-30 17:52:12'),
(28, 1, '2018-05-30 17:55:21'),
(28, 1, '2018-05-30 17:56:11'),
(28, 1, '2018-05-30 17:56:52'),
(28, 1, '2018-05-30 17:57:29'),
(28, 1, '2018-05-30 18:01:14'),
(28, 1, '2018-05-30 18:01:48'),
(28, 1, '2018-05-30 18:03:03'),
(28, 1, '2018-05-30 18:04:07'),
(28, 1, '2018-05-30 18:04:09'),
(28, 1, '2018-05-30 18:04:10'),
(28, 1, '2018-05-30 18:04:30'),
(28, 1, '2018-05-30 18:04:53'),
(28, 1, '2018-05-30 18:06:11'),
(28, 1, '2018-05-30 18:06:49'),
(28, 1, '2018-05-30 18:08:09'),
(28, 1, '2018-05-30 18:08:54'),
(28, 1, '2018-05-30 18:09:05'),
(28, 1, '2018-05-30 18:09:42'),
(28, 1, '2018-05-30 18:10:32'),
(28, 1, '2018-05-30 18:14:54'),
(28, 1, '2018-05-30 18:14:59'),
(28, 1, '2018-06-12 13:48:26'),
(28, 1, '2018-06-12 13:48:39'),
(28, 1, '2018-06-12 13:52:43'),
(24, 1, '2018-06-12 13:52:47'),
(28, 1, '2018-06-12 13:53:03'),
(28, 1, '2018-06-12 14:01:08'),
(28, 1, '2018-06-12 14:02:01'),
(31, 1, '2018-06-12 14:02:53'),
(31, 1, '2018-06-12 14:03:40'),
(31, 1, '2018-06-12 16:58:05'),
(32, 1, '2018-06-12 17:32:56'),
(30, 1, '2018-06-12 23:20:34'),
(33, 1, '2018-06-15 11:17:56'),
(33, 1, '2018-06-15 11:18:01'),
(33, 1, '2018-06-15 11:21:14'),
(33, 1, '2018-06-15 11:22:41'),
(33, 14, '2018-06-15 11:28:47'),
(32, 14, '2018-06-15 21:56:21'),
(14, 16, '2018-06-23 19:02:46'),
(15, 16, '2018-06-23 22:16:05'),
(26, 16, '2018-06-23 22:21:24'),
(46, 16, '2018-06-23 22:28:16'),
(41, 14, '2018-06-24 13:24:41'),
(56, 25, '2018-06-25 22:09:41'),
(60, 26, '2018-06-26 10:09:28'),
(42, 26, '2018-06-26 10:24:37'),
(2, 27, '2018-06-30 09:28:44'),
(62, 27, '2018-06-30 10:08:23'),
(70, 28, '2018-07-02 10:47:06'),
(4, 29, '2018-07-02 10:57:19'),
(68, 32, '2018-07-04 17:53:50');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `register_at` datetime NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `deleted_at`, `pass`, `username`, `register_at`, `role`) VALUES
(33, 'lol@lol.com', NULL, '$2y$10$CNPxJRwOQG8ASLicambQ8O7snVk4ezD/fnizdc6loIou699yijS5m', 'koula', '2018-07-04 23:53:38', 'Contributeur'),
(17, 'mo@mo.mo', '2018-06-28 21:17:15', '$2y$10$MCLCmt6AP6Jv./J./PdYC.sps11Am2eiyVmCbcmFEOCodD.hIa4xa', 'Mo', '2018-06-24 21:11:24', 'Contributeur'),
(16, 'ab@ab.ab', NULL, '$2y$10$jQhdp4UT23Ur4aMtNrOLF.wV27GksrK6SEWEP009sFHNcHI1tHqAC', 'Ab', '2018-06-23 18:57:33', 'Contributeur'),
(9, 'lalala@lalala.com', '2018-06-20 19:17:04', 'lalala', 'lalalala', '2018-06-01 22:15:53', 'Contributeur'),
(11, 'lalala@lalala.com', '2018-06-20 19:17:09', 'lololo', 'lelele', '2018-06-01 22:47:51', 'Contributeur'),
(12, 'testos@testos.com', NULL, '1234', 'testas', '2018-06-14 21:36:10', 'Contributeur'),
(13, 'bola@bola.com', NULL, '$2y$10$mlKlO11Z9FGh5bXlbImJIeky674QFyNqTtpwYF9wyRrSmE9Ph3nBK', 'bola', '2018-06-15 08:57:23', 'Contributeur'),
(14, 'ad@ad.ad', NULL, '$2y$10$qyBVxsjU7ErE/KHhiD5WnO5EC/dMV7jmS4K666RwPV1IyqtiGOXuG', 'Ad', '2018-06-15 10:35:56', 'Admin'),
(15, 'haha@haha.fr', NULL, '$2y$10$YsoLhcLHl1zV6mRE49ftGOhfKxRXY5JQsKG.HqH2lZVj//CVgfZOC', 'haha', '2018-06-15 23:34:37', 'Contributeur'),
(27, 'manue@manue.manue', NULL, '$2y$10$VZLwzZIWhtzlgZAuTUjhG.GQenicd/0iGJ7Y/7498.mAe3XQM.5ni', 'manue', '2018-06-30 09:24:02', 'Contributeur'),
(25, 'ga@ga.ga', NULL, '$2y$10$41oWdN43V/lagEsn58wQkejnSvo79kmXGKhiMABkjLAWgApof5.k2', 'ga', '2018-06-25 21:46:19', 'Contributeur'),
(22, 'bou@bou.bou', '2018-06-25 21:28:36', '$2y$10$DkuVbuz4lLMdIRs8BRWuqeJY8xeTt7LeRxlyqK7xBDzY./FLDlZhS', 'bou', '2018-06-24 22:29:26', 'Contributeur'),
(23, 'tu@tu.tu', '2018-06-25 21:28:39', '$2y$10$LKidDopeXyvSQaWLb7XL2OBhLoYCzyqVWjps/FugDpf2aP/czJiTm', 'tu', '2018-06-24 22:31:34', 'Contributeur'),
(26, 'pa@pa.pa', NULL, '$2y$10$Z7OTw3Fbt2plOAZcFCuMpuIgyCpSfZ9LyoAQ2WP9ma1nmKRPPVEDW', 'pa', '2018-06-26 10:08:26', 'Contributeur'),
(28, 'jean.forteroche@blog.fr', NULL, '$2y$10$i1AxpES8rvTtbpqkEG38ruoeWYVLLnEOe.9fYafJzWcL9pMFzc3My', 'Jean Forteroche', '2018-07-02 10:44:37', 'Admin'),
(29, 'contributeur@du88.com', NULL, '$2y$10$xfgcOXyJUUpMQn0sgFPjr.rUONsgy0DsXhY4SMOETHYsqKabtF2Xa', 'Contributeur88', '2018-07-02 10:56:54', 'Contributeur'),
(32, 'jeremy@leboss.fr', NULL, '$2y$10$jKt8ntAsTemiMPjmbcrq9ukONixXs0frxXCKrzFzNCGFI8UiQT4Wm', 'jeremy', '2018-07-04 17:53:12', 'Contributeur'),
(31, 'ps@ps.com', NULL, '$2y$10$AITdVhSvVzR1Z42axi7FrOjDh/QYEqWHXcPaenLlD3wiOPyLOQ/zS', 'ps', '2018-07-02 11:31:16', 'Contributeur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
