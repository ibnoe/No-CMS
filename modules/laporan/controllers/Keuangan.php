<?php

/**
 * Description of Keuangan
 *
 * @author theModuleGenerator
 */
class Keuangan extends CMS_Controller {
    public function index($article_id=NULL){
        $this->view('Keuangan/Keuangan_index', NULL, 'Keuangan_index');
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

    public function bank(){        $crud = new grocery_CRUD();        $crud->set_table("bank");        $output = $crud->render();        $this->view("grocery_CRUD", $output, "Keuangan_bank");    }

    public function jurnal(){        $crud = new grocery_CRUD();        $crud->set_table("jurnal");        $output = $crud->render();        $this->view("grocery_CRUD", $output, "Keuangan_jurnal");    }

    public function kelompok_akun(){        $crud = new grocery_CRUD();        $crud->set_table("kelompok_akun");        $output = $crud->render();        $this->view("grocery_CRUD", $output, "Keuangan_kelompok_akun");    }


    
}

?>
