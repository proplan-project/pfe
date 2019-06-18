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
            $imageName = './uploads/profiles/'.time() . '.png';
            file_put_contents($imageName, $data);
            $image_file = base64_encode(file_get_contents($imageName));

            $params = array(
                'image' => $imageName
            );
            $db = $this->session->userdata['info']['db'];
            $sdb = "$db";
            $id = $this->session->userdata['info']['id'];
            $sid = "$id";
            $this->db->where('id',$sid);
            $res = $this->db->update($sdb, $params) ;
            if($res)
            {
                echo 'Mise à jour de l\'image dans la base de données avec succès';
                //unlink($imageName);
            }

        }

    }

    function fetch() {

     //   $this->db->where('id',$this->session->userdata['info']['id']);

        $query = $this->db->get_where(array('db' =>  $this->session->userdata['info']['db'] ), array('id' =>  $this->session->userdata['info']['id'] ));
        $output = '<div class="row">';
        if($query->num_rows() > 0){
            $result = $query->result_array();
            foreach($result as $row)
            {
                if ($row['image'] == null){
                    $img = "<img id='avatar' src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' class='avatar img-circle img-thumbnail' alt='avatar' style='width: 200px;height: 200px;cursor: pointer'> ";
                    break;
                }else{
                    $img =  " <img  id='avatar' src='" .base_url() . $row['image']. "' class='avatar img-circle img-thumbnail' alt='avatar'   style='width: 200px;height: 200px ;cursor: pointer'>";
                    break;
                }


             }
        }

        $output .= "
                     <div style=\"margin-left: 55px ; position:relative\" id=\"imghide\" class=\"new_Btn\"  onmouseover='showhiddenimg()' >
                             $img
                        
                            <div style=\"background-color:hsla(0, 3%, 0%, 0.3); position:relative;width: 200px;height: 200px ;border-radius: 50%; margin-top: -200px; display: none; cursor:pointer;z-index:500000\" id=\"boxson\" >
                                <br><br><br>
                                <p style=\"text-align: center;color: #FFFFFF\"><i class=\"fa fa-camera\" aria-hidden=\"true\" style=\"font-size: 40px;margin-left: -24px\"></i><br>
                                    CHANGER LA  <br>PHOTO DE <br>PROFILE</p>
                            </div>
                        </div></div>
                ";

        echo  "$output";

        return 0;
    }

    function show(){
        echo 'yes';
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