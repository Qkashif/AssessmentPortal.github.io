<?php include'index_sidebar.php' ?>

<section class="home">

<?php include 'index_main_header.php' ?>


<div class="container">
        <div class="row">
        <div class="col-10 mx-auto">
        <div class="add_course_heading">
         <div class="details">
        <h2>Result of quiz in progress bar in all subjects</h2>
        <p>show your progess in progess bar</p>  
         </div>
        
        </div>
        </div>
        </div>
</div>
<br><br><br>

  <!--chart start-->
  <div class="chart_center">
        <div class="chart">
      <ul class="numbers">
        <li><span>100%</span></li>
        <li><span>75%</span></li>
        <li><span>50%</span></li>
        <li><span>25%</span></li>
        <li><span>0%</span></li>
      </ul>
      <ul class="bars">
        <li><div class="bar" data-percentage="50"></div><span class="text">subject 01</span></li>
        <li><div class="bar" data-percentage="30"></div><span>subject 02</span></li>
        <li><div class="bar" data-percentage="60"></div><span>subject 03</span></li>
        <li><div class="bar" data-percentage="2"></div><span>subject 04</span></li>
        <li><div class="bar" data-percentage="80"></div><span>subject 05</span></li>
      </ul>
    </div>  
  </div>
    
    <!--chart end-->



   <script>
    $(function(){
      $('.bars li .bar').each(function(key, bar){
        var percentage = $(this).data('percentage');
        $(this).animate({
          'height' : percentage + '%'
        },1000);
      });
    });
    </script>

<?php include 'scripts.php' ?>
</body>
</html> 