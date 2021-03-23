<?php

defined('BASEPATH') OR exit ('Forbidden');

class Orders extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // ---------------------------------------------------------------------
        // Validation: Setting up that ONLY role admin can access this page
        // ---------------------------------------------------------------------
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

    public function detail($invoice)
    {
        $data['title'] = 'Detail orders - Simple Ecommerce';
        $data['page']  = 'pages/orders/detail';

        // ---------------------------------------------------------------------
        // Validation: Check availability data orders by it's Invoice
        // ---------------------------------------------------------------------
        $data['orders'] = $this->orders->where('invoice', $invoice)->first();

        if (!$data['orders']) {
            $this->session->set_flashdata(
                'error', 'Data not found'
            );

            redirect(base_url('orders'));
        }

        // ---------------------------------------------------------------------
        // Get Data: orders_detail X product by id_orders
        // ---------------------------------------------------------------------
        $this->orders->table = 'orders_detail';

        $data['orders_detail'] = $this->orders->select([
            'orders_detail.id_orders', 'orders_detail.id_product',
            'orders_detail.qty', 'orders_detail.subtotal', 'product.slug',
            'product.title', 'product.price', 'product.image'
        ])
        ->join('product')
        ->where('orders_detail.id_orders', $data['orders']->id)
        ->get();

        // ---------------------------------------------------------------------
        // Declare: orders_detail (Bukti Transfer) ONLY IF status != waiting
        // ---------------------------------------------------------------------
        $this->orders->table = 'orders_confirm';

        $data['orders_confirm'] = $this->orders->where(
            'id_orders', $data['orders']->id
        )->first();

        $this->view($data);
    }

    public function updateStatus($id_orders)
    {
        // ---------------------------------------------------------------------
        // Validation: Make sure that user access function via POST Method
        // ---------------------------------------------------------------------
        if (!$_POST) {
            $this->session->set_flashdata(
                'error', 'Forbidden!'
            );

            redirect(base_url("orders/detail/$id_orders"));
        }

        // ---------------------------------------------------------------------
        // Update Data: Field 'status' from tabel orders
        // ---------------------------------------------------------------------
        $update_status = $this->orders->where('id', $id_orders)->update([
            'status' => $this->input->post('status')
        ]);

        if ($update_status) {
            $this->session->set_flashdata(
                'success', 'Status updated!'
            );
        } else {
            $this->session->set_flashdata(
                'error', 'Something wrong hapen :('
            );
        }

        $orders = $this->orders->where('id', $id_orders)->first();

        redirect(base_url("orders/detail/$orders->invoice"));
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

