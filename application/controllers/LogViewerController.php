<?php

// namespace App\Controllers;
//  use Config\CILogViewer;


class LogViewerController extends CI_Controller {
    public function index() {

        var_dump("est",$this->config->load('CILogViewer.php'));
        $this->config->load('CILogViewer');
        $logViewer = new CILogViewer();
        return $logViewer->showLogs();
    }
}