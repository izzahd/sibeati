<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Diri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("biodata/biodata_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function index()
    {
        $id = $this->session->userdata['user_id'];
        $data["biodata"] = $this->biodata_model->getbyId($id);
        if ($data){
            $this->template->load('template', 'diri/list_diri', 'Pengajuan', $data);
        }
    }

    // gak pake script alert soalnya dia ga muncul (ke-redirect duluan, alert nya jadi ga muncul)
    // tambahin alert aja kalo bisa buat dia muncul setelah redirect
}