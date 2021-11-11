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
                $data['vocabularies'] = $this->getVocabularyList();
                $this->load->view('VocabularyView.php', $data);
                break;
            case 'submission':
                $data['submissions'] = $this->getSubmissionList();
                $this->load->view('SubmissionView.php', $data);
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
