<?php
class Export_csv_model extends CI_Model
{
    function fetch_data()
    {

        $this->db->select("Nom,PreNom,nom_Entreprise,Adresse,Ville,Code_postal,Pays,Telephone,site");
        $this->db->from('client');
         $this->db->where('id_utilisateur',$this->session->userdata['info']['id']);
        return $this->db->get();
    }
}

?>

