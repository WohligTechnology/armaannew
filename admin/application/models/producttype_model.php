<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class producttype_model extends CI_Model
{
    public function create($name,$order)
    {
        $data=array("name" => $name,"order" => $order);
        $query=$this->db->insert( "armaan_producttype", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("armaan_producttype")->row();
        return $query;
    }
    function getsingleproducttype($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("armaan_producttype")->row();
        return $query;
    }
    public function edit($id,$name,$order)
    {
        $data=array("name" => $name,"order" => $order);
        $this->db->where( "id", $id );
        $query=$this->db->update( "armaan_producttype", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `armaan_producttype` WHERE `id`='$id'");
        return $query;
    }
    
    public function getproducttypedropdown()
	{
		$query=$this->db->query("SELECT * FROM `armaan_producttype`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
}
?>
