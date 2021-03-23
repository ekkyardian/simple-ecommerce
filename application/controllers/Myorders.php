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
                'error', 'Data not found'
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

        if ($data['orders']->status !== 'waiting') {
            $this->myorders->table = 'orders_confirm';

            $data['orders_confirm'] = $this->myorders->where(
                'id_orders', $data['orders']->id
            )->first();
        }

        $this->view($data);
    }

    public function paymentConfirmation($invoice)
    {
        $data['orders'] = $this->myorders->where('invoice', $invoice)->first();

        if (!$data['orders']) {
            $this->session->set_flashdata(
                'warning', 'Data not found'
            );

            redirect(base_url('myorders'));
            return;
        }

        if ($data['orders']->status !== 'waiting') {
            $this->session->set_flashdata(
                'warning',
                "Your payment has been ACC. You didn't need to confirm again."
            );

            redirect(base_url("myorders/detail/$invoice"));
            return;
        }

        if (!$_POST) {
            $data['input'] = (object) $this->myorders->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName = url_title($invoice, '-', true) . '-' . 
                date('YmdHis');
            $upload = $this->myorders->uploadImage('image', $imageName);

            if ($upload) {
                $data['input']->image = $upload['file_name'];
            } else {
                redirect(base_url("myorders/paymentConfirmation/$invoice"));
            }
        }

        if (!$this->myorders->validate()) {
            $data['title']       = 'Payment Confirmation - Simple Ecommerce';
            $data['page']        = 'pages/myorders/payment_confirmation';
            $data['form_action'] = base_url(
                "myorders/paymentConfirmation/$invoice"
            );

            $this->view($data);
            return;
        }

        $this->myorders->table = 'orders_confirm';
        unset($data['input']->invoice);

        if ($this->myorders->create($data['input'])) {
            $this->myorders->table = 'orders';
            $this->myorders->where('id', $data['input']->id_orders)
                           ->update(['status' => 'paid']);

            $this->session->set_flashdata(
                'success', 'Data transfer has been uploaded'
            );
        } else {
            $this->session->set_flashdata(
                'error', 'Something wrong hapen'
            );
        }

        redirect(base_url("myorders/detail/$invoice"));
    }

    public function image_required()
    {
        if (empty($_FILES) || $_FILES['image']['name'] == '') {
            $this->session->set_flashdata(
                'image_error', 'You need to attach transfer receipt!'
            );

            return false;
        }

        return true;
    }
}

