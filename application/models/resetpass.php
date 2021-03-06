<?php

class resetpass extends CI_Model
{
    function resetpassword($email){
        $this->db->where('email', $email);
        $query = $this->db->get('utilisateur');
        if ($query->num_rows()>0){
            return $query->result_array();
        }
        else{
            $message = 'email existe pas';
            $this->session->set_flashdata('message',$message);
            redirect('reset');
        }
    }

    function modifier($pass,$key){

        $this->db->where('verification_key', $key);
        $data = array(
            'password' =>password_hash($pass, PASSWORD_DEFAULT)
        );
        $query = $this->db->update('utilisateur',$data);
    }
}