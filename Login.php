<?php

function check_user($name, $password){	
		if($name === "user" and $password === "1234"){
		$usu['name'] = "user";
		$usu['role'] = 0;
		return $usu;
	}elseif($name === "admin" and $password === "1234"){
		 $usu['name'] = "admin";
		 $usu['role'] = 1;
		 return $usu;
	}else return false;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {  	
	
	$usu = check_user($_POST['user'], $_POST['password']);
	if($usu==false){
		$err = true;
		$user = $_POST['user'];
	}else{	
		session_start();
		$_SESSION['user'] = $usu;
		header("Location: exercise_3_2_sessions1_main.php");	
		exit;
	}
}		
	

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login form</title>		
		<meta charset = "UTF-8">
        <style>
            
            </style>
	</head>
    <h1>Welcome!</h1>
	<body>	
		<?php if(isset($_GET["redirected"])){
			echo "<p>Login to access</p>";
		}?>
		<?php if(isset($err) and $err == true){
			echo "<p>Fill user </p>";
		}?>
		<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
			User
			<input value = "<?php if(isset($user))echo $user;?>"
			id = "user" name = "user" type = "text"> <br>
            Nivel:							
			<select name = "color">
				<option value = "Facil" <?php echo $white_selected?> >Facil</option>
				<option value = "Medio" <?php echo $green_selected?> >Medio</option>
				<option value = "Dificil" <?php echo $blue_selected?> >Dificil</option>
			</select>
			<input name = "login" type = "submit">
		</form>
	</body>
</html>

