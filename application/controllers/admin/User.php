<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('error', 'Anda Tidak Login Sebagai Admin');
            redirect('admin/login');
        }

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
        $data['slug']    = $this->input->post('slug');
        $data['foto']     = $this->_upload($data['slug']);
        $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $this->user->save($data);
        $this->session->set_flashdata('msg', 'User berhasil ditambahkan!');
        redirect('admin/user/list');
    }

    public function edit($id_user)
    {
        $data['title'] = 'Edit User | Admin Resource Therapy';
        $data['user'] = $this->user->get_where(['id_user' => $id_user])->row();
        $this->load->view('admin/user/edit', $data);
    }

    public function update()
    {
        $data['id_user'] = $this->input->post('id_user');
        $data['nama']    = $this->input->post('nama');
        $data['email']   = $this->input->post('email');
        $data['telepon'] = $this->input->post('telepon');
        $data['profil']  = $this->input->post('profil');
        $data['kota']    = $this->input->post('kota');
        $data['role']    = $this->input->post('role');
        $data['slug']    = $this->input->post('slug');
        if (!empty($_POST['password'])) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }
        if (!empty($_FILES['foto']['name'])) {
            $data['foto'] = $this->_upload($data['slug']);
        }

        $this->user->update($data);

        $this->session->set_flashdata('msg', 'User berhasil diupdate!');
        redirect('admin/user/list');
    }


    public function delete($id_user)
    {
        $this->_delete_image($id_user);
        $this->user->delete(['id_user' => $id_user]);
        $this->session->set_flashdata('msg', 'User berhasil dihapus!');
        redirect('admin/user/list');
    }


    private function _upload($name)
    {
        $config['upload_path']   = './assets/img/user/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name']     = $name;
        $config['overwrite']     = true;
        $config['encrypt_name']  = false;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            // print_r($this->upload->display_errors());
            $this->session->set_flashdata('error', $this->upload->display_errors());
            return redirect('admin/user/list');
        } else {
            $this->resizeImage($this->upload->data("file_name"));
            return $this->upload->data("file_name");
        }
    }

    private function _delete_image($id_user)
    {
        $file = $this->user->get_where(['id_user' => $id_user])->row();
        $filename = explode(".", $file->foto)[0];
        // var_dump($file);
        return array_map('unlink', glob(FCPATH . "assets/img/user/$filename.*"));
    }

    private function resizeImage($filename)
    {
        $source_path = FCPATH . "assets/img/user/" . $filename;
        $target_path = FCPATH . "assets/img/user/";
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'width' => 500,
        );

        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            return redirect('admin/user/list');
        }

        $this->image_lib->clear();
    }
}
