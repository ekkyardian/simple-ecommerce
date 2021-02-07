<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        /**
         * Fungsi berikut akan melakukan load model secara otomatis, dengan
         * asumsi bahwa nama model adalah: [nama_controller]_model.php
         * Dengan begini kita tidak perlu lagi melakukan load model secara
         * manual pada setiap controller yang kita buat
         */
        $model = get_class($this);
        if (file_exists(APPPATH . 'models/' . $model . '_model.php')) {
            $this->load->model(
                strtolower($model) . '_model', strtolower($model), true
            );
        }
    }

    /**
     * Fungsi berikut bertujuan untuk menyederhanakan proses pemanggilan
     * view di controller
     */
    public function view($data)
    {
        $this->load->view('layouts/app', $data);
    }
}

