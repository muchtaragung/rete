<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('user_model', 'user');
        $this->load->helper('security');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->user->get_all()->result();
        $this->load->view('web/home', $data);
    }
}
