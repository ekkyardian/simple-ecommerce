<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model
{
    public function getDefaultValues()
    {
        return [
            'id_category'   => '',
            'title'         => '',
            'slug'          => '',
            'category'      => '',
            'price'         => '',
            'description'   => '',
            'is_available'  => 1,
            'image'         => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'     => 'title',
                'label'     => 'Product Name',
                'rules'     => 'required|trim'
            ],[
                'field'     => 'slug',
                'label'     => 'Slug',
                'rules'     => 'required|trim|callback_unique_slug'
            ],[
                'field'     => 'id_category',
                'label'     => 'Category',
                'rules'     => 'required|trim'
            ],[
                'field'     => 'description',
                'label'     => 'Description',
                'rules'     => 'required|trim'
            ],[
                'field'     => 'price',
                'label'     => 'Price',
                'rules'     => 'required|trim|numeric'
            ],[
                'field'     => 'is_available',
                'label'     => 'Avaliability',
                'rules'     => 'required|trim'
            ]
        ];
        
        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config = [
            'upload_path'       => './assets/images/products',
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
        $target = "./assets/images/products/$fileName";
        
        if (file_exists($target)) {
            unlink($target);
        }
    }
}

