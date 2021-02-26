<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends MY_Model
{
    protected $table             = 'product';
    protected $maxContentPerPage = 10;
}

