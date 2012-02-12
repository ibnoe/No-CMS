<script type="text/javascript" src="<?php echo base_url();?>js/group_table.js"></script>

<div class="post-title"><h2><a href="#"><?php echo $title; ?></a></h2></div>

<div class="post-body">
	<table cellpadding="0" cellspacing="0" border="0" class="sTable" id="group_table">
				<colgroup>
                    <col  class="con1">
                    <col  class="con0">
                    <col class="con1">
                    <col  class="con0">

                </colgroup>
		<thead>
			<tr>
				<th>Grup</th>
				<th>Akun</th>
				<th>Saldo</th>									
				<th>Buku Besar</th>
			</tr>
		</thead>
		<tbody>		
			<?php
				if($account_data)
				{
					foreach ($account_data as $row) 
					{
						echo '<tr>';
						echo '<td>'.$row->groups_name.'</td>';
						echo '<td>'.$row->nama.'</td>';
						echo '<td>'.number_format(($row->saldo_awal+$row->saldo), 0, '', '.').'</td>';						
						echo '<td>'.anchor(site_url()."/Keuangan/jurnal/buku_besar/".$row->id, 'Buku Besar').'</td>'; 	
						echo '</tr>';
					}
				}
			?>
		</tbody>
		
	</table>

</div>
