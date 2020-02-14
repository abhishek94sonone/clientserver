<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('queue_model');
    }

    public function pop_get(){
        $item = $this->queue_model->getLast();
        if(!is_null($item)){
            $this->response(['message'=>'Most recent item in queue is '.$item->queue_val], 200);
        }else{
            $this->response(['message'=>'No values are in Queue'], 200);
        }
    }

    public function push_post(){
        $queue_val = $this->post('queue_val');
        $inserted_id = $this->queue_model->insert_entry($queue_val);
        if($inserted_id){
            $this->response( ["id"=>$inserted_id], 200 );
        }else{
            $this->response( [
                    'message' => 'Something Went Wrong'
                ], 400 );
        }
    }
}