

<center><h1>Manage Data Penjualan</h1></center>
<table cellpadding="5px" class="display">
<tr>
	<td>Id Penjualan</td>
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
					<a class="features" href="<?=site_url('penjualan/delivery_order');?>">
					<img src="<?=base_url();?>assets/bbm/ico/LorryGreen.png" width="72px" height="72px">
					<strong>Manage Delivery Order</strong></a>

					<a class="features  popup" href="<?=site_url('penjualan/invoice');?>">
					<img src="<?=base_url();?>assets/bbm/ico/invoice.png" width="72px" height="72px">
					<strong>Invoice</strong></a>
					
					<a class="features popup" href="<?=site_url('penjualan/kuitansi');?>">
					<img src="<?=base_url();?>assets/bbm/ico/Dollars.png" width="72px" height="72px">
					<strong>Kuitansi</strong></a>
					
					<a class="features  popup" href="<?=site_url('penjualan/faktur_pajak');?>">
					<img src="<?=base_url();?>assets/bbm/ico/Sales-by-Payment-Method-rep.png" width="72px" height="72px">
					<strong>Faktur Pajak</strong></a>



							
</div>
