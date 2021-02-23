<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Category extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $role = $this->session->userdata('role');
        if ($role != 'admin') {
            $this->session->set_flashdata(
                'warning', 'You have no permission'
            );
            redirect(base_url());
            return;
        }
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

    public function search($currentPageNumber = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata(
                'keyword', $this->input->post('keyword')
            );
        } else {
            redirect(base_url('category'));
        }
        
        $keyword            = $this->session->userdata('keyword');
        $data['title']      = 'Category - Simple Ecommerce';
        $data['content']    = $this->category->like('title', $keyword)
                                             ->pagination($currentPageNumber)
                                             ->get();
        $data['total_rows'] = $this->category->like('title', $keyword)
                                             ->count();
        $data['pagination'] = $this->category->createPagination(
            base_url('category/search'), 3, $data['total_rows']
        );
        $data['page']       = 'pages/category/index';
        
        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('category'));
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

    public function edit($id)
    {
        $data['content'] = $this->category->where('id', $id)->first();
        
        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Data not found');
            redirect(base_url('/category'));
        }
        
        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }
        
        if (!$this->category->validate()) {
            $data['title']          = 'Edit Category - Simple Ecommerce';
            $data['form_action']    = base_url("category/edit/$id");
            $data['page']           = 'pages/category/form';
            
            $this->view($data);
            return;
        }
        
        if ($this->category->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Update success');
        } else {
            $this->session->set_flashdata(
                'error', 'Oops! Something wrong hapens'
            );
        }
        
        redirect(base_url('category'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('category'));
        }
        
        if (!$this->category->where('id', $id)->first()) {
            $this->session->set_flashdata('warning', 'Data not found');
        }
        
        if ($this->category->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data has been deleted');
        } else {
            $this->session->set_flashdata(
                'error', 'Oops! Something wrong hapens'
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
            if ($id == $category->id) {
                return true;
            }
            
            $this->load->library('form_validation');
            $this->form_validation->set_message(
                'unique_slug', '%s sudah digunakan'
            );
            
            return false;
        }
        
        return true;
    }
}

