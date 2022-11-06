<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') != TRUE){
            redirect(base_url("auth"));
        }
	}

	public function index()
	{
		$data['title'] 			= 'Jarvis Provisioning';
		$data['subtitle'] 		= 'Dashboard';
		$datans 				= $this->dashboard_model->grafik_new_sales()->result();
		$datamig				= $this->dashboard_model->grafik_mig()->result();
		$data['odmsktoday']		= $this->dashboard_model->masuk_today()->row_array();
		$data['nstoday']		= $this->dashboard_model->ns_today()->row_array();
		$data['migtoday']		= $this->dashboard_model->mig_today()->row_array();
		$data['aotoday']		= $this->dashboard_model->ao_today()->row_array();
		$data['odprogtoday']	= $this->dashboard_model->prog_today()->row_array();
		$data['odwaittoday']	= $this->dashboard_model->waiting_today()->row_array();
      	$data['datans'] 		= json_encode($datans);
      	$data['datamig'] 		= json_encode($datamig);
		$this->load->view('template',[
			'content' => $this->load->view('dashboard',$data,true)
		]);
	}
}
