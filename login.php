<?php
ob_start();
session_start('username');
include "login.html";
$conn =mysql_connect("localhost","root","");
if($conn)
{
 if(mysql_select_db("matrimony")){

//echo "connected...";

 }

}
if(empty($_POST['username'])||empty($_POST['password']))
{
 // echo "<h2 style=color:#FFF> Enter username and password</h2>";
}
if(isset($_POST['log']))
{
  
  session_destroy();
 // header('Location:login.html');

}


if(isset($_POST["username"])&&isset($_POST["password"]))
{
        if(!empty($_POST["username"])&&!empty($_POST["password"]))
        {
                $username=mysql_real_escape_string($_POST['username']);
                $password=mysql_real_escape_string($_POST['password']);
            

                $query="select * from register where username='".$username."' && password='".$password."';";
                 if($res=mysql_query($query)){
                   $numrows=mysql_num_rows($res);
                    if($numrows==1)
                       {
                        while ($row=mysql_fetch_row($res)) {
                          
                      

                       $_SESSION['username']=$row[7];
                       $_SESSION['user']=$row[0];
                     }
                    
                        header('Location: loggedprof.php');
                       }
                       else
                       {
                        echo "<h2 style=color:#FFF>incorrect username or password</h2>";
                       }
                    
       
                }
        }
}


?>