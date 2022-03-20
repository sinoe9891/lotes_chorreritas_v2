

CREATE TABLE `acceso` (
  `user_acces` varchar(25) NOT NULL,
  `login_acces` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO acceso VALUES("Webmaster","afdd63af34e36580b100d4f4752c480c","1");
INSERT INTO acceso VALUES("Webmaster","afdd63af34e36580b100d4f4752c480c","1");



CREATE TABLE `beneficiario` (
  `id_beneficiario` int(11) NOT NULL AUTO_INCREMENT,
  `id_registro` int(11) NOT NULL,
  `nombre_beneficiario` varchar(100) NOT NULL,
  `genero_beneficiario` varchar(1) NOT NULL,
  `identidad_beneficiario` varchar(15) NOT NULL,
  `direccion_beneficiario` varchar(100) NOT NULL,
  `ciudad_beneficiario` varchar(100) NOT NULL,
  `departamento_beneficiario` varchar(50) NOT NULL,
  `celular_beneficiario` varchar(20) NOT NULL,
  `pais_reside_beneficiario` varchar(50) NOT NULL,
  PRIMARY KEY (`id_beneficiario`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

INSERT INTO beneficiario VALUES("2","1","Gary Velasquez","M","0801198907280","Col. El Alamo","Tegucigalpa","Francisco Morazán","94500122","");
INSERT INTO beneficiario VALUES("6","12","Saira Milagro George Puerto","F","0801-1987-02212","Barrio Suyapita, Apartamentos Suyapita","Siguatepeque","Comayagua","95404561","");
INSERT INTO beneficiario VALUES("10","18","Edelmin Jeovany Sandoval Perez","M","0511-1975-00616","Colonia Mata desvío a Chorreritas","Siguatepeque ","Comayagua ","32752721","");
INSERT INTO beneficiario VALUES("11","19","Wendy Yamileth Enamorado","F","0318-1989-01491","Madrid","Madrid","España ","+34698-259810","");
INSERT INTO beneficiario VALUES("12","20","Lourdes Elizabeth Lazo","F","0318-1997-01048","Luciana","Luciana","ESTADOS UNIDOS DE AMERICA","+13375143646","");
INSERT INTO beneficiario VALUES("13","21","Gary Velasquez","F","0801-1990-15117","","","","","");
INSERT INTO beneficiario VALUES("14","22","","F","","","","","","");
INSERT INTO beneficiario VALUES("15","23","","F","","","","","","");
INSERT INTO beneficiario VALUES("16","24","","F","","","","","","");
INSERT INTO beneficiario VALUES("17","25","","F","","","","","","");
INSERT INTO beneficiario VALUES("18","26","","F","0000-0000-00000","","","","","");
INSERT INTO beneficiario VALUES("19","28","","F","0000-0000-00000","","","","","");
INSERT INTO beneficiario VALUES("20","29","Gary Velasquez","F","0801-1990-07280","","","","","");
INSERT INTO beneficiario VALUES("21","30","","F","","","","","","");
INSERT INTO beneficiario VALUES("22","31","ANA CADENAS SANCHEZ ","F","0606-1980-00926","Frontera El Guasaule, de la terminal de buses vieja 75 varas al norte","Guasaule","","505-85340914","Nicaragua");
INSERT INTO beneficiario VALUES("23","32","Maria F Baires","F","0318-1986-01200","Santa Martha Siguatepeque","Siguatepeque","Comayagua","3174-5295","Hoduras");
INSERT INTO beneficiario VALUES("24","33","Maria Baires","F","0000-0000-00000","","","","","");
INSERT INTO beneficiario VALUES("25","34","","F","","","","","","");
INSERT INTO beneficiario VALUES("26","35","Nohé Alexander Velásquez","M","0318-1993-00214","Barrio El Centro, contigua a clínica San Pablo","Siguatepeque","Comayagua","","");
INSERT INTO beneficiario VALUES("27","36","Gerson Edelmin Sandoval Ramirez","M","0511-2002-00040","16 hilltop Terr Gainesville Georgia 30501","Ganesville, Atlanta","Georgia","+1(678)357-1584","Estados Unidos de América");
INSERT INTO beneficiario VALUES("28","37","Kenia Suyapa Méndez Montoya","F","0801-1987-02212","Col. La Pradera","Tegucigalpa","Francisco Morazán","94500122","Honduras");



CREATE TABLE `bloques` (
  `id_bloque` int(11) NOT NULL AUTO_INCREMENT,
  `bloque` varchar(3) NOT NULL,
  `id_proyecto` int(4) NOT NULL,
  PRIMARY KEY (`id_bloque`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO bloques VALUES("1","A","1");
INSERT INTO bloques VALUES("2","B","1");
INSERT INTO bloques VALUES("3","C","1");
INSERT INTO bloques VALUES("4","D","1");
INSERT INTO bloques VALUES("5","E","1");
INSERT INTO bloques VALUES("6","F","1");
INSERT INTO bloques VALUES("7","G","1");
INSERT INTO bloques VALUES("8","H","1");



CREATE TABLE `conyugue` (
  `id_conyugue` int(11) NOT NULL AUTO_INCREMENT,
  `id_registro` int(6) NOT NULL,
  `nombre_conyugue` varchar(100) NOT NULL,
  `fechnac_conyugue` date NOT NULL,
  `identidad_conyugue` varchar(15) NOT NULL,
  `celular_conyugue` varchar(15) NOT NULL,
  `empresa_labora_conyugue` varchar(100) NOT NULL,
  `telefono_empleo_conyugue` varchar(15) NOT NULL,
  `cargo_conyugue` varchar(50) NOT NULL,
  `tiempo_laborando_conyugue` varchar(50) NOT NULL,
  PRIMARY KEY (`id_conyugue`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

INSERT INTO conyugue VALUES("15","1","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("26","12","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("32","18","Edelmin Jeovany Sandoval Perez","1975-10-10","0511-1975-00616","32752721","Ladrillera ","","Socio Propietaria","20 ");
INSERT INTO conyugue VALUES("33","19","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("34","20","Eleasar Molina","1977-10-03","1604-1976-00479","9601-9921","Ladrillera","","Socio propietario","");
INSERT INTO conyugue VALUES("35","21","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("36","22","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("37","23","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("38","24","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("39","25","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("40","26","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("41","27","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("42","28","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("43","29","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("44","30","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("45","31","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("46","32","Danny de Zorto","1982-12-12","0511-1975-00617","9414-2260","Los Robles","2233-1011","Administrador","11");
INSERT INTO conyugue VALUES("47","33","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("48","34","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("49","35","","0000-00-00","","","","","","");
INSERT INTO conyugue VALUES("50","36","Marleny Ondina Sorto Lazo","1978-08-14","0318-1978-01090","9414-2260","ladrillera ","9414-2260","Socio","20");
INSERT INTO conyugue VALUES("51","37","","0000-00-00","","","","","","");



CREATE TABLE `cuentas_bancarias` (
  `id_cuenta` int(50) NOT NULL AUTO_INCREMENT,
  `numero_cuenta` varchar(100) NOT NULL,
  `institucion_bancaria` varchar(100) NOT NULL,
  `tipo_cuenta` varchar(20) NOT NULL DEFAULT 'ahorros',
  `id_proyecto` int(4) NOT NULL,
  `nombre_cuenta_habiente` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO cuentas_bancarias VALUES("1","21-355-012481-5","BANPAIS","ahorros","1","SERVICIOS FINANCIEROS Y COMERCIALES S. DE R.L. DE C.V.");



CREATE TABLE `estado_lote` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `id_lotes` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'd',
  `id_registro` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `dia_pago` int(2) NOT NULL DEFAULT 0,
  `fecha_prima` date NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO estado_lote VALUES("1","18","v","1","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("2","19","v","2","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("3","45","v","0","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("4","46","v","0","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("5","47","v","0","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("6","48","v","0","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("7","49","v","0","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("8","50","v","0","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("9","51","v","0","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("10","52","v","0","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("11","53","v","0","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("12","43","v","0","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("13","42","v","0","0000-00-00","0","0000-00-00");
INSERT INTO estado_lote VALUES("14","41","v","0","0000-00-00","0","0000-00-00");



CREATE TABLE `ficha_compra` (
  `id_ficha_compra` int(4) NOT NULL AUTO_INCREMENT,
  `fechaSolicitud` date NOT NULL,
  `horaSolicitud` time NOT NULL,
  `id_contrato` varchar(10) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `prima` float(8,2) NOT NULL,
  `plazo_anios` int(2) NOT NULL,
  `cuota` float(8,2) NOT NULL,
  `dia_pago` int(2) NOT NULL,
  `fecha_primer_cuota` date NOT NULL,
  `plazo_meses` int(3) NOT NULL,
  `tipo` varchar(7) NOT NULL,
  `id_proyecto` int(5) NOT NULL,
  `estado` varchar(2) NOT NULL DEFAULT 'pa',
  `vendedor` int(4) NOT NULL,
  `cuenta_bancaria` int(3) NOT NULL,
  PRIMARY KEY (`id_ficha_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO ficha_compra VALUES("1","0000-00-00","00:00:00","","1","2022-03-13","0.00","10","0.00","5","2022-03-05","120","CRÉDITO","1","en","0","0");
INSERT INTO ficha_compra VALUES("5","0000-00-00","00:00:00","","31","2022-03-15","0.00","10","0.00","30","2022-03-30","120","CRÉDITO","1","pa","0","0");
INSERT INTO ficha_compra VALUES("6","0000-00-00","00:00:00","","33","2022-01-28","0.00","10","0.00","5","2022-02-05","120","CRÉDITO","1","pa","0","0");
INSERT INTO ficha_compra VALUES("7","0000-00-00","00:00:00","","35","2022-02-19","0.00","10","0.00","30","2022-02-28","120","CRÉDITO","1","pa","0","0");
INSERT INTO ficha_compra VALUES("8","2022-03-17","03:46:24","","36","2022-03-18","0.00","10","1766.44","30","2022-03-30","120","CRÉDITO","1","en","3","1");
INSERT INTO ficha_compra VALUES("9","2022-03-17","03:46:04","","37","2022-03-15","0.00","10","2203.94","30","2022-03-30","120","CRÉDITO","1","en","2","1");



CREATE TABLE `ficha_compra_lotes` (
  `id_compra_lote` int(11) NOT NULL AUTO_INCREMENT,
  `id_lote` int(5) NOT NULL,
  `id_registro` int(5) NOT NULL,
  `id_compra` int(5) NOT NULL,
  PRIMARY KEY (`id_compra_lote`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO ficha_compra_lotes VALUES("1","81","1","1");
INSERT INTO ficha_compra_lotes VALUES("2","82","1","1");
INSERT INTO ficha_compra_lotes VALUES("3","92","31","5");
INSERT INTO ficha_compra_lotes VALUES("5","85","33","6");
INSERT INTO ficha_compra_lotes VALUES("6","86","33","6");
INSERT INTO ficha_compra_lotes VALUES("7","24","35","7");
INSERT INTO ficha_compra_lotes VALUES("8","25","35","7");
INSERT INTO ficha_compra_lotes VALUES("9","26","35","7");
INSERT INTO ficha_compra_lotes VALUES("10","7","36","8");
INSERT INTO ficha_compra_lotes VALUES("11","106","37","9");



CREATE TABLE `ficha_directorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_solicitud` date NOT NULL,
  `hora_solicitud` time NOT NULL,
  `nombre_completo` varchar(150) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(50) NOT NULL DEFAULT 'hondureña',
  `identidad` varchar(15) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `estado_civil` varchar(1) NOT NULL,
  `direccion` text NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `dependientes` int(2) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `lugar_empleo` varchar(150) NOT NULL,
  `direccion_empleo` text NOT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `tiempo_laborando` varchar(30) NOT NULL,
  `telefono_empleo` varchar(15) NOT NULL,
  `estado_registro` tinyint(1) NOT NULL DEFAULT 0,
  `pais_reside` varchar(50) NOT NULL DEFAULT 'Honduras',
  `observaciones` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

INSERT INTO ficha_directorio VALUES("1","2022-03-07","13:33:13","Franklin Javier Betancourth Paz ","1999-08-24","hondureña","0505-1999-00580","M","1","Barrio Arriba, Frente al Paseo Turístico Donaldo Ernesto Reyes","Santa Barbara","Santa Barbara","","3205-0701","0","fjbp1999@gmail.com","Militar","Fuerzas Armadas de Honduras","Tegucigalpa MCD","Alferez de Fragata","5 Años","3205-0701","1","","");
INSERT INTO ficha_directorio VALUES("12","2022-03-08","14:18:54","Rosalina Puerto","1943-11-09","hondureña","0801-1943-00094","F","4","Barrio Suyapita, apartamento Suyapita","Siguatepeque","Comayagua","","95605914","0","sairageorge502@yahoo.com","Maestra Jubilada","Maestra Jubilada","Maestra Jubilada","Maestra Jubilada","","","0","","");
INSERT INTO ficha_directorio VALUES("18","2022-03-09","09:04:41","Marleny Ondina Sorto Lazo","1978-08-14","hondureña","0318-1978-01090","F","5","Colonia Mata desvió a Chorreritas frente a ladrillera","Siguatepeque ","Comayagua","","9414-2260","4","","Comerciante individual","Ladrillera ","Colonia Mata desvío a Chorreritas","Socio propietario","20","9414-2260","1","Honduras","");
INSERT INTO ficha_directorio VALUES("19","2022-03-09","09:34:36","Marina Yadith Enamorado Lazo","2001-07-05","hondureña","0318-2001-01275","F","1","Colonia Antonio Mata desvío a Chorreritas frente a Ladrillera","Siguatepeque ","Comayagua","","3227-1221","0","yadithenamorado2001@gmail.com","Bachiller Técnico profesional en Contaduría y Finanzas","Dunkin Donuts","Carretera CA5 paso ondo en gasolinera Tiki","Servicio al Clientes","3 meses","","0","","");
INSERT INTO ficha_directorio VALUES("31","2022-03-13","12:33:41","Mario Jose Rizo Cadenas","2000-02-01","hondureña","0606-2004-00853","M","1","Colonia El Álamo, casa A65 ","Tegucigalpa","Francisco Morazan","","9644-7378","0","mario44cadenas@gmail.com","","","","","","","1","Honduras","");
INSERT INTO ficha_directorio VALUES("33","2022-03-14","22:09:55","Ulisis Concepcion Marquez","0000-00-00","","0000-0000-00000","F","1","","","","","2233-1000","0","","","","","","","","1","Honduras","Información Incompleta
");
INSERT INTO ficha_directorio VALUES("35","2022-03-14","22:37:02","Dina María Romero Buezo","1987-10-10","","0312-1987-00148","F","2","Barrio El Centro, contigua a clínica San Pablo","Siguatepeque","Comayagua","","","0","","","","","","","","1","Honduras","Perfil incompleto");
INSERT INTO ficha_directorio VALUES("36","2022-03-15","13:12:42","Edelmin Jeovany Sandoval Perez","1972-10-18","hondureña","0511-1975-00616","M","5","Colonia Mata desvío a Chorreritas frente a ladrillera","Siguatepeque","Comayagua","","3275-2721","4","","Comerciante","Ladrillera","Colonia Mata desvío a Chorreritas, en esquina","Socio ","20","32752721","1","Honduras","De realizó actualización. Ya está incluida como venta.");
INSERT INTO ficha_directorio VALUES("37","2022-03-16","18:52:00","Gary Anthony Velásquez Cadenas","1990-07-20","hondureña","0801-1990-15117","M","2","Col. El Alamo, Bloque A, Casa #65","Tegucigalpa","Francisco Morazán","","","3","","Director de Cámaras ","EAP Zamorano","","","","","1","Honduras","Perfil No completo y con información errónea ");



CREATE TABLE `ficha_documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ficha` int(11) NOT NULL,
  `ruta_documentos` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `financiera` (
  `id_financiera` int(11) NOT NULL AUTO_INCREMENT,
  `id_registro` int(11) NOT NULL,
  `sueldos` float(8,2) NOT NULL,
  `remesas` float(8,2) NOT NULL,
  `otros_ingresos` float(8,2) NOT NULL,
  `prestamos` float(8,2) NOT NULL,
  `alquiler` float(8,2) NOT NULL,
  `otros_egresos` float(8,2) NOT NULL,
  PRIMARY KEY (`id_financiera`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

INSERT INTO financiera VALUES("0","21","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("14","1","19145.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("25","12","18000.00","0.00","0.00","0.00","5000.00","0.00");
INSERT INTO financiera VALUES("31","18","20000.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("32","19","10100.00","0.00","0.00","0.00","0.00","4000.00");
INSERT INTO financiera VALUES("33","20","20000.00","0.00","0.00","0.00","0.00","15000.00");
INSERT INTO financiera VALUES("35","22","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("36","23","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("37","24","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("38","25","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("39","26","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("40","27","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("41","28","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("42","29","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("43","30","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("44","31","15000.00","0.00","14000.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("45","32","10000.00","15000.00","5000.00","1000.00","5000.00","6000.00");
INSERT INTO financiera VALUES("46","33","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("47","34","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("48","35","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("49","36","0.00","0.00","0.00","0.00","0.00","0.00");
INSERT INTO financiera VALUES("50","37","0.00","0.00","0.00","0.00","0.00","0.00");



CREATE TABLE `lotes` (
  `id_lote` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(3) NOT NULL,
  `bloque` varchar(2) NOT NULL,
  `areav2` double(8,2) NOT NULL,
  `path_lote` text NOT NULL,
  `id_registro` int(3) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'd',
  `colindancias` text NOT NULL,
  `id_bloque` int(5) NOT NULL,
  PRIMARY KEY (`id_lote`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

INSERT INTO lotes VALUES("1","1","A","518.04","M1525.26,423.48l34.4-52,19.11,46.91c-1.68.19-3.15.48-4.64.51a18.42,18.42,0,0,0-6.92,1.64c-7.06,3-14.21,5.74-21.21,8.83a13.26,13.26,0,0,1-14-1.39C1529.85,426.49,1527.63,425.07,1525.26,423.48Z","0","d","7733","1");
INSERT INTO lotes VALUES("2","2","A","215.14","M1524.46,422.75a7.39,7.39,0,0,1-2.36-1.34c-4.4-2.91-8.77-5.85-13.18-8.73-1-.63-1.28-1.07-.52-2.2,5.11-7.62,10.14-15.3,15.21-23,.93-1.41,1-1.42,2.36-.5,5,3.34,10.09,6.71,15.36,10.21Z","0","d","","1");
INSERT INTO lotes VALUES("3","3","A","215.14","M1507,374.41l16.7,11.1-16.94,25.66L1490,400.08Z","0","d","","1");
INSERT INTO lotes VALUES("4","4","A","215.14","M1489.31,362.7c5.39,3.58,10.55,7.05,15.76,10.43,1.22.8.52,1.41.06,2.11l-11.86,18c-1.19,1.8-2.4,3.58-3.55,5.39-.44.69-.81.79-1.52.31q-7.35-4.92-14.75-9.77c-.86-.56-1-1-.38-1.9,2.07-3,4-6.12,6.07-9.18Z","0","d","","1");
INSERT INTO lotes VALUES("5","5","A","215.14","M1488.4,362.1l-16.85,25.53a7.29,7.29,0,0,1-1-.44q-7.27-4.83-14.54-9.68c-1.37-.91-1.39-1-.47-2.34,5.06-7.65,10.15-15.27,15.2-22.93.59-.89,1-1.22,2-.52C1477.89,355.16,1483,358.53,1488.4,362.1Z","0","r","","1");
INSERT INTO lotes VALUES("6","6","A","215.14","M1453.73,376c-2-1.33-3.94-2.59-5.86-3.87-3.19-2.11-6.36-4.26-9.58-6.33-.91-.59-1.22-1-.54-2,5.34-8,10.61-15.94,15.92-23.92.08-.12.24-.19.52-.39l4.68,3.09c3.59,2.38,7.18,4.77,10.78,7.13.67.45,1.06.83.48,1.7C1464.68,359.48,1459.26,367.66,1453.73,376Z","0","r","","1");
INSERT INTO lotes VALUES("7","7","A","282.63","M1453.06,338.75l-16.94,25.55c-6.53-4.35-12.94-8.55-19.26-12.9a46.94,46.94,0,0,1-4.72-4.27l21.25-22.06C1439.55,330.24,1446.54,334,1453.06,338.75Z","36","v","marcado con el NÚMERO 7 DEL BLOQUE LITERAL A, con una extensión superficial de 197.06 METROS CUADRADOS, EQUIVALENTES A 282.63 VARAS CUADRADAS, el que mide y limita: AL NORESTE: 11.77 metros, colinda con   LOTE A-12 ; AL SURESTE: mide 15.00 metros, colinda con LOTE A-6, AL SUROESTE, mide 13.59 metros, colinda con SEGUNDA CALLE NORTE DE POR MEDIO CON LOTE C-50 y al NOROESTE: mide 15 metros, colinda con LOTE A-8","1");
INSERT INTO lotes VALUES("8","8","A","236.65","M1395.42,330.86l21.33-22.07,15.68,15.12c.1.74-.38,1-.69,1.31q-9.52,9.93-19.08,19.83c-1.25,1.29-1.27,1.28-2.58,0Z","18","v","","1");
INSERT INTO lotes VALUES("9","9","A","294.37","M1394.22,329.68c-4.25-4.11-8.79-8.36-13.13-12.81a12.47,12.47,0,0,1-2.95-4.87,8.41,8.41,0,0,1,.49-6.26,17.81,17.81,0,0,1,4.73-5.94c3.68-2.93,7.2-6.07,10.79-9.11.66-.56,1.34-1.11,2.06-1.7,6.29,6.06,12.47,12.06,18.72,18,1,1,.65,1.5-.12,2.29-4.29,4.39-8.51,8.87-12.84,13.23C1399.55,324.92,1396.94,327.17,1394.22,329.68Z","0","v","","1");
INSERT INTO lotes VALUES("10","10","A","266.70","M1416.58,307.12l-19.38-18.68c.3-.82,1-1.14,1.49-1.59q6.75-5.75,13.5-11.47c.86-.73,1.85-1.24,2.75-1.88a9.47,9.47,0,0,1,7.32-1.29,11.09,11.09,0,0,1,5.56,3.07c3.12,2.85,6.08,5.88,9.15,8.78.77.73,1,1.21.16,2.1-6.69,6.85-13.33,13.75-20,20.63A3.23,3.23,0,0,1,1416.58,307.12Z","0","d","","1");
INSERT INTO lotes VALUES("11","11","A","225.82","M1417.49,308l21.36-22.09,12,11.58c2.43,2.36,2.43,2.37.3,4.89l-16.5,19.6c-1.18,1.39-1.22,1.39-2.51.15C1427.31,317.49,1422.5,312.83,1417.49,308Z","0","d","","1");
INSERT INTO lotes VALUES("12","12","A","234.48","M1454,300.7c5.34,4.43,11.21,7.56,16.62,11.58-2.09,3.16-4.1,6.22-6.13,9.27-3.3,5-6.63,10-9.9,15-.6.92-1,1.16-2,.48-5.09-3.45-10.24-6.81-15.35-10.23a13.74,13.74,0,0,1-2.87-2.71Z","0","d","","1");
INSERT INTO lotes VALUES("13","13","A","215.14","M1471.11,349.32l-9.07-6c-2.06-1.36-4.1-2.76-6.19-4.08-.87-.56-1.22-1-.5-2,5.29-7.88,10.51-15.8,15.75-23.71.13-.2.25-.41.42-.69l10.71,7.12c1.6,1.06,3.15,2.19,4.8,3.14,1.17.67,1.08,1.24.4,2.24-2.53,3.68-5,7.42-7.44,11.14s-5,7.58-7.55,11.36A3.45,3.45,0,0,1,1471.11,349.32Z","0","d","","1");
INSERT INTO lotes VALUES("14","14","A","213.78","M1472.23,350.07c5.71-8.59,11.26-17,16.92-25.47.67.42,1.26.76,1.83,1.14,3.59,2.38,7.19,4.76,10.77,7.16,3.18,2.13,3.51,3.84,1.43,7q-6.57,9.86-13.12,19.74c-1.06,1.6-1.08,1.6-2.67.55Z","0","d","","1");
INSERT INTO lotes VALUES("15","15","A","236.65","M1515.52,378.82l-25.63-17c3.9-5.9,7.71-11.6,11.44-17.36.68-1,1.16-.92,2-.32q11.54,7.72,23.11,15.38c.72.48,1.29.81.61,1.84C1523.23,367.08,1519.44,372.87,1515.52,378.82Z","0","v","","1");
INSERT INTO lotes VALUES("16","16","A","494.80","M1534.61,335.86c4.67,3.09,9.11,6.05,13.57,9a3.43,3.43,0,0,1,1.32,1.64c3,7.55,6.09,15.09,9.2,22.6a2.24,2.24,0,0,1-.29,2.4q-7.83,11.77-15.59,23.57c-.56.85-1,1.29-2,.56-8-5.38-16.07-10.71-24.1-16,0-.87.55-1.36.92-1.93q5.19-7.9,10.41-15.8c1.2-1.82,1.19-1.83-.68-3.07-1.46-1-2.9-2-4.39-2.9-.84-.52-1-.94-.43-1.86C1526.53,348.06,1530.48,342.07,1534.61,335.86Z","0","v","","1");
INSERT INTO lotes VALUES("17","17","B","262.85","M1546.48,339.93l-37.79-25.1c6.83-10.27,13.54-20.34,20.49-30.78a96.57,96.57,0,0,1,1,10.82,31.1,31.1,0,0,0,2.32,10.17c4.53,10.82,8.87,21.72,13.28,32.59A5.46,5.46,0,0,1,1546.48,339.93Z","0","d","","2");
INSERT INTO lotes VALUES("18","18","B","312.75","M1526.86,253.93c.72,8.91,1.43,17.83,2.21,26.73a3.88,3.88,0,0,1-.69,2.67q-9.84,14.75-19.65,29.49c-.93,1.4-1,1.41-2.36.49-4.45-2.95-8.89-5.92-13.53-9q16.85-25.38,33.56-50.58Z","0","v","","2");
INSERT INTO lotes VALUES("19","19","B","291.21","M1477,293.76c9.08-13.73,18.06-27.29,27.09-40.93a13.34,13.34,0,0,1,2.51,2.67c2.87,3.32,5.71,6.68,8.55,10,1.22,1.44,1.23,1.46.2,3q-9.93,15-19.88,29.92c-1,1.46-2,2.92-2.91,4.4-.35.55-.71.8-1.35.38C1486.48,300.09,1481.77,297,1477,293.76Z","0","v","","2");
INSERT INTO lotes VALUES("20","20","B","222.69","M1457.78,278l14.83-15.34c1.78-1.83,3.58-3.65,5.32-5.52.78-.84,1.32-1.11,2.29-.13,3.61,3.62,7.3,7.16,11,10.69a1.44,1.44,0,0,1,.26,2.22q-7.4,11.07-14.67,22.19c-.73,1.13-1.25.7-2.1.22C1468.22,288.66,1463.19,283.28,1457.78,278Z","0","v","","2");
INSERT INTO lotes VALUES("21","21","B","295.76","M1478.32,255.21l-8.3,8.56c-4,4.14-8,8.25-12,12.42-.77.81-1.27.92-2.11.09-4.1-4-8.36-7.91-12.35-12-2.63-2.72-4.17-6.05-3.27-10a11.67,11.67,0,0,1,3.8-6c4.39-4,9-7.69,13.46-11.54.7-.6,1.12-.58,1.79.06C1465.58,242.89,1471.84,248.94,1478.32,255.21Z","0","v","","2");
INSERT INTO lotes VALUES("22","22","B","314.32","M1459.53,235.51a2.3,2.3,0,0,1,1-1.24q7.38-6.28,14.78-12.55c1.41-1.19,1.44-1.19,2.56.11,8.18,9.59,16.34,19.21,24.57,28.77a1.8,1.8,0,0,1,.08,2.63c-3,4.36-5.82,8.78-8.73,13.16-.92,1.38-1,1.39-2.07.32Q1475.64,251.14,1459.53,235.51Z","0","v","","2");
INSERT INTO lotes VALUES("23","23","B","627.01","M1522.76,195c.6-.26,1.25-.91,1.35.49.43,5.72.93,11.42,1.4,17.14q1.2,14.63,2.41,29.26c0,.56,0,1.12.1,1.67.12.83,0,1.38-1,1.39-.87,0-.94.66-.8,1.38s.21,1.25.31,1.88c.47,2.55-.62,4.57-2,6.59-2.53,3.59-4.9,7.29-7.51,11.22l-39.38-46.19c1.1-.95,2.1-1.83,3.11-2.69,2.87-2.43,5.74-4.85,8.59-7.3,2.65-2.27,4.75-2.08,6.91.63.75.94,1.53,1.85,2.31,2.76,1.25,1.44,1.27,1.46,2.81.16q6.78-5.72,13.52-11.49C1517.47,199.6,1520.3,197.5,1522.76,195Z","0","d","","2");
INSERT INTO lotes VALUES("24","24","B","545.11","M1514.47,152.72c1.79,1.32,3.56,2.65,5.36,3.94a2.63,2.63,0,0,1,1.31,2.1c.8,10.54,1.62,21.08,2.57,31.61a4.08,4.08,0,0,1-1.56,4.09l-8.78,7.16-38.16-44.86,7.54-6.43q5.48-4.67,11-9.3c2.19-1.85,1.44-1.84,3.91-.11,5,3.48,9.9,7,14.85,10.53A7.62,7.62,0,0,0,1514.47,152.72Z","35","v","","2");
INSERT INTO lotes VALUES("25","25","B","215.14","M1474.39,157.45l19.73,23.19a6.32,6.32,0,0,1-1.88,1.84q-6,5.15-12,10.24c-1.26,1.07-1.31,1.07-2.39-.2q-8.85-10.38-17.68-20.78c-.57-.67-1.26-1.18-.15-2.1C1464.77,165.67,1469.48,161.62,1474.39,157.45Z","35","v","","2");
INSERT INTO lotes VALUES("26","26","B","215.14","M1478.11,194.52l-15.32,13c-6.6-7.76-13.16-15.46-19.87-23.33l15.32-13Z","35","v","","2");
INSERT INTO lotes VALUES("27","27","B","215.14","M1462,208.24l-15.16,12.88a5.17,5.17,0,0,1-1.75-1.73q-8.53-10-17-20.11c-1.17-1.39-1.17-1.42.17-2.57l13.89-11.8Z","12","v","","2");
INSERT INTO lotes VALUES("28","28","B","215.14","M1426,198.57l3.89,4.58q7.42,8.78,14.85,17.56c1.06,1.24,1,1.28-.22,2.36L1432,233.77c-1.42,1.2-1.45,1.2-2.56-.1l-17.71-20.79c-.61-.71-1.16-1.2-.09-2.09C1416.38,206.81,1421.1,202.75,1426,198.57Z","0","v","","2");
INSERT INTO lotes VALUES("29","29","B","215.14","M1394.59,225.5a14.86,14.86,0,0,1,2.69-2.48c3.81-3.27,7.65-6.52,11.48-9.79.58-.5,1-.94,1.75-.09,6.34,7.48,12.7,14.94,19.18,22.55l-15.32,13Z","0","v","","2");
INSERT INTO lotes VALUES("30","30","B","215.14","M1393.67,226.07l19.88,23.35-15.12,12.85a4,4,0,0,1-1.53-1.4q-8.72-10.22-17.41-20.44c-.53-.63-1.4-1.16-.25-2.12C1384,234.32,1388.74,230.27,1393.67,226.07Z","0","v","","2");
INSERT INTO lotes VALUES("31","31","B","215.14","M1382.09,276.17l-19.88-23.35L1377.32,240a2.8,2.8,0,0,1,1.35,1.16q8.77,10.29,17.54,20.59c1.19,1.4,1.19,1.43-.14,2.56C1391.47,268.21,1386.85,272.12,1382.09,276.17Z","0","v","","2");
INSERT INTO lotes VALUES("32","32","B","215.14","M1381.27,276.87l-15.32,13-19.88-23.36,15.32-13Z","0","v","","2");
INSERT INTO lotes VALUES("33","33","B","215.14","M1365.12,290.6c-4.91,4.17-9.68,8.18-14.38,12.27-1.13,1-1.5.07-2-.55q-7.4-8.67-14.77-17.35c-.93-1.1-1.87-2.18-2.79-3.29-1.17-1.4-1.18-1.43.15-2.57q5.19-4.44,10.41-8.86c1.15-1,2.31-1.93,3.58-3Z","0","v","","2");
INSERT INTO lotes VALUES("34","34","B","215.14","M1313.82,294,1329,281l20,23.24-15.25,13.13Z","0","v","","2");
INSERT INTO lotes VALUES("35","35","B","220.32","M1295.48,305.19c7.13-1.68,12.5-5.57,17.43-10.69L1332.85,318l-15.32,13C1310.24,322.5,1303.05,314.07,1295.48,305.19Z","0","v","","2");
INSERT INTO lotes VALUES("36","36","B","261.67","M1275.07,313.58c6.25-2.49,12.41-4.91,18.52-7.43,1.08-.44,1.45.17,2,.76l11.66,13.69,9.18,10.8c.09.71-.32.91-.6,1.15-4.38,3.73-8.78,7.44-13.14,11.2-.84.73-1.35,1-2.25-.05q-12.44-14.76-25-29.44A4.15,4.15,0,0,1,1275.07,313.58Z","0","v","","2");
INSERT INTO lotes VALUES("37","37","B","306.09","M1255,323c6.13-2.91,11.73-6.13,17.73-8.54a1.41,1.41,0,0,1,1.87.47c1,1.31,2.16,2.56,3.25,3.84l22.71,26.7-15.31,13Z","0","v","","2");
INSERT INTO lotes VALUES("38","38","B","341.60","M1284.28,359.35l-15.17,12.9L1235.79,333a2.14,2.14,0,0,1,1.18-.91c5.21-2.6,10.42-5.19,15.6-7.82.93-.48,1.56-.67,2.4.33q14.46,17.1,29,34.12A4.34,4.34,0,0,1,1284.28,359.35Z","0","d","","2");
INSERT INTO lotes VALUES("39","39","B","682.53","M1241.48,403.57a2.84,2.84,0,0,0-.43,2c.32,3.22,0,6.46.38,9.68.11.93.36,2.14-.87,2.76q-4.53-6.76-9.06-13.51a30.57,30.57,0,0,1-3-5.16c-1.5-4.79-3.44-9.42-5.22-14.11A44.59,44.59,0,0,1,1221,374c-.24-2.15.39-4.43.8-6.62,1.1-5.85.93-11.76,1.06-17.66.06-3.11.21-6.22.23-9.33a2.11,2.11,0,0,1,1.45-2.16c2.81-1.33,5.57-2.77,8.35-4.15,1.85-.92,1.55-1,2.9.59q13.32,15.72,26.66,31.41c1.6,1.89,3.15,3.82,4.82,5.65.88.95.72,1.48-.23,2.27-5.08,4.25-10.1,8.58-15.16,12.85a32,32,0,0,0-10.21,15.31A3.06,3.06,0,0,0,1241.48,403.57Z","0","d","","2");
INSERT INTO lotes VALUES("40","40","C","341.13","M1446.66,432.06,1482,455.53a4.59,4.59,0,0,1-1.9,1.05l-25.67,10.56a15.39,15.39,0,0,1-5.3,1.34,11.15,11.15,0,0,1-6.45-2.25c-4-2.57-7.87-5.19-11.78-7.8-1.43-.95-1.43-1-.4-2.53q7.47-11.28,15-22.56C1445.78,432.89,1446,432.34,1446.66,432.06Z","0","d","","3");
INSERT INTO lotes VALUES("41","41","C","215.14","M1411.82,445.77l17-25.55,16.74,11.09c-5.67,8.56-11.29,17-17,25.58Z","0","v","","3");
INSERT INTO lotes VALUES("42","42","C","215.14","M1411.16,408.53c3.57,2.35,6.89,4.55,10.21,6.75,1.67,1.1,3.34,2.19,5,3.31s1.51,1,.54,2.51l-8.47,12.78c-2.21,3.33-4.47,6.62-6.61,10-.68,1.08-1.18,1.19-2.23.47-4.69-3.18-9.43-6.29-14.16-9.41-.73-.48-1.26-.83-.59-1.84C1400.27,425,1405.63,416.87,1411.16,408.53Z","0","r","","3");
INSERT INTO lotes VALUES("43","43","C","215.14","M1393.71,396.94c5.15,3.41,10.2,6.77,15.27,10.1.83.55,1.3.93.56,2-5.35,7.95-10.61,15.95-15.91,23.93a2.57,2.57,0,0,1-.46.41l-5.74-3.8c-3.26-2.15-6.51-4.33-9.8-6.45-.89-.57-.93-1.05-.36-1.9q8-12,15.9-23.93C1393.25,397.21,1393.42,397.15,1393.71,396.94Z","0","r","","3");
INSERT INTO lotes VALUES("44","44","C","325.69","M1375.78,421.61c-10.4-5.22-17.55-13.87-25.83-21.51L1371.2,378c7,6.23,12.88,13.66,21.49,18.05Z","0","v","","3");
INSERT INTO lotes VALUES("45","45","C","236.65","M1349.19,399.34l-16-15.44q10.65-11.07,21.06-21.88c.77,0,1,.56,1.41.92,4.61,4.42,9.19,8.87,13.81,13.28.69.66,1,1.11.16,1.92C1362.84,385.13,1356.1,392.16,1349.19,399.34Z","0","v","","3");
INSERT INTO lotes VALUES("46","46","C","294.52","M1334.05,342.14l19.61,18.91L1332.59,383c-.88-.15-1.24-.83-1.73-1.3-3.81-3.64-7.57-7.33-11.4-11a11.83,11.83,0,0,1-3.48-5.62c-.56-2.35-.72-5,.89-7.34a25.75,25.75,0,0,1,4.93-5.49c3.52-2.87,6.93-5.89,10.41-8.83A4.42,4.42,0,0,1,1334.05,342.14Z","0","v","","3");
INSERT INTO lotes VALUES("47","47","C","266.85","M1375.77,338.1l-21.31,22.13-19.35-18.67c-.15-.82.49-1,.88-1.36,4.74-4.06,9.44-8.16,14.25-12.12a11.83,11.83,0,0,1,8.5-3.13,10.32,10.32,0,0,1,6.17,2.84C1368.66,331,1372.1,334.58,1375.77,338.1Z","0","v","","3");
INSERT INTO lotes VALUES("48","48","C","236.65","M1371.22,376.46c-5.42-5.24-10.64-10.27-16-15.46l21.3-22.12,7.94,7.64c2.36,2.27,4.69,4.57,7.08,6.82.7.66.91,1.12.14,1.91C1384.89,362.25,1378.14,369.27,1371.22,376.46Z","0","v","","3");
INSERT INTO lotes VALUES("49","49","C","266.71","M1393.25,355.14c5.77,5,10.24,10.95,17,14.45-2.1,3.19-4,6.1-6,9-3.39,5.12-6.81,10.22-10.15,15.38-.68,1.05-1.16,1.19-2.23.49a61.06,61.06,0,0,1-10.72-8.38c-2.91-3-6-5.88-9.16-8.91Z","0","v","","3");
INSERT INTO lotes VALUES("50","50","C","215.14","M1427.85,381.39l-17,25.63-16.75-11.12,17-25.62Z","0","r","","3");
INSERT INTO lotes VALUES("51","51","C","215.14","M1411.81,407.55,1428.74,382l16.36,10.85a.8.8,0,0,1-.11,1q-7.74,11.65-15.47,23.31c-1,1.52-1,1.52-2.51.55q-7.08-4.68-14.14-9.38C1412.54,408.14,1412.25,407.89,1411.81,407.55Z","0","r","","3");
INSERT INTO lotes VALUES("52","52","C","215.14","M1429.4,419.31l6.59-9.93c3.18-4.79,6.37-9.57,9.53-14.37.53-.8.88-1.35,2-.58,5.08,3.47,10.22,6.82,15.57,10.36l-17,25.63Z","0","v","","3");
INSERT INTO lotes VALUES("53","53","C","215.14","M1463.82,442.16c-5.37-3.56-10.47-7-15.62-10.33-1-.64-1-1.13-.38-2.08q7.73-11.53,15.34-23.14c.62-.95,1.07-1.12,2-.46,4.83,3.26,9.69,6.46,14.55,9.68.67.44,1.09.79.49,1.68C1474.78,425.66,1469.36,433.83,1463.82,442.16Z","0","v","","3");
INSERT INTO lotes VALUES("54","54","C","314.98","M1464.78,442.75c.77-1.19,1.45-2.26,2.15-3.32q6.88-10.37,13.79-20.72c1-1.52,1-1.52,2.52-.54,5.85,3.87,11.73,7.71,17.53,11.66,3.33,2.26,5.43,5.4,5.44,9.54a8.86,8.86,0,0,1-2.27,5.88,14.83,14.83,0,0,1-5.45,3.81c-4.52,1.78-9,3.64-13.49,5.53a2.45,2.45,0,0,1-2.65-.1c-5.62-3.79-11.28-7.52-16.92-11.28C1465.23,443.08,1465,442.94,1464.78,442.75Z","0","d","","3");
INSERT INTO lotes VALUES("55","55","D","322.78","M1379.92,498l-14.63,6c-4,1.67-8.12,3.31-12.15,5.05a12.72,12.72,0,0,1-13.33-1.35c-2.91-2.1-5.94-4-8.91-6.05-1.52-1-1.53-1.06-.37-2.45q8.55-10.33,17.12-20.65l3.61-4.33Z","0","r","","4");
INSERT INTO lotes VALUES("56","56","D","306.10","M1307.26,484.4c.59-.66,1-1.15,1.43-1.6q11-11.49,22-23c1.42-1.47,1.42-1.48,3-.2l16.55,13.72a3.58,3.58,0,0,1-1,1.65q-9.62,11.61-19.26,23.21c-1.56,1.89-1.15,2.06-3.32.56-5.84-4-12-7.63-17.26-12.44Z","0","r","","4");
INSERT INTO lotes VALUES("57","57","D","265.96","M1331.23,457.76l-24.74,25.78c-6.24-6.1-10.1-13.78-15.28-20.84L1319.47,444C1323.5,448.47,1327.05,453.3,1331.23,457.76Z","0","d","","4");
INSERT INTO lotes VALUES("58","58","D","228.66","M1290.68,461.76l-11-16.44c.22-.8.89-1,1.4-1.35q11.55-7.71,23.12-15.4c1.85-1.23,1.48-1.31,3,.48,3.83,4.59,7.65,9.2,11.66,14Z","0","d","","4");
INSERT INTO lotes VALUES("59","59","D","213.04","M1278.93,444.12l-10.87-16.57c.16-.7.74-.89,1.18-1.18,7.18-4.77,14.38-9.5,21.54-14.3,1-.7,1.64-.75,2.5.3,3.84,4.7,7.77,9.32,11.89,14.23C1296.49,432.51,1287.79,438.19,1278.93,444.12Z","0","d","","4");
INSERT INTO lotes VALUES("60","60","D","214.52","M1275.83,391.3l15.69,19-24.23,16.06c-2.37-3.59-5-6.81-6.83-10.52a11.07,11.07,0,0,1,2.7-13.49C1267.36,398.8,1271.45,395.13,1275.83,391.3Z","0","d","","4");
INSERT INTO lotes VALUES("61","61","D","208.85","M1292.25,409.62c-5-6.17-9.79-12.06-14.62-17.9-.8-1-.72-1.5.25-2.28,3.55-2.85,7-5.85,10.53-8.69a11.28,11.28,0,0,1,9.35-2.61,10.69,10.69,0,0,1,5,2.66c3.09,2.75,6,5.74,9.08,8.77Z","0","d","","4");
INSERT INTO lotes VALUES("62","62","D","204.84","M1312.77,390.37l14.28,13.85-21,21.72-3.14-3.73c-3-3.55-5.94-7.11-8.94-10.64-.58-.68-.87-1.17-.08-2,6.14-6.28,12.23-12.6,18.34-18.91A2.36,2.36,0,0,1,1312.77,390.37Z","0","d","","4");
INSERT INTO lotes VALUES("63","63","D","220.52","M1327.83,405l14.24,13.79c-.12.86-.78,1.26-1.26,1.76q-9.8,10.19-19.62,20.34c-.22.23-.46.44-.67.68-.5.59-1,.79-1.51,0-.14-.2-.31-.37-.46-.55-3.63-4.36-7.24-8.73-10.9-13.06-.67-.8-.85-1.28,0-2.14C1314.33,419,1321,412.05,1327.83,405Z","0","d","","4");
INSERT INTO lotes VALUES("64","64","D","236.47","M1358.3,433c-8,8.22-15.74,16.16-23.44,24.14-.87.91-1.41.88-2.33.09a33,33,0,0,1-4-4.15c-2.33-2.84-4.68-5.66-7-8.49-1.11-1.35-1.12-1.37.12-2.66q8.71-9,17.47-18.07c1.27-1.31,2.64-2.52,4.1-3.91C1347.91,424.42,1352.64,429,1358.3,433Z","0","d","","4");
INSERT INTO lotes VALUES("65","65","D","267.56","M1376,444.72l-23.88,28.67-17.48-14.51,7.27-7.49q7.93-8.17,15.87-16.35c1.4-1.43,1.42-1.43,3.1-.33Z","0","d","","4");
INSERT INTO lotes VALUES("66","66","D","268.54","M1393.51,456.73c-8.3,9.95-16.64,19.93-24.9,29.82-.72.22-1-.26-1.35-.55-4.3-3.56-8.59-7.15-12.9-10.71-1.71-1.42-1.35-1.33-.33-2.55q10.8-13,21.63-25.95c1.2-1.44,1.22-1.43,2.8-.38q6.9,4.56,13.77,9.14A2.82,2.82,0,0,1,1393.51,456.73Z","0","d","","4");
INSERT INTO lotes VALUES("67","67","D","348.52","M1369.32,487.4c1.39-1.68,2.81-3.39,4.24-5.1q9.9-11.87,19.82-23.72c1.21-1.46,1.24-1.46,2.81-.42,4.6,3,9.22,6,13.78,9.12,3.32,2.25,5.59,5.27,5.56,9.45a8.71,8.71,0,0,1-2.39,6.07,17.66,17.66,0,0,1-5.93,3.95c-8.07,3.22-16.1,6.56-24.09,10a3.12,3.12,0,0,1-3.83-.61c-2.69-2.38-5.51-4.61-8.26-6.93C1370.43,488.67,1369.68,488.3,1369.32,487.4Z","0","d","","4");
INSERT INTO lotes VALUES("68","68","E","563.10","M1312.05,520.25c-1.24,5-4.58,7.75-9.18,9.59-11.62,4.66-23.17,9.51-34.75,14.28-4.29,1.77-5.23,1.3-7-3a4.49,4.49,0,0,1,.25-3.67q4.67-11.67,9.34-23.32a8.29,8.29,0,0,0,.89-3.22c-.1-5.32,1.41-10.42,2.29-15.6.71-4.17,1.57-8.31,2.38-12.52,1-.23,1.37.64,1.9,1.12,5.49,4.89,10.95,9.82,16.42,14.73a89.62,89.62,0,0,0,11.67,9.16,12.91,12.91,0,0,1,5.81,8.16A3.71,3.71,0,0,1,1312.05,520.25Z","0","r","","5");
INSERT INTO lotes VALUES("69","69","E","645.50","M1211,544.31c2.09-1.62,4.52-1.62,7-1.62,7.34,0,14.7.4,22-.23a1.51,1.51,0,0,1,1.81,1.09,9.52,9.52,0,0,0,1.17,2.6c2.07,5.79,4.53,11.41,6.85,17.09,2.42,5.91,4.9,11.79,7.4,17.79-1.44.4-2.68-.63-4-.38a105.21,105.21,0,0,1-12.54-.72c-7.22-.89-14.49-.41-21.74-.49a13.23,13.23,0,0,1-4.87-1.07,110.08,110.08,0,0,0-10.59-3.74c-7.56-2.2-13.92-6.66-20.66-10.4-2.28-1.26-2.51-3.77-2.83-6-.15-1,1-1.36,1.81-1.59,2.08-.56,4.18-1.07,6.29-1.42a31.14,31.14,0,0,0,13.35-5.45c2.27-1.62,4.7-3,7.09-4.45A7.29,7.29,0,0,1,1211,544.31Z","0","d","","5");
INSERT INTO lotes VALUES("70","70","E","916.48","M1337.77,613.62c-6.88-5-14-9.66-20.94-14.48a9.63,9.63,0,0,0-2.16-1c-6.13-2.32-12.23-4.68-18.39-6.89-6-2.15-12.28-3.45-18.41-5.25-4.83-1.43-9.77-2.35-14.69-3.38a2.43,2.43,0,0,1-2.07-1.67c-.9-2.39-1.86-4.76-2.93-7.08-.5-1.08-.29-1.49.79-1.93,6.07-2.45,12.11-5,18.15-7.48,8.05-3.32,16.11-6.58,24.12-10a4.06,4.06,0,0,1,4.37.35c15.51,10.3,31.07,20.5,46.63,30.74.66.43,1.31.9,2,1.31s.65.83.23,1.38a8.62,8.62,0,0,0-.54.8q-7.61,11.63-15.22,23.26C1338.41,612.79,1338.06,613.22,1337.77,613.62Z","0","d","","5");
INSERT INTO lotes VALUES("71","71","E","326.98","M1335.67,573.4l-30.61-20.14a5.2,5.2,0,0,1,2.36-1.26c10.67-4.41,21.45-8.59,32-13.28,6-2.68,11.1-1.65,16,2.2.8.62,1,1.06.36,1.92-1.92,2.84-3.78,5.72-5.66,8.59q-6.37,9.71-12.74,19.4C1336.9,571.63,1336.35,572.41,1335.67,573.4Z","0","r","","5");
INSERT INTO lotes VALUES("72","72","E","262.90","M1357.31,542.49a6.64,6.64,0,0,1,2.34,1.34c4.39,2.92,8.75,5.88,13.14,8.79.91.6,1.38,1,.58,2.2-6.49,9.76-12.91,19.59-19.36,29.39a1.14,1.14,0,0,1-.86.68l-12-7.91c-1.13-.74-2.24-1.53-3.41-2.22-.91-.53-1-1-.37-1.89,3.2-4.77,6.33-9.59,9.48-14.4Z","0","v","","5");
INSERT INTO lotes VALUES("73","73","E","262.90","M1354.47,585.48c6.79-10.33,13.6-20.72,20.31-30.93a.81.81,0,0,1,1,.1q7.31,4.8,14.59,9.6c1.41.93,1.42,1,.53,2.33q-9.48,14.38-19,28.76c-.5.76-.8,1.49-2,.7-5-3.4-10.1-6.7-15.15-10C1354.75,585.92,1354.68,585.76,1354.47,585.48Z","0","v","","5");
INSERT INTO lotes VALUES("74","74","E","262.90","M1372,597.29l20.67-31.35a6.35,6.35,0,0,1,2.15,1.19c4.48,2.93,8.94,5.89,13.43,8.79,1,.63,1.34,1.06.57,2.21q-9.63,14.45-19.14,29c-.6.92-1,1.16-2.05.47C1382.51,604.17,1377.36,600.82,1372,597.29Z","0","v","","5");
INSERT INTO lotes VALUES("75","75","E","263.53","M1410.48,577.45c3.69,2.42,7.22,4.73,10.75,7.06,2.46,1.63,5,3.21,7.36,4.93,4.14,3,3.49,8.12,1,11a8,8,0,0,1-3.14,2.14c-9.14,3.78-18.29,7.53-27.43,11.32a1.82,1.82,0,0,1-2-.07c-2.36-1.62-4.77-3.17-7.35-4.87Z","0","v","","5");
INSERT INTO lotes VALUES("76","76","E","670.46","M1358.84,589.93l22.72,14.93c4.8,3.16,9.59,6.34,14.4,9.47a5.07,5.07,0,0,1,2.1,2.48c2.63,6.51,5.34,13,8,19.46.68,1.66.66,1.69-1,2.38-5.23,2.16-10.47,4.29-15.69,6.48-1,.4-1.77.68-2.57-.26a4.07,4.07,0,0,0-1.88-1c-1.65-.59-3.27-1.29-4.94-1.8-8.68-2.67-16.59-7-24.4-11.46a9,9,0,0,1-1.73-1.27c-4-3.8-7.93-7.65-11.93-11.43-.81-.77-1.08-1.29-.36-2.36,5.49-8.23,10.9-16.52,16.34-24.78A1.58,1.58,0,0,1,1358.84,589.93Z","0","d","","5");
INSERT INTO lotes VALUES("77","77","E","449.93","M1414.77,674.7c-2-3.07-3.89-5.93-5.73-8.82a14.27,14.27,0,0,0-2.46-2.91c-5-4.58-10-9.18-15.09-13.84a4.4,4.4,0,0,1,2.28-1.27l30.1-12.41c1.9-.78,1.89-.78,1.13-2.67-.59-1.48-1.22-2.95-1.75-4.45a3.63,3.63,0,0,1,1.89-4.81c4.17-2.24,4.17-2.24,5.95,2.08,4.25,10.33,8.53,20.66,12.76,31,1.05,2.57,1.32,2.15-1.3,3.06-3.39,1.17-6.79,2.33-10.21,3.41a12.45,12.45,0,0,0-3.39,1.72C1424.31,668.05,1419.65,671.29,1414.77,674.7Z","0","v","","5");
INSERT INTO lotes VALUES("78","78","E","284.95","M1430.74,621.21l18.3-7.53c1.58,3.82,3.09,7.5,4.61,11.18q5.25,12.71,10.5,25.43c.7,1.69,1,1.78-1,2.46q-7.95,2.61-15.87,5.34c-1,.36-1.51.35-2-.79-4.84-11.89-9.74-23.76-14.61-35.63C1430.64,621.61,1430.69,621.51,1430.74,621.21Z","0","v","","5");
INSERT INTO lotes VALUES("79","79","E","332.19","M1503.92,639.09l-27.54,9.23c-3,1-5.9,2-8.86,2.95-1.56.52-1.59.51-2.22-1q-4.17-10.07-8.32-20.13-3.15-7.64-6.29-15.28c-.64-1.55-.61-1.55.89-2.22,3.05-1.36,6.14-2.24,9.52-1.24a13,13,0,0,1,3.45,1.63q19.23,12.62,38.44,25.28A10.78,10.78,0,0,1,1503.92,639.09Z","0","v","","5");
INSERT INTO lotes VALUES("80","80","F","289.67","M1598.4,439.25c3,11.14,6.16,22.27,10.88,32.86,1.32,3,2.42,6,3.68,9.2a2.17,2.17,0,0,1-1.63-.66q-18.64-12.39-37.29-24.77a9.55,9.55,0,0,1-4.45-5.69c-.67-5.66,1.78-8.95,7.37-9.78s11.53-1.15,17.29-1.71A8.25,8.25,0,0,1,1598.4,439.25Z","0","d","","6");
INSERT INTO lotes VALUES("81","81","G","236.05","M1533,488.05l-26.78-17.78a3.13,3.13,0,0,1,1.71-1l25.86-10.73a15.94,15.94,0,0,1,4.38-1.16,9.9,9.9,0,0,1,6.38,1.59c1.76,1.1,3.46,2.28,5.39,3.56Z","1","v","AL NORESTE: mide 4.96 metros, colinda CON 2da CALLE SUR  DE POR MEDIO CON LOTE A-1; AL SURESTE: mide 15.00 metros, colinda CON LOTE G-82, AL SUROESTE, mide 16.12 metros, colinda CON LOTE G-90 y 7.12 metros colinda CON LOTE G-91 y al NOROESTE: mide 15.43 metros, colinda CON 1ra AVENIDA DE POR MEDIO CON LOTE C-54","7");
INSERT INTO lotes VALUES("82","82","G","193.63","M1565.86,473.09l-17,25.48c-4.77-3.17-9.4-6.27-14.07-9.32-1.14-.75-.39-1.35,0-2,3.16-4.8,6.35-9.58,9.53-14.37,1.76-2.66,3.51-5.34,5.31-8,.38-.57.62-1.3,1.46-1.7Z","1","v","","7");
INSERT INTO lotes VALUES("83","83","G","193.63","M1566.93,473.79l14.72,9.8c-5.64,8.53-11.21,17-16.88,25.56-4.83-3.21-9.52-6.33-14.23-9.43-.59-.39-.73-.79-.27-1.36.1-.12.17-.27.26-.4l15.84-23.68A3.82,3.82,0,0,1,1566.93,473.79Z","0","v","","7");
INSERT INTO lotes VALUES("84","84","G","231.01","M1582.64,484.24c1.86,1.24,3.55,2.3,5.18,3.46,1.91,1.36,2.24,3,1,5-.72,1.23-1.56,2.41-2.35,3.61-1.45,2.22-1.45,2.22.67,3.64,3.59,2.39,7.18,4.77,10.77,7.18a5,5,0,0,1,1.73,1.41L1589,524.77c-.7.19-1-.23-1.39-.47-6.86-4.54-13.71-9.11-20.58-13.63-1-.63-1.32-1.05-.55-2.19,5.21-7.76,10.33-15.58,15.49-23.37C1582.11,484.85,1582.33,484.63,1582.64,484.24Z","0","v","","7");
INSERT INTO lotes VALUES("85","85","G","231.63","M1589.65,525.66,1613,490.47a2.08,2.08,0,0,1,.8,1.31c2.41,7.52,4.79,15.06,7.27,22.56a2.41,2.41,0,0,1-.7,2.9c-5.32,5.31-10.55,10.71-15.83,16.06-1.54,1.56-1.11,1.49-2.9.32C1597.66,531,1593.76,528.4,1589.65,525.66Z","33","v","","7");
INSERT INTO lotes VALUES("86","86","G","242.58","M1580.91,521.17l21.16,14c.1.72-.44,1-.8,1.38-6.55,6.67-13.13,13.31-19.65,20-.87.89-1.46,1-2.55.3-4.94-3.38-9.94-6.66-15.09-10.08Z","33","v","","7");
INSERT INTO lotes VALUES("87","87","G","193.63","M1565.06,510.65c4.77,3.16,9.41,6.26,14.08,9.31,1.13.74.4,1.35,0,2q-4.87,7.41-9.77,14.78l-6.3,9.52-15-10Z","0","d","","7");
INSERT INTO lotes VALUES("88","88","G","193.63","M1532.19,525.72l16.94-25.65c4.78,3.17,9.41,6.28,14.07,9.31,1.25.81.45,1.45,0,2.13q-6.83,10.28-13.66,20.53l-2.39,3.59Z","0","v","","7");
INSERT INTO lotes VALUES("89","89","G","193.63","M1533.27,489.54l15,9.93-16.93,25.64-15-10Z","0","v","","7");
INSERT INTO lotes VALUES("90","90","G","193.63","M1532.38,488.94l-17,25.6-14.94-9.95,17-25.59Z","0","v","","7");
INSERT INTO lotes VALUES("91","91","G","232.09","M1516.5,478.4l-17,25.6c-3.8-2.52-7.47-5-11.2-7.4a30.28,30.28,0,0,1-4.38-3.68c-2-1.93-2.67-7.91-1.25-10.36a12.39,12.39,0,0,1,5.92-5.32c4.88-2.16,9.86-4.11,14.79-6.16a2.09,2.09,0,0,1,2.23.09C1509.18,473.58,1512.77,475.93,1516.5,478.4Z","0","v","","7");
INSERT INTO lotes VALUES("92","92","H","319.08","M1409.66,510a4,4,0,0,1,2-1.12c10.39-4.31,20.8-8.54,31.17-12.89,4.43-1.86,8.54-1.57,12.44,1.23a60.1,60.1,0,0,1,5.75,4c-6.57,9.91-13.1,19.74-19.73,29.72Z","0","v","","8");
INSERT INTO lotes VALUES("93","93","H","224.51","M1457.13,541.48l-15-9.93,19.69-29.67a12.5,12.5,0,0,1,3.2,1.88c3.6,2.35,7.17,4.77,10.78,7.12.86.57.94,1,.36,1.89C1469.86,522.25,1463.57,531.76,1457.13,541.48Z","0","v","","8");
INSERT INTO lotes VALUES("94","94","H","224.51","M1472.9,551.94l-14.62-9.7a2.39,2.39,0,0,1,.7-1.61q8.79-13.27,17.6-26.52c1.33-2,1-2.06,3.2-.58q5.87,3.91,11.76,7.8c.87.56,1.24.94.51,2-6.28,9.33-12.48,18.71-18.71,28.08A4.82,4.82,0,0,1,1472.9,551.94Z","0","v","","8");
INSERT INTO lotes VALUES("95","95","H","224.51","M1488.93,562.56c-4.75-3.15-9.25-6.17-13.8-9.12-.92-.6-1.17-1-.49-2.05q9.18-13.73,18.29-27.5c.55-.84,1-1,1.89-.4,4.23,2.86,8.5,5.67,12.76,8.47.68.45,1.05.81.47,1.69C1501.7,543.21,1495.38,552.8,1488.93,562.56Z","0","v","","8");
INSERT INTO lotes VALUES("96","96","H","224.51","M1524.59,543.29l-19.81,29.77c-4.76-3.15-9.32-6.22-13.94-9.19-1.2-.77-.6-1.36-.11-2.1q5.94-9,11.88-18l6.18-9.39c.43-.66.82-1.11,1.7-.51C1515.11,537,1519.77,540.08,1524.59,543.29Z","0","v","","8");
INSERT INTO lotes VALUES("97","97","H","224.51","M1540.44,553.8c-1.7,2.58-3.27,5-4.85,7.35-4.66,7.05-9.34,14.09-14,21.17-.66,1-1.13,1.23-2.2.5q-6.23-4.26-12.56-8.33c-1-.64-1.06-1.1-.42-2q9.12-13.61,18.16-27.28c.56-.85,1-1.28,2-.55C1531.12,547.67,1535.66,550.63,1540.44,553.8Z","0","v","","8");
INSERT INTO lotes VALUES("98","98","H","269.31","M1558.74,579c-2.49,2.56-4.9,5.19-7.48,7.66-3.23,3.08-6.61,6-9.89,9-.65.6-1.14.92-2,.32-5.82-3.92-11.68-7.78-17.47-11.63,0-.82.49-1.25.83-1.76q8.68-13.18,17.4-26.36a5.48,5.48,0,0,0,.38-.6c.56-1.2,1.24-1.1,2.22-.4,2.15,1.52,4.4,2.89,6.56,4.39,2.91,2,3.08,4,.6,6.47-.9.9-1.87,1.74-2.78,2.64-1.27,1.26-1.29,1.31.15,2.28,3.18,2.13,6.39,4.22,9.57,6.35A5.13,5.13,0,0,1,1558.74,579Z","0","v","","8");
INSERT INTO lotes VALUES("99","99","H","208.53","M1501.41,614.56l3.25-4.89q7.71-11.55,15.42-23.11c.92-1.39,1-1.41,2.35-.5l16.74,11.09a.8.8,0,0,1-.37.85c-2.56,1.82-4,4.45-5.38,7.19-1.94,3.85-4,7.64-6,11.45-.3.55-.63,1.08-1,1.79l-7.65-5c-1.66-1.1-3.32-2.22-5-3.31s-1.64-1.07-3,.23-2.74,2.68-4.16,4C1504.74,615.93,1504,616,1501.41,614.56Z","0","v","","8");
INSERT INTO lotes VALUES("100","100","H","222.40","M1505.08,574.56c4.81,3.19,9.46,6.28,14.13,9.35.68.45.83.88.32,1.54-.3.38-.54.79-.81,1.19q-8.43,12.66-16.88,25.32a6.43,6.43,0,0,1-1.54,1.94l-14.85-9.78Z","0","v","","8");
INSERT INTO lotes VALUES("101","101","H","222.87","M1489.34,564.14c4.63,3.06,9.2,6.13,13.83,9.11,1.2.77.6,1.37.11,2.11q-7,10.57-14.07,21.15c-1.51,2.26-3,4.52-4.47,6.73-.85.13-1.27-.43-1.78-.76-4.08-2.65-8.13-5.36-12.23-8-.94-.61-1.09-1.06-.42-2.06q9.21-13.73,18.34-27.52A8.45,8.45,0,0,1,1489.34,564.14Z","0","v","","8");
INSERT INTO lotes VALUES("102","102","H","223.34","M1468.48,592.89c-.38-.21-.73-.39-1.06-.61-4.21-2.75-8.39-5.54-12.62-8.26-1-.63-1-1.12-.38-2.07q9-13.55,18-27.16c.68-1,1.16-1.19,2.22-.47q6.12,4.2,12.38,8.2c1,.66,1.27,1.09.52,2.21-6,8.94-12,17.93-17.93,26.89A3.48,3.48,0,0,1,1468.48,592.89Z","0","v","","8");
INSERT INTO lotes VALUES("103","103","H","223.81","M1437.68,572.74l7.58-11.41q5.61-8.48,11.24-17c.92-1.39,1-1.39,2.36-.47,4.45,2.94,8.88,5.9,13.52,9l-19.66,29.71Z","0","v","","8");
INSERT INTO lotes VALUES("104","104","H","224.28","M1436.79,572.14l-15-9.88,5.75-8.65q6.56-9.87,13.1-19.73c.94-1.41,1-1.41,2.34-.51q6.19,4.08,12.36,8.2c.39.26.86.46,1.06,1Z","0","v","","8");
INSERT INTO lotes VALUES("105","105","H","224.75","M1405.78,551.75l5.82-8.76c4.28-6.45,8.54-12.9,12.84-19.33,1.11-1.68.76-2.09,3-.55,3.7,2.49,7.45,4.93,11.16,7.41a5.7,5.7,0,0,1,1.91,1.51q-7.33,11.06-14.69,22.11c-1.45,2.19-2.92,4.38-4.35,6.58-.4.62-.73.92-1.5.41C1415.36,558,1410.7,555,1405.78,551.75Z","0","v","","8");
INSERT INTO lotes VALUES("106","106","H","352.63","M1404.89,551.15c-2.22-1.44-4.29-2.78-6.35-4.14-4.06-2.69-8.18-5.29-12.16-8.1a11.22,11.22,0,0,1-4.84-11,11.37,11.37,0,0,1,5.47-8.56,15.35,15.35,0,0,1,2.55-1.31c5.67-2.36,11.36-4.67,17-7a2.41,2.41,0,0,1,2.64,0c5,3.36,10,6.63,15,9.94.13.09.19.25.41.54Z","37","v","","8");



CREATE TABLE `main_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_name` varchar(50) NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO main_users VALUES("22","Carlos Zorto","carlos.zorto@yahoo.com","$2y$12$ccjxu12L9JVcqbykJpdHNeyOeBQ6CRJKoIo0RSiL/j8QqgwVW2wU2","");
INSERT INTO main_users VALUES("23","Shirley Velásquez","shirleyvelasque7991@gmail.com","$2y$12$haqWOdQzdbzzXphM.d9sb.QripwFpnBMA5Nq/fT3x3uGBMt5vcpOi","");
INSERT INTO main_users VALUES("24","Shirley Velásquez","shirleyvelasque7991@gmail.com","$2y$12$yXD/WJTa.CFAWj6CF5Scj.acatixOMFvYkLB6Cx.jCDWCiXCjl5ua","");
INSERT INTO main_users VALUES("25","Erika Mondragon","erika@sefinco.com","$2y$12$jJnwgFAhbXPxXQQDD3RobuqVKKj6nnS73d5oaxsEays45MidpFPM6","");
INSERT INTO main_users VALUES("26","María José Baires","mbaires@sefinco.com","$2y$12$PFj2X7RTc8CX9lcaDPmrGOHRtSsGKVAnd8Oubqf9h99x8R4qsQWIq","");
INSERT INTO main_users VALUES("27","María Fernanda Baires","mfbaires@sefinco.com","$2y$12$SFFCiFkeM8WJ9OFXAnIuV.szI8GBRGHATlXntPy8l3JXEElcd20eK","");



CREATE TABLE `proyectos` (
  `id_proyecto` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `dirección` varchar(100) NOT NULL,
  `coordenadas` varchar(20) NOT NULL,
  `id_sucursal` int(3) NOT NULL,
  `area_total` double(10,2) NOT NULL,
  `estado` varchar(1) NOT NULL DEFAULT 'v',
  `matricula` varchar(100) NOT NULL,
  `asiento` varchar(50) NOT NULL,
  `partida_electronica` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `colindancias` text NOT NULL,
  `norte_noreste` text NOT NULL,
  `este_sureste` text NOT NULL,
  `sur_sureste` text NOT NULL,
  `oeste_noreste` text NOT NULL,
  `imagen` text NOT NULL,
  PRIMARY KEY (`id_proyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO proyectos VALUES("1","CHORRERITAS","COLONIA ANTONIO MATA","","1","29469.35","v","1529511","1","","Honduras","Comayagua","Siguatepeque","","","","","","");
INSERT INTO proyectos VALUES("2","CALANTERIQUE","Por Santa Martha","","1","0.00","v","","","","","","","","","","","","");



CREATE TABLE `proyectos_ajustes` (
  `id` int(4) NOT NULL,
  `id_proyecto` int(4) NOT NULL,
  `moneda` varchar(20) NOT NULL,
  `tasa_anual` double(8,2) NOT NULL,
  `precio_vara2` double(8,2) NOT NULL,
  `contrato_correlativo` int(10) NOT NULL,
  `recibo_correlativo` int(10) NOT NULL,
  `inflacion_anual` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO proyectos_ajustes VALUES("0","1","LEMPIRAS","0.00","750.00","0","0","0.00");
INSERT INTO proyectos_ajustes VALUES("0","1","LEMPIRAS","0.00","750.00","0","0","0.00");



CREATE TABLE `referencias` (
  `id_referencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_registro` int(6) NOT NULL,
  `nombre_referencia` varchar(100) NOT NULL,
  `direccion_referencia` varchar(100) NOT NULL,
  `celular_referencia` varchar(15) NOT NULL,
  `telefono_referencia` varchar(15) NOT NULL,
  `empresa_labora_referencia` varchar(100) NOT NULL,
  `telefono_empleo_referencia` varchar(15) NOT NULL,
  PRIMARY KEY (`id_referencia`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4;

INSERT INTO referencias VALUES("27","1","Rigoberto  Galvez Alvarado","Santa Rita, Yoro","96074111","","","");
INSERT INTO referencias VALUES("28","1","Angelica Maria Velasquez Sanchez ","Valle de Ángeles, Francisco Morazán ","32696996","","","");
INSERT INTO referencias VALUES("49","12","Norma Yolanda George Puerto","Barrio Suyapita, Apartamentos Suyapita","98438873","","Escuela Ester Gumper, Yoro, Yoro","");
INSERT INTO referencias VALUES("50","12","Mario Alberto Melendez George","Trujillo","96207159","","Ejercito de Honduras","");
INSERT INTO referencias VALUES("61","18","Clemencia Lazo","Colonia Mata desvío a Chorreritas","96997413","","Ladrillera ","");
INSERT INTO referencias VALUES("62","18","José Amilcar Enamorado Pineda","Colonia Mata desvío a Chorreritas","9595-9873","","Agrovida de Honduras","");
INSERT INTO referencias VALUES("63","19","Edelmin Jeovany Sandoval","Colonia Mata","9414-2262","","Ladrillera Colonia Mata","");
INSERT INTO referencias VALUES("64","19","Edy Misael Barahona","Barrio San Ramon","9860-3856","","","");
INSERT INTO referencias VALUES("87","31","Sandra Lizeth Merlo Varela","Frontera el Guasaule, contiguo a la caseta de migracion","50585353625","","","");
INSERT INTO referencias VALUES("88","31","Norvin Javier Meza","Frontera el Guasaule, frente a la parada de taxis de somotillo.","50584175000","","","");
INSERT INTO referencias VALUES("91","33","","","","","","");
INSERT INTO referencias VALUES("92","33","","","","","","");
INSERT INTO referencias VALUES("97","36","Clemencia Lazo","Colonia Mata desvío a Chorreritas","96997413","","Ladrillera ","");
INSERT INTO referencias VALUES("98","36","José Amilcar Enamorado Pineda","Colonia Mata desvío a Chorreritas","9595-9873","","","");
INSERT INTO referencias VALUES("99","37","","","","","","");
INSERT INTO referencias VALUES("100","37","","","","","","");



CREATE TABLE `vendedores` (
  `id_vendedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_vendedor` varchar(100) NOT NULL,
  `sucursal` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  PRIMARY KEY (`id_vendedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO vendedores VALUES("1","MARÍA FERNANDA BAIRES MONDRAGON","1","3174-5295");
INSERT INTO vendedores VALUES("2","MARIA JOSE BAIRES MONDRAGON","","3375-8070");
INSERT INTO vendedores VALUES("3","CARLOS ZORTO","1","3173-0767");

