<?php 

include 'connection.php';

session_start();


 $user_id = $_SESSION['user_id'];
 $class_id = $_POST['class_id'];


 $sql = "SELECT * FROM messages LEFT JOIN users ON users.user_id = messages.msg_senderId WHERE msg_class = $class_id ORDER BY msg_id";
 $output = "";

 $runquery = $Conn->prepare($sql);

 $runquery->execute();
 $login = $runquery->rowCount();

 if ($login > 0) {
  while($row = $runquery->fetch(PDO::FETCH_ASSOC)){
     if ($row['msg_senderId'] === $user_id) {

      $output .= ' <div class="row m-3">
                <div class="col-lg-4 col-md-4 col-4 no-gutters px-sm-0 d-flex justify-content-end">
                </div>
                <div class="col-lg-8 col-md-8 col-8 no-gutters px-sm-0" >
                  <div class="card outgoing">
                    <p class="student_name">
                     '.$row['msg_senderName'].'
                    </p>
                    <p class="student_msg">
                      '.$row['msg_text'].'
                    </p>
                  </div>
                </div>
              </div>';
      
       
     }
     else{
      $output .= '<div class="row m-3">
                <div class="col-lg-1 col-md-1 col-1 no-gutters px-sm-0 d-flex justify-content-end align-items-center">
                  <img src="upload/'.$row['user_image'].'" alt="" class="">
                </div>
                <div class="col-lg-8 col-md-8 col-8 no-gutters px-sm-0" >
                  <div class="card ingoing">
                    <p class="student_name">
                      '.$row['msg_senderName'].'
                    </p>
                    <p class="student_msg">
                      '.$row['msg_text'].'
                    </p>
                  </div>
                </div>
              </div>';
      
     }
  }
 }
 else{
      $output .= '<div class="text alert alert-danger">No messages are available. Once you send message they will appear here.</div>';
 }
echo $output;
 ?>