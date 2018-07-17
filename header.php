<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Safety First | 
	
	<?php
		switch($headtitle){
			case "index":
				echo 'Home';
				break;
			case "login":
				echo 'Log in';
				break;
			case "register":
				echo 'Register';
				break;
			case "services":
				echo 'Services';
				break;
			case "about":
				echo 'About';
				break;
			case "contact":
				echo 'Contact Us';
				break;
			case "setting":
				echo 'Settings';
			case "exclusive":
				echo 'U R SPECIAL';
			case "admin":
				echo 'Admin Page';
				break;
		}
	?>	
	</title>
	
	<style type="text/css">
		.topright {
			float: right;
			position: absolute;
			top: 8px;
			right: 10px;
			font-size: 16px;
		}
		.bottomleft {
			float: left;
			position: absolute;
			bottom: 20px;
			left: 15px;
			font-size: 16px;
		}
		.sidenav {
			float: left;
			position: absolute;
			top: 200px;
			
		}
		.sidenavli{
			display:block;
		}
	</style>
		
	<link rel="icon" href="img/icon.jpg"/>
	
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" 
		  content="free website templates, free bootstrap themes, free template, free bootstrap, 
				   free website template">
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <?php 
  //scroll exclusive page onload
  if($headtitle == 'exclusive'){
	  echo '<body onload="scrollWin()">';
  }
  else{
	  echo '<body>';
  }
  ?>

  <!-- START: header -->
  
  <div class="probootstrap-loader"></div>

  <header role="banner" class="probootstrap-header">
    <div class="container">
        <h2><a href="index.php" class="probootstrap-logo">
		<b>SAFETY FIRST</b> - Do Not's Edition</a></h2>
        
        <a href="#" class="probootstrap-burger-menu visible-xs" >
		<i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>
		
		<div class="topright">
		<?php
			if(isset($_SESSION['first'])){
				echo "Welcome, ".$_SESSION['first']." ".$_SESSION['last'];
				echo '!&emsp;<a href="logout.php">Log Out</a>';
				echo '&emsp;<a href="exclusive.php" style="color: #d10000">EXCLUSIVE!</a>';
								
			}
			else{
				echo "Welcome
					  &emsp;<a href=\"login.php\">Login</a>";
			}
			
			//set timezone
			if(isset($_COOKIE['tzone'])){
				
				echo "&emsp;".$_COOKIE['tzone'];
				
				switch($_COOKIE['tzone']){
					case "MY":
						date_default_timezone_set("Asia/Kuala_Lumpur");
						break;
					case "UK":
						date_default_timezone_set('Europe/London');
						break;
					case "AUS":
						date_default_timezone_set('Australia/Melbourne');
						break;					
				}				
			}
			else
				date_default_timezone_set("Asia/Kuala_Lumpur"); //default
			
			echo "&nbsp;".date("Y.m.d")." ".date("h:i:sa");

		?>
		</div>
		
		<!--------------Navigation starts------------->
        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
		  
			<?php
		switch($headtitle){
			case "index":
				echo "<li class=\"active\"><a href=\"index.php\">Home</a></li>";
				
				if(isset($_SESSION['first'])){
					//no login tab
				}else{
					echo "<li><a href=\"login.php\">Login</a></li>";
				}
				  
				echo "<li><a href=\"register.php\">Register</a></li>
					  <li><a href=\"donots.php\">Do Not's</a></li>
					  <li><a href=\"about.php\">About</a></li>
					  <li><a href=\"setting.php\">Settings</a></li>";
				break;
			case "login":
				
					
				if(isset($_SESSION['first'])){
					//no login tab
				}else{
					echo "<li><a href=\"index.php\">Home</a></li>
						<li class=\"active\"><a href=\"login.php\">Login</a></li>
						<li><a href=\"register.php\">Register</a></li>
						<li><a href=\"donots.php\">Do Not's</a></li>
						<li><a href=\"about.php\">About</a></li>
						<li><a href=\"setting.php\">Settings</a></li>";
				}  
				
				 
				break;
			case "register":
				echo "<li><a href=\"index.php\">Home</a></li>";
				
				if(isset($_SESSION['first'])){
					//no login tab
				}else{
					echo "<li><a href=\"login.php\">Login</a></li>";
				}
				
				echo "<li  class=\"active\"><a href=\"register.php\">Register</a></li>
					  <li><a href=\"donots.php\">Do Not's</a></li>
					  <li><a href=\"about.php\">About</a></li>
					  <li><a href=\"setting.php\">Settings</a></li>";
				break;
			case "donots":
				echo "<li><a href=\"index.php\">Home</a></li>";
				
				if(isset($_SESSION['first'])){
					//no login tab
				}else{
					echo "<li><a href=\"login.php\">Login</a></li>";
				}
				
				echo "<li><a href=\"register.php\">Register</a></li>
					  <li class=\"active\"><a href=\"do_nots.php\">Do Not's</a></li>
					  <li><a href=\"about.php\">About</a></li>
					  <li><a href=\"setting.php\">Settings</a></li>";
				break;
			case "about":
				echo "<li><a href=\"index.php\">Home</a></li>";
				
				if(isset($_SESSION['first'])){
					//no login tab
				}else{
					echo "<li><a href=\"login.php\">Login</a></li>";
				}
				
				echo "<li><a href=\"register.php\">Register</a></li>
					  <li><a href=\"donots.php\">Do Not's</a></li>
					  <li class=\"active\"><a href=\"about.php\">About</a></li>
					  <li><a href=\"setting.php\">Settings</a></li>";
				break;
			case "setting":
				echo "<li><a href=\"index.php\">Home</a></li>";
				
				if(isset($_SESSION['first'])){
					//no login tab
				}else{
					echo "<li><a href=\"login.php\">Login</a></li>";
				}
				
				echo "<li><a href=\"register.php\">Register</a></li>
					  <li><a href=\"donots.php\">Do Not's</a></li>
					  <li><a href=\"about.php\">About</a></li>
					  <li class=\"active\"><a href=\"setting.php\">Settings</a></li>";
				break;
			case "exclusive":
				echo "<li><a href=\"index.php\">Home</a></li>";				
				echo "<li><a href=\"register.php\">Register</a></li>
					  <li><a href=\"donots.php\">Do Not's</a></li>
					  <li><a href=\"about.php\">About</a></li>
					  <li><a href=\"setting.php\">Settings</a></li>";
				break;
			default:
				echo "<li><a href=\"index.php\">Home</a></li>";				
				echo "<li><a href=\"register.php\">Register</a></li>
					  <li><a href=\"donots.php\">Do Not's</a></li>
					  <li><a href=\"about.php\">About</a></li>
					  <li><a href=\"setting.php\">Settings</a></li>";
				break;
		}
	?>
		  
            
          </ul>
		  
		<!--------------Navigation ends------------->  
		  
          <div class="extra-text visible-xs"> 
            <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
            <h5>Safety First</h5>
            <ul class="social-buttons">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-facebook2"></i></a></li>
              <li><a href="#"><i class="icon-instagram2"></i></a></li>
            </ul>
          </div>
        </nav>
    </div>
  </header>
  <!-- END: header -->
  
 