<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
	<a href="<?php echo site_url("provisioning/ba_online/upload")?>" class="btn btn-square btn-danger btn-sm"><i class="fa fa-upload"></i> Import Laporan Material</a>
	<div class="widget-box widget-color-dark" id="widget-box-1">
		<div class="widget-header">
			<h5 class="widget-title">Ba Material</h5>
			<div class="widget-toolbar">

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
				<?php
	                $info = $this->session->flashdata('info');
	                if (!empty($info)) {
	                    echo $info;
	                }
	            ?>
	            <table id="table" class="table table-bordered table-hover table-sm text-nowrap" cellspacing="0" width="100%">
	                <thead>
		                <tr>
		                    <th width="10">NO</th>
		                    <th>SC</th>
		                </tr>
		            </thead>
		            <tbody>
		                
		            </tbody>
	            </table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('provisioning/ba_online/ba_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
</script>