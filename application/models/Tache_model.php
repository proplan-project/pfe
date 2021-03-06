<?php
class Tache_model extends CI_Model
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
        $this->db->from("projet");
        $this->db->join('tache','projet.id_projet = tache.id_projet');
        //$this->db->where('assigne_a',$this->session->userdata['info']['id']);
        if(!empty($_POST["searchPhrase"]))
        {
            $this->db->like('titre', $_POST["searchPhrase"]);
            $this->db->or_like('tache.description', $_POST["searchPhrase"]);
            $this->db->or_like('tache.date_debut', $_POST["searchPhrase"]);
            $this->db->or_like('tache.date_limite', $_POST["searchPhrase"]);
            $this->db->or_like('tache.status', $_POST["searchPhrase"]);
        }
        $this->db->having('assigne_a',$this->session->userdata['info']['id']);
        if(isset($_POST["sort"]) && is_array($_POST["sort"]))
        {
            foreach($_POST["sort"] as $key => $value)
            {
                $this->db->order_by($key, $value);
            }
        }
        else
        {
            $this->db->order_by('id_tache', 'DESC');
        }
        if($this->records_per_page != -1)
        {
            $this->db->limit($this->records_per_page, $this->start_from);
        }
        $query = $this->db->get();
        return $query->result_array();
    }


    function check_taches($id_projet)
    {

        $query =     $this->db->query('select count(*) tache from tache where id_projet = 17 union select count(*) from tache where id_projet = 17 and status = \'terminé\' ');



        $sum = $query->result_array();

        return  $sum[0]['tache'] ==  $sum[1]['tache']  ;
    }


    function tache_projet($id_projet)
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
        $this->db->from("tache");
        $this->db->where('id_projet',$id_projet);
        if(!empty($_POST["searchPhrase"]))
        {
            $this->db->like('titre', $_POST["searchPhrase"]);
            $this->db->or_like('description', $_POST["searchPhrase"]);
            $this->db->or_like('date_debut', $_POST["searchPhrase"]);
            $this->db->or_like('date_limite', $_POST["searchPhrase"]);
            $this->db->or_like('status', $_POST["searchPhrase"]);

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
            $this->db->order_by('id_tache', 'DESC');
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
        $this->db->from("tache");
        $this->db->where('assigne_a',$this->session->userdata['info']['id']);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert($data)
    {
        $this->db->insert('tache', $data);
    }

    function fetch_single_data($id_tache)
    {
        $this->db->where('id_tache', $id_tache);
        $query = $this->db->get('tache');
        return $query->result_array();
    }

    function update($data, $id_tache)
    {
        if ( $data['status'] == 'terminé' )  $data['percent_complete']  = 100;
        $this->db->where('id_tache', $id_tache);
        $this->db->update('tache', $data);
        if ( $this->check_taches($data['id_projet']) == 1 ) {
            $this->db->update('projet',$data,array('status' => 'terminé'),'id_projet = ' + $data['id_projet'] );
            //$this->db->query("UPDATE projet SET status = 'terminé' WHERE id_projet = " + $data['id_projet'] );
        }
    }

    function delete($id_tache)
    {
        $this->db->where('id_tache', $id_tache);
        $this->db->delete('tache');
    }
}
