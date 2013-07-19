<?php
class Tiarra extends AppModel{

	var $name = "Tiarra";
	var $useTable = false;

	function post($data){
		try{
		    $tiarra = new Net_Socket_Tiarra('socketname');

		    // PRIVMSG
		    $tiarra->message('#makies@wide', "Hello!!");

		} catch (Net_Socket_Tiarra_Exception $e) {
		    echo $e->getMessage();
		}

	}


	function getDirList($dir){
		$res = array();
		if (is_dir($dir)) {
		    if ($dh = opendir($dir)) {
		        while (($file = readdir($dh)) !== false) {
				$file_path = $dir."".str_replace("@","\@",$file)."/";
				//if(!in_array($file,array(".","..")) && is_dir($file_path) && is_readable($file_path) ){
				if(!in_array($file,array(".",".."))  ) {
					$res[] = $file;
				}
//				pr($file_path);
		            #echo "filename: $file : filetype: " . filetype($dir . $file) . "\n";
		        }
		        closedir($dh);
		    }
		}else{
			debug("dir is not dir.");
		}
		return $res;

	}


	function getFileList($channel_name){
                $res = array();
		$dir = TIARRA_LOG_DIR."#".$channel_name;
#debug($dir);
                if (is_dir($dir)) {
                    if ($dh = opendir($dir)) {
                        while (($file = readdir($dh)) !== false) {
#debug($file);
                                if(!in_array($file,array(".",".."))  ){
                                        $res[] = $file;
                                }
                            #echo "filename: $file : filetype: " . filetype($dir . $file) . "\n";
                        }
                        closedir($dh);
                    }
                }else{
#debug("this is not dir.");
		}
#debug($res);
                return $res;
	}

	function getFileContent($array){
		$res = array();
		$filename = TIARRA_LOG_DIR."#".$array[0].DS.$array[1];
//debug($filename);
		$line = file($filename);
		if(count($line)){
			foreach($line as $l){
				$date = substr($l,0,8);
				$after_date = substr($l,9);
				$name = substr($after_date,0,strpos($after_date," "));
				$msg  = substr($l,strlen($date.$name)+2);
				$res[] = array("date"=>$date,"name"=>$name,"msg"=>$msg);
			}
		}
		@rsort($res);
		return $res;
	}

}
