<?php
	namespace Action;
	use Action\Action;
	class Action extends \init{
		public $o;
		
		public function __construct(){ 
			$this->isinit();
			$this->o = new \temp();
			 if(method_exists($this,'__init')){
			   	$this->__init();
			 }
		
		}
		public function getBean($path,$className){
		
		        $index = strstr($path , '.');
		        if($index){
		            $path = str_replace(".","/",$path);
		            $path .= ".php";
		        }else{
		            $path = $path."/".$className;
		            $path .= ".php";
		        }
		        $ROOT_PATH = str_replace("class","",DRIVER);
		        require_once  $ROOT_PATH.$path;
		        return  new $className;
		}
		public function show($str=''){
			$cgf =new \Config();
			if($str == ''){
                                                            $str = 'index.html';
			}
			if(!is_file(APP_PATH."/View".$cgf ->TP_PATH."/".$str)){
				errorlog(ROOT_PATH."/struts.log",APP_PATH."/View".$cgf ->TP_PATH."/".$str."模板文件不存在");
				echo APP_PATH."/View".$cgf ->TP_PATH."/".$str."模板文件不存在";
				exit;
			}
			$url="Lin".md5($_SERVER['REQUEST_URI']);
			$this->o->obj->display($str,$url);
		}
		public function view($v1,$v2){
			$this->o->obj->assign($v1,$v2);
		}
		
	}
?>