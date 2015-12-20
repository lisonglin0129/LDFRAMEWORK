<?php
/**
 * 驱动接口加载
 */
class ModelDriver{
        public function __construct(){
                if(!is_dir(DRIVER)){
                        @mkdir(DRIVER);
                        @chmod(DRIVER,0777);
                }
                //优先加载系统接口
                $handler = opendir(ROOT_PATH.STRUTS_PATH	. "/lib/Driver");
                if($handler){
                        //遍历目录下所有的文件进行加载
                        while (($file = readdir($handler)) !== false){

                                if(strlen($file)>3){

                                        require_once  ROOT_PATH.STRUTS_PATH."/lib/Driver/".$file;
                                }
                         }
                                 closedir($handler);
                }
                //用户自定义驱动加载
                if(is_dir(DRIVER)){
                        $handler = opendir(DRIVER);
                         if($handler){
                                 while (($file = readdir($handler)) !== false){

                                        if(strlen($file)>3){
                      
                                                require_once  DRIVER."/".$file;
                                        }
                                  }
                                  closedir($handler);
                        }
                }
        }
}
new ModelDriver();
?>