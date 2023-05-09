<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RestModel extends CI_Model
{
    public function loginUserModel($phone, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('phone', $phone);
        $this->db->where('password', $password);
        return $this->db->get()->row_array();
    }

    public function registerUserModel($name, $phone, $password)
    {
        $data = array(
            'fullname' =>  $name,
            'phone' =>  $phone,
            'password' => $password,
            'date' => date('H:i:s Y-m-d')
        );

        if ($this->db->insert('users', $data) > 0) {
            return $this->loginUserModel($phone, $password);
        } else {
            return false;
        }
    }

    public function checkRegisteredPhoneModel($phone)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('phone', $phone);
        return $this->db->get()->row_array();
    }

    public function getUserGroupModel($userid)
    {
        $this->db->select('groupid');
        $this->db->from('users');
        $this->db->where('id', $userid);
        $result = $this->db->get()->row_array();

        if ($result['groupid'] != NULL) {
            $this->db->select('fullname, phone, groups.name, groups.id');
            $this->db->from('users');
            $this->db->join('groups', 'groups.id = users.groupid');
            $this->db->where('users.groupid', $result['groupid']);
            return $this->db->get()->result_array();
        } else {
            return false;
        }
    }

    public function getStudentListModel()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('groupid', NULL);
        return $this->db->get()->result_array();
    }

    public function getGroupListModel()
    {
        $this->db->select('*');
        $this->db->from('groups');
        return $this->db->get()->result_array();
    }

    public function joinGroupModel($groupid, $userid)
    {
        $user_data = array(
            'groupid' => $groupid
        );

        $this->db->where('id', $userid);
        return $this->db->update('users', $user_data);
    }

    public function createGroupModel($userid, $name)
    {
        $group_data = array(
            'name' => $name,
            'date' => date('H:i:sA d-m-Y')
        );

        $this->db->insert('groups', $group_data);
        $group_id = $this->db->insert_id();

        $user_data = array(
            'groupid' => $group_id
        );

        $this->db->where('id', $userid);
        return $this->db->update('users', $user_data);
    }

    public function addMemberModel($groupid, $memberid)
    {
        $user_data = array(
            'groupid' => $groupid,
            'date' => date('H:i:sA d-m-Y')
        );

        $this->db->where('id', $memberid);
        return $this->db->update('users', $user_data);
    }

    public function leaveGroupModel($userid)
    {
        $data = array(
            'groupid' => NULL
        );

        $this->db->where('id', $userid);
        $this->db->update('users', $data);
    }

    public function submitEssayTitleModel($userid, $title, $email)
    {
        $this->db->select('groupid');
        $this->db->from('users');
        $this->db->where('id', $userid);
        $result = $this->db->get()->row_array();

        if ($result['groupid'] !== NULL) {
            $data = array(
                'groupid' => $result['groupid'],
                'title' => $title,
                'type' => $email,
                'date' => date('H:i:s Y-m-d')
            );

            if ($this->db->insert('essays', $data) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getVocabularyModel($essayid, $paragraph)
    {
        $this->db->select('type');
        $this->db->from('essays');
        $this->db->where('id', $essayid);
        $result = $this->db->get()->row_array();

        $this->db->select('*');
        $this->db->from('vocabularies');
        $this->db->where('type', $result['type']);
        $this->db->where('paragraph', $paragraph);
        return $this->db->get()->result_array();
    }

    public function setVocabularyModel($essayid, $data, $paragraph)
    {
        $this->db->where('essayid', $essayid);
        $this->db->where('paragraph', $paragraph);
        $this->db->delete('outlines');

        $insert = [];
        $i = 0;

        foreach ($data as $datas) {
            array_push($insert, array(
                'essayid' => $essayid,
                'vocabid' => $datas,
                'position' => ++$i,
                'paragraph' => $paragraph,
                'datetime' => date('H:i:sA d-m-Y')
            ));
        }

        return $this->db->insert_batch('outlines', $insert);
    }

    public function getSubmissionModel($userid)
    {
        $this->db->select('groupid');
        $this->db->from('users');
        $this->db->where('id', $userid);
        $result = $this->db->get()->row_array();

        if ($result['groupid'] !== NULL) {
            $this->db->select('*');
            $this->db->from('essays');
            $this->db->where('groupid', $result['groupid']);
            $this->db->order_by('status', 'ASC');
            $this->db->order_by('id', 'DESC');
            return $this->db->get()->result_array();
        } else {
            return false;
        }
    }

    public function getOutlineModel($essayid)
    {
        $this->db->select('*');
        $this->db->from('essays');
        $this->db->join('outlines', 'outlines.essayid = essays.id');
        $this->db->join('vocabularies', 'vocabid = vocabularies.id');
        $this->db->where('essays.id', $essayid);
        $this->db->order_by('position', 'ASC');
        return $this->db->get()->result_array();
    }

    public function submitOutlineModel($essayid)
    {
        $data = array(
            'status' => 'Submitted'
        );

        $this->db->where('id', $essayid);
        return $this->db->update('essays', $data);
    }

    public function deleteOutlineModel($essayid)
    {
        $this->db->where('id', $essayid);
        return $this->db->delete('essays');
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

        $this->db->select('*');
        $this->db->from('outlines');
        $this->db->where('outlines.paragraph', 3);
        $this->db->where('outlines.essayid', $essay_id);
        $this->db->join('essays', 'essays.id = outlines.essayid');
        $this->db->join('vocabularies', 'outlines.vocabid = vocabularies.id');
        $this->db->order_by('outlines.position', 'ASC');
        $conclusion =  $this->db->get()->result_array();

        return ['intro' => $intro, 'body' => $body, 'conclusion' => $conclusion];
    }
}
