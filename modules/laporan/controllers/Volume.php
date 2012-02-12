<?php

/**
 * Description of Keuangan
 *
 * @author theModuleGenerator
 */
class Volume extends CMS_Controller {
  
  	function index(){
  	
  		$this->load->helper('indodate');
		$data['months'] = bulan_list(1);
		$data['years'] = tahun_list(1);
		if (@$_POST['tahun']):
				$this->db->where("EXTRACT(YEAR FROM penjualan.tanggal_invoice ) =", $_POST['tahun']);
				$out=$this->db->select('pelanggan.nama_perusahaan , delivery_order_item.sumber, sum(delivery_order_item.jumlah) as jum_bbm, month(penjualan.tanggal_invoice) bulan ')
		     		->join('penjualan','id_pelanggan=fk_id_pelanggan','left')
		     		->join('delivery_order','id_penjualan=fk_id_penjualan','left')
		     		->join('delivery_order_item','id_do=fk_id_do','left')
		     		->group_by('pelanggan.nama_perusahaan ')
		     	->group_by('bulan ')
		     	->group_by('sumber ')
		     	->get('pelanggan')->result();
		     	
		    	foreach ($out as $v)
		    	{
		    		$report[$v->nama_perusahaan][$v->bulan][$v->sumber] = $v->jum_bbm;
		 			$report[$v->bulan][$v->sumber.'_TOTAL'] = $v->jum_bbm;
		 		}
		    	 
		     	$data['pelanggan'] =$this->db->select('pelanggan.nama_perusahaan')->get('pelanggan')->result();
		     	
		     	$data['out']=$report;
		endif;


	 	$this->view("volume_bbm", $data,'laporan_volume');    
   	
  	}
    public function cetak(){        
     
     
    	//$this->view("volume_bbm", $out);    
    }

 

    
}

?>
