<!--copy-right-->
	<div class="copy-right">
		<div class="container">
			<div class="clearfix"> </div>
			<p>© 2016 Patient care . All rights reserved | Design by <a href="#">S_Square_A</a></p>	
		</div>
	</div>
	<!--//copy-right-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
	<!-- Bootstrap core JavaScript
    ================================================== -->
        <script src="assets/js/jquery-1.10.2.js"></script>
 
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>	
	
	<!------- BY Narayan-------->
	 <!--For Fancyapp-->
  <!--<script type="text/javascript" src="fancyapp/lib/jquery-1.10.1.min.js"></script> -->
    <script type="text/javascript" src="fancyapp/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="fancyapp/source/jquery.fancybox.css?v=2.1.5" media="screen" />
  
      <script type="text/javascript">
        $(document).ready(function() {

          $('.fancybox').fancybox();
          });
      </script>
	
	<!----------------------------------->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>