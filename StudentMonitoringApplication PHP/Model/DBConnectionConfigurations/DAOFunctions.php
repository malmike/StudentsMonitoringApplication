<?php
    // Include ConnectDB
    include 'DBConnect.php';

    //This function either inserts, updates or deletes valuse from any 
    //database table basing on the SQL statment passed to it
    function DBChange($sql)
    {      
        $dbh = dbConnect();
        try
        {   
            $stmt=$dbh->prepare($sql);
            $stmt->execute();
            echo "success";
        }
        catch(PDOException $e)
		{
            $error = $e->getMessage();
            return $error;
		}
    }




    //This function retrieves data from any database table basing on the SQL
    //statement passed to it
    function DBRetrieve($sql)
    {
        $dbh = dbConnect();
        $row=$dbh->prepare($sql);
	    $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

?>