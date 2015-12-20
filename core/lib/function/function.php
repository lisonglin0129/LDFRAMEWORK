<?php

   function M($str = ''){
     
   	require_once  APP_PATH."/".MODELDIR."/".$str.MODEL_CLASS_FX.".class.php";

   	$load = '\\Model\\'.$str.MODEL_CLASS_FX;
   	return $M;
   }
   function errorlog($filepath,$content){
  
          if(!is_dir(LOG)){
                 mkdir(LOG);
                 chmod(LOG,0777);
          }

          $fp = fopen(LOG."/".$filepath,"a+");
          @chmod(LOG."/".$filepath,0777);
          fwrite($fp,"[".date("Y-m-d   H:i:s",time())."]      ".$content."\r");
  }

 function sourcepath(){
    $cfg = new Config();
    echo  "http://".str_replace('\\','/',$_SERVER['SERVER_NAME'])."/".SERVER_PATH."/".APP_NAME."/".VIEWDIR.str_replace("\\",'/',$cfg->TP_PATH);
 }
 function URL($Action=""){
     echo  "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']."/".$Action['act'];
 }
 function U($str=''){
    return "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']."/".$str;
 }
function T($table = ''){
    
  	$tsqls =new  \Model\Model();
   	$tsqls->table = $table;
   	return $tsqls;
}
function App(){
    if(isset($_SERVER['REQUEST_SCHEME'])){
         echo $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".SERVER_PATH."/";
    }else{

        echo  "http://".str_replace('\\','/',$_SERVER['SERVER_NAME'])."/".SERVER_PATH."/";
    }
       
}
function smarty_block_nocache ($param,$content,$smarty)
{
        return $content;
} 
function scripts($str=''){
    $jspath = explode(",",$str['file']);
    $script='';
    for($i = 0 ; $i<count($jspath);$i++){
        $script= "<script type='text/javascript' src='".$jspath[$i]."'></script>";
        echo $script;
    }
}
function import($str=''){
    $filepath = explode(",", $str['file']);

    for($i = 0 ; $i<count($filepath);$i++){
        if(strstr($filepath[$i],".css")){
            echo "<link href='".$filepath[$i]."' type='tex/html' rel='stylesheet'/>";
        }else if(strstr($filepath[$i],".js")){
            echo "<script type='text/javascript' src='".$filepath[$i]."'></script>";
        }
    }
}
function D($db = ''){
  	$sqls =new  \Model\Model();
   	$sqls->database = $db;
   	return $sqls;
}

?>