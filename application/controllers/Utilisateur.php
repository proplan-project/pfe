<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Utilisateur extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Utilisateur_model');
    } 

    /*
     * Listing of utilisateur
     */
    function index()
    {
        $data['utilisateur'] = $this->Utilisateur_model->get_all_utilisateur();
        
        $data['_view'] = 'utilisateur/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new utilisateur
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('is_admin','Is Admin','required');
		$this->form_validation->set_rules('password','Password','required|max_length[50]');
		$this->form_validation->set_rules('nom','Nom','required|max_length[50]');
		$this->form_validation->set_rules('prenom','Prenom','required|max_length[50]');
		$this->form_validation->set_rules('type','Type','required|max_length[150]');
		$this->form_validation->set_rules('email','Email','required|max_length[100]|valid_email');
		$this->form_validation->set_rules('tel','Tel','required|integer');
		$this->form_validation->set_rules('genre','Genre','required');
		$this->form_validation->set_rules('date_creation','Date Creation','required');
		$this->form_validation->set_rules('image','Image','required');
		$this->form_validation->set_rules('adresse','Adresse','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'is_admin' => $this->input->post('is_admin'),
				'id_createur' => $this->input->post('id_createur'),
				'password' => $this->input->post('password'),
				'nom' => $this->input->post('nom'),
				'prenom' => $this->input->post('prenom'),
				'type' => $this->input->post('type'),
				'email' => $this->input->post('email'),
				'tel' => $this->input->post('tel'),
				'genre' => $this->input->post('genre'),
				'date_creation' => $this->input->post('date_creation'),
				'image' => $this->input->post('image'),
				'adresse' => $this->input->post('adresse'),
            );
            
            $utilisateur_id = $this->Utilisateur_model->add_utilisateur($params);
            redirect('utilisateur/index');
        }
        else
        {			$data['all_utilisateur'] = $this->Utilisateur_model->get_all_utilisateur();
            
            $data['_view'] = 'utilisateur/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a utilisateur
     */
    function edit($id_utilisateur)
    {   
        // check if the utilisateur exists before trying to edit it
        $data['utilisateur'] = $this->Utilisateur_model->get_utilisateur($id_utilisateur);
        
        if(isset($data['utilisateur']['id_utilisateur']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('is_admin','Is Admin','required');
			$this->form_validation->set_rules('password','Password','required|max_length[50]');
			$this->form_validation->set_rules('nom','Nom','required|max_length[50]');
			$this->form_validation->set_rules('prenom','Prenom','required|max_length[50]');
			$this->form_validation->set_rules('type','Type','required|max_length[150]');
			$this->form_validation->set_rules('email','Email','required|max_length[100]|valid_email');
			$this->form_validation->set_rules('tel','Tel','required|integer');
			$this->form_validation->set_rules('genre','Genre','required');
			$this->form_validation->set_rules('date_creation','Date Creation','required');
			$this->form_validation->set_rules('image','Image','required');
			$this->form_validation->set_rules('adresse','Adresse','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'is_admin' => $this->input->post('is_admin'),
					'id_createur' => $this->input->post('id_createur'),
					'password' => $this->input->post('password'),
					'nom' => $this->input->post('nom'),
					'prenom' => $this->input->post('prenom'),
					'type' => $this->input->post('type'),
					'email' => $this->input->post('email'),
					'tel' => $this->input->post('tel'),
					'genre' => $this->input->post('genre'),
					'date_creation' => $this->input->post('date_creation'),
					'image' => $this->input->post('image'),
					'adresse' => $this->input->post('adresse'),
                );

                $this->Utilisateur_model->update_utilisateur($id_utilisateur,$params);            
                redirect('utilisateur/index');
            }
            else
            {				$data['all_utilisateur'] = $this->Utilisateur_model->get_all_utilisateur();

                $data['_view'] = 'utilisateur/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The utilisateur you are trying to edit does not exist.');
    } 

    /*
     * Deleting utilisateur
     */
    function remove($id_utilisateur)
    {
        $utilisateur = $this->Utilisateur_model->get_utilisateur($id_utilisateur);

        // check if the utilisateur exists before trying to delete it
        if(isset($utilisateur['id_utilisateur']))
        {
            $this->Utilisateur_model->delete_utilisateur($id_utilisateur);
            redirect('utilisateur/index');
        }
        else
            show_error('The utilisateur you are trying to delete does not exist.');
    }
    
}
