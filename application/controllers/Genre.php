<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Genre extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Genre_model');
        login();
    }

    public function index()
    {
        $data['title'] = 'Data Genre';
        $data['genre'] = $this->Genre_model->getGenre();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('genre/index', $data);
        $this->load->view('templates/foot');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('genre', 'genre', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Genre';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('genre/tambah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Genre_model->insert();
            $this->session->set_flashdata('berhasil', 'Data Berhasil Ditambahkan');
            redirect('genre');
        }
    }

    public function ubah($id_genre)
    {
        $this->form_validation->set_rules('genre', 'genre', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Ubah Genre';

            $data['genre'] = $this->Genre_model->getRow($id_genre);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('genre/ubah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Genre_model->update();
            $this->session->set_flashdata('berhasil', 'Data Berhasil Diubah');
            redirect('genre');
        }
    }

    public function hapus($id_genre)
    {
        $this->Genre_model->delete($id_genre);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('berhasil', 'Data Berhasil Dihapus');
            redirect('genre');
        }
    }
}
