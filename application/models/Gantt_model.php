<?php
class Gantt_model extends CI_Model
{
    function fetch_data()
    {
        $this->db->select("*");
        $this->db->from("projet");
        $this->db->join('tache','projet.id_projet = tache.id_projet');
        $this->db->where('assigne_a',$this->session->userdata['info']['id']);
        $query = $this->db->get();
        return $query;
    }
}