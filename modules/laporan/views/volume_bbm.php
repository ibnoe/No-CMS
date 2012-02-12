<h2>Laporan Bulanan XL</h2>
<p>Silakan Pilih Bulan dan Tahun!!</p>
<form  method="post">
<?

	
echo form_dropdown('tahun',$years,date("Y"));
?>
<input type="submit" id="lap_xl">
</form>


<div style="overflow:scroll">
<table cellpadding="0" cellspacing="0" border="0" class="sTable seratus" id="display_table">
	<colgroup>
                    <col  class="con1">
                    <col  class="con0">
                    <col class="con0">
                    <col  class="con1">
					<col  class="con1">
                   <col  class="con0">
                    <col class="con0">
                    <col  class="con1">
					<col  class="con1">
                   <col  class="con0">
                    <col class="con0">
                    <col  class="con1">
					<col  class="con1">
                   <col  class="con0">
                    <col class="con0">
                    <col  class="con1">
					<col  class="con1">
                   <col  class="con0">
                    <col class="con0">
                    <col  class="con1">
					<col  class="con1">
                   <col  class="con0">
                    <col class="con0">
                    <col  class="con1">
					<col  class="con1">
     </colgroup>
	<thead>
		<tr>
			<th rowspan="2">Perusahaan</th>
			<?
			for($i=1;$i<=12;$i++)
					{
						echo '<th colspan="2">'.(nama_bulan($i)).'</th>';
						
					
					}
			?>
			</tr>
			<tr>
			<?
					for($i=1;$i<=12;$i++)
					{
						echo '<th>P</th>';
						echo '<th>J</th>';
						
					
					}
			?>
			</tr>
	</thead>
	<tbody>
		<?php 
			if($pelanggan)
			{
				foreach ($pelanggan as $row) 
				{ 
					
					echo '<tr>';
					echo '<td>'.$row->nama_perusahaan.'</td>';
					for($i=1;$i<=12;$i++)
					{
						echo '<td>'.((int)@$out[$row->nama_perusahaan][$i]['PERTAMINA']).'</td>';
						echo '<td>'.((int)@$out[$row->nama_perusahaan][$i]['PATRAJASA']).'</td>';
					
					}
					echo '</tr>';
				}
				echo '<tr>';
				echo '<td><strong>Sub Total</strong></td>';
				for($i=1;$i<=12;$i++)
				{
					echo '<td><strong>'.((int)@$out[$i]['PERTAMINA_TOTAL']).'</strong></td>';
					echo '<td><strong>'.((int)@$out[$i]['PATRAJASA_TOTAL']).'</strong></td>';
					
				}
				echo '</tr>';
				echo '<tr>';
				echo '<td><strong>Sub Total</strong></td>';
				for($i=1;$i<=12;$i++)
				{
						echo '<td colspan="2" align="center"><strong>'.((int)@$out[$i]['PERTAMINA_TOTAL']+@$out[$i]['PATRAJASA_TOTAL']).'</strong></td>';

					
					}
					echo '</tr>';
			}
		?>
	</tbody>	
	</table>		
</div>