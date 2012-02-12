<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>themes/bbm/assets/js/jurnal.js"></script>

<script type="text/javascript" charset="utf-8">
	$(function() {
					oTable = $('#display_table').dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				});

		$('#button-save').click(function() {
			var bln = $('#txtbulan').val();
			var thn = $('#txttahun').val();
			alert(thn);
			oTable.fnClearTable();
			$.post('<?php echo site_url('Keuangan/jurnal/search') ?>',
				  { bulan : bln, tahun : thn},
				  function(msg){
					if(msg) {
						msg = eval(msg);
						oTable.fnAddData(msg);
					}
				  }
			  );
		});
	});
</script>

<div class="post-title"><h2><a href="#"><?php echo $title; ?></a></h2></div>
<? echo anchor('Keuangan/jurnal/jurnal_umum/','Tambah Jurnal Umum')?> | <? echo anchor('Keuangan/jurnal/jurnal_umum/','Tambah Jurnal Pengeluaran')?>
| <? echo anchor('Keuangan/jurnal/jurnal_umum/','Tambah Jurnal Pembelian')?>  
| <? echo anchor('Keuangan/jurnal/jurnal_umum/','Tambah Jurnal Penerimaan Kas')?> 
<div class="post-body">

<?php
	if($this->session->userdata('SUCCESSMSG'))
	{
		echo "<div class='success'>".$this->session->userdata('SUCCESSMSG')."</div>";
		$this->session->unset_userdata('SUCCESSMSG');
	}
	
	$data['class'] = 'input';

	echo form_open();

	$attributes = array('id' => 'fieldset', 'class' => 'fieldset');
	echo form_fieldset('Pencarian Jurnal', $attributes);	
?>

	<table  border="0" align="center" cellpadding="2" cellspacing="0">						  		
		<tr>
			<th>
				<?php echo form_label('Bulan','bulan'); ?>
			<td>
				<?php 
					$data['id'] = 'txtbulan';
					$selected = date("m") ;
					echo form_dropdown('bulan', $months, $selected, 'id="txtbulan"');
				?>					
			</td>
		</tr>	
		<tr>
			<th>
				<?php echo form_label('Tahun','tahun'); ?>
			<td>
				<?php 
					$data['id'] = 'txttahun';
					$selected = date("Y") ;
					echo form_dropdown('tahun', $years, $selected, 'id="txttahun"');
				?>					
			</td>
		</tr>								
	</table>
	
	<div class="buttons">
		<?php 			
				echo form_button('cari', 'Cari', "id = 'button-save'" );
	
		?>
	</div>
	
<?php echo form_fieldset_close(); ?>
<?php echo form_close(); ?>

	<h3>Detail Jurnal</h3>
	<table cellpadding="0" cellspacing="0" border="0" class="sTable seratus" id="display_table">
	<thead>
		<tr>
			<th>Tanggal</th>
			<th>Keterangan</th>
			<th>Akun</th>
			<th>Debit</th>
			<th>Kredit</th>
			<th></th>	
		</tr>
	</thead>
	<tbody>
		<?php 
			if($journal_data)
			{
				foreach ($journal_data as $row) 
				{ 
					if($row->debit_kredit == 1)
					{
						$d = $row->nilai;
						$k = '';
					}
					else
					{
						$d = '';
						$k = $row->nilai; 
					}
					echo '<tr>';
					echo '<td>'.$row->tanggal_jurnal.'</td>';
					echo '<td>'.$row->keterangan.'</td>';
					echo '<td>'.$row->account_name.'</td>';
					echo '<td>'.$d.'</td>';
					echo '<td>'.$k.'</td>';	
					echo '<td>'.anchor(site_url("Keuangan/jurnal/jurnal_koreksi/".$row->id), 'Jurnal Koreksi').'</td>'; 							
					echo '</tr>';
				}
			}
		?>
	</tbody>	
	</table>		

</div>		
