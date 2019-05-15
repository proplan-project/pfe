<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tache extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tache_model');
    }

    function index()
    {
        $this->load->view('tache_view');
    }

    function fetch_data()
    {
        $data = $this->tache_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->tache_model->count_all_data()),
            'rows'   => $array
        );
        echo json_encode($output);
    }

    function action()
    {
        if($this->input->post('operation'))
        {
            $data = array(
                'titre' => $this->input->post('titre'),
                'description' => $this->input->post("description"),
                'date_debut' => $this->input->post("date_debut"),
                'date_limite' => $this->input->post("date_limite"),
                'status' => $this->input->post("status"),
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->tache_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->tache_model->update($data, $this->input->post('id_tache'));
                echo 'Data Updated';
            }
        }
    }

    function fetch_single_data()
    {
        if($this->input->post('id_tache'))
        {
            $data = $this->tache_model->fetch_single_data($this->input->post('id_tache'));
            foreach($data as $row)
            {
                $output['titre'] = $row['titre'];
                $output['description'] = $row['description'];
                $output['date_debut'] = $row['date_debut'];
                $output['date_limite'] = $row['date_limite'];
                $output['status'] = $row['status'];
            }
            echo json_encode($output);
        }
    }

    function delete_data()
    {
        if($this->input->post('id_tache'))
        {
            $this->tache_model->delete($this->input->post('id_tache'));
            echo 'Data Deleted';
        }
    }
}
