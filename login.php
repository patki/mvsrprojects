
<?php
ob_start();
session_start();
include "login.html";
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    // Connect to database.
    try {
          $conn = new PDO ( "sqlsrv:server = tcp:j66k9fh59y.database.windows.net,1433; Database = database", "vishwas", "HelloWorld12");      
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    
    catch(Exception $e){
        die(var_dump($e));
    }
	  $check=false;
   if(!empty($_POST["username"])&&!empty($_POST["password"]))
   {
  $sql_select = "SELECT * FROM register where username='".$_POST['username']. "' and password='".$_POST['password']."';";
    $stmt = $conn->query($sql_select);
    $registrant = $stmt->fetchAll(); 
      if(count($registrant) ==1)
      {
		  $_SESSION["username"]=$_POST["username"];
		header('location:profile.php');
		 // header('location:profile.php?id='+$_POST["username"]);
	  }
	  else  if(count($registrant) ==0)
	  {
		  print "your username is $username ";
	  echo "<b> Invalid email id or password<b>";
   }
   else    {echo "error";
   }
   }
?>
