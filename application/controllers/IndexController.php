<?php
header("Access-Control-Allow-Origin: *");

class IndexController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('templates/headers.php');
        $this->load->view('templates/navigations.php');
        $this->load->view('IndexInterface.php');
        $this->load->view('templates/modals.php');
        $this->load->view('templates/footers.php');
    }
}
