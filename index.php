<?php
    if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password="";

    $con = mysqli_connect($server, $username, $password, "trip");

    if(!$con){
        die("connection to the database failed due to ".mysqli_connect_error());
    }
    // echo "success connecting to db";
    $name= $_POST['name'];
    $gender= $_POST['gender'];
    $age= $_POST['age'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $other= $_POST['desc'];
    $sql = "INSERT INTO `tripdetails` ( `name`, `age`, `gender`, `email`, `phone`, `others`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    // echo $sql;
    if($con->query($sql)== true){
        echo "successfully inserted";
    } 
    // else {
    //     echo "error $sql <br> $con->error";
    // }
    $con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Form</title>
</head>
<body>
    <div class="container">
        <h1>Field Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <p class="confirm">Thanks for submitting your details , we are happy to see you on board</p>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Name">
            <input type="text"  name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="mail"  placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn">Submit</button>

        </form>
    </div>
</body>
</html>
