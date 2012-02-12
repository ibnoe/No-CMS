<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


class Uj extends CMS_Controller {
	
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

	function index($id) {
		if ($id==0)
		{
			if (($this->session->userdata('uj_id_do')))
			{
				$id = $this->session->userdata('uj_id_do');		
			}
			else
			{
				$this->session->set_flashdata('error', 'Silakan pilih penjualan terlebih dahulu');
				redirect('penjualan');			
			}
		}
		else
		{
			$this->session->set_userdata('uj_id_do',$id);
		}
		
		$id_penjualan = $this->session->userdata('id_penjualan');		

				
		$this->load->model('penjualan_model');	
		$data = $this->penjualan_model->retrieve_by_pkey($id_penjualan);
				$crud = new grocery_CRUD();

        $crud->set_table('uang_jalan');
        $crud->set_subject('uang jalan');
        
        $crud->columns('id_uang_jalan','tanggal_uj','total_uang_jalan','diberikan_oleh','diterima_oleh');
        $crud->edit_fields('tanggal_uj', 'uang_depot', 'uang_jarak', 'uang_makan', 
        					'uang_polisi', 'uang_bongkar', 'uang_selang', 'uang_lembur', 'uang_jembatan',  'diberikan_oleh','diterima_oleh');
        $crud->add_fields('tanggal_uj', 'uang_depot', 'uang_jarak', 'uang_makan', 
        					'uang_polisi', 'uang_bongkar', 'uang_selang', 'uang_lembur', 'uang_jembatan' ,'diberikan_oleh','diterima_oleh');
        
        $field = array('uang_depot', 'uang_jarak', 'uang_makan', 
        					'uang_polisi', 'uang_bongkar', 'uang_selang', 'uang_lembur', 'uang_jembatan',  'diberikan_oleh','diterima_oleh');
        
        
        $crud->display_as('tanggal_uj','Tanggal UJ')
                 ->display_as('total_uang_jalan','Total UJ')
                
                 ;
       $this->load->helper('inflector');          
        foreach($field as $v)
        {
        	$crud->display_as($v,humanize($v)); 
        }	
      //	$crud->set_relation9
        $crud->redirect= site_url('penjualan/item');
        //$crud->unset_delete();
        //$crud->set_theme('datatables');
       // $crud->set_relation('fk_id_do','delivery_order','{kode_pelanggan} - {nama_perusahaan}');

      //	$crud->order_by('id_penjualan','desc');
        $crud->where('fk_id_do',$id);
 		$crud->add_action('Cetak', 'xx', 'penjualan/uj/cetak','ui-icon-plus');
 	 	$crud->callback_before_insert(array($this,'add_callback'));
 		$crud->callback_before_update(array($this,'add_callback'));
 
        $data['crud']= $crud->render();
		$data['crud']->judul = 'Data penjualan';
     	
	

       $this->view("manage_uj", $data,'penjualan_delivery_order');
       

	}



	function add_callback($post_array)
	{
	    $field_biaya = array('uang_depot', 'uang_jarak', 'uang_makan', 
        					'uang_polisi', 'uang_bongkar', 'uang_selang', 'uang_lembur', 'uang_jembatan');
        foreach ($field_biaya as $v)
       		$post_array['total_uang_jalan'] = $post_array['total_uang_jalan']+$post_array[$v];
	    $post_array['dibuat_oleh'] 		= $this->session->userdata('cms_username');
	    $post_array['fk_id_do'] 			= $this->session->userdata('uj_id_do');
	    $post_array['dibuat_tanggal'] 	= date('Y-m-d h:i:s');
		return $post_array;
	}    
		
	function cetak($id)
    {
    	$this->load->helper('currency');
    	$this->load->helper('string');
    	$this->load->helper('inflector');
    	$this->load->model('penjualan_model');
    	$data=$this->penjualan_model->get_uj($id);
   // 	var_dump($data);
    	$this->load->view('cetak/uang_jalan',$data);
    }
	

}
