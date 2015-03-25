<?php
/*Connect to the database server.  default host, no username or password defined*/
$new_conn = mysqli_connect();

#Create a new DB
mysqli_query($new_conn, "CREATE DATABASE Matt_base");

//Create a new table
$sql = "CREATE TABLE Matt_table
(
First_name  Varchar(100),
Last_name  Vatchar(100),
DOB Date,
Fav_food  Varchar(200),
)";
mysqli_query($new_conn, $sql);

/*Enter multiple records.*/
$sql_insert = "INSERT INTO Matt_table (First_name, Last_name, DOB, Fav_food)
VALUES ('Matt', 'Fisher', '04/08/83', 'Lasagne');";
$sql_insert = "INSERT INTO Matt_table (First_name, DOB)
VALUES ('Dave', '01/01/89');";

mysqli_multi_query ($new_conn, $sql_insert);


/*Retrieve the records*/
$sql_retrieve = "SELECT First_name,Last_name,DOB,Fav_food  FROM Matt_table;";

$result = mysqli_query($new_conn, $sql_retrieve);

/*put the result into an associative array*/
$ass_array = mysqli_fetch_assoc($result);


while($ass_array) {
        echo "First Name: " . $ass_array["First_name"]. " - Last Name: " . $ass_array["Last_name"]. "<br>";
}

mysqli_close($new_conn);

?>





