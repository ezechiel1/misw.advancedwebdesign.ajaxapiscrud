<?php
# DB CONNECTION
include("db_connection.php");

# CHECK IF REQUEST DATA NOT EMPTY
if( $_POST ){

    # RETRIEVE/ KEEP DATA
    $names = htmlentities( $_POST['names'] );
    $roll_number =  htmlentities( $_POST['roll_number'] );
    $email =  htmlentities( $_POST['email'] );

    # INSERT 
    $_SQL_QUERY = "INSERT INTO students(id, roll_number, names, email) VALUES(NULL, '$roll_number', '$names', '$email') ";
    $insert = mysqli_query($_DBCONNECT, $_SQL_QUERY);

    if( $insert ){ // SUCCESS
        $_RESPONSE["status"] = 200; //IF SUCCESS
        $_RESPONSE["message"] = "Student registration was done successfully"; //IF SUCCESS
    }
    else{ // FAILED
        $_RESPONSE["status"] = 500; 
        $_RESPONSE["message"] = "Failed to register this student. Please try again later!";
    }
}
else{
    $_RESPONSE["status"] = 500; 
    $_RESPONSE["message"] = "Data are required"; 
}

# ENCODE RESPONSE IN JSON FORMAT
echo json_encode($_RESPONSE);
?>