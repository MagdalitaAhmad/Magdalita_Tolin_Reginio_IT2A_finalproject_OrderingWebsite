<?php
SESSION_START();

$username="magdalita";
$password="asd";


$url_add = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

if(isset($_REQUEST['submit_button'])===true){
	if($_REQUEST['username'] !=$username){
		header("Location: ".$url_add."?notexist");
	}
	else if($_REQUEST['username']== $username && $_REQUEST['password'] != $password){
		header("Location: ".$url_add."?wrongpass");
	}
	else if($_REQUEST['username']== $username && $_REQUEST['password'] == $password){
		header("Location: ".$url_add."?success");
		$_SESSION['ses_username']= $username;
		$_SESSION['ses_password']= $password;
	}

}

?><!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    
    .container {
      width: 320px;
      padding: 20px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      margin-top: 100px;
    }
    
    h2 {
      text-align: center;
    }
    
    input[type="text"],
    input[type="password"] {
      width: 93%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">

  <?php
        if(isset($_REQUEST['notexist'])=== true)
        {
          echo "<div class='alert alert-danger' role='alert'> Username does not exist </div>";
        }else if(isset($_REQUEST['wrongpass']) === true){
          echo"<div class='alert alert-danger' role='alert'> Incorrect Password </div>";
        }else if(isset($_REQUEST['success']) === true){
          echo"<div class='alert alert-danger' role='alert'> Redirecting to next page... </div>";
          header("Refresh: 1; url=index.php");
        }
        else if(isset($_REQUEST['logout'])===true){
            echo "<div class='alert alert-info' role='alert'>Thank you..</div>";
  
          }
          else if(isset($_REQUEST['logfirst'])===true){
            echo "<div class='alert alert-info' role='alert'>Please Log in first</div>";
          }
          else if(isset($_SESSION['ses_username'])===true){
            echo "<div class='alert alert-warning' role='alert'> You're stile log in. 
            <a href='index.php'> Please click here </a> to proceed.</div>";
          }

    ?>
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" name="submit_button" value="Login">
    </form>
  </div>
</body>
</html>
