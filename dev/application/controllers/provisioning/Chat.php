<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MY_Controller {

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
		$data['subtitle'] 	    = 'Chat';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $this->load->view('template',[
			'content' => $this->load->view('provisioning/chat/form',$data,true)
		]);
	}

	public function post()
	{
		
		$post = $this->input->post(NULL, TRUE);

		$isipesan = $post['isipesan'];
		$isipesan .= "\n\n ~Admin Jarvis";
		$grup 	  = $post['grup'];

		$kirim = sendChat($grup,$isipesan);

		if ($kirim) {
			$this->session->set_flashdata('info','<div class="alert alert-success" role="alert">Pesan Terkirim!</div>');
				redirect('provisioning/chat','refresh');
		}
		else{
			$this->session->set_flashdata('info','<div class="alert alert-danger" role="alert">Gagal Mengirim Pesan!</div>');
				redirect('provisioning/chat','refresh');
		}
	}

}

/* End of file Chat.php */
/* Location: ./application/controllers/provisioning/Chat.php */