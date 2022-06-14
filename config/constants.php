<!-- working fine -->
<!-- discomment notifcations to check responsiveness -->

<?php 
    //create constants to store non repeating values
    //comstans in cpitals, variables in smalls
    //define('LOCALHOST', 'localhost');
    //define('DB_USERNAME', 'root');
    //define('DB_PASSWORD', 'adsfdas');
    //define('DB_NAME', 'ConfManSys');
    //database connection
    //$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error( ));
    //select database
    //$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

    //connect to database
    //save connection referee to a variable
    $LOCALHOST = 'localhost';
    $DB_USERNAME = 'yash';
    $DB_PASSWORD = 'yash2001';
    $DB_NAME = 'ConfManSys';
    //$conn = mysqli_connect('localhost', 'yash', 'yash2001', 'ConfManSyss');
    $conn = mysqli_connect($LOCALHOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    if($conn==TRUE)
    {
        //!!!!!!!!!!!!!!!!!!!!!!!!!!incomment these to check if connection is established
        //echo "connection established </br>";
    }
    else
    {
        //echo "connection failed </br>";
    }
    
    /*
    //check connection
    if(!$conn)
    {
        die('Connection error : '.mysqli_connect_error());
    }
    */

    //select database
    //echo $db_select = mysqli_select_db($conn, $DB_NAME);
    $db_select = mysqli_select_db($conn, $DB_NAME);
    if($db_select==TRUE)
    {
        //echo "database selected successfully </br>";
    }
    else
    {
        //echo "selection failed</br>";
    }

    /*
    //check selection
    if(!db_select)
    {
        die('Database selection failed : '.mysqli_error());
    }
    */
?>
