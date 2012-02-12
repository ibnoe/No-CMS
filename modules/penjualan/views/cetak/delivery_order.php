<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US"><head>
<title>PT. Lintas Riau Prima</title>
<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/bbm/css/cetak.css" />
<style>
hr.dot {color: #fff; background-color: #fff; border: 1px dotted #000; border-style: none none dotted; }
.no-border {
    font-family: Tahoma;
    font-size: 11px;
    text-align: left;
}
</style>
</head><body onload="window.print();">
   <div class="page-portrait-list">
<table width="100%" class="no-border">
        <tbody>
        <tr>
       
       <td width="60%" >
        	<h1>PT. Lintas Riau Prima</h1>
        	<h3>AGEN BBM INDUSTRI</h3>
        </td>
        <td  width="40%" valign="top" style="border:1px solid #000;padding:4px;">
        Kepada yth.<br>
       <strong> <?=$info->nama_perusahaan;?><br></strong>
        <?=$info->alamat;?>
        </TD>
        </tr>
        </tbody>
        </table>
        

      <br>
   <h2 align="center">BUKTI PENGIRIMAN BARANG / DELIVERY ORDER (DO)</h2>
   
<hr>
Nomor DO : <?=sprintf("%05d",$info->id_do);?>
<table class="table-list-khs" width="100%">
  <tr>
    <th>No</th>
    <th>JENIS BARANG</th>
    <th>JUMLAH</th>
  	<th>NO SEGEL</th>
  	<th>PENERIMA/PIC</th>
  	<th>TANDA TANGAN</th>
  
  </tr>

<?
	$i=1;
	$total = 0;
if (count($item)>5)
{

	foreach($item as $val){?>
	
	  <tr>
	    <td><? echo $i?>. </td>
	    <td><?php echo $val->nama_item?> - <?php echo $val->kode_lokasi?> <?php echo $val->lokasi_kirim?> <?php echo $val->alamat_kirim?></td>
	     <td align="center"><?php echo $val->jumlah?></td>
	    <td align="center"><?php echo $val->no_segel?></td>
	  <td></td>
	  <td></td>
	  </tr>
	<?
	$i++;
	$total += $val->jumlah;
	}
}
else
{
	for($i=0;$i<5;$i++){?>
	
	  <tr>
	    <td><? echo $i+1?>. </td>
	   <td><?php echo @$item[$i]->nama_item?> - <?php echo @$item[$i]->kode_lokasi?> <?php echo @$item[$i]->lokasi_kirim?> <?php echo @$item[$i]->alamat_kirim?></td>
	      <td align="center"><?php echo @$item[$i]->jumlah?></td>
	    <td align="center"><?php echo @$item[$i]->no_segel?></td>
	  <td></td>
	  <td></td>
	  </tr>
	<?
	$total += @$item[$i]->jumlah;
	}


}
 ?>
<tr>
	<td colspan="2" align="center"> TOTAL</td>
	<td align="center"><?=$total ?></td>
	 <td></td> <td></td> <td></td>
</tr>
<tr>
<td colspan="6">Catatan : 
<ol>
	<li>Periksa kualitas dan kuantitas barang sebelum bongkar, setelah bingkar keluhan tidak dilayani</li>
	<li>Periksa seluruh segel atas dan bawah harus dalam kondisi baik sebelum dibongkar</li>
	
</ol></td>
</tr>
</table>
<br>
<table width="100%" border="0" class="table-list-noborder">
<tr>
	<td width="20%" valign="top" colspan="2" >
	................./.......................... 20...
	</td>
	<td width="10%" valign="top">
	</td>
	<td width="20%" valign="top" colspan="2" >
	Pekanbaru, ....................... 20...
	</td>

</tr>
<tr>
	<td width="20%" valign="top" align="center">
	Penerima,<br>
	<br>
	<br>
	<br>
	(.....................)<br>
	<small>Nama & Tanda Tangan <br> atau Cap Perusahaan</small>
	
	</td>
	<td width="20%" valign="top">
		Security (jika ada),<br>
	<br>
	<br>
	<br>
	(.....................)<br>
	<small>Nama & Tanda Tangan <br> atau Cap Perusahaan</small>
	</td>
	<td width="10%" valign="top">
	</td>
	<td width="20%" valign="top">
		Pengantar,<br>
	<br>
	<br>
	<br>
	( <?=$info->nama;?> )<br>
	<small  style="text-align: left;"><?=$info->no_kendaraan;?><br>Nama & Tanda Tangan </small>
	</td>
	<td width="20%" valign="top">
		Pengirim,<br>
	<br>
	<br>
	<br>
	(.....................)<br>
	<small>Nama & Tanda Tangan <br> atau Cap Perusahaan</small>
	</td>
</tr>
</table>

</body>
</html>
