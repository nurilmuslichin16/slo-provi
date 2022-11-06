<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends MY_Controller {

	public function new_sales()
	{
		$data['title'] 		    = 'Monitoring Orders';
		$data['subtitle'] 	    = 'New Sales';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['datans']     	= $this->monitoring_model->new_sales()->row_array();
        $this->load->view('show/ns',$data);
	}

	public function migrasi()
	{
		$data['title'] 		    = 'Monitoring Orders';
		$data['subtitle'] 	    = 'Migrasi';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['datamd']     	= $this->monitoring_model->mig_datel()->row_array();
        $this->load->view('show/mig',$data);
	}

	public function add_on()
    {
        $data['title']          = 'Monitoring Orders';
        $data['subtitle']       = 'Add On';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['dataao']         = $this->monitoring_model->add_on()->row_array();
        $this->load->view('show/ao',$data);
    }

}

/* End of file Show.php */
/* Location: ./application/controllers/provisioning/Show.php */