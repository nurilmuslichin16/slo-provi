<style type="text/css">
	#table >tbody>tr>td{
      height:20px;
      padding:2px;
      border-top: 0px;
      font-family: calibri;
      font-size: 12px;
      border-bottom: 1px solid #c8ced3;
      margin-right: 10px;
      color: black;
    }
    .green {
      background-color: #64DD17 !important;
    }
    .greenlight {
      background-color: #76FF03 !important;
    }
    .blue {
      background-color: #18FFFF !important;
    }
    .orange {
      background-color: #ffc400 !important;
    }
    @media (min-width: 768px) {
      .modal-xl {
        width: 90%;
       max-width:1200px;
      }
    }
</style>
<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
	<div class="widget-box widget-color-dark" id="widget-box-1">
		<div class="widget-header">
			<h5 class="widget-title">Order List Cek ONU</h5>

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
                <div id="pesan" style="margin: 10px 5px;"></div>
				<div class="row">
	                <div class="col-lg-3">
	                    <div class="form-group">
	                        <label><b>FILTER STATUS</b></label>
	                        <select class="form-control input-sm" id="fstatus" name="fstatus">
	                           <option value="">ALL</option>
	                           <option value="REQUEST">REQUEST</option>
	                           <option value="OK">OK</option>
	                           <option value="NOK">NOK</option>
	                        </select>
	                    </div>  
	                </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><b>FILTER TGL</b></label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control date-picker" name="ftgl" id="ftgl" type="text" data-date-format="yyyy-mm-dd" />
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
	            </div>
	            <table id="table" class="table table-bordered table-hover table-sm text-nowrap" cellspacing="0" width="100%">
	                <thead>
	                  <tr>
	                    <th>NO</th>
	                    <th>JA</th>
	                    <th>PELANGGAN</th>
	                    <th>CP</th>
	                    <th>ODP</th>
	                    <th>TGL MASUK</th>
	                    <th>REQ BY</th>
	                    <th>HD</th>
	                    <th>STATUS</th>
	                    <?php if ($this->session->userdata('level') > 0) { ?>
                        <th width="20px;"><i class="fa fa-gear"></i></th>
                        <?php } ?>
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

var save_method;
var table;

$(document).ready(function() {
    //datatables
    table = $('#table').DataTable({ 

        "processing": true,
        "serverSide": true,
        "order": [],
        "iDisplayLength": 100,
        "scrollX": true,
        "scrollY": "450px",
        "scrollCollapse": true,

        "ajax": {
            "url": "<?php echo site_url('provisioning/cek_onu/create_list') ?>",
            "type": "POST",
            "data": function ( data ) {
                data.fstatus = $('#fstatus').val();
                data.ftgl    = $('#ftgl').val();
            }
        },

        language: {
        	"processing": "Loading. Please wait...",
            "infoFiltered": ""
    	},

        "createdRow": function( row, data, dataIndex){
            if(data[8] ==  "OK"){
                $(row).addClass('green');
            }

            if(data[8] ==  "NOK"){
                $(row).addClass('orange');
            }

        },

        "columnDefs": [
        { 
            "targets": [ 0 ],
            "orderable": false,
        },

        ],
    });

    $('#fstatus').on('change', function() {
        table.ajax.reload();
    });

    $('#ftgl').on('change', function() {
        table.ajax.reload();
    });

    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd",
        orientation: "top auto",
        todayBtn: true
    });

    setInterval( function () {
        table.ajax.reload();
    }, 60000 );

    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});

function reload_table()
{
    table.ajax.reload(null,false);
}

function follow_up(id)
{
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('#pesan').val('');

    $.ajax({
        url : "<?php echo site_url('provisioning/cek_onu/detail')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.cekonu_id);
            $('[name="meid"]').val(data.message_id);
            $('[name="grid"]').val(data.group_id);
            $('[name="sales_id"]').val(data.sales_id);
            $('[name="nama_pelanggan"]').val(data.nama_pelanggan);
            $('[name="cp"]').val(data.cp);
            $('[name="odp"]').val(data.odp);
            $('[name="created_at"]').val(data.created_at);
            $('[name="status"]').val(data.status);
            $('[name="pesan"]').val('');
            
             if (data.status == 'REQUEST' ) {
                $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                $("#status_update").append(new Option("OGP", "OGP"));
                $("#status_update").append(new Option("OK", "OK"));
                $("#status_update").append(new Option("NOK", "NOK"));
            }
            else if (data.status == 'OGP') {
                $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                $("#status_update").append(new Option("OK", "OK"));
                $("#status_update").append(new Option("NOK", "NOK"));
            }
            else if (data.status == 'NOK') {
                $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                $("#status_update").append(new Option("OK", "OK"));
            }
            else{
                $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
            }

            $('#modal_form').modal('show');
            $('.modal-title').text('Order Detail JA'+data.sales_id+'');
        },

        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function save()
{

    $('#btnSave').text('sedang mengubah...');
    $('#btnSave').attr('disabled',true);

    var url;
    url = "<?php echo site_url('provisioning/cek_onu/update')?>";

    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status)
            {
                if($('#status_id').val() == 'OGP'){
                    reload_table();
                    document.getElementById('pesan').innerHTML = data.pesan;
                    $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                    $("#status_update").append(new Option("OK", "OK"));
                    $("#status_update").append(new Option("NOK", "NOK"));
                }
                else{
                    $('#modal_form').modal('hide');
                    reload_table();
                    document.getElementById('pesan').innerHTML = data.pesan;
                }
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                }
            }
            $('#btnSave').text('Update');
            $('#btnSave').attr('disabled',false);
        },

        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('Update');
            $('#btnSave').attr('disabled',false); 
        }
    });
}

function delete_data(id)

{
    if(confirm('Yakin Hapus Data Ini?'))
    {
        $.ajax({
            url : "<?php echo site_url('provisioning/cek_onu/delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                $('#modal_form').modal('hide');
                reload_table();
                document.getElementById('pesan').innerHTML = data.pesan;
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
    }
}

function getstID(){

    $('#status_update').on('change', function() {
      if (this.value == 'OGP') {
        $('#status_id').val('OGP')
      }
      else if (this.value == 'OK') {
        $('#status_id').val('OK')
      }
      else if (this.value == 'NOK') {
        $('#status_id').val('NOK')
      }
    });
}
</script>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <input type="hidden" value="" name="meid"/>
                    <input type="hidden" value="" name="grid"/>
                    <input type="hidden" value="" name="status_id" id="status_id" />
	                <div class="form-body">
                        <div>
                            <label>UPDATE STATUS ORDER :</label>
                            <select name="status_update" onchange="getstID()" id="status_update" class="form-control" placeholder="Pilih">
                                <option>--Pilih Status--</option>
                            </select>
                        </div>
                        <br />
                        <div>
                            <label>KETERANGAN :</label>
                            <textarea name="ket" class="form-control" rows="5" placeholder="misal: DONE"></textarea>
                        </div>
                        <br />
                        <div>
                            <label>KIRIM PESAN KE TEKNISI :</label>
                            <textarea name="pesan" class="form-control" rows="5" id="pesan" placeholder="misal : oke lanjut"></textarea>
                        </div>
	                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal