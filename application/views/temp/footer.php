	
	<!--footer-->
		<footer class="footer">
			<div class="container">
				<div class="row align-items-center flex-row-reverse">
					<div class="col-md-12 col-sm-12 text-center">
						Copyright © 2021 <a href="#">Resto Berkah</a> All rights reserved.
					</div>
				</div>
			</div>
		</footer>
	<!-- End Footer-->
	</div>
</div><!--Ini tutup div punya app-content-->

</div><!--Ini penutupnya pagemain navbar-->
		</div><!--Ini penutupnya page navbar-->

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fas fa-angle-up "></i></a>

		<!--Jquery js -->
		<script src="<?php echo base_url()?>assets/js/vendors/jquery-3.2.1.min.js"></script>

		<!--Jquery.Sparkline js -->
		<script src="<?php echo base_url()?>assets/js/vendors/jquery.sparkline.min.js"></script>

		<!--Circle-Progress js -->
		<script src="<?php echo base_url()?>assets/js/vendors/circle-progress.min.js"></script>

		<!--Jquery.rating js -->
		<!-- <script src="<?php echo base_url()?>assets/plugins/jquery.rating/jquery.rating-stars.js"></script> -->

		<!--Bootstrap.min js-->
		<script src="<?php echo base_url()?>assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Side menu js -->
		<script src="<?php echo base_url()?>assets/plugins/sidemenu/js/sidemenu.js"></script>

		<!-- Custom scroll bar Js-->
		<script src="<?php echo base_url()?>assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/sidemenu/js/left-menu.js"></script>

		<!-- Input Mask Plugin -->
		<script src="<?php echo base_url()?>assets/plugins/jquery.mask/jquery.mask.min.js"></script>

		<!--Echart Plugin -->
		<script src="<?php echo base_url()?>assets/plugins/echart/echart.js"></script>

		<!-- Datepicker js -->
		<script src="<?php echo base_url()?>assets/plugins/date-picker/date-picker.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/date-picker/jquery-ui.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/jquery.mask/jquery.maskedinput.js"></script>

		<!--Select2 js -->
		<script src="<?php echo base_url()?>assets/plugins/select2/select2.full.min.js"></script>

		<!-- Inline js -->
		<script src="<?php echo base_url()?>assets/js/select2.js"></script>

		<!-- Progress -->
        <script src="<?php echo base_url()?>assets/js/vendors/circle-progress.min.js"></script>

		<!-- Chart js -->
		<script src="<?php echo base_url()?>assets/plugins/chart.js/chart.min.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/chart.js/chart.extension.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/chart/chart.bundle.js"></script>
		<script src="<?php echo base_url()?>assets/js/chart.js"></script>

		<!--Jquery.knob js-->
		<script src="<?php echo base_url()?>assets/plugins/othercharts/jquery.knob.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/othercharts/othercharts.js"></script>

		<!--Jquery.sparkline js-->
		<script src="<?php echo base_url()?>assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!--Sidemenu js-->
		<!-- <script src="<?php echo base_url()?>assets/plugins/side-menu/side-menu.js"></script> -->

		<!-- Sidemenu-responsive-tabs js-->
		<!-- <script src="<?php echo base_url()?>assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js"></script>-->		
		<!-- <script src="<?php echo base_url()?>assets/js/left-menu.js"></script> -->

		<!-- peitychart -->
		<script src="<?php echo base_url()?>assets/plugins/peitychart/jquery.peity.min.js"></script>

		<!--Counters -->
		<!-- <script src="<?php echo base_url()?>assets/plugins/counters/counterup.min.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/counters/waypoints.min.js"></script> -->

		<!-- P-scroll js -->
		<!-- <script src="<?php echo base_url()?>assets/plugins/p-scroll/p-scroll.js"></script> -->
		<!-- <script src="<?php echo base_url()?>assets/plugins/p-scroll/p-scroll-leftmenu.js"></script> -->

		<!-- Sidebar js -->
		<script src="<?php echo base_url()?>assets/plugins/sidebar/sidebar.js"></script>

		<!--Index js -->
		<script src="<?php echo base_url()?>assets/js/index.js"></script>

		<!-- custom js -->
		<script src="<?php echo base_url()?>assets/js/custom.js"></script>

		<!-- Data tables -->
		<script src="<?php echo base_url()?>assets/plugins/datatable/js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
		<!-- <script src="<?php echo base_url()?>assets/plugins/datatable/js/jszip.min.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/datatable/js/pdfmake.min.js"></script> -->
		<!-- <script src="<?php echo base_url()?>assets/plugins/datatable/js/vfs_fonts.js"></script> -->
		<script src="<?php echo base_url()?>assets/plugins/datatable/js/buttons.html5.min.js"></script>
		<!-- <script src="<?php echo base_url()?>assets/plugins/datatable/js/buttons.print.min.js"></script> -->
		<!-- <script src="<?php echo base_url()?>assets/plugins/datatable/js/buttons.colVis.min.js"></script> -->
		<script src="<?php echo base_url()?>assets/plugins/datatable/dataTables.responsive.min.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/datatable/responsive.bootstrap4.min.js"></script>

		<!-- Data table js -->
		<script src="<?php echo base_url()?>assets/js/datatable.js"></script>

		<!-- <script type="text/javascript" src="<?php echo base_url()?>assets/public/js/app/app-profile.js"></script> -->

	</body>
</html>

<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myMenu");
var btns = header.getElementsByClassName("slide");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  if (current.length > 0) { 
    current[0].className = current[0].className.replace(" active", "");
  }
  this.className += " active";
  });
}
</script>