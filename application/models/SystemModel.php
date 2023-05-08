<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SystemModel extends CI_Model
{
    public function getGroupListModel()
    {
        $this->db->select('GROUP_CONCAT(fullname) as student, GROUP_CONCAT(phone) as phone, groups.name as group, groups.id as id');
        $this->db->from('users');
        $this->db->join('groups', 'groups.id = users.groupid');
        $this->db->group_by('groups.id');
        return $this->db->get()->result_array();
    }

    public function getVocabularyListModel()
    {
        $this->db->select('GROUP_CONCAT(word) as word, GROUP_CONCAT(paragraph) as paragraph, GROUP_CONCAT(id) as id, type');
        $this->db->from('vocabularies');
        $this->db->group_by('paragraph');
        $this->db->group_by('type');
        $this->db->order_by('type', 'ASC');
        $this->db->order_by('paragraph', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getSubmissionListModel()
    {
        $this->db->select('GROUP_CONCAT(essays.id) as id, GROUP_CONCAT(title) as title,GROUP_CONCAT(type) as type,GROUP_CONCAT(status) as status,GROUP_CONCAT(essays.date) as date, name');
        $this->db->from('essays');
        $this->db->join('groups', 'groups.id = essays.groupid');
        $this->db->group_by('groups.id');
        return $this->db->get()->result_array();
    }

    public function addNewVocabModel($word, $paragraph, $type)
    {
        $data = array(
            'word' => $word,
            'paragraph' => $paragraph,
            'type' => $type,
            'datetime' => date('H:i:sA d/m/Y')
        );

        return $this->db->insert('vocabularies', $data);
    }

    public function viewOutlineModel($essay_id)
    {
        $this->db->select('*');
        $this->db->from('outlines');
        $this->db->where('outlines.paragraph', 1);
        $this->db->where('outlines.essayid', $essay_id);
        $this->db->join('essays', 'essays.id = outlines.essayid');
        $this->db->join('vocabularies', 'outlines.vocabid = vocabularies.id');
        $this->db->order_by('outlines.position', 'ASC');
        $intro =  $this->db->get()->result_array();

        $this->db->select('*');
        $this->db->from('outlines');
        $this->db->where('outlines.paragraph', 2);
        $this->db->where('outlines.essayid', $essay_id);
        $this->db->join('essays', 'essays.id = outlines.essayid');
        $this->db->join('vocabularies', 'outlines.vocabid = vocabularies.id');
        $this->db->order_by('outlines.position', 'ASC');
        $body =  $this->db->get()->result_array();

        return ['intro' => $intro, 'body' => $body];
    }

    public function deleteGroupModel($group_id)
    {
        $this->db->where('id', $group_id);
        return $this->db->delete('groups');
    }

    public function deleteVocabModel($vocab_id)
    {
        $this->db->where('id', $vocab_id);
        return $this->db->delete('vocabularies');
    }
}
