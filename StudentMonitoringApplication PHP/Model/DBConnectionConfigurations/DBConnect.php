<?php /*error_reporting(E_ALL ^ E_NOTICE);*/?>

<?php  
    function dbConnect(){
        $username = "root";
	    $password = "root";
	    $hostname = "localhost";
	    $db = "sma_db";
        try {
		    $dbo = new PDO('mysql:host='.$hostname.';dbname='.$db, $username, $password);
            return $dbo;
	    } catch (PDOException $e) {
            echo 123;
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
	    }
       
    }
?>