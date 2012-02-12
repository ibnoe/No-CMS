<?
$this->load->helper('url');
$this->load->library('form_validation');
$action_url = site_url("penjualan/$form_action/") ;

?>

<h2>Tambah Penjualan Baru </h2>
<?php
if (validation_errors()){
?>
<div class="error"><?= validation_errors(); ?></div>
<?php } ?>
<form name="pelanggandetails" id="pelanggandetails" method="POST" action="<?= $action_url; ?>">

<label>Nomer Kuitansi :  </label>
<?php echo form_input('no_kuitansi',set_value('no_kuitansi', $no_kuitansi));?>

<label>Nama Perusahaan:  </label>
<?php
echo form_dropdown('fk_id_pelanggan',$opt_cust);
?>
<label>Keterangan:  </label>
<?php echo form_input('keterangan',set_value('keterangan', $keterangan),'size="100"');?>



<br><br><br>
<input type="submit" name="Submit" value="Simpan"  class="button button-red">

</form>