<?php
class Fichier_model extends CI_Model
{

    function make_query($id_projet)
    {
        $this->db->select("*");
        $this->db->from('fichier');
        $this->db->where('id_projet',$id_projet);
        $query = $this->db->get();
        return $query->result_array();
    }
}