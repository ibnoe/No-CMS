<?php 
foreach($crud->css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($crud->js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<center><h1>Manajemen Data Uang Jalan</h1></center>
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

<h2>Daftar Uang jalan</h2>

<?php echo ($crud->output); ?>

<script>
$(document).ready(
	function(){
		$('.popup').attr('target', '_blank');
	}
)
</script>
