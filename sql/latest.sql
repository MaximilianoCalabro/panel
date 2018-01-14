#
# TABLE STRUCTURE FOR: admin_groups
#

DROP TABLE IF EXISTS `admin_groups`;

CREATE TABLE `admin_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES ('1', 'webmaster', 'Webmaster');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES ('2', 'admin', 'Administrator');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES ('3', 'manager', 'Manager');
INSERT INTO `admin_groups` (`id`, `name`, `description`) VALUES ('4', 'staff', 'Staff');


#
# TABLE STRUCTURE FOR: admin_login_attempts
#

DROP TABLE IF EXISTS `admin_login_attempts`;

CREATE TABLE `admin_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: admin_users
#

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('1', '127.0.0.1', 'nkstudios', '$2y$08$rPQ.B/7Vgxi00Jb8sv3RZ.iH1OGitsNz2d4a3jIXW0BTdk9qW91D.', NULL, NULL, NULL, NULL, NULL, NULL, '1451900190', '1515893840', '1', 'Webmaster', NULL);
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('2', '127.0.0.1', 'admin', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', NULL, NULL, NULL, NULL, NULL, NULL, '1451900228', '1514845116', '1', 'Admin', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('3', '127.0.0.1', 'manager', '$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa', NULL, NULL, NULL, NULL, NULL, NULL, '1451900430', '1465489585', '1', 'Manager', '');
INSERT INTO `admin_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`) VALUES ('4', '127.0.0.1', 'staff', '$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6', NULL, NULL, NULL, NULL, NULL, NULL, '1451900439', '1465489590', '1', 'Staff', '');


#
# TABLE STRUCTURE FOR: admin_users_groups
#

DROP TABLE IF EXISTS `admin_users_groups`;

CREATE TABLE `admin_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES ('1', '1', '1');
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES ('2', '2', '2');
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES ('3', '3', '3');
INSERT INTO `admin_users_groups` (`id`, `user_id`, `group_id`) VALUES ('4', '4', '4');


#
# TABLE STRUCTURE FOR: api_access
#

DROP TABLE IF EXISTS `api_access`;

CREATE TABLE `api_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: api_keys
#

DROP TABLE IF EXISTS `api_keys`;

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `api_keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES ('1', '0', 'anonymous', '1', '1', '0', NULL, '1463388382');


#
# TABLE STRUCTURE FOR: api_limits
#

DROP TABLE IF EXISTS `api_limits`;

CREATE TABLE `api_limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: api_logs
#

DROP TABLE IF EXISTS `api_logs`;

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: groups
#

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES ('1', 'Miembros', 'Usuario General');


#
# TABLE STRUCTURE FOR: imagenes
#

DROP TABLE IF EXISTS `imagenes`;

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_imagen` varchar(524) COLLATE utf8_bin NOT NULL,
  `descripcion_imagen` varchar(1024) COLLATE utf8_bin DEFAULT NULL,
  `ruta_imagen` varchar(524) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('11', '00', NULL, '0ef8d-00.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('12', '01', NULL, 'b6285-01.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('13', '02', NULL, '5299c-02.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('14', '03', NULL, '81d01-03.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('15', '04', NULL, 'c9d1c-04.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('16', '05', NULL, '1cced-05.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('17', '06', NULL, '271ad-06.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('18', '10', NULL, '3d21e-10.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('19', '11', NULL, '62d3d-11.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('20', '12', NULL, 'a08a0-12.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('21', '13', NULL, '13064-13.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('22', '14', NULL, '74eac-14.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('23', '15', NULL, '7cd6b-15.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('24', '16', NULL, '36dc8-16.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('25', '17', NULL, 'a4f56-17.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('26', '18', NULL, '1d975-18.jpg');
INSERT INTO `imagenes` (`id`, `titulo_imagen`, `descripcion_imagen`, `ruta_imagen`) VALUES ('27', '19', NULL, '9214d-19.jpg');


#
# TABLE STRUCTURE FOR: login_attempts
#

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: rel_chesse_imagenes
#

DROP TABLE IF EXISTS `rel_chesse_imagenes`;

CREATE TABLE `rel_chesse_imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_seccion_chesse` int(11) NOT NULL,
  `fk_imagenes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `rel_chesse_imagenes` (`id`, `fk_seccion_chesse`, `fk_imagenes`) VALUES ('6', '1', '18');
INSERT INTO `rel_chesse_imagenes` (`id`, `fk_seccion_chesse`, `fk_imagenes`) VALUES ('7', '1', '19');
INSERT INTO `rel_chesse_imagenes` (`id`, `fk_seccion_chesse`, `fk_imagenes`) VALUES ('8', '1', '20');
INSERT INTO `rel_chesse_imagenes` (`id`, `fk_seccion_chesse`, `fk_imagenes`) VALUES ('9', '1', '21');
INSERT INTO `rel_chesse_imagenes` (`id`, `fk_seccion_chesse`, `fk_imagenes`) VALUES ('10', '1', '22');
INSERT INTO `rel_chesse_imagenes` (`id`, `fk_seccion_chesse`, `fk_imagenes`) VALUES ('11', '1', '23');
INSERT INTO `rel_chesse_imagenes` (`id`, `fk_seccion_chesse`, `fk_imagenes`) VALUES ('12', '1', '24');
INSERT INTO `rel_chesse_imagenes` (`id`, `fk_seccion_chesse`, `fk_imagenes`) VALUES ('13', '1', '11');


#
# TABLE STRUCTURE FOR: rel_header_imagenes
#

DROP TABLE IF EXISTS `rel_header_imagenes`;

CREATE TABLE `rel_header_imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_seccion_header` int(11) NOT NULL,
  `fk_imagenes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `rel_header_imagenes` (`id`, `fk_seccion_header`, `fk_imagenes`) VALUES ('9', '5', '18');
INSERT INTO `rel_header_imagenes` (`id`, `fk_seccion_header`, `fk_imagenes`) VALUES ('10', '5', '19');
INSERT INTO `rel_header_imagenes` (`id`, `fk_seccion_header`, `fk_imagenes`) VALUES ('11', '5', '20');


#
# TABLE STRUCTURE FOR: rel_location_imagenes
#

DROP TABLE IF EXISTS `rel_location_imagenes`;

CREATE TABLE `rel_location_imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_seccion_location` int(11) NOT NULL,
  `fk_imagenes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `rel_location_imagenes` (`id`, `fk_seccion_location`, `fk_imagenes`) VALUES ('3', '1', '11');
INSERT INTO `rel_location_imagenes` (`id`, `fk_seccion_location`, `fk_imagenes`) VALUES ('4', '1', '12');
INSERT INTO `rel_location_imagenes` (`id`, `fk_seccion_location`, `fk_imagenes`) VALUES ('5', '1', '13');
INSERT INTO `rel_location_imagenes` (`id`, `fk_seccion_location`, `fk_imagenes`) VALUES ('6', '1', '18');


#
# TABLE STRUCTURE FOR: rel_plant_imagenes
#

DROP TABLE IF EXISTS `rel_plant_imagenes`;

CREATE TABLE `rel_plant_imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_seccion_plant` int(11) NOT NULL,
  `fk_imagenes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `rel_plant_imagenes` (`id`, `fk_seccion_plant`, `fk_imagenes`) VALUES ('9', '1', '11');
INSERT INTO `rel_plant_imagenes` (`id`, `fk_seccion_plant`, `fk_imagenes`) VALUES ('10', '1', '12');
INSERT INTO `rel_plant_imagenes` (`id`, `fk_seccion_plant`, `fk_imagenes`) VALUES ('11', '1', '13');
INSERT INTO `rel_plant_imagenes` (`id`, `fk_seccion_plant`, `fk_imagenes`) VALUES ('12', '1', '14');
INSERT INTO `rel_plant_imagenes` (`id`, `fk_seccion_plant`, `fk_imagenes`) VALUES ('13', '1', '15');
INSERT INTO `rel_plant_imagenes` (`id`, `fk_seccion_plant`, `fk_imagenes`) VALUES ('14', '1', '16');
INSERT INTO `rel_plant_imagenes` (`id`, `fk_seccion_plant`, `fk_imagenes`) VALUES ('15', '1', '18');


#
# TABLE STRUCTURE FOR: seccion_chesse
#

DROP TABLE IF EXISTS `seccion_chesse`;

CREATE TABLE `seccion_chesse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(500) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `seccion_chesse` (`id`, `titulo`, `imagen`) VALUES ('1', 'NUESTROS QUESOS', '');


#
# TABLE STRUCTURE FOR: seccion_contact
#

DROP TABLE IF EXISTS `seccion_contact`;

CREATE TABLE `seccion_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_bin NOT NULL,
  `texto1` varchar(200) COLLATE utf8_bin NOT NULL,
  `texto2` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `seccion_contact` (`id`, `titulo`, `texto1`, `texto2`) VALUES ('1', 'Cantactenos', 'CP 6343 – Villa Maza Provincia de Buenos Aires, Argentina', '(0293)5489093');


#
# TABLE STRUCTURE FOR: seccion_header
#

DROP TABLE IF EXISTS `seccion_header`;

CREATE TABLE `seccion_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(500) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `seccion_header` (`id`, `titulo`, `imagen`) VALUES ('5', 'Cabecera', '');


#
# TABLE STRUCTURE FOR: seccion_img
#

DROP TABLE IF EXISTS `seccion_img`;

CREATE TABLE `seccion_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(525) COLLATE utf8_bin NOT NULL,
  `ruta` varchar(525) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `seccion_img` (`id`, `titulo`, `ruta`) VALUES ('4', 'rojo', '659b9-user-img-background.jpg');
INSERT INTO `seccion_img` (`id`, `titulo`, `ruta`) VALUES ('5', 'azul', 'bd6e2-user-img-background-blue.jpg');


#
# TABLE STRUCTURE FOR: seccion_location
#

DROP TABLE IF EXISTS `seccion_location`;

CREATE TABLE `seccion_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_bin NOT NULL,
  `texto` text COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `seccion_location` (`id`, `titulo`, `texto`, `nombre`, `imagen`) VALUES ('1', 'Ubicación', '<div>\r\n	Nuestra Planta se encuentra en la localidad de Villa Maza, partido de Adolfo Alsina en el Centro Oeste de la Provincia de Buenos Aires y a escasos kil&oacute;metros de La Pampa. (Meridiano V) por la ruta interprovincial 14.</div>\r\n<div>\r\n	Pr&aacute;cticamente en el Centro del Pa&iacute;s y en la parte sur de la cuenca lechera del Oeste.</div>\r\n', '', '');


#
# TABLE STRUCTURE FOR: seccion_plant
#

DROP TABLE IF EXISTS `seccion_plant`;

CREATE TABLE `seccion_plant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_bin NOT NULL,
  `texto` text COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `imagen` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `seccion_plant` (`id`, `titulo`, `texto`, `nombre`, `imagen`) VALUES ('1', 'Nuestra Planta', '<div>\r\n	Contamos con una renovada planta elaboradora donde la higiene y minucioso cuidado de los productos que fabricamos es nuestra obsesi&oacute;n.</div>\r\n<div>\r\n	Contamos con adecuados sistemas de filtros sanitarios, c&aacute;maras y dep&oacute;sitos que dan al producto final condiciones &oacute;ptimas que podemos orgullosamente mostrar y garantizar.</div>\r\n<div>\r\n	La planta se encuentra a escasos kil&oacute;metros del lugar de origen de la leche que diariamente se recolecta, tambos propios y de vecinos que aportan la materia prima encuadrada dentro de los m&aacute;s altos par&aacute;metros de calidad. Menos de 30.000 bacterias por cm3 antes de la pasteurizaci&oacute;n.</div>\r\n', '', '');


#
# TABLE STRUCTURE FOR: seccion_who
#

DROP TABLE IF EXISTS `seccion_who`;

CREATE TABLE `seccion_who` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) COLLATE utf8_bin NOT NULL,
  `subtitulo` varchar(50) COLLATE utf8_bin NOT NULL,
  `texto1` varchar(500) COLLATE utf8_bin NOT NULL,
  `texto2` varchar(500) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `seccion_who` (`id`, `titulo`, `subtitulo`, `texto1`, `texto2`) VALUES ('1', 'QUIENES SOMOS', 'Lácteos LA UNION', 'Pertenece a La Unión de Schachenmayr S.A. una empresa familiar que desde 1960 produce lácteos en la cuenca lechera del oeste, esta se caracteriza por la alta calidad natural de la leche producida principalmente  a base de pasturas de alfalfa y verdeos de invierno.', 'Su fundador Federico Schachenmayr, luego de sus comienzos en una de las empresas pioneras de la lechería Argentina, Quelac S.A. con su reconocida marca Bavaria, (empresa fundada por Don Francisco Huber por los años 1913. Decidió radicarse en esta región para desarrollar su pasión, la actividad agrícola ganadera y tambera.');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES ('1', '127.0.0.1', 'member', '$2y$08$kkqUE2hrqAJtg.pPnAhvL.1iE7LIujK5LZ61arONLpaBBWh/ek61G', NULL, 'member@member.com', NULL, NULL, NULL, NULL, '1451903855', '1451905011', '1', 'Member', 'One', NULL, NULL);
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES ('2', '::1', 'Makci', '$2y$08$QNah3YYvFiVVBt7YtbbFWu0gF8wTzoYtOKeXYq/sj3puzObWnQj4O', NULL, 'fantasymax@gmail.com', NULL, NULL, NULL, NULL, '1514849431', NULL, '1', 'Maximiliano Pablo', 'Calabro', NULL, NULL);


#
# TABLE STRUCTURE FOR: users_groups
#

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('1', '1', '1');
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES ('2', '2', '1');


