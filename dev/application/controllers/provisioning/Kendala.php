<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendala extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
        if($this->session->userdata('logged_in') != TRUE){
            redirect(base_url("auth"));
        }
	}

	public function index()
	{
		$data['title'] 		    = 'Provisioning';
		$data['subtitle'] 	    = 'Kendala';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $this->load->view('template',[
			'content' => $this->load->view('provisioning/kendala/data',$data,true)
		]);
	}

}

/* End of file Kendala.php */
/* Location: ./application/controllers/provisioning/Kendala.php */