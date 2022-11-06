<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Material_model extends CI_Model
{

    var $table = 'tb_ba_digital';
    var $column_order = array(null, 'cli_id', 'no_voice');
    var $column_search = array('sc', 'nik_teknisi');
    var $order = array('ba_digital_id' => 'desc');

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function insert_multiple($data)
    {
        $this->db->insert_batch('tb_ba_digital', $data);
    }

    public function update_multiple($data2)
    {
        $this->db->update_batch('tb_ba_digital', $data2, 'sc');
    }

    public function upload_file($filename)
    {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['max_size']  = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    /* REPORT NEW SALES */
    public function report_ns()
    {
        $this->db->select("datel,

                SUM(CASE WHEN (datel='BYL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylblmba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxblmba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopblmba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldblmba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtblmba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktoblmba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msoblmba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sloblmba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karblmba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgblmba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhblmba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngblmba,

                SUM(CASE WHEN (datel='BYL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylsdhba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxsdhba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopsdhba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldsdhba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtsdhba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktosdhba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msosdhba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slosdhba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karsdhba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgsdhba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhsdhba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngsdhba,

                SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylgt,
                SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxgt,
                SUM(CASE WHEN (datel='SOP') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopgt,
                SUM(CASE WHEN (datel='GLD') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldgt,
                SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtgt,
                SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktogt,
                SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msogt,
                SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slogt,
                SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kargt,
                SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srggt,
                SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhgt,
                SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wnggt,

                SUM(CASE WHEN (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtblmba,
                SUM(CASE WHEN (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtsdhba,
                SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as allgt,


            ");
        $where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='REGULER' OR order_type='MYI')";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
        return $result;
    }

    public function viewnok($datel, $order)
    {
        if ($datel == 'all') {
            if ($order == 'ns') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (p.tgl_masuk >= CURDATE() OR p.tgl_update >= CURDATE() OR p.tgl_update < CURDATE() AND p.status_id!=7) AND (b.sc is null) AND (p.order_type='MYI' OR p.order_type='REGULER') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7)";
            } elseif ($order == 'mig') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (p.tgl_masuk >= CURDATE() OR p.tgl_update >= CURDATE() OR p.tgl_update < CURDATE() AND p.status_id!=7) AND (b.sc is null) AND (p.order_type='MIG' OR p.order_type='MIG NAL') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7)";
            } elseif ($order == 'ao') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (p.tgl_masuk >= CURDATE() OR p.tgl_update >= CURDATE() OR p.tgl_update < CURDATE() AND p.status_id!=7) AND (b.sc is null) AND (p.order_type='WIFI EXTENDER' OR p.order_type='GANTI PAKET' OR p.order_type='2nd STB' OR p.order_type='2P-3P' OR p.order_type='PLC') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7)";
            }
        } else {
            if ($order == 'ns') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (p.tgl_masuk >= CURDATE() OR p.tgl_update >= CURDATE() OR p.tgl_update < CURDATE() AND p.status_id!=7) AND (b.sc is null) AND (p.order_type='MYI' OR p.order_type='REGULER') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) AND (p.datel='$datel')";
            } elseif ($order == 'mig') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (p.tgl_masuk >= CURDATE() OR p.tgl_update >= CURDATE() OR p.tgl_update < CURDATE() AND p.status_id!=7) AND (b.sc is null) AND (p.order_type='MIG' OR p.order_type='MIG NAL') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) AND (p.datel='$datel')";
            } elseif ($order == 'ao') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (p.tgl_masuk >= CURDATE() OR p.tgl_update >= CURDATE() OR p.tgl_update < CURDATE() AND p.status_id!=7) AND (b.sc is null) AND (p.order_type='WIFI EXTENDER' OR p.order_type='GANTI PAKET' OR p.order_type='2nd STB' OR p.order_type='2P-3P' OR p.order_type='PLC') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) AND (p.datel='$datel')";
            }
        }
        return $query = $this->db->query($query)->result_array();
    }

    public function viewmnok($mitra, $order)
    {
        if ($mitra == 'all') {
            if ($order == 'mig') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (p.tgl_masuk >= CURDATE() OR p.tgl_update >= CURDATE() OR p.tgl_update < CURDATE() AND p.status_id!=7) AND (b.sc is null) AND (p.order_type='MIG' OR p.order_type='MIG NAL') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7)";
            }
        } else {
            if ($order == 'mig') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (p.tgl_masuk >= CURDATE() OR p.tgl_update >= CURDATE() OR p.tgl_update < CURDATE() AND p.status_id!=7) AND (b.sc is null) AND (p.order_type='MIG' OR p.order_type='MIG NAL') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) AND (p.mitra='$mitra')";
            }
        }
        return $query = $this->db->query($query)->result_array();
    }

    public function fviewnok($datel, $tahun, $bulan, $order)
    {
        if ($datel == 'all') {
            if ($order == 'ns') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (b.sc is null) AND (p.order_type='MYI' OR p.order_type='REGULER') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7)";
            } elseif ($order == 'mig') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (b.sc is null) AND (p.order_type='MIG' OR p.order_type='MIG NAL') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7)";
            } elseif ($order == 'ao') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (b.sc is null) AND (p.order_type='WIFI EXTENDER' OR p.order_type='GANTI PAKET' OR p.order_type='2nd STB' OR p.order_type='2P-3P' OR p.order_type='PLC') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7)";
            }
        } else {
            if ($order == 'ns') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (b.sc is null) AND (p.order_type='MYI' OR p.order_type='REGULER') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) AND (p.datel='$datel')";
            } elseif ($order == 'mig') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (b.sc is null) AND (p.order_type='MIG' OR p.order_type='MIG NAL') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) AND (p.datel='$datel')";
            } elseif ($order == 'ao') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (b.sc is null) AND (p.order_type='WIFI EXTENDER' OR p.order_type='GANTI PAKET' OR p.order_type='2nd STB' OR p.order_type='2P-3P' OR p.order_type='PLC') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) AND (p.datel='$datel')";
            }
        }
        return $query = $this->db->query($query)->result_array();
    }

    public function fviewmnok($mitra, $tahun, $bulan, $order)
    {
        if ($mitra == 'all') {
            if ($order == 'mig') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (b.sc is null) AND (p.order_type='MIG' OR p.order_type='MIG NAL') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7)";
            }
        } else {
            if ($order == 'mig') {
                $query = "SELECT p.*,b.sc,u.fullname,t.nama_teknisi
                    from tb_provisioning p
                    left join tb_ba_digital b on p.sc_baru=b.sc
                    left join tb_users u on u.users_id=p.updated_by
                    left join tb_teknisi t on t.t_telegram_id=p.post_by
                    where (MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (b.sc is null) AND (p.order_type='MIG' OR p.order_type='MIG NAL') AND (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) AND (p.mitra='$mitra')";
            }
        }
        return $query = $this->db->query($query)->result_array();
    }

    public function report_ns_fbulan($tahun, $bulan)
    {
        $this->db->select("datel,

               SUM(CASE WHEN (datel='BYL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylblmba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxblmba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopblmba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldblmba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtblmba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktoblmba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msoblmba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sloblmba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karblmba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgblmba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhblmba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngblmba,

                SUM(CASE WHEN (datel='BYL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylsdhba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxsdhba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopsdhba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldsdhba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtsdhba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktosdhba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msosdhba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slosdhba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karsdhba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgsdhba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhsdhba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngsdhba,

                SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylgt,
                SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxgt,
                SUM(CASE WHEN (datel='SOP') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopgt,
                SUM(CASE WHEN (datel='GLD') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldgt,
                SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtgt,
                SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktogt,
                SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msogt,
                SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slogt,
                SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kargt,
                SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srggt,
                SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhgt,
                SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wnggt,

                SUM(CASE WHEN (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtblmba,
                SUM(CASE WHEN (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtsdhba,
                SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as allgt,


            ");
        $where = "(MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (order_type='REGULER' OR order_type='MYI')";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
        return $result;
    }
    /* END REPORT NEW SALES */

    public function report_mig_datel()
    {
        $this->db->select("

                SUM(CASE WHEN (datel='BYL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylblmba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxblmba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopblmba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldblmba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtblmba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktoblmba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msoblmba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sloblmba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karblmba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgblmba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhblmba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngblmba,

                SUM(CASE WHEN (datel='BYL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylsdhba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxsdhba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopsdhba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldsdhba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtsdhba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktosdhba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msosdhba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slosdhba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karsdhba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgsdhba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhsdhba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngsdhba,

                SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylgt,
                SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxgt,
                SUM(CASE WHEN (datel='SOP') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopgt,
                SUM(CASE WHEN (datel='GLD') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldgt,
                SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtgt,
                SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktogt,
                SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msogt,
                SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slogt,
                SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kargt,
                SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srggt,
                SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhgt,
                SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wnggt,

                SUM(CASE WHEN (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtblmba,
                SUM(CASE WHEN (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtsdhba,
                SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as allgt,


            ");
        $where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='MIG' OR order_type='MIG NAL')";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
        return $result;
    }

    public function report_mig_mitra()
    {
        $this->db->select("

                SUM(CASE WHEN (mitra='HCP') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as hcpblmba,
                SUM(CASE WHEN (mitra='KOPEGTEL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kopegblmba,
                SUM(CASE WHEN (mitra='NUTEL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as nutelblmba,
                SUM(CASE WHEN (mitra='ZAG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as zagblmba,
                SUM(CASE WHEN (mitra='SMSI') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as smsiblmba,
                SUM(CASE WHEN (mitra='TKM') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tkmblmba,
                SUM(CASE WHEN (mitra='TA') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tablmba,
                SUM(CASE WHEN (mitra='GLOBAL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as globalblmba,
                SUM(CASE WHEN (mitra='KES') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kesblmba,

                SUM(CASE WHEN (mitra='HCP') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as hcpsdhba,
                SUM(CASE WHEN (mitra='KOPEGTEL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kopegsdhba,
                SUM(CASE WHEN (mitra='NUTEL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as nutelsdhba,
                SUM(CASE WHEN (mitra='ZAG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as zagsdhba,
                SUM(CASE WHEN (mitra='SMSI') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as smsisdhba,
                SUM(CASE WHEN (mitra='TKM') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tkmsdhba,
                SUM(CASE WHEN (mitra='TA') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tasdhba,
                SUM(CASE WHEN (mitra='GLOBAL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as globalsdhba,
                SUM(CASE WHEN (mitra='KES') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kessdhba,

                SUM(CASE WHEN (mitra='HCP') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as hcpgt,
                SUM(CASE WHEN (mitra='KOPEGTEL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kopeggt,
                SUM(CASE WHEN (mitra='NUTEL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as nutelgt,
                SUM(CASE WHEN (mitra='ZAG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as zaggt,
                SUM(CASE WHEN (mitra='SMSI') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as smsigt,
                SUM(CASE WHEN (mitra='TKM') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tkmgt,
                SUM(CASE WHEN (mitra='TA') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tagt,
                SUM(CASE WHEN (mitra='GLOBAL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as globalgt,
                SUM(CASE WHEN (mitra='KES') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kesgt,

                SUM(CASE WHEN (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtblmba,
                SUM(CASE WHEN (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtsdhba,
                SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as allgt,


            ");
        $where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='MIG' OR order_type='MIG NAL')";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
        return $result;
    }

    public function report_mig_fbulan($tahun, $bulan)
    {
        $this->db->select("datel,

                SUM(CASE WHEN (datel='BYL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylblmba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxblmba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopblmba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldblmba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtblmba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktoblmba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msoblmba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sloblmba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karblmba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgblmba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhblmba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngblmba,

                SUM(CASE WHEN (datel='BYL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylsdhba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxsdhba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopsdhba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldsdhba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtsdhba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktosdhba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msosdhba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slosdhba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karsdhba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgsdhba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhsdhba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngsdhba,

                SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylgt,
                SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxgt,
                SUM(CASE WHEN (datel='SOP') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopgt,
                SUM(CASE WHEN (datel='GLD') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldgt,
                SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtgt,
                SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktogt,
                SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msogt,
                SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slogt,
                SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kargt,
                SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srggt,
                SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhgt,
                SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wnggt,

                SUM(CASE WHEN (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtblmba,
                SUM(CASE WHEN (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtsdhba,
                SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as allgt,


            ");
        $where = "(MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (order_type='MIG' OR order_type='MIG NAL')";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
        return $result;
    }

    public function report_mig_mitra_fbulan($tahun, $bulan)
    {
        $this->db->select("

                SUM(CASE WHEN (mitra='HCP') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as hcpblmba,
                SUM(CASE WHEN (mitra='KOPEGTEL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kopegblmba,
                SUM(CASE WHEN (mitra='NUTEL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as nutelblmba,
                SUM(CASE WHEN (mitra='ZAG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as zagblmba,
                SUM(CASE WHEN (mitra='SMSI') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as smsiblmba,
                SUM(CASE WHEN (mitra='TKM') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tkmblmba,
                SUM(CASE WHEN (mitra='TA') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tablmba,
                SUM(CASE WHEN (mitra='GLOBAL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as globalblmba,
                SUM(CASE WHEN (mitra='KES') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kesblmba,

                SUM(CASE WHEN (mitra='HCP') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as hcpsdhba,
                SUM(CASE WHEN (mitra='KOPEGTEL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kopegsdhba,
                SUM(CASE WHEN (mitra='NUTEL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as nutelsdhba,
                SUM(CASE WHEN (mitra='ZAG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as zagsdhba,
                SUM(CASE WHEN (mitra='SMSI') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as smsisdhba,
                SUM(CASE WHEN (mitra='TKM') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tkmsdhba,
                SUM(CASE WHEN (mitra='TA') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tasdhba,
                SUM(CASE WHEN (mitra='GLOBAL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as globalsdhba,
                SUM(CASE WHEN (mitra='KES') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kessdhba,

                SUM(CASE WHEN (mitra='HCP') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as hcpgt,
                SUM(CASE WHEN (mitra='KOPEGTEL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kopeggt,
                SUM(CASE WHEN (mitra='NUTEL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as nutelgt,
                SUM(CASE WHEN (mitra='ZAG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as zaggt,
                SUM(CASE WHEN (mitra='SMSI') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as smsigt,
                SUM(CASE WHEN (mitra='TKM') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tkmgt,
                SUM(CASE WHEN (mitra='TA') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as tagt,
                SUM(CASE WHEN (mitra='GLOBAL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as globalgt,
                SUM(CASE WHEN (mitra='KES') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kesgt,

                SUM(CASE WHEN (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtblmba,
                SUM(CASE WHEN (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtsdhba,
                SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as allgt,


            ");
        $where = "(MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (order_type='MIG' OR order_type='MIG NAL')";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
        return $result;
    }

    public function report_ao()
    {
        $this->db->select("datel,

                SUM(CASE WHEN (datel='BYL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylblmba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxblmba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopblmba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldblmba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtblmba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktoblmba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msoblmba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sloblmba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karblmba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgblmba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhblmba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngblmba,

                SUM(CASE WHEN (datel='BYL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylsdhba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxsdhba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopsdhba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldsdhba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtsdhba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktosdhba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msosdhba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slosdhba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karsdhba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgsdhba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhsdhba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngsdhba,

                SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylgt,
                SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxgt,
                SUM(CASE WHEN (datel='SOP') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopgt,
                SUM(CASE WHEN (datel='GLD') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldgt,
                SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtgt,
                SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktogt,
                SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msogt,
                SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slogt,
                SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kargt,
                SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srggt,
                SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhgt,
                SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wnggt,

                SUM(CASE WHEN (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtblmba,
                SUM(CASE WHEN (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtsdhba,
                SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as allgt,


            ");
        $where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='WIFI EXTENDER' OR order_type='GANTI PAKET' OR order_type='2nd STB' OR order_type='2P-3P' OR order_type='PLC')";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
        return $result;
    }

    public function report_ao_fbulan($tahun, $bulan)
    {
        $this->db->select("datel,

                SUM(CASE WHEN (datel='BYL') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylblmba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxblmba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopblmba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldblmba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtblmba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktoblmba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msoblmba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sloblmba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karblmba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgblmba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhblmba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngblmba,

                SUM(CASE WHEN (datel='BYL') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylsdhba,
                SUM(CASE WHEN (datel='KLX') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxsdhba,
                SUM(CASE WHEN (datel='SOP') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopsdhba,
                SUM(CASE WHEN (datel='GLD') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldsdhba,
                SUM(CASE WHEN (datel='KRT') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtsdhba,
                SUM(CASE WHEN (datel='KTO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktosdhba,
                SUM(CASE WHEN (datel='MSO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msosdhba,
                SUM(CASE WHEN (datel='SLO') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slosdhba,
                SUM(CASE WHEN (datel='KAR') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as karsdhba,
                SUM(CASE WHEN (datel='SRG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srgsdhba,
                SUM(CASE WHEN (datel='SKH') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhsdhba,
                SUM(CASE WHEN (datel='WNG') AND (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wngsdhba,

                SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as bylgt,
                SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as klxgt,
                SUM(CASE WHEN (datel='SOP') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as sopgt,
                SUM(CASE WHEN (datel='GLD') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gldgt,
                SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as krtgt,
                SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as ktogt,
                SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as msogt,
                SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as slogt,
                SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as kargt,
                SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as srggt,
                SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as skhgt,
                SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as wnggt,

                SUM(CASE WHEN (sc_baru NOT IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtblmba,
                SUM(CASE WHEN (sc_baru IN (SELECT sc FROM tb_ba_digital)) AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as gtsdhba,
                SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as allgt,


            ");
        $where = "(MONTH(DATE(tgl_masuk)) = '$bulan' AND YEAR(DATE(tgl_masuk)) = '$tahun') AND (order_type='WIFI EXTENDER' OR order_type='GANTI PAKET' OR order_type='2nd STB' OR order_type='2P-3P' OR order_type='PLC')";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
        return $result;
    }
}

/* End of file Material_model.php */
/* Location: ./application/models/Material_model.php */