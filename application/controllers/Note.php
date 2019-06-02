<?php

class Note extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('note_model');
        $this->load->model('projet_model');
        $this->load->model('profileInfo');
    }

    function index()
    {
        $data['titre']='Les projets';
        $data['nom'] = $this->profileInfo->get_info();
        $data['all_projet'] = $this->projet_model->all_projet();
        $this->load->view('note',$data);
    }

    function fetch_data()
    {
        $data = $this->note_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $row[]=$row['titre'];
            $row[]=$row['description'];
            $row[]=$row['date_creation'];
            $row[]=$row['titre_projet'];
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

    function note_projet($id_projet='')
    {
        $data = $this->note_model->note_projet($id_projet);
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
                'id_projet' => $this->input->post('id_projet'),
                'id_utilisateur' => $this->session->userdata['info']['id'],
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

    function action_note($id_projet='')
    {
        if($this->input->post('operation'))
        {
            $data = array(
                'titre' => $this->input->post('titre'),
                'description' => $this->input->post('description'),
                'id_projet' => $id_projet,
                'id_utilisateur' => $this->session->userdata['info']['id'],
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
                $output['id_projet'] = $row['id_projet'];
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
