<?php
namespace Model;
use Model\Model;
class mysql{
	public $dbhost;
	public $dbuser;
	public $dbpassword;
	public $table;
	public $db_charset;
	public $db_port;
	public $db_name;
	public $database;
	public $mysql;
	public function __construct(){
       
		$this->dbhost = '';
		$this->dbuser = '';
		$this->dbpassword = '';
		$this->db_charset = '';
		$this->database='';
		$con ='';
		if(is_file(ROOT_PATH.STRUTS_PATH."/lib/data/data.Config.php")){
		     require ROOT_PATH.STRUTS_PATH."/lib/data/data.Config.php"; 
		}
	}
	public function connection(){
		require ROOT_PATH.STRUTS_PATH."/lib/data/data.Config.php"; 
	    	//初始化
                                
		$this->dbhost = $dbconfig['dbhost'] ? $dbconfig['dbhost'] : '127.0.0.1';
	
		$this->dbuser = $dbconfig['dbuser'] ? $dbconfig['dbuser'] : 'root';
		$this->dbpassword = $dbconfig['dbpassword'] ?  $dbconfig['dbpassword'] :'';
		$this->db_charset = $dbconfig['dbcharset'] ? $dbconfig['dbcharset']  : 'utf8';

		$this->db_name  =  $dbconfig['dbname'] ? $dbconfig['dbname'] :$this->db_name;
		$this->db_name = $this->database?$this->database:$this->db_name;
                                  
		$con = mysql_connect($this->dbhost,$this->dbuser,$this->dbpassword);
		mysql_query("SET NAMES ".$this->db_charset );
	
		mysql_select_db($this->db_name,$con);
		
		$this->mysql =$con;   
	}

}

?>