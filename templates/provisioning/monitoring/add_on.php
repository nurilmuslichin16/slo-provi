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
			<h5 class="widget-title">Monitoring ADD ON Order</h5>

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
									<td colspan="4"><b><i>PROG ADDON MODIFICATION WITEL SOLO</i></b></td>
									<td colspan="2"><?= date('Y-m-d H:i') ?></td>
								</tr>
								<tr>
									<th rowspan="2" width="25px;" style="vertical-align: middle; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; border-top: 1px solid #000;">DATEL</th>
									<th colspan="2" style="background: #f5ba3b; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>SET & CREATE</i></b></th>
									<th colspan="2" style="background: #a6f5e3; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>PS ADD ON</i></b></th>
									<th rowspan="2" style="background: #64f92e; border-bottom: 1px solid #000; border-right: 1px solid #000;vertical-align: middle;" width="25px;">TOTAL ADD ON</th>
								</tr>
								<tr>
									<th width="25px;" style="background: #f5ba3b; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>SET</i></b></th>
									<th width="25px;" style="background: #f5ba3b; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>FALLOUT</i></b></th>
									<th width="25px;" style="background: #a6f5e3; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>COMP</i></b></th>
									<th width="25px;" style="background: #a6f5e3; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>PS</i></b></th>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>BYL</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrbyl']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallbyl']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compbyl']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['psbyl']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnsbyl']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KLX</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrklx']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallklx']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compklx']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['psklx']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnsklx']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>PEN</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrpen']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallpen']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['comppen']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['pspen']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnspen']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SOP</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrsop']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallsop']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compsop']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['pssop']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnssop']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>GLD</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrgld']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallgld']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compgld']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['psgld']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnsgld']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KRT</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrkrt']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallkrt']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compkrt']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['pskrt']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnskrt']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KTO</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrkto']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallkto']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compkto']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['pskto']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnskto']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>MSO</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrmso']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallmso']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compmso']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['psmso']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnsmso']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SLO</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrslo']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallslo']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compslo']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['psslo']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnsslo']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KAR</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrkar']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallkar']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compkar']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['pskar']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnskar']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SRG</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrsrg']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallsrg']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compsrg']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['pssrg']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnssrg']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SKH</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrskh']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallskh']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compskh']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['psskh']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnsskh']; ?></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>WNG</i></b></td>
									<td style="background: #f5ba3b;"><?= $dataao['hrwng']; ?></td>
									<td style="background: #f5ba3b;"><?= $dataao['fallwng']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['compwng']; ?></td>
									<td style="background: #a6f5e3;"><?= $dataao['pswng']; ?></td>
									<td style="background: #64f92e;"><?= $dataao['totnswng']; ?></td>
								</tr>
								<tr>
									<td style="font-size: 16px; text-align: left;"><b><i>TOT</i></b></td>
									<td style="font-size: 16px; font-weight: bold; background: #f5ba3b;"><a style="text-decoration: none; color:#000;" href="showao/all/hr"><?= $dataao['hrall']; ?></a></td>
									<td style="font-size: 16px; font-weight: bold; background: #f5ba3b;"><a style="text-decoration: none; color:#000;" href="showao/all/fact"><?= $dataao['fallall']; ?></a></td>
									<td style="font-size: 16px; font-weight: bold; background: #a6f5e3;"><a style="text-decoration: none; color:#000;" href="showao/all/comp"><?= $dataao['compall']; ?></a></td>
									<td style="font-size: 16px; font-weight: bold; background: #a6f5e3;"><a style="text-decoration: none; color:#000;" href="showao/all/ps"><?= $dataao['psall']; ?></a></td>
									<td style="font-size: 16px; font-weight: bold; background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showao/all/ao"><?= $dataao['totnsall']; ?></a></td>
								</tr>
								<tr>
									<td colspan="5" style="text-align: right"><b><i>TOTAL SET & FACT</i></b></td>
									<td style="font-size: 18px; font-weight: bold"><?= $dataao['hrandfact']; ?></td>
								</tr>
								<tr>
									<td colspan="5" style="text-align: right; background: #b0ceea;"><b><i>TOTAL PS/COMPLETE ADD ON</i></b></td>
									<td style="font-size: 18px; font-weight: bold; background: #b0ceea;"><?= $dataao['psandcomp']; ?></td>
								</tr>
								<tr>
									<td colspan="6" style="font-size: 20px; font-weight: bold"><i>SOLO SAKPORE...!</i></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-7">
						<div id="grafik-ao" class="morrischart" style="height: 300px"></div>
						<br><br>
						<div style="width: 10px; height: 10px; background: #0b62A4; display: inline-block;"></div> HR
						<div style="width: 10px; height: 10px; background: #7a92a3; display: inline-block; margin-left: 10px;"></div> FALLOUT
						<div style="width: 10px; height: 10px; background: #4da74d; display: inline-block; margin-left: 10px;"></div> COMP
						<div style="width: 10px; height: 10px; background: #afd8f8; display: inline-block; margin-left: 10px;"></div> PS
						<div style="width: 10px; height: 10px; background: #edc240; display: inline-block; margin-left: 10px;"></div> TOTAL NS
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
		element: 'grafik-ao',
		data: <?php echo $grafao; ?>,
		xkey: 'datel',
		ykeys: ['hr', 'fact', 'comp', 'ps', 'totns'],
		labels: ['HR', 'FACT', 'COMP', 'PS', 'TOTAL NS'],
		hideHover: 'auto',
		labelTop: true,
		gridTextWeight: 'bold'
	});
</script>