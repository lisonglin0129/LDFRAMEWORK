<?php

ini_set("display_errors",1);														 
defined("DEBUG") 	or define("DEBUG",false);	
defined("TP_DEBUG") 	or define("TP_DEBUG",false);	
defined("TIME") 		or  define("TIME",date_default_timezone_set('PRC'));		//系统时区设置
defined("CHARSET") 		or define("CHARSET",'utf-8');			//字符编码设置---------Windows下设置GBK
define("SERVER_PATH",		dirname($_SERVER['SCRIPT_NAME']));		
defined("STRUTS_PATH") 	or define("STRUTS_PATH","core");		 //框架路径,这个不要改
define("ROOT_PATH"	, 	str_replace(STRUTS_PATH."/init.php","",str_replace("\\","/",__FILE__)));	
defined("TP_PATH") 		or define("TP_PATH",ROOT_PATH.STRUTS_PATH.'/lib');		//模板路径
defined("TP_CACHE_NAME") 	or define("TP_CACHE_NAME","temp");				//模板缓存---根目录
defined("TP_CACHE_TIME")	or define("TP_CACHE_TIME",3600); 	//模板缓存时间
defined("TP_PHP") 		or define("TP_PHP",true);					//模板是否支持ＰＨＰ	
defined("APP_NAME") 		or define("APP_NAME","Struts");					//项目名称
defined("APP_PATH")  		or define("APP_PATH",ROOT_PATH.APP_NAME) ;			//项目路径
defined("CONTROLLER")  	or define("CONTROLLER","Controller") ;					//控制器名称
defined("MODELDIR")  	  	or define("MODELDIR","Model") ;					//模型路径
defined("DRIVER") 		or define("DRIVER",APP_PATH."/lib/class");				//接口扩展路径
defined("VIEWDIR")  		or define("VIEWDIR","View") ;	//视图分组名称

defined("Temp")  		or define("Temp",APP_PATH. '/'. VIEWDIR) ;	//视图路径
defined("ACTION_CLASS_FX")  	or define("ACTION_CLASS_FX","Action") ; 	//控制器名称
defined("MODEL_CLASS_FX")  	or define("MODEL_CLASS_FX","Model") ;			 //模型名称
defined("LOG") 			or define("LOG",ROOT_PATH."log");		 //日志配置文件				/*日志配置文件路径*/
defined("DB_CFG_PATH") 	or define("DB_CFG_PATH",APP_PATH."/Config");	/*//数据库配置文件路径*/

defined("DB_FILE_NAME") 	or define("DB_FILE_NAME","db.config.php");   	      	/*//数据库配置文件名*/
defined("SOURCE_PATH") 	or define("SOURCE_PATH",str_replace($_SERVER['DOCUMENT_ROOT'], "", APP_PATH)."/".VIEWDIR);

define('NOW_TIME',      		$_SERVER['REQUEST_TIME']);
define('REQUEST_METHOD',	$_SERVER['REQUEST_METHOD']);
define('IS_GET',        		REQUEST_METHOD =='GET' ? true : false);
define('IS_POST',       		REQUEST_METHOD =='POST' ? true : false);
define('IS_PUT',        		REQUEST_METHOD =='PUT' ? true : false);
define('IS_DELETE',    		REQUEST_METHOD =='DELETE' ? true : false);

session_start();
header("Content-type:text/html;charset=".CHARSET);

/* 导入配置 */
require_once ROOT_PATH.STRUTS_PATH	.	"/lib/class/AddFunction.class.php";
require_once ROOT_PATH.STRUTS_PATH	.	"/lib/class/Config.class.php"; //导入配置文件
require_once ROOT_PATH.STRUTS_PATH	.	"/lib/class/init.class.php";
require_once ROOT_PATH.STRUTS_PATH	.	"/lib/class/ModelDriver.class.php"; 	
require_once ROOT_PATH.STRUTS_PATH	.	"/lib/data/data.php"; 
require_once ROOT_PATH.STRUTS_PATH	.	"/lib/Smarty.class.php"; //导入模板文件
require_once ROOT_PATH.STRUTS_PATH	.	"/lib/class/Temp.class.php"; //导入配置文件
require_once ROOT_PATH.STRUTS_PATH	.	"/lib/class/Model.class.php";
require_once ROOT_PATH.STRUTS_PATH	.	"/lib/class/Action.class.php";
require_once ROOT_PATH.STRUTS_PATH	.	"/lib/class/LoadDriver.class.php";	

/* 初始化设置 */
@ini_set('memory_limit',          '64M');		//ini_set设置php.ini中的设置，memory_limit设定一个脚本所能够申请到的最大内存字节数
@ini_set('session.cache_expire',  180);		//指定会话页面在客户端cache中的有效期限(分钟),单位为分钟。
@ini_set('session.use_trans_sid', 0);		//关闭自动把session id嵌入到web的URL中
@ini_set('session.use_cookies',   1);		//允许使用cookie在客户端保存会话ID
@ini_set('session.auto_start',    0);		//在客户访问任何页面时都自动初始化会话，0-禁止
@ini_set('display_errors',        1);		//是否显示错误

//$_SERVER['PHP_SELF']返回当前页面，获取$_SERVER['PHP_SELF']最好用htmlspecialchars过滤一下，存在XSS漏洞
$php_self = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];

//如果是"/"结尾，则加上index.php
if ('/' == substr($php_self, -1)){	 $php_self .= 'index.php';	}

define('PHP_SELF', $php_self);//放入常量

?>
