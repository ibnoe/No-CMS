<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US"><head>
<title>PT. LINTAS RIAU PRIMA</title>
<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/bbm/css/cetak.css" />
<style>
hr.dot {color: #fff; background-color: #fff; border: 1px dotted #000; border-style: none none dotted; }
</style>
</head>
<!--<body onload="window.print();">-->
<body>
   <div class="page-portrait-list" style="border:1px solid #000000;padding:10px">
<?php
$total=0;


?>
   <h2 align="center">Kwitansi</h2>
   
<table class="table-list-noborder-left" width="100%" border="0" padding="3px">


         
           <tr >
             <td width="150px"  style="padding:10px">SUDAH TERIMA DARI</td>
             <td valign="top"  style="padding:10px">:</td>
             <td style="border-bottom:1px dotted #000;padding:10px"><strong> <?=$item[0]->nama_perusahaan;?></strong></td>
             
           </tr>
           <tr >
             <td width="150px"  style="padding:10px">Uang Sebanyak</td>
             <td valign="top"  style="padding:10px">:</td>
             <td style="border-bottom:1px dotted #000;padding:10px"><strong> <?php echo to_currency($item[0]->total_penjualan)?></strong></td>
             
           </tr>
           <tr >
             <td valign="top"  style="padding:10px">TERBILANG</td>
             <td  style="padding:10px" valign="top">:</td>
             <td style="border-bottom:1px dotted #000;padding:10px"><?php echo num_to_txt($item[0]->total_penjualan)?> RUPIAH</td>
             
           </tr>           
           <tr>

             <td  valign="top"  style="padding:10px">UNTUK PEMBAYARAN</td>
             <td  valign="top" style="padding:10px">:</td>
             <td style="border-bottom:1px dotted #000;padding:10px"> BBM Solar Industr untuk
             <?php
	//var_dump($item[0]);
	$vol=0;
	foreach ($item as $v)
	{
		$barang[]=$v->alamat_kirim."(".$v->jumlah." ltr)";
		$vol += $v->jumlah;
	}
	echo implode(", ",$barang);
	?>
	</td>
            </tr> 
             
         </table>
         
<br><br>
<table class="table-list-noborder-left" width="100%" border="0">
<tr>
	<td width="35%" valign="top">

		</td>
	<td>
	<div style="float:right">
		Pekanbaru, <?=date('d M Y')?>
		
		<br /><br /><br /><br /><br /><br />
		Ika Sartika<br />
		Direktur Utama
	</div>
	</td>
</tr>
</table>
</div>

</body>
</html>
