<?php
//错误日志文件
function errorlog($filepath,$content){
    if(DEBUG === true){	
	if(!is_dir(LOG)){
	       mkdir(LOG);
	       chmod(LOG,0777);
	}

	$fp = fopen(LOG."/".$filepath,"a+");
	chmod(LOG."/".$filepath,0777);
	fwrite($fp,"[".date("Y-m-d   H:i:s",time())."]      ".$content."\r");
     }	
}

?>