<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US"><head>
<title>PT. LINTAS RIAU PRIMA</title>
<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/bbm/css/cetak.css" />
<style>
hr.dot {color: #fff; background-color: #fff; border: 1px dotted #000; border-style: none none dotted; }
</style>
</head>
<body onload="window.print();">

   <div class="page-portrait-list">

        

<table class="table-list-khs" width="100%">
<tr>
	<td colspan="2" rowspan="2" width="36%">
	<center>Logo LRP<br>
	<h3>PT. LINTAS RIAU PRIMA</h3>
	Agen BBM Industri Pertamina<br>
	<i>"Mengutamakan Pelayanan, Kualitas, Kuantitas dan Ketepatan Waktu Pengantaran BBM Industri"</i>
	</center></td>	
	<td colspan="4"><center><h1 style="font-size:40px;">INVOICE</h1></center></td>	
</tr>
<tr>
	<td colspan="2" >
	<center>
		<strong>Nomor Invoice</strong><br>
		<?=sprintf("%05d",$item[0]->id_penjualan)?>/INV-LRP/<?=date('m',strtotime($item[0]->tanggal_invoice)); ?>/<?=date('Y',strtotime($item[0]->tanggal_invoice)); ?>
	</center>
	</td>	
	<td colspan="2" ><center>
	<strong>Tanggal Invoice</strong><br>
	<?=tanggal($item[0]->tanggal_invoice)?>
	</center></td>	

</tr>
<tr>
	<td colspan="2" rowspan="3" valign="top">   Kepada yth.<br><br>
       <strong> <?=$item[0]->nama_perusahaan;?></strong><br>
        <?=$item[0]->alamat;?></td>	
	<td colspan="2">Surat Penawaran Harga </td>	
	<td colspan="2">:</td>
</tr>
<tr>
	<td colspan="2">No Surat Pengantar :<br>
	Pengiriman Pertamina</td>	
	<td colspan="2"> : <?=$item[0]->do_pertamina?></td>

</tr>
<tr>
	<td colspan="2">No Tanda Bukti <br>Pengiriman Barang</td>	
	<td colspan="2">:</td>
</tr>
<tr>
	<td width="10px">No</td>	
	<td>Perincian</td>	
	<td>Harga Satuan</td>	
	<td>Volume</td>	
	<td>PPN</td>	
	<td>Jumlah</td>	
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
		echo "- ".$v->alamat_kirim."<br>";
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
	<td valign="top" style="border-top:1px none #000000">2. </td>
	<td valign="top" style="border-top:1px none #000000">PBBKB BBM Solar Industri Pertamina<br> 1.717 x 5000 Liter</td>
	<td valign="top" style="border-top:1px none #000000"></td>
	<td valign="top" style="border-top:1px none #000000"></td>
	<td valign="top" style="border-top:1px none #000000"></td>
	<td valign="top" style="border-top:1px none #000000"></td>

</tr>
<tr>
	<td colspan="2" rowspan="2">
	</td>	
	<td colspan="2" >Total </td>	

	<td style="text-align:right"><?=to_currency(($total_harga_angkut+$total_harga_bbm)*0.1)?></td>	
	<td style="text-align:right"><?=to_currency($total_harga_angkut+$total_harga_bbm)?></td>	
</tr>
<tr>
	<td colspan="2" >Total Invoice Termasuk Pajak</td>	
	<td ></td>	
	<td style="text-align:right"><?
	$pajak_ppn =($total_harga_angkut+$total_harga_bbm)*0.1;
	echo to_currency($total_harga_angkut+$total_harga_bbm+$pajak_ppn);?></td>	

</tr>

<tr>
	<td colspan="6">
	<center>
		Hormat Kami,<br><br><br><br><br>
		Ika Sartika
	</center>
	</td>
</tr>
</table>
</div>
</body>
</html>
