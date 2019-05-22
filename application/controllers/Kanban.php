<?php


class Kanban extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kanban_model');
    }

    function index()
    {
        $data["taches_afaire"] = $this->Kanban_model->fetch_taches_afaire();
        $data["taches_encours"] = $this->Kanban_model->fetch_taches_encours();
        $data["taches_termine"] = $this->Kanban_model->fetch_taches_termine();
        $this->load->view('Kanban_view', $data);
    }

    function  update_item_status($id){
        $this->Kanban_model->update_item_status($id);
        redirect('base_url()/kanban');
    }


}