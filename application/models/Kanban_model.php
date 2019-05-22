<?php


class Kanban_model extends CI_Model
{
    function fetch_taches_afaire()
    {
        $this->db->select("*");
        $this->db->from("tache");
        $this->db->where("status" , "à faire");
        $query = $this->db->get();
        return $query;
    }
    function fetch_taches_encours()
    {
        $this->db->select("*");
        $this->db->from("tache");
        $this->db->where("status" , "en cours");
        $query = $this->db->get();
        return $query;
    }
    function fetch_taches_termine()
    {
        $this->db->select("*");
        $this->db->from("tache");
        $this->db->where("status" , "terminé");
        $query = $this->db->get();
        return $query;
    }
    function update_item_status($id)
    {
        $this->db->set('status', 'en cours');
        $this->db->where('id_tache', $id);
        $this->db->update('tache');
    }
}