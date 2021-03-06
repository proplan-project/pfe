
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Private_area extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profileInfo');
        $this->load->model('Private_area_model');
        $this->load->helper('cookie');
        if(!$this->session->userdata['info']['id'])
        {
            redirect('login');
        }
    }

    function index()
    {
        $data['titre']='Acceuil';
        $data['nom'] = $this->profileInfo->get_info();
        $data['sum_facture'] = $this->Private_area_model->sum_facture();
        $data['taches'] = $this->Private_area_model->count_all_tache();
        $data['projets'] = $this->Private_area_model->count_all_projet();
        $data['clients'] = $this->Private_area_model->count_all_client();
        $this->load->view('home',$data);
    }

    function logout()
    {
        $data = $this->session->all_userdata();
        foreach($data as $row => $rows_value)
        {
            $this->session->unset_userdata($row);
        }
        redirect('login');
    }
}

?>
