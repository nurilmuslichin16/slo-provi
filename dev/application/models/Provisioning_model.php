<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provisioning_model extends CI_Model {

	var $table = 'tb_provisioning';

    var $column_order = array(null,'datel','order_type',null,null,null,null,null,null,null,null,null,null,null,'tgl_masuk',null,'hd_penerima','status_id');

    var $column_search = array('order_type','sn','atas_nama','sc','odp','sc_baru');

    var $order = array('create_id' => 'desc');

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {
        //add custom filter here

        if($this->input->post('fdatel'))
        {
            $this->db->where('tb_provisioning.datel', $this->input->post('fdatel'));
        }

        if($this->input->post('fhd'))
        {
            $this->db->where('hd_penerima', $this->input->post('fhd'));
        }

        if($this->input->post('fstatus'))
        {
            $this->db->where('status_id', $this->input->post('fstatus'));
        }

        if($this->input->post('ftgl'))
        {
            $this->db->where('DATE(tgl_masuk)', $this->input->post('ftgl'));
        }
        
        if($this->input->post('fdatel') == '' && $this->input->post('fstatus') == '' && $this->input->post('fhd') == '' && $this->input->post('ftgl') == '' &&  $_POST['search']['value'] == null) {
            $where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null)";
            $this->db->where($where);
        }
        $this->db->select('tb_provisioning.*, tb_teknisi.nama_teknisi, tb_helpdesk.*, tb_users.fullname');
        $this->db->from($this->table);
        $this->db->join('tb_teknisi', 'tb_teknisi.t_telegram_id = tb_provisioning.post_by','left');
        $this->db->join('tb_helpdesk', 'tb_helpdesk.h_telegram_id = tb_provisioning.hd_penerima','left');
        $this->db->join('tb_users', 'tb_users.users_id = tb_provisioning.updated_by','left');
        $i = 0;
        foreach ($this->column_search as $item)
        {
            if($_POST['search']['value'])
            {
                if($i===0)
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
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

    public function get_list_hd()
    {
        $this->db->select('tb_helpdesk.nama_hd,tb_provisioning.hd_penerima');
        $this->db->from($this->table);
        $this->db->join('tb_helpdesk', 'tb_helpdesk.h_telegram_id = tb_provisioning.hd_penerima', 'left');
        $this->db->group_by('tb_provisioning.hd_penerima');
        $this->db->order_by('tb_provisioning.hd_penerima','asc');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_by_id($id)
    {
        $this->db->select('p.*, m.*, t.nama_teknisi, s.sales_id, s.message_id as s_m_id, s.message_from');
        $this->db->from('tb_provisioning as p');
        $this->db->join('tb_material as m', 'm.create_id = p.create_id');
        $this->db->join('tb_teknisi as t', 't.t_telegram_id = p.post_by','left');
        $this->db->join('tb_sales as s', 's.new_sc = p.sc_baru','left');
        $this->db->where('p.create_id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function update_sales($where, $usales)
    {
        $this->db->update('tb_sales', $usales, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('create_id', $id);
        $this->db->delete($this->table);
    }

    public function delete_mat_by_id($id)
    {
        $this->db->where('create_id', $id);
        $this->db->delete('tb_material');
    }

}

/* End of file Provisioning_model.php */
/* Location: ./application/models/Provisioning_model.php */