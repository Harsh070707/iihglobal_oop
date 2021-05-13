<!DOCTYPE html>
<?php 


require_once "config/dbconfig.php";
$db=new operations();


?>


<html>
<head>
 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
	$('#company').on('change',function(){

		$('#hides').hide();
        
        var companyids= $(this).val();

        $.ajax({
             
             method:"POST",
             url:"complist.php",
             dataType: "html",
             data:{id:companyids},
             success:function(data){
             	$('#compempllist').html(data);

             }
         
        });

	});

  $('#all').on('click',function(){
    $('#hides').show();

  });

	
});

</script>

<style>



	select {
  width: 20rem;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  margin-left: 150px;
  border-radius: 4px;
  box-sizing: border-box;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

button {
 ; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
 
  font-size: 16px;
}

.custom-select {
  position: relative;
  font-family: Arial;
}

</style>

	<title>Lists</title>
</head>
<body>


	<h1  style="color: lightblue;text-align: center">Employee List</h1>




	<select name="company" id="company" required>
	<option value="" id="permhide">Select Company</option>

<?php

$result =$db->sel_comp();

while ($fetchdata=mysqli_fetch_array($result)){
?>
<option value="<?php echo $fetchdata['company']?>"><?php echo $fetchdata['company'] ?></option>

<?php
}

?>
<option value="null" id="all">All Employees</option>

</select>

<a href="index.php"><button style="background-color: blue; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left: 530px; 

" >Add Employee</button></a>

<div style="margin-left: 100px;margin-top: 50px" id="hides">
	
  <?php $db->display_message();
        $db->display_message();
  ?>

    <table border='1'>
<tr>
<td align=center> <b>Id</b></td>
<td align=center><b>Company</b></td>
<td align=center><b>Employee Name</b></td>
<td align=center><b>Email</b></td></td>
<td align=center><b>Phone no.</b></td>
<td align=center><b>Gender</b></td>
<td align=center><b>Address</b></td>
<td align=center><b>Image</b></td>
<td align=center><b>Edit Employee</b></td>
<td align=center><b>Delete Employee</b></td>
</tr>
<?php
$count=1;
$results =$db->view_record();
while($data = mysqli_fetch_row($results))
{   
  ?>
     <tr>
    <td align=center><?php echo $count ?></td>
    <td align=center><?php echo $data[1] ?></td>
    <td align=center><?php echo $data[2] ?></td>
    <td align=center><?php echo $data[3] ?></td>
    <td align=center><?php echo $data[4] ?></td>
    <td align=center><?php echo $data[5] ?></td>
    <td align=center><?php echo $data[6] ?></td>
    <td align=center><?php echo "<img src='upload/$data[7]' 'width=40px height=40px'/>"?></td>

    <td align-center><button ><a href='edit.php?id=<?php echo $data[0] ?>' class="btn btn-success">Edit</a></button>
    <td align-center><button ><a href='delete.php?id=<?php echo $data[0] ?>' class="btn btn-danger">Delete</a></button>
     
    
    </tr>
    <?php
    $count++;
}
?>
</table>
 </div>

<div style="margin-left: 100px;margin-top: 50px" id="compempllist"></div>
</body>
</html>