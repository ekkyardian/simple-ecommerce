<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller
{
    public function orderby($orderType, $currentPageNumber = null)
    {
        $data['title']          = 'Home - Simple Ecommerce';
        $data['content']        = $this->shop->select([
            'product.id', 'product.title as product_title',
            'product.description', 'product.price', 'product.image',
            'product.is_available', 'category.title as category_title'
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
}

