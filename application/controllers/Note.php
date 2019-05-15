<?php

class Note extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('note_model');
    }

    function index()
    {
        $this->load->view('note_view');
    }

    function fetch_data()
    {
        $data = $this->note_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->note_model->count_all_data()),
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
                'description' => $this->input->post('description'),
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->note_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->note_model->update($data, $this->input->post('id_note'));
                echo 'Data Updated';
            }
        }
    }

    function fetch_single_data()
    {
        if($this->input->post('id_note'))
        {
            $data = $this->note_model->fetch_single_data($this->input->post('id_note'));
            foreach($data as $row)
            {
                $output['titre'] = $row['titre'];
                $output['description'] = $row['description'];
                $output['date_creation'] = $row['date_creation'];
            }
            echo json_encode($output);
        }
    }

    function delete_data()
    {
        if($this->input->post('id_note'))
        {
            $this->note_model->delete($this->input->post('id_note'));
            echo 'Data Deleted';
        }
    }
}
