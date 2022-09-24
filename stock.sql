-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 02:03 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `code_article` varchar(128) NOT NULL,
  `serial` varchar(128) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `id_category` int(11) NOT NULL DEFAULT '0',
  `designation` text,
  `model` text,
  `id_emplacement` int(11) NOT NULL DEFAULT '0',
  `prix_achat` double DEFAULT NULL,
  `tva` double DEFAULT NULL,
  `observation` text,
  `description` text,
  `unity` varchar(128) DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `add_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `code_article`, `serial`, `quantity`, `id_category`, `designation`, `model`, `id_emplacement`, `prix_achat`, `tva`, `observation`, `description`, `unity`, `date_creation`, `add_by`) VALUES
(18, '7FC22', 'Tnek', 0, 1, 'Iooatannga', 'A', 1, 20, NULL, 'Tta', 'Groaehgabg', 'HhteaeCeRuay n', '2021-04-06 21:32:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bonlivraisons`
--

CREATE TABLE `bonlivraisons` (
  `id` int(100) NOT NULL,
  `n_bl` int(100) NOT NULL,
  `date` date NOT NULL,
  `id_client` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `marque_modele` varchar(100) NOT NULL,
  `n_serie` int(100) NOT NULL,
  `quantite` int(100) NOT NULL,
  `date_entree` date NOT NULL,
  `nom_fournisseur` varchar(100) NOT NULL,
  `n_entree` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Nature', 'jkrhskrheksr'),
(2, 'technologie', ''),
(3, 'foods', '');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(100) NOT NULL,
  `nom_societe` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `matricule_fiscal` varchar(128) NOT NULL,
  `etablissement` varchar(100) NOT NULL,
  `n_rc` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE `devis` (
  `id` int(100) NOT NULL,
  `n_devis` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_clients` int(100) NOT NULL,
  `total_ht` int(100) NOT NULL,
  `total_tva` int(100) NOT NULL,
  `remise` int(100) NOT NULL,
  `total_ttc` int(100) NOT NULL,
  `validite_offre` varchar(100) NOT NULL,
  `taux_de_change` int(100) NOT NULL,
  `delai_livraison` varchar(100) NOT NULL,
  `Disponibilite` varchar(100) NOT NULL,
  `paiement` varchar(100) NOT NULL,
  `nom_commercial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emplacements`
--

CREATE TABLE `emplacements` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `emplacements`
--

INSERT INTO `emplacements` (`id`, `title`) VALUES
(1, 'r1'),
(2, 'r2'),
(3, 'r3');

-- --------------------------------------------------------

--
-- Table structure for table `entrees`
--

CREATE TABLE `entrees` (
  `id` int(100) NOT NULL,
  `code_article` varchar(128) NOT NULL,
  `n_entree` varchar(128) NOT NULL,
  `date_entree` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_fournisseurs` int(100) NOT NULL,
  `n_facture_fournisseur` int(100) NOT NULL,
  `tva` int(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `prix_achat` float NOT NULL,
  `add_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entrees`
--

INSERT INTO `entrees` (`id`, `code_article`, `n_entree`, `date_entree`, `id_fournisseurs`, `n_facture_fournisseur`, `tva`, `quantity`, `prix_achat`, `add_by`) VALUES
(12, '7FC22', 'E210407', '2021-04-06 23:55:32', 1617740653, 45, 4, 27, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `id` int(100) NOT NULL,
  `n_facture` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `n_bon_commande` int(100) NOT NULL,
  `date_bon_commande` int(11) NOT NULL,
  `id_clients` int(100) NOT NULL,
  `total_ht` int(100) NOT NULL,
  `total_tva` int(100) NOT NULL,
  `total_ttc` int(100) NOT NULL,
  `montant_timbre` int(100) NOT NULL,
  `n_exoneration_tva` varchar(100) NOT NULL,
  `date_validite_exoneration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(100) NOT NULL,
  `nom_fournisseur` varchar(100) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` int(100) NOT NULL,
  `fax` int(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lignedevis`
--

CREATE TABLE `lignedevis` (
  `id` int(100) NOT NULL,
  `n_ligne_devis` int(100) NOT NULL,
  `n_devis` int(100) NOT NULL,
  `code_article` int(100) NOT NULL,
  `designation` int(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `prix_achats` int(100) NOT NULL,
  `marge` int(100) NOT NULL,
  `p_u_ht` int(100) NOT NULL,
  `quantite` int(100) NOT NULL,
  `p_t_ht` int(100) NOT NULL,
  `code_tva` int(100) NOT NULL,
  `p_t_ttc` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lignefactures`
--

CREATE TABLE `lignefactures` (
  `id` int(100) NOT NULL,
  `n_ligne_facture` int(100) NOT NULL,
  `n_facture` int(100) NOT NULL,
  `code_article` int(100) NOT NULL,
  `referance` int(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `prix_achats` int(100) NOT NULL,
  `marge` int(100) NOT NULL,
  `p_u_ht` int(100) NOT NULL,
  `quantite` int(100) NOT NULL,
  `p_t_ht` int(100) NOT NULL,
  `code_tva` int(100) NOT NULL,
  `p_t_ttc` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

CREATE TABLE `offre` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_fournisseur` int(11) NOT NULL,
  `validite_offre` int(11) NOT NULL,
  `file` text NOT NULL,
  `id_demande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `offre`
--

INSERT INTO `offre` (`id`, `titre`, `date`, `id_fournisseur`, `validite_offre`, `file`, `id_demande`) VALUES
(12, '', '2021-04-05 14:39:07', 22, 20, 'DOC_1617633547.png', 45),
(13, 'kk', '2021-04-05 14:44:45', 1, 52, 'DOC_1617633885.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `tel` varchar(128) NOT NULL,
  `fax` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_societe` int(11) NOT NULL,
  `specialite` varchar(128) NOT NULL,
  `sex` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `nom`, `tel`, `fax`, `email`, `id_societe`, `specialite`, `sex`) VALUES
(18, 'TeuhoD', 'Yh m', 'N aogAtRrmyn', 'riusazid@icuzavsum.sk', 1617738719, 'HlaaomaaOn', 1),
(19, 'klmmk', '46454564', '12315464', '3affset@gmail.com', 1617738792, 'dhskdjs', 1),
(20, 'ThaUgoAah', 'Aga e', 'Atim', 'ji@modivmi.tc', 1617739140, 'Akanhgh onu', 0),
(21, 'Mohsen', '789787', '45645456', '3affset@gmail.com', 1617740257, 'dhaw', 1),
(22, 'Khawla', '78988', '54651132', 'tounsi.online@gmail.com', 1617740257, 'reseau', 0),
(23, 'Samira', '5465454', '21312132', 'tounsi.online@gmail.com', 1617740653, 'dev', 0),
(24, 'Hatem', '21789535', '45646545156', '3affset@gmail.com', 1617740653, 'dev', 1),
(27, 'Aa', 'Taaopiahahma', 'AC lehAu', 'itriwaf@com.de', 1617741148, 'P Culaguennh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quantity`
--

CREATE TABLE `quantity` (
  `id` int(11) NOT NULL,
  `code_article` varchar(128) NOT NULL,
  `n_entree` varchar(128) NOT NULL,
  `n_sortie` varchar(128) NOT NULL,
  `serial` varchar(128) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `add_by` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `quantity`
--

INSERT INTO `quantity` (`id`, `code_article`, `n_entree`, `n_sortie`, `serial`, `quantity`, `add_by`, `creation_date`) VALUES
(46, '7FC22', 'E210407', '', NULL, 27, 1, '2021-04-06 23:55:32'),
(47, '7FC22', '', 'S210407', NULL, -10, 1, '2021-04-06 23:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `societe`
--

CREATE TABLE `societe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `fax` varchar(128) NOT NULL,
  `tel` varchar(128) NOT NULL,
  `matricule` varchar(128) NOT NULL,
  `etablissement` varchar(128) NOT NULL,
  `n_rc` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `societe`
--

INSERT INTO `societe` (`id`, `nom`, `email`, `adresse`, `fax`, `tel`, `matricule`, `etablissement`, `n_rc`, `type`) VALUES
(7, 'Sofien', 'samiraabdelkarim4@gmail.com', 'sidi hssin 24, rue baayrout', '(+216) 36 010 011', '28571479', '5464645654', 'etatique', '00000', 'fournisseur'),
(1617739140, 'ThaUgoAah', 'ji@modivmi.tc', 'A', 'Atim', 'Aga e', 'NKn', 'privee', 'Uh', 'fournisseur'),
(1617740653, 'Ooredoo', 'ooredoo@tt.co', 'tunis', '2222222', '22222222', '4546542', 'privee', '8456', 'fournisseur'),
(1617741087, 'Nano', 'ogine@zebu.lv', 'T aaf', 'Aaaobhh', 'UaaewK', 'ahaa', 'etatique', '7987', 'client'),
(1617741148, 'U agi', 'itriwaf@com.de', 'Epamkemaaab', 'Y Rurebm', 'AohCiabRay l', 'Syaihamah', 'privee', 'AKahnCha t', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `sorties`
--

CREATE TABLE `sorties` (
  `id` int(100) NOT NULL,
  `code_article` varchar(128) NOT NULL,
  `n_sortie` varchar(128) NOT NULL,
  `date_sortie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantite` int(100) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `n_bl` int(100) NOT NULL,
  `n_facture` int(100) NOT NULL,
  `marge` double NOT NULL,
  `prix_achat` double NOT NULL,
  `prix_vente` double NOT NULL,
  `add_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sorties`
--

INSERT INTO `sorties` (`id`, `code_article`, `n_sortie`, `date_sortie`, `quantite`, `destinataire`, `n_bl`, `n_facture`, `marge`, `prix_achat`, `prix_vente`, `add_by`) VALUES
(12, '7FC22', 'S210407', '2021-04-06 23:56:34', 10, 1617741087, 0, 4564, 5, 45, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `role` varchar(128) NOT NULL DEFAULT 'editor'
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `status`, `role`) VALUES
(1, 'superadmin', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-04-01 16:38:01', 'on', 'superadmin'),
(2, 'editeur', 'editor@user.com', 'f0c1e470f73c6b1d6ac128ee46fad99a', '2021-04-01 17:18:53', 'on', 'editor'),
(3, 'consultant', 'consultant@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-04-03 11:50:35', 'on', 'consultant'),
(4, 'admin', 'admin@admin.tn', 'e10adc3949ba59abbe56e057f20f883e', '2021-04-03 11:51:40', 'on', 'admin'),
(5, 'agent', 'agent@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-04-03 14:41:39', 'on', 'agent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code_article`);

--
-- Indexes for table `bonlivraisons`
--
ALTER TABLE `bonlivraisons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emplacements`
--
ALTER TABLE `emplacements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrees`
--
ALTER TABLE `entrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lignedevis`
--
ALTER TABLE `lignedevis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lignefactures`
--
ALTER TABLE `lignefactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_demande` (`id_demande`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quantity`
--
ALTER TABLE `quantity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sorties`
--
ALTER TABLE `sorties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bonlivraisons`
--
ALTER TABLE `bonlivraisons`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emplacements`
--
ALTER TABLE `emplacements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entrees`
--
ALTER TABLE `entrees`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offre`
--
ALTER TABLE `offre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `quantity`
--
ALTER TABLE `quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `societe`
--
ALTER TABLE `societe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1617741149;

--
-- AUTO_INCREMENT for table `sorties`
--
ALTER TABLE `sorties`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
