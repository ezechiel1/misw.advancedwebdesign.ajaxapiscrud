<?php
# DB CONNECTION
include("db_connection.php");

# SELECT FROM OUR DATABASE
$_SQL_QUERY = "SELECT * FROM students";
$result = mysqli_query($_DBCONNECT, $_SQL_QUERY);

$data = array();
if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    $_RESPONSE["status"] = 200;
    $_RESPONSE["message"] = "Successful";
    $_RESPONSE["data"] = $data;
}
else{
    $_RESPONSE["status"] = 500;
    $_RESPONSE["message"] = "Empty";
}

$data = mysqli_fetch_assoc($result);



# ENCODE RESPONSE IN JSON FORMAT
echo json_encode($_RESPONSE);
?>