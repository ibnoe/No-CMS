<?php 
foreach($crud->css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($crud->js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<center><h1>Manajemen Data Delivery Order</h1></center>
<table class="display">
<tr>
	<td>Tanggal</td>
	<td>:</td>
	<td><?php echo $tanggal_penjualan;?></td>
</tr>
<tr>
	<td>Nama Pelanggan</td>
	<td>:</td>
	<td><?php echo $kode_pelanggan.' - '.$nama_perusahaan ;?></td>
</tr>

<tr>
	<td>Status Penjualan</td>
	<td>:</td>
	<td><?php echo $status;?></td>
</tr>

</table>
<div style="padding:10px;float:right">
 <a class="button button-green" href="<?php echo site_url('penjualan/delivery_order/add/'.$id_penjualan)?>"><span class="add"></span>Tambah Delivery Order</a>
| <a class="button button-green" href="<?php echo site_url('penjualan/manage/'.$id_penjualan)?>"><span class="add"></span>Kembali ke Manage Penjualan</a>
</div>
<h2>Daftar Delivery Order</h2>

<?php echo ($crud->output); ?>

