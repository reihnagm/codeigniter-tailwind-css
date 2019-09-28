<?php

function components($view, $data = [])
{
    require_once APPPATH.'views/'.$view.'.php';
}

// DEBUGGING ERROR
function dd($data)
{
    echo '<pre>';
    die(var_dump($data));
}


function get_menus_admin()
{
    $CI =& get_instance();
    $CI->load->database();

    $Ci->db->distinct();
    $CI->db->select("a.name parent_name, a.icon");
    $CI->db->from("tbl_app_admin_menu_group a");
    $menus_parent = $CI->db->get()->result();

    $temp = '';
    $index_parent = 0;

    foreach ($menus_parent as $menu_parent):
        $index_parent++;
        $temp .=    '<div class="block">
                        <a id="btn-admin-dropdown-'.$index_parent.'" href="javascript:void(0)" class="px-2 -mx-2 py-1 inline-block hover:text-pink-300 font-medium text-white">
                            <i class="'.$menu_parent->icon.' w-8"></i> '.ucfirst($menu_parent->parent_name).'
                            <i class="ml-5 fas fa-chevron-right"></i>
                        </a>
                    </div>';

        // $CI->db->select("b.name child_name");
        // $CI->db->from("tbl_app_admin_menu b");
        // $menus_child = $CI->db->get()->result();
        //
        // $index_child = 0;
        // foreach ($menus_child as $menu_parent):
        //     $index_child++;
        //     $temp .= '<div>test</div>';
        // endforeach;


    endforeach;

    return $temp;
}
