<?php
class init extends Config{
	public function isinit(){

		$this->Ctroller = $this->APP_DIR."/" . $this->ACTION_CLASS_PATH;

		$this->Model   = $this->APP_DIR. "/" . $this->MODEL_CLASS_PATH;
		$this->View      = $this->APP_DIR. "/" . $this->VIEW_PATH;
		$this->Function_Path   = 	$this->APP_DIR. "/". "lib/function";
		$this->CLASS_Path      =	$this->APP_DIR. "/". "lib/class";
		$this->LIB 	   =	$this->APP_DIR. "/". "lib";
		$this->Config  	   =             DB_CFG_PATH;
                                  if(!is_dir(Temp.$this->TP_PATH. "/RunTime")){
                                        mkdir(Temp.$this->TP_PATH. "/RunTime");
                                        chmod(Temp.$this->TP_PATH. "/RunTime",0777);
                                  }
	     	if(!is_dir($this->APP_DIR)){
	    		mkdir($this->APP_DIR);
	    		chmod($this->APP_DIR,0777);
	     	}
	                 if(!is_dir($this->Config)){
                                        @mkdir($this->Config);
                                        @chmod($this->Config,0777);
                                   }
     		if(!is_dir($this->Ctroller)){
			mkdir($this->Ctroller);
			chmod($this->Ctroller,0777);
     		}

     		if(!is_dir($this->Model)){
     			mkdir($this->Model);
     			chmod($this->Model,0777);
     		}
     		if(!is_dir($this->View)){
     			mkdir($this->View);
     			chmod($this->View,0777);
     		}
     		if(!is_dir($this->LIB)){
     			mkdir($this->LIB);
     			chmod($this->LIB,0777);
     		}
     		if(!is_dir($this->CLASS_Path)){
     			mkdir($this->CLASS_Path);
     			chmod($this->CLASS_Path,0777);
     		}
     		if(!is_dir($this->Function_Path)){
     			mkdir($this->Function_Path);
     			chmod($this->Function_Path,0777);
     		}
	     	require_once ROOT_PATH.STRUTS_PATH . "/lib/class/Create.php";  //默认创建项目文件	
	     }
	     public function __construct(){

	     	$this->isinit();
	     }

}
new init();
?>