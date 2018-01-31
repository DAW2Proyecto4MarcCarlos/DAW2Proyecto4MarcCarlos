<?php
	error_reporting(0);
	echo $_REQUEST['pass'] . "<br/><br/>";

	$pass_encriptada=md5($_REQUEST['pass']);

	echo $pass_encriptada . "<br/><br/>";
?>