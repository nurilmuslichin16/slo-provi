<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	public $data = array();

	function __construct(){
		parent::__construct();
		$this->load->model(array('dashboard_model','provisioning_model','monitoring_model','material_model','report_model','users_model','helpdesk_model','teknisi_model','barcode_model','salesman_model','cek_onu_model'));
	}

}