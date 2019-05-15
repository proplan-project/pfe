<?php
class Login_model extends CI_Model
{
    function can_login($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('chef_projet');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                if($row->is_email_verified == 'oui')
                {
                    /*$store_password = $this->encrypt->decode($row->password);*/
                    if($password == $row->password)
                    {
                        return $this->session->set_userdata('id', $row->id_chef);
                    }
                    else
                    {
                        return 'Wrong Password';
                    }
                }
                else
                {
                    return 'First verified your email address';
                }
            }
        }
        else
        {
            return 'Wrong Email Address';
        }
    }
}

?>