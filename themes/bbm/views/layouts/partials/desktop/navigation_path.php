<?php
    function build_menu_path($path){
        $str = '<ul id="breadcrumb" class="grad_colour">';
        for($i=0; $i<count($path); $i++){
            $current_path = $path[$i];
            $str .= "<li>".anchor($current_path['url'], $current_path['title'])."</li>";
            
        }
        $str .= " </ul>";
        return $str;
    }
    echo build_menu_path($navigation_path);
?>
