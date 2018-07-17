<?php
	if(isset($_POST['timezone'])){	
		if(isset($_POST['tzone'])){	
		
		$tzoneValue = $_POST['tzone'];
		setcookie('tzone', $tzoneValue);
		
		header('location:index.php');
		exit();
		}	
	}
?>	

<!--Header Start -->
<?php 
$headtitle="setting"; //for header title
require 'header.php'?>
<!--Header End -->

<div class="probootstrap-main">
<section class="probootstrap-section probootstrap-animate">
    <div class="container">
        <div >
		

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
		
		<!-------- Change password ----------->
		<div class="col-md-6 col-md-offset-3">
		<h1>Set Time Zone</h1>
          <form action="setting.php" method="post" 
				class="probootstrap-form probootstrap-form-box mb60">
            <div class="col-md-12">
			<div class="row">
                <div class="form-group">
                  <label for="timezone">Choose your time zone!</label><br>
					<select name="tzone">
						<option value="MY">Kuala Lumpur, Malaysia</option>
						<option value="UK">London, United Kingdom</option>
						<option value="AUS">Melbourne, Australia</option>
					</select>
                </div>
			</div>
			</div>
			
            <div class="form-group">
              <input type="submit" class="btn btn-primary" id="timezone" name="timezone" value="Set">
            </div>
			
			<!--If submitted, set cookie----->
		
          </form>	
		  
  		  
		  
        </div>  
		<!---------- End change password-------------->
       </div>
    </div>
</section>
</div>

<!-- Footer Start -->
<?php 
	require 'footer.php';
?>
<!-- Footer End -->	