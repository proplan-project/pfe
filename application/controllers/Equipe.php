<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipe extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Equipe_model');
    }

    function index()
    {
        $this->load->view('equipe_view');
    }

    function fetch_data()
    {
        $data = $this->Equipe_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->Equipe_model->count_all_data()),
            'rows'   => $array
        );
        echo json_encode($output);
    }

    function action()
    {
        if($this->input->post('operation'))
        {
            $data = array(
                'nom' => $this->input->post('nom'),
                'titre_emploi' => $this->input->post("titre_emploi"),
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->Equipe_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->Equipe_model->update($data, $this->input->post('id_equipe'));
                echo 'Data Updated';
            }
        }
    }

    function fetch_single_data()
    {
        if($this->input->post('id_equipe'))
        {
            $data = $this->Equipe_model->fetch_single_data($this->input->post('id_equipe'));
            foreach($data as $row)
            {
                $output['nom'] = $row['nom'];
                $output['titre_emploi'] = $row['titre_emploi'];
            }
            echo json_encode($output);
        }
    }

    function delete_data()
    {
        if($this->input->post('id_equipe'))
        {
            $this->Equipe_model->delete($this->input->post('id_equipe'));
            echo 'Data Deleted';
        }
    }
    
}
