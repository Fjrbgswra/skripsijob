<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
                
        $this->load->library('form_validation','session');
        $this->load->model('AdministratorModel');
    }
    public function index()
    {
        $this->load->view('user/login');
    }
        public function login(){
        $data['page_title'] = 'Log In';
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('user/login', $data);
        } else {
            // Get username
    $username = $this->input->post('username');
    // Get & encrypt password
    $password = md5($this->input->post('password'));
    // Login user
    $user_id = $this->User_model->login($username, $password);
    if($user_id){
        // Buat session
        $user_data = array(
            'user_id' => $user_id,
            'username' => $username,
            'level' => $user_id['level'],
            'logged_in' => true
        );
         $this->session->set_userdata($user_data);
         $this->session->set_flashdata('user_loggedin', 'You are now logged in');
            if ($user_data['level'] == '0') {
                    redirect('Blog');
                }else{
                    redirect('Admin','refresh');
                }
            } else {
        // Set message
                $this->session->set_flashdata('login_failed', 'Login is invalid');
                redirect('User/login');
            } 
}}
         public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        // Set message
        $this->session->set_flashdata('user_loggedout', 'Anda sudah log out');
        redirect('Biodata');
    }
}