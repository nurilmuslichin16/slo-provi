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
			<h5 class="widget-title">Material Report</h5>

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
									<td colspan="3"><b><i>Report BA DIGITAL NEW SALES WITEL SOLO</i></b></td>
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
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=BYL&order=ns') ?>"><?= $rns['bylblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['bylsdhba']; ?></td>
									<td><?= $rns['bylblmba'] + $rns['bylsdhba'] ?></td>
									<td><?= substr(($rns['bylsdhba'] / ($rns['bylblmba'] + $rns['bylsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KLX</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=KLX&order=ns') ?>"><?= $rns['klxblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['klxsdhba']; ?></td>
									<td><?= $rns['klxblmba'] + $rns['klxsdhba'] ?></td>
									<td><?= substr(($rns['klxsdhba'] / ($rns['klxblmba'] + $rns['klxsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>PEN</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=PEN&order=ns') ?>"><?= $rns['penblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['pensdhba']; ?></td>
									<td><?= $rns['penblmba'] + $rns['pensdhba'] ?></td>
									<td><?= substr(($rns['pensdhba'] / ($rns['penblmba'] + $rns['pensdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SOP</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=SOP&order=ns') ?>"><?= $rns['sopblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['sopsdhba']; ?></td>
									<td><?= $rns['sopblmba'] + $rns['sopsdhba'] ?></td>
									<td><?= substr(($rns['sopsdhba'] / ($rns['sopblmba'] + $rns['sopsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>GLD</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=GLD&order=ns') ?>"><?= $rns['gldblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['gldsdhba']; ?></td>
									<td><?= $rns['gldblmba'] + $rns['gldsdhba'] ?></td>
									<td><?= substr(($rns['gldsdhba'] / ($rns['gldblmba'] + $rns['gldsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KRT</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=KRT&order=ns') ?>"><?= $rns['krtblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['krtsdhba']; ?></td>
									<td><?= $rns['krtblmba'] + $rns['krtsdhba'] ?></td>
									<td><?= substr(($rns['krtsdhba'] / ($rns['krtblmba'] + $rns['krtsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KTO</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=KTO&order=ns') ?>"><?= $rns['ktoblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['ktosdhba']; ?></td>
									<td><?= $rns['ktoblmba'] + $rns['ktosdhba'] ?></td>
									<td><?= substr(($rns['ktosdhba'] / ($rns['ktoblmba'] + $rns['ktosdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>MSO</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=MSO&order=ns') ?>"><?= $rns['msoblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['msosdhba']; ?></td>
									<td><?= $rns['msoblmba'] + $rns['msosdhba'] ?></td>
									<td><?= substr(($rns['msosdhba'] / ($rns['msoblmba'] + $rns['msosdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SLO</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=SLO&order=ns') ?>"><?= $rns['sloblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['slosdhba']; ?></td>
									<td><?= $rns['sloblmba'] + $rns['slosdhba'] ?></td>
									<td><?= substr(($rns['slosdhba'] / ($rns['sloblmba'] + $rns['slosdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KAR</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=KAR&order=ns') ?>"><?= $rns['karblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['karsdhba']; ?></td>
									<td><?= $rns['karblmba'] + $rns['karsdhba'] ?></td>
									<td><?= substr(($rns['karsdhba'] / ($rns['karblmba'] + $rns['karsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SRG</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=SRG&order=ns') ?>"><?= $rns['srgblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['srgsdhba']; ?></td>
									<td><?= $rns['srgblmba'] + $rns['srgsdhba'] ?></td>
									<td><?= substr(($rns['srgsdhba'] / ($rns['srgblmba'] + $rns['srgsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SKH</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=SKH&order=ns') ?>"><?= $rns['skhblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['skhsdhba']; ?></td>
									<td><?= $rns['skhblmba'] + $rns['skhsdhba'] ?></td>
									<td><?= substr(($rns['skhsdhba'] / ($rns['skhblmba'] + $rns['skhsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>WNG</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=WNG&order=ns') ?>"><?= $rns['wngblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['wngsdhba']; ?></td>
									<td><?= $rns['wngblmba'] + $rns['wngsdhba'] ?></td>
									<td><?= substr(($rns['wngsdhba'] / ($rns['wngblmba'] + $rns['wngsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>GRAND TOTAL</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/viewnok?datel=all&order=ns') ?>"><?= $rns['gtblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rns['gtsdhba']; ?></td>
									<td><?= $rns['gtblmba'] + $rns['gtsdhba'] ?></td>
									<td><?= substr(($rns['gtsdhba'] / ($rns['gtblmba'] + $rns['gtsdhba'])) * 100, 0, 5)  ?>%</td>
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
		var link = baseurl + '/provisioning/ba_online/report_ns_filter?ftahun=' + $("#ftahun").val() + '&fbulan=' + $("#fbulan").val();
		window.location.replace(link);
	}
</script>