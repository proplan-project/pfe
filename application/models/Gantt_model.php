<?php
class Gantt_model extends CI_Model
{
    function fetch_data()
    {
        $this->db->select("*");
        $this->db->from("tache");
        $query = $this->db->get();
        return $query;
    }
}