<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends MY_Controller {

	public function __construct()
    {
		parent::__construct();
        if($this->session->userdata('logged_in') != TRUE){
            redirect(base_url("auth"));
        }
	}

	public function new_sales()
	{
		$data['title'] 		    = 'Monitoring Orders';
		$data['subtitle'] 	    = 'New Sales';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['datans']     	= $this->monitoring_model->new_sales()->row_array();
        $grafikns 				= $this->monitoring_model->grafik_new_sales()->result();
        $data['grafns'] 		= json_encode($grafikns);
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/monitoring/new_sales',$data,true)
        ]);
	}

	public function migrasi_datel()
	{
		$data['title'] 		    = 'Monitoring Orders';
		$data['subtitle'] 	    = 'Migrasi';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['datamd']     	= $this->monitoring_model->mig_datel()->row_array();
        $grafikmd 				= $this->monitoring_model->grafik_mig_datel()->result();
        $data['grafmd'] 		= json_encode($grafikmd);
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/monitoring/migrasi/datel',$data,true)
        ]);
	}

    public function migrasi_mitra()
    {
        $data['title']          = 'Monitoring Orders';
        $data['subtitle']       = 'Migrasi Mitra';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['datamm']         = $this->monitoring_model->mig_mitra()->row_array();
        $grafikmm               = $this->monitoring_model->grafik_mig_mitra()->result();
        $data['grafmm']         = json_encode($grafikmm);
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/monitoring/migrasi/mitra',$data,true)
        ]);
    }

    public function add_on()
    {
        $data['title']          = 'Monitoring Orders';
        $data['subtitle']       = 'Add On';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['dataao']         = $this->monitoring_model->add_on()->row_array();
        $grafikao               = $this->monitoring_model->grafik_add_on()->result();
        $data['grafao']         = json_encode($grafikao);
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/monitoring/add_on',$data,true)
        ]);
    }

    public function showns($datel = 'all', $status = 'all')
    {
        $data['title'] 		= 'Monitorng';
        $data['subtitle'] 	= 'Datel '.strtoupper($datel).' | Status '.strtoupper($status);
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
		$data['rowdata']	= $this->monitoring_model->showns($datel,$status)->result_array();
		$this->load->view('template',[
            'content' => $this->load->view('provisioning/monitoring/show/ns',$data,true)
        ]);
    }

    public function showao($datel = 'all', $status = 'all')
    {
        $data['title'] 		= 'Monitorng';
        $data['subtitle'] 	= 'Datel '.strtoupper($datel).' | Status '.strtoupper($status);
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
		$data['rowdata']	= $this->monitoring_model->showao($datel,$status)->result_array();
		$this->load->view('template',[
            'content' => $this->load->view('provisioning/monitoring/show/ns',$data,true)
        ]);
    }

}

/* End of file Monitoring.php */
/* Location: ./application/controllers/provisioning/Monitoring.php */