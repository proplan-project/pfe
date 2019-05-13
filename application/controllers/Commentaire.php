<?php
class Commentaire extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Commentaire_model');
    }

    function index()
    {
        $this->load->view('Commentaire_view');
    }

    function fetch_data()
    {
        $data = $this->Commentaire_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->Commentaire_model->count_all_data()),
            'rows'   => $array
        );
        echo json_encode($output);
    }

    function action()
    {
        if($this->input->post('operation'))
        {
            $data = array(
                'description' => $this->input->post('description'),
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->Commentaire_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->Commentaire_model->update($data, $this->input->post('id_commentaire'));
                echo 'Data Updated';
            }
        }
    }

    function fetch_single_data()
    {
        if($this->input->post('id_commentaire'))
        {
            $data = $this->Commentaire_model->fetch_single_data($this->input->post('id_commentaire'));
            foreach($data as $row)
            {
                $output['description'] = $row['description'];
                $output['date_creation'] = $row['date_creation'];
            }
            echo json_encode($output);
        }
    }

    function delete_data()
    {
        if($this->input->post('id_commentaire'))
        {
            $this->Commentaire_model->delete($this->input->post('id_commentaire'));
            echo 'Data Deleted';
        }
    }
    
}
