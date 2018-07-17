<!-- Header BEGIN -->
<?php
//Header title
$headtitle="admin";
require 'header.php'?>
<!---Header END --->

<style>
hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 2px;
} 
</style>

<div class="probootstrap-main">
<!-- Main BEGIN -->
<section class="probootstrap-section probootstrap-animate">
 <div class="container">
  <div class="probootstrap-inner probootstrap-animate">
  <div class="col-md-6 col-md-offset-3"  style="background-color: #e5ffee">
	
	<!----------------------------------- Admin Content BEGIN ------------------------------------------->	
	
	<center>
	<br><h1 class="heading"><b>Welcome to the Admin Control Page.</b></h1>
	<h3>The following are the details submitted through Contact Forms.</h3><br>
	</center>
	<div class="probootstrap-form probootstrap-form-box mb60">
	<?php
		//Inititiate database connection
		require 'dbh.php';
	
	//Calling database according to date entered - descending
	$query = 'SELECT * FROM contact ORDER BY date_entered DESC';
	
	if($result = mysqli_query($dbc,$query)) { //Query runs successfully			
		
		//Retreive & Print all records
		while($row = mysqli_fetch_array($result)){
			echo "<p><h1><b>{$row['fName']} {$row['lName']}</b></h1>
				  {$row['phone']}&emsp;{$row['email']}
				  <br>
				  {$row['msg']}<br>
				  </p><hr>\n";
		} //End while
	} else { //Query runs unsuccessfully
		echo "<p style=\"color: red;\">Could not retrieve the data because:<br />".mysqli_error($dbc).
			 ".</p><p>The query being run was: ".$query."</p>";
	} //End if-else (End of query)
	
	//Close database connection
	mysqli_close($dbc);
?>
	</div>
	<!------------------------------------ Admin Content END -------------------------------------------->
	
	</div>
  </div>
 </div>
</section>
<!--- Main END --->
</div>
	
<!-- Footer BEGIN -->
<?php require 'footer.php'; ?>
<!--- Footer END --->
