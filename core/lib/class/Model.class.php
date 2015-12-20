<?php
	namespace Model;
	use Model\Model;
	class Model extends mysql{
		public $sql;             //sql语句缓存变量
		public $where;       //where条件 
		public $column;     //列查询
		public $limit;           //记录的条数
		public $order;          //排序
		public $insert;         //插入数据
		public $del;            //删除数据
		public $data;         //数据缓存
		public $update;     //修改数据
		public function __construct(){
		       parent::__construct();
                  
		}
                                    /**
                                     * 
                                     * @param String $P 
                                     * @return object
                                     */
		public function order($P =""){
			$this->order = $P?" ORDER BY ".$P." ":" ";
			return $this;
		}
                                    /**
                                     * 
                                     * @param String $str
                                     * @return  object
                                     */
		public function column($s = ''){
			$this->column =$s;
			if($this->column == ''){
				$this->column = '*';
			}
			return $this;
		}
                                    /**
                                     * @param String $where
                                     * @return Object
                                     */
		public function where($where){
			$excute = '';
			if(is_array($where)){
				foreach ($where as $value => $key) {
					$excute  .=  $value."='".$key."' AND ";
				}
				$excute = substr($excute,0,-4);
				$this->where = "WHERE ".$excute;
			}else{
				$this->where = "WHERE ".$where;
			}
			return $this;
			
		}
                                    /**
                                     * @param Array $arrays
                                     * @return Object
                                     */
		public function data($arrays){
			$this->data = $arrays;
			return $this;
		}
                                    /**
                                     * 
                                     * @param String $num
                                     * @return Model
                                     */
		public function limit($num = ''){
			if($num == ''){
				$this->limit = '';
			}else{
				$this->limit =" LIMIT ".$num;
			}
			return  $this;
		}
                                    /**
                                     * 
                                     * @param String $sql
                                     * @param Connection $sqlconnection
                                     * @return  Source Array
                                     */
		public function excute($sql,$sqlconnection){
			$res = mysql_query($sql,$sqlconnection);
			return $res;
		}
                                    /**
                                     * 
                                     * @param String $str
                                     * @return source
                                     */
		public function sql($str){
			$this->connection();
			$res = $this->excute($str,$this->mysql);
			$this->sql=$str;

			if(DEBUG === true){
				if($this->sql){
					errorlog("struts.log", $this->sql);
				}
			}
			if($res == 1){
				$res = mysql_insert_id();
				return $res;	
			}else if($res != 0&&$res != 1){
				while($rs  = mysql_fetch_array($res)){
					$r = $rs;
				}
				return $r;
			}
			
		}
		public function getsqlcommand(){
			echo $this->sql;
			return $this->sql;
		}
		public function delete(){
			$this->connection();
			$this->del = "DELETE FROM $this->table  $this->where";
			$res = $this->excute($this->del,$this->mysql);
                                         if(DEBUG === true){
				if($this->sql){
					errorlog("struts.log", $this->sql);
				}
			}
                                         return $res;
		}
		public function update(){
			$this->connection();
			$this->update = "UPDATE $this->table SET ";
			$sql = "SELECT * FROM $this->table $this->where LIMIT 0 ,1";
		
			$res = $this->excute($sql,$this->mysql);
			$rs  = mysql_fetch_array($res);
			
			if(!$rs){
				return -1;
			}

			if(is_array($this->data)){
				foreach($this->data as $data =>$key){
					$this->update .= "$data ='$key',";
				}

				$this->update = substr($this->update,0,strlen($this->update)-1);
				$this->update .= " $this->where";

			}
			$this->sql =  $this->update;
			if(DEBUG === true){
				if($this->sql){
					errorlog("struts.log", $this->sql);
				}
			}
			$res = $this->excute($this->update,$this->mysql);
			return $res;
		}
		public function cleartable(){
			$this->connection();
			$sql = "TRUNCATE  $this->table";
			$res = $this->excute($sql,$this->mysql);
			return $res;
		}
		public function insert(){
			$this->connection();
			$this->insert = "INSERT INTO  $this->table(";
			$clumu='';
			if(is_array($this->data)){
				foreach($this->data as $temp =>$key){
					$clumu .=$temp.","; 
				}

				$clumu = substr($clumu, 0,strlen($clumu)-1);
				$this->insert .= $clumu.")VALUES(";
				$clumu='';
				
				foreach($this->data as $temp =>$key){
					$clumu .=",'".$key."'"; 
				}

				$clumu = substr($clumu, 1,strlen($clumu));
				$this->insert .= $clumu.")";
				$this->sql = $this->insert;
				$res = $this->excute($this->insert,$this->mysql);

				if($res){
					$res = mysql_insert_id();
					return $res;
				}else{
					if(DEBUG === true){
						if($this->sql){
							errorlog("struts.log", $this->sql);
						}
					}
					return $res;
				}
				
			}else{
			      $this->insert = "INSERT INTO $this->table $this->data";
			      $res = $this->excute($this->insert,$this->mysql);
			      if($res){
			      	$res = msyql_insert_id();
			      }
			      return $res;
			}
		}
		public function select(){
			$result = '';
			$this->column = $this->column ? $this->column:"*";
			$this->sql = "SELECT ".$this->column." FROM ".$this->table." ".$this->where." ".$this->order." ".$this->limit;
			
			$this->connection();
			if(DEBUG === true){
				if($this->sql){
					errorlog("struts.log", $this->sql);
				}
			}

			$rs = $this->excute($this->sql,$this->mysql);
			if($rs){
				while($res = mysql_fetch_array($rs)){
					$result [] = $res; 
				}
				return $result;
			}
			return false;
		}
                                        /**
                                         * 
                                         * @param String $table
                                         * @return Model
                                         */
		public function T($table = ''){

		          $this->table = $table;
		          return $this;
		}

	}

?>
