<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('error', 'Anda Tidak Login Sebagai Admin');
            redirect('admin/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('admin/dashboard', $data);
    }
}
