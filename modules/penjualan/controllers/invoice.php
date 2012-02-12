<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


class Invoice extends CMS_Controller {
	/**
	* Contructor function
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
		$data = $this->penjualan_model->retrieve_by_pkey($id);
		//echo $this->db->last_query();
	
    	$this->view('manage_invoice',$data,'penjualan_invoice');
		
	
	}
	
	function cetak($id=0)
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
    	$this->load->helper('currency');
    	$this->load->helper('string');
    	$this->load->helper('inflector');
    	$this->load->model('penjualan_model');$this->load->model('keuangan_model');
    	$this->penjualan_model->update_keuangan($id);
    	$this->keuangan_model->insert_jurnal_penjualan($id);
    	$data=$this->penjualan_model->get_invoice_item($id);
    	$data['pbbkb'] = $this->penjualan_model->get_pbbkb($id);
  
    	$this->load->view('cetak/invoice2',$data);
    }
	

}
