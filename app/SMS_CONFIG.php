<?php
// - Este archivo es su licencia para acceder al servicio remoto de envío de SMS, queda bajo su responsabilidad el uso que le de al mismo y queda estrictamente prohibida su distribución y/o comercialización.
//Estos son los parámetros de configuración, y deberán ser establecidos conforme las instrucciones del personal técnico de Auronix.

define('HOST','www.calixtaondemand.com');
define('PORT',80);
define('TIMEOUT',40);
define('CLIENTE',43315);
//define('PASSWORD','62f0ac41e96840010db9249d134c5f3f981e5ad140a83b33fe0b94140f7420e5');
define('PASSWORD','2ef0f60a57970fbeb6da00c1f201321deb5c45afbcba0259925abfcd9b5f9cb4');
define('USER','jon.you@hotmail.com');

function checkValidSession(){
	//Esta función debe devolver TRUE cuando la sesión actual es válida para envío de SMS, y FALSE en cuanquier otro caso.
	return true;
}
?>
