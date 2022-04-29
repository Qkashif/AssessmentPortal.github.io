<?php
include 'connection.php';
session_start();


if (isset($_FILES['file'])) {


$assign_file = $_FILES['file']['name'];
$assignfileTmpName = $_FILES['file']['tmp_name'];
$path ="file/".$assign_file;


$assign_id = $_GET['assign_id'];
$user_submit_assignment = $_SESSION['user_id'];


echo $viewAssignDetails = "SELECT * FROM t_assignment WHERE asign_id = '$assign_id'";
$viewAssignDetailsRunQuery = $Conn->prepare($viewAssignDetails);
$viewAssignDetailsRunQuery->execute();
$viewAssignDetailsData = $viewAssignDetailsRunQuery->fetch(PDO::FETCH_ASSOC);

$assign_title = $viewAssignDetailsData['assign_title'];
$assign_class_id = $viewAssignDetailsData['assign_class_id'];
$sa_status = 1;

 $SassignInsertQuery = "INSERT INTO submit_assignment (`assign_id`,`sa_cl_id`, `sa_user_id`, `sa_name`, `sa_title`, `sa_status`) VALUES (:assign_id, :assign_class_id, :user_submit_assignment, :assign_file, :assign_title, :sa_status)";
         $SassignRunQuery = $Conn->prepare($SassignInsertQuery);

         $SassignRunQuery->bindParam(':assign_id', $assign_id, PDO::PARAM_INT);
         $SassignRunQuery->bindParam(':assign_class_id', $assign_class_id, PDO::PARAM_INT);
         $SassignRunQuery->bindParam(':user_submit_assignment', $user_submit_assignment, PDO::PARAM_INT);
         $SassignRunQuery->bindParam(':assign_file', $assign_file, PDO::PARAM_STR);
         $SassignRunQuery->bindParam(':assign_title', $assign_title, PDO::PARAM_STR);
         $SassignRunQuery->bindParam(':sa_status', $sa_status, PDO::PARAM_INT);


         if($SassignRunQuery->execute()){
            move_uploaded_file($assignfileTmpName,$path);
            echo "<script>alert('Successfully Submitted')</script>";
        }
        else{
            echo "error";
        }
      
      header("location: course_details.php?cl_id=$assign_class_id");
      }
      else{
        header("location: course_details.php?cl_id=$assign_class_id");

      }



// $clas_id = $_SESSION['sb_assign_cl_id'];
// if($_FILES["file"]["name"] != '')
// { 
 
// $sa_filename = $_FILES["file"]["name"];
//  $test = explode('.', $_FILES["file"]["name"]);
//  // $ext = end($test);
//  // $name = rand(100, 999) . '.' . $ext;
//  $location = 'file/'.$_FILES["file"]["name"];

//  $submitassignment = "INSERT INTO submit_assignment(`sa_cl_id`, `sa_user_id`, `sa_name`) VALUES (:sa_cl, :sa_userid, :sa_name)";
//  $submitassignmentrun = $Conn->prepare($submitassignment);
//  $submitassignmentrun->bindParam(':sa_cl', $clas_id, PDO::PARAM_INT);
//  $submitassignmentrun->bindParam(':sa_userid', $user_submit_assignment, PDO::PARAM_INT);
//  $submitassignmentrun->bindParam(':sa_name', $sa_filename, PDO::PARAM_STR);
//  $submitassign = $submitassignmentrun->execute();

//  if ($submitassign) {
//   echo "<script>alert('work')</script>";
//    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
//  }
//  else{
//   echo "<script>alert('please upload again your')</script>";
//  }
//}
?>