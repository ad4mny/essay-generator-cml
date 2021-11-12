<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index()
    {
        $this->load->view('templates/Header.php');
        $this->load->view('LoginView.php');
        $this->load->view('templates/Footer.php');
    }

    public function loginUser()
    {
        $phone = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $return = $this->LoginModel->loginUserModel($phone, $password);

        if ($return  !== NULL) {
            $this->session->set_userdata('id', $return['id']);
            $this->session->set_userdata('name', $return['fullname']);
            redirect(base_url() . 'dashboard');
        } else {
            $this->session->set_tempdata('error', 'Wrong username or password.', 1);
            redirect(base_url());
        }
    }
}
