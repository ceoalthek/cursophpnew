USE TEST;

DROP TABLE IF EXISTS registros_e;

CREATE TABLE registros_e (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  nombre varchar(255) DEFAULT NULL,
				  paterno varchar(255) DEFAULT NULL,
				  materno varchar(255) DEFAULT NULL,
				  imagen varchar(255) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `registros_e` VALUES ('1', 'enrique', 'acevedo', 'catalan', 'imagen1.png'), ('2', 'Simon', 'Hernandez', 'Granados', 'imagen2.png'), ('3', 'Eniek', 'Leon', 'Vergara', null), ('4', 'Rosario', 'Rocha', '', null), ('5', 'Irvign', 'Rodriguez', 'Ozuna', null), ('6', 'Oscar', null, null, null);