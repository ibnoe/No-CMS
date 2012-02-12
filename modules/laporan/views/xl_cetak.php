<table>
<thead>
	<tr>
		<td rowspan="2">No	</td>
		<td rowspan="2">Ticket Number	</td>
		<td rowspan="2">Type of Work	</td>
		<td rowspan="2">Site ID		</td>
		<td rowspan="2">Site Name	</td>
		<td colspan="2">Start Request	</td>
		<td colspan="2">Finish Activity	</td>
		<td rowspan="2">Volume (Solar)	</td>
		<td rowspan="2">Unit of Measurement (L)	</td>
		<td rowspan="2">Total Service Cost (Rp) *	</td>
		<td rowspan="2">Duration</td>
		<td rowspan="2">SLA</td>
		<td rowspan="2">Catatan</td>
	</tr>
	<tr>
		<td>Basic start Date</td>
		<td>Basic start Time</td>
		<td>Basic finish Date</td>
		<td>Basic finish Time</td>
	</tr>
</thead>
<tbody>
	<? 
	$i=1;
	$total_volume=0;
	$total_volume_not_ok=0;
	$site_fail=0;
	foreach ($item as $v):	?>
		<tr>
			<td><?=$i?></td>
			<td></td>
			<td>Reguler</td>
			<td><?=$v->kode_lokasi?></td>
			<td><?=$v->lokasi_kirim?></td>
			<td><?=date("Y-m-d",strtotime($v->start_request));?></td>
			<td><?=date("h:i:s",strtotime($v->start_request));?></td>
			<td><?=date("Y-m-d",strtotime($v->finish_activities));?></td>
			<td><?=date("h:i:s",strtotime($v->finish_activities));?></td>
			<td><?=$v->jumlah?></td>
			<td>Liter</td>
			<td><?=$v->jumlah*$v->harga_bbm?></td>
			<td><? 
			
			$ts = (timespan(strtotime($v->start_request),strtotime($v->finish_activities)));
				
					echo (int)@$ts['hari'];
			?></td>
			<td><?
			
			$total_volume += $v->jumlah;
			if (@$ts['hari']>=2)
			{
				$total_volume_not_ok += $v->jumlah;
				$site_fail++;
				echo "90%";
			}		
			else
				echo "100%";
			
			?></td>
			<td></td>
		
		</tr>
		<? 
		$i++;
		endforeach;
		$i=$i-1;
		?>
</tbody>
</table>


<table>
	<tr>
		<td>Satuan SLA</td>
		<td>jumlah</td>
		<td>close ok</td>
		<td>close failed</td>
		<td>SLA (monthly everage)</td>
	</tr>
	<tr>
		<td>Volume</td>
		<td><?=$total_volume;?></td>
		<td><?=$total_volume-$total_volume_not_ok;?></td>
		<td><?=$total_volume_not_ok;?></td>
		<td><?=($total_volume-$total_volume_not_ok)/$total_volume*100?>%</td>
	</tr>
	<tr>
		<td>Tangki</td>
		<td><?=$total_volume/5000;?></td>
		<td><?=($total_volume-$total_volume_not_ok)/5000;?></td>
		<td><?=$total_volume_not_ok/5000;?></td>
		<td><?=(($total_volume-$total_volume_not_ok)/5000)/($total_volume/5000)*100?>%</td>
</tr>
	<tr>
		<td>Site</td>
		<td><?=$i;?></td>
		<td><?=$i-$site_fail;?></td>
		<td><?=$site_fail;?></td>
		<td><?=($i-$site_fail)/$i*100;?>%</td>
	</tr>
</table>
			