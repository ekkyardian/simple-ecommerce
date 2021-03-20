<?php

defined('BASEPATH') OR exit ('Forbidden');

class Myorders extends MY_Controller
{
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $is_login   = $this->session->userdata('is_login');
        $this->id   = $this->session->userdata('id');

        if (! $is_login) {
            redirect(base_url('/login'));

            $this->session->set_flashdata(
                'warning', 'Please login to access menu Orders'
            );

            return;
        }
    }

    public function index()
    {
        $data['title']    = 'List Orders - Simple Ecommerce';
        $data['page']     = 'pages/myorders/index';
        $data['content']  = $this->myorders->where('id_user', $this->id)
                                           ->orderBy('date', 'DESC')
                                           ->get();

        $this->view($data);
    }
}

