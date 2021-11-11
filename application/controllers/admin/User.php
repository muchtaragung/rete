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

    public function add()
    {
        $data['title'] = 'Add User | Admin Resource Therapy';
        $this->load->view('admin/user/add', $data);
    }

    public function save()
    {
        $data['nama']     = $this->input->post('nama');
        $data['email']    = $this->input->post('email');
        $data['telepon']  = $this->input->post('telepon');
        $data['profil']   = $this->input->post('profil');
        $data['kota']     = $this->input->post('kota');
        $data['role']     = $this->input->post('role');
        $data['foto']     = $this->_upload();
        $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $this->user->save($data);
        $this->session->set_flashdata('msg', 'User berhasil ditambahkan!');
        redirect('admin/user/list');
    }

    private function _upload()
    {
        $config['upload_path']   = './assets/img/user/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name']     = uniqid();
        $config['overwrite']     = true;
        $config['encrypt_name']  = false;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            // print_r($this->upload->display_errors());
            $this->session->set_flashdata('error', $this->upload->display_errors());
            return redirect('admin/user/list');
        } else {
            return $this->upload->data("file_name");
        }
    }
}
