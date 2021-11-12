<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('artikel_model', 'artikel');
        $this->load->helper('security');
        $this->load->library('pagination');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data['title'] = 'Blog Trainer & Trapis';

        //konfigurasi pagination
        $config['base_url'] = site_url('blog/pages'); //site url
        $config['total_rows'] = $this->db->count_all('artikel'); //total row
        $config['per_page'] = 9;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        // $config['next_link']        = 'Next';
        // $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $select = '*,artikel.created_at as tgl_artikel';
        $join = [
            ['user', 'user.id_user = artikel.id_user']
        ];
        $order = ['artikel.id_artikel', 'DESC'];
        $limit = [$config["per_page"], $data['page']];
        $data['artikel'] = $this->artikel->get_join_order_limit($select, $join, $order, $limit)->result();


        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('web/blog', $data);
    }
    public function detail()
    {
        $this->load->view('web/blog_detail');
    }
}
