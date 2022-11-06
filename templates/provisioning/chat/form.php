<div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-1">
	<div class="widget-box widget-color-dark" id="widget-box-1">
		<div class="widget-header">
			<h5 class="widget-title">Send Chat To Group</h5>

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
				<form class="form-horizontal" action="<?= site_url('provisioning/chat/post') ?>" method="POST">
		            <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Message</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="5" name="isipesan"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Group</label>
                            <div class="col-md-9">
                                <div class="checkbox">
									<label class="block">
										<input name="grup" type="checkbox" class="ace" value="-83556796" />
										<span class="lbl"> DATEL SLAWI PROVISIONING</span>
									</label>
								</div>
								<div class="checkbox">
									<label class="block">
										<input name="grup" type="checkbox" class="ace" value="-135049670" />
										<span class="lbl"> DATEL PML PROVISIONING</span>
									</label>
								</div>
								<div class="checkbox">
									<label class="block">
										<input name="grup" type="checkbox" class="ace" value="-36213700" />
										<span class="lbl"> AKSES BB</span>
									</label>
								</div>
								<div class="checkbox">
									<label class="block">
										<input name="grup" type="checkbox" class="ace" value="-18751402" />
										<span class="lbl"> BTG*SIAGA INDIHOME*</span>
									</label>
								</div>
								<div class="checkbox">
									<label class="block">
										<input name="grup" type="checkbox" class="ace" value="-138881686" />
										<span class="lbl"> NOSS-F WFM PEKALONGA D fcdrmzr</span>
									</label>
								</div>
								<div class="checkbox">
									<label class="block">
										<input name="grup" type="checkbox" class="ace" value="-1001367305894" />
										<span class="lbl"> PROVISIONING TEGAL</span>
									</label>
								</div>
								<div class="checkbox">
									<label class="block">
										<input name="grup" type="checkbox" class="ace" value="-10563279" />
										<span class="lbl"> NKRI PKL ( PSB, GANGGUAN, MIGRASI )</span>
									</label>
								</div>
								<div class="checkbox">
									<label class="block">
										<input name="grup" type="checkbox" class="ace" value="-1001231132391" />
										<span class="lbl"> Granular teknisi</span>
									</label>
								</div>
								<div class="checkbox">
									<label class="block">
										<input name="grup" type="checkbox" class="ace" value="-1001303948672" />
										<span class="lbl"> JARVISID_SALES</span>
									</label>
								</div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-info" type="submit"><i class="fa fa-paper-plane"></i> Kirim Pesan</button>
		        </form>
			</div>
		</div>
	</div>
</div>