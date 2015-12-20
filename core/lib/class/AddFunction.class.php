<?php
	class AddFunction {
		public function __construct(){
		
			if(is_dir(ROOT_PATH.STRUTS_PATH."/lib/function")){
				$handler = opendir(ROOT_PATH.STRUTS_PATH."/lib/function");
				   if($handler){
					 while (($file = readdir($handler)) !== false){

						if(strlen($file)>3){
							require_once  ROOT_PATH.STRUTS_PATH."/lib/function/".$file;
						}
					  }
					  closedir($handler);
				}
			}

		}
	}
	new AddFunction();
?>