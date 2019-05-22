<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller 
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
            $this->form_validation->set_rules('c_title','title','trim|required');
            $this->form_validation->set_rules('content','content','trim|required');

            if($this->form_validation->run() == true)
            {
                $data = $this->_get_data_by_post();
                if(is_numeric($update_id))
                {
                    //update
                    $this->_update('content',$update_id,$data);
                    $msg = 'Content data updated successfully';
                    $flash_msg = '<div class="alert alert-success icons-alert"><p>'.$msg.'</p></div>';
                    $this->session->set_flashdata('item',$flash_msg);
                    redirect(base_url('content/create/').$update_id);
                }   
                else
                {
                    //insert
                    $this->_insert('content',$data);
                    $msg = 'Content data inserted successfully';
                    $flash_msg = '<div class="alert alert-success icons-alert"><p>'.$msg.'</p></div>';
                    $this->session->set_flashdata('item',$flash_msg);
                    redirect(base_url('content/create'));
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
        $data['title'] = 'Create Content';
        $data['update_id'] = $update_id;
        $this->load->view('backend/Header',$data);
        $this->load->view('backend/content/Create');
        $this->load->view('backend/Footer');
    }
    function assign_category()
    {
        $update_id = $this->uri->segment(3);
        $submit = $this->input->post('submit');
        if($submit == 'submit')
        {
            $category_id = $this->input->post('parent_id');
            $subcategory_id = $this->input->post('subcategory_id');

            if(empty($category_id))
            {
                $msg = 'Please select category';
                $flash_msg = '<div class="alert alert-danger icons-alert"><p>'.$msg.'</p></div>';
                $this->session->set_flashdata('item',$flash_msg);
                redirect(base_url('content/create/').$update_id);
            }
            else
            {
                if(empty($subcategory_id))
                {
                    $cat_ret = $this->_custom_query("select * from category where parent_id = $category_id");
                    if(count($cat_ret->result()) > 0)
                    {
                        $msg = 'Please select subcategory';
                        $flash_msg = '<div class="alert alert-danger icons-alert"><p>'.$msg.'</p></div>';
                        $this->session->set_flashdata('item',$flash_msg);
                        redirect(base_url('content/create/').$update_id);
                    }
                }
            }

            if(is_numeric($subcategory_id))
            {
                $return_row = $this->_custom_query("select * from content_category  where  content_id = $update_id and category_id = $subcategory_id");
            }
            else
            {
                $return_row = $this->_custom_query("select * from content_category  where  content_id = $update_id and category_id = $category_id");
            }
            
            if(count($return_row->result()) == 1)
            {
                $msg = 'Content already assigned';
                $flash_msg = '<div class="alert alert-danger icons-alert"><p>'.$msg.'</p></div>';
                $this->session->set_flashdata('item',$flash_msg);
                redirect(base_url('content/create/').$update_id);
            }
            else
            {
                if(is_numeric($subcategory_id))
                { 
                    $this->_custom_query("insert into content_category (content_id,category_id) 
                    values ($update_id,$subcategory_id)");
                }
                else
                {
                    $this->_custom_query("insert into content_category (content_id,category_id) 
                    values ($update_id,$category_id)");
                }
                $msg = 'Content assigned successfully';
                $flash_msg = '<div class="alert alert-success icons-alert"><p>'.$msg.'</p></div>';
                $this->session->set_flashdata('item',$flash_msg);
                redirect(base_url('content/create/').$update_id);
            }
        }
    }
    function _get_data_from_db($update_id)
    {
        $return = $this->_get_where('content',$update_id);
        if(count($return->result()) > 0)
        {
            foreach($return->result() as $row)
            {
                $data['c_title'] = $row->c_title;
                $data['content'] = $row->content;
            } 
            return $data;
        }
        else
        {
            redirect(base_url('author/create'));
        }
    }
    function _get_data_by_post()
    {
        $data['c_title'] = $this->input->post('c_title',true);
        $data['content'] = $this->input->post('content',true);
        return $data;
    }
    function subcategory()
    {
        $category_id = $this->input->post('id');
        if((!empty($category_id))  && (is_numeric($category_id)))
        {
            $return = $this->_custom_query("select * from category where parent_id = $category_id");
            
            $str = '';
            if(count($return->result()) > 0)
            {
                $str .= '<option value="">Select Subcategory</option>';
                foreach($return->result() as $row)
                {
                    $str .= '<option value="'.$row->id.'">'.$row->category.'</option>';
                }
            }
            echo $str;
        }
    }
    function manage()
    {
        $data['return_content'] = $this->_custom_query("select * from content order by id desc");
        $this->load->view('backend/Header',$data);
        $this->load->view('backend/content/Manage');
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