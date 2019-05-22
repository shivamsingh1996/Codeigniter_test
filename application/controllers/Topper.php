<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topper extends CI_Controller 
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
            $this->form_validation->set_rules('name','name','trim|required');
            $this->form_validation->set_rules('t_title','title','trim|required');
            $this->form_validation->set_rules('rank','rank','trim|required');
            $this->form_validation->set_rules('year','year','trim|required');
            $this->form_validation->set_rules('content','content','trim|required');
            if($this->form_validation->run() == true)
            {
                $data = $this->_get_data_by_post();
                if(is_numeric($update_id))
                {
                    //update
                    $this->_update('topper',$update_id,$data);
                    $msg = 'Topper data updated successfully';
                    $flash_msg = '<div class="alert alert-success icons-alert"><p>'.$msg.'</p></div>';
                    $this->session->set_flashdata('item',$flash_msg);
                    redirect(base_url('topper/create/').$update_id);
                }   
                else
                {
                    //insert
                    $this->_insert('topper',$data);
                    $update_id = $this->db->insert_id();
                    $msg = 'Topper data inserted successfully';
                    $flash_msg = '<div class="alert alert-success icons-alert"><p>'.$msg.'</p></div>';
                    $this->session->set_flashdata('item',$flash_msg);
                    redirect(base_url('topper/create/').$update_id);
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
        $data['title'] = 'Create Category';
        $data['update_id'] = $update_id;
        $this->load->view('backend/Header',$data);
        $this->load->view('backend/topper/Create');
        $this->load->view('backend/Footer');
    }
    function _get_data_from_db($update_id)
    {
        $return = $this->_get_where('topper',$update_id);
        if(count($return->result()) > 0)
        {
            foreach($return->result() as $row)
            {
                $data['name'] = $row->name;
                $data['t_title'] = $row->t_title;
                $data['rank'] = $row->rank;
                $data['year'] = $row->year;
                $data['content'] = $row->content;
            } 
            return $data;
        }
        else
        {
            redirect(base_url('topper/create'));
        }
    }
    function _get_data_by_post()
    {
        $data['name'] = $this->input->post('name',true);
        $data['t_title'] = $this->input->post('t_title',true);
        $data['rank'] = $this->input->post('rank',true);
        $data['year'] = $this->input->post('year',true);
        $data['content'] = $this->input->post('content',true);
        return $data;
    }
    function manage()
    {
        $data['topper_return'] = $this->_custom_query("select * from topper order by id desc");
        $this->load->view('backend/Header',$data);
        $this->load->view('backend/topper/Manage');
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