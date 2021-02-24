<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends MY_Model
{
    protected $table = 'user';

    public function getDefaultValues()
    {
        return [
            'name'  => '',
            'email' => '',
            'image' => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim'
            ],[
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'required|trim|valid_email|callback_unique_email'
            ]
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config = [
            'upload_path'       => './assets/images/avatar',
            'file_name'         => $fileName,
            'allowed_types'     => 'jpg|JPG|png|PNG|jpeg|gif',
            'max_size'          => 1024,
            'max_width'         => 0,
            'max_height'        => 0,
            'overwrite'         => true,
            'file_ext_tolower'  => true
        ];

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload($fieldName)) {
            return $this->upload->data();
        } else {
            $this->session->set_flashdata(
                'image_error', $this->upload->display_errors('', '')
            );
            
            return false;
        }
    }

    public function deleteImage($fileName)
    {
        $target = "./assets/images/avatar/$fileName";
        
        if (file_exists($target)) {
            unlink($target);
        }
    }
}

