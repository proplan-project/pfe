<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Utilisateur extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Utilisateur_model');
        $this->load->model('profileInfo');
    }

    function index()
    {
        $data['titre']='Les Utilisateurs';
        $data['nom'] = $this->profileInfo->get_info();
        $this->load->view('utilisateur',$data);
    }

    function fetch_data()
    {
        $data = $this->Utilisateur_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            //$row[]=$row['titre_Utilisateur'];
            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->Utilisateur_model->count_all_data()),
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
                'prenom' => $this->input->post('prenom'),
                'type' => $this->input->post('type'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'genre' => $this->input->post('genre'),
                'id_createur' =>$this->session->userdata['info']['id'],
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->Utilisateur_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->Utilisateur_model->update($data, $this->input->post('id'));
                echo 'Data Updated';
            }
        }
    }

    function fetch_single_data()
    {
        if($this->input->post('id'))
        {
            $data = $this->Utilisateur_model->fetch_single_data($this->input->post('id'));
            foreach($data as $row)
            {
                $output['nom'] = $row['nom'];
                $output['prenom'] = $row['prenom'];
                $output['type'] = $row['type'];
                $output['email'] = $row['email'];
                $output['password'] = $row['password'];
                $output['genre'] = $row['genre'];
            }
            echo json_encode($output);
        }
    }

    function delete_data()
    {
        if($this->input->post('id'))
        {
            $this->Utilisateur_model->delete($this->input->post('id'));
            echo 'Data Deleted';
        }
    }
}
