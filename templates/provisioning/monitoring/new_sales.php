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
			<h5 class="widget-title">Monitoring New Sales Order</h5>

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
									<td colspan="5"><b><i>PROG NEW SALES WITEL SOLO</i></b></td>
									<td colspan="2"><?= date('Y-m-d H:i') ?></td>
								</tr>
								<tr>
									<th rowspan="2" width="25px;" style="vertical-align: middle; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; border-top: 1px solid #000;">DATEL</th>
									<th colspan="3" style="background: #fff454; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>HR & FACT</i></b></th>
									<th colspan="2" style="background: #88f739; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>PS AO</i></b></th>
									<th rowspan="2" style="background: #64f92e; border-bottom: 1px solid #000; border-right: 1px solid #000;vertical-align: middle;" width="25px;">TOTAL NS</th>
								</tr>
								<tr>
									<th width="25px;" style="background: #fff454; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>WAIT ACT</i></b></th>
									<th width="25px;" style="background: #fff454; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>PROG ACT</i></b></th>
									<th width="25px;" style="background: #fff454; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>FALLOUT</i></b></th>
									<th width="25px;" style="background: #88f739; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>COMP</i></b></th>
									<th width="25px;" style="background: #88f739; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>PS</i></b></th>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>BYL</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/byl/wait"><?= $datans['waitbyl']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/byl/prog"><?= $datans['progbyl']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/byl/fact"><?= $datans['fallbyl']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/byl/comp"><?= $datans['compbyl']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/byl/ps"><?= $datans['psbyl']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/byl/ns"><?= $datans['totnsbyl']; ?></a></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KLX</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/klx/wait"><?= $datans['waitklx']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/klx/prog"><?= $datans['progklx']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/klx/fact"><?= $datans['fallklx']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/klx/comp"><?= $datans['compklx']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/klx/ps"><?= $datans['psklx']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/klx/ns"><?= $datans['totnsklx']; ?></a></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SOP</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/sop/wait"><?= $datans['waitsop']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/sop/prog"><?= $datans['progsop']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/sop/fact"><?= $datans['fallsop']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/sop/comp"><?= $datans['compsop']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/sop/ps"><?= $datans['pssop']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/sop/ns"><?= $datans['totnssop']; ?></a></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>GLD</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/gld/wait"><?= $datans['waitgld']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/gld/prog"><?= $datans['proggld']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/gld/fact"><?= $datans['fallgld']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/gld/comp"><?= $datans['compgld']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/gld/ps"><?= $datans['psgld']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/gld/ns"><?= $datans['totnsgld']; ?></a></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KRT</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/krt/wait"><?= $datans['waitkrt']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/krt/prog"><?= $datans['progkrt']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/krt/fact"><?= $datans['fallkrt']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/krt/comp"><?= $datans['compkrt']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/krt/ps"><?= $datans['pskrt']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/krt/ns"><?= $datans['totnskrt']; ?></a></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KTO</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/kto/wait"><?= $datans['waitkto']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/kto/prog"><?= $datans['progkto']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/kto/fact"><?= $datans['fallkto']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/kto/comp"><?= $datans['compkto']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/kto/ps"><?= $datans['pskto']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/kto/ns"><?= $datans['totnskto']; ?></a></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>MSO</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/mso/wait"><?= $datans['waitmso']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/mso/prog"><?= $datans['progmso']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/mso/fact"><?= $datans['fallmso']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/mso/comp"><?= $datans['compmso']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/mso/ps"><?= $datans['psmso']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/mso/ns"><?= $datans['totnsmso']; ?></a></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SLO</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/slo/wait"><?= $datans['waitslo']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/slo/prog"><?= $datans['progslo']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/slo/fact"><?= $datans['fallslo']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/slo/comp"><?= $datans['compslo']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/slo/ps"><?= $datans['psslo']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/slo/ns"><?= $datans['totnsslo']; ?></a></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>KAR</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/kar/wait"><?= $datans['waitkar']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/kar/prog"><?= $datans['progkar']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/kar/fact"><?= $datans['fallkar']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/kar/comp"><?= $datans['compkar']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/kar/ps"><?= $datans['pskar']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/kar/ns"><?= $datans['totnskar']; ?></a></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SRG</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/srg/wait"><?= $datans['waitsrg']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/srg/prog"><?= $datans['progsrg']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/srg/fact"><?= $datans['fallsrg']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/srg/comp"><?= $datans['compsrg']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/srg/ps"><?= $datans['pssrg']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/srg/ns"><?= $datans['totnssrg']; ?></a></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>SKH</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/skh/wait"><?= $datans['waitskh']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/skh/prog"><?= $datans['progskh']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/skh/fact"><?= $datans['fallskh']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/skh/comp"><?= $datans['compskh']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/skh/ps"><?= $datans['psskh']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/skh/ns"><?= $datans['totnsskh']; ?></a></td>
								</tr>
								<tr>
									<td style="text-align: left;"><b><i>WNG</i></b></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/wng/wait"><?= $datans['waitwng']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/wng/prog"><?= $datans['progwng']; ?></a></td>
									<td style="background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/wng/fact"><?= $datans['fallwng']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/wng/comp"><?= $datans['compwng']; ?></a></td>
									<td style="background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/wng/ps"><?= $datans['pswng']; ?></a></td>
									<td style="background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/wng/ns"><?= $datans['totnswng']; ?></a></td>
								</tr>
								<tr>
									<td style="font-size: 16px; text-align: left;"><b><i>TOT</i></b></td>
									<td style="font-size: 16px; font-weight: bold; background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/all/wait"><?= $datans['waitall']; ?></a></td>
									<td style="font-size: 16px; font-weight: bold; background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/all/prog"><?= $datans['progall']; ?></a></td>
									<td style="font-size: 16px; font-weight: bold; background: #fff454;"><a style="text-decoration: none; color:#000;" href="showns/all/fact"><?= $datans['fallall']; ?></a></td>
									<td style="font-size: 16px; font-weight: bold; background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/all/comp"><?= $datans['compall']; ?></a></td>
									<td style="font-size: 16px; font-weight: bold; background: #88f739;"><a style="text-decoration: none; color:#000;" href="showns/all/ps"><?= $datans['psall']; ?></a></td>
									<td style="font-size: 16px; font-weight: bold; background: #64f92e;"><a style="text-decoration: none; color:#000;" href="showns/all/ns"><?= $datans['totnsall']; ?></a></td>
								</tr>
								<tr>
									<td colspan="6" style="text-align: right"><b><i>TOTAL HR & FACT</i></b></td>
									<td style="font-size: 18px; font-weight: bold"><a style="text-decoration: none; color:#000;" href="showns/all/hrnfact"><?= $datans['hrandfact']; ?></a></td>
								</tr>
								<tr>
									<td colspan="6" style="text-align: right; background: #b0ceea;"><b><i>TOTAL PS/COMPLETE NAL</i></b></td>
									<td style="font-size: 18px; font-weight: bold; background: #b0ceea;"><a style="text-decoration: none; color:#000;" href="showns/all/psncomp"><?= $datans['psandcomp']; ?></a></td>
								</tr>
								<tr>
									<td colspan="7" style="font-size: 20px; font-weight: bold"><i>SOLO SAKPORE...!</i></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-7">
						<div id="grafik-ns" class="morrischart" style="height: 410px"></div>
						<br><br>
						<div style="width: 10px; height: 10px; background: #0b62A4; display: inline-block;"></div> WAIT ACT
						<div style="width: 10px; height: 10px; background: #7a92a3; display: inline-block; margin-left: 10px;"></div> PROG ACT
						<div style="width: 10px; height: 10px; background: #4da74d; display: inline-block; margin-left: 10px;"></div> FALLOUT
						<div style="width: 10px; height: 10px; background: #afd8f8; display: inline-block; margin-left: 10px;"></div> COMP
						<div style="width: 10px; height: 10px; background: #edc240; display: inline-block; margin-left: 10px;"></div> PS
						<div style="width: 10px; height: 10px; background: #cb4b4b; display: inline-block; margin-left: 10px;"></div> PS
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
		element: 'grafik-ns',
		data: <?php echo $grafns; ?>,
		xkey: 'datel',
		ykeys: ['wait', 'prog', 'fact', 'comp', 'ps', 'totns'],
		labels: ['WAIT ACT', 'PROG ACT', 'FACT', 'COMP', 'PS', 'TOTAL NS'],
		hideHover: 'auto',
		labelTop: true,
		gridTextWeight: 'bold'
	});
</script>