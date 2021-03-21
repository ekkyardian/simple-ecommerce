<?php

defined('BASEPATH') OR exit ('Forbidden');

class Orders extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $role = $this->session->userdata('role');

        if ($role != 'admin') {
            $this->session->set_flashdata(
                'error', 'You have no permission to access this menu!'
            );

            redirect(base_url());
            return;
        }
    }

    public function index($currentPageNumber = null)
    {
        $data['title']      = 'Manage Orders - Simple Ecommerce';
        $data['page']       = 'pages/orders/index';
        $data['content']    = $this->orders->orderBy('date', 'DESC')
                                           ->pagination($currentPageNumber)
                                           ->get();
        $data['total_rows'] = $this->orders->count();
        $data['pagination'] = $this->orders->createPagination(
            base_url('orders'), 2, $data['total_rows']
        );

        $this->view($data);
    }

    public function search($currentPageNumber = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata(
                'keyword', $this->input->post('keyword')
            );
        } else {
            redirect(base_url('orders'));
        }
        
        $keyword            = $this->session->userdata('keyword');
        $data['title']      = 'Manage Orders - Simple Ecommerce';
        $data['page']       = 'pages/orders/index';
        $data['content']    = $this->orders->like('invoice', $keyword)
                                           ->pagination($currentPageNumber)
                                           ->get();
        $data['total_rows'] = $this->orders->like('invoice', $keyword)
                                           ->count();
        $data['pagination'] = $this->orders->createPagination(
            base_url('orders/search'), 3, $data['total_rows']
        );
        
        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('orders'));
    }
}

