</div> <!-- /container -->
    </div> <!-- /container -->
	
	<hr>
	<div class="container footer" style="margin-top:20px;">
		<br/>
		<footer class="text-center">
			<div class="col-md-12">Copyright © 2021 Online distro. All rights reserved  
			<br>
			<br>
			</div>
		</footer>
	</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $url ?>assets/js/jquery.js"></script>
    <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
    <script src="<?php echo $url ?>assets/bootstrap/js/bootstrap.min.js"></script>
	
	<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
	
	<script src="<?php echo $url ?>assets/bootstrap/js/moment.js"></script>
		<script src="<?php echo $url ?>assets/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript">
			$(function () {
				$('#datetimepicker').datetimepicker({
					format: 'YYYY-MM-DD HH:mm',
                });
				
		</script>
  </body>
</html>