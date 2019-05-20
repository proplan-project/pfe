<?php
class Export_csv_model extends CI_Model
{
    function fetch_data()
    {
        $this->db->select("*");
        $this->db->from('client');
        return $this->db->get();
    }
}

?>

