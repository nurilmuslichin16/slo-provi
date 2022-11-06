<style type="text/css">
  td{
    text-align: center;
  }
  th{
    text-align: center;
  }
  #table >tbody>tr>td{
      border-top: 0px;
      border-bottom: 1px solid #000;
      border-top: 1px solid #000;
      border-left: 1px solid #000;
      border-right: 1px solid #000;
      margin-left:auto;
      margin-right:auto;
    }
</style>
<link rel="stylesheet" href="<?= base_url() ?>assets/default/css/bootstrap.min.css" />
<div class="row">
<div class="col-lg-5" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);">
	<div class="table-responsive">
		<table id="table" class="table table-bordered table-sm">
      <tr>
        <td colspan="4"><b><i>PROG ADDON MODIFICATION WITEL PEKALONGAN</i></b></td>
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
        <td style="text-align: left;"><b><i>BRB</i></b></td>
        <td style="background: #f5ba3b;"><?= $dataao['hrbrb']; ?></td>
        <td style="background: #f5ba3b;"><?= $dataao['fallbrb']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['compbrb']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['psbrb']; ?></td>
        <td style="background: #64f92e;"><?= $dataao['totnsbrb']; ?></td>
      </tr>
      <tr>
        <td style="text-align: left;"><b><i>BTG</i></b></td>
        <td style="background: #f5ba3b;"><?= $dataao['hrbtg']; ?></td>
        <td style="background: #f5ba3b;"><?= $dataao['fallbtg']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['compbtg']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['psbtg']; ?></td>
        <td style="background: #64f92e;"><?= $dataao['totnsbtg']; ?></td>
      </tr>
      <tr>
        <td style="text-align: left;"><b><i>PKL</i></b></td>
        <td style="background: #f5ba3b;"><?= $dataao['hrpkl']; ?></td>
        <td style="background: #f5ba3b;"><?= $dataao['fallpkl']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['comppkl']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['pspkl']; ?></td>
        <td style="background: #64f92e;"><?= $dataao['totnspkl']; ?></td>
      </tr>
      <tr>
        <td style="text-align: left;"><b><i>PML</i></b></td>
        <td style="background: #f5ba3b;"><?= $dataao['hrpml']; ?></td>
        <td style="background: #f5ba3b;"><?= $dataao['fallpml']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['comppml']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['pspml']; ?></td>
        <td style="background: #64f92e;"><?= $dataao['totnspml']; ?></td>
      </tr>
      <tr>
        <td style="text-align: left;"><b><i>SLW</i></b></td>
        <td style="background: #f5ba3b;"><?= $dataao['hrslw']; ?></td>
        <td style="background: #f5ba3b;"><?= $dataao['fallslw']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['compslw']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['psslw']; ?></td>
        <td style="background: #64f92e;"><?= $dataao['totnsslw']; ?></td>
      </tr>
      <tr>
        <td style="text-align: left;"><b><i>TEG</i></b></td>
        <td style="background: #f5ba3b;"><?= $dataao['hrteg']; ?></td>
        <td style="background: #f5ba3b;"><?= $dataao['fallteg']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['compteg']; ?></td>
        <td style="background: #a6f5e3;"><?= $dataao['psteg']; ?></td>
        <td style="background: #64f92e;"><?= $dataao['totnsteg']; ?></td>
      </tr>
      <tr>
        <td style="font-size: 16px; text-align: left;"><b><i>TOT</i></b></td>
        <td style="font-size: 16px; font-weight: bold; background: #f5ba3b;"><?= $dataao['hrall']; ?></td>
        <td style="font-size: 16px; font-weight: bold; background: #f5ba3b;"><?= $dataao['fallall']; ?></td>
        <td style="font-size: 16px; font-weight: bold; background: #a6f5e3;"><?= $dataao['compall']; ?></td>
        <td style="font-size: 16px; font-weight: bold; background: #a6f5e3;"><?= $dataao['psall']; ?></td>
        <td style="font-size: 16px; font-weight: bold; background: #64f92e;"><?= $dataao['totnsall']; ?></td>
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
        <td colspan="6" style="font-size: 20px; font-weight: bold"><i>PEKALONGAN SAKPORE...!</i></td>
      </tr>
    </table>
	</div>
</div>
</div>