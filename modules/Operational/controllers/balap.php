<?php

/**
 * Description of Operational
 *
 * @author theModuleGenerator
 */
class Balap extends CMS_Controller {
    public function index($article_id=NULL){
    	$data =array();
    	$force_find =0;
    	$this->load->library('table');
    	if (isset($_POST['item']))
    	{
    	    		foreach ($_POST['item'] as $v)
    		{
    			$this->db->where('id_do_item',$v['id_do_item']);
    			$this->db->update('delivery_order_item',$v);
    			
    		}
    	$force_find=true;
    	}
    	
    	if (isset($_POST['find_balap_id'])|| $force_find)
    	{
    		$id_balap = (int)@$_POST['find_balap_id'];
    		if ($force_find)$id_balap =$_POST['id_do'];
    		$this->db->where('fk_id_do',$id_balap);
    		$this->db->join('alamat_kirim','fk_id_alamat_kirim=id_alamat_kirim');
    		$data['item'] =$this->db->get('delivery_order_item')->result();
    		$this->table->set_heading(array('Lokasi','G1','G1','Vol Before','Vol After','Start Request','Finish Activities'));
    		$i=0;
    		$data['id_do'] =$id_balap ;
    		foreach($data['item'] as $v)
    		{
    			$this->table->add_row(array(
    				$v->kode_lokasi." ".$v->alamat_kirim.form_hidden('item['.$i.'][id_do_item]',$v->id_do_item),
    				form_input('item['.$i.'][G1]',$v->G1),
    				form_input('item['.$i.'][G2]',$v->G2),
    				form_input('item['.$i.'][vol_before_refill]',$v->vol_before_refill),
    				form_input('item['.$i.'][vol_after_refill]',$v->vol_after_refill),
    				form_input('item['.$i.'][start_request]',$v->start_request),
    				form_input('item['.$i.'][finish_activities]',$v->finish_activities),
    		
    			)); $i++;
    		}
    	}
        $this->view('balap_index', $data, 'Operational_index');
    } 


    
}


