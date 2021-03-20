<?php

defined('BASEPATH') OR exit ('Forbidden!');

class Checkout_model extends MY_Model
{
    public $table = 'orders';

    public function getDefaultValues()
    {
        return [
            'name'      => '',
            'address'   => '',
            'phone'     => '',
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
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim'
            ],[
                'field' => 'phone',
                'label' => 'Phone Number',
                'rules' => 'required|trim|numeric|max_length[18]'
            ]
        ];

        return $validationRules;
    }
}

