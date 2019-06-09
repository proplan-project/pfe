<?php
class Private_area_model extends CI_Model
{
    function sum_facture()
    {
        $this->db->select_sum('montant');
        $this->db->join('projet','projet.id_projet = facture.id_projet');
        $this->db->where('id_createur',$this->session->userdata['info']['id']);
        $result = $this->db->get('facture')->row();
        return $result->montant;
    }

    function count_all_tache()
    {
        $this->db->select("*");
        $this->db->from("tache");
        $this->db->where('assigne_a',$this->session->userdata['info']['id']);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_projet()
    {
        $this->db->select("*");
        $this->db->from("projet");
        $this->db->where('id_createur',$this->session->userdata['info']['id']);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_client()
    {
        $this->db->select("*");
        $this->db->from("client");
        $this->db->where('id_utilisateur',$this->session->userdata['info']['id']);
        $query = $this->db->get();
        return $query->num_rows();
    }
}