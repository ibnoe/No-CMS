<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US"><head>
<title>PT. Lintas Riau Prima</title>
<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/bbm/css/cetak.css" />
<style>
hr.dot {color: #fff; background-color: #fff; border: 1px dotted #000; border-style: none none dotted; }
</style>
</head><body onload="window.print();">

           <div class="page-portrait-list">

      
   <h2 align="center">TANDA TERIMA UANG JALAN / OPERATIONAL</h2>
   

<table class="table-list-khs" width="100%">
<tr>
	<td colspan="5">
		<div class="grid_3">SO/SH:<?=$info->do_pertamina?></div>
		<div class="grid_3">No Polisi: <?=$info->no_kendaraan?></div>
		<div class="grid_3">Supir: <?=$info->nama?></div>
		<div class="grid_3">Kernek: </div>
		<div class="grid_3">Selang:</div>m
	</td>
</tr>
<tr>
	<td colspan="4" width="80%" valign="top">
		<div class="grid_5">Tanggal : <strong><?=tanggal($info->tanggal_uj)?></strong></div>
		<div class="grid_7">Industri : <strong><?=($info->nama_perusahaan)?></strong></div><br>
		<div class="grid_3" >Keterangan :</div><div class="grid_9" style="width:80%;margin:0px">
			<?php
			$field = array('uang_depot', 'uang_jarak', 'uang_makan', 
        					'uang_polisi', 'uang_bongkar', 'uang_selang', 'uang_lembur', 'uang_jembatan');
        	
        	$label =array('uang_depot'=>"UD", 'uang_jarak'=>"UJ", 'uang_makan'=>"UM", 
        					'uang_polisi'=>"UP", 'uang_bongkar'=>"UB", 'uang_selang'=>"US", 'uang_lembur'=>"UL", 'uang_jembatan'=>"UJB");
        	$string="";
        	foreach($field as $v)
        	{
        		if ((int)$info->$v>0)
        			$string .= " <div class='grid_3' style='width:130px;;margin:0px'>".$label[$v]." (".to_currency($info->$v).")</div>";
        	}
        	echo reduce_multiples($string, ", ", TRUE);
			//echo "PIC:".$info->pic_bantuan;
			?>
			
		</div>
		
	</td>
	<td align="center">
		Layak Jalan <br>
		<br>
		<br>
		<br>
		<br>Inspektor
	</td>
</tr>
<tr>

<td colspan="4" width="80%" valign="top"><div class='grid_4'>Total : <?=to_currency($info->total_uang_jalan)?></div> Terbilang : <?=num_to_txt($info->total_uang_jalan)?> RUPIAH</td><td></td>

</tr>
<TR>
<td colspan='2' width="40%">
<div class="grid_3" style="width:40%;text-align:center;">Yang Memberikan,
<br><br><br>
(<?=$info->diberikan_oleh?>)

</div>
<div class="grid_3"style="width:40%;text-align:center;">Yang Menerima,
<br><br><br>
(<?=$info->diterima_oleh?>)</div>
</td>
<td colspan='4' valign="top">Daftar Dokumen Jalan : 1. DO Pertamina. &nbsp;&nbsp;&nbsp;2. DO LRP &nbsp;&nbsp;&nbsp;3. BALAP &nbsp;&nbsp;4. Voucer BBM &nbsp;&nbsp;&nbsp;4. Lokasi, Jarak dan Waktu Pengantaran BBM
&nbsp;&nbsp;6. Surat Jalan & Bongkar muat BBM dikapal &nbsp;&nbsp;&nbsp; 7. Segel &nbsp;&nbsp;&nbsp; 8. Daftar Foto &nbsp;&nbsp;&nbsp;9. Surat Izin Pengantaran Pulau &nbsp;&nbsp;&nbsp; 10. Dll </td>
</TR>
</table>
</div>
</body>
</html>
