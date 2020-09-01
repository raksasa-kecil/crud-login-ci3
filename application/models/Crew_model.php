<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crew_model extends CI_Model
{
    public function getCrew()
    {
        $this->db->order_by('id_crew', 'DESC');
        return $this->db->get('tabel_crew')->result();
    }

    public function insert()
    {

        $data = [
            'nama' => $this->input->post('nama'),
            'gender' => $this->input->post('gender'),
            'alamat' => $this->input->post('alamat')
        ];

        $this->db->insert('tabel_crew', $data);
    }

    public function getRow($id_crew)
    {
        $where = ['id_crew' => $id_crew];
        return $this->db->get_where('tabel_crew', $where)->row();
    }

    public function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'gender' => $this->input->post('gender'),
            'alamat' => $this->input->post('alamat')
        ];

        $id_crew = $this->input->post('id_crew');
        $this->db->where('id_crew', $id_crew);
        $this->db->update('tabel_crew', $data);
    }

    public function delete($id_crew)
    {
        $this->db->where('id_crew', $id_crew);
        $this->db->delete('tabel_crew');
    }
}
