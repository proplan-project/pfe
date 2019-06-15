<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Projet extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('projet_model');
        $this->load->model('Client_model');
        $this->load->model('Equipe_model');
        $this->load->model('Equipe_projet_model');
        $this->load->model('profileInfo');
    }

    function index()
    {
        $data['titre']='Les projets';
        $data['nom'] = $this->profileInfo->get_info();
        $data['all_client'] = $this->Client_model->make_query();
        $data['utilisateur_projet'] = $this->projet_model->make_query_utilisateur();
        $this->load->view('projet',$data);
    }

    function detail($id_projet='')
    {
        $data['titre']='Détaille';
        $data['id_projet']=$id_projet;
        $data['nom'] = $this->profileInfo->get_info();
        $data['projet'] = $this->projet_model->fetch_single_data($id_projet);
        $data['all_equipe'] = $this->Equipe_model->make_query();
        $data['all_client'] = $this->Client_model->make_query();
        $this->load->view('projet_detail',$data);
    }

    function fetch_data()
    {
        $data = $this->projet_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $row[]=$row['titre_projet'];
            $row[]=$row['description'];
            $row[]=$row['date_debut'];
            $row[]=$row['date_limite'];
            $row[]=$row['date_creation'];
            $row[]=$row['status'];
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
                'titre_projet' => $this->input->post('titre_projet'),
                'description' => $this->input->post("description"),
                'date_debut' => $this->input->post("date_debut"),
                'date_limite' => $this->input->post("date_limite"),
                'status' => $this->input->post("status"),
                'prix' => $this->input->post("prix"),
                'id_client' => $this->input->post("id_client"),
                'id_createur' =>$this->session->userdata['info']['id'],
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
    function add_equipe()
    {
        if($this->input->post('operation'))
        {
            $data = array(
                'id_projet' => $this->input->post("id_projet"),
                'id_equipe' => $this->input->post("id_equipe"),
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->Equipe_projet_model->insert($data);
                echo 'Data Inserted';
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
                $output['titre_projet'] = $row['titre_projet'];
                $output['description'] = $row['description'];
                $output['date_debut'] = $row['date_debut'];
                $output['date_limite'] = $row['date_limite'];
                $output['status'] = $row['status'];
                $output['prix'] = $row['prix'];
                $output['id_projet'] = $row['id_projet'];
                $output['id_client'] = $row['id_client'];
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
