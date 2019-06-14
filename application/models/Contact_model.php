<?php

class Contact_model extends CI_Model
{
    function insert($data)
    {
        $this->db->insert('contact', $data);
    }
}