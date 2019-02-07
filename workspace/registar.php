

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina de Registo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  	<link rel="stylesheet" href="css/styleregistar.css">
  	<link rel="stylesheet" type="text/css" href="css/inicial.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  	

</head>
<body>



<?php 
		
		require_once("connect.php");




	if (isset($_POST["registar"])) {
		$username = ($_POST["username_registar"]);
		$password = md5($_POST["password_registar"]);
		$password_rep = md5($_POST["password_rep"]);
		$email = ($_POST["email_registar"]);
		$verificar = "SELECT username, email  FROM users WHERE username='".$username."' AND email='".$email."' ";
		$result = mysqli_query($connect,$verificar);
		if ($result->num_rows >0) {
			echo "<h3>Esta conta já está registada!</h3>";
		}elseif($_POST["username_registar"]==""){
			echo "Tem que introduzir um username";
		}elseif($_POST["password_registar"]==""){
			echo "Tem que introduzir uma password";
		}elseif($_POST["password_rep"]==""){
			echo "Tem que confirmar a password";
		}elseif($_POST["password_registar"]=!$_POST["password_rep"]){
			echo "As passwords nao coincidem";
		}elseif($_POST["email_registar"]==""){
			echo "Tem que introduzir um email";
		}else{
		$insert = "INSERT INTO users (username,password,email) VALUES ('$username','$password','$email')";
		if (mysqli_query($connect, $insert)) {
			$r= "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
			<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
			<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css'>
			<script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js'></script><script>
				
  						toastr.success('Conta registada com sucesso');
  						

    		</script>";
        	
        	echo $r;

		}
	 }
		
	}

?>

<script src="clica.js"></script> 

	<div class="cont">
  <div class="demo">
    <div class="login">
      <div  ><img align="center" src="imgs/logo.png" style="width: 200px; margin-top: 15px; max-height: 70px; margin-left: 28%;"></div>
      <div class="login__form">
        <div>
          <form  class="login__row" method="POST">
            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
				<path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z">
				</path>
			</svg>
          <input type="text" class="login__input name" placeholder="Introduzir usuário" name="username_registar"  />
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
				<path d="M17.283,5.549h-5.26V4.335c0-0.222-0.183-0.404-0.404-0.404H8.381c-0.222,0-0.404,0.182-0.404,0.404v1.214h-5.26c-0.223,0-0.405,0.182-0.405,0.405v9.71c0,0.223,0.182,0.405,0.405,0.405h14.566c0.223,0,0.404-0.183,0.404-0.405v-9.71C17.688,5.731,17.506,5.549,17.283,5.549 M8.786,4.74h2.428v0.809H8.786V4.74z M16.879,15.26H3.122v-4.046h5.665v1.201c0,0.223,0.182,0.404,0.405,0.404h1.618c0.222,0,0.405-0.182,0.405-0.404v-1.201h5.665V15.26z M9.595,9.583h0.81v2.428h-0.81V9.583zM16.879,10.405h-5.665V9.19c0-0.222-0.183-0.405-0.405-0.405H9.191c-0.223,0-0.405,0.183-0.405,0.405v1.215H3.122V6.358h13.757V10.405z">
				</path>
			</svg>
          <input type="password" class="login__input pass" placeholder="Introduzir password" name="password_registar" />
        </div>
        <div class="login__row">
        <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
			<path fill="none" d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
			C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z">
			</path>
		</svg>
          <input type="password" class="login__input pass" placeholder="Confirmar password" name="password_rep" />
        </div>
        <div class="login__row">
        <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
			<path d="M17.388,4.751H2.613c-0.213,0-0.389,0.175-0.389,0.389v9.72c0,0.216,0.175,0.389,0.389,0.389h14.775c0.214,0,0.389-0.173,0.389-0.389v-9.72C17.776,4.926,17.602,4.751,17.388,4.751 M16.448,5.53L10,11.984L3.552,5.53H16.448zM3.002,6.081l3.921,3.925l-3.921,3.925V6.081z M3.56,14.471l3.914-3.916l2.253,2.253c0.153,0.153,0.395,0.153,0.548,0l2.253-2.253l3.913,3.916H3.56z M16.999,13.931l-3.921-3.925l3.921-3.925V13.931z"></path>
		</svg>
          <input type="text" class="login__input pass" placeholder="Exemplo: example@gmail.com" name="email_registar" />
        </div>    
        <input type="submit" value="Concluir Registo" name="registar" id="registar" class="login__submit" />
        
        </form>
        <p ><a class="log" onclick="redireccionarInicio()"> <svg class="svg-icon" viewBox="0 0 20 20">
	<path fill="none" d="M18.271,9.212H3.615l4.184-4.184c0.306-0.306,0.306-0.801,0-1.107c-0.306-0.306-0.801-0.306-1.107,0
	L1.21,9.403C1.194,9.417,1.174,9.421,1.158,9.437c-0.181,0.181-0.242,0.425-0.209,0.66c0.005,0.038,0.012,0.071,0.022,0.109
	c0.028,0.098,0.075,0.188,0.142,0.271c0.021,0.026,0.021,0.061,0.045,0.085c0.015,0.016,0.034,0.02,0.05,0.033l5.484,5.483
	c0.306,0.307,0.801,0.307,1.107,0c0.306-0.305,0.306-0.801,0-1.105l-4.184-4.185h14.656c0.436,0,0.788-0.353,0.788-0.788
	S18.707,9.212,18.271,9.212z"></path>
</svg></a></p>
      </div>
    </div>

    
	
	
	


</body>
</html>