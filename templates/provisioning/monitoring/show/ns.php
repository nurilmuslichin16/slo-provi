<style type="text/css">
	#table >tbody>tr>td{
      height:20px;
      padding:2px;
      border-top: 0px;
      font-size: 12px;
      border-bottom: 1px solid #c8ced3;
      margin-right: 10px;
      color: black;
    }
</style>
<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
  <div class="widget-box widget-color-dark" id="widget-box-1">
    <div class="widget-header">
      <h5 class="widget-title">Monitoring <?= $subtitle ?></h5>
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
        <div id="pesan" style="margin: 10px 5px;"></div>
        <table id="table" class="table table-bordered table-hover table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>NO</th>
                <th>DATEL</th>
                <th>ORDER</th>
                <th width="10px;">LY</th>
                <th>T VOICE</th>
                <th>T INET</th>
                <th>A.N.</th>
                <th>Voice</th>
                <th>Internet</th>
                <th>SN</th>
                <th>SC</th>
                <th>RD</th>
                <th>TGL MSK</th>
                <th>OLEH</th>
                <th>HD</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($rowdata as $row) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row['datel'] ?></td>
                  <td><?= $row['order_type'] ?></td>
                  <td><?= $row['layanan'] ?></td>
                  <td><?= $row['testing_voice'] ?></td>
                  <td><?= $row['testing_inet'] ?></td>
                  <td><?= $row['atas_nama'] ?></td>
                  <td><?= $row['voice'] ?></td>
                  <td><?= $row['internet'] ?></td>
                  <td><?= $row['sn'] ?></td>
                  <td><?= $row['sc_baru'] ?></td>
                  <td><?= $row['redaman'] ?></td>
                  <td><?= $row['tgl_masuk'] ?></td>
                  <td><?= $row['nama_teknisi'] ?></td>
                  <td><?= $row['nama_hd'] ?></td>
                  <td><?= $row['status'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            dom: 'Bfrtip',
            "pageLength": 100,
            "scrollX": true,
            buttons: [
                { extend: 'copy', className: 'btn btn-default' },
                { extend: 'excel', className: 'btn btn-success' }
            ]
        });
    });
</script>