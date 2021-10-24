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

    public function submitEssayTitle()
    {
        $userid = $this->input->post('userid');
        $title = $this->input->post('title');
        $email = $this->input->post('email');
        echo json_encode($this->RestModel->submitEssayTitleModel($userid, $title, $email));
        exit;
    }

    public function getVocabulary()
    {
        $paragraph = $this->input->post('paragraph');
        $essayid = $this->input->post('essayid');
        echo json_encode($this->RestModel->getVocabularyModel($essayid, $paragraph));
        exit;
    }

    public function setVocabulary()
    {
        $essayid = $this->input->post('essayid');
        $data = $this->input->post('data');
        echo json_encode($this->RestModel->setVocabularyModel($essayid, $data));
        exit;
    }

    public function getSubmission()
    {
        $userid = $this->input->post('userid');
        echo json_encode($this->RestModel->getSubmissionModel($userid));
        exit;
    }

    public function getOutline()
    {
        $essayid = $this->input->post('essayid');
        echo json_encode($this->RestModel->getOutlineModel($essayid));
        exit;
    }
}
