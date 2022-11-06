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
            <td colspan="4"><b><i>PROG NEW SALES WITEL PEKALONGAN</i></b></td>
            <td colspan="2"><?= date('Y-m-d H:i') ?></td>
          </tr>
          <tr>
            <th rowspan="2" width="25px;" style="vertical-align: middle; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000; border-top: 1px solid #000;">DATEL</th>
            <th colspan="2" style="background: #fff454; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>HR & CREATE</i></b></th>
            <th colspan="2" style="background: #88f739; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>PS AO</i></b></th>
            <th rowspan="2" style="background: #64f92e; border-bottom: 1px solid #000; border-right: 1px solid #000;vertical-align: middle;" width="25px;">TOTAL NS</th>
          </tr>
          <tr>
            <th width="25px;" style="background: #fff454; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>HR</i></b></th>
            <th width="25px;" style="background: #fff454; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>FALLOUT</i></b></th>
            <th width="25px;" style="background: #88f739; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>COMP</i></b></th>
            <th width="25px;" style="background: #88f739; border-bottom: 1px solid #000; border-right: 1px solid #000;"><b><i>PS</i></b></th>
          </tr>
          <tr>
            <td style="text-align: left;"><b><i>BRB</i></b></td>
            <td style="background: #fff454;"><?= $datans['hrbrb']; ?></td>
            <td style="background: #fff454;"><?= $datans['fallbrb']; ?></td>
            <td style="background: #88f739;"><?= $datans['compbrb']; ?></td>
            <td style="background: #88f739;"><?= $datans['psbrb']; ?></td>
            <td style="background: #64f92e;"><?= $datans['totnsbrb']; ?></td>
          </tr>
          <tr>
            <td style="text-align: left;"><b><i>BTG</i></b></td>
            <td style="background: #fff454;"><?= $datans['hrbtg']; ?></td>
            <td style="background: #fff454;"><?= $datans['fallbtg']; ?></td>
            <td style="background: #88f739;"><?= $datans['compbtg']; ?></td>
            <td style="background: #88f739;"><?= $datans['psbtg']; ?></td>
            <td style="background: #64f92e;"><?= $datans['totnsbtg']; ?></td>
          </tr>
          <tr>
            <td style="text-align: left;"><b><i>PKL</i></b></td>
            <td style="background: #fff454;"><?= $datans['hrpkl']; ?></td>
            <td style="background: #fff454;"><?= $datans['fallpkl']; ?></td>
            <td style="background: #88f739;"><?= $datans['comppkl']; ?></td>
            <td style="background: #88f739;"><?= $datans['pspkl']; ?></td>
            <td style="background: #64f92e;"><?= $datans['totnspkl']; ?></td>
          </tr>
          <tr>
            <td style="text-align: left;"><b><i>PML</i></b></td>
            <td style="background: #fff454;"><?= $datans['hrpml']; ?></td>
            <td style="background: #fff454;"><?= $datans['fallpml']; ?></td>
            <td style="background: #88f739;"><?= $datans['comppml']; ?></td>
            <td style="background: #88f739;"><?= $datans['pspml']; ?></td>
            <td style="background: #64f92e;"><?= $datans['totnspml']; ?></td>
          </tr>
          <tr>
            <td style="text-align: left;"><b><i>SLW</i></b></td>
            <td style="background: #fff454;"><?= $datans['hrslw']; ?></td>
            <td style="background: #fff454;"><?= $datans['fallslw']; ?></td>
            <td style="background: #88f739;"><?= $datans['compslw']; ?></td>
            <td style="background: #88f739;"><?= $datans['psslw']; ?></td>
            <td style="background: #64f92e;"><?= $datans['totnsslw']; ?></td>
          </tr>
          <tr>
            <td style="text-align: left;"><b><i>TEG</i></b></td>
            <td style="background: #fff454;"><?= $datans['hrteg']; ?></td>
            <td style="background: #fff454;"><?= $datans['fallteg']; ?></td>
            <td style="background: #88f739;"><?= $datans['compteg']; ?></td>
            <td style="background: #88f739;"><?= $datans['psteg']; ?></td>
            <td style="background: #64f92e;"><?= $datans['totnsteg']; ?></td>
          </tr>
          <tr>
            <td style="font-size: 16px; text-align: left;"><b><i>TOT</i></b></td>
            <td style="font-size: 16px; font-weight: bold; background: #fff454;"><?= $datans['hrall']; ?></td>
            <td style="font-size: 16px; font-weight: bold; background: #fff454;"><?= $datans['fallall']; ?></td>
            <td style="font-size: 16px; font-weight: bold; background: #88f739;"><?= $datans['compall']; ?></td>
            <td style="font-size: 16px; font-weight: bold; background: #88f739;"><?= $datans['psall']; ?></td>
            <td style="font-size: 16px; font-weight: bold; background: #64f92e;"><?= $datans['totnsall']; ?></td>
          </tr>
          <tr>
            <td colspan="5" style="text-align: right"><b><i>TOTAL HR & FACT</i></b></td>
            <td style="font-size: 18px; font-weight: bold"><?= $datans['hrandfact']; ?></td>
          </tr>
          <tr>
            <td colspan="5" style="text-align: right; background: #b0ceea;"><b><i>TOTAL PS/COMPLETE NAL</i></b></td>
            <td style="font-size: 18px; font-weight: bold; background: #b0ceea;"><?= $datans['psandcomp']; ?></td>
          </tr>
          <tr>
            <td colspan="6" style="font-size: 20px; font-weight: bold"><i>PEKALONGAN SAKPORE...!</i></td>
          </tr>
        </table>
	</div>
</div>
</div>