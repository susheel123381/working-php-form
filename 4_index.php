<?php
$insert=false;
if(isset($_POST['name']))
{ 
// localhost our server name 
// set connection variables 
$server="localhost";
$username="root";
$password="";
// this will make the connection to sever
// create a database connection 
$con=mysqli_connect($server,$username,$password);

// check for connectin success
if(!$con)
{
    die("connection of this database due to ".mysqli_connect_error());
}
// echo " success connecting to batabase";

// after making connect we want ot insert the value who are coming from post, to insert we make sql queries
// collect post variable 

$nameErr =$ageErr=$genderErr= $emailErr = $passwordErr = $phErr ="";
$name = $age =  $gender =$email = $password = $ph ="";

if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
// $name=$_POST['name'];

$age=$_POST['age'];
$gender=$_POST['gender'];
$gmail=$_POST['gmail'];
$password=$_POST['password'];
$ph=$_POST['ph'];
$other=$_POST['textarea'];

$sql="INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `password`, `phone number`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$gmail', '$password ', '$ph', '$other', current_timestamp());" ;
// echo $sql;

// now i am going to execute the value in my database 
// -> called object operator
// Execute the query 
if($con->query($sql) == true)
{
    // echo "successfully inserted";
    // flag for successful insertion 
    $insert=true;
}
else {

    echo "ERROR: $sql <br> $con->error";
}
// i want to access the $con error keyword

// Close the database connection 
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="4_index.css">
</head>
<body>
    <img class="bit" src="image.jpg" alt="college image">
    <div class="container">

        <h1>Welcome to US trip</h1>
        <p>Enter you detail and submit this form to conform your trip </p>
        <?php
        if($insert==true){

        echo "<p class='submit'>thanks for submiting your form.We are happy to see you to joining us for US
         trip </p>";
        }
        ?>

        <form action="4_index.php" method="post">
            <label for="name"></label>
            <input type="text" name="name" id="name" placeholder="Enter you name">
             
            <label for="age"></label>
            <input type="text" name="age" id="age" placeholder="Enter you age">
            
            <label for="gender"></label> 
            <input type="text" name="gender" id="gender" placeholder="Enter you gender">
        
            <label for="gmail"></label> 
            <input type="email" name="gmail" id="gmail" placeholder="Enter you gmail">
            
            <label for="password"></label> 
            <input type="password" name="password" id="password" placeholder="Enter you password">
            
            <label for="ph"></label> 
            <input type="phone" name="ph" id="ph" placeholder="Enter you phone number">
            
            <label for="textarea"></label> 
            <textarea type="number" name="textarea" id="textarea" rows="10" cols="30" placeholder="Enter more information there"></textarea>
        
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->

        </form>
    </div>
    
</body>
</html>