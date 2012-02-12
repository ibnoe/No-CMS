<h2>Manage Invoice</h2>
<table cellpadding="5px" class="display">
<tr>
	<td>Id Penjualan</td>
	<td>:</td>
	<td><?php echo sprintf("%05d",$id_penjualan);?></td>
</tr>
<tr>
	<td>Id Invoice</td>
	<td>:</td>
	<td><?php echo sprintf("%05d",$id_penjualan);?></td>
</tr>
<tr>
	<td>Tanggal</td>
	<td>:</td>
	<td><?php echo $tanggal_penjualan;?></td>
</tr>
<tr>
	<td>Nama Pelanggan</td>
	<td>:</td>
	<td><strong><?php echo $kode_pelanggan.' - '.$nama_perusahaan ;?></strong></td>
</tr>

<tr>
	<td>Status Penjualan</td>
	<td>:</td>
	<td><?php echo $status;?></td>
</tr>

</table>
<div class="grid_16 clearfix" id="feature_container">
				<h2 class="text_highlight">Administrasi Penjualan</h2>	
					<a class="features popup" href="<?=site_url('penjualan/invoice/cetak');?>">
					<img src="<?=base_url();?>assets/bbm/ico/print_printer.png" width="72px" height="72px">
					<strong>Cetak Invoice</strong></a>
							
</div>

