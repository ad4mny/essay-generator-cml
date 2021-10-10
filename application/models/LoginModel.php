<?php
class LoginModel extends CI_Model
{
    public function loginAPIModel($phone, $password)
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

    public function registerAPIModel($name, $phone, $password)
    {
        $data = array(
            'fullname' =>  $name,
            'phone' =>  $phone,
            'password' => $password,
            'date' => date('H:i:s Y-m-d')
        );

        if ($this->db->insert('users', $data) > 0) {
            return $this->loginAPIModel($phone, $password);
        } else {
            return false;
        }
    }
}
