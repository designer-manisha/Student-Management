<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
    }

    public function login() {
        $this->load->view('home/login');
    }

    public function do_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($email === 'admin@gmail.com' && $password === '12345') {
            $this->session->set_userdata('admin_logged_in', true);
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid Credentials');
            redirect('admin/login');
        }
    }

    public function dashboard() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->load->view('admin/dashboard');
    }

    public function logout() {
        $this->session->unset_userdata('admin_logged_in');
        redirect('admin/login');
    }

    // public function add_teacher() {
    //     $this->load->view('admin/teacher/add_teacher');
    // }
    
    
}
