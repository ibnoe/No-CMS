<h2>Laporan Bulanan XL</h2>
<p>Silakan Pilih Bulan dan Tahun!!</p>
<form action="<?=site_url('laporan/xl/cetak')?>" method="post">
<?
$opt_bulan = array(
1 => 'Januari',
2 => 'Februari',
3 => 'Maret',
4 => 'April',
5 => 'Mei',
6 => 'Juni',
7 => 'Juli',
8 => 'Agustus',
9 => 'September',
10 => 'Oktober',
11 => 'November',
12 => 'Desember',

);
$opt_tahun =array();
for ($i=2011;$i<=date("Y");$i++)
	$opt_tahun[$i]=$i;
	
echo form_dropdown('bulan',$opt_bulan,date("m")).form_dropdown('tahun',$opt_tahun,date("Y"));
?>
<input type="submit" id="lap_xl">
</form>