<?php require("php/Classes.php") ?>
<?php 

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if($_POST["Action"] == "Signup")
	{
		if($User->Create($_POST["Name"],$_POST["Password"],$_POST["Email"],$_POST["Contact"],$_POST["Location"]))
		{
			header("Location:index.php?msg=User+created");
			die();
		}	
		else{header("Location:".$_SERVER["PHP_SELF"]."?msg=Error+creating+acc");die();}
	}

	if($_POST["Action"] == "Login")
	{
		if($User->Login($_POST["Name"],$_POST["Password"]))
		{
			header("Location:index.php");
			die();
		}
		else{header("Location:".$_SERVER["PHP_SELF"]."?msg=Error+logging+in");die();}
	}


	if($User->Is_loggedin()){header("Location:index.php");die();}
	unset($_POST);
	header("Location:".$_SERVER["PHP_SELF"]);
	die();
}

if(isset($_GET["msg"])){echo htmlentities($_GET["msg"]);}
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>सरल सरकार</title>
</head>

<body onload="createCaptcha()" id="loginBody">
	<a class="formBtn" style="text-decoration: none; position: absolute; top: 2rem; left: 2rem;" href="index.php">पछाडी
		जाउ</a>
	<div id="loginForm">
		<div id="loginFormBtn">
			<button class="loginFormBtn" style="margin-right: 1px;" onclick="signInShow()"> Login </button>
			<button class="loginFormBtn" style="margin-left: 1px;" onclick="signUpShow()">Sign Up</button>
		</div>
		<div id="loginFormDiv">
			<div class="signIn" id="signIn">
				<form id="loginform" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="form login">
					<input type="hidden" name="Action" value="Login">
					<div class="formField">
						<label for="loginUsername"> <img src="./images/people.png" alt="people" class="imgForm"><span
								class="hidden">नाम</span></label>
						<input id="loginUsername" type="text" name="Name" class="formInput" placeholder="Username"
							required>
					</div>

					<div class="formField">
						<label for="loginPassword"><img src="./images/key.png" alt="key" class="imgForm"><span
								class="hidden">पासवर्ड</span></label>
						<input id="loginPassword" type="password" name="Password" class="formInput"
							placeholder="Password" required>
					</div>

					<!-- <div class="formField">
						<button type="submit" class="loginFormBtn">Sign In</button>
					</div> -->
				</form>

				<form onsubmit="validateCaptcha()" class="formField">
					<div id="captcha"></div>
					<input type="text" placeholder="Captcha" id="cpatchaTextBox" />
					<button type="submit" class="loginFormBtn" style="margin-top: 10px;">Submit</button>
				</form>
			</div>

			<div class="signUp showHide" id="signUp">
				<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="form ">
					<input type="hidden" name="Action" value="Signup">
					<div class="formField">
						<label for="loginUsername"> <img src="./images/people.png" alt="people" class="imgForm"><span
								class="hidden">नाम</span></label>
						<input id="loginUsername" type="text" name="Name" class="formInput" placeholder="Username"
							required>
					</div>

					<div class="formField">
						<label for="loginPassword"><img src="./images/key.png" alt="key" class="imgForm"><span
								class="hidden">पासवर्ड</span></label>
						<input id="loginPassword" type="password" name="Password" class="formInput"
							placeholder="Password" required>
					</div>

					<div class="formField">
						<label for="loginContact"><img src="./images/phone.png" alt="phone" class="imgForm"><span
								class="hidden">सम्पर्क</span></label>
						<input id="loginContact" type="tel" name="Contact" class="formInput" placeholder="Phone" required>
					</div>

					<div class="formField">
						<label for="loginEmail"><img src="./images/email.png" alt="email" class="imgForm"><span
								class="hidden">इमेल</span></label>
						<input id="loginEmail" type="email" name="Email" class="formInput" placeholder="Email" required>
					</div>

					<div class="formField">
						<label for="loginPassword"><img src="./images/address.png" alt="address" class="imgForm"><span
								class="hidden">ठेगाना</span></label>
						<input id="loginPassword" type="text" name="Location" class="formInput" placeholder="Address"
							required>
					</div>

					<div class="formField">
						<button type="submit" class="loginFormBtn">Sign Up</button>
					</div>
				</form>

			</div>
		</div>
	</div>
	<script src="app.js"></script>
</body>

</html>