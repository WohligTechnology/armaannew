<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller 
{
    // new functions
    public function getproducttype()
    {
        $data['message']=$this->rest_model->getproducttype();
        $this->load->view('json',$data);
    }
//    public function checkcaptcha() {
//        $captcha=$this->input->get_post("g-recaptcha-response");
//        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc3HAsTAAAAAAe0UEJdq8g24GduGbZ8WaYPXpaz&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
//        $data=array();
//        if($response['success'] == false)
//        {
//          $data["message"]=array("This is a spam");
//        }
//        else
//        {
//          
//        }
//        $this->load->view("json",$data);
//    }    
    public function checkcaptcha() {
        $captcha=$this->input->get_post("g-recaptcha-response");
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc3HAsTAAAAAAe0UEJdq8g24GduGbZ8WaYPXpaz&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        $data=array();
        if($response['success'] == false)
        {
          $data["message"]=array("This is a spam");
        }
        else
        {
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $feedback=$this->input->get_post('feedback');
            $phone=$this->input->get_post('phone');
            $address1=$this->input->get_post('address1');
            $address2=$this->input->get_post('address2');
            $city=$this->input->get_post('city');
            $country=$this->input->get_post('country');
            $postcode=$this->input->get_post('postcode');
            $data['message']=$this->rest_model->addfeedback($name,$email,$feedback,$phone,$address1,$address2,$city,$country,$postcode);
        }
        $this->load->view("json",$data);
    }
    function viewprojectbyprojecttype()
    {
        $producttype=$this->input->get('producttype');
        
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`armaan_project`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`armaan_project`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`armaan_project`.`pieces`";
        $elements[2]->sort="1";
        $elements[2]->header="Pieces";
        $elements[2]->alias="pieces";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`armaan_project`.`description`";
        $elements[3]->sort="1";
        $elements[3]->header="Description";
        $elements[3]->alias="description";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`armaan_project`.`image`";
        $elements[4]->sort="1";
        $elements[4]->header="Image";
        $elements[4]->alias="image";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`armaan_project`.`order`";
        $elements[5]->sort="1";
        $elements[5]->header="Order";
        $elements[5]->alias="order";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`armaan_project`.`status`";
        $elements[6]->sort="1";
        $elements[6]->header="Status";
        $elements[6]->alias="status";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`armaan_project`.`producttype`";
        $elements[7]->sort="1";
        $elements[7]->header="Product Type";
        $elements[7]->alias="producttype";
        
        $elements[8]=new stdClass();
        $elements[8]->field="`armaan_project`.`json`";
        $elements[8]->sort="1";
        $elements[8]->header="Json";
        $elements[8]->alias="json";
        
        $elements[9]=new stdClass();
        $elements[9]->field="`armaan_producttype`.`name`";
        $elements[9]->sort="1";
        $elements[9]->header="Product Type";
        $elements[9]->alias="producttypename";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=10;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `armaan_project` LEFT OUTER JOIN `armaan_producttype` ON `armaan_producttype`.`id`=`armaan_project`.`producttype`","WHERE `producttype`='$producttype'");
        $this->load->view("json",$data);
    }

    public function getproductbyid()
    {
        $id=$this->input->get('id');
        $data['message']=$this->rest_model->getproductbyid($id);
        $this->load->view("json",$data);
    }
    
    public function getmedia()
    {
        $data['message']=$this->rest_model->getmedia();
        $this->load->view("json",$data);
    }
    function getmediapagination()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`armaan_media`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`armaan_media`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`armaan_media`.`mediatype`";
        $elements[2]->sort="1";
        $elements[2]->header="Media Type";
        $elements[2]->alias="mediatype";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`armaan_media`.`image`";
        $elements[3]->sort="1";
        $elements[3]->header="Image";
        $elements[3]->alias="image";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`armaan_media`.`video`";
        $elements[4]->sort="1";
        $elements[4]->header="Video URL";
        $elements[4]->alias="video";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`armaan_media`.`order`";
        $elements[5]->sort="1";
        $elements[5]->header="Order";
        $elements[5]->alias="order";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=10;
        }
        if($orderby=="")
        {
            $orderby="order";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `armaan_media`");
        $this->load->view("json",$data);
    }

    public function addfeedback()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if($data==NULL)
        {
            $data['message']=0;
        }
        else
        {
            $name=$data['name'];
            $email=$data['email'];
            $feedback=$data['feedback'];
            $phone=$data['phone'];
            $address1=$data['address1'];
            $address2=$data['address2'];
            $city=$data['city'];
            $country=$data['country'];
            $postcode=$data['postcode'];
            $data['message']=$this->rest_model->addfeedback($name,$email,$feedback,$phone,$address1,$address2,$city,$country,$postcode);
        }
        
        $this->load->view('json',$data);
    }
    
    //previous functions
    
    function getallproducttype()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`armaan_producttype`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`armaan_producttype`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`armaan_producttype`.`order`";
$elements[2]->sort="1";
$elements[2]->header="Order";
$elements[2]->alias="order";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `armaan_producttype`");
$this->load->view("json",$data);
}
public function getsingleproducttype()
{
$id=$this->input->get_post("id");
$data["message"]=$this->producttype_model->getsingleproducttype($id);
$this->load->view("json",$data);
}
function getallproject()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`armaan_project`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`armaan_project`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`armaan_project`.`pieces`";
$elements[2]->sort="1";
$elements[2]->header="Pieces";
$elements[2]->alias="pieces";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`armaan_project`.`description`";
$elements[3]->sort="1";
$elements[3]->header="Description";
$elements[3]->alias="description";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`armaan_project`.`image`";
$elements[4]->sort="1";
$elements[4]->header="Image";
$elements[4]->alias="image";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`armaan_project`.`order`";
$elements[5]->sort="1";
$elements[5]->header="Order";
$elements[5]->alias="order";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`armaan_project`.`status`";
$elements[6]->sort="1";
$elements[6]->header="Status";
$elements[6]->alias="status";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`armaan_project`.`producttype`";
$elements[7]->sort="1";
$elements[7]->header="Product Type";
$elements[7]->alias="producttype";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`armaan_project`.`json`";
$elements[8]->sort="1";
$elements[8]->header="Json";
$elements[8]->alias="json";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `armaan_project`");
$this->load->view("json",$data);
}
public function getsingleproject()
{
$id=$this->input->get_post("id");
$data["message"]=$this->project_model->getsingleproject($id);
$this->load->view("json",$data);
}
function getallmedia()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`armaan_media`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`armaan_media`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`armaan_media`.`mediatype`";
$elements[2]->sort="1";
$elements[2]->header="Media Type";
$elements[2]->alias="mediatype";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`armaan_media`.`image`";
$elements[3]->sort="1";
$elements[3]->header="Image";
$elements[3]->alias="image";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`armaan_media`.`video`";
$elements[4]->sort="1";
$elements[4]->header="Video URL";
$elements[4]->alias="video";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`armaan_media`.`order`";
$elements[5]->sort="1";
$elements[5]->header="Order";
$elements[5]->alias="order";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `armaan_media`");
$this->load->view("json",$data);
}
public function getsinglemedia()
{
$id=$this->input->get_post("id");
$data["message"]=$this->media_model->getsinglemedia($id);
$this->load->view("json",$data);
}
function getallfeedback()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`armaan_feedback`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`armaan_feedback`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`armaan_feedback`.`email`";
$elements[2]->sort="1";
$elements[2]->header="Email";
$elements[2]->alias="email";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`armaan_feedback`.`feedback`";
$elements[3]->sort="1";
$elements[3]->header="Feedback";
$elements[3]->alias="feedback";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`armaan_feedback`.`phone`";
$elements[4]->sort="1";
$elements[4]->header="Phone";
$elements[4]->alias="phone";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`armaan_feedback`.`address1`";
$elements[5]->sort="1";
$elements[5]->header="Address1";
$elements[5]->alias="address1";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`armaan_feedback`.`address2`";
$elements[6]->sort="1";
$elements[6]->header="Address2";
$elements[6]->alias="address2";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`armaan_feedback`.`city`";
$elements[7]->sort="1";
$elements[7]->header="City";
$elements[7]->alias="city";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`armaan_feedback`.`country`";
$elements[8]->sort="1";
$elements[8]->header="Country";
$elements[8]->alias="country";

$elements=array();
$elements[9]=new stdClass();
$elements[9]->field="`armaan_feedback`.`postcode`";
$elements[9]->sort="1";
$elements[9]->header="Postcode";
$elements[9]->alias="postcode";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `armaan_feedback`");
$this->load->view("json",$data);
}
public function getsinglefeedback()
{
$id=$this->input->get_post("id");
$data["message"]=$this->feedback_model->getsinglefeedback($id);
$this->load->view("json",$data);
}
} ?>