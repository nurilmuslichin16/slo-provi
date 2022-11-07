<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
    <button class="btn btn-sm btn-danger ap" id="aktifkan"><i class="fa fa-unlock"></i> Activate Users</button>
    <div class="widget-box widget-color-dark" id="widget-box-1">
        <div class="widget-header">
            <h5 class="widget-title">Teknisi</h5>
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
                <table id="table" class="table table-bordered table-hover table-sm text-nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="40">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" id="check-all" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th>Datel</th>
                            <th>NIK</th>
                            <th>Nama Teknisi</th>
                            <th>CREW</th>
                            <th>Mitra</th>
                            <th>Kategori</th>
                            <th width="90">Active</th>
                            <th width="90"><i class="fa fa-gear"></i></th>
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

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "iDisplayLength": 50,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('users/teknisi/users_list') ?>",
                "type": "POST"
            },

            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-default'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-success'
                }
            ],

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //last column
                "orderable": false, //set not orderable
            }, ],

        });

        $("#check-all").click(function() {
            $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        });

        $('#aktifkan').click(function() {

            var appConfirm = confirm("Aktifkan user?");
            if (appConfirm == true) {
                var users_arr = [];
                $("#check-item:checked").each(function() {
                    var userid = $(this).val();
                    users_arr.push(userid);
                });

                // Array length
                var length = users_arr.length;

                if (length > 0) {

                    $.ajax({
                        url: "<?php echo site_url('users/teknisi/approve_user') ?>",
                        type: 'post',
                        data: {
                            user_ids: users_arr
                        },
                        dataType: "JSON",
                        success: function(response) {
                            reload_table();
                            document.getElementById('pesan').innerHTML = response.pesan;
                        },
                        error: function(request, status, error) {
                            alert(request.responseText);
                        }
                    });
                }
            }
        });

        $("input").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });

    function edit_users(id) {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();

        $.ajax({
            url: "<?php echo site_url('users/teknisi/users_edit') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                var hide = $("#hideDatelKategori").val();

                if (hide == 1) {
                    $("#input_datel").hide();
                    $("#input_kategori").hide();
                }

                $('[name="id"]').val(data.t_telegram_id);
                $('[name="nik"]').val(data.nik);
                $('[name="nama_teknisi"]').val(data.nama_teknisi);
                $('[name="crew"]').val(data.crew);
                $('[name="datel"]').val(data.datel);
                $('[name="mitra"]').val(data.mitra);
                $('[name="active"]').val(data.active);
                $('[name="jenis"]').val(data.jenis);
                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Users');

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function reload_table() {
        table.ajax.reload(null, false);
    }

    function save() {
        $('#btnSave').text('saving...');
        $('#btnSave').attr('disabled', true);
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('users/teknisi/users_add') ?>";
        } else {
            url = "<?php echo site_url('users/teknisi/users_update') ?>";
        }

        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                    document.getElementById('pesan').innerHTML = data.pesan;
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSave').text('save');
                $('#btnSave').attr('disabled', false);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSave').text('save');
                $('#btnSave').attr('disabled', false);

            }
        });
    }

    function delete_users(id) {
        if (confirm('Are you sure delete this data?')) {
            $.ajax({
                url: "<?php echo site_url('users/teknisi/users_delete') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    $('#modal_form').modal('hide');
                    reload_table();
                    document.getElementById('pesan').innerHTML = data.pesan;
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });

        }
    }
</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Users Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id" />

                    <?php if (crudTeknisi($this->session->userdata('level')) == false) { ?>
                        <input type="hidden" id="hideDatelKategori" value="1">
                    <?php } else { ?>
                        <input type="hidden" id="hideDatelKategori" value="0">
                    <?php } ?>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Datel</label>
                            <div class="col-md-9">
                                <select name="datel" class="form-control">
                                    <option value="BYL">BYL</option>
                                    <option value="KLX">KLX</option>
                                    <option value="PEN">PEN</option>
                                    <option value="SOP">SOP</option>
                                    <option value="GLD">GLD</option>
                                    <option value="KRT">KRT</option>
                                    <option value="KTO">KTO</option>
                                    <option value="MSO">MSO</option>
                                    <option value="SLO">SLO</option>
                                    <option value="KAR">KAR</option>
                                    <option value="SRG">SRG</option>
                                    <option value="SKH">SKH</option>
                                    <option value="WNG">WNG</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">NIK</label>
                            <div class="col-md-9">
                                <input name="nik" placeholder="NIK" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input name="nama_teknisi" placeholder="Nama Teknisi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">CREW</label>
                            <div class="col-md-9">
                                <input name="crew" placeholder="CREW" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">MITRA</label>
                            <div class="col-md-9">
                                <input name="mitra" placeholder="Nama Mitra" class="form-control" type="text">
                                <span class="help-block">Misal : HCP, TA, KOPEGTEl, GLOBAL</span>
                            </div>
                        </div>
                        <div id="input_kategori" class="form-group">
                            <label class="control-label col-md-3">Kategori</label>
                            <div class="col-md-9">
                                <select name="jenis" class="form-control">
                                    <option value="rb">Resource Base</option>
                                    <option value="ob">Order Base</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">User Active</label>
                            <div class="col-md-9">
                                <select name="active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->