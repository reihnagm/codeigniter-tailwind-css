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

    $CI->db->distinct();
    $CI->db->select("a.name parent_name, a.icon parent_icon, a.id parent_id");
    $CI->db->from("tbl_app_admin_menu_group a");
    $CI->db->join("tbl_app_admin_menu b",
    "a.id = b.admin_menu_group_id","inner");
    $CI->db->order_by("a.id");
    $menus_parent = $CI->db->get()->result();

    $temp = '';
    $index_parent = 0;

    foreach ($menus_parent as $menu_parent):
        $index_parent++;
        $temp .=    '<div class="block">
                        <a id="btn-admin-dropdown-'.$index_parent.'" href="javascript:void(0)" class="px-2 -mx-2 py-1 inline-block hover:text-pink-300 font-medium text-white">
                            <i class="'.$menu_parent->parent_icon.' w-8"></i> '.ucfirst($menu_parent->parent_name).'
                            <i class="ml-5 fas fa-chevron-right"></i>
                        </a>
                    </div>';

        $CI->db->select("a.name child_name, a.href child_href");
        $CI->db->from("tbl_app_admin_menu a");
        $CI->db->join("tbl_app_admin_menu_group b", "a.admin_menu_group_id = b.id", "inner");
        $CI->db->where("a.admin_menu_group_id", $menu_parent->parent_id);
        $CI->db->order_by("a.admin_menu_group_id desc");
        $menus_child = $CI->db->get()->result();

        foreach ($menus_child as $menu_child):
            $temp .=    '<div class="block">
                            <a href="'.$menu_child->child_href.'" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-1 py-1 mx-4">
                                <i class="fas fa-sticky-note w-5"></i> '.$menu_child->child_name.'
                            </a>
                        </div>';
        endforeach;

    endforeach;

    return $temp;
}
