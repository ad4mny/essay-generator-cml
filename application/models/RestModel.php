<?php
class RestModel extends CI_Model
{
    public function getGroupAPIModel($userid)
    {
        $this->db->select('groupid');
        $this->db->from('users');
        $this->db->where('id', $userid);
        $result = $this->db->get()->row_array();

        if ($result['groupid'] != NULL) {
            $this->db->select('phone, groups.name');
            $this->db->from('users');
            $this->db->join('groups', 'groups.id = users.groupid');
            $this->db->where('users.groupid', $result['groupid']);
            return $this->db->get()->result_array();
        } else {
            return false;
        }
    }

    public function createGroupAPIModel($userid, $name, $member = [])
    {
        $group_data = array(
            'name' => $name,
            'date' => date('H:i:sA d-m-Y')
        );

        $this->db->insert('groups', $group_data);
        $group_id = $this->db->insert_id();

        $member_data = [];

        foreach ($member as $person) {
            array_push($member_data, array(
                'phone' => $person,
                'password' => md5($person),
                'groupid' => $group_id,
                'date' => date('H:i:sA d-m-Y')
            ));
        }

        $this->db->insert_batch('users', $member_data);

        $user_data = array(
            'groupid' => $group_id
        );

        $this->db->where('id', $userid);
        return $this->db->update('users', $user_data);
    }
}
