<?php
class TiarrasController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Tiarras';
/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html','Form','Text');
/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	//var $uses = array();

	function index(){
		$this->set("channels",$this->Tiarra->getDirList(TIARRA_LOG_DIR));
	}
	
	function channel(){
		if(empty($this->params["pass"][0])){
			$this->redirect('index');
		}

		$channel = $this->params["pass"][0];
		$this->set("channel_name",$channel);
		$this->set("files",$this->Tiarra->getFileList($channel));
		
	}
	
	function file(){
		if(!empty($this->data)){
			//$this->Tiarra->post($this->data);
		}
		if(empty($this->params["pass"][0])){
			$this->redirect("index");
		}
		if(empty($this->params["pass"][1])){
			$this->redirect(array("action"=>"channel",$this->params["pass"][0]));
		}
		$this->set("content",$this->Tiarra->getFilecontent($this->params["pass"]));
                
		$this->set("channels",$this->Tiarra->getDirList(TIARRA_LOG_DIR));
	}
}
?>
