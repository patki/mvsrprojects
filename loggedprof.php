<?php
ob_start();
session_start();
include 'profile.html';
$conn =mysql_connect("localhost","root","");
if($conn)
{
 if(mysql_select_db("matrimony")){

//echo "connected...";

 }

}

//echo $user=$_SESSION['username'];

$titles=array("Name","Age","Gender","Religion","Mother-tongue","Country","Mobile","Email");

if(isset($_SESSION["username"]))
{
        if(!empty($_SESSION["username"]))
        {
         $query="select * from register where username='".$_SESSION['username']."';";
         $result=mysql_query($query);
         $numrows=mysql_num_rows($result);

while($row=mysql_fetch_row($result))
{        $_SESSION['user']=$row[0];

        $url="data:image/jpeg;base64,".base64_encode($row[9]);
	    echo "<img src=".$url."  style=height:240px;width:300px;margin-left:100px class=img-rounded ;offset1>";
	    echo "<legend class=offset1 style=color:#FFF><b>Personal info</b></legend>";
for($i=0;$i<=7;$i++)
{
echo "<table class=table table-bordered  style=height:30px;width:300px;margin-left:200px;color:#FFF>";
echo "<tbody>";
echo "<tr class=text-left>";
echo "<td>".$titles[$i]."</td>";
echo "<td>".$row[$i]."</td>";
echo "</tr>";
echo "</tbody>";
echo "</table> ";

}
}
}
}
?>