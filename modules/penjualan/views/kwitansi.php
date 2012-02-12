<?php echo form_open('cetak/kwitansi/'.$id);?>

<table class="datatable" border="0" cellpadding="2" cellspacing="1" width="100%">
<thead>
<tr>
	
	<th VALIGN='MIDDLE' ALIGN='CENTER'>
		
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		No Invoice
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Tanggal Pembayaran
	</th>
	</tr>
</thead>
<tbody  class="scrollingContent">

      <?
         $i = 0;
         foreach ($pembayaran as $val) {
          
      ?>
  <tr>
		   <td><?php echo form_checkbox('no_invoice[]', $val->id_invoice);?></td>
		   <td><?= $val->no_invoice?></td>
		   <td><?= $val->tanggal_pembayaran ?></td>
		  </tr>
      <? } ?>
</tbody>
</table>
<br />
<input type="submit" value="Cetak Kwitansi">




