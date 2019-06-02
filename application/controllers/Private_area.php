
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Private_area extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profileInfo');
        if(!$this->session->userdata['info']['id'])
        {
            redirect('login');
        }
    }

    function index()
    {
        $data['titre']='Acceuil';
        $data['nom'] = $this->profileInfo->get_info();
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
