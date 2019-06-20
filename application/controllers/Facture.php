<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Facture extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Facture_model');
        $this->load->model('Client_model');
        $this->load->model('projet_model');
        $this->load->model('profileInfo');
    }

    function index()
    {
        $data['titre']='Les factures';
        $data['nom'] = $this->profileInfo->get_info();
        $data['all_client'] = $this->Client_model->make_query();
        $data['all_projet'] = $this->projet_model->all_projet();
        $this->load->view('facture',$data);
    }

    function detail($id_facture='')
    {
        $data['titre']='Détaille';
        $data['id_facture']=$id_facture;
        $data['nom'] = $this->profileInfo->get_info();
        $data['facture'] = $this->Facture_model->fetch_single_data($id_facture);
        $this->load->view('facture_detail',$data);
    }

    function fetch_data()
    {
        $data = $this->Facture_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $row[]=$row['Numero'];
            $row[]=$row['date_facture'];
            $row[]=$row['date_echeance'];
            $row[]=$row['montant'];
            $row[]=$row['paiement_recu'];
            $row[]=$row['status'];
            $row[]=$row['titre_projet'];
            $row[]=$row['nom'];
            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->Facture_model->count_all_data()),
            'rows'   => $array
        );
        echo json_encode($output);
    }

    function fetch_facture_projet($id_projet='')
    {
        $data = $this->Facture_model->make_query();
        $array = array();
        foreach($data as $row)
        {

            $row[]=$row['Numero'];
            $row[]=$row['date_facture'];
            $row[]=$row['date_echeance'];
            $row[]=$row['montant'];
            $row[]=$row['paiement_recu'];
            $row[]=$row['status'];

            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->Facture_model->count_all_data()),
            'rows'   => $array
        );
        echo json_encode($output);
    }

    // view diyal list_facture_projet
    function list_facture_projet($id_facture='')
    {
        $data['titre']='Factures du projet';
        $data['id_facture']=$id_facture;
        $data['nom'] = $this->profileInfo->get_info();
        $data['facture'] = $this->Facture_model->fetch_single_projet_facture($id_facture);
        $this->load->view('facture_projet',$data);
    }



    function facture_projet()
    {
        $data = $this->Facture_model->list_facture_projet($_POST["id"]);


        $array = array();
        foreach($data as $row)
        {
            $row[]=$row['Numero'];
            $row[]=$row['date_facture'];
            $row[]=$row['date_echeance'];
            $row[]=$row['montant'];
            $row[]=$row['paiement_recu'];
            $row[]=$row['status'];

            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->Facture_model->count_all_data()),
            'rows'   => $array
        );
        echo json_encode($output);
    }

    function action()
    {
        if($this->input->post('operation'))
        {
            $data = array(
                'Numero' => substr(time() * rand(2, 9), 0 , 7 ),//$this->input->post('Numero'),
                'date_echeance' => $this->input->post('date_echeance'),
                'montant' => $this->input->post("montant"),
                'paiement_recu' => $this->input->post("paiement_recu"),
                'status' => $this->input->post("status"),
                'id_client' => $this->input->post("id_client"),
                'id_projet' => $this->input->post("id_projet"),
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->Facture_model->insert($data);
                if ( 1 ){
                    $sum = $this->Facture_model->check_facture($this->input->post("id_projet"));

                    echo  $sum[0];
                }
                // echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->Facture_model->update($data, $this->input->post('id_facture'));

                if (  $this->Facture_model->check_facture($this->input->post("id_projet"))  ){

                }
                echo 'Data Updated';
            }
        }
    }


    function action_facture($id_projet='')
    {
        if($this->input->post('operation'))
        {
            $data = array(
                'Numero' => $this->input->post('Numero'),
                'date_echeance' => $this->input->post('date_echeance'),
                'montant' => $this->input->post("montant"),
                'paiement_recu' => $this->input->post("paiement_recu"),
                'status' => $this->input->post("status"),
                'id_client' => $this->input->post("id_client"),
                'id_projet' =>$id_projet,
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->Facture_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->Facture_model->update($data, $this->input->post('id_facture'));
                echo 'Data Updated';
            }
        }
    }


    function fetch_single_data()
    {
        if($this->input->post('id_facture'))
        {
            $data = $this->Facture_model->fetch_single_data($this->input->post('id_facture'));
            foreach($data as $row)
            {
                $output['Numero'] = $row['Numero'];
                $output['date_echeance'] = $row['date_echeance'];
                $output['prix'] = $row['prix'];
                $output['paiement_recu'] = $row['paiement_recu'];
                $output['id_client'] = $row['id_client'];
                $output['id_projet'] = $row['id_projet'];
            }
            echo json_encode($output);
        }
    }

    function delete_data()
    {
        if($this->input->post('id_facture'))
        {
            $this->Facture_model->delete($this->input->post('id_facture'));
            echo 'Data Deleted';
        }
    }
}
