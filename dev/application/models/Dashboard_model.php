<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function grafik_new_sales()
	{
		$this->db->select('datel,order_type,count(create_id) as jml');
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='REGULER' OR order_type='MYI') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7)";
        $this->db->where($where);
        $this->db->group_by('datel');
	    $result = $this->db->get('tb_provisioning');
	    return $result;
	}

	public function grafik_mig()
	{
		$this->db->select('datel,order_type,count(create_id) as jml');
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='MIG' OR order_type='MIG NAL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7)";
        $this->db->where($where);
        $this->db->group_by('datel');
	    $result = $this->db->get('tb_provisioning');
	    return $result;
	}

	public function masuk_today()
	{
		$this->db->select('count(create_id) as jml');
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null)";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
	    return $result;
	}

	public function ns_today()
	{
		$this->db->select('count(create_id) as jml');
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='REGULER' OR order_type='MYI') AND (status_id=3 OR status_id=4 OR status_id=5  OR status_id=6 OR status_id=7)";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
	    return $result;
	}

	public function mig_today()
	{
		$this->db->select('count(create_id) as jml');
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='MIG' OR order_type='MIG NAL') AND (status_id=3 OR status_id=4 OR status_id=5  OR status_id=6 OR status_id=7)";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
	    return $result;
	}

	public function ao_today()
	{
		$this->db->select('count(create_id) as jml');
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='GANTI PAKET' OR order_type='WIFI EXTENDER' OR order_type='2nd STB' OR order_type='2P-3P' OR order_type='PLC') AND (status_id=3 OR status_id=4 OR status_id=5  OR status_id=6 OR status_id=7)";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
	    return $result;
	}

	public function prog_today()
	{
		$this->db->select('count(create_id) as jml');
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (status_id=2)";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
	    return $result;
	}

	public function waiting_today()
	{
		$this->db->select('count(create_id) as jml');
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (status_id=1)";
        $this->db->where($where);
        $result = $this->db->get('tb_provisioning');
	    return $result;
	}

	public function request_today()
	{
		$this->db->select('count(cekonu_id) as jml');
		$where = "(date(created_at) <= CURDATE()) AND (status='REQUEST')";
        $this->db->where($where);
        $result = $this->db->get('tb_cekonu');
	    return $result;
	}

	

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */