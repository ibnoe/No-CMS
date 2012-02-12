

<h2>Data Pembayaran </h2>
<?php
if (validation_errors()){
?>
<div class="error"><?= validation_errors(); ?></div>
<?php } ?>
<form name="pelanggandetails" id="pelanggandetails" method="POST" action="<?= @$action_url; ?>">
<input type='hidden' name='id_pelanggan' id='id_pelanggan' value='<?= @$id_pelanggan; ?>' >

<label>Tanggal Pembayaran :  </label>
<?php echo form_input('kode_pelanggan',set_value('kode_pelanggan', @$tanggal_pembayaran));?>

<label>Jumlah Pembayaran:  </label>
<?php echo form_input('nama_perusahaan',set_value('nama_perusahaan', @$jumlah_pembayaran),'size="50"');?>

<label>Bukti Pembayaran:  </label>
<?php echo form_input('alamat',set_value('alamat', @$bukti_pembayaran),'size="50"');?>

<label>Rekening:  </label>


<br>
<input type="submit" name="Submit" value="Simpan"  class="button button-red">
<input type="reset" name="resetForm" value="Clear Form">

</form>