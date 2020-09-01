<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('File_model');
        login();
    }

    public function index()
    {
        $data['title'] = 'Data File';
        $data['file'] = $this->File_model->getFile();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('file/index', $data);
        $this->load->view('templates/foot');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah File';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('file/tambah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->File_model->insert();
            $this->session->set_flashdata('berhasil', 'Data Berhasil Ditambahkan');
            redirect('file');
        }
    }

    public function ubah($id_kategori)
    {
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Ubah File';

            $data['file'] = $this->File_model->getRow($id_kategori);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('file/ubah', $data);
            $this->load->view('templates/foot');
        } else {
            $this->File_model->update();
            $this->session->set_flashdata('berhasil', 'Data Berhasil Diubah');
            redirect('file');
        }
    }

    public function hapus($id_kategori)
    {
        $this->File_model->delete($id_kategori);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('berhasil', 'Data Berhasil Dihapus');
            redirect('file');
        }
    }
}
