<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class Rest_model extends CI_Model
{
	public function getproducttype()
	{
		$query=$this->db->query("SELECT `id`, `name`, `order` FROM `armaan_producttype` ORDER BY `order` ASC")->result();
		return $query;
	}
	public function getproductbyid($id)
	{
		$query=$this->db->query("SELECT `armaan_project`.`id`,`armaan_project`. `name`,`armaan_project`. `pieces`,`armaan_project`. `description`,`armaan_project`. `image`,`armaan_project`. `order`,`armaan_project`. `status`,`armaan_project`. `producttype`,`armaan_project`. `json` 
        FROM `armaan_project` 
        WHERE `armaan_project`.`id`='$id'
        ORDER BY `armaan_project`.`order` ASC")->row();
		return $query;
	}
	public function getmedia()
	{
		$query=$this->db->query("SELECT `id`, `name`, `mediatype`, `image`, `video`, `order` FROM `armaan_media` 
        ORDER BY `order` ASC")->result();
		return $query;
	}
    
    public function addfeedback($name,$email,$feedback,$phone,$address1,$address2,$city,$country,$postcode)
    {
        $data=array(
                    "name" => $name,
                    "email" => $email,
                    "feedback" => $feedback,
                    "phone" => $phone,
                    "address1" => $address1,
                    "address2" => $address2,
                    "city" => $city,
                    "country" => $country,
                    "postcode" => $postcode
        );
        $query=$this->db->insert( "armaan_feedback", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
}
?>
