<?php
class Login_model extends CI_Model
{
    function can_login($email, $password,$db)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($db);
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                if($row->is_email_verified == 'oui')
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