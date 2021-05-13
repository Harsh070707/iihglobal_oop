<!DOCTYPE html>
<?php require_once "config/dbconfig.php";

   $db=new operations();
   

?>
<html>
<head>
	<title>Add Employee</title>

   <style type="text/css">
input[type=text], select {
  width: 20rem;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button{
width: 20rem;
border-radius: 4px;
padding: 12px 20px;
background-color: green;
}
   </style>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

   <script type="text/javascript">
      $(document).ready(function(){
      $("#form").validate({
  rules: {
    number:{ 
required: true,
minlength: 10,
maxlength: 10
},
    email: {
      required: true,
      email: true
    }
  },
  messages: {
    number:{
    required: "Please specify your contact number"

   },
    email: {
      required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@domain.com"
    }
}
});

});
      


   </script>
</head>
<body>
<?php $db->Store_Record();?>

<div style="margin-left: 500px;">

   <a href="view.php"><button style="background-color: blue; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left: 530px; 

" >View List Employee</button></a>


   <h1>Employee Form</h1>

<form  method="post" enctype="multipart/form-data">

	

<input type="text" name="company" placeholder="Organization Name" required>


</select>

   <br>

<input type="text" name="name" placeholder="Employee Name" required>
   <br>
<input type="text" name="email" placeholder="Email">
   <br>
<input type="text" name="number" placeholder="Mobile No">

   <br>

<select id="gender" name="gen">
	
	<option value="Male">Male</option>
	<option value="Female">Female</option>

</select>
   <br>

<input type="text" name="address" placeholder="Address" required>
   <br>


<input type="file" id="inputImage" name="photo">
   <br>

<button type="submit" name="submit">Add Employee</button>




</form>
</div>
</body>
</html>