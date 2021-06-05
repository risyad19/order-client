<!doctype html>
<html lang="en" dir="ltr">
  <head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Spaner - Simple light Bootstrap Nice Admin Panel Dashboard Design Responsive HTML5 Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="bootstrap panel, bootstrap admin template, dashboard template, bootstrap dashboard, dashboard design, best dashboard, html css admin template, html admin template, admin panel template, admin dashbaord template, bootstrap dashbaord template, it dashbaord, hr dashbaord, marketing dashbaord, sales dashbaord, dashboard ui, admin portal, bootstrap 4 admin template, bootstrap 4 admin"/>

		<!-- Favicon -->
		<!-- <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>assets/images/brand/favicon.ico" /> -->

		<!-- Title -->
		<title>Resto Berkah</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="<?= base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">

		<!-- Custom scroll bar css-->
		<link href="<?= base_url();?>assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" />
		<link href="<?= base_url();?>assets/css/color-styles.css" rel="stylesheet" />

		<!-- Dashboard css -->
		<link href="<?= base_url();?>assets/css/style.css" rel="stylesheet" />

		<!--Font Awesome css-->
		<link href="<?= base_url();?>assets/plugins/fontawesome-free/css/all.css" rel="stylesheet">

		<!---Font icons css-->
		<link href="<?= base_url();?>assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

	</head>
	<body>

		<!-- Global Loader-->
		<div id="global-loader"><img src="<?= base_url();?>assets/images/svgs/loader.svg" alt="loader"></div>

		<div class="page">
			<div class="container">
				<div class="row">
					<div class="col  mx-auto">
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="card-group mb-0">
									<div class="card p-4">
										<div class="card-body">
											<?php if ($this->session->flashdata('msg')): ?>
												<div class="alert alert-success" role="alert">
													<?php echo $this->session->flashdata('msg'); ?>
												</div>
											<?php endif; ?>
											<h1>Login</h1>
                                            <form class="form" action="<?= base_url()?>login/autentikasi" method="post">
                                                <div class="form-group">
                                                    <label class="form-label text-left" for="username">Username</label>
                                                    <input type="text" class="form-control" name="username" id="username"  placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="text-left form-label">Password</label>
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                                </div>
                                                <div class="text-left">
                                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                                </div>
                                            </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Dashboard js -->
		<script src="<?= base_url();?>assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="<?= base_url();?>assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="<?= base_url();?>assets/js/vendors/selectize.min.js"></script>
		<script src="<?= base_url();?>assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="<?= base_url();?>assets/js/vendors/circle-progress.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/jquery.rating/jquery.rating-stars.js"></script>

		<!--Bootstrap.min js-->
		<script src="<?= base_url();?>assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Custom scroll bar js-->
		<script src="<?= base_url();?>assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Peitychart js-->
		<script src="<?= base_url();?>assets/plugins/peitychart/jquery.peity.min.js"></script>

		<!--Counters js-->
		<script src="<?= base_url();?>assets/plugins/counters/counterup.min.js"></script>
		<script src="<?= base_url();?>assets/plugins/counters/waypoints.min.js"></script>

		<!-- Custom js -->
		<script src="<?= base_url();?>assets/js/custom.js"></script>

	</body>
</html>
