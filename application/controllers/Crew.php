<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crew extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Crew_model');
        login();
    }

    public function index()
    {
        $data['title'] = 'Data Crew';
        $data['crew'] = $this->Crew_model->getCrew();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('crew/index', $data);
        $this->load->view('templates/foot');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Crew';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('crew/tambah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Crew_model->insert();
            $this->session->set_flashdata('berhasil', 'Data Berhasil Ditambahkan');
            redirect('crew');
        }
    }

    public function ubah($id_crew)
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Ubah Crew';

            $data['crew'] = $this->Crew_model->getRow($id_crew);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('crew/ubah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Crew_model->update();
            $this->session->set_flashdata('berhasil', 'Data Berhasil Diubah');
            redirect('crew');
        }
    }

    public function hapus($id_crew)
    {
        $this->Crew_model->delete($id_crew);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('berhasil', 'Data Berhasil Dihapus');
            redirect('crew');
        }
    }
}
