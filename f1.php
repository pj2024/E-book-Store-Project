<?php
 $insert = false;
 if(isset($_POST['fname'])){
     // Set connection variables
     $server = "localhost";
     $username = "root";
     $password = "";
 
     // Create a database connection
     $con = mysqli_connect($server, $username, $password);
 
     // Check for connection success
     if(!$con){
         die("connection to this database failed due to" . mysqli_connect_error());
     }
     // echo "Success connecting to the db";
 
     // Collect post variables
     $fname =$_POST['fname'];
     $lname =$_POST['lname'];
     $email =$_POST['email'];
     $phoneno =$_POST['phoneno'];
     $password =$_POST['password'];
     $rpassword =$_POST['rpassword'];
     $sql = "INSERT INTO `signup2`.`signup2` ( `fname`, `lname`, `email`, `phoneno`, `password`, `rpassword`, `dt`) VALUES ( '$fname', '$lname', '$email', '$phoneno', '$password', '$rpassword', current_timestamp())";
     // echo $sql;
    
 
     // Execute the query
     if($con->query($sql) == true){
         // echo "Successfully inserted";
 
         // Flag for successful insertion
         $insert = true;
     }
     else{
         echo "ERROR: $sql <br> $con->error";
     }
 
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
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="f1.css">
</head>
<body>
  <form action="f1.php" method="post">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      
      <label for="fname"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="fname" required>

      <label for="lname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="lname" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="phoneno"><b>Phone no.</b></label>
      <input type="number" placeholder="Enter phone no." name="phoneno" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="rpassword"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="rpassword" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>s

      <div class="clearfix">
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
 <?php
   if($insert == true){
    echo "<div class='submsg'>Sing up Successfully..</div>";
   }
 ?>
  </form>

  
</body>
</html>