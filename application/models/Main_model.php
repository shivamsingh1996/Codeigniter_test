<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_model extends CI_Model
{

    function __constructor()
    {
        parent::__constructor();
    }

    function get($table, $order_by){
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_with_limit($table, $limit, $offset, $order_by) {
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_where($table, $id){
        $this->db->where('id', $id);
        $query=$this->db->get($table);
        return $query;
    }

    function get_where_custom($table, $col, $value) {
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

    function _insert($table, $data){
        $this->db->insert($table, $data);
    }

    function _update($table, $id, $data){
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    function _delete($table, $id){
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    function count_where($table, $column, $value) {
        $this->db->where($column, $value);
        $query=$this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function count_all($table) {
        $query=$this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_max($table) {
        $this->db->select_max('id');
        $query = $this->db->get($table);
        $row=$query->row();
        $id=$row->batch_id;
        return $id;
    }

    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }

}
