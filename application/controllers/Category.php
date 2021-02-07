<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Category extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($currentPageNumber = null)
    {
        $data['title']      = 'Category - Simple Ecommerce';
        $data['content']    = $this->category->pagination($currentPageNumber)
                                             ->get();
        $data['total_rows'] = $this->category->count();
        $data['pagination'] = $this->category->createPagination(
            base_url('category'), 2, $data['total_rows']
        );
        $data['page']       = 'pages/category/index';
        
        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->category->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }
        
        if (!$this->category->validate()) {
            $data['title']          = 'Add Category - Simple Ecommerce';
            $data['input']          = $input;
            $data['form_action']    = base_url('category/create');
            $data['page']           = 'pages/category/form';
            
            $this->view($data);
            return;
        }
        
        if ($this->category->create($input)) {
            $this->session->set_flashdata('success', 'New category added');
        } else {
            $this->session->set_flashdata(
                'error', 'Oops! Something wrong hapens. Please try again.'
            );
        }
        
        redirect(base_url('category'));
    }

    public function unique_slug()
    {
        $slug       = $this->input->post('slug');
        $id         = $this->input->post('id');
        $category   = $this->category->where('slug', $slug)->first();

        if ($category) {
            if ($id = $category->id) {
                return true;
            }
            
            $this->form_validation->set_message(
                'unique_slug', '%s sudah digunakan'
            );
            
            return false;
        }
        
        return true;
    }
}

