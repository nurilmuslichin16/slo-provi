<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ba_online extends MY_Controller {

	private $filename = "upload_badig";

	public function __construct()
    {
		parent::__construct();
        if($this->session->userdata('logged_in') != TRUE){
            redirect(base_url("auth"));
        }
	}

	public function index()
	{
		$data['title'] 		= 'BA Material';
		$data['subtitle'] 	= 'Data';
		$data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
		$this->load->view('template',[
			'content' => $this->load->view('provisioning/ba/data',$data,true)
		]);
	}

	public function ba_list()
	{

		$list = $this->material_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $tampil) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $tampil->sc;
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->material_model->count_all(),
                        "recordsFiltered" => $this->material_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function upload()
	{
		$data = array();
	    if(isset($_POST['preview'])){
	      $upload = $this->material_model->upload_file($this->filename);
	      if($upload['result'] == "success"){
	        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    	$loadexcel = PHPExcel_IOFactory::load('uploads/'.$this->filename.'.xls');
	    	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		    $data = array();
		    $data2 = array();

		    $numrow = 1;
		    foreach($sheet as $row){
		      if($numrow > 1){

		        $sc = intval(preg_replace('/[^0-9]+/', '', $row['H']), 10);

		        $ceksc   = $this->db->query("SELECT * FROM tb_ba_digital WHERE sc='".$sc."'")->num_rows();

		        if ($ceksc <= 0) { //cek kalu belum ada maka $data, kalau sudah ada masuk $data2
		        	array_push($data, array(
			          'sc'	 => $sc
			        ));
		        }else{
		        	array_push($data2, array(
			          'sc'	 => $sc
			        ));
		        }
		      }
		      $numrow++;
		    }
		    //echo '<pre>' , var_dump($data) , '</pre>';
		    if (!empty($data)) {
		    	$this->material_model->insert_multiple($data);
		    	// if (!empty($data2)) {
		    	// 	$this->material_model->update_multiple($data2);
		    	// }
		    	$this->session->set_flashdata('info','<div class="alert alert-success" role="alert"> Import data berhasil dilakukan!</div>');
		    }else{
		    	//$this->material_model->update_multiple($data2);
		    	$this->session->set_flashdata('info','<div class="alert alert-warning" role="alert"> Semua data yang diupload sudah ada pada sistem!</div>');
		    }
		    redirect('provisioning/ba_online');
	      }
	      else{
	        $data['upload_error'] = $upload['error'];
	      }
	    }
	    $data['title'] 		 = 'BA Online';
		$data['subtitle'] 	 = 'Upload Data';
		$data['odwaittoday'] = $this->dashboard_model->waiting_today()->row_array();
	    $this->load->view('template',[
			'content' => $this->load->view('provisioning/ba/upload_form',$data,true)
		]);
	}

	/* REPORT NEW SALES */
	public function report_ns()
	{
		$data['title'] 		    = 'Material Report';
		$data['subtitle'] 	    = 'New Sales';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['rns']     	    = $this->material_model->report_ns()->row_array();
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/new_sales',$data,true)
        ]);
	}

	public function report_ns_filter()
	{
		$data['title'] 		    = 'Material Report';
		$data['subtitle'] 	    = 'New Sales';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
		$get = $this->input->get(NULL,TRUE);
		$data['bulan']			= bulan($get['fbulan']);
		$data['tahun']			= $get['ftahun'];
		$data['month']			= $get['fbulan'];
		$data['rns'] = $this->material_model->report_ns_fbulan($get['ftahun'],$get['fbulan'])->row_array();
		$this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/new_sales_filter',$data,true)
        ]);
	}

	public function viewnok()
	{
		$get = $this->input->get(NULL,TRUE);
		$datel = $get['datel'];
		$order = $get['order'];
		$data['title'] 		    = 'View BA NOK';
		$data['subtitle'] 	    = $datel;
		$data['datas'] 			= $this->material_model->viewnok($datel,$order);
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/view/new_sales',$data,true)
        ]);
	}

	public function viewmnok()
	{
		$get = $this->input->get(NULL,TRUE);
		$mitra = $get['mitra'];
		$order = $get['order'];
		$data['title'] 		    = 'View BA NOK '.$mitra.'';
		$data['subtitle'] 	    = $mitra;
		$data['datas'] 			= $this->material_model->viewmnok($mitra,$order);
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/view/new_sales',$data,true)
        ]);
	}

	public function fviewnok()
	{
		$get = $this->input->get(NULL,TRUE);
		$datel = $get['datel'];
		$tahun = $get['tahun'];
		$bulan = $get['bulan'];
		$order = $get['order'];
		$month = bulan($get['bulan']);
		$data['title'] 		    = 'View BA NOK';
		$data['subtitle'] 	    = $datel.' '.$month.' '.$tahun;
		$data['datas'] 			= $this->material_model->fviewnok($datel,$tahun,$bulan,$order);
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/view/new_sales',$data,true)
        ]);
	}

	public function fviewmnok()
	{
		$get = $this->input->get(NULL,TRUE);
		$mitra = $get['mitra'];
		$tahun = $get['tahun'];
		$bulan = $get['bulan'];
		$order = $get['order'];
		$month = bulan($get['bulan']);
		$data['title'] 		    = 'View BA NOK '.$mitra.'';
		$data['subtitle'] 	    = $mitra.' '.$month.' '.$tahun;
		$data['datas'] 			= $this->material_model->fviewmnok($mitra,$tahun,$bulan,$order);
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/view/new_sales',$data,true)
        ]);
	}
	/* END REPORT NEW SALES */

	/* REPORT MIGRASI */
	public function report_mig_datel()
	{
		$data['title'] 		    = 'Material Report';
		$data['subtitle'] 	    = 'Migrasi Datel';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['rmig']     	    = $this->material_model->report_mig_datel()->row_array();
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/migrasi/datel',$data,true)
        ]);
	}

	public function report_mig_filter()
	{
		$data['title'] 		    = 'BA Material Report';
		$data['subtitle'] 	    = 'Migrasi';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
		$get = $this->input->get(NULL,TRUE);
		$data['bulan']			= bulan($get['fbulan']);
		$data['tahun']			= $get['ftahun'];
		$data['month']			= $get['fbulan'];
		$data['rmig'] = $this->material_model->report_mig_fbulan($get['ftahun'],$get['fbulan'])->row_array();
		$this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/migrasi/datel_filter',$data,true)
        ]);
	}

	public function report_mig_mitra()
	{
		$data['title'] 		    = 'Material Report';
		$data['subtitle'] 	    = 'Migrasi (Mitra)';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['rmit']     	    = $this->material_model->report_mig_mitra()->row_array();
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/migrasi/mitra',$data,true)
        ]);
	}

	public function report_mig_mitra_filter()
	{
		$data['title'] 		    = 'BA Material Report';
		$data['subtitle'] 	    = 'Migrasi (Mitra)';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
		$get = $this->input->get(NULL,TRUE);
		$data['bulan']			= bulan($get['fbulan']);
		$data['tahun']			= $get['ftahun'];
		$data['month']			= $get['fbulan'];
		$data['rmit'] = $this->material_model->report_mig_mitra_fbulan($get['ftahun'],$get['fbulan'])->row_array();
		$this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/migrasi/mitra_filter',$data,true)
        ]);
	}

	/* END REPORT MIGRASI */
	public function report_ao()
	{
		$data['title'] 		    = 'Material Report';
		$data['subtitle'] 	    = 'Addon';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['rao']     	    = $this->material_model->report_ao()->row_array();
        $this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/ao/ao',$data,true)
        ]);
	}

	public function report_ao_filter()
	{
		$data['title'] 		    = 'Material Report';
		$data['subtitle'] 	    = 'Addon';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
		$get = $this->input->get(NULL,TRUE);
		$data['bulan']			= bulan($get['fbulan']);
		$data['tahun']			= $get['ftahun'];
		$data['month']			= $get['fbulan'];
		$data['rao'] = $this->material_model->report_ao_fbulan($get['ftahun'],$get['fbulan'])->row_array();
		$this->load->view('template',[
            'content' => $this->load->view('provisioning/ba/report/ao/ao_filter',$data,true)
        ]);
	}

}

/* End of file Ba_online.php */
/* Location: ./application/controllers/provisioning/Ba_online.php */