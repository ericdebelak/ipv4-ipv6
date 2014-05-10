<?php
    // connect to the mysqli server and throw an exception if there is an error
    mysqli_report(MYSQLI_REPORT_STRICT);
    try
    {			
        $mysqli = new mysqli("localhost", "____USER_____", "_____PASSWORD_____",  "_____DATABASE_____");
    }
    catch(mysqli_sql_exception $exception)
    {
        echo "Unable to connect to mySQL: " . $exception->getMessage();
    
    }
    
    // get the ip address from the server
    $address = $_SERVER["REMOTE_ADDR"];
    
    // try the function and echo the exception if something doesn't work out.
    try
    {
        ipvx($mysqli, $address);
    }
    catch(Exception $exception)
    {
        echo $exception;
    }
    
    /* writes your ip address to the database with user name ericd
     * function ipvx, works for both ipv4 and ipv6 addresses
     * input (pointer) mysqli pointer
     * input (string) ip address
     * output: n/a
     * throws: if no mysqli connection
     */
    function ipvx(&$mysqli, $address)
    {
        // convert address into binary
        $address= inet_pton($address);
        
        // prepare the query
        $query = "INSERT INTO ipv6 (user, ip) VALUES('ericd', ?)";
        
        // prepare the statement
        $statement = $mysqli->prepare($query);
        if($statement === false)
        {
                throw(new Exception("Unable to prepare the statement."));
        }
        // bind parameters to the query template
        $wasClean = $statement->bind_param("s", $address);
        if($wasClean === false)
        {
                throw(new Exception("Unable to bind paramenters."));
        }
        
        // ok, let's rock!
        if($statement->execute() === false)
        {
                throw(new Exception("Unable to execute the statement."));
        }
        else
        {
            echo "Success!";
        }
        $statement->close();
        
        
    }
    
    $mysqli->close();
        
?>