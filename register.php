<?php
include "register.html";

$conn =mysql_connect("localhost","root","");
if($conn)
{
 if(mysql_select_db("matrimony")){

//echo "connected...";

 }
}

/*if ($_FILES["file"]["error"] > 0)
  
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
else
  {
  //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  //echo "Type: " . $_FILES["file"]["type"] . "<br>";
  //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  //echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }*/

if(isset( $_POST['pname'])&&isset($_POST['age'])&&isset($_POST['religion'])&&isset($_POST['mother'])&&isset($_POST['country'])&&isset($_POST['mobile'])&&isset($_POST['email'])&&isset($_POST['password']))
{

if (!empty($_POST['pname'])&&!empty($_POST['age'])&&!empty($_POST['religion'])&&!empty($_POST['mother'])&&!empty($_POST['country'])&&!empty($_POST['mobile'])&&!empty($_POST['email'])&&!empty($_POST['password']))
 {
        # code...

	 $name = $_POST['pname'];
        $age = $_POST['age'];
        $gender=$_POST['f'];
       
        $religion=$_POST['religion'];
        $mother=$_POST['mother'];
        $country=$_POST['country'];
        $mobile=$_POST['mobile'];
        $username=$_POST['email'];
        $password = $_POST['password'];
      
        


$target_path = "c:/xampp/htdocs/matrimony/images/";

$target_path = $target_path . basename( $_FILES['file']['name']); 

//moving temp file into target folder on our system
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
   // echo "The file ".  basename( $_FILES['file']['name']). 
    //" has been uploaded";


 $query ="insert into 
 register (name,age,gender,religion,mother,country,mobile,username,password,image) VALUES('".$name."','".$age."', '".$gender."','".$religion."','".$mother."','".$country."','".$mobile."','".$username."','".$password."','".mysql_real_escape_string(file_get_contents($target_path))."');";

if($res=mysql_query($query))
{
echo "Registered Successfully";
}
}
}
}
?>