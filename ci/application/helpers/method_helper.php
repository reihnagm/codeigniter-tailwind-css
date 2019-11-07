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
function display_villages($village_id)
{
    $CI = __db();

    $CI->db->select("a.name name_village, b.name name_district, c.name name_regency, d.name name_province");
    $CI->db->from("villages a");
    $CI->db->join("districts b",
    "a.district_id = b.id");
    $CI->db->join("regencies c",
    "b.regency_id = c.id");
    $CI->db->join("provinces d",
    "c.province_id = d.id");
    $CI->db->where("a.id", $village_id);

    $result = $CI->db->get()->row();

    return $result;
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

    $temp = '<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Regencies
            </label>
            <select id="regencies" class="block rounded appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-3">
            ';

    foreach ($regencies as $regencie):
        $temp .= '<option value="'.$regencie->id.'">'.$regencie->name.'</option>';
    endforeach;

    $temp .='</select>';

    echo json_encode($temp);
}
function districts($regency_id)
{
    $CI = __db();
    $CI->db->from("districts");
    $CI->db->where("regency_id", $regency_id);

    $districts = $CI->db->get()->result();

    $temp = '<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Districts
            </label>
            <select id="districts" class="block rounded appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-3">
            ';

    foreach ($districts as $district):
        $temp .= '<option value="'.$district->id.'">'.$district->name.'</option>';
    endforeach;

    $temp .='</select>';

    echo json_encode($temp);
}
function villages($district_id)
{
    $CI = __db();
    $CI->db->from("villages");
    $CI->db->where("district_id", $district_id);

    $villages = $CI->db->get()->result();

    $temp = '<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Villages
            </label>
            <select id="villages" class="block rounded appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-3">
            ';

    foreach ($villages as $village):
        $temp .= '<option value="'.$village->id.'">'.$village->name.'</option>';
    endforeach;

    $temp .='</select>';

    echo json_encode($temp);
}
function get_regencies()
{
    $CI = __db();
    $CI->db->from("regencies");
    $CI->db->where("province_id", "11");

    $regencies = $CI->db->get()->result();

    $temp = '<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Regencies
            </label>
            <select id="regencies" class="block rounded appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-3">
            ';

    foreach ($regencies as $regencie):
        $temp .= '<option value="'.$regencie->id.'">'.$regencie->name.'</option>';
    endforeach;

    $temp .='</select>';

    return $temp;
}
function get_districts()
{
    $CI = __db();
    $CI->db->from("districts");
    $CI->db->where("regency_id", "1101");

    $districts = $CI->db->get()->result();

    $temp = '<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Districts
            </label>
            <select id="districts" class="block rounded appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-3">
            ';

    foreach ($districts as $district):
        $temp .= '<option value="'.$district->id.'">'.$district->name.'</option>';
    endforeach;

    $temp .='</select>';

    return $temp;
}
function get_villages()
{
    $CI = __db();
    $CI->db->from("villages");
    $CI->db->where("district_id", "1101010");

    $villages = $CI->db->get()->result();

    $temp = '<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Villages
            </label>
            <select id="villages" class="block rounded appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-3">
            ';

    foreach ($villages as $village):
        $temp .= '<option value="'.$village->id.'">'.$village->name.'</option>';
    endforeach;

    $temp .='</select>';

    return $temp;
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
                <a href="'.$url.'admin/settings/'.$menu_child->child_href.'" target="_blank" class="hover:text-pink-300 font-medium inline-block text-white my-1 py-1 mx-4">
                    <i class="'.$menu_child->child_icon.' w-8"></i> '.ucfirst($menu_child->child_name).'
                </a>
            </div>';
        endforeach;

        $temp .=
        '</div>';

    endforeach;

    return $temp;
}
function get_temp_privilege($user_id)
{
    $temp = "";
    $group_name = ""; // PREVENT DOUBLE DATA
    $child_name = ""; // PREVENT DOUBLE DATA

    $CI = __db();

    $CI->db->select("a.name admin_menu_name, a.id admin_menu_id, b.name admin_menu_group_name");
    $CI->db->from("tbl_app_admin_menu a");
    $CI->db->join("tbl_app_admin_menu_group b",
    "a.admin_menu_group_id = b.id");
    $CI->db->where('a.type', 'crud');

    $privileges = $CI->db->get()->result_object();

    foreach ($privileges as $privilege):

        $CI->db->from("tbl_privileges");
        $CI->db->where("menu_id", $privilege->admin_menu_id);
        $CI->db->where("user_id", $user_id);

        $user_privilege = $CI->db->get()->row();

        if($group_name != $privilege->admin_menu_group_name):
            $group_name = $privilege->admin_menu_group_name;
            $temp .=
            '<thead>
                <tr>
                    <th class="text-sm font-semibold text-grey-darker p-2 bg-grey-lightest">'.strtoupper($group_name).'</th>
                </tr>
            </thead>';
        endif;

        // $name_string = "'$privilege->admin_menu_name'"; // STRING ""
        // $name = "$privilege->admin_menu_name";

        $id = "$privilege->admin_menu_id";

        $priv_create_class   = !empty($user_privilege->priv_create) ? 'block' : 'hidden';
        $priv_create_checked = !empty($user_privilege->priv_create) ? 'checked' : '';
        $priv_create_value   = !empty($user_privilege->priv_create) ? 1 : 0;
        
        $priv_read_class   = !empty($user_privilege->priv_read) ? 'block' : 'hidden';
        $priv_read_checked = !empty($user_privilege->priv_read) ? 'checked' : '';
        $priv_read_value   = !empty($user_privilege->priv_read) ? 1 : 0;

        $priv_update_class   = !empty($user_privilege->priv_update) ? 'block' : 'hidden';
        $priv_update_checked = !empty($user_privilege->priv_update) ? 'checked' : '';
        $priv_update_value   = !empty($user_privilege->priv_update) ? 1 : 0;

        $priv_delete_class   = !empty($user_privilege->priv_delete) ? 'block' : 'hidden';
        $priv_delete_checked = !empty($user_privilege->priv_delete) ? 'checked' : '';
        $priv_delete_value   = !empty($user_privilege->priv_delete) ? 1 : 0;

        $temp .=
        '<tbody class="align-baseline">
            <tr>
                <td class="p-2 border-t border-grey-light whitespace-no-wrap">'.$privilege->admin_menu_name.'</td>
                <td class="p-2 border-t border-grey-light whitespace-no-wrap">
                    <div class="flex cursor-pointer items-center">
                        <span class="inline-block px-3">Create</span>
                        <div onclick="checkbox_privilege_create('.$id.')" class="bg-pink-500 shadow w-6 h-6 p-1 rounded">
                            <input type="hidden" class="hidden" name="c'.$id.'" value="'.$priv_create_value.'" '.$priv_create_checked.'>
                            <svg class="svg-privilege-create-'.$id.' '.$priv_create_class.'  w-4 h-4 text-white" viewBox="0 0 172 172">
                                <g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </td>
                <td class="p-2 border-t border-grey-light whitespace-no-wrap">
                    <div class="flex cursor-pointer items-center">
                        <span class="inline-block px-3">Read</span>
                        <div onclick="checkbox_privilege_read('.$id.')" class="bg-pink-500 shadow w-6 h-6 p-1 rounded">
                            <input type="hidden" class="hidden" name="r'.$id.'" value="'.$priv_read_value.'" '.$priv_read_checked.'>
                            <svg class="svg-privilege-read-'.$id.' '.$priv_read_class.' w-4 h-4 text-white" viewBox="0 0 172 172">
                                <g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </td>
                <td class="p-2 border-t border-grey-light whitespace-no-wrap">
                    <div class="flex cursor-pointer items-center">
                        <span class="inline-block px-3">Update</span>
                        <div onclick="checkbox_privilege_update('.$id.')" class="bg-pink-500 shadow w-6 h-6 p-1 rounded">
                            <input type="hidden" class="hidden" name="u'.$id.'" value="'.$priv_update_value.'" '.$priv_update_checked.'>
                            <svg class="svg-privilege-update-'.$id.' '.$priv_update_class.' w-4 h-4 text-white" viewBox="0 0 172 172">
                                <g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </td>
                <td class="p-2 border-t border-grey-light whitespace-no-wrap">
                    <div class="flex cursor-pointer items-center">
                        <span class="inline-block px-3">Delete</span>
                        <div onclick="checkbox_privilege_destroy('.$id.')" class="bg-pink-500 shadow w-6 h-6 p-1 rounded">
                            <input type="hidden" class="hidden" name="d'.$id.'" value="'.$priv_delete_value.'" '.$priv_delete_checked.'>
                            <svg class="svg-privilege-destroy-'.$id.' '.$priv_delete_class.' w-4 h-4 text-white" viewBox="0 0 172 172">
                                <g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>';
    endforeach;

    $temp =
    '<table class="w-full text-left table-collapse">
        '.$temp.'
    </table>';

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
