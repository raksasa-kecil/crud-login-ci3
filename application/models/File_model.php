<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File_model extends CI_Model
{
    public function getFile()
    {
        $this->db->order_by('id_file', 'DESC');
        return $this->db->get('tabel_file')->result();
    }

    public function insert()
    {
        $url = 'file/tambah';
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'file' => $this->upload($url)
        ];

        $this->db->insert('tabel_file', $data);
    }

    public function upload($url)
    {
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 11024;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect($url);
        } else {
            $data = $this->upload->data();
            return $data['file_name'];
        }
    }

    public function getRow($id_file)
    {
        $where = ['id_file' => $id_file];
        return $this->db->get_where('tabel_file', $where)->row();
    }

    public function update()
    {
        $id_file = $this->input->post('id_file');
        $url = 'file/ubah/' . $id_file;
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'file' => !empty($_FILES['file']['name']) ? $this->upload($url) : $this->input->post('fileLama')
        ];

        $id_file = $this->input->post('id_file');
        $this->db->where('id_file', $id_file);
        $this->db->update('tabel_file', $data);
    }

    public function delete($id_file)
    {
        $this->db->where('id_file', $id_file);
        $this->db->delete('tabel_file');
    }
}
