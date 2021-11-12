<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') or exit('No direct script access allowed');

class RestController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RestModel');
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

    public function getUserGroup()
    {
        $userid = $this->input->post('userid');
        echo json_encode($this->RestModel->getUserGroupModel($userid));
        exit;
    }

    public function getStudentList()
    {
        echo json_encode($this->RestModel->getStudentListModel());
        exit;
    }

    public function getGroupList()
    {
        echo json_encode($this->RestModel->getGroupListModel());
        exit;
    }

    public function joinGroup()
    {
        $groupid = $this->input->post('group');
        $userid = $this->input->post('userid');
        echo json_encode($this->RestModel->joinGroupModel($groupid, $userid));
        exit;
    }

    public function createGroup()
    {
        $userid = $this->input->post('userid');
        $name = $this->input->post('name');
        echo json_encode($this->RestModel->createGroupModel($userid, $name));
        exit;
    }

    public function addMember()
    {
        $groupid = $this->input->post('groupid');
        $memberid = $this->input->post('member');
        echo json_encode($this->RestModel->addMemberModel($groupid, $memberid));
        exit;
    }

    public function leaveGroup()
    {
        $userid = $this->input->post('userid');
        echo json_encode($this->RestModel->leaveGroupModel($userid));
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
        $paragraph = $this->input->post('paragraph');
        echo json_encode($this->RestModel->setVocabularyModel($essayid, $data, $paragraph));
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

    public function submitOutline()
    {
        $essayid = $this->input->post('essayid');
        echo json_encode($this->RestModel->submitOutlineModel($essayid));
        exit;
    }
    
    public function deleteOutline()
    {
        $essayid = $this->input->post('essayid');
        echo json_encode($this->RestModel->deleteOutlineModel($essayid));
        exit;
    }
}
