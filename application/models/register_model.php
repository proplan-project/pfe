<?php
class Register_model extends CI_Model
{
    function insert($data)
    {
        $this->db->insert('chef_projet', $data);
        return $this->db->insert_id();
    }

    function verify_email($key)
    {
        $this->db->where('verification_key', $key);
        $this->db->where('is_email_verified', 'non');
        $query = $this->db->get('chef_projet');
        if($query->num_rows() > 0)
        {
            $data = array(
                'is_email_verified'  => 'oui'
            );
            $this->db->where('verification_key', $key);
            $this->db->update('chef_projet', $data);
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>
