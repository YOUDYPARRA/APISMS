<?php
// - Este archivo es su licencia para acceder al servicio remoto de env�o de SMS, queda bajo su responsabilidad el uso que le de al mismo y queda estrictamente prohibida su distribuci�n y/o comercializaci�n.
//Estos son los par�metros de configuraci�n, y deber�n ser establecidos conforme las instrucciones del personal t�cnico de Auronix.

define('HOST','www.calixtaondemand.com');
define('PORT',80);
define('TIMEOUT',40);
define('CLIENTE',43315);
//define('PASSWORD','62f0ac41e96840010db9249d134c5f3f981e5ad140a83b33fe0b94140f7420e5');
define('PASSWORD','2ef0f60a57970fbeb6da00c1f201321deb5c45afbcba0259925abfcd9b5f9cb4');
define('USER','jon.you@hotmail.com');

function checkValidSession(){
	//Esta funci�n debe devolver TRUE cuando la sesi�n actual es v�lida para env�o de SMS, y FALSE en cuanquier otro caso.
	return true;
}
?>
