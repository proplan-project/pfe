<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Note extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Note_model');
    } 

    /*
     * Listing of note
     */
    function index()
    {
        $data['note'] = $this->Note_model->get_all_note();
        
        $data['_view'] = 'note/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new note
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('titre','Titre','required|max_length[50]');
		$this->form_validation->set_rules('date_creation','Date Creation','required');
		$this->form_validation->set_rules('description','Description','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'id_projet' => $this->input->post('id_projet'),
				'id_createur' => $this->input->post('id_createur'),
				'titre' => $this->input->post('titre'),
				'date_creation' => $this->input->post('date_creation'),
				'description' => $this->input->post('description'),
            );
            
            $note_id = $this->Note_model->add_note($params);
            redirect('note/index');
        }
        else
        {
			$this->load->model('Projet_model');
			$data['all_projet'] = $this->Projet_model->get_all_projet();

			$this->load->model('Utilisateur_model');
			$data['all_utilisateur'] = $this->Utilisateur_model->get_all_utilisateur();
            
            $data['_view'] = 'note/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a note
     */
    function edit($id_note)
    {   
        // check if the note exists before trying to edit it
        $data['note'] = $this->Note_model->get_note($id_note);
        
        if(isset($data['note']['id_note']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('titre','Titre','required|max_length[50]');
			$this->form_validation->set_rules('date_creation','Date Creation','required');
			$this->form_validation->set_rules('description','Description','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'id_projet' => $this->input->post('id_projet'),
					'id_createur' => $this->input->post('id_createur'),
					'titre' => $this->input->post('titre'),
					'date_creation' => $this->input->post('date_creation'),
					'description' => $this->input->post('description'),
                );

                $this->Note_model->update_note($id_note,$params);            
                redirect('note/index');
            }
            else
            {
				$this->load->model('Projet_model');
				$data['all_projet'] = $this->Projet_model->get_all_projet();

				$this->load->model('Utilisateur_model');
				$data['all_utilisateur'] = $this->Utilisateur_model->get_all_utilisateur();

                $data['_view'] = 'note/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The note you are trying to edit does not exist.');
    } 

    /*
     * Deleting note
     */
    function remove($id_note)
    {
        $note = $this->Note_model->get_note($id_note);

        // check if the note exists before trying to delete it
        if(isset($note['id_note']))
        {
            $this->Note_model->delete_note($id_note);
            redirect('note/index');
        }
        else
            show_error('The note you are trying to delete does not exist.');
    }
    
}
