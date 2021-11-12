<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SystemController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SystemModel');

        // Check login authentication
        if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
            redirect(base_url());
        }
    }

    public function index($page = 'dashboard')
    {
        $this->load->view('templates/Header.php');
        $this->load->view('templates/Navigation.php');

        switch ($page) {
            case 'vocabulary':
                $data['vocabularies'] = $this->getVocabularyList();
                $this->load->view('VocabularyView.php', $data);
                break;
            case 'submission':
                $data['submissions'] = $this->getSubmissionList();
                $this->load->view('SubmissionView.php', $data);
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                $data['dashboards'] = $this->getGroupList();
                $this->load->view('DashboardView.php', $data);
                break;
        }

        $this->load->view('templates/Footer.php');
    }

    public function logout()
	{
		$session_data = array(
			'id',
			'name'
		);

		$this->session->set_tempdata('notice', 'You have logout successfully.', 1);
		$this->session->unset_userdata($session_data);
		redirect(base_url());
	}

    public function getGroupList()
    {
        return $this->SystemModel->getGroupListModel();
    }

    public function getVocabularyList()
    {
        return $this->SystemModel->getVocabularyListModel();
    }

    public function getSubmissionList()
    {
        return $this->SystemModel->getSubmissionListModel();
    }

    public function addNewVocab()
    {
        $word = $this->input->post('word');
        $paragraph = $this->input->post('paragraph');
        $type = $this->input->post('type');

        if ($this->SystemModel->addNewVocabModel($word, $paragraph, $type) !== false) {
            $this->session->set_tempdata('notice', 'Succesfully added a new vocabulary.', 1);
            redirect(base_url() . 'vocabulary');
        } else {
            $this->session->set_tempdata('notice', 'Failed to add a new vocabulary.', 1);
            redirect(base_url() . 'vocabulary');
        }
    }
}
