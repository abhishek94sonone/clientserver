<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateFile extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('queue_model');
	}

	public function update()
	{
	    $arr = $this->queue_model->get_to_append_queue();
	    if(is_array($arr) && count($arr)>0){
	    	$to_update = [];
	    	foreach ($arr as $row) {
	    		$this->logRequest($row->queue_val);
	    		$to_update[]=array("id"=>$row->id,"status"=>1); 
	    	}
	    	$stat = $this->queue_model->update_queues($to_update,"id");
	    	if($stat){
	    		$ar = [];
	    		foreach ($to_update as $key => $value) {
	    			$ar[] = $value['id'];
	    		}
	    		// echo "following ids updated ".implode(', ', $ar);
	    	}else{
	    		// echo "nothing to update";
	    	}
	    }else{
	    	// echo "nothing to update";
	    }
	}


	private function logRequest($finalResponse)
	{
		$path = $this->commonfunctions->mkdir('API_LOG_PATH');
		$postData = '';

		$fileLocation = $path."/".date('Y-m-d').".txt";

		$content  = date('Y-m-d H:i:s')."\n";
		$content .= 'Value: '.json_encode($finalResponse)."\n";
		$content .= "------------------------------------------------\n";

		$file = fopen($fileLocation, "a");
		fwrite($file, $content);
		fclose($file);
	}
}
