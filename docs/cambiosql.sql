/*ALTER TABLE `cantprosdb`.`c_relacion_registros` 
ADD COLUMN `ID_ESTATUS` TINYINT NOT NULL DEFAULT 1 AFTER `NOMBRE_RELACION`;

ALTER TABLE `cantprosdb`.`c_registros` 
ADD COLUMN `ID_PREVIO` INT NULL DEFAULT NULL AFTER `ID_INICIAL`,
ADD COLUMN `OTRO_PREVIO` VARCHAR(100) NULL DEFAULT NULL AFTER `ID_PREVIO`;

UPDATE C_RELACION_REGISTROS
SET ID_ESTATUS = 0 WHERE ID_REGISTRO = -1 AND ID_TIPO_CAMPO = 11 AND ID_OPCION_CAMPO IN (2, 5, 6);*/

/*INSERT INTO `cantprosdb`.`c_relacion_registros` (`ID_REGISTRO`, `ID_TIPO_CAMPO`, `ID_OPCION_CAMPO`, `ETIQUETA_OPCION_CAMPO`, `TIPO_RELACION`, `NOMBRE_RELACION`, `ID_ESTATUS`) 
VALUES ('-1', '77', '1', 'C&iacute;rugia', '1', 'Previo', '1');

INSERT INTO `cantprosdb`.`c_relacion_registros` (`ID_REGISTRO`, `ID_TIPO_CAMPO`, `ID_OPCION_CAMPO`, `ETIQUETA_OPCION_CAMPO`, `TIPO_RELACION`, `NOMBRE_RELACION`, `ID_ESTATUS`) 
VALUES ('-1', '77', '2', 'Radioterapia m&aacute;s bloqueo', '1', 'Previo', '1');

INSERT INTO `cantprosdb`.`c_relacion_registros` (`ID_REGISTRO`, `ID_TIPO_CAMPO`, `ID_OPCION_CAMPO`, `ETIQUETA_OPCION_CAMPO`, `TIPO_RELACION`, `NOMBRE_RELACION`, `ID_ESTATUS`) 
VALUES ('-1', '77', '3', 'Bloqueo', '1', 'Previo', '1');

INSERT INTO `cantprosdb`.`c_relacion_registros` (`ID_REGISTRO`, `ID_TIPO_CAMPO`, `ID_OPCION_CAMPO`, `ETIQUETA_OPCION_CAMPO`, `TIPO_RELACION`, `NOMBRE_RELACION`, `ID_ESTATUS`) 
VALUES ('-1', '77', '4', 'Otro', '1', 'Previo', '1');*/

