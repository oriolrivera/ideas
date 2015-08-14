CREATE TABLE IF NOT EXISTS `marcador` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `src` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;