<!--Header Start -->
<?php 
$headtitle="index"; //for header title
require 'header.php'?>
<!--Header End -->



  <div class="probootstrap-main">
  
    <section class="probootstrap-section-half">
      <div class="probootstrap-image probootstrap-animate" data-animate-effect="fadeIn" 
		   style="background-image: url(img/toast.gif)"></div>
      <div class="probootstrap-text">	  
        <div class="probootstrap-inner probootstrap-animate" style="background-color: #c5f7e2">
          <h1 class="heading">Do not get out your toast with a fork.</h1>
          <p>The resistors in a toaster are the wires which glow red when you turn the toaster on. 
		     They are made of metals which conducts electricity very pooly and therefore has a 
			 high resistance. If you put a fork inside a toaster you will create a new path for 
			 the electricity - a path through the fork, through your body and down to the ground.
			</p>
		  
		  <?php
			if(isset($_SESSION['first'])){
				//no login
			}
			else{
				echo '<P>Already a member?<br>
				<a href="login.php" class="btn btn-primary">Login</a></p>';
			}
		  ?>
		  
		  
        </div>
      </div>
    </section>
    <!-- END section -->
    <section class="probootstrap-section-half probootstrap-reverse">
      <div class="probootstrap-image probootstrap-animate"  data-animate-effect="fadeIn" 
			style="background-image: url(img/sidelane.gif)"></div>
      <div class="probootstrap-text">
        <div class="probootstrap-inner probootstrap-animate"  style="background-color: #e6d4f9">
          <h1 class="heading">Do not stand on the sidelane of the train tracks.</h1>
          <p>You will fall and get run over by a train.</p>
		  <p>Not a member yet?<br>
          <a href="register.php" class="btn btn-primary">Register</a></p>
        </div>
      </div>
    </section>
    <!-- END section -->
    <section class="probootstrap-section-half">
      <div class="probootstrap-image probootstrap-animate" data-animate-effect="fadeIn" 
			style="background-image: url(img/balloon.gif)"></div>
      <div class="probootstrap-text">
        <div class="probootstrap-inner probootstrap-animate" style="background-color: #a9d1d8">
          <h1 class="heading">Do not cross the road to catch your balloon.</h1>
          <p>Train tracks and roads alike, you should not play near them. 
			 You might accidentally drop something and try to chase it. 
			 Resulting in an accident you could've avoided.</p>
        </div>
      </div>
    </section>
    <!-- END section -->
    <section class="probootstrap-section-half probootstrap-reverse">
      <div class="probootstrap-image probootstrap-animate" data-animate-effect="fadeIn" 
			style="background-image: url(img/car.gif)"></div>
      <div class="probootstrap-text">
        <div class="probootstrap-inner probootstrap-animate" style="background-color: #d8cabc">
          <h1 class="heading">Do not be impatient while driving.</h1>
          <p>Impatience can be fatal. Don't push your crossing luck.</p>
        </div>
      </div>
    </section>
    <!-- END section -->
  </div>
  
<!-- Footer Start -->
<?php require 'footer.php';?>
<!-- Footer End -->	
