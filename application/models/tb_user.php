<?php
class Tb_user extends CI_Model
{
    public function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function ambil_data()
    {
        return $this->db->get('user');
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
