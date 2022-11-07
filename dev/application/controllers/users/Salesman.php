<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salesman extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect(base_url("auth"));
        }

        if (menuUserBotSales($this->session->userdata('level')) == false) {
            redirect(base_url("index.php/welcome"));
        }
    }

    public function index()
    {
        $data['title']             = 'Users';
        $data['subtitle']         = 'Sales';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $this->load->view('template', [
            'content' => $this->load->view('users/sales/data', $data, true)
        ]);
    }

    public function users_list()
    {
        $list = $this->salesman_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $users) {
            $no++;
            $row = array();
            $row[] = '<label class="pos-rel">
						<input type="checkbox" class="ace" id="check-item" name="idtele[]" value="' . $users->s_telegram_id . '" />
						<span class="lbl"></span>
					</label>';
            $row[] = $users->fullname;
            $row[] = $users->no_hp;
            $row[] = $users->kode;
            $row[] = $users->mitra;
            $row[] = $users->active == 1 ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Blocked</span>';

            if (cannotDelete($this->session->userdata('level'))) {
                $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users(' . "'" . $users->s_telegram_id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            } else {
                $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users(' . "'" . $users->s_telegram_id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                      <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users(' . "'" . $users->s_telegram_id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->salesman_model->count_all(),
            "recordsFiltered" => $this->salesman_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function users_edit($id)
    {
        $data = $this->salesman_model->get_by_id($id);
        echo json_encode($data);
    }

    public function users_update()
    {
        $this->_validate();
        $data = array(
            'fullname'         => $this->input->post('fullname'),
            'active'         => $this->input->post('active'),
        );
        $this->salesman_model->update(array('s_telegram_id' => $this->input->post('id')), $data);
        echo json_encode(
            array(
                "status" => TRUE,
                'pesan' => '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Well done!</b> User successfully changed!</div>'
            )
        );
    }

    public function users_delete($id)
    {
        $this->salesman_model->delete_by_id($id);
        echo json_encode(
            array(
                "status" => TRUE,
                'pesan' => '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Well done!</b> User successfully removed!</div>'
            )
        );
    }

    public function approve_user()
    {
        $user_ids     = $this->input->post('user_ids');
        $list        = implode(",", $user_ids);
        $pecah        = explode(",", $list);
        $totalData  = sizeof($pecah);
        $index         = 0;

        $datas = array(
            'active' => 1
        );

        for ($i = 0; $i < $totalData; $i++) {
            $cek = $this->db->query("SELECT s_telegram_id FROM tb_salesman WHERE s_telegram_id='" . $pecah[$index] . "' AND active = 1")->num_rows();
            if ($cek <= 0) {
                $this->db->update('tb_salesman', $datas, array('s_telegram_id' => $pecah[$index]));
                $query = $this->db->get_where('tb_salesman', array('s_telegram_id' => $pecah[$index]))->row_array();
                $message_text = "Salam $query[fullname], kamu telah diapprove sebagai Sales.. Selamat Bekerja :)";
                sendChat($pecah[$index], $message_text);
                $index++;
            }
        }

        echo json_encode(
            array(
                "status" => TRUE,
                'pesan' => '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Well done!</b> ' . $totalData . ' User successfully activated!</div>'
            )
        );
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('fullname') == '') {
            $data['inputerror'][] = 'fullname';
            $data['error_string'][] = 'Nama Sales is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
}

/* End of file Salesman.php */
/* Location: ./application/controllers/users/Salesman.php */