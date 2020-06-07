<?php

class AuthenticationModel extends CI_Model{

    function login($email){
        return $this->db->get_where('pengguna', ['email' => $email])->row_array();
    }

    function check($email){
        return $this->db->query("SELECT * FROM konsumen WHERE email = '$email'")->row_array();
    }

    function insert_data($email, $password){
        $data = [
            'email' => $email,
            'password' => $password,
            'hak_akses' => 1
        ];

        $this->db->insert('pengguna', $data);
    }

    function check2($email){
        return $this->db->query("SELECT * FROM pengguna WHERE email = '$email'")->row_array();
    }
}

?>