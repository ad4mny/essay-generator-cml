<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function loginUserModel($phone, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('phone', $phone);
        $this->db->where('password', $password);
        return $this->db->get()->row_array();
    }
}
