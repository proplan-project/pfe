<?php

class Contact_model extends CI_Model
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
        $this->db->from('contact');
        if(!empty($_POST["searchPhrase"]))
        {
            //$this->db->like('titre_projet', $_POST["searchPhrase"]);
            //$this->db->or_like('description', $_POST["searchPhrase"]);
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
            $this->db->order_by('id', 'DESC');
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
        $this->db->from("contact");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert($data)
    {
        $this->db->insert('contact', $data);
    }

    function fetch_single_data($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('contact');
        return $query->result_array();
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('contact');
    }
}