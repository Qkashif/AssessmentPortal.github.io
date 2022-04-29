<?php include'index_sidebar.php' ?>


        <section class="home">

        <?php

        if (isset($_POST['submit_material'])) {
         $cl_id = $_GET['cl_id'];
         $material_name = $_POST['m_title'];
         $material_date = $_POST['date'];
         $fileName = $_FILES['file']['name'];
         $fileTmpName = $_FILES['file']['tmp_name'];
         $path ="file/".$fileName;


         $materialInsertQuery = "INSERT INTO course_material (`course_title`, `course_download_file`, `course_date`, `cl_id`) VALUES (:material_name, :fileName, :material_date, :cl_id)";
         $materialRunQuery = $Conn->prepare($materialInsertQuery);
         $materialRunQuery->bindParam(':material_name', $material_name, PDO::PARAM_STR);
         $materialRunQuery->bindParam(':fileName', $fileName, PDO::PARAM_STR);
         $materialRunQuery->bindParam(':material_date', $material_date, PDO::PARAM_STR);
         $materialRunQuery->bindParam(':cl_id', $cl_id, PDO::PARAM_INT);

         if($materialRunQuery->execute()){
            move_uploaded_file($fileTmpName,$path);
            echo "<script>alert('Successfully Submitted')</script>";
        }
        else{
            echo "error";
        }
          
        }


        if (isset($_POST['assign_submit'])) {
          $cl_id = $_GET['cl_id'];
          $assign_tchr = $_SESSION['user_id'];
          $assign_title = $_POST['assign_title'];
          $assign_date = $_POST['assign_date'];
          $assign_marks = $_POST['assign_marks'];


         $assign_file = $_FILES['assign_file']['name'];
         $assignfileTmpName = $_FILES['assign_file']['tmp_name'];
         $path ="file/".$assign_file;




           $assignInsertQuery = "INSERT INTO t_assignment (`assign_title`, `assign_file`, `assign_due_date`, `assign_total_marks`,`assign_class_id`,`assign_tchr`) VALUES (:assign_title, :assign_file, :assign_date, :assign_marks, :cl_id, :assign_tchr)";
         $assignRunQuery = $Conn->prepare($assignInsertQuery);
         $assignRunQuery->bindParam(':assign_title', $assign_title, PDO::PARAM_STR);
         $assignRunQuery->bindParam(':assign_file', $assign_file, PDO::PARAM_STR);
         $assignRunQuery->bindParam(':assign_date', $assign_date, PDO::PARAM_STR);
         $assignRunQuery->bindParam(':assign_marks', $assign_marks, PDO::PARAM_INT);
         $assignRunQuery->bindParam(':cl_id', $cl_id, PDO::PARAM_INT);
         $assignRunQuery->bindParam(':assign_tchr', $assign_tchr, PDO::PARAM_INT);

         if($assignRunQuery->execute()){
            move_uploaded_file($assignfileTmpName,$path);
            echo "<script>alert('Successfully Submitted')</script>";
        }
        else{
            echo "error";
        }







        }








         include 'index_main_header.php'

        
         ?>


        <div class="container">
        <div class="row">
        <div class="col-10 mx-auto">
        <div class="add_course_heading">
         <div class="details">
        <h2>CS201 - Introduction To Programming</h2>
        <p>Computer Science/Information Technology</p>  
         </div>
        
        </div>
        </div>
        </div>

   <!-- < ====================================== course upload start ==============================> -->
 
        <div class="row mt-5">

        <div class="col-10 mx-auto">
        <div class="card add_course">
        <div class="text-center my-4 add_course_text">
        <h2>Upload Course Material</h2>
        </div>
        <div class="add_course_profile">
        <div class="card d-flex flex-row align-items-center" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
        <img src="upload/<?php echo $_SESSION['user_image']; ?>" alt="">
        <p>Announce course to your class</p>
        </div>
        <div class="collapse" id="collapseExample2">
  <div class="card card-body">
    <div class="form">
    <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    
    <input type="text" name="m_title" class="form-control"  placeholder="Enter Title">
    
  </div>

  <div class="form-group">
    <input type="file" name="file" class="form-control" >
  </div>

  <div class="form-group">
    <input type="date" name="date" class="form-control" placeholder="Enter Date">
  </div>


  <div class="buton">
  <button type="submit" name="submit_material" class="btn btn-primary">Submit</button>
  </div>
</form>
    </div>
  </div>
</div>
        </div>
        </div>
        </div>
        </div>
   <!-- < ====================================== course upload end ==============================> -->



   <!-- < ====================================== assignment upload start ==============================> -->


        <div class="row my-5">
        <div class="col-10 mx-auto">
        <div class="card add_assignment">
        <div class="text-center my-4 add_course_text">
        <h2>Upload Assignment</h2>
        </div>
        <div class="add_course_profile">
        <div class="card d-flex flex-row align-items-center" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
        <img src="upload/<?php echo $_SESSION['user_image']; ?>" alt="">
        <p>Announce assignment to your class</p>
        </div>
        <div class="collapse" id="collapseExample1">
  <div class="card card-body">
    <div class="form">
    <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    
    <input type="text" name="assign_title" class="form-control" placeholder="Enter Title">
    
  </div>

  <div class="form-group">
    <input type="file" name="assign_file" class="form-control">
  </div>

  <div class="form-group">
    <input type="date" name="assign_date" class="form-control" placeholder="Due Date">
  </div>

  <div class="form-group">
    <input type="text" name="assign_marks" class="form-control" placeholder="Total Marks">
  </div>

  <div class="buton">
  <button type="submit" name="assign_submit" class="btn btn-primary">Submit</button>
  </div>
</form>
    </div>
  </div>
</div>
        </div>
        </div>


        </div>

         

        </div>


<!-- =========================== VIEW ASSIGNMENT ======================================= -->


          <div class="row my-5">
        <div class="col-10 mx-auto">
        <div class="card add_assignment">
        <div class="text-center my-4 add_course_text">
        <h2>Check Assignment</h2>
        </div>
        <div class="add_course_profile">
        <div class="card d-flex flex-row align-items-center" data-toggle="collapse" data-target="#collapseExample1_1" aria-expanded="false" aria-controls="collapseExample">
        <img src="upload/<?php echo $_SESSION['user_image']; ?>" alt="">
        <p>Check Assignment To Your Class</p>
        </div>
        <div class="collapse" id="collapseExample1_1">
  <div class="card card-body">
    <div class="form">
    <div class="table-responsive-sm">
  <table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col">Sr No</th>
      <th scope="col">Student Name</th>
      <th scope="col">Assignment Title</th>
      <th scope="col">Assignment</th>
      <th scope="col">Result And Remarks</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $selectsubmitassig = "SELECT * FROM submit_assignment WHERE sa_cl_id = '".$_GET['cl_id']."'";
    $selectsubmitassigquery = $Conn->prepare($selectsubmitassig);
    $selectsubmitassigquery->execute();
    $srno = 0;
    while($row = $selectsubmitassigquery->fetch(PDO::FETCH_ASSOC)){
    $srno++;
    $asign_id = $row['sa_id'];

     ?>
    <tr>
      <th><?php echo $srno; ?></th>
      <td><?php 

      $user_id = $row['sa_user_id'];

      $selectfromuser = "SELECT * FROM users WHERE user_id = '$user_id'";
      $selectfromuserquery = $Conn->prepare($selectfromuser);
      $selectfromuserquery->execute();
      $username = $selectfromuserquery->fetch(PDO::FETCH_ASSOC);

      echo $username['user_name'];


       ?></td>
      <td><?php echo $row['sa_title'] ?></td>
      <td class="download_sAsign"><a href="download_course.php?file=<?php echo $row['sa_name'] ?>"><?php echo $row['sa_name'] ?> <span><i class='bx bxs-download'></i></span></a></td>
      <td>
        <?php 
        if (is_null($row['assign_result']) && is_null($row['assign_remarks'])) {
          echo " <form action='assignment_result.php?asign_id=$asign_id' method='post'>
  <div class=''>
    <input type='text' name='marks' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Marks'>
  </div>
  <div class=''>
    <input type='text' name='remarks' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Remarks'>
  </div>

  <button type='submit' name='submit_result' class='btn btn-primary'>Submit</button>
</form>";
        }
        else{
          echo $row['assign_result'];
          echo " | ";
          echo $row['assign_remarks'];
        }


         ?>
       
      </td>
      
    </tr>
   <?php } ?>
  </tbody>
  </table>
</div>
    </div>
  </div>
</div>
        </div>
        </div>


        </div>

         

        </div>

   <!-- < ====================================== assignment upload end ==============================> -->
        <div class="row mb-5">
        <div class="col-10 mx-auto">
        <div class="card add_quiz">
        <div class="text-center my-4 add_course_text">
        <h2>Upload Quiz</h2>
        </div>
        <div class="add_course_profile">
        <div class="card d-flex flex-row align-items-center" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <img src="upload/<?php echo $_SESSION['user_image']; ?>" alt="">
        <p>Announce quiz to your class</p>
        </div>
        <div class="collapse" id="collapseExample">
  <div class="card card-body">
   <div class="form">
    <form>
  <div class="form-group">
    
    <input type="text" class="form-control" placeholder="Quiz Title">
    
  </div>

  <div class="form-group">
    <input type="time" class="form-control" placeholder="Start Time">
  </div>

  <div class="form-group">
    <input type="time" class="form-control" placeholder="End time">
  </div>

  <div class="form-group">
    <input type="text" class="form-control" placeholder="Total Marks">
  </div>

  <div class="form-group">
    <input type="text" class="form-control" placeholder="Quiz Status">
  </div>

  <div class="form-group">
    <input type="text" class="form-control" placeholder="Submit Status">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Result">
  </div>
  <div class="buton">
  <button type="submit" class="btn btn-primary">Submit</button>
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



</section>
<?php include 'scripts.php' ?>
</body>
</html>        