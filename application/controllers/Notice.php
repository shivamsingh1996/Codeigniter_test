<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller 
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
            $this->form_validation->set_rules('notice','notice','trim|required');

            if($this->form_validation->run() == true)
            {
                $data = $this->_get_data_by_post();
                if(is_numeric($update_id))
                {
                    //update
                    $this->_update('notice',$update_id,$data);
                    $msg = 'Notice data updated successfully';
                    $flash_msg = '<div class="alert alert-success icons-alert"><p>'.$msg.'</p></div>';
                    $this->session->set_flashdata('item',$flash_msg);
                    redirect(base_url('notice/create/').$update_id);
                }   
                else
                {
                    //insert
                    $this->_insert('notice',$data);
                    $msg = 'Notice data inserted successfully';
                    $flash_msg = '<div class="alert alert-success icons-alert"><p>'.$msg.'</p></div>';
                    $this->session->set_flashdata('item',$flash_msg);
                    redirect(base_url('notice/create'));
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
        $data['error'] = $this->session->flashdata('error');
        $data['flash'] = $this->session->flashdata('item');
        $data['title'] = 'Create Notice';
        $data['update_id'] = $update_id;
        $this->load->view('backend/Header',$data);
        $this->load->view('backend/notice/Create');
        $this->load->view('backend/Footer');
    }
    function _get_data_from_db($update_id)
    {
        $return = $this->_get_where('notice',$update_id);
        if(count($return->result()) > 0)
        {
            foreach($return->result() as $row)
            {
                $data['notice'] = $row->notice;
            } 
            return $data;
        }
        else
        {
            redirect(base_url('notice/create'));
        }
    }
    function _get_data_by_post()
    {
        $data['notice'] = $this->input->post('notice',true);
        return $data;
    }
    function manage()
    {
        $data['manage_return'] = $this->_custom_query("select * from notice order by id desc");
        $this->load->view('backend/Header',$data);
        $this->load->view('backend/notice/Manage');
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