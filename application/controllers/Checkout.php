<?php

defined('BASEPATH') OR exit ('Forbidden!');

class Checkout extends MY_Controller
{
    private $id;
    public function __construct()
    {
        parent::__construct();
        $is_login   = $this->session->userdata('is_login');
        $this->id   = $this->session->userdata('id');

        if (!$is_login) {
            $this->session->set_flashdata(
                'warning',
                "You need to login to access <strong>Checkout Page</strong>"
            );

            redirect(base_url('login'));
        }
    }

    public function index($input = null)
    {
        $data['title']          = 'Checkout - Simple Ecommerce';
        $data['page']           = 'pages/checkout/index';

        $this->checkout->table  = 'cart';
        $data['cart']           = $this->checkout->select([
            'cart.id_user', 'cart.qty', 'cart.subtotal', 'product.title',
            'product.price'
        ])
        ->join('product')
        ->where('cart.id_user', $this->id)
        ->get();

        if (!$data['cart']) {
            $this->session->set_flashdata(
                'error', 'No product on the Cart'
            );

            redirect(base_url('cart'));
        }

        $data['input']          = $input ? $input :
                                  (object) $this->checkout->getDefaultValues();

        $this->view($data);
    }
    
    public function createInvoice()
    {
        if (!$_POST) {
            $this->session->set_flashdata(
                'warning', 'Forbidden!'
            );
            redirect(base_url());
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->checkout->validate()) {
            return $this->index($input);
        }

        $total = $this->db->select_sum('subtotal')
                          ->where('id_user', $this->id)
                          ->get('cart')
                          ->row()
                          ->subtotal;

        $ordersDetail = [
            'id_user'   => $this->id,
            'date'      => date('Y-m-d'),
            'invoice'   => '#' . $this->id . date('YmdHis'),
            'total'     => $total,
            'name'      => $input->name,
            'address'   => $input->address,
            'phone'     => $input->phone,
            'status'    => 'waiting'
        ];


        if ($order= $this->checkout->create($ordersDetail)) {
            $cart = $this->db->where('id_user', $this->id)
                             ->get('cart')
                             ->result_array();

            foreach($cart as $row) {
                $row['id_orders'] = $order;
                unset($row['id'], $row['id_user']);

                $this->db->insert('orders_detail', $row);
            }

            $this->db->delete('cart', ['id_user' => $this->id]);

            $this->session->set_flashdata(
                'success', 'Checkout successfully'
            );

            $data['title']      = 'Finish your transactions';
            $data['page']       = 'pages/checkout/success';
            $data['content']    = (object) $ordersDetail;

            $this->view($data);
        } else {
            $this->session->set_flashdata(
                'error', 'Something wrong hapen'
            );

            return $this->index($input);
        }
    }
}

