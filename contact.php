<head>
<?php include 'callcontact.css'; ?>
</head>

<!-- JavaScript BEGIN -->
<?php include 'callcontact.php' ?>
<!--- JavaScript END --->

<!-- Header BEGIN -->
<?php
	$headtitle="contact"; //for header title
	require 'header.php'
?>
<!--- Header END --->

<!-- Main BEGIN -->
<div class="probootstrap-main">
<section class="probootstrap-section-half probootstrap-no-hover">
<div class="probootstrap-image" style="background-image: url(img/washing.gif)"></div>
<div class="probootstrap-text">
<div class="probootstrap-inner probootstrap-animate" style="background-color: #f2e7cd">

<?php
//Output buffer
ob_start();
if(isset($_POST['submitted']))
{
	if(!empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['phFront']) 
		&& !empty($_POST['phBack'])
	   && !empty($_POST['email']) && !empty($_POST['message']))
	{
		//Declaring variables for user input
		$fName = trim($_POST['fName']);
		$lName = trim($_POST['lName']);
		$phone = trim($_POST['phFront'])."-".trim($_POST['phBack']);
		$email = trim($_POST['email']);
		$msg   = trim($_POST['message']);
				
		require 'dbh.php';
		$query = "INSERT INTO contact(entry_id, fName, lName, phone, email, msg, date_entered)
									  VALUES(0, '$fName', '$lName', '$phone', '$email', '$msg', NOW())";
									  
		if(mysqli_query($dbc,$query)){
					echo '<!-- Success section BEGIN -->
						  <h1 class="heading">Contact Us</h1>
						  <h3><font color="#11af7c">Thank You!</font></h3>
						  <p>Successful submission of Contact Form.</p>
						  </div>
						  </div>
						  </div>
						  </section>';
		}
		else{
			echo '<h1 class="heading">Uh Oh...</h1>	
				  <h4>Your message failed to be submitted.</h4>
				  <br><br>
		     	  Click here to contact us again.<br>
				  <div class="col-12">
               	  <a href="contact.php">
		      	  <button type="submit" class="btn btn-primary">Contact Us</button></a>
				  </div>';
			echo "<p>Error message: ".mysqli_error($dbc)."</p>";
		}
				
?>
		
			
		<!-- Footer BEGIN -->
		<?php require 'footer.php'; ?>
		<!--- Footer END --->
		
		<!--- Success section END --->
	<?php
	} else {
	?>
		<!-- Invalid section BEGIN -->
		<h1 class="heading">Contact Us</h1>
		<h3><font color="#11af7c">Uh Oh!</font></h3>
		<p>Please fill in <b>all</b> the fields in the form.<br><br> 
		Click <a href="contact.php">here</a> to return to the Contact page.</p>
		</div>
		</div>
		</div>
		</section>
		
		<!-- Footer Start -->
		<?php require 'footer.php';?>
		<!-- Footer End -->
		
		<!-- Invalid section END -->
	<?php
	}
} else {
?>
	<!-- Contact Info BEGIN -->
	<h1 class="heading">Contact Us</h1>
    <h3><font color="#11af7c">Get in touch with us</font></h3>
	
	<p>Select which platform you'd like to contact us on:</p>
	
	<div class="tab">
		<button class="tablinks" onclick="openContacts(event, 'Location')">Location</button>
		<button class="tablinks" onclick="openContacts(event, 'Email')">E-mail</button>
		<button class="tablinks" onclick="openContacts(event, 'Phone')">Phone Number</button>
	</div>
	<div id="Location" class="tabcontent">
		<p><img src="img/icons/satelite.png" alt="info list">&ensp; Berhati Road , No420/69 <br>
			&emsp;&emsp;&emsp;&ensp; Penang , MY </p>
	</div>
	<div id="Email" class="tabcontent">
		<p><img src="img/icons/scheme.png" alt="info list">&ensp; contact@safetyfirst.com</p> 
	</div>
	<div id="Phone" class="tabcontent">
		<p><img src="img/icons/smartphone.png" alt="info list">&ensp; +60 12 - 345 6789</p>
	</div>
	</div>
	</div>
    </section>
    <!--- Contact Info END --->
	
	<!-- Contact Form BEGIN -->
    <section class="probootstrap-section probootstrap-animate">
      <div class="container">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form name="cForm" action="#" method="post" onsubmit="return validateForm()" 
				class="probootstrap-form probootstrap-form-box mb60">
		  <h1 align=center>Contact Form</h1><br><br>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="fName">First Name</label>
                  <input type="text" class="form-control" id="fName" name="fName">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="lName">Last Name</label>
                  <input type="text" class="form-control" id="lName" name="lName">
                </div>
              </div>
            </div>
			<div class="row">
			<div class="col-md-3">
              <label for="phFront">Phone No.</label>
              <select name="phFront" class="form-control">
			  <option> </option>
				<?php
				$hp = array('010', '011', '012', '013', '014', '016', '017', '018', '019');
				
					foreach($hp as $a){
						echo "<option value=\"$a\">$a</option>";
					}
				?>
			  </select>
			</div>
			<div class="col-md-1">
				<h2>_</h2>
			</div>
			<div class="col-md-8">
				<label>&nbsp;</label>
              <label for="phBack"></label>
              <input type="text" class="form-control" name="phBack">
            </div>
			</div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea cols="30" rows="10" class="form-control" id="message" 
						name="message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" id="submit" name="submit" 
					 value="Send Message">
			  <input type="hidden" name="submitted" value="true">
            </div>
          </form>
        </div>        
        </div>
      </div>
    </section>
  </div>
  <!--- Main END --->
	
<!-- Footer Begin -->
<?php require 'footer.php';?>
<!-- Footer End -->

<!--- Contact Form END --->
<?php } ?>
