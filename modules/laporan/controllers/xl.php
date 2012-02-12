<?php

/**
 * Description of Keuangan
 *
 * @author theModuleGenerator
 */
class Xl extends CMS_Controller {
	public $id_xl=2;
    public function index($article_id=NULL){
        $this->view('xl_form', NULL, 'laporan_xl');
    } 

    public function cetak($tahun=0,$bulan=0){
    	
      	$this->db->where('fk_id_pelanggan',$this->id_xl)
      			->join('delivery_order','id_penjualan=fk_id_penjualan')
      			->join('delivery_order_item','id_do=fk_id_do')
      				->join('alamat_kirim','id_alamat_kirim=fk_id_alamat_kirim')
      		;
      	$data['item'] = $this->db->get('penjualan')->result();
      	
        $this->load->view('xl_cetak', $data);
    } 


    
}

if ( ! function_exists('timespan'))
{
	function timespan($seconds = 1, $time = '')
	{
		$CI =& get_instance();
		$CI->lang->load('date');

		if ( ! is_numeric($seconds))
		{
			$seconds = 1;
		}

		if ( ! is_numeric($time))
		{
			$time = time();
		}

		if ($time <= $seconds)
		{
			$seconds = 1;
		}
		else
		{
			$seconds = $time - $seconds;
		}

		$out = array();
		//$out['hari']=0;
		$years = floor($seconds / 31536000);

		if ($years > 0)
		{
			$out['tahun']=$years;
		}

		$seconds -= $years * 31536000;
		$months = floor($seconds / 2628000);

		if ($years > 0 OR $months > 0)
		{
			if ($months > 0)
			{
				//$str .= $months.' '.$CI->lang->line((($months	> 1) ? 'date_months' : 'date_month')).', ';
				$out['bulan']=$months;
			}

			$seconds -= $months * 2628000;
		}

		$weeks = floor($seconds / 604800);

		if ($years > 0 OR $months > 0 OR $weeks > 0)
		{
			if ($weeks > 0)
			{
				$out['minggu']=$weeks;
			}

			$seconds -= $weeks * 604800;
		}

		$days = floor($seconds / 86400);

		if ($months > 0 OR $weeks > 0 OR $days > 0)
		{
			if ($days > 0)
			{
				//$str .= $days.' '.$CI->lang->line((($days	> 1) ? 'date_days' : 'date_day')).', ';
				$out['hari']=$days;
			}

			$seconds -= $days * 86400;
		}

		$hours = floor($seconds / 3600);

		if ($days > 0 OR $hours > 0)
		{
			if ($hours > 0)
			{
				//$str .= $hours.' '.$CI->lang->line((($hours	> 1) ? 'date_hours' : 'date_hour')).', ';
				$out['jam']=$hours;
			}

			$seconds -= $hours * 3600;
		}

		$minutes = floor($seconds / 60);

		if ($days > 0 OR $hours > 0 OR $minutes > 0)
		{
			if ($minutes > 0)
			{
				//$str .= $minutes.' '.$CI->lang->line((($minutes	> 1) ? 'date_minutes' : 'date_minute')).', ';
				$out['menit']=$minutes;
			}

			$seconds -= $minutes * 60;
		}

		if ($seconds > 0)
		{
			//$str .= $seconds.' '.$CI->lang->line((($seconds	> 1) ? 'date_seconds' : 'date_second')).', ';
			$out['detik']=$seconds;
		}

		return $out;
	}
}
?>
