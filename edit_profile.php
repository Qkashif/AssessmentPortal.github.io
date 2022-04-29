<?php include 'index_sidebar.php' ?>
<section class="home">
	<?php include 'index_main_header.php' ?>



	<div class="container mt-5 edit_text">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-10 mx-auto">
				<h3 class="text-center mt-5">Edit Profile</h3>
			</div>
		</div>

		<div class="edit_profile">
			<div class="row mt-5">
			<div class="col-lg-10 col-md-10 col-10 mx-auto">
				<form>
					<div class="form-group">
						
						<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
						
					</div>
					<div class="form-group">
						
						<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Father Name">
					</div>

					<div class="form-group">
						
						<select class="custom-select" id="inlineFormCustomSelect">
        <option selected disabled>Gender</option>
        <option value="1">male</option>
        <option value="2">Female</option>
        <option value="3">Other</option>
      </select>
						
					</div>
					<div class="form-group">
						
						<input type="date" class="form-control" id="exampleInputPassword1" placeholder="Date of Birth">
					</div>

					<div class="form-group">
						
						<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter CNIC">
						
					</div>
					<div class="form-group">
						
						<input type="text" class="form-control" id="exampleInputPassword1" placeholder="matric obtain marks">
					</div>

					<div class="form-group">
						
						<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="matric total marks">
						
					</div>
					<div class="form-group">
						
						<input type="text" class="form-control" id="exampleInputPassword1" placeholder="intermediate obtain marks">
					</div>

					<div class="form-group">
						
						<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="intermediate total marks">
						
					</div>
					<div class="form-group">
						
						<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Parmanent Address">
					</div>

					<div class="form-group">
						
						<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Degree Program">
					</div>
					
					<button type="submit" class="btn">Submit</button>
				</form>
			</div>
		</div>
		</div>
		
	</div>
	
</section>


<?php include 'scripts.php' ?>
</body>
</html>