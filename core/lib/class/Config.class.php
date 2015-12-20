<?php
class Config{
	//数据库配置文件
	public $DB_FILE = 'c';
	//数据库配置文件路径
	public $DB_PATH;
	//模板配置文件
	public $TP_FILE_NAME='Smarty.class.php';
	//模板配置文件路径
	public $TP_PATH = "/Index";
	//文件夹
	public $APP_DIR=APP_PATH;
	//是否调试
	public $DEBUG;
	//model 层文件 路径
	public $MODEL_CLASS_PATH=MODELDIR;
	//控制器路径
	public $ACTION_CLASS_PATH=CONTROLLER;
	//View 路径
	public $VIEW_PATH=VIEWDIR;

	public $LIB;
	public $Function_Path;
	public $Class_Path;

	public  $Controller;
	public  $Model;
	public  $View; 
	public  $Config;
  	public  $M;
	public  $C;
	public  $A; 
}
?>