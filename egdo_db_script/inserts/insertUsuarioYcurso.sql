--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_escuela`, `localidad`, `curso_anio`, `curso_letra`, `cant_alumnos`, `fecha_creacion`) VALUES
(2, 'UNLAM', 'San Justo', 3, 'D', 4, '2016-07-15 02:33:11'),
(3, 'EET Nro 7', 'Isiro Casanova', 5, 'F', 3, '2016-07-15 02:45:09');

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `email`, `contrasenia`, `fechaAltaUsuario`, `id_rol`, `id_curso`, `id_confirmacion`, `estadoActivacion`) VALUES
(6, 'NOELIA', 'MOREL', 'noe@gmail.com', '$2y$10$oq6gXZBLb9o5ff0r5vwfY.AeJyAbwaiu1hEEGSVPxA/P/YAfSr/Vy', '2016-07-15 02:25:13', 2, 2, '578873b9d99ba', 1),
(7, 'Noe', 'Rodriguez', 'noe@live.com', '$2y$10$7/jeZbGKcI1b/UPvN7AY4e3ZFdV016vXLCtcof8oQ2eWqHlJ4Q4U.', '2016-07-15 02:34:10', 3, 2, '578875d207524', 1),
(8, NULL, NULL, 'jose@egdo.com', NULL, '2016-07-15 02:34:10', 3, 2, '578875d535ff2', 0),
(9, NULL, NULL, 'luis@egdo.com', NULL, '2016-07-15 02:34:10', 3, 2, '578875d8c3a5f', 0),
(10, NULL, NULL, 'maria@egdo.com', NULL, '2016-07-15 02:34:10', 3, 2, '578875dc1d6f5', 0),
(11, 'MATIAS', 'PEREZ', 'noenmorel@gmail.com', '$2y$10$.u1a24LQki3Srdvb8PSHou7lixkocPMUFjUWUBXUyESOizOof6FLe', '2016-07-15 02:39:43', 2, 3, '5788771f23a79', 1),
(12, 'Mario', 'Diaz', 'noeliamorel@live.com', '$2y$10$QhjrM9pt8xINB25ejC9KDeTxna6M2jMi/9St/ngM9yCEUgJgvwjcG', '2016-07-15 02:46:20', 3, 3, '578878ac88e84', 1),
(13, NULL, NULL, 'liliana@egdo.com', NULL, '2016-07-15 02:46:20', 3, 3, '578878afcb1d7', 0),
(14, NULL, NULL, 'daniel@egdo.com', NULL, '2016-07-15 02:46:20', 3, 3, '578878b2dfaa7', 0);

select email, nombre from usuario where id_curso = 2;
update usuario set nombre = 'Maria'
				where email = 'maria@egdo.com' and id_curso = 2;