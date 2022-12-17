<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class REST_Controller extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $CI = & get_instance();
        // $CI->load->helper('function');
        // $CI->load->model('auth_model');
        // $CI->load->model('api_model');
        // $CI->load->library('user_agent');

    }

}