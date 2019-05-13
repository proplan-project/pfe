<?php

class Commentaire_model extends CI_Model
{
    var $records_per_page = 10;
    var $start_from = 0;
    var $current_page_number = 1;

    function make_query()
    {
        if(isset($_POST["rowCount"]))
        {
            $this->records_per_page = $_POST["rowCount"];
        }
        else
        {
            $this->records_per_page = 10;
        }
        if(isset($_POST["current"]))
        {
            $this->current_page_number = $_POST["current"];
        }
        $this->start_from = ($this->current_page_number - 1) * $this->records_per_page;
        $this->db->select("*");
        $this->db->from("commentaire");
        if(!empty($_POST["searchPhrase"]))
        {
            $this->db->like('description', $_POST["searchPhrase"]);
        }
        if(isset($_POST["sort"]) && is_array($_POST["sort"]))
        {
            foreach($_POST["sort"] as $key => $value)
            {
                $this->db->order_by($key, $value);
            }
        }
        else
        {
            $this->db->order_by('id_commentaire', 'DESC');
        }
        if($this->records_per_page != -1)
        {
            $this->db->limit($this->records_per_page, $this->start_from);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function count_all_data()
    {
        $this->db->select("*");
        $this->db->from("commentaire");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert($data)
    {
        $this->db->insert('commentaire', $data);
    }

    function fetch_single_data($id_commentaire)
    {
        $this->db->where('id_commentaire', $id_commentaire);
        $query = $this->db->get('commentaire');
        return $query->result_array();
    }

    function update($data, $id_commentaire)
    {
        $this->db->where('id_commentaire', $id_commentaire);
        $this->db->update('commentaire', $data);
    }

    function delete($id_commentaire)
    {
        $this->db->where('id_commentaire', $id_commentaire);
        $this->db->delete('commentaire');
    }
}
