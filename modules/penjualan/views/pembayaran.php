<center><h1>Data Penjualan</h1></center>
<table>
<tr>
	<td>No Kuitansi</td>
	<td>:</td>
	<td><?php echo $no_kuitansi;?></td>
</tr>
<tr>
	<td>Tanggal</td>
	<td>:</td>
	<td><?php echo $tanggal;?></td>
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

<table class="datatable" width="100%">
<thead>
	<tr>
		<th>No</th>
		<th>No Invoice</th>
		<th>No Surat Jalan</th>
		<th>No Faktu Pajak</th>
		<th>Jumlah</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
<?php if ($invoice): $i=0;?>
	<?php foreach ($invoice as $_inv): $i++; ?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $_inv['no_invoice'];?></td>
		<td><?php echo $_inv['no_surat_jalan'];?></td>
		<td><?php echo $_inv['no_faktur_pajak'];?></td>
		<td><?php echo $_inv['grand_total'];?></td>
		<td align="center">
		<?php
		if (!in_array($_inv['id_invoice'],$bayar)):?>
			
			<a class="button button-blue pop" href="<?=site_url('invoice/bayar/'.$_inv['id_invoice'].'/'.$id);?>" >Lunas</a>
		<?php endif;?>
		</td>
	</tr>
	<?php endforeach;endif;?>

</tbody>
</table>

<script >
$(document).ready(function(){

$('.pop').click(function(e){
//alert('aa')
	e.preventDefault();
	show_popup($(this).attr('href'));
	
});

})
function show_popup(url)
{
	newwindow=window.open(url,'name','height=200,width=200,scrollbars=yes');
	if (window.focus) {newwindow.focus()}
}
</script> 