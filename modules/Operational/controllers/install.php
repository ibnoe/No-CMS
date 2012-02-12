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
  

        $this->remove_navigation("Operational_tracker");
        $this->remove_navigation("Operational_balap");
        $this->remove_navigation("Operational_index");

    }
    
    private function build_all(){
    
        $this->add_navigation("Operational_index", "Operational", "Operational/index", 4);
        $this->add_navigation("Operational_balap", "Data Balap", "Operational/balap", 4, "Operational_index");
        $this->add_navigation("Operational_tracker", "Data tracker", "Operational/tracker", 4, "Operational_index");

    }
}

?>
