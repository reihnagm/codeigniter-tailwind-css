<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends Master_Controller
{
	public $get_menus_admin = [];

	public function __construct()
	{
		parent::__construct();

		$this->get_menus_admin["navigation"] = get_menus_admin();
	}

	public function index()
	{
		$this->load->view('master_admin/header');
		$this->load->view('admin/index', $this->get_menus_admin);
		$this->load->view('master_admin/footer');
	}

    public function change_password()
    {
        $this->load->view('master_admin/header');
		$this->load->view('admin/change_password', $this->get_menus_admin);
        $this->load->view('master_admin/footer');
    }

    public function privileges()
    {
        $this->load->view('master_admin/header');
        $this->load->view('admin/privileges', $this->get_menus_admin);
        $this->load->view('master_admin/footer');
    }

    public function permissions_user()
    {
        $this->load->view('master_admin/header');
        $this->load->view('admin/permissions_user');
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
			4 => "age",
		 	5 => "gender",
			6 => "email",
			7 => "created_at",
			8 => "updated_at"
 		];

		$draw = $this->input->get("draw");
		$start = $this->input->get("start");
		$length = $this->input->get("length");
		$search = $this->input->get("search")["value"];

		if(!empty($search))
		{
			$sql = "SELECT a.id, a.first_name, a.last_name, a.username, a.email, a.age, a.gender, a.created_at, a.updated_at
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
			$this->db->select("a.id, a.first_name, a.last_name, a.username, a.age, a.gender, a.email, a.created_at, a.updated_at");
			$this->db->from("tbl_users a");

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
			$row['age'] = $user->age;
			$row['gender'] = $user->gender;
			$row['email'] = $user->email;
			$row['created_at'] = date("M jS, Y", strtotime($user->created_at));
			$row['updated_at'] = date("M jS, Y", strtotime($user->updated_at));

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

					<div class="flex items-center">
						<div class="w-1/2 px-3">
							<div class="mb-4">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[0].'">
							   		'.$key[0].'
							 	</label>
							 	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[0].'" type="text" placeholder="'.$key[0].'" value="'.$user['id'].'" disabled>
						   	</div>

							<div class="mb-4">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[1].'">
							   		'.$key[1].'
							 	</label>
							 	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[1].'" type="text" placeholder="'.$key[1].'" value="'.$user['first_name'].'">
						   	</div>

							<div class="mb-4">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[2].'">
							   		'.$key[2].'
							 	</label>
							 	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[1].'" type="text" placeholder="'.$key[1].'" value="'.$user['last_name'].'">
						   	</div>

							<div class="mb-4">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[3].'">
							   		'.$key[3].'
							 	</label>
							 	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[3].'" type="text" placeholder="'.$key[3].'" value="'.$user['username'].'">
						   	</div>
						</div>

						<div class="w-1/2 px-3">
							<div class="mb-4">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[4].'">
							   		'.$key[4].'
							 	</label>
							 	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[4].'" type="text" placeholder="'.$key[4].'" value="'.$user['email'].'">
						   	</div>

							<div class="mb-4">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[5].'">
							   		'.$key[5].'
							 	</label>
							 	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[5].'" type="text" placeholder="'.$key[5].'" value="'.$user['gender'].'">
						   	</div>

							<div class="mb-4">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[6].'">
							   		'.$key[6].'
							 	</label>
							 	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[6].'" type="text" placeholder="'.$key[6].'" value="'.$user['age'].'">
						   	</div>

							<div class="mb-4">
							 	<label class="block text-gray-700 text-sm font-bold mb-2" for="'.$key[7].'">
							   		'.$key[7].'
							 	</label>
							 	<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'.$key[7].'" type="text" placeholder="'.$key[7].'" value="'.$user['created_at'].'">
						   	</div>
						</div>
					</div>

					<div class="flex justify-end pt-2">
						<button class="px-2 py-2 bg-pink-500 rounded-lg text-white hover:text-pink-300 mr-2">Submit</button>
						<button onclick="close_modal();" class="px-2 py-2 bg-pink-500 rounded-lg text-white hover:text-pink-300">Close</button>
					</div>

				</div>

			</div>

		</div>';

		echo json_encode([
			"temp" => $temp
		]);
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
			OR CAST(a.age as TEXT) LIKE '{$search}%'
			OR a.gender LIKE '%{$search}%'";

			return $this->db->query($sql)->row_array()["count"];
		}
		else
		{
			$this->db->select("a.id, a.first_name, a.last_name, a.username, a.age, a.gender, a.email, a.created_at, a.updated_at");
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
			OR CAST(a.age as TEXT) LIKE '{$search}%'
			OR a.gender LIKE '%{$search}%'";

			return $this->db->query($sql)->row_array()["count"];
		}
		else
		{
			$this->db->select("a.id, a.first_name, a.last_name, a.username, a.age, a.gender, a.email, a.created_at, a.updated_at");
			$this->db->from("tbl_users a");

			return $this->db->count_all_results();
		}
	}

    public function logout()
    {
        session_destroy();

        redirect('/', 'refresh');
    }
}
