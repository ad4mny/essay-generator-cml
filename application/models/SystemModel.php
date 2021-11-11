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
}
