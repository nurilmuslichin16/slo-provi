<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Provisioning ".date('Y-m-d').".xls");
?>

<?php if (empty($results)) {
	echo "Tidak Ditemukan Data!";
} ?>

<table border="1" cellspacing="0" width="100%">
  <thead>
      <tr>
          <th>NO</th>
          <th>DATEL</th>
          <th>JENIS TRANSAKSI</th>
          <th>LAYANAN</th>
          <th>TESTING VOICE</th>
          <th>TESTING INET</th>
          <th>ATAS NAMA</th>
          <th>ALAMAT</th>
          <th>CP</th>
          <th>VOICE</th>
          <th>INET</th>
          <th>ODP</th>
          <th>PORT</th>
          <th>SISA</th>
          <th>SN</th>
          <th>SC</th>
          <th>SC BARU</th>
          <th>MITRA</th>
          <th>TEKNISI</th>
          <th>CREW</th>
          <th>BARCODE</th>
          <th>STBID</th>
          <th>DC</th>
          <th>SCLAM</th>
          <th>BREKET</th>
          <th>ROS</th>
          <th>T7</th>
          <th>SPL 1:2</th>
          <th>SPL 1:4</th>
          <th>SPL 1:8</th>
          <th>CASSETE</th>
          <th>ADAPTER</th>
          <th>UTP</th>
          <th>RJ45</th>
          <th>ORDER BY</th>
          <th>HD</th>
          <th>TGL MASUK</th>
          <th>TGL UPDATE</th>
          <th>TGL COMPLETE/FALLOUT</th>
          <th>UPDATE BY</th>
          <th>KETERANGAN UPDATE</th>
          <th>STATUS</th>
          <th>BA DIGITAL</th>
      </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach($results as $row) { 
         $scnya = $row['sc_baru'];
          $cekba   = $this->db->query("SELECT sc FROM tb_ba_digital WHERE sc='".$scnya."'")->num_rows();
          if ($cekba <= 0) {
            $ba = "NOK";
          }
          else{
            $ba = "OK";
          }
      ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['datel'] ?></td>
        <td><?= $row['order_type'] ?></td>
        <td><?= $row['layanan'] ?></td>
        <td><?= $row['testing_voice'] ?></td>
        <td><?= $row['testing_inet'] ?></td>
        <td><?= $row['atas_nama'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td><?= $row['cp'] ?></td>
        <td><?= $row['voice'] ?></td>
        <td><?= $row['internet'] ?></td>
        <td><?= $row['odp'] ?></td>
        <td><?= $row['port'] ?></td>
        <td><?= $row['sisa'] ?></td>
        <td><?= $row['sn'] ?></td>
        <td><?= $row['sc'] ?></td>
        <td><?= $row['sc_baru'] ?></td>
        <td><?= $row['mitra'] ?></td>
        <td><?= $row['teknisi'] ?></td>
        <td><?= $row['crew'] ?></td>
        <td><?= $row['barcode'] ?></td>
        <td><?= $row['stb_id'] ?></td>
        <td><?= $row['dropcore'] ?></td>
        <td><?= $row['sclam'] ?></td>
        <td><?= $row['breket'] ?></td>
        <td><?= $row['ros'] ?></td>
        <td><?= $row['t_tujuh'] ?></td>
        <td><?= $row['spl1_2'] ?></td>
        <td><?= $row['spl1_4'] ?></td>
        <td><?= $row['spl1_8'] ?></td>
        <td><?= $row['cassete'] ?></td>
        <td><?= $row['adapter'] ?></td>
        <td><?= $row['utp'] ?></td>
        <td><?= $row['rj45'] ?></td>
        <td><?= $row['nama_teknisi'] ?></td>
        <td><?= $row['nama_hd'] ?></td>
        <td><?= $row['tgl_masuk'] ?></td>
        <td><?= $row['tgl_update'] ?></td>
        <td><?= $row['tgl_comp_fact'] ?></td>
        <td><?= $row['fullname'] ?></td>
        <td><?= $row['ket_update'] ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $ba; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>