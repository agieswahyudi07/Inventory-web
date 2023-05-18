<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table      = 'ms_brand';
    protected $primaryKey = 'brand_id';
    protected $allowedFields = ['brand_id', 'brand_name', 'brand_code', 'created_at', 'updated_at'];

    public function get_all_data()
    {
        $query = $this->db->query('SELECT * FROM ' . $this->table);
        return $query->getResult();
    }

    public function getAllDataDescending()
    {
        $builder = $this->db->table($this->table);
        $builder->orderBy('brand_id', 'DESC');
        return $builder->get()->getResult();
    }

    public function get_data_index()
    {
        $builder = $this->db->table($this->table);
        $builder->orderBy('brand_id', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_data($id)
    {
        $table = $this->db->table('ms_brand');
        $query = $table->where('brand_id', $id)->get();

        return $query->getResultArray();
    }

    public function updateData($id, $data)
    {
        $table = $this->db->table('ms_brand');
        $where = ['brand_id' => $id];
        $query = $table->update($data, $where);
        return $query;
    }

    public function deleteData($id)
    {
        $table = $this->db->table('ms_brand');
        $where = ['brand_id' => $id];
        $query = $table->delete($where);
        return $query;
    }

    public function insert_brand($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
}
