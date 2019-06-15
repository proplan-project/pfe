<?php
/**
 * Created by PhpStorm.
 * User: FatimaZahra
 * Date: 04/06/2019
 * Time: 06:24
 */

require 'vendor/autoload.php';
use Mailgun\Mailgun;

class resetAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('resetpassAdmin');
        $this->load->library('form_validation');
    }

    function index(){
        $this->load->view('resetAdmin');
    }

    function resetpasswordAdmin(){
        $this->form_validation->set_rules('user_email', 'Address Email', 'required|trim|valid_email');
        $email = $this->input->post('user_email');
        if($this->form_validation->run()) {
            $result = $this->resetpassAdmin->resetpassword($email);
            foreach ($result as $row) {
                echo $row['nom'];
                $mg = Mailgun::create('key-61da27ef9ce66a35d52647281b7b961f');
                $result = $mg->messages()->send('golaxi.com', array(
                    'from'    => 'proplan@golaxi.com',
                    'to'      => $this->input->post('user_email'),
                    'subject' => 'Renitialisation de mot de pass',
                    'html'    => "Salut ".$row['nom']."
                                     Ceci est un courrier électronique de mot de pass oublie , envoyé par le système ProPlan.
                                    Pour compléter le processus et vous connecter au système. D'abord, vous voulez vérifier votre courrier en cliquant dessus 
                                  <a href='".base_url()."resetAdmin/verify_passwordAdmin/".$row[verification_key]."'>lien</a>.</p>
                                  <p>Merci ./p>"
                ));

                if($result)
                {
                    $message = 'verifier votre boite email';
                    $this->session->set_flashdata('message', $message);
                    redirect('resetAdmin');
                }else{

                    $message =  $this->email->print_debugger();
                    $this->session->set_flashdata('message', $message);
                    redirect('resetAdmin');
                }
            }
        }else{
            $this->index();
        }
    }

    function verify_passwordAdmin(){
        if($this->uri->segment(3))
        {
            $data['key'] =  $this->uri->segment(3);
            $this->load->view('adminforget',$data);

        }
    }

    function modifierPass(){
        if ($_POST){
            $this->form_validation->set_rules('pass1', 'Mot De Pass', 'required');
            $this->form_validation->set_rules('pass2', 'Mot De Pass', 'required');
            $pass1 = $this->input->post('pass1');
            $pass2 = $this->input->post('pass2' );
            $data['key']   = $this->input->post('hidden' );
            if($this->form_validation->run()) {
                if ($pass1 == $pass2){
                    $this->resetpassAdmin->modifier($pass1,$this->input->post('hidden' ));
                    $this->load->view('adminforget',$data);
                    $messagepass = 'le mot de pass bien modifie';
                    $this->session->set_flashdata('messagepass',$messagepass);
                }else{
                    $message = 'les mots de pass pas identique';
                    $this->session->set_flashdata('message',$message);
                    $this->load->view('userforget',$data);
                }
            }else{
                $this->load->view('userforget',$data);
            }
        }
    }
}