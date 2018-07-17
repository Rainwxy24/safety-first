  <footer class="probootstrap-footer">
  
	<!--LOG OUT BUTTON & ADMIN PAGE-->
	<?php
	if(isset($_SESSION['first'])){
	?>
	<div class="bottomleft">
		<a href=admin.php><button class="btn btn-default">View Admin Page</button></a>
	</div>
	
	Ready to log out?<br>
	<form action="logout.php">
		<button class="btn btn-primary">LOG OUT</button>
	</form>;
	<?php } ?>
	<!--LOG OUT BUTTON-->
	
    <div class="container">
      <div class="row">
        <div class="col-md-12">
		<!--CONTACT US LINK-->
          <p><img src="img/icons/smartphone.png"> Contact us <a href=contact.php>here</a>.
		  <!--CONTACT US LINK-->
		  <br> &copy; 2017 <a href="https://probootstrap.com/">ProBootstrap:Connect</a>	  
		  . All Rights Reserved. Designed &amp; Developed by <a href="https://probootstrap.com">
		  ProBootstrap</a> . Image Sources <a href="http://dumbway2sdie.wikia.com/wiki/Dumb_Ways_to_Die_Wiki">
		  <i>Dumb Ways To Die</i> Wiki</a>.<br>Content by <b>Group 9:</b> Rain, Sarah, Eve &amp Shan.</p>
        </div>
      </div>
    </div>
	
	
  </footer>
  
  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
  </div>  

  <script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>

  </body>
</html>