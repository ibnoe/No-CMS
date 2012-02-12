<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US"><head>
<title>Faktur Pajak</title>
<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/bbm/css/cetak.css"/>
<style>
.noborder, .noborder tr, .noborder th, .noborder td
{
	border: none;
}
</style>
</head>
<body onload="window.print();">
   <div class="page-portrait-list">
   <br><br><br><br><br><br><br><br><br>
   	<center><strong><h2>FAKTUR PAJAK</h2></strong></center>
   	<br><br><br>
	<table  width="100%" class="table-list-noborder-left">
        <tbody>
        <tr>
       
        <td>
        	Kode dan Nomor Seri Faktur Pajak : <strong><?php //echo $no_faktur_pajak;?></strong>
        </td>
        <td align="right">
        	No. Invoice : <strong>	<span style=""><?=sprintf("%05d",$item[0]->id_penjualan)?>/INV-LRP/<?=date('m',strtotime($item[0]->tanggal_invoice)); ?>/<?=date('Y',strtotime($item[0]->tanggal_invoice)); ?>
</strong>
        </td>
        </tr>
        </tbody>
     </table>
     <table class="table-list-khs" width="100%">
	  <tr>
	    <td  colspan="3">
	    	<table width="100%" class="noborder" border="0">
	    		<tr>
	    			<td colspan="2">Pengusaha Kena Pajak</td>
	    		</tr>
	    		<tr>
	    			<td width="18%">Nama</td>
	    			<td>: <strong>PT. LINTAS RIAU PRIMA</strong></td>
	    		</tr>
	    		<tr>
	    			<td>Alamat</td>
	    			<td>: Jl. Mesjid Al-Furqan No 15 - Pekanbaru </td>
	    		</tr>
	       		<tr>
	    			<td>NPWP</td>
	    			<td>: 02.615.646.3-211.000</td>
	    		</tr>
	    	</table>
	    </td>
	  </tr>
	  <tr>
	  	<td colspan="3">
	  		<table width="100%" class="noborder" border="0">
	    		<tr>
	    			<td colspan="2">Pembeli Barang Kena Pajak / Penerima Jasa Kena Pajak</td>
	    		</tr>
	    		<tr>
	    			<td  width="18%">Nama</td>
	    			<td>: <strong><?=$item[0]->nama_perusahaan;?></strong></td>
	    		</tr>
	    		<tr>
	    			<td>Alamat</td>
	    			<td>:<?=$item[0]->alamat;?></td>
	    		</tr>
	       		<tr>
	    			<td>NPWP</td>
	    			<td>: <?=$item[0]->npwp;?></td>
	    		</tr>
	    	</table>
	  	</td>
	  </tr>
	  <tr>
	  	<th width="10px;" >No.<br> Urut</th>
	  	<th width="50%">Nama Barang Kena Pajak / <br> Jasa Kena Pajak</th>
	  	<th>Harga Jual/ Penggantian / Uang Muka / Termin<br>
	  		Rp.</th>
	  </tr>
	  
	  <tr>
	    <td  style="border-bottom:1px none #000000">
	    <div style="min-height:100px;">
	 		1. 
	   	</div>
	   	</td>
	    <td  style="border-bottom:1px none #000000">
	    <div style="min-height:100px;">
	    <?php
		$i=1;
	   	$vol =0;
	   	foreach($item as $v){
	   		$vol += $v->jumlah;
	   		$ou[] = $v->alamat_kirim."(".$v->jumlah." liter)";   	
	   	}	
	   	echo $vol." liter BBM Solar Industri Untuk ".implode(' ,',$ou);	  
	   	?>
	   	
	   	</div>
	    </td>
	  
	    <td align="right" valign="top"  style="border-bottom:1px none #000000">
	   <?=to_currency($v->total_biaya_bbm);?></div>
	   	</td>
	  </tr>
	  <tr>
	  	<td style="border-top:1px none #000000">2.<br><br></td>
	  	<td style="border-top:1px none #000000" valign="top">Biaya Operational Kerja</td>
	  	<td  align="right" style="border-top:1px none #000000"  valign="top">  <?=to_currency($v->total_biaya_angkut);?></td>
	  </tr>
	  <tr>
	  	<td colspan="2">Harga Jual / <strike>Penggantian/Uang Muka/Termin</strike></td>
	  	<td align="right"><?php echo to_currency($v->total_biaya_angkut+$v->total_biaya_bbm);?></td>
	  </tr>
	  <tr>
	  	<td colspan="2">Dikurangi  Potongan Harga</td>
	  	<td align="right"> 
	  	Rp. 0
	  	</td>
	  </tr>
	  <tr>
	  	<td colspan="2">Dikurangi uang Muka yang diterima</td>
	  	<td align="right">-</td>
	  </tr>
	  <tr>
	  	<td colspan="2">Dasar Pengenaan Pajak</td>
	  	<td align="right"> <?php echo to_currency($v->total_biaya_angkut+$v->total_biaya_bbm);?></td>
	  </tr>	  
	  	  <tr>
	  	<td colspan="2">PPN =  10% x Dasar Pengenaan Pajak</td>
	  	<td align="right"><?=to_currency($v->ppn )?></td>
	  </tr>
	  <tr>
	  	<td colspan="3">
	  	Pajak Penjualan Atas Barang Mewah:
	  	<table width="100%" class="noborder" border="0">
	  		<tr>
	  			<td>
	  				<table  class="table-list-khs">
	  					<tr>
	  						<th style=" border: 1px solid #000000;">Tarif</th>
	  						<th style=" border: 1px solid #000000;">DPP</th>
	  						<th style=" border: 1px solid #000000;">PPN BM</th>
	  					</tr>
	  					<tr >
	  						<td style=" border: 1px solid #000000;">
	  						........................... %<br>
	  						........................... %<br>
	  						........................... %<br>
	  						</td>
	  						<td style=" border: 1px solid #000000;">
	  						RP ........................... <br>
	  						RP ........................... <br>
	  						RP ........................... <br>
	  						</td>
	  						<td style=" border: 1px solid #000000;">
	  						RP ........................... <br>
	  						RP ........................... <br>
	  						RP ........................... <br>
	  						</td>
	  					</tr>
	  					<tr>
	  						<td colspan="2" style=" border: 1px solid #000000;"> Jumlah</td>
	  						<td>RP ...........................</td>
	  					</tr>
	  				</table>
	  			</td>
	  			<td>
	  			Pekanbaru, <? 
	  			//echo date('d',strtotime($tanggal_pengiriman)).'  '.nama_bulan(date('m',strtotime($tanggal_pengiriman))).' '.date('Y',strtotime($tanggal_pengiriman)); ?>
	  			<br><br><br><br><br><br>
	  			IKA SARTIKA<br />
			</td>
	  		</tr>
	  	</table>
	  	</td>
	  </tr>
	  </table>
	
    </div>
</body>
</html>
      