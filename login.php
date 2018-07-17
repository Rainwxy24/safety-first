<!--Header Start -->
<?php 
$headtitle="login"; //for header title
require 'header.php'?>
<!--Header End -->

  <div class="probootstrap-main">
  <!--Start Session-->
   <section class="probootstrap-section-half probootstrap-no-hover">
      <div class="probootstrap-image" style="background-image: url(img/wasps.gif)"></div>
      <div class="probootstrap-text">
        <div class="probootstrap-inner probootstrap-animate" style="background-color: #e5ffee">
		
		<!-- IF FORM SUBMITTED -->
		<?php
		if(isset($_POST['submitted'])){		
				
			//--Validation Start to make sure all item posted
			if(!empty($_POST['uid']) && !empty($_POST['pwd'])){
				include 'dbh.php';
				
				$uid   = $_POST['uid'];
				$pwd   = $_POST['pwd'];
				
				$sql = "SELECT * FROM users WHERE uid='$uid'";
				$result = mysqli_query($dbc,$sql);
				
				//run query to select data and match
				if($row = mysqli_fetch_array($result)){
					//success in running query, 
					//de-hashed password
					$hashedPwdCheck = password_verify($pwd, $row['pwd']);
					
					if($hashedPwdCheck){
						//password match, create session
						$_SESSION['first'] = $row['first'];
						$_SESSION['last'] = $row['last'];
						header('Location: index.php');
						exit();
					}
					else{
						//if password not match
						echo '<h1 class="heading">Uh Oh...</h1>	
						  <h4>Login Failed.</h4>
						  <h4>User ID or Password is incorrect.</h4>
						  <br><br>
		      			  Click here to login again.<br>
						  <div class="col-12">
                      		<a href="login.php">
		      			  <button type="submit" class="btn btn-primary">Login Again</button></a>
						  </div>';					
					}//end else
				}//end if
				else {
					//fail to run query
					echo '<h1 class="heading">Uh Oh...</h1>	
						  <h4>Login Failed.</h4>
						  <h4>User ID is incorrect.</h4>
						  <br><br>
		      			  Click here to login again.<br>
						  <div class="col-12">
                      		<a href="login.php">
		      			  <button type="submit" class="btn btn-primary">Login Again</button></a>
						  </div>';
				}
							
			}//end if
	
			else{
				//empty fields error message
				echo '<h1 class="heading">Uh Oh...</h1>
				<h4>Please make sure all fields are filled in ☺</h4>
				<br><br>
				Click here to login again.<br>
				<div class="col-12">
				  <a href="login.php"><button type="submit" class="btn btn-primary">Login Again</button>
				  </a>
				</div>';
			}//end else	
		}//end if
	
		else {?>
		<!--Form not submitted-->	
		<!--=================================Login Start========================================-->	
          <h1 class="heading">Login</h1>
          <form action="login.php" method="post" class="probootstrap-form probootstrap-form-box mb60">
            <div class="row">
              <div class="form-group">
                <div class="form-group">
                  <label for="uid">User ID</label>
                  <input type="text" class="form-control" name="uid">
                </div>
              </div>
            </div>
			<div class="row">
            <div class="form-group">
              <label for="pwd">Password</label>
              <input type="password" class="form-control" name="pwd">
            </div>
			</div>
            
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Login">
			  <input type="hidden" name="submitted" value="true">
            </div>
          </form>
		<!--=================================Login End========================================-->
        
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