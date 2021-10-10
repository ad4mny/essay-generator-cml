<?php
header("Access-Control-Allow-Origin: *");

class RestController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RestModel');
    }

    public function getGroupAPI()
    {
        $userid = $this->input->post('userid');
        echo json_encode($this->RestModel->getGroupAPIModel($userid));
        exit;
    }

    public function createGroupAPI()
    {
        $userid = $this->input->post('userid');
        $name = $this->input->post('name');
        $member = $this->input->post('member');
        echo json_encode($this->RestModel->createGroupAPIModel($userid, $name, $member));
        exit;
    }
}
