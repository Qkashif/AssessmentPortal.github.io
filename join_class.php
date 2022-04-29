<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- font awesome  -->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="assets/fonts/icomoon/style.css">
		<!-- custom css -->
		<!----===== Boxicons CSS ===== -->
		<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha512-sJa5KWq3F99QOeijUOm9O+BgDgVtzrWBBagZtjlW7F3I47NO1OaNJvbut+9KOPmjNr4Wb3blU4vQiQdi+Zk6wg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<title>assessment portal</title>
		<link rel="icon" href="assets/images/logo.png">
		<!-- <link rel="stylesheet" href="assets/css/style.css"> -->
		<link rel="stylesheet" href="assets/css/style1.css">
	</head>
	<body>
		<!-- <div class="" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Join Class</h5>
						<button type="button" class="close1" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="close_model">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="card">
							<div class="card-header">
								You're currently signed in as
							</div>
							<div class="card-body">
								<div class="container">
									<div class="row">
										<div class="col-log-8 col-md-8 col-10 mx-auto">
											<div class="account_details d-flex">
												<div class="img">
													<img src="upload/<?php echo $_SESSION['user_image'] ?>" alt="">
												</div>
												<div class="details">
													<h3 class="name"><?php echo $_SESSION['user_name'] ?></h3>
													<p class="email"><?php echo $_SESSION['user_email'] ?></p>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-10 mx-auto">
											
										</div>
										
									</div>
									<div>
										<hr class="line">
										<br>
										<h2>class code</h2>
										<p>Ask your teacher for the class code.</p>
										<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Class Code" name="join_code">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						
						<button type="submit" class="model_button" name="join_class" >Join Class</button>
						
						
					</div>
				</div>
			</div>
		</div> -->
		<div class="join_class">
			<div class="card joinClass">
				<div class="card-header text-center">
					You're currently signed in as
				</div>
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col-log-8 col-md-8 col-10 mx-auto">
								<div class="account_details d-flex">
									<div class="img">
										<img src="upload/<?php echo $_SESSION['user_image'] ?>" alt="">
									</div>
									<div class="details">
										<h3 class="name"><?php echo $_SESSION['user_name'] ?></h3>
										<p class="email"><?php echo $_SESSION['user_email'] ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-10 mx-auto">
								
							</div>
							
						</div>
						<div>
							<hr class="line">
							<br>
							<h2>class code</h2>
							<p>Ask your teacher for the class code.</p>
							<form action="joinclass_php.php" method="post">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Class Code" name="join_code">
								</div>

								<div class="btn_center">
					
					<button type="submit" href="joinclass_php.php" name="join_class" >Join Class</button>
					
					
				</div>
							</form>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>

		
		<?php include 'scripts.php' ?>
	</body>
</html>