<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Komik_model');
        login();
    }

    public function index()
    {
        $data['title'] = 'Data Komik';
        $data['komik'] = $this->Komik_model->getKomik();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('komik/index', $data);
        $this->load->view('templates/foot');
    }

    # ---------------------------------------------------------------------------
    // cara pertama tambah data tampa ajax
    public function tambah()
    {
        $this->form_validation->set_rules('id_genre', 'genre', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('penulis', 'penulis', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Tambah Komik';
            $data['genre'] = $this->Komik_model->getGenre();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('komik/tambah', $data);
            $this->load->view('templates/foot');
        } else {

            $this->Komik_model->insert();
            $this->session->set_flashdata('berhasil', 'Data Berhasil Ditambahkan');
            redirect('komik');
        }
    }
    // akhir cara pertama tambah data tampa ajax

    // *CATATAN sama saja dengan method tambah data tampa ajax perubahan hanya dilakukan pada folder komik file ajax-tambah *//

    // cara kedua tambah data dengan ajax
    public function ajaxTambah()
    {
        $this->form_validation->set_rules('id_genre', 'genre', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('penulis', 'penulis', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Tambah Komik ';
            $data['genre'] = $this->Komik_model->getGenre();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('komik/ajax-tambah', $data);
            $this->load->view('templates/foot');
        } else {

            $this->Komik_model->insert();
            $this->session->set_flashdata('berhasil', 'Data Berhasil Ditambahkan');
            redirect('komik');
        }
    }
    // akhir cara kedua tambah data dengan ajax
    # ---------------------------------------------------------------------------

    # ---------------------------------------------------------------------------
    // ubah data tampa ajax
    public function ubah($id_komik)
    {
        $this->form_validation->set_rules('id_genre', 'genre', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('penulis', 'penulis', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Ubah Komik';
            $data['genre'] = $this->Komik_model->getGenre();
            $data['komik'] = $this->Komik_model->getRow($id_komik);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('komik/ubah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Komik_model->update();
            $this->session->set_flashdata('berhasil', 'Data Berhasil Diubah');
            redirect('komik');
        }
    }
    // akhir ubah data tampa ajax

    // *CATATAN sama saja dengan method tambah data tampa ajax perubahan hanya dilakukan pada folder komik file ajax-tambah *//

    // ubah data dengan ajax
    public function ajaxUbah($id_komik)
    {
        $this->form_validation->set_rules('id_genre', 'genre', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('penulis', 'penulis', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Ubah Komik';
            $data['genre'] = $this->Komik_model->getGenre();
            $data['komik'] = $this->Komik_model->getRow($id_komik);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('komik/ajax-ubah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->Komik_model->update();
            $this->session->set_flashdata('berhasil', 'Data Berhasil Diubah');
            redirect('komik');
        }
    }
    // akhir ubah data dengan ajax
    # ---------------------------------------------------------------------------


    public function hapus($id_komik)
    {
        $this->Komik_model->delete($id_komik);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('berhasil', 'Data Berhasil Dihapus');
            redirect('komik');
        }
    }
}
