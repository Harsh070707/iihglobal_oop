<?php

error_reporting(E_ALL);
//session_start();
require_once "dbconfig.php";

$db= new dbconfig();

class operations extends dbconfig
{

	public function Store_Record()
	{
          global $db;
		if(isset($_POST['submit']))
		{
           
			$company=$db->check($_POST['company']);
			$name=$db->check($_POST['name']);
			$email=$db->check($_POST['email']);
			$number=$db->check($_POST['number']);
			$gender=$db->check($_POST['gen']);
			$address=$db->check($_POST['address']);
			$target = "upload/"; 
	        $target = $target . basename( $_FILES['photo']['name']);
	        $pic = ($_FILES['photo']['name']);
	        $getdire='upload';
			if(!file_exists($getdire)){
				mkdir($getdire);
			}

			move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/". $_FILES["photo"]["name"]);         
			    $pic=$_FILES["photo"]["name"];
						
			if($this->insert_record($company,$name,$email,$number,$gender,$address,$pic))

			{
				echo '<div class="alert alert-success">Your record has been inserted</div>';
			}
			else
			{
				echo '<div class="alert alert-danger">Your record has not inserted</div>';

			}
		}

	}

    //insert record in the database 

	function insert_record($a,$b,$c,$d,$e,$f,$g)
	{
		global $db;

		$query="INSERT INTO iihemp(company,name,email,numbers,gender,address,image) VALUES('$a','$b','$c','$d','$e','$f','$g')";
		$result=mysqli_query($db->connection,$query);

		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	//select a perticular record
	public function sel_comp()
	{
		global $db;
		$query="SELECT DISTINCT company FROM iihemp ";
       $result=mysqli_query($db->connection,$query);
       return $result;
	}

	//select data from database
	public function view_record()
	{
		global $db;

		$query="SELECT * FROM iihemp";
		$result=mysqli_query($db->connection,$query);
		return $result;
	}


     
	//get a perticular comapny record
	public function comp_rec($id)
	{
		global $db;
	$query="SELECT * FROM iihemp WHERE company='$id'";
    $getemp=mysqli_query($db->connection,$query);
    return $getemp;
    }

    //get based on comp record
    public function compbased_rec($company)
    {
    	global $db;
    	$query="SELECT * FROM iihemp WHERE company LIKE '%{$company}%'";
        $getemp=mysqli_query($db->connection,$query);
        return $getemp;
    }

	//get perticular data from database
	public function get_record($id)
	{
		global $db;

		$query="SELECT * FROM iihemp WHERE id='$id'";
		$data=mysqli_query($db->connection,$query);
		return $data;
	}

	//UPDATE RECORD

	public function update()
	{
		global $db;

             
      if(isset($_POST['submitup']))
      {
             $id     =$db->$_POST['id'];
		     $company=$db->check($_POST['company']);
			$name    =$db->check($_POST['name']);
			$email   =$db->check($_POST['email']);
			$number  =$db->check($_POST['number']);
			$gender  =$db->check($_POST['gen']);
			$address =$db->check($_POST['address']);
			$target = "upload/"; 
	        $target = $target . basename( $_FILES['photo']['name']);
	        $pic = ($_FILES['photo']['name']);
	        $getdire='upload';
			if(!file_exists($getdire)){
				mkdir($getdire);
			}

			move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/". $_FILES["photo"]["name"]);         
			    $pic=$_FILES["photo"]["name"];

			if($this->update_record($id,$company,$name,$email,$number,$gender,$address,$pic))
			{
                  $this->set_message('<div class="alert alert-success">Your record is updated</div>');
                  header("location:view.php");
			}
			else
			{
				$this->set_message('<div class="alert alert-danger">Your record is not updated</div>');
			}

	  }
	}

	//update function2 

	public function update_record($idin,$com,$nam,$ema,$num,$gen,$addr,$pi)
	{
		global $db;
          
        
		$query="UPDATE iihemp SET company='$com', name='$nam', email='$ema', numbers='$num', gender='$gen', address='$addr', image='$pi' WHERE id= '$idin'";
		$result=mysqli_query($db->connection,$query);
		if($result)
		{
			return true;

		}
		else
		{
			return false;
		}


	}

	//set session message
    public function set_message($msg)
    {
    	if(!empty($msg))
    	{
    		$_SESSION['message']=$msg;

    	}
    	else
    	{
    		$msg="";
    	}


    }

    //Display session Message
    public function display_message()
    {
    	if (isset($_SESSION['message']))
    	 {
    	echo $_SESSION['message'];
    	unset($_SESSION['message']);
    	}
    }

    //delete perticular id

    public function Delete_Record($id)
    {
    	global $db;
    	$query="DELETE FROM iihemp WHERE id='$id'";
    	$result=mysqli_query($db->connection,$query);
    	if($result)
    	{
    	return true;
    }
    else{
    	return false;
    }
    }
}

?>