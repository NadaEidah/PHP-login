
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>about</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
$id=$_GET['id'];
require 'login.php';
$message='';
if (isset($_POST['username']) || isset($_POST['email'])){
    $name=$_POST['username'];
    $email=$_POST['email'];
    $sql='INSERT INTO user(username,email) VALUES(::username,::email)';

    $statement=$connection->prepare($sql);
    if($statement->execute([':username'=>$name, ':email'=>$email])){
        $message='data inserted successfully';
    }

}




include "header.php";?>

if (isset($_POST['submit'])){

$servername = "localhost";
$username = "root";
$password = "nor0136655";

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$message=" ";


try {
    $conn = new PDO("mysql:host=$servername;dbname=users", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (isset($_POST['update']))
    {
        if( empty($_POST['username']) || empty($_POST['email']) || 
        empty($_POST['password']))
    {
        $message= "Please fillout all required fields"; 
    }
    else{
   
    $sql="UPDATE users SET username ='$name',email ='$email', password='$password' WHERE ID='$id' ";
    
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
    
    $message="Updated Successfully";
        header("location: dashboard.php");

    }
    }
}
catch(PDOException $e)
    {
        $message= "Connection failed: " . $e->getMessage();
    }
  }
  $conn = null;





<div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger text-center">'.$message.'</label>';  
                }  
                ?>  
</div>


			
			<form class=" w-50 m-auto"  method="POST">
            <h3 class="text-center">Edit User</h3> 
				<input type="hidden" value="<?php echo $row['ID']; ?>" name="userid">
				<label for="firstname">User Name:</label>
				<input type="text" id="username"  name="username" value="<?php echo $row['username']; ?>" class="form-control"><br>
				<label for="lastname">Email:</label>
				<input type="text"  name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control"><br>
				<label for="address">Password:</label>
				<input type="text"  name="password" id="password" value="<?php echo $row['password']; ?>" class="form-control"><br>
				
				<input type="submit" name="update" class="btn btn-success" value="Update">
                <a type="submit" name="cancle" class="btn btn-danger" value="Cancle" href="dashboard.php" >Cancle</a>
			</form>
		</div>
	</div>
</div>
</div>







<?php


include "footer.php";
?>

</div>
</body>
</html>



