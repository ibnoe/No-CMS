<center><h1><?=$judul?></h1></center>
<strong>Silakan pilih penjualan yang akan diproses!!</strong>
<?=$this->session->flashdata('error');?>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<?php echo $output; ?>
