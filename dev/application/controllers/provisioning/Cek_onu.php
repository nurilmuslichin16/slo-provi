<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_onu extends MY_Controller {

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
		$data['subtitle'] 	    = 'Cek ONU';
        $data['odwaittoday']    = $this->dashboard_model->request_today()->row_array();
        $this->load->view('template',[
			'content' => $this->load->view('provisioning/cek_onu/data',$data,true)
		]);
	}

	public function create_list()
    {
        $list = $this->cek_onu_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $create) {
            $no++;
            $time = explode(" ", $create['created_at']);
            $row = array();
            $row[] = $no;
            $row[] = 'JA'.$create['sales_id'];
            $row[] = $create['nama_pelanggan'];
            $row[] = $create['cp'];
            $row[] = $create['odp'];
            $row[] = date_indo($time[0]).' '.$time[1];
            $row[] = $create['req_by'];
            $row[] = $create['fullname'];
 			$row[] = $create['status'];
            if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5) {
                $row[] = '<a class="btn btn-minier btn-primary" href="javascript:void(0)" title="Follow UP" onclick="follow_up('."'".$create['cekonu_id']."'".')"><i class="fa fa-edit"></i></a>

                <a class="btn btn-minier btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_data('."'".$create['cekonu_id']."'".')"><i class="fa fa-trash"></i></a>';
            }
            else {
                $row[] = '<a class="btn btn-minier btn-primary" href="javascript:void(0)" title="Follow UP" onclick="follow_up('."'".$create['cekonu_id']."'".')"><i class="fa fa-edit"></i></a>';
            }
            $data[] = $row;
        }

        $output = array(

                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->cek_onu_model->count_all(),
                        "recordsFiltered" => $this->cek_onu_model->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
    }

    public function detail($id)
    {
        $data = $this->cek_onu_model->get_by_id($id);
        echo json_encode($data);
    }

    public function update()
    {
        $status     = $this->input->post('status_update');
        $pesanhd    = $this->input->post('pesan');
        $updateby   = $this->session->userdata('nama');
        $meid       = $this->input->post('meid');
        $telegram_id = $this->input->post('grid');

        if ($pesanhd != "") {
            $message_text = "$pesanhd \n\n";
            $message_text .= "~$updateby";
            sendMessage($telegram_id, $message_text, $meid);
        }

        $data = array(
            'status'       => $status,
            'keterangan'   => $this->input->post('ket'),
            'updated_by'    => $this->session->userdata('user_id')
        );

        $this->cek_onu_model->update(array('cekonu_id' => $this->input->post('id')), $data);
        echo json_encode(
            array(
                "status" => TRUE,
                'pesan'=>'<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Well done!</b> Data successfully updated!</div>'
            )
        );

        $status_or  = strtoupper($this->input->post('status_update'));
        $ket_up     = $this->input->post('ket');

        if ($ket_up == null) {
            $ket_up = "-";
        }
        else{
            $ket_up = $ket_up;
        }

        if ($status_or != "") {
            $message_text = "Order Status $status_or by $updateby \n\n";
            $message_text .= "KET :\n";
            $message_text .= "$ket_up";
            sendMessage($telegram_id, $message_text, $meid);
        }
    }

    public function delete($id)
    {
        $del = $this->cek_onu_model->delete_by_id($id);
        if ($del) {
            $this->cek_onu_model->delete_mat_by_id($id);
        }
        echo json_encode(
            array(
                "status" => TRUE,
                'pesan'=>'<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Well done!</b> Data successfully removed!</div>'
            )
        );
    }

}

/* End of file Cek_onu.php */
/* Location: ./application/controllers/Cek_onu.php */