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

    public function checkRegisteredPhoneModel($phone)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('phone', $phone);
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
}
