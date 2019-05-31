<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('id'))
        {
            redirect('private_area');
        }
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('register_model');
    }

    function index()
    {
        $this->load->view('register');
    }

    function validation()
    {
        $this->form_validation->set_rules('user_name', 'Nom', 'required|trim');
        $this->form_validation->set_rules('user_prenom', 'Prenom', 'required|trim');
            $this->form_validation->set_rules('adresse', 'Adresse', 'required|trim');
        $this->form_validation->set_rules('tel', 'Telephone', 'required|trim');
        $this->form_validation->set_rules('user_email', 'Address Email', 'required|trim|valid_email|is_unique[codeigniter_register.email]');
        $this->form_validation->set_rules('user_password', 'Mot de pass', 'required');
        if($this->form_validation->run())
        {
            $verification_key = md5(rand());
           /* $encrypted_password = $this->encryption->encrypt($this->input->post('user_password'));*/
            $data = array(
                'nom'  => $this->input->post('user_name'),
                'prenom'  => $this->input->post('user_prenom'),
                'adresse'  => $this->input->post('adresse'),
                'tel'  => $this->input->post('tel'),
                'email'  => $this->input->post('user_email'),
                'password' => $this->input->post('user_password'),
                'verification_key' => $verification_key
            );
            $id = $this->register_model->insert($data);
            if($id > 0)
            {
                $mg = Mailgun::create('key-61da27ef9ce66a35d52647281b7b961f');
                $result = $mg->messages()->send('golaxi.com', array(
                    'from'    => 'proplan@golaxi.com',
                    'to'      => $this->input->post('user_email'),
                    'subject' => 'Veuillez vérifier votre email pour vous connecter',
                    'text'    => "<p>Salut ".$this->input->post('user_name')."</p>
                                  <p>Ceci est un courrier électronique de vérification envoyé par le système Codeigniter Login Register.
                                    Pour compléter le processus d'inscription et vous connecter au système. D'abord, vous voulez vérifier votre courrier en cliquant dessus 
                                  <a href='".base_url()."register/verify_email/".$verification_key."'>lien</a>.</p>
                                  <p>Une fois que vous avez cliqué sur ce lien, votre email sera vérifié et vous pourrez vous connecter au système..</p>
                                  <p>Merci,</p>"
                ));

                if($result)
                {
                    $this->verify();
                }else{

                    $message =  $this->email->print_debugger();
                    $this->session->set_flashdata('message', $message);
                    redirect('register');
                }
            }
        }
        else
        {
            $this->index();
        }
    }

    function verify_email()
    {
        if($this->uri->segment(3))
        {
            $verification_key = $this->uri->segment(3);
            if($this->register_model->verify_email($verification_key))
            {
                $data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'login">here</a></h1>';
            }
            else
            {
                $data['message'] = '<h1 align="center">Invalid Link</h1>';
            }
            $this->load->view('email_verification', $data);
        }
    }

    function verify(){
        $this->load->view('verify');
    }

}

?>
