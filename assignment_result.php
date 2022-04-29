<?php 
  include 'connection.php';
  $assignment_id = $_GET['asign_id'];
  $marks = $_POST['marks'];
  $remarks = $_POST['remarks'];


  $updatemarks = "UPDATE submit_assignment SET assign_result ='$marks', assign_remarks ='$remarks' WHERE sa_id  = '$assignment_id'";
  $updatemarksquery = $Conn->prepare($updatemarks);
  if ($updatemarksquery->execute()) {
  	echo $returntoclass = "SELECT sa_cl_id FROM submit_assignment WHERE sa_id = '$assignment_id'";
  	
  	$returntoclassquery = $Conn->prepare($returntoclass);
  	$returntoclassquery->execute();
  	$row = $returntoclassquery->fetch(PDO::FETCH_ASSOC);
  	$cl_id = $row['sa_cl_id'];



  	header("location: add_course.php?cl_id=$cl_id");
  }


 ?>