<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller
{
    public function orderby($orderType, $currentPageNumber = null)
    {
        $data['title']          = 'Home - Simple Ecommerce';
        $data['content']        = $this->shop->select([
            'product.id', 'product.slug AS product_slug',
            'product.title AS product_title', 'product.description',
            'product.price', 'product.image', 'product.is_available',
            'category.title AS category_title', 'category.slug AS category_slug'
        ])
        ->join('category')
        ->where('is_available', 1)
        ->orderBy('product.price', $orderType)
        ->pagination($currentPageNumber)
        ->get();

        $data['total_rows']     = $this->shop->where('is_available', 1)
                                             ->count();
        $data['pagination']     = $this->shop->createPagination(
            base_url("shop/orderby/$orderType"), 4, $data['total_rows']
        );
        $data['page']           ='pages/home/index';

        $this->view($data);
    }

    public function category ($categoryName, $currentPageNumber = null)
    {
        $data['title']          = 'Home - Simple Ecommerce';
        $data['content']        = $this->shop->select([
            'product.id', 'product.slug AS product_slug',
            'product.title AS product_title', 'product.description',
            'product.price', 'product.image', 'product.is_available',
            'category.title AS category_title', 'category.slug AS category_slug'
        ])
        ->join('category')
        ->where('product.is_available', 1)
        ->where('category.slug', $categoryName)
        ->pagination($currentPageNumber)
        ->get();

        $data['total_rows']     = $this->shop->join('category')
                                       ->where('product.is_available', 1)
                                       ->where('category.slug', $categoryName)
                                       ->count();
        $data['pagination']     = $this->shop->createPagination(
            base_url("shop/category/$categoryName"), 4, $data['total_rows']
        );
        $data['category']       = ucwords(str_replace('-', ' ', $categoryName));
        $data['page']           = 'pages/home/index';

        $this->view($data);
    }

    public function search($currentPageNumber = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_flashdata(
                'keyword', $this->input->post('keyword')
            );
        } else {
            redirect(base_url());
        }

        $keyword            = $this->session->userdata('keyword');
        $data['content']    = $this->shop->select([
            'product.id', 'product.slug AS product_slug',
            'product.title AS product_title', 'product.description',
            'product.price', 'product.image', 'product.is_available',
            'category.title AS category_title', 'category.slug AS category_slug'
        ])
        ->join('category')
        ->like('product.title', $keyword)
        ->orLike('product.description', $keyword)
        ->pagination($currentPageNumber)
        ->get();

        $data['total_rows'] = $this->shop->like('product.title', $keyword)
            ->orLike('product.description', $keyword)->count();
        $data['pagination'] = $this->shop->createPagination(
            base_url('home/search'), 3, $data['total_rows']
        );
        $data['page']       = 'pages/home/index';

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url());
    }
}

