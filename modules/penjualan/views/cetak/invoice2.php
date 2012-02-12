<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US"><head>
<title>PT. LINTAS RIAU PRIMA</title>
<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/bbm/css/cetak.css" />
<style>
hr.dot {color: #fff; background-color: #fff; border: 1px dotted #000; border-style: none none dotted; }
</style>
</head>
<body >

   <div class="page-portrait-list">

        


<center><span style="font-size:30px;border-bottom:1px solid #000">INVOICE</span><br>		
	<span style=""><?=sprintf("%05d",$item[0]->id_penjualan)?>/INV-LRP/<?=date('m',strtotime($item[0]->tanggal_invoice)); ?>/<?=date('Y',strtotime($item[0]->tanggal_invoice)); ?>
	</span>
</center>
<br><br>
<table class="table-list-noborder-left" width="100%" border="0">


           <tr>
             <td width="120px"  valign="top">Nama Pelanggan</td>
          	 <td width="10px" valign="top"> : </td>
             <td valign="top"> <?=$item[0]->nama_perusahaan;?></td>
             <td width="120px"  valign="top">No Surat Pengantar <br>
											 Pengiriman Pertamina</td>
    		 <td width="10px" valign="top"> : </td>
             <td valign="top"><?=$item[0]->do_pertamina?></td>
           </tr>
           <tr>
             <td valign="top">Alamat Pelanggan</td>
          	 <td width="10px" valign="top"> : </td>
             <td valign="top"><?=$item[0]->alamat_perusahaan;?></td>       
             <td valign="top">No Tanda Bukti <br>Pengiriman Barang</td>
			 <td width="10px" valign="top"> : </td>
             <td valign="top"><?php //echo $tangga_jatuh_tempo?></td>
           </tr>
 </table>

<br><br>
		

<table class="table-list-khs" width="100%">
<tr>
	<th width="10px">No</th>	
	<th>Perincian</th>	
	<th>Harga Satuan</th>	
	<th>Volume</th>	
	<th>PPN</th>	
	<th>Jumlah</th>	
</tr>
<?php

	$vol=0;
	foreach ($item as $v)
	{
		$vol += $v->jumlah;
	}
//	echo implode(", ",$barang);
$pajak =0;
$total_harga_angkut=0;
$total_harga_bbm=0;
?>
<tr>
	<td width="10px" valign="top" style="border-bottom:1px none #000000">1.</td>	
	<td style="border-bottom:1px none #000000">BBm Solar Industri </td>	
	<td valign="top"  style="border-bottom:1px none #000000;text-align:right"><?=to_currency($v->harga_bbm)?></td>	
	<td valign="top"  style="border-bottom:1px none #000000;text-align:right"><?=$vol;?> Liter</td>	
	<td valign="top" style="border-bottom:1px none #000000;text-align:right"><? echo to_currency($v->harga_bbm*$vol*0.1);?></td>	
	<td valign="top"  style="border-bottom:1px none #000000;text-align:right"><?=to_currency($v->harga_bbm*$vol)?></td>	
</tr>
<tr>
	<td width="10px" valign="top" style="border-top:1px none #000000;border-bottom:1px none #000000">2.</td>	
	<td style="border-top:1px none #000000;border-bottom:1px none #000000">Biaya Angkut:<br>
<?

	foreach ($item as $v)
	{
		echo "- ".$v->kode_lokasi." ".$v->lokasi_kirim."<br>";
	}
?>
	
	 </td>	
	<td valign="top"  style="border-top:1px none #000000;border-bottom:1px none #000000;text-align:right"><br>
	<?

	foreach ($item as $v)
	{
		echo $v->harga_angkut."<br>";
	}
?>
	</td>	
	<td valign="top"  style="border-top:1px none #000000;border-bottom:1px none #000000;text-align:right"><br>
<?
	foreach ($item as $v)
	{
		echo $v->jumlah." liter<br>";
	}
?>
	</td>	
	<td valign="top" style="border-top:1px none #000000;border-bottom:1px none #000000;text-align:right"><br>
	
<?
	foreach ($item as $v)
	{
		echo to_currency($v->harga_angkut*$v->jumlah*0.1)."<br>";
	}
?>
</td>	
	<td valign="top"  style="border-top:1px none #000000;border-bottom:1px none #000000;text-align:right"><br>
	
<?
	foreach ($item as $v)
	{
		echo to_currency($v->harga_angkut*$v->jumlah)."<br>";
		$total_harga_angkut += $v->harga_angkut*$v->jumlah;
		$total_harga_bbm += $v->harga_bbm*$v->jumlah;
	}

?>
</td>	
</tr>
<tr>
	<td valign="top" style="border-top:1px none #000000;border-bottom:1px none #000000">3. </td>
	<td valign="top" style="border-top:1px none #000000;border-bottom:1px none #000000">PPN</td>
	<td valign="top" style="border-top:1px none #000000;border-bottom:1px none #000000"></td>
	<td valign="top" style="border-top:1px none #000000;border-bottom:1px none #000000"></td>
		<td valign="top" style="border-top:1px none #000000;border-bottom:1px none #000000"></td>
	<td valign="top" style="border-top:1px none #000000;text-align:right;border-bottom:1px none #000000"><?=to_currency(($total_harga_angkut+$total_harga_bbm)*0.1)?></td>


</tr>
<tr>
	<td valign="top" style="border-top:1px none #000000">4. </td>
	<td valign="top" style="border-top:1px none #000000">PBBKB BBM Solar Industri Pertamina<br> <?=$pbbkb?> x <?=$vol;?> Liter</td>
	<td valign="top" style="border-top:1px none #000000"></td>
	<td valign="top" style="border-top:1px none #000000"></td>
		<td valign="top" style="border-top:1px none #000000"></td>
	<td valign="top" style="border-top:1px none #000000;text-align:right"><?=to_currency($v->total_pbbkb)?></td>


</tr>

<tr>
	<td colspan="2" rowspan="3">
	</td>	
	<td colspan="3" >Total Penjualan</td>	
	
	<td style="text-align:right"><?=to_currency($total_harga_angkut+$total_harga_bbm)?></td>	
</tr>
<tr>
	
	<td colspan="3" >Total Pajak</td>	
	
	<td style="text-align:right"><?=to_currency(($total_harga_angkut+$total_harga_bbm)*0.1+$v->total_pbbkb)?></td>	
</tr>
<tr>
	<td colspan="3" >Total Invoice Termasuk Pajak</td>	
	<td style="text-align:right"><?
	$pajak_ppn =($total_harga_angkut+$total_harga_bbm)*0.1;
	echo to_currency($total_harga_angkut+$total_harga_bbm+$pajak_ppn+$v->total_pbbkb)?></td>	

</tr>


</table>

<table class="table-list-noborder-left" width="100%" border="0">
<tr>
	<td width="45%" valign="top">

	<div style="padding:0px;font-size:9px;margin-left:-20px;">
		<ol>
			<li>
				Payment transfer to account NO. 108 000 627 1903 Bank Mandiri Account Name PT. LINTAS RIAU PRIMA 
			</li>
			<li>
				After Payment please Fax or Email transfer from to 0761-41922 or lintasriauprima@yahoo.com alternate email to lintasriauprima@yahoo.co.id
			</li>
		</ol>
	</div>
	
	</td>
	<td>
	<div style="float:right;text-align:center">	<br /><br />
		Pekanbaru, <?=tanggal($item[0]->tanggal_invoice);?>
		
		<br /><br /><br /><br /><br /><br />
		IKA SARTIKA<br />
		Direktur Utama
	</div>
	</td>
</tr>
</table>

</div>
</body>
</html>
