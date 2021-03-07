<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Cart extends MY_Controller
{
    private $id;

    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');
        $this->id = $this->session->userdata('id');

        if (!$is_login) {
            $this->session->set_flashdata(
                'warning',
                'Please login to start adding products to the cart'
            );

            redirect(base_url());
            return;
        }
    }

    public function index()
    {
        $data['title']      = 'Cart - Simple Ecommerce';
        $data['content']    = $this->cart->select([
            'cart.id', 'cart.qty', 'cart.subtotal', 'product.title',
            'product.image', 'product.price'
        ])
        ->join('product')
        ->where('cart.id_user', $this->id)
        ->get();

        $data['page']       = 'pages/cart/index';

        $this->view($data);
    }

    public function add()
    {
        if (!$_POST || $this->input->post('qty') < 1) {
            $this->session->set_flashdata(
                'warning', 'The Quantity cannot be less than 1'
            );

            redirect(base_url());
        } else {
            $input              = (object) $this->input->post(null, true);

            $this->cart->table  = 'product';
            $product            = $this->cart->where('id', $input->id_product)
                                  ->first();
            $subtotal           = $product->price * $input->qty;

            $this->cart->table  = 'cart';
            $cart               = $this->cart->where('id_user', $this->id)
                                  ->where('id_product', $input->id_product)
                                  ->first();

            // If product already added before then just update qty and subtotal
            if ($cart) {
                $data = [
                    'qty'       => $cart->qty + $input->qty,
                    'subtotal'  => $cart->subtotal + $subtotal
                ];

                $updateCart    = $this->cart->where('id', $cart->id)
                                             ->update($data);

                if ($updateCart) {
                    $this->session->set_flashdata(
                        'success', 'Product added'
                    );
                } else {
                    $this->session->set_flashdata(
                        'error', 'Something wrong hapens'
                    );
                }

                redirect(base_url());
            }

            // Add new product to cart if no same product found
            $data = [
                'id_user'       => $this->id,
                'id_product'    => $input->id_product,
                'qty'           => $input->qty,
                'subtotal'      => $subtotal
            ];

            $createNewCart      = $this->cart->create($data);

            if ($createNewCart) {
                $this->session->set_flashdata(
                    'success', 'Product added'
                );
            } else {
                $this->session->set_flashdata(
                    'error', 'Something wrong hapens'
                );
            }

            redirect(base_url());
            
        }
    }

    public function updateQty($id)
    {
        if (!$_POST || $this->input->post('qty') < 1) {
            $this->session->set_flashdata(
                'warning', 'The Quantity cannot be less than 1'
            );

            redirect(base_url('cart/index'));
        }

        $data['content']    = $this->cart->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata(
                'warning', 'Data not found'
            );
        }

        $data['input']      = (object) $this->input->post(null, true);
        $this->cart->table  = 'product';
        $product            = $this->cart->where(
            'id', $data['content']->id_product
        )->first();
        $subtotal           = $data['input']->qty * $product->price;

        $newDataCart        = [
            'qty'           => $data['input']->qty,
            'subtotal'      => $subtotal
        ];

        $this->cart->table  = 'cart';
        $updateCart         = $this->cart->where('id', $id)
                                         ->update($newDataCart);

        if ($updateCart) {
            $this->session->set_flashdata(
                'success', 'New quantity has been updated'
            );
        } else {
            $this->session->set_flashdata(
                'error', 'Something wrong hapens'
            );
        }

        redirect(base_url('cart/index'));
    }

    public function deleteFromCart($id)
    {
        if (!$_POST) {
            $this->session->set_flashdata(
                'warning', 'Please delete product via button Delete/Trash'
            );

            redirect(base_url('cart/index'));
        }

        $availability = $this->cart->where('id', $id)->first();

        if (!$availability) {
            $this->session->set_flashdata(
                'warning', 'Data not found'
            );

            redirect(base_url('cart/index'));
        }

        $delete = $this->cart->where('id', $id)->delete();

        if ($delete) {
            $this->session->set_flashdata(
                'success', 'Product had been deleted from cart'
            );
        } else {
            $this->session->set_flashdata(
                'error', 'Something wrong hapens'
            );
        }

        redirect(base_url('cart/index'));
    }
}

