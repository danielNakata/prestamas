SELECT a.idprestamo AS idprestamo
	,a.idcliente AS idcliente
	,a.idusuario AS idusuario
	,a.fechainicio AS fechainicio
	,a.fechafin AS fechafin
	,a.montoprestado AS montoprestado
	,a.montopagar AS montopagar
	,a.montointeres AS montointeres
	,a.pctginteres AS pctginteres
	,a.idtipoplazo AS idtipoplazo
	,a.montoplazo AS montoplazo
	,a.regargosplazo AS recargosplazo
	,a.pctgrecargoplazo AS pctgrecargoplazo
	,a.totalplazos AS totalplazos
	,a.restanplazos AS restanplazos
	,a.montopagado AS montopagado
	,a.montorestante AS montorestante
	,a.comentarios AS comentarios
	,a.fechareg AS fechareg
	,a.fechamod AS fechamod
FROM tprestamos a



SELECT a.idtipopago AS idtipopago
	,a.tipopago AS tipopago
	,a.pagosporannio AS pagosporannio
	,a.esactivo AS esactivo
	,a.fechareg AS fechareg
FROM tcatitpopagos a
ORDER BY a.idtipopago ASC;

SELECT a.idestatususr AS idestatususr
	,a.estatususr AS estatususr
	,a.fechareg AS fechareg
FROM tcatestatususuarios a
ORDER BY a.idestatususr ASC;

SELECT a.idestatusprestamos AS idestatusprestamos
	,a.estatusprestamos AS estatusprestamos
FROM tcatestatusprestamos a
ORDER BY a.idestatusprestamos ASC;

SELECT a.idestatusclientes AS idestatusclientes
	,a.estatuscliente AS estatuscliente
FROM tcatestatusclientes a
ORDER BY a.idestatusclientes;




SELECT a.idcliente AS idcliente ,IFNULL(a.nombre,'-') AS nombre ,IFNULL(a.apellidos,'-') AS apellidos ,IFNULL(a.fechanac,'1990-01-01') AS fechanac ,IFNULL(a.email,'-') AS email ,IFNULL(a.telefono1,'(00) 1234 5678') AS telefono1 ,IFNULL(a.telefono2,'(00) 1234 5678') AS telefono2 ,IFNULL(a.calle, '-') AS calle ,IFNULL(a.numext, '-') AS numext ,IFNULL(a.numint, '-') AS numint ,IFNULL(a.delmun, '-') AS delmun ,IFNULL(a.estado, '-') AS estado ,IFNULL(a.pais, '-') AS pais ,IFNULL(a.codpost, '00000') AS codpost ,a.idestatus AS idestatus ,IFNULL(a.montototal, 0) AS montototal ,IFNULL(a.montoplazo, 0) AS montoplazo ,IFNULL(a.numplazo, 0) AS numplazo ,a.idtipoprestamo AS idtipoprestamo ,IFNULL(a.interesprestamo, 0) AS interesprestamo ,IFNULL(a.fechaultimoprestamo,'0000-00-00 00:00:00') AS fechaultimoprestamo ,IFNULL(a.numprestamos, 0) AS numprestamos ,a.idestatusprestamo AS idestatusprestamo ,a.idusuario AS idusuario ,a.fechareg AS fechareg ,IFNULL(a.fechamod, '0000-00-00 00:00:00') AS fechamod ,b.estatuscliente AS estatuscliente ,c.estatusprestamos AS estatusprestamos FROM tclientes a INNER JOIN tcatestatusclientes b ON a.idestatus = b.idestatusclientes INNER JOIN tcatestatusprestamos c ON a.idestatusprestamo = c.idestatusprestamos WHERE a.idusuario = 1 ORDER BY a.idestatus ASC, a.idcliente ASC



SELECT a.idcliente AS idcliente
	,IFNULL(a.nombre,'-') AS nombre
	,IFNULL(a.apellidos,'-') AS apellidos
	,IFNULL(a.fechanac,'1990-01-01') AS fechanac
	,IFNULL(a.email,'-') AS email
	,IFNULL(a.telefono1,'(00) 1234 5678') AS telefono1
	,IFNULL(a.telefono2,'(00) 1234 5678') AS telefono2
	,IFNULL(a.calle, '-') AS calle
	,IFNULL(a.numext, '-') AS numext
	,IFNULL(a.numint, '-') AS numint
	,IFNULL(a.delmun, '-') AS delmun
	,IFNULL(a.estado, '-') AS estado
	,IFNULL(a.pais, '-') AS pais
	,IFNULL(a.codpost, '00000') AS codpost
	,a.idestatus AS idestatus
	,IFNULL(a.montototal, 0) AS montototal
	,IFNULL(a.montoplazo, 0) AS montoplazo
	,IFNULL(a.numplazo, 0) AS numplazo
	,a.idtipoprestamo AS idtipoprestamo
	,IFNULL(a.interesprestamo, 0) AS interesprestamo
	,IFNULL(a.fechaultimoprestamo,'0000-00-00 00:00:00') AS fechaultimoprestamo
	,IFNULL(a.numprestamos, 0) AS numprestamos
	,a.idestatusprestamo AS idestatusprestamo
	,a.idusuario AS idusuario
	,a.fechareg AS fechareg
	,IFNULL(a.fechamod, '0000-00-00 00:00:00') AS fechamod
	,b.estatuscliente AS estatuscliente
	,c.estatusprestamos AS estatusprestamos
FROM tclientes a
INNER JOIN tcatestatusclientes b ON a.idestatus = b.idestatusclientes
INNER JOIN tcatestatusprestamos c ON a.idestatusprestamo = c.idestatusprestamos
WHERE a.idusuario = 1;


SELECT PASSWORD('adminadmin');
SELECT COUNT(*) AS existe FROM webcommerce.tusuarios WHERE email = 'danielnakata@gmail.com' AND contrasena= PASSWORD('adminadmin'); 
SELECT a.idusuario AS idusuario, IFNULL(a.email,'-') AS email, PASSWORD(IFNULL(a.contrasena,'-')) AS contrasena
	, IFNULL(a.nickname,'-') AS nickname, IFNULL(a.nombre,'-') AS nombre
	, IFNULL(a.apellidos,'-') AS apellidos, IFNULL(a.fechanac,'1990-01-01') AS fechanac
	, IFNULL(a.movil,'(00) 1234 5678') AS movil, IFNULL(a.idestatus,0) AS idestatus
	, IFNULL(a.fechaultimoacc, '0000-00-00 00:00:00') AS fechaultimoacc, IFNULL(a.lugarultimoacc,'-') AS lugarultimoacc
	, IFNULL(a.fechareg, '0000-00-00 00:00:00') AS fechareg, IFNULL(a.fechamod,'0000-00-00 00:00:00') AS fechamod
	, IFNULL(a.comentarios,'-') AS comentarios
	, IFNULL(b.idestatususr,0) AS idestatususr
	, IFNULL(b.estatususr,'-') AS estatususr
FROM tusuarios a
INNER JOIN tcatestatususuarios b ON a.idestatus = b.idestatususr
WHERE email = "danielnakata@gmail.com";
	
UPDATE tusuarios SET contrasena = '*514FC2971F3E94BB16F25C396219DFDF01D02443' WHERE idusuario = 1;


SELECT a.idcliente AS idcliente
	,IFNULL(a.nombre,'-') AS nombre
	,IFNULL(a.apellidos,'-') AS apellidos
	,IFNULL(a.fechanac,'1990-01-01') AS fechanac
	,IFNULL(a.email,'-') AS email
	,IFNULL(a.telefono1,'(00) 1234 5678') AS telefono1
	,IFNULL(a.telefono2,'(00) 1234 5678') AS telefono2
	,IFNULL(a.calle, '-') AS calle
	,IFNULL(a.numext, '-') AS numext
	,IFNULL(a.numint, '-') AS numint
	,IFNULL(a.delmun, '-') AS delmun
	,IFNULL(a.estado, '-') AS estado
	,IFNULL(a.pais, '-') AS pais
	,IFNULL(a.codpost, '00000') AS codpost
	,a.idestatus AS idestatus
	,IFNULL(a.montototal, 0) AS montototal
	,IFNULL(a.montoplazo, 0) AS montoplazo
	,IFNULL(a.numplazo, 0) AS numplazo
	,a.idtipoprestamo AS idtipoprestamo
	,IFNULL(a.interesprestamo, 0) AS interesprestamo
	,IFNULL(a.fechaultimoprestamo,'0000-00-00 00:00:00') AS fechaultimoprestamo
	,IFNULL(a.numprestamos, 0) AS numprestamos
	,a.idestatusprestamo AS idestatusprestamo
	,a.idusuario AS idusuario
	,a.fechareg AS fechareg
	,IFNULL(a.fechamod, '0000-00-00 00:00:00') AS fechamod
	,b.estatuscliente AS estatuscliente
	,c.estatusprestamos AS estatusprestamos
FROM tclientes a
INNER JOIN tcatestatusclientes b ON a.idestatus = b.idestatusclientes
INNER JOIN tcatestatusprestamos c ON a.idestatusprestamo = c.idestatusprestamos
WHERE a.idusuario = 1;


SELECT PASSWORD('adminadmin');
SELECT COUNT(*) AS existe FROM webcommerce.tusuarios WHERE email = 'danielnakata@gmail.com' AND contrasena= PASSWORD('adminadmin'); 
SELECT a.idusuario AS idusuario, IFNULL(a.email,'-') AS email, PASSWORD(IFNULL(a.contrasena,'-')) AS contrasena
	, IFNULL(a.nickname,'-') AS nickname, IFNULL(a.nombre,'-') AS nombre
	, IFNULL(a.apellidos,'-') AS apellidos, IFNULL(a.fechanac,'1990-01-01') AS fechanac
	, IFNULL(a.movil,'(00) 1234 5678') AS movil, IFNULL(a.idestatus,0) AS idestatus
	, IFNULL(a.fechaultimoacc, '0000-00-00 00:00:00') AS fechaultimoacc, IFNULL(a.lugarultimoacc,'-') AS lugarultimoacc
	, IFNULL(a.fechareg, '0000-00-00 00:00:00') AS fechareg, IFNULL(a.fechamod,'0000-00-00 00:00:00') AS fechamod
	, IFNULL(a.comentarios,'-') AS comentarios
	, IFNULL(b.idestatususr,0) AS idestatususr
	, IFNULL(b.estatususr,'-') AS estatususr
FROM tusuarios a
INNER JOIN tcatestatususuarios b ON a.idestatus = b.idestatususr
WHERE email = "danielnakata@gmail.com";
	
UPDATE tusuarios SET contrasena = '*514FC2971F3E94BB16F25C396219DFDF01D02443' WHERE idusuario = 1;

SELECT a.idprestamo AS idprestamo
	,a.idcliente AS idcliente
	,a.idusuario AS idusuario
	,a.fechainicio AS fechainicio
	,a.fechafin AS fechafin
	,a.montoprestado AS montoprestado
	,a.montopagar AS montopagar
	,a.montointeres AS montointeres
	,a.pctginteres AS pctginteres
	,a.idtipoplazo AS idtipoplazo
	,a.montoplazo AS montoplazo
	,a.regargosplazo AS recargosplazo
	,a.pctgrecargoplazo AS pctgrecargoplazo
	,a.totalplazos AS totalplazos
	,a.restanplazos AS restanplazos
	,a.montopagado AS montopagado
	,a.montorestante AS montorestante
	,a.comentarios AS comentarios
	,a.fechareg AS fechareg
	,a.fechamod AS fechamod
FROM tprestamos a



SELECT a.idtipopago AS idtipopago
	,a.tipopago AS tipopago
	,a.pagosporannio AS pagosporannio
	,a.esactivo AS esactivo
	,a.fechareg AS fechareg
FROM tcatitpopagos a
ORDER BY a.idtipopago ASC;

SELECT a.idestatususr AS idestatususr
	,a.estatususr AS estatususr
	,a.fechareg AS fechareg
FROM tcatestatususuarios a
ORDER BY a.idestatususr ASC;

SELECT a.idestatusprestamos AS idestatusprestamos
	,a.estatusprestamos AS estatusprestamos
FROM tcatestatusprestamos a
ORDER BY a.idestatusprestamos ASC;

SELECT a.idestatusclientes AS idestatusclientes
	,a.estatuscliente AS estatuscliente
FROM tcatestatusclientes a
ORDER BY a.idestatusclientes;




SELECT a.idcliente AS idcliente ,IFNULL(a.nombre,'-') AS nombre ,IFNULL(a.apellidos,'-') AS apellidos ,IFNULL(a.fechanac,'1990-01-01') AS fechanac ,IFNULL(a.email,'-') AS email ,IFNULL(a.telefono1,'(00) 1234 5678') AS telefono1 ,IFNULL(a.telefono2,'(00) 1234 5678') AS telefono2 ,IFNULL(a.calle, '-') AS calle ,IFNULL(a.numext, '-') AS numext ,IFNULL(a.numint, '-') AS numint ,IFNULL(a.delmun, '-') AS delmun ,IFNULL(a.estado, '-') AS estado ,IFNULL(a.pais, '-') AS pais ,IFNULL(a.codpost, '00000') AS codpost ,a.idestatus AS idestatus ,IFNULL(a.montototal, 0) AS montototal ,IFNULL(a.montoplazo, 0) AS montoplazo ,IFNULL(a.numplazo, 0) AS numplazo ,a.idtipoprestamo AS idtipoprestamo ,IFNULL(a.interesprestamo, 0) AS interesprestamo ,IFNULL(a.fechaultimoprestamo,'0000-00-00 00:00:00') AS fechaultimoprestamo ,IFNULL(a.numprestamos, 0) AS numprestamos ,a.idestatusprestamo AS idestatusprestamo ,a.idusuario AS idusuario ,a.fechareg AS fechareg ,IFNULL(a.fechamod, '0000-00-00 00:00:00') AS fechamod ,b.estatuscliente AS estatuscliente ,c.estatusprestamos AS estatusprestamos FROM tclientes a INNER JOIN tcatestatusclientes b ON a.idestatus = b.idestatusclientes INNER JOIN tcatestatusprestamos c ON a.idestatusprestamo = c.idestatusprestamos WHERE a.idusuario = 1 ORDER BY a.idestatus ASC, a.idcliente ASC



SELECT a.idcliente AS idcliente
	,IFNULL(a.nombre,'-') AS nombre
	,IFNULL(a.apellidos,'-') AS apellidos
	,IFNULL(a.fechanac,'1990-01-01') AS fechanac
	,IFNULL(a.email,'-') AS email
	,IFNULL(a.telefono1,'(00) 1234 5678') AS telefono1
	,IFNULL(a.telefono2,'(00) 1234 5678') AS telefono2
	,IFNULL(a.calle, '-') AS calle
	,IFNULL(a.numext, '-') AS numext
	,IFNULL(a.numint, '-') AS numint
	,IFNULL(a.delmun, '-') AS delmun
	,IFNULL(a.estado, '-') AS estado
	,IFNULL(a.pais, '-') AS pais
	,IFNULL(a.codpost, '00000') AS codpost
	,a.idestatus AS idestatus
	,IFNULL(a.montototal, 0) AS montototal
	,IFNULL(a.montoplazo, 0) AS montoplazo
	,IFNULL(a.numplazo, 0) AS numplazo
	,a.idtipoprestamo AS idtipoprestamo
	,IFNULL(a.interesprestamo, 0) AS interesprestamo
	,IFNULL(a.fechaultimoprestamo,'0000-00-00 00:00:00') AS fechaultimoprestamo
	,IFNULL(a.numprestamos, 0) AS numprestamos
	,a.idestatusprestamo AS idestatusprestamo
	,a.idusuario AS idusuario
	,a.fechareg AS fechareg
	,IFNULL(a.fechamod, '0000-00-00 00:00:00') AS fechamod
	,b.estatuscliente AS estatuscliente
	,c.estatusprestamos AS estatusprestamos
FROM tclientes a
INNER JOIN tcatestatusclientes b ON a.idestatus = b.idestatusclientes
INNER JOIN tcatestatusprestamos c ON a.idestatusprestamo = c.idestatusprestamos
WHERE a.idusuario = 1;


SELECT PASSWORD('adminadmin');
SELECT COUNT(*) AS existe FROM webcommerce.tusuarios WHERE email = 'danielnakata@gmail.com' AND contrasena= PASSWORD('adminadmin'); 
SELECT a.idusuario AS idusuario, IFNULL(a.email,'-') AS email, PASSWORD(IFNULL(a.contrasena,'-')) AS contrasena
	, IFNULL(a.nickname,'-') AS nickname, IFNULL(a.nombre,'-') AS nombre
	, IFNULL(a.apellidos,'-') AS apellidos, IFNULL(a.fechanac,'1990-01-01') AS fechanac
	, IFNULL(a.movil,'(00) 1234 5678') AS movil, IFNULL(a.idestatus,0) AS idestatus
	, IFNULL(a.fechaultimoacc, '0000-00-00 00:00:00') AS fechaultimoacc, IFNULL(a.lugarultimoacc,'-') AS lugarultimoacc
	, IFNULL(a.fechareg, '0000-00-00 00:00:00') AS fechareg, IFNULL(a.fechamod,'0000-00-00 00:00:00') AS fechamod
	, IFNULL(a.comentarios,'-') AS comentarios
	, IFNULL(b.idestatususr,0) AS idestatususr
	, IFNULL(b.estatususr,'-') AS estatususr
FROM tusuarios a
INNER JOIN tcatestatususuarios b ON a.idestatus = b.idestatususr
WHERE email = "danielnakata@gmail.com";
	
UPDATE tusuarios SET contrasena = '*514FC2971F3E94BB16F25C396219DFDF01D02443' WHERE idusuario = 1;