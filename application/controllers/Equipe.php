<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Equipe extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Equipe_model');
        $this->load->model('Equipe_projet_model');
        $this->load->model('Utilisateur_model');
        $this->load->model('Utilisateur_a_equipe_model');
        $this->load->model('profileInfo');
    }

    function index()
    {
        $data['titre']='Les équipes';
        $data['nom'] = $this->profileInfo->get_info();
        $data['utilisateur_equipe'] = $this->Equipe_projet_model->make_query_utilisateur();
        $this->load->view('equipe',$data);
    }

    function detail($id_equipe='')
    {
        $data['titre']='Détaille';
        $data['id_equipe']=$id_equipe;
        $data['nom'] = $this->profileInfo->get_info();
        $data['equipe'] = $this->Equipe_model->fetch_single_data($id_equipe);
        $data['projet'] = $this->Equipe_projet_model->make_query($id_equipe);
        $data['utilisateur'] = $this->Utilisateur_a_equipe_model->make_query($id_equipe);
        $data['all_utilisateur'] = $this->Utilisateur_model->make_query();
        $this->load->view('equipe_detail',$data);
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
                'id_createur' => $this->session->userdata['info']['id'],
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

    function add_utilisateur()
    {
            $data = array(
                'id' => $this->input->post("id"),
                'id_equipe' => $this->input->post("id_equipe"),
            );
			$this->Utilisateur_a_equipe_model->insert($data);
			$message = "L'utilisateur est invité correctement";
			$this->session->set_flashdata('message',$message);
			redirect('equipe/detail');
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
