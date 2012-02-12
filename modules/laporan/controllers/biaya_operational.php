<?php

/**
 * Description of Keuangan
 *
 * @author theModuleGenerator
 */
class Biaya_operational extends CMS_Controller {
    public function index($article_id=NULL){
        $this->view('biaya_angkut_index', NULL, 'laporan_biaya_operational');
    } 

    public function akun2(){        
    	$crud = new grocery_CRUD();        
    	$crud->set_table("akun");   
    	$crud->set_relation('kelompok_akun_id','kelompok_akun','nama');
    	
    	$crud->columns('nama','kode','kelompok_akun_id','pajak','keterangan');
        $crud->edit_fields('nama','kode','kelompok_akun_id','pajak','keterangan');
        $crud->add_fields('nama','kode','kelompok_akun_id','pajak','keterangan');
     	$crud->order_by('kelompok_akun_id','desc');
        $crud->display_as('nama','Nama Akun')
                 ->display_as('kode','Kode Akun')
                 ->display_as('kelompok_akun_id','Kelompok Akun')
                 ->display_as('keterangan','keterangan')
                 ->display_as('pajak','Pajak');
    	$output = $crud->render();        
    	$this->view("grocery_CRUD", $output, "Keuangan_akun");    
    }
    
}


