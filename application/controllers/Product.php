<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller
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
        $data['title']      = 'Product - Simple Ecommerce';
        $data['content']    = $this->product->select([
                'product.id',
                'product.title AS product_title',
                'product.description',
                'product.price',
                'product.image',
                'product.is_available',
                'category.title AS category_title'
            ])
            ->join('category')
            ->pagination($currentPageNumber)
            ->get();
            
        $data['total_rows'] = $this->product->count();
        $data['pagination'] = $this->product->createPagination(
            base_url('product'), 2, $data['total_rows']
        );
        $data['page']       = 'pages/product/index';
        
        $this->view($data);
    }

    public function create ()
    {
        if (!$_POST) {
            $input = (object) $this->product->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }
        
        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName  = url_title($input->title, '-', true) . '-' .
                date('YmdHis');
            $upload     = $this->product->uploadImage('image', $imageName);
            
            if ($upload) {
                $input->image = $upload['file_name'];
            } else {
                redirect(base_url('product/create'));
            }
        }
        
        if (!$this->product->validate()) {
            $data['title']          = 'Add New Product';
            $data['input']          = $input;
            $data['form_action']    = base_url('product/create');
            $data['page']           = 'pages/product/form';
            
            $this->view($data);
            return;
        }
        
        if ($this->product->create($input)) {
            $this->session->set_flashdata(
                'success', 'New product has been added'
            );
        } else {
            $this->session->set_flashdata(
                'error', 'Oops! Something wrong hapens'
            );
        }
        
        redirect(base_url('product'));
    }

    public function unique_slug()
    {
        $slug       = $this->input->post('slug');
        $id         = $this->input->post('id');
        $product    = $this->product->where('slug', $slug)->first();
        
        if ($product) {
            if ($id == $product->id) {
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

    public function edit($id)
    {
        $data['content'] = $this->product->where('id', $id)->first();
        
        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Data not found');
            redirect(base_url('product'));
        }
        
        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }
        
        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName  = url_title($data['input']->title, '-', true) . '-' .
                date('YmdHis');
            $upload     = $this->product->uploadImage('image', $imageName);
            
            if ($upload) {
                if ($data['content']->image !=='') {
                    $this->product->deleteImage($data['content']->image);
                }
                
                $data['input']->image = $upload['file_name'];
            } else {
                redirect(base_url("product/edit/$id"));
            }
        }
        
        if (!$this->product->validate()) {
            $data['title']          = 'Edit Product';
            $data['form_action']    = base_url("product/edit/$id");
            $data['page']           = 'pages/product/form';
            
            $this->view($data);
            return;
        }
        
        if ($this->product->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data has been updated');
        } else {
            $this->session->set_flashdata(
                'error', 'Oops, something wrong hapens'
            );
        }
        
        redirect(base_url('product'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('product'));
        }

        $product = $this->product->where('id', $id)->first();

        if (!$product) {
            $this->session->set_flashdata('error', 'Data not found');
            redirect(base_url('product'));
        }

        $delete_product = $this->product->where('id', $id)->delete();

        if ($delete_product) {
            $this->product->deleteImage($product->image);
            $this->session->set_flashdata(
                'success', 'Data has been deleted'
            );
        } else {
            $this->session->set_flashdata(
                'error', 'Oops something wrong hapens'
            );
        }

        redirect(base_url('product'));
    }

    public function search($currentPageNumber = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata(
                'keyword', $this->input->post('keyword')
            );
        } else {
            redirect(base_url('product'));
        }
        
        $keyword            = $this->session->userdata('keyword');
        $data['title']      = 'Product - Simple Ecommerce';
        $data['content']    = $this->product->select([
                'product.id',
                'product.title AS product_title',
                'product.description',
                'product.price',
                'product.image',
                'product.is_available',
                'category.title AS category_title'
            ])
            ->join('category')
            ->like('product.title', $keyword)
            ->orLike('description', $keyword)
            ->pagination($currentPageNumber)
            ->get();
            
        $data['total_rows'] = $this->product->like('product.title', $keyword)
            ->orLike('description', $keyword)
            ->count();
        $data['pagination'] = $this->product->createPagination(
            base_url('product/search'), 3, $data['total_rows']
        );
        $data['page']       = 'pages/product/index';
        
        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('product'));
    }
}

