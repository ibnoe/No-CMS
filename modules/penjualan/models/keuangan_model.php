<?  if (!defined('BASEPATH')) exit('No direct script access allowed');


class Keuangan_Model extends CI_Model {

	function insert_jurnal_penjualan($id_penjualan)
	{
		$x = $this->db->limit(1)->where('id_bukti',$id_penjualan)->get('jurnal')->row();
		if (!$x)
		{
			
			$obj = $this->get_penjualan_data($id_penjualan);
			$this->insert_jurnal($obj);
		}
		else
		{
			//update_jurnal
			// delete Jurnal detailnya aja
			$this->delete_jurnal_by_id($x->id);
			$obj = $this->get_penjualan_data($id_penjualan);
			$this->update_detail_jurnal($x->id,$obj);		;
		}
	}
	
	function insert_jurnal($data){
		$this->db->trans_start();
		$this->db->insert('jurnal', $data->jurnal);
		$jurnal_id = $this->db->insert_id();
		var_dump($data->details);
		for ($i = 0; $i < count($data->details); $i++)
		{
			$data->details[$i]['jurnal_id'] = $jurnal_id;
			$this->db->insert('jurnal_detail', $data->details[$i]);
			$op = ($data->details[$i]['debit_kredit']) ? '+' : '-';
			$this->db->query('UPDATE akun SET saldo = saldo'.$op.$data->details[$i]['nilai'].' WHERE id = '.$data->details[$i]['akun_id']);
		}
		$this->db->trans_complete();	
		return $this->db->trans_status();
	
	}
	
	function delete_jurnal_by_id($id)
	{
		//kembalikan jumlash saldo akun
		$data = $this->db->where('jurnal_id',$id)->get('jurnal_detail')->result();
		foreach ($data as $v)
		{	
			$op = ($v->debit_kredit) ? '-' : '+';
			$this->db->query('UPDATE akun SET saldo = saldo'.$op.$v->nilai.' WHERE id = '.$v->akun_id);
	
		}
		$this->db->where('jurnal_id',$id)->delete('jurnal_detail');
	}
	
	function update_detail_jurnal($id,$data)
	{
		$this->db->trans_start();
		$jurnal_id = $id;
		for ($i = 0; $i < count($data->details); $i++)
		{
			$data->details[$i]['jurnal_id'] = $jurnal_id;
			$this->db->insert('jurnal_detail', $data->details[$i]);
			$op = ($data->details[$i]['debit_kredit']) ? '+' : '-';
			$this->db->query('UPDATE akun SET saldo = saldo'.$op.$data->details[$i]['nilai'].' WHERE id = '.$data->details[$i]['akun_id']);
		}
		
		$this->db->trans_complete();	
		return $this->db->trans_status();
	}
	
	function get_penjualan_data($id_penjualan)
	{
			$this->db->join('pelanggan','fk_id_pelanggan=id_pelanggan');
			$data = $this->db->where('id_penjualan',$id_penjualan)->get('penjualan')->row_array();
			$obj = new stdClass;
			$obj->jurnal = array(
				'tanggal_jurnal' => date('Y-m-d'),
				'f_id' 			 => 1,
				'keterangan' 	 => 'Penjualan BBM kepada '.$data['nama_perusahaan'].' ('.no_invoice($id_penjualan,$data['tanggal_invoice']).')',
				'id_bukti' 		 => $data['id_penjualan'],
				'table_bukti' 	 => 'penjualan',
				'waktu_post' 	 => date('Y-m-d h:i:s'),
				
			);
			//debet 
			//4
			//21
			
			$obj->details =array();
			$obj->details[0] = array(
									'item' => 1,
									'akun_id' => 4,
									'debit_kredit' => 1,
									'nilai' => $data['total_penjualan']	
								);
		
			$obj->details[1] = array(
									'item' => 2,
									'akun_id' => 21,
									'debit_kredit' => 1,
									'nilai' => $data['total_biaya_bbm'] +  $data['total_uang_operasional']		
								);
			//kredit
			//20
			//belom ada
			//5
			$obj->details[2] = array(
									'item' => 3,
									'akun_id' => 20,
									'debit_kredit' => 0,
									'nilai' => $data['total_biaya_bbm']	+ $data['total_uang_operasional']	
								);
		
			$obj->details[3] = array(
									'item' => 4,
									'akun_id' => 36,
									'debit_kredit' => 0,
									'nilai' => $data['total_biaya_angkut']	
								);
		
			$obj->details[4] = array(
									'item' => 5,
									'akun_id' => 5,
									'debit_kredit' => 0,
									'nilai' => $data['total_biaya_bbm'] + $data['total_pbbkb']		
								);
			$obj->details[5] = array(
									'item' => 6,
									'akun_id' => 15,
									'debit_kredit' => 0,
									'nilai' => $data['ppn'] 		
								);
			return $obj;
	}
	
}


