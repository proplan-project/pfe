<?php

class Equipe_projet_model extends CI_Model
{
    function insert($data)
    {
        $this->db->insert('equipe_a_projet', $data);
    }

    function make_query($id_equipe)
    {
        $this->db->select("*");
        $this->db->from("projet");
        $this->db->join('equipe_a_projet','equipe_a_projet.id_projet = projet.id_projet');
        $this->db->where('id_equipe', $id_equipe);
        $query = $this->db->get();
        return $query->result_array();
    }
    function make_query_utilisateur()
    {
        $this->db->select("*");
        $this->db->from('utilisateur');
        $this->db->join('utilisateur_a_equipe','utilisateur_a_equipe.id = utilisateur.id');
        $this->db->join('equipe','equipe.id_equipe = utilisateur_a_equipe.id_equipe');
        $this->db->where('utilisateur.id',$this->session->userdata['info']['id']);
        $query = $this->db->get();
        return $query->result_array();
    }
}