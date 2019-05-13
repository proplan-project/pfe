<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Facture extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Facture_model');
    }

    function index()
    {
        $this->load->view('facture_view');
    }

    function fetch_data()
    {
        $data = $this->Facture_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->Facture_model->count_all_data()),
            'rows'   => $array
        );
        echo json_encode($output);
    }

    function action()
    {
        if($this->input->post('operation'))
        {
            $data = array(
                'date_echeance' => $this->input->post('date_echeance'),
                'montant' => $this->input->post("montant"),
                'paiement_recu' => $this->input->post("paiement_recu"),
                'status' => $this->input->post("status"),
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->Facture_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->Facture_model->update($data, $this->input->post('id_facture'));
                echo 'Data Updated';
            }
        }
    }

    function fetch_single_data()
    {
        if($this->input->post('id_facture'))
        {
            $data = $this->Facture_model->fetch_single_data($this->input->post('id_facture'));
            foreach($data as $row)
            {
                $output['date_echeance'] = $row['date_echeance'];
                $output['montant'] = $row['montant'];
                $output['paiement_recu'] = $row['paiement_recu'];
                $output['status'] = $row['status'];
            }
            echo json_encode($output);
        }
    }

    function delete_data()
    {
        if($this->input->post('id_facture'))
        {
            $this->Facture_model->delete($this->input->post('id_facture'));
            echo 'Data Deleted';
        }
    }
}
