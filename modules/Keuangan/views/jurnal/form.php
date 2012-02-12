<script type="text/javascript" src="http://localhost/kg/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://localhost/kg/js/jquery.ui.datepicker.min.js"></script>
<script type="text/javascript" src="http://localhost/kg/js/jquery.ui.datepicker-id.js"></script>
<script type="text/javascript" src="http://localhost/kg/js/jquery.ui.button.min.js"></script>
<script type="text/javascript" src="http://localhost/kg/js/jquery.ui.dialog.min.js"></script>
<script type="text/javascript" src="http://localhost/kg/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://localhost/kg/js/additional-methods.js"></script>

<script >
oDialog = $('<div></div>')
.dialog({
autoOpen: false,
title: 'Konfirmasi',
resizable: false,
width: 500,
height: 150,
modal: true,
buttons: {
OK: function() {
$(this).dialog('close');
}
}
}); 
</script>
<script type="text/javascript" src="<?=base_url()?>themes/bbm/assets/js/jurnal.js"></script>

<div class="post-title"><h2><a href="#"><?php echo $title; ?></a></h2></div>

<div class="post-body">

<?php
	echo form_open('Keuangan/jurnal/insert', array('id' => 'jurnal_form', 'onsubmit' => 'return cekData();'));

	echo "<div id='error' class='error-message' ";

	if($this->session->userdata('ERRMSG_ARR'))
	{
		echo ">";
		echo $this->session->userdata('ERRMSG_ARR');
		$this->session->unset_userdata('ERRMSG_ARR');
	}
	else
	{
		echo "style='display:none'>";
	}
	
	echo "</div>";

	echo form_hidden('f_id', $f_id);
	echo form_hidden('goto', site_url('Keuangan/jurnal'));

	$data['class'] = 'input';	
?>	

	<table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
	
		<tr>
			<th><?php echo form_label('Tanggal *','tanggal'); ?></th>
			<td>
				<?php 
					$data['name'] = 'tanggal';
					$data['id'] = 'datepicker';
					$data['title'] = "Tanggal tidak boleh kosong dan harus diisi dengan format dddd-mm-yy";	
					echo form_input($data);
				?>
			</td>				 
		</tr>		
		<tr>
			<th><?php echo form_label('Deskripsi *','deskripsi'); ?></th>
			<td>
				<?php 
					$data['name'] = $data['id'] = 'deskripsi';					
					$data['title'] = "Deskripsi tidak boleh kosong";
					echo form_textarea($data);
				?>
			</td>
		</tr>	
	</table>
  
	<h5>Detail</h5>
	<table id="tblDetail" name="tblDetail" class="sTable">
		<tr>
			<th>Akun</th>
			<th>Debit</th>
			<th>Kredit</th>																	
		</tr>
		<?php for ($i = 1; $i <= 2; $i++) { ?>
			<tr>
				<td>
					<?php 
						$akun['id'] = 'akun'.$i;
						$akun['class'] = 'combo';
						echo form_dropdown('akun[]', $accounts, '' ,"id='".$akun['id'] ."'");
					?>
				</td>
				<td>
					<?php 
						$data['id'] = 'debit'.$i;
						$data['name'] = 'debit'.$i;
						$data['class'] = 'field';
						$data['onBlur'] = "cekDebit($i)";
						$data['title'] = "Debit harus diisi dengan angka";
						echo form_input($data);
					?>
				</td>
				<td>
					<?php 
						$data['id'] = 'kredit'.$i;
						$data['name'] = 'kredit'.$i;
						$data['onBlur'] = "cekKredit($i)";
						$data['title'] = "Kredit harus diisi dengan angka";
						echo form_input($data);
					?>
				</td>
			</tr>
		<?php } ?>
	</table>
	
	<div class="addRow"><a href="javascript:addRow();">tambah baris</a></div>
	
	<div class="buttons">
		<?php
			echo form_submit('post','Post', "id = 'button-save'" );
			echo form_reset('reset','Reset', "id = 'button-reset'" );
		?>
	</div>
	
<?php echo form_close(); ?>

</div>

<script type='text/javascript'>
	//Validasi di client
	$(document).ready(function()
	{
		$('#jurnal_form').validate({
			errorLabelContainer: "#error",
			wrapper: "li",
			rules: 
			{
				tanggal: "required dateISO",
				deskripsi: "required",
				debit1: "integer",
				kredit1: "integer",
				debit2: "integer",
				kredit2: "integer"
			}
		});
	});
</script>
