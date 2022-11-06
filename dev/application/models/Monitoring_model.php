<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring_model extends CI_Model
{

	public function new_sales()
	{
		$this->db->select("

				SUM(CASE WHEN (datel='BYL') AND (status_id=1) THEN 1 ELSE 0 END) as waitbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=1) THEN 1 ELSE 0 END) as waitklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=1) THEN 1 ELSE 0 END) as waitpen,
				SUM(CASE WHEN (datel='SOP') AND (status_id=1) THEN 1 ELSE 0 END) as waitsop,
				SUM(CASE WHEN (datel='GLD') AND (status_id=1) THEN 1 ELSE 0 END) as waitgld,
				SUM(CASE WHEN (datel='KRT') AND (status_id=1) THEN 1 ELSE 0 END) as waitkrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=1) THEN 1 ELSE 0 END) as waitkto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=1) THEN 1 ELSE 0 END) as waitmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=1) THEN 1 ELSE 0 END) as waitslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=1) THEN 1 ELSE 0 END) as waitkar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=1) THEN 1 ELSE 0 END) as waitsrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=1) THEN 1 ELSE 0 END) as waitskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=1) THEN 1 ELSE 0 END) as waitwng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=2) THEN 1 ELSE 0 END) as progbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=2) THEN 1 ELSE 0 END) as progklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=2) THEN 1 ELSE 0 END) as progpen,
				SUM(CASE WHEN (datel='SOP') AND (status_id=2) THEN 1 ELSE 0 END) as progsop,
				SUM(CASE WHEN (datel='GLD') AND (status_id=2) THEN 1 ELSE 0 END) as proggld,
				SUM(CASE WHEN (datel='KRT') AND (status_id=2) THEN 1 ELSE 0 END) as progkrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=2) THEN 1 ELSE 0 END) as progkto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=2) THEN 1 ELSE 0 END) as progmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=2) THEN 1 ELSE 0 END) as progslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=2) THEN 1 ELSE 0 END) as progkar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=2) THEN 1 ELSE 0 END) as progsrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=2) THEN 1 ELSE 0 END) as progskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=2) THEN 1 ELSE 0 END) as progwng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=3) THEN 1 ELSE 0 END) as fallbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=3) THEN 1 ELSE 0 END) as fallklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=3) THEN 1 ELSE 0 END) as fallpen,
				SUM(CASE WHEN (datel='SOP') AND (status_id=3) THEN 1 ELSE 0 END) as fallsop,
				SUM(CASE WHEN (datel='GLD') AND (status_id=3) THEN 1 ELSE 0 END) as fallgld,
				SUM(CASE WHEN (datel='KRT') AND (status_id=3) THEN 1 ELSE 0 END) as fallkrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=3) THEN 1 ELSE 0 END) as fallkto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=3) THEN 1 ELSE 0 END) as fallmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=3) THEN 1 ELSE 0 END) as fallslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=3) THEN 1 ELSE 0 END) as fallkar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=3) THEN 1 ELSE 0 END) as fallsrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=3) THEN 1 ELSE 0 END) as fallskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=3) THEN 1 ELSE 0 END) as fallwng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as comppen,
				SUM(CASE WHEN (datel='SOP') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compsop,
				SUM(CASE WHEN (datel='GLD') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compgld,
				SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compkrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compkto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compkar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compsrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compwng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=7) THEN 1 ELSE 0 END) as psbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=7) THEN 1 ELSE 0 END) as psklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=7) THEN 1 ELSE 0 END) as pspen,
				SUM(CASE WHEN (datel='SOP') AND (status_id=7) THEN 1 ELSE 0 END) as pssop,
				SUM(CASE WHEN (datel='GLD') AND (status_id=7) THEN 1 ELSE 0 END) as psgld,
				SUM(CASE WHEN (datel='KRT') AND (status_id=7) THEN 1 ELSE 0 END) as pskrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=7) THEN 1 ELSE 0 END) as pskto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=7) THEN 1 ELSE 0 END) as psmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=7) THEN 1 ELSE 0 END) as psslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=7) THEN 1 ELSE 0 END) as pskar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=7) THEN 1 ELSE 0 END) as pssrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=7) THEN 1 ELSE 0 END) as psskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=7) THEN 1 ELSE 0 END) as pswng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnspen,
				SUM(CASE WHEN (datel='SOP') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnssop,
				SUM(CASE WHEN (datel='GLD') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsgld,
				SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnskrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnskto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnskar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnssrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnswng,

				SUM(CASE WHEN (status_id=1) THEN 1 ELSE 0 END) as waitall,
				SUM(CASE WHEN (status_id=2) THEN 1 ELSE 0 END) as progall,
				SUM(CASE WHEN (status_id=3) THEN 1 ELSE 0 END) as fallall,
				SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compall,
				SUM(CASE WHEN (status_id=7) THEN 1 ELSE 0 END) as psall,
				SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsall,

				SUM(CASE WHEN (status_id=1 OR status_id=2 OR status_id=3) THEN 1 ELSE 0 END) as hrandfact,
				SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as psandcomp,

			");
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='REGULER' OR order_type='MYI' OR order_type='PSB')";
		$this->db->where($where);
		$result = $this->db->get('tb_provisioning');
		return $result;
	}

	public function mig_datel()
	{
		$this->db->select("

				SUM(CASE WHEN (datel='BYL') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrpen,
				SUM(CASE WHEN (datel='PKL') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrpkl,
				SUM(CASE WHEN (datel='KRT') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrkrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrkto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrkar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrsrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrwng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=3) THEN 1 ELSE 0 END) as fallbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=3) THEN 1 ELSE 0 END) as fallklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=3) THEN 1 ELSE 0 END) as fallpen,
				SUM(CASE WHEN (datel='PKL') AND (status_id=3) THEN 1 ELSE 0 END) as fallpkl,
				SUM(CASE WHEN (datel='KRT') AND (status_id=3) THEN 1 ELSE 0 END) as fallkrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=3) THEN 1 ELSE 0 END) as fallkto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=3) THEN 1 ELSE 0 END) as fallmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=3) THEN 1 ELSE 0 END) as fallslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=3) THEN 1 ELSE 0 END) as fallkar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=3) THEN 1 ELSE 0 END) as fallsrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=3) THEN 1 ELSE 0 END) as fallskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=3) THEN 1 ELSE 0 END) as fallwng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as comppen,
				SUM(CASE WHEN (datel='PKL') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as comppkl,
				SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compkrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compkto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compkar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compsrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compwng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=7) THEN 1 ELSE 0 END) as psbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=7) THEN 1 ELSE 0 END) as psklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=7) THEN 1 ELSE 0 END) as pspen,
				SUM(CASE WHEN (datel='PKL') AND (status_id=7) THEN 1 ELSE 0 END) as pspkl,
				SUM(CASE WHEN (datel='KRT') AND (status_id=7) THEN 1 ELSE 0 END) as pskrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=7) THEN 1 ELSE 0 END) as pskto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=7) THEN 1 ELSE 0 END) as psmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=7) THEN 1 ELSE 0 END) as psslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=7) THEN 1 ELSE 0 END) as pskar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=7) THEN 1 ELSE 0 END) as pssrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=7) THEN 1 ELSE 0 END) as psskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=7) THEN 1 ELSE 0 END) as pswng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnspen,
				SUM(CASE WHEN (datel='PKL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnspkl,
				SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnskrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnskto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnskar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnssrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnswng,

				SUM(CASE WHEN (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrall,
				SUM(CASE WHEN (status_id=3) THEN 1 ELSE 0 END) as fallall,
				SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compall,
				SUM(CASE WHEN (status_id=7) THEN 1 ELSE 0 END) as psall,
				SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsall,

				SUM(CASE WHEN (status_id=1 OR status_id=2 OR status_id=3) THEN 1 ELSE 0 END) as hrandfact,
				SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as psandcomp,

			");
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='MIG' OR order_type='MIG NAL')";
		$this->db->where($where);
		$result = $this->db->get('tb_provisioning');
		return $result;
	}

	public function mig_mitra()
	{
		$this->db->select("

				SUM(CASE WHEN (mitra='HCP') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrhcp,
				SUM(CASE WHEN (mitra='KOPEGTEL') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrkopeg,
				SUM(CASE WHEN (mitra='NUTEL') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrnutel,
				SUM(CASE WHEN (mitra='ZAG') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrzag,
				SUM(CASE WHEN (mitra='SMSI') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrsmsi,
				SUM(CASE WHEN (mitra='TKM') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrtkm,
				SUM(CASE WHEN (mitra='TA') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrta,
				SUM(CASE WHEN (mitra='GLOBAL') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrglobal,

				SUM(CASE WHEN (mitra='HCP') AND (status_id=3) THEN 1 ELSE 0 END) as fallhcp,
				SUM(CASE WHEN (mitra='KOPEGTEL') AND (status_id=3) THEN 1 ELSE 0 END) as fallkopeg,
				SUM(CASE WHEN (mitra='NUTEL') AND (status_id=3) THEN 1 ELSE 0 END) as fallnutel,
				SUM(CASE WHEN (mitra='ZAG') AND (status_id=3) THEN 1 ELSE 0 END) as fallzag,
				SUM(CASE WHEN (mitra='SMSI') AND (status_id=3) THEN 1 ELSE 0 END) as fallsmsi,
				SUM(CASE WHEN (mitra='TKM') AND (status_id=3) THEN 1 ELSE 0 END) as falltkm,
				SUM(CASE WHEN (mitra='TA') AND (status_id=3) THEN 1 ELSE 0 END) as fallta,
				SUM(CASE WHEN (mitra='GLOBAL') AND (status_id=3) THEN 1 ELSE 0 END) as fallglobal,

				SUM(CASE WHEN (mitra='HCP') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as comphcp,
				SUM(CASE WHEN (mitra='KOPEGTEL') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compkopeg,
				SUM(CASE WHEN (mitra='NUTEL') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compnutel,
				SUM(CASE WHEN (mitra='ZAG') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compzag,
				SUM(CASE WHEN (mitra='SMSI') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compsmsi,
				SUM(CASE WHEN (mitra='TKM') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as comptkm,
				SUM(CASE WHEN (mitra='TA') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compta,
				SUM(CASE WHEN (mitra='GLOBAL') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compglobal,

				SUM(CASE WHEN (mitra='HCP') AND (status_id=7) THEN 1 ELSE 0 END) as pshcp,
				SUM(CASE WHEN (mitra='KOPEGTEL') AND (status_id=7) THEN 1 ELSE 0 END) as pskopeg,
				SUM(CASE WHEN (mitra='NUTEL') AND (status_id=7) THEN 1 ELSE 0 END) as psnutel,
				SUM(CASE WHEN (mitra='ZAG') AND (status_id=7) THEN 1 ELSE 0 END) as pszag,
				SUM(CASE WHEN (mitra='SMSI') AND (status_id=7) THEN 1 ELSE 0 END) as pssmsi,
				SUM(CASE WHEN (mitra='TKM') AND (status_id=7) THEN 1 ELSE 0 END) as pstkm,
				SUM(CASE WHEN (mitra='TA') AND (status_id=7) THEN 1 ELSE 0 END) as psta,
				SUM(CASE WHEN (mitra='GLOBAL') AND (status_id=7) THEN 1 ELSE 0 END) as psglobal,

				SUM(CASE WHEN (mitra='HCP') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnshcp,
				SUM(CASE WHEN (mitra='KOPEGTEL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnskopeg,
				SUM(CASE WHEN (mitra='NUTEL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsnutel,
				SUM(CASE WHEN (mitra='ZAG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnszag,
				SUM(CASE WHEN (mitra='SMSI') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnssmsi,
				SUM(CASE WHEN (mitra='TKM') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnstkm,
				SUM(CASE WHEN (mitra='TA') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsta,
				SUM(CASE WHEN (mitra='GLOBAL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsglobal,

				SUM(CASE WHEN (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrall,
				SUM(CASE WHEN (status_id=3) THEN 1 ELSE 0 END) as fallall,
				SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compall,
				SUM(CASE WHEN (status_id=7) THEN 1 ELSE 0 END) as psall,
				SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsall,

				SUM(CASE WHEN (status_id=1 OR status_id=2 OR status_id=3) THEN 1 ELSE 0 END) as hrandfact,
				SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as psandcomp,

			");
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='MIG' OR order_type='MIG NAL')";
		$this->db->where($where);
		$result = $this->db->get('tb_provisioning');
		return $result;
	}

	public function add_on()
	{
		$this->db->select("

				SUM(CASE WHEN (datel='BYL') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrpen,
				SUM(CASE WHEN (datel='PKL') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrpkl,
				SUM(CASE WHEN (datel='KRT') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrkrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrkto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrkar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrsrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrwng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=3) THEN 1 ELSE 0 END) as fallbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=3) THEN 1 ELSE 0 END) as fallklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=3) THEN 1 ELSE 0 END) as fallpen,
				SUM(CASE WHEN (datel='PKL') AND (status_id=3) THEN 1 ELSE 0 END) as fallpkl,
				SUM(CASE WHEN (datel='KRT') AND (status_id=3) THEN 1 ELSE 0 END) as fallkrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=3) THEN 1 ELSE 0 END) as fallkto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=3) THEN 1 ELSE 0 END) as fallmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=3) THEN 1 ELSE 0 END) as fallslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=3) THEN 1 ELSE 0 END) as fallkar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=3) THEN 1 ELSE 0 END) as fallsrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=3) THEN 1 ELSE 0 END) as fallskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=3) THEN 1 ELSE 0 END) as fallwng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as comppen,
				SUM(CASE WHEN (datel='PKL') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as comppkl,
				SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compkrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compkto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compkar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compsrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compwng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=7) THEN 1 ELSE 0 END) as psbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=7) THEN 1 ELSE 0 END) as psklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=7) THEN 1 ELSE 0 END) as pspen,
				SUM(CASE WHEN (datel='PKL') AND (status_id=7) THEN 1 ELSE 0 END) as pspkl,
				SUM(CASE WHEN (datel='KRT') AND (status_id=7) THEN 1 ELSE 0 END) as pskrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=7) THEN 1 ELSE 0 END) as pskto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=7) THEN 1 ELSE 0 END) as psmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=7) THEN 1 ELSE 0 END) as psslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=7) THEN 1 ELSE 0 END) as pskar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=7) THEN 1 ELSE 0 END) as pssrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=7) THEN 1 ELSE 0 END) as psskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=7) THEN 1 ELSE 0 END) as pswng,

				SUM(CASE WHEN (datel='BYL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsbyl,
				SUM(CASE WHEN (datel='KLX') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsklx,
				SUM(CASE WHEN (datel='PEN') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnspen,
				SUM(CASE WHEN (datel='PKL') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnspkl,
				SUM(CASE WHEN (datel='KRT') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnskrt,
				SUM(CASE WHEN (datel='KTO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnskto,
				SUM(CASE WHEN (datel='MSO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsmso,
				SUM(CASE WHEN (datel='SLO') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsslo,
				SUM(CASE WHEN (datel='KAR') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnskar,
				SUM(CASE WHEN (datel='SRG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnssrg,
				SUM(CASE WHEN (datel='SKH') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsskh,
				SUM(CASE WHEN (datel='WNG') AND (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnswng,

				SUM(CASE WHEN (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) as hrall,
				SUM(CASE WHEN (status_id=3) THEN 1 ELSE 0 END) as fallall,
				SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) as compall,
				SUM(CASE WHEN (status_id=7) THEN 1 ELSE 0 END) as psall,
				SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as totnsall,

				SUM(CASE WHEN (status_id=1 OR status_id=2 OR status_id=3) THEN 1 ELSE 0 END) as hrandfact,
				SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) as psandcomp,

			");
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='GANTI PAKET' OR order_type='WIFI EXTENDER' OR order_type='2nd STB' OR order_type='2P-3P' OR order_type='PLC')";
		$this->db->where($where);
		$result = $this->db->get('tb_provisioning');
		return $result;
	}

	public function grafik_new_sales()
	{
		$this->db->select(
			'datel,status_id,
							SUM(CASE WHEN (status_id=1) THEN 1 ELSE 0 END) AS wait,
							SUM(CASE WHEN (status_id=2) THEN 1 ELSE 0 END) AS prog,
							SUM(CASE WHEN (status_id=3) THEN 1 ELSE 0 END) AS fact,
							SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) AS comp,
							SUM(CASE WHEN (status_id=7) THEN 1 ELSE 0 END) AS ps,
							SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) AS totns'
		);
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='REGULER' OR order_type='MYI')";
		$this->db->where($where);
		$this->db->group_by('datel');
		$result = $this->db->get('tb_provisioning');
		return $result;
	}

	public function grafik_mig_datel()
	{
		$this->db->select(
			'datel,status_id,
							SUM(CASE WHEN (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) AS hr,
							SUM(CASE WHEN (status_id=3) THEN 1 ELSE 0 END) AS fact,
							SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) AS comp,
							SUM(CASE WHEN (status_id=7) THEN 1 ELSE 0 END) AS ps,
							SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) AS totns'
		);
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='MIG' OR order_type='MIG NAL')";
		$this->db->where($where);
		$this->db->group_by('datel');
		$result = $this->db->get('tb_provisioning');
		return $result;
	}

	public function grafik_mig_mitra()
	{
		$this->db->select(
			'mitra,status_id,
							SUM(CASE WHEN (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) AS hr,
							SUM(CASE WHEN (status_id=3) THEN 1 ELSE 0 END) AS fact,
							SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) AS comp,
							SUM(CASE WHEN (status_id=7) THEN 1 ELSE 0 END) AS ps,
							SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) AS totns'
		);
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='MIG' OR order_type='MIG NAL')";
		$this->db->where($where);
		$this->db->group_by('mitra');
		$result = $this->db->get('tb_provisioning');
		return $result;
	}

	public function grafik_add_on()
	{
		$this->db->select(
			'datel,status_id,
							SUM(CASE WHEN (status_id=1 OR status_id=2) THEN 1 ELSE 0 END) AS hr,
							SUM(CASE WHEN (status_id=3) THEN 1 ELSE 0 END) AS fact,
							SUM(CASE WHEN (status_id=4 OR status_id=5 OR status_id=6) THEN 1 ELSE 0 END) AS comp,
							SUM(CASE WHEN (status_id=7) THEN 1 ELSE 0 END) AS ps,
							SUM(CASE WHEN (status_id=4 OR status_id=5  OR status_id=6 OR status_id=7) THEN 1 ELSE 0 END) AS totns'
		);
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='GANTI PAKET' OR order_type='WIFI EXTENDER' OR order_type='2nd STB' OR order_type='2P-3P' OR order_type='PLC')";
		$this->db->where($where);
		$this->db->group_by('datel');
		$result = $this->db->get('tb_provisioning');
		return $result;
	}

	public function showns($datel = 'all', $status = 'all')
	{
		$this->db->select('*');
		$this->db->from('tb_provisioning');
		$this->db->join('tb_teknisi', 'tb_teknisi.t_telegram_id = tb_provisioning.post_by', 'left');
		$this->db->join('tb_helpdesk', 'tb_helpdesk.h_telegram_id = tb_provisioning.hd_penerima', 'left');

		if ($datel != 'all') {
			$this->db->where('tb_provisioning.datel', $datel);
		}
		if ($status != 'all') {
			if ($status == 'wait') {
				$where = "(status_id=1)";
				$this->db->where($where);
			} elseif ($status == 'prog') {
				$where = "(status_id=2)";
				$this->db->where($where);
			} elseif ($status == 'fact') {
				$where = "(status_id=3)";
				$this->db->where($where);
			} elseif ($status == 'comp') {
				$where = "(status_id=4 OR status_id=5 OR status_id=6)";
				$this->db->where($where);
			} elseif ($status == 'ps') {
				$where = "(status_id=7)";
				$this->db->where($where);
			} elseif ($status == 'ns') {
				$where = "(status_id=4 OR status_id=5  OR status_id=6 OR status_id=7)";
				$this->db->where($where);
			} elseif ($status == 'hrnfact') {
				$where = "(status_id=1 OR status_id=2 OR status_id=3)";
				$this->db->where($where);
			} elseif ($status == 'psncomp') {
				$where = "(status_id=4 OR status_id=5  OR status_id=6 OR status_id=7)";
				$this->db->where($where);
			}
		}
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='REGULER' OR order_type='MYI' OR order_type='PSB')";
		$this->db->where($where);
		$result = $this->db->get();
		return $result;
	}

	public function showao($datel = 'all', $status = 'all')
	{
		$this->db->select('*');
		$this->db->from('tb_provisioning');
		$this->db->join('tb_teknisi', 'tb_teknisi.t_telegram_id = tb_provisioning.post_by', 'left');
		$this->db->join('tb_helpdesk', 'tb_helpdesk.h_telegram_id = tb_provisioning.hd_penerima', 'left');

		if ($datel != 'all') {
			$this->db->where('datel', $datel);
		}
		if ($status != 'all') {
			if ($status == 'hr') {
				$where = "(status_id=1 OR status_id=2)";
				$this->db->where($where);
			} elseif ($status == 'fact') {
				$where = "(status_id=3)";
				$this->db->where($where);
			} elseif ($status == 'comp') {
				$where = "(status_id=4 OR status_id=5 OR status_id=6)";
				$this->db->where($where);
			} elseif ($status == 'ps') {
				$where = "(status_id=7)";
				$this->db->where($where);
			} elseif ($status == 'ns') {
				$where = "(status_id=4 OR status_id=5  OR status_id=6 OR status_id=7)";
				$this->db->where($where);
			} elseif ($status == 'hrnfact') {
				$where = "(status_id=1 OR status_id=2 OR status_id=3)";
				$this->db->where($where);
			} elseif ($status == 'psncomp') {
				$where = "(status_id=4 OR status_id=5  OR status_id=6 OR status_id=7)";
				$this->db->where($where);
			}
		}
		$where = "(date(tgl_masuk) = CURDATE() OR date(tgl_ps) = CURDATE() OR tgl_ps is null) AND (order_type='GANTI PAKET' OR order_type='WIFI EXTENDER' OR order_type='2nd STB' OR order_type='2P-3P' OR order_type='PLC')";
		$this->db->where($where);
		$result = $this->db->get();
		return $result;
	}
}

/* End of file Monitoring_model.php */
/* Location: ./application/models/Monitoring_model.php */