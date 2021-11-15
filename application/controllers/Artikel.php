<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('Artikel_model', 'artikel');
        $this->load->helper('security');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $where = array(
            'id_user' => $this->session->userdata('id_user')
        );
        $data['artikel'] = $this->artikel->get_where($where)->result();
        $this->load->view('user/artikel', $data);
    }
    public function form_artikel()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('user/form_artikel', $data);
    }
    public function save()
    {
        // $uri = $this->input->post('uri', true);
        $form_check = $this->artikel->check_form($this->session->userdata('id_user'), $this->input->post('judul', true));
        if ($form_check->num_rows() > 0) {
            $this->session->set_flashdata('error', 'Judul artikel sudah tersedia');
            redirect('artikel/form_artikel');
        } else {
            $config['upload_path'] = "./assets/img/artikel";
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '1024';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("gambar")) {
                $data = array('upload_data' => $this->upload->data());
                $file = $data['upload_data']['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Gambar gagal di tambahkan');
                redirect('artikel');
            }
            $slug = url_title($this->input->post('judul', true), 'dash', true);
            $data = array(
                'judul' => $this->input->post('judul', true),
                'slug' => $slug,
                'gambar' => $file,
                'isi' =>  $this->input->post('isi', true),
                'id_user' =>  $this->session->userdata('id_user')
            );
            $this->artikel->save($data);
            $this->session->set_flashdata('msg', 'Artikel berhasil di tambah');
            redirect('artikel');
        }
    }
    public function form_edit($id)
    {
        $where = array('id_artikel' => $id);
        $data['artikel'] = $this->artikel->get_where($where)->row();
        if ($this->session->userdata('id_user') != $data['artikel']->id_user) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses :)');
            redirect('artikel');
        }
        $data['title'] = 'Dashboard';
        $this->load->view('user/form_edit_artikel', $data);
    }
    public function update()
    {
        $id = $this->input->post('id', true);
        if (empty($_FILES['gambar']['name'])) {
            $file = $this->input->post('gambar_lama', TRUE);
        } else {
            $config['upload_path'] = "./assets/img/artikel";
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '1024';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("gambar")) {
                $data = array('upload_data' => $this->upload->data());
                $file = $data['upload_data']['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Gambar gagal di update');
                redirect('artikel/form_edit/' . $id . '');
            }
        }
        $slug = url_title($this->input->post('judul', true), 'dash', true);
        $data = array(
            'id_artikel' => $this->input->post('id', true),
            'judul' => $this->input->post('judul', true),
            'slug' => $slug,
            'gambar' => $file,
            'isi' =>  $this->input->post('isi', true),
            'id_user' =>  $this->session->userdata('id_user')
        );
        $this->artikel->update($data);
        $this->session->set_flashdata('msg', 'Blog berhasil diupdate');
        redirect('artikel');
    }
    public function hapus($id_artikel)
    {
        $where = array('id_artikel' => $id_artikel);
        $data['artikel'] = $this->artikel->get_where($where)->row();
        if ($this->session->userdata('id_user') != $data['artikel']->id_user) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses :)');
            redirect('artikel');
        }
        $this->artikel->delete(['id_artikel' => $id_artikel]);
        $this->session->set_flashdata('msg', 'Artikel Berhasil dihapus');
        redirect('artikel');
    }
}
