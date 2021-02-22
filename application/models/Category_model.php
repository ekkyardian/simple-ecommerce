<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class  Category_model extends MY_Model
{
    public function getDefaultValues()
    {
        return [
            'id'    => '',
            'title' => '',
            'slug'  => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'slug',
                'label' => 'Slug',
                'rules' => 'required|trim|callback_unique_slug'
            ]
        ];
        
        return $validationRules;
    }
}

