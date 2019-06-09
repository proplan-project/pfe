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
}