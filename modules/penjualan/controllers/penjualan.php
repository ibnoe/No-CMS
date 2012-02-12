<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


class penjualan extends CMS_Controller {
	
	/**
	* Contructor function
	*
	* Load the instance of CI by invoking the parent constructor
	*
	* @access		public
	* @return		none
	*/
	function __construct() {
		parent::__construct();
	}

	/**
	* "Index" Page
	*
	* Default class action
	*
	* @access		public
	* @return		none
	*/

	function index() {
		$crud = new grocery_CRUD();

        $crud->set_table('penjualan');
        $crud->set_subject('Penjualan');
        
        $crud->columns('fk_id_pelanggan','dibuat_oleh','tanggal_penjualan','tanggal_invoice','keterangan','status');
        $crud->edit_fields('fk_id_pelanggan','tanggal_penjualan','tanggal_invoice','tanggal_jatuh_tempo','keterangan','status');
        $crud->add_fields('fk_id_pelanggan','tanggal_penjualan','tanggal_invoice','tanggal_jatuh_tempo','keterangan','status');
        
        
        $crud->callback_add_field('status',array($this,'add_status_callback'));
    	$crud->callback_edit_field('status',array($this,'add_status_callback'));
    
        $crud->display_as('fk_id_pelanggan','Nama Pelanggan')
                 ->display_as('tanggal_penjualan','Tanggal Pesan')
                 ->display_as('tanggal_invoice','Tanggal Invoice')
                 ->display_as('keterangan','keterangan')
                 ->display_as('dibuat_oleh','Dibuat Oleh')
                 ->display_as('do_pertamina','DO Pertamina')
                
                 ;
      //	$crud->set_relation9
        $crud->redirect= site_url('penjualan/item');
        $crud->unset_delete();
        //$crud->set_theme('datatables');
        $crud->set_relation('fk_id_pelanggan','pelanggan','{kode_pelanggan} - {nama_perusahaan}');

      	$crud->order_by('id_penjualan','desc');
 		$crud->add_action('Manage', 'xx', 'penjualan/manage','ui-icon-plus');
 	 	$crud->callback_before_insert(array($this,'add_callback'));
 
        $output = $crud->render();
		$output->judul = 'Data penjualan';
     
       $this->view("manage_penjualan", $output, "penjualan_index");
       

	}

	function add_status_callback($value='')
	{
		$_opt=array('open'=>'open','cancel'=>'cancel','finish'=>'finish');
		return form_dropdown('status',$_opt,$value);
	}

	function add_callback($post_array)
	{
	   
	    $post_array['dibuat_oleh'] = $this->session->userdata('cms_username');
	    $post_array['dibuat_tanggal'] = date('Y-m-d h:i:s');
	//  var_dump($post_array);
	    return $post_array;
	}    
		
	function manage($id=0)
	{
		if ($id==0)
		{
			if (($this->session->userdata('id_penjualan')))
			{
				$id = $this->session->userdata('id_penjualan');		
			}
			else
			{
				$this->session->set_flashdata('error', 'Silakan pilih penjualan terlebih dahulu');
				redirect('penjualan');			
			}
		}
		else
		{
			$this->session->set_userdata('id_penjualan',$id);
		}
		$this->load->model('penjualan_model');	
		$data = $this->penjualan_model->retrieve_by_pkey($id);
		//echo $this->db->last_query();
		//var_dump($data);die();
		$data['header']= 'Manage Data penjualan';
		if ($data['status']!='Close'||$data['status']!='Finish'||$data['status']!='Cancel')
			$data['action']['link_refresh1'] =  anchor('penjualan/modify/close/'.$id,'Close', array('class' => 'button button-green'));
		
		if ($data['status']!='Finish'||$data['status']!='Cancel')	
		{
			$data['action']['link_refresh3'] = anchor('penjualan/modify/cancel/'.$id,'Cancel', array('class' => 'button button-red'));		
		}
		
		#data invoice
	/*
		$crud = new grocery_CRUD();

        $crud->set_table('delivery_order');
        $crud->set_subject('DO');
        
        $crud->columns('id_do','do_pertamina','tanggal_pengiriman','total_liter','fk_id_mobil','fk_id_supir','dibuat_oleh');
        $crud->edit_fields('tanggal_pengiriman','do_pertamina','fk_id_mobil','fk_id_supir');
        $crud->add_fields('tanggal_pengiriman','do_pertamina','fk_id_mobil','fk_id_supir');
        
        
      //  $crud->callback_add_field('status',array($this,'add_status_callback'));
    //	$crud->callback_edit_field('status',array($this,'add_status_callback'));
    
        $crud->display_as('id_do','No DO')
                 ->display_as('tanggal_pengiriman','Tanggal Pengiriman')
                 ->display_as('total_liter','Total Liter')
                 ->display_as('fk_id_mobil','No. Kendaraan')
                 ->display_as('fk_id_supir','Nama Supir')
                 ->display_as('dibuat_oleh','Oleh')
                
                 ;
      //	$crud->set_relation9
        $crud->redirect= site_url('penjualan/item');
        $crud->unset_delete();
        $crud->unset_add();
        //$crud->set_theme('datatables');
        $crud->set_relation('fk_id_mobil','mobil','{kode_mobil} - {no_kendaraan}');
		$crud->set_relation('fk_id_supir','supir','{kode_supir} - {nama}');

      	$crud->where('fk_id_penjualan',$id);
 		$crud->add_action('Item', 'xx', 'administrator/photos','ui-icon-image',array($this,'do_manage_menu_callback'));
    	$crud->add_action('Uang Jalan |', 'xx', 'administrator/photos','ui-icon-image',array($this,'do_uj_menu_callback'));
    	$crud->add_action('Cetak |', 'xx', 'administrator/photos','ui-icon-image popup',array($this,'do_cetak_menu_callback'));
    	$crud->callback_before_insert(array($this,'add_do_callback'));
 		$crud->callback_column('id_do',array($this,'id_do_collumn_callback'));
        $data['crud'] = $crud->render();
		$data['crud']->judul = 'Data penjualan';
*/
		$this->view('manage', $data,'penjualan_kelola');
		
	}
	function do_manage_menu_callback($primary_key , $row)
	{
   		 return site_url('penjualan/delivery_order/edit/'.(int)$row->id_do);
	}
	
	function do_cetak_menu_callback($primary_key , $row)
	{
   		 return site_url('penjualan/delivery_order/cetak/'.(int)$row->id_do);
	}
	function do_uj_menu_callback($primary_key , $row)
	{
   		 return site_url('penjualan/uj/index/'.(int)$row->id_do);
	}
	
	function id_do_collumn_callback($val)
	{
		return sprintf("%05d",$val);
	}
	function add_do_callback($post_array)
	{
	   
	    $post_array['dibuat_oleh'] = $this->session->userdata('cms_username');
	    $post_array['dibuat_tanggal'] = date('Y-m-d h:i:s');
	    $post_array['fk_id_penjualan'] = $this->session->userdata('id_penjualan');	

	    return $post_array;
	}   

	

}
