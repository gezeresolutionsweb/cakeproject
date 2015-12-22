SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Structure de la table `project_milestones`
--

CREATE TABLE `project_milestones` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Milestone identifier',
  `project_project_id` int(10) UNSIGNED NOT NULL COMMENT 'Project identifier',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Milestone title',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Milestone description',
  `effective_date` date NOT NULL COMMENT 'Milestone effective date',
  `created` datetime NOT NULL COMMENT 'Milestone creation date',
  `modified` datetime NOT NULL COMMENT 'Milestone modification date',
  `is_active` int(10) UNSIGNED NOT NULL COMMENT 'Milestone is active ?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table of milestones';

-- --------------------------------------------------------

--
-- Structure de la table `project_projects`
--

CREATE TABLE `project_projects` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Project unique identifier',
  `parent_id` int(10) UNSIGNED NOT NULL COMMENT 'Project parent identifier',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Project title',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Project description',
  `created` datetime NOT NULL COMMENT 'Project creation date',
  `modified` datetime NOT NULL COMMENT 'Project modification date',
  `is_active` int(10) UNSIGNED NOT NULL COMMENT 'Project is active or not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table of projects';

-- --------------------------------------------------------

--
-- Structure de la table `project_tasks`
--

CREATE TABLE `project_tasks` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Task identifier',
  `project_project_id` int(10) UNSIGNED NOT NULL COMMENT 'Task project id',
  `project_milestone_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Task milestone identifier',
  `project_task_category_id` int(10) UNSIGNED NOT NULL COMMENT 'Task category identifier',
  `project_task_priority_id` int(10) UNSIGNED NOT NULL COMMENT 'Task priority identifier',
  `project_task_status_id` int(10) UNSIGNED NOT NULL COMMENT 'Task status identifier',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Task title',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Task description',
  `due_date` date NOT NULL COMMENT 'Task due date',
  `assigned_to_id` int(10) UNSIGNED NOT NULL COMMENT 'Task assigned to identifier',
  `author_id` int(10) UNSIGNED NOT NULL COMMENT 'Task author identifier',
  `start_date` date NOT NULL COMMENT 'Task start date',
  `done_ratio` int(10) UNSIGNED NOT NULL COMMENT 'Task done ratio',
  `estimated_hours` float NOT NULL COMMENT 'Task estimated hours',
  `created` datetime NOT NULL COMMENT 'Task creation date',
  `modified` datetime NOT NULL COMMENT 'Task modification date',
  `closed` datetime NOT NULL COMMENT 'Task closed date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table of tasks';

-- --------------------------------------------------------

--
-- Structure de la table `project_task_categories`
--

CREATE TABLE `project_task_categories` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Task category identifier',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Task category title',
  `is_default` int(10) UNSIGNED NOT NULL COMMENT 'Task category is default',
  `position` int(10) UNSIGNED NOT NULL COMMENT 'Task category position in list'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table of project task categories';

--
-- Contenu de la table `project_task_categories`
--

INSERT INTO `project_task_categories` (`id`, `title`, `is_default`, `position`) VALUES
(1, 'Anomalie', 1, 1),
(2, 'Évolution', 0, 2),
(3, 'Assistance', 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `project_task_comments`
--

CREATE TABLE `project_task_comments` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Comment identifier',
  `author_id` int(10) UNSIGNED NOT NULL COMMENT 'Comment author identifier',
  `project_task_id` int(10) UNSIGNED NOT NULL COMMENT 'Comment task identifier',
  `comment` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Comment',
  `created` datetime NOT NULL COMMENT 'Comment creation date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table of comments';

-- --------------------------------------------------------

--
-- Structure de la table `project_task_priorities`
--

CREATE TABLE `project_task_priorities` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Task prority identifier',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Task priority title',
  `is_default` int(10) UNSIGNED NOT NULL COMMENT 'Task priority is default',
  `position` int(10) UNSIGNED NOT NULL COMMENT 'Task priority positio in list'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table or project task priorities';

--
-- Contenu de la table `project_task_priorities`
--

INSERT INTO `project_task_priorities` (`id`, `title`, `is_default`, `position`) VALUES
(1, 'Bas', 0, 1),
(2, 'Normal', 1, 2),
(3, 'Haut', 0, 3),
(4, 'Urgent', 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `project_task_statuses`
--

CREATE TABLE `project_task_statuses` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Task status identifier',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Task status title',
  `is_close` int(10) UNSIGNED NOT NULL COMMENT 'Task status is close ?',
  `is_default` int(10) UNSIGNED NOT NULL COMMENT 'Task status is default ?',
  `position` int(10) UNSIGNED NOT NULL COMMENT 'Task status position in list'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table of project task status';

--
-- Contenu de la table `project_task_statuses`
--

INSERT INTO `project_task_statuses` (`id`, `title`, `is_close`, `is_default`, `position`) VALUES
(1, 'Nouveau', 0, 1, 1),
(2, 'En cours', 0, 0, 2),
(3, 'Résolu', 0, 0, 3),
(4, 'Fermé', 1, 0, 4),
(5, 'Rejeté', 1, 0, 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `project_projects`
--
ALTER TABLE `project_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `is_active` (`is_active`);

--
-- Index pour la table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project_task_categories`
--
ALTER TABLE `project_task_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project_task_comments`
--
ALTER TABLE `project_task_comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project_task_priorities`
--
ALTER TABLE `project_task_priorities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project_task_statuses`
--
ALTER TABLE `project_task_statuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `project_projects`
--
ALTER TABLE `project_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Project unique identifier', AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT pour la table `project_tasks`
--
ALTER TABLE `project_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Task identifier', AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT pour la table `project_task_categories`
--
ALTER TABLE `project_task_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Task category identifier', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `project_task_comments`
--
ALTER TABLE `project_task_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Comment identifier';
--
-- AUTO_INCREMENT pour la table `project_task_priorities`
--
ALTER TABLE `project_task_priorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Task prority identifier', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `project_task_statuses`
--
ALTER TABLE `project_task_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Task status identifier', AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
