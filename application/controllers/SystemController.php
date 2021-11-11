<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SystemController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SystemModel');
    }

    public function index($page = 'dashboard')
    {
        $this->load->view('templates/Header.php');
        $this->load->view('templates/Navigation.php');

        switch ($page) {
            case 'vocabulary':
                break;
            case 'submission':
                break;
            default:
                $data['dashboards'] = $this->getGroupList();
                $this->load->view('DashboardView.php', $data);
                break;
        }

        $this->load->view('templates/Footer.php');
    }

    public function getGroupList()
    {
        return $this->SystemModel->getGroupListModel();
    }
}
