<?php include'index_sidebar.php' ?>

        <section class="home">

        <?php include 'index_main_header.php' ?>



        <div class="container">
        <div class="main_quiz">
        <div class="row">
        <div class="col-lg-10 col-md-10 col-10 mx-auto">
        <div class="quiz_heading">
        <h2>Quiz System</h2>         
        </div>       
        </div>
        </div>
        <div class="row my-5">
          <div class="col-lg-10 col-md-10 col-10 mx-auto">
           <div class="card quiz_question">
           <div class="row">
           <div class="col-lg-10 col-md-10 col-10 mx-auto d-flex justify-content-between">
            <div class="quiz_count mt-3">
            <p>1 / 10</p>
            </div>
            <div class="quiz_count mt-3">
            <p>60</p>
            </div>
           </div>

           <div class="col-lg-10 col-md-10 col-10 mx-auto">
           <div class="quiz_start">
            <div class="question">
            <p><span>Q1:</span> What is meaning of PHP .?</p>
            <ul>
              <li>
                <input type="radio" name="answer" id="ans1" class="answer">
                <label for="ans1" id="option1">Answer option</label>
               </li>

               <li>
                <input type="radio" name="answer" id="ans1" class="answer">
                <label for="ans1" id="option1">Answer option</label>
               </li>

               <li>
                <input type="radio" name="answer" id="ans1" class="answer">
                <label for="ans1" id="option1">Answer option</label>
               </li>


               <li>
                <input type="radio" name="answer" id="ans1" class="answer">
                <label for="ans1" id="option1">Answer option</label>
               </li>
                                      
             </ul>
            </div>       
           </div>
           </div>
            <div class="col-lg-10 col-md-10 col-10 mx-auto">
                <div class="quiz_submit d-flex justify-content-end">
                  <button>Next</button>
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