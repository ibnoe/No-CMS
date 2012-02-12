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
      

        $this->remove_navigation("laporan_xl");
        $this->remove_navigation("laporan");

    }
    
    private function build_all(){
        $this->add_navigation("laporan", "Laporan", "laporan/index", 4);
        $this->add_navigation("laporan_xl", "Laporan XL", "laporan/xl", 4, "laporan");
       
    }
}

