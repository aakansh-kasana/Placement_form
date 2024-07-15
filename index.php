<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    echo "connection established to db";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `placement`.`placement` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES (`$name`, `$age`, `$gender`, `$email`, `$phone`, `$other`, current_timestamp());"; 
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successful inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpeg" alt="USAR">
    <div class="container">
        <h1>Welcome to USAR</h1>
        <p> Enter ur details for PLACEMENT</p>
        <?php
        if($insert == true){
            echo "<p class='submitmsg'>  Thanks for submitting your details</p>";
            }
    ?>    
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter ur Name">
            <input type="text" name="age" id="age" placeholder="Enter ur age">
            <input type="text" name="gender" id="gender" placeholder="Enter ur gender">
            <input type="email" name="email" id="email" placeholder="Enter ur email">
            <input type="phone" name="phone" id="phone" placeholder="Enter ur phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter other info" ></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script> 
</body>
</html>
