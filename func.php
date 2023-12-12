<?php
// if(isset($_POST['Name'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password, "trip");

if (!$con) {
    die("There is some sort of an error" . mysqli_connect_error());
}

// $name = $_POST['Name'];
// $age =  $_POST['age'];
// $sec = $_POST['sec'];

// $sql = "INSERT INTO `demo1` ( `name`, `age`, `sec`) VALUES ('$name', '$age', '$sec')";
$sql_search = "SELECT * FROM `tripdetails`";
$result = mysqli_query($con, $sql_search);
// $row = mysqli_fetch_row($result);
// $row1 = mysqli_fetch_assoc($result);

// while($row2 = mysqli_fetch_array($result)){

//     print_r($row2);
// }
$row3 = mysqli_fetch_all($result,MYSQLI_ASSOC);
print_r($row3);
// print_r($row);
// print_r($row1);
// print_r($row2);
// var_dump($row2);
$con->close();
// while($row = mysqli_fetch_assoc($res)){
//     echo $row['roll no']."".$row["name"]."".$row["age"]."".$row["sec"];
// }

// if($con->query($sql)){
//     echo "data inserted";
// }
// $con->close();

// }


?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>School Form</h1>
        <form action="index.php" method="post">
            <input type="text" class="name" name="Name" placeholder="Enter Name">
            <input type="text" name="age" id="age" placeholder="Enter age">
            <input type="text" name="sec" id="sec" placeholder="Enter Section">
            <button>Submit</button>
        </form>
    </div>
</body>
</html> -->
