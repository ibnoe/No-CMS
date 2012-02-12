<?
   $this->load->helper('url');
   $modify_url = site_url('penjualan/modify/');
   $delete_url = site_url('penjualan/manage/');
   $add_url    = site_url('penjualan/add/');

?>

Daftar penjualan

<table class="datatable" border="0" cellpadding="2" cellspacing="1" width="100%">
<thead>
<tr>
	
	<th VALIGN='MIDDLE' ALIGN='CENTER'>
		No
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		No Kuitansi
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Nama Perusahaan
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Tanggal
	</th>
	<th width="150px"> Action </th>

</tr>
</thead>

<tbody  class="scrollingContent">

      <?
         $i = 0;
         foreach ($penjualan_list as $penjualan) {
            $i++;
            if (($i%2)==0) { $class = "table-common-even"; } else { $class = "table-common-odd"; }
      ?>
  <tr class="<?= $class; ?>">
		   <td><?= $i; ?></td>
		   <td><?= $penjualan['no_kuitansi']; ?></td>
		   <td><?= $penjualan['nama_perusahaan']; ?></td>
		   <td><?= $penjualan['tanggal']; ?></td>
       
         <td>
            <a href = "<?= $modify_url."/".$penjualan["id_penjualan"]; ?>" class="button button-blue" >Edit</a>
         
            <a href = "<?= $delete_url."/".$penjualan["id_penjualan"]; ?>" class="button button-red">Manage</a>
         </td>
</tr>
      <? } ?>
</tbody>
</table>
<br />




