<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
	<div class="widget-box widget-color-dark" id="widget-box-1">
		<div class="widget-header">
			<h5 class="widget-title">Report Material</h5>

			<div class="widget-toolbar">

				<a href="#" data-action="fullscreen" class="orange2">
					<i class="ace-icon fa fa-expand"></i>
				</a>

				<a href="javascript:void(0)" data-action="reload">
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
			<form autocomplete="off" action="<?= site_url('provisioning/report/download_material') ?>" method="POST">
				<div class="widget-main">
					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
								<label><b>FILTER DATEL</b></label>
								<select class="form-control input-sm" name="fdatel">
									<option value="all">All</option>
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
								<label><b>FILTER JENIS ORDER</b></label>
								<select class="form-control input-sm" name="forder">
									<option value="all">ALL</option>
									<option value="psb">PSB</option>
									<option value="mig">MIGRASI</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label><b>START DATE</b></label>
								<div class="row">
									<div class="col-xs-8 col-sm-11">
										<div class="input-group">
											<input class="form-control date-picker" name="fstartdate" id="ftgl" type="text" data-date-format="yyyy-mm-dd" required />
											<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label><b>END DATE</b></label>
								<div class="row">
									<div class="col-xs-8 col-sm-11">
										<div class="input-group">
											<input class="form-control date-picker" name="fenddate" id="ftgl" type="text" data-date-format="yyyy-mm-dd" required />
											<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" name="submit" class="btn btn-sm btn-danger">Download Data</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.date-picker').datepicker({
			autoclose: true,
			todayHighlight: true
		});
	})
</script>