<?php error_reporting(0); ?>
<style type="text/css">
	td {
		text-align: center;
	}

	th {
		text-align: center;
	}

	#table>tbody>tr>td {
		border-bottom: 1px solid #000;
		border-top: 1px solid #000;
		border-left: 1px solid #000;
		border-right: 1px solid #000;
	}
</style>
<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
	<div class="widget-box widget-color-dark" id="widget-box-1">
		<div class="widget-header">
			<h5 class="widget-title">BA Material Report</h5>

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
								<?= option_tahun() ?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="form-control-label"><b>FILTER BULAN</b></label>
							<select class="form-control" id="fbulan" name="fbulan" onchange="fbybulan()">
								<option value="">-Pilih Bulan-</option>
								<?= option_bulan() ?>
							</select>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top: 15px !important; margin: 0 auto;">
					<div class="col-lg-5" style="border-right: 1px solid #eee;">
						<div class="table-responsive">
							<table id="table" class="table table-bordered table-sm">
								<tr>
									<td colspan="3"><b><i>Report BA DIGITAL MIGRASI WITEL SOLO</i></b></td>
									<td colspan="2"><?= date('Y-m-d H:i') ?></td>
								</tr>
								<tr>
									<td><b>DATEL</b></td>
									<td style="background: #ff9999; font-weight: bold;">BELUM BA</td>
									<td style="background: #88f739; font-weight: bold;">SUDAH BA</td>
									<td>Grand Total</td>
									<td>ACH BA Hi</td>
								</tr>
								<tr>
									<td><b>BYL</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=BYL&order=mig') ?>"><?= $rmig['bylblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['bylsdhba']; ?></td>
									<td><?= $rmig['bylblmba'] + $rmig['bylsdhba'] ?></td>
									<td><?= substr(($rmig['bylsdhba'] / ($rmig['bylblmba'] + $rmig['bylsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KLX</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=KLX&order=mig') ?>"><?= $rmig['klxblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['klxsdhba']; ?></td>
									<td><?= $rmig['klxblmba'] + $rmig['klxsdhba'] ?></td>
									<td><?= substr(($rmig['klxsdhba'] / ($rmig['klxblmba'] + $rmig['klxsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SOP</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=SOP&order=mig') ?>"><?= $rmig['sopblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['sopsdhba']; ?></td>
									<td><?= $rmig['sopblmba'] + $rmig['sopsdhba'] ?></td>
									<td><?= substr(($rmig['sopsdhba'] / ($rmig['sopblmba'] + $rmig['sopsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>GLD</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=GLD&order=mig') ?>"><?= $rmig['gldblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['gldsdhba']; ?></td>
									<td><?= $rmig['gldblmba'] + $rmig['gldsdhba'] ?></td>
									<td><?= substr(($rmig['gldsdhba'] / ($rmig['gldblmba'] + $rmig['gldsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KRT</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=KRT&order=mig') ?>"><?= $rmig['krtblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['krtsdhba']; ?></td>
									<td><?= $rmig['krtblmba'] + $rmig['krtsdhba'] ?></td>
									<td><?= substr(($rmig['krtsdhba'] / ($rmig['krtblmba'] + $rmig['krtsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KTO</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=KTO&order=mig') ?>"><?= $rmig['ktoblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['ktosdhba']; ?></td>
									<td><?= $rmig['ktoblmba'] + $rmig['ktosdhba'] ?></td>
									<td><?= substr(($rmig['ktosdhba'] / ($rmig['ktoblmba'] + $rmig['ktosdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>MSO</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=MSO&order=mig') ?>"><?= $rmig['msoblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['msosdhba']; ?></td>
									<td><?= $rmig['msoblmba'] + $rmig['msosdhba'] ?></td>
									<td><?= substr(($rmig['msosdhba'] / ($rmig['msoblmba'] + $rmig['msosdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SLO</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=SLO&order=mig') ?>"><?= $rmig['sloblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['slosdhba']; ?></td>
									<td><?= $rmig['sloblmba'] + $rmig['slosdhba'] ?></td>
									<td><?= substr(($rmig['slosdhba'] / ($rmig['sloblmba'] + $rmig['slosdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KAR</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=KAR&order=mig') ?>"><?= $rmig['karblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['karsdhba']; ?></td>
									<td><?= $rmig['karblmba'] + $rmig['karsdhba'] ?></td>
									<td><?= substr(($rmig['karsdhba'] / ($rmig['karblmba'] + $rmig['karsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SRG</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=SRG&order=mig') ?>"><?= $rmig['srgblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['srgsdhba']; ?></td>
									<td><?= $rmig['srgblmba'] + $rmig['srgsdhba'] ?></td>
									<td><?= substr(($rmig['srgsdhba'] / ($rmig['srgblmba'] + $rmig['srgsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SKH</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=SKH&order=mig') ?>"><?= $rmig['skhblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['skhsdhba']; ?></td>
									<td><?= $rmig['skhblmba'] + $rmig['skhsdhba'] ?></td>
									<td><?= substr(($rmig['skhsdhba'] / ($rmig['skhblmba'] + $rmig['skhsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>WNG</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=WNG&order=mig') ?>"><?= $rmig['wngblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['wngsdhba']; ?></td>
									<td><?= $rmig['wngblmba'] + $rmig['wngsdhba'] ?></td>
									<td><?= substr(($rmig['wngsdhba'] / ($rmig['wngblmba'] + $rmig['wngsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>GRAND TOTAL</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=all&order=mig') ?>"><?= $rmig['gtblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rmig['gtsdhba']; ?></td>
									<td><?= $rmig['gtblmba'] + $rmig['gtsdhba'] ?></td>
									<td><?= substr(($rmig['gtsdhba'] / ($rmig['gtblmba'] + $rmig['gtsdhba'])) * 100, 0, 5)  ?>%</td>
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
		var link = baseurl + '/provisioning/ba_online/report_mig_filter?ftahun=' + $("#ftahun").val() + '&fbulan=' + $("#fbulan").val();
		window.location.replace(link);
	}
</script>