<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        $this->load->model('Admin_model', 'admin');
        $this->load->model('User_model', 'user');
        $this->load->model('Artikel_model', 'artikel');
        $this->load->model('Comment_model', 'comment');
    }

    public function admin_login()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }

        $data['title'] = 'Login';
        $this->load->view('admin/login');
    }

    public function admin_auth()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->admin->get_where(['email' => $email])->row();

        if ($user) {
            if (password_verify($password, $user->password)) {
                $data = [
                    'email' => $user->email,
                    'role' => 'admin'
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('error', 'Email Atau Password Salah');
                redirect('admin/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Akun Tidak Terdaftar');
            redirect('admin/login');
        }
    }

    public function user_login()
    {

        $data['title'] = 'Login';
        $this->load->view('login');
    }

    public function user_auth()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->user->get_where(['email' => $email])->row();

        if ($user) {
            if (password_verify($password, $user->password)) {
                $data = [
                    'email' => $user->email,
                    'nama' => $user->nama,
                    'id_user' => $user->id_user,
                    'role' => $user->role
                ];
                $this->session->set_userdata($data);
                redirect('artikel');
            } else {
                $this->session->set_flashdata('error', 'Email Atau Password Salah');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('error', 'Akun Tidak Terdaftar');
            redirect('login');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('login');
    }
}
