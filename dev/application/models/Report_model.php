<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	public function search_provi($fdatel,$fstatus,$fstartdate,$fenddate)
	{
                $this->db->select('tb_provisioning.*,tb_material.*,tb_users.fullname,tb_teknisi.nama_teknisi,tb_helpdesk.nama_hd');
                $this->db->from('tb_provisioning');
                $this->db->join('tb_users', 'tb_users.users_id = tb_provisioning.updated_by','left');
                $this->db->join('tb_teknisi', 'tb_teknisi.t_telegram_id = tb_provisioning.post_by','left');
                $this->db->join('tb_helpdesk', 'tb_helpdesk.h_telegram_id = tb_provisioning.hd_penerima','left');
                $this->db->join('tb_material', 'tb_material.create_id = tb_provisioning.create_id');
                if ($fdatel != 'all') {
                	$this->db->where('tb_provisioning.datel', $fdatel);
                }
                if ($fstatus != 'all') {
                	$this->db->where('tb_provisioning.status_id', $fstatus);
                }
                $this->db->where('DATE(tb_provisioning.tgl_masuk) >=',$fstartdate);
        	$this->db->where('DATE(tb_provisioning.tgl_masuk) <=',$fenddate);
                $this->db->order_by('tb_provisioning.create_id', 'desc');
                return $this->db->get();
        }
        
        public function today()
	{
                $this->db->select('tb_provisioning.*,tb_material.*,tb_users.fullname,tb_teknisi.nama_teknisi,tb_helpdesk.nama_hd');
                $this->db->from('tb_provisioning');
                $this->db->join('tb_users', 'tb_users.users_id = tb_provisioning.updated_by','left');
                $this->db->join('tb_teknisi', 'tb_teknisi.t_telegram_id = tb_provisioning.post_by','left');
                $this->db->join('tb_helpdesk', 'tb_helpdesk.h_telegram_id = tb_provisioning.hd_penerima','left');
                $this->db->join('tb_material', 'tb_material.create_id = tb_provisioning.create_id');
                $where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null)";
                $this->db->where($where);
                $this->db->order_by('tb_provisioning.create_id', 'desc');
                return $this->db->get();
	}

        public function search_material($fdatel,$forder,$fstartdate,$fenddate)
        {
                $this->db->select('tb_material.*,tb_provisioning.*,tb_teknisi.nama_teknisi');
                $this->db->from('tb_material');
                $this->db->join('tb_provisioning', 'tb_provisioning.create_id = tb_material.create_id');
                $this->db->join('tb_teknisi', 'tb_teknisi.t_telegram_id = tb_provisioning.post_by','left');
                if ($fdatel != 'all' && $forder != 'all'){
                        if ($forder == 'psb') {
                                $where = "(tb_provisioning.datel = '$fdatel') AND (tb_provisioning.order_type = 'MYI' OR tb_provisioning.order_type = 'REGULER' OR tb_provisioning.order_type = 'GANTI PAKET' OR tb_provisioning.order_type = 'WIFI EXTENDER' OR tb_provisioning.order_type = '2nd STB' OR tb_provisioning.order_type = '2P-3P' OR tb_provisioning.order_type = 'PLC') AND (DATE(tb_provisioning.tgl_ps) >= '$fstartdate' AND DATE(tb_provisioning.tgl_ps) <= '$fenddate')";
                        }
                        elseif ($forder == 'mig') {
                                $where = "(tb_provisioning.datel = '$fdatel') AND (tb_provisioning.order_type = 'MIG' OR tb_provisioning.order_type = 'MIG NAL') AND (DATE(tb_provisioning.tgl_ps) >= '$fstartdate' AND DATE(tb_provisioning.tgl_ps) <= '$fenddate') ";
                        }
                }
                else{
                        $where = "(tb_provisioning.order_type = 'MIG' OR tb_provisioning.order_type = 'MIG NAL' OR tb_provisioning.order_type = 'MYI' OR tb_provisioning.order_type = 'REGULER' OR tb_provisioning.order_type = 'GANTI PAKET' OR tb_provisioning.order_type = 'WIFI EXTENDER' OR tb_provisioning.order_type = '2nd STB' OR tb_provisioning.order_type = '2P-3P' OR tb_provisioning.order_type = 'PLC') AND (DATE(tb_provisioning.tgl_ps) >= '$fstartdate' AND DATE(tb_provisioning.tgl_ps) <= '$fenddate')";
                }
                $this->db->where($where);
                $this->db->order_by('tb_provisioning.create_id', 'desc');
                return $this->db->get();
        }

}

/* End of file Report_model.php */
/* Location: ./application/models/Report_model.php */