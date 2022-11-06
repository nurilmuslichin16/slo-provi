<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helpdesk extends MY_Controller {

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
		$data['title'] 		    = 'Users';
		$data['subtitle'] 	    = 'Help Desk';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $this->load->view('template',[
			'content' => $this->load->view('users/hd/data',$data,true)
		]);
	}

	public function users_list()
    {
        $list = $this->helpdesk_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $users) {
            $no++;
            $row = array();
            $row[] = '<label class="pos-rel">
						<input type="checkbox" class="ace" id="check-item" name="idtele[]" value="'.$users->h_telegram_id.'" />
						<span class="lbl"></span>
					</label>';
            $row[] = $users->nama_hd;
            $row[] = $users->active == 1 ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Blocked</span>';

            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$users->h_telegram_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$users->h_telegram_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->helpdesk_model->count_all(),
                        "recordsFiltered" => $this->helpdesk_model->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
    }

    public function users_edit($id)
    {
        $data = $this->helpdesk_model->get_by_id($id);
        echo json_encode($data);
    }

    public function users_update()
    {
        $this->_validate();
        $data = array(
                'nama_hd' 		=> $this->input->post('nama_hd'),
                'active' 		=> $this->input->post('active'),
            );
        $this->helpdesk_model->update(array('h_telegram_id' => $this->input->post('id')), $data);
        echo json_encode(
        	array(
        		"status" => TRUE,
        		'pesan'=>'<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Well done!</b> User successfully changed!</div>'
        	)
        );
    }

    public function users_delete($id)
    {
        $this->helpdesk_model->delete_by_id($id);
        echo json_encode(
        	array(
        		"status" => TRUE,
        		'pesan'=>'<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Well done!</b> User successfully removed!</div>'
        	)
        );
    }

    public function approve_user()
	{
		$user_ids 	= $this->input->post('user_ids');
		$list    	= implode(",", $user_ids);
		$pecah		= explode(",", $list);
		$totalData  = sizeof($pecah);
		$index 		= 0;

		$datas = array(
	    	'active' => 1
	    );

		for ($i=0; $i < $totalData; $i++) {
			$cek = $this->db->query("SELECT h_telegram_id FROM tb_helpdesk WHERE h_telegram_id='".$pecah[$index]."' AND active = 1")->num_rows();
			if ($cek <= 0) {
				$this->db->update('tb_helpdesk', $datas, array('h_telegram_id' => $pecah[$index]));
				$query = $this->db->get_where('tb_helpdesk', array('h_telegram_id' => $pecah[$index]))->row_array();
				$message_text = "Salam $query[nama_hd], kamu telah diapprove sebagai Help Desk.. Selamat Bekerja :)";
				sendChat($pecah[$index], $message_text);
				$index++;
			}
		}

		echo json_encode(
        	array(
        		"status" => TRUE,
        		'pesan'=>'<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Well done!</b> '.$totalData.' User successfully activated!</div>'
        	)
        );
	}

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama_hd') == '')
        {
            $data['inputerror'][] = 'nama_hd';
            $data['error_string'][] = 'Nama HD is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}

/* End of file Helpdesk.php */
/* Location: ./application/controllers/users/Helpdesk.php */