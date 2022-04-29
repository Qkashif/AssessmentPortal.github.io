<?php include'index_sidebar.php' ?>

        <section class="home">

        <?php include 'index_main_header.php' ?>



<div class="content">
    
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-8">
          <div class="form h-100">
            <h3>Send us a message</h3>
            <form class="mb-5" method="post" id="contactForm" name="contactForm">
              <div class="row">
                <div class="col-md-6 mb-5">
                  <label for="" class="col-form-label">Name *</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                </div>
                <div class="col-md-6 mb-5">
                  <label for="" class="col-form-label">Email *</label>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Your email">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-5">
                  <label for="" class="col-form-label">Phone *</label>
                  <input type="text" class="form-control" name="phone" id="phone"  placeholder="Phone #">
                </div>
                <div class="col-md-6 mb-5">
                  <label for="" class="col-form-label">Subject *</label>
                  <input type="text" class="form-control" name="subject" id="subject"  placeholder="Subject  name">
                </div>
              </div>

              <div class="row">
                <div class="col-md-10 mb-5">
                  <label for="message" class="col-form-label">Message *</label>
                  <textarea class="form-control" name="message" id="message" cols="20" rows="4"  placeholder="Write your message"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 ">
                  <input type="submit" value="Send Message" class="btn snd_msg rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
              </div>
            </form>

            <div id="form-message-warning mt-4"></div> 
            <div id="form-message-success">
              Your message was sent, thank you!
            </div>

          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-info h-100 mb-5">
            <h3>Contact Information</h3>
            <p class="my-5 text-white">IF YOU HAVE ANY PROBLEM FROM TEACHERS AND OUR SITE THEN CONTACT US. WE WILL SOLVE AS SOON AS POSSIBLE.</p>
            <ul class="list-unstyled">
              
              <li class="d-flex align-items-center my-5">
                <span class="wrap-icon icon-phone mr-3"></span>
                <span class="text">0346-4073518</span>
              </li>
              <li class="d-flex align-items-center my-5">
                <span class="wrap-icon icon-envelope mr-3"></span>
                <span class="text">assessmentportal.com</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>



</section>

<?php include 'scripts.php' ?>
</body>
</html> 