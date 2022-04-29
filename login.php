<?php include 'header.php';

session_start();

include 'connection.php';

if(isset($_POST['login'])) {

  $email    = $_POST['email'];
  $password = md5($_POST['password']);


 $loginQuery    = "SELECT * FROM users WHERE user_email = ? and user_password = ?";
 $RunloginQuery = $Conn->prepare($loginQuery);
 $RunloginQuery->bindParam(1, $email, PDO::PARAM_STR);
 $RunloginQuery->bindParam(2, $password, PDO::PARAM_STR);
 $RunloginQuery->execute();
 $login = $RunloginQuery->rowCount();

 if ($login > 0) {
 	$row = $RunloginQuery->fetch(PDO::FETCH_ASSOC);



 	 $_SESSION['user_id']      = $row['user_id'];
 	 $_SESSION['user_name']    = $row['user_name'];
 	 $_SESSION['user_email']   = $row['user_email'];
 	 $_SESSION['user_image']   = $row['user_image'];
 	 $_SESSION['user_token']   = $row['token'];
 	 $_SESSION['user_status']  = $row['user_status'];
 	 $_SESSION['user_control'] = $row['user_control'];

 	header("location: index.php");
 }
 else{
 	$message = "<div class='message my-2 py-3 text-center'>Please Check Your Email and Password.</div>";
 }




}











 ?>
<!-- login page start -->
<div class="card bg-light login">
	<article class="card-body mx-auto">
		<h4 class="card-text mt-3 text-center">Create Account</h4>
		<p class="text-center">Get Started with your free account</p>
		<p class="login_text">
			<a href="" class="btn btn-block btn-facebook"><i class="fab fa-facebook-f"></i>Login via facebook</a>
			<a href="" class="btn btn-block btn-google"><i class="fab fa-google"></i>Login via Google</a>
		</p>
		<p class="divider-text">
			<span class="bg-light">OR</span>
		</p>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
			<?php if (isset($message)) {
				echo $message;
			} ?>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-envelope"></i></span>
				</div>
				<input type="email" name="email" class="form-control" placeholder="Email" required>
			</div>
			
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-lock"></i></span>
				</div>
				<input type="password" name="password" class="form-control" placeholder="Password" required>
			</div>
			<div>
				<div class="checkbox d-flex justify-content-between">
					<label><input type="checkbox" class="check" value=""> <span>Remember me?</span></label>
					<div><a href="">forgot password?</a></div>
				</div>
			</div>
			
			<div class="form-group">
				<button type="submit" name="login" class="btn btn-block login_btn">login</button>
			</div>
			<p class="text-center">Not an account?	<a href="signup.php"><span class="sign">signup</span></a></p>
		</form>
	</article>
</div>
<!-- login page end -->
<?php include 'footer.php' ?>