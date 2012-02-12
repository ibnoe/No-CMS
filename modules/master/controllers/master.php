<?php

/**
 * Description of artificial_intelligence
 *
 * @author gofrendi
 */
class Master extends CMS_Controller{
    //put your code here
    public function index()
    {
       $this->view("master_index", null, "master_index");
    }
    public function pelanggan(){
        $crud = new grocery_CRUD();

        $crud->set_table('pelanggan');
        $crud->set_subject('Data Pelanggan');
        $crud->required_fields('kode_pelanggan');
        $crud->required_fields('nama_pelanggan');
        $crud->required_fields('alamat');
        $crud->required_fields('npwp');
        
        $crud->columns('kode_pelanggan','nama_perusahaan','telp', 'npwp','nama_contact','telp_contact','no_sh','pbbkb');
        $crud->edit_fields('kode_pelanggan','nama_perusahaan','alamat_perusahaan','telp', 'npwp','nama_contact','telp_contact','no_sh','pbbkb');
        $crud->add_fields('kode_pelanggan','nama_perusahaan','alamat_perusahaan','telp', 'npwp','nama_contact','telp_contact','no_sh','pbbkb');
      //  $crud->change_field_type('active', 'true_false');
        
        $crud->display_as('kode_pelanggan','Kode')
                 ->display_as('nama_perusahaan','Nama Perusahaan')
                 ->display_as('alamat_perusahaan','Alamat')
                 ->display_as('telp','Telepon')
                 ->display_as('npwp','NPWP')
                 ->display_as('no_sh','NO SH')
                 ->display_as('pbbkb','PBBKB')
                 ->display_as('nama_contact','Nama Kontak')
                 ->display_as('telp_contact','Telp Kontak');
        
      
        $crud->redirect= site_url('master/index');
        $crud->unset_delete();
        //$crud->set_theme('datatables');
        $crud->add_action('Manage Alamat Kirim', 'xx', 'master/alamat_kirim','ui-icon-plus');
 	 
      

        $output = $crud->render();
		$output->judul = 'Data pelanggan';
      //  $this->view('grocery_CRUD', $output, 'main_user_management');
       $this->view("master_CRUD", $output, "master_pelanggan_index");
    }
    
    public function mobil()
    {
    
      	$crud = new grocery_CRUD();

        $crud->set_table('mobil');
        $crud->set_subject('Data mobil');
        $crud->required_fields('kode_mobil');
        $crud->required_fields('no_kendaraan');
        
        $crud->columns('kode_mobil','no_kendaraan','tahun', 'kapasitas','status');
        $crud->edit_fields('kode_mobil','no_kendaraan','tahun', 'kapasitas','status');
        $crud->add_fields('kode_mobil','no_kendaraan','tahun', 'kapasitas','status');
        $crud->change_field_type('status', 'true_false');
        
        $crud->display_as('kode_mobil','Kode')
                 ->display_as('no_kendaraan','No Kendaraan')
                 ->display_as('tahun','Tahun')
                 ->display_as('kapasitas','Kapasitas')
                 ->display_as('status','Status')
                 ;
      
        $crud->redirect= site_url('master/supir');
        $crud->unset_delete();
        //$crud->set_theme('datatables');
        
      

        $output = $crud->render();
		$output->judul = 'Data Mobil';
      //  $this->view('grocery_CRUD', $output, 'main_user_management');
       $this->view("master_CRUD", $output, "master_mobil_index");

    }
    
    public function bank()
    {
    
      	$crud = new grocery_CRUD();

        $crud->set_table('bank');
        $crud->set_subject('Data Rekening Bank');
        $crud->required_fields('nama_bank');
        $crud->required_fields('no_rekening');
        $crud->required_fields('nama_rekening');
        
        $crud->columns('nama_bank','no_rekening','nama_rekening');
        $crud->edit_fields('nama_bank','no_rekening','nama_rekening');
        $crud->add_fields('nama_bank','no_rekening','nama_rekening');
   
        
        $crud->display_as('nama_bank','Nama Bank')
                 ->display_as('no_rekening','No Rekening')
                 ->display_as('nama_rekening','Nama Rekening')

                 ;
      
        $crud->unset_delete();
        //$crud->set_theme('datatables');
        
      

        $output = $crud->render();
		$output->judul = 'Data Rekening Bank';
      //  $this->view('grocery_CRUD', $output, 'main_user_management');
       $this->view("master_CRUD", $output, "master_bank_index");

    }
    
    public function supir()
    {
    
      	$crud = new grocery_CRUD();

        $crud->set_table('supir');
        $crud->set_subject('Data Supir');
        $crud->required_fields('kode_supir');
        $crud->required_fields('nama');
        
        $crud->columns('kode_supir','nama','alamat', 'telp','status');
        $crud->edit_fields('kode_supir','nama','alamat', 'telp','status');
        $crud->add_fields('kode_supir','nama','alamat', 'telp','status');
        $crud->change_field_type('status', 'true_false');
        
        $crud->display_as('kode_supir','Kode')
                 ->display_as('nama','Nama Supir')
                 ->display_as('alamat','Alamat')
                 ->display_as('telp','Telepon')
                 ->display_as('status','Status')
                 ;
      
        $crud->redirect= site_url('master/supir');
        $crud->unset_delete();
        //$crud->set_theme('datatables');
        
      

        $output = $crud->render();
		$output->judul = 'Data Supir';
      //  $this->view('grocery_CRUD', $output, 'main_user_management');
       $this->view("master_CRUD", $output, "master_supir_index");

    
    }
    
    public function jenis_biaya(){
    	
      	$crud = new grocery_CRUD();

        $crud->set_table('jenis_biaya');
        $crud->set_subject('Data Jenis Biaya');
        $crud->required_fields('kode_jenis_biaya');
        $crud->required_fields('nama_jenis_biaya');
        
        $crud->columns('kode_jenis_biaya','nama_jenis_biaya','urutan');
        $crud->edit_fields('kode_jenis_biaya','nama_jenis_biaya','urutan');
        $crud->add_fields('kode_jenis_biaya','nama_jenis_biaya','urutan');
        
        $crud->display_as('kode_jenis_biaya','Kode')
                 ->display_as('nama_jenis_biaya','Nama Biaya')
                 ->display_as('urutan','Urutan')
                
                 ;
      
        $crud->redirect= site_url('master/supir');
        $crud->unset_delete();
        //$crud->set_theme('datatables');
        
      

        $output = $crud->render();
		$output->judul = 'Data Jenis Biaya';
      //  $this->view('grocery_CRUD', $output, 'main_user_management');
       $this->view("master_CRUD", $output, "master_biaya_index");

    
    }
    
    public function item(){
    	$crud = new grocery_CRUD();

        $crud->set_table('item');
        $crud->set_subject('Data Item');
        $crud->required_fields('nama_item');
        $crud->required_fields('harga');
        
        $crud->columns('nama_item','harga','satuan');
        $crud->edit_fields('nama_item','harga','satuan');
        $crud->add_fields('nama_item','harga','satuan');
        
        $crud->display_as('nama_item','Nama Item')
                 ->display_as('harga','Harga')
                 ->display_as('satuan','Satuan')
                
                 ;
      
        $crud->redirect= site_url('master/item');
        $crud->unset_delete();
        //$crud->set_theme('datatables');
        
      

        $output = $crud->render();
		$output->judul = 'Data Item';
      //  $this->view('grocery_CRUD', $output, 'main_user_management');
       $this->view("master_CRUD", $output, "master_item_index");

    }
    
    function alamat_kirim($id=0){
    	if ($id==0)
		{
			if (($this->session->userdata('id_client')))
			{
				$id = $this->session->userdata('id_client');		
			}
			else
			{
				$this->session->set_flashdata('error', 'Silakan pilih client terlebih dahulu');
				redirect('penjualan');			
			}
		}
		else
		{
			$this->session->set_userdata('id_client',$id);
			redirect('master/alamat_kirim');
		}
		
	
		$crud = new grocery_CRUD();

        $crud->set_table('alamat_kirim');
        $crud->set_subject('Alamat Pengiriman');
        
        $crud->columns('kode_lokasi', 'lokasi_kirim', 'alamat_kirim', 'biaya_angkut',  'bantuan_site_lokasi', 'langsir_site_lokasi', 'kapal_site_lokasi');
        $crud->edit_fields('kode_lokasi', 'lokasi_kirim', 'alamat_kirim',
        'biaya_angkut', 'pic_lokasi', 'no_telp_pic_lokasi', 'bantuan_site_lokasi', 'langsir_site_lokasi', 'kapal_site_lokasi');
        $crud->add_fields('kode_lokasi', 'lokasi_kirim', 'alamat_kirim',
        'biaya_angkut', 'pic_lokasi', 'no_telp_pic_lokasi', 'bantuan_site_lokasi', 'langsir_site_lokasi', 'kapal_site_lokasi');
        
        
      //  $crud->callback_add_field('status',array($this,'add_status_callback'));
    //	$crud->callback_edit_field('status',array($this,'add_status_callback'));
    
        $crud->display_as('kode_lokasi','Kode Lokasi')
                 ->display_as('lokasi_kirim','Lokasi Pengiriman')
                 ->display_as('alamat_kirim','Alamat Kirim')
                 ->display_as('biaya_angkut','Biaya Angkut')
                 ->display_as('pic_lokasi','Nama PIC')
                 ->display_as('no_telp_pic_lokasi','Telp PIC')
                 ->display_as('bantuan_site_lokasi','Bantuan Site')
                 ->display_as('langsir_site_lokasi','Langsir Site')
                 ->display_as('kapal_site_lokasi','Kapal Site')
                 ;
   
		$crud->callback_before_insert(array($this,'add_do_callback'));
 		
      	$crud->where('id_pelanggan',$id);
 		$output = $crud->render();

		$output->judul = 'Data Item';
		$this->view('master_CRUD', $output, "master_pelanggan_index");
    }
    function add_do_callback($post_array)
	{
	   
	    $post_array['id_pelanggan'] = $this->session->userdata('id_client');	
//var_dump($post_array);
	    return $post_array;
	}   
}


