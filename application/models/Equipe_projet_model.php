<?php

class Equipe_projet_model extends CI_Model
{
    function insert($data)
    {
        $this->db->insert('equipe_a_projet', $data);
    }
}