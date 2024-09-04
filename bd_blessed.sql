-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 20-09-2023 a las 05:49:16
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_blessed`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ant_cap`
--

CREATE TABLE `t_ant_cap` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `etiqueta` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `t_ant_cap`
--

INSERT INTO `t_ant_cap` (`id`, `uid`, `etiqueta`, `user_id`) VALUES
(6, '63cb18ab951ef', '?controller=chapters&action=chapters&idu=63cb185c21721&acs=30&num=2&di=30&udi=63cb182d1fcbc', 101),
(7, '63ced3268e9bf', '?controller=chapters&action=chapters&idu=63cb185c21721&acs=30&num=2&di=30&udi=63cb182d1fcbc', 102);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_chapter`
--

CREATE TABLE `t_chapter` (
  `chapt_id` int(11) NOT NULL,
  `chatp_uid` varchar(100) NOT NULL,
  `chapt_name` varchar(50) NOT NULL,
  `chapt_descrp` longtext NOT NULL,
  `chatp_condt` char(1) NOT NULL DEFAULT '',
  `chatp_video` varchar(100) NOT NULL,
  `chart_cours_id` int(11) NOT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_comments`
--

CREATE TABLE `t_comments` (
  `coment_id` int(11) NOT NULL,
  `comment_uid` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` date NOT NULL,
  `coment_condt` char(1) NOT NULL,
  `com_chapters_id` int(11) NOT NULL,
  `com_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_courses`
--

CREATE TABLE `t_courses` (
  `cours_id` int(11) NOT NULL,
  `cours_uid` varchar(100) NOT NULL,
  `cours_name` varchar(50) NOT NULL,
  `cours_descrp` text NOT NULL,
  `cours_condt` char(1) NOT NULL,
  `tpc_plan_id` int(11) NOT NULL,
  `img` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_payments`
--

CREATE TABLE `t_payments` (
  `pay_id` int(11) NOT NULL,
  `pay_uid` varchar(100) NOT NULL,
  `pay_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_plan`
--

CREATE TABLE `t_plan` (
  `plan_id` int(11) NOT NULL,
  `plan_uid` varchar(100) NOT NULL,
  `plan_start_date` date NOT NULL,
  `plan_exp_date` date NOT NULL,
  `plan_cond` char(1) NOT NULL,
  `tp_plan_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `t_plan`
--

INSERT INTO `t_plan` (`plan_id`, `plan_uid`, `plan_start_date`, `plan_exp_date`, `plan_cond`, `tp_plan_id`, `user_id`) VALUES
(11, 'fdgdfg5454', '2023-01-20', '2023-01-20', '1', 117, 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_questions`
--

CREATE TABLE `t_questions` (
  `quest_id` int(11) NOT NULL,
  `quest_uid` varchar(100) NOT NULL,
  `questions` varchar(45) NOT NULL,
  `quest_condt` varchar(45) NOT NULL,
  `test_id` int(11) NOT NULL,
  `quest_response` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_res_coment`
--

CREATE TABLE `t_res_coment` (
  `res_com_id` int(11) NOT NULL,
  `res_com_uid` varchar(100) NOT NULL,
  `res_comment` text NOT NULL,
  `res_com_date` date NOT NULL,
  `res_com_cond` char(1) NOT NULL,
  `res_user_id` int(11) NOT NULL,
  `res_coment_id` int(11) NOT NULL,
  `res_chapters_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_test`
--

CREATE TABLE `t_test` (
  `test_id` int(11) NOT NULL,
  `test_uid` varchar(100) NOT NULL,
  `test_name` varchar(45) NOT NULL,
  `test_condt` varchar(45) NOT NULL,
  `test_cours_id` int(11) NOT NULL,
  `test_position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_test_users`
--

CREATE TABLE `t_test_users` (
  `tu_id` int(11) NOT NULL,
  `tu_uid` varchar(100) NOT NULL,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tu_date` date NOT NULL,
  `tu_note` varchar(50) NOT NULL DEFAULT '',
  `tu_condt` char(1) NOT NULL,
  `tu_inten` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_type_payments`
--

CREATE TABLE `t_type_payments` (
  `tp_pay_id` int(11) NOT NULL,
  `tp_pay_uid` varchar(100) NOT NULL,
  `tp_pay_name` varchar(50) NOT NULL,
  `tp_pay_api` varchar(50) NOT NULL,
  `_pay_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_type_plan`
--

CREATE TABLE `t_type_plan` (
  `tp_plan_id` int(11) NOT NULL,
  `tp_plan_uid` varchar(100) NOT NULL,
  `tp_plan_name` varchar(50) NOT NULL,
  `tp_plan_duration` varchar(50) NOT NULL,
  `tp_plan_price` decimal(10,0) NOT NULL,
  `tp_plan_cond` char(1) NOT NULL,
  `tp_plan_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `t_type_plan`
--

INSERT INTO `t_type_plan` (`tp_plan_id`, `tp_plan_uid`, `tp_plan_name`, `tp_plan_duration`, `tp_plan_price`, `tp_plan_cond`, `tp_plan_description`) VALUES
(117, 'asdf654645', 'administrador', '00', '0', '2', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `user_uid` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `user_cond` char(1) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_surname` varchar(100) NOT NULL,
  `user_country` varchar(50) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `token` int(11) DEFAULT NULL,
  `user_cod_country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_uid`, `user_password`, `user_email`, `user_role`, `user_cond`, `user_name`, `user_surname`, `user_country`, `user_phone`, `token`, `user_cod_country`) VALUES
(63, '63cab4cce6cbc', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'blessed@gmail.com', 'administrador', '1', 'blessed', 'blessed', 'estados unidos', '3222', NULL, 0),
(101, '63cb0905a6b7a', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'jpenaranda633@gmail.com', 'estudiante', '1', 'jesus', 'peÃ±aranda ', 'colombia', '3244348343', NULL, 57),
(102, '63cb1c191bae2', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'jesusredondo11d@gmail.com', 'estudiante', '1', 'jesus', 'redondo', 'colombia', '3023271233', NULL, 57);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_ant_cap`
--
ALTER TABLE `t_ant_cap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__t_user` (`user_id`);

--
-- Indices de la tabla `t_chapter`
--
ALTER TABLE `t_chapter`
  ADD PRIMARY KEY (`chapt_id`),
  ADD KEY `fk_t_capitulos_t_cursos1_idx` (`chart_cours_id`);

--
-- Indices de la tabla `t_comments`
--
ALTER TABLE `t_comments`
  ADD PRIMARY KEY (`coment_id`),
  ADD KEY `fk_t_comentarios_t_capitulos1_idx` (`com_chapters_id`),
  ADD KEY `fk_t_comments_t_user1_idx` (`com_user_id`);

--
-- Indices de la tabla `t_courses`
--
ALTER TABLE `t_courses`
  ADD PRIMARY KEY (`cours_id`),
  ADD KEY `fk_t_cursos_t_type_plan1_idx` (`tpc_plan_id`);

--
-- Indices de la tabla `t_payments`
--
ALTER TABLE `t_payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `fk_t_payments_t_user1_idx` (`user_id`);

--
-- Indices de la tabla `t_plan`
--
ALTER TABLE `t_plan`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `fk_t_plan_t_type_plan1_idx` (`tp_plan_id`),
  ADD KEY `FK_t_plan_t_user` (`user_id`);

--
-- Indices de la tabla `t_questions`
--
ALTER TABLE `t_questions`
  ADD PRIMARY KEY (`quest_id`),
  ADD KEY `fk_t_questions_t_test1_idx` (`test_id`);

--
-- Indices de la tabla `t_res_coment`
--
ALTER TABLE `t_res_coment`
  ADD PRIMARY KEY (`res_com_id`),
  ADD KEY `fk_t_res_coment_t_user` (`res_user_id`),
  ADD KEY `fk_t_res_coment_t_comments` (`res_coment_id`),
  ADD KEY `fk_t_res_coment_t_chapter` (`res_chapters_id`);

--
-- Indices de la tabla `t_test`
--
ALTER TABLE `t_test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `test_cours_id` (`test_cours_id`);

--
-- Indices de la tabla `t_test_users`
--
ALTER TABLE `t_test_users`
  ADD PRIMARY KEY (`tu_id`,`test_id`,`user_id`),
  ADD KEY `fk_t_examenes_has_t_usuarios_t_usuarios1_idx` (`user_id`),
  ADD KEY `fk_t_examenes_has_t_usuarios_t_examenes1_idx` (`test_id`);

--
-- Indices de la tabla `t_type_payments`
--
ALTER TABLE `t_type_payments`
  ADD PRIMARY KEY (`tp_pay_id`),
  ADD KEY `fk_t_type_payments_t_payments1_idx` (`_pay_id`);

--
-- Indices de la tabla `t_type_plan`
--
ALTER TABLE `t_type_plan`
  ADD PRIMARY KEY (`tp_plan_id`);

--
-- Indices de la tabla `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_ant_cap`
--
ALTER TABLE `t_ant_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `t_chapter`
--
ALTER TABLE `t_chapter`
  MODIFY `chapt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `t_comments`
--
ALTER TABLE `t_comments`
  MODIFY `coment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `t_courses`
--
ALTER TABLE `t_courses`
  MODIFY `cours_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `t_payments`
--
ALTER TABLE `t_payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_plan`
--
ALTER TABLE `t_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `t_questions`
--
ALTER TABLE `t_questions`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_res_coment`
--
ALTER TABLE `t_res_coment`
  MODIFY `res_com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_test`
--
ALTER TABLE `t_test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `t_test_users`
--
ALTER TABLE `t_test_users`
  MODIFY `tu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_type_payments`
--
ALTER TABLE `t_type_payments`
  MODIFY `tp_pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_type_plan`
--
ALTER TABLE `t_type_plan`
  MODIFY `tp_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_ant_cap`
--
ALTER TABLE `t_ant_cap`
  ADD CONSTRAINT `FK__t_user` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_chapter`
--
ALTER TABLE `t_chapter`
  ADD CONSTRAINT `fk_t_capitulos_t_cursos1` FOREIGN KEY (`chart_cours_id`) REFERENCES `t_courses` (`cours_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_comments`
--
ALTER TABLE `t_comments`
  ADD CONSTRAINT `fk_t_comentarios_t_capitulos1` FOREIGN KEY (`com_chapters_id`) REFERENCES `t_chapter` (`chapt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_comments_t_user1` FOREIGN KEY (`com_user_id`) REFERENCES `t_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_courses`
--
ALTER TABLE `t_courses`
  ADD CONSTRAINT `fk_t_cursos_t_type_plan1` FOREIGN KEY (`tpc_plan_id`) REFERENCES `t_type_plan` (`tp_plan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_payments`
--
ALTER TABLE `t_payments`
  ADD CONSTRAINT `fk_t_payments_t_user1_idx` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_plan`
--
ALTER TABLE `t_plan`
  ADD CONSTRAINT `FK_t_plan_t_user` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_plan_t_type_plan1` FOREIGN KEY (`tp_plan_id`) REFERENCES `t_type_plan` (`tp_plan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_questions`
--
ALTER TABLE `t_questions`
  ADD CONSTRAINT `fk_t_questions_t_test1` FOREIGN KEY (`test_id`) REFERENCES `t_test` (`test_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_res_coment`
--
ALTER TABLE `t_res_coment`
  ADD CONSTRAINT `fk_t_res_coment_t_chapter` FOREIGN KEY (`res_chapters_id`) REFERENCES `t_chapter` (`chapt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_res_coment_t_comments` FOREIGN KEY (`res_coment_id`) REFERENCES `t_comments` (`coment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_res_coment_t_user` FOREIGN KEY (`res_user_id`) REFERENCES `t_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_test`
--
ALTER TABLE `t_test`
  ADD CONSTRAINT `t_test_ibfk_1` FOREIGN KEY (`test_cours_id`) REFERENCES `t_courses` (`cours_id`);

--
-- Filtros para la tabla `t_test_users`
--
ALTER TABLE `t_test_users`
  ADD CONSTRAINT `fk_t_examenes_has_t_usuarios_t_examenes1` FOREIGN KEY (`test_id`) REFERENCES `t_test` (`test_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_examenes_has_t_usuarios_t_usuarios1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_type_payments`
--
ALTER TABLE `t_type_payments`
  ADD CONSTRAINT `fk_t_type_payments_t_payments1` FOREIGN KEY (`_pay_id`) REFERENCES `t_payments` (`pay_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
