<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function index($currentPageNumber = null)
    {
        $data['title']      = 'Home - Simple Ecommerce';
        $data['content']    = $this->home->select([
            'product.id', 'product.slug', 'product.title AS product_title',
            'product.description', 'product.price', 'product.image',
            'product.is_available', 'category.title AS category_title'
        ])
        ->join('category')
        ->where('product.is_available', 1)
        ->pagination($currentPageNumber)
        ->get();

        $data['total_rows'] = $this->home->where('product.is_available', 1)
                                         ->count();
        $data['pagination'] = $this->home->createPagination(
            base_url('home'), 2, $data['total_rows']
        );
        $data['page']       = 'pages/home/index';

        $this->view($data);
    }
}

