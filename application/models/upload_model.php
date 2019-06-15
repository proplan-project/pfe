<?php
/**
 * Created by PhpStorm.
 * User: FatimaZahra
 * Date: 13/06/2019
 * Time: 16:43
 */

class upload_model extends CI_Model
{
    function get_data(){
        $query = $this->db->get('fichier');
        return $query->result_array();
    }
    function  insert($data){
        $this->db->insert('fichier', $data);
    }
}