<?php

class reports extends Controller {
    public function index() {
        $report = $this->model('Report');
        $data = $report->getReportsData();
        $this->view('reports/index', $data);
    }
    
} 