<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model', 'admin');
        $this->load->model('User_model', 'user');
        $this->load->model('Artikel_model', 'artikel');
        $this->load->model('Comment_model', 'comment');
    }


    public function list()
    {
        $data['title'] = 'List User | Admin Resource Therapy';
        $data['users'] = $this->user->get_all()->result();
        $this->load->view('admin/user/list', $data);
    }
}
