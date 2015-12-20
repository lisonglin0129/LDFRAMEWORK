<?php
	
 	$phpscripts ="<?php \r\t/**".
 			"\r\t*".
 			"\r\t*数据库配置文件不要删除".
 			"\r\t*/".
			"\r\t\$dbconfig=array(".
			"\r\t\t'dbhost'\t=>\t'',\t\t//数据库IP".
			"\r\t\t'dbuser'\t=>\t'',\t\t//数据库用户名".
			"\r\t\t'dbpassword'\t=>\t'',\t\t//数据库密码".
			"\r\t\t'dbcharset'\t=>\t'',\t\t//数据库字符".
			"\r\t\t'dbport'\t\t=>\t'',\t\t//数据库端口".
			"\r\t\t'dbname'\t\t=>\t''\t\t//数据库名".
			"\r\t);\r?>"; 
	if(!is_dir(DB_CFG_PATH)){
		mkdir(DB_CFG_PATH);
		chmod(DB_CFG_PATH,0777);
	}
	if(!is_file(DB_CFG_PATH."/db.config.php")){
		$fp = fopen(DB_CFG_PATH."/db.config.php","wr");
		fwrite($fp, $phpscripts);
		chmod(DB_CFG_PATH."/db.config.php",0777);
		fclose($fp);
	}
	require DB_CFG_PATH."/db.config.php";

?>