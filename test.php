<html>
<head>

<link rel="stylesheet" href="css/bootstrap.css"/>

</head>
<body>
<?php
ob_start();
include "profile.html";
session_start();
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
	
	//$username=$_GET['id'];
	//retrival of database
	 $sql_select = "SELECT * FROM register where username='".$_POST["username"]."'";
     $stmt = $conn->query($sql_select);
	  $registrants = $stmt->fetchAll();
	  
	 echo count($registrants);
	 echo "<h2>your account details</h2>";
        echo "<table class='table' >";
        echo "<tr><th>Name</th>";
        echo "<th>email</th>";
		echo "<th>studentid</th>";
        echo "<th>department</th></tr>";
        foreach($registrants as $registrant) {
            echo "<tr><td>".$registrant['username']."</td>";
            echo "<td>".$registrant['email']."</td>";
			echo "<td>".$registrant['studentid']."</td>";
            echo "<td>".$registrant['department']."</td></tr>";
        }
        echo "</table>";
    
	
		?>
		
        </body>
</html>