<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller
{
    public function index()
    {
        $sess_data = [
            'id', 'nama', 'email', 'role', 'is_login'
        ];

        $this->session->unset_userdata($sess_data);
        $this->session->set_flashdata(
            'success', 'You are logout'
        );
        redirect(base_url());
    }
}

