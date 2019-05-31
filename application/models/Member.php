<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Model{

    function __construct() {
        // Set table name
    }

    function insert()
    {
        if(isset($_POST["image"]))
        {
            $data = $_POST["image"];
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $imageName = time() . '.png';
            file_put_contents($imageName, $data);
            $image_file = addslashes(file_get_contents($imageName));

            /*$query = "INSERT INTO tbl_images(images) VALUES ('".$image_file."')";

            $statement = $connect->prepare($query);*/

            $params = array(
                'image' => $image_file
            );
            $id = $this->session->userdata['info']['id'];
            $db = $this->session->userdata['info']['db'];
            $sid = "$id";
            $sdb = "$db";
            //$this->db->where('id',$sid);
            if($this->db->insert($sdb, $params))
            {
                echo 'Mise à jour de l\'image dans la base de données avec succès';
                unlink($imageName);
            }

        }

    }

    function fetch() {

        $query = $this->db->get('utilisateur');
        $output = '<div class="row">';
        if($query->num_rows() > 0){
            $result = $query->result_array();
            foreach($result as $row)
            {
                $output .= '
                      <div class="col-md-2" style="margin-bottom:16px;">
                       <img src="data:image/png;base64,'.base64_encode($row['image']).'" class="img-thumbnail" />
                      </div>
                      ';
            }
        }
        $output .= '</div>';
        echo $output;

    }


    /*
     * Fetch members data from the database
     * @param array filter data based on the passed parameters

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);

        if(array_key_exists("conditions", $params)){
            foreach($params['conditions'] as $key => $val){
                $this->db->where($key, $val);
            }
        }

        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("id", $params)){
                $this->db->where('id', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('first_name', 'asc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }

                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        // Return fetched data
        return $result;
    }

    /*
     * Insert members data into the database
     * @param $data data to be insert based on the passed parameters

    public function insert($data = array()) {
        if(!empty($data)){
            // Add created and modified date if not included
            if(!array_key_exists("created", $data)){
                $data['created'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }

            // Insert member data
            $insert = $this->db->insert($this->table, $data);

            // Return the status
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }

    /*
     * Update member data into the database
     * @param $data array to be update based on the passed parameters
     * @param $id num filter data

    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            // Add modified date if not included
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }

            // Update member data
            $update = $this->db->update($this->table, $data, array('id' => $id));

            // Return the status
            return $update?true:false;
        }
        return false;
    }

    /*
     * Delete member data from the database
     * @param num filter data based on the passed parameter

    public function delete($id){
        // Delete member data
        $delete = $this->db->delete($this->table, array('id' => $id));

        // Return the status
        return $delete?true:false;
    }*/
}