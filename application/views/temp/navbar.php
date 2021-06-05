<body class="app sidebar-mini">

		<!-- Global Loader-->
		<div id="global-loader"><img src="<?php echo base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>

		<div class="page"><!--Penutupnya ada difooter-->
			<div class="page-main"><!--Penutupnya ada difooter, setelah penutup div app-content-->

				<!-- Navbar-->
				<header class="app-header header">
					<!-- Navbar Right Menu-->
					<div class="container-fluid">
						<div class="d-flex">
							<div class="d-flex order-lg-2 ml-auto">
								<button class="navbar-toggler navresponsive-toggler d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
								</button>
								<!--Navbar -->
								<div class="dropdown">
									<a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#" style="margin-right: 35px;">
										<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url()?>assets/images/users/users.png"></span>
										<div style="margin-left: 5px;">
											<span class="font-weight-bold" style="color: #000;"><?php echo $this->session->userdata('name');?></span>
										</div>
										<i class="angle fas fa-angle-down text-dark" style="margin-left: 10px;"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item text-white" href="<?= base_url();?>login/logout"><i class="dropdown-icon fe fe-log-out text-white"></i> Log Out</a>										
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</header>
				<div class=" app-content"><!--Penutupnya ada difooter-->
					<div class="side-app">
						