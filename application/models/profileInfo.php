<?php

class profileInfo extends  CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    function get_info()
    {
        $id = $this->session->userdata['info']['id'];
        $db = $this->session->userdata['info']['db'];
        $sid = "$id";
        $sdb = "$db";
        $dinfo = array('id'=>$sid);
        return $this->db->get_where($sdb,$dinfo)->row_array();

    }

    function edit($params){

        $id = $this->session->userdata['info']['id'];
        $db = $this->session->userdata['info']['db'];
        $sid = "$id";
        $sdb = "$db";
        $this->db->where('id',$sid);
        return $this->db->update($sdb,$params);

    }

    function addsocial(){
        $field = array(
            'google'=>$this->input->post('google'),
            'twitter'=>$this->input->post('twitter'),
            'skype'=>$this->input->post('skype'),
            'github'=>$this->input->post('github'),
            'linkedin'=>$this->input->post('linkedin'),
            'facebook'=>$this->input->post('facebook')
        );
        $id = $this->session->userdata['info']['id'];
        $db = $this->session->userdata['info']['db'];
        $sid = "$id";
        $sdb = "$db";
        $this->db->where('id',$sid);
        return $this->db->update($sdb,$field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }



}