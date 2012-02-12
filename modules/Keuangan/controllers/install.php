<?php
/**
 * Description of install
 *
 * @author theModuleGenerator
 */
class Install extends CMS_Module_Installer {
    protected $DEPENDENCIES = array();

    //this should be what happen when user install this module
    protected function do_install(){
        $this->remove_all();
        $this->build_all();
    }
    //this should be what happen when user uninstall this module
    protected function do_uninstall(){
        $this->remove_all();
    }
    
    private function remove_all(){
      
        $this->remove_navigation("Keuangan_kelompok_akun");
        $this->remove_navigation("Keuangan_jurnal");
        $this->remove_navigation("Keuangan_bank");
        $this->remove_navigation("Keuangan_akun");
        $this->remove_navigation("Keuangan_index");

    }
    
    private function build_all(){
                $this->add_navigation("Keuangan_index", "Keuangan", "Keuangan/index", 4);
        $this->add_navigation("Keuangan_akun", "Data akun", "Keuangan/akun", 4, "Keuangan_index");
        $this->add_navigation("Keuangan_bank", "Data bank", "Keuangan/bank", 4, "Keuangan_index");
        $this->add_navigation("Keuangan_jurnal", "Data jurnal", "Keuangan/jurnal", 4, "Keuangan_index");
        $this->add_navigation("Keuangan_kelompok_akun", "Data kelompok_akun", "Keuangan/kelompok_akun", 4, "Keuangan_index");

    }
}

