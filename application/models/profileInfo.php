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
}