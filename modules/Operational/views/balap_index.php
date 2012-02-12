<h2>Operational</h2>
<form method="post">
<label>Cari No DO:</label>
<input name="find_balap_id" value="<?=@$id_do?>"><input type="submit">
</form>
<br><br>
<?
if (isset($item)):?>
<h2>Silakan Isi data berikut ini berdasarkan dokumen BALAP</h2>

<form method="post">
<input type="hidden" name="id_do" value="<?=@$id_do?>">
<?
echo $this->table->generate();
?>
<input type="submit" name="simpan" value="Simpan">
</form>
<?
endif;

?>