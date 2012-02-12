<?php

/**
 * Description of install
 *
 * @author gofrendi
 */
class Install extends CMS_Module_Installer{
    //this should be what happen when user install this module
    protected function do_install(){
        $this->remove_all();
        $this->build_all();
        redirect('master/index');
    }
    //this should be what happen when user uninstall this module
    protected function do_uninstall(){
       
        redirect('main');
    }
    
    private function remove_all(){
        //$this->remove_navigation("ai_nnga_monitor"); 
        $this->remove_navigation("master_index");
        $this->remove_navigation("master_pelanggan_index");
    }
    
    private function build_all(){

        $this->add_navigation("master_index","Master Data", "master", 3);
        $this->add_navigation("master_pelanggan_index","Data Pelanggan", "master/pelanggan/index", 3, "master_index");
    }
}

?>
