<?php
class Utilisateur_a_equipe_model extends CI_Model
{
    function make_query($id_equipe)
    {
        $this->db->select("*");
        $this->db->from("utilisateur");
        $this->db->join('utilisateur_a_equipe','utilisateur_a_equipe.id = utilisateur.id');
        $this->db->where('id_equipe', $id_equipe);
        $query = $this->db->get();
        return $query->result_array();
    }
}
