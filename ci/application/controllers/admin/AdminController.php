<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends Master_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['navigation'] = get_menus_admin();

		$this->load->view('master_admin/header');
		$this->load->view('admin/index', $data);
		$this->load->view('master_admin/footer');
	}

    public function change_password()
    {
        $this->load->view('master_admin/header');
		$this->load->view('admin/change_password');
        $this->load->view('master_admin/footer');
    }

    public function privileges()
    {
        $this->load->view('master_admin/header');
        $this->load->view('admin/privileges');
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
		$columns =
		[
			0 => "first_name",
			1 => "last_name",
			2 => "username",
			3 => "age",
			4 => "gender",
			5 => "email"
 		];

		$draw = $this->input->get("draw");
		$start = $this->input->get("start");
		$length = $this->input->get("length");
		$search = $this->input->get("search")["value"];

		if(!empty($search))
		{
			$this->db->select("a.first_name, a.last_name, a.username, a.age, a.gender, a.email");
			$this->db->from("tbl_users a");
			$this->db->like("lowercase(a.first_name)", $search);
			$this->db->like("lowercase(a.last_name)", $search);
			$this->db->like("lowercase(a.username)", $search);
			$this->db->like("lowercase(a.age)", $search);
			$this->db->like("lowercase(a.gender)", $search);
			$this->db->like("lowercase(a.email)", $search);

			if ($length > 0)
			{
				$this->db->limit($length, $start);
			}

			$users = $this->db->get();
		}
		else
		{
			$this->db->select("a.first_name, a.last_name, a.username, a.age, a.gender, a.email");
			$this->db->from("tbl_users a");

			if ($length > 0)
	        {
			    $this->db->limit($length, $start);
			}

			$users = $this->db->get();
		}

		$data = [];

		foreach($users->result() as $user):
			$row['first_name'] = $user->first_name;
			$row['last_name'] = $user->last_name;
			$row['username'] = $user->username;
			$row['age'] = $user->age;
			$row['gender'] = $user->gender;
			$row['email'] = $user->email;

			$data[] = $row;
		endforeach;

		echo json_encode([
			"draw" => $draw,
			"recordsTotal" => $this->total_user_datatables(),
			"recordsFiltered" => $this->filtered_user_datatables(),
			"data" => $data
		]);
	}

	private function total_user_datatables()
	{
		$start = $this->input->get("start");
		$length = $this->input->get("length");
		$search = $this->input->get("search")["value"];

		if(!empty($search))
		{
			$this->db->select("a.first_name, a.last_name, a.username, a.age, a.gender, a.email");
			$this->db->from("tbl_users a");
			$this->db->like("lowercase(a.first_name)", $search);
			$this->db->like("lowercase(a.last_name)", $search);
			$this->db->like("lowercase(a.username)", $search);
			$this->db->like("lowercase(a.age)", $search);
			$this->db->like("lowercase(a.gender)", $search);
			$this->db->like("lowercase(a.email)", $search);

			if ($length > 0)
			{
				$this->db->limit($length, $start);
			}

			return $this->db->count_all_results();
		}
		else
		{
			$this->db->select("a.first_name, a.last_name, a.username, a.age, a.gender, a.email");
			$this->db->from("tbl_users a");

			return $this->db->count_all_results();
		}
	}

	private function filtered_user_datatables()
	{
		$start = $this->input->get("start");
		$length = $this->input->get("length");
		$search = $this->input->get("search")["value"];

		if(!empty($search))
		{
			$this->db->select("a.first_name, a.last_name, a.username, a.age, a.gender, a.email");
			$this->db->from("tbl_users a");
			$this->db->like("lowercase(a.first_name)", $search);
			$this->db->like("lowercase(a.last_name)", $search);
			$this->db->like("lowercase(a.username)", $search);
			$this->db->like("lowercase(a.age)", $search);
			$this->db->like("lowercase(a.gender)", $search);
			$this->db->like("lowercase(a.email)", $search);

			if ($length > 0)
			{
				$this->db->limit($length, $start);
			}

			return $this->db->count_all_results();
		}
		else
		{
			$this->db->select("a.first_name, a.last_name, a.username, a.age, a.gender, a.email");
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
