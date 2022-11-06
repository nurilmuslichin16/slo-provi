<div class="row">
    <div class="space-6"></div>

    <div class="col-sm-12 infobox-container">
        <div class="infobox infobox-green">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-list"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?= $odmsktoday['jml']; ?></span>
                <div class="infobox-content">Order Total</div>
            </div>

            <div class="badge badge-success">
                Hari ini
            </div>
        </div>

        <div class="infobox infobox-blue">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-shopping-cart"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?= $nstoday['jml']; ?></span>
                <div class="infobox-content">Order New Sales</div>
            </div>

            <div class="badge badge-success">
                Hari ini
            </div>
        </div>

        <div class="infobox infobox-pink">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-paper-plane"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?= $migtoday['jml']; ?></span>
                <div class="infobox-content">Order Migrasi</div>
            </div>

            <div class="badge badge-success">
                Hari ini
            </div>
        </div>

        <div class="infobox infobox-orange">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-refresh"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?= $aotoday['jml']; ?></span>
                <div class="infobox-content">Order Addon</div>
            </div>

            <div class="badge badge-success">
                Hari ini
            </div>
        </div>

        <div class="infobox infobox-red">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-flask"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?= $odprogtoday['jml']; ?></span>
                <div class="infobox-content">Order Progress</div>
            </div>

            <div class="badge badge-success">
                Hari ini
            </div>
        </div>

        <div class="infobox infobox-orange2">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-smile-o"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?= $odwaittoday['jml']; ?></span>
                <div class="infobox-content">Order Waiting</div>
            </div>

            <div class="badge badge-success">
                Hari ini
            </div>
        </div>

        <div class="space-6"></div>

        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-success" id="charts_env">
                    <div class="panel-heading">
                        <div class="panel-title">New Sales</div>
                    </div>

                    <div class="panel-body">
                        <div class="tab-pane active" id="line-chart">
                            <div id="line-chart-ns" class="morrischart" style="height: 300px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-warning" id="charts_env">
                    <div class="panel-heading">
                        <div class="panel-title">Migrasi</div>
                    </div>

                    <div class="panel-body">
                        <div class="tab-pane active" id="line-chart">
                            <div id="line-chart-mig" class="morrischart" style="height: 300px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                Morris.Bar({
                  element: 'line-chart-ns',
                  data: <?php echo $datans;?>,
                  xkey: 'datel',
                  ykeys: ['jml'],
                  labels: ['New Sales'],
                  hideHover: 'auto'
                });

                Morris.Bar({
                  element: 'line-chart-mig',
                  data: <?php echo $datamig;?>,
                  xkey: 'datel',
                  ykeys: ['jml'],
                  labels: ['Migrasi'],
                  hideHover: 'auto'
                });
            </script>
        </div>

    </div>

    </div><!-- /.col -->
</div><!-- /.row -->