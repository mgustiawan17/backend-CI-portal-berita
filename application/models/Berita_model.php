<?php 



class Berita_model extends CI_Controller
{
    public function selectAll($column = '*') {
        $this->db->select($column);
        $data = $this->db->get('berita');
        return $data->result();
    }

    public function insert($data) {
        return $this->db->insert('berita', $data);
        return $this->db->affected_rows();
    }

    public function selectBy($idBerita) {
        $this->db->select('*');
        $this->db->where('id_berita', $idBerita);
        $data = $this->db->get('berita');
        return $data->row();
    }

    public function update($idBerita, $data) {
        $this->db->where('id_berita', $idBerita);
        $this->db->update('berita', $data);
        // mengembalikan nilai berupa jumlah data yang berpengaruh
        return $this->db->affected_rows();
    }

    public function delete($idBerita) {
        $this->db->where('id_berita', $idBerita);
        $this->db->delete('berita');
        return $this->db->affected_rows();
    }
}



?>