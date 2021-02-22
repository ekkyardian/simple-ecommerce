<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        # code here
    }

    public function index($page = null)
    {
        $data['title']          = 'User - Simple Ecommerce';
        $data['content']        = $this->user->pagination($page)->get();
        $data['total_rows']     = $this->user->count();
        $data['pagination']     = $this->user->createPagination(
            base_url('user'), 2, $data['total_rows']
        );
        $data['page']           = 'pages/user/index';

        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->user->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
            $this->load->library('form_validation');
            $this->form_validation->set_rules(
                'password', 'Password', 'required|min_length[8]'
            );
            $input->password = hashEncrypt($input->password);
        }

        if (!empty($_FILES) && $_FILES['image'] != '') {
            $imageName = url_title($input->name, '-', true) . '-' .
                date('YmdHis');
            $upload = $this->user->uploadImage('image', $imageName);

            if ($upload) {
                $input->image = $upload['file_name'];
            } else {
                redirect(base_url('user/create'));
            }
        }

        if (!$this->user->validate()) {
            $data['title']          = 'Add New User';
            $data['input']          = $input;
            $data['form_action']    = base_url('user/create');
            $data['page']           = 'pages/user/form';

            $this->view($data);
            return;
        }

        if ($this->user->create($input)) {
            $this->session->set_flashdata(
                'success', 'User has been added'
            );
        } else {
            $this->session->set_flashdata(
                'error', 'Something wrong hapens'
            );
        }

        redirect(base_url('user'));
    }

    public function unique_email()
    {
        $email   = $this->input->post('email');
        $id      = $this->input->post('id');
        $user    = $this->user->where('email', $email)->first();
        
        if ($user) {
            if ($id == $user->id) {
                return true;
            }
            
            $this->load->library('form_validation');
            $this->form_validation->set_message(
                'unique_email', '%s sudah digunakan'
            );
            
            return false;
        }
        
        return true;
    }
}

