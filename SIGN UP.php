<!DOCTYPE html>
<html>
	<head>
		<title>SIGN UP</title>
		<link rel="stylesheet" type="text/css" href="css/SIGN UP.css">
		<link rel="shorcut icon" type="image/png" href="IMAGES1/New.png">
		<meta name="viewport" content="width=device-width , initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>	
	</head>
	<body>
		<header>
			<nav>
				<div class="rwo clearfix">
					<ul class="main_navi animate__animated animate__slideInDown" id="checking" >
						<li><a href="index.html">HOME</a></li>
						<li><a href="ABOUT US.html">ABOUT US</a></li>
						<li><a href="#">CREATIONS</a></li>
						<li><a href="CCW ENTRY.html">CCW ENTRY</a></li>
						<li><a href="#">SIGN UP</a></li>
					</ul>
					<a href="#" class="icon animate__animated animate__slideInDown" onclick="slideshow()"><i class="fa fa-bars"></i></a>
				</div>
				<div class="sign_up_form">
					<img src="IMAGES1/New.png" class="logo animate__animated animate__fadeInLeft">
					<form action="SIGN UP.php" method="post" name="form" onsubmit="return validation()" class="logo animate__animated animate__fadeInLeft">
						<input type="text" class="input-box" placeholder="NAME" id="name" name="name">
						<input type="email" class="input-box" placeholder="EMAIL ID" id="emailaddr" name="emailaddr">
						<input type="text" class="input-box" placeholder="PHONE NUMBER" id="mobno" name="mobno">
						<input type="text" class="input-box" placeholder="REGISTER NUMBER" id="regno" name="regno">
						<p>
							<span>
								<input type="checkbox" id = "agreecb" onclick="check(this)">
							</span>I AGREE TO SHARE THESE DETAILS WITH UNDER 25 SJC CLUB
						</p>
						<button class="sign-btn" id = "submitBTN" disabled>SIGN UP</button>
					</form>
					<?php
						function function_alert($message) { 
      
							// Display the alert box  
							echo "<script>alert('$message');</script>"; 
						} 

						// connecting to database
						$servername = 'localhost:3307';
						$user = 'root';  
						$pass = '';  
						$dbname = 'under25db';  
						
						$conn = mysqli_connect($servername, $user, $pass, $dbname);  
						if(!$conn)
						{  
							die('Could not connect: '.mysqli_connect_error()); 
						}   
						//assigning variables
						if(!empty($_POST["name"]))
						{
							$name = $_POST["name"];
						}
						if(!empty($_POST["emailaddr"]))
						{
							$emailaddr = $_POST["emailaddr"];
						}
						if(!empty($_POST["mobno"]))
						{
							$mobno = $_POST["mobno"];
						}
						if(!empty($_POST["regno"]))
						{
							$regno = $_POST["regno"];
						}
						
						// checking if input fields are empty
						if(!empty($name) and !empty($emailaddr) and !empty($mobno) and !empty($regno))
						{
							// inserting record
							$sql = "insert into login_details VALUES ('$name', '$emailaddr', '$mobno', '$regno')";
							$result=mysqli_query($conn,$sql);
							if($result){
								function_alert("SIGNED UP SUCCESSFULLY");
							}
						}
						else
						{  
							if(!empty($name))
							{
								function_alert("COULD NOT SIGN UP, TRY AGAIN");
							}
						}

						// sending email
						// if(!empty($_POST["emailaddr"]))
						// {
						// 	$email = $_POST["emailaddr"];
						// 	$subject = "WELCOME TO Under25SJC!!";
						// 	$msg = "We're so glad to have you fam. Stick around for amazing content and make sure to follow our Instagram page @under25sjc";
						// 	if(mail($email, $subject, $msg))
						// 	{
						// 		//echo "sent!";
						// 	}
						// 	else
						// 	{
						// 		//echo "not sent";
						// 	}
						// }
						 
						mysqli_close($conn);
					?>
				</div>
			</nav>
		</header>
		<script type="text/javascript">
			function check(cb)
			{
				var cb = document.getElementById("agreecb");
				if(cb.checked)
				{
					//Set the disabled property to FALSE and enable the button
					document.getElementById("submitBTN").disabled = false;
    			} 
				else
				{
        			//Otherwise, disable the submit button.
        			document.getElementById("submitBTN").disabled = true;
    			}
			}
			function validation()
			{
				var name = document.getElementById("name").value;
				var emailaddr = document.getElementById("emailaddr").value;
				var mobno = document.getElementById("mobno").value;
				// var regno = document.getElementById("regno").value;
				
				// name validation
				if(name == "")
				{
					alert("Name cannot be empty");
					return false;
				}

				//email validation
				var atposition=emailaddr.indexOf("@");  
				var atposition=emailaddr.indexOf("@");  
				var dotposition=emailaddr.lastIndexOf(".");  
				if (atposition<1 || dotposition<atposition+2 || dotposition+2>=emailaddr.length)
				{  
					alert("Please enter a valid E-Mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
					return false;  
				}
				
				// mobile number validation
				else if(isNaN(mobno))
				{  
					alert("Enter a valid Mobile Number"); 
					return false;  
				}
				else if(mobno != "")
				{
					var phoneno = /^\d{10}$/;
					if(mobno.match(phoneno))
					{
						return true;
					}
					else
					{
						alert("Not a valid Phone Number");
						return false;
					}
				}
	
			}

			function slideshow()
			{
				var x=document.getElementById('checking');
				if (x.STYLE.display === "none")
				{
					x.STYLE.display="block";
				}
				else
				{			
					x.STYLE.display="none";
				}
			}
		</script>
	</body>
</html>