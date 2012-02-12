<?php
    function build_menu($navigation_array, $path, $invisible = FALSE,$is_child=FALSE){
        if(count($navigation_array)==0) return '';//just exit and do nothing
        
        //check if there is navigation_array that match with array
        $class_invisible = $invisible? "invisible" : "";
        foreach($navigation_array as $navigation) {
            if($class_invisible == "") break;
            foreach($path as $current_path){
                if($navigation['navigation_name']==$current_path['navigation_name']){
                    $class_invisible = "";
                    break;
                }
            }
        }
        $last_path = count($path)>0?$path[count($path)-1]['navigation_name']:"";        
        
        $str = '';
        if (!$is_child)
        	$str.= '<ul id="accordion" class="layout_nav '.$class_invisible.'">';
        else
        	$str.= '<ul class="drawer">';
        
        foreach($navigation_array as $navigation){
            $layout_nav_hot = ($last_path == $navigation['navigation_name'])?'layout_nav_hot':'';
            
            $str.= '<li class ="'.$layout_nav_hot.'">';
             $pageLinkClass = 'layout_page_link';
            if(count($navigation['child'])>0){
                $in_path = false;
                if($last_path != $navigation['navigation_name']){
                    foreach($path as $current_path){
                        if($current_path['navigation_name']==$navigation['navigation_name']){
                            $in_path = true;
                            break;
                        }
                    }
                }
            
                if($in_path){
                    $navigation['title'] = '[-]'.$navigation['title'];
                    $pageLinkClass .= " selected";
                }else{
                    $navigation['title'] = '[+] '.$navigation['title'];
                }               
            }
            
           
            if(count($navigation['child'])>0){
                $pageLinkClass .= ' top_level';
            }else{
                $pageLinkClass .= ' layout_no_child';
            }            
            if($navigation['is_static']){
                $str.= anchor(base_url().'index.php/main/show_static_page/'.$navigation['navigation_id'], $navigation['title'], array('class'=>$pageLinkClass));
            }else{
                $str.= anchor($navigation['url'], $navigation['title'], array('class'=>$pageLinkClass));
            }
         /*   $str.= '<div class="layout_clear"></div>';
            if(isset($navigation['description'])){
                $str.= '<div class="layout_nav_description invisible">Description : '.
                        $navigation['description'].'</div>';
            }
            */
            $str.= build_menu($navigation['child'], $path, TRUE,1);
            $str.= '</li>';
        }
        $str.= '</ul>';
        
        return $str;
    }
    echo build_menu($navigations, $navigation_path);
?>
