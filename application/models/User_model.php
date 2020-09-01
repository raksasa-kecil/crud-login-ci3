<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUser()
    {
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get('tabel_user')->result();
    }

    public function insert()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama' => $this->input->post('nama'),
            'level' => $this->input->post('level'),
            'foto' => 'noprofile.png'
        ];
        $this->db->insert('tabel_user', $data);
    }

    public function upload($url)
    {
        $config['upload_path']          = './assets/uploads/profile/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 11024;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect($url);
        } else {
            $data = $this->upload->data();
            return $data['file_name'];
        }
    }


    public function getRow($id_user)
    {
        $where = ['id_user' => $id_user];
        return $this->db->get_where('tabel_user', $where)->row();
    }

    public function update()
    {
        $id_user = $this->input->post('id_user');
        $url = 'user/ubah/' . $id_user;
        $data = [
            'nama' => $this->input->post('nama'),
            'level' => $this->input->post('level'),
            'foto' => !empty($_FILES['foto']['name']) ? $this->upload($url) : $this->input->post('fotoLama')

        ];
        $id_user = $this->input->post('id_user');
        $this->db->where('id_user', $id_user);
        $this->db->update('tabel_user', $data);
    }

    public function delete($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tabel_user');
    }
}
