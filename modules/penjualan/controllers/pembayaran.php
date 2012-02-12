<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


class Pembayaran extends CMS_Controller {
	
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
		//set harga
		$data=array();
		$this->load->model('penjualan_model');	
		$data = $this->penjualan_model->get_pembayaran($id);
		//echo $this->db->last_query();
	
    	$this->view('form_pembayaran',$data);
		
	
	}
	
	function save()
	{
		if (@$_POST['id_pembayaran']>0)
		{
			//update
		}
		else
		{
			//insert
			$this->db->insert('pembayaran',$data);
		}
	}
	

}
