<?php

// COMPONENTS
function components($view, $data = [])
{
    require_once APPPATH.'views/'.$view.'.php';
}
// DEBUGGING ERROR
function dd($data = [])
{
    echo '<pre>';
    die(var_dump($data));
}
// LOAD INSTANCE DATABASE
function __db()
{
    $CI =& get_instance();
    $CI->load->database();

    return $CI;
}
function provinces()
{
    $CI = __db();
    $CI->db->from("provinces");

    $provinces =  $CI->db->get()->result();

    $temp = '<label class=" block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Provinces
            </label>
            <select id="provinces" class="block rounded appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-3">
            ';

    foreach ($provinces as $province):
        $temp .= '<option value="'.$province->id.'">'.$province->name.'</option>';
    endforeach;

    $temp .='</select>';

    return $temp;
}
function regencies($province_id)
{
    $CI = __db();
    $CI->db->from("regencies");
    $CI->db->where("province_id", $province_id);

    $regencies = $CI->db->get()->result();

    $temp = '<label class=" block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Regencies
            </label>
            <select id="provinces" class="block rounded appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-3">
            ';

    foreach ($regencies as $regencie):
        $temp .= '<option value="'.$regencie->id.'">'.$regencie->name.'</option>';
    endforeach;

    $temp .='</select>';

    echo json_encode($temp);
}
function get_menus_admin_count()
{
    $CI = __db();
    $CI->db->distinct();
    $CI->db->select("a.name parent_name, a.icon parent_icon, a.id parent_id");
    $CI->db->from("tbl_app_admin_menu_group a");
    $CI->db->join("tbl_app_admin_menu b",
    "a.id = b.admin_menu_group_id","inner");
    $CI->db->order_by("a.id");
    $count = $CI->db->count_all_results();

    return $count;
}
function get_user_datatables_count()
{
    $CI = __db();

    $CI->db->select("*");
    $CI->db->from("tbl_users");

    $count = $CI->db->count_all_results();

    return $count;
}

function get_menus_admin()
{
    $CI = __db();

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
        $temp .=
         '<div class="block">
            <a id="btn-admin-dropdown-'.$index_parent.'" href="javascript:void(0)" class="px-2 -mx-2 py-1 inline-block hover:text-pink-300 font-medium text-white">
                <i class="'.$menu_parent->parent_icon.' w-8"></i> '.ucfirst($menu_parent->parent_name).'
                <i id="chevron-right-admin-dropdown-'.$index_parent.'" class="ml-5 fas fa-chevron-right"></i>
            </a>
        </div>';

        $CI->db->select("a.name child_name, a.href child_href, a.icon child_icon");
        $CI->db->from("tbl_app_admin_menu a");
        $CI->db->join("tbl_app_admin_menu_group b", "a.admin_menu_group_id = b.id", "inner");
        $CI->db->where("a.admin_menu_group_id", $menu_parent->parent_id);
        $CI->db->order_by("a.admin_menu_group_id desc");
        $menus_child = $CI->db->get()->result();

        $temp .=
        '<div id="content-admin-dropdown-'.$index_parent.'" class="overflow-hidden max-height-0 max-height-with-transition bg-pink-600">';

        $url = base_url();

        foreach ($menus_child as $menu_child):
            $temp .=
            '<div class="block">
                <a href="'.$url.'admin/'.$menu_child->child_href.'" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-1 py-1 mx-4">
                    <i class="'.$menu_child->child_icon.' w-5"></i> '.ucfirst($menu_child->child_name).'
                </a>
            </div>';
        endforeach;

        $temp .=
        '</div>';

    endforeach;

    return $temp;
}


function partition($list, $p)
{
    $listlen = count($list);
    $partlen = floor($listlen / $p);
    $partrem = $listlen % $p;
    $partition = [];
    $mark = 0;
    for ($px = 0; $px < $p; $px++):
        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
        $partition[$px] = array_slice($list, $mark, $incr);
        $mark += $incr;
    endfor;
    return $partition;
}
