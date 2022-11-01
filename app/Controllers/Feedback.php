<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FeedbackModel;

class Feedback extends BaseController
{

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->FeedbackModel = new FeedbackModel();
    }

    public function index()
    {
        $data = array(
            'title' => 'Feedback',
            'sub_title' => 'Data Feedback User',
            'feedback' => $this->FeedbackModel->list()
        );
        return view('admin/feedback/list', $data);
    }
    public function delete_feedback($id_feedback)
    {
        $this->FeedbackModel->delete($id_feedback);
        $flash = ['message' => 'Data feedback user Berhasil Dihapus', 'jenis' => 'success', 'icon' => 'fa fa-check'];
        $this->session->setFlashdata('flash', $flash);
        return redirect()->to(base_url('feedback'));
    }
}
