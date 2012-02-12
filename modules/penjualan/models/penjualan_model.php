<?  if (!defined('BASEPATH')) exit('No direct script access allowed');


class Penjualan_Model extends CI_Model {


	public $table_record_count;
	public $table_name;
	public $primary_key;

	function __construct() 
	{
		parent::__construct();
		
		$this->table_name 	= 'penjualan';
		$this->primary_key 	= 'id_penjualan';
	}

	function get()
	{
		return $this->db->get($this->table_name)->result_array();
	}


	function findAll($start = NULL, $count = NULL) {
		return $this->find(NULL, $start, $count);
	}

	
	function findByFilter($filter_rules, $start = NULL, $count = NULL) {
		return $this->find($filter_rules, $start, $count);
	}

	function find($filters = NULL, $start = NULL, $count = NULL) {

		$results = array();

		$this->table_record_count = $this->db->count_all( $this->table_name );

		
		$where_clause = '';
		if ($filters) 
		{
			if ( is_string($filters) ) 
			{
				$where_clause = $filters;
			}
			elseif ( is_array($filters) ) 
			{
				if ( count($filters) > 0 ) 
				{
					foreach ($filters as $field => $value) 
					{
						$this->db->where($field, $value);
					}
				}
			}

		}

		if ($start) 
		{
			if ($count) 
			{
				$this->db->limit($start, $count);
			}
			else 
			{
				$this->db->limit($start);
			}
		}

$this->db->join('pelanggan','id_pelanggan=fk_id_pelanggan');
		
		 $this->db->order_by('dibuat_tanggal','DESC');

		$query = $this->db->get( $this->table_name );

		if ($query->num_rows() > 0) 
		{
			return $query->result_array();
		}

		return $results;

	}

	function get_invoice_lunas($id)
	{
			$inv=$this->db->where('fk_id_penjualan',$id)
				->join('pembayaran','id_invoice=fk_id_invoice')
				->select('id_invoice')
				//->join('pelanggan','id_pelanggan=fk_id_pelanggan')
				//->join('bank','id_bank=fk_id_bank')
				->get('invoice')->result_array();
			//	echo $this->db->last_query();die();
			$ret=array();	
			foreach($inv as $val)
				$ret[]=$val['id_invoice'];
			return $ret;
	}
	function retrieve_by_pkey($idField) {

		$results = array();

		
		$this->db->where( $this->primary_key, $idField);
		$this->db->join('pelanggan','id_pelanggan=fk_id_pelanggan');
		$this->db->limit( 1 );
		$query = $this->db->get( $this->table_name );


		if ($query->num_rows() > 0) 
		{
			$row = $query->row_array();
			$results		 = $row;

		}
		else 
		{
			$results = false;
		}

		return $results;
	}

	function get_invoice($id)
	{
		$inv=$this->db->where('fk_id_penjualan',$id)
				//->join('penjualan','id_penjualan=fk_id_penjualan')
				//->join('pelanggan','id_pelanggan=fk_id_pelanggan')
				//->join('bank','id_bank=fk_id_bank')
				->get('invoice')->result_array();
				
		return $inv;
	}
	
	function add( $data ) 
	{
		$this->db->insert($this->table_name, $data);
		return $this->db->insert_id();
	}

	function modify($keyvalue, $data) {

		$this->db->where($this->primary_key, $keyvalue);
		$this->db->update($this->table_name, $data);

	}

	function delete_by_pkey($idField) {
		
		$this->db->where($this->primary_key, $idField);
		$this->db->delete($this->table_name);

		return true;

	}

	function get_item()
	{
		$data = $this->db->get('item')->result();
		$out=array();
		$out[0] = "--Silakan pilih item--";
		foreach ($data as $v)
			$out[$v->id_item] = $v->nama_item;
		return $out;
	}
	function get_mobil()
	{
		$data = $this->db->get('mobil')->result();
		$out=array();
		$out[0] = "--Silakan pilih mobil--";
		foreach ($data as $v)
			$out[$v->id_mobil] = $v->kode_mobil.' - '.$v->no_kendaraan;
		return $out;
	}
	
	function get_supir()
	{
		$data = $this->db->get('supir')->result();
		$out=array();
		$out[0] = "--Silakan pilih supir--";
		foreach ($data as $v)
			$out[$v->id_supir] = $v->kode_supir .' - '.$v->nama;
		return $out;
	}
	function get_alamat_kirim($id)
	{
		//get id_client
	
		$this->db->where('id_penjualan',$id);
		$a = $this->db->get('penjualan')->row();
		$this->db->where('id_pelanggan',$a->fk_id_pelanggan);
		$data = $this->db->get('alamat_kirim')->result();
		$out=array();
		$out[0] = "--Silakan pilih tujuan--";
		foreach ($data as $v)
			$out[$v->id_alamat_kirim] = $v->kode_lokasi."-".$v->lokasi_kirim;
		return $out;
	}

	function get_do($id)
	{
		$this->db->where('id_do',$id);
		$this->db->join('penjualan','id_penjualan=fk_id_penjualan')
				 ->join('pelanggan','id_pelanggan=fk_id_pelanggan')
				 ->join('mobil','id_mobil=fk_id_mobil')
				 ->join('supir','id_supir=fk_id_supir')
				 ;
		$res['info'] = $this->db->get('delivery_order')->row();	
		
		$this->db->where('fk_id_do',$id);
		$this->db->join('item','id_item=fk_id_item')
				 ->join('alamat_kirim','id_alamat_kirim = fk_id_alamat_kirim');
				 
		$res['item']=$this->db->get('delivery_order_item')->result();	
		return $res;	
	}
	
	function get_uj($id)
	{
		$this->db->where('id_uang_jalan',$id);
		$this->db->join('delivery_order','	fk_id_do =	id_do ')
				 ->join('penjualan','id_penjualan=fk_id_penjualan')
				 ->join('pelanggan','id_pelanggan=fk_id_pelanggan')
				 ->join('mobil','id_mobil=fk_id_mobil')
				 ->join('supir','id_supir=fk_id_supir')
				 ;
		$res['info'] = $this->db->get('uang_jalan')->row();	
	
		return $res;	
	}
	
	function get_invoice_item($id)
	{
		$this->db->where('id_penjualan',$id);
		$this->db->join('delivery_order','id_penjualan=fk_id_penjualan')
				 ->join('delivery_order_item','id_do=fk_id_do')
				 ->join('pelanggan','id_pelanggan=fk_id_pelanggan')
				 ->join('mobil','id_mobil=fk_id_mobil')
				 ->join('supir','id_supir=fk_id_supir')
				 ->join('item','fk_id_item=id_item')
				 ->join('alamat_kirim','fk_id_alamat_kirim=id_alamat_kirim')
				 ;
			$res['item']=$this->db->get('penjualan')->result();	
		return $res;	
	}
	
	function update_keuangan($id)
	{
		//hitung total pembelian
		$this->db->select('sum(harga_bbm*jumlah) tot' );
		$this->db->where('id_penjualan',$id);
		$this->db->join('delivery_order','id_penjualan=fk_id_penjualan')
				 ->join('delivery_order_item','id_do=fk_id_do');
				 
		$res=$this->db->get('penjualan')->row();
		
		$data['total_biaya_bbm'] = $res->tot;
		
		$this->db->select('sum(harga_angkut*jumlah) tot' );
		$this->db->where('id_penjualan',$id);
		$this->db->join('delivery_order','id_penjualan=fk_id_penjualan')
				 ->join('delivery_order_item','id_do=fk_id_do');
				 
		$res=$this->db->get('penjualan')->row();
		
		$data['total_biaya_angkut'] = $res->tot;
			
		//biaya operasional	
		$this->db->select('sum(total_uang_jalan) tot' );
		$this->db->where('id_penjualan',$id);
		$this->db->join('delivery_order','id_penjualan=fk_id_penjualan')
				 ->join('uang_jalan','id_do=fk_id_do');
		$res=$this->db->get('penjualan')->row();
		
		$data['total_uang_operasional'] = $res->tot;
		$data['ppn'] = ($data['total_biaya_bbm']+$data['total_biaya_angkut'] )*0.1;
		$pbbkb = $this->db->where('id_penjualan',$id)->join('pelanggan','fk_id_pelanggan=id_pelanggan')->get('penjualan')->row()->pbbkb;
		
		$data['total_pbbkb'] = ($data['total_biaya_bbm']+$data['total_biaya_angkut'] )*$pbbkb/100;
		$data['total_penjualan'] = ($data['total_biaya_bbm']+$data['total_biaya_angkut'] + $data['ppn'] +$data['total_pbbkb']);
		
		$this->db->where('id_penjualan',$id);
		$this->db->update('penjualan',$data);
	}
	
	function get_harga_item()
	{
		$data = $this->db->get('item')->result();
		$out=array();
		foreach ($data as $v)
			$out[$v->id_item] = $v->harga;
		return $out;
	}
	
	function get_harga_angkut($id)
	{
		//get id_pelanggan
		$id_pelanggan = $this->db->where('id_penjualan',$id)->select('fk_id_pelanggan')->get('penjualan')->row()->fk_id_pelanggan;
		
		$this->db->where('id_pelanggan',$id_pelanggan);
		$data = $this->db->get('alamat_kirim')->result();
		
		$out=array();
		foreach ($data as $v)
		{	
			$out['biaya_angkut'][$v->id_alamat_kirim] 		= $v->biaya_angkut;
			$out['uang_bantuan_site'][$v->id_alamat_kirim] 	= $v->bantuan_site_lokasi;
			$out['uang_langsir'][$v->id_alamat_kirim] 		= $v->langsir_site_lokasi;
			$out['uang_kapal'][$v->id_alamat_kirim] 		= $v->kapal_site_lokasi;
		}
		return $out;
	}
	
	function get_pbbkb($id)
	{
	return $this->db->where('id_penjualan',$id)->join('pelanggan','fk_id_pelanggan=id_pelanggan')->get('penjualan')->row()->pbbkb;
		
	}
	
	function get_pembayaran($id)
	{
		$this->db->where('fk_id_penjualan',$id);
		$this->db->join('penjualan','fk_id_penjualan=id_penjualan');
		return $this->db->get('pembayaran')->row();
	}

}


