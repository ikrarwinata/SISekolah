<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fasilitas_model extends CI_Model
{

    public $table = 'fasilitas';
    public $id = 'id';
    public $order = 'ASC';
    public $defaultorder = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->defaultorder);
        return $this->db->get($this->table)->result();
    }

    // get a row by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get a row by defined field
    function get_by($fieldkey, $val)
    {
        $this->db->where($fieldkey, $val);
        return $this->db->get($this->table)->row();
    }

    // get data by defined field
    function get_data_by($fieldkey, $val)
    {
        $this->db->where($fieldkey, $val);
        return $this->db->get($this->table)->result();
    }

    // get data by defined field
    function get_data($arr=NULL)
    {
        if($arr==NULL){
            return $this->db->get($this->table)->result();
        }else{
            foreach($arr as $key => $value){
                $this->db->where($key, $value);
            };
            $this->db->order_by($this->id, $this->order);
            return $this->db->get($this->table)->result();
        };
    }

    // get a row by defined field
    function get_row($arr=NULL)
    {
        if($arr==NULL){
            $this->db->order_by($this->id, $this->order);
            $this->db->limit(1, 0);
            return $this->db->get($this->table)->result();
        }else{
            foreach($arr as $key => $value){
                $this->db->where($key, $value);
            };
            $this->db->order_by($this->id, $this->order);
            $this->db->limit(1, 0);
            return $this->db->get($this->table)->row();
        };
    }
    
    // get total rows
    function total_rows($q = NULL) {
        if($q!=NULL){
            $this->db->group_start();
            $this->db->like('id', $q);
            $this->db->or_like('gambar', $q);
            $this->db->or_like('nama', $q);
            $this->db->or_like('deskripsi', $q);
            $this->db->group_end();
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    // get total rows by spesific field
    function count_by($field, $val) {
        $this->db->where($field, $val);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        if($q!=NULL){
            $this->db->group_start();
            $this->db->like('id', $q);
            $this->db->or_like('gambar', $q);
            $this->db->or_like('nama', $q);
            $this->db->or_like('deskripsi', $q);
            $this->db->group_end();
        }
        $this->db->order_by($this->id, $this->defaultorder);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // update data by spesific field
    function update_by($field, $val, $data)
    {
        $this->db->where($field, $val);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // delete data by spesific field
    function delete_by($field, $val)
    {
        $this->db->where($field, $val);
        $this->db->delete($this->table);
    }

}

/* End of file Fasilitas_model.php */
/* Location: ./application/models/Fasilitas_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-26 08:45:13 */
/* http://harviacode.com */