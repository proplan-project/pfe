<?php
class Chef_projet_model extends CI_Model
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
        $this->db->from('chef_projet');
        if(!empty($_POST["searchPhrase"]))
        {
            //$this->db->like('titre_Utilisateur', $_POST["searchPhrase"]);
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
        $this->db->from("chef_projet");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert($data)
    {
        $this->db->insert('chef_projet', $data);
    }

    function fetch_single_data($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('chef_projet');
        return $query->result_array();
    }

    function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('chef_projet', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('chef_projet');
    }
}