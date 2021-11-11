<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('Artikel_model', 'artikel');
        $this->load->helper('security');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['artikel'] = $this->artikel->get_all()->result();
        $this->load->view('user/artikel', $data);
    }
}
