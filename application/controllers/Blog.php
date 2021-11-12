<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Blog Trainer & Trapis';
        $this->load->view('web/blog', $data);
    }
    public function detail()
    {
        $this->load->view('web/blog_detail');
    }
}
