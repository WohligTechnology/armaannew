<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class project_model extends CI_Model
{
    public function create($name,$pieces,$description,$image,$order,$status,$producttype,$json)
    {
        $data=array("name" => $name,"pieces" => $pieces,"description" => $description,"image" => $image,"order" => $order,"status" => $status,"producttype" => $producttype,"json" => $json);
        $query=$this->db->insert( "armaan_project", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("armaan_project")->row();
        return $query;
    }
    function getsingleproject($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("armaan_project")->row();
        return $query;
    }
    public function edit($id,$name,$pieces,$description,$image,$order,$status,$producttype,$json)
    {
        $data=array("name" => $name,"pieces" => $pieces,"description" => $description,"image" => $image,"order" => $order,"status" => $status,"producttype" => $producttype,"json" => $json);
        $this->db->where( "id", $id );
        $query=$this->db->update( "armaan_project", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `armaan_project` WHERE `id`='$id'");
        return $query;
    }
    
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enable",
			 "0" => "Disable",
			);
		return $status;
	}
    
	public function getprojectimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `armaan_project` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
