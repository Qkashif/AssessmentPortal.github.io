<?php
include 'index_sidebar.php';
if (isset($_POST['create_class'])) {
$cl_token       = mt_rand(1000000000,9999999999);
// $_SESSION['$cl_token'] = $cl_token;
$cl_title       = $_POST['cl_title'];
$cl_degree      = $_POST['cl_degree'];
$cl_credit_h    = $_POST['cl_credit_h'];
$cl_institute_n = $_POST['cl_institute_n'];
$parent_id      = $_SESSION['user_id'];
$parent_token   = $_SESSION['user_token'];
$parent_img     = $_SESSION['user_image'];
$parent_name    = $_SESSION['user_name'];
$CreateClassQuery = "INSERT INTO create_class (`cl_title`,`cl_degree`,`cl_credit_h`,`cl_institute_n`,`cl_token`,`parent_id`, `parent_token`,`parent_img`, `parent_name`) VALUES (:cl_title, :cl_degree, :cl_credit_h, :cl_institute_n, :cl_token,:parent_id, :parent_token, :parent_img, :parent_name)";
$RunClassQuery = $Conn->prepare($CreateClassQuery);
$RunClassQuery->bindParam(':cl_title', $cl_title , PDO::PARAM_STR);
$RunClassQuery->bindParam(':cl_degree', $cl_degree , PDO::PARAM_STR);
$RunClassQuery->bindParam(':cl_credit_h', $cl_credit_h , PDO::PARAM_STR);
$RunClassQuery->bindParam(':cl_institute_n', $cl_institute_n , PDO::PARAM_STR);
$RunClassQuery->bindParam(':cl_token', $cl_token , PDO::PARAM_STR);
$RunClassQuery->bindParam(':parent_id', $parent_id , PDO::PARAM_STR);
$RunClassQuery->bindParam(':parent_token', $parent_token , PDO::PARAM_STR);
$RunClassQuery->bindParam(':parent_img', $parent_img , PDO::PARAM_STR);
$RunClassQuery->bindParam(':parent_name', $parent_name , PDO::PARAM_STR);
$ResultClassQuery = $RunClassQuery->execute();
if ($ResultClassQuery) {
echo "<script>alert('Class Created Successfully !')</script>";
}
}
if (isset($_POST['join_class'])) {
$ClassCode = $_POST['join_code'];
$pickid =$Conn->prepare("SELECT * FROM create_class WHERE cl_token = ?");
$pickid->bindParam(1, $ClassCode, PDO::PARAM_STR);
$pickid->execute();
$pick = $pickid->fetch(PDO::FETCH_ASSOC);
$cl_id = $pick['cl_id'];
$p_id  = $pick['parent_id'];
$joinUser_id = $_SESSION['user_id'];
$JoinClassQuery = "INSERT INTO join_class (`cl_id`, `p_id`, `joinUser_id`,`joincl_token`) VALUES (:cl_id, :p_id, :joinUser_id, :joincl_token)";
$RunJoinClassQuery = $Conn->prepare($JoinClassQuery);
$RunJoinClassQuery->bindParam(':cl_id', $cl_id , PDO::PARAM_INT);
$RunJoinClassQuery->bindParam(':p_id', $p_id , PDO::PARAM_INT);
$RunJoinClassQuery->bindParam(':joinUser_id', $joinUser_id , PDO::PARAM_INT);
$RunJoinClassQuery->bindParam(':joincl_token', $ClassCode , PDO::PARAM_STR);
$ResultJoinClassQuery = $RunJoinClassQuery->execute();
}
?>
<section class="home">
    <?php include 'index_main_header.php' ?>
    <div class="container-fluid class_heading">
        <div class="row">
            <div class="col-12 d-flex align-items-center class_heading_text">
                <h2>My Courses </h2><span>(<span class="span_text">FALL 2022</span>)</span>
            </div>
        </div>
    </div>
    <div class="container mt-5 class_div">
        <div class="row">
            <?php
            $p_id = $_SESSION['user_id'];
            
            
            $joinClass ="SELECT * FROM create_class WHERE parent_id = ?";
            $joinClassQuery = $Conn->prepare($joinClass);
            $joinClassQuery->bindParam(1, $p_id);
            
            $joinClassQuery->execute();
            while($row = $joinClassQuery->fetch(PDO::FETCH_ASSOC)){
            $c_id = $row['cl_id'];
            
            
            ?>
            <div class="col-lg-6 col-md-6 col-12 mb-5">
                <div class="card">
                    <a href="course_details.php?cl_id=<?php echo $c_id ?>" >
                        <div class="head">
                            <span><?php echo $row['cl_title'] ?></span>
                            <p><?php echo $row['cl_degree'] ?></p>
                            <p><?php echo $row['cl_credit_h'] ?></p>
                        </div>
                    </a>
                    
                    <div class="container">
                        <div class="second_section d-flex justify-content-between">
                            <div class="second_section_img">
                                <a href="course_details.php?cl_id=<?php echo $c_id ?>"><img src="upload/<?php echo $row['parent_img'] ?>" alt=""></a>
                            </div>
                            <div class="second_section_details">
                                <p><?php echo $row['parent_name'] ?></p>
                                <!-- <p>Ph.D</p> -->
                                <p><?php echo $row['cl_institute_n'] ?></p>
                            </div>
                            <div class="second_section_notice">
                                <!-- <a href="course_details.php?cl_id=<?php echo $row['cl_id'] ?>"><button>0</button></a>    -->                         </div>
                        </div>
                        <hr class="line">
                    </div>
                    <div class="container-fluid class_div_icon">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-12">
                                <div class="class_icon">
                                    <a href="course_details.php?cl_id=<?php echo $c_id ?>">
                                        <div>
                                            <i class="fas fa-book-reader iconn"></i>
                                        </div>
                                        <div>
                                            <p>Assignments</p>
                                        </div>
                                    </a>
                                    
                                </div>
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-12">
                                <div class="class_icon">
                                    <a href="course_details.php?cl_id=<?php echo $c_id ?>">
                                        <div>
                                            <i class="far fa-question-circle iconn"></i>
                                        </div>
                                        <div>
                                            <p>quiz</p>
                                        </div>
                                    </a>
                                    
                                </div>
                            </div>
                            
                            
                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php }
            ?>



            
            <?php
            $con = mysqli_connect("localhost","root","","assessment_portal");
            // Check connection
            if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
            }
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM join_class WHERE joinUser_id = $user_id";
            $runsql = mysqli_query($con, $sql);
            if (mysqli_num_rows($runsql) > 0) {
            while($result = mysqli_fetch_assoc($runsql)){
            $joincl_token = $result['joincl_token'];
            $joinclassquery = "SELECT * FROM create_class WHERE cl_token = $joincl_token";
            $joinclassqueryrun = mysqli_query($con, $joinclassquery);
            while($row = mysqli_fetch_assoc($joinclassqueryrun)){
            
            $c_id = $row['cl_id'];
            
            ?>
            <div class="col-lg-6 col-md-6 col-12 mb-5">
                <div class="card">
                    <a href="course_details.php?cl_id=<?php echo $c_id ?>" >
                        <div class="head">
                            <span><?php echo $row['cl_title'] ?></span>
                            <p><?php echo $row['cl_degree'] ?></p>
                            <p><?php echo $row['cl_credit_h'] ?></p>
                        </div>
                    </a>
                    
                    <div class="container">
                        <div class="second_section d-flex justify-content-between">
                            <div class="second_section_img">
                                <a href="course_details.php?cl_id=<?php echo $c_id ?>"><img src="upload/<?php echo $row['parent_img'] ?>" alt=""></a>
                            </div>
                            <div class="second_section_details">
                                <p><?php echo $row['parent_name'] ?></p>
                                <!-- <p>Ph.D</p> -->
                                <p><?php echo $row['cl_institute_n'] ?></p>
                            </div>
                            <div class="second_section_notice">
                                 <!-- <a href="course_details.php?cl_id=<?php echo $row['cl_id'] ?>"><button>0</button></a>  -->
                            </div>
                        </div>
                        <hr class="line">
                    </div>
                    <div class="container-fluid class_div_icon">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-12">
                                <div class="class_icon">
                                    <a href="course_details.php?cl_id=<?php echo $c_id ?>">
                                        <div>
                                            <i class="fas fa-book-reader iconn"></i>
                                        </div>
                                        <div>
                                            <p>Assignments</p>
                                        </div>
                                    </a>
                                    
                                </div>
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-12">
                                <div class="class_icon">
                                    <a href="course_details.php?cl_id=<?php echo $c_id ?>">
                                        <div>
                                            <i class="far fa-question-circle iconn"></i>
                                        </div>
                                        <div>
                                            <p>quiz</p>
                                        </div>
                                    </a>
                                    
                                </div>
                            </div>
                            
                            
                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php }
            }
            }
            else{
            echo "";
            } ?>
            
            
            
        </div>
    </div>
</section>
<?php
include 'scripts.php' ?>
</body>
</html>