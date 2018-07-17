<!--Header Start -->
<?php 
$headtitle="setting"; //for header title
require 'header.php'?>
<!--Header End -->

<div class="probootstrap-main">
<section class="probootstrap-section probootstrap-animate">
    <div class="container">
        <div>
		
		<!--side menu -->
		<div class="sidenav">
		<ul>	
			<?php 
			//-- if user is login -->
			if(isset($_SESSION['first'])){
				echo "<li class=\"sidenavli\"><b>Account</b></li>
					  <li class=\"sidenavli\"><a href=\"resetpass.php\" >Reset Password</a></li>";
			}
			?>
			<li class="sidenavli"><b>Regional Setting</b></li>
			<li class="sidenavli"><a href="setting.php" >Set Time Zone</a></li>
		</ul>
		</div>
		<!--side menu end -->
		<div class="col-md-6 col-md-offset-3">

		<?php
		if(isset($_POST['submit'])){
			//--Validation Start to make sure all item posted
			if(!empty($_POST['oldp']) && !empty($_POST['newp']) && !empty($_POST['retypep']))
			{
				include 'dbh.php';
				$pwd   = $_POST['oldp'];
				$first = $_SESSION['first'];
				
				//Check old password correct
				$query = "SELECT * FROM users WHERE first='$first'";
				$problem=false;
				
				if($result = mysqli_query($dbc,$query)){
					if($row = mysqli_fetch_array($result)){
						//user found	
						//match pwd
						$hashedPwdCheck = password_verify($pwd, $row['pwd']);
						
						if($hashedPwdCheck){
							//password match
						}
						else{
							//match not found
							$problem = true;
							echo '<h1 class="heading">Uh Oh...</h1>	
								<h4>The <b>Old password</b> you entered is incorrect.</h4> 
								<br><br>
								Click here to reset password again.<br>
								<div class="col-12">
									<a href="resetpass.php">
								<button type="submit" class="btn btn-primary">Reset Password</button>
								</a>
								</div>';
						}
					}	
					
				}
				else
					echo "Error(query): ".mysqli_error($dbc);
				}
				
				if(!$problem) {
					if($_POST['newp']==$_POST['retypep']){
						
						$newp = $_POST['newp'];
						
						//New Password hashing
						$hashPwd = password_hash($newp, PASSWORD_DEFAULT);
						
						$sql = "UPDATE users SET pwd='$hashPwd' WHERE first='$first'";
						
						if(mysqli_query($dbc,$sql)){
							echo "<h1 class=\"heading\">Hooray~</h1>
								  <h4>You have successfully reset your password!</h4>";
						}
						else{
							echo '<h1 class="heading">Uh Oh...</h1>	
								<h4>Reset password failed to update database.</h4>
								<br><br>
								Click here to reset password again.<br>
								<div class="col-12">
									<a href="resetpass.php">
								<button type="submit" class="btn btn-primary">Reset Password</button>
								</a>
								</div>';
							echo "<p>Error message: ".mysqli_error($dbc)."</p>";
						}
					}
					else {
						echo '<h1 class="heading">Uh Oh...</h1>	
								<h4><b>New Password</b> and <b>Retype Password</b> does now match.</h4> 
								<br><br>
								Click here to reset password again.<br>
								<div class="col-12">
									<a href="resetpass.php">
								<button type="submit" class="btn btn-primary">Reset Password</button>
								</a>
								</div>';
					}
				}
		}		
		else{
		?>
		<!-------- Change password ----------->				
		<h1>Reset Password</h1>
          <form action="resetpass.php" method="post" 
		  class="probootstrap-form probootstrap-form-box mb60">
            <div class="col-md-12">
			<div class="row">
                <div class="form-group">
                  <label for="oldPass">Your old password</label>
                  <input type="password" class="form-control" id="oldp" name="oldp">
                </div>
			</div>
			</div>
			<div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="newPass">Your new password</label>
                  <input type="password" class="form-control" id="newp" name="newp">
                </div>
              </div>            
			<div class="col-md-6">
            <div class="form-group">
              <label for="retypePass">Retype your password</label>
              <input type="password" class="form-control" id="retypep" name="retypep">
            </div>
			</div>
			</div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Change">
            </div>
          </form>
        </div>  
		<!---------- End change password-------------->
		
		<?php } ?>
		
       </div>
    </div>
</section>
</div>

<!-- Footer Start -->
<?php 
	require 'footer.php';
?>
<!-- Footer End -->	