<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Projet extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('projet_model');
    }

    function index()
    {
        $this->load->view('projet_view');
    }

    function fetch_data()
    {
        $data = $this->projet_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->projet_model->count_all_data()),
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
                'prix' => $this->input->post("prix"),
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->projet_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->projet_model->update($data, $this->input->post('id_projet'));
                echo 'Data Updated';
            }
        }
    }

    function fetch_single_data()
    {
        if($this->input->post('id_projet'))
        {
            $data = $this->projet_model->fetch_single_data($this->input->post('id_projet'));
            foreach($data as $row)
            {
                $output['titre'] = $row['titre'];
                $output['description'] = $row['description'];
                $output['date_debut'] = $row['date_debut'];
                $output['date_limite'] = $row['date_limite'];
                $output['status'] = $row['status'];
                $output['prix'] = $row['prix'];
            }
            echo json_encode($output);
        }
    }

    function delete_data()
    {
        if($this->input->post('id_projet'))
        {
            $this->projet_model->delete($this->input->post('id_projet'));
            echo 'Data Deleted';
        }
    }
}
