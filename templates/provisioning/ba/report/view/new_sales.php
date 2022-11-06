<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
  <div class="widget-box widget-color-dark" id="widget-box-1">
    <div class="widget-header">
      <h5 class="widget-title">BA NOK <?= $subtitle ?></h5>
      <div class="widget-toolbar">

        <a href="javascript:history.back();" class="purle">
          <i class="ace-icon fa fa-arrow-left"></i>
        </a>

        <a href="#" data-action="fullscreen" class="orange2">
          <i class="ace-icon fa fa-expand"></i>
        </a>

        <a href="javascript:void(0)" onclick="reload_table()" data-action="reload">
          <i class="ace-icon fa fa-refresh"></i>
        </a>

        <a href="#" data-action="collapse">
          <i class="ace-icon fa fa-chevron-up"></i>
        </a>

        <a href="#" data-action="close">
          <i class="ace-icon fa fa-times"></i>
        </a>
      </div>
    </div>

    <div class="widget-body">
      <div class="widget-main">
            <table id="table" class="table table-bordered table-hover table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th>NO</th>
                      <th>DATEL</th>
                      <th>ATAS NAMA</th>
                      <th>INET</th>
                      <th>SC</th>
                      <th>SC BARU</th>
                      <th>MITRA</th>
                      <th>TEKNISI</th>
                      <th>CREW</th>
                      <th>ORDER BY</th>
                      <th>TGL MASUK</th>
                      <th>STATUS</th>
                      <th>BA DIGITAL</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach($datas as $row) {
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
                      <td><?= $row['atas_nama'] ?></td>
                      <td><?= $row['internet'] ?></td>
                      <td><?= $row['sc'] ?></td>
                      <td><?= $row['sc_baru'] ?></td>
                      <td><?= $row['mitra'] ?></td>
                      <td><?= $row['teknisi'] ?></td>
                      <td><?= $row['crew'] ?></td>
                      <td><?= $row['nama_teknisi'] ?></td>
                      <td><?= $row['tgl_masuk'] ?></td>
                      <td><?= $row['status'] ?></td>
                      <td><?= $ba; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', className: 'btn btn-default' },
            { extend: 'excel', className: 'btn btn-success' }
        ]
    });
  } );
</script>