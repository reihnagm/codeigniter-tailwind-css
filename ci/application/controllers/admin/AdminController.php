<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends Master_Controller
{
	public $data_param = [];

	public function __construct()
	{
		parent::__construct();

		$data = [
			"get_temp_privilege" => $this->get_temp_privilege(),
			"get_menus_admin" => get_menus_admin()
		];

		$this->data_param["data"] = $data;
	}

	public function index()
	{
		$this->load->view('master_admin/header');
		$this->load->view('admin/index', $this->data_param);
		$this->load->view('master_admin/footer');
	}

    public function change_password()
    {
        $this->load->view('master_admin/header');
		$this->load->view('admin/change_password', $this->data_param);
        $this->load->view('master_admin/footer');
    }

    public function privilege()
    {
        $this->load->view('master_admin/header');
        $this->load->view('admin/privilege', $this->data_param);
        $this->load->view('master_admin/footer');
    }

	public function user_datatables()
	{

		// DEFINE COLUMN
		$columns =
		[
			0 => "no",
			1 => "first_name",
			2 => "last_name",
			3 => "username",
			4 => "email"
 		];

		$order = $columns[$this->input->get('order')[0]["column"]];
		$dir = $this->input->get('order')[0]["dir"];

		$draw 	= $this->input->get("draw");
		$start 	= $this->input->get("start");
		$length = $this->input->get("length");
		$search = $this->input->get("search")["value"];

		if(!empty($search))
		{
			$sql = "SELECT a.id, a.first_name, a.last_name, a.username, a.email
			FROM tbl_users a
			WHERE a.first_name LIKE '%{$search}%'
			OR a.last_name LIKE '%{$search}%'
			OR a.username LIKE '%{$search}%'
			OR a.email LIKE '%{$search}%'
			OR CAST(a.age as TEXT) LIKE '{$search}%'
			OR a.gender LIKE '%{$search}%'";

			if ($length > 0)
			{
				$this->db->limit($length, $start);
			}

			$users = $this->db->query($sql)->result();
		}
		else
		{
			$this->db->select("a.id, a.first_name, a.last_name, a.username, a.email");
			$this->db->from("tbl_users a");

			if($order == "no")
			{
				$this->db->order_by("a.id", $dir);
			}
			else
			{
				$this->db->order_by($order, $dir);
			}

			if ($length > 0)
	        {
			    $this->db->limit($length, $start);
			}

			$users = $this->db->get()->result();
		}

		$data = [];

		$index = 1;

		foreach($users as $user):

			$row['no'] = $index++;
			$row['first_name'] = $user->first_name;
			$row['last_name'] = $user->last_name;
			$row['username'] = $user->username;
			$row['email'] = $user->email;
			// $row['created_at'] = date("M jS, Y", strtotime($user->created_at));
			// $row['updated_at'] = date("M jS, Y", strtotime($user->updated_at));

			$row['option'] =  	'<a href="javascript:void(0)" class="hover:text-pink-300">
									<i onclick="edit_user_datatables('.$user->id.')" id="edit-user-datatables-'.$user->id.'" class="fas fa-edit w-8"></i>
								</a>
								<a href="javascript:void(0)" class="hover:text-pink-300">
									<i onclick="destroy_user_datatables('.$user->id.')" id="destroy-user-datatables-'.$user->id.'" class="fa fa-trash w-8"></i>
								</a>';

			$data[] = $row;

		endforeach;

		echo json_encode([
			"draw" => $draw,
			"recordsTotal" => $this->total_user_datatables(),
			"recordsFiltered" => $this->filtered_user_datatables(),
			"data" => $data
		]);
	}

	public function edit_user_datatables()
	{
		$id = $this->input->get("id");

		$this->db->select("a.id, a.first_name, a.last_name, a.username, a.email, a.gender,  a.age, a.created_at, a.updated_at");
		$this->db->from("tbl_users a");
		$this->db->where("a.id", $id);
		$user = $this->db->get()->row_array();

		$key = array_keys($user);

		$male_selected = $user['gender'] == "Male" ? "selected" : "";
		$female_selected = $user['gender'] == "Female" ? "selected" : "";

		$temp =
		'<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
			<div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

			<div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

				<div onclick="close_modal();" class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
					<svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
						<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
					</svg>
					<span class="text-sm">(Esc)</span>
				</div>

				<div class="modal-content py-4 text-left px-6 w-full">

					<div class="flex justify-end items-center pb-3">
						<div onclick="close_modal();" class="cursor-pointer z-50">
							<svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
								<path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
							</svg>
						</div>
					</div>

					<form class="flex items-center w-full" id="form-edit-user-datatables">
						<div class="w-1/2">
							<div class="block mx-3">
						 		<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[0].'">
						   		'.$key[0].'
						 		</label>
						 		<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[0].'" name="'.$key[0].'" type="text" placeholder="'.$key[0].'" value="'.$user['id'].'" readonly>
					   		</div>

							<div class="block mx-3">
						 		<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[1].'">
						   		'.$key[1].'
						 		</label>
						 		<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[1].'" name="'.$key[1].'" type="text" placeholder="'.$key[1].'" value="'.$user['first_name'].'">
					   		</div>

							<div class="block mx-3">
						 		<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[2].'">
						   		'.$key[2].'
						 		</label>
						 		<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[2].'" type="text" placeholder="'.$key[2].'" name="'.$key[2].'" value="'.$user['last_name'].'">
					   		</div>

							<div class="block mx-3">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[3].'">
						   		'.$key[3].'
						 		</label>
						 		<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[3].'" type="text" placeholder="'.$key[3].'" name="'.$key[3].'" value="'.$user['username'].'">
					   		</div>
						</div>

						<div class="w-1/2">
							<div class="block mx-3">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[4].'">
							   		'.$key[4].'
							 	</label>
							 	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[4].'" type="text" placeholder="'.$key[4].'" name="'.$key[4].'" value="'.$user['email'].'">
						   	</div>

							<div class="block mx-3">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[5].'">
							   		'.$key[5].'
							 	</label>
								<div class="relative">
						        <select name="'.$key[5].'" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
						          <option '.$male_selected.'>Male</option>
						          <option '.$female_selected.'>Female</option>
						        </select>
						        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
						          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
						        </div>
							</div>

							<div class="block mx-3">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[6].'">
							   		'.$key[6].'
							 	</label>
							 	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[6].'" type="text" placeholder="'.$key[6].'" name="'.$key[6].'" value="'.$user['age'].'">
						   	</div>

							<div class="block mx-3">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[7].'">
							   		'.$key[7].'
							 	</label>
							 	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[7].'" type="text" placeholder="'.$key[7].'" name="'.$key[7].'" value="'.$user['created_at'].'">
						   	</div>
						</div>
					</form>

				</div>

				<div class="flex justify-end my-6">
					<button type="submit" onclick="submit_update_user_datatables(this);" class="px-2 py-2 bg-pink-500 rounded-lg text-white hover:text-pink-300 mr-2">Submit</button>
					<button onclick="close_modal();" class="px-2 py-2 bg-pink-500 rounded-lg text-white hover:text-pink-300">Close</button>
				</div>

			</div>

		</div>';

		echo json_encode([
			"temp" => $temp
		]);
	}


	public function update_user_datatables()
	{
		$id  = $this->input->post("id");
		$first_name = $this->input->post("first_name");
		$last_name = $this->input->post("last_name");
		$username = $this->input->post("username");
		$email = $this->input->post("email");
		$age = $this->input->post("age");
		$gender = $this->input->post("gender");

		$data =
		[
			"first_name" => $first_name,
			"last_name" => $last_name,
			"username" => $username,
			"email" => $email,
			"age" => $age,
			"gender" => $gender
		];

		$this->db->trans_start();
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('tbl_users');
		$this->db->trans_complete();

		$data_param = [];

		if ($this->db->trans_status() === FALSE)
		{
			$data_param["valid"] = FALSE;
			$data_param["title"] = "Update error !";
 			$data_param["desc"]  = "Something Wrong !";
			$data_param["type"]  = "error";
		}
		else
		{
			$data_param["valid"] = TRUE;
			$data_param["title"] = "Update Success !";
			$data_param["desc"] = "Successfully !";
			$data_param["type"] = "success";
		}

		echo json_encode($data_param);
	}

	public function destroy_user_datatables()
	{
		$id = $this->input->post("id");

		// echo '<pre>';
		// die(var_dump($id));

		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->delete('tbl_users');
		$this->db->trans_complete();

		$data_param = [];

		if ($this->db->trans_status() === FALSE)
		{
			$data_param["valid"] = FALSE;
			$data_param["title"] = "Update error !";
 			$data_param["desc"]  = "Something Wrong !";
			$data_param["type"]  = "error";
		}
		else
		{
			$data_param["valid"] = TRUE;
			$data_param["title"] = "Update Success !";
			$data_param["desc"] = "Successfully !";
			$data_param["type"] = "success";
		}
	}

	private function total_user_datatables()
	{
		$search = $this->input->get("search")["value"];

		if(!empty($search))
		{
			$sql = "SELECT COUNT(*)
			FROM tbl_users a
			WHERE a.first_name LIKE '%{$search}%'
			OR a.last_name LIKE '%{$search}%'
			OR a.username LIKE '%{$search}%'
			OR a.email LIKE '%{$search}%'
			-- OR CAST(a.age as TEXT) LIKE '{$search}%' IF YOU DESERVED USE COLUMN AGE
			-- OR a.gender LIKE '%{$search}%'";

			return $this->db->query($sql)->row_array()["count"];
		}
		else
		{
			$this->db->select("a.id, a.first_name, a.last_name, a.username, a.email");
			$this->db->from("tbl_users a");

			return $this->db->count_all_results();
		}
	}

	private function filtered_user_datatables()
	{
		$search = $this->input->get("search")["value"];

		if(!empty($search))
		{
			$sql = "SELECT COUNT(*)
			FROM tbl_users a
			WHERE a.first_name LIKE '%{$search}%'
			OR a.last_name LIKE '%{$search}%'
			OR a.username LIKE '%{$search}%'
			OR a.email LIKE '%{$search}%'
			-- OR CAST(a.age as TEXT) LIKE '{$search}%' IN POSTGRE INT CANNOT BE SEARCH, CONVERT TO TEXT
			-- OR a.gender LIKE '%{$search}%'";

			return $this->db->query($sql)->row_array()["count"];
		}
		else
		{
			$this->db->select("a.id, a.first_name, a.last_name, a.username, a.email");
			$this->db->from("tbl_users a");

			return $this->db->count_all_results();
		}
	}

	public function user_read()
	{
		$this->load->view('master_admin/header');
		$this->load->view('admin/user', $this->data_param);
		$this->load->view('master_admin/footer');
	}

    public function logout()
    {
        session_destroy();

        redirect('/', 'refresh');
    }

	public function get_count_privilege()
	{
		$this->db->from("tbl_app_admin_menu");
		$this->db->where("type", "crud");
		return $this->db->count_all_results();
	}

	public function get_temp_privilege()
	{
		$count = 0;
		$temp = "";
		$group_name = ""; // PREVENT DOUBLE DATA

		$this->db->select("a.name admin_menu_name, a.id admin_menu_id, b.name admin_menu_group_name");
		$this->db->from("tbl_app_admin_menu a");
		$this->db->join("tbl_app_admin_menu_group b",
		"a.admin_menu_group_id = b.id", "inner");
		$this->db->where('a.type', 'crud');
		$this->db->order_by("a.id", "DESC");
		$privileges = $this->db->get()->result_object();

		foreach ($privileges as $privilege):
			$temp .=
			'<thead>';

			if($group_name != $privilege->admin_menu_group_name)
			{
				$group_name = $privilege->admin_menu_group_name;
				$temp .=
				'<tr>
					<th class="text-sm font-semibold text-grey-darker p-2 bg-grey-lightest">'.strtoupper($group_name).'</th>
				</tr>';
			}

			$temp .=
			'</thead>';

			$temp .=
			'<tbody class="align-baseline">';

			$name = "'$privilege->admin_menu_name'"; // STRING ""
			$id  = "$privilege->admin_menu_id";

			$temp .=
			'<tr>
				<td class="p-2 border-t border-grey-light whitespace-no-wrap">'.$privilege->admin_menu_name.'</td>
				<td class="p-2 border-t border-grey-light whitespace-no-wrap">
					<div class="flex cursor-pointer items-center">
						<span class="inline-block px-3">Create</span>
						<div onclick="checkbox_privilege_create('.$id.')" class="bg-pink-500 shadow w-6 h-6 p-1 rounded">
							<input type="hidden" class="hidden" name="c'.$id.'" value="0">
							<svg class="svg-privilege-create-'.$id.' hidden w-4 h-4 text-white" viewBox="0 0 172 172">
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
							<input type="hidden" class="hidden" name="r'.$id.'" value="0">
							<svg class="svg-privilege-read-'.$id.' hidden w-4 h-4 text-white" viewBox="0 0 172 172">
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
							<input type="hidden" class="hidden" name="u'.$id.'" value="0">
							<svg class="svg-privilege-update-'.$id.' hidden w-4 h-4 text-white" viewBox="0 0 172 172">
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
							<input type="hidden" class="hidden" name="d'.$id.'" value="0">
							<svg class="svg-privilege-destroy-'.$id.' hidden w-4 h-4 text-white" viewBox="0 0 172 172">
								<g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal"><path d="M0 172V0h172v172z"/><path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1"/>
								</g>
							</svg>
						</div>
					</div>
				</td>
			</tr>';

			$temp .=
			'</tbody>';
		endforeach;

		$temp =
		'<table class="w-full text-left table-collapse">
			'.$temp.'
		</table>';

		return $temp;
	}
	function save_privilege()
	{

		$count = $this->get_count_privilege();

		$menu_id = "";
		$array_key = [];

		foreach ($this->partition($this->input->post('data'), $count) as $data):

			foreach ($data as $value):
				$menu_id = substr($value["name"], 1);
				$array_key[$value['name']] = $value['value'];
			endforeach;

			// CONVERT INT TO ARRAY
			// $num = array_map('intval', str_split((int) $value_));
			// OUTPUT
			// [0] => data
			// [1] => data

			$check_privilege = (int) $this->check_privilege();

			if($check_privilege > (int) 0)
			{
				// UPDATE
				$this->db->set("user_id", 2);
				$this->db->set("priv_create", $array_key['c'.$menu_id] == "1" ? 1 : 0);
				$this->db->set("priv_read",   $array_key['r'.$menu_id] == "1" ? 1 : 0);
				$this->db->set("priv_update", $array_key['u'.$menu_id] == "1" ? 1 : 0);
				$this->db->set("priv_delete", $array_key['d'.$menu_id] == "1" ? 1 : 0);
				$this->db->where('menu_id', $menu_id);
				$this->db->update('tbl_privileges');
			}
			else
			{
				// INSERT
				$this->insert_privilege();
			}

		endforeach;
	}

	private function check_privilege()
	{
		$this->db->from("tbl_privileges");
		$result = $this->db->get()->num_rows();
		return $result;
	}

	private function insert_privilege()
	{
		$count = $this->get_count_privilege();

		$menu_id = "";
		$array_key = [];

		foreach (partition($this->input->post('data'), $count) as $data):

			foreach ($data as $value):
				$menu_id = substr($value["name"], 1);
				$array_key[$value['name']] = $value['value'];
			endforeach;

			// CONVERT INT TO ARRAY
			// $num = array_map('intval', str_split((int) $value_));
			// OUTPUT
			// [0] => data
			// [1] => data

			$datas =
			[
				"user_id" 	  => 1,
				"menu_id" 	  => $menu_id,
				"priv_create" => $array_key['c'.$menu_id] == "1" ? 1 : 0,
				"priv_read"   => $array_key['r'.$menu_id] == "1" ? 1 : 0,
				"priv_update" => $array_key['u'.$menu_id] == "1" ? 1 : 0,
				"priv_delete" => $array_key['d'.$menu_id] == "1" ? 1 : 0
			];
			$this->db->insert("tbl_privileges", $datas);
		endforeach;

	}
}
