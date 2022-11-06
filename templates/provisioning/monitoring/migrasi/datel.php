<style type="text/css">
	td {
		text-align: center;
	}

	th {
		text-align: center;
	}

	#table>tbody>tr>td {
		height: 20px;
		padding: 2px;
		border-top: 0px;
		border-bottom: 1px solid #000;
		border-top: 1px solid #000;
		border-left: 1px solid #000;
		border-right: 1px solid #000;
		margin-right: 10px;
	}
</style>
<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
	<div class="widget-box widget-color-dark" id="widget-box-1">
		<div class="widget-header">
			<h5 class="widget-title">Monitoring Migrasi Order Datel</h5>

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
				<div class="row">
					<div class="col-lg-5" style="border-right: 1px solid #eee;">
						<div class="table-responsive">
							<table id="table" class="table table-bordered table-sm">
								<tr>
									<td colspan="4"><b><i>PROG MIGRASI WITEL SOLO</i></b></td>
									<td colspan="2"><?= date('Y-m-d H:i') ?></td>
								</tr>
								<tr>
									<th rowspan="2" width="25px;" style="vertical-align: middle; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; border-top: 1px solid #000;">DATEL</th>
									<th colspan="2" style="background: #B2C5ED; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>HR & CREATE</i></b></th>
									<th colspan="2" style="background: #DDEBF6; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>PS MIG</i></b></th>
									<th rowspan="2" style="background: #64f92e; border-bottom: 1px solid #000; border-right: 1px solid #000;vertical-align: middle;" width="25px;">TOTAL MIG</th>
								</tr>
								<tr>
									<th width="25px;" style="background: #B2C5ED; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>HR</i></b></th>
									<th width="25px;" style="background: #B2C5ED; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>FALLOUT</i></b></th>
									<th width="25px;" style="background: #FFFC00; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>COMP</i></b></th>
									<th width="25px;" style="background: #DDEBF6; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>PS</i></b></th>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>BYL</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrbyl']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallbyl']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compbyl']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['psbyl']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnsbyl']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KLX</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrklx']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallklx']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compklx']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['psklx']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnsklx']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>PEN</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrpen']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallpen']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['comppen']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['pspen']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnspen']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SOP</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrsop']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallsop']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compsop']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['pssop']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnssop']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>GLD</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrgld']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallgld']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compgld']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['psgld']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnsgld']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KRT</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrkrt']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallkrt']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compkrt']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['pskrt']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnskrt']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KTO</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrkto']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallkto']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compkto']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['pskto']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnskto']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>MSO</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrmso']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallmso']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compmso']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['psmso']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnsmso']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SLO</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrslo']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallslo']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compslo']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['psslo']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnsslo']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KAR</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrkar']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallkar']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compkar']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['pskar']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnskar']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SRG</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrsrg']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallsrg']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compsrg']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['pssrg']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnssrg']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SKH</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrskh']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallskh']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compskh']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['psskh']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnsskh']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>WNG</i></b></td>
									<td style="background: #B2C5ED;"><?= $datamd['hrwng']; ?></td>
									<td style="background: #B2C5ED;"><?= $datamd['fallwng']; ?></td>
									<td style="background: #FFFC00;"><?= $datamd['compwng']; ?></td>
									<td style="background: #DDEBF6;"><?= $datamd['pswng']; ?></td>
									<td style="background: #64f92e;"><?= $datamd['totnswng']; ?></td>
								</tr>
								<tr>
									<td style="font-size: 16px; text-align: left;"><b><i>TOT</i></b></td>
									<td style="font-size: 16px; font-weight: bold; background: #B2C5ED;"><?= $datamd['hrall']; ?></td>
									<td style="font-size: 16px; font-weight: bold; background: #B2C5ED;"><?= $datamd['fallall']; ?></td>
									<td style="font-size: 16px; font-weight: bold; background: #FFFC00;"><?= $datamd['compall']; ?></td>
									<td style="font-size: 16px; font-weight: bold; background: #DDEBF6;"><?= $datamd['psall']; ?></td>
									<td style="font-size: 16px; font-weight: bold; background: #64f92e;"><?= $datamd['totnsall']; ?></td>
								</tr>
								<tr>
									<td colspan="5" style="text-align: right"><b><i>TOTAL HR & FACT</i></b></td>
									<td style="font-size: 18px; font-weight: bold"><?= $datamd['hrandfact']; ?></td>
								</tr>
								<tr>
									<td colspan="5" style="text-align: right; background: #b0ceea;"><b><i>TOTAL PS/COMPLETE NAL</i></b></td>
									<td style="font-size: 18px; font-weight: bold; background: #b0ceea;"><?= $datamd['psandcomp']; ?></td>
								</tr>
								<tr>
									<td colspan="6" style="font-size: 20px; font-weight: bold"><i>SOLO SAKPORE...!</i></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-7">
						<div id="grafik-md" class="morrischart" style="height: 410px"></div>
						<br><br>
						<div style="width: 10px; height: 10px; background: #0b62A4; display: inline-block;"></div> HR
						<div style="width: 10px; height: 10px; background: #7a92a3; display: inline-block; margin-left: 10px;"></div> FALLOUT
						<div style="width: 10px; height: 10px; background: #4da74d; display: inline-block; margin-left: 10px;"></div> COMP
						<div style="width: 10px; height: 10px; background: #afd8f8; display: inline-block; margin-left: 10px;"></div> PS
						<div style="width: 10px; height: 10px; background: #edc240; display: inline-block; margin-left: 10px;"></div> TOTAL MIG
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	(function() {
		var $, MyMorris;

		MyMorris = window.MyMorris = {};
		$ = jQuery;

		MyMorris = Object.create(Morris);

		MyMorris.Bar.prototype.defaults["labelTop"] = false;

		MyMorris.Bar.prototype.drawLabelTop = function(xPos, yPos, text) {
			var label;
			return label = this.raphael.text(xPos, yPos, text).attr('font-size', this.options.gridTextSize).attr('font-family', this.options.gridTextFamily).attr('font-weight', this.options.gridTextWeight).attr('fill', this.options.gridTextColor);
		};

		MyMorris.Bar.prototype.drawSeries = function() {
			var barWidth, bottom, groupWidth, idx, lastTop, left, leftPadding, numBars, row, sidx, size, spaceLeft, top, ypos, zeroPos;
			groupWidth = this.width / this.options.data.length;
			numBars = this.options.stacked ? 1 : this.options.ykeys.length;
			barWidth = (groupWidth * this.options.barSizeRatio - this.options.barGap * (numBars - 1)) / numBars;
			if (this.options.barSize) {
				barWidth = Math.min(barWidth, this.options.barSize);
			}
			spaceLeft = groupWidth - barWidth * numBars - this.options.barGap * (numBars - 1);
			leftPadding = spaceLeft / 2;
			zeroPos = this.ymin <= 0 && this.ymax >= 0 ? this.transY(0) : null;
			return this.bars = (function() {
				var _i, _len, _ref, _results;
				_ref = this.data;
				_results = [];
				for (idx = _i = 0, _len = _ref.length; _i < _len; idx = ++_i) {
					row = _ref[idx];
					lastTop = 0;
					_results.push((function() {
						var _j, _len1, _ref1, _results1;
						_ref1 = row._y;
						_results1 = [];
						for (sidx = _j = 0, _len1 = _ref1.length; _j < _len1; sidx = ++_j) {
							ypos = _ref1[sidx];
							if (ypos !== null) {
								if (zeroPos) {
									top = Math.min(ypos, zeroPos);
									bottom = Math.max(ypos, zeroPos);
								} else {
									top = ypos;
									bottom = this.bottom;
								}
								left = this.left + idx * groupWidth + leftPadding;
								if (!this.options.stacked) {
									left += sidx * (barWidth + this.options.barGap);
								}
								size = bottom - top;
								if (this.options.verticalGridCondition && this.options.verticalGridCondition(row.x)) {
									this.drawBar(this.left + idx * groupWidth, this.top, groupWidth, Math.abs(this.top - this.bottom), this.options.verticalGridColor, this.options.verticalGridOpacity, this.options.barRadius, row.y[sidx]);
								}
								if (this.options.stacked) {
									top -= lastTop;
								}
								this.drawBar(left, top, barWidth, size, this.colorFor(row, sidx, 'bar'), this.options.barOpacity, this.options.barRadius);
								_results1.push(lastTop += size);

								if (this.options.labelTop && !this.options.stacked) {
									label = this.drawLabelTop((left + (barWidth / 2)), top - 10, row.y[sidx]);
									textBox = label.getBBox();
									_results.push(textBox);
								}
							} else {
								_results1.push(null);
							}
						}
						return _results1;
					}).call(this));
				}
				return _results;
			}).call(this);
		};
	}).call(this);

	Morris.Bar({
		element: 'grafik-md',
		data: <?php echo $grafmd; ?>,
		xkey: 'datel',
		ykeys: ['hr', 'fact', 'comp', 'ps', 'totns'],
		labels: ['HR', 'FACT', 'COMP', 'PS', 'TOTAL MIG'],
		hideHover: 'auto',
		labelTop: true,
		gridTextWeight: 'bold'
	});
</script>