<div class="main-container ace-save-state" id="main-container">
  <script type="text/javascript">
    try {
      ace.settings.loadState('main-container')
    } catch (e) {}
  </script>

  <div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse ace-save-state">
    <script type="text/javascript">
      try {
        ace.settings.loadState('sidebar')
      } catch (e) {}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
      <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
        <button class="btn btn-success">
          <i class="ace-icon fa fa-signal"></i>
        </button>

        <button class="btn btn-info">
          <i class="ace-icon fa fa-pencil"></i>
        </button>

        <button class="btn btn-warning">
          <i class="ace-icon fa fa-users"></i>
        </button>

        <button class="btn btn-danger">
          <i class="ace-icon fa fa-cogs"></i>
        </button>
      </div>

      <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
        <span class="btn btn-success"></span>

        <span class="btn btn-info"></span>

        <span class="btn btn-warning"></span>

        <span class="btn btn-danger"></span>
      </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
      <li class="hover">
        <a href="<?= site_url('welcome'); ?>">
          <i class="menu-icon fa fa-tachometer"></i>
          <span class="menu-text"> Dashboard </span>
        </a>

        <b class="arrow"></b>
      </li>

      <?php if (menuOrderProvi($this->session->userdata('level'))) { ?>
        <li class="hover">
          <a href="<?= site_url('provisioning/list_order'); ?>">
            <i class="menu-icon fa fa-edit"></i>
            <span class="menu-text"> Order Provi </span>
            <?php if ($odwaittoday['jml'] > 0) { ?>
              <span class="badge badge-transparent tooltip-error" title="<?= $odwaittoday['jml']; ?> waiting order">
                <i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
              </span>
            <?php } ?>
          </a>

          <b class="arrow"></b>
        </li>
      <?php } ?>

      <?php if (menuCekOnu($this->session->userdata('level'))) { ?>
        <li class="hover">
          <a href="<?= site_url('provisioning/cek_onu'); ?>">
            <i class="menu-icon fa fa-check"></i>
            <span class="menu-text"> Cek ONU </span>
            <?php if ($odwaittoday['jml'] > 0) { ?>
              <span class="badge badge-transparent tooltip-error" title="<?= $odwaittoday['jml']; ?> waiting order">
                <i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
              </span>
            <?php } ?>
          </a>

          <b class="arrow"></b>
        </li>
      <?php } ?>

      <li class="hover">
        <a href="#" class="dropdown-toggle">
          <i class="menu-icon fa fa-desktop"></i>
          <span class="menu-text">
            Monitoring Order
          </span>

          <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
          <li class="hover">
            <a href="<?= site_url('provisioning/monitoring/new_sales'); ?>">
              <i class="menu-icon fa fa-caret-right"></i>
              New Sales
            </a>

            <b class="arrow"></b>
          </li>
          <li class="hover">
            <a href="#">
              Migrasi
              <b class="arrow fa fa-angle-right"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
              <li class="hover">
                <a href="<?= site_url('provisioning/monitoring/migrasi_datel'); ?>">
                  Datel
                </a>

                <b class="arrow"></b>
              </li>

              <li class="hover">
                <a href="<?= site_url('provisioning/monitoring/migrasi_mitra'); ?>">
                  Mitra
                </a>

                <b class="arrow"></b>
              </li>
            </ul>
          </li>
          <li class="hover">
            <a href="<?= site_url('provisioning/monitoring/add_on'); ?>">
              <i class="menu-icon fa fa-caret-right"></i>
              Add On
            </a>

            <b class="arrow"></b>
          </li>
        </ul>
      </li>

      <?php if (menuBaOnline($this->session->userdata('level'))) { ?>
        <li class="hover">
          <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-list-alt"></i>
            <span class="menu-text">
              BA Online
            </span>

            <b class="arrow fa fa-angle-down"></b>
          </a>

          <b class="arrow"></b>

          <ul class="submenu">

            <li class="hover">
              <a href="<?= site_url('provisioning/ba_online'); ?>">
                <i class="menu-icon fa fa-caret-right"></i>
                Data
              </a>

              <b class="arrow"></b>
            </li>

            <li class="hover">
              <a href="<?= site_url('provisioning/ba_online/upload'); ?>">
                <i class="menu-icon fa fa-caret-right"></i>
                Import Data
              </a>

              <b class="arrow"></b>
            </li>

            <li class="hover">
              <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-caret-right"></i>

                BA Report
                <b class="arrow fa fa-angle-right"></b>
              </a>

              <b class="arrow"></b>

              <ul class="submenu">
                <li class="hover">
                  <a href="<?= site_url('provisioning/ba_online/report_ns'); ?>">
                    New Sales
                  </a>

                  <b class="arrow"></b>
                </li>

                <li class="hover">
                  <a href="#">
                    Migrasi
                    <b class="arrow fa fa-angle-right"></b>
                  </a>

                  <b class="arrow"></b>

                  <ul class="submenu">
                    <li class="hover">
                      <a href="<?= site_url('provisioning/ba_online/report_mig_datel'); ?>">
                        Datel
                      </a>

                      <b class="arrow"></b>
                    </li>

                    <li class="hover">
                      <a href="<?= site_url('provisioning/ba_online/report_mig_mitra'); ?>">
                        Mitra
                      </a>

                      <b class="arrow"></b>
                    </li>
                  </ul>
                </li>
                <li class="hover">
                  <a href="<?= site_url('provisioning/ba_online/report_ao'); ?>">
                    Add On
                  </a>

                  <b class="arrow"></b>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      <?php } ?>

      <?php if (menuBarcode($this->session->userdata('level'))) { ?>
        <li class="hover">
          <a href="<?= site_url('provisioning/barcode'); ?>">
            <i class="menu-icon fa fa-qrcode"></i>
            <span class="menu-text"> Barcode </span>
          </a>

          <b class="arrow"></b>
        </li>
      <?php } ?>

      <?php if (menuReport($this->session->userdata('level'))) { ?>
        <li class="hover">
          <a href="#">
            <i class="menu-icon fa fa-download"></i>
            <span class="menu-text"> Report</span>
          </a>

          <b class="arrow"></b>

          <ul class="submenu">
            <li class="hover">
              <a href="<?= site_url('provisioning/report/provi'); ?>">
                <i class="menu-icon fa fa-caret-right"></i>
                Provisioning
              </a>

              <b class="arrow"></b>
            </li>

            <li class="hover">
              <a href="<?= site_url('provisioning/report/material'); ?>">
                <i class="menu-icon fa fa-caret-right"></i>
                Material
              </a>

              <b class="arrow"></b>
            </li>
          </ul>
        </li>
      <?php } ?>

      <li class="hover">
        <a href="#" class="dropdown-toggle">
          <i class="menu-icon fa fa-users"></i>
          <span class="menu-text"> Users </span>

          <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">

          <?php if (menuUserWeb($this->session->userdata('level'))) { ?>
            <li class="hover">
              <a href="<?= site_url('users/web'); ?>">
                <i class="menu-icon fa fa-caret-right"></i>
                Users Web
              </a>

              <b class="arrow"></b>
            </li>
          <?php } ?>

          <li class="hover">
            <a href="#" class="dropdown-toggle">
              Users Bot
              <b class="arrow fa fa-angle-right"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

              <?php if (menuUserBotTeknisi($this->session->userdata('level'))) { ?>
                <li class="hover">
                  <a href="<?= site_url('users/teknisi'); ?>">
                    Teknisi
                  </a>

                  <b class="arrow"></b>
                </li>
              <?php } ?>

              <?php if (menuUserBotHelpdesk($this->session->userdata('level'))) { ?>
                <li class="hover">
                  <a href="<?= site_url('users/helpdesk'); ?>">
                    Help Desk
                  </a>

                  <b class="arrow"></b>
                </li>
              <?php } ?>

              <?php if (menuUserBotSales($this->session->userdata('level'))) { ?>
                <li class="hover">
                  <a href="<?= site_url('users/salesman'); ?>">
                    Sales
                  </a>

                  <b class="arrow"></b>
                </li>
              <?php } ?>
            </ul>
          </li>
        </ul>
      </li>

    </ul><!-- /.nav-list -->
  </div>