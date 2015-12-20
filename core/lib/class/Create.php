<?php

    if(!is_file(APP_PATH."/".CONTROLLER."/Index".ACTION_CLASS_FX.".class.php")){
    	$file = "<?php\r/**\r".
	            "*\r"."*\r"."*/\r".
	            "\rnamespace Action;".
	            "\ruse Action\\IndexAction;\r".
	            "class IndexAction extends Action{\r".
	            "\r".
	            "\tpublic function __init(){\r".
	            "\r\t\t//初始化方法\r".
	            "\t}\r".
	            "\tpublic function index(){\r".
	            "\t\t\$this->view('htmlcontent','欢迎使用');\r".
	            "\t\t\$this->show('index.html');\r".
	            "\t}\r".
	            "}\r?>";
    	$fp = @fopen(APP_PATH."/".CONTROLLER."/Index".ACTION_CLASS_FX.".class.php","w+");
     	fwrite($fp, $file);
     	fclose($fp);
     	@chmod(APP_PATH."/".CONTROLLER."/Index".ACTION_CLASS_FX.".class.php",0777);
     }

      if(!is_file(APP_PATH."/".MODELDIR."/Index".MODELDIR.".class.php")){

    	$file = "<?php\r/**\r".
	            "*\r"."*\r"."*/\r".
	            "\rnamespace Model;".
	            "\ruse Model\\IndexModel;\r".
	            "class IndexModel extends Model{\r".
	            "\tpublic function __construct(){\r".
	            "\t\t\$this->database=''; \t\t\t//这个是数据库名\r".
	            "\t\t\$this->table=''; \t\t\t//这个是数据表\r".
	            "\t}\r\r".
	            "\tpublic function index(){\r".
	            "\t}\r".
	            "}\r?>";
    	$fp = @fopen(APP_PATH."/".MODELDIR."/Index".MODELDIR.".class.php","w+");
     	fwrite($fp, $file);
     	fclose($fp);
     	@chmod(APP_PATH."/".MODELDIR."/Index".MODELDIR.".class.php",0777);
     }
     if(!is_dir(APP_PATH."/".VIEWDIR."/Index")){
     	@mkdir(APP_PATH."/".VIEWDIR."/Index");
     	@chmod(APP_PATH."/".VIEWDIR."/Index",0777);
     }
     if(!is_file(APP_PATH."/".VIEWDIR."/Index/index.html")){
    	$file = "<h1>{\$htmlcontent}</h1>";
    	$fp = @fopen(APP_PATH."/".VIEWDIR."/Index/index.html","w+");
     	fwrite($fp, $file);
     	fclose($fp);
     	@chmod(APP_PATH."/".VIEWDIR."/Index/index.html",0777);
     }
     $initclass = new init();
     $initclass->isinit();

     if(!is_file($initclass->Config."/".DB_FILE_NAME)){
            $file = "<?php\r \t/**\r".
                        "\t*\r".
                        "\t*数据库配置文件不要删除\r".
                        "\t*/\r".
                        "\t\$dbconfig=array(\r".
                        "\t\t'dbhost'\t=>\t'',\t\t//数据库IP\r".
                        "\t\t'dbuser'\t=>\t'',\t\t//数据库用户名\r".
                        "\t\t'dbpassword'\t=>\t'',\t\t//数据库密码\r".
                        "\t\t'dbcharset'\t=>\t'',\t\t//数据库字符\r".
                        "\t\t'dbport'\t\t=>\t'',\t\t//数据库端口\r".
                        "\t\t'dbname'\t=>\t'',\t\t//数据库名\r".
                        "\t);\r?>";
            $fp = @fopen($initclass->Config."/".DB_FILE_NAME,"w+");
            fwrite($fp, $file);
            fclose($fp);
            @chmod($initclass->Config."/".DB_FILE_NAME, 0777);
     }
?>