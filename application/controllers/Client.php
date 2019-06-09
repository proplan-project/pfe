<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Client_model');
        $this->load->model('profileInfo');
        $this->load->helper('cookie');
    }

    function index()
    {
        $data['titre']='Les clients';
        $data['nom'] = $this->profileInfo->get_info();
        $this->load->view('client',$data);
    }

    function fetch_data()
    {
        $data = $this->Client_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->Client_model->count_all_data()),
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
                'prenom' => $this->input->post("prenom"),
                'nom_entreprise' => $this->input->post("nom_entreprise"),
                'adresse' => $this->input->post("adresse"),
                'ville' => $this->input->post("ville"),
                'code_postal' => $this->input->post("code_postal"),
                'pays' => $this->input->post("pays"),
                'telephone' => $this->input->post("telephone"),
                'site' => $this->input->post("site"),
                'id_utilisateur' =>$this->session->userdata['info']['id'],
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->Client_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->Client_model->update($data, $this->input->post('id_client'));
                echo 'Data Updated';
            }
        }
    }

    function fetch_single_data()
    {
        if($this->input->post('id_client'))
        {
            $data = $this->Client_model->fetch_single_data($this->input->post('id_client'));
            foreach($data as $row)
            {
                $output['nom'] = $row['nom'];
                $output['prenom'] = $row['prenom'];
                $output['nom_entreprise'] = $row['nom_entreprise'];
                $output['adresse'] = $row['adresse'];
                $output['ville'] = $row['ville'];
                $output['code_postal'] = $row['code_postal'];
                $output['pays'] = $row['pays'];
                $output['telephone'] = $row['telephone'];
                $output['site'] = $row['site'];
                $output['id_utilisateur'] = $row['site'];
            }
            echo json_encode($output);
        }
    }

    function delete_data()
    {
        if($this->input->post('id_client'))
        {
            $this->Client_model->delete($this->input->post('id_client'));
            echo 'Data Deleted';
        }
    }

}
?>