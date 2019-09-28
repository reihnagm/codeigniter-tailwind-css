<?php

function components($view, $data = [])
{
    require_once APPPATH.'views/'.$view.'.php';
}

function dd($data)
{
    echo '<pre>';
    die(var_dump($data));
}


function get_menus_admin()
{
    $CI =& get_instance();
    $CI->load->database();

    $CI->db->select("a.name parent_name, a.icon");
    $CI->db->from("tbl_app_admin_menu_group a");
    $CI->db->free_result();
    $menus = $CI->db->get()->result();

    $temp = '';
    $index_parent = 0;

    foreach ($menus as $menu):
        $index_parent++;
        $temp .=    '<div class="block">
                        <a id="btn-admin-dropdown-'.$index_parent.'" href="javascript:void(0)" class="px-2 -mx-2 py-1 inline-block hover:text-pink-300 font-medium text-white">
                            <i class="'.$menu->icon.' w-8"></i> '.ucfirst($menu->parent_name).'
                            <i class="ml-5 fas fa-chevron-right"></i>
                        </a>
                    </div>';
    endforeach;

    return $temp;
}



// function get_menus_admin()
// {
//     $template = "";
//
//     foreach ($variable as $value)
//     {
//         $template .= ''
//     }
//
//     return $template;
// }
