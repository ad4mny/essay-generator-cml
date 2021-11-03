<?php
class RestModel extends CI_Model
{
    public function getGroupModel($userid)
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
        $this->db->select('groupid');
        $this->db->from('users');
        $this->db->where('id', $userid);
        $result = $this->db->get()->row_array();

        $data = array(
            'groupid' => NULL
        );

        $this->db->where('groupid', $result['groupid']);
        $this->db->update('users', $data);

        $this->db->where('id', $result['groupid']);
        $this->db->delete('groups');
    }

    public function submitEssayTitleModel($userid, $title, $email)
    {
        $data = array(
            'userid' => $userid,
            'title' => $title,
            'type' => $email,
            'date' => date('H:i:s Y-m-d')
        );

        if ($this->db->insert('essays', $data) > 0) {
            return true;
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
        $this->db->select('*');
        $this->db->from('essays');
        $this->db->where('userid', $userid);
        $this->db->order_by('status', 'ASC');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
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
}
