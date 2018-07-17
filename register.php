<!--Header Start -->
<?php 
$headtitle="register"; //for header title
require 'header.php'?>
<!--Header End -->

  <div class="probootstrap-main">
  <!--Start Session-->
   <section class="probootstrap-section-half probootstrap-no-hover">
      <div class="probootstrap-image" style="background-image: url(img/bear.gif)"></div>
      <div class="probootstrap-text">
        <div class="probootstrap-inner probootstrap-animate"  style="background-color: #f4fdff">
		
		<!-- IF FORM SUBMITTED -->
		<?php
		if(isset($_POST['submitted']))
		{
			//--Validation Start to make sure all item posted
			if(!empty($_POST['first']) && !empty($_POST['last']) && !empty($_POST['uid']) 
				&&!empty($_POST['pwd']) && !empty($_POST['cpwd']))
			{
	
				if($_POST['pwd']==$_POST['cpwd'])
				{
					include 'dbh.php';
				
					$first = $_POST['first'];
					$last  = $_POST['last'];
					$uid   = $_POST['uid'];
					$pwd   = $_POST['pwd'];
				
					//Check user id already exist
					$query = "SELECT * FROM users WHERE uid='$uid'";
					$problem=false;
				
					if($result = mysqli_query($dbc,$query)){
						if($resultcheck = mysqli_num_rows($result)){
							//successfull in running query, match found
							$problem = true;
							echo '<h1 class="heading">Uh Oh...</h1>	
								<h4><b>User ID</b> has been used.</b> Please use another one.</h4> 
								<br><br>
								Click here to register again.<br>
								<div class="col-12">
									<a href="register.php">
								<button type="submit" class="btn btn-primary">Register Again
								</button></a>
								</div>';
						}					
					}
					else
						echo "Error(query): ".mysqli_error($dbc);
				
					//When match not found, add user to database
					if(!$problem){
						//Password hashing
						$hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
				
						$sql = "INSERT INTO users (first, last, uid, pwd)
								VALUES ('$first','$last','$uid','$hashPwd')";
				
						if(mysqli_query($dbc,$sql)){
							echo '<h1 class="heading">Hooray~</h1>	
								<h4>You have successfully registered!</h4>
								<br>
								Click here to login.<br>
								<div class="col-12">
									<a href="login.php">
								<button type="submit" class="btn btn-primary">Login</button></a>
								</div>';
						}
						else{
					
							echo '<h1 class="heading">Uh Oh...</h1>	
								<h4>Register failed to update database.</h4>
								<br><br>
								Click here to register again.<br>
								<div class="col-12">
									<a href="register.php">
								<button type="submit" class="btn btn-primary">Register Again</button>
								</a>
								</div>';
							echo "<p>Error message: ".mysqli_error($dbc)."</p>";
						}
					}
				
				}//end if
				else {
					echo '<h1 class="heading">Uh Oh...</h1>	
						<h4><b>Password</b> and <b>Confirm Password</b> 
		      			<br><br>
		      			Click here to register again.<br>
						<div class="col-12">
                      			<a href="register.php">
		      			<button type="submit" class="btn btn-primary">Register Again</button></a>
						</div>';
				}//end else	
	
			}//end if
			else 
			{ 
				echo '<h1 class="heading">Uh Oh...</h1>
				<h4>Please make sure all fields are filled in ☺</h4>
				<br><br>
				Click here to register again.<br>
				<div class="col-12">
                	<a href="register.php">
				<button type="submit" class="btn btn-primary">Register Again</button></a>
				</div>';
			}//end else		
		}//end if
	
		else{ ?>
		<!--FORM NOT SUBMITTED-->	
		<!--=================================Register Start========================================-->	
          <h1 class="heading">Register</h1>
          <form action="register.php" method="post" class="probootstrap-form probootstrap-form-box mb60">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="fname">First Name</label>
                  <input type="text" class="form-control" name="first">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control" name="last">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="Id">User Id</label>
              <input type="text" class="form-control" name="uid">
            </div>
			<div class="row">
			<div class="col-md-6">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="pwd">
                </div>
             </div>
			<div class="col-md-6">
                <div class="form-group">
                  <label for="Confirm">Confirm Password</label>
                  <input type="password" class="form-control" name="cpwd">
                </div>
              </div>
			</div>
			
            <div class="form-group">
              <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Register">
			  <input type="hidden" name="submitted" value="true">
            </div>
          </form>
		<!--=================================Register End========================================-->
        
		<?php
		} //end else
		?>
	
		</div>
      </div>
    </section>
    <!-- END section -->
    </div>
	
<!-- Footer Start -->
<?php 
	require 'footer.php'; 
?>
<!-- Footer End -->