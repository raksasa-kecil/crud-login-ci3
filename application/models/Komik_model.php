<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komik_model extends CI_Model
{
    public function getGenre()
    {
        $this->db->order_by('id_genre', 'DESC');
        return $this->db->get('tabel_genre')->result();
    }

    public function getKomik()
    {
        $this->db->join('tabel_genre', 'tabel_genre.id_genre = tabel_komik.id_genre');
        $this->db->order_by('id_komik', 'DESC');
        return $this->db->get('tabel_komik')->result();
    }

    public function insert()
    {
        $data = [
            'id_genre' => $this->input->post('id_genre'),
            'judul' => $this->input->post('judul'),
            'penulis' => $this->input->post('penulis')
        ];

        $this->db->insert('tabel_komik', $data);
    }

    public function getRow($id_komik)
    {
        $this->db->join('tabel_genre', 'tabel_genre.id_genre = tabel_komik.id_genre');
        $where = ['id_komik' => $id_komik];
        return $this->db->get_where('tabel_komik', $where)->row();
    }

    public function update()
    {
        $data = [
            'id_genre' => $this->input->post('id_genre'),
            'judul' => $this->input->post('judul'),
            'penulis' => $this->input->post('penulis')
        ];

        $id_komik = $this->input->post('id_komik');
        $this->db->where('id_komik', $id_komik);
        $this->db->update('tabel_komik', $data);
    }

    public function delete($id_komik)
    {
        $this->db->where('id_komik', $id_komik);
        $this->db->delete('tabel_komik');
    }
}
