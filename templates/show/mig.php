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
          <td style="text-align: left;"><b><i>BRB</i></b></td>
          <td style="background: #B2C5ED;"><?= $datamd['hrbrb']; ?></td>
          <td style="background: #B2C5ED;"><?= $datamd['fallbrb']; ?></td>
          <td style="background: #FFFC00;"><?= $datamd['compbrb']; ?></td>
          <td style="background: #DDEBF6;"><?= $datamd['psbrb']; ?></td>
          <td style="background: #64f92e;"><?= $datamd['totnsbrb']; ?></td>
        </tr>
        <tr>
          <td style="text-align: left;"><b><i>BTG</i></b></td>
          <td style="background: #B2C5ED;"><?= $datamd['hrbtg']; ?></td>
          <td style="background: #B2C5ED;"><?= $datamd['fallbtg']; ?></td>
          <td style="background: #FFFC00;"><?= $datamd['compbtg']; ?></td>
          <td style="background: #DDEBF6;"><?= $datamd['psbtg']; ?></td>
          <td style="background: #64f92e;"><?= $datamd['totnsbtg']; ?></td>
        </tr>
        <tr>
          <td style="text-align: left;"><b><i>PKL</i></b></td>
          <td style="background: #B2C5ED;"><?= $datamd['hrpkl']; ?></td>
          <td style="background: #B2C5ED;"><?= $datamd['fallpkl']; ?></td>
          <td style="background: #FFFC00;"><?= $datamd['comppkl']; ?></td>
          <td style="background: #DDEBF6;"><?= $datamd['pspkl']; ?></td>
          <td style="background: #64f92e;"><?= $datamd['totnspkl']; ?></td>
        </tr>
        <tr>
          <td style="text-align: left;"><b><i>PML</i></b></td>
          <td style="background: #B2C5ED;"><?= $datamd['hrpml']; ?></td>
          <td style="background: #B2C5ED;"><?= $datamd['fallpml']; ?></td>
          <td style="background: #FFFC00;"><?= $datamd['comppml']; ?></td>
          <td style="background: #DDEBF6;"><?= $datamd['pspml']; ?></td>
          <td style="background: #64f92e;"><?= $datamd['totnspml']; ?></td>
        </tr>
        <tr>
          <td style="text-align: left;"><b><i>SLW</i></b></td>
          <td style="background: #B2C5ED;"><?= $datamd['hrslw']; ?></td>
          <td style="background: #B2C5ED;"><?= $datamd['fallslw']; ?></td>
          <td style="background: #FFFC00;"><?= $datamd['compslw']; ?></td>
          <td style="background: #DDEBF6;"><?= $datamd['psslw']; ?></td>
          <td style="background: #64f92e;"><?= $datamd['totnsslw']; ?></td>
        </tr>
        <tr>
          <td style="text-align: left;"><b><i>TEG</i></b></td>
          <td style="background: #B2C5ED;"><?= $datamd['hrteg']; ?></td>
          <td style="background: #B2C5ED;"><?= $datamd['fallteg']; ?></td>
          <td style="background: #FFFC00;"><?= $datamd['compteg']; ?></td>
          <td style="background: #DDEBF6;"><?= $datamd['psteg']; ?></td>
          <td style="background: #64f92e;"><?= $datamd['totnsteg']; ?></td>
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
          <td colspan="6" style="font-size: 20px; font-weight: bold"><i>PEKALONGAN SAKPORE...!</i></td>
        </tr>
    </table>
	</div>
</div>
</div>