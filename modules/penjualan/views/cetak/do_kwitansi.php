<?
function faktur_do($id,$total,$keterangan)
{
?>
   <div class="page-portrait-list" style="border:1px solid #000000;padding:5px">
   <h1 align="center">Kwitansi</h2>
	<table class="table-list-noborder-left" width="100%" border="0" padding="3px">
	  	  <tr >
             <td width="150px"  style="padding:5px">NO KWITANSI</td>
             <td valign="top"  style="padding:5px;width:10px;">:</td>
             <td style="border-bottom:1px dotted #000;padding:5px"><? echo $id?></td>     
           </tr>
           <tr >
             <td width="150px"  style="padding:5px">SUDAH TERIMA DARI</td>
             <td valign="top"  style="padding:5px;width:10px;">:</td>
             <td style="border-bottom:1px dotted #000;padding:5px"><strong> PT. Lintas Riau Prima</strong></td>     
           </tr>
           <tr >
             <td width="150px"  style="padding:5px">UANG SEBANYAK</td>
             <td valign="top"  style="padding:5px">:</td>
             <td style="border-bottom:1px dotted #000;padding:5px"><strong> <?php echo to_currency($total)?></strong></td>
             
           </tr>
           <tr >
             <td valign="top"  style="padding:5px">TERBILANG</td>
             <td  style="padding:5px" valign="top">:</td>
              	 <td style="border-bottom:1px dotted #000;padding:5px"><?php echo num_to_txt($total)?> RUPIAH</td>
           </tr>           
           <tr>

             <td  valign="top"  style="padding:5px">UNTUK PEMBAYARAN</td>
             <td  valign="top" style="padding:5px">:</td>
 			 <td style="border-bottom:1px dotted #000;padding:5px"><?php echo ($keterangan)?></td>
        
            </tr> 
             
         </table>
         
<br><table class="table-list-noborder-left" width="100%" border="0">
<tr>
	<td width="35%" valign="top">
	</td>
	<td>
	<div style="float:right">
		...................................... , ..../..../.......... 
		
		<br /><br /><br /><br /><br /><br />
		(...........................................................)<br />
		Telp :
	</div>
	</td>
</tr>
</table>
Catatan: Harap menuliskan Nama Lengkap dan No Telpon
</div>
<br><br>
<?

}

?>

<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US"><head>
<title>PT. LINTAS RIAU PRIMA</title>
<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/bbm/css/cetak.css" />
<style>
hr.dot {color: #fff; background-color: #fff; border: 1px dotted #000; border-style: none none dotted; }
</style>
</head>
<!--<body onload="window.print();">-->
<body>
<? foreach($item as $val): 

	if ($val->uang_bantuan_site>0)
		faktur_do($val->fk_id_do.'.'.$val->fk_id_item.'.'.$val->id_do_item."/KW-UBS/".date('m').'/'.date('Y'),$val->uang_bantuan_site,'Bantuan Site '.$val->lokasi_kirim." (".$val->alamat_kirim.")");
		
	if ($val->uang_langsir>0)
		faktur_do($val->fk_id_do.'.'.$val->fk_id_item.'.'.$val->id_do_item."/KW-UL/".date('m').'/'.date('Y'),$val->uang_langsir,'Bantuan Langsir Site '.$val->lokasi_kirim." (".$val->alamat_kirim.")");
		
	if ($val->uang_kapal>0)
		faktur_do($val->fk_id_do.'.'.$val->fk_id_item.'.'.$val->id_do_item."/KW-UK/".date('m').'/'.date('Y'),$val->uang_kapal,'Bantuan Kapal '.$val->lokasi_kirim." (".$val->alamat_kirim.")");
		
?>

<? endforeach;?>
</body>
</html>
