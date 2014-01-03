<?php
	try {
    $conn = new PDO ( "sqlsrv:server = tcp: u75q82f4s7.database.windows.net,1433; Database = mvsrprojects", "mydays", "azure@pwd112");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	print("connected");
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
   }
  echo "hi";
        $name = $_POST['username'];
        $email = $_POST['email'];
		$password=$_POST['password'];
        // Insert data
        $sql_insert = "INSERT INTO registration (name, email, password) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $password);
        $stmt->execute();
    
    echo "<h3>Your're registered!</h3>";
    
 
?>
