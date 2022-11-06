<style type="text/css">
    #table>tbody>tr>td {
        height: 20px;
        padding: 2px;
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
            max-width: 1200px;
        }
    }
</style>
<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
    <div class="widget-box widget-color-dark" id="widget-box-1">
        <div class="widget-header">
            <h5 class="widget-title">Order List Provisioning</h5>

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
                            <label><b>FILTER DATEL</b></label>
                            <select class="form-control input-sm" id="fdatel" name="fdatel">
                                <option value="">ALL</option>
                                <option value="BYL">BOYOLALI</option>
                                <option value="KLX">KLATEN</option>
                                <option value="SOP">PALUR</option>
                                <option value="GLD">GLADAK</option>
                                <option value="KRT">KERTEN</option>
                                <option value="KTO">KARTOSURO</option>
                                <option value="MSO">MOJOSONGO</option>
                                <option value="SLO">SOLO</option>
                                <option value="KAR">KARANGANYAR</option>
                                <option value="SRG">SRAGEN</option>
                                <option value="SKH">SUKOHARJO</option>
                                <option value="WNG">WONOGIRI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><b>FILTER HD</b></label>
                            <select class="form-control input-sm" id="fhd" name="fhd">
                                <option value="">All HD</option>
                                <?php foreach ($hdp as $key) { ?>
                                    <option value="<?= $key['hd_penerima'] ?>"><?= $key['nama_hd'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><b>FILTER STATUS</b></label>
                            <select class="form-control input-sm" id="fstatus" name="fstatus">
                                <option value="">ALL</option>
                                <option value="1">WAITING</option>
                                <option value="2">PROGRESS</option>
                                <option value="3">FALLOUT</option>
                                <option value="4">COMPLETE</option>
                                <option value="5">FALLOUT DATA</option>
                                <option value="6">LIVE</option>
                                <option value="7">PS</option>
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
                            <th>DTL</th>
                            <th>ORDER</th>
                            <th width="10px;">LY</th>
                            <th>T VOICE</th>
                            <th>T INET</th>
                            <th>USEE</th>
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
                            <th>BA</th>
                            <th>FAILWA</th>
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
                "url": "<?php echo site_url('provisioning/list_order/create_list') ?>",
                "type": "POST",
                "data": function(data) {
                    data.fstatus = $('#fstatus').val();
                    data.fhd = $('#fhd').val();
                    data.ftgl = $('#ftgl').val();
                    data.fdatel = $('#fdatel').val();
                }
            },

            dom: 'Bfrtip',
            buttons: [{
                text: 'Download Excel',
                className: 'btn btn-success btn-sm',
                action: function(e, dt, node, config) {
                    window.location.href = 'report/today';
                }
            }],

            language: {
                "processing": "Loading. Please wait...",
                "infoFiltered": ""
            },

            "createdRow": function(row, data, dataIndex) {
                if (data[16] == "ps") {
                    $(row).addClass('green');
                }

                if (data[16] == "fdata" || data[16] == "comp") {
                    $(row).addClass('greenlight');
                }

                if (data[16] == "live") {
                    $(row).addClass('blue');
                }

                if (data[2] == "MIG" || data[2] == "MIG NAL" || data[2] == "MIGRASI") {
                    $(row).addClass('orange');
                }

            },

            "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                },

            ],
        });

        $('#fstatus').on('change', function() {
            table.ajax.reload();
        });

        $('#fhd').on('change', function() {
            table.ajax.reload();
        });

        $('#ftgl').on('change', function() {
            table.ajax.reload();
        });

        $('#fdatel').on('change', function() {
            table.ajax.reload();
        });

        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd",
            orientation: "top auto",
            todayBtn: true
        });

        setInterval(function() {
            table.ajax.reload();
        }, 60000);

        $("input").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

        $("textarea").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

        $("select").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });

    function reload_table() {
        table.ajax.reload(null, false);
    }

    function follow_up(id) {
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#pesan').val('');

        $.ajax({
            url: "<?php echo site_url('provisioning/list_order/detail') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id"]').val(data.create_id);
                $('[name="meid"]').val(data.message_id);
                $('[name="grid"]').val(data.group_id);
                $('[name="datel"]').val(data.datel);
                $('[name="order"]').val(data.order_type);
                $('[name="testing_voice"]').val(data.testing_voice);
                $('[name="testing_inet"]').val(data.testing_inet);
                $('[name="layanan"]').val(data.layanan);
                $('[name="atas_nama"]').val(data.atas_nama);
                $('[name="alamat"]').val(data.alamat);
                $('[name="cp"]').val(data.cp);
                $('[name="stb_id"]').val(data.stb_id);
                $('[name="telepon"]').val(data.voice);
                $('[name="inet"]').val(data.internet);
                $('[name="dc"]').val(data.dropcore);
                $('[name="odp"]').val(data.odp + ':' + data.port + ':' + data.sisa);
                $('[name="sn"]').val(data.sn);
                $('[name="order_by"]').val(data.nama_teknisi);
                $('[name="sc"]').val(data.sc + ' / ' + data.sc_baru);
                $('[name="barcode"]').val(data.barcode);
                $('[name="redaman"]').val(data.redaman);
                $('[name="live_usee"]').val(data.live_usee);
                $('[name="mitra"]').val(data.mitra);
                $('[name="teknisi"]').val(data.teknisi + ':' + data.crew);
                $('[name="tgl_masuk"]').val(data.tgl_masuk);
                $('[name="tgl_ps"]').datepicker().datepicker("setDate", new Date());
                $('[name="status"]').val(data.status);
                $('[name="failwa"]').val(data.failwa);
                $('[name="pesan"]').val('');
                /*sales data*/
                $('[name="sales_id"]').val(data.sales_id);
                $('[name="s_t_id"]').val(data.message_from);
                $('[name="s_m_id"]').val(data.s_m_id);

                if (data.status == 'waiting') {
                    $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                    $("#status_update").append(new Option("ON PROGRESS", "progress"));
                } else if (data.status == 'progress') {
                    $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                    $("#status_update").append(new Option("FALLOUT", "fallout"));
                    $("#status_update").append(new Option("COMPLETE", "complete"));
                    $("#status_update").append(new Option("KENDALA", "kendala"));
                    $("#status_update").append(new Option("STUCK", "stuck"));
                } else if (data.status == 'fallout') {
                    $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                    $("#status_update").append(new Option("COMPLETE", "complete"));
                } else if (data.status == 'complete') {
                    $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                    $("#status_update").append(new Option("LIVE", "live"));
                    $("#status_update").append(new Option("FALLOUT DATA", "fdata"));
                    $("#status_update").append(new Option("PS", "ps"));
                } else if (data.status == 'live') {
                    $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                    $("#status_update").append(new Option("FALLOUT DATA", "fdata"));
                    $("#status_update").append(new Option("PS", "ps"));
                } else if (data.status == 'fdata') {
                    $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                    $("#status_update").append(new Option("PS", "ps"));
                } else if (data.status == 'kendala') {
                    $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                    $("#status_update").append(new Option("FALLOUT", "fallout"));
                    $("#status_update").append(new Option("COMPLETE", "complete"));
                } else {
                    $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                }

                $('#modal_form').modal('show');
                $('.modal-title').text('Order Detail');
            },

            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function save() {

        $('#btnSave').text('sedang mengubah...');
        $('#btnSave').attr('disabled', true);

        var url;
        url = "<?php echo site_url('provisioning/list_order/update') ?>";

        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    if ($('#status_id').val() == 2) {
                        reload_table();
                        document.getElementById('pesan').innerHTML = data.pesan;
                        $('#status_update').empty().append('<option selected="selected" value="">--Pilih Status Order--</option>');
                        $("#status_update").append(new Option("FALLOUT", "fallout"));
                        $("#status_update").append(new Option("COMPLETE", "complete"));
                        $("#status_update").append(new Option("KENDALA", "kendala"));
                        $("#status_update").append(new Option("STUCK", "stuck"));
                    } else {
                        $('#modal_form').modal('hide');
                        reload_table();
                        document.getElementById('pesan').innerHTML = data.pesan;
                    }
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                    }
                }
                $('#btnSave').text('Update Progress');
                $('#btnSave').attr('disabled', false);
            },

            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSave').text('Update Progress');
                $('#btnSave').attr('disabled', false);
            }
        });
    }

    function delete_data(id)

    {
        if (confirm('Yakin Hapus Data Ini?')) {
            $.ajax({
                url: "<?php echo site_url('provisioning/list_order/delete') ?>/" + id,
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

    function getstID() {

        $('#status_update').on('change', function() {
            if (this.value == 'progress') {
                $('#status_id').val('2')
            } else if (this.value == 'fallout') {
                $('#status_id').val('3')
            } else if (this.value == 'complete') {
                $('#status_id').val('4')
            } else if (this.value == 'fdata') {
                $('#status_id').val('5')
            } else if (this.value == 'live') {
                $('#status_id').val('6')
            } else if (this.value == 'ps') {
                $('#status_id').val('7')
            }
        });
    }
</script>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id" />
                    <input type="hidden" value="" name="meid" />
                    <input type="hidden" value="" name="grid" />
                    <input type="hidden" value="" name="s_m_id" />
                    <input type="hidden" value="" name="s_t_id" />
                    <input type="hidden" value="" name="sales_id" />
                    <input type="hidden" value="" name="dc" />
                    <input type="hidden" value="" name="status_id" id="status_id" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-lg-2" style="border-right: 1px solid #eee;">
                                <div>
                                    <label>DATEL :</label>
                                    <select name="datel" class="form-control">
                                        <option value="">--Pilih Datel--</option>
                                        <option value="BYL">BOYOLALI</option>
                                        <option value="KLX">KLATEN</option>
                                        <option value="SOP">PALUR</option>
                                        <option value="GLD">GLADAK</option>
                                        <option value="KRT">KERTEN</option>
                                        <option value="KTO">KARTOSURO</option>
                                        <option value="MSO">MOJOSONGO</option>
                                        <option value="SLO">SOLO</option>
                                        <option value="KAR">KARANGANYAR</option>
                                        <option value="SRG">SRAGEN</option>
                                        <option value="SKH">SUKOHARJO</option>
                                        <option value="WNG">WONOGIRI</option>
                                    </select>
                                </div>
                                <br />
                                <div>
                                    <label>ORDER TYPE :</label>
                                    <select name="order" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="MYI">MYI</option>
                                        <option value="REGULER">REGULER</option>
                                        <option value="MIG">MIG</option>
                                        <option value="MIG NAL">MIG NAL</option>
                                        <option value="2nd STB">2nd STB</option>
                                        <option value="GANTI PAKET">GANTI PAKET</option>
                                        <option value="2P-3P">2P-3P</option>
                                        <option value="WIFI EXTENDER">WIFI EXTENDER</option>
                                        <option value="PLC">PLC</option>
                                        <option value="ADD SERVICE">ADD SERVICE</option>
                                        <option value="BRITE">BRITE</option>
                                        <option value="LITE">LITE</option>
                                        <option value="PPDA">PPDA</option>
                                    </select>
                                </div>
                                <br />
                                <div>
                                    <label>LAYANAN :</label>
                                    <select name="layanan" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="1P">1P</option>
                                        <option value="2P">2P</option>
                                        <option value="3P">3P</option>
                                    </select>
                                </div>
                                <br />
                                <div>
                                    <label>TESTING VOICE :</label>
                                    <select name="testing_voice" class="form-control" placeholder="Pilih">
                                        <option value="">--Pilih--</option>
                                        <option value="IVR (OK)">IVR (OK)</option>
                                        <option value="ROUTING">ROUTING</option>
                                        <option value="BLM IVR">BLM IVR</option>
                                        <option value="NO ND VOICE">NO ND VOICE</option>
                                        <option value="UKUR WFM">UKUR WFM</option>
                                    </select>
                                </div>
                                <br />
                                <div>
                                    <label>TESTING INET :</label>
                                    <select name="testing_inet" class="form-control" placeholder="Pilih">
                                        <option value="">--Pilih--</option>
                                        <option value="SPEC">SPEC</option>
                                        <option value="UNSPEC">UNSPEC</option>
                                        <option value="NO USAGE">NO USAGE</option>
                                        <option value="RETENSI">RETENSI</option>
                                        <option value="ISOLIR">ISOLIR</option>
                                        <option value="UKUR WFM">UKUR WFM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3" style="border-right: 1px solid #eee;">
                                <div>
                                    <label>ATAS NAMA :</label>
                                    <input name="atas_nama" class="form-control" type="text">
                                </div>
                                <br />
                                <div>
                                    <label>ALAMAT :</label>
                                    <textarea name="alamat" class="form-control" rows="4"></textarea>
                                </div>
                                <br />
                                <div>
                                    <label>CP :</label>
                                    <input name="cp" class="form-control" type="text">
                                </div>
                                <br />
                                <div>
                                    <label>VOICE :</label>
                                    <input name="telepon" class="form-control" type="text">
                                </div>
                                <br />
                                <div>
                                    <label>INET :</label>
                                    <input name="inet" class="form-control" type="text">
                                </div>
                                <br />
                            </div>
                            <div class="col-lg-3" style="border-right: 1px solid #eee;">
                                <div>
                                    <label>SC LAMA / BARU :</label>
                                    <input name="sc" class="form-control" type="text">
                                </div>
                                <br />
                                <div>
                                    <label>ODP:PORT:SISA :</label>
                                    <input name="odp" class="form-control" type="text">
                                </div>
                                <br />
                                <div>
                                    <label>STB ID :</label>
                                    <input name="stb_id" class="form-control" type="text">
                                </div>
                                <br />
                                <div>
                                    <label>TEKNISI:CREW :</label>
                                    <input name="teknisi" class="form-control" type="text">
                                </div>
                                <br />
                                <div>
                                    <label>UPDATE STATUS FAILWA :</label>
                                    <select name="failwa" class="form-control" placeholder="Pilih">
                                        <option value="0">NO FAILWA</option>
                                        <option value="1">FAILWA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2" style="border-right: 1px solid #eee;">
                                <div>
                                    <label>SN :</label>
                                    <input name="sn" class="form-control" type="text">
                                </div>
                                <br />
                                <div>
                                    <label>BARCODE :</label>
                                    <input name="barcode" class="form-control" type="text">
                                </div>
                                <br />
                                <div>
                                    <label>STATUS :</label>
                                    <input name="status" class="form-control" type="text" readonly>
                                </div>
                                <br />
                                <div>
                                    <label>ORDER BY :</label>
                                    <input name="order_by" class="form-control" type="text" readonly>
                                </div>
                                <br />
                                <div>
                                    <label>TGL MASUK :</label>
                                    <input name="tgl_masuk" class="form-control" type="text" readonly>
                                </div>
                                <br />
                                <div>
                                    <label>TGL PS :</label>
                                    <input name="tgl_ps" id="tgl_ps" class="form-control date-picker" type="text">
                                </div>
                                <br />
                            </div>
                            <div class="col-lg-2">
                                <div>
                                    <label>UPDATE STATUS ORDER :</label>
                                    <select name="status_update" onchange="getstID()" id="status_update" class="form-control" placeholder="Pilih">
                                        <option>--Pilih Status--</option>
                                    </select>
                                </div>
                                <br />
                                <div>
                                    <label>LIVE USEE :</label>
                                    <select name="live_usee" class="form-control" placeholder="Pilih">
                                        <option value="">--Pilih--</option>
                                        <option value="Ukur WFM">Ukur WFM</option>
                                        <option value="INVALID">INVALID</option>
                                        <option value="Blm Live">Blm Live</option>
                                        <option value="Live + Eviden">Live + Eviden</option>
                                        <option value="Live No Eviden">Live No Eviden</option>
                                    </select>
                                </div>
                                <br />
                                <div>
                                    <label>REDAMAN :</label>
                                    <input name="redaman" class="form-control" type="text">
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
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Update Progress</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal