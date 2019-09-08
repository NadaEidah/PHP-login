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
<?php include "header.php";?>
<?php
    session_start();
    if(isset($_SESSION["username"]))
    {
        echo '<h1> Welcome '.$_SESSION["username"].'</h1>';
        echo '<br /><br /><a href="logout.php" type="submit" class="btn btn-primary" >Logout</a>';
    }
?>


<div class="container-fluid">


<?php
session_start();

if(isset($_SESSION["username"]))
{
    echo '<h1> Welcome '.$_SESSION["username"].'</h1>';  
    
}

$servername = "localhost";
$username = "root";
$password = "17M*71mr";
$message=" ";

try {
  $conn = new PDO("mysql:host=$servername;dbname=users", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
  
  if(isset($_POST['delete']))
  {
  $sql="DELETE FROM users WHERE ID='".$_POST['user']."'";
  $conn -> exec($sql);
  $message = "<label>Record deleted successfully</label>";
  }

}

  catch(PDOException $error)
  {
  $message = $error->getMessage();
  }

  
  
  $query="SELECT * FROM user";
  $stmt = $conn -> query($query);
  $count = $stmt -> rowCount();
      


  if ($count >0)
      { 
       
?>
<div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger text-center">'.$message.'</label>';  
                }  
                ?>  
</div>

<h2>List of all Users</h2>
	<table class="table table-bordered table-striped">
		<tr>
      //<td>ID</td>
			<td>User Name</td>
			<td>Email</td>
			<td>Password</td>
			<td width="70px">Delete</td>
			<td width="70px">EDIT</td>
		</tr>
	<?php
    while ( $row= $stmt->fetch(PDO::FETCH_ASSOC)){
	echo "<form action='' method='POST'>";	
    echo "<input type='hidden' value='". $row['ID']."' name='user' />"; 
    echo "<tr>";
    //echo "<td>".$row['ID'] . "</td>";
    echo "<td>".$row['username'] . "</td>";
    echo "<td>".$row['email'] . "</td>";
    echo "<td>".$row['password'] . "</td>";
    echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
    echo "<td><a href='edit.php?id=".$row['ID']."' class='btn btn-info'>Edit</a></td>";
    echo "</tr>";
    echo "</form>"; 
    
    }
	?>


    <?php 
}
else
{
	$message= "<label>No Record Found</label>";
}
?> 


<?php


include "footer.php";
?>


</div>
</body>
</html>