<?php

class Facture_model extends CI_Model
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
        $this->db->from('facture');
        $this->db->join('projet','projet.id_projet = facture.id_projet');
        $this->db->join('client','client.id_client = facture.id_client');
        $this->db->where('id_createur',$this->session->userdata['info']['id']);
        if(!empty($_POST["searchPhrase"]))
        {
            $this->db->like('Numero', $_POST["searchPhrase"]);
            $this->db->or_like('date_facture', $_POST["searchPhrase"]);
            $this->db->or_like('montant', $_POST["searchPhrase"]);
            $this->db->or_like('paiement_recu', $_POST["searchPhrase"]);
            $this->db->or_like('date_echeance', $_POST["searchPhrase"]);
            //$this->db->or_like('status', $_POST["searchPhrase"]);
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
            $this->db->order_by('id_facture', 'DESC');
        }
        if($this->records_per_page != -1)
        {
            $this->db->limit($this->records_per_page, $this->start_from);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    // listes de facture d'un seul projet
    function list_facture_projet($id_projet='')
    {
        $id_projet=$_POST["id"];
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
        $this->db->from('facture');
        //$this->db->join('projet','projet.id_projet = facture.id_projet');
        //$this->db->join('client','client.id_client = facture.id_client');
        $this->db->where('id_projet',$id_projet);
        if(!empty($_POST["searchPhrase"]))
        {
            $this->db->like('date_facture', $_POST["searchPhrase"]);
            $this->db->or_like('date_echeance', $_POST["searchPhrase"]);
            $this->db->or_like('montant', $_POST["searchPhrase"]);
            //$this->db->or_like('paiement_recu', $_POST["paiement_recu"]);
            //$this->db->or_like('status', $_POST["searchPhrase"]);
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
            $this->db->order_by('id_facture', 'DESC');
        }
        if($this->records_per_page != -1)
        {
            $this->db->limit($this->records_per_page, $this->start_from);
        }
        $query = $this->db->get();
        //echo $query->result_array();

        return $query->result_array();
    }


    function check_facture($id_projet)
    {

        //select if( sum(facture.paiement_recu) = projet.prix , 1,0)   status_payement from facture join projet on facture.id_projet = projet.id_projet where projet.id_projet = 28
        $this->db->select('if( sum(facture.paiement_recu) = projet.prix , 1,0) as status_payement');

        $this->db->from('facture');
        $this->db->join('projet','facture.id_projet = projet.id_projet');

        $this->db->where('facture.id_projet',$id_projet);
        $this->db->where('facture.status != \'brouillon\' AND facture.status != \'impayé\'');

        $query = $this->db->get();
        $sum = $query->result_array();
        return  $sum[0]['status_payement'] ;  // retourne 1 ou 0 3la 7ssab total payé  si total payé = montant d projet retourne 1
    }

    function payment_done($id_projet)
    {
        $this->db->where('id_projet', $id_projet);
        $this->db->update('facture', '$data');
    }
    function count_all_data()
    {
        $this->db->select("*");
        $this->db->from('facture');
        $this->db->join('projet','projet.id_projet = facture.id_projet');
        $this->db->where('id_createur',$this->session->userdata['info']['id']);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function insert($data)
    {
        $this->db->insert('facture', $data);
    }

    function fetch_single_data($id_facture)
    {
        //$this->db->from('facture');

        $this->db->join('projet','projet.id_projet = facture.id_projet');
        $this->db->join('client','client.id_client = facture.id_client');
        $this->db->where('id_facture', $id_facture);
        $query = $this->db->get('facture');
        return $query->result_array();
    }

    // fetch facture d'un seul projet
    function fetch_single_projet_facture($id_projet)
    {

        //$this->db->from('facture');
        //$this->db->join('projet','projet.id_projet = facture.id_projet');
        //$this->db->join('client','client.id_client = facture.id_client');
        $this->db->where('id_projet', $this->input->post('id_projet'));
        $query = $this->db->get('facture');
        // print_r($query->result_array());
        return $query->result_array();
    }

    function update($data, $id_facture)
    {
        $this->db->where('id_facture', $id_facture);
        $this->db->update('facture', $data);
    }

    function delete($id_facture)
    {
        $this->db->where('id_facture', $id_facture);
        $this->db->delete('facture');
    }
}
