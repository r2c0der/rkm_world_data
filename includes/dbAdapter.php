<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rayvn
 * Date: 6/14/2016
 * Time: 9:32 AM
 */

function dbConnection(){

    //Credentials
    $srv = 'localhost';
    $user = 'dba_worlddata';
    $pass = 'HdovPdRWlXc0wpUT';
    $port = 3307;
    $db = 'db_demo_worlddata';


    //mysqli_connect
    $dbConn = new mysqli($srv, $user, $pass, $db, $port);

    /* check connection */
    if ($dbConn->connect_errno) {
        printf("<h3> <i class='fa fa-exclamation-triangle' aria-hidden='true'  style='color:#800000;'></i> Failed to connect to MySQL:</h3>%s\n", $dbConn->connect_errno. ' | '. $dbConn->connect_error);
        exit();
    }
    print'<h3><i class="fa fa-check-square-o " aria-hidden="true" style="color:#008000;"></i> Connected successfully</h3>';

    //Create query string
    $queryString = "SELECT country_ID AS 'id', country_Name AS 'country', country_Capital AS 'capital', country_Population AS 'population', ";
    $queryString .= " country_Country_Code AS 'country code'";
    $queryString .= " FROM demo_country_data";
    $queryString .= " WHERE country_Population > 999999";


    //Perform the query

    if (!$result = $dbConn->query($queryString)){

        die('There was an error running the query [' . $dbConn->error . ']');

    }


    if ($result->num_rows === 0) {
        // 
        echo "Sorry - no data matches your query";
        exit;
    } else {
        $output = '';
        while($row = $result->fetch_assoc()){
            foreach($row as $key => $value) {
                $output .= $key . ' => '. $value. '<br />';
            }
            $output .=  '<br />';

        }
        print $output;


    }



}


function dbMYSQLConnection(){

    //Credentials
    
    $srv = 'localhost';
    $user = 'dba_worlddata';
    $pass = 'HdovPdRWlXc0wpUT';
    $port = 3307;
    $db = 'db_demo_worlddata';


    //mysqli_connect
    $dbMYSQLConn = new mysqli($srv, $user, $pass, $db, $port);

    /* check connection */
    if ($dbMYSQLConn->connect_errno) {
        printf("<h3> <i class='fa fa-exclamation-triangle' aria-hidden='true'  style='color:#800000;'></i> Failed to connect to MySQL:</h3>%s\n", $dbMYSQLConn->connect_errno. ' | '. $dbMYSQLConn->connect_error);
        exit();
    }
    print'<h3><i class="fa fa-check-square-o " aria-hidden="true" style="color:#008000;"></i> Connected successfully</h3>';



}


function dbPDOConnection(){


    //Credentials
    $srv = 'localhost';
    $user = 'dba_worlddata';
    $pass = 'HdovPdRWlXc0wpUT';
    $port = 3307;
    $db = 'db_demo_worlddata';


    try{
        $dbPDOConn = new PDO("mysql:dbname=$db;host=$srv;port=$port;charset=utf8", $user, $pass);

        // set the PDO error mode to exception
        $dbPDOConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        print'<h3><i class="fa fa-check-square-o " aria-hidden="true" style="color:#008000;"></i> Connected successfully</h3>';


    }catch(PDOException $ex){

        printf("<h3> <i class='fa fa-exclamation-triangle' aria-hidden='true'  style='color:#800000;'></i> Failed to connect to database:</h3>%s\n", $ex->getMessage());
        exit();
    }


    return $dbPDOConn;



}