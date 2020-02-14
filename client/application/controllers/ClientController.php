<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller {

	public function index()
	{
		 $error = $this->session->flashdata('error');
		 $message = $this->session->flashdata('message');
		 $popmessage = $this->session->flashdata('popmessage');
		$this->load->view('queue_form',array('error'=>$error,'message'=>$message,'popmessage'=>$popmessage));
	}

	public function pop(){
    	$url = API_URL.'pop';
    	$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('cache-control:no-cache','Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 0);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		$result = curl_exec($ch);
		$curlError = curl_error($ch);
		curl_close($ch);
		if($curlError!=""){
			$this->session->set_flashdata('error',$curlError);
		}else{
			$this->session->set_flashdata('popmessage',$result);
		}
		redirect('/');

	}

	public function push(){
		$this->form_validation->set_rules('queue_val', 'Text', 'required');
		if ($this->form_validation->run() == FALSE){
            $this->load->view('queue_form');
        }else{
        	$val = $this->input->post('queue_val');
        	$url = API_URL.'push';
        	$data = ['queue_val'=>$val];
        	$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('cache-control:no-cache','Content-Type:application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
			$result = curl_exec($ch);
			$curlError = curl_error($ch);
			curl_close($ch);
			if($curlError!=""){
				$this->session->set_flashdata('error',$curlError);
			}else{
				$this->session->set_flashdata('message',$result);
			}
			redirect('/');
        }
	}
}
