<?php include 'index_sidebar.php' ?>


<section class="home">
<?php include 'index_main_header.php' ?>


<div class="student_profile1">
	<div>
		<div class="text1">
		<h2>Student Profile</h2>
	</div>
	</div>


	<div>
		<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="upload/<?php echo $_SESSION['user_image'] ?>" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5><?php echo $_SESSION['user_name'] ?></h5>
                                    <h6><?php echo $_SESSION['user_email'] ?></h6>
                            
                            <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Student Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Personal Information</a>
                                </li>
                            </ul>
                        </div>



                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kashif123</p>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Marks in Matric</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>835 / 1050</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Marks in Intermediate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>781 / 1100</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Degree</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>BSCS</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            	            <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kashif Lateef</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Father Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Abdul Lateef</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>male</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Birth Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>May 10, 1995</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CNIC</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>33202-8867794-3</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Permanent Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>ELLAHI MEDICAL STORE MOR MANDI</p>
                                            </div>
                                        </div>
                                
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <a href="edit_profile.php" class="profile-edit-btn">Edit Profile</a>
                    </div>
                </div>
                
            </form>           
        </div>
	</div>
</div>



</section>



<?php include 'scripts.php' ?>

</body>
</html>