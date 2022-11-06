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
			<h5 class="widget-title">BA Material Report <?= $bulan . ' ' . $tahun ?></h5>

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
						<div class="table-respoaoive">
							<table id="table" class="table table-bordered table-sm">
								<tr>
									<td colspan="3"><b><i>Report BA DIGITAL ADDON MODIFICATION WITEL SOLO</i></b></td>
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
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=BYL&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['bylblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['bylsdhba']; ?></td>
									<td><?= $rao['bylblmba'] + $rao['bylsdhba'] ?></td>
									<td><?= substr(($rao['bylsdhba'] / ($rao['bylblmba'] + $rao['bylsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KLX</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=KLX&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['klxblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['klxsdhba']; ?></td>
									<td><?= $rao['klxblmba'] + $rao['klxsdhba'] ?></td>
									<td><?= substr(($rao['klxsdhba'] / ($rao['klxblmba'] + $rao['klxsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>PEN</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=PEN&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['klxblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['pensdhba']; ?></td>
									<td><?= $rao['penblmba'] + $rao['pensdhba'] ?></td>
									<td><?= substr(($rao['pensdhba'] / ($rao['penblmba'] + $rao['pensdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SOP</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=SOP&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['sopblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['sopsdhba']; ?></td>
									<td><?= $rao['sopblmba'] + $rao['sopsdhba'] ?></td>
									<td><?= substr(($rao['sopsdhba'] / ($rao['sopblmba'] + $rao['sopsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>GLD</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=GLD&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['gldblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['gldsdhba']; ?></td>
									<td><?= $rao['gldblmba'] + $rao['gldsdhba'] ?></td>
									<td><?= substr(($rao['gldsdhba'] / ($rao['gldblmba'] + $rao['gldsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KRT</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=KRT&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['krtblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['krtsdhba']; ?></td>
									<td><?= $rao['krtblmba'] + $rao['krtsdhba'] ?></td>
									<td><?= substr(($rao['krtsdhba'] / ($rao['krtblmba'] + $rao['krtsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KTO</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=KTO&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['ktoblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['ktosdhba']; ?></td>
									<td><?= $rao['ktoblmba'] + $rao['ktosdhba'] ?></td>
									<td><?= substr(($rao['ktosdhba'] / ($rao['ktoblmba'] + $rao['ktosdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>MSO</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=MSO&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['msoblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['msosdhba']; ?></td>
									<td><?= $rao['msoblmba'] + $rao['msosdhba'] ?></td>
									<td><?= substr(($rao['msosdhba'] / ($rao['msoblmba'] + $rao['msosdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SLO</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=SLO&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['sloblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['slosdhba']; ?></td>
									<td><?= $rao['sloblmba'] + $rao['slosdhba'] ?></td>
									<td><?= substr(($rao['slosdhba'] / ($rao['sloblmba'] + $rao['slosdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>KAR</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=KAR&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['karblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['karsdhba']; ?></td>
									<td><?= $rao['karblmba'] + $rao['karsdhba'] ?></td>
									<td><?= substr(($rao['karsdhba'] / ($rao['karblmba'] + $rao['karsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SRG</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=SRG&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['srgblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['srgsdhba']; ?></td>
									<td><?= $rao['srgblmba'] + $rao['srgsdhba'] ?></td>
									<td><?= substr(($rao['srgsdhba'] / ($rao['srgblmba'] + $rao['srgsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>SKH</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=SKH&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['skhblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['skhsdhba']; ?></td>
									<td><?= $rao['skhblmba'] + $rao['skhsdhba'] ?></td>
									<td><?= substr(($rao['skhsdhba'] / ($rao['skhblmba'] + $rao['skhsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>WNG</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=WNG&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['wngblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['wngsdhba']; ?></td>
									<td><?= $rao['wngblmba'] + $rao['wngsdhba'] ?></td>
									<td><?= substr(($rao['wngsdhba'] / ($rao['wngblmba'] + $rao['wngsdhba'])) * 100, 0, 5) ?>%</td>
								</tr>
								<tr>
									<td><b>GRAND TOTAL</b></td>
									<td style="background: #ff9999;"><a style="color: black;" href="<?= site_url('provisioning/ba_online/fviewnok?datel=all&tahun=' . $tahun . '&bulan=' . $month . '&order=ao') ?>"><?= $rao['gtblmba']; ?></a></td>
									<td style="background: #88f739;"><?= $rao['gtsdhba']; ?></td>
									<td><?= $rao['gtblmba'] + $rao['gtsdhba'] ?></td>
									<td><?= substr(($rao['gtsdhba'] / ($rao['gtblmba'] + $rao['gtsdhba'])) * 100, 0, 5)  ?>%</td>
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
		var link = baseurl + '/provisioning/ba_online/report_ao_filter?ftahun=' + $("#ftahun").val() + '&fbulan=' + $("#fbulan").val();
		window.location.replace(link);
	}
</script>