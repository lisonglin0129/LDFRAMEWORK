<?php
	defined("STRUTS_PATH") 	or define("STRUTS_PATH","core");		 //框架路径,这个不要改
	define("ROOT_PATH"	, 	str_replace(STRUTS_PATH."/Sorket.php","",str_replace("\\","/",__FILE__)));	

	require           ROOT_PATH.STRUTS_PATH	.	"/lib/class/Worker.php";
	require_once  ROOT_PATH.STRUTS_PATH	.	'/lib/class/Autoloader.php';
//	require_once  ROOT_PATH.STRUTS_PATH	.	'/lib/class/Protocols/Http.php';
	require_once  ROOT_PATH.STRUTS_PATH	.	'/lib/class//Events/EventInterface.php';
	require_once  ROOT_PATH.STRUTS_PATH	.	'/lib/class//Connection/ConnectionInterface.php';
	require_once  ROOT_PATH.STRUTS_PATH	.	'/lib/class//Connection/TcpConnection.php';
	require_once  ROOT_PATH.STRUTS_PATH	.	'/lib/class//Connection/AsyncTcpConnection.php';

	require_once  ROOT_PATH.STRUTS_PATH	.	'/lib/class//Events/Select.php';
	require_once  ROOT_PATH.STRUTS_PATH	.	'/lib/class//Lib/Constants.php';
	require_once  ROOT_PATH.STRUTS_PATH	.	'/lib/class//Lib/Timer.php';

?>