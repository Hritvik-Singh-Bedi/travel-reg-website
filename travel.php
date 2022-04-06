<?php
$insert = false;
if(isset($_POST['name']))
{
    // Setting Connection Variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a DataBase Connection
    $con = mysqli_connect($server,$username,$password);

    // if($con)
    // {
    //     echo "sucess";
    // }

    // else
    // {
    //     echo "failure";
    // }

    if(!$con)
    {
        die("connection to this database failed due to".mysqli_connect_error());
    }

    // echo "Sucess connecting to the DB";


    // Collect Post Variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `ca3`.`ca3` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    // echo $sql;

    // Execute the query
    if($con->query($sql) == true)
    {
        // echo "Sucessfully inserted";

        // Flag
        $insert = true;
    }

    else
    {
        echo "ERROR: $sql <br> $con->error";
    }

    // Closing The Connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="./travel.css">
</head>
<body>
    <img class="LPU" src="LPU.jpg" alt="Lovely Professional University">
    <div class="container">
        <h1>Welcome to LPU Manali Trip Form</h1>
        <p>Enter your details and Submit this form to confirm your Participation for the TRIP.</p>

        <?php
        if($insert == true)
        {
        echo "<p class='submitMsg'>Thanks for submitting your FORM. We are happy to see you joining us for THE MANALI TRIP.</p>";
        }
        ?>

        <form action="travel.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">

            <input type="text" name="age" id="age" placeholder="Enter Your Age">

            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">

            <input type="email" name="email" id="email" placeholder="Enter Your Email">

            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
            
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other Info"></textarea>

            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>