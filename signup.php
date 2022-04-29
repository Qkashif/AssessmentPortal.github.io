<?php include 'header.php';
require 'connection.php';





if (isset($_POST['register'])) {
	





    $user_name      = $_POST['username'];
    $user_email     = $_POST['email'];
    $user_phone    = $_POST['mobile'];
    $user_password  = md5($_POST['password']);
    $user_cpassword  = md5($_POST['cpassword']);
    $user_token = mt_rand(1000000000,9999999999);

    

	   
$stmt = $Conn->prepare("SELECT * FROM users WHERE user_email = ?");

$stmt->execute([$user_email]); 


$user = $stmt->fetch();


if ($user) {
	  
    echo "<script>alert('Email Already exists.')</script>";
    
} 
else{
	    


    
    
    if ($user_password == $user_cpassword) {
        
   
    if (isset($_FILES['user_image'])) {
    $error = array();



    $file_name = $_FILES['user_image']['name'];
    $file_type = $_FILES['user_image']['type'];
    $file_tmpname = $_FILES['user_image']['tmp_name'];
    $file_size = $_FILES['user_image']['size'];
    $ext = explode('.', $file_name);
    $file_ext = end($ext);
    $extensions = array("jpeg","jpg","png");

    if (in_array($file_ext,$extensions) === false) {
        $error[] = "this extenstion is not allowed..";
    }
    $new_name = time()."-".$file_name;
    $target = "upload/".$new_name;
    $user_image = $new_name;

    if ($file_size > 2097152) {
        $error[] = "file size is large then 2mb";
    }
    if (empty($error) == true) {
        move_uploaded_file($file_tmpname,$target);
    }
    else{
        print_r($error);
    }
   





    

    $UserAddQuery = "INSERT INTO users (`user_name`,`user_email`,`user_phone`,`user_image`,`user_password`,`token`) VALUES (:name,:email,:phone,:image,:password,:token)";
    $RunUserQuery = $Conn->prepare($UserAddQuery);
    $RunUserQuery->bindParam(':name', $user_name , PDO::PARAM_STR);
    $RunUserQuery->bindParam(':email', $user_email , PDO::PARAM_STR);
    $RunUserQuery->bindParam(':phone', $user_phone , PDO::PARAM_STR);
    $RunUserQuery->bindParam(':image', $user_image , PDO::PARAM_STR);
    $RunUserQuery->bindParam(':password', $user_password , PDO::PARAM_STR);
    $RunUserQuery->bindParam(':token', $user_token , PDO::PARAM_STR);

    $resultUserQuery = $RunUserQuery->execute();

    if ($resultUserQuery) {
    	header("location: login.php");
    }
    else{
    	echo "<script>alert('Got Some Error In Your Query')</script>";
    }


     }
     else{
        echo "<script>alert('Your password not match please check your password')</script>";
        
     }
   }
 }	

}


 ?>


<!-- registration start -->

<div class="card bg-light login">
		<article class="card-body mx-auto" style="max-width: 400px;">
			<h4 class="card-text mt-3 text-center">Create Account</h4>
			<p class="text-center">Get Started with your free account</p>
			<p class="login_text">
				<a href="" class="btn btn-block btn-facebook"><i class="fab fa-facebook-f"></i>Login via facebook</a>
				<a href="" class="btn btn-block btn-google"><i class="fab fa-google"></i>Login via Google</a>
			</p>
			<p class="divider-text">
				<span class="bg-light">OR</span>
			</p>
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-user"></i></span>
					</div>
					<input type="text" name="username" class="form-control" placeholder="Full Name" required>
				</div>

				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-envelope"></i></span>
					</div>
					<input type="email" name="email" class="form-control" placeholder="Email" required>
				</div>

				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-phone"></i></span>
					</div>
					<input type="number" name="mobile" class="form-control" placeholder="Phone Number" required>
				</div>

				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user-tie fa"></i></span>
					</div>
					<input type="file" name="user_image" class="form-control" placeholder="" required>
				</div>

				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-lock"></i></span>
					</div>
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" onkeyup='check()' required>
				</div>

				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-lock"></i></span>
					</div>
					<input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Repeat Password" onkeyup='check()'; required>
				</div>
				<p class="w-100 text-center" id='message'></p>


				<div class="form-group">
					<button type="submit" name="register" class="btn btn-block login_btn">Create Account</button>
				</div>

				<p class="text-center">have you an account?	<a href="login.php"><span class="sign">Log in</span></a></p>


			</form>
		</article>
	</div>





<!-- registration end  -->

<script>
	var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('cpassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>


<?php include 'footer.php' ?>