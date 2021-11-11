<?php

class Admin_model extends CI_Model
{
    private $table = 'admin';

    /**
     * menyimpan data ke tabel
     *
     * @param array $object
     * @return void
     */
    public function save(array $object)
    {
        $this->db->insert($this->table, $object);
    }

    /**
     * mengambil data tabel dengan kondisi where
     *
     * @param array $where array dari data yang mau di ambil
     * @return void
     */
    public function get_where(array $where)
    {
        return $this->db->get_where($this->table, $where);
    }

    /**
     * mengambil data dengan join dan kondisi where
     *
     * @param String $select
     * @param Array $join
     * @param Array $where
     *
     * @return void
     */
    public function get_join_where($select, $join, $where)
    {
        $this->db->select($select);
        $this->db->from($this->table);
        foreach ($join as $data) {
            $this->db->join($data[0], $data[1], 'left');
        }
        $this->db->where($where);
        return $this->db->get();
    }

    /**
     * mengambil data dengan join, kondisi where dan juga order
     *
     * @param String $select
     * @param Array $join
     * @param Array $where
     * @param Array $order
     *
     * @return void
     */
    public function get_join_where_order($select, $join, $where, $order)
    {
        $this->db->select($select);
        $this->db->from($this->table);
        foreach ($join as $data) {
            $this->db->join($data[0], $data[1], 'left');
        }
        $this->db->where($where);
        $this->db->order_by($order[0], $order[1]);
        return $this->db->get();
    }
    /**
     * mengambil data dengan join, kondisi order
     *
     * @param String $select
     * @param Array $join
     * @param Array $where
     * @param Array $order
     *
     * @return void
     */
    public function get_join_order($select, $join, $order)
    {
        $this->db->select($select);
        $this->db->from($this->table);
        foreach ($join as $data) {
            $this->db->join($data[0], $data[1], 'left');
        }
        $this->db->order_by($order[0], $order[1]);
        return $this->db->get();
    }

    /**
     * mengambil semua data tabel
     *
     * @return void
     */
    public function get_all()
    {
        return $this->db->get($this->table);
    }

    /**
     * mengambil semua data dengan order
     *
     * @param Array $order
     *
     * @return void
     */
    public function get_all_order($order)
    {
        $this->db->order_by($order[0], $order[1]);
        return $this->db->get($this->table);
    }

    /**
     * mengambil data dengan kondisi join
     *
     * @param [type] $join
     *
     * @return void
     */
    public function get_join($join)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        foreach ($join as $data) {
            $this->db->join($data[0], $data[1]);
        }
        return $this->db->get();
    }

    /**
     * mengupdate data.
     * arr data ada id nya
     * idnya yang di pake untuk where
     *
     * data yang di update juga ada arr data
     * @param array $data
     * @return void
     */
    public function update(array $data)
    {
        $where['id_' . $this->table] = $data['id_' . $this->table];

        return $this->db->where($where)->update($this->table, $data);
    }

    /**
     * mengupdate data dengan kondisi where.
     * arr data ada id nya
     * idnya yang di pake untuk where
     *
     * data yang di update juga ada arr data
     * @param array $data
     * @param array $where
     * @return void
     */
    public function update_where(array $data, array $where)
    {

        return $this->db->where($where)->update($this->table, $data);
    }

    /**
     * menghapus data
     * arr where adalah id dari kolom yang akan di hapus
     *
     * @param array $where
     * @return void
     */
    public function delete(array $where)
    {
        return $this->db->delete($this->table, $where);
    }
}
