<?php

class Projet_model extends CI_Model
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
        $this->db->from('projet');
        $this->db->join('client','client.id_client = projet.id_client');
        $this->db->where('id_createur',$this->session->userdata['info']['id']);
        if(!empty($_POST["searchPhrase"]))
        {
            $this->db->like('titre_projet', $_POST["searchPhrase"]);
            $this->db->or_like('description', $_POST["searchPhrase"]);
            $this->db->or_like('date_debut', $_POST["searchPhrase"]);
            $this->db->or_like('date_limite', $_POST["searchPhrase"]);
            $this->db->or_like('date_creation', $_POST["searchPhrase"]);
            $this->db->or_like('status', $_POST["searchPhrase"]);
            $this->db->or_like('prix', $_POST["searchPhrase"]);
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
            $this->db->order_by('id_projet', 'DESC');
        }
        if($this->records_per_page != -1)
        {
            $this->db->limit($this->records_per_page, $this->start_from);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    function make_query_utilisateur()
    {
        $this->db->select("*");
        $this->db->from('utilisateur');
        $this->db->join('utilisateur_a_equipe','utilisateur_a_equipe.id = utilisateur.id');
        $this->db->join('equipe_a_projet','equipe_a_projet.id_equipe = utilisateur_a_equipe.id_equipe');
        $this->db->join('projet','projet.id_projet = equipe_a_projet.id_projet');
        $this->db->where('utilisateur.id',$this->session->userdata['info']['id']);
        $query = $this->db->get();
        return $query->result_array();
    }


    function all_projet()
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
        $this->db->from('projet');
        $this->db->where('id_createur',$this->session->userdata['info']['id']);
        if(!empty($_POST["searchPhrase"]))
        {
            $this->db->like('titre_projet', $_POST["searchPhrase"]);
            $this->db->or_like('description', $_POST["searchPhrase"]);
            $this->db->or_like('date_debut', $_POST["searchPhrase"]);
            $this->db->or_like('date_limite', $_POST["searchPhrase"]);
            $this->db->or_like('date_creation', $_POST["searchPhrase"]);
            $this->db->or_like('status', $_POST["searchPhrase"]);
            $this->db->or_like('prix', $_POST["searchPhrase"]);
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
            $this->db->order_by('id_projet', 'DESC');
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
        $this->db->from("projet");
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert($data)
    {
        $this->db->insert('projet', $data);
    }

    function fetch_single_data($id_projet)
    {
        $this->db->where('id_projet', $id_projet);
        $query = $this->db->get('projet');
        return $query->result_array();
    }

    function update($data, $id_projet)
    {
        $this->db->where('id_projet', $id_projet);
        $this->db->update('projet', $data);
    }

    function delete($id_projet)
    {
        $this->db->where('id_projet', $id_projet);
        $this->db->delete('projet');
    }
}
