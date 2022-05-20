<?php include'index_sidebar.php' ?>
<section class="home">
  <?php include 'index_main_header.php' ?>
  <div class="container-fluid class_heading">
    <?php
    
    $CourseDetailsQuery = "SELECT * FROM create_class WHERE cl_id = ? ";
    
    $CourseDetailsRunQuery = $Conn->prepare($CourseDetailsQuery);
    $CourseDetailsRunQuery->bindParam(1, $_GET['cl_id']);
    
    $CourseDetailsRunQuery->execute();
    while($result = $CourseDetailsRunQuery->fetch(PDO::FETCH_ASSOC)){
    
    $parent1_id = $result['parent_id'];
    $parent2_id = $_SESSION['user_id'];
    $cl_id = $result['cl_id'];
    ?>
    <div class="row">
      <div class="col-12 d-flex align-items-center class_heading_text">
        <h2><?php echo $result['cl_title'] ?></h2>
      </div>
    </div>
    <div class="row">
      
      <div class="col-lg-11 col-md-11 col-11 mx-auto">
        <div class="course_header1">
          <div class="row course_main_heading">
            <div class="col-lg-8 col-md-8 col-10 mx-auto">
              <div class="course_content">
                <h2><?php echo $result['cl_title']; ?></h2>
                <p><?php echo $result['cl_degree']; ?></p>
                <p>Class Code: <?php echo $result['cl_token'] ?></p>
              </div>
              
              
            </div>
            <div class="col-lg-4 col-md-4 col-10 mx-auto">
              <div class="course_profile">
                <a href="<?php if($parent1_id == $parent2_id){echo "add_course.php?cl_id=$cl_id";
                  } ?>">
                  <img src="upload/<?php echo $result['parent_img']; ?>" alt="" width="35.2rem;">
                </a>
                
                <p></p>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <?php } ?>
    <div class="row mt-5">
      
      <div class="col-lg-11 col-md-11 col-11 mx-auto">
        <div class="card">
          <h2 class="course_material_heading">Course Material</h2>
          <div class="course_material mt-5">
            <div class="table-responsive-md">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Download</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $materialViewQuery = "SELECT * FROM course_material WHERE cl_id = ? ";
                  
                  $materialQuery = $Conn->prepare($materialViewQuery);
                  $materialQuery->bindParam(1, $_GET['cl_id']);
                  
                  $materialQuery->execute();
                  $count = 0;
                  while($result = $materialQuery->fetch(PDO::FETCH_ASSOC)){
                  $count++;
                  ?>
                  <tr>
                    <td><?php echo $count ?></td>
                    <td><?php echo $result['course_title']?></td>
                    <td><a href="download_course.php?file=<?php echo $result['course_download_file'] ?>">download <span><i class='bx bxs-download'></i></span></a></td>
                    <td><?php echo $result['course_date'] ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      
      <div class="col-lg-11 col-md-11 col-11 mx-auto">
        <div class="card">
          <h2 class="course_material_heading">ASSIGNMENTS</h2>
          <div class="course_material mt-5">
            <div class="table-responsive-md">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Assignment</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Total Marks</th>
                    <th scope="col">Submit</th>
                    <!-- <th scope="col">Result</th>
                    <th scope="col">Remarks</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $assignViewQuery = "SELECT * FROM t_assignment WHERE assign_class_id = ? ";
                  
                  $assignQuery = $Conn->prepare($assignViewQuery);
                  $assignQuery->bindParam(1, $_GET['cl_id']);
                  
                  $assignQuery->execute();
                  $as_id = 0;
                  // $_SESSION['sb_assign_cl_id'] = $_GET['cl_id'];
                  $m = 0;
                  $rm = 0;
                  while($row = $assignQuery->fetch(PDO::FETCH_ASSOC)){
                  $as_id++;
                  $asign_id = $row['asign_id'];
                  $cl_id = $_GET['cl_id'];
                  $user_id = $_SESSION['user_id'];

                  
                    
                  ?>
                  <tr>
                    <td><?php echo $as_id; ?></td>
                    <td><?php echo $row['assign_title']; ?></td>
                    <td><a href="download_assign.php?assign_file=<?php echo $row['assign_file']; ?>">Assignment<br>File <i class='bx bxs-download'></i></a></td>
                    <td><?php echo $row['assign_due_date']; ?></td>
                    <td>20.00</td>

                    <?php 
                    if ($row['assign_tchr'] != $_SESSION['user_id']) {
                      

                     ?>
                    <td>
                      <?php
                      
                      $AsubOrNot = "SELECT * FROM submit_assignment WHERE assign_id = '$asign_id' AND sa_user_id = '$user_id' AND sa_cl_id = '$cl_id' AND sa_status = '1'";
                      $AsubOrNotquery = $Conn->prepare($AsubOrNot);
                      $AsubOrNotquery->execute();
                      $result = $AsubOrNotquery->rowCount();
                      if (!$result > 0) {
                      echo "<form action='submit_assignment.php?assign_id=$asign_id' method='post' enctype='multipart/form-data'>
                        <input type='file' name='file' id='file'>
                        <br><button name='upload' class='btn_upload'>upload</button>
                      </form>";
                      }
                      else{
                      echo "<p>submitted</p>";
                      }
                      ?>
                    </td>
                  <?php } ?>
                    <!-- <td>-- -->
                    <?php
                    // $u_id = $_SESSION['user_id'];
                    // $cl_id = $_GET['cl_id'];
                    // $Asmarks = "SELECT * FROM submit_assignment WHERE sa_user_id = $u_id AND sa_cl_id = $cl_id";
                    // $Asmarksquery = $Conn->prepare($Asmarks);
                    // $Asmarksquery->execute();
                    // $rslt = $Asmarksquery->fetch(PDO::FETCH_ASSOC);
                    // print_r($rslt);
                    
                    
                    // if (is_null($rslt['assign_result'])) {
                    //     echo "--";
                    //   }
                    //   else{
                    
                    //     echo $rslt[$m]['assign_result'];
                    //   }
                    
                    
                    
                    ?>
                    <!-- </td> -->
                    <!-- <td> -->
                    
                    <?php
                    // $u_id = $_SESSION['user_id'];
                    // $Asmarks1 = "SELECT * FROM submit_assignment WHERE sa_user_id = $u_id AND sa_cl_id = '".$_GET['cl_id']."'";
                    // $Asmarksquery1 = $Conn->prepare($Asmarks1);
                    // $Asmarksquery1->execute();
                    // $rslt1 = $Asmarksquery1->fetch(PDO::FETCH_ASSOC);
                    
                    // print_r($rslt1);
                    
                    //   if (is_null($rslt1[$rm]['assign_remarks'])) {
                    //       echo "--";
                    //     }
                    //     else{
                    //       echo $rslt1[$rm]['assign_remarks'];
                    //     }
                    // $rm++;
                    
                    
                    ?>
                    
                    <!-- </td> -->
                  </tr>
                  <?php
                } 
                ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row my-5">
      <div class="col-11 mx-auto">
        <div class="card add_assignmen">
          <div class="text-center my-4 add_course_text">
            <h2 class="course_material_heading">CHECK ASSIGNMENTS</h2>
          </div>
          <div class="add_course_profile">
            <div class="card d-flex flex-row align-items-center" data-toggle="collapse" data-target="#collapseExample1_1" aria-expanded="false" aria-controls="collapseExample">
              <img src="upload/<?php echo $_SESSION['user_image']; ?>" alt="">
              <p>Check Assignment Result</p>
            </div>
            <div class="collapse" id="collapseExample1_1">
              <div class="card card-body">
                <div class="form">
                  <div class="table-responsive-sm">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Assignment Title</th>
                          <th scope="col">Result</th>
                          <th scope="col">Remarks</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $cl_id = $_GET['cl_id'];
                        $u_id = $_SESSION['user_id'];
                        $chckassignresutl = "SELECT * FROM submit_assignment WHERE sa_cl_id = $cl_id AND sa_user_id = $u_id";
                        $chckassignresutlquery = $Conn->prepare($chckassignresutl);
                        $chckassignresutlquery->execute();
                        
                        $sr = 0;
                        while($rslt = $chckassignresutlquery->fetch(PDO::FETCH_ASSOC)){
                        $sr++;
                        ?>
                        <tr>
                          <th><?php echo $sr; ?></th>
                          <td><?php echo $rslt['sa_title'] ?></td>
                          <td><?php if (is_null($rslt['assign_result'])) {
                            echo "--";
                            }
                            else{
                            echo $rslt['assign_result'] ;
                          }?></td>
                          <td>
                            <?php if (is_null($rslt['assign_result'])) {
                            echo "--";
                            }
                            else{
                            echo $rslt['assign_remarks'];
                          }?> </td>
                          
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
    <div class="row mt-5">
      
      <div class="col-lg-11 col-md-11 col-11 mx-auto">
        <div class="card">
          <h2 class="course_material_heading">QUIZ</h2>
          <div class="course_material mt-5">
            <div class="table-responsive-md">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">Quiz Title</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Total Marks</th>
                    <th scope="col">Quiz Status</th>
                    <th scope="col">Submit Status</th>
                    <th scope="col">Result</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Quiz No 1</td>
                    <td>Dec 27, 2021 12:00 AM</td>
                    <td>Dec 28, 2021 11:59 PM</td>
                    <td>10</td>
                    <td><a href="">Closed</a></td>
                    <td>Submitted</td>
                    <td>7</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Quiz No2</td>
                    <td>Dec 27, 2021 12:00 AM</td>
                    <td>Dec 28, 2021 11:59 PM</td>
                    <td>10</td>
                    <td><a href="class_quiz.php">open</a></td>
                    <td>Submitted</td>
                    <td>7</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Quiz No2</td>
                    <td>Dec 27, 2021 12:00 AM</td>
                    <td>Dec 28, 2021 11:59 PM</td>
                    <td>10</td>
                    <td><a href="">submitted</a></td>
                    <td>Submitted</td>
                    <td>7</td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row m-5">
      <div class="col-lg-12 col-md-12 col-12 mx-auto">
        <div class="card">
          <div class="discuss_board">
            <div class="discuss_board_heading">
              <i class='bx bxs-chat'></i><h2>Discuss Board</h2>
            </div>
            <div class="discuss_board_body m-5 chatBox">

      
              

              

        
            </div>
          </div>
          <div class="row m-5">
            <div class="col-lg-12 col-md-12 col-12 mx-auto">
              <div class="add_comment">
                <form method="post" id="mymsg">
                  <div class="Icon-inside">
                    <input type="text" id="class_id" name="class_id" value="<?php echo $_GET['cl_id'] ?>" hidden>
                    <input type="text" placeholder="Enter Name" id="message" name="message">
                    <div class="icon_comment">
                      <i class="fas fa-paper-plane submit_msg"></i>
                    </div>
                    
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>
<script>

//   $(document).ready(function(){
//  $(document).on('change', '#file', function(){
//   var name = document.getElementById("file").files[0].name;
//   var form_data = new FormData();
//   var ext = name.split('.').pop().toLowerCase();
//   if(jQuery.inArray(ext, ['pdf','docx']) == -1)
//   {
//    alert("Invalid File");
//   }
//   var oFReader = new FileReader();
//   oFReader.readAsDataURL(document.getElementById("file").files[0]);
//   var f = document.getElementById("file").files[0];
//   var fsize = f.size||f.fileSize;
//   if(fsize > 2000000)
//   {
//    alert("File Size is very big");
//   }
//   else
//   {
//    form_data.append("file", document.getElementById('file').files[0]);
//    $.ajax({
//     url:"submit_assignment.php",
//     method:"POST",
//     data: form_data,
//     contentType: false,
//     cache: false,
//     processData: false,
//     beforeSend:function(){
//      $('#uploaded_file').html("<label class='text-success'>file Uploading...</label>");
//     },
//     success:function(data)
//     {
//      $('#uploaded_file').html(data);
//     }
//    });
//   }
//  });
// });
</script>
<?php include 'scripts.php'; ?>
</body>
</html>