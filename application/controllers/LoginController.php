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
        $phone = $this->input->post('phone');
        $password = md5($this->input->post('password'));
        echo json_encode($this->LoginModel->loginUserModel($phone, $password));
        exit;
    }

    public function registerUser()
    {
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $password = md5($this->input->post('password'));

        if ($this->checkRegisteredPhone($phone) !== NULL) {

            echo json_encode('Phone number already registered.');
            exit;
        } else {

            $return = $this->LoginModel->registerUserModel($name, $phone, $password);

            if ($return !== false) {
                echo json_encode($return);
                exit;
            } else {
                echo json_encode(false);
                exit;
            }
        }
    }

    public function checkRegisteredPhone($phone)
    {
        return $this->LoginModel->checkRegisteredPhoneModel($phone);
    }
}
