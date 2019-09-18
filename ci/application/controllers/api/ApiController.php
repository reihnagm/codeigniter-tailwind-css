<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/JWT.php';
use \Firebase\JWT\JWT;

class ApiController extends Master_Controller
{
    private $secret = 'this is key secret';

    public function __construct()
    {
        parent::__construct();

        // ALLOWING CORS
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
    }

    public function user_get_all()
    {
        response($this->User->api_user_get_all());
    }

    public function user_get($id)
    {
        response($this->User->api_user_get_all('id', $id));
    }

    public function user_register()
    {
        response($this->User->api_user_register());
    }

    public function user_login()
    {
        $date = new DateTime();

        if(!$this->User->is_valid())
        {
            $this->response([
                'success' => FALSE,
                'message' => 'email atau password salah!'
            ]);
        }

        $user = $this->User->api_user_get_all('email', $this->input->post('email'));

        $payload['id']      = $user->id;
        $payload['email']   = $user->email;
        $payload['iat']     = $date->getTimeStamp();
        $payload['exp']     = $date->getTimeStamp() + 120*50*2;

        $output['id_token'] = JWT::encode($payload, $this->secret);
        response($output);
    }

    public function check_token()
    {
        $jwt = $this->input->get_request_header('Authorization');

        try
        {
            $decoded = JWT::decode($jwt, $this->secret, array('HS256'));
            return $decoded->id;
        }
        catch(\Exception $e)
        {
            return $this->response([
                "success" => FALSE,
                "message" => 'gagal! error token!'
            ], 401);
        }
    }

    public function get_input()
    {
        $this->input->post();
        return json_decode(file_get_contents('php://input')); // TIDAK ADA $_PUT, ALTERNATIVE
    }

    public function user_update($id)
    {
        $data = $this->get_input();
        if($this->protected_method($id))
        {
            return response($this->User->api_user_update($id, $data));
        }
    }

    public function user_delete($id)
    {
        if($this->protected_method($id))
        {
            return response($this->User->api_user_delete($id));
        }

    }

    public function protected_method($id)
    {
        if($id_from_token = $this->check_token())
        {
            if($id_from_token === $id)
            {
                return TRUE;
            }
            else
            {
                return $this->response([
                    "success" => FALSE,
                    "message" => 'user yang login berbeda!'
                ], 403);
            }
        }
    }

}
