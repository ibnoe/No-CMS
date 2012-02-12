<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


class Faktur_pajak extends CMS_Controller {
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
    	$this->load->helper('currency');
    	$this->load->helper('string');
    	$this->load->helper('inflector');
    	$this->load->model('penjualan_model');
    	$data=$this->penjualan_model->get_invoice_item($id);
    	$this->penjualan_model->update_keuangan($id);
    	//var_dump($data);
    	$this->load->view('cetak/faktur',$data);
    }
	

}
