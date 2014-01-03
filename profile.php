<?php
ob_start();
session_start();
include "profile.html";
$conn =mysql_connect("localhost","root","");
if($conn)
{
 if(mysql_select_db("matrimony")){

//echo "connected...";

 }

}

$titles=array("Name","Age","Gender","Religion","Mother-tongue","Country","Mobile","Email");

if(isset($_POST["username"]))
{
        if(!empty($_POST["username"]))
        {
         $query="select * from register where username='".$_POST['username']."';";
         $result=mysql_query($query);
         $numrows=mysql_num_rows($result);
         if ($numrows==0) {
	     echo "<center><h2 style=color:#FFF>No results found</h2></center>";
          }
         else{
           while($row=mysql_fetch_row($result)){
             $url="data:image/jpeg;base64,".base64_encode($row[9]);
	         echo "<img src=".$url."  style=height:240px;width:300px;margin-left:100px class=img-rounded >";
             echo "<legend class=offset1 style=color:#FFF><b>Personal info</b></legend>";
               for($i=0;$i<=7;$i++){
                 echo "<table class=table table-bordered  style=height:30px;width:300px;margin-left:200px;color:#FFF>";
                 echo "<tbody>";
  				 echo "<tr class=text-left>";
  				 echo "<td>".$titles[$i]."</td>";
  				 echo "<td>".$row[$i]."</td>";
  				 echo "</tr>";
  				 echo "</tbody>";
  				 echo "</table> ";
                 }
               echo "<hr></hr>";
             }

            }      
        }
}
if (empty($_POST['username'])) {

	echo "No results found";
}
?>