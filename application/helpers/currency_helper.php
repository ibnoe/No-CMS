<?php
function to_currency($number)
{
	if($number >= 0)
	{
		return 'Rp. '.number_format($number, 0, ',', '.');
    }
    else
    {
    	return 'Rp. '.number_format(abs($number), 0, ',', '.');
    }
}


function to_currency_no_money($number)
{
	//number_format($number, 2, ",", "."); 
	return number_format($number, 0, '.', '');
	
}


function num_to_txt($num) {
	$tdiv = array("","","ratus ","ribu ", "ratus ", "juta ", "ratus ","miliar ");
	$divs = array( 0,0,0,0,0,0,0);
	$pos = 0; // index into tdiv;
	// make num a string, and reverse it, because we run through it backwards
	// bikin num ke string dan dibalik, karena kita baca dari arah balik
	$num=strval(strrev(number_format($num,2,'.',''))); 
	$answer = ""; // mulai dari sini
	while (strlen($num)) {
		if ( strlen($num) == 1 || ($pos >2 && $pos % 2 == 1))  {
			$answer = doone(substr($num,0,1)) . $answer;
			$num= substr($num,1);
		} else {
			$answer = dotwo(substr($num,0,2)) . $answer;
			$num= substr($num,2);
			if ($pos < 2)
				$pos++;
		}
		if (substr($num,0,1) == '.') {
			if (! strlen($answer))
				$answer = "";
			$answer = "" . $answer . "";
			$num= substr($num,1);
			// kasih tanda "nol" jika tidak ada
			if (strlen($num) == 1 && $num == '0') {
				$answer = "" . $answer;
				$num= substr($num,1);
			}
		}
	    // add separator
	    if ($pos >= 2 && strlen($num)) {
			if (substr($num,0,1) != 0  || (strlen($num) >1 && substr($num,1,1) != 0
				&& $pos %2 == 1)  ) {
				// check for missed millions and thousands when doing hundreds
				// cek kalau ada yg lepas pada juta, ribu dan ratus
				if ( $pos == 4 || $pos == 6 ) {
					if ($divs[$pos -1] == 0)
						$answer = $tdiv[$pos -1 ] . $answer;
				}
				// standard
				$divs[$pos] = 1;
				$answer = $tdiv[$pos++] . $answer;
			} else {
				$pos++;
			}
		}
    }
    return strtoupper($answer);
}
 
function doone2($onestr) {
    $tsingle = array("","satu ","dua ","tiga ","empat ","lima ",
	"enam ","tujuh ","delapan ","sembilan ");
       return strtoupper($tsingle[$onestr] );
}	
 
function doone($onestr) {
    $tsingle = array("","se","dua ","tiga ","empat ","lima ", "enam ","tujuh ","delapan ","sembilan ");
       return strtoupper($tsingle[$onestr]);
}	
 
function dotwo($twostr) {
    $tdouble = array("","puluh ","dua puluh ","tiga puluh ","empat puluh ","lima puluh ", "enam puluh ","tujuh puluh ","delapan puluh ","sembilan puluh ");
    $teen = array("sepuluh ","sebelas ","dua belas ","tiga belas ","empat belas ","lima belas ", "enam belas ","tujuh belas ","delapan belas ","sembilan belas ");
    if ( substr($twostr,1,1) == '0') {
		$ret = doone2(substr($twostr,0,1));
    } else if (substr($twostr,1,1) == '1') {
		$ret = $teen[substr($twostr,0,1)];
    } else {
		$ret = $tdouble[substr($twostr,1,1)] . doone2(substr($twostr,0,1));
    }
    return strtoupper($ret);
}

function nama_bulan($i)
{
	$bulan = array(
		'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
	);

	return $bulan[$i-1];
}

function tanggal($tanggal)
{
return date('d',strtotime($tanggal)).'  '.nama_bulan(date('m',strtotime($tanggal))).' '.date('Y',strtotime($tanggal));
	  			
}
function no_invoice($id,$tgl)
{
	return sprintf("%05d",$id).'/INV-LRP/'.date('m',strtotime($tgl)).'/'.date('Y',strtotime($tgl)); 
}