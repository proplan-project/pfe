<?php

class Utilisateur_model extends CI_Model
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
        $this->db->from('utilisateur');
        //$this->db->where('id_createur',$this->session->userdata['info']['id']);
        if(!empty($_POST["searchPhrase"]))
        {
            $this->db->like('nom', $_POST["searchPhrase"]);
            $this->db->or_like('prenom', $_POST["searchPhrase"]);
            $this->db->or_like('type', $_POST["searchPhrase"]);
            $this->db->or_like('email', $_POST["searchPhrase"]);
        }
        $this->db->having('id_createur',$this->session->userdata['info']['id']);
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
        $this->db->from("utilisateur");
        $this->db->where('id_createur',$this->session->userdata['info']['id']);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert($data)
    {
        $this->db->insert('utilisateur', $data);
    }

    function fetch_single_data($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('utilisateur');
        return $query->result_array();
    }

    function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('utilisateur', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('utilisateur');
    }
}
