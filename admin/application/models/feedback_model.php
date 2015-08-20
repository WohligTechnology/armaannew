<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class feedback_model extends CI_Model
{
    public function create($name,$email,$feedback,$phone,$address1,$address2,$city,$country,$postcode)
    {
        $data=array("name" => $name,"email" => $email,"feedback" => $feedback,"phone" => $phone,"address1" => $address1,"address2" => $address2,"city" => $city,"country" => $country,"postcode" => $postcode);
        $query=$this->db->insert( "armaan_feedback", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("armaan_feedback")->row();
        return $query;
    }
    function getsinglefeedback($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("armaan_feedback")->row();
        return $query;
    }
    public function edit($id,$name,$email,$feedback,$phone,$address1,$address2,$city,$country,$postcode)
    {
        $data=array("name" => $name,"email" => $email,"feedback" => $feedback,"phone" => $phone,"address1" => $address1,"address2" => $address2,"city" => $city,"country" => $country,"postcode" => $postcode);
        $this->db->where( "id", $id );
        $query=$this->db->update( "armaan_feedback", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `armaan_feedback` WHERE `id`='$id'");
        return $query;
    }
}
?>
