<?php
// namespace Config;
// use CodeIgniter/Config;

defined('BASEPATH') OR exit('No direct script access allowed');

class CILogViewer extends CI_Controller {
    public $logFilePattern = 'log-*.log';
    public $viewName = 'logs'; //where logs exists in app/Views/logs.php
}