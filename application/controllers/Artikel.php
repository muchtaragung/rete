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
        $data['artikel'] = $this->artikel->get_all()->result();
        $this->load->view('user/artikel', $data);
    }
    public function form_artikel()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('user/form_artikel', $data);
    }
    public function save()
    {
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
