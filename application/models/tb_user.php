<?php
class Tb_user extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('tb_user');
        $this->load->helper('tanggal');
    }

    public function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function ambil_data($limit, $start)
    {
        $bulan = tanggal();
        return $this->db->get_where('user', array(
            'modify =' => $bulan
        ));
        // $this->db->get('user', $limit, $start);
    }

    public function edit_data($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
