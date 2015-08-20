<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
	public function index()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );	
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );	
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
            $data['category']=$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );	
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
//            $category=$this->input->post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
			if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			$data['redirect']="site/viewusers";
			$this->load->view("redirect",$data);
		}
	}
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");
        
		$data['title']='View Users';
		$this->load->view('template',$data);
	} 
    function viewusersjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`logintype`.`name`";
        $elements[4]->sort="1";
        $elements[4]->header="Logintype";
        $elements[4]->alias="logintype";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";
       
        $elements[6]=new stdClass();
        $elements[6]->field="`accesslevel`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Accesslevel";
        $elements[6]->alias="accesslevelname";
       
        $elements[7]=new stdClass();
        $elements[7]->field="`statuses`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";
       
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`");
        
		$this->load->view("json",$data);
	} 
    
    
	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
            
            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
//            $category=$this->input->get_post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    
    
    
    public function viewproducttype()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewproducttype";
        $data["base_url"]=site_url("site/viewproducttypejson");
        $data["title"]="View producttype";
        $this->load->view("template",$data);
    }
    function viewproducttypejson()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`armaan_producttype`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        $elements[1]=new stdClass();
        $elements[1]->field="`armaan_producttype`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `armaan_producttype`");
        $this->load->view("json",$data);
    }

    public function createproducttype()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createproducttype";
        $data["title"]="Create producttype";
        $this->load->view("template",$data);
    }
    public function createproducttypesubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("order","Order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createproducttype";
            $data["title"]="Create producttype";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $order=$this->input->get_post("order");
            if($this->producttype_model->create($name,$order)==0)
            $data["alerterror"]="New producttype could not be created.";
            else
            $data["alertsuccess"]="producttype created Successfully.";
            $data["redirect"]="site/viewproducttype";
            $this->load->view("redirect",$data);
        }
    }
    public function editproducttype()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editproducttype";
        $data["title"]="Edit producttype";
        $data["before"]=$this->producttype_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editproducttypesubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("order","Order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editproducttype";
            $data["title"]="Edit producttype";
            $data["before"]=$this->producttype_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $order=$this->input->get_post("order");
            if($this->producttype_model->edit($id,$name,$order)==0)
            $data["alerterror"]="New producttype could not be Updated.";
            else
            $data["alertsuccess"]="producttype Updated Successfully.";
            $data["redirect"]="site/viewproducttype";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteproducttype()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->producttype_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewproducttype";
        $this->load->view("redirect",$data);
    }
    public function viewproject()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewproject";
        $data["base_url"]=site_url("site/viewprojectjson");
        $data["title"]="View project";
        $this->load->view("template",$data);
    }
    function viewprojectjson()
    {
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `armaan_project` LEFT OUTER JOIN `armaan_producttype` ON `armaan_producttype`.`id`=`armaan_project`.`producttype`");
        $this->load->view("json",$data);
    }

    public function createproject()
    {
        $access=array("1");
        $this->checkaccess($access);
        
            $json=array();

            $json[0]=new stdClass();
            $json[0]->placeholder="";
            $json[0]->value="";
            $json[0]->label="Meta Title";
            $json[0]->type="text";
            $json[0]->options="";
            $json[0]->classes="";

            $json[1]=new stdClass();
            $json[1]->placeholder="";
            $json[1]->value="";
            $json[1]->label="Meta Description";
            $json[1]->type="text";
            $json[1]->options="";
            $json[1]->classes="";


            $data["fieldjson"]=$json;
        
        
        $data['producttype']=$this->producttype_model->getproducttypedropdown();
        $data['status']=$this->project_model->getstatusdropdown();
        $data["page"]="createproject";
        $data["title"]="Create project";
        $this->load->view("template",$data);
    }
    public function createprojectsubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("pieces","Pieces","trim");
        $this->form_validation->set_rules("description","Description","trim");
        $this->form_validation->set_rules("image","Image","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("producttype","Product Type","trim");
        $this->form_validation->set_rules("json","Json","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createproject";
            $data["title"]="Create project";
            $data['producttype']=$this->producttype_model->getproducttypedropdown();
            $data['status']=$this->project_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $pieces=$this->input->get_post("pieces");
            $description=$this->input->get_post("description");
//            $image=$this->input->get_post("image");
            $order=$this->input->get_post("order");
            $status=$this->input->get_post("status");
            $producttype=$this->input->get_post("producttype");
            $json=$this->input->get_post("json");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            
            if($this->project_model->create($name,$pieces,$description,$image,$order,$status,$producttype,$json)==0)
            $data["alerterror"]="New project could not be created.";
            else
            $data["alertsuccess"]="project created Successfully.";
            $data["redirect"]="site/viewproject";
            $this->load->view("redirect",$data);
        }
    }
    public function editproject()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editproject";
        $data["title"]="Edit project";
        $data['producttype']=$this->producttype_model->getproducttypedropdown();
        $data['status']=$this->project_model->getstatusdropdown();
        $data["before"]=$this->project_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editprojectsubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("pieces","Pieces","trim");
        $this->form_validation->set_rules("description","Description","trim");
        $this->form_validation->set_rules("image","Image","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("producttype","Product Type","trim");
        $this->form_validation->set_rules("json","Json","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editproject";
            $data["title"]="Edit project";
            $data["before"]=$this->project_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $pieces=$this->input->get_post("pieces");
            $description=$this->input->get_post("description");
//            $image=$this->input->get_post("image");
            $order=$this->input->get_post("order");
            $status=$this->input->get_post("status");
            $producttype=$this->input->get_post("producttype");
            $json=$this->input->get_post("json");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->project_model->getprojectimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            if($this->project_model->edit($id,$name,$pieces,$description,$image,$order,$status,$producttype,$json)==0)
            $data["alerterror"]="New project could not be Updated.";
            else
            $data["alertsuccess"]="project Updated Successfully.";
            $data["redirect"]="site/viewproject";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteproject()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->project_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewproject";
        $this->load->view("redirect",$data);
    }
    public function viewmedia()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewmedia";
        $data["base_url"]=site_url("site/viewmediajson");
        $data["title"]="View media";
        $this->load->view("template",$data);
    }
    function viewmediajson()
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
        $maxrow=20;
        }
        if($orderby=="")
        {
        $orderby="id";
        $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `armaan_media`");
        $this->load->view("json",$data);
    }

    public function createmedia()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createmedia";
        $data["title"]="Create media";
        $data['mediatype']=$this->media_model->getmediatypedropdown();
        $this->load->view("template",$data);
    }
    public function createmediasubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("mediatype","Media Type","trim");
        $this->form_validation->set_rules("image","Image","trim");
        $this->form_validation->set_rules("video","Video URL","trim");
        $this->form_validation->set_rules("order","Order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createmedia";
            $data['mediatype']=$this->media_model->getmediatypedropdown();
            $data["title"]="Create media";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $mediatype=$this->input->get_post("mediatype");
//            $image=$this->input->get_post("image");
            $video=$this->input->get_post("video");
            $order=$this->input->get_post("order");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            
            if($this->media_model->create($name,$mediatype,$image,$video,$order)==0)
            $data["alerterror"]="New media could not be created.";
            else
            $data["alertsuccess"]="media created Successfully.";
            $data["redirect"]="site/viewmedia";
            $this->load->view("redirect",$data);
        }
    }
    public function editmedia()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editmedia";
        $data["title"]="Edit media";
        $data['mediatype']=$this->media_model->getmediatypedropdown();
        $data["before"]=$this->media_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editmediasubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("mediatype","Media Type","trim");
        $this->form_validation->set_rules("image","Image","trim");
        $this->form_validation->set_rules("video","Video URL","trim");
        $this->form_validation->set_rules("order","Order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editmedia";
            $data["title"]="Edit media";
            $data['mediatype']=$this->media_model->getmediatypedropdown();
            $data["before"]=$this->media_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $mediatype=$this->input->get_post("mediatype");
//            $image=$this->input->get_post("image");
            $video=$this->input->get_post("video");
            $order=$this->input->get_post("order");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->media_model->getmediaimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            
            if($this->media_model->edit($id,$name,$mediatype,$image,$video,$order)==0)
            $data["alerterror"]="New media could not be Updated.";
            else
            $data["alertsuccess"]="media Updated Successfully.";
            $data["redirect"]="site/viewmedia";
            $this->load->view("redirect",$data);
        }
    }
    public function deletemedia()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->media_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewmedia";
        $this->load->view("redirect",$data);
    }
    public function viewfeedback()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewfeedback";
        $data["base_url"]=site_url("site/viewfeedbackjson");
        $data["title"]="View feedback";
        $this->load->view("template",$data);
    }
    function viewfeedbackjson()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`armaan_feedback`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        $elements[1]=new stdClass();
        $elements[1]->field="`armaan_feedback`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        $elements[2]=new stdClass();
        $elements[2]->field="`armaan_feedback`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";
        $elements[3]=new stdClass();
        $elements[3]->field="`armaan_feedback`.`feedback`";
        $elements[3]->sort="1";
        $elements[3]->header="Feedback";
        $elements[3]->alias="feedback";
        $elements[4]=new stdClass();
        $elements[4]->field="`armaan_feedback`.`phone`";
        $elements[4]->sort="1";
        $elements[4]->header="Phone";
        $elements[4]->alias="phone";
        $elements[5]=new stdClass();
        $elements[5]->field="`armaan_feedback`.`address1`";
        $elements[5]->sort="1";
        $elements[5]->header="Address1";
        $elements[5]->alias="address1";
        $elements[6]=new stdClass();
        $elements[6]->field="`armaan_feedback`.`address2`";
        $elements[6]->sort="1";
        $elements[6]->header="Address2";
        $elements[6]->alias="address2";
        $elements[7]=new stdClass();
        $elements[7]->field="`armaan_feedback`.`city`";
        $elements[7]->sort="1";
        $elements[7]->header="City";
        $elements[7]->alias="city";
        $elements[8]=new stdClass();
        $elements[8]->field="`armaan_feedback`.`country`";
        $elements[8]->sort="1";
        $elements[8]->header="Country";
        $elements[8]->alias="country";
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
        $maxrow=20;
        }
        if($orderby=="")
        {
        $orderby="id";
        $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `armaan_feedback`");
        $this->load->view("json",$data);
    }

    public function createfeedback()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createfeedback";
        $data["title"]="Create feedback";
        $this->load->view("template",$data);
    }
    public function createfeedbacksubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("email","Email","trim");
        $this->form_validation->set_rules("feedback","Feedback","trim");
        $this->form_validation->set_rules("phone","Phone","trim");
        $this->form_validation->set_rules("address1","Address1","trim");
        $this->form_validation->set_rules("address2","Address2","trim");
        $this->form_validation->set_rules("city","City","trim");
        $this->form_validation->set_rules("country","Country","trim");
        $this->form_validation->set_rules("postcode","Postcode","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createfeedback";
            $data["title"]="Create feedback";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $email=$this->input->get_post("email");
            $feedback=$this->input->get_post("feedback");
            $phone=$this->input->get_post("phone");
            $address1=$this->input->get_post("address1");
            $address2=$this->input->get_post("address2");
            $city=$this->input->get_post("city");
            $country=$this->input->get_post("country");
            $postcode=$this->input->get_post("postcode");
            if($this->feedback_model->create($name,$email,$feedback,$phone,$address1,$address2,$city,$country,$postcode)==0)
            $data["alerterror"]="New feedback could not be created.";
            else
            $data["alertsuccess"]="feedback created Successfully.";
            $data["redirect"]="site/viewfeedback";
            $this->load->view("redirect",$data);
        }
    }
    public function editfeedback()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editfeedback";
        $data["title"]="Edit feedback";
        $data["before"]=$this->feedback_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editfeedbacksubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("email","Email","trim");
        $this->form_validation->set_rules("feedback","Feedback","trim");
        $this->form_validation->set_rules("phone","Phone","trim");
        $this->form_validation->set_rules("address1","Address1","trim");
        $this->form_validation->set_rules("address2","Address2","trim");
        $this->form_validation->set_rules("city","City","trim");
        $this->form_validation->set_rules("country","Country","trim");
        $this->form_validation->set_rules("postcode","Postcode","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editfeedback";
            $data["title"]="Edit feedback";
            $data["before"]=$this->feedback_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $email=$this->input->get_post("email");
            $feedback=$this->input->get_post("feedback");
            $phone=$this->input->get_post("phone");
            $address1=$this->input->get_post("address1");
            $address2=$this->input->get_post("address2");
            $city=$this->input->get_post("city");
            $country=$this->input->get_post("country");
            $postcode=$this->input->get_post("postcode");
            if($this->feedback_model->edit($id,$name,$email,$feedback,$phone,$address1,$address2,$city,$country,$postcode)==0)
            $data["alerterror"]="New feedback could not be Updated.";
            else
            $data["alertsuccess"]="feedback Updated Successfully.";
            $data["redirect"]="site/viewfeedback";
            $this->load->view("redirect",$data);
        }
    }
    public function deletefeedback()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->feedback_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewfeedback";
        $this->load->view("redirect",$data);
    }

}
?>
