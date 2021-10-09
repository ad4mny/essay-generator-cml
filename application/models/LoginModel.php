<?php
class LoginModel extends CI_Model
{
    public function loginAuthModel($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user_data');
        $this->db->where('ud_username', $username);
        $this->db->where('ud_password', $password);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            $result = $query->row_array();

            $data = array(
                'ud_log' => date('Y-m-d H:i:s')
            );

            $this->db->where('ud_id', $result['ud_id']);
            $this->db->update('user_data', $data);

            return $result;
        } else {
            return false;
        }
    }

    public function checkUsernameModel($username)
    {
        $this->db->select('*');
        $this->db->from('user_data');
        $this->db->where('ud_username', $username);
        return $this->db->get()->row_array();
    }

    public function createUserAccountModel($username, $password, $name, $contact, $role)
    {
        $data = array(
            'ud_full_name' =>  $name,
            'ud_username' =>  $username,
            'ud_password' => $password,
            'ud_contact' => $contact,
            'ud_role' => $role,
            'ud_log' => date('H:i:s Y-m-d')
        );

        if ($this->db->insert('user_data', $data) > 0) {
            return $this->loginAuthModel($username, $password);
        } else {
            return false;
        }
    }
}
