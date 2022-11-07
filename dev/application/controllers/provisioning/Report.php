<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') != TRUE) {
			redirect(base_url("auth"));
		}

		if (menuReport($this->session->userdata('level')) == false) {
			redirect(base_url("index.php/welcome"));
		}
	}

	public function provi()
	{
		$data['title'] 		    = 'Report';
		$data['subtitle'] 	    = 'Provisioning';
		$data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
		$this->load->view('template', [
			'content' => $this->load->view('provisioning/report/provi', $data, true)
		]);
	}

	public function material()
	{
		$data['title'] 		    = 'Report';
		$data['subtitle'] 	    = 'Material';
		$data['odwaittoday']    = $this->dashboard_model->waiting_today()->row_array();
		$this->load->view('template', [
			'content' => $this->load->view('provisioning/report/material', $data, true)
		]);
	}

	public function download_provi()
	{
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$excel = new PHPExcel();
		$excel->getProperties()->setCreator('DamanPKL')
			->setLastModifiedBy('DamanPKL')
			->setTitle("Laporan Provisioning")
			->setSubject("Provisioning")
			->setDescription("Laporan Provisioning Witel PKL")
			->setKeywords("Laporan Provisioning");

		$style_col = array(
			'font' => array('bold' => true),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => '8cb3f2')
			)
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			)
		);
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "DATEL");
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "JENIS TRANSAKSI");
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "LAYANAN");
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "TEST VOICE");
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "TEST INET");
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "ATAS NAMA");
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "ALAMAT");
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "CP");
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "VOICE");
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "INET");
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "ODP");
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "PORT");
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "SISA");
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "SN");
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "SC");
		$excel->setActiveSheetIndex(0)->setCellValue('Q1', "SC BARU");
		$excel->setActiveSheetIndex(0)->setCellValue('R1', "MITRA");
		$excel->setActiveSheetIndex(0)->setCellValue('S1', "TEKNISI");
		$excel->setActiveSheetIndex(0)->setCellValue('T1', "CREW");
		$excel->setActiveSheetIndex(0)->setCellValue('U1', "BARCODE");
		$excel->setActiveSheetIndex(0)->setCellValue('V1', "STBID");
		$excel->setActiveSheetIndex(0)->setCellValue('W1', "DROPCORE");
		$excel->setActiveSheetIndex(0)->setCellValue('X1', "SCLAM");
		$excel->setActiveSheetIndex(0)->setCellValue('Y1', "BREKET");
		$excel->setActiveSheetIndex(0)->setCellValue('Z1', "ROS");
		$excel->setActiveSheetIndex(0)->setCellValue('AA1', "T7");
		$excel->setActiveSheetIndex(0)->setCellValue('AB1', "SPL 1:2");
		$excel->setActiveSheetIndex(0)->setCellValue('AC1', "SPL 1:4");
		$excel->setActiveSheetIndex(0)->setCellValue('AD1', "SPL 1:8");
		$excel->setActiveSheetIndex(0)->setCellValue('AE1', "CASSETE");
		$excel->setActiveSheetIndex(0)->setCellValue('AF1', "ADAPTER");
		$excel->setActiveSheetIndex(0)->setCellValue('AG1', "UTP");
		$excel->setActiveSheetIndex(0)->setCellValue('AH1', "RJ45");
		$excel->setActiveSheetIndex(0)->setCellValue('AI1', "ORDER BY");
		$excel->setActiveSheetIndex(0)->setCellValue('AJ1', "HD");
		$excel->setActiveSheetIndex(0)->setCellValue('AK1', "TGL MASUK");
		$excel->setActiveSheetIndex(0)->setCellValue('AL1', "TGL UPDATE");
		$excel->setActiveSheetIndex(0)->setCellValue('AM1', "TGL COMP/FACT");
		$excel->setActiveSheetIndex(0)->setCellValue('AN1', "TGL PS");
		$excel->setActiveSheetIndex(0)->setCellValue('AO1', "UPDATED BY");
		$excel->setActiveSheetIndex(0)->setCellValue('AP1', "KETERANGAN");
		$excel->setActiveSheetIndex(0)->setCellValue('AQ1', "STATUS");
		$excel->setActiveSheetIndex(0)->setCellValue('AR1', "BA");
		$excel->setActiveSheetIndex(0)->setCellValue('AS1', "REDAMAN");
		$excel->setActiveSheetIndex(0)->setCellValue('AT1', "PREKSO");
		$excel->setActiveSheetIndex(0)->setCellValue('AU1', "OTP");
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('U1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('V1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('W1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('X1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Y1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Z1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AA1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AB1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AC1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AD1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AE1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AF1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AG1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AH1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AI1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AJ1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AK1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AL1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AM1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AN1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AO1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AP1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AQ1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AR1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AS1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AT1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AU1')->applyFromArray($style_col);

		// Panggil function view
		$fdatel    		= $this->input->post('fdatel');
		$fstatus    	= $this->input->post('fstatus');
		$fstartdate  	= $this->input->post('fstartdate');
		$fenddate    	= $this->input->post('fenddate');

		$query = $this->report_model->search_provi($fdatel, $fstatus, $fstartdate, $fenddate)->result_array();
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
		$no = 1;
		foreach ($query as $data) {
			$scnya = $data['sc_baru'];
			$cekba   = $this->db->query("SELECT sc FROM tb_ba_digital WHERE sc='" . $scnya . "'")->num_rows();
			if ($cekba <= 0) {
				$ba = "NOK";
			} else {
				$ba = "OK";
			}
			$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no++);
			$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data['datel']);
			$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['order_type']);
			$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['layanan']);
			$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['testing_voice']);
			$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data['testing_inet']);
			$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data['atas_nama']);
			$excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data['alamat']);
			$excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data['cp']);
			$excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data['voice']);
			$excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data['internet']);
			$excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data['odp']);
			$excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data['port']);
			$excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data['sisa']);
			$excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, $data['sn']);
			$excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, $data['sc']);
			$excel->setActiveSheetIndex(0)->setCellValue('Q' . $numrow, $data['sc_baru']);
			$excel->setActiveSheetIndex(0)->setCellValue('R' . $numrow, $data['mitra']);
			$excel->setActiveSheetIndex(0)->setCellValue('S' . $numrow, $data['teknisi']);
			$excel->setActiveSheetIndex(0)->setCellValue('T' . $numrow, $data['crew']);
			$excel->setActiveSheetIndex(0)->setCellValue('U' . $numrow, $data['barcode']);
			$excel->setActiveSheetIndex(0)->setCellValue('V' . $numrow, $data['stb_id']);
			$excel->setActiveSheetIndex(0)->setCellValue('W' . $numrow, $data['dropcore']);
			$excel->setActiveSheetIndex(0)->setCellValue('X' . $numrow, $data['sclam']);
			$excel->setActiveSheetIndex(0)->setCellValue('Y' . $numrow, $data['breket']);
			$excel->setActiveSheetIndex(0)->setCellValue('Z' . $numrow, $data['ros']);
			$excel->setActiveSheetIndex(0)->setCellValue('AA' . $numrow, $data['t_tujuh']);
			$excel->setActiveSheetIndex(0)->setCellValue('AB' . $numrow, $data['spl1_2']);
			$excel->setActiveSheetIndex(0)->setCellValue('AC' . $numrow, $data['spl1_4']);
			$excel->setActiveSheetIndex(0)->setCellValue('AD' . $numrow, $data['spl1_8']);
			$excel->setActiveSheetIndex(0)->setCellValue('AE' . $numrow, $data['cassete']);
			$excel->setActiveSheetIndex(0)->setCellValue('AF' . $numrow, $data['adapter']);
			$excel->setActiveSheetIndex(0)->setCellValue('AG' . $numrow, $data['utp']);
			$excel->setActiveSheetIndex(0)->setCellValue('AH' . $numrow, $data['rj45']);
			$excel->setActiveSheetIndex(0)->setCellValue('AI' . $numrow, $data['nama_teknisi']);
			$excel->setActiveSheetIndex(0)->setCellValue('AJ' . $numrow, $data['nama_hd']);
			$excel->setActiveSheetIndex(0)->setCellValue('AK' . $numrow, $data['tgl_masuk']);
			$excel->setActiveSheetIndex(0)->setCellValue('AL' . $numrow, $data['tgl_update']);
			$excel->setActiveSheetIndex(0)->setCellValue('AM' . $numrow, $data['tgl_comp_fact']);
			$excel->setActiveSheetIndex(0)->setCellValue('AN' . $numrow, $data['tgl_ps']);
			$excel->setActiveSheetIndex(0)->setCellValue('AO' . $numrow, $data['fullname']);
			$excel->setActiveSheetIndex(0)->setCellValue('AP' . $numrow, $data['ket_update']);
			$excel->setActiveSheetIndex(0)->setCellValue('AQ' . $numrow, $data['status']);
			$excel->setActiveSheetIndex(0)->setCellValue('AR' . $numrow, $ba);
			$excel->setActiveSheetIndex(0)->setCellValue('AS' . $numrow, $data['redaman']);
			$excel->setActiveSheetIndex(0)->setCellValue('AT' . $numrow, $data['prekso']);
			$excel->setActiveSheetIndex(0)->setCellValue('AU' . $numrow, $data['otp']);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('V' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('W' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('X' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Y' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Z' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AA' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AB' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AC' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AD' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AE' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AF' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AG' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AH' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AI' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AJ' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AK' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AL' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AM' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AN' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AO' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AP' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AQ' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AR' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AS' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AT' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AU' . $numrow)->applyFromArray($style_row);

			$numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(10); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('V')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('X')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AB')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AC')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AD')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AE')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AF')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AG')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AH')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AI')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AK')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AL')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AM')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AN')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AO')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AP')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AR')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AS')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AT')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AU')->setWidth(15);

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("DATA PROVISIONING");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		//set_time_limit(1000000);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="LAPORAN PROVISIONING ' . shortdate_indo($fstartdate) . ' - ' . shortdate_indo($fenddate) . '.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function today()
	{
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$excel = new PHPExcel();
		$excel->getProperties()->setCreator('DamanPKL')
			->setLastModifiedBy('DamanPKL')
			->setTitle("Laporan Provisioning")
			->setSubject("Provisioning")
			->setDescription("Laporan Provisioning Witel PKL")
			->setKeywords("Laporan Provisioning");

		$style_col = array(
			'font' => array('bold' => true),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => '8cb3f2')
			)
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			)
		);
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "DATEL");
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "JENIS TRANSAKSI");
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "LAYANAN");
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "TEST VOICE");
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "TEST INET");
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "ATAS NAMA");
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "ALAMAT");
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "CP");
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "VOICE");
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "INET");
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "ODP");
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "PORT");
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "SISA");
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "SN");
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "SC");
		$excel->setActiveSheetIndex(0)->setCellValue('Q1', "SC BARU");
		$excel->setActiveSheetIndex(0)->setCellValue('R1', "MITRA");
		$excel->setActiveSheetIndex(0)->setCellValue('S1', "TEKNISI");
		$excel->setActiveSheetIndex(0)->setCellValue('T1', "CREW");
		$excel->setActiveSheetIndex(0)->setCellValue('U1', "BARCODE");
		$excel->setActiveSheetIndex(0)->setCellValue('V1', "STBID");
		$excel->setActiveSheetIndex(0)->setCellValue('W1', "DROPCORE");
		$excel->setActiveSheetIndex(0)->setCellValue('X1', "SCLAM");
		$excel->setActiveSheetIndex(0)->setCellValue('Y1', "BREKET");
		$excel->setActiveSheetIndex(0)->setCellValue('Z1', "ROS");
		$excel->setActiveSheetIndex(0)->setCellValue('AA1', "T7");
		$excel->setActiveSheetIndex(0)->setCellValue('AB1', "SPL 1:2");
		$excel->setActiveSheetIndex(0)->setCellValue('AC1', "SPL 1:4");
		$excel->setActiveSheetIndex(0)->setCellValue('AD1', "SPL 1:8");
		$excel->setActiveSheetIndex(0)->setCellValue('AE1', "CASSETE");
		$excel->setActiveSheetIndex(0)->setCellValue('AF1', "ADAPTER");
		$excel->setActiveSheetIndex(0)->setCellValue('AG1', "UTP");
		$excel->setActiveSheetIndex(0)->setCellValue('AH1', "RJ45");
		$excel->setActiveSheetIndex(0)->setCellValue('AI1', "ORDER BY");
		$excel->setActiveSheetIndex(0)->setCellValue('AJ1', "HD");
		$excel->setActiveSheetIndex(0)->setCellValue('AK1', "TGL MASUK");
		$excel->setActiveSheetIndex(0)->setCellValue('AL1', "TGL UPDATE");
		$excel->setActiveSheetIndex(0)->setCellValue('AM1', "TGL COMP/FACT");
		$excel->setActiveSheetIndex(0)->setCellValue('AN1', "TGL PS");
		$excel->setActiveSheetIndex(0)->setCellValue('AO1', "UPDATED BY");
		$excel->setActiveSheetIndex(0)->setCellValue('AP1', "KETERANGAN");
		$excel->setActiveSheetIndex(0)->setCellValue('AQ1', "STATUS");
		$excel->setActiveSheetIndex(0)->setCellValue('AR1', "BA");
		$excel->setActiveSheetIndex(0)->setCellValue('AS1', "REDAMAN");
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('U1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('V1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('W1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('X1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Y1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Z1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AA1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AB1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AC1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AD1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AE1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AF1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AG1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AH1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AI1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AJ1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AK1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AL1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AM1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AN1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AO1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AP1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AQ1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AR1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AS1')->applyFromArray($style_col);

		$query = $this->report_model->today()->result_array();
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
		$no = 1;
		foreach ($query as $data) {
			$scnya = $data['sc_baru'];
			$cekba   = $this->db->query("SELECT sc FROM tb_ba_digital WHERE sc='" . $scnya . "'")->num_rows();
			if ($cekba <= 0) {
				$ba = "NOK";
			} else {
				$ba = "OK";
			}
			$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no++);
			$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data['datel']);
			$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['order_type']);
			$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['layanan']);
			$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['testing_voice']);
			$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data['testing_inet']);
			$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data['atas_nama']);
			$excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data['alamat']);
			$excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data['cp']);
			$excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data['voice']);
			$excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data['internet']);
			$excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data['odp']);
			$excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data['port']);
			$excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data['sisa']);
			$excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, $data['sn']);
			$excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, $data['sc']);
			$excel->setActiveSheetIndex(0)->setCellValue('Q' . $numrow, $data['sc_baru']);
			$excel->setActiveSheetIndex(0)->setCellValue('R' . $numrow, $data['mitra']);
			$excel->setActiveSheetIndex(0)->setCellValue('S' . $numrow, $data['teknisi']);
			$excel->setActiveSheetIndex(0)->setCellValue('T' . $numrow, $data['crew']);
			$excel->setActiveSheetIndex(0)->setCellValue('U' . $numrow, $data['barcode']);
			$excel->setActiveSheetIndex(0)->setCellValue('V' . $numrow, $data['stb_id']);
			$excel->setActiveSheetIndex(0)->setCellValue('W' . $numrow, $data['dropcore']);
			$excel->setActiveSheetIndex(0)->setCellValue('X' . $numrow, $data['sclam']);
			$excel->setActiveSheetIndex(0)->setCellValue('Y' . $numrow, $data['breket']);
			$excel->setActiveSheetIndex(0)->setCellValue('Z' . $numrow, $data['ros']);
			$excel->setActiveSheetIndex(0)->setCellValue('AA' . $numrow, $data['t_tujuh']);
			$excel->setActiveSheetIndex(0)->setCellValue('AB' . $numrow, $data['spl1_2']);
			$excel->setActiveSheetIndex(0)->setCellValue('AC' . $numrow, $data['spl1_4']);
			$excel->setActiveSheetIndex(0)->setCellValue('AD' . $numrow, $data['spl1_8']);
			$excel->setActiveSheetIndex(0)->setCellValue('AE' . $numrow, $data['cassete']);
			$excel->setActiveSheetIndex(0)->setCellValue('AF' . $numrow, $data['adapter']);
			$excel->setActiveSheetIndex(0)->setCellValue('AG' . $numrow, $data['utp']);
			$excel->setActiveSheetIndex(0)->setCellValue('AH' . $numrow, $data['rj45']);
			$excel->setActiveSheetIndex(0)->setCellValue('AI' . $numrow, $data['nama_teknisi']);
			$excel->setActiveSheetIndex(0)->setCellValue('AJ' . $numrow, $data['nama_hd']);
			$excel->setActiveSheetIndex(0)->setCellValue('AK' . $numrow, $data['tgl_masuk']);
			$excel->setActiveSheetIndex(0)->setCellValue('AL' . $numrow, $data['tgl_update']);
			$excel->setActiveSheetIndex(0)->setCellValue('AM' . $numrow, $data['tgl_comp_fact']);
			$excel->setActiveSheetIndex(0)->setCellValue('AN' . $numrow, $data['tgl_ps']);
			$excel->setActiveSheetIndex(0)->setCellValue('AO' . $numrow, $data['fullname']);
			$excel->setActiveSheetIndex(0)->setCellValue('AP' . $numrow, $data['ket_update']);
			$excel->setActiveSheetIndex(0)->setCellValue('AQ' . $numrow, $data['status']);
			$excel->setActiveSheetIndex(0)->setCellValue('AR' . $numrow, $ba);
			$excel->setActiveSheetIndex(0)->setCellValue('AS' . $numrow, $data['redaman']);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('V' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('W' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('X' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Y' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Z' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AA' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AB' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AC' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AD' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AE' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AF' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AG' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AH' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AI' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AJ' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AK' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AL' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AM' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AN' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AO' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AP' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AQ' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AR' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AS' . $numrow)->applyFromArray($style_row);

			$numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(10); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('V')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('X')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AB')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AC')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AD')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AE')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AF')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AG')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AH')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AI')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AK')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AL')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AM')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AN')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AO')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AP')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AR')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AS')->setWidth(15);

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("DATA PROVISIONING");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		//set_time_limit(1000000);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="LAPORAN PROVISIONING ' . shortdate_indo(date('Y-m-d')) . '.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function download_material()
	{
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$excel = new PHPExcel();
		$excel->getProperties()->setCreator('DamanPKL')
			->setLastModifiedBy('adminSO')
			->setTitle("Laporan Material")
			->setSubject("Material")
			->setDescription("Laporan Material Witel PKL")
			->setKeywords("Laporan Material");

		$style_col = array(
			'font' => array('bold' => true),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => '8cb3f2')
			)
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			)
		);
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "JENIS PEKERJAAN");
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "LAYANAN");
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "NO TELP");
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "NO INET");
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "SC");
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "ATAS NAMA");
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "ALAMAT");
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "DATEL");
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "ODP");
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "DROPCORE");
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "SCLAM");
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "BRIKET");
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "ROS");
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "T7");
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "SPL1:2");
		$excel->setActiveSheetIndex(0)->setCellValue('Q1', "SPL1:4");
		$excel->setActiveSheetIndex(0)->setCellValue('R1', "SPL1:8");
		$excel->setActiveSheetIndex(0)->setCellValue('S1', "CASSETE");
		$excel->setActiveSheetIndex(0)->setCellValue('T1', "ADAPTER");
		$excel->setActiveSheetIndex(0)->setCellValue('U1', "UTP");
		$excel->setActiveSheetIndex(0)->setCellValue('V1', "RJ45");
		$excel->setActiveSheetIndex(0)->setCellValue('W1', "ONT");
		$excel->setActiveSheetIndex(0)->setCellValue('X1', "STB");
		$excel->setActiveSheetIndex(0)->setCellValue('Y1', "TGL PS");
		$excel->setActiveSheetIndex(0)->setCellValue('Z1', "TEKNISI");
		$excel->setActiveSheetIndex(0)->setCellValue('AA1', "STATUS");
		$excel->setActiveSheetIndex(0)->setCellValue('AB1', "BA");
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('U1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('V1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('W1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('X1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Y1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Z1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AA1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AB1')->applyFromArray($style_col);

		// Panggil function view
		$fdatel    		= $this->input->post('fdatel');
		$forder    		= $this->input->post('forder');
		$fstartdate  	= $this->input->post('fstartdate');
		$fenddate    	= $this->input->post('fenddate');

		$query = $this->report_model->search_material($fdatel, $forder, $fstartdate, $fenddate)->result_array();
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
		$no = 1;
		foreach ($query as $data) {
			$scnya = $data['sc_baru'];
			$cekba   = $this->db->query("SELECT sc FROM tb_ba_digital WHERE sc='" . $scnya . "'")->num_rows();
			if ($cekba <= 0) {
				$ba = "NOK";
			} else {
				$ba = "OK";
			}

			if ($data['order_type'] == 'MYI' || $data['order_type'] == 'REGULER') {
				$jenis_pekerjaan = "PSB";
			} elseif ($data['order_type'] == 'MIG' || $data['order_type'] == 'MIG NAL') {
				$jenis_pekerjaan = "MIGRASI";
			} elseif ($data['order_type'] == 'GANTI PAKET' || $data['order_type'] == 'WIFI EXTENDER' || $data['order_type'] == '2nd STB' || $data['order_type'] == '2P-3P' || $data['order_type'] == 'PLC') {
				$jenis_pekerjaan = "ADD ON - $data[order_type]";
			}
			$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no++);
			$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $jenis_pekerjaan);
			$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['layanan']);
			$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['voice']);
			$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['internet']);
			$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data['sc_baru']);
			$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data['atas_nama']);
			$excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data['alamat']);
			$excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data['datel']);
			$excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data['odp']);
			$excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data['dropcore']);
			$excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data['sclam']);
			$excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data['breket']);
			$excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data['ros']);
			$excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, $data['t_tujuh']);
			$excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, $data['spl1_2']);
			$excel->setActiveSheetIndex(0)->setCellValue('Q' . $numrow, $data['spl1_4']);
			$excel->setActiveSheetIndex(0)->setCellValue('R' . $numrow, $data['spl1_8']);
			$excel->setActiveSheetIndex(0)->setCellValue('S' . $numrow, $data['cassete']);
			$excel->setActiveSheetIndex(0)->setCellValue('T' . $numrow, $data['adapter']);
			$excel->setActiveSheetIndex(0)->setCellValue('U' . $numrow, $data['utp']);
			$excel->setActiveSheetIndex(0)->setCellValue('V' . $numrow, $data['rj45']);
			$excel->setActiveSheetIndex(0)->setCellValue('W' . $numrow, $data['sn']);
			$excel->setActiveSheetIndex(0)->setCellValue('X' . $numrow, $data['stb_id']);
			$excel->setActiveSheetIndex(0)->setCellValue('Y' . $numrow, substr($data['tgl_ps'], 0, 10));
			$excel->setActiveSheetIndex(0)->setCellValue('Z' . $numrow, $data['nama_teknisi']);
			$excel->setActiveSheetIndex(0)->setCellValue('AA' . $numrow, $data['status']);
			$excel->setActiveSheetIndex(0)->setCellValue('AB' . $numrow, $ba);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('V' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('W' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('X' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Y' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Z' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AA' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AB' . $numrow)->applyFromArray($style_row);

			$numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(10); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('V')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('X')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('AB')->setWidth(15);

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("MATERIAL");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		//set_time_limit(1000000);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="LAPORAN MATERIAL ' . $fdatel . '_' . $forder . '_' . shortdate_indo($fstartdate) . ' - ' . shortdate_indo($fenddate) . '.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}

/* End of file Report.php */
/* Location: ./application/controllers/provisioning/Report.php */