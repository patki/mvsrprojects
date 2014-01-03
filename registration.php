<?php
	try {
    $conn = new PDO ( "sqlsrv:server = tcp: u75q82f4s7.database.windows.net,1433; Database = mvsrprojects", "mydays", "azure@pwd112");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
   }


   $stmt1 ="Select * from json where handle=?";
	$prp1 = $conn->prepare($stmt1);
    if($prp1->execute(array($_GET['id'])) )
	{
		$registrant = $prp1->fetchAll();
      if(count($registrant) >0)
	   {
		echo "present";
	   }
	   else
	    echo "absent";

	}
	echo "present";
 
?>
