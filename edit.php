<!DOCTYPE html>

<?php
  require_once "config/dbconfig.php";
  $db=new operations();
  $db->update();
  $ids=$_GET['id'];
  $result = $db->get_record($ids);
  $data=mysqli_fetch_assoc($result);

?>



<html>
<head>
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


   <title>Employee Listing</title>
</head>
<body>

<div style="margin-left: 500px;">

<h1>Employee Form Updation</h1>

<?php $db->Store_Record(); ?>

<form  method="post" enctype="multipart/form-data">

  <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

<input type="text" name="company" value="<?php echo $data['company']; ?>" placeholder="Organization">

   <br>

<input type="text" name="name" value="<?php echo $data['name']; ?>" placeholder="Employee Name">
   <br>
<input type="text" name="email" value="<?php echo $data['email']; ?>" placeholder="Email">
   <br>
<input type="text" name="number" value="<?php echo $data['numbers']; ?>" placeholder="Mobile No">

   <br>
   
  <select id="gender" name="gen" value="<?php echo $data['gender']; ?>">
  
  <option value="Male">Male</option>
  <option value="Female">Female</option>

</select>

  <br>

<input type="text" name="address" value="<?php echo $data['address']; ?>" placeholder="Address" required>
   <br>

   <input type="file" id="inputImage" name="photo">
   <br>

<button type="submit" name="submitup">Update Employee Details </button>




</form>
</div>


</body>
</html>