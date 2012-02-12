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
        redirect('penjualan/index');
    }
    //this should be what happen when user uninstall this module
    protected function do_uninstall(){
        $this->remove_all();
        redirect('main');
    }
    
    private function remove_all(){
      //  $this->db->query("DROP TABLE IF EXISTS `ai_session`;");
         
        $this->remove_navigation("penjualan_do"); 
       // $this->remove_navigation("ai_nnga_set");
       // $this->remove_navigation("ai_nnga_index");
        $this->remove_navigation("penjualan_index");
    }
    
    private function build_all(){
        $this->add_navigation("penjualan_index","Penjualan", "penjualan", 3);
        $this->add_navigation("penjualan_do","Delivery Order", "penjualan/do", 3, "penjualan_index");
      //  $this->add_navigation("ai_nnga_monitor","Monitor", "artificial_intelligence/nnga/monitor", 3, "po_index");
      //  $this->add_navigation("ai_nnga_set","Set Parameters", "artificial_intelligence/nnga/set", 3, "po_index");
    }
}


