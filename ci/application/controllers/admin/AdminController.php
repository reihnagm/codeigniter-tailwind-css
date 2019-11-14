<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends Master_Controller
{
	var $data = []; // PUBLIC PROPERTY

	public function __construct()
	{
		parent::__construct();

		// $data =
		// [
		// 	"get_temp_privilege" => get_temp_privilege(),
		// 	"get_menus_admin" => get_menus_admin()
		// ];

		// $this->data["data"] = $data;
	}
	public function index()
	{
		$this->load->view('master_admin/header');
		$this->load->view('admin/index');
		$this->load->view('master_admin/footer');
	}
    public function change_password()
    {
        $this->load->view('master_admin/header');
		$this->load->view('admin/change_password');
        $this->load->view('master_admin/footer');
    }
    public function privilege()
    {
        $this->load->view('master_admin/header');
        $this->load->view('admin/privilege');
        $this->load->view('master_admin/footer');
	}
	public function general()
	{
		$this->load->view('master_admin/header');
        $this->load->view('admin/general');
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
			4 => "email",
			5 => "created_at"
 		];

		$order = $columns[$this->input->get('order')[0]["column"]];
		$dir = $this->input->get('order')[0]["dir"];

		$draw 	= $this->input->get("draw");
		$start 	= $this->input->get("start");
		$length = $this->input->get("length");
		$search = $this->input->get("search")["value"];

		if(!empty($search))
		{
			$this->db->select("a.id, a.first_name, a.last_name, a.username, a.email, a.created_at");
			$this->db->from("tbl_users a");
			$this->db->like("a.first_name", $search);
			$this->db->or_like("a.last_name", $search);
			$this->db->or_like("a.username", $search);
			$this->db->or_like("a.email", $search);
			$this->db->or_like("CAST(a.email as TEXT)", $search);
			$this->db->or_like("a.gender", $search);

			// RAW QUERY
			// $sql = "SELECT a.id, a.first_name, a.last_name, a.username, a.email, a.created_at
			// FROM tbl_users a
			// WHERE a.first_name LIKE '%{$search}%'
			// OR a.last_name LIKE '%{$search}%'
			// OR a.username LIKE '%{$search}%'
			// OR a.email LIKE '%{$search}%'
			// OR CAST(a.age as TEXT) LIKE '{$search}%'
			// OR a.gender LIKE '%{$search}%'";

			if ($length > 0)
				$this->db->limit($length, $start);

			// RAW QUERY
			// $users = $this->db->query($sql)->result();

			$users = $this->db->get()->result();
		}
		else
		{
			$this->db->select("a.id, a.first_name, a.last_name, a.username, a.email, a.created_at");
			$this->db->from("tbl_users a");

			if($order)
				$this->db->order_by("a.id", $dir);
			else
				$this->db->order_by($order, "DESC");

			if ($length > 0)
			    $this->db->limit($length, $start);


			$users = $this->db->get()->result();
		}

		$data = [];

		$index = 1;

		foreach($users as $user):

			$row = [];

			$row['no'] = $index++;
			$row['first_name'] = $user->first_name;
			$row['last_name'] = $user->last_name;
			$row['username'] = $user->username;
			$row['email'] = $user->email;
			$row['created_at'] = date("M jS, Y", strtotime($user->created_at));
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
	public function user_privilege_datatables()
	{
		// DEFINE COLUMN
		$columns =
		[
			0 => "no",
			1 => "username",
			2 => "email",
			3 => "name",
		];

		$order = $columns[$this->input->get('order')[0]["column"]];
		$dir = $this->input->get('order')[0]["dir"];

		$draw 	= $this->input->get("draw");
		$start 	= $this->input->get("start");
		$length = $this->input->get("length");
		$search = $this->input->get("search")["value"];

		if(!empty($search))
		{
			$this->db->select("a.id, a.username, a.email, b.name");
			$this->db->from("tbl_users a");
			$this->db->join("tbl_roles b", "a.role_id = b.id");
			$this->db->like("a.username", $search);
			$this->db->or_like("a.email", $search);
			$this->db->or_like("b.name", $search);

			if ($length > 0)
				$this->db->limit($length, $start);

			$users = $this->db->get()->result();
		}
		else
		{
			$this->db->select("a.id, a.username, a.email, b.name");
			$this->db->from("tbl_users a");
			$this->db->join("tbl_roles b", "a.role_id = b.id");

			if($order)
				$this->db->order_by("a.id", $dir);
			else
				$this->db->order_by($order, "DESC");

			if ($length > 0)
				$this->db->limit($length, $start);

			$users = $this->db->get()->result();
		}

		$data = [];

		$index = 1;

		foreach($users as $user):

			$row = [];

			$row['no'] = $index++;
			$row['username'] = $user->username;
			$row['email'] = $user->email;
			$row['name'] = $user->name;

			$row['option'] =  	'<a href="javascript:void(0)" class="hover:text-pink-300">
									<i onclick="edit_user_privilege_datatables('.$user->id.')"  class="fas fa-edit w-8"></i>
								</a>
								<a href="javascript:void(0)" class="hover:text-pink-300">
									<i onclick="destroy_user_privilege_datatables('.$user->id.')" class="fa fa-trash w-8"></i>
								</a>
								<a href="'.site_url().'admin/show-privilege-user/'.$user->username.$user->id.'" class="hover:text-pink-300">
									<i id="show-user-privilege-datatables" class="fas fa-eye w-8">
								</a>';

			$data[] = $row;

		endforeach;

		echo json_encode([
			"draw" => $draw,
			"recordsTotal" => $this->total_user_privilege_datatables(),
			"recordsFiltered" => $this->filtered_user_privilege_datatables(),
			"data" => $data
		]);
	}
	private function total_user_privilege_datatables()
	{
		$this->db->select("a.id, a.first_name, a.last_name, a.username, a.email");
		$this->db->from("tbl_users a");

		return $this->db->count_all_results();
	}
	private function filtered_user_privilege_datatables()
	{
		$search = $this->input->get("search")["value"];

		if(!empty($search))
		{
			$sql = "SELECT COUNT(*)
			FROM tbl_users a
			INNER JOIN tbl_roles b ON a.role_id = b.id
			WHERE a.username LIKE '%{$search}%'
			OR a.username LIKE '%{$search}%'
			OR b.name LIKE '%{$search}%'";

			return $this->db->query($sql)->row_array()["count"];
		}
		else
		{
			$this->db->select("a.id, a.username, a.email, b.name");
			$this->db->from("tbl_users a");
			$this->db->join("tbl_roles b", "a.role_id = b.id");

			return $this->db->count_all_results();
		}
	}
	public function edit_user_datatables()
	{
		$data = [];

		$this->db->select("a.id, a.first_name, a.last_name, a.username, a.email, a.gender,  a.age, a.created_at, a.updated_at, a.avatar");
		$this->db->from("tbl_users a");
		$this->db->where("a.id", $this->input->get("id"));

		$user = $this->db->get()->row();

		$get_object_vars = get_object_vars($user);
		$key = array_keys($get_object_vars);

		$male_selected = $user->gender == "Male" ? "selected" : "";
		$female_selected = $user->gender == "Female" ? "selected" : "";

		$replace_created_at = str_replace('-', '/', $user->created_at);
		$replace_updated_at = str_replace('-', '/', $user->updated_at);

		$created_at = $replace_created_at;
		$updated_at = $replace_updated_at;

		$updated_at = date('M-D-d-Y', strtotime($updated_at));

		$avatar = $user->avatar;

		$temp =
		'<div class="modal opacity-0 pointer-events-none z-50 fixed w-full h-full top-0 left-0 flex items-center justify-center">
			<div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

			<div class="modal-container bg-white w-11/12 mx-auto rounded shadow-lg z-50 overflow-y-auto">

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

					<form class="flex flex-wrap overflow-hidden -mx-5" id="form-edit-user-datatables" data-parsley-validate data-parsley-focus="first">
						<div class="w-1/3 overflow-hidden my-5 px-5">

							<div class="block mx-3">
								<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[0].'">
									'.$key[0].'
				 				</label>
					 			<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[0].'" name="'.$key[0].'" type="text" placeholder="'.$key[0].'" value="'.$user->id.'" readonly>
							</div>

							<div class="block mx-3">
								<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[1].'">
									'.$key[1].'
						 		</label>
					 			<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[1].'" name="'.$key[1].'" type="text" placeholder="'.$key[1].'" value="'.$user->first_name.'">
							</div>

							<div class="block mx-3">
						 		<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[2].'">
					 				'.$key[2].'
						 		</label>
						 		<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[2].'" type="text" placeholder="'.$key[2].'" name="'.$key[2].'" value="'.$user->last_name.'">
							 </div>

							 <div id="errors-last-name" class="border form-field-last-name invisible opacity-0 mt-2 text-sm font-bold border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"></div>
	
							<div class="block mx-3 form-group">
								<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[3].'">
								'.$key[3].'
								</label>
								<input  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[3].'" type="text" placeholder="'.$key[3].'" name="'.$key[3].'" value="'.$user->username.'" required>
							</div>

						</div>

						<div class="w-1/3 overflow-hidden my-5 px-5">

							<div class="block mx-3">
								<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[4].'">
									'.$key[4].'
								</label>
								<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[4].'" type="text" placeholder="'.$key[4].'" name="'.$key[4].'" value="'.$user->email.'">
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
							</div>

							<div class="block mx-3">
								<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[6].'">
									'.$key[6].'
								</label>
								<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[6].'" type="text" placeholder="'.$key[6].'" name="'.$key[6].'" value="'.$user->age.'">
							</div>

							<div class="block mx-3">
								<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[7].'">
									'.$key[7].'
								</label>
								<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[7].'" type="text" placeholder="'.$key[7].'" name="'.$key[7].'" value="'.$created_at.'">
							</div>

						</div>

						<div class="w-1/3 overflow-hidden my-5 px-5">
							<div class="block mx-3">
								<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[8].'">
									'.$key[8].'
								</label>
								<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[8].'" type="text" placeholder="'.$key[8].'" name="'.$key[8].'" value="'.$updated_at.'" disabled>
							</div>

							<div class="block my-5 mx-3">
								<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[9].'">
									'.$key[9].'
								</label>
								<div class="bg-gray-400 hover:bg-gray-500 cursor-pointer">
									<form id="form-'.$key[9].'" enctype="mulitpart/form-data">
										<input id="'.$key[9].'" type="file" class="hidden" name="'.$key[9].'" >
										<img id="'.$key[9].'-trigger" class="h-40 w-full object-contain" src="'.$avatar.'">
									</form>
								</div>
							</div>
						</div>

					</form>

					<div class="flex flex-wrap overflow-hidden w-full justify-end my-6">
						<div class="flex justify-end w-1/2">
							<button id="submit-edit-user-datatables" class="w-1/6 px-2 py-2 bg-pink-500 rounded-lg text-white hover:text-pink-300 mr-2">Submit</button>

							<button onclick="close_modal();" class="w-1/6 px-2 py-2 bg-pink-500 rounded-lg text-white hover:text-pink-300">Close</button>
						</div>
					</div>

				</div>


			</div>

		</div>';

		// echo json_encode($temp);
		echo json_encode($user);
	}
	public function edit_user_privilege_datatables()
	{	
		$this->db->select("a.id, a.username, a.email, b.name");
		$this->db->from("tbl_users a");
		$this->db->join("tbl_roles b","a.role_id = b.id");
		$this->db->where("a.id", $$this->input->get("id"));
		$user = $this->db->get()->row();

		$key = array_keys($user);

		$temp =
		'<div class="modal opacity-0 pointer-events-none z-50 fixed w-full h-full top-0 left-0 flex items-center justify-center">
			<div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

			<div class="modal-container bg-white w-11/12 mx-auto rounded shadow-lg z-50 overflow-y-auto">

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

					<form class="flex flex-wrap overflow-hidden -mx-5" id="form-edit-user-datatables">
						<div class="w-1/3 overflow-hidden my-5 px-5">

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

						</div>

						<div class="w-1/3 overflow-hidden my-5 px-5">

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
								<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[7].'" type="text" placeholder="'.$key[7].'" name="'.$key[7].'" value="'.$created_at.'">
							</div>

						</div>

					</form>

					<div class="flex flex-wrap overflow-hidden w-full justify-end my-6">
						<div class="flex justify-end w-1/2">
							<button id="submit_update_user_privilege_datatables" type="submit" onclick="submit_update_user_privilege_datatables();" class="w-1/6 px-2 py-2 bg-pink-500 rounded-lg text-white hover:text-pink-300 mr-2">Submit</button>

							<button onclick="close_modal();" class="w-1/6 px-2 py-2 bg-pink-500 rounded-lg text-white hover:text-pink-300">Close</button>
						</div>
					</div>


				</div>


			</div>

		</div>';

		echo json_encode([
			"temp" => $temp
		]);
	}
	public function update_user_datatables()
	{
		$msg = [];

		$data =
		[
			"first_name" => $this->input->post("first_name"),
			"last_name" => $this->input->post("last_name"),
			"username" => $this->input->post("username"),
			"email" => $this->input->post("email"),
			"age" => $this->input->post("age"),
			"gender" => $this->input->post("gender"),
			"updated_at" => Date('Y-m-d')
		];

		$this->db->trans_start();
		$this->db->set($data);
		$this->db->where('id', $this->input->post("id"));
		$this->db->update('tbl_users');
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			$msg["valid"] = FALSE;
			$msg["title"] = "Update error !";
 			$msg["description"]  = "Something Wrong !";
			$msg["type"]  = "error";
		}
		else
		{
			$msg["valid"] = TRUE;
			$msg["title"] = "Update Success !";
			$msg["description"] = "Successfully !";
			$msg["type"] = "success";
		}

		echo json_encode($msg);
	}

	public function destroy_user_datatables()
	{
		$msg = [];

		$this->db->trans_start();
		$this->db->where('id', $this->input->post("id"));
		$this->db->delete('tbl_users');
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			$msg["valid"] = FALSE;
			$msg["title"] = "Delete error !";
 			$msg["desc"]  = "Something Wrong !";
			$msg["type"]  = "error";
		}
		else
		{
			$msg["valid"] = TRUE;
			$msg["title"] = "Delete Successfully !";
			$msg["desc"]  = "Successfully !";
			$msg["type"]  = "success";
		}

		echo json_encode($msg);
	}
	public function destroy_user_privilege_datatables()
	{
		$msg = [];

		$this->db->trans_start();
		$this->db->where('id', $this->input->post("id"));
		$this->db->delete('tbl_users');
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			$msg["valid"] = FALSE;
			$msg["title"] = "Delete error !";
 			$msg["desc"]  = "Something Wrong !";
			$msg["type"]  = "error";
		}
		else
		{
			$msg["valid"] = TRUE;
			$msg["title"] = "Delete Successfully !";
			$msg["desc"]  = "Successfully !";
			$msg["type"]  = "success";
		}

		echo json_encode($msg);
	}
	private function total_user_datatables()
	{
		$this->db->select("a.id, a.first_name, a.last_name, a.username, a.email");
		$this->db->from("tbl_users a");

		return $this->db->count_all_results();
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
	public function read_user_datatables()
	{
		$this->load->view('master_admin/header');
		$this->load->view('admin/user', $this->data);
		$this->load->view('master_admin/footer');
	}
    public function logout()
    {
        session_destroy();

        redirect('/', 'refresh');
    }
	public function show_privilege_user($user_id)
	{
		$this->db->from("tbl_privileges a");
		$this->db->join("tbl_users b", "a.user_id = b.id");
		$this->db->where("CONCAT(b.username,a.id)", $user_id);
		
		$data = $this->db->get()->row();

		$user = $this->User->get_user_profile($user_id);

		$msg = [];

		$data_array =
		[
			"user_id" => $user->id,
			"data_user_privilege" => $data
		];

		$msg["data"] = $data_array;

		$this->load->view("master_admin/header");
        $this->load->view("admin/privilege_show", $msg);
        $this->load->view("master_admin/footer");
	}
	function save_privilege($user_id)
	{
		$msg = [];

		$count = get_count_privilege();

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

			$this->db->from("tbl_privileges");
			$this->db->where("menu_id", $menu_id);
			$this->db->where("user_id", $user_id);

			if($this->db->get()->num_rows() > 0)
			{
				// UPDATE
				$this->db->set("user_id", $user_id);
				$this->db->set("priv_create", $array_key['c'.$menu_id] == "1" ? 1 : 0);
				$this->db->set("priv_read",   $array_key['r'.$menu_id] == "1" ? 1 : 0);
				$this->db->set("priv_update", $array_key['u'.$menu_id] == "1" ? 1 : 0);
				$this->db->set("priv_delete", $array_key['d'.$menu_id] == "1" ? 1 : 0);
				$this->db->where("menu_id", $menu_id);
				$this->db->update("tbl_privileges");

				$msg["title"] 		= "Succesfully Updated Privilege !";
				$msg["description"] = "";
				$msg["type"]		= "success";
			}
			else
			{
				// INSERT
				$data =
				[
					"user_id" 	  => $user_id,
					"menu_id" 	  => $menu_id,
					"priv_create" => $array_key['c'.$menu_id] == "1" ? 1 : 0,
					"priv_read"   => $array_key['r'.$menu_id] == "1" ? 1 : 0,
					"priv_update" => $array_key['u'.$menu_id] == "1" ? 1 : 0,
					"priv_delete" => $array_key['d'.$menu_id] == "1" ? 1 : 0
				];

				$this->db->insert("tbl_privileges", $data);

				$msg["title"] 		= "Succesfully Updated Privilege !";
				$msg["description"] = "";
				$msg["type"]	  	= "success";
 			}

		endforeach;

		echo json_encode($msg); 
	}
	public function get_suggestion_username()
    {
		$temp = "";

        $first_name = strtolower(str_replace(' ','',$this->input->get('first_name')));
		$last_name  = strtolower(str_replace(' ','',$this->input->get('last_name')));
		$random_num1 = rand(1,12);
		$random_num2 = rand(2,2);
		$random_num3 = rand(3,3);
		$random_num4 = rand(4,5);
		$random_num5 = rand(5,7);
		$random_num6 = rand(6,8);
		$username_suggestion_1 = $first_name.$last_name;
		$username_suggestion_2 = $first_name.$last_name;
		$username_suggestion_3 = $first_name.$last_name;

		$username_arr = [$username_suggestion_1, $username_suggestion_2, $username_suggestion_3];
	
		$this->db->from('tbl_users');
		$this->db->where_in('username', $username_arr);
		$result = $this->db->get();
	
		if($result->num_rows() > 0) 
		{
			$temp = '<option> Username already reserved !</option>';
		}
		else 
		{
			if(empty($username_suggestion_1) && empty($username_suggestion_2) && empty($username_suggestion_3))
			{
				$temp .= '<option></option>';
			} 
			else 
			{
				$temp  = '<option>'.$username_suggestion_1.'_'.$random_num1.$random_num4.'</option>';
				$temp .= '<option>'.$username_suggestion_2.'_'.$random_num2.$random_num5.'</option>';
				$temp .= '<option>'.$username_suggestion_3.'_'.$random_num3.$random_num6.'</option>';
			}
		}

	
        echo json_encode($temp);
    }
}
