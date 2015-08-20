<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class media_model extends CI_Model
{
    public function create($name,$mediatype,$image,$video,$order)
    {
        $data=array("name" => $name,"mediatype" => $mediatype,"image" => $image,"video" => $video,"order" => $order);
        $query=$this->db->insert( "armaan_media", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("armaan_media")->row();
        return $query;
    }
    function getsinglemedia($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("armaan_media")->row();
        return $query;
    }
    public function edit($id,$name,$mediatype,$image,$video,$order)
    {
        $data=array("name" => $name,"mediatype" => $mediatype,"image" => $image,"video" => $video,"order" => $order);
        $this->db->where( "id", $id );
        $query=$this->db->update( "armaan_media", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `armaan_media` WHERE `id`='$id'");
        return $query;
    }
    
	public function getmediatypedropdown()
	{
		$mediatype= array(
			 "1" => "Image",
			 "2" => "Video",
			);
		return $mediatype;
	}
    
	public function getmediaimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `armaan_media` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
