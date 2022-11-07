<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_order extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect(base_url("auth"));
        }

        if (menuOrderProvi($this->session->userdata('level')) == false) {
            redirect(base_url("index.php/welcome"));
        }
    }

    public function index()
    {
        $data['title']             = 'Provisioning';
        $data['subtitle']         = 'Orders List';
        $data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
        $data['hdp']            = $this->provisioning_model->get_list_hd();
        $this->load->view('template', [
            'content' => $this->load->view('provisioning/data', $data, true)
        ]);
    }

    public function create_list()
    {
        $list = $this->provisioning_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $create) {

            $scnya = $create['sc_baru'];
            $cekba   = $this->db->query("SELECT sc FROM tb_ba_digital WHERE sc='" . $scnya . "'")->num_rows();

            if ($cekba <= 0) {
                $ba = "NOK";
            } else {
                $ba = "OK";
            }

            $no++;
            $odby = explode(" ", $create['nama_teknisi']);
            $hdp  = explode(" ", $create['nama_hd']);
            $time = explode(" ", $create['tgl_masuk']);
            $row = array();
            $row[] = $no;
            $row[] = substr($create['datel'], 0, 4);
            $row[] = substr($create['order_type'], 0, 8);
            $row[] = substr($create['layanan'], 0, 2);
            $row[] = $create['testing_voice'];
            $row[] = $create['testing_inet'];
            $row[] = $create['live_usee'];
            $row[] = $create['atas_nama'];
            $row[] = $create['voice'];
            $row[] = $create['internet'];
            $row[] = substr($create['sn'], 0, 17);
            $row[] = $create['sc_baru'];
            $row[] = $create['redaman'];
            $row[] = date_indo($time[0]) . ' ' . $time[1];
            $row[] = substr($odby[0], 0, 5);
            $row[] = $create['hd_penerima'] == '' ? $create['fullname'] : substr($hdp[0], 0, 7);
            $row[] = statusProvi($create['status_id']);
            $row[] = $ba;
            $row[] = $create['failwa'] == 0 ? "-" : "FAILWA";

            if (cannotDelete($this->session->userdata('level'))) {
                $row[] = '<a class="btn btn-minier btn-primary" href="javascript:void(0)" title="Follow UP" onclick="follow_up(' . "'" . $create['create_id'] . "'" . ')"><i class="fa fa-edit"></i></a>';
            } else {
                $row[] = '<a class="btn btn-minier btn-primary" href="javascript:void(0)" title="Follow UP" onclick="follow_up(' . "'" . $create['create_id'] . "'" . ')"><i class="fa fa-edit"></i></a> <a class="btn btn-minier btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_data(' . "'" . $create['create_id'] . "'" . ')"><i class="fa fa-trash"></i></a>';
            }

            $data[] = $row;
        }

        $output = array(

            "draw" => $_POST['draw'],
            "recordsTotal" => $this->provisioning_model->count_all(),
            "recordsFiltered" => $this->provisioning_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function detail($id)
    {
        $data = $this->provisioning_model->get_by_id($id);
        echo json_encode($data);
    }

    public function update()
    {
        $dtodp      = $this->input->post('odp');
        $dtsc       = str_replace(' ', '', $this->input->post('sc'));
        $pecah      = explode(":", $dtodp);
        $pecahsc    = explode("/", $dtsc);
        $odp        = $pecah[0];
        $port       = $pecah[1];
        $sisa       = $pecah[2];
        $sclama     = $pecahsc[0];
        $scbaru     = $pecahsc[1];
        $pesanhd    = $this->input->post('pesan');
        $updateby   = $this->session->userdata('nama');
        $meid       = $this->input->post('meid');
        $telegram_id = $this->input->post('grid');

        if ($pesanhd != "") {
            $message_text = "$pesanhd \n\n";
            $message_text .= "~$updateby";
            sendMessage($telegram_id, $message_text, $meid);
        }

        if (empty($this->input->post('status_update'))) {
            if ($this->input->post('status') == 'ps') {
                $data = array(
                    'sc_baru'       => $scbaru,
                    'tgl_ps'        => $this->input->post('tgl_ps'),
                    'tgl_update'    => date('Y-m-d H:i:s'),
                    'failwa'        => $this->input->post('failwa'),
                    'updated_by'    => $this->session->userdata('user_id')
                );
            } else {
                $data = array(
                    'sc_baru'       => $scbaru,
                    'voice'         => $this->input->post('telepon'),
                    'atas_nama'     => $this->input->post('atas_nama'),
                    'datel'         => $this->input->post('datel'),
                    'order_type'    => strtoupper($this->input->post('order')),
                    'testing_voice' => strtoupper($this->input->post('testing_voice')),
                    'testing_inet'  => strtoupper($this->input->post('testing_inet')),
                    'live_usee'      => strtoupper($this->input->post('live_usee')),
                    'layanan'       => strtoupper($this->input->post('layanan')),
                    'internet'      => $this->input->post('inet'),
                    'odp'           => $odp,
                    'port'          => $port,
                    'sisa'          => $sisa,
                    'failwa'        => $this->input->post('failwa'),
                    'sn'            => $this->input->post('sn'),
                    'redaman'       => $this->input->post('redaman'),
                    'tgl_update'    => date('Y-m-d H:i:s'),
                    'updated_by'    => $this->session->userdata('user_id')
                );
            }
            $usales = array(
                'keterangan'    => $this->input->post('ket'),
                'tgl_update'    => date('Y-m-d H:i:s')
            );
            $this->provisioning_model->update_sales(array('sales_id' => $this->input->post('sales_id')), $usales);
        } else {
            if (($this->input->post('status_update') == 'complete') || ($this->input->post('status_update') == 'fallout')) {
                $data = array(
                    'sc_baru'       => $scbaru,
                    'voice'         => $this->input->post('telepon'),
                    'atas_nama'     => $this->input->post('atas_nama'),
                    'datel'         => strtoupper($this->input->post('datel')),
                    'order_type'    => strtoupper($this->input->post('order')),
                    'testing_voice' => strtoupper($this->input->post('testing_voice')),
                    'testing_inet'  => strtoupper($this->input->post('testing_inet')),
                    'layanan'       => strtoupper($this->input->post('layanan')),
                    'live_usee'      => strtoupper($this->input->post('live_usee')),
                    'internet'      => $this->input->post('inet'),
                    'odp'           => $odp,
                    'port'          => $port,
                    'sisa'          => $sisa,
                    'failwa'        => $this->input->post('failwa'),
                    'sn'            => $this->input->post('sn'),
                    'status'        => $this->input->post('status_update'),
                    'status_id'     => $this->input->post('status_id'),
                    'ket_update'    => $this->input->post('ket'),
                    'redaman'       => $this->input->post('redaman'),
                    'tgl_update'    => date('Y-m-d H:i:s'),
                    'tgl_comp_fact' => date('Y-m-d H:i:s'),
                    'updated_by'    => $this->session->userdata('user_id')
                );
                if ($this->input->post('status_update') == 'complete') {
                    $action_status = 9;
                    $usales = array(
                        'status'        => 'complete',
                        'status_id'     => 9,
                        'keterangan'    => $this->input->post('ket'),
                        'tgl_update'    => date('Y-m-d H:i:s')
                    );
                    $this->provisioning_model->update_sales(array('sales_id' => $this->input->post('sales_id')), $usales);
                } elseif ($this->input->post('status_update') == 'fallout') {
                    $action_status = 8;
                    $usales = array(
                        'status'        => 'fallout',
                        'status_id'     => 8,
                        'keterangan'    => $this->input->post('ket'),
                        'tgl_update'    => date('Y-m-d H:i:s')
                    );
                    $this->provisioning_model->update_sales(array('sales_id' => $this->input->post('sales_id')), $usales);
                }
                $datalog = array(
                    'sales_id'      => $this->input->post('sales_id'),
                    'action_by'     => $this->session->userdata('nama'),
                    'action_on'     => date('Y-m-d H:i:s'),
                    'action_status' => $action_status,
                    'a_keterangan'  => $this->input->post('ket')
                );
                $this->db->insert('tb_log', $datalog);
            } elseif ($this->input->post('status_update') == 'progress') {
                $data = array(
                    'sc_baru'       => $scbaru,
                    'voice'         => $this->input->post('telepon'),
                    'atas_nama'     => $this->input->post('atas_nama'),
                    'datel'         => strtoupper($this->input->post('datel')),
                    'order_type'    => strtoupper($this->input->post('order')),
                    'testing_voice' => strtoupper($this->input->post('testing_voice')),
                    'testing_inet'  => strtoupper($this->input->post('testing_inet')),
                    'layanan'       => strtoupper($this->input->post('layanan')),
                    'live_usee'      => strtoupper($this->input->post('live_usee')),
                    'internet'      => $this->input->post('inet'),
                    'odp'           => $odp,
                    'port'          => $port,
                    'sisa'          => $sisa,
                    'failwa'        => $this->input->post('failwa'),
                    'sn'            => $this->input->post('sn'),
                    'status'        => $this->input->post('status_update'),
                    'status_id'     => $this->input->post('status_id'),
                    'ket_update'    => $this->input->post('ket'),
                    'redaman'       => $this->input->post('redaman'),
                    'tgl_update'    => date('Y-m-d H:i:s'),
                    'updated_by'    => $this->session->userdata('user_id')
                );
                // update jarvis baru prog act
                $usales = array(
                    'status'        => 'prog act',
                    'status_id'     => 71,
                    'keterangan'    => $this->input->post('ket'),
                    'tgl_update'    => date('Y-m-d H:i:s')
                );
                $this->provisioning_model->update_sales(array('sales_id' => $this->input->post('sales_id')), $usales);
            } else {
                if ($this->input->post('status_update') == 'ps') {
                    $data = array(
                        'sc_baru'       => $scbaru,
                        'voice'         => $this->input->post('telepon'),
                        'atas_nama'     => $this->input->post('atas_nama'),
                        'datel'         => strtoupper($this->input->post('datel')),
                        'order_type'    => strtoupper($this->input->post('order')),
                        'testing_voice' => strtoupper($this->input->post('testing_voice')),
                        'testing_inet'  => strtoupper($this->input->post('testing_inet')),
                        'layanan'       => strtoupper($this->input->post('layanan')),
                        'live_usee'      => strtoupper($this->input->post('live_usee')),
                        'internet'      => $this->input->post('inet'),
                        'odp'           => $odp,
                        'port'          => $port,
                        'sisa'          => $sisa,
                        'failwa'        => $this->input->post('failwa'),
                        'sn'            => $this->input->post('sn'),
                        'status'        => $this->input->post('status_update'),
                        'status_id'     => $this->input->post('status_id'),
                        'ket_update'    => $this->input->post('ket'),
                        'redaman'       => $this->input->post('redaman'),
                        'tgl_update'    => date('Y-m-d H:i:s'),
                        'tgl_ps'        => $this->input->post('tgl_ps'),
                        'updated_by'    => $this->session->userdata('user_id')
                    );
                    $action_status = 10;
                    $datalog = array(
                        'sales_id'      => $this->input->post('sales_id'),
                        'action_by'     => $this->session->userdata('nama'),
                        'action_on'     => date('Y-m-d H:i:s'),
                        'action_status' => $action_status,
                        'a_keterangan'  => $this->input->post('ket')
                    );
                    $this->db->insert('tb_log', $datalog);

                    $usales = array(
                        'status'        => 'ps',
                        'status_id'     => 10,
                        'keterangan'    => $this->input->post('ket'),
                        'tgl_update'    => date('Y-m-d H:i:s')
                    );
                    $this->provisioning_model->update_sales(array('sales_id' => $this->input->post('sales_id')), $usales);
                } else {
                    $data = array(
                        'sc_baru'       => $scbaru,
                        'voice'         => $this->input->post('telepon'),
                        'atas_nama'     => $this->input->post('atas_nama'),
                        'datel'         => strtoupper($this->input->post('datel')),
                        'order_type'    => strtoupper($this->input->post('order')),
                        'testing_voice' => strtoupper($this->input->post('testing_voice')),
                        'testing_inet'  => strtoupper($this->input->post('testing_inet')),
                        'layanan'       => strtoupper($this->input->post('layanan')),
                        'live_usee'      => strtoupper($this->input->post('live_usee')),
                        'internet'      => $this->input->post('inet'),
                        'odp'           => $odp,
                        'port'          => $port,
                        'sisa'          => $sisa,
                        'failwa'        => $this->input->post('failwa'),
                        'sn'            => $this->input->post('sn'),
                        'status'        => $this->input->post('status_update'),
                        'status_id'     => $this->input->post('status_id'),
                        'ket_update'    => $this->input->post('ket'),
                        'redaman'       => $this->input->post('redaman'),
                        'tgl_update'    => date('Y-m-d H:i:s'),
                        'updated_by'    => $this->session->userdata('user_id')
                    );
                }
            }
        }

        $this->provisioning_model->update(array('create_id' => $this->input->post('id')), $data);
        echo json_encode(
            array(
                "status" => TRUE,
                'pesan' => '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Well done!</b> Data successfully updated!</div>'
            )
        );

        $status_or  = strtoupper($this->input->post('status_update'));
        $an         = str_replace("_", " ", $this->input->post('atas_nama'));
        $telp       = $this->input->post('telepon');
        $inet       = $this->input->post('inet');
        $sn         = $this->input->post('sn');
        $ket_up     = $this->input->post('ket');
        $dc         = $this->input->post('dc');
        $s_t_id     = $this->input->post('s_t_id');
        $s_m_id     = $this->input->post('s_m_id');

        if ($ket_up == null) {
            $ket_up = "-";
        } else {
            $ket_up = $ket_up;
        }

        if ($status_or == 'COMPLETE') {
            $message_text = "Order Status $status_or by $updateby\n\n";
            $message_text .= "Jangan Lupa IVR dan BA DIGITAL ya \n\n";
            $message_text .= "SC LAMA/BARU: $sclama / $scbaru  \n";
            $message_text .= "A/N: $an \n";
            $message_text .= "NO VOICE: $telp  \n";
            $message_text .= "NO INET: $inet \n";
            $message_text .= "ODP: $odp \n";
            $message_text .= "SN: $sn\n";
            $message_text .= "DC: $dc";
        } elseif ($status_or == 'PS') {
            $message_text = "Order Status $status_or by $updateby, selamat menikmati layanan 😎\n";
            $message_text .= "A/N: $an \n";
            $message_text .= "NO INET: $inet";
            sendMessageSales($s_t_id, $message_text, $s_m_id);
        } elseif ($status_or != 'FALLOUT DATA' || $status_or != 'LIVE') {
            $message_text = "Order Status $status_or by $updateby \n\n";
            $message_text .= "KET :\n";
            $message_text .= "$ket_up";
        }

        if ($status_or != "") {
            sendMessage($telegram_id, $message_text, $meid);
        }
    }

    public function delete($id)
    {
        $del = $this->provisioning_model->delete_by_id($id);
        if ($del) {
            $this->provisioning_model->delete_mat_by_id($id);
        }
        echo json_encode(
            array(
                "status" => TRUE,
                'pesan' => '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Well done!</b> Data successfully removed!</div>'
            )
        );
    }
}

/* End of file List_order.php */
/* Location: ./application/controllers/List_order.php */