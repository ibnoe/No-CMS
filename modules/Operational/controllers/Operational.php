<?php

/**
 * Description of Operational
 *
 * @author theModuleGenerator
 */
class Operational extends CMS_Controller {
    public function index($article_id=NULL){
        $this->view('Operational/Operational_index', NULL, 'Operational_index');
    } 

    public function supir(){        $crud = new grocery_CRUD();        $crud->set_table("supir");        $output = $crud->render();        $this->view("grocery_CRUD", $output, "Operational_supir");    }

    public function tracker(){        $crud = new grocery_CRUD();        $crud->set_table("tracker");        $output = $crud->render();        $this->view("grocery_CRUD", $output, "Operational_tracker");    }


    
}

?>
