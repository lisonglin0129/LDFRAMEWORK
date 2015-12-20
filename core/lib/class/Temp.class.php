<?php
	class temp extends Config{
		public $obj;
		public function temp(){
			$smarty = new Smarty();		
			$this->obj = $smarty;
			$smarty->caching = false; 
			$smarty->template_dir =Temp.$this->TP_PATH;
			$smarty ->compile_dir =Temp.$this->TP_PATH. "/" .TP_CACHE_NAME;
			@chmod(Temp.$this->TP_PATH. "/" .TP_CACHE_NAME,0777);
			@$handler = opendir(Temp.$this->TP_PATH."/".TP_CACHE_NAME);
			if($handler){
				while (($file = readdir($handler)) !== false){
                                                                                                        if(strlen($file)>8){
                                                                                                               @chmod(Temp.$this->TP_PATH."/".TP_CACHE_NAME."/".$file,0777);
                                                                                                        }
                                                                                    }
			}
			$smarty->registerPlugin("function","path","sourcepath");
                                         $smarty->registerPlugin("function","App","App");
                                         $smarty->registerPlugin("function","js","scripts");
                                         $smarty->registerPlugin("function","URL","URL");
                                         $smarty->registerPlugin("function","import","import");
                                         $smarty->registerPlugin("function","nocache", "smarty_block_nocache"); 
                                          if(!DEBUG){

                                      		$smarty->caching = true; 
                                      		$smarty ->compile_dir =Temp.$this->TP_PATH. "/" .TP_CACHE_NAME;
                                      		$smarty->cache_lifetime = TP_CACHE_TIME; 
				$smarty->tp_path =Temp.$this->TP_PATH. "/RunTime";
				$smarty->debugging = TP_DEBUG;
			}
			if(TP_PHP){
			       //$smarty->php_handling = SMARTY_PHP_ALLOW;
			}
		}
	}
?>