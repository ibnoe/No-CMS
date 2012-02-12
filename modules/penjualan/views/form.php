<?
$this->load->helper('url');
$this->load->library('form_validation');
$action_url = site_url("pelanggan/$form_action/") ;

?>

<h2>Data Pelanggan </h2>
<?php
if (validation_errors()){
?>
<div class="error"><?= validation_errors(); ?></div>
<?php } ?>
<form name="pelanggandetails" id="pelanggandetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='id_pelanggan' id='id_pelanggan' value='<?= $id_pelanggan; ?>' >

<label>Kode Pelanggan :  </label>
<?php echo form_input('kode_pelanggan',set_value('kode_pelanggan', $kode_pelanggan));?>

<label>Nama Perusahaan:  </label>
<?php echo form_input('nama_perusahaan',set_value('nama_perusahaan', $nama_perusahaan),'size="50"');?>

<label>Alamat Perusahaan:  </label>
<?php echo form_input('alamat',set_value('alamat', $alamat),'size="50"');?>

<label>Telp Perusahaan:  </label>
<?php echo form_input('telp',set_value('telp', $telp),'size="50"');?>


<label>Alamat Pengiriman:  </label>
<?php echo form_input('alamat_kirim',set_value('alamat_kirim', $alamat_kirim),'size="50"');?>


<label>Npwp:  </label>
<?php echo form_input('npwp',set_value('npwp', $npwp),'size="40"');?>


<br>
<input type="submit" name="Submit" value="Simpan"  class="button button-red">
<input type="reset" name="resetForm" value="Clear Form">

</form>