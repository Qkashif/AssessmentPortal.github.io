
<div class="main_header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-none col-none">
                            <div class="main_header_text">
                                <h2>ASSESSMENT PORTAL</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="main_header_profile">
                                <span>
                                    <div class="dropdown">
                                        <i class="bx bx-plus bell " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        
                                        </i>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalCenter">Create Class</a>
                                            <a class="dropdown-item" id="join_class" data-toggle="modal" data-target="#exampleModal">Join Class</a>
                                        </div>
                                        
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Create Class</h5>
                                                        <button type="button" class="close1" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true" class="close_model">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- model body start -->
                                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Course Title" name="cl_title">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Degree" name="cl_degree">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Credit Hour(s)" min="1" max="4" name="cl_credit_h">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Institute Name" name="cl_institute_n">
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                
                                                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                            </div>
 -->                                                            
                                                            
                                                            
                                                        
                                                        <!-- model body end -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="model_button" name="create_class">Continue</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                                
                                <h6><?php echo $_SESSION['user_name'] ?></h6>
                                
                                <a href="user_profile.php"><img src="upload/<?php echo $_SESSION['user_image'] ?>" alt=""></a>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->



            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


                                                <div class="modal-footer">
                            
                            <button type="submit" class="model_button" name="join_class" >Join Class</button>
                                
                            
                        </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            


             
