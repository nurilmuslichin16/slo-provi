<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode extends MY_Controller {

	private $filename = "upload_bc";

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
		$data['title'] 		= 'Barcode';
		$data['subtitle'] 	= 'Data';
		$data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
		$this->load->view('template',[
			'content' => $this->load->view('provisioning/barcode/data',$data,true)
		]);
	}

	public function bc_list()
	{

		$list = $this->barcode_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $tampil) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $tampil->qrcode;
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->barcode_model->count_all(),
                        "recordsFiltered" => $this->barcode_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
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
		    	// if (!empty($data2)) {
		    	// 	$this->barcode_model->update_multiple($data2);
		    	// }
		    }// }else{
		    // 	$this->barcode_model->update_multiple($data2);
		    // }

		    
		    sizeof($data2);
		    $this->session->set_flashdata('info','<div class="alert alert-success" role="alert">'.sizeof($data).' barcode berhasil ditambah, '.sizeof($data2).' diupdate. </div>');
		    redirect('provisioning/barcode');
	      }
	      else{
	        $data['upload_error'] = $upload['error'];
	      }
	    }
	    $data['title'] 		 = 'Barcode';
		$data['subtitle'] 	 = 'Upload';
		$data['odwaittoday'] = $this->dashboard_model->waiting_today()->row_array();
	    $this->load->view('template',[
			'content' => $this->load->view('provisioning/barcode/upload',$data,true)
		]);
	}

	public function barcode_add()
	{
		$this->_validate();
        $data = array(
                'qrcode' 	=> $this->input->post('qrcode')
            );
        $insert = $this->barcode_model->save($data);
        echo json_encode(
            array(
                "status" => TRUE,
                'pesan'=>'<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Well done!</b> Barcode '.$this->input->post('qrcode').' successfully added!</div>'
            )
        );
	}

	private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
		$data['status'] = TRUE;
		$qrcode = $this->input->post('qrcode');
		$cek  = $this->db->query("SELECT qrcode FROM tb_qrcode where qrcode = '$qrcode'")->num_rows();
 
        if($this->input->post('qrcode') == '')
        {
            $data['inputerror'][] = 'qrcode';
            $data['error_string'][] = 'QRCODE is required';
            $data['status'] = FALSE;
		}
		if ($cek > 0) {
            $data['inputerror'][] = 'qrcode';
            $data['error_string'][] = ''.$qrcode.' already in use. Please use another QRCODE!';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}

/* End of file Barcode.php */
/* Location: ./application/controllers/provisioning/Barcode.php */