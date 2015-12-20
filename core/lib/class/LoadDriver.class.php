<?php
	class Classdirver extends init{


	     public function LoadAction(){

	     	$act='';
	     	$act = $this->Ctroller."/". ucfirst(strtolower($this->C.ACTION_CLASS_FX)) . ".class.php";

	     	$act = str_replace("action","Action",$act);
	     	if(is_file($act)){
	     	    $act_class = ucfirst(strtolower($this->C.ACTION_CLASS_FX));
	     	    $act_class = "\\Action\\".str_replace("action","Action", $act_class);
	     	    require_once $act;
	     	    $act_obj = new $act_class;
	     	    $f = $this->A;
	     	    $tm = get_class_methods($act_obj);
	     	    if(!in_array($f,$tm)){
	     	    	if(DEBUG){
     	    	 		errorlog("struts.log",$act."中 ".$f."方法不存在");
     	    	 	}
	     	     }  
	     	    $act_obj->$f();
                                          if(method_exists($act_obj,"start")){
                                                        $act_obj->start($act_obj);
                                          }
	     	}else{   
	     		if(DEBUG){
	     			errorlog("struts.log","没有找到该类".$act);
	     		}
	     		echo "没有找到该类".$act;
	     	}
	     }
	     public function LoadModel(){
	     	$act='';
	     	$act = $this->Model."/". ucfirst(strtolower($this->M.MODEL_CLASS_FX)) . ".class.php";
	   	$act = str_replace("model","Model",$act);
	   	if(is_file($act)){
	   		$act_class = ucfirst(strtolower($this->M.MODEL_CLASS_FX));
	     	    	$act_class = "\\Model\\".str_replace("model","Model", $act_class);
	     	    	 require_once $act;

	     	    	 $Model_obj = new $act_class;
	     	    	 $m = $this->M;

	     	    	 $tm = get_class_methods($Model_obj);

	     	    	 if(!in_array($m,$tm)){
	     	    	 	if(DEBUG){
	     	    	 		errorlog("struts.log",$act."中 ".$m."方法不存在");
	     	    	 	}
	     	    	 }
	     	    	 $Model_obj->$m(); 
	   	}else{   
	   		if(DEBUG){
	   			errorlog("struts.log","没有找到该类".$act);
	     		}
	     		echo "没有找到该类".$act;
	     	}
	     }

	     public function is_class(){
	   	if(isset($_SERVER['PATH_INFO'])){
	   		$g = explode("/",$_SERVER['PATH_INFO']);
	   		$this->C  =  isset($g[1])?$g[1]:"Index";
	   		$this->A  =  isset($g[2])&&''!= isset($g[2])?$g[2]:'Index';
	   		$this->M =  isset($g[3])?$g[3]:'Index';
	   	}else{
			$this->C =  isset($_GET['c'])?$_GET['c']:"index";
		   	$this->M = isset($_GET['m'])?$_GET['m']:'index';
		   	$this->A =  isset($_GET['a'])?$_GET['a']:'index';		
	   	}
	   	
	     	$this->LoadModel();
	     	$this->LoadAction();
	     }
	     public function __construct(){
	     	$this->isinit();
	     	$this->is_class();
	     }
	}
	new Classdirver();
?>