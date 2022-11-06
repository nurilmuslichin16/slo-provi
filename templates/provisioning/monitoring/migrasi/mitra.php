<style type="text/css">
  td{
    text-align: center;
  }
  th{
    text-align: center;
  }
  #table >tbody>tr>td{
      height:20px;
      padding:2px;
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
			<h5 class="widget-title">Monitoring Migrasi Order Mitra</h5>

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
				                <td colspan="4"><b><i>PROG MIGRASI WITEL PEKALONGAN</i></b></td>
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
			                    <td style="text-align: left;"><b><i>HCP</i></b></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['hrhcp']; ?></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['fallhcp']; ?></td>
			                    <td style="background: #FFFC00;"><?= $datamm['comphcp']; ?></td>
			                    <td style="background: #DDEBF6;"><?= $datamm['pshcp']; ?></td>
			                    <td style="background: #64f92e;"><?= $datamm['totnshcp']; ?></td>
			                  </tr>
			                  <tr>
			                    <td style="text-align: left;"><b><i>KOPEG</i></b></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['hrkopeg']; ?></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['fallkopeg']; ?></td>
			                    <td style="background: #FFFC00;"><?= $datamm['compkopeg']; ?></td>
			                    <td style="background: #DDEBF6;"><?= $datamm['pskopeg']; ?></td>
			                    <td style="background: #64f92e;"><?= $datamm['totnskopeg']; ?></td>
			                  </tr>
			                  <tr>
			                    <td style="text-align: left;"><b><i>NUTEL</i></b></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['hrnutel']; ?></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['fallnutel']; ?></td>
			                    <td style="background: #FFFC00;"><?= $datamm['compnutel']; ?></td>
			                    <td style="background: #DDEBF6;"><?= $datamm['psnutel']; ?></td>
			                    <td style="background: #64f92e;"><?= $datamm['totnsnutel']; ?></td>
			                  </tr>
			                  <tr>
			                    <td style="text-align: left;"><b><i>ZAG</i></b></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['hrzag']; ?></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['fallzag']; ?></td>
			                    <td style="background: #FFFC00;"><?= $datamm['compzag']; ?></td>
			                    <td style="background: #DDEBF6;"><?= $datamm['pszag']; ?></td>
			                    <td style="background: #64f92e;"><?= $datamm['totnszag']; ?></td>
			                  </tr>
			                  <tr>
			                    <td style="text-align: left;"><b><i>SMSI</i></b></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['hrsmsi']; ?></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['fallsmsi']; ?></td>
			                    <td style="background: #FFFC00;"><?= $datamm['compsmsi']; ?></td>
			                    <td style="background: #DDEBF6;"><?= $datamm['pssmsi']; ?></td>
			                    <td style="background: #64f92e;"><?= $datamm['totnssmsi']; ?></td>
			                  </tr>
			                  <tr>
			                    <td style="text-align: left;"><b><i>TKM</i></b></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['hrtkm']; ?></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['falltkm']; ?></td>
			                    <td style="background: #FFFC00;"><?= $datamm['comptkm']; ?></td>
			                    <td style="background: #DDEBF6;"><?= $datamm['pstkm']; ?></td>
			                    <td style="background: #64f92e;"><?= $datamm['totnstkm']; ?></td>
			                  </tr>
			                  <tr>
			                    <td style="text-align: left;"><b><i>TA</i></b></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['hrta']; ?></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['fallta']; ?></td>
			                    <td style="background: #FFFC00;"><?= $datamm['compta']; ?></td>
			                    <td style="background: #DDEBF6;"><?= $datamm['psta']; ?></td>
			                    <td style="background: #64f92e;"><?= $datamm['totnsta']; ?></td>
			                  </tr>
			                  <tr>
			                    <td style="text-align: left;"><b><i>GLOBAL</i></b></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['hrglobal']; ?></td>
			                    <td style="background: #B2C5ED;"><?= $datamm['fallglobal']; ?></td>
			                    <td style="background: #FFFC00;"><?= $datamm['compglobal']; ?></td>
			                    <td style="background: #DDEBF6;"><?= $datamm['psglobal']; ?></td>
			                    <td style="background: #64f92e;"><?= $datamm['totnsglobal']; ?></td>
			                  </tr>
			                  <tr>
			                    <td style="font-size: 16px; text-align: left;"><b><i>TOT</i></b></td>
			                    <td style="font-size: 16px; font-weight: bold; background: #B2C5ED;"><?= $datamm['hrall']; ?></td>
			                    <td style="font-size: 16px; font-weight: bold; background: #B2C5ED;"><?= $datamm['fallall']; ?></td>
			                    <td style="font-size: 16px; font-weight: bold; background: #FFFC00;"><?= $datamm['compall']; ?></td>
			                    <td style="font-size: 16px; font-weight: bold; background: #DDEBF6;"><?= $datamm['psall']; ?></td>
			                    <td style="font-size: 16px; font-weight: bold; background: #64f92e;"><?= $datamm['totnsall']; ?></td>
			                  </tr>
			                  <tr>
			                    <td colspan="5" style="text-align: right"><b><i>TOTAL HR & FACT</i></b></td>
			                    <td style="font-size: 18px; font-weight: bold"><?= $datamm['hrandfact']; ?></td>
			                  </tr>
			                  <tr>
			                    <td colspan="5" style="text-align: right; background: #b0ceea;"><b><i>TOTAL PS/COMPLETE NAL</i></b></td>
			                    <td style="font-size: 18px; font-weight: bold; background: #b0ceea;"><?= $datamm['psandcomp']; ?></td>
			                  </tr>
			                  <tr>
			                    <td colspan="6" style="font-size: 20px; font-weight: bold"><i>PEKALONGAN SAKPORE...!</i></td>
			                  </tr>
				            </table>
						</div>
					</div>
					<div class="col-lg-7">
						<div id="grafik-mm" class="morrischart" style="height: 300px"></div>
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
      	element: 'grafik-mm',
      	data: <?php echo $grafmm;?>,
      	xkey: 'mitra',
      	ykeys: ['hr','fact','comp','ps','totns'],
      	labels: ['HR','FACT','COMP','PS','TOTAL MIG'],
	    hideHover: 'auto',
	    labelTop: true,
	    gridTextWeight: 'bold'
    });
</script>