<?php


class Utilisateur_equipe_model extends CI_Model
{
    function insert($data)
    {
        return $this->db->insert('utilisateur_a_equipe', $data);
    }
}
