<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class tache extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tache_model');
        $this->load->model('projet_model');
        $this->load->model('profileInfo');
    }

    function index()
    {
        $data['titre']='Les tâches';
        $data['nom'] = $this->profileInfo->get_info();
        $data['all_projet'] = $this->projet_model->all_projet();
        $this->load->view('tache',$data);
    }

    function fetch_data()
    {
        $data = $this->tache_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $row[]=$row['titre'];
            $row[]=$row['description'];
            $row[]=$row['date_debut'];
            $row[]=$row['date_limite'];
            $row[]=$row['status'];
            $row[]=$row['titre_projet'];
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

    function tache_projet($id_projet='')
    {
        $data = $this->tache_model->tache_projet($id_projet);
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
                'id_projet' => $this->input->post("id_projet"),
                'assigne_a' =>$this->session->userdata['info']['id'],
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

    function action_tache($id_projet='')
    {
        if($this->input->post('operation'))
        {
            $data = array(
                'titre' => $this->input->post('titre'),
                'description' => $this->input->post("description"),
                'date_debut' => $this->input->post("date_debut"),
                'date_limite' => $this->input->post("date_limite"),
                'status' => $this->input->post("status"),
                'id_projet' => $id_projet,
                'assigne_a' =>$this->session->userdata['info']['id'],
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
