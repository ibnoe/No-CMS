<?php

/**
 * Description of artificial_intelligence
 *
 * @author gofrendi
 */
class delivery_order extends CMS_Controller{

	function index($id=0)
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
        $crud->unset_edit();
        //$crud->set_theme('datatables');
        $crud->set_relation('fk_id_mobil','mobil','{kode_mobil} - {no_kendaraan}');
		$crud->set_relation('fk_id_supir','supir','{kode_supir} - {nama}');

      	$crud->where('fk_id_penjualan',$id);
 		$crud->add_action('Edit', base_url().'assets/bbm/ico/edit.png', 'administrator/photos','ui-icon-image',array($this,'do_manage_menu_callback'));
    	$crud->add_action('Uang Jalan |', 'xx', 'administrator/photos','ui-icon-image',array($this,'do_uj_menu_callback'));
    	$crud->add_action('Cetak DO |', 'xx', 'administrator/photos','ui-icon-image popup',array($this,'do_cetak_menu_callback'));
    	$crud->add_action('Cetak Kwitansi |', 'xx', 'administrator/photos','ui-icon-image popup',array($this,'do_cetak_menu2_callback'));
    	$crud->callback_before_insert(array($this,'add_do_callback'));
 		$crud->callback_column('id_do',array($this,'id_do_collumn_callback'));
        $data['crud'] = $crud->render();
		$data['crud']->judul = 'Data penjualan';

		$this->view('manage_do', $data,'penjualan_delivery_order');
	
	}
	
	function do_manage_menu_callback($primary_key , $row)
	{
   		 return site_url('penjualan/delivery_order/edit/'.(int)$row->id_do);
	}
	
	function do_cetak_menu_callback($primary_key , $row)
	{
   		 return site_url('penjualan/delivery_order/cetak/'.(int)$row->id_do);
	}
	function do_cetak_menu2_callback($primary_key , $row)
	{
   		 return site_url('penjualan/delivery_order/cetak_kwitansi/'.(int)$row->id_do);
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

    //put your code here
    function add()
    {
    	$data=array();
    	if (isset($_POST['item']))
    	{
    		$do = $_POST['do'];
    		$harga_dasar =array(); $tot=0;
    		$do['dibuat_oleh'] = $this->session->userdata('cms_username');
	    	$do['dibuat_tanggal'] = date('Y-m-d h:i:s');
			  foreach($_POST['item'] as $item)
		    			if ($item['fk_id_item']!=0)
		    			{
		    				$tot += $item['jumlah'];
		    			}
		    		
    		$do['fk_id_penjualan'] = $this->session->userdata('id_penjualan');	

			$do['total_liter'] = $tot;	

    		$this->db->insert('delivery_order',$do);
    		$id_do = $this->db->insert_id();
    		foreach($_POST['item'] as $item)
    		{
    			if ($item['fk_id_item']!=0)
    			{
    				if (!isset($harga_dasar[$item['fk_id_item']]))
    				{
    					$harga_dasar[$item['fk_id_item']] = $this->db->where('id_item',$item['fk_id_item'])->get('item')->row()->harga;
    				}
    			    $item['dibuat_oleh'] = $this->session->userdata('cms_username');
	    			$item['dibuat_tanggal'] = date('Y-m-d h:i:s');
	  				//ambil harga dasar
	  				$item['harga_bbm']=$harga_dasar[$item['fk_id_item']] ;
    				$item['fk_id_do'] = $id_do;
    				$this->db->insert('delivery_order_item',$item);
    				$data['message'] = "<div class='message'>Data Sukses dimasukkan, silakan <a href='".site_url('penjualan/delivery_order')."'>klik disini untuk kembali</a></div>";
    			}
    		}		
    	}
    	//data penjualan
    	$this->load->model('penjualan_model');
    	$data['opt_item']  = $this->penjualan_model->get_item();
    	$data['opt_mobil'] = $this->penjualan_model->get_mobil();
    	$data['opt_supir'] = $this->penjualan_model->get_supir();
    	$data['opt_supir'] = $this->penjualan_model->get_supir();
    	$data['js_harga_bbm'] = json_encode($this->penjualan_model->get_harga_item());
    	$data['js_harga_angkut'] = ($this->penjualan_model->get_harga_angkut($this->session->userdata('id_penjualan')));
    	
    	$data['opt_alamat_kirim'] =$this->penjualan_model->get_alamat_kirim($this->session->userdata('id_penjualan'));
    	$this->view('form_do', $data,'penjualan_delivery_order');
    }
    
    function edit($id)
    {
    
    	//data penjualan
    	$this->load->model('penjualan_model');
    	$data=$this->penjualan_model->get_do($id);
    	$data['opt_item'] =$this->penjualan_model->get_item();
    	$data['opt_mobil'] =$this->penjualan_model->get_mobil();
    	$data['opt_supir'] =$this->penjualan_model->get_supir();
    	$data['opt_alamat_kirim'] =$this->penjualan_model->get_alamat_kirim($this->session->userdata('id_penjualan'));
    	$this->view('form_edit_do', $data,'penjualan_delivery_order');
    
    }
    
    function do_edit()
    {
    	$id_do = $_POST['do']['id_do'];
    	$total=0;
    	foreach($_POST['item'] as $item)
    	{
    		if ($item['fk_id_item']!=0)
    		{
    			if ($item['id_do_item']>0)
    			{
    				$this->db->where('id_do_item',$item['id_do_item']);
    				$this->db->update('delivery_order_item',$item);
    				
    			}
    			else
    			{
    			
    			    $item['dibuat_oleh'] = $this->session->userdata('cms_username');
	    			$item['dibuat_tanggal'] = date('Y-m-d h:i:s');
	  
    				$item['fk_id_do'] = $id_do;
    				$this->db->insert('delivery_order_item',$item);
    				
    			}
    			$total += $item['jumlah'];
    		}
    	}
    	
    	//update do		
    	$this->db->where('id_do',$id_do);
    	$do = $_POST['do'];
    	$do['total_liter'] = $total;
    	$this->db->update('delivery_order',$do);
    	
    	redirect('penjualan/delivery_order');
    	
    }
    
    function cetak($id)
    {
    	$this->load->model('penjualan_model');
    	
    	$data=$this->penjualan_model->get_do($id);
   
    	$this->load->view('cetak/delivery_order',$data);
    }

    function cetak_kwitansi($id)
    {
    	$this->load->model('penjualan_model');
    	$this->load->helper('currency');
    	$data=$this->penjualan_model->get_do($id);
   
    	$this->load->view('cetak/do_kwitansi',$data);
    }


}

