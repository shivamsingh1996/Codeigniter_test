<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller 
{
    function __construct(){
        parent::__construct();
    }
    function create()
    {
        $submit = $this->input->post('submit', true);
        $this->load->library('form_validation');
        $update_id = $this->uri->segment(3);
        if($submit == 'submit')
        {
            $this->form_validation->set_rules('parent_id','category','trim|required');
            $this->form_validation->set_rules('category','subcategory','trim|required');

            if($this->form_validation->run() == true)
            {
                $data = $this->_get_data_by_post();
                if(is_numeric($update_id))
                {
                    //update
                    $this->_update('category',$update_id,$data);
                    $msg = 'Category data updated successfully';
                    $flash_msg = '<div class="alert alert-success icons-alert"><p>'.$msg.'</p></div>';
                    $this->session->set_flashdata('item',$flash_msg);
                    redirect(base_url('category/create/').$update_id);
                }   
                else
                {
                    //insert
                    $this->_insert('Category',$data);
                    $msg = 'Category data inserted successfully';
                    $flash_msg = '<div class="alert alert-success icons-alert"><p>'.$msg.'</p></div>';
                    $this->session->set_flashdata('item',$flash_msg);
                    redirect(base_url('category/create'));
                }
            }
        }
        if((is_numeric($update_id)) && ($submit != 'submit'))
        {
            $data = $this->_get_data_from_db($update_id);
        }
        else
        {
            $data = $this->_get_data_by_post();
        }
        $data['p_category'] = $this->_custom_query("select * from category where parent_id = 0 order by category");
        $data['error'] = $this->session->flashdata('error');
        $data['flash'] = $this->session->flashdata('item');
        $data['title'] = 'Create Category';
        $data['update_id'] = $update_id;
        $this->load->view('backend/Header',$data);
        $this->load->view('backend/category/Create');
        $this->load->view('backend/Footer');
    }
    function _get_data_from_db($update_id)
    {
        $return = $this->_get_where('category',$update_id);
        if(count($return->result()) > 0)
        {
            foreach($return->result() as $row)
            {
                $data['parent_id'] = $row->parent_id;
                $data['category'] = $row->category;
            } 
            return $data;
        }
        else
        {
            redirect(base_url('category/create'));
        }
    }
    function _get_data_by_post()
    {
        $data['parent_id'] = $this->input->post('parent_id',true);
        $data['category'] = $this->input->post('category',true);
        return $data;
    }
    function manage()
    {
        $data['return_category'] = $this->_custom_query("select * from category order by id desc");
        $this->load->view('backend/Header',$data);
        $this->load->view('backend/category/Manage');
        $this->load->view('backend/Footer');
    }
    function _custom_query($query)
    {
        $this->load->model('Main_model');
        $return = $this->Main_model->_custom_query($query);
        return $return;
    }
    function _get_where($table, $id)
    {
        $this->load->model('Main_model');
        return $this->Main_model->get_where($table, $id);
    }
    function _insert($table, $data)
    {
        $this->load->model('Main_model');
        $this->Main_model->_insert($table, $data);
    }
    function _update($table, $id, $data)
    {
        $this->load->model('Main_model');
        $this->Main_model->_update($table, $id, $data);
    }
}