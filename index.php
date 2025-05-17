<?php
/*************************************************************/
/* Archivo:  index.php
 * Objetivo: página inicial de manejo de catálogo,
 *           incluye manejo de sesiones y plantillas
 * Autor:
 *************************************************************/
include_once("cabecera.html");
include_once("menu.php");

include_once("aside.html");
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <section>
			<form id="frm" method="post" action="login.php">
				Clave  <input type="text" name="txtCve" required="true"/>
				<br/>
				Contrase&ntilde;a  <input type="password" name="txtPwd" required="true"/>
				<br/>
				<input type="submit" value="Enviar"/>
			</form>
		</section>
<?php

include_once("pie.html");
?>
