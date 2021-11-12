<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
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


    public function list($id_user)
    {
        $data['title']   = 'List artikel | Admin Resource Therapy';
        $data['user']    = $this->user->get_where(['id_user' => $id_user])->row();
        $data['artikel'] = $this->artikel->get_where(['id_user' => $id_user])->result();
        $this->load->view('admin/artikel/list', $data);
    }

    public function edit($id_artikel)
    {
        $data['title'] = 'Edit artikel | Admin Resource Therapy';
        $data['artikel'] = $this->artikel->get_where(['id_artikel' => $id_artikel])->row();

        $this->load->view('admin/artikel/edit', $data);
    }

    public function update()
    {
        $data['id_artikel'] = $this->input->post('id_artikel');
        $data['judul']   = $this->input->post('judul');
        $data['slug']    = url_title($this->input->post('judul'), 'dash', true);
        $data['isi']     = $this->input->post('isi');
        $data['id_user'] = $this->input->post('id_user');
        if (!empty($_FILES['gambar']['name'])) {
            $this->_delete_image($data['id_artikel']);
            $data['gambar'] = $this->_upload();
        }

        $this->artikel->update($data);

        $this->session->set_flashdata('msg', 'artikel berhasil diupdate!');
        redirect('admin/artikel/list/' . $data['id_user']);
    }


    public function delete($id_artikel)
    {
        $this->_delete_image($id_artikel);
        $this->artikel->delete(['id_artikel' => $id_artikel]);
        $this->session->set_flashdata('msg', 'artikel berhasil dihapus!');
        redirect('admin/artikel/list');
    }


    private function _upload()
    {
        $config['upload_path']   = './assets/img/artikel/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name']     = uniqid();
        $config['overwrite']     = true;
        $config['encrypt_name']  = false;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            // print_r($this->upload->display_errors());
            $this->session->set_flashdata('error', $this->upload->display_errors());
            return redirect('admin/user/list/');
        } else {
            return $this->upload->data("file_name");
        }
    }

    private function _delete_image($id_artikel)
    {
        $file = $this->artikel->get_where(['id_artikel' => $id_artikel])->row();
        $filename = explode(".", $file->foto)[0];
        // var_dump($file);
        return array_map('unlink', glob(FCPATH . "assets/img/artikel/$filename.*"));
    }
}
