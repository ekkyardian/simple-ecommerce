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
            $this->session->set_flashdata(
                'warning', 'Please login to access menu Orders'
            );

            redirect(base_url('/login'));

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

    public function detail($invoice)
    {
        $data['title']         = 'Orders Detail - Simple Ecommerce';
        $data['page']          = 'pages/myorders/detail';

        $data['orders']        = $this->myorders->where('invoice', $invoice)
                                                ->first();
        if (!$data['orders']) {
            $this->session->set_flashdata(
                'warning', 'Data not found'
            );

            redirect(base_url('myorders'));
        }

        $this->myorders->table = 'orders_detail';
        $data['orders_detail'] = $this->myorders->select([
            'orders_detail.id_orders', 'orders_detail.id_product',
            'orders_detail.qty', 'orders_detail.subtotal', 'product.slug',
            'product.title', 'product.price', 'product.image'
        ])
        ->join('product')
        ->where('orders_detail.id_orders', $data['orders']->id)
        ->get();

        $this->view($data);
    }
}

