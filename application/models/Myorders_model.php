<?php

defined('BASEPATH') OR exit ('Forbidden');

class Myorders_model extends MY_Model
{
    public $table = 'orders';

    public function getDefaultValues()
    {
        return [
            'id_orders'         => '',
            'account_name'      => '',
            'account_number'    => '',
            'nominal'           => '',
            'note'              => '',
            'image'             => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'account_name',
                'label' => 'Account Name',
                'rules' => 'required|trim'
            ],[
                'field' => 'account_number',
                'label' => 'Account Number',
                'rules' => 'required|trim|numeric|max_length[50]'
            ],[
                'field' => 'nominal',
                'label' => 'Nominal',
                'rules' => 'required|trim|numeric'
            ],[
                'field' => 'image',
                'label' => 'Bukti Transfer',
                'rules' => 'callback_image_required'
            ]
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config = [
            'upload_path'       => './assets/images/transfer_receipt',
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
}

