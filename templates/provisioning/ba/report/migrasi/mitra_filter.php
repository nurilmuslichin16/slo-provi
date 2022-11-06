<?php error_reporting(0);?>
<style type="text/css">
  td{
    text-align: center;
  }
  th{
    text-align: center;
  }
  #table >tbody>tr>td{
      border-bottom: 1px solid #000;
      border-top: 1px solid #000;
      border-left: 1px solid #000;
      border-right: 1px solid #000;
    }
</style>
<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
	<div class="widget-box widget-color-dark" id="widget-box-1">
		<div class="widget-header">
			<h5 class="widget-title">BA Material Report (MITRA) <?= $bulan.' '.$tahun ?></h5>

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
				<div class="row" style="border-bottom: 1px solid #eee;">
		            <div class="col-md-3">
		              <div class="form-group">
		                  <label class="form-control-label"><b>FILTER TAHUN</b></label>
		                  <select class="form-control" id="ftahun" name="ftahun">
		                     <option value="">-Pilih Tahun-</option>
		                     <?= option_tahun_filtered($tahun) ?>
		                  </select>
		              </div>  
		            </div>
		            <div class="col-md-3">
		              <div class="form-group">
		                  <label class="form-control-label"><b>FILTER BULAN</b></label>
		                  <select class="form-control" id="fbulan" name="fbulan" onchange="fbybulan()">
		                     <option value="">-Pilih Bulan-</option>
		                     <?= option_bulan_filtered($month) ?>
		                  </select>
		              </div>  
		            </div>
		        </div>
				<div class="row" style="margin-top: 15px !important; margin: 0 auto;">
					<div class="col-lg-5" style="border-right: 1px solid #eee;">
						<div class="table-responsive">
							<table id="table" class="table table-bordered table-sm">
			                  <tr>
			                    <td colspan="3"><b><i>Report BA DIGITAL MIGRASI WITEL PEKALONGAN</i></b></td>
			                    <td colspan="2"><?= date('Y-m-d H:i') ?></td>
			                  </tr>
			                  <tr>
			                    <td><b>MITRA</b></td>
			                    <td style="background: #ff9999; font-weight: bold;">BELUM BA</td>
			                    <td style="background: #88f739; font-weight: bold;">SUDAH BA</td>
			                    <td>Grand Total</td>
			                    <td>ACH BA Hi</td>
			                  </tr>
			                  <tr>
			                    <td><b>HCP</b></td>
			                    <td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewmnok?mitra=HCP&tahun='.$tahun.'&bulan='.$month.'&order=mig') ?>"><?= $rmit['hcpblmba']; ?></a></td>
			                    <td style="background: #88f739;"><?= $rmit['hcpsdhba']; ?></td>
			                    <td><?= $rmit['hcpblmba'] + $rmit['hcpsdhba'] ?></td>
			                    <td><?= substr(($rmit['hcpsdhba'] / ($rmit['hcpblmba'] + $rmit['hcpsdhba']))*100, 0,5) ?>%</td>
			                  </tr>
			                  <tr>
			                    <td><b>KOPEG</b></td>
			                    <td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewmnok?mitra=KOPEG&tahun='.$tahun.'&bulan='.$month.'&order=mig') ?>"><?= $rmit['kopegblmba']; ?></a></td>
			                    <td style="background: #88f739;"><?= $rmit['kopegsdhba']; ?></td>
			                    <td><?= $rmit['kopegblmba'] + $rmit['kopegsdhba'] ?></td>
			                    <td><?= substr(($rmit['kopegsdhba'] / ($rmit['kopegblmba'] + $rmit['kopegsdhba']))*100, 0,5) ?>%</td>
			                  </tr>
			                  <tr>
			                    <td><b>NUTEL</b></td>
			                    <td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewmnok?mitra=NUTEL&tahun='.$tahun.'&bulan='.$month.'&order=mig') ?>"><?= $rmit['nutelblmba']; ?></a></td>
			                    <td style="background: #88f739;"><?= $rmit['nutelsdhba']; ?></td>
			                    <td><?= $rmit['nutelblmba'] + $rmit['nutelsdhba'] ?></td>
			                    <td><?= substr(($rmit['nutelsdhba'] / ($rmit['nutelblmba'] + $rmit['nutelsdhba']))*100, 0,5) ?>%</td>
			                  </tr>
			                  <tr>
			                    <td><b>ZAG</b></td>
			                    <td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewmnok?mitra=ZAG&tahun='.$tahun.'&bulan='.$month.'&order=mig') ?>"><?= $rmit['zagblmba']; ?></a></td>
			                    <td style="background: #88f739;"><?= $rmit['zagsdhba']; ?></td>
			                    <td><?= $rmit['zagblmba'] + $rmit['zagsdhba'] ?></td>
			                    <td><?= substr(($rmit['zagsdhba'] / ($rmit['zagblmba'] + $rmit['zagsdhba']))*100, 0,5) ?>%</td>
			                  </tr>
			                  <tr>
			                    <td><b>SMSI</b></td>
			                    <td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewmnok?mitra=SMSI&tahun='.$tahun.'&bulan='.$month.'&order=mig') ?>"><?= number_format($rmit['smsiblmba']); ?></a></td>
			                    <td style="background: #88f739;"><?= number_format($rmit['smsisdhba']); ?></td>
			                    <td><?= number_format($rmit['smsiblmba']) + number_format($rmit['smsisdhba']) ?></td>
			                    <td><?= substr((number_format($rmit['smsisdhba']) / (number_format($rmit['smsiblmba']) + number_format($rmit['smsisdhba'])))*100, 0,5) ?>%</td>
			                  </tr>
			                  <tr>
			                    <td><b>TKM</b></td>
			                    <td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewmnok?mitra=TKM&tahun='.$tahun.'&bulan='.$month.'&order=mig') ?>"><?= $rmit['tkmblmba']; ?></a></td>
			                    <td style="background: #88f739;"><?= $rmit['tkmsdhba']; ?></td>
			                    <td><?= $rmit['tkmblmba'] + $rmit['tkmsdhba'] ?></td>
			                    <td><?= substr(($rmit['tkmsdhba'] / ($rmit['tkmblmba'] + $rmit['tkmsdhba']))*100, 0,5) ?>%</td>
			                  </tr>
			                  <tr>
			                    <td><b>TA</b></td>
			                    <td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewmnok?mitra=TA&tahun='.$tahun.'&bulan='.$month.'&order=mig') ?>"><?= $rmit['tablmba']; ?></a></td>
			                    <td style="background: #88f739;"><?= $rmit['tasdhba']; ?></td>
			                    <td><?= $rmit['tablmba'] + $rmit['tasdhba'] ?></td>
			                    <td><?= substr(($rmit['tasdhba'] / ($rmit['tablmba'] + $rmit['tasdhba']))*100, 0,5) ?>%</td>
			                  </tr>
			                  <tr>
			                    <td><b>GLOBAL</b></td>
			                    <td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewmnok?mitra=GLOBAL&tahun='.$tahun.'&bulan='.$month.'&order=mig') ?>"><?= $rmit['globalblmba']; ?></a></td>
			                    <td style="background: #88f739;"><?= $rmit['globalsdhba']; ?></td>
			                    <td><?= $rmit['globalblmba'] + $rmit['globalsdhba'] ?></td>
			                    <td><?= substr(($rmit['globalsdhba'] / ($rmit['globalblmba'] + $rmit['globalsdhba']))*100, 0,5) ?>%</td>
			                  </tr>
			                  <tr>
			                    <td><b>KES</b></td>
			                    <td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewmnok?mitra=KES&tahun='.$tahun.'&bulan='.$month.'&order=mig') ?>"><?= $rmit['kesblmba']; ?></a></td>
			                    <td style="background: #88f739;"><?= $rmit['kessdhba']; ?></td>
			                    <td><?= $rmit['kesblmba'] + $rmit['kessdhba'] ?></td>
			                    <td><?= substr(($rmit['kessdhba'] / ($rmit['kesblmba'] + $rmit['kessdhba']))*100, 0,5) ?>%</td>
			                  </tr>
			                  <tr>
			                    <td><b>GRAND TOTAL</b></td>
			                    <td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewmnok?mitra=all&tahun='.$tahun.'&bulan='.$month.'&order=mig') ?>"><?= $rmit['gtblmba']; ?></a></td>
			                    <td style="background: #88f739;"><?= $rmit['gtsdhba']; ?></td>
			                    <td><?= $rmit['gtblmba'] + $rmit['gtsdhba'] ?></td>
			                    <td><?= substr(($rmit['gtsdhba'] / ($rmit['gtblmba'] + $rmit['gtsdhba']))*100, 0,5)  ?>%</td>
			                  </tr>
			                </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  function fbybulan() {
    var baseurl = '<?= site_url() ?>'
    var link = baseurl+'/provisioning/ba_online/report_mig_mitra_filter?ftahun='+$("#ftahun").val()+'&fbulan='+$("#fbulan").val();
    window.location.replace(link);
  }
</script>
