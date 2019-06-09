<?php
class login_admin_model extends CI_Model
{
    function can_login($email, $password,$db)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($db);
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                if($password == $row->password)
                {
                    $info = array(
                        'id' => $row->id,
                        'db' => $db
                    );
                    $this->session->set_userdata('info', $info);
                }
                else
                {
                   return 'Wrong Password';
                }
            }
        }
        else
        {
            return 'Wrong Email Address';
        }
    }
}