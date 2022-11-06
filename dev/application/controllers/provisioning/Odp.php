<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ODP extends MY_Controller {

	private $filename = "upload_odp_uim";

	public function __construct()
    {
		parent::__construct();
        if($this->session->userdata('logged_in') != TRUE){
            redirect(base_url("auth"));
        }
        if ($this->session->userdata('level') != 5) {
        	show_404();
        }
	}

	public function index()
	{
		echo "Forbidden!";
	}

	public function upload()
	{
		$data = array();
	    if(isset($_POST['preview'])){
	      $upload = $this->barcode_model->upload_file($this->filename);
	      if($upload['result'] == "success"){
	        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    	$loadexcel = PHPExcel_IOFactory::load('uploads/'.$this->filename.'.xlsx');
	    	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		    $data = array();
		    $data2 = array();

		    $numrow = 1;
		    foreach($sheet as $row){
		      if($numrow > 1){

		        $bc = $row['A'];

		        $this->db->from('tb_qrcode');
				$this->db->where('qrcode',$bc);
				$query = $this->db->get();
				$rowcount = $query->num_rows();

		        if ($rowcount <= 0) { //cek kalu belum ada maka $data, kalau sudah ada masuk $data2
		        	array_push($data, array(
			          'qrcode'	 => $bc
			        ));
		        }else{
		        	array_push($data2, array(
			          'qrcode'	 => $bc
			        ));
		        }
		      }
		      $numrow++;
		    }

		    if (!empty($data)) {
		    	$this->barcode_model->insert_multiple($data);
		    }

		    sizeof($data2);
		    $this->session->set_flashdata('info','<div class="alert alert-success" role="alert">'.sizeof($data).' odp berhasil ditambah. </div>');
		    redirect('provisioning/odp/upload');
	      }
	      else{
	        $data['upload_error'] = $upload['error'];
	      }
	    }
	    $data['title'] 		 = 'ODP';
		$data['subtitle'] 	 = 'Upload';
	    $this->load->view('template',[
			'content' => $this->load->view('provisioning/odp/upload',$data,true)
		]);
	}

}

/* End of file ODP.php */
/* Location: ./application/controllers/provisioning/ODP.php */