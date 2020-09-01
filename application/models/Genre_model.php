<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Genre_model extends CI_Model
{
    public function getGenre()
    {
        $this->db->order_by('id_genre', 'DESC');
        return $this->db->get('tabel_genre')->result();
    }

    public function insert()
    {

        $data = [
            'genre' => $this->input->post('genre')
        ];

        $this->db->insert('tabel_genre', $data);
    }

    public function getRow($id_genre)
    {
        $where = ['id_genre' => $id_genre];
        return $this->db->get_where('tabel_genre', $where)->row();
    }

    public function update()
    {
        $data = [
            'genre' => $this->input->post('genre')
        ];

        $id_genre = $this->input->post('id_genre');
        $this->db->where('id_genre', $id_genre);
        $this->db->update('tabel_genre', $data);
    }

    public function delete($id_genre)
    {
        $this->db->where('id_genre', $id_genre);
        $this->db->delete('tabel_genre');
    }
}
