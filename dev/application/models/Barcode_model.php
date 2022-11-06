<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode_model extends CI_Model {

	var $table = 'tb_qrcode';
    var $column_order = array(null);
    var $column_search = array('qrcode');
    var $order = array('qr_id' => 'desc');

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
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
    	$this->db->insert_batch('tb_qrcode', $data);
  	}

  	public function update_multiple($data2)
  	{
    	$this->db->update_batch('tb_qrcode', $data2,'qrcode');
  	}

	public function upload_file($filename)
	{
	    $this->load->library('upload');

	    $config['upload_path'] = './uploads/';
	    $config['allowed_types'] = 'xlsx';
	    $config['max_size']  = '2048';
	    $config['overwrite'] = true;
	    $config['file_name'] = $filename;

	    $this->upload->initialize($config);
	    if($this->upload->do_upload('file')){
	      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
	      return $return;
	    }else{
	      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
	      return $return;
	    }
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
      
      


}

/* End of file Barcode_model.php */
/* Location: ./application/models/Barcode_model.php */