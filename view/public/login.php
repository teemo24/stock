<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login GI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=URI?>assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=URI?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=URI?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=URI?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=URI?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=URI?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=URI?>assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=URI?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=URI?>assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=URI?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=URI?>assets/login/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?=URI?>assets/login/css/styles.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?=URI?>assets/login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			
				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title p-b-49">
									<!--<img src="./images/g.png" alt="John" style="">-->
						Login
					</span>
	
						

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Identifiant</span>
						<input class="input100" type="text" name="username" placeholder="Identifiant">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Mot de passe</span>
						<input class="input100" type="password" name="pass" placeholder="Mot de passe">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					 
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Mot de passe oublié?
						</a>
					</div>					 
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="valide" value="ok" type="submit">
								Connexion
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							CONTACTEZ-NOUS
						</span>
					</div>

					<div class="flex-c-m">
						<a href="https://www.facebook.com/geranceinformatique/" class="login100-social-item bg1" style="text-decoration:none">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="https://www.linkedin.com/in/emplois-et-stages-g%C3%A9rance-informatique-a89136199/" class="login100-social-item bg2" style="text-decoration:none">
							<i class="fa fa-linkedin"></i>
						</a>

						<a href="mailto:commercial@geranceinformatique.com" class="login100-social-item bg3" style="text-decoration:none" >
							<i class="fa fa-envelope"></i>
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?=URI?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=URI?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=URI?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=URI?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=URI?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=URI?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=URI?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=URI?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=URI?>assets/login/js/main.js"></script>
	
</body>
</html>