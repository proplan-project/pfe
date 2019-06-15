<?php
/**
 * Created by PhpStorm.
 * User: FatimaZahra
 * Date: 04/06/2019
 * Time: 06:47
 */

class resetpassAdmin extends CI_Model
{
    function resetpassword($email){
        $this->db->where('email', $email);
        $query = $this->db->get('chef_projet');
        if ($query->num_rows()>0){
            return $query->result_array();
        }
        else{
            $message = 'email existe pas';
            $this->session->set_flashdata('message',$message);
            redirect('resetAdmin');
        }
    }

    function modifier($pass,$key){

        $this->db->where('verification_key', $key);
        $data = array(
            'password' =>password_hash($pass, PASSWORD_DEFAULT)
        );
        $query = $this->db->update('chef_projet',$data);
    }
}